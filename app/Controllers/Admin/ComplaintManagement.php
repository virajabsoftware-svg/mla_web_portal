<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ComplaintModel;


class ComplaintManagement extends BaseController
{

    public function index()
    {

        $complaintModel = new ComplaintModel();


        $data = [

            'statistics' => 
            $complaintModel->getComplaintStatistics(),


            'mlaComplaints' =>
            $complaintModel->getMLAComplaintCount()

        ];


        return view(
            'admin/ComplaintManagement',
            $data
        );

    }

}