<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\SurveyResponseModel;

class Survey extends BaseController
{
    protected $surveyModel;
    protected $db;

    public function __construct()
    {
        $this->surveyModel = new SurveyResponseModel();
        $this->db = \Config\Database::connect();
    }


    // =========================================================
    // SURVEY PAGE
    // =========================================================

    public function index()
    {
        $session = session();

        // -----------------------------------------------------
        // Logged-in voter ID
        // -----------------------------------------------------

        $voterId = $session->get('voter_id');

        if (empty($voterId)) {
            return redirect()
                ->to('/login')
                ->with('error', 'Please login first.');
        }


        // -----------------------------------------------------
        // Get logged-in voter information
        // -----------------------------------------------------

        $voter = $this->db
            ->table('voters')
            ->where('voter_id', $voterId)
            ->get()
            ->getRowArray();


        if (!$voter) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Voter information not found for Voter ID: ' . $voterId
                );
        }


        // -----------------------------------------------------
        // Get active surveys
        // -----------------------------------------------------

        $activeSurveys = $this->db
            ->table('surveys')
            ->where('status', 'Active')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();


        // -----------------------------------------------------
        // Get logged-in voter's survey history
        // -----------------------------------------------------

        $responses = $this->surveyModel
            ->where('voter_id', $voterId)
            ->orderBy('submitted_at', 'DESC')
            ->findAll();


        // -----------------------------------------------------
        // Send data to view
        // -----------------------------------------------------

        $data = [
            'voter'         => $voter,
            'activeSurveys' => $activeSurveys,
            'responses'     => $responses
        ];


        return view('user/Survey', $data);
    }



    // =========================================================
    // SAVE / SUBMIT SURVEY RESPONSE
    // =========================================================

    public function save()
    {
        $request = $this->request;
        $session = session();


        // -----------------------------------------------------
        // Get logged-in voter from SESSION
        // -----------------------------------------------------

        $voterId = $session->get('voter_id');


        if (empty($voterId)) {

            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Please login first.'
                ]);
        }


        // -----------------------------------------------------
        // Get POST data
        // -----------------------------------------------------

        $surveyId = $request->getPost('survey_id');

        $mlaId = $request->getPost('mla_id');

        $district = $request->getPost('district');

        $constituency = $request->getPost('constituency');

        $village = $request->getPost('village');

        $surveyCategory = $request->getPost('survey_category');

        $answers = $request->getPost('answers');


        // -----------------------------------------------------
        // Validation
        // -----------------------------------------------------

        if (empty($surveyId)) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey ID is missing.'
            ]);
        }


        if (empty($surveyCategory)) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey category is missing.'
            ]);
        }


        if (empty($answers)) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Please answer the survey questions.'
            ]);
        }


        // -----------------------------------------------------
        // Verify survey exists and is Active
        // -----------------------------------------------------

        $survey = $this->db
            ->table('surveys')
            ->where('id', $surveyId)
            ->where('status', 'Active')
            ->get()
            ->getRowArray();


        if (!$survey) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey not found or inactive.'
            ]);
        }


        // -----------------------------------------------------
        // Decode JSON answers
        // -----------------------------------------------------

        $decodedAnswers = json_decode($answers, true);


        if (
            !is_array($decodedAnswers) ||
            empty($decodedAnswers)
        ) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Invalid survey answers format.'
            ]);
        }


        // -----------------------------------------------------
        // Prevent duplicate submission
        // -----------------------------------------------------

        $existing = $this->db
            ->table('survey_responses')
            ->where('survey_id', $surveyId)
            ->where('voter_id', $voterId)
            ->get()
            ->getRowArray();


        if ($existing) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'You have already submitted this survey.'
            ]);
        }


        // -----------------------------------------------------
        // Current timestamp
        // -----------------------------------------------------

        $now = date('Y-m-d H:i:s');


        // -----------------------------------------------------
        // Prepare response data
        // -----------------------------------------------------

        $data = [

            'survey_id' => (int) $surveyId,

            'voter_id' => $voterId,

            'mla_id' => !empty($mlaId)
                ? (int) $mlaId
                : null,

            'district' => !empty($district)
                ? $district
                : null,

            'constituency' => !empty($constituency)
                ? $constituency
                : null,

            'village' => !empty($village)
                ? $village
                : null,

            'survey_category' => !empty($surveyCategory)
                ? $surveyCategory
                : null,

            'answers' => json_encode(
                $decodedAnswers,
                JSON_UNESCAPED_UNICODE
            ),

            'status' => 'Submitted',

            'submitted_at' => $now,

            'created_at' => $now,

            'updated_at' => $now
        ];


        // -----------------------------------------------------
        // Insert into survey_responses
        // -----------------------------------------------------

        $inserted = $this->db
            ->table('survey_responses')
            ->insert($data);


        // -----------------------------------------------------
        // Insert failed
        // -----------------------------------------------------

        if (!$inserted) {

            $dbError = $this->db->error();

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Failed to save survey response.',
                'error'   => $dbError['message'] ?? 'Unknown database error'
            ]);
        }


        // -----------------------------------------------------
        // Success - Return the saved response ID
        // -----------------------------------------------------

        $responseId = $this->db->insertID();

        // Also return the full response data for history refresh
        $savedResponse = $this->db
            ->table('survey_responses')
            ->where('id', $responseId)
            ->get()
            ->getRowArray();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Survey response submitted successfully.',
            'response_id' => $responseId,
            'response' => $savedResponse
        ]);
    }



    // =========================================================
    // SURVEY RESPONSE HISTORY
    // =========================================================

    public function history()
    {
        $session = session();

        $voterId = $session->get('voter_id');


        if (empty($voterId)) {

            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Please login first.'
                ]);
        }


        $responses = $this->surveyModel
            ->where('voter_id', $voterId)
            ->orderBy('submitted_at', 'DESC')
            ->findAll();


        return $this->response->setJSON([
            'status'    => true,
            'responses' => $responses
        ]);
    }



    // =========================================================
    // VIEW SINGLE SURVEY RESPONSE
    // =========================================================

    public function view($id)
    {
        $session = session();

        $voterId = $session->get('voter_id');


        if (empty($voterId)) {

            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Please login first.'
                ]);
        }


        $response = $this->surveyModel
            ->where('id', $id)
            ->where('voter_id', $voterId)
            ->first();


        if (!$response) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response not found.'
            ]);
        }


        return $this->response->setJSON([
            'status'   => true,
            'response' => $response
        ]);
    }



    // =========================================================
    // DELETE SURVEY RESPONSE
    // =========================================================

    public function delete($id)
    {
        $session = session();

        $voterId = $session->get('voter_id');


        if (empty($voterId)) {

            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Please login first.'
                ]);
        }


        // -----------------------------------------------------
        // Find only logged-in voter's response
        // -----------------------------------------------------

        $response = $this->surveyModel
            ->where('id', $id)
            ->where('voter_id', $voterId)
            ->first();


        if (!$response) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response not found.'
            ]);
        }


        // -----------------------------------------------------
        // Delete
        // -----------------------------------------------------

        $deleted = $this->surveyModel
            ->where('id', $id)
            ->where('voter_id', $voterId)
            ->delete();


        if ($deleted) {

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Survey response deleted successfully.'
            ]);
        }


        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Failed to delete survey response.'
        ]);
    }
}