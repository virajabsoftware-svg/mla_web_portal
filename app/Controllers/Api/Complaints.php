<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User\VoterModel;
use App\Models\User\ComplaintModel;

class Complaints extends BaseController
{
    public function addComplaint()
    {
      $voterModel = new VoterModel();

      $token = $this->request->getHeaderLine('Authorization');

      if (empty($token)) {
          return $this->response->setJSON([
              'status' => false,
              'message' => 'Authorization token is required.'
          ]);
      }

      $token = str_replace('Bearer ', '', $token);

      $voter = $voterModel
          ->where('api_token', $token)
          ->first();


      if (!$voter) {
          return $this->response->setJSON([
              'status' => false,
              'message' => 'Invalid voter token.'
          ]);
      } 

        $data = $this->request->getJSON(true);

        $complaintModel = new ComplaintModel();

        $complaintId = $complaintModel
            ->generateComplaintId($voter['id']);


        $complaintData = [
            'complaint_id' => $complaintId,
            'user_id'      => $voter['id'],
            'voter_id'     => $voter['voter_id'],

            'title'        => $data['title'] ?? null,
            'description'  => $data['description'] ?? null,
            'location'     => $data['location'] ?? null,
            'village'      => $data['village'] ?? null,
            'priority'     => $data['priority'] ?? 'Medium',
            'district'     => $voter['district'],
            'constituency' => $voter['constituency'],
            'mla'          => $voter['mla_id'],

            'status'       => 'Pending',
            'created_at'   => date('Y-m-d H:i:s')
        ];


        $complaintModel->insert($complaintData);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Complaint submitted successfully',
            'complaint_id' => $complaintId
        ]);
        
    }

    public function complaintList()
{
    $voterModel = new VoterModel();

    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token required'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);


    $voter = $voterModel
        ->where('api_token', $token)
        ->first();


    if (!$voter) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid voter token'
        ]);
    }


    $complaintModel = new ComplaintModel();
    $page = $this->request->getGet('page') ?? 1;

    $limit = $this->request->getGet('limit') ?? 20;

    $status = $this->request->getGet('status');

    $offset = ($page - 1) * $limit;

$status = strtolower(trim($status ?? ''));

$statusMap = [
    'pending'     => 'Pending',
    // 'in_progress' => 'In Progress',
    'resolved'    => 'Resolved'
];

if (!empty($status) && isset($statusMap[$status])) {
    $status = $statusMap[$status];
}

$complaints = $complaintModel->getComplaintListByVoter(
    $voter['id'],
    $limit,
    $offset,
    $status
);


    return $this->response->setJSON([
    'status' => true,
    'voter_id' => $voter['id'],
    'page' => $page,
    'limit' => $limit,
    'status_filter' => $status ?: 'all',
    'complaints' => $complaints
]);
}

public function uploadComplaintImage($complaintId)
{
    $voterModel = new VoterModel();

    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token is required.'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);

    $voter = $voterModel
        ->where('api_token', $token)
        ->first();

    if (!$voter) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid voter token.'
        ]);
    }

    $complaintModel = new ComplaintModel();

    $complaint = $complaintModel
        ->where('complaint_id', $complaintId)
        ->where('user_id', $voter['id'])
        ->first();

    if (!$complaint) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Complaint not found or access denied.'
        ]);
    }

    $image = $this->request->getFile('image');

    if (!$image || !$image->isValid()) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Please select a valid image.'
        ]);
    }

    $fileName = $complaintId . '_' . time() . '.' . $image->getExtension();

    $image->move(FCPATH . 'uploads/complaints', $fileName);

    $complaintModel->update($complaint['id'], [
        'attachment' => $fileName
    ]);

    return $this->response->setJSON([
        'status' => true,
        'message' => 'Image uploaded successfully',
        'complaint_id' => $complaintId,
        'attachment' => $fileName
    ]);
}
}