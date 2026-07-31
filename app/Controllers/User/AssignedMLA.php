<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AssignedMLA extends BaseController
{
    public function index()
    {
         return view('user/Assigned_MLA');
    }
}
