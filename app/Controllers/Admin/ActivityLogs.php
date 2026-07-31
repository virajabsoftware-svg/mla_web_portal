<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ActivityLogs extends BaseController
{
    public function index()
    {
        return view('admin/ActivityLogs');
    }
}
