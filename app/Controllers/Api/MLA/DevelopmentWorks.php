<?php

namespace App\Controllers\Api\MLA;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\MlaDevelopmentWorkModel;

class DevelopmentWorks extends BaseController
{
    public function addDevelopmentWork()
    {
        $mlaModel = new MlaModel();

        $token = $this->request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Authorization token is required.'
            ]);
        }

        $token = str_replace('Bearer ', '', $token);

        $mla = $mlaModel
            ->where('api_token', $token)
            ->first();

        if (!$mla) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid MLA token.'
            ]);
        }

        $data = $this->request->getJSON(true);

    if (!$data) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid JSON data'
        ]);
    }

    $workTitle = trim($data['work_title'] ?? '');
    $departmentId = $data['department_id'] ?? '';
    $categoryId = $data['category_id'] ?? '';
    $subcategoryId = $data['subcategory_id'] ?? '';
    $workDescription = trim($data['work_description'] ?? '');
    $districtId = $data['district_id'] ?? '';
    $constituencyId = $data['constituency_id'] ?? '';
    $village = trim($data['village'] ?? '');
    $pincode = trim($data['pincode'] ?? '');
    $totalAmount = $data['total_amount'] ?? '';
    $startDate = $data['start_date'] ?? '';
    $expectedCompletionDate = $data['expected_completion_date'] ?? '';
    $contractorName = trim($data['contractor_name'] ?? '');
    $remarks = trim($data['remarks'] ?? '');

    if (
        empty($workTitle) ||
        empty($departmentId) ||
        empty($categoryId) ||
        empty($subcategoryId) ||
        empty($districtId) ||
        empty($constituencyId) ||
        empty($village) ||
        empty($pincode) ||
        empty($totalAmount) ||
        empty($startDate) ||
        empty($expectedCompletionDate)
    ) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Required fields are missing.'
        ]);
    }

    $workModel = new MlaDevelopmentWorkModel();

    $workCode = $workModel->generateWorkCode($mla['id']);

    $insertData = [
    'mla_id'                     => $mla['id'],
    'work_code'                  => $workCode,
    'work_title'                 => $workTitle,
    'department_id'              => $departmentId,
    'category_id'                => $categoryId,
    'subcategory_id'             => $subcategoryId,
    'work_description'           => $workDescription,
    'district_id'                => $districtId,
    'constituency_id'            => $constituencyId,
    'village'                    => $village,
    'pincode'                    => $pincode,
    'total_amount'               => $totalAmount,
    'used_amount'                => 0,
    'remaining_amount'           => $totalAmount,
    'physical_progress'          => 0,
    'financial_progress'         => 0,
    'start_date'                 => $startDate,
    'expected_completion_date'   => $expectedCompletionDate,
    'actual_completion_date'     => null,
    'status_id'                  => 1,
    'contractor_name'            => $contractorName,
    'remarks'                    => $remarks,
    'images'                     => null
];

    $workModel->insert($insertData);

    $workId = $workModel->getInsertID();
    if (!$workId) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Failed to add development work.'
        ]);
    }

  $work = $workModel
    ->select('
        mla_developmentworks.*,
        departments.department_name,
        categories.category_name,
        sub_categories.sub_category_name,
        districts.district_name,
        constituencies.constituency_name,
        mla_work_statuses.status_name
    ')
    ->join('departments', 'departments.id = mla_developmentworks.department_id', 'left')
    ->join('categories', 'categories.id = mla_developmentworks.category_id', 'left')
    ->join('sub_categories', 'sub_categories.id = mla_developmentworks.subcategory_id', 'left')
    ->join('districts', 'districts.id = mla_developmentworks.district_id', 'left')
    ->join('constituencies', 'constituencies.id = mla_developmentworks.constituency_id', 'left')
    ->join('mla_work_statuses', 'mla_work_statuses.id = mla_developmentworks.status_id', 'left')
    ->where('mla_developmentworks.id', $workId)
    ->first();

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Development work added successfully.',
            'data' => $work
        ]);
    }


    public function recentWorks()
{
    $mlaModel = new MlaModel();

    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token is required.'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);


    $mla = $mlaModel
        ->where('api_token', $token)
        ->first();

    if (!$mla) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid MLA token.'
        ]);
    }


    $workModel = new MlaDevelopmentWorkModel();

    $recentWorks = $workModel->getRecentWorks($mla['id']);


  return $this->response->setJSON([
      'status' => true,
      'mla_id' => $mla['id'],
      'recent_works' => $recentWorks
  ]);
}
}