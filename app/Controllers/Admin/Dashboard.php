<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // You can fetch data from your models here
        // Example: $data['total_mla'] = $this->model->countMla();
        
        // Sample data - replace with actual database queries
        $data = [
            'title' => 'Admin Dashboard',
            'total_mla' => 288,
            'total_voters' => 125480,
            'total_constituency' => 288,
            'total_complaint' => 1248,
            'total_surveys' => 86,
            'total_feedback' => 3485
        ];
        
        // Load the view
        return view('admin/dashboard', $data);
    }
}