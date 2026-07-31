<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MyProfile extends BaseController
{
    public function index()
    {
        return view('user/my_profile');
    }
}
