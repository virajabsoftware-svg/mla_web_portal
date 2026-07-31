<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FeedbackDashboard extends BaseController
{
    public function index()
    {
        return view('admin/FeedbackDashboard');
    }
}
