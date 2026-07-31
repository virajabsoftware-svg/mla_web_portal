<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MLAWorks extends BaseController
{
    public function index()
    {
        return view('user/mla_works');
    }
}
