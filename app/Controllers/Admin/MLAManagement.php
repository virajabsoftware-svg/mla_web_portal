<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MlaModel;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\ConstituencyModel;

class MLAManagement extends BaseController
{
    protected $mlaModel; 
    protected $stateModel;
    protected $districtModel;
    protected $constituencyModel;

    public function __construct()
    {
        $this->mlaModel = new MlaModel();
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
            ->orderBy('constituency_name', 'ASC')
            ->findAll();

        $data['mlas'] = $this->mlaModel
        ->select('
            mlas.*,
            states.state_name,
            districts.district_name,
            constituencies.constituency_name
        ')
        ->join('states', 'states.id = mlas.state_id')
        ->join('districts', 'districts.id = mlas.district_id')
        ->join('constituencies', 'constituencies.id = mlas.constituency_id')
        ->orderBy('mlas.id', 'DESC')
        ->findAll();

        return view('admin/MLAManagement', $data);
    }

    public function save()
{
    $mlaModel = new MlaModel();

    // Profile Photo
    $photo = $this->request->getFile('profile_photo');

    $photoName = '';

    if ($photo && $photo->isValid() && !$photo->hasMoved()) {

        $photoName = $photo->getRandomName();

        $photo->move(FCPATH . 'uploads/mla/', $photoName);
    }

    // Generate MLA Code
    $lastMla = $mlaModel->orderBy('id', 'DESC')->first();

    if ($lastMla) {
        $mlaCode = $lastMla['mla_code'] + 1;
    } else {
        $mlaCode = 1001;
    }

    // Save Data
    $mlaModel->insert([

        'mla_code'         => $mlaCode,
        'mla_name'         => $this->request->getPost('mla_name'),
        'profile_photo'    => $photoName,
        'mobile'           => $this->request->getPost('mobile'),
        'email'            => $this->request->getPost('email'),
        'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'gender'           => $this->request->getPost('gender'),
        'party'            => $this->request->getPost('party'),
        'state_id'         => $this->request->getPost('state_id'),
        'district_id'      => $this->request->getPost('district_id'),
        'constituency_id'  => $this->request->getPost('constituency_id'),
        'address'          => $this->request->getPost('address'),
        'pincode'          => $this->request->getPost('pincode'),
        'aadhaar'          => $this->request->getPost('aadhaar'),
        'joining_date'     => $this->request->getPost('joining_date'),
        'status'           => $this->request->getPost('status')

    ]);

    return redirect()->to(base_url('admin/mla-management'))
                     ->with('success', 'MLA added successfully.');
}


public function get($id)
{
    $mla = $this->mlaModel
        ->select('
            mlas.*,
            states.state_name,
            districts.district_name,
            constituencies.constituency_name
        ')
        ->join('states', 'states.id = mlas.state_id')
        ->join('districts', 'districts.id = mlas.district_id')
        ->join('constituencies', 'constituencies.id = mlas.constituency_id')
        ->where('mlas.id', $id)
        ->first();

    if ($mla) {

        return $this->response->setJSON([
            'status' => true,
            'data' => $mla
        ]);

    }

    return $this->response->setJSON([
        'status' => false,
        'message' => 'MLA not found.'
    ]);
}  
    
    public function update()
    {
        $id = $this->request->getPost('id');

        $data = [
            'mla_name'         => $this->request->getPost('mla_name'),
            'mobile'           => $this->request->getPost('mobile'),
            'email'            => $this->request->getPost('email'),
            'gender'           => $this->request->getPost('gender'),
            'party'            => $this->request->getPost('party'),
            'state_id'         => $this->request->getPost('state_id'),
            'district_id'      => $this->request->getPost('district_id'),
            'constituency_id'  => $this->request->getPost('constituency_id'),
            'address'          => $this->request->getPost('address'),
            'pincode'          => $this->request->getPost('pincode'),
            'aadhaar'          => $this->request->getPost('aadhaar'),
            'joining_date'     => $this->request->getPost('joining_date'),
            'status'           => $this->request->getPost('status'),
        ];

        $password = $this->request->getPost('password');

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $photo = $this->request->getFile('profile_photo');

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {

            $newName = $photo->getRandomName();

            $photo->move(FCPATH . 'uploads/mla', $newName);

            $data['profile_photo'] = $newName;
        }

        $this->mlaModel->update($id, $data);

        return redirect()->to(base_url('admin/mla-management'))
                        ->with('success', 'MLA updated successfully.');
    }   

    public function delete($id)
{
    $mla = $this->mlaModel->find($id);

    if (!$mla) {

        return redirect()
            ->to(base_url('admin/mla-management'))
            ->with('error', 'MLA not found.');

    }

    // Delete profile photo if exists
    if (
    !empty($mla['profile_photo']) &&
    $mla['profile_photo'] != 'default-user.png'
) {

    $photoPath = FCPATH . 'uploads/mla/' . $mla['profile_photo'];

    if (file_exists($photoPath)) {
        unlink($photoPath);
    }
}

    $this->mlaModel->delete($id);

    return redirect()
        ->to(base_url('admin/mla-management'))
        ->with('success', 'MLA deleted successfully.');
}


    public function getConstituencies($districtId)
    {
        $constituencies = $this->constituencyModel
            ->where('district_id', $districtId)
            ->orderBy('constituency_name', 'ASC')
            ->findAll();

        return $this->response->setJSON($constituencies);
    }
}
