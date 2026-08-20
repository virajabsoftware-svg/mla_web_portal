<?php

namespace App\Models\User;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'voters';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // ==========================
    // User Profile with Image Handling
    // ==========================
    public function getUserProfile($id)
    {
        $user = $this->db
            ->table('voters')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if ($user) {
            $user['profile_photo'] = $this->handleProfilePhoto($user);

            if (!empty($user['district']) && $this->db->tableExists('districts')) {
                $districtId = $user['district'];
                $districtRow = $this->db
                    ->table('districts')
                    ->select('district_name')
                    ->where('id', $districtId)
                    ->get()
                    ->getRowArray();

                if ($districtRow && !empty($districtRow['district_name'])) {
                    $user['district_name'] = $districtRow['district_name'];
                    $user['district'] = $districtRow['district_name'];
                } else {
                    $user['district_name'] = $user['district'];
                }
            } else {
                $user['district_name'] = $user['district'] ?? 'Not Available';
            }

            if (!empty($user['constituency']) && $this->db->tableExists('constituencies')) {
                $constituencyRow = $this->db
                    ->table('constituencies')
                    ->select('constituency_name')
                    ->where('id', $user['constituency'])
                    ->get()
                    ->getRowArray();

                if ($constituencyRow && !empty($constituencyRow['constituency_name'])) {
                    $user['constituency_name'] = $constituencyRow['constituency_name'];
                    $user['constituency'] = $constituencyRow['constituency_name'];
                } else {
                    $user['constituency_name'] = $user['constituency'];
                }
            } else {
                $user['constituency_name'] = $user['constituency'] ?? 'Not Available';
            }

            $user['booth_name'] = $user['locality'] ?? $user['ward_booth'] ?? $user['booth'] ?? 'Not Available';
        }

        return $user;
    }

    // ==========================
    // Handle Profile Photo
    // ==========================
    private function handleProfilePhoto($user)
    {
        $profile_photo = $user['profile_photo'] ?? '';

        if (empty($profile_photo)) {
            return $this->getDefaultProfilePhoto($user);
        }

        if (filter_var($profile_photo, FILTER_VALIDATE_URL)) {
            return $profile_photo;
        }

        $file_path = FCPATH . 'uploads/profile/' . $profile_photo;

        if (file_exists($file_path)) {
            return base_url('uploads/profile/' . $profile_photo);
        }

        return $this->getDefaultProfilePhoto($user);
    }

    // ==========================
    // Get Default Profile Photo
    // ==========================
    private function getDefaultProfilePhoto($user)
    {
        $gender = strtolower($user['gender'] ?? 'male');
        $seed = $user['id'] ?? rand(1, 99);

        if ($gender === 'female' || $gender === 'f') {
            return "https://randomuser.me/api/portraits/women/" . ($seed % 99) . ".jpg";
        }

        return "https://randomuser.me/api/portraits/men/" . ($seed % 99) . ".jpg";
    }

    // ==========================
    // Profile Completion
    // ==========================
    public function profileCompletion($id)
    {
        $user = $this->getUserProfile($id);

        if (!$user) {
            return 0;
        }

        $fields = [
            'full_name',
            'dob',
            'gender',
            'email',
            'profile_photo',
            'district',
            'constituency',
            'locality',
            'pincode'
        ];

        $completed = 0;

        foreach ($fields as $field) {
            if (!empty($user[$field])) {
                $completed++;
            }
        }

        return round(($completed / count($fields)) * 100);
    }

    // ==========================
    // Assigned MLA
    // ==========================
    public function getAssignedMLA($id)
    {
        $voter = $this->db
            ->table('voters')
            ->select('mla_id, mla_name, mla_party, constituency')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$voter) {
            return null;
        }

        $mla_id = $voter['mla_id'] ?? 0;
        $mla_name = $voter['mla_name'] ?? null;
        $mla_party = $voter['mla_party'] ?? null;
        $constituency = $voter['constituency'] ?? null;

        if (!empty($constituency) && $this->db->tableExists('constituencies')) {
            $constituencyRow = $this->db
                ->table('constituencies')
                ->select('constituency_name')
                ->where('id', $constituency)
                ->get()
                ->getRowArray();

            if ($constituencyRow && !empty($constituencyRow['constituency_name'])) {
                $constituency = $constituencyRow['constituency_name'];
            }
        }

        if (!empty($mla_id) && $this->db->tableExists('mlas')) {
            $mlaRecord = $this->db
                ->table('mlas')
                ->where('id', $mla_id)
                ->get()
                ->getRowArray();

            if ($mlaRecord) {
                $mla_name = $mla_name ?? ($mlaRecord['mla_name'] ?? $mlaRecord['name'] ?? null);
                $mla_party = $mla_party ?? ($mlaRecord['party'] ?? $mlaRecord['mla_party'] ?? null);
                $mla_image = $mla_image ?? ($mlaRecord['profile_photo'] ?? null);

                if (empty($constituency) && !empty($mlaRecord['constituency_id']) && $this->db->tableExists('constituencies')) {
                    $constituencyRow = $this->db
                        ->table('constituencies')
                        ->select('constituency_name')
                        ->where('id', $mlaRecord['constituency_id'])
                        ->get()
                        ->getRowArray();

                    $constituency = $constituencyRow['constituency_name'] ?? $constituency;
                }
            }
        }

        if (empty($mla_id) && empty($mla_name)) {
            return null;
        }

        $total_works = $this->getTotalWorksForMLA($mla_id);
        $completed_works = $this->getCompletedWorksForMLA($mla_id);

        return [
            'mla_id' => $mla_id,
            'mla_name' => $mla_name ?? 'Not Assigned',
            'mla_party' => $mla_party ?? 'Not Available',
            'constituency' => $constituency ?? 'Not Available',
            'mla_image' => $mla_image ?? '',
            'total_works' => $total_works,
            'completed_works' => $completed_works,
            'rating' => $this->getMLARating($mla_id, $constituency),
            'credibility' => $this->calculateCredibility($total_works, $completed_works)
        ];
    }

    // ==========================
    // Get Complete MLA Details
    // ==========================
    public function getCompleteMLADetails($mla_id, $constituency = null)
    {
        if (empty($mla_id)) {
            return null;
        }

        // Try to get MLA from mlas table if it exists
        if ($this->db->tableExists('mlas')) {

            $mla = $this->db
                ->table('mlas')
                ->where('id', $mla_id)
                ->get()
                ->getRowArray();

            if ($mla) {

                // Handle MLA image
                $mla_image = $mla['profile_photo']
                    ?? $mla['image']
                    ?? $mla['photo']
                    ?? '';

                if (
                    empty($mla_image) ||
                    !filter_var($mla_image, FILTER_VALIDATE_URL)
                ) {
                    $mla_image = 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max';
                }

                $mla_constituency =
                    $mla['constituency']
                    ?? $constituency
                    ?? null;

                $total_works = $this->getTotalWorksForMLA($mla_id);

                $completed_works = $this->getCompletedWorksForMLA($mla_id);

                return [
                    'mla_id' => $mla_id,

                    'name' =>
                        $mla['name']
                        ?? $mla['full_name']
                        ?? 'Not Available',

                    'constituency' =>
                        $mla_constituency
                        ?? 'Not Available',

                    'party' =>
                        $mla['party']
                        ?? $mla['political_party']
                        ?? 'Not Available',

                    'total_works' => $total_works,

                    'completed_works' => $completed_works,

                    // Rating from mla_ratings.overall_rating
                    'rating' => $this->getMLARating(
                        $mla_id,
                        $mla_constituency
                    ),

                    'credibility' => $this->calculateCredibility(
                        $total_works,
                        $completed_works
                    ),

                    'image' => $mla_image
                ];
            }
        }

        // If MLA not found
        return [
            'mla_id' => $mla_id,

            'name' => 'Not Available',

            'constituency' =>
                $constituency
                ?? 'Not Available',

            'party' => 'Not Available',

            'total_works' => 0,

            'completed_works' => 0,

            'rating' => '0★',

            'credibility' => '0%',

            'image' => 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max'
        ];
    }

    // ==========================
    // Get Total Works for MLA
    // ==========================
    public function getTotalWorksForMLA($mla_id)
    {
        if (empty($mla_id)) {
            return 0;
        }

        if (!$this->db->tableExists('development_works')) {
            return 145;
        }

        return $this->db
            ->table('development_works')
            ->where('mla_id', $mla_id)
            ->countAllResults();
    }

    // ==========================
    // Get Completed Works for MLA
    // ==========================
    public function getCompletedWorksForMLA($mla_id)
    {
        if (empty($mla_id)) {
            return 0;
        }

        if (!$this->db->tableExists('development_works')) {
            return 118;
        }

        return $this->db
            ->table('development_works')
            ->where('mla_id', $mla_id)
            ->where('status', 'Completed')
            ->countAllResults();
    }

    // ==========================
    // Get MLA Rating
    // ==========================
    public function getMLARating($mla_id = null, $constituency = null)
    {
        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        | Rating is NOT stored in voters table.
        |
        | Rating is stored in:
        | mla_ratings.overall_rating
        |
        | mla_ratings does NOT have mla_id according to your model.
        | Therefore constituency is used to identify the MLA rating.
        |--------------------------------------------------------------------------
        */

        if (empty($constituency)) {
            return '0★';
        }

        // Check if mla_ratings table exists
        if (!$this->db->tableExists('mla_ratings')) {
            return '0★';
        }

        $result = $this->db
            ->table('mla_ratings')
            ->select('AVG(overall_rating) AS avg_rating, COUNT(*) AS total_ratings')
            ->where('constituency', $constituency)
            ->get()
            ->getRowArray();

        $avg_rating = $result['avg_rating'] ?? 0;
        $total_ratings = $result['total_ratings'] ?? 0;

        // No rating available
        if ((int)$total_ratings === 0) {
            return '0★';
        }

        return number_format((float)$avg_rating, 1) . '★';
    }

    // ==========================
    // Calculate Credibility
    // ==========================
    public function calculateCredibility($total_works, $completed_works)
    {
        if ($total_works == 0) {
            return '0%';
        }

        $percentage = round(
            ($completed_works / $total_works) * 100
        );

        return min($percentage, 100) . '%';
    }

    // ==========================
    // Total Complaints
    // ==========================
    public function totalComplaints($userId)
    {
        if (!$this->db->tableExists('complaints')) {
            return 0;
        }

        return $this->db
            ->table('complaints')
            ->where('user_id', $userId)
            ->countAllResults();
    }

    // ==========================
    // Recent Complaints
    // ==========================
    public function recentComplaints($userId)
    {
        if (!$this->db->tableExists('complaints')) {
            return [];
        }

        $complaints = $this->db
            ->table('complaints')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        foreach ($complaints as &$complaint) {

            $status = strtolower(
                $complaint['status'] ?? 'pending'
            );

            $complaint['status_class'] =
                $this->getStatusClass($status);

            $complaint['title'] =
                $complaint['title']
                ?? $complaint['subject']
                ?? 'Complaint';
        }

        return $complaints;
    }

    // ==========================
    // Get Status Class
    // ==========================
    private function getStatusClass($status)
    {
        $classes = [
            'resolved' => 'success',
            'completed' => 'success',
            'in_progress' => 'info',
            'in progress' => 'info',
            'pending' => 'warning',
            'rejected' => 'danger',
            'cancelled' => 'danger'
        ];

        return $classes[$status] ?? 'warning';
    }

    // ==========================
    // Total Active Surveys
    // ==========================
    public function totalSurveys()
    {
        if (!$this->db->tableExists('surveys')) {
            return 0;
        }

        $today = date('Y-m-d');

        return $this->db
            ->table('surveys')
            ->where('status', 'Active')
            ->where('end_date >=', $today)
            ->countAllResults();
    }

    // ==========================
    // Recent Active Surveys
    // ==========================
    public function recentSurveys()
    {
        if (!$this->db->tableExists('surveys')) {
            return [];
        }

        $today = date('Y-m-d');

        $surveys = $this->db
            ->table('surveys')
            ->where('status', 'Active')
            ->where('end_date >=', $today)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        foreach ($surveys as &$survey) {

            $survey['title'] =
                $survey['title']
                ?? $survey['name']
                ?? 'Survey';

            if (!empty($survey['end_date'])) {

                $days =
                    (strtotime($survey['end_date']) -
                        strtotime($today)) / 86400;

                $survey['days_left'] =
                    max(0, floor($days));

            } else {

                $survey['days_left'] = 5;
            }
        }

        return $surveys;
    }

    // ==========================
    // Update Profile Photo
    // ==========================
    public function updateProfilePhoto($userId, $photoPath)
    {
        return $this->db
            ->table('voters')
            ->where('id', $userId)
            ->update([
                'profile_photo' => $photoPath
            ]);
    }

    // ==========================
    // Get User Statistics
    // ==========================
    public function getUserStats($userId)
    {
        return [
            'total_complaints' =>
                $this->totalComplaints($userId),

            'total_surveys_participated' =>
                $this->getSurveysParticipated($userId),

            'total_feedbacks_given' =>
                $this->getFeedbacksGiven($userId),

            'profile_completion' =>
                $this->profileCompletion($userId),
        ];
    }

    // ==========================
    // Get Surveys Participated
    // ==========================
    public function getSurveysParticipated($userId)
    {
        if (!$this->db->tableExists('survey_responses')) {
            return 0;
        }

        return $this->db
            ->table('survey_responses')
            ->where('user_id', $userId)
            ->countAllResults();
    }

    // ==========================
    // Get Feedbacks Given
    // ==========================
    public function getFeedbacksGiven($userId)
    {
        if (!$this->db->tableExists('feedbacks')) {
            return 0;
        }

        return $this->db
            ->table('feedbacks')
            ->where('user_id', $userId)
            ->countAllResults();
    }

    // ==========================
    // Get Recent Notifications
    // ==========================
    public function getRecentNotifications($userId, $limit = 5)
    {
        if (!$this->db->tableExists('notifications')) {
            return [];
        }

        return $this->db
            ->table('notifications')
            ->where('user_id', $userId)
            ->orWhere('user_id', 0)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    // ==========================
    // Get Unread Notification Count
    // ==========================
    public function getUnreadNotificationCount($userId)
    {
        if (!$this->db->tableExists('notifications')) {
            return 0;
        }

        return $this->db
            ->table('notifications')
            ->where('user_id', $userId)
            ->where('is_read', 0)
            ->countAllResults();
    }

    // ==========================
    // Mark Notification as Read
    // ==========================
    public function markNotificationRead($notificationId, $userId)
    {
        if (!$this->db->tableExists('notifications')) {
            return false;
        }

        return $this->db
            ->table('notifications')
            ->where('id', $notificationId)
            ->where('user_id', $userId)
            ->update([
                'is_read' => 1
            ]);
    }
}