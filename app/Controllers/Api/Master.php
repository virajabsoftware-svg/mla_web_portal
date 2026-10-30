<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StateModel;
use App\Models\ConstituencyModel;
use App\Models\DistrictModel;
use App\Models\User\SurveyModel;
use App\Models\MlaModel;
use App\Models\PartyModel;
use App\Models\DepartmentModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\WorkStatusModel;

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

    public function party()
{
    $model = new PartyModel();

    $data = $model
        ->select(['id', 'party_name'])
        ->where('status', 'Active')
        ->orderBy('party_name', 'ASC')
        ->findAll();

    return $this->response->setJSON([
        'status'  => true,
        'message' => 'Party list fetched successfully',
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

public function constituencyMLA()
{
    $constituencyId = $this->request->getGet('constituencyId');

    if (empty($constituencyId)) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'constituencyId is required',
            'data'    => []
        ]);
    }

    $mlaModel = new MlaModel();

    $mla = $mlaModel
    ->select([
        'mlas.id',
        'mlas.mla_code',
        'mlas.mla_name',
        'parties.party_name as party',
        'mlas.profile_photo',
        'mlas.constituency_id'
    ])
    ->join('parties', 'parties.id = mlas.party', 'left')
    ->where('mlas.constituency_id', $constituencyId)
    ->where('mlas.status', 'Active')
    ->first();

    //if we want profile photo url
    if (!empty($mla['profile_photo'])) {
    $mla['profile_photo'] = base_url('uploads/mla/' . $mla['profile_photo']);
    }

    if (!$mla) {
    return $this->response->setJSON([
        'status' => false,
        'message' => 'No MLA found for this constituency.',
        'data' => []
    ]);
}

    return $this->response->setJSON([
        'status' => true,
        'message' => 'MLA fetched successfully',
        'data' => $mla
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

    public function departments()
    {
        $model = new DepartmentModel();

        $data = $model
            ->select(['id', 'department_name'])
            ->where('is_active', 1)
            ->orderBy('department_name', 'ASC')
            ->findAll();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Department list fetched successfully',
            'data'    => $data
        ]);
    }

    public function categories()
    {
        $departmentId = $this->request->getGet('department_id');

        if (empty($departmentId)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Department ID is required'
            ]);
        }

        $model = new CategoryModel();

        $data = $model
            ->select(['id', 'category_name'])
            ->where('department_id', $departmentId)
            ->where('is_active', 1)
            ->orderBy('category_name', 'ASC')
            ->findAll();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Category list fetched successfully',
            'data'    => $data
        ]);
    }

    public function subCategories()
    {
        $categoryId = $this->request->getGet('category_id');

        if (empty($categoryId)) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Category ID is required'
            ]);
        }

        $model = new SubCategoryModel();

        $data = $model
            ->select(['id', 'sub_category_name'])
            ->where('category_id', $categoryId)
            ->where('is_active', 1)
            ->orderBy('sub_category_name', 'ASC')
            ->findAll();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Sub Category list fetched successfully',
            'data'    => $data
        ]);
    }

    public function workStatuses()
    {
        $workStatusModel = new WorkStatusModel();

        $statuses = $workStatusModel->getWorkStatuses();

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Work status list fetched successfully.',
            'data'    => $statuses
        ]);
    }
}