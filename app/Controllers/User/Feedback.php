<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Feedback extends BaseController
{
    public function index()
    {
        return view('user/Feedback');
    }
}
