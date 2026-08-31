<?php

namespace App\Controllers;
use App\Models\MlaModel;
class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function leadership()
    {
        return view('leadership');
    }

    public function mla()
    {
        $mlaModel = new MlaModel();

        $data['mlas'] = $mlaModel->getPublicMlas();

        return view('mla', $data);
    }

    public function mla_bkup()
    {
        $mlaModel = new MlaModel();

        $data['mlas'] = $mlaModel
            ->where('status', 'Active')
            ->orderBy('mla_name', 'ASC')
            ->findAll();

        return view('mla_bkup', $data);
    }
}
