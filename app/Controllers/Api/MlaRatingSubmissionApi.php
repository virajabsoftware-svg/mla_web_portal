<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\MlaRatingSubmissionModel;

class MlaRatingSubmissionApi extends BaseController
{
    protected $ratingModel;

    public function __construct()
    {
        $this->ratingModel = new MlaRatingSubmissionModel();
    }

    public function getRatingSubmission($id)
{
    $rating = $this->ratingModel->find($id);

    if (!$rating) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Rating submission not found.'
        ]);
    }

    return $this->response->setJSON([
        'status' => true,
        'data'   => $rating
    ]);
}

public function saveRatingSubmission()
{
    $data = $this->request->getJSON(true);

    if (isset($data['data']) && is_array($data['data'])) {
    $data = $data['data'];
}

    unset(
    $data['id'],
    $data['created_at'],
    $data['updated_at'],
    $data['submitted_at']
);

// Server timestamp
$data['submitted_at'] = date('Y-m-d H:i:s');

// question_data array असेल तर JSON मध्ये convert करा
if (isset($data['question_data']) && is_array($data['question_data'])) {
    $data['question_data'] = json_encode($data['question_data'], JSON_UNESCAPED_UNICODE);
}

if (!$this->ratingModel->insert($data)) {

    return $this->response->setJSON([
        'status'  => false,
        'message' => 'Failed to save rating submission.',
        'errors'  => $this->ratingModel->errors()
    ]);
}

return $this->response->setJSON([
    'status'  => true,
    'message' => 'Rating submission saved successfully.',
    'id'      => $this->ratingModel->getInsertID()
]);

}
}