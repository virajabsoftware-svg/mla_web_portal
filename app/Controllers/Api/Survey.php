<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User\SurveyModel;

class Survey extends BaseController
{
    public function surveyList()
    {
       $voter = $this->request->voter;

      if (!$voter) {
          return $this->respond([
              'status'  => false,
              'message' => 'Unauthorized'
          ], 401);
      }

      $surveyModel = new SurveyModel();

      $surveys = $surveyModel->getSurveyList();

      return $this->response->setJSON([
          'status' => true,
          'data'   => $surveys
      ]);
    }
}
