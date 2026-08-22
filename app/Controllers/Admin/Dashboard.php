<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DashboardModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new DashboardModel();

        // Get dynamic dashboard statistics
        $stats = $model->getDashboardStats();

        $data = [
            'title' => 'Dashboard',

            // Dynamic values
            'total_voters'     => $stats['total_voters'],
            'total_complaints' => $stats['total_complaints'],
            'total_feedback'   => $stats['total_feedback'],
            'total_surveys'    => $stats['total_surveys'],
            'total_mla'            => $stats['total_mla'],
            'total_constituency'   => $stats['total_constituency'],
        ];

        return view('admin/dashboard', $data);
    }
}