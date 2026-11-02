<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User\MlaRatingModel;

class MlaRatingApi extends ResourceController
{
    protected $ratingModel;

    public function __construct()
    {
        $this->ratingModel = new MlaRatingModel();
    }

    // =====================================================
    // SAVE MLA RATING API
    // POST: api/mla-rating
    // =====================================================

    public function store()
    {
        try {

            // ---------------------------------
            // 1. Get authenticated voter
            // ---------------------------------

            $voter = $this->request->voter ?? null;

            if (empty($voter)) {
                return $this->respond([
                    'status'  => false,
                    'message' => 'Unauthorized voter'
                ], 401);
            }

            // ---------------------------------
            // 2. Get JSON request data
            // ---------------------------------

            $data = $this->request->getJSON(true);

            if (empty($data) || !is_array($data)) {
                return $this->respond([
                    'status'  => false,
                    'message' => 'Invalid JSON data'
                ], 400);
            }

            $questionData = $data['question_data'] ?? null;
            $overallRating = $data['overall_rating'] ?? null;

            // ---------------------------------
            // 3. Validate question data
            // ---------------------------------

            if (
                !is_array($questionData) ||
                empty($questionData)
            ) {
                return $this->respond([
                    'status'  => false,
                    'message' => 'Question data is required'
                ], 400);
            }

            // ---------------------------------
            // 4. Validate overall rating
            // ---------------------------------

            if (
                !is_numeric($overallRating) ||
                $overallRating < 0 ||
                $overallRating > 5
            ) {
                return $this->respond([
                    'status'  => false,
                    'message' => 'Overall rating must be between 0 and 5'
                ], 400);
            }

            // ---------------------------------
            // 5. Prepare database data
            // ---------------------------------

            $insertData = [
                'respondent_name' => $voter['full_name'],
                'voter_id'        => $voter['voter_id'],
                'user_id'         => $voter['id'],
                'mla_id'          => $voter['mla_id'],
                'state'           => $voter['state'],
                'district'        => $voter['district'],
                'constituency'    => $voter['constituency'],
                'question_data'   => $questionData,
                'overall_rating'  => $overallRating
            ];

            // ---------------------------------
            // 6. Save using existing model
            // ---------------------------------

            $ratingId = $this->ratingModel->insertRating($insertData);

            if (!$ratingId) {
                return $this->respond([
                    'status'  => false,
                    'message' => 'Failed to save MLA rating',
                    'errors'  => $this->ratingModel->errors()
                ], 500);
            }

            // ---------------------------------
            // 7. Success response
            // ---------------------------------

            return $this->respond([
                'status'  => true,
                'message' => 'MLA rating submitted successfully',
                'data'    => [
                    'rating_id'      => $ratingId,
                    'voter_id'       => $voter['voter_id'],
                    'mla_id'         => $voter['mla_id'],
                    'overall_rating' => $overallRating
                ]
            ], 201);

        } catch (\Throwable $e) {

            log_message('error', 'MLA Rating API Error: ' . $e->getMessage());

            return $this->respond([
                'status'  => false,
                'message' => 'Something went wrong while saving rating'
            ], 500);
        }
    }
}
