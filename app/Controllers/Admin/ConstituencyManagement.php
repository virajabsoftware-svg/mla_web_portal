<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;
use CodeIgniter\HTTP\ResponseInterface;

class ConstituencyManagement extends BaseController
{
    protected $stateModel;
    protected $districtModel;
    protected $constituencyModel;

    public function __construct()
    {
        $this->stateModel = new StateModel();
        $this->districtModel = new DistrictModel();
        $this->constituencyModel = new ConstituencyModel();
    }

    public function index()
    {   
        $data['states'] = $this->stateModel
                            ->orderBy('state_name', 'ASC')
                            ->findAll();

        $data['districts'] = $this->districtModel
                              ->orderBy('district_name', 'ASC')
                              ->findAll();
                            
        return view('admin/ConstituencyManagement', $data);
    }

    public function getDistricts($stateId)
    {
        $districts = $this->districtModel
                        ->where('state_id', $stateId)
                        ->orderBy('district_name', 'ASC')
                        ->findAll();

        return $this->response->setJSON($districts);
    }
}
