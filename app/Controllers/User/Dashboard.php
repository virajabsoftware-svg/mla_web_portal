<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\DashboardModel;
use App\Models\MlaDevelopmentWorkModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // ==========================
        // LOGIN CHECK
        // ==========================
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('user/login'));
        }

        $user_id = session()->get('user_id');

        $model = new DashboardModel();
        $mlaWorkModel = new MlaDevelopmentWorkModel();

        // ==========================
        // FETCH USER DATA
        // ==========================
        $user_data = $model->getUserProfile($user_id);

        // If user not found, logout
        if (!$user_data) {
            session()->destroy();

            return redirect()->to(base_url('user/login'));
        }

        // ==========================
        // SET SESSION VARIABLES
        // ==========================
        $session = session();

        $session->set('full_name', $user_data['full_name'] ?? 'User');
        $session->set('email', $user_data['email'] ?? '');
        $session->set('voter_id', $user_data['voter_id'] ?? 'Not Available');
        $session->set('district', $user_data['district'] ?? 'Not Available');
        $session->set('constituency', $user_data['constituency'] ?? 'Not Available');
        $session->set('role', $user_data['role'] ?? 'Voter');

        // ==========================
        // PROFILE PHOTO HANDLING
        // ==========================
        $profile_photo = $user_data['profile_photo'] ?? '';

        if (empty($profile_photo)) {

            $gender = strtolower($user_data['gender'] ?? 'male');
            $seed = $user_data['id'] ?? $user_id;

            $profile_photo =
                "https://randomuser.me/api/portraits/" .
                ($gender === 'female' ? 'women' : 'men') .
                "/" .
                ($seed % 99) .
                ".jpg";

        } else {

            // If relative path
            if (!filter_var($profile_photo, FILTER_VALIDATE_URL)) {

                $file_path = FCPATH . 'uploads/profile/' . $profile_photo;

                if (file_exists($file_path)) {

                    $profile_photo = base_url(
                        'uploads/profile/' . $profile_photo
                    );

                } else {

                    $gender = strtolower($user_data['gender'] ?? 'male');
                    $seed = $user_data['id'] ?? $user_id;

                    $profile_photo =
                        "https://randomuser.me/api/portraits/" .
                        ($gender === 'female' ? 'women' : 'men') .
                        "/" .
                        ($seed % 99) .
                        ".jpg";
                }
            }
        }

        // Save profile photo to session
        $session->set('profile_photo', $profile_photo);

        // ==========================
        // GET ASSIGNED MLA
        // ==========================
        $mla_data_from_db = $model->getAssignedMLA($user_id);

        // ==========================
        // MLA ID
        // ==========================
        $mlaId = (int) ($mla_data_from_db['mla_id'] ?? 0);

        // ==========================
        // DEFAULT WORK COUNTS
        // ==========================
        $totalWorks = 0;
        $completedWorks = 0;
        $inProgressWorks = 0;

        // ==========================
        // GET MLA DEVELOPMENT WORK COUNTS
        // ==========================
        if ($mlaId > 0) {

            $totalWorks = $mlaWorkModel->getTotalWorks($mlaId);

            $completedWorks = $mlaWorkModel->getCompletedWorks($mlaId);

            $inProgressWorks = $mlaWorkModel->getInProgressWorks($mlaId);
        }

        // ==========================
        // PREPARE MLA DATA
        // ==========================
        if (
            !empty($mla_data_from_db) &&
            !empty($mla_data_from_db['mla_name'])
        ) {

            // Get complete MLA details
            $mla_complete = $model->getCompleteMLADetails($mlaId);

            if ($mla_complete) {

                $mla_data = $mla_complete;

            } else {

                $mla_data = [
                    'name' => $mla_data_from_db['mla_name'] ?? 'Not Assigned',

                    'constituency' =>
                        $mla_data_from_db['constituency']
                        ?? $user_data['district']
                        ?? 'Not Available',

                    'rating' => '0★',

                    'credibility' => '0%',

                    'image' =>
                        'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max'
                ];
            }

        } else {

            // No MLA assigned
            $mla_data = [
                'name' => '',

                'constituency' => '',

                'rating' => '0★',

                'credibility' => '0%',

                'image' =>
                    'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max'
            ];
        }

        // ==========================
        // IMPORTANT
        // ALWAYS USE DATABASE WORK COUNTS
        // ==========================
        $mla_data['total_works'] = $totalWorks;

        $mla_data['completed_works'] = $completedWorks;

        $mla_data['in_progress_works'] = $inProgressWorks;

        // ==========================
        // MLA IMAGE
        // ==========================
        $mla_data['mla_image'] =
            $mla_data['image']
            ?? $mla_data['mla_image']
            ?? 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max';

        // ==========================
        // GET RECENT COMPLAINTS
        // ==========================
        $recent_complaints = $model->recentComplaints($user_id);

        foreach ($recent_complaints as &$complaint) {

            $status_classes = [
                'resolved' => 'success',
                'in_progress' => 'info',
                'pending' => 'warning',
                'rejected' => 'danger'
            ];

            $status = strtolower(
                $complaint['status'] ?? 'pending'
            );

            $complaint['status_class'] =
                $status_classes[$status] ?? 'warning';
        }

        unset($complaint);

        // ==========================
        // GET ACTIVE SURVEYS
        // ==========================
        $active_surveys = $model->recentSurveys();

        foreach ($active_surveys as &$survey) {

            $survey['title'] =
                $survey['title'] ?? 'Survey';

            $survey['days_left'] =
                $survey['days_left'] ?? 5;
        }

        unset($survey);

        // ==========================
        // FEEDBACK COUNT
        // ==========================
        $totalFeedbacks =
            $model->getFeedbacksGiven($user_id);

        // ==========================
        // SURVEY PARTICIPATION COUNT
        // ==========================
        $totalSurveysParticipated =
            $model->getSurveysParticipated($user_id);

        // ==========================
        // TOTAL COMPLAINTS
        // ==========================
        $totalComplaints =
            $model->totalComplaints($user_id);

        // ==========================
        // PROFILE COMPLETION
        // ==========================
        $profileCompletion =
            $model->profileCompletion($user_id);

        // ==========================
        // PREPARE DATA FOR VIEW
        // ==========================
        $data = [

            // ==========================
            // USER DETAILS
            // ==========================
            'user_name' =>
                session()->get('full_name'),

            'user_email' =>
                session()->get('email'),

            'user_image' =>
                session()->get('profile_photo'),

            'voter_id' =>
                session()->get('voter_id'),

            'district' =>
                session()->get('district'),

            'booth' =>
                $user_data['booth']
                ?? $user_data['locality']
                ?? 'Not Available',

            'mla_constituency' =>
                $user_data['constituency_name']
                ?? $user_data['constituency']
                ?? session()->get('district'),

            // ==========================
            // PROFILE
            // ==========================
            'profile_completion' =>
                $profileCompletion,

            // ==========================
            // MLA DATA
            // ==========================
            'mla_data' =>
                $mla_data,

            // ==========================
            // KPI CARDS
            // ==========================
            'kpi_data' => [

                // Dynamic
                'total_works' =>
                    $totalWorks,

                // Dynamic
                'completed' =>
                    $completedWorks,

                // Dynamic
                'in_progress' =>
                    $inProgressWorks,

                // Existing
                'feedbacks' =>
                    $totalFeedbacks,

                // Existing
                'complaints' =>
                    $totalComplaints,

                // Existing
                'surveys' =>
                    $totalSurveysParticipated,
            ],

            // ==========================
            // STATIC RECENT WORKS
            // ==========================
            'recent_works' => [

                [
                    'title' => 'Road Construction',
                    'category' => 'Infrastructure',
                    'status' => 'Completed',
                    'status_class' => 'success',
                    'progress' => 100
                ],

                [
                    'title' => 'School Building',
                    'category' => 'Education',
                    'status' => 'In Progress',
                    'status_class' => 'warning',
                    'progress' => 75
                ],

                [
                    'title' => 'Water Supply',
                    'category' => 'Utilities',
                    'status' => 'Pending',
                    'status_class' => 'info',
                    'progress' => 30
                ],

                [
                    'title' => 'Hospital Renovation',
                    'category' => 'Healthcare',
                    'status' => 'Completed',
                    'status_class' => 'success',
                    'progress' => 100
                ],

                [
                    'title' => 'Street Lighting',
                    'category' => 'Infrastructure',
                    'status' => 'In Progress',
                    'status_class' => 'warning',
                    'progress' => 60
                ]
            ],

            // ==========================
            // DYNAMIC COMPLAINTS
            // ==========================
            'recent_complaints' =>
                $recent_complaints,

            // ==========================
            // DYNAMIC SURVEYS
            // ==========================
            'active_surveys' =>
                $active_surveys,

            // ==========================
            // STATIC NOTIFICATIONS
            // ==========================
            'notifications' => [

                [
                    'message' => 'New survey available',
                    'time' => '2 hours ago'
                ],

                [
                    'message' => 'Your complaint has been resolved',
                    'time' => '5 hours ago'
                ],

                [
                    'message' => 'MLA visited your locality',
                    'time' => '1 day ago'
                ],

                [
                    'message' => 'New development work started',
                    'time' => '2 days ago'
                ],

                [
                    'message' => 'Feedback requested for completed work',
                    'time' => '3 days ago'
                ]
            ],

            'notification_count' => 3,
        ];

        // ==========================
        // LOAD DASHBOARD VIEW
        // ==========================
        return view('user/dashboard', $data);
    }
}