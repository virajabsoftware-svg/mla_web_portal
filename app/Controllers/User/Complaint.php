<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ComplaintModel;

class Complaint extends BaseController
{

    public function index()
    {
        $model = new ComplaintModel();

        $data = [
            'complaints' => $model
                ->where('user_id',1)
                ->orderBy('id','DESC')
                ->findAll()
        ];

        return view('user/Complaint',$data);
    }


    public function save()
    {
        $model = new ComplaintModel();

        $data = [
            'user_id' => 1,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => 'Pending',
            'mla' => $this->request->getPost('mla'),
            'constituency' => $this->request->getPost('constituency')
        ];


        if($model->insert($data))
        {
            return redirect()
                ->to('user/complaint')
                ->with('success','Complaint submitted successfully');
        }
        else
        {
            print_r($model->errors());
        }
    }
}