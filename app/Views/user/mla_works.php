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
        .mla_work_dashboard {
            width: 100%;
            max-width: 100%;
        }

        /* Bootstrap row overrides */
        .mla_work_dashboard .row,
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

        /* Summary Cards (Work Stats) */
        .mla_work_dashboard .card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        .mla_work_dashboard .card::before {
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

        .mla_work_dashboard .card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .mla_work_dashboard .card:hover {
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

        /* Summary card body */
        .mla_work_dashboard .card-body {
            padding: 1.5rem;
        }

        .mla_work_dashboard .card-body h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin-bottom: 0.5rem;
        }

        .mla_work_dashboard .card-body p {
            color: var(--dark-olive);
            font-weight: 500;
            margin-bottom: 0;
        }

        /* Filter section card */
        .mla_work_dashboard .filter-card {
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
        }

        /* Form controls with theme colors */
        .form-select,
        .form-control {
            background: white;
            border: 1px solid rgba(195, 200, 72, 0.6);
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: var(--lime-gold);
            box-shadow: 0 0 0 3px rgba(195, 200, 72, 0.3);
            outline: none;
        }

        /* Search button */
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

        /* Card headers */
        .mla_work_dashboard .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }

        .mla_work_dashboard .card-header h5 {
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
        }

        /* Badge styling */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .badge.bg-success {
            background: var(--olive-green) !important;
        }

        .badge.bg-warning {
            background: var(--lime-gold) !important;
            color: var(--dark-olive);
        }

        /* Progress bar */
        .progress {
            height: 8px;
            border-radius: 10px;
            background: #e9ecef;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--lime-gold), var(--olive-green));
            border-radius: 10px;
            transition: width 1.2s ease-out;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5));
            animation: shimmerMove 1.8s infinite;
        }

        @keyframes shimmerMove {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* List group styling */
        .list-group-item {
            border-left: 3px solid var(--lime-gold);
            margin-bottom: 8px;
            border-radius: 8px !important;
            background: rgba(195, 200, 72, 0.05);
            border-color: rgba(195, 200, 72, 0.2);
            color: var(--teal-blue);
            font-weight: 500;
        }

        /* Gallery images */
        .mla_work_dashboard .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        /* Image placeholder styling */
        .mla_work_dashboard .card .card-img-top[src="before.jpg"],
        .mla_work_dashboard .card .card-img-top[src="after.jpg"] {
            background: linear-gradient(135deg, var(--lime-gold), var(--olive-green));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            position: relative;
        }

        .mla_work_dashboard .card .card-img-top[src="before.jpg"]::before {
            content: "📸 BEFORE IMAGE";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .mla_work_dashboard .card .card-img-top[src="after.jpg"]::before {
            content: "📸 AFTER IMAGE";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Table responsive wrapper */
        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
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

        /* Counter animation class */
        .counter-animate {
            animation: countUp 0.5s ease-out;
        }

        /* ============================================
           RESPONSIVE BREAKPOINTS
           ============================================ */

        /* Tablet Landscape (1024px) */
        @media (max-width: 1024px) {
            .main-content {
                padding: 1.25rem 1.5rem;
            }

            .mla_work_dashboard .card-body h3 {
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

            .mla_work_dashboard .card-body h3 {
                font-size: 1.75rem;
            }

            .btn-primary {
                margin-top: 10px;
            }
        }

        /* Mobile (576px) */
        @media (max-width: 576px) {
            .main-content {
                padding: 0.875rem 1rem;
            }

            .mla_work_dashboard .card-header {
                padding: 0.875rem 1rem;
            }

            .mla_work_dashboard .card-body {
                padding: 1rem;
            }

            .table thead th,
            .table tbody td {
                padding: 8px;
                font-size: 0.85rem;
            }

            .mla_work_dashboard .card-body h3 {
                font-size: 1.5rem;
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
        <div class="container-fluid mla_work_dashboard">

            <!-- ================================= -->
            <!-- WORK SUMMARY -->
            <!-- ================================= -->

            <div class="row g-4 mb-4">

                <div class="col-xl-3 col-md-6">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <h3>145</h3>
                            <p>Total Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <h3>118</h3>
                            <p>Completed Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <h3>18</h3>
                            <p>In Progress</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card shadow border-0 text-center">
                        <div class="card-body">
                            <h3>09</h3>
                            <p>Planned</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================================= -->
            <!-- FILTER SECTION -->
            <!-- ================================= -->

            <div class="card shadow border-0 mb-4">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3">
                            <select class="form-select">
                                <option>All Categories</option>
                                <option>Road</option>
                                <option>Water Supply</option>
                                <option>Education</option>
                                <option>Health</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-select">
                                <option>All Status</option>
                                <option>Planned</option>
                                <option>In Progress</option>
                                <option>Completed</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Search Work">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">
                                Search
                            </button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- WORK LIST -->
            <!-- ================================= -->

            <div class="card shadow border-0 mb-4">

                <div class="card-header">
                    <h5 class="mb-0">
                        Development Works List
                    </h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>

                                <tr>
                                    <th>Work ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Budget</th>
                                    <th>Status</th>
                                    <th>Progress</th>
                                    <th>Location</th>
                                </tr>

                            </thead>

                            <tbody>

                                <tr>
                                    <td>WRK001</td>
                                    <td>Village Road Construction</td>
                                    <td>Road</td>
                                    <td>₹1.25 Cr</td>

                                    <td>
                                        <span class="badge bg-success">
                                            Completed
                                        </span>
                                    </td>

                                    <td>100%</td>

                                    <td>Satara</td>
                                </tr>

                                <tr>
                                    <td>WRK002</td>
                                    <td>Water Pipeline Project</td>
                                    <td>Water Supply</td>

                                    <td>₹80 Lakh</td>

                                    <td>
                                        <span class="badge bg-warning">
                                            In Progress
                                        </span>
                                    </td>

                                    <td>75%</td>

                                    <td>Wai</td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- WORK DETAILS -->
            <!-- ================================= -->

            <div class="card shadow border-0 mb-4">

                <div class="card-header">
                    <h5 class="mb-0">
                        Selected Work Details
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-6">

                            <h5>
                                Village Road Construction
                            </h5>

                            <p>
                                Construction of new road connecting
                                village to main highway.
                            </p>

                            <table class="table">

                                <tr>
                                    <th>MLA ID</th>
                                    <td>MLA-501</td>
                                </tr>

                                <tr>
                                    <th>Start Date</th>
                                    <td>01-Jan-2026</td>
                                </tr>

                                <tr>
                                    <th>End Date</th>
                                    <td>31-May-2026</td>
                                </tr>

                                <tr>
                                    <th>Budget</th>
                                    <td>₹1.25 Cr</td>
                                </tr>

                            </table>

                        </div>

                        <div class="col-lg-6">

                            <h6>Progress Tracking</h6>

                            <div class="progress mb-3">

                                <div class="progress-bar bg-success" style="width:100%">
                                    100%
                                </div>

                            </div>

                            <h6>Timeline</h6>

                            <ul class="list-group">

                                <li class="list-group-item">
                                    Project Approved
                                </li>

                                <li class="list-group-item">
                                    Work Started
                                </li>

                                <li class="list-group-item">
                                    Work Completed
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ================================= -->
            <!-- BEFORE AFTER GALLERY -->
            <!-- ================================= -->

            <div class="card shadow border-0">

                <div class="card-header">
                    <h5 class="mb-0">
                        Before / After Proof Images
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="card">
                                <img src="images/layout_img/Road Before image.png" class="card-img-top">

                                <div class="card-body text-center">
                                    <strong>Before Work</strong>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="card">
                                <img src="images/layout_img/Road After image.png" class="card-img-top">

                                <div class="card-body text-center">
                                    <strong>After Completion</strong>
                                </div>
                            </div>

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

    <script src=navbar.js></script>
    <script>
        // Animate numbers on load
        document.addEventListener('DOMContentLoaded', function () {
            const numbers = document.querySelectorAll('.mla_work_dashboard .card-body h3');
            numbers.forEach(num => {
                const target = parseInt(num.innerText);
                let current = 0;
                const increment = target / 50;
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        num.innerText = Math.round(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        num.innerText = target;
                    }
                };
                updateCounter();
            });
        });
    </script>
</body>

</html>