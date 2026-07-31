<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>
    <!-- Existing CSS dependencies (preserved) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="header.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- responsive css -->
   
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
   
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Leaflet.js for Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    <style>


      /* Inner Dashboard Down */
.container-fluid.mt-4 {
    margin-top: 70px !important;
}
        /* ===================================================== */
        /* PREMIUM CONSTITUENCY DASHBOARD - White + Beige + Gold Theme
           All Animations: Hover Lift, 3D, Glow Border, Shine, Pulse
           ===================================================== */

        :root {
            --pure-white: #ffffff;
            --cream: #fef8f0;
            --beige-light: #faf6ed;
            --beige: #f5ede1;
            --beige-dark: #e8dccc;
            --gold-light: #f5e7c8;
            --gold: #d4af37;
            --gold-dark: #b8960c;
            --gold-glow: rgba(212, 175, 55, 0.35);
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --info: #3B82F6;
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03), 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.08);
            --shadow-gold: 0 12px 30px rgba(212, 175, 55, 0.2);
            --shadow-gold-lg: 0 20px 40px rgba(212, 175, 55, 0.25);
            --radius-sm: 12px;
            --radius-md: 16px;
            --radius-lg: 20px;
            --radius-xl: 24px;
            --transition-fast: 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --transition-base: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, var(--beige-light) 50%, var(--beige) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #1E293B;
            min-height: 100vh;
        }

        /* ===================================================== */
        /* DASHBOARD CARDS - Premium Glassmorphism */
        /* ===================================================== */

        .dashboard-card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xl);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            overflow: hidden;
            cursor: pointer;
            height: 100%;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--gold), var(--gold-light), var(--gold-dark), var(--gold));
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .dashboard-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, transparent 10%, rgba(255, 255, 255, 0.25) 40%, transparent 60%);
            transform: rotate(25deg);
            transition: transform 0.6s ease;
            opacity: 0;
            pointer-events: none;
        }

        .dashboard-card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .dashboard-card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .dashboard-card:hover::after {
            opacity: 1;
            transform: rotate(25deg) translateX(50%);
        }

        @keyframes borderPulse {

            0%,
            100% {
                opacity: 0.4;
                filter: blur(2px);
            }

            50% {
                opacity: 0.8;
                filter: blur(4px);
            }
        }

        .dashboard-card .card-body {
            padding: 25px 20px;
            position: relative;
        }

        .dashboard-card h6 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold-dark);
            margin-bottom: 12px;
        }

        .dashboard-card h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 0;
            font-family: 'Space Grotesk', monospace;
            background: linear-gradient(135deg, #0F172A, var(--gold-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* ===================================================== */
        /* CARDS - Glassmorphism */
        /* ===================================================== */

        .card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xl);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            margin-bottom: 0;
        }

        .card:hover {
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            color: white;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            border: none;
            padding: 15px 20px;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0 !important;
        }

        .card-header h4,
        .card-header h5,
        .card-header h6 {
            margin: 0;
            font-weight: 600;
        }

        .card-body {
            padding: 22px;
        }

        /* Form Controls */
        .form-control,
        .form-select {
            border: 1px solid var(--beige-dark);
            border-radius: 48px;
            padding: 10px 16px;
            transition: all var(--transition-base);
            background: var(--pure-white);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-glow);
            transform: translateY(-1px);
            outline: none;
        }

        /* Table Styles */
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 6px;
        }

        .table thead th {
            border: none;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            color: white;
            padding: 12px;
            font-weight: 600;
            font-size: 13px;
        }

        .table tbody tr {
            transition: all var(--transition-fast);
        }

        .table tbody tr:nth-child(even) td {
            background-color: rgba(250, 246, 237, 0.5);
        }

        .table tbody tr:nth-child(odd) td {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .table tbody tr:hover td {
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.08), rgba(212, 175, 55, 0.02));
            transform: translateX(4px);
        }

        .table td {
            padding: 12px;
            border: none;
            vertical-align: middle;
            font-size: 13px;
        }

        /* Button Styles */
        .btn-sm {
            border-radius: 40px;
            padding: 5px 12px;
            margin: 2px;
            font-size: 11px;
            font-weight: 600;
            transition: all var(--transition-fast);
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            filter: brightness(1.05);
        }

        .btn-info {
            background: linear-gradient(135deg, #0EA5E9, #0284C7);
            border: none;
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            border: none;
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #10B981, #059669);
            border: none;
            color: white;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border: none;
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border: none;
            color: white;
        }

        /* Timeline */
        .timeline {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .timeline li {
            padding: 12px 0 12px 20px;
            border-left: 3px solid var(--gold);
            margin-bottom: 10px;
            transition: all var(--transition-fast);
            position: relative;
        }

        .timeline li::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 18px;
            width: 11px;
            height: 11px;
            background: var(--gold);
            border-radius: 50%;
            border: 2px solid var(--pure-white);
        }

        .timeline li:hover {
            transform: translateX(6px);
            border-left-color: var(--gold-dark);
        }

        /* Progress Bar for Health Score */
        .progress {
            height: 8px;
            border-radius: 20px;
            background: var(--beige-dark);
            overflow: hidden;
        }

        .progress-bar {
            border-radius: 20px;
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
        }

        /* Canvas Charts */
        canvas {
            max-height: 250px;
            width: 100%;
        }

        /* Map Container */
        #map {
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--beige);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold-dark);
        }

        /* Fade In Animation */
        .dashboard-card,
        .card {
            animation: fadeInUp 0.5s ease backwards;
        }

        .dashboard-card:nth-child(1) {
            animation-delay: 0.02s;
        }

        .dashboard-card:nth-child(2) {
            animation-delay: 0.04s;
        }

        .dashboard-card:nth-child(3) {
            animation-delay: 0.06s;
        }

        .dashboard-card:nth-child(4) {
            animation-delay: 0.08s;
        }

        .dashboard-card:nth-child(5) {
            animation-delay: 0.1s;
        }

        .dashboard-card:nth-child(6) {
            animation-delay: 0.12s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating Animation */
        .floating {
            animation: floatCard 4s ease-in-out infinite;
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        /* Counter Animation */
        .counter-number {
            animation: countPop 0.4s ease-out;
            display: inline-block;
        }

        @keyframes countPop {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            60% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-card .card-body {
                padding: 18px 15px;
            }

            .dashboard-card h2 {
                font-size: 24px;
            }

            .card-body {
                padding: 18px;
            }

            .btn-sm {
                padding: 4px 8px;
                font-size: 10px;
                margin: 2px;
            }

            .table th,
            .table td {
                padding: 8px;
                font-size: 11px;
            }
        }

        /* ========== TRANSPARENT FLOATING FOOTER ========== */

        .footer {
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;

            padding: 1rem 2rem !important;

            text-align: center;

            margin: 2rem 20px 25px 20px !important;
            /* bottom pasun var */

            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);

            position: relative;
            overflow: hidden;
        }

        .footer::before {
            display: none;
        }

        .footer p {
            margin: 0;
            color: #666 !important;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .footer a {
            color: #b8860b !important;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            color: #d4af37 !important;
        }

        /* Footer always content chya khali */
        .container-fluid.cream-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer {
            margin-top: auto !important;
        }

        /* Mobile */
        @media (max-width:768px) {
            .footer {
                margin: 1.5rem 15px 20px 15px !important;
                padding: 0.9rem 1rem !important;
            }

            .footer p {
                font-size: 0.8rem;
            }
        }
        
    </style>
</head>

<body class="inner_page widgets">
    <div class="full_container">
        <div class="inner_container">
            <!-- SIDEBAR - Ultra-Premium White Gold Floating Navigation -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <!-- Logo removed as per existing HTML - preserving original structure -->
                    </div>
                    <div class="sidebar_user_info">
                        <div class="user_profle_side">
                            <div class="user_img">
                                <img class="img-responsive" src="images/layout_img/user_img.jpg" alt="User" />
                            </div>
                            <div class="user_info">
                                <h6>ADMIN</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>Governance Panel</h4>
                    <ul class="list-unstyled components">
                        <li><a href="<?= base_url('admin/mla-management') ?>" data-tooltip="MLA Management"><i class="fa fa-users"></i><span>MLA Management</span></a></li>
                        <li><a href="<?= base_url('admin/constituency-management') ?>" data-tooltip="Constituency"><i class="fa fa-map-marker"></i><span>Constituency Management</span></a></li>
                        <li><a href="<?= base_url('admin/complaint-management') ?>" data-tooltip="Complaints"><i class="fa fa-exclamation-circle"></i><span>Complaint Management</span></a></li>
                        <li><a href="<?= base_url('admin/survey-management') ?>" data-tooltip="Surveys"><i class="fa fa-bar-chart"></i><span>Survey Management</span></a></li>
                        <li><a href="<?= base_url('admin/media-library') ?>" data-tooltip="Media"><i class="fa fa-picture-o"></i><span>Media Library</span></a></li>
                        <li><a href="<?= base_url('admin/feedback-dashboard') ?>" data-tooltip="Feedback"><i class="fa fa-comments"></i><span>Feedback Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/activity-logs') ?>" data-tooltip="Logs"><i class="fa fa-history"></i><span>Activity Logs</span></a></li>
                        <li><a href="<?= base_url('admin/voter-management') ?>" data-tooltip="Voters"><i class="fa fa-user"></i><span>Voter Management</span></a></li>
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->

            <div id="content">
                <!-- TOPBAR - Executive White-Gold Glass Pill -->
                <div class="topbar" id="premiumTopbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full d-flex align-items-center w-100">
                            <button type="button" id="sidebarCollapse" class="sidebar-toggle-gold-premium"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section mr-3 d-lg-none d-block">
                                <a href="index.html"><img class="img-responsive" src="images/logo/MLA LOGO.png" alt="#"
                                        style="max-height: 44px;" /></a>
                            </div>
                            <!-- Premium Gold Glass Search Bar -->
                            <div class="search-gold-exec">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Search MLA, constituency, reports..." id="globalSearch">
                            </div>
                            <div class="right_topbar ml-auto">
                                <div class="icon_info d-flex align-items-center">
                                    <ul class="d-flex align-items-center mb-0">
                                        <!-- Live Digital Clock + Date -->
                                        <li>
                                            <div class="clock-luxury-gold">
                                                <div class="clock-time" id="liveClock">--:--:--</div>
                                                <div class="clock-date" id="liveDate">Loading...</div>
                                            </div>
                                        </li>
                                        <!-- Premium Notification Bell -->
                                        <li><a href="<?= base_url('notification-center') ?>" class="notif-gold-luxury"><i
                                                    class="fa fa-bell-o"></i><span
                                                    class="notif-badge-premium">2</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="images/layout_img/user_img.jpg" alt="#" width="38" /><span
                                                    class="name_user">ADMIN</span></a>
                                            <div class="dropdown-menu dropdown-menu-gold-luxury">
                                                
                                                <a class="dropdown-item" href="#"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- EXISTING CONTENT AREA (COMPLETELY PRESERVED - NO MODIFICATIONS) -->
                <div class="container-fluid mt-4">

                    <!-- ====================================== -->
                    <!-- 1. SUMMARY KPI CARDS -->
                    <!-- ====================================== -->
                    <div class="row g-4">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card dashboard-card pulse-card">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-map-marker-alt me-1"></i> Total Constituencies</h6>
                                    <h2 id="totalConstituencies">288</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-user-tie me-1"></i> Assigned MLAs</h6>
                                    <h2 id="assignedMlas">288</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-users me-1"></i> Total Voters</h6>
                                    <h2 id="totalVoters">9.2 Cr</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-check-circle me-1"></i> Total Booths</h6>
                                    <h2 id="totalBooths">98,500</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-layer-group me-1"></i> Total Wards</h6>
                                    <h2 id="totalWards">32,450</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h6><i class="fa-solid fa-chart-line me-1"></i> Active Constituencies</h6>
                                    <h2 id="activeConstituencies">288</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- SEARCH & FILTER -->
                    <!-- ====================================== -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <h4 class="mb-4"><i class="fa-solid fa-filter me-2" style="color: var(--gold);"></i> Search
                                & Filter Constituencies</h4>
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <select class="form-select" id="stateFilter">
                                        <option value="">All States</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Karnataka">Karnataka</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" id="districtFilter">
                                        <option value="">All Districts</option>
                                        <option value="Satara">Satara</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Mumbai">Mumbai</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" id="constituencyFilter">
                                        <option value="">All Constituencies</option>
                                        <option value="Karad North">Karad North</option>
                                        <option value="Satara">Satara</option>
                                        <option value="Patan">Patan</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" id="mlaFilter">
                                        <option value="">All MLAs</option>
                                        <option value="MLA A">MLA A</option>
                                        <option value="MLA B">MLA B</option>
                                        <option value="MLA C">MLA C</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" id="statusFilter">
                                        <option value="">All Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="searchInput"
                                        placeholder="🔍 Search Constituency">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- DISTRICT WISE CHART -->
                    <!-- ====================================== -->
                    <div class="row mt-5">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-chart-column me-2"></i> District-wise Constituencies
                                </div>
                                <div class="card-body">
                                    <canvas id="districtChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-chart-pie me-2"></i> MLA Assignment Status
                                </div>
                                <div class="card-body">
                                    <canvas id="assignmentChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- VOTER ANALYTICS -->
                    <!-- ====================================== -->
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-chart-bar me-2"></i> Top Voter Count Constituencies
                                </div>
                                <div class="card-body">
                                    <canvas id="voterChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-heartbeat me-2"></i> Constituency Health Score
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="healthScoreTable">
                                            <thead>
                                                <tr>
                                                    <th>Constituency</th>
                                                    <th>Health Score</th>
                                                    <th>Progress</th>
                                                </tr>
                                            </thead>
                                            <tbody id="healthScoreBody">
                                                <!-- Dynamic content -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- BOOTH & WARD ANALYTICS -->
                    <!-- ====================================== -->
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-chart-line me-2"></i> Booth Analytics
                                </div>
                                <div class="card-body">
                                    <canvas id="boothChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-chart-line me-2"></i> Ward Analytics
                                </div>
                                <div class="card-body">
                                    <canvas id="wardChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- PERFORMANCE OVERVIEW -->
                    <!-- ====================================== -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <i class="fa-solid fa-chart-simple me-2"></i> Constituency Performance Overview
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="performanceTable">
                                    <thead>
                                        <tr>
                                            <th>Constituency</th>
                                            <th>MLA</th>
                                            <th>Rating</th>
                                            <th>Complaints</th>
                                            <th>Surveys</th>
                                            <th>Resolution Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody id="performanceBody">
                                        <!-- Dynamic content -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- GEO MAP -->
                    <!-- ====================================== -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <i class="fa-solid fa-map me-2"></i> Constituency Geo Mapping
                        </div>
                        <div class="card-body">
                            <div id="map" style="height:450px; width:100%; border-radius:15px;"></div>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- RECENT ACTIVITIES -->
                    <!-- ====================================== -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <i class="fa-solid fa-clock me-2"></i> Recent Activities
                        </div>
                        <div class="card-body">
                            <ul class="timeline" id="recentActivities">
                                <li><i class="fa-solid fa-pen me-2"></i> Karad North Boundary Updated - 10 mins ago</li>
                                <li><i class="fa-solid fa-user-check me-2"></i> MLA Assigned to Satara Constituency - 1
                                    hour ago</li>
                                <li><i class="fa-solid fa-plus me-2"></i> New Ward Added to Pune District - 2 hours ago
                                </li>
                                <li><i class="fa-solid fa-chart-line me-2"></i> Voter Registration Drive Completed - 3
                                    hours ago</li>
                            </ul>
                        </div>
                    </div>

                    <!-- ====================================== -->
                    <!-- CONSTITUENCY MANAGEMENT TABLE -->
                    <!-- ====================================== -->
                    <div class="card mt-5 mb-5">
                        <div class="card-header">
                            <i class="fa-solid fa-table-list me-2"></i> Constituency Management
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="managementTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Constituency</th>
                                            <th>District</th>
                                            <th>MLA</th>
                                            <th>Voters</th>
                                            <th>Booths</th>
                                            <th>Wards</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="managementBody">
                                        <!-- Dynamic content -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- footer -->
                <div class="container-fluid">
                    <div class="footer">
                        <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- end dashboard inner -->
        </div>
    </div>
    </div>
    <script src="header.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/animate.js"></script>
    <!-- select country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
   
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Chart instances
        let districtChart, assignmentChart, voterChart, boothChart, wardChart;
        let map;

        // Counter Animation Function
        function animateCounter(elementId, targetValue, suffix = "") {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const numericValue = typeof targetValue === 'string' ? parseFloat(targetValue) : targetValue;
            const increment = numericValue / 50;

            const timer = setInterval(() => {
                current += increment;
                if (current >= numericValue) {
                    element.textContent = targetValue + suffix;
                    clearInterval(timer);
                } else {
                    if (suffix === "Cr") {
                        element.textContent = current.toFixed(1) + suffix;
                    } else {
                        element.textContent = Math.floor(current) + suffix;
                    }
                }
            }, 20);
        }

        // Initialize counters
        function initCounters() {
            animateCounter("totalConstituencies", 288);
            animateCounter("assignedMlas", 288);
            animateCounter("totalVoters", 9.2, " Cr");
            animateCounter("totalBooths", 98500);
            animateCounter("totalWards", 32450);
            animateCounter("activeConstituencies", 288);
        }

        // Initialize all charts
        function initCharts() {
            // District Chart (Bar)
            const districtCtx = document.getElementById('districtChart').getContext('2d');
            districtChart = new Chart(districtCtx, {
                type: 'bar',
                data: {
                    labels: ['Satara', 'Pune', 'Mumbai', 'Nagpur', 'Nashik', 'Kolhapur'],
                    datasets: [{
                        label: 'Constituencies',
                        data: [12, 18, 24, 14, 16, 10],
                        backgroundColor: '#d4af37',
                        borderRadius: 8
                    }]
                },
                options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'top' } } }
            });

            // Assignment Chart (Doughnut)
            const assignCtx = document.getElementById('assignmentChart').getContext('2d');
            assignmentChart = new Chart(assignCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Assigned', 'Vacant', 'Pending Review'],
                    datasets: [{ data: [275, 8, 5], backgroundColor: ['#d4af37', '#10B981', '#F59E0B'], borderWidth: 0 }]
                },
                options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'bottom' } } }
            });

            // Voter Chart (Bar)
            const voterCtx = document.getElementById('voterChart').getContext('2d');
            voterChart = new Chart(voterCtx, {
                type: 'bar',
                data: {
                    labels: ['Mumbai South', 'Thane', 'Pune Central', 'Nagpur West', 'Nashik East'],
                    datasets: [{ label: 'Voters (Lakhs)', data: [5.2, 4.8, 4.5, 4.2, 3.9], backgroundColor: '#d4af37', borderRadius: 8 }]
                },
                options: { responsive: true, maintainAspectRatio: true, plugins: { legend: { position: 'top' } } }
            });

            // Booth Chart (Line)
            const boothCtx = document.getElementById('boothChart').getContext('2d');
            boothChart = new Chart(boothCtx, {
                type: 'line',
                data: {
                    labels: ['Satara', 'Pune', 'Mumbai', 'Nagpur', 'Nashik'],
                    datasets: [{ label: 'Booths', data: [520, 680, 850, 620, 580], borderColor: '#d4af37', backgroundColor: 'rgba(212, 175, 55, 0.1)', fill: true, tension: 0.4 }]
                },
                options: { responsive: true, maintainAspectRatio: true }
            });

            // Ward Chart (Line)
            const wardCtx = document.getElementById('wardChart').getContext('2d');
            wardChart = new Chart(wardCtx, {
                type: 'line',
                data: {
                    labels: ['Satara', 'Pune', 'Mumbai', 'Nagpur', 'Nashik'],
                    datasets: [{ label: 'Wards', data: [185, 245, 310, 210, 195], borderColor: '#10B981', backgroundColor: 'rgba(16, 185, 129, 0.1)', fill: true, tension: 0.4 }]
                },
                options: { responsive: true, maintainAspectRatio: true }
            });
        }

        // Populate Health Score Table
        function populateHealthScore() {
            const scores = [
                { name: "Karad North", score: 92 },
                { name: "Satara", score: 88 },
                { name: "Patan", score: 85 },
                { name: "Pune Central", score: 90 },
                { name: "Mumbai South", score: 87 }
            ];

            document.getElementById("healthScoreBody").innerHTML = scores.map(s => `
            <tr>
                <td><i class="fa-solid fa-map-pin me-2" style="color: var(--gold);"></i> ${s.name}</td>
                <td style="font-weight: 700;">${s.score}%</td>
                <td style="width: 40%;"><div class="progress"><div class="progress-bar" style="width: ${s.score}%"></div></div></td>
            </tr>
        `).join('');
        }

        // Populate Performance Table
        function populatePerformance() {
            const performances = [
                { constituency: "Karad North", mla: "MLA A", rating: 4.7, complaints: 120, surveys: 850, resolution: 92 },
                { constituency: "Satara", mla: "MLA B", rating: 4.5, complaints: 98, surveys: 720, resolution: 88 },
                { constituency: "Patan", mla: "MLA C", rating: 4.3, complaints: 145, surveys: 650, resolution: 85 },
                { constituency: "Pune Central", mla: "MLA D", rating: 4.8, complaints: 85, surveys: 920, resolution: 94 },
                { constituency: "Mumbai South", mla: "MLA E", rating: 4.6, complaints: 110, surveys: 780, resolution: 90 }
            ];

            document.getElementById("performanceBody").innerHTML = performances.map(p => `
            <tr>
                <td>${p.constituency}</td>
                <td><i class="fa-solid fa-user-tie me-1"></i> ${p.mla}</td>
                <td><span class="badge" style="background: var(--gold); color: white;">${p.rating} ⭐</span></td>
                <td>${p.complaints}</td>
                <td>${p.surveys}</td>
                <td><div class="progress" style="width: 80px;"><div class="progress-bar" style="width: ${p.resolution}%"></div></div> ${p.resolution}%</td>
            </tr>
        `).join('');
        }

        // Populate Management Table
        function populateManagementTable() {
            const constituencies = [
                { id: 1, name: "Karad North", district: "Satara", mla: "MLA A", voters: "3,25,000", booths: 420, wards: 135 },
                { id: 2, name: "Satara", district: "Satara", mla: "MLA B", voters: "2,80,000", booths: 380, wards: 120 },
                { id: 3, name: "Patan", district: "Satara", mla: "MLA C", voters: "2,45,000", booths: 340, wards: 108 },
                { id: 4, name: "Pune Central", district: "Pune", mla: "MLA D", voters: "3,50,000", booths: 450, wards: 145 },
                { id: 5, name: "Mumbai South", district: "Mumbai", mla: "MLA E", voters: "4,20,000", booths: 520, wards: 168 }
            ];

            document.getElementById("managementBody").innerHTML = constituencies.map(c => `
            <tr>
                <td>${c.id}</td>
                <td>${c.name}</td><td>${c.district}</td><td>${c.mla}</td><td>${c.voters}</td><td>${c.booths}</td><td>${c.wards}</td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="viewConstituency(${c.id})"><i class="fa-solid fa-eye"></i></button>
                    <button class="btn btn-warning btn-sm" onclick="editConstituency(${c.id})"><i class="fa-solid fa-pen"></i></button>
                    <button class="btn btn-success btn-sm" onclick="viewMap(${c.id})"><i class="fa-solid fa-map"></i></button>
                    <button class="btn btn-primary btn-sm" onclick="viewAnalytics(${c.id})"><i class="fa-solid fa-chart-line"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="deleteConstituency(${c.id})"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        `).join('');
        }

        // Initialize Map
        function initMap() {
            map = L.map('map').setView([19.0760, 72.8777], 7);
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OSM</a> contributors'
            }).addTo(map);

            // Add markers for constituencies
            const constituencies = [
                { name: "Karad North", lat: 17.2899, lng: 74.1819 },
                { name: "Satara", lat: 17.6919, lng: 74.0000 },
                { name: "Pune", lat: 18.5204, lng: 73.8567 },
                { name: "Mumbai", lat: 19.0760, lng: 72.8777 },
                { name: "Nagpur", lat: 21.1458, lng: 79.0882 }
            ];

            constituencies.forEach(c => {
                const marker = L.marker([c.lat, c.lng]).addTo(map);
                marker.bindPopup(`<b>${c.name} Constituency</b><br>Click for details`);
            });
        }

        // Action Functions
        function viewConstituency(id) { alert(`View details for Constituency ID: ${id}`); }
        function editConstituency(id) { alert(`Edit Constituency ID: ${id}`); }
        function viewMap(id) { alert(`Open map for Constituency ID: ${id}`); }
        function viewAnalytics(id) { alert(`View analytics for Constituency ID: ${id}`); }
        function deleteConstituency(id) { if (confirm(`Delete Constituency ID: ${id}?`)) alert(`Constituency ${id} deleted`); }

        // Add card click handlers
        function addCardHandlers() {
            const cards = document.querySelectorAll('.dashboard-card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const title = card.querySelector('h6')?.innerText || 'Card';
                    const value = card.querySelector('h2')?.innerText || '';
                    alert(`${title}\nCurrent Value: ${value}`);
                });
            });
        }

        // Initialize everything
        document.addEventListener("DOMContentLoaded", function () {
            initCharts();
            populateHealthScore();
            populatePerformance();
            populateManagementTable();
            initCounters();
            initMap();
            addCardHandlers();

            // Add floating class to first card
            document.querySelector('.dashboard-card')?.classList.add('floating');

            // Add search functionality
            document.getElementById('searchInput')?.addEventListener('keyup', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#managementBody tr');
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>

</body>

</html>