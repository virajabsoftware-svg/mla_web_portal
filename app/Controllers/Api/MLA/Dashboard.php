<?php

namespace App\Controllers\Api\MLA;

use App\Controllers\BaseController;
use App\Models\MlaModel;
use App\Models\MlaDevelopmentWorkModel;
use App\Models\User\ComplaintModel;
use App\Models\User\SurveyModel;
use App\Models\User\VoterModel;

class Dashboard extends BaseController
{
    public function index()
    {
      $mlaModel = new MlaModel();
      $workModel = new MlaDevelopmentWorkModel();
      $complaintModel = new ComplaintModel();
      $surveyModel = new SurveyModel();
      $voterModel = new VoterModel();
      
    $token = $this->request->getHeaderLine('Authorization');

    if (empty($token)) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Authorization token is required.'
        ]);
    }

    $token = str_replace('Bearer ', '', $token);
    
    $mla = $mlaModel
    ->select('
        mlas.*,
        parties.party_name,
        districts.district_name,
        constituencies.constituency_name
    ')
    ->join('parties', 'parties.id = mlas.party', 'left')
    ->join('districts', 'districts.id = mlas.district_id', 'left')
    ->join('constituencies', 'constituencies.id = mlas.constituency_id', 'left')
    ->where('mlas.api_token', $token)
    ->first();

    if (!$mla) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Invalid MLA token.'
        ]);
    }

    
    $totalWorks = $workModel->getTotalWorks($mla['id']);
    $completedWorks = $workModel->getCompletedWorks($mla['id']);
    $inProgressWorks = $workModel->getInProgressWorks($mla['id']);
    $pendingWorks = $workModel->getPendingWorks($mla['id']);

    $complaintStats = $complaintModel
    ->getMLAComplaintStats($mla['id']);

    $totalComplaints = $complaintStats['total'];
    $pendingComplaints = $complaintStats['pending'];
    $resolvedComplaints = $complaintStats['resolved'];

    $totalSurveys = $surveyModel
    ->where('mla_id', $mla['id'])
    ->countAllResults();

    // $recentWorks = $workModel->getRecentWorks($mla['id']);

    $totalVoters = $voterModel
    ->where('mla_id', $mla['id'])
    ->countAllResults();
    

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'MLA Dashboard API Working',
            'mla' => [
              'id' => $mla['id'],
              'mla_code' => $mla['mla_code'],
              'name' => $mla['mla_name'],
              'party' => $mla['party_name'],
              'district' => $mla['district_name'],
              'constituency' => $mla['constituency_name'],
              'profile_photo' => $mla['profile_photo']
          ],

            'kpi' => [
            'total_works'       => $totalWorks,
            'completed_works'   => $completedWorks,
            'in_progress_works' => $inProgressWorks,
            'pending_works'     => $pendingWorks,
            'total_complaints'  => $totalComplaints,
            'pending_complaints'  => $pendingComplaints,
            'resolved_complaints' => $resolvedComplaints,
            'total_surveys'     => $totalSurveys,
            'total_voters'      => $totalVoters
          ],

        //   'recent_works' => $recentWorks,
        ]);
    }
}