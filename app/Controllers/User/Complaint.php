<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Complaint extends BaseController
{
    public function index()
    {
        return view('user/Complaint');
    }
}
