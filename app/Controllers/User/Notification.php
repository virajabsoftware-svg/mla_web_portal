<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Notification extends BaseController
{
    public function index()
    {
        return view('user/notification');
    }
}
