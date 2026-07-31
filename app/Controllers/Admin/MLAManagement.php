<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MLAManagement extends BaseController
{
    public function index()
    {
        return view('admin/MLAManagement');
    }
}
