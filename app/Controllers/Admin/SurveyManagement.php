<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SurveyModel;


class SurveyManagement extends BaseController
{

    public function index()
    {
        return view('admin/SurveyManagement');
    }



    public function dashboardData()
    {

        $model = new SurveyModel();


        $stats = $model->getSurveyStats();

        $mlaCount = $model->getMLAWiseSurveyCount();



        return $this->response->setJSON([

            "stats"=>$stats,

            "mlaCount"=>$mlaCount

        ]);

    }

}