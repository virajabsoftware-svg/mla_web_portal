<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MlaDevelopmentWorkModel;
use App\Models\User\DashboardModel;

class AssignedMLA extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId || !session()->get('logged_in')) {
            return redirect()->to(base_url('user/login'));
        }
        

        $dashboardModel = new DashboardModel();
        $mlaData = $dashboardModel->getAssignedMLA($userId) ?? [];

        
        $mlaId = (int) ($mlaData['mla_id'] ?? 0);
        $workModel = new MlaDevelopmentWorkModel();
        $db = db_connect();

        $stats = [
            'total_works' => $mlaId ? $workModel->getTotalWorks($mlaId) : 0,
            'completed_works' => $mlaId ? $workModel->getCompletedWorks($mlaId) : 0,
            'ongoing_works' => $mlaId ? $workModel->getOngoingWorks($mlaId) : 0,
            'pending_complaints' => 0,
            'resolved_complaints' => 0,
            'average_rating' => 0,
            'total_reviews' => 0,
            'positive_ratings' => 0,
            'positive_rating_percentage' => 0,
            'satisfaction_percentage' => 0,
            'completed_percentage' => 0,
            'ongoing_percentage' => 0,
            'resolution_percentage' => 0,
            'feedback_count' => 0,
            'survey_count' => 0,
            'active_survey_count' => 0,
            'survey_response_count' => 0,
            'active_survey_percentage' => 0,
        ];
        if ($mlaId && $db->tableExists('complaints')) {
            $stats['pending_complaints'] = $db->table('complaints')->where('mla', $mlaId)->where('status', 'Pending')->countAllResults();
            $stats['resolved_complaints'] = $db->table('complaints')->where('mla', $mlaId)->where('status', 'Resolved')->countAllResults();
        }
        if ($mlaId && $db->tableExists('mla_ratings')) {
            $rating = $db->table('mla_ratings')
                ->select('AVG(overall_rating) AS average_rating, COUNT(*) AS total_reviews, SUM(CASE WHEN overall_rating >= 4 THEN 1 ELSE 0 END) AS positive_ratings')
                ->where('mla_id', $mlaId)
                ->get()
                ->getRowArray();
            $stats['average_rating'] = round((float) ($rating['average_rating'] ?? 0), 1);
            $stats['total_reviews'] = (int) ($rating['total_reviews'] ?? 0);
            $stats['positive_ratings'] = (int) ($rating['positive_ratings'] ?? 0);
            $stats['positive_rating_percentage'] = $stats['total_reviews'] > 0
                ? (int) round(($stats['positive_ratings'] / $stats['total_reviews']) * 100)
                : 0;
            $stats['satisfaction_percentage'] = (int) round(($stats['average_rating'] / 5) * 100);
        }
        if ($mlaId && $db->tableExists('feedback')) {
            $stats['feedback_count'] = $db->table('feedback')->where('mla_id', $mlaId)->countAllResults();
        }
        if ($mlaId && $db->tableExists('surveys')) {
            $surveys = $db->table('surveys')
                ->select('COUNT(*) AS survey_count, SUM(CASE WHEN status = "Active" AND end_date >= CURDATE() THEN 1 ELSE 0 END) AS active_survey_count')
                ->where('mla_id', $mlaId)
                ->get()
                ->getRowArray();
            $stats['survey_count'] = (int) ($surveys['survey_count'] ?? 0);
            $stats['active_survey_count'] = (int) ($surveys['active_survey_count'] ?? 0);
        }
        if ($mlaId && $db->tableExists('survey_responses')) {
            $stats['survey_response_count'] = $db->table('survey_responses')->where('mla_id', $mlaId)->countAllResults();
        }
        $stats['completed_percentage'] = $stats['total_works'] > 0
            ? (int) round(($stats['completed_works'] / $stats['total_works']) * 100)
            : 0;
        $stats['ongoing_percentage'] = $stats['total_works'] > 0
            ? (int) round(($stats['ongoing_works'] / $stats['total_works']) * 100)
            : 0;
        $totalComplaints = $stats['pending_complaints'] + $stats['resolved_complaints'];
        $stats['resolution_percentage'] = $totalComplaints > 0
            ? (int) round(($stats['resolved_complaints'] / $totalComplaints) * 100)
            : 0;
        $stats['active_survey_percentage'] = $stats['survey_count'] > 0
            ? (int) round(($stats['active_survey_count'] / $stats['survey_count']) * 100)
            : 0;

        return view('user/Assigned_MLA', [
            'mla_data' => [
                'name' => $mlaData['mla_name'] ?? 'Not Assigned',
                'constituency' => $mlaData['constituency'] ?? 'Not Available',
                'mla_image' => $mlaData['mla_image'] ?? '',
                'mla_code' => $mlaData['mla_code'] ?? 'Not Available',
                'party' => $mlaData['mla_party'] ?? 'Not Available',
                'district' => $mlaData['district'] ?? 'Not Available',
            ],
            'mla_stats' => $stats,
        ]);
    }
}
