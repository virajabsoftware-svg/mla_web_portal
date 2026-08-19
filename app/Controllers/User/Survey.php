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

    /**
     * Survey page
     */
public function index()
{
    $session = session();

    // Logged-in voter
    $voterId = $session->get('voter_id');

    if (empty($voterId)) {
        return redirect()->to('/login')
            ->with('error', 'Please login first.');
    }

    $db = \Config\Database::connect();

    // Get only logged-in voter's information
    $voter = $db->table('voters')
        ->where('voter_id', $voterId)
        ->get()
        ->getRowArray();

    if (!$voter) {
        return redirect()->back()
            ->with(
                'error',
                'Voter information not found for Voter ID: ' . $voterId
            );
    }

    // Get active surveys
    $activeSurveys = $db->table('surveys')
        ->where('status', 'Active')
        ->orderBy('id', 'ASC')
        ->get()
        ->getResultArray();

    // Get only logged-in user's survey history
    $responses = $this->surveyModel
        ->where('voter_id', $voter['voter_id'])
        ->orderBy('submitted_at', 'DESC')
        ->findAll();

    $data = [
        'voter'         => $voter,
        'activeSurveys' => $activeSurveys,
        'responses'     => $responses,
    ];

    return view('user/Survey', $data);
}
    /**
     * Save Survey Response
     */
 public function save()
{
    $session = session();

    // Logged-in voter
    $voterId = $session->get('voter_id');

    if (empty($voterId)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'User is not logged in.'
        ]);
    }

    $db = \Config\Database::connect();

    // Get logged-in user's voter information
    $voter = $db->table('voters')
        ->where('voter_id', $voterId)
        ->get()
        ->getRowArray();

    if (!$voter) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Voter information not found.'
        ]);
    }

    // Survey ID
    $surveyId = $this->request->getPost('survey_id');

    // Answers from frontend
    $answers = $this->request->getPost('answers');

    if (empty($surveyId)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Survey ID is missing.'
        ]);
    }

    if (empty($answers)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Survey answers are missing.'
        ]);
    }

    // Check survey exists
    $survey = $db->table('surveys')
        ->where('id', $surveyId)
        ->get()
        ->getRowArray();

    if (!$survey) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Survey not found.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Check duplicate response
    |--------------------------------------------------------------------------
    */

    $alreadySubmitted = $db->table('survey_responses')
        ->where('survey_id', $surveyId)
        ->where('voter_id', $voter['voter_id'])
        ->get()
        ->getRowArray();

    if ($alreadySubmitted) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'You have already submitted this survey.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Insert survey response
    |--------------------------------------------------------------------------
    */

    $data = [
        'survey_id'    => $surveyId,
        'voter_id'     => $voter['voter_id'],
        'mla_id'       => $voter['mla_id'] ?? null,
        'district'     => $voter['district'] ?? null,
        'constituency' => $voter['constituency'] ?? null,
        'status'       => 'Submitted',
        'submitted_at' => date('Y-m-d H:i:s'),
    ];

    try {

        $inserted = $db->table('survey_responses')->insert($data);

        if (!$inserted) {

            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response could not be saved.',
                'errors'   => $db->error()
            ]);
        }

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Survey response submitted successfully.'
        ]);

    } catch (\Throwable $e) {

        return $this->response->setJSON([
            'status'  => false,
            'message' => $e->getMessage()
        ]);
    }
}

    /**
     * Get Survey Response History
     */
    public function history()
    {
        $responses = $this->surveyModel->getHistory();

        return $this->response->setJSON([
            'status'    => true,
            'responses' => $responses
        ]);
    }


    /**
     * View Single Survey Response
     */
    public function view($id)
    {
        $response = $this->surveyModel->getResponse($id);

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


    /**
     * Delete Survey Response
     */
    public function delete($id)
    {
        $response = $this->surveyModel->getResponse($id);

        if (!$response) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey response not found.'
            ]);
        }


        if ($this->surveyModel->deleteResponse($id)) {

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