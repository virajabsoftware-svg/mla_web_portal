<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class MlaWorkReport extends BaseController
{
    public function index()
    {
        return view('admin/MlaWorkReport');
    }
}