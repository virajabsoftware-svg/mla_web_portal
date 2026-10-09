<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StateModel;
use App\Models\ConstituencyModel;
use App\Models\DistrictModel;
use App\Models\User\SurveyModel;


class Master extends ResourceController
{
    public function index()
    {
        return $this->response->setJSON([
            'status' => true,
            'message' => 'Master API working'
        ]);
    }


    public function state()
    {
        $model = new StateModel();
        $data = $model->select(['id','state_name'])->orderBy('state_name', 'ASC')->findAll();
        return $this->response->setJSON([
            'status'  => true,
            'message' => 'State list fetched successfully',
            'data'    => $data
        ]);
    }

    public function district()
{
    $model = new DistrictModel();

    // Read state_id from the GET query parameter
    $stateId = $this->request->getGet('state_id');

    if (empty($stateId)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'state_id is required',
            'data'    => []
        ]);
    }

    $data = $model
        ->select(['id', 'state_id', 'district_name'])
        ->where('state_id', $stateId)
        ->orderBy('district_name', 'ASC')
        ->findAll();

    return $this->response->setJSON([
        'status'  => true,
        'message' => 'District list fetched successfully',
        'data'    => $data
    ]);
}

    public function constituency()
{
    $model = new ConstituencyModel();

    // Read parameters from GET query string
    $stateId = $this->request->getGet('state_id');
    $districtId = $this->request->getGet('district_id');

    if (empty($stateId) || empty($districtId)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'state_id and district_id are required',
            'data'    => []
        ]);
    }

    $data = $model
        ->select([
            'id',
            'state_id',
            'district_id',
            'constituency_name',
            'constituency_code',
            'total_villages',
            'total_booths',
            'status'
        ])
        ->where('state_id', $stateId)
        ->where('district_id', $districtId)
        ->where('status', 'Active')
        ->orderBy('constituency_name', 'ASC')
        ->findAll();

    return $this->response->setJSON([
        'status'  => true,
        'message' => 'Constituency list fetched successfully',
        'data'    => $data
    ]);
}


    public function surveyCategories()
    {
        $model = new SurveyModel();       

        $data = $model->select('title,id')->where('status', 'Active')
            ->where('title IS NOT NULL')->where('title !=', '')
            ->groupBy('title')->orderBy('title', 'ASC')->findAll();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Survey categories fetched successfully',
            'data'    => $data
        ]);
    }
}