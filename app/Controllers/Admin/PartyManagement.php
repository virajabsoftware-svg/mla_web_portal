<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PartyManagement extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [];

        // States
        $data['states'] = $this->db
            ->table('states')
            ->select('id, state_name')
            ->orderBy('state_name', 'ASC')
            ->get()
            ->getResultArray();

        return view('admin/party-management', $data);
    }
}