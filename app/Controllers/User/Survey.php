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
        /*
        |--------------------------------------------------------------------------
        | MLA Survey Count
        |--------------------------------------------------------------------------
        */

        $data['mlaSurveyCount'] = $this->db
            ->table('survey_responses sr')
            ->select('m.mla_name, m.mla_code, COUNT(sr.id) AS total_surveys')
            ->join(
                'mlas m',
                'm.mla_code = sr.mla_id',
                'left'
            )
            ->groupBy([
                'm.mla_code',
                'm.mla_name'
            ])
            ->orderBy('total_surveys', 'DESC')
            ->get()
            ->getResultArray();


        /*
        |--------------------------------------------------------------------------
        | Survey Response History
        |--------------------------------------------------------------------------
        */

        $data['responses'] = $this->surveyModel->getHistory();


        /*
        |--------------------------------------------------------------------------
        | Load Survey View
        |--------------------------------------------------------------------------
        */

        return view('user/survey', $data);
    }


    /**
     * Save Survey Response
     */
  public function save()
{
    /**
     * Get Survey ID
     */
    $surveyId = $this->request->getPost('survey_id');

    if (empty($surveyId)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Survey ID is required.'
        ]);
    }


    /**
     * Check Survey
     */
    $survey = $this->db
        ->table('surveys')
        ->where('id', $surveyId)
        ->get()
        ->getRowArray();

    if (!$survey) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Survey not found.'
        ]);
    }


    /**
     * Prepare data according to
     * survey_responses table
     */
    $data = [
        'survey_id'    => $surveyId,
        'voter_id'     => $this->request->getPost('voter_id'),
        'mla_id'       => $this->request->getPost('mla_id'),
        'district'     => $this->request->getPost('district'),
        'constituency' => $this->request->getPost('constituency'),
        'status'       => 'submitted',
        'submitted_at' => date('Y-m-d H:i:s')
    ];


    /**
     * Insert Survey Response
     */
    try {

        $inserted = $this->surveyModel->insert($data);

        if ($inserted) {

            $responseId = $this->surveyModel->getInsertID();

            return $this->response->setJSON([
                'status'  => true,
                'message' => 'Survey submitted successfully.',
                'id'      => $responseId
            ]);
        }


        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Database insert failed.',
            'errors'  => $this->surveyModel->errors()
        ]);

    } catch (\Throwable $e) {

        log_message(
            'error',
            'Survey Submit Error: ' . $e->getMessage()
        );

        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Database error occurred.',
            'error'   => $e->getMessage()
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