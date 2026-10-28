<?php

namespace App\Controllers\Api\MLA;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\User\ComplaintModel;
use App\Models\ComplaintReplyModel;

class Complaints extends BaseController
{
    public function complaintList()
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

    $complaintModel = new ComplaintModel();

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

    $complaints = $complaintModel->getComplaintListByMLA(
    $mla['id'],
    $limit,
    $offset,
    $status,
    $search
);

    return $this->response->setJSON([
    'status'        => true,
    'page'          => $page,
    'limit'         => $limit,
    'status_filter' => $status ?: 'all',
    'data'          => $complaints,
    'search' => $search,
]);
}

public function reply($complaintId)
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

    $complaintModel = new ComplaintModel();

    $complaint = $complaintModel
        ->where('complaint_id', $complaintId)
        ->where('mla', $mla['id'])
        ->first();

    if (!$complaint) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Complaint not found or access denied.'
        ]);
    } 
   
    $data = $this->request->getJSON(true);

    if (empty($data['message'])) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Reply message is required.'
        ]);
    }

    $replyModel = new ComplaintReplyModel();

    $replyModel->insert([
        'complaint_id'  => $complaint['complaint_id'],
        'mla_id'        => $mla['id'],
        'reply_message' => $data['message']
    ]);

    return $this->response->setJSON([
        'status' => true,
        'message' => 'Reply submitted successfully',
        'complaint_id' => $complaint['complaint_id']
    ]);
}

public function updateStatus($complaintId)
{
    $mlaModel = new MlaModel();

    // =========================
    // MLA Token Verify
    // =========================

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


    // =========================
    // Get Request Data
    // =========================

    $data = $this->request->getJSON(true);

    $status = trim($data['status'] ?? '');


    if (empty($status)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Status is required.'
        ]);
    }


    // =========================
    // Status Validation
    // =========================

    $allowedStatus = [
        'Pending',
        'Resolved'
    ];

    if (!in_array($status, $allowedStatus)) {

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid status value.'
        ]);
    }


    // =========================
    // Check Complaint
    // =========================

    $complaintModel = new ComplaintModel();

    $complaint = $complaintModel
        ->where('complaint_id', $complaintId)
        ->where('mla', $mla['id'])
        ->first();


    if (!$complaint) {

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Complaint not found or access denied.'
        ]);
    }


    // =========================
    // Update Status
    // =========================

    $updated = $complaintModel->update(
        $complaint['id'],
        [
            'status' => $status
        ]
    );


    if (!$updated) {

        return $this->response->setJSON([
            'status' => false,
            'message' => 'Failed to update complaint status.'
        ]);
    }


    return $this->response->setJSON([
        'status' => true,
        'message' => 'Complaint status updated successfully.',
        'complaint_id' => $complaintId,
        'new_status' => $status
    ]);
}
}