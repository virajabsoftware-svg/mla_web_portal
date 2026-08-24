<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
class AuthApi extends ResourceController
{
    public function test()
    {
        return $this->respond([
            'status' => true,
            'message' => 'API working'
        ]);
    }

    public function login()
    {
        return $this->respond([
            'status' => true,
            'message' => 'Login API working'
        ]);
    }
}