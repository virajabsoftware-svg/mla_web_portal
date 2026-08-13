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

        $data['constituencies'] = $this->constituencyModel
                    ->select('constituencies.*, states.state_name, districts.district_name')
                    ->join('states', 'states.id = constituencies.state_id')
                    ->join('districts', 'districts.id = constituencies.district_id')
                    ->orderBy('constituencies.constituency_name', 'ASC')
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

    public function save()
    {
        $data = [
            'state_id'           => $this->request->getPost('state_id'),
            'district_id'        => $this->request->getPost('district_id'),
            'constituency_name'  => $this->request->getPost('constituency_name'),
            'constituency_code'  => $this->request->getPost('constituency_code'),
            'total_villages'     => $this->request->getPost('total_villages'),
            'total_booths'       => $this->request->getPost('total_booths'),
            'status'             => $this->request->getPost('status'),
        ];

        $this->constituencyModel->insert($data);

        return redirect()->to(base_url('admin/constituency-management'))
                        ->with('success', 'Constituency added successfully.');
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Constituency ID is required.'
            ]);
        }

        $data = [
            'state_id'          => $this->request->getPost('state_id'),
            'district_id'       => $this->request->getPost('district_id'),
            'constituency_name' => $this->request->getPost('constituency_name'),
            'constituency_code' => $this->request->getPost('constituency_code'),
            'total_villages'    => $this->request->getPost('total_villages'),
            'total_booths'      => $this->request->getPost('total_booths'),
            'status'            => $this->request->getPost('status'),
        ];

        $updated = $this->constituencyModel
                        ->update($id, $data);

        if ($updated) {
            return $this->response->setJSON([
                'status' => true,
                'message' => 'Constituency updated successfully.'
            ]);
        }

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Failed to update constituency.'
        ]);
    }

    public function delete($id)
{
    if (!$id) {
        return redirect()
            ->to(base_url('admin/constituency-management'))
            ->with('error', 'Invalid constituency ID.');
    }

    $constituency = $this->constituencyModel->find($id);

    if (!$constituency) {
        return redirect()
            ->to(base_url('admin/constituency-management'))
            ->with('error', 'Constituency not found.');
    }

    $deleted = $this->constituencyModel->delete($id);

    if ($deleted) {
        return redirect()
            ->to(base_url('admin/constituency-management'))
            ->with('success', 'Constituency deleted successfully.');
    }

    return redirect()
        ->to(base_url('admin/constituency-management'))
        ->with('error', 'Failed to delete constituency.');
}
    public function getConstituency($id)
    {
        $constituency = $this->constituencyModel
            ->select('constituencies.*, states.state_name, districts.district_name')
            ->join('states', 'states.id = constituencies.state_id')
            ->join('districts', 'districts.id = constituencies.district_id')
            ->where('constituencies.id', $id)
            ->first();

        if (!$constituency) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'status' => false,
                    'message' => 'Constituency not found.'
                ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'data' => $constituency
        ]);
    }
}

