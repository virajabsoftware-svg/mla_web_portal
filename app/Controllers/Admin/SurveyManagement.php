<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User\SurveyModel;

class SurveyManagement extends BaseController
{
    protected $surveyModel;

    public function __construct()
    {
        $this->surveyModel = new SurveyModel();
    }

    public function index()
    {
        return view('admin/SurveyManagement');
    }

    public function dashboardData()
    {
        try {

            $stats = $this->surveyModel->getSurveyStats();

            $mlaCount =
                $this->surveyModel->getMLAResponseWiseCount();

            return $this->response->setJSON([
                'status'   => true,
                'stats'    => $stats,
                'mlaCount' => $mlaCount
            ]);

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Survey Dashboard Error: ' . $e->getMessage()
            );

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Unable to load survey dashboard data.',
                    'error'   => ENVIRONMENT === 'development'
                        ? $e->getMessage()
                        : null
                ]);
        }
    }
}