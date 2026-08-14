<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\ComplaintModel;
use App\Models\User\VoterModel;

class Complaint extends BaseController
{
    /**
     * Complaint Page
     */
   public function index()
{
    $userId = session()->get('user_id');

    if (!$userId) {
        return redirect()->to('/login');
    }

    $voterModel = new \App\Models\User\VoterModel();
    $complaintModel = new ComplaintModel();

    // Get logged-in voter
    $voter = $voterModel
        ->where('id', $userId)
        ->first();

    if (!$voter) {
        return redirect()->back()->with('error', 'Voter information not found.');
    }

    $voterId = $voter['voter_id'] ?? '';
    $mlaId = $voter['mla_id'] ?? '';
    $district = $voter['district'] ?? '';
    $constituency = $voter['constituency'] ?? '';

    // Get user's complaints
    $complaints = $complaintModel
        ->where('voter_id', $voterId)
        ->orderBy('id', 'DESC')
        ->findAll();

    // Counts
    $totalComplaints = $complaintModel
        ->where('voter_id', $voterId)
        ->countAllResults();

    $pendingComplaints = $complaintModel
        ->where('voter_id', $voterId)
        ->where('status', 'Pending')
        ->countAllResults();

    $resolvedComplaints = $complaintModel
        ->where('voter_id', $voterId)
        ->where('status', 'Resolved')
        ->countAllResults();

    $escalatedComplaints = $complaintModel
        ->where('voter_id', $voterId)
        ->where('status', 'Escalated')
        ->countAllResults();

    $data = [
        'voter_id' => $voterId,
        'mla_id' => $mlaId,
        'district' => $district,
        'constituency' => $constituency,

        'complaints' => $complaints,

        'totalComplaints' => $totalComplaints,
        'pendingComplaints' => $pendingComplaints,
        'resolvedComplaints' => $resolvedComplaints,
        'escalatedComplaints' => $escalatedComplaints,
    ];

    return view('user/Complaint', $data);
}


    /**
     * Save Complaint
     */
    public function save()
    {
        $complaintModel = new ComplaintModel();
        $userModel = new UserModel();

        // Get logged-in user
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()
                ->to(base_url('user/login'))
                ->with('error', 'Please login first');
        }

        // Get actual voter from voters table
        $voter = $userModel
            ->where('id', $userId)
            ->first();

        if (!$voter) {
            return redirect()
                ->back()
                ->with('error', 'Voter details not found');
        }

        /*
        |--------------------------------------------------------------------------
        | Automatic Voter Information
        |--------------------------------------------------------------------------
        */

        $voterId = $voter['voter_id'];
        $district = $voter['district'];
        $constituency = $voter['constituency'];
        $mlaId = $voter['mla_id'] ?? '';
        $mlaName = $voter['mla_name'] ?? '';


        /*
        |--------------------------------------------------------------------------
        | Generate Complaint ID
        |--------------------------------------------------------------------------
        |
        | Example:
        | CMP-VOT1785949798-001
        | CMP-VOT1785949798-002
        |
        */

        $complaintId = $complaintModel->generateComplaintId($voterId);


        /*
        |--------------------------------------------------------------------------
        | Complaint Data
        |--------------------------------------------------------------------------
        */

        $data = [

            // Automatic
            'complaint_id' => $complaintId,
            'user_id' => $userId,
            'voter_id' => $voterId,
            'district' => $district,

            // User entered
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),

            // Automatic MLA information
            'mla' => !empty($mlaName) ? $mlaName : $mlaId,
            'constituency' => $constituency,

            // Default
            'status' => 'Pending'
        ];


        if ($complaintModel->insert($data)) {

            return redirect()
                ->to(base_url('user/complaint'))
                ->with(
                    'success',
                    'Complaint submitted successfully'
                );
        }


        return redirect()
            ->back()
            ->withInput()
            ->with(
                'error',
                implode('<br>', $complaintModel->errors())
            );
    }
}