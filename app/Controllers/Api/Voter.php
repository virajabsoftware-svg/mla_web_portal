<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User\VoterModel;
use App\Models\User\SurveyModel;
use App\Models\User\ComplaintModel;

class Voter extends ResourceController
{
    protected $voterModel;
    protected $surveyModel;
    protected $complaintModel;

    public function __construct()
    {
        $this->voterModel = new VoterModel();
        $this->surveyModel = new SurveyModel();
        $this->complaintModel = new ComplaintModel();
    }

    // =====================================================
    // TEST API
    // =====================================================

    public function index()
    {
        return $this->respond([
            'status'  => true,
            'message' => 'Voter API working'
        ]);
    }

    // =====================================================
    // VOTER DASHBOARD
    // =====================================================

    public function dashboard()
    {
        $voter = $this->request->voter;

        if (!$voter) {
            return $this->failUnauthorized('Unauthorized');
        }

        // Assigned MLA
        $assignedMLA = [];

        if (!empty($voter['mla_id'])) {
            $mlaModel = new \App\Models\MlaModel();

            $assignedMLA = $mlaModel
                ->select([
                    'id',
                    'mla_code',
                    'mla_name',
                    'profile_photo',
                    'party',
                    'state_id',
                    'district_id',
                    'constituency_id'
                ])
                ->where('id', $voter['mla_id'])
                ->first() ?? [];
        }

        // -------------------------------------------------
        // Dashboard Statistics
        // -------------------------------------------------

        $totalWorks = 25;
        $completedWorks = 15;
        $inProgressWorks = 7;
        $pendingWorks = 3;

        $totalComplaints = 8;
        $pendingComplaints = 3;
        $resolvedComplaints = 5;

        $activeSurveys = $this->surveyModel
            ->where('status', 'Active')
            ->countAllResults();

        $unreadNotifications = 4;

        $mlaRating = 4.5;

        return $this->respond([
            'assignedMLA'          => $assignedMLA,
            'totalWorks'           => $totalWorks,
            'completedWorks'       => $completedWorks,
            'inProgressWorks'      => $inProgressWorks,
            'pendingWorks'         => $pendingWorks,
            'totalComplaints'      => $totalComplaints,
            'pendingComplaints'    => $pendingComplaints,
            'resolvedComplaints'   => $resolvedComplaints,
            'activeSurveys'        => $activeSurveys,
            'unreadNotifications'  => $unreadNotifications,
            'mlaRating'            => $mlaRating
        ]);
    }


    public function voterProfilePhoto()
    {
        $voter = $this->request->voter;

        if (!$voter) {
            return $this->failUnauthorized('Unauthorized');
        }

        $photo = $this->request->getFile('profile_photo');
        if (!$photo) {
            return $this->respond(['status'  => false,'message' => 'Profile photo is required'], 400);
        }

        if (!$photo->isValid()) {
            return $this->respond(['status'  => false,'message' => $photo->getErrorString()], 400);
        }

        if ($photo->hasMoved()) {
            return $this->respond(['status'  => false,'message' => 'Photo already uploaded'], 400);
        }

       
        $allowed = ['jpg','jpeg','png','webp'];

        $extension = strtolower($photo->getExtension());

        if (!in_array($extension, $allowed, true)) {
            return $this->respond([
                'status'  => false,
                'message' => 'Only JPG, JPEG, PNG and WEBP images allowed'
            ], 400);
        }

       
        $uploadPath = FCPATH . 'uploads/profile/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if (!empty($voter['profile_photo']))
        {
            $oldPhoto = $uploadPath . $voter['profile_photo'];
            if (file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }
        }

       
        $photoName = $photo->getRandomName();
        $photo->move($uploadPath,$photoName);

        $updated = $this->voterModel->update($voter['id'],['profile_photo' => $photoName]);

        if (!$updated) {

            // Delete newly uploaded photo
            if (file_exists($uploadPath . $photoName)) {
                unlink($uploadPath . $photoName);
            }

            return $this->respond([
                'status'  => false,
                'message' => 'Failed to update profile photo'
            ], 500);
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Profile photo uploaded successfully',
            'data'    => [
                'profile_photo' => $photoName
            ]
        ], 200);
    }


   public function complaints()
    {
        $voter = $this->request->voter;
        if (!$voter) {
            return $this->failUnauthorized('Unauthorized');
        }

        $json = $this->request->getJSON(true);
        $status = $json['status'] ?? null;
        $limit  = (int) ($json['limit'] ?? 10);
        $offset = (int) ($json['offset'] ?? 0);

        if ($limit < 1) { $limit = 10;}
        if ($limit > 50) { $limit = 50; }
        if ($offset < 0) { $offset = 0; }

        $query = $this->complaintModel
            ->select([
                'id',
                'complaint_id',
                'village',
                'title',
                'description',
                'attachment',
                'location',
                'priority',
                'status',
                'mla',
                'created_at',
                'resolution_date'
            ]);

        if (!empty($status)) {
            $query->where('LOWER(status)', strtolower($status));
        }

        // limit + 1 se pata chalega ki aur records available hain
        $complaints = $query->orderBy('created_at', 'DESC')->findAll($limit + 1, $offset);
        $hasMore = count($complaints) > $limit;

        // Extra record remove
        if ($hasMore) {
            array_pop($complaints);
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Complaints fetched successfully',

            'data' => $complaints,

            'pagination' => [
                'limit'    => $limit,
                'offset'   => $offset,
                'has_more' => $hasMore,
                'next_offset' => $hasMore
                    ? $offset + $limit
                    : null
            ]
        ]);
    }
}