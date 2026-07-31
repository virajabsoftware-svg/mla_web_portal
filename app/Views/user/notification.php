<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>GovTrack Aura | Premium Governance Dashboard</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
    <!-- Bootstrap 5 Grid & Utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

        /* ============================================
           MAIN CONTENT - FIXED POSITIONING FOR SIDEBAR & TOPBAR
           Sidebar width: 280px | Collapsed: 80px | Topbar height: 70px
           ============================================ */
        .main-content {
            position: relative;
            min-height: 100vh;
            max-width: none;
            margin: 0;
            margin-left: 280px;
            margin-top: 70px;
            padding: 1.5rem 2rem;
            transition: margin-left 0.3s ease;
            overflow-x: hidden;
            height: calc(100vh - 70px);
            overflow-y: auto;
        }

        /* When sidebar is collapsed */
        .sidebar-collapsed .main-content,
        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        /* Custom scrollbar */
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

        /* Dashboard container */
        .notification_dashboard {
            width: 100%;
            max-width: 100%;
        }

        /* Bootstrap row overrides */
        .notification_dashboard .row,
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            width: 100%;
        }

        /* Column padding */
        [class*="col-"] {
            padding-left: 12px !important;
            padding-right: 12px !important;
        }

        /* ============================================
           CARD STYLES - Premium Design with Color Scheme
           ============================================ */

        /* All cards in notification dashboard */
        .notification_dashboard .card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* Gradient border animation */
        .notification_dashboard .card::before {
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

        .notification_dashboard .card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .notification_dashboard .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lift), 0 0 0 2px rgba(195, 200, 72, 0.2);
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Summary cards (Notification Stats) */
        .notification_dashboard .row.g-4.mb-4 .card-body {
            padding: 1.5rem;
            text-align: center;
        }

        .notification_dashboard .row.g-4.mb-4 .card-body h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .notification_dashboard .row.g-4.mb-4 .card-body p {
            color: var(--dark-olive);
            font-weight: 500;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        /* Card headers */
        .notification_dashboard .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }

        .notification_dashboard .card-header.bg-white {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05)) !important;
        }

        .notification_dashboard .card-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
        }

        /* Form controls with theme colors */
        .form-label {
            font-weight: 600;
            color: var(--teal-blue);
            margin-bottom: 8px;
            display: block;
        }

        .form-control,
        .form-select {
            background: white;
            border: 1px solid rgba(195, 200, 72, 0.6);
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.9rem;
            transition: all 0.2s;
            width: 100%;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--lime-gold);
            box-shadow: 0 0 0 3px rgba(195, 200, 72, 0.3);
            outline: none;
        }

        /* Button styling */
        .btn-primary {
            background: linear-gradient(95deg, var(--lime-gold), #A9B43C);
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            color: #1F3F3A;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, rgba(255, 255, 255, 0) 10%, rgba(255, 255, 240, 0.6) 50%, rgba(255, 255, 255, 0) 90%);
            transform: rotate(25deg);
            transition: all 0.5s;
            opacity: 0;
        }

        .btn-primary:hover::after {
            left: 100%;
            opacity: 0.8;
        }

        .btn-primary:hover {
            transform: scale(1.02);
            background: linear-gradient(95deg, #d4da5a, #7f9f2f);
            box-shadow: 0 6px 14px rgba(69, 77, 40, 0.25);
        }

        /* List group styling for notifications */
        .list-group {
            border-radius: 12px;
            overflow: hidden;
        }

        .list-group-item {
            border-left: 4px solid transparent;
            transition: all 0.2s;
            margin-bottom: 0;
            border: 1px solid rgba(195, 200, 72, 0.2);
            border-bottom: none;
            background: rgba(255, 255, 255, 0.5);
        }

        .list-group-item:first-child {
            border-top: 1px solid rgba(195, 200, 72, 0.2);
        }

        .list-group-item:last-child {
            border-bottom: 1px solid rgba(195, 200, 72, 0.2);
        }

        .list-group-item:hover {
            background: rgba(195, 200, 72, 0.1);
            border-left-color: var(--lime-gold);
            transform: translateX(4px);
        }

        .list-group-item h6 {
            color: var(--teal-blue);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .list-group-item p {
            color: var(--dark-olive);
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .list-group-item small {
            color: var(--olive-green);
            font-size: 0.75rem;
        }

        /* Badge styling */
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.7rem;
        }

        .badge.bg-warning {
            background: var(--lime-gold) !important;
            color: var(--dark-olive);
        }

        .badge.bg-info {
            background: var(--teal-blue) !important;
            color: white;
        }

        .badge.bg-success {
            background: var(--olive-green) !important;
            color: white;
        }

        .badge.bg-danger {
            background: #dc3545 !important;
        }

        /* Alert styling */
        .alert-warning {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(107, 138, 34, 0.1));
            border-left: 4px solid var(--lime-gold);
            border-radius: 12px;
            color: var(--teal-blue);
        }

        .alert-warning strong {
            color: var(--dark-olive);
            font-size: 1rem;
        }

        /* Table styling */
        .table {
            margin-bottom: 0;
        }

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
        }

        .table-bordered {
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        /* ============================================
           ANIMATIONS
           ============================================ */

        /* Fade page transition */
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

        /* Bell ring animation for notifications */
        .bell-ring {
            animation: bellShake 0.5s ease-in-out;
            display: inline-block;
        }

        @keyframes bellShake {
            0% {
                transform: rotate(0);
            }

            25% {
                transform: rotate(12deg);
            }

            50% {
                transform: rotate(-12deg);
            }

            75% {
                transform: rotate(6deg);
            }

            100% {
                transform: rotate(0);
            }
        }

        /* Pulse animation for unread count */
        .pulse-notification {
            animation: pulseRing 2s infinite;
        }

        @keyframes pulseRing {
            0% {
                box-shadow: 0 0 0 0 rgba(195, 200, 72, 0.5);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(195, 200, 72, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(195, 200, 72, 0);
            }
        }

        /* ============================================
           RESPONSIVE BREAKPOINTS
           ============================================ */

        /* Tablet Landscape (1024px) */
        @media (max-width: 1024px) {
            .main-content {
                padding: 1.25rem 1.5rem;
            }

            .notification_dashboard .row.g-4.mb-4 .card-body h3 {
                font-size: 2rem;
            }
        }

        /* Tablet Portrait (768px) */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 1.25rem;
                margin-left: 0;
            }

            body.sidebar-collapsed .main-content {
                margin-left: 0;
            }

            .notification_dashboard .row.g-4.mb-4 .card-body h3 {
                font-size: 1.75rem;
            }

            .btn-primary {
                margin-top: 10px;
            }

            .list-group-item {
                padding: 12px;
            }
        }

        /* Mobile (576px) */
        @media (max-width: 576px) {
            .main-content {
                padding: 0.875rem 1rem;
            }

            .notification_dashboard .card-header {
                padding: 0.875rem 1rem;
            }

            .notification_dashboard .card-body {
                padding: 1rem;
            }

            .notification_dashboard .row.g-4.mb-4 .card-body h3 {
                font-size: 1.5rem;
            }

            .table thead th,
            .table tbody td {
                padding: 8px;
                font-size: 0.8rem;
            }

            .list-group-item .d-flex {
                flex-direction: column;
            }

            .list-group-item small {
                margin-top: 5px;
            }
        }

        /* Large Desktop (1920px+) */
        @media (min-width: 1920px) {
            .main-content {
                padding: 2rem 2.5rem;
            }
        }

        /* Support for sidebar toggle states */
        body.sidebar-expanded .main-content {
            margin-left: 280px;
        }

        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        /* ============================================
           NOTIFICATION SPECIFIC STYLES
           ============================================ */

        /* Unread notification indicator */
        .list-group-item.unread {
            background: rgba(195, 200, 72, 0.08);
            border-left-color: var(--lime-gold);
        }

        /* Notification icon animation */
        .notification-icon {
            position: relative;
            cursor: pointer;
        }

        .notification-icon .badge-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--lime-gold);
            color: var(--dark-olive);
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 10px;
            font-weight: bold;
        }

        /* Mark all as read button specific */
        .btn-primary.w-100 {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .btn-primary.w-100 {
                white-space: normal;
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

        /* Animated Border Glow */
        .footer::before {
            content: "";
            position: absolute;
            inset: -2px;

            background: linear-gradient(45deg,
                    var(--lime-gold),
                    var(--olive-green),
                    var(--teal-blue),
                    var(--lime-gold));

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

        /* Footer Text */
        .footer p {
            margin: 0;
            color: var(--dark-olive);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* Footer Link */
        .footer a {
            color: var(--teal-blue);
            text-decoration: none;
            font-weight: 700;
            position: relative;
            transition: 0.3s ease;
        }

        .footer a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;

            width: 0;
            height: 2px;

            background: var(--lime-gold);
            transition: 0.3s ease;
        }

        .footer a:hover {
            color: var(--olive-green);
        }

        .footer a:hover::after {
            width: 100%;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .footer {
                padding: 15px;
                border-radius: 18px;
                margin-top: 1.5rem;
            }

            .footer p {
                font-size: 0.85rem;
                line-height: 1.6;
            }
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
            <div class="profile-avatar"><img src="https://randomuser.me/api/portraits/men/32.jpg"><span
                    class="online-dot"></span></div>
            <h6>Vedant Patil</h6><span><i class="fas fa-check-circle"></i> Verified Officer</span>
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
            <div class="search-wrapper"><i class="fas fa-search"></i><input type="text"
                    placeholder="Search governance data..."></div>
            <button class="notification-btn" onclick="window.location.href='<?= base_url('user/notification') ?>'">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">3</span>
            </button>
            <div class="user-dropdown-premium">
                <div class="user-info-dropdown">
                    <div class="user-name">Vedant Patil</div>
                    <div class="user-role">Govt. Officer</div>
                </div><img src="https://randomuser.me/api/portraits/men/32.jpg">
            </div>
        </div>
    </header>

    <main class="main-content fade-page-transition">
        <div class="container-fluid notification_dashboard">

            <!-- ================================= -->
            <!-- NOTIFICATION SUMMARY -->
            <!-- ================================= -->

            <div class="row g-4 mb-4">

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>125</h3>
                            <p class="mb-0">Total Notifications</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>08</h3>
                            <p class="mb-0">Unread</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>117</h3>
                            <p class="mb-0">Read</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>04</h3>
                            <p class="mb-0">New Today</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================================= -->
            <!-- FILTERS -->
            <!-- ================================= -->

            <div class="card border-0 shadow mb-4">

                <div class="card-body">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <select class="form-select">
                                <option>All Notifications</option>
                                <option>Complaint Alerts</option>
                                <option>Survey Alerts</option>
                                <option>Work Updates</option>
                                <option>System Notifications</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select class="form-select">
                                <option>All Status</option>
                                <option>Read</option>
                                <option>Unread</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button class="btn btn-primary w-100">
                                Mark All As Read
                            </button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- RECENT NOTIFICATIONS -->
            <!-- ================================= -->

            <div class="card border-0 shadow mb-4">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        Recent Notifications
                    </h5>
                </div>

                <div class="card-body">

                    <div class="list-group">

                        <a href="complaints.php" class="list-group-item list-group-item-action">

                            <div class="d-flex justify-content-between">

                                <h6 class="mb-1">
                                    Complaint Status Updated
                                </h6>

                                <small>
                                    10 Minutes Ago
                                </small>

                            </div>

                            <p class="mb-1">
                                Your complaint CMP001245 has moved to
                                "In Progress" status.
                            </p>

                            <span class="badge bg-warning">
                                Complaint
                            </span>

                        </a>

                        <a href="surveys.php" class="list-group-item list-group-item-action">

                            <div class="d-flex justify-content-between">

                                <h6 class="mb-1">
                                    New Survey Available
                                </h6>

                                <small>
                                    1 Hour Ago
                                </small>

                            </div>

                            <p class="mb-1">
                                Participate in the Road Development Survey.
                            </p>

                            <span class="badge bg-info">
                                Survey
                            </span>

                        </a>

                        <a href="mla_works.php" class="list-group-item list-group-item-action">

                            <div class="d-flex justify-content-between">

                                <h6 class="mb-1">
                                    Development Work Completed
                                </h6>

                                <small>
                                    Today
                                </small>

                            </div>

                            <p class="mb-1">
                                Village Road Construction project completed.
                            </p>

                            <span class="badge bg-success">
                                Work
                            </span>

                        </a>

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- NOTIFICATION TABLE -->
            <!-- ================================= -->

            <div class="card border-0 shadow mb-4">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        Notification Center
                    </h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Redirect</th>
                                </tr>

                            </thead>

                            <tbody>

                                <tr>
                                    <td>NOT001</td>
                                    <td>Complaint Updated</td>

                                    <td>
                                        <span class="badge bg-warning">
                                            Complaint
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">
                                            Unread
                                        </span>
                                    </td>

                                    <td>
                                        02-Jun-2026
                                    </td>

                                    <td>
                                        complaints.php
                                    </td>

                                </tr>

                                <tr>
                                    <td>NOT002</td>
                                    <td>Survey Invitation</td>

                                    <td>
                                        <span class="badge bg-info">
                                            Survey
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Read
                                        </span>
                                    </td>

                                    <td>
                                        01-Jun-2026
                                    </td>

                                    <td>
                                        surveys.php
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- UNREAD NOTIFICATIONS -->
            <!-- ================================= -->

            <div class="card border-0 shadow mb-4">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        Unread Notifications
                    </h5>
                </div>

                <div class="card-body">

                    <div class="alert alert-warning">

                        <strong>8 Notifications Pending</strong>

                        <br>

                        Please review pending complaint and survey alerts.

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- NOTIFICATION HISTORY -->
            <!-- ================================= -->

            <div class="card border-0 shadow">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        Notification History
                    </h5>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Notification ID</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Read Status</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>NOT001</td>
                                <td>Complaint Status Updated</td>
                                <td>Complaint</td>
                                <td>Unread</td>
                                <td>02-Jun-2026 10:15 AM</td>
                            </tr>

                            <tr>
                                <td>NOT002</td>
                                <td>Survey Invitation</td>
                                <td>Survey</td>
                                <td>Read</td>
                                <td>01-Jun-2026 03:45 PM</td>
                            </tr>

                            <tr>
                                <td>NOT003</td>
                                <td>Work Completion Update</td>
                                <td>Work</td>
                                <td>Read</td>
                                <td>30-May-2026 08:30 PM</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
        <footer class="footer">
          <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </footer>
    </main>
    <!-- MAIN DASHBOARD CONTENT -->

    <script src=navbar.js></script>
    <script>// Mark all as read functionality
        document.addEventListener('DOMContentLoaded', function () {
            const markAllBtn = document.querySelector('.btn-primary.w-100');
            if (markAllBtn) {
                markAllBtn.addEventListener('click', function () {
                    // Mark all unread badges as read
                    const unreadBadges = document.querySelectorAll('.badge.bg-danger');
                    unreadBadges.forEach(badge => {
                        badge.innerText = 'Read';
                        badge.classList.remove('bg-danger');
                        badge.classList.add('bg-success');
                    });

                    // Update unread count in summary
                    const unreadCount = document.querySelector('.row.g-4.mb-4 .card-body h3');
                    if (unreadCount && unreadCount.innerText === '08') {
                        unreadCount.innerText = '0';
                    }

                    // Show success message
                    alert('All notifications marked as read!');
                });
            }

            // Counter animations for numbers
            const counters = document.querySelectorAll('.notification_dashboard .row.g-4.mb-4 .card-body h3');
            counters.forEach(counter => {
                const target = parseInt(counter.innerText);
                let current = 0;
                const increment = target / 50;
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.innerText = Math.round(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCounter();
            });

            // Add click handler to notification items
            const notificationItems = document.querySelectorAll('.list-group-item');
            notificationItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    // Mark as read when clicked
                    const statusBadge = this.querySelector('.badge.bg-danger');
                    if (statusBadge) {
                        statusBadge.innerText = 'Read';
                        statusBadge.classList.remove('bg-danger');
                        statusBadge.classList.add('bg-success');
                    }
                });
            });
        });</script>
</body>

</html>