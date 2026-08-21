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

        $voterId = $session->get('voter_id');

        if (empty($voterId)) {
            return redirect()
                ->to('/login')
                ->with('error', 'Please login first.');
        }

        // Get logged-in voter
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

        // Get active surveys
        $activeSurveys = $this->db
            ->table('surveys')
            ->where('status', 'Active')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        // Get voter's survey history with survey titles
        $responses = $this->db
            ->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.voter_id', $voterId)
            ->orderBy('sr.submitted_at', 'DESC')
            ->get()
            ->getResultArray();

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

        $voterId = $session->get('voter_id');

        if (empty($voterId)) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Please login first.'
                ]);
        }

        $surveyId = $request->getPost('survey_id');
        $mlaId = $request->getPost('mla_id');
        $district = $request->getPost('district');
        $constituency = $request->getPost('constituency');
        $village = $request->getPost('village');
        $surveyCategory = $request->getPost('survey_category');
        $answers = $request->getPost('answers');

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

        $decodedAnswers = json_decode($answers, true);

        if (!is_array($decodedAnswers) || empty($decodedAnswers)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Invalid survey answers format.'
            ]);
        }

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

        $now = date('Y-m-d H:i:s');

        $data = [
            'survey_id'       => (int) $surveyId,
            'voter_id'        => $voterId,
            'mla_id'          => !empty($mlaId) ? (int) $mlaId : null,
            'district'        => !empty($district) ? trim($district) : null,
            'constituency'    => !empty($constituency) ? trim($constituency) : null,
            'village'         => !empty($village) ? trim($village) : null,
            'survey_category' => !empty($surveyCategory) ? trim($surveyCategory) : null,
            'answers'         => json_encode($decodedAnswers, JSON_UNESCAPED_UNICODE),
            'status'          => 'Submitted',
            'submitted_at'    => $now,
            'created_at'      => $now,
            'updated_at'      => $now
        ];

        $inserted = $this->db
            ->table('survey_responses')
            ->insert($data);

        if (!$inserted) {
            $dbError = $this->db->error();
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Failed to save survey response.',
                'error'   => $dbError['message'] ?? 'Unknown database error'
            ]);
        }

        $responseId = $this->db->insertID();

        $savedResponse = $this->db
            ->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.id', $responseId)
            ->get()
            ->getRowArray();

        return $this->response->setJSON([
            'status'      => true,
            'message'     => 'Survey response submitted successfully.',
            'response_id' => $responseId,
            'response'    => $savedResponse
        ]);
    }

    // =========================================================
    // VIEW SINGLE SURVEY RESPONSE - FIXED
    // =========================================================

    public function view($id = null)
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

        // Get ID from POST if available (for AJAX)
        if ($this->request->isAJAX() && $this->request->getPost('id')) {
            $id = $this->request->getPost('id');
        }

        if (empty($id)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response ID is required.'
            ]);
        }

        // Get the survey response with survey title
        $response = $this->db
            ->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.id', $id)
            ->where('sr.voter_id', $voterId)
            ->get()
            ->getRowArray();

        if (!$response) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response not found.'
            ]);
        }

        return $this->response->setJSON([
            'status'   => true,
            'message'  => 'Survey retrieved successfully.',
            'response' => $response
        ]);
    }

    // =========================================================
    // UPDATE SURVEY RESPONSE - FIXED
    // =========================================================

    public function update()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Invalid request.'
            ]);
        }

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

        $id = $this->request->getPost('id');

        if (empty($id)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response ID is required.'
            ]);
        }

        $existing = $this->surveyModel
            ->where('id', $id)
            ->where('voter_id', $voterId)
            ->first();

        if (!$existing) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response not found.'
            ]);
        }

        $answers = $this->request->getPost('answers');

        if (empty($answers)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey answers are required.'
            ]);
        }

        if (is_string($answers)) {
            $decodedAnswers = json_decode($answers, true);

            if (json_last_error() !== JSON_ERROR_NONE || !is_array($decodedAnswers)) {
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Invalid answers data.'
                ]);
            }

            $answers = json_encode($decodedAnswers, JSON_UNESCAPED_UNICODE);
        }

        $data = [
            'district'     => trim((string) $this->request->getPost('district')),
            'constituency' => trim((string) $this->request->getPost('constituency')),
            'village'      => trim((string) $this->request->getPost('village')),
            'answers'      => $answers,
            'updated_at'   => date('Y-m-d H:i:s')
        ];

        $updated = $this->surveyModel
            ->where('id', $id)
            ->where('voter_id', $voterId)
            ->set($data)
            ->update();

        if (!$updated) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Failed to update survey response.'
            ]);
        }

        $updatedRecord = $this->db
            ->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.id', $id)
            ->get()
            ->getRowArray();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Survey response updated successfully.',
            'record'  => $updatedRecord
        ]);
    }

    // =========================================================
    // DELETE SURVEY RESPONSE - UNTOUCHED
    // =========================================================

    public function delete($id = null)
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

        if (empty($id)) {
            $id = $this->request->getPost('id');

            if (empty($id)) {
                return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Survey response ID is required.'
                ]);
            }
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

        $responses = $this->db
            ->table('survey_responses sr')
            ->select('sr.*, s.title as survey_title')
            ->join('surveys s', 's.id = sr.survey_id', 'left')
            ->where('sr.voter_id', $voterId)
            ->orderBy('sr.submitted_at', 'DESC')
            ->get()
            ->getResultArray();

        return $this->response->setJSON([
            'status'    => true,
            'responses' => $responses
        ]);
    }
}