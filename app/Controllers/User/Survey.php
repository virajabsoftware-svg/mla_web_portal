<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Survey extends BaseController
{
    public function index()
    {
        return view('user/survey');
    }
}
