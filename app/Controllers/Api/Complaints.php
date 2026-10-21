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

    $complaintModel
    ->where('user_id', $voter['id']);


    if (!empty($status)) {
        $complaintModel->where('status', ucfirst($status));
    }


    $complaints = $complaintModel
    ->orderBy('id', 'DESC')
    ->paginate($limit, 'default', $page);


    return $this->response->setJSON([
    'status' => true,
    'voter_id' => $voter['id'],
    'page' => $page,
    'limit' => $limit,
    'status_filter' => $status,
    'complaints' => $complaints
]);
}
}