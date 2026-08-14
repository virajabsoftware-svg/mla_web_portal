<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\SurveyModel;

class Survey extends BaseController
{
    protected $surveyModel;
    protected $db;

    public function __construct()
    {
        $this->surveyModel = new SurveyModel();
        $this->db = \Config\Database::connect();
    }


    // =====================================================
    // INDEX
    // =====================================================

    public function index()
    {
        // -------------------------------------------------
        // MLA / Constituency Wise Survey Count
        // -------------------------------------------------

        $data['mlaSurveyCount'] = $this->surveyModel
            ->getMLAWiseSurveyCount();


        // -------------------------------------------------
        // Survey List / History
        // -------------------------------------------------

        $data['responses'] = $this->surveyModel
            ->orderBy('id', 'DESC')
            ->findAll();


        // -------------------------------------------------
        // Active Surveys
        // -------------------------------------------------

        $data['activeSurveys'] = $this->surveyModel
            ->where('status', 'Active')
            ->orderBy('id', 'DESC')
            ->findAll();


        return view('user/survey', $data);
    }


    // =====================================================
    // SAVE
    // =====================================================

    public function save()
    {
        $surveyId = $this->request->getPost('survey_id');


        // -------------------------------------------------
        // Validate Survey ID
        // -------------------------------------------------

        if (!$surveyId) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey ID is required'
            ]);
        }


        // -------------------------------------------------
        // Get Survey
        // -------------------------------------------------

        $survey = $this->surveyModel
            ->where('id', $surveyId)
            ->first();


        if (!$survey) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Survey not found'
            ]);
        }


        // -------------------------------------------------
        // Survey Found
        // -------------------------------------------------

        return $this->response->setJSON([
            'status'    => true,
            'message'   => 'Survey submitted successfully',
            'survey_id' => $survey['id'],
            'title'     => $survey['title']
        ]);
    }
}