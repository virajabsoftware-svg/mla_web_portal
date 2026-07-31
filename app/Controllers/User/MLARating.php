<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MLARating extends BaseController
{
    public function index()
    {
        return view('user/mla_rating');
    }
}
