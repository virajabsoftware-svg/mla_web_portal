<?php

namespace App\Controllers;

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
        return view('mla');
    }
}