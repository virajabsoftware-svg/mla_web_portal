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
            padding: 0;
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
        .dashboard_home {
            width: 100%;
            max-width: 100%;
            padding: 1.5rem 2rem !important;
        }

        /* Bootstrap row overrides */
        .dashboard_home .row,
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

        /* All cards in dashboard home */
        .dashboard_home .card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* Gradient border animation */
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

        /* Profile Card - SQUARE PROFILE PICTURE STYLES */
        .dashboard_home .card .d-flex.align-items-center {
            margin-bottom: 1rem;
        }

        /* Square profile picture - main style */
        .dashboard_home .card .rounded-square {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 3px solid var(--lime-gold);
            border-radius: 16px !important;
            transition: all 0.3s ease;
        }

        /* Square profile with hover effect */
        .dashboard_home .card .rounded-square:hover {
            transform: scale(1.02);
            border-color: var(--olive-green);
            box-shadow: 0 4px 12px rgba(195, 200, 72, 0.3);
        }

        /* Alternative square avatar for different sizes */
        .dashboard_home .rounded-square-sm {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 12px !important;
            border: 2px solid var(--lime-gold);
        }

        .dashboard_home .rounded-square-lg {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 20px !important;
            border: 3px solid var(--lime-gold);
        }

        /* Square avatar placeholder style */
        .dashboard_home .avatar-square {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--lime-gold), var(--olive-green));
            border-radius: 16px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 600;
        }

        /* For list items or small square profile images */
        .dashboard_home .img-square-sm {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 10px !important;
        }

        /* Removing old circular reference but keeping for backward compatibility */
        .dashboard_home .card .rounded-circle {
            border-radius: 16px !important;
            border: 3px solid var(--lime-gold);
            object-fit: cover;
            width: 110px;
            height: 120px;
        }

        .dashboard_home .card h4 {
            color: var(--teal-blue);
            font-weight: 700;
        }

        .text-muted {
            color: var(--dark-olive) !important;
            opacity: 0.8;
        }

        /* Badge styling */
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

        /* MLA Section */
        .dashboard_home .card .text-primary {
            color: var(--teal-blue) !important;
        }

        /* KPI Cards */
        .dashboard_home .row.g-4.mb-4 .card {
            cursor: pointer;
        }

        .dashboard_home .row.g-4.mb-4 .card-body {
            padding: 1.25rem;
        }

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

        .dashboard_home .row.g-4.mb-4 p {
            color: var(--dark-olive);
            font-weight: 500;
            margin-bottom: 0;
            font-size: 0.85rem;
        }

        /* Icon colors */
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

        /* Card headers */
        .dashboard_home .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }

        .dashboard_home .card-header.bg-white {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05)) !important;
        }

        .dashboard_home .card-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
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
            cursor: pointer;
        }

        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
        }

        /* List group styling */
        .list-group {
            border-radius: 12px;
            overflow: hidden;
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

        /* Survey border boxes */
        .dashboard_home .border.rounded {
            border: 1px solid rgba(195, 200, 72, 0.3) !important;
            transition: all 0.2s;
            cursor: pointer;
        }

        .dashboard_home .border.rounded:hover {
            background: rgba(195, 200, 72, 0.05);
            transform: translateX(4px);
        }

        .dashboard_home .border.rounded h6 {
            color: var(--teal-blue);
            font-weight: 600;
        }

        .dashboard_home .border.rounded small {
            color: var(--dark-olive);
            opacity: 0.7;
        }

        /* Complaints section */
        .dashboard_home .card-body .mb-4 h6,
        .dashboard_home .card-body .mb-4 h6 {
            color: var(--teal-blue);
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* Horizontal rule */
        hr {
            background: rgba(195, 200, 72, 0.3);
            margin: 1rem 0;
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

        /* Pulse animation for critical stats */
        .badge.bg-danger {
            animation: pulseComplaint 1.5s infinite;
        }

        @keyframes pulseComplaint {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* ============================================
           RESPONSIVE BREAKPOINTS
           ============================================ */

        /* Tablet Landscape (1024px) */
        @media (max-width: 1024px) {
            .dashboard_home {
                padding: 1.25rem 1.5rem !important;
            }

            .dashboard_home .row.g-4.mb-4 h3 {
                font-size: 1.5rem;
            }

            .dashboard_home .card .row .col-md-3 h5 {
                font-size: 1rem;
            }

            /* Adjust square profile sizes for tablet */
            .dashboard_home .card .rounded-square {
                width: 64px;
                height: 64px;
                border-radius: 14px !important;
            }
        }

        /* Tablet Portrait (768px) */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            body.sidebar-collapsed .main-content {
                margin-left: 0;
            }

            .dashboard_home {
                padding: 1rem 1.25rem !important;
            }

            .dashboard_home .row.g-4.mb-4 h3 {
                font-size: 1.25rem;
            }

            .dashboard_home .card .d-flex.align-items-center {
                flex-direction: column;
                text-align: center;
            }

            .dashboard_home .card .rounded-square {
                margin-bottom: 1rem;
                margin-right: 0 !important;
            }

            .dashboard_home .row.align-items-center .col-md-2 {
                text-align: center;
                margin-bottom: 1rem;
            }

            .dashboard_home .row.align-items-center .col-md-10 {
                text-align: center;
            }
        }

        /* Mobile (576px) */
        @media (max-width: 576px) {
            .dashboard_home {
                padding: 0.875rem 1rem !important;
            }

            .dashboard_home .card-header {
                padding: 0.875rem 1rem;
            }

            .dashboard_home .card-body {
                padding: 1rem;
            }

            .dashboard_home .row.g-4.mb-4 h3 {
                font-size: 1.1rem;
            }

            .dashboard_home .row.g-4.mb-4 .card-body {
                padding: 0.875rem;
            }

            .table thead th,
            .table tbody td {
                padding: 8px;
                font-size: 0.8rem;
            }

            .list-group-item {
                padding: 0.75rem;
                font-size: 0.85rem;
            }

            .dashboard_home .card .row .col-md-3 {
                margin-bottom: 0.5rem;
            }

            h4 {
                font-size: 1.25rem;
            }

            /* Adjust square profile for mobile */
            .dashboard_home .card .rounded-square {
                width: 56px;
                height: 56px;
                border-radius: 12px !important;
            }
        }

        /* Large Desktop (1920px+) */
        @media (min-width: 1920px) {
            .dashboard_home {
                padding: 2rem 2.5rem !important;
            }

            .dashboard_home .row.g-4.mb-4 h3 {
                font-size: 2.2rem;
            }

            /* Larger square profile for big screens */
            .dashboard_home .card .rounded-square {
                width: 100px;
                height: 100px;
                border-radius: 20px !important;
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
           DASHBOARD SPECIFIC ENHANCEMENTS
           ============================================ */

        /* Floating animation for KPI cards */
        .dashboard_home .row.g-4.mb-4 .card {
            animation: floatSoft 3s infinite ease-in-out;
            animation-delay: calc(var(--i, 0) * 0.1s);
        }

        @keyframes floatSoft {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Stagger animation delays for KPI cards */
        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(1) .card {
            --i: 1;
        }

        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(2) .card {
            --i: 2;
        }

        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(3) .card {
            --i: 3;
        }

        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(4) .card {
            --i: 4;
        }

        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(5) .card {
            --i: 5;
        }

        .dashboard_home .row.g-4.mb-4 .col-xl-2:nth-child(6) .card {
            --i: 6;
        }

        /* Text color enhancements */
        .text-secondary {
            color: var(--dark-olive) !important;
        }

        /* Small text styling */
        small {
            color: var(--dark-olive);
            opacity: 0.7;
        }

        /* Row text center within MLA stats */
        .dashboard_home .card .row .col-md-3 h5 {
            font-weight: 700;
            color: var(--teal-blue);
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
        <div class="container-fluid dashboard_home py-4">

            <!-- ========================= -->
            <!-- PROFILE + MLA SUMMARY -->
            <!-- ========================= -->
            <div class="row g-4 mb-4">

                <div class="col-xl-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center">

                                <img src="https://mockmind-api.uifaces.co/content/human/80.jpg"
                                    class="rounded-circle me-3" width="80" height="80">

                                <div>
                                    <h4 class="mb-1">Vedant Patil</h4>
                                    <p class="text-muted mb-1">
                                        Voter ID : MH1234567890
                                    </p>
                                    <span class="badge bg-success">
                                        Profile Completion 92%
                                    </span>
                                </div>

                            </div>

                            <hr>

                            <div class="row text-center">

                                <div class="col-6">
                                    <h6 class="text-muted">District</h6>
                                    <h5>Satara</h5>
                                </div>

                                <div class="col-6">
                                    <h6 class="text-muted">Booth</h6>
                                    <h5>BT-145</h5>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>
                                    <i class="fas fa-user-tie text-primary"></i>
                                    Assigned MLA
                                </h4>
                            </div>

                            <div class="row align-items-center">

                                <div class="col-md-2 text-center">
                                    <img src="https://cf-images.assettype.com/pudharinews%2F2025-01-20%2Fulf9t6ec%2F13.jpg?w=480&auto=format%2Ccompress&fit=max"
                                        class="rounded-circle" width="90">
                                </div>

                                <div class="col-md-10">

                                    <h4>Chh. Shivendrasinh Bhosale</h4>

                                    <p class="mb-2">
                                        Satara Constituency
                                    </p>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <h5>145</h5>
                                            <small>Total Works</small>
                                        </div>

                                        <div class="col-md-3">
                                            <h5>118</h5>
                                            <small>Completed</small>
                                        </div>

                                        <div class="col-md-3">
                                            <h5>4.6★</h5>
                                            <small>Rating</small>
                                        </div>

                                        <div class="col-md-3">
                                            <h5>91%</h5>
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
            <!-- KPI CARDS -->
            <!-- ========================= -->

            <div class="row g-4 mb-4">

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-road fa-2x text-primary mb-2"></i>
                            <h3>145</h3>
                            <p class="mb-0">Total Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                            <h3>118</h3>
                            <p class="mb-0">Completed</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-spinner fa-2x text-warning mb-2"></i>
                            <h3>27</h3>
                            <p class="mb-0">In Progress</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-comments fa-2x text-info mb-2"></i>
                            <h3>12</h3>
                            <p class="mb-0">Feedbacks</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-exclamation-circle fa-2x text-danger mb-2"></i>
                            <h3>03</h3>
                            <p class="mb-0">Complaints</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <i class="fas fa-poll fa-2x text-secondary mb-2"></i>
                            <h3>08</h3>
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
                            <h5 class="mb-0">
                                Recent Development Works
                            </h5>
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

                                        <tr>
                                            <td>Road Construction</td>
                                            <td>Infrastructure</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    Completed
                                                </span>
                                            </td>
                                            <td>100%</td>
                                        </tr>

                                        <tr>
                                            <td>Water Supply Scheme</td>
                                            <td>Utilities</td>
                                            <td>
                                                <span class="badge bg-warning">
                                                    Ongoing
                                                </span>
                                            </td>
                                            <td>75%</td>
                                        </tr>

                                        <tr>
                                            <td>School Renovation</td>
                                            <td>Education</td>
                                            <td>
                                                <span class="badge bg-info">
                                                    Planned
                                                </span>
                                            </td>
                                            <td>20%</td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="card border-0 shadow h-100">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Complaint Status
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="mb-4">
                                <h6>Road Repair Issue</h6>
                                <span class="badge bg-warning">
                                    In Review
                                </span>
                            </div>

                            <div class="mb-4">
                                <h6>Street Light Issue</h6>
                                <span class="badge bg-success">
                                    Resolved
                                </span>
                            </div>

                            <div>
                                <h6>Water Leakage</h6>
                                <span class="badge bg-primary">
                                    Assigned
                                </span>
                            </div>

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
                            <h5 class="mb-0">
                                Active Surveys
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="border rounded p-3 mb-3">
                                <h6>Road Infrastructure Survey</h6>
                                <small>Ends in 5 Days</small>
                            </div>

                            <div class="border rounded p-3">
                                <h6>Water Supply Feedback Survey</h6>
                                <small>Ends in 3 Days</small>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border-0 shadow">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Latest Notifications
                            </h5>
                        </div>

                        <div class="card-body">

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item">
                                    Complaint #145 Updated
                                </li>

                                <li class="list-group-item">
                                    New Development Work Added
                                </li>

                                <li class="list-group-item">
                                    Survey Response Requested
                                </li>

                                <li class="list-group-item">
                                    MLA Meeting Scheduled
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <footer class="footer">
          <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </footer>
    </main>
    <!-- MAIN DASHBOARD CONTENT -->
    <script>// Home Dashboard counter animations
        document.addEventListener('DOMContentLoaded', function () {
            // Counter animations for all numbers in KPI cards and MLA stats
            const counters = document.querySelectorAll('.dashboard_home .row.g-4.mb-4 h3, .dashboard_home .card .row .col-md-3 h5');

            counters.forEach(counter => {
                const text = counter.innerText;
                // Skip if it contains star or non-numeric
                if (text.includes('★') || text.includes('/')) return;

                let target = parseFloat(text);
                if (isNaN(target)) return;

                let current = 0;
                const increment = target / 50;
                const isDecimal = text.includes('.');

                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        if (isDecimal) {
                            counter.innerText = current.toFixed(1);
                        } else {
                            counter.innerText = Math.round(current);
                        }
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.innerText = text;
                    }
                };
                updateCounter();
            });

            // Add click handlers to KPI cards
            const kpiCards = document.querySelectorAll('.dashboard_home .row.g-4.mb-4 .card');
            kpiCards.forEach((card, index) => {
                card.addEventListener('click', function () {
                    const title = this.querySelector('p').innerText;
                    const value = this.querySelector('h3').innerText;
                    alert(`${title}: ${value}\n\nDetailed analytics available in the reports section.`);
                });
            });

            // Add click handlers to survey cards
            const surveyCards = document.querySelectorAll('.dashboard_home .border.rounded');
            surveyCards.forEach(card => {
                card.addEventListener('click', function () {
                    const title = this.querySelector('h6').innerText;
                    alert(`Opening survey: ${title}\n\nPlease provide your valuable feedback.`);
                });
            });
        });</script>
    <script src=navbar.js></script>
</body>

</html>