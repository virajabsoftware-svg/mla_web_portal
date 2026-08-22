<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User\ComplaintModel;

class ComplaintManagement extends BaseController
{
    public function index()
    {
        $complaintModel = new ComplaintModel();

        // Get statistics
        $statistics = $complaintModel->getComplaintStatistics();

        // Get MLA-wise complaint counts
        $mlaComplaints = $complaintModel->getMLAComplaintCount();

        $data = [
            'statistics' => $statistics,
            'mlaComplaints' => $mlaComplaints
        ];

        return view('admin/ComplaintManagement', $data);
    }
}