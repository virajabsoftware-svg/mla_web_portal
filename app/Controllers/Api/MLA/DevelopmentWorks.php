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

    public function uploadImages()
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

        $workId = $this->request->getPost('work_id');

        if (empty($workId)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Work ID is required.'
            ]);
        }

        $workModel = new MlaDevelopmentWorkModel();

        $work = $workModel
            ->where('id', $workId)
            ->where('mla_id', $mla['id'])
            ->first();

        if (!$work) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Development work not found.'
            ]);
        }

        $files = $this->request->getFileMultiple('images');

if ($files === null || empty($files)) {
    return $this->response->setJSON([
        'status' => false,
        'message' => 'Please select at least one image.'
    ]);
}

$uploadedImages = [];

foreach ($files as $file) {

    if ($file->isValid() && !$file->hasMoved()) {

        $newName = $file->getRandomName();

        $file->move(
            FCPATH . 'uploads/development-works/',
            $newName
        );

        $uploadedImages[] = $newName;
    }
}

        $existingImages = [];

        if (!empty($work['images'])) {
            $existingImages = json_decode($work['images'], true);

            if (!is_array($existingImages)) {
                $existingImages = [];
            }
        }

        $allImages = array_merge($existingImages, $uploadedImages);

        $workModel->update($workId, [
            'images' => json_encode($allImages)
        ]);

            return $this->response->setJSON([
            'status' => true,
            'message' => 'Images uploaded successfully.',
            'images' => $allImages
        ]);
    }


    public function developmentWorkList()
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

    $page = (int) ($this->request->getGet('page') ?? 1);
$limit = (int) ($this->request->getGet('limit') ?? 20);
$status = trim($this->request->getGet('status') ?? '');
$search = trim($this->request->getGet('search') ?? '');

if ($page < 1) {
    $page = 1;
}

if ($limit < 1) {
    $limit = 20;
}

$offset = ($page - 1) * $limit;

 $workModel = new MlaDevelopmentWorkModel();

$developmentWorks = $workModel->getDevelopmentWorkList(
    $mla['id'],
    $limit,
    $offset,
    $status,
    $search
);

foreach ($developmentWorks as &$work) {

    $work['images'] = !empty($work['images'])
        ? json_decode($work['images'], true)
        : [];
}
return $this->response->setJSON([
    'status'        => true,
    'mla_id'        => $mla['id'],
    'page'          => $page,
    'limit'         => $limit,
    'status_filter' => $status ?: 'all',
    'search'        => $search,
    'data'          => $developmentWorks,
]);
}
}