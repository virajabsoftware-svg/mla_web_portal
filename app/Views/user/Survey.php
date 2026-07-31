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

        .survey_dashboard {
            width: 100%;
            max-width: 100%;
        }

        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            width: 100%;
        }

        [class*="col-"] {
            padding-left: 12px !important;
            padding-right: 12px !important;
        }

        .dashboard-card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
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

        .dashboard-card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .dashboard-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lift), 0 0 0 2px rgba(195, 200, 72, 0.2);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .stat-card { cursor: pointer; }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }
        .card-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
        }

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

        .badge.bg-success {
            background: var(--olive-green) !important;
            font-weight: 500;
            padding: 5px 14px;
        }
        .rounded-pill {
            border-radius: 50px !important;
        }

        .progress-bar-custom {
            background: rgba(195, 200, 72, 0.2);
            border-radius: 20px;
            height: 8px;
            overflow: hidden;
        }
        .progress-fill {
            background: linear-gradient(90deg, var(--lime-gold), var(--olive-green));
            border-radius: 20px;
            height: 100%;
            width: 0%;
            transition: width 0.5s ease;
            position: relative;
            overflow: hidden;
        }
        .progress-fill::after {
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
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .step-indicator {
            background: rgba(195, 200, 72, 0.15);
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--teal-blue);
        }

        .form-label {
            font-weight: 600;
            color: var(--teal-blue);
            margin-bottom: 8px;
            display: block;
        }
        .form-control, .form-select {
            background: white;
            border: 1px solid rgba(195, 200, 72, 0.6);
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.9rem;
            transition: all 0.2s;
            width: 100%;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--lime-gold);
            box-shadow: 0 0 0 3px rgba(195, 200, 72, 0.3);
            outline: none;
        }
        .form-control.bg-light {
            background: rgba(195, 200, 72, 0.1);
        }

        .question-item {
            background: rgba(195, 200, 72, 0.05);
            border-radius: 20px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.25rem;
            transition: all 0.2s;
            border: 1px solid rgba(195, 200, 72, 0.2);
        }
        .question-text {
            font-weight: 700;
            color: var(--teal-blue);
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .alert-light {
            background: rgba(195, 200, 72, 0.1);
            border: 1px solid rgba(195, 200, 72, 0.2);
            border-radius: 16px;
            color: var(--teal-blue);
        }
        .text-muted {
            color: var(--dark-olive) !important;
            opacity: 0.7;
        }

        .btn-navigate {
            border-radius: 40px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-prev {
            background: rgba(195, 200, 72, 0.15);
            color: var(--teal-blue);
            border: 1px solid rgba(195, 200, 72, 0.3);
        }
        .btn-prev:hover {
            background: rgba(195, 200, 72, 0.25);
            transform: translateX(-3px);
        }
        .btn-next {
            background: linear-gradient(95deg, var(--lime-gold), var(--olive-green));
            color: #1F3F3A;
            position: relative;
            overflow: hidden;
        }
        .btn-next::after, .btn-submit-modern::after {
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
        .btn-next:hover::after, .btn-submit-modern:hover::after {
            left: 100%;
            opacity: 0.8;
        }
        .btn-next:hover {
            transform: translateX(3px);
        }

        .btn-submit-modern {
            background: linear-gradient(95deg, var(--olive-green), #8ab33a);
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            padding: 12px 32px;
            border-radius: 40px;
        }
        .btn-submit-modern:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(107, 138, 34, 0.3);
        }
        button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 0.5rem;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 8px 16px;
            background: rgba(195, 200, 72, 0.08);
            border-radius: 40px;
            border: 1px solid rgba(195, 200, 72, 0.3);
            transition: all 0.2s;
            cursor: pointer;
        }
        .radio-option:hover {
            background: rgba(195, 200, 72, 0.15);
            border-color: var(--lime-gold);
        }
        .radio-option input {
            margin: 0;
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: var(--olive-green);
        }
        .radio-option label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
            color: var(--dark-olive);
        }

        .fade-page-transition {
            animation: pageFade 0.5s ease-out;
        }
        @keyframes pageFade {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUpSlide 0.6s ease-out forwards;
        }
        @keyframes fadeUpSlide {
            to { opacity: 1; transform: translateY(0); }
        }

        .stat-card-1 { animation-delay: 0.05s; }
        .stat-card-2 { animation-delay: 0.1s; }
        .stat-card-3 { animation-delay: 0.15s; }
        .stat-card-4 { animation-delay: 0.2s; }

        @media (max-width: 1024px) {
            .main-content { padding: 1.25rem 1.5rem; }
            .stat-number { font-size: 2rem; }
        }
        @media (max-width: 768px) {
            .main-content { padding: 1rem 1.25rem; margin-left: 0; }
            body.sidebar-collapsed .main-content { margin-left: 0; }
            .stat-number { font-size: 1.75rem; }
            .btn-navigate { padding: 8px 18px; font-size: 0.85rem; }
        }
        @media (max-width: 576px) {
            .main-content { padding: 0.875rem 1rem; }
            .stat-number { font-size: 1.5rem; }
            .form-control, .form-select { padding: 8px 12px; }
            .btn-submit-modern { width: 100%; }
            .radio-group { flex-direction: column; gap: 0.5rem; }
        }
        @media (min-width: 1920px) {
            .main-content { padding: 2rem 2.5rem; }
        }

        body.sidebar-expanded .main-content { margin-left: 280px; }
        body.sidebar-collapsed .main-content { margin-left: 80px; }

        .fw-semibold { font-weight: 600; }
        .fw-bold { font-weight: 700; }
        .me-1 { margin-right: 0.25rem; }
        .me-2 { margin-right: 0.5rem; }
        .ms-2 { margin-left: 0.5rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }
        .mb-0 { margin-bottom: 0; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mb-5 { margin-bottom: 3rem; }
        .px-3 { padding-left: 1rem; padding-right: 1rem; }
        .px-4 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .gap-2 { gap: 0.5rem; }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .small { font-size: 0.8rem; }
        .border-0 { border: none !important; }
        .bi { display: inline-block; }
        .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 100% !important;
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
        @media (max-width: 768px) {
            .footer { padding: 15px; border-radius: 18px; margin-top: 1.5rem; }
            .footer p { font-size: 0.85rem; line-height: 1.6; }
        }
    </style>
</head>

<body>
    <div class="animated-bg"></div>
    <div class="particles-bg" id="particles"></div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

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
        <div class="container-fluid survey_dashboard px-3 px-lg-4">

            <!-- STATISTICS ROW -->
            <div class="row g-4 mb-5">
                <div class="col-xl-3 col-md-6 fade-up stat-card-1">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="activeSurveysCount">12</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-bar-chart-steps me-1"></i> Active
                                Surveys</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-card-2">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="participatedCount">28</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-people-fill me-1"></i> Participated
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-card-3">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="pendingCount">4</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-hourglass-split me-1"></i> Pending
                                Response</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-card-4">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="participationRate">92</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-graph-up me-1"></i> Participation
                                Rate%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACTIVE SURVEYS TABLE -->
            <div class="card border-0 shadow-sm dashboard-card mb-4 fade-up">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-clipboard-data-fill me-2 text-primary"></i> Active
                        Constituency Surveys</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Survey ID</th>
                                    <th>Survey Title</th>
                                    <th>MLA</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">SUR001</td>
                                    <td>Road Development Survey</td>
                                    <td>MLA501</td>
                                    <td>15-Jun-2026</td>
                                    <td><span class="badge bg-success rounded-pill px-3">Active</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">SUR002</td>
                                    <td>Water Supply Feedback</td>
                                    <td>MLA501</td>
                                    <td>20-Jun-2026</td>
                                    <td><span class="badge bg-success rounded-pill px-3">Active</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">SUR003</td>
                                    <td>Drainage & Sanitation</td>
                                    <td>MLA501</td>
                                    <td>25-Jun-2026</td>
                                    <td><span class="badge bg-success rounded-pill px-3">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- STEPPER SURVEY FORM -->
            <div class="card border-0 shadow-lg dashboard-card mb-4 fade-up" id="responseFormCard">
                <div class="card-header bg-white border-0 pt-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold"><i class="bi bi-send-check-fill me-2 text-success"></i> Submit Survey
                            Response</h5>
                        <div class="step-indicator mt-2 mt-sm-0"><span id="questionCounter">1</span> / <span
                                id="totalQuestions">12</span> Questions</div>
                    </div>
                    <div class="progress-bar-custom mt-3">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="surveyResponseForm">
                        <div class="row g-3 mb-4">
                            <div class="col-md-3"><label class="form-label fw-semibold"><i class="bi bi-upc-scan"></i>
                                    Survey ID</label><input type="text" class="form-control bg-light" id="surveyIdField"
                                    value="SUR001" readonly></div>
                            <div class="col-md-3"><label class="form-label fw-semibold"><i
                                        class="bi bi-person-badge"></i> Voter ID</label><input type="text"
                                    class="form-control bg-light" id="voterIdField" value="VTR10254" readonly></div>
                            <div class="col-md-3"><label class="form-label fw-semibold"><i class="bi bi-building"></i>
                                    MLA ID</label><input type="text" class="form-control bg-light" id="mlaIdField"
                                    value="MLA501" readonly></div>
                            <div class="col-md-3"><label class="form-label fw-semibold"><i
                                        class="bi bi-calendar-event"></i> Submission</label><input type="datetime-local"
                                    class="form-control bg-light" id="submissionTimestamp" readonly></div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-3"><label class="form-label fw-semibold"><i
                                        class="bi bi-geo-alt-fill"></i> District</label><select class="form-select"
                                    id="districtSelect" required>
                                    <option value="">Select District</option>
                                    <option>Satara</option>
                                    <option>Pune</option>
                                    <option>Kolhapur</option>
                                    <option>Sangli</option>
                                    <option>Nashik</option>
                                </select></div>
                            <div class="col-md-3"><label class="form-label fw-semibold"><i
                                        class="bi bi-pin-map-fill"></i> Constituency</label><select class="form-select"
                                    id="constituencySelect" required>
                                    <option value="">Select Constituency</option>
                                    <option>Wai</option>
                                    <option>Karad</option>
                                    <option>Satara</option>
                                    <option>Koregaon</option>
                                    <option>Pachgani</option>
                                </select></div>
                            <div class="col-md-3"><label class="form-label fw-semibold"><i
                                        class="bi bi-house-heart"></i> Village / Town</label><input type="text"
                                    class="form-control" id="villageInput" placeholder="Enter Village Name" required>
                            </div>
                            <div class="col-md-3"><label class="form-label fw-semibold"><i class="bi bi-file-text"></i>
                                    Survey Category</label><select class="form-select" id="surveyTypeSelect" required>
                                    <option value="">Select Survey Type</option>
                                    <option value="Election Survey">Election Survey</option>
                                    <option value="Road Development Survey">Road Development Survey</option>
                                    <option value="Water Supply Survey">Water Supply Survey</option>
                                    <option value="Drainage Survey">Drainage Survey</option>
                                    <option value="Street Light Survey">Street Light Survey</option>
                                    <option value="Sanitation Survey">Sanitation Survey</option>
                                    <option value="Health Survey">Health Survey</option>
                                    <option value="Agriculture Survey">Agriculture Survey</option>
                                    <option value="Education Survey">Education Survey</option>
                                    <option value="Employment Survey">Employment Survey</option>
                                    <option value="Smart Village Survey">Smart Village Survey</option>
                                    <option value="MLA Performance Survey">MLA Performance Survey</option>
                                    <option value="Infrastructure Survey">Infrastructure Survey</option>
                                </select></div>
                        </div>

                        <div id="questionContainer" class="mb-4"></div>

                        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">
                            <button type="button" id="prevBtn" class="btn btn-navigate btn-prev"><i
                                    class="bi bi-arrow-left"></i> Previous</button>
                            <div class="text-muted small fst-italic">⚡ Step <span id="stepNumber">1</span> of <span
                                    id="totalSteps">12</span></div>
                            <button type="button" id="nextBtn" class="btn btn-navigate btn-next">Next <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>

                        <div class="text-end mt-4" id="submitBtnWrapper" style="display: none;">
                            <button type="submit" class="btn btn-submit-modern px-5 py-2 rounded-pill shadow-sm"><i
                                    class="bi bi-check-circle me-2"></i> Submit Response</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SURVEY HISTORY -->
            <div class="card border-0 shadow-sm dashboard-card mb-4 fade-up">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-secondary"></i> Survey History</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Survey ID</th>
                                    <th>Survey Title</th>
                                    <th>Selected Answer</th>
                                    <th>Submission Date</th>
                                </tr>
                            </thead>
                            <tbody id="historyTableBody">
                                <tr>
                                    <td>SUR001</td>
                                    <td>Road Development</td>
                                    <td>Excellent</td>
                                    <td>02-Jun-2026</td>
                                </tr>
                                <tr>
                                    <td>SUR009</td>
                                    <td>Water Supply</td>
                                    <td>Good</td>
                                    <td>25-May-2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- MLA ANALYTICS -->
            <div class="card border-0 shadow-sm dashboard-card fade-up">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-graph-up me-2 text-info"></i> MLA Survey Analytics</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="totalResponsesAnalytics">12540</h2>
                            <p class="text-muted">Total Responses</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="participationRateAnalytics">78</h2>
                            <p class="text-muted">Participation Rate%</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="citizenRatingAnalytics">4.6</h2>
                            <p class="text-muted">Avg Rating</p>
                        </div>
                        <div class="col-md-3">
                            <h2 class="fw-bold counter-number" id="positiveFeedbackAnalytics">91</h2>
                            <p class="text-muted">Positive Feedback%</p>
                        </div>
                    </div>
                    <div class="alert alert-light text-center small mt-2">📊 Real-time analytics refresh on each new
                        submission</div>
                </div>
            </div>
        </div>
        <footer class="footer">
          <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </footer>
    </main>

    <script>
        // ================================================================
        // 1. SURVEY QUESTIONS (13 categories, 12 questions each)
        //    Structure matches original: { text, type, options/placeholder }
        //    Types: "select", "text", "textarea", "rating"
        // ================================================================
        const QUESTIONS_BY_CATEGORY = {
            // 1. Election Survey
            "Election Survey": [
                { text: "1. मतदान केंद्रांची व्यवस्था समाधानकारक होती का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "सुधारणा हवी"] },
                { text: "2. मतदान प्रक्रिया पारदर्शक होती का?", type: "select", options: ["निवडा", "होय, पूर्णपणे", "काही प्रमाणात", "नाही", "माहिती नाही"] },
                { text: "3. मतदानासाठी पुरेशी सुरक्षा व्यवस्था होती का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. मतदान केंद्रावर कर्मचारी सहकार्य करत होते का?", type: "select", options: ["निवडा", "खूप चांगले", "समाधानकारक", "असमाधानकारक", "खूप वाईट"] },
                { text: "5. मतदानासाठी लागणारा वेळ योग्य होता का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. मतदार यादी अचूक होती का?", type: "select", options: ["निवडा", "होय, पूर्णपणे", "बहुतांश", "अचूक नव्हती", "माहिती नाही"] },
                { text: "7. मतदान केंद्र सहज उपलब्ध होते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. दिव्यांग मतदारांसाठी सुविधा उपलब्ध होत्या का?", type: "select", options: ["निवडा", "होय", "नाही", "अंशतः"] },
                { text: "9. निवडणूक माहिती वेळेवर मिळाली का?", type: "select", options: ["निवडा", "होय", "नाही", "उशीरा"] },
                { text: "10. मतदान प्रक्रियेवर विश्वास आहे का?", type: "select", options: ["निवडा", "होय, पूर्ण", "काही प्रमाणात", "नाही", "अनिश्चित"] },
                { text: "11. निवडणुकीत कोणताही गैरप्रकार दिसला का?", type: "select", options: ["निवडा", "नाही", "होय, थोडा", "होय, मोठा"] },
                { text: "12. एकूण निवडणूक व्यवस्थेबद्दल तुमचे समाधान किती आहे?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 2. Road Development Survey
            "Road Development Survey": [
                { text: "1. रस्त्यांची गुणवत्ता कशी आहे?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. रस्त्यांवर खड्डे आहेत का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बरेच", "सर्व ठिकाणी"] },
                { text: "3. रस्त्यांची नियमित देखभाल होते का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "4. मुख्य रस्ते स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. वाहतूक सुरळीत चालते का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "सतत अडथळे", "अतिशय वाईट"] },
                { text: "6. रस्त्यांवर दिशा दर्शक फलक आहेत का?", type: "select", options: ["निवडा", "होय, पुरेसे", "काही ठिकाणी", "फार कमी", "अजिबात नाही"] },
                { text: "7. पावसाळ्यात रस्त्यांची स्थिती चांगली राहते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. नवीन रस्त्यांची कामे वेळेवर पूर्ण होतात का?", type: "select", options: ["निवडा", "होय", "नाही", "उशीरा", "माहिती नाही"] },
                { text: "9. पादचारी मार्ग उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "10. रस्त्यांवरील अपघात कमी झाले आहेत का?", type: "select", options: ["निवडा", "होय, लक्षणीय", "काही प्रमाणात", "नाही", "वाढले आहेत"] },
                { text: "11. रस्ते सुरक्षित वाटतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण रस्ते विकासाबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 3. Water Supply Survey
            "Water Supply Survey": [
                { text: "1. नियमित पाणीपुरवठा होतो का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "अनियमित", "अजिबात नाही"] },
                { text: "2. पिण्याच्या पाण्याची गुणवत्ता चांगली आहे का?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "3. पाणीपुरवठा पुरेशा प्रमाणात होतो का?", type: "select", options: ["निवडा", "होय, पुरेसा", "कमी", "अपुरा", "अतिशय कमी"] },
                { text: "4. पाणी वेळेवर मिळते का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "5. पाणीपुरवठ्यात वारंवार अडथळे येतात का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "वारंवार", "सतत"] },
                { text: "6. गळतीची समस्या आहे का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "मोठ्या प्रमाणात"] },
                { text: "7. पाणीपुरवठा विभाग तक्रारी सोडवतो का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "8. उन्हाळ्यात पाणी उपलब्ध असते का?", type: "select", options: ["निवडा", "होय, पुरेसे", "कमी", "अपुरे", "अजिबात नाही"] },
                { text: "9. पाण्याचा दाब योग्य असतो का?", type: "select", options: ["निवडा", "होय", "कमी", "जास्त", "अनियमित"] },
                { text: "10. पाणी बिल योग्य आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "जास्त", "कमी"] },
                { text: "11. पाणी साठवण सुविधा पुरेशा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरी"] },
                { text: "12. एकूण पाणीपुरवठ्याबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 4. Drainage Survey
            "Drainage Survey": [
                { text: "1. ड्रेनेज व्यवस्था चांगली आहे का?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. पावसाळ्यात पाणी साचते का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बर्याच ठिकाणी", "सर्व ठिकाणी"] },
                { text: "3. नाले नियमित साफ केले जातात का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "4. सांडपाणी योग्यरित्या वाहून जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. दुर्गंधीची समस्या आहे का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "नेहमी", "तीव्र"] },
                { text: "6. ड्रेनेज ब्लॉकेज वारंवार होते का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "वारंवार", "सतत"] },
                { text: "7. तक्रारींवर तत्काळ कारवाई होते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. नवीन ड्रेनेज लाईनची गरज आहे का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बर्याच ठिकाणी", "सर्व ठिकाणी"] },
                { text: "9. पूरस्थिती कमी झाली आहे का?", type: "select", options: ["निवडा", "होय, लक्षणीय", "काही प्रमाणात", "नाही", "वाढली आहे"] },
                { text: "10. ड्रेनेजमुळे आरोग्य समस्या निर्माण होतात का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "नेहमी", "गंभीर"] },
                { text: "11. ड्रेनेजची देखभाल नियमित होते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "12. एकूण ड्रेनेज व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 5. Street Light Survey
            "Street Light Survey": [
                { text: "1. सर्व रस्त्यांवर स्ट्रीट लाईट आहेत का?", type: "select", options: ["निवडा", "होय, सर्व", "बहुतांश", "काही ठिकाणी", "अजिबात नाही"] },
                { text: "2. रात्री लाईट व्यवस्थित चालू असतात का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "3. खराब लाईट वेळेवर दुरुस्त होतात का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "4. सार्वजनिक ठिकाणी पुरेसा प्रकाश आहे का?", type: "select", options: ["निवडा", "होय, पुरेसा", "कमी", "अपुरा", "अजिबात नाही"] },
                { text: "5. महिलांसाठी रात्री सुरक्षित वातावरण आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. नवीन लाईटची गरज आहे का?", type: "select", options: ["निवडा", "नाही", "काही ठिकाणी", "बर्याच ठिकाणी", "सर्व ठिकाणी"] },
                { text: "7. एलईडी लाईटचा वापर केला जातो का?", type: "select", options: ["निवडा", "होय, सर्व", "बहुतांश", "काही ठिकाणी", "अजिबात नाही"] },
                { text: "8. तक्रारींवर तत्काळ प्रतिसाद मिळतो का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "9. अंधारे भाग कमी झाले आहेत का?", type: "select", options: ["निवडा", "होय, लक्षणीय", "काही प्रमाणात", "नाही", "वाढले आहेत"] },
                { text: "10. वीज बचतीची व्यवस्था आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "माहिती नाही"] },
                { text: "11. स्ट्रीट लाईटची देखभाल नियमित होते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "12. एकूण स्ट्रीट लाईट सुविधेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 6. Sanitation Survey
            "Sanitation Survey": [
                { text: "1. परिसर स्वच्छ ठेवला जातो का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "2. नियमित कचरा संकलन होते का?", type: "select", options: ["निवडा", "होय, नियमित", "कधी कधी", "अनियमित", "अजिबात नाही"] },
                { text: "3. सार्वजनिक शौचालये स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. कचरा वेळेवर उचलला जातो का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "5. रस्त्यावर कचरा पडलेला दिसतो का?", type: "select", options: ["निवडा", "नाही", "कधी कधी", "नेहमी", "मोठ्या प्रमाणात"] },
                { text: "6. डासांची समस्या आहे का?", type: "select", options: ["निवडा", "नाही", "कमी", "मध्यम", "गंभीर"] },
                { text: "7. स्वच्छता कर्मचारी नियमित येतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. कचरा वर्गीकरण केले जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. सार्वजनिक ठिकाणे स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. स्वच्छतेबद्दल जनजागृती आहे का?", type: "select", options: ["निवडा", "होय, चांगली", "काही प्रमाणात", "फार कमी", "अजिबात नाही"] },
                { text: "11. तक्रारींवर कारवाई होते का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "12. एकूण स्वच्छता व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 7. Health Survey
            "Health Survey": [
                { text: "1. सरकारी आरोग्य सेवा सहज उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "2. डॉक्टर वेळेवर उपलब्ध असतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "3. औषधे सहज मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. रुग्णालये स्वच्छ आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. आपत्कालीन सेवा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. लसीकरण सेवा योग्य आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. आरोग्य केंद्रात पुरेसे कर्मचारी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरे"] },
                { text: "8. तपासणी सुविधा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. माता-बाल आरोग्य सेवा चांगली आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. आरोग्य तक्रारींवर तत्काळ उपचार मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "11. आरोग्य योजनांची माहिती मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण आरोग्य सेवेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 8. Agriculture Survey
            "Agriculture Survey": [
                { text: "1. सिंचन सुविधा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय, पुरेशा", "कमी", "अपुरा", "अजिबात नाही"] },
                { text: "2. खत वेळेवर मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "3. बियाणे दर्जेदार मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. सरकारी योजना मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. पीक विम्याचा लाभ मिळतो का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "6. शेतीसाठी वीज पुरवठा पुरेसा आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरा"] },
                { text: "7. कृषी अधिकारी मदत करतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. बाजारभाव योग्य मिळतो का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. साठवण सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरी"] },
                { text: "10. शेतीसाठी कर्ज सहज मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "अवघड"] },
                { text: "11. आधुनिक तंत्रज्ञानाचा वापर होतो का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण कृषी सुविधेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 9. Education Survey
            "Education Survey": [
                { text: "1. शाळांची गुणवत्ता चांगली आहे का?", type: "select", options: ["निवडा", "उत्तम", "चांगली", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. शिक्षक नियमित उपस्थित असतात का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "3. वर्गखोल्या पुरेशा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरा"] },
                { text: "4. डिजिटल शिक्षण उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. विद्यार्थ्यांना आवश्यक सुविधा मिळतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. ग्रंथालय उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही"] },
                { text: "7. प्रयोगशाळा सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "अपुरी"] },
                { text: "8. शिष्यवृत्ती वेळेवर मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "9. खेळाची सुविधा आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. शाळा सुरक्षित आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "11. पालक-शिक्षक संवाद चांगला आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण शिक्षण व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 10. Employment Survey
            "Employment Survey": [
                { text: "1. स्थानिक रोजगाराच्या संधी आहेत का?", type: "select", options: ["निवडा", "होय, चांगल्या", "कमी", "फार कमी", "अजिबात नाही"] },
                { text: "2. सरकारी रोजगार योजना प्रभावी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "3. कौशल्य विकास प्रशिक्षण मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. बेरोजगारांसाठी मदत उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. उद्योगांना प्रोत्साहन दिले जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. रोजगार मेळावे आयोजित होतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "7. महिलांसाठी रोजगार संधी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. युवकांसाठी प्रशिक्षण उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. स्वरोजगारासाठी मदत मिळते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. रोजगार कार्यालय प्रभावी आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "11. नवीन उद्योग येत आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण रोजगार व्यवस्थेबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 11. Smart Village Survey
            "Smart Village Survey": [
                { text: "1. गावात मोफत Wi-Fi उपलब्ध आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "2. ऑनलाइन सरकारी सेवा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "3. CCTV सुरक्षा व्यवस्था आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "4. डिजिटल पेमेंटचा वापर होतो का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. ई-गव्हर्नन्स सेवा प्रभावी आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. स्मार्ट पाणी व्यवस्थापन आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. सौर ऊर्जा वापरली जाते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. स्मार्ट शिक्षण सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. स्मार्ट आरोग्य सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. डिजिटल माहिती फलक आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "11. पर्यावरणपूरक सुविधा आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण स्मार्ट व्हिलेज विकासाबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 12. MLA Performance Survey
            "MLA Performance Survey": [
                { text: "1. आमदार नागरिकांना सहज भेटतात का?", type: "select", options: ["निवडा", "होय, नेहमी", "कधी कधी", "क्वचित", "अजिबात नाही"] },
                { text: "2. जनतेच्या तक्रारींवर कारवाई करतात का?", type: "select", options: ["निवडा", "होय, त्वरित", "कधी कधी", "उशीरा", "अजिबात नाही"] },
                { text: "3. विकासकामे वेळेत पूर्ण करतात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. मतदारसंघात नियमित भेट देतात का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "5. शिक्षण क्षेत्रात योगदान दिले आहे का?", type: "select", options: ["निवडा", "होय, चांगले", "काही प्रमाणात", "नाही", "माहिती नाही"] },
                { text: "6. आरोग्य सुविधांमध्ये सुधारणा केली आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. रस्ते विकासासाठी काम केले आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "8. पाणीपुरवठा सुधारला आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. रोजगार निर्मितीसाठी प्रयत्न केले आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "10. भ्रष्टाचारमुक्त कामकाज आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "11. जनतेशी संवाद प्रभावी आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण आमदारांच्या कामगिरीबद्दल तुमचे समाधान किती आहे?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ],
            // 13. Infrastructure Survey
            "Infrastructure Survey": [
                { text: "1. सार्वजनिक पायाभूत सुविधा चांगल्या आहेत का?", type: "select", options: ["निवडा", "उत्तम", "चांगल्या", "मध्यम", "खराब", "अतिशय खराब"] },
                { text: "2. रस्ते आणि पूल सुरक्षित आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "3. सार्वजनिक वाहतूक सुविधा योग्य आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "4. बसस्थानके व्यवस्थित आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "5. रेल्वे सुविधा समाधानकारक आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "6. सार्वजनिक इमारतींची देखभाल होते का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "7. वीज पुरवठा नियमित आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "कधी कधी"] },
                { text: "8. इंटरनेट सुविधा चांगली आहे का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "9. पादचारी सुविधा उपलब्ध आहेत का?", type: "select", options: ["निवडा", "होय", "नाही", "काही ठिकाणी"] },
                { text: "10. नवीन विकासकामे वेळेवर पूर्ण होतात का?", type: "select", options: ["निवडा", "होय", "नाही", "उशीरा"] },
                { text: "11. नागरिकांच्या गरजेनुसार सुविधा वाढवल्या जातात का?", type: "select", options: ["निवडा", "होय", "नाही", "काही प्रमाणात"] },
                { text: "12. एकूण पायाभूत सुविधांबद्दल समाधान आहे का?", type: "select", options: ["निवडा", "खूप समाधानी", "समाधानी", "असमाधानी", "खूप असमाधानी"] }
            ]
        };

        // ================================================================
        // 2. APPLICATION LOGIC - Stepper based on selected category
        // ================================================================
        let currentQIndex = 0;
        let currentCategory = '';
        let currentQuestions = [];
        let answersArray = [];

        // Storage & analytics globals
        let surveyHistory = [
            { surveyId: "SUR001", surveyTitle: "Road Development", selectedAnswer: "Excellent | Rating: 8/10", submissionDate: "02-Jun-2026" },
            { surveyId: "SUR009", surveyTitle: "Water Supply", selectedAnswer: "Good | Rating: 7/10", submissionDate: "25-May-2026" }
        ];
        let ratingValues = [8, 7];
        let positiveFlags = [true, true];

        // DOM Elements
        const questionContainer = document.getElementById('questionContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitWrapper = document.getElementById('submitBtnWrapper');
        const progressFill = document.getElementById('progressFill');
        const questionCounterSpan = document.getElementById('questionCounter');
        const totalQuestionsSpan = document.getElementById('totalQuestions');
        const stepNumberSpan = document.getElementById('stepNumber');
        const totalStepsSpan = document.getElementById('totalSteps');
        const timestampField = document.getElementById('submissionTimestamp');
        const surveyTypeSelect = document.getElementById('surveyTypeSelect');

        // Helper: timestamp
        function setCurrentTimestamp() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            timestampField.value = `${year}-${month}-${day}T${hours}:${minutes}`;
        }
        setCurrentTimestamp();
        setInterval(setCurrentTimestamp, 60000);

        // Escape HTML
        function escapeHtml(str) { if (!str) return ''; return str.replace(/[&<>]/g, m => m === '&' ? '&amp;' : (m === '<' ? '&lt;' : '&gt;')); }

        // Get questions for selected category
        function getQuestionsForCategory(category) {
            return QUESTIONS_BY_CATEGORY[category] || [];
        }

        // Render current question based on category
        function renderCurrentQuestion() {
            if (!currentCategory || currentQuestions.length === 0) {
                questionContainer.innerHTML = `
                    <div class="alert alert-light text-center py-4" style="border-radius: 20px; border: 1px dashed var(--lime-gold);">
                        <i class="fas fa-info-circle me-2" style="color: var(--teal-blue);"></i>
                        <strong>Select a Survey Category</strong> to see questions.
                    </div>
                `;
                updateProgressAndButtons();
                return;
            }

            const q = currentQuestions[currentQIndex];
            if (!q) {
                questionContainer.innerHTML = `<div class="alert alert-danger">Question not found</div>`;
                return;
            }

            let html = `<div class="question-item">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="fw-bold" style="color: var(--teal-blue);">${currentQIndex + 1}</span>
                    <h5 class="mb-0 fw-semibold" style="color: var(--teal-blue);">${q.text}</h5>
                </div>`;

            if (q.type === "select") {
                let opts = '';
                q.options.forEach(opt => {
                    const isSel = (answersArray[currentQIndex] === opt);
                    opts += `<option value="${opt}" ${isSel ? 'selected' : ''}>${opt}</option>`;
                });
                html += `<select class="form-select question-input" data-qidx="${currentQIndex}">${opts}</select>`;
            }
            else if (q.type === "text") {
                html += `<input type="text" class="form-control question-input" data-qidx="${currentQIndex}" placeholder="${q.placeholder || 'आपले उत्तर'}" value="${escapeHtml(answersArray[currentQIndex] || '')}">`;
            }
            else if (q.type === "textarea") {
                html += `<textarea class="form-control question-input" data-qidx="${currentQIndex}" rows="3" placeholder="${q.placeholder || 'आपले सूचन...'}">${escapeHtml(answersArray[currentQIndex] || '')}</textarea>`;
            }
            else if (q.type === "rating") {
                let ratingHtml = `<select class="form-select question-input" data-qidx="${currentQIndex}">`;
                q.options.forEach(opt => {
                    ratingHtml += `<option value="${opt}" ${answersArray[currentQIndex] === opt ? 'selected' : ''}>${opt}</option>`;
                });
                ratingHtml += `</select>`;
                html += ratingHtml;
            }

            html += `</div>`;
            questionContainer.innerHTML = html;

            // Attach event listeners
            document.querySelectorAll('.question-input').forEach(el => {
                const idx = parseInt(el.dataset.qidx);
                el.addEventListener('change', () => { answersArray[idx] = el.value; });
                el.addEventListener('input', () => { answersArray[idx] = el.value; });
            });

            updateProgressAndButtons();
        }

        function updateProgressAndButtons() {
            const total = currentQuestions.length;
            if (total === 0) {
                progressFill.style.width = '0%';
                questionCounterSpan.innerText = '0';
                stepNumberSpan.innerText = '0';
                totalQuestionsSpan.innerText = '0';
                if (totalStepsSpan) totalStepsSpan.innerText = '0';
                prevBtn.disabled = true;
                nextBtn.style.display = 'none';
                submitWrapper.style.display = 'none';
                return;
            }

            const percent = ((currentQIndex + 1) / total) * 100;
            progressFill.style.width = `${percent}%`;
            questionCounterSpan.innerText = currentQIndex + 1;
            stepNumberSpan.innerText = currentQIndex + 1;
            totalQuestionsSpan.innerText = total;
            if (totalStepsSpan) totalStepsSpan.innerText = total;
            prevBtn.disabled = (currentQIndex === 0);
            
            if (currentQIndex === total - 1) {
                nextBtn.style.display = "none";
                submitWrapper.style.display = "block";
            } else {
                nextBtn.style.display = "inline-flex";
                submitWrapper.style.display = "none";
            }
        }

        function saveCurrentInput() {
            const active = document.querySelector('.question-input');
            if (active) {
                const idx = parseInt(active.dataset.qidx);
                answersArray[idx] = active.value;
            }
        }

        function nextQuestion() {
            saveCurrentInput();
            const ans = answersArray[currentQIndex];
            if (!ans || ans === "" || ans === "निवडा") {
                alert("कृपया या प्रश्नाचे उत्तर द्या / Please answer before proceeding.");
                return;
            }
            if (currentQIndex < currentQuestions.length - 1) {
                currentQIndex++;
                renderCurrentQuestion();
            }
        }

        function prevQuestion() {
            saveCurrentInput();
            if (currentQIndex > 0) {
                currentQIndex--;
                renderCurrentQuestion();
            }
        }

        // Refresh history table & update analytics
        function refreshHistoryUI() {
            const tbody = document.getElementById('historyTableBody');
            if (!tbody) return;
            if (surveyHistory.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" class="text-center">No records</td></tr>';
                return;
            }
            tbody.innerHTML = '';
            surveyHistory.slice().reverse().forEach(item => {
                tbody.innerHTML += `<tr><td>${escapeHtml(item.surveyId)}</td><td>${escapeHtml(item.surveyTitle)}</td><td>${escapeHtml(item.selectedAnswer)}</td><td>${escapeHtml(item.submissionDate)}</td></tr>`;
            });
        }

        function updateAnalytics() {
            const total = surveyHistory.length;
            const totalResponsesElem = document.getElementById('totalResponsesAnalytics');
            if (totalResponsesElem) totalResponsesElem.innerText = total.toLocaleString();
            const participatedElem = document.getElementById('participatedCount');
            if (participatedElem) participatedElem.innerText = total;
            const pendingVal = Math.max(0, 12 - total);
            const pendingElem = document.getElementById('pendingCount');
            if (pendingElem) pendingElem.innerText = pendingVal.toString();

            let avgRating = 4.2;
            if (ratingValues.length) {
                avgRating = ratingValues.reduce((a, b) => a + b, 0) / ratingValues.length;
                avgRating = Math.round(avgRating * 10) / 10;
            }
            const ratingElem = document.getElementById('citizenRatingAnalytics');
            if (ratingElem) ratingElem.innerText = avgRating;

            let posPercent = 84;
            if (positiveFlags.length) {
                const posCount = positiveFlags.filter(f => f === true).length;
                posPercent = Math.round((posCount / positiveFlags.length) * 100);
            }
            const positiveElem = document.getElementById('positiveFeedbackAnalytics');
            if (positiveElem) positiveElem.innerText = posPercent;

            let partRate = total === 0 ? 6 : Math.min(94, 28 + Math.floor(total / 1.7));
            partRate = Math.min(96, partRate);
            const partRateAnalytics = document.getElementById('participationRateAnalytics');
            const partRateMain = document.getElementById('participationRate');
            if (partRateAnalytics) partRateAnalytics.innerText = partRate;
            if (partRateMain) partRateMain.innerText = partRate;
        }

        // Load category and reset stepper
        function loadCategory(category) {
            currentCategory = category;
            currentQuestions = getQuestionsForCategory(category);
            answersArray = new Array(currentQuestions.length).fill("");
            currentQIndex = 0;
            
            if (currentQuestions.length === 0) {
                questionContainer.innerHTML = `
                    <div class="alert alert-light text-center py-4" style="border-radius: 20px; border: 1px dashed var(--lime-gold);">
                        <i class="fas fa-info-circle me-2" style="color: var(--teal-blue);"></i>
                        <strong>Select a Survey Category</strong> to see questions.
                    </div>
                `;
                updateProgressAndButtons();
            } else {
                renderCurrentQuestion();
            }
        }

        // Handle category change
        surveyTypeSelect.addEventListener('change', function() {
            const category = this.value;
            loadCategory(category);
        });

        // Submit final response
        function handleFormSubmit(e) {
            e.preventDefault();
            saveCurrentInput();
            
            // Validate all answers
            for (let i = 0; i < currentQuestions.length; i++) {
                let ans = answersArray[i];
                if (!ans || ans === "" || ans === "निवडा") {
                    alert(`प्रश्न क्रमांक ${i + 1} चे उत्तर आवश्यक आहे.`);
                    return;
                }
            }
            // Validate district, constituency, village, survey type
            const district = document.getElementById('districtSelect').value;
            const constituency = document.getElementById('constituencySelect').value;
            const village = document.getElementById('villageInput').value.trim();
            const surveyType = document.getElementById('surveyTypeSelect').value;
            if (!district || !constituency || !village || !surveyType) {
                alert("कृपया जिल्हा, मतदारसंघ, गाव आणि सर्वेक्षण प्रकार भरा.");
                return;
            }

            // Extract rating from Q10 (index 9) if exists
            let ratingNum = 5;
            if (answersArray.length > 9 && answersArray[9]) {
                let ratingVal = answersArray[9];
                let parsed = parseInt(ratingVal, 10);
                if (!isNaN(parsed)) ratingNum = parsed;
            }
            ratingValues.push(ratingNum);
            
            // Positive flag based on first answer
            const isPositive = (answersArray[0] === "खूप समाधानी" || answersArray[0] === "समाधानी" || answersArray[0] === "होय, पूर्णपणे" || answersArray[0] === "होय");
            positiveFlags.push(isPositive);

            const summaryAns = `${answersArray[0] || 'Answered'} | रेटिंग: ${ratingNum}/10`;
            const surveyTitle = surveyType;
            const surveyId = document.getElementById('surveyIdField').value;
            const today = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }).replace(/ /g, '-');

            surveyHistory.push({
                surveyId: surveyId,
                surveyTitle: surveyTitle,
                selectedAnswer: summaryAns,
                submissionDate: today
            });

            refreshHistoryUI();
            updateAnalytics();

            // Reset form for fresh submission
            answersArray = new Array(currentQuestions.length).fill("");
            currentQIndex = 0;
            document.getElementById('districtSelect').value = "";
            document.getElementById('constituencySelect').value = "";
            document.getElementById('villageInput').value = "";
            renderCurrentQuestion();
            setCurrentTimestamp();
            alert("✅ सर्वेक्षण यशस्वीरित्या जमा झाले! धन्यवाद.\nSurvey submitted successfully!");
        }

        // Event listeners
        prevBtn.addEventListener('click', prevQuestion);
        nextBtn.addEventListener('click', nextQuestion);
        document.getElementById('surveyResponseForm').addEventListener('submit', handleFormSubmit);

        // Initialize
        loadCategory('');
        refreshHistoryUI();
        updateAnalytics();

        console.log('✅ Dynamic Survey Module loaded. Total categories:', Object.keys(QUESTIONS_BY_CATEGORY).length);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="navbar.js"></script>
</body>

</html>