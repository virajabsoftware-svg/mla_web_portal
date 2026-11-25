<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\User\VoterModel;
use App\Models\User\ComplaintModel;
use App\Models\NotificationModel;

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
        $notificationModel = new NotificationModel();


        $complaintId = $complaintModel->generateComplaintId();


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
            'latitude'  => $data['latitude'] ?? null,
            'longitude' => $data['longitude'] ?? null,

            'status'       => 'Pending',
            'created_at'   => date('Y-m-d H:i:s')
        ];


        $complaintModel->insert($complaintData);
        $complaintDbId = $complaintModel->getInsertID();

        $notificationModel->sendNotification([
            'user_type'         => 'mla',
            'user_id'           => $complaintData['mla'],
            'title'             => 'New Complaint Received',
            'message'           => $complaintData['title'],
            'notification_type' => 'complaint',
            'reference_type'    => 'complaint',
            'reference_id'      => $complaintDbId,
        ]);

        $mlaModel = new \App\Models\MlaModel();
        $mla = $mlaModel->find($complaintData['mla']);

        if (!empty($mla['fcm_token'])) {
    try {

        $firebase = new \App\Libraries\FirebaseNotification();

        $result = $firebase->sendNotification(
    $mla['fcm_token'],
    'New Complaint Received',
    $complaintData['title'],
    [
        'type' => 'complaint',
        'complaint_id' => (string) $complaintDbId
    ]
);

log_message('info', 'Firebase Notification Sent: ' . json_encode($result));

    } catch (\Throwable $e) {
        log_message('error', 'Firebase Error: ' . $e->getMessage());
    }
}

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
$search = trim($this->request->getGet('search') ?? '');

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
    $status,
    $search
);

foreach ($complaints as &$complaint) {

    $complaint['attachment'] = !empty($complaint['attachment'])
        ? json_decode($complaint['attachment'], true)
        : [];
}

    return $this->response->setJSON([
    'status' => true,
    'voter_id' => $voter['id'],
    'page' => $page,
    'limit' => $limit,
    'status_filter' => $status ?: 'all',
    'data' => $complaints,
    'search' => $search,
]);
}

public function uploadComplaintImage($part1, $part2, $part3)
{
    $complaintId = $part1 . '/' . $part2 . '/' . $part3;
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

    $files = $this->request->getFileMultiple('image');

    if (empty($files)) {
    return $this->response->setJSON([
        'status' => false,
        'message' => 'Please select at least one image.'
    ]);
}

    $uploadedImages = [];

foreach ($files as $file) {

    if ($file->isValid() && !$file->hasMoved()) {

        $newName = $file->getRandomName();

        $file->move(ROOTPATH . 'uploads/complaint', $newName);

        $uploadedImages[] = $newName;
    }
}

$existingImages = [];

if (!empty($complaint['attachment'])) {

    $existingImages = json_decode($complaint['attachment'], true);

    if (!is_array($existingImages)) {
        $existingImages = [];
    }
}

$allImages = array_merge($existingImages, $uploadedImages);

$complaintModel->update($complaint['id'], [
    'attachment' => json_encode($allImages)
]);

return $this->response->setJSON([
    'status' => true,
    'message' => 'Images uploaded successfully.',
    'complaint_id' => $complaintId,
    'attachment' => $allImages
]);
}
}