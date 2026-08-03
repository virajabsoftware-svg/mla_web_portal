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
    <<link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
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
        .complaint_dashboard {
            width: 100%;
            max-width: 100%;
        }

        /* Row overrides */
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
           CARD STYLES
           ============================================ */
        .dashboard-card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* Gradient border animation */
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

        /* Stat Cards */
        .stat-card {
            cursor: pointer;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        /* Card headers */
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

        /* Form controls */
        .form-label {
            font-weight: 600;
            color: var(--teal-blue);
            margin-bottom: 8px;
            display: block;
            font-size: 0.85rem;
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

        .form-control.bg-light {
            background: rgba(195, 200, 72, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Button styling */
        .btn-danger-custom {
            background: linear-gradient(95deg, var(--lime-gold), #A9B43C);
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
            margin-right: 12px;
            cursor: pointer;
        }

        .btn-danger-custom::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, rgba(255, 255, 255, 0) 10%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0) 90%);
            transform: rotate(25deg);
            transition: all 0.5s;
            opacity: 0;
        }

        .btn-danger-custom:hover::after {
            left: 100%;
            opacity: 0.8;
        }

        .btn-danger-custom:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 14px rgba(220, 53, 69, 0.3);
        }

        .btn-secondary-custom {
            background: rgba(195, 200, 72, 0.2);
            border: 1px solid rgba(195, 200, 72, 0.6);
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            color: var(--teal-blue);
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-secondary-custom:hover {
            background: rgba(195, 200, 72, 0.3);
            transform: scale(1.02);
        }

        .btn-warning-custom {
            background: linear-gradient(95deg, var(--lime-gold), #A9B43C);
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            color: #1F3F3A;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .btn-warning-custom::after {
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

        .btn-warning-custom:hover::after {
            left: 100%;
            opacity: 0.8;
        }

        .btn-warning-custom:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 14px rgba(69, 77, 40, 0.25);
        }

        /* Badge styling */
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.7rem;
        }

        .badge.bg-success {
            background: var(--olive-green) !important;
            color: white;
        }

        .badge.bg-warning {
            background: var(--lime-gold) !important;
            color: var(--dark-olive);
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

        /* Alert styling */
        .alert-warning {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.15), rgba(107, 138, 34, 0.08));
            border-left: 4px solid var(--lime-gold);
            border-radius: 12px;
            color: var(--teal-blue);
            padding: 1rem;
        }

        /* Animations */
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

        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUpSlide 0.6s ease-out forwards;
        }

        @keyframes fadeUpSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger delays */
        .stat-1 {
            animation-delay: 0.05s;
        }

        .stat-2 {
            animation-delay: 0.1s;
        }

        .stat-3 {
            animation-delay: 0.15s;
        }

        .stat-4 {
            animation-delay: 0.2s;
        }

        /* Pulse animation for critical stats */
        .pulse-stat {
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

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content {
                padding: 1.25rem 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 1.25rem;
                margin-left: 0;
            }

            body.sidebar-collapsed .main-content {
                margin-left: 0;
            }

            .stat-number {
                font-size: 1.75rem;
            }

            .btn-danger-custom,
            .btn-secondary-custom,
            .btn-warning-custom {
                width: 100%;
                margin-bottom: 10px;
                margin-right: 0;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 0.875rem 1rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .card-header {
                padding: 0.875rem 1rem;
            }

            .card-body {
                padding: 1rem !important;
            }

            .form-control,
            .form-select {
                padding: 8px 12px;
            }

            .table thead th,
            .table tbody td {
                padding: 8px;
                font-size: 0.75rem;
            }
        }

        @media (min-width: 1920px) {
            .main-content {
                padding: 2rem 2.5rem;
            }
        }

        body.sidebar-expanded .main-content {
            margin-left: 280px;
        }

        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .fw-bold {
            font-weight: 700;
        }

        .me-1 {
            margin-right: 0.25rem;
        }

        .me-2 {
            margin-right: 0.5rem;
        }

        .me-3 {
            margin-right: 1rem;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .px-3 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .px-4 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .text-center {
            text-align: center;
        }

        .fs-4 {
            font-size: 1.5rem;
        }

        .border-0 {
            border: none !important;
        }

        .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 100% !important;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
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
   <?php include "common/header.php"?>

    <main class="main-content fade-page-transition">
        <div class="container-fluid complaint_dashboard px-3 px-lg-4">

            <!-- COMPLAINT SUMMARY CARDS -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6 fade-up stat-1">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="totalComplaints">12</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-folder2-open me-1"></i> Total
                                Complaints</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-2">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="pendingComplaints">3</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-hourglass-split me-1"></i> Pending
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-3">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="resolvedComplaints">7</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-check-circle-fill me-1"></i> Resolved
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 fade-up stat-4">
                    <div class="card border-0 shadow-sm dashboard-card stat-card text-center p-3">
                        <div class="card-body">
                            <h3 class="stat-number counter-number" id="escalatedComplaints">2</h3>
                            <p class="mb-0 text-muted fw-semibold"><i class="bi bi-exclamation-triangle-fill me-1"></i>
                                Escalated</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- REGISTER COMPLAINT FORM -->
            <div class="card border-0 shadow-lg dashboard-card mb-4 fade-up">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-file-earmark-text-fill me-2 text-danger"></i> Register New
                        Complaint</h5>
                </div>
                <div class="card-body">
                    <form id="complaintForm">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label"><i class="bi bi-upc-scan"></i> Complaint ID</label>
                                <input type="text" class="form-control bg-light" id="complaintIdField" value="CMP001245"
                                    readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="bi bi-person-badge"></i> Voter ID</label>
                                <input type="text" class="form-control bg-light" id="voterIdField" value="VTR10254"
                                    readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="bi bi-building"></i> Assigned MLA ID</label>
                                <input type="text" class="form-control bg-light" id="mlaIdField" value="MLA501"
                                    readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><i class="bi bi-flag-fill"></i> Priority</label>
                                <select class="form-select" id="prioritySelect">
                                    <option value="Low">Low</option>
                                    <option value="Medium" selected>Medium</option>
                                    <option value="High">High</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-card-heading"></i> Complaint Title</label>
                                <input type="text" class="form-control" id="complaintTitle"
                                    placeholder="Enter complaint title" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label"><i class="bi bi-geo-alt-fill"></i> District</label>
                                <select class="form-select" id="districtSelect" required>
                                    <option value="">Select District</option>
                                    <option>Satara</option>
                                    <option>Pune</option>
                                    <option>Kolhapur</option>
                                    <option>Sangli</option>
                                    <option>Nashik</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label"><i class="bi bi-pin-map-fill"></i> Constituency</label>
                                <select class="form-select" id="constituencySelect" required>
                                    <option value="">Select Constituency</option>
                                    <option>Wai</option>
                                    <option>Karad</option>
                                    <option>Satara North</option>
                                    <option>Koregaon</option>
                                    <option>Pachgani</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label"><i class="bi bi-house-heart"></i> Village</label>
                                <input type="text" class="form-control" id="villageInput"
                                    placeholder="Enter Village Name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-geo-alt"></i> Location / Landmark</label>
                                <input type="text" class="form-control" id="locationInput"
                                    placeholder="Complaint Location / Landmark" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-calendar-clock"></i> Submission
                                    Timestamp</label>
                                <input type="datetime-local" class="form-control bg-light" id="submissionDate" readonly>
                            </div>

                            <div class="col-12">
                                <label class="form-label"><i class="bi bi-chat-text-fill"></i> Complaint
                                    Description</label>
                                <textarea class="form-control" id="complaintDesc" rows="4"
                                    placeholder="Describe your issue in detail..." required></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-paperclip"></i> Supporting Evidence</label>
                                <input type="file" class="form-control" id="evidenceFile" multiple
                                    accept="image/*,application/pdf">
                                <small class="text-muted">Max file size: 5MB (Images, PDF)</small>
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-danger-custom"><i
                                        class="bi bi-send-check me-1"></i> Submit Complaint</button>
                                <button type="button" id="resetBtn" class="btn btn-secondary-custom"><i
                                        class="bi bi-arrow-repeat me-1"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ESCALATION SUPPORT -->
            <div class="card border-0 shadow-sm dashboard-card mb-4 fade-up">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-megaphone-fill me-2 text-warning"></i> Escalation Support
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                        <div>Complaint unresolved for more than 15 days? You can escalate this complaint for higher
                            authority review.</div>
                    </div>
                    <button class="btn btn-warning-custom" id="escalateBtn"><i class="bi bi-arrow-up-circle me-1"></i>
                        Escalate Complaint</button>
                </div>
            </div>

            <!-- COMPLAINT HISTORY -->
            <div class="card border-0 shadow-sm dashboard-card fade-up">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-secondary"></i> Complaint History
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Complaint</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Resolution Date</th>
                                </tr>
                            </thead>
                            <tbody id="complaintHistoryBody">
                                <tr data-complaint-id="CMP001188" data-title="Water Leakage" data-status="Resolved">
                                    <td>CMP001188</td>
                                    <td>Water Leakage</td>
                                    <td>Satara</td>
                                    <td><span class="badge bg-success badge-status">Resolved</span></td>
                                    <td>28-May-2026</td>
                                </tr>
                                <tr data-complaint-id="CMP001150" data-title="Street Light Issue"
                                    data-status="Resolved">
                                    <td>CMP001150</td>
                                    <td>Street Light Issue</td>
                                    <td>Wai</td>
                                    <td><span class="badge bg-success badge-status">Resolved</span></td>
                                    <td>12-May-2026</td>
                                </tr>
                                <tr data-complaint-id="CMP001200" data-title="Drainage Blockage" data-status="Pending">
                                    <td>CMP001200</td>
                                    <td>Drainage Blockage</td>
                                    <td>Karad</td>
                                    <td><span class="badge bg-warning badge-status">Pending</span></td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
          <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </footer>
    </main>

    <script>
        // =====================================================
        // DISTRICT + CONSTITUENCY DATA (Maharashtra)
        // =====================================================
        const districtData = {
            "Ahmednagar (Ahilyanagar)": ["Akole", "Sangamner", "Shirdi", "Kopargaon", "Rahata", "Shrirampur", "Nevasa", "Shevgaon", "Rahuri", "Parner", "Ahmednagar City", "Shrigonda"],
            "Akola": ["Akot", "Balapur", "Akola West", "Akola East", "Murtizapur"],
            "Amravati": ["Daryapur", "Melghat", "Achalpur", "Morshi", "Arvi", "Teosa", "Amravati", "Badnera"],
            "Chhatrapati Sambhajinagar (Aurangabad)": ["Kannad", "Sillod", "Gangapur", "Vaijapur", "Aurangabad Central", "Aurangabad West", "Aurangabad East", "Paithan", "Phulambri"],
            "Beed": ["Georai", "Majalgaon", "Beed", "Ashti", "Kaij", "Parli"],
            "Bhandara": ["Tumsar", "Bhandara", "Sakoli"],
            "Buldhana": ["Jalgaon Jamod", "Malkapur", "Buldhana", "Chikhli", "Sindkhed Raja", "Mehkar", "Khamgaon"],
            "Chandrapur": ["Warora", "Chandrapur", "Ballarpur", "Brahmapuri", "Chimur", "Rajura"],
            "Dhule": ["Shirpur", "Sindkheda", "Dhule Rural", "Dhule City", "Sakri"],
            "Gadchiroli": ["Armori", "Gadchiroli", "Aheri"],
            "Gondia": ["Gondiya", "Tirora", "Arjuni Morgaon", "Amgaon"],
            "Hingoli": ["Basmat", "Kalamnuri", "Hingoli"],
            "Jalgaon": ["Chopda", "Raver", "Bhusawal", "Jalgaon City", "Jalgaon Rural", "Amalner", "Erandol", "Pachora", "Chalisgaon", "Jamner", "Muktainagar"],
            "Jalna": ["Bhokardan", "Jafrabad", "Badnapur", "Jalna", "Partur"],
            "Kolhapur": ["Chandgad", "Radhanagari", "Kagal", "Kolhapur South", "Karvir", "Kolhapur North", "Shahuwadi", "Hatkanangle", "Ichalkaranji", "Shirol"],
            "Latur": ["Latur Rural", "Latur City", "Ahmedpur", "Udgir", "Nilanga", "Ausa"],
            "Mumbai City": ["Colaba", "Malabar Hill", "Mumbadevi", "Byculla", "Shivadi", "Worli", "Mahim", "Dharavi", "Sion Koliwada", "Wadala"],
            "Mumbai Suburban": ["Versova", "Andheri West", "Andheri East", "Vile Parle", "Chandivali", "Ghatkopar West", "Ghatkopar East", "Mankhurd Shivaji Nagar", "Anushakti Nagar", "Borivali", "Dahisar", "Magathane", "Mulund", "Vikhroli", "Bhandup West", "Jogeshwari East", "Dindoshi", "Goregaon", "Kandivali East", "Charkop", "Malad West", "Kurla", "Kalina", "Bandra East", "Bandra West", "Powai"],
            "Nagpur": ["Katol", "Savner", "Hingna", "Umred", "Nagpur South West", "Nagpur South", "Nagpur East", "Nagpur Central", "Nagpur West", "Nagpur North", "Kamptee", "Ramtek"],
            "Nanded": ["Nanded North", "Nanded South", "Naigaon", "Bhokar", "Deglur", "Mukhed", "Kinwat", "Hadgaon", "Loha"],
            "Nandurbar": ["Akkalkuwa", "Shahada", "Nandurbar", "Nawapur"],
            "Nashik": ["Nandgaon", "Malegaon Central", "Malegaon Outer", "Baglan", "Kalwan", "Chandwad", "Yevla", "Sinnar", "Nashik East", "Nashik Central", "Nashik West", "Deolali", "Igatpuri", "Dindori", "Niphad"],
            "Dharashiv (Osmanabad)": ["Karmala", "Paranda", "Osmanabad", "Tuljapur", "Umarga"],
            "Palghar": ["Dahanu", "Vikramgad", "Palghar", "Boisar", "Nalasopara", "Vasai"],
            "Parbhani": ["Jintur", "Parbhani", "Gangakhed", "Pathri"],
            "Pune": ["Shirur", "Daund", "Indapur", "Baramati", "Purandar", "Bhor", "Maval", "Chinchwad", "Pimpri", "Bhosari", "Vadgaon Sheri", "Shivajinagar", "Kothrud", "Khadakwasla", "Parvati", "Hadapsar", "Pune Cantonment", "Kasba Peth", "Pune City"],
            "Raigad": ["Pen", "Alibag", "Shrivardhan", "Mahad", "Karjat", "Uran", "Panvel"],
            "Ratnagiri": ["Dapoli", "Guhagar", "Chiplun", "Ratnagiri", "Rajapur"],
            "Sangli": ["Jat", "Kavathe Mahankal", "Tasgaon-Kavathe Mahankal", "Sangli", "Islampur", "Shirala", "Miraj", "Palus-Kadegaon", "Khanapur-Atpadi", "Vita"],
            "Satara": ["Man", "Karad North", "Karad South", "Patan", "Jaoli", "Wai", "Koregaon", "Phaltan"],
            "Sindhudurg": ["Kankavli", "Kudal", "Sawantwadi"],
            "Solapur": ["Akkalkot", "Solapur City North", "Solapur City Central", "Solapur South", "Pandharpur", "Sangole", "Malshiras", "Mohol", "Madha", "Barshi", "Karmala"],
            "Thane": ["Thane", "Kopri-Pachpakhadi", "Ovala-Majiwada", "Mira Bhayandar", "Bhiwandi East", "Bhiwandi West", "Bhiwandi Rural", "Kalyan West", "Kalyan East", "Dombivli", "Ambernath", "Ulhasnagar", "Mumbra-Kalwa", "Airoli", "Belapur"],
            "Wardha": ["Wardha", "Hinganghat", "Arvi", "Deoli"],
            "Washim": ["Washim", "Risod", "Karanja"],
            "Yavatmal": ["Yavatmal", "Wani", "Ralegaon", "Arni", "Pusad", "Umarkhed", "Digras", "Ghatanji"]
        };

        // Populate District Dropdown
        const districtSelect = document.getElementById("districtSelect");
        const constituencySelect = document.getElementById("constituencySelect");

        Object.keys(districtData).forEach(district => {
            let option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });

        // Update Constituencies based on selected District
        districtSelect.addEventListener("change", function () {
            constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
            let constituencies = districtData[this.value] || [];
            constituencies.forEach(item => {
                let option = document.createElement("option");
                option.value = item;
                option.textContent = item;
                constituencySelect.appendChild(option);
            });
        });

        // Auto Fill Current Date & Time
        function updateDateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('submissionDate').value = `${year}-${month}-${day}T${hours}:${minutes}`;
        }
        updateDateTime();
        setInterval(updateDateTime, 60000);

        // Complaint storage & dynamic counters
        let complaintsHistory = [
            { id: "CMP001188", title: "Water Leakage", location: "Satara", status: "Resolved", resolutionDate: "28-May-2026", priority: "Medium" },
            { id: "CMP001150", title: "Street Light Issue", location: "Wai", status: "Resolved", resolutionDate: "12-May-2026", priority: "High" },
            { id: "CMP001200", title: "Drainage Blockage", location: "Karad", status: "Pending", resolutionDate: "-", priority: "Critical" }
        ];

        // Helper: Update summary numbers
        function updateSummaryStats() {
            const total = complaintsHistory.length;
            const pending = complaintsHistory.filter(c => c.status === "Pending").length;
            const resolved = complaintsHistory.filter(c => c.status === "Resolved").length;
            const escalated = complaintsHistory.filter(c => c.status === "Escalated").length;

            document.getElementById('totalComplaints').innerText = total;
            document.getElementById('pendingComplaints').innerText = pending;
            document.getElementById('resolvedComplaints').innerText = resolved;
            document.getElementById('escalatedComplaints').innerText = escalated;
        }

        // Render complaint history table
        function renderComplaintHistory() {
            const tbody = document.getElementById('complaintHistoryBody');
            tbody.innerHTML = '';
            complaintsHistory.forEach(comp => {
                const statusBadge = comp.status === 'Resolved' ? '<span class="badge bg-success badge-status">Resolved</span>' :
                    (comp.status === 'Pending' ? '<span class="badge bg-warning badge-status">Pending</span>' :
                        '<span class="badge bg-danger badge-status">Escalated</span>');
                const row = `<tr data-complaint-id="${comp.id}" data-title="${comp.title}" data-status="${comp.status}">
                            <td>${comp.id}</td>
                            <td>${comp.title}</td>
                            <td>${comp.location}</td>
                            <td>${statusBadge}</td>
                            <td>${comp.resolutionDate || '-'}</td>
                         </tr>`;
                tbody.insertAdjacentHTML('beforeend', row);
            });
            // Add click handlers for rows
            document.querySelectorAll('#complaintHistoryBody tr').forEach(row => {
                row.addEventListener('click', function () {
                    const id = this.cells[0].innerText;
                    const title = this.cells[1].innerText;
                    const status = this.querySelector('.badge')?.innerText || 'Unknown';
                    alert(`🔍 Complaint Details\nID: ${id}\nTitle: ${title}\nStatus: ${status}\n\nFull details available in tracking portal.`);
                });
            });
        }

        // Generate random complaint ID
        function generateComplaintId() {
            const randomNum = Math.floor(Math.random() * 9000) + 1000;
            return `CMP${randomNum}`;
        }

        // Handle complaint submission
        const complaintForm = document.getElementById('complaintForm');
        complaintForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Validate fields
            const title = document.getElementById('complaintTitle').value.trim();
            const district = districtSelect.value;
            const constituency = constituencySelect.value;
            const village = document.getElementById('villageInput').value.trim();
            const location = document.getElementById('locationInput').value.trim();
            const description = document.getElementById('complaintDesc').value.trim();
            const priority = document.getElementById('prioritySelect').value;

            if (!title) { alert('Please enter complaint title.'); return; }
            if (!district) { alert('Please select district.'); return; }
            if (!constituency) { alert('Please select constituency.'); return; }
            if (!village) { alert('Please enter village name.'); return; }
            if (!location) { alert('Please enter complaint location.'); return; }
            if (!description) { alert('Please enter complaint description.'); return; }

            // Create new complaint object
            const newId = generateComplaintId();
            const today = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }).replace(/ /g, '-');

            const newComplaint = {
                id: newId,
                title: title,
                location: location + `, ${village}, ${constituency}`,
                status: "Pending",
                resolutionDate: "-",
                priority: priority,
                description: description,
                submissionDate: today
            };

            complaintsHistory.unshift(newComplaint);

            // Update UI
            renderComplaintHistory();
            updateSummaryStats();

            // Show success
            alert(`✅ Complaint registered successfully!\nComplaint ID: ${newId}\n\nYou will receive updates on your registered mobile number.`);

            // Reset form (keep readonly fields)
            document.getElementById('complaintTitle').value = '';
            document.getElementById('villageInput').value = '';
            document.getElementById('locationInput').value = '';
            document.getElementById('complaintDesc').value = '';
            document.getElementById('prioritySelect').value = 'Medium';
            districtSelect.value = '';
            constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
            document.getElementById('evidenceFile').value = '';
            updateDateTime();
        });

        // Reset button handler
        document.getElementById('resetBtn').addEventListener('click', function () {
            document.getElementById('complaintTitle').value = '';
            document.getElementById('villageInput').value = '';
            document.getElementById('locationInput').value = '';
            document.getElementById('complaintDesc').value = '';
            document.getElementById('prioritySelect').value = 'Medium';
            districtSelect.value = '';
            constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
            document.getElementById('evidenceFile').value = '';
            updateDateTime();
            alert('Form has been reset.');
        });

        // Escalate button handler
        document.getElementById('escalateBtn').addEventListener('click', function () {
            const pendingComplaintsList = complaintsHistory.filter(c => c.status === "Pending");
            if (pendingComplaintsList.length === 0) {
                alert("ℹ️ No pending complaints to escalate at this moment.");
                return;
            }
            // Simple escalation: mark first pending as escalated (demo)
            const toEscalate = pendingComplaintsList[0];
            toEscalate.status = "Escalated";
            toEscalate.resolutionDate = "-";
            renderComplaintHistory();
            updateSummaryStats();
            alert(`⚠️ Complaint ${toEscalate.id} has been escalated to higher authority. You will receive updates within 48 hours.`);
        });

        // Initialize counters with animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.innerText);
                let current = 0;
                const increment = target / 40;
                const update = () => {
                    if (current < target) {
                        current += increment;
                        counter.innerText = Math.round(current);
                        requestAnimationFrame(update);
                    } else {
                        counter.innerText = target;
                    }
                };
                update();
            });
        }

        renderComplaintHistory();
        updateSummaryStats();
        setTimeout(animateCounters, 200);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src=navbar.js></script>
</body>

</html>