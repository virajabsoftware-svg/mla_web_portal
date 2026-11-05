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
    


public function update($id = null)
{
    try {

        // 1. Get authenticated voter
        $voter = $this->request->voter ?? null;

        if (empty($voter)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Unauthorized voter'
            ], 401);
        }

        // 2. Validate rating ID
        if (empty($id) || !is_numeric($id)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Valid rating ID is required'
            ], 400);
        }

        // 3. Find existing rating
        $rating = $this->ratingModel->find($id);

        if (!$rating) {
            return $this->respond([
                'status'  => false,
                'message' => 'Rating not found'
            ], 404);
        }

        // 4. Check logged-in voter authorization
        $ratingVoterId = trim((string) $rating['voter_id']);
        $loginVoterId  = trim((string) $voter['voter_id']);

        log_message('error', 'Rating ID: ' . $id);
        log_message('error', 'Database Voter ID: ' . $ratingVoterId);
        log_message('error', 'Login Voter ID: ' . $loginVoterId);

        if ($ratingVoterId !== $loginVoterId) {
            return $this->respond([
                'status'  => false,
                'message' => 'You are not authorized to update this rating'
            ], 403);
        }

        // 5. Get JSON request data
        $data = $this->request->getJSON(true);

        if (empty($data) || !is_array($data)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Invalid JSON data'
            ], 400);
        }

        $questionData  = $data['question_data'] ?? null;
        $overallRating = $data['overall_rating'] ?? null;

        // 6. Validate question data
        if (!is_array($questionData) || empty($questionData)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Question data is required'
            ], 400);
        }

        // 7. Validate overall rating
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

        // 8. Convert question data into JSON
        $encodedQuestionData = json_encode(
            $questionData,
            JSON_UNESCAPED_UNICODE
        );

        if ($encodedQuestionData === false) {
            return $this->respond([
                'status'  => false,
                'message' => 'Unable to encode question data'
            ], 400);
        }

        // 9. Prepare update data
        $updateData = [
            'question_data'  => $encodedQuestionData,
            'overall_rating' => (float) $overallRating
        ];

        // 10. Update database
        $updated = $this->ratingModel->update($id, $updateData);

        if ($updated === false) {

            log_message(
                'error',
                'MLA Rating Update Failed: ' .
                json_encode($this->ratingModel->errors())
            );

            return $this->respond([
                'status'  => false,
                'message' => 'Failed to update MLA rating',
                'errors'  => $this->ratingModel->errors()
            ], 500);
        }

        // 11. Success response
        return $this->respond([
            'status'  => true,
            'message' => 'MLA rating updated successfully',
            'data'    => [
                'rating_id'      => $id,
                'voter_id'       => $voter['voter_id'],
                'mla_id'         => $rating['mla_id'],
                'overall_rating' => (float) $overallRating
            ]
        ], 200);

    } catch (\Throwable $e) {

        log_message(
            'error',
            'MLA Rating Update API Error: ' .
            $e->getMessage() .
            ' File: ' . $e->getFile() .
            ' Line: ' . $e->getLine()
        );

        return $this->respond([
            'status'  => false,
            'message' => 'Something went wrong while updating rating'
        ], 500);
    }
}


}
