<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use Config\Database;

class RatingQuestionApi extends BaseController
{
    public function index()
    {
        try {

            $db = Database::connect();

            $questions = $db->table('rating_questions')
                ->where('status', 1)
                ->orderBy('sort_order', 'ASC')
                ->orderBy('question_no', 'ASC')
                ->get()
                ->getResultArray();

            foreach ($questions as &$question) {

                $question['options'] = !empty($question['options'])
                    ? json_decode($question['options'], true)
                    : [];

                $question['option_ratings'] = !empty($question['option_ratings'])
                    ? json_decode($question['option_ratings'], true)
                    : [];
            }

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Rating questions fetched successfully',
                'total' => count($questions),
                'data' => $questions
            ]);

        } catch (\Throwable $e) {

            log_message('error', $e->getMessage());

            return $this->response->setStatusCode(500)->setJSON([
                'status' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}