<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\DashboardModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Login Check
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('user/login'));
        }

        $user_id = session()->get('user_id');
        $model = new DashboardModel();

        // ==========================
        // FETCH USER DATA FROM DATABASE
        // ==========================
        $user_data = $model->getUserProfile($user_id);

        // If user not found, logout
        if (!$user_data) {
            session()->destroy();
            return redirect()->to(base_url('user/login'));
        }

        // ==========================
        // SET SESSION VARIABLES FROM DATABASE
        // ==========================
        $session = session();
        $session->set('full_name', $user_data['full_name'] ?? 'User');
        $session->set('email', $user_data['email'] ?? '');
        $session->set('voter_id', $user_data['voter_id'] ?? 'Not Available');
        $session->set('district', $user_data['district'] ?? 'Not Available');
        $session->set('constituency', $user_data['constituency'] ?? 'Not Available');
        $session->set('role', $user_data['role'] ?? 'Voter');

        // ==========================
        // FIX: PROFILE PHOTO HANDLING
        // ==========================
        $profile_photo = $user_data['profile_photo'] ?? '';

        // If no profile photo in database, generate a default
        if (empty($profile_photo)) {
            // Generate default based on gender
            $gender = $user_data['gender'] ?? 'male';
            $seed = $user_data['id'] ?? $user_id;
            $profile_photo = "https://randomuser.me/api/portraits/" . 
                ($gender === 'female' ? 'women' : 'men') . 
                "/" . ($seed % 99) . ".jpg";
        } else {
            // If it's a relative path, convert to full URL
            if (!filter_var($profile_photo, FILTER_VALIDATE_URL)) {
                // Check if file exists in uploads folder
                $file_path = FCPATH . 'uploads/profile/' . $profile_photo;
                if (file_exists($file_path)) {
                    $profile_photo = base_url('uploads/profile/' . $profile_photo);
                } else {
                    // File doesn't exist, use default
                    $gender = $user_data['gender'] ?? 'male';
                    $seed = $user_data['id'] ?? $user_id;
                    $profile_photo = "https://randomuser.me/api/portraits/" . 
                        ($gender === 'female' ? 'women' : 'men') . 
                        "/" . ($seed % 99) . ".jpg";
                }
            }
        }

        // Save profile photo to session
        $session->set('profile_photo', $profile_photo);

        // ==========================
        // GET MLA DATA
        // ==========================
        $mla_data_from_db = $model->getAssignedMLA($user_id);

        // Prepare MLA data with image
        if (!empty($mla_data_from_db) && !empty($mla_data_from_db['mla_name'])) {
            // Get full MLA details including image
            $mla_complete = $model->getCompleteMLADetails($mla_data_from_db['mla_id'] ?? 0);
            
            if ($mla_complete) {
                $mla_data = $mla_complete;
            } else {
                $mla_data = [
                    'name' => $mla_data_from_db['mla_name'] ?? 'Not Assigned',
                    'constituency' => $mla_data_from_db['constituency'] ?? $user_data['district'] ?? 'Not Available',
                    'total_works' => 0,
                    'completed_works' => 0,
                    'rating' => '0★',
                    'credibility' => '0%',
                    'image' => 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max'
                ];
            }
        } else {
            // Fallback static MLA data
            $mla_data = [
                'name' => 'Chh. Shivendrasinh Bhosale',
                'constituency' => 'Satara Constituency',
                'total_works' => 145,
                'completed_works' => 118,
                'rating' => '4.6★',
                'credibility' => '91%',
                'image' => 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max'
            ];
        }

        // ==========================
        // GET COMPLAINTS WITH STATUS CLASS
        // ==========================
        $recent_complaints = $model->recentComplaints($user_id);
        foreach ($recent_complaints as &$complaint) {
            $status_classes = [
                'resolved' => 'success',
                'in_progress' => 'info',
                'pending' => 'warning',
                'rejected' => 'danger'
            ];
            $complaint['status_class'] = $status_classes[strtolower($complaint['status'] ?? 'pending')] ?? 'warning';
        }

        // ==========================
        // GET ACTIVE SURVEYS
        // ==========================
        $active_surveys = $model->recentSurveys();
        foreach ($active_surveys as &$survey) {
            $survey['title'] = $survey['title'] ?? 'Survey';
            $survey['days_left'] = $survey['days_left'] ?? 5;
        }

        // ==========================
        // PREPARE DATA FOR VIEW
        // ==========================
        $data = [
            // User Details - FROM SESSION
            'user_name' => session()->get('full_name'),
            'user_email' => session()->get('email'),
            'user_image' => session()->get('profile_photo'), // ✅ Now this will have value
            'voter_id' => session()->get('voter_id'),
            'district' => session()->get('district'),
            'booth' => $user_data['booth'] ?? $user_data['locality'] ?? 'Not Available',

            // Profile
            'profile_completion' => $model->profileCompletion($user_id),

            // MLA Details
            'mla_data' => $mla_data,

            // KPI Cards
            'kpi_data' => [
                'total_works' => $mla_data['total_works'] ?? 0,
                'completed' => $mla_data['completed_works'] ?? 0,
                'in_progress' => 0,
                'feedbacks' => 0,
                'complaints' => $model->totalComplaints($user_id),
                'surveys' => $model->totalSurveys(),
            ],

            // Static Recent Works
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

            // Dynamic Complaints
            'recent_complaints' => $recent_complaints,

            // Dynamic Surveys
            'active_surveys' => $active_surveys,

            // Static Notifications
            'notifications' => [
                ['message' => 'New survey available', 'time' => '2 hours ago'],
                ['message' => 'Your complaint has been resolved', 'time' => '5 hours ago'],
                ['message' => 'MLA visited your locality', 'time' => '1 day ago'],
                ['message' => 'New development work started', 'time' => '2 days ago'],
                ['message' => 'Feedback requested for completed work', 'time' => '3 days ago']
            ],
            'notification_count' => 3,
        ];

        return view('user/dashboard', $data);
    }
}