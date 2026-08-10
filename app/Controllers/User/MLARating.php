<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\MlaRatingModel;

class MlaRating extends BaseController
{
    protected $mlaRatingModel;

    public function __construct()
    {
        $this->mlaRatingModel = new MlaRatingModel();
    }

    /**
     * Display the MLA rating page
     * Supports optional MLA ID parameter
     */
    public function index($mlaId = null)
    {
        // You can use $mlaId if needed for specific MLA
        // For now, we'll just show the survey
        return view('user/mla_rating');
    }

    /**
     * Get questions for frontend
     * This method fetches questions from the database for the frontend
     */
    public function getQuestions()
    {
        $model = new \App\Models\Admin\RatingQuestionModel();
        $questions = $model->getQuestionsForFrontend();
        
        // Add getRating function to each question
        foreach ($questions as &$q) {
            if ($q['type'] === 'select') {
                $q['getRating'] = function($val) use ($q) {
                    if (!isset($q['options']) || !isset($q['ratings'])) return 0;
                    $index = array_search($val, $q['options']);
                    if ($index === false) return 0;
                    return isset($q['ratings'][$index]) ? floatval($q['ratings'][$index]) : 0;
                };
            } elseif ($q['type'] === 'range') {
                $q['getRating'] = function($val) use ($q) {
                    $num = intval($val);
                    $min = intval($q['min'] ?? 1);
                    $max = intval($q['max'] ?? 10);
                    $range = $max - $min;
                    if ($range <= 0) return 0;
                    $scaled = (($num - $min) / $range) * 4 + 1;
                    return round($scaled, 1);
                };
            } elseif ($q['type'] === 'checkbox_group') {
                $q['getRating'] = function($val) use ($q) {
                    if (!is_array($val) || empty($val)) return 0;
                    if (!isset($q['options']) || !isset($q['ratings'])) return 0;
                    $total = 0;
                    foreach ($val as $selected) {
                        $index = array_search($selected, $q['options']);
                        if ($index !== false && isset($q['ratings'][$index])) {
                            $total += floatval($q['ratings'][$index]);
                        }
                    }
                    return min(5, $total);
                };
            } else {
                $q['getRating'] = function() { return 0; };
            }
        }
        
        return $this->response->setJSON([
            'success' => true,
            'questions' => $questions
        ]);
    }

    /**
     * Save MLA rating submission
     * Works with both POST and AJAX
     */
    public function save()
    {
        try {
            // Get JSON input
            $json = $this->request->getJSON(true);
            
            if (empty($json)) {
                // Fallback to POST data
                $json = $this->request->getPost();
            }

            // Validate required fields
            if (empty($json['questions']) || !is_array($json['questions'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid question data provided'
                ])->setStatusCode(400);
            }

            if (!isset($json['overall_rating']) || !is_numeric($json['overall_rating'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Overall rating is required and must be numeric'
                ])->setStatusCode(400);
            }

            // Validate each question
            $validatedQuestions = [];
            foreach ($json['questions'] as $question) {
                if (!isset($question['question_id']) || !isset($question['question']) || !isset($question['answer']) || !isset($question['rating'])) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Each question must have question_id, question, answer, and rating'
                    ])->setStatusCode(400);
                }

                // Validate rating is between 0 and 5
                $rating = (float)$question['rating'];
                if ($rating < 0 || $rating > 5) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Question rating must be between 0 and 5'
                    ])->setStatusCode(400);
                }

                // Clean data
                $validatedQuestions[] = [
                    'question_id' => (int)$question['question_id'],
                    'question' => trim(strip_tags($question['question'])),
                    'answer' => $this->cleanAnswer($question['answer']),
                    'rating' => $rating
                ];
            }

            // Validate overall rating
            $overallRating = (float)$json['overall_rating'];
            if ($overallRating < 0 || $overallRating > 5) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Overall rating must be between 0 and 5'
                ])->setStatusCode(400);
            }

            // Prepare data for insertion
            $insertData = [
                'respondent_name' => isset($json['respondent_name']) ? trim(strip_tags($json['respondent_name'])) : null,
                'constituency' => isset($json['constituency']) ? trim(strip_tags($json['constituency'])) : null,
                'question_data' => $validatedQuestions,
                'overall_rating' => $overallRating,
                'submitted_at' => date('Y-m-d H:i:s')
            ];

            // Insert into database
            $insertId = $this->mlaRatingModel->insertRating($insertData);

            if ($insertId === false) {
                $errors = $this->mlaRatingModel->errors();
                log_message('error', 'Failed to insert MLA rating: ' . print_r($errors, true));
                
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to save rating. Please try again.',
                    'errors' => $errors
                ])->setStatusCode(500);
            }

            // Get the inserted data
            $savedData = $this->mlaRatingModel->getRatingById($insertId);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Rating saved successfully',
                'data' => [
                    'id' => $insertId,
                    'questions' => $validatedQuestions,
                    'overall_rating' => $overallRating,
                    'respondent_name' => $insertData['respondent_name'],
                    'constituency' => $insertData['constituency'],
                    'submitted_at' => $insertData['submitted_at']
                ]
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Exception in MlaRating::save: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while saving: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Submit rating with MLA ID (for backward compatibility)
     */
    public function submit($mlaId = null)
    {
        // This is a wrapper for save() to maintain compatibility
        // with existing routes
        return $this->save();
    }

    /**
     * List all ratings
     */
    public function list()
    {
        $ratings = $this->mlaRatingModel->getRatings(50);
        
        // Decode question_data for display
        foreach ($ratings as &$rating) {
            if (isset($rating['question_data'])) {
                $rating['question_data'] = json_decode($rating['question_data'], true);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $ratings,
            'total' => count($ratings)
        ]);
    }

    /**
     * View a specific rating
     */
    public function view($id = null)
    {
        if ($id === null) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Rating ID is required'
            ])->setStatusCode(400);
        }

        $rating = $this->mlaRatingModel->getRatingById((int)$id);

        if (!$rating) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Rating not found'
            ])->setStatusCode(404);
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $rating
        ]);
    }

    /**
     * Get rating statistics
     */
    public function statistics()
    {
        $stats = $this->mlaRatingModel->getStatistics();

        return $this->response->setJSON([
            'success' => true,
            'data' => $stats
        ]);
    }

    /**
     * Clean answer data
     */
    private function cleanAnswer($answer)
    {
        if (is_array($answer)) {
            return array_map(function($item) {
                return trim(strip_tags($item));
            }, $answer);
        }
        return trim(strip_tags($answer));
    }
}