<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RatingQuestionModel extends Model
{
    protected $table = 'rating_questions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'question_no',
        'question',
        'question_type',
        'options',
        'option_ratings',
        'min_value',
        'max_value',
        'placeholder',
        'rows',
        'status',
        'sort_order'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';

    protected $validationRules = [
        'question_no' => 'required|integer|is_unique[rating_questions.question_no,id,{id}]',
        'question' => 'required|min_length[3]',
        'question_type' => 'required|in_list[select,range,checkbox_group,textarea,text]',
        'status' => 'permit_empty|in_list[0,1]',
        'sort_order' => 'permit_empty|integer'
    ];

    protected $validationMessages = [
        'question_no' => [
            'required' => 'Question number is required.',
            'integer' => 'Question number must be a number.',
            'is_unique' => 'This question number is already taken.'
        ],
        'question' => [
            'required' => 'Question text is required.',
            'min_length' => 'Question must be at least 3 characters long.'
        ],
        'question_type' => [
            'required' => 'Question type is required.',
            'in_list' => 'Invalid question type.'
        ]
    ];

    /**
     * Get all active questions sorted by order
     */
    public function getActiveQuestions()
    {
        return $this->where('status', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    /**
     * Get all questions with pagination
     */
    public function getQuestions($perPage = 20)
    {
        return $this->orderBy('sort_order', 'ASC')
                    ->paginate($perPage);
    }

    /**
     * Get max question number
     */
    public function getMaxQuestionNo()
    {
        $result = $this->selectMax('question_no')->first();
        return $result ? (int)$result['question_no'] : 0;
    }

    /**
     * Toggle question status
     */
    public function toggleStatus($id)
    {
        $question = $this->find($id);
        if (!$question) {
            return false;
        }

        $newStatus = $question['status'] == 1 ? 0 : 1;
        return $this->update($id, ['status' => $newStatus]);
    }

    /**
     * Update sort order for multiple questions
     */
    public function updateOrder($orders)
    {
        $this->db->transStart();
        
        foreach ($orders as $orderData) {
            $this->update($orderData['id'], ['sort_order' => $orderData['sort_order']]);
        }
        
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    /**
     * Get options as array
     */
    public function getOptionsArray($question)
    {
        if (empty($question['options'])) {
            return [];
        }
        return json_decode($question['options'], true) ?: [];
    }

    /**
     * Get option ratings as array
     */
    public function getOptionRatingsArray($question)
    {
        if (empty($question['option_ratings'])) {
            return [];
        }
        return json_decode($question['option_ratings'], true) ?: [];
    }

    /**
     * Get question for frontend display
     */
    public function getForFrontend($question)
    {
        $data = [
            'id' => $question['id'],
            'question_no' => $question['question_no'],
            'text' => $question['question'],
            'type' => $question['question_type'],
            'name' => 'q_' . $question['id']
        ];

        if ($question['question_type'] === 'select') {
            $data['options'] = $this->getOptionsArray($question);
            $data['ratings'] = $this->getOptionRatingsArray($question);
        } elseif ($question['question_type'] === 'range') {
            $data['min'] = $question['min_value'] ?? 1;
            $data['max'] = $question['max_value'] ?? 10;
        } elseif ($question['question_type'] === 'checkbox_group') {
            $data['options'] = $this->getOptionsArray($question);
            $data['ratings'] = $this->getOptionRatingsArray($question);
        } elseif ($question['question_type'] === 'textarea') {
            $data['placeholder'] = $question['placeholder'] ?? '';
            $data['rows'] = $question['rows'] ?? 3;
        } elseif ($question['question_type'] === 'text') {
            $data['placeholder'] = $question['placeholder'] ?? '';
        }

        return $data;
    }

    /**
     * Get all questions formatted for frontend
     */
    public function getQuestionsForFrontend()
    {
        $questions = $this->getActiveQuestions();
        $result = [];
        foreach ($questions as $q) {
            $result[] = $this->getForFrontend($q);
        }
        return $result;
    }
}