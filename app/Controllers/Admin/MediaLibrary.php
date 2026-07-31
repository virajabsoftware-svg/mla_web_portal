<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MediaLibrary extends BaseController
{
    public function index()
    {
        return view('admin/MediaLibrary');
    }
}
