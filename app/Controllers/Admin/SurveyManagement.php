<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User\SurveyModel;
use App\Models\User\SurveyResponseModel;

class SurveyManagement extends BaseController
{
    protected $surveyModel;
    protected $responseModel;

    public function __construct()
    {
        $this->surveyModel = new SurveyModel();
        $this->responseModel = new SurveyResponseModel();
    }

    public function index()
    {
        return view('admin/surveymanagement');
    }

    /**
     * Get dashboard data
     */
    public function dashboardData()
    {
        try {
            $stats = $this->surveyModel->getSurveyStats();
            $surveys = $this->surveyModel->getAllSurveys();
            $mlaCount = $stats['mla_stats'] ?? [];

            // Calculate satisfaction from survey data
            $satisfaction = $stats['satisfaction_rate'] ?? 0;
            $participation = $stats['participation_rate'] ?? 0;

            return $this->response->setJSON([
                'status'        => true,
                'stats'         => [
                    'total_surveys'     => $stats['total_surveys'] ?? 0,
                    'total_responses'   => $stats['total_responses'] ?? 0,
                    'active_surveys'    => $stats['active_surveys'] ?? 0,
                    'satisfaction'      => $satisfaction,
                    'participation'     => $participation
                ],
                'surveys'       => $surveys,
                'mlaCount'      => $mlaCount
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Survey Dashboard Error: ' . $e->getMessage());
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Unable to load survey dashboard data.',
                    'error'   => ENVIRONMENT === 'development' ? $e->getMessage() : null
                ]);
        }
    }

    /**
     * Get survey details for view/edit
     */
    public function getSurvey($id)
    {
        try {
            $survey = $this->surveyModel->getSurveyWithQuestions($id);
            
            if (!$survey) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Survey not found'
                ])->setStatusCode(404);
            }

            // Get response count
            $survey['response_count'] = $this->surveyModel->getResponseCount($id);

            return $this->response->setJSON([
                'status' => true,
                'data' => $survey
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Get Survey Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Unable to load survey details'
            ])->setStatusCode(500);
        }
    }

    /**
     * Create a new survey
     */
    public function create()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(405);
        }

        try {
            $rules = [
                'title' => 'required|min_length[3]|max_length[255]',
                'description' => 'permit_empty',
                'survey_category' => 'permit_empty',
                'mla_id' => 'permit_empty|integer',
                'constituency' => 'permit_empty|max_length[150]',
                'status' => 'permit_empty|in_list[Active,Pending,Closed]',
                'start_date' => 'permit_empty|valid_date',
                'end_date' => 'permit_empty|valid_date'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $this->validator->getErrors()
                ])->setStatusCode(400);
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'survey_category' => $this->request->getPost('survey_category'),
                'mla_id' => $this->request->getPost('mla_id') ?: 0,
                'constituency' => $this->request->getPost('constituency'),
                'status' => $this->request->getPost('status') ?: 'Active',
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'created_by' => session()->get('admin_id') ?: 1
            ];

            $id = $this->surveyModel->createSurvey($data);

            if (!$id) {
                throw new \Exception('Failed to create survey');
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Survey created successfully',
                'survey_id' => $id
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Create Survey Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to create survey: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Update a survey
     */
    public function update($id)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(405);
        }

        try {
            $rules = [
                'title' => 'required|min_length[3]|max_length[255]',
                'description' => 'permit_empty',
                'survey_category' => 'permit_empty',
                'mla_id' => 'permit_empty|integer',
                'constituency' => 'permit_empty|max_length[150]',
                'status' => 'permit_empty|in_list[Active,Pending,Closed]',
                'start_date' => 'permit_empty|valid_date',
                'end_date' => 'permit_empty|valid_date'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $this->validator->getErrors()
                ])->setStatusCode(400);
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'survey_category' => $this->request->getPost('survey_category'),
                'mla_id' => $this->request->getPost('mla_id') ?: 0,
                'constituency' => $this->request->getPost('constituency'),
                'status' => $this->request->getPost('status') ?: 'Active',
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date')
            ];

            $result = $this->surveyModel->updateSurvey($id, $data);

            if (!$result) {
                throw new \Exception('Failed to update survey');
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Survey updated successfully'
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Update Survey Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to update survey: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Delete a survey
     */
    /**
 * Delete a survey
 */
   public function delete($id)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(405);
        }

        $db = \Config\Database::connect();

        try {
            // Start transaction
            $db->transStart();

            // 1. Get all question IDs of this survey
            $questions = $db->table('survey_questions')
                ->select('id')
                ->where('survey_id', $id)
                ->get()
                ->getResultArray();

            // 2. Delete options belonging to these questions
            if (!empty($questions)) {
                $questionIds = array_column($questions, 'id');

                $db->table('survey_question_options')
                    ->whereIn('question_id', $questionIds)
                    ->delete();

                // 3. Delete questions belonging to survey
                $db->table('survey_questions')
                    ->where('survey_id', $id)
                    ->delete();
            }

            // 4. Delete survey
            $result = $db->table('surveys')
                ->where('id', $id)
                ->delete();

            if (!$result) {
                throw new \Exception('Failed to delete survey');
            }

            // Complete transaction
            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Survey, questions and options deleted successfully'
            ]);

        } catch (\Throwable $e) {

            // Rollback
            $db->transRollback();

            log_message(
                'error',
                'Delete Survey Error: ' . $e->getMessage()
            );

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status' => false,
                    'message' => 'Failed to delete survey: ' . $e->getMessage()
                ]);
        }
    }

    /**
     * Get MLAs for dropdown
     */
    public function getMlas()
    {
        try {
            $db = \Config\Database::connect();
            $mlas = $db->table('mlas')
                ->select('id, mla_name, mla_code')
                ->where('status', 'active')
                ->orderBy('mla_name', 'ASC')
                ->get()
                ->getResultArray();

            return $this->response->setJSON([
                'status' => true,
                'data' => $mlas
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Get MLAs Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Unable to load MLAs'
            ])->setStatusCode(500);
        }
    }

    /**
     * Get question types for dropdown
     */
    public function getQuestionTypes()
    {
        return $this->response->setJSON([
            'status' => true,
            'data' => [
                ['value' => 'radio', 'label' => 'Radio Button'],
                ['value' => 'select', 'label' => 'Dropdown'],
                ['value' => 'checkbox', 'label' => 'Checkbox'],
                ['value' => 'text', 'label' => 'Text Input'],
                ['value' => 'textarea', 'label' => 'Text Area']
            ]
        ]);
    }

    /**
     * Add question to survey
     */
    public function addQuestion()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(405);
        }

        try {
            $rules = [
                'survey_id' => 'required|integer',
                'question' => 'required|min_length[3]',
                'question_type' => 'required|in_list[radio,select,checkbox,text,textarea]',
                'is_required' => 'permit_empty|in_list[0,1]',
                'sort_order' => 'permit_empty|integer'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $this->validator->getErrors()
                ])->setStatusCode(400);
            }

            $db = \Config\Database::connect();
            $data = [
                'survey_id' => $this->request->getPost('survey_id'),
                'question' => $this->request->getPost('question'),
                'question_type' => $this->request->getPost('question_type'),
                'is_required' => $this->request->getPost('is_required') ? 1 : 0,
                'sort_order' => $this->request->getPost('sort_order') ?: 0
            ];

            $id = $db->table('survey_questions')->insert($data);

            // If question type requires options, handle them
            $options = $this->request->getPost('options');
            if (!empty($options) && is_array($options)) {
                foreach ($options as $index => $option) {
                    if (!empty($option)) {
                        $db->table('survey_question_options')->insert([
                            'question_id' => $id,
                            'option_text' => $option,
                            'sort_order' => $index + 1,
                            'is_active' => 1
                        ]);
                    }
                }
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Question added successfully',
                'question_id' => $id
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Add Question Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to add question: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Update question
     */
    public function updateQuestion($id)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(405);
        }

        try {
            $rules = [
                'question' => 'required|min_length[3]',
                'question_type' => 'required|in_list[radio,select,checkbox,text,textarea]',
                'is_required' => 'permit_empty|in_list[0,1]',
                'sort_order' => 'permit_empty|integer'
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $this->validator->getErrors()
                ])->setStatusCode(400);
            }

            $db = \Config\Database::connect();
            $data = [
                'question' => $this->request->getPost('question'),
                'question_type' => $this->request->getPost('question_type'),
                'is_required' => $this->request->getPost('is_required') ? 1 : 0,
                'sort_order' => $this->request->getPost('sort_order') ?: 0
            ];

            $db->table('survey_questions')
                ->where('id', $id)
                ->update($data);

            // Handle options update
            $options = $this->request->getPost('options');
            if (!empty($options) && is_array($options)) {
                // Delete existing options
                $db->table('survey_question_options')
                    ->where('question_id', $id)
                    ->delete();

                // Insert new options
                foreach ($options as $index => $option) {
                    if (!empty($option)) {
                        $db->table('survey_question_options')->insert([
                            'question_id' => $id,
                            'option_text' => $option,
                            'sort_order' => $index + 1,
                            'is_active' => 1
                        ]);
                    }
                }
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Question updated successfully'
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Update Question Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to update question: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * Delete question
     */
    public function deleteQuestion($id)
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request method'
            ])->setStatusCode(405);
        }

        try {
            $db = \Config\Database::connect();
            
            // Delete options first
            $db->table('survey_question_options')
                ->where('question_id', $id)
                ->delete();

            // Delete question
            $result = $db->table('survey_questions')
                ->where('id', $id)
                ->delete();

            if (!$result) {
                throw new \Exception('Failed to delete question');
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Question deleted successfully'
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Delete Question Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Failed to delete question: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}