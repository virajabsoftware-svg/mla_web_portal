<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User\VoterModel;
use App\Models\User\SurveyModel;

class Voter extends ResourceController
{
    protected $voterModel;
    protected $surveyModel;

    public function __construct()
    {
        $this->voterModel = new VoterModel();
        $this->surveyModel = new SurveyModel();
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
}