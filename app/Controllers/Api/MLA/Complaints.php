<?php

namespace App\Controllers\Api\MLA;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\User\ComplaintModel;
use App\Models\ComplaintReplyModel;

class Complaints extends BaseController
{
    public function recentComplaints()
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

    $recentComplaints = $complaintModel->getRecentComplaintsByMLA($mla['id']);

    return $this->response->setJSON([
    'status' => true,
    'mla_id' => $mla['id'],
    'recent_complaints' => $recentComplaints
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
}