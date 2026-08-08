<?php
// At the very top of your file, before any HTML
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect if not logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header('Location: ' . base_url('auth/login'));
    exit();
}

// Load the DashboardModel
$dashboardModel = new \App\Models\User\DashboardModel();
$user_id = $_SESSION['user_id'];

// ==========================
// 1. Get User Profile (FROM MODEL)
// ==========================
$user_data = $dashboardModel->getUserProfile($user_id);

if (!$user_data) {
    session_destroy();
    header('Location: ' . base_url('auth/login'));
    exit();
}

// ==========================
// FIX: PROFILE PHOTO HANDLING
// ==========================
$profile_photo = $user_data['profile_photo'] ?? '';

// If no profile photo in database, generate a default
if (empty($profile_photo)) {
    // Generate default based on gender
    $gender = strtolower($user_data['gender'] ?? 'male');
    $seed = $user_data['id'] ?? $user_id;
    
    if ($gender === 'female' || $gender === 'f') {
        $profile_photo = "https://randomuser.me/api/portraits/women/" . ($seed % 99) . ".jpg";
    } else {
        $profile_photo = "https://randomuser.me/api/portraits/men/" . ($seed % 99) . ".jpg";
    }
} else {
    // If it's a relative path, convert to full URL
    if (!filter_var($profile_photo, FILTER_VALIDATE_URL)) {
        // Check if file exists in uploads folder
        $file_path = FCPATH . 'uploads/profile/' . $profile_photo;
        if (file_exists($file_path)) {
            $profile_photo = base_url('uploads/profile/' . $profile_photo);
        } else {
            // File doesn't exist, use default
            $gender = strtolower($user_data['gender'] ?? 'male');
            $seed = $user_data['id'] ?? $user_id;
            
            if ($gender === 'female' || $gender === 'f') {
                $profile_photo = "https://randomuser.me/api/portraits/women/" . ($seed % 99) . ".jpg";
            } else {
                $profile_photo = "https://randomuser.me/api/portraits/men/" . ($seed % 99) . ".jpg";
            }
        }
    }
}

// Set session variables from database
$_SESSION['user_name'] = $user_data['full_name'] ?? $user_data['name'] ?? 'User';
$_SESSION['user_email'] = $user_data['email'] ?? '';
$_SESSION['user_role'] = $user_data['role'] ?? 'Voter';
$_SESSION['user_image'] = $profile_photo; // ✅ Now this will have a value
$_SESSION['voter_id'] = $user_data['voter_id'] ?? 'Not Available';
$_SESSION['district'] = $user_data['district'] ?? 'Not Available';
$_SESSION['booth'] = $user_data['booth'] ?? $user_data['locality'] ?? 'Not Available';

// ==========================
// 2. Profile Completion (FROM MODEL)
// ==========================
$profile_completion = $dashboardModel->profileCompletion($user_id);
$_SESSION['profile_completion'] = $profile_completion;

// Assign variables for view
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_role = $_SESSION['user_role'];
$user_image = $_SESSION['user_image'];
$voter_id = $_SESSION['voter_id'];
$district = $_SESSION['district'];
$booth = $_SESSION['booth'];

// ==========================
// 3. Assigned MLA (FROM MODEL)
// ==========================
$mla_data_from_db = $dashboardModel->getAssignedMLA($user_id);

// Prepare MLA data for display
if (!empty($mla_data_from_db) && !empty($mla_data_from_db['mla_name'])) {
    // Get MLA image
    $mla_image = $mla_data_from_db['mla_image'] ?? '';
    if (empty($mla_image)) {
        $mla_image = 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max';
    }
    
    $mla_data = [
        'name' => $mla_data_from_db['mla_name'] ?? 'Not Assigned',
        'constituency' => $mla_data_from_db['constituency'] ?? $district,
        'total_works' => $mla_data_from_db['total_works'] ?? 0,
        'completed_works' => $mla_data_from_db['completed_works'] ?? 0,
        'rating' => $mla_data_from_db['rating'] ?? '0★',
        'credibility' => $mla_data_from_db['credibility'] ?? '0%',
        'image' => $mla_image
    ];
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
// 4. Total Complaints (FROM MODEL)
// ==========================
$total_complaints = $dashboardModel->totalComplaints($user_id);

// ==========================
// 5. Recent Complaints (FROM MODEL)
// ==========================
$recent_complaints = $dashboardModel->recentComplaints($user_id);

foreach ($recent_complaints as &$complaint) {
    $complaint['title'] = $complaint['title'] ?? $complaint['subject'] ?? 'Complaint';
    $complaint['status'] = ucfirst($complaint['status'] ?? 'pending');
    
    $status_classes = [
        'resolved' => 'success',
        'in_progress' => 'info',
        'pending' => 'warning',
        'rejected' => 'danger'
    ];
    $complaint['status_class'] = $status_classes[strtolower($complaint['status'])] ?? 'warning';
}

// ==========================
// 6. Total Active Surveys (FROM MODEL)
// ==========================
$total_surveys = $dashboardModel->totalSurveys();

// ==========================
// 7. Recent Active Surveys (FROM MODEL)
// ==========================
$active_surveys = $dashboardModel->recentSurveys();

foreach ($active_surveys as &$survey) {
    $survey['title'] = $survey['title'] ?? 'Survey';
    $survey['days_left'] = $survey['days_left'] ?? 5;
}

// ==========================
// KPI DATA - Using model methods
// ==========================
$kpi_data = [
    'total_works' => 0, // STATIC - Keep as is
    'completed' => 0, // STATIC - Keep as is
    'in_progress' => 0, // STATIC - Keep as is
    'feedbacks' => 0, // STATIC - Keep as is
    'complaints' => $total_complaints, // DYNAMIC - From Model
    'surveys' => $total_surveys, // DYNAMIC - From Model
];

// ==========================
// RECENT WORKS - STATIC
// ==========================
$recent_works = [
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
];

// ==========================
// NOTIFICATIONS - STATIC
// ==========================
$notifications = [
    ['message' => 'New survey available', 'time' => '2 hours ago'],
    ['message' => 'Your complaint has been resolved', 'time' => '5 hours ago'],
    ['message' => 'MLA visited your locality', 'time' => '1 day ago'],
    ['message' => 'New development work started', 'time' => '2 days ago'],
    ['message' => 'Feedback requested for completed work', 'time' => '3 days ago']
];
$notification_count = 3; // STATIC

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>GovTrack Aura | Premium Governance Dashboard</title>
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
    
    <!-- Bootstrap 5 Grid & Utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Your existing styles - keeping them for consistency */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #F4F2F5;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Color Scheme Variables */
        :root {
            --soft-white: #F4F2F5;
            --lime-gold: #C3C848;
            --olive-green: #6B8A22;
            --teal-blue: #225661;
            --dark-olive: #454D28;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --shadow-sm: 0 12px 28px rgba(0, 0, 0, 0.05);
            --shadow-lift: 0 25px 35px -12px rgba(0, 0, 0, 0.15);
            --transition-smooth: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        /* Main Content */
        .main-content {
            position: relative;
            min-height: 100vh;
            max-width: none;
            margin: 0;
            margin-left: 280px;
            margin-top: 70px;
            padding: 0;
            transition: margin-left 0.3s ease;
            overflow-x: hidden;
            height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .sidebar-collapsed .main-content,
        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        .main-content::-webkit-scrollbar {
            width: 6px;
        }

        .main-content::-webkit-scrollbar-track {
            background: #e0e0e0;
            border-radius: 10px;
        }

        .main-content::-webkit-scrollbar-thumb {
            background: var(--lime-gold);
            border-radius: 10px;
        }

        .main-content::-webkit-scrollbar-thumb:hover {
            background: var(--olive-green);
        }

        .dashboard_home {
            width: 100%;
            max-width: 100%;
            padding: 1.5rem 2rem !important;
        }

        .dashboard_home .row,
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            width: 100%;
        }

        [class*="col-"] {
            padding-left: 12px !important;
            padding-right: 12px !important;
        }

        /* Card Styles */
        .dashboard_home .card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        .dashboard_home .card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--lime-gold), var(--olive-green), var(--teal-blue), var(--lime-gold));
            background-size: 300% 300%;
            border-radius: 22px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .dashboard_home .card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .dashboard_home .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lift), 0 0 0 2px rgba(195, 200, 72, 0.2);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .dashboard_home .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }

        .dashboard_home .card-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
        }

        .badge.bg-success {
            background: linear-gradient(135deg, var(--olive-green), #8ab33a) !important;
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 500;
        }

        .badge.bg-warning {
            background: var(--lime-gold) !important;
            color: var(--dark-olive);
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 500;
        }

        .badge.bg-info {
            background: var(--teal-blue) !important;
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 500;
        }

        .badge.bg-primary {
            background: #17a2b8 !important;
        }

        .badge.bg-danger {
            background: #dc3545 !important;
        }

        /* KPI Cards */
        .dashboard_home .row.g-4.mb-4 .card {
            cursor: pointer;
            animation: floatSoft 3s infinite ease-in-out;
            animation-delay: calc(var(--i, 0) * 0.1s);
        }

        @keyframes floatSoft {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
            100% { transform: translateY(0px); }
        }

        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(1) .card { --i: 1; }
        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(2) .card { --i: 2; }
        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(3) .card { --i: 3; }
        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(4) .card { --i: 4; }
        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(5) .card { --i: 5; }
        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(6) .card { --i: 6; }

        .dashboard_home .row.g-4.mb-4 h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin: 0.5rem 0;
            transition: all 0.2s;
        }

        .dashboard_home .row.g-4.mb-4 .card:hover h3 {
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .fa-road.fa-2x.text-primary,
        .fa-user-tie.text-primary {
            color: var(--teal-blue) !important;
        }

        .fa-check-circle.fa-2x.text-success {
            color: var(--olive-green) !important;
        }

        .fa-spinner.fa-2x.text-warning {
            color: var(--lime-gold) !important;
        }

        .fa-comments.fa-2x.text-info {
            color: #17a2b8 !important;
        }

        .fa-exclamation-circle.fa-2x.text-danger {
            color: #dc3545 !important;
        }

        .fa-poll.fa-2x.text-secondary {
            color: var(--dark-olive) !important;
        }

        /* Table Styling */
        .table thead th {
            background: rgba(195, 200, 72, 0.1);
            color: var(--teal-blue);
            font-weight: 600;
            border-bottom: 2px solid var(--lime-gold);
            padding: 12px;
        }

        .table tbody td {
            padding: 12px;
            vertical-align: middle;
            color: var(--dark-olive);
        }

        .table-hover tbody tr:hover {
            background: rgba(195, 200, 72, 0.05);
            transition: background 0.2s;
            cursor: pointer;
        }

        .list-group-item {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(195, 200, 72, 0.2);
            color: var(--dark-olive);
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
        }

        .list-group-item:hover {
            background: rgba(195, 200, 72, 0.1);
            transform: translateX(4px);
        }

        /* Fix for images - Add this new style */
        img {
            object-fit: cover;
        }
        
        .profile-avatar img,
        .user-dropdown-premium img,
        .rounded-circle {
            object-fit: cover;
            background: #f0f0f0;
        }

        .fade-page-transition {
            animation: pageFade 0.5s ease-out;
        }

        @keyframes pageFade {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            position: relative;
            margin-top: 2rem;
            padding: 18px 25px;
            background: var(--glass-bg);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(195, 200, 72, 0.30);
            border-radius: 24px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .footer::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--lime-gold), var(--olive-green), var(--teal-blue), var(--lime-gold));
            background-size: 300% 300%;
            border-radius: 26px;
            z-index: -1;
            opacity: 0;
            transition: 0.5s ease;
        }

        .footer:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .footer:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lift);
        }

        .footer p {
            margin: 0;
            color: var(--dark-olive);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .dashboard_home { padding: 1.25rem 1.5rem !important; }
            .dashboard_home .row.g-4.mb-4 h3 { font-size: 1.5rem; }
        }

        @media (max-width: 768px) {
            .main-content { margin-left: 0; }
            body.sidebar-collapsed .main-content { margin-left: 0; }
            .dashboard_home { padding: 1rem 1.25rem !important; }
            .dashboard_home .row.g-4.mb-4 h3 { font-size: 1.25rem; }
            .footer { padding: 15px; border-radius: 18px; margin-top: 1.5rem; }
            .footer p { font-size: 0.85rem; line-height: 1.6; }
        }

        @media (max-width: 576px) {
            .dashboard_home { padding: 0.875rem 1rem !important; }
            .dashboard_home .row.g-4.mb-4 h3 { font-size: 1.1rem; }
            .table thead th, .table tbody td { padding: 8px; font-size: 0.8rem; }
        }
    </style>
</head>

<body>

    <div class="animated-bg"></div>
    <div class="particles-bg" id="particles"></div>

    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- PREMIUM SIDEBAR -->
    <aside class="aura-sidebar" id="auraSidebar">
        <div class="sidebar-header">
            <div class="logo-wrapper">
                <div class="logo-icon"><i class="fas fa-landmark"></i></div>
                <div class="logo-text">
                    <h3>GovTrack</h3>
                    <p>Aura Governance Suite</p>
                </div>
            </div>
        </div>
        <div class="sidebar-profile">
            <div class="profile-avatar">
                <img src="<?= !empty($user_image) ? htmlspecialchars($user_image) : 'https://randomuser.me/api/portraits/men/32.jpg' ?>" 
                     alt="Profile"
                     onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/32.jpg';">
                <span class="online-dot"></span>
            </div>
            <h6><?= htmlspecialchars($user_name) ?></h6>
            <span><i class="fas fa-check-circle"></i> <?= htmlspecialchars($user_role) ?></span>
        </div>
        <div class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">MAIN</div>
                <a href="<?= base_url('user/dashboard') ?>" class="nav-link-premium active">
                    <i class="fas fa-chart-line"></i><span>Dashboard</span>
                </a>
                <a href="<?= base_url('user/my-profile') ?>" class="nav-link-premium">
                    <i class="fas fa-user-circle"></i><span>My Profile</span>
                </a>
                <a href="<?= base_url('user/assigned-mla') ?>" class="nav-link-premium">
                    <i class="fas fa-user-tie"></i><span>Assigned MLA</span>
                </a>
                <a href="<?= base_url('user/mla-works') ?>" class="nav-link-premium">
                    <i class="fas fa-hard-hat"></i><span>Development Works</span>
                </a>
                <a href="<?= base_url('user/feedback') ?>" class="nav-link-premium">
                    <i class="fas fa-comment-dots"></i><span>Feedback</span>
                </a>
                <a href="<?= base_url('user/survey') ?>" class="nav-link-premium">
                    <i class="fas fa-poll"></i><span>Surveys</span>
                </a>
                <a href="<?= base_url('user/complaint') ?>" class="nav-link-premium">
                    <i class="fas fa-exclamation-triangle"></i><span>Complaints</span>
                </a>
                <a href="<?= base_url('user/mla-rating') ?>" class="nav-link-premium">
                    <i class="fas fa-star-half-alt"></i><span>MLA Rating</span>
                </a>
                <a href="<?= base_url('auth/logout') ?>" class="nav-link-premium" style="margin-top:20px; border-top:1px solid rgba(195,200,72,0.2); padding-top:15px;">
                    <i class="fas fa-sign-out-alt" style="color:#dc3545;"></i><span>Logout</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- PREMIUM TOP BAR -->
    <header class="aura-topbar" id="auraTopbar">
        <div class="topbar-left">
            <button class="sidebar-toggle-btn" id="sidebarToggleBtn"><i class="fas fa-bars"></i></button>
            <button class="sidebar-toggle-mobile" id="sidebarToggleMobile"><i class="fas fa-bars"></i></button>
        </div>
        <div class="topbar-right">
            <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search governance data...">
            </div>
            <button class="notification-btn" onclick="window.location.href='<?= base_url('user/notification') ?>'">
                <i class="fas fa-bell"></i>
                <span class="notification-badge"><?= $notification_count ?? 0 ?></span>
            </button>
            <div class="user-dropdown-premium">
                <div class="user-info-dropdown">
                    <div class="user-name"><?= htmlspecialchars($user_name) ?></div>
                    <div class="user-role"><?= htmlspecialchars($user_role) ?></div>
                </div>
                <img src="<?= !empty($user_image) ? htmlspecialchars($user_image) : 'https://randomuser.me/api/portraits/men/32.jpg' ?>" 
                     alt="User"
                     onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/32.jpg';">
            </div>
        </div>
    </header>

    <main class="main-content fade-page-transition">
        <div class="container-fluid dashboard_home py-4">

            <!-- ========================= -->
            <!-- PROFILE + MLA SUMMARY -->
            <!-- ========================= -->
            <div class="row g-4 mb-4">

                <div class="col-xl-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="<?= !empty($user_image) ? htmlspecialchars($user_image) : 'https://randomuser.me/api/portraits/men/32.jpg' ?>" 
                                     class="rounded-circle me-3" width="80" height="80" 
                                     alt="Profile"
                                     onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/32.jpg';">
                                <div>
                                    <h4 class="mb-1"><?= htmlspecialchars($user_name) ?></h4>
                                    <p class="text-muted mb-1">Voter ID : <?= htmlspecialchars($voter_id) ?></p>
                                    <span class="badge bg-success">Profile Completion <?= $profile_completion ?>%</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-6">
                                    <h6 class="text-muted">District</h6>
                                    <h5><?= htmlspecialchars($district) ?></h5>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-muted">Booth</h6>
                                    <h5><?= htmlspecialchars($booth) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-user-tie text-primary"></i> Assigned MLA</h4>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                    <img src="<?= !empty($mla_data['image']) ? htmlspecialchars($mla_data['image']) : 'https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max' ?>" 
                                         class="rounded-circle" width="90" 
                                         alt="MLA"
                                         onerror="this.onerror=null; this.src='https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max';">
                                </div>
                                <div class="col-md-10">
                                    <h4><?= htmlspecialchars($mla_data['name'] ?? 'Not Assigned') ?></h4>
                                    <p class="mb-2"><?= htmlspecialchars($mla_data['constituency'] ?? $district . ' Constituency') ?></p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5><?= $mla_data['total_works'] ?? 0 ?></h5>
                                            <small>Total Works</small>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $mla_data['completed_works'] ?? 0 ?></h5>
                                            <small>Completed</small>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $mla_data['rating'] ?? '0★' ?></h5>
                                            <small>Rating</small>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $mla_data['credibility'] ?? '0%' ?></h5>
                                            <small>Credibility</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========================= -->
            <!-- KPI CARDS - Dynamic Data -->
            <!-- ========================= -->
            <div class="row g-4 mb-4">

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-road fa-2x text-primary mb-2"></i>
                            <h3><?= $kpi_data['total_works'] ?? 145 ?></h3>
                            <p class="mb-0">Total Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                            <h3><?= $kpi_data['completed'] ?? 118 ?></h3>
                            <p class="mb-0">Completed</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-spinner fa-2x text-warning mb-2"></i>
                            <h3><?= $kpi_data['in_progress'] ?? 27 ?></h3>
                            <p class="mb-0">In Progress</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-comments fa-2x text-info mb-2"></i>
                            <h3><?= $kpi_data['feedbacks'] ?? 12 ?></h3>
                            <p class="mb-0">Feedbacks</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-exclamation-circle fa-2x text-danger mb-2"></i>
                            <h3><?= $kpi_data['complaints'] ?? 0 ?></h3>
                            <p class="mb-0">Complaints</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-poll fa-2x text-secondary mb-2"></i>
                            <h3><?= $kpi_data['surveys'] ?? 0 ?></h3>
                            <p class="mb-0">Surveys</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========================= -->
            <!-- WORKS + COMPLAINTS -->
            <!-- ========================= -->
            <div class="row g-4 mb-4">

                <div class="col-lg-8">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Recent Development Works</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Work</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recent_works as $work): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($work['title']) ?></td>
                                            <td><?= htmlspecialchars($work['category']) ?></td>
                                            <td>
                                                <span class="badge bg-<?= $work['status_class'] ?? 'info' ?>">
                                                    <?= htmlspecialchars($work['status']) ?>
                                                </span>
                                            </td>
                                            <td><?= $work['progress'] ?>%</td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Complaint Status</h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($recent_complaints)): ?>
                                <?php foreach ($recent_complaints as $complaint): ?>
                                <div class="mb-4">
                                    <h6><?= htmlspecialchars($complaint['title']) ?></h6>
                                    <span class="badge bg-<?= $complaint['status_class'] ?? 'warning' ?>">
                                        <?= htmlspecialchars($complaint['status']) ?>
                                    </span>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted text-center">No complaints available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========================= -->
            <!-- SURVEYS + NOTIFICATIONS -->
            <!-- ========================= -->
            <div class="row g-4">

                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Active Surveys</h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($active_surveys)): ?>
                                <?php foreach ($active_surveys as $survey): ?>
                                <div class="border rounded p-3 mb-3">
                                    <h6><?= htmlspecialchars($survey['title']) ?></h6>
                                    <small>Ends in <?= $survey['days_left'] ?> Days</small>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted text-center">No active surveys</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Latest Notifications</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <?php foreach ($notifications as $notification): ?>
                                <li class="list-group-item">
                                    <?= htmlspecialchars($notification['message']) ?>
                                    <small class="d-block text-muted"><?= $notification['time'] ?></small>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <footer class="footer">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved. | Welcome, <?= htmlspecialchars($user_name) ?></p>
        </footer>
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter animations
            const counters = document.querySelectorAll('.dashboard_home .row.g-4.mb-4 h3');
            counters.forEach(counter => {
                const text = counter.innerText;
                if (text.includes('★') || text.includes('/')) return;
                let target = parseFloat(text);
                if (isNaN(target)) return;
                let current = 0;
                const increment = target / 50;
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.innerText = Math.round(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.innerText = text;
                    }
                };
                updateCounter();
            });

            // KPI Card click handlers
            document.querySelectorAll('.dashboard_home .row.g-4.mb-4 .card').forEach(card => {
                card.addEventListener('click', function() {
                    const title = this.querySelector('p').innerText;
                    const value = this.querySelector('h3').innerText;
                    alert(`📊 ${title}: ${value}\n\nDetailed analytics available in the reports section.`);
                });
            });
        });
    </script>
    <script src="<?= base_url('assets/user/js/navbar.js') ?>"></script>

</body>
</html>