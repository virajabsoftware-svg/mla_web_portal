<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/user/images/LOGO.png') ?>"> 

    <!-- Existing CSS dependencies (preserved) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
   
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

        

    <style>
        /* ===================================================== */
        /* PREMIUM AUDIT DASHBOARD - White + Beige + Gold Theme
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
            --radius-xxl: 28px;
            --transition-fast: 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --transition-base: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, var(--beige-light) 50%, var(--beige) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #1E293B;
            min-height: 100vh;
        }

        .audit_dashboard {
            padding: 30px;
        }

        /* ===================================================== */
        /* AUDIT CARDS - Premium Glassmorphism + All Effects */
        /* ===================================================== */

        .audit_card {
            padding: 25px 20px;
            border-radius: var(--radius-xl);
            color: #fff;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(4px);
            cursor: pointer;
            height: 100%;
        }

        /* Glow Border Animation */
        .audit_card::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--gold), var(--gold-light), var(--gold-dark), var(--gold));
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        /* Shine Effect */
        .audit_card::after {
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

        /* Hover Effects - Lift + 3D + Glow + Shine */
        .audit_card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
        }

        .audit_card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .audit_card:hover::after {
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

        .audit_card h6 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: 0.9;
            margin-bottom: 12px;
        }

        .audit_card h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 0;
            font-family: 'Space Grotesk', monospace;
        }

        /* Card Variants with Gold Accents */
        .logs {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-left: 4px solid var(--gold-light);
        }

        .activity {
            background: linear-gradient(135deg, #10B981, #059669);
            border-left: 4px solid var(--gold);
        }

        .users {
            background: linear-gradient(135deg, #3B82F6, #2563EB);
            border-left: 4px solid var(--gold);
        }

        .failed {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border-left: 4px solid var(--gold);
        }

        .changes {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            border-left: 4px solid var(--gold);
        }

        .alerts {
            background: linear-gradient(135deg, #8B5CF6, #7C3AED);
            border-left: 4px solid var(--gold);
        }

        /* Pulse Effect for Important Cards */
        .audit_card.pulse-card {
            animation: pulseGold 2s infinite;
        }

        @keyframes pulseGold {

            0%,
            100% {
                box-shadow: var(--shadow-md);
                filter: brightness(1);
            }

            50% {
                box-shadow: var(--shadow-gold-lg);
                filter: brightness(1.05);
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

        /* ===================================================== */
        /* DASHBOARD BOX - Glassmorphism */
        /* ===================================================== */

        .dashboard_box {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            padding: 25px;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            border: 1px solid rgba(255, 255, 255, 0.6);
            height: 100%;
        }

        .dashboard_box:hover {
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        .dashboard_box h5 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            font-size: 18px;
        }

        .dashboard_box h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 3px;
        }

        /* ===================================================== */
        /* TIMELINE STYLES */
        /* ===================================================== */

        .timeline {
            max-height: 300px;
            overflow-y: auto;
            padding-right: 8px;
        }

        .timeline_item {
            border-left: 3px solid var(--gold);
            padding-left: 18px;
            margin-bottom: 20px;
            transition: all var(--transition-fast);
            position: relative;
        }

        .timeline_item:hover {
            border-left-color: var(--gold-dark);
            transform: translateX(6px);
            padding-left: 22px;
        }

        .timeline_item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 4px;
            width: 12px;
            height: 12px;
            background: var(--gold);
            border-radius: 50%;
            border: 2px solid var(--pure-white);
            transition: all 0.2s ease;
        }

        .timeline_item:hover::before {
            background: var(--gold-dark);
            transform: scale(1.2);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.2);
        }

        .timeline_item span {
            font-size: 12px;
            font-weight: 600;
            color: var(--gold-dark);
        }

        .timeline_item p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #1E293B;
            font-weight: 500;
        }

        /* ===================================================== */
        /* ALERT STYLES */
        /* ===================================================== */

        .alert {
            border-radius: var(--radius-md);
            border: none;
            margin-bottom: 12px;
            transition: all var(--transition-fast);
        }

        .alert:hover {
            transform: translateX(4px);
            box-shadow: var(--shadow-sm);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.12), rgba(239, 68, 68, 0.05));
            color: #DC2626;
            border-left: 3px solid #DC2626;
        }

        .alert-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(245, 158, 11, 0.05));
            color: #D97706;
            border-left: 3px solid #D97706;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.12), rgba(59, 130, 246, 0.05));
            color: #2563EB;
            border-left: 3px solid #2563EB;
        }

        /* ===================================================== */
        /* TABLE STYLES */
        /* ===================================================== */

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
        .btn {
            border-radius: 48px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 13px;
            transition: all var(--transition-base);
            margin-right: 8px;
            border: none;
        }

        .btn-success {
            background: linear-gradient(135deg, #10B981, #059669);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }

        .btn-danger {
            background: linear-gradient(135deg, #EF4444, #DC2626);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }

        /* Canvas / Chart Styles */
        canvas {
            max-height: 250px;
            width: 100%;
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
        .audit_card,
        .dashboard_box {
            animation: fadeInUp 0.5s ease backwards;
        }

        .audit_card:nth-child(1) {
            animation-delay: 0.02s;
        }

        .audit_card:nth-child(2) {
            animation-delay: 0.04s;
        }

        .audit_card:nth-child(3) {
            animation-delay: 0.06s;
        }

        .audit_card:nth-child(4) {
            animation-delay: 0.08s;
        }

        .audit_card:nth-child(5) {
            animation-delay: 0.1s;
        }

        .audit_card:nth-child(6) {
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

        /* Responsive */
        @media (max-width: 768px) {
            .audit_dashboard {
                padding: 15px;
            }

            .audit_card h2 {
                font-size: 24px;
            }

            .audit_card h6 {
                font-size: 11px;
            }

            .dashboard_box {
                padding: 18px;
                margin-bottom: 15px;
            }

            .btn {
                padding: 6px 15px;
                font-size: 12px;
                margin-bottom: 5px;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 576px) {
            .audit_dashboard {
                padding: 10px;
            }

            .audit_card {
                padding: 18px 15px;
            }

            .audit_card h2 {
                font-size: 20px;
            }
        }

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
<?php include "common/header.php"?>    

                <!-- EXISTING CONTENT AREA (COMPLETELY PRESERVED - NO MODIFICATIONS) -->
                <div class="container-fluid audit_dashboard">

                    <!-- ================================= -->
                    <!-- KPI CARDS -->
                    <!-- ================================= -->
                    <div class="row g-4">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="audit_card logs pulse-card">
                                <h6><i class="fa-solid fa-file-alt me-1"></i> Total Logs</h6>
                                <h2 id="totalLogs">15,245</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="audit_card activity">
                                <h6><i class="fa-solid fa-chart-line me-1"></i> Today's Activities</h6>
                                <h2 id="todayActivities">1,250</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="audit_card users">
                                <h6><i class="fa-solid fa-users me-1"></i> Active Users</h6>
                                <h2 id="activeUsers">156</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="audit_card failed">
                                <h6><i class="fa-solid fa-lock me-1"></i> Failed Logins</h6>
                                <h2 id="failedLogins">23</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="audit_card changes">
                                <h6><i class="fa-solid fa-pen me-1"></i> Changes Today</h6>
                                <h2 id="changesToday">145</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="audit_card alerts">
                                <h6><i class="fa-solid fa-bell me-1"></i> Security Alerts</h6>
                                <h2 id="securityAlerts">5</h2>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= -->
                    <!-- CHART SECTION -->
                    <!-- ================================= -->
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-line me-2" style="color: var(--gold);"></i> Activity
                                    Trend (Last 7 Days)</h5>
                                <canvas id="activityChart"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-pie me-2" style="color: var(--gold);"></i> Module Wise
                                    Activity</h5>
                                <canvas id="moduleChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= -->
                    <!-- RECENT ACTIVITY -->
                    <!-- ================================= -->
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-clock me-2" style="color: var(--gold);"></i> Recent Activity
                                    Feed</h5>
                                <div class="timeline" id="recentTimeline">
                                    <div class="timeline_item">
                                        <span>10:25 AM</span>
                                        <p><i class="fa-solid fa-user-check me-1"></i> Admin updated MLA Profile</p>
                                    </div>
                                    <div class="timeline_item">
                                        <span>10:20 AM</span>
                                        <p><i class="fa-solid fa-check-circle me-1"></i> Complaint Approved</p>
                                    </div>
                                    <div class="timeline_item">
                                        <span>10:15 AM</span>
                                        <p><i class="fa-solid fa-poll me-1"></i> User submitted survey</p>
                                    </div>
                                    <div class="timeline_item">
                                        <span>10:05 AM</span>
                                        <p><i class="fa-solid fa-upload me-1"></i> New media file uploaded</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-shield-alt me-2" style="color: var(--gold);"></i> Suspicious
                                    Activities</h5>
                                <div class="alert alert-danger" id="suspicious1">
                                    <i class="fa-solid fa-exclamation-triangle me-2"></i> <strong>⚠ Alert:</strong>
                                    Rahul - 5 Failed Logins
                                </div>
                                <div class="alert alert-warning" id="suspicious2">
                                    <i class="fa-solid fa-desktop me-2"></i> <strong>⚠ Alert:</strong> New Device Login
                                    - Chrome on Windows
                                </div>
                                <div class="alert alert-info" id="suspicious3">
                                    <i class="fa-solid fa-network-wired me-2"></i> <strong>⚠ Alert:</strong>
                                    Unauthorized Access Attempt from IP 192.168.1.105
                                </div>
                                <div class="alert alert-danger" id="suspicious4">
                                    <i class="fa-solid fa-clock me-2"></i> <strong>⚠ Alert:</strong> Multiple failed
                                    attempts - Account locked
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= -->
                    <!-- ANALYTICS -->
                    <!-- ================================= -->
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-mobile-alt me-2" style="color: var(--gold);"></i> Device
                                    Analytics</h5>
                                <canvas id="deviceChart"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-map-marker-alt me-2" style="color: var(--gold);"></i> Login
                                    Locations</h5>
                                <div class="table-responsive">
                                    <table class="table" id="locationsTable">
                                        <thead>
                                            <tr>
                                                <th>Location</th>
                                                <th>Logins</th>
                                                <th>%</th>
                                            </tr>
                                        </thead>
                                        <tbody id="locationsBody">
                                            <!-- Dynamic content -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-simple me-2" style="color: var(--gold);"></i> Action
                                    Statistics</h5>
                                <canvas id="actionChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= -->
                    <!-- TOP USERS -->
                    <!-- ================================= -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-trophy me-2" style="color: var(--gold);"></i> Top Active Users
                                </h5>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="topUsersTable">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Role</th>
                                                <th>Activities</th>
                                                <th>Last Active</th>
                                                <th>Trend</th>
                                            </tr>
                                        </thead>
                                        <tbody id="topUsersBody">
                                            <!-- Dynamic content -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= -->
                    <!-- AUDIT TABLE -->
                    <!-- ================================= -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="dashboard_box">
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                                    <h5><i class="fa-solid fa-history me-2" style="color: var(--gold);"></i> Audit Log
                                        Records</h5>
                                    <div>
                                        <button class="btn btn-success" onclick="exportCSV()">
                                            <i class="fa-solid fa-file-csv me-1"></i> Export CSV
                                        </button>
                                        <button class="btn btn-danger" onclick="exportPDF()">
                                            <i class="fa-solid fa-file-pdf me-1"></i> Export PDF
                                        </button>
                                        <button class="btn btn-primary" onclick="window.print()">
                                            <i class="fa-solid fa-print me-1"></i> Print
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="auditTable">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Role</th>
                                                <th>Module</th>
                                                <th>Action</th>
                                                <th>IP Address</th>
                                                <th>Device</th>
                                                <th>Browser</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody id="auditTableBody">
                                            <!-- Dynamic content -->
                                        </tbody>
                                    </table>
                                </div>
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
        // Chart.js instances
        let activityChart, moduleChart, deviceChart, actionChart;

        // Counter Animation Function
        function animateCounter(elementId, targetValue, suffix = "") {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const numericValue = typeof targetValue === 'string' ? parseInt(targetValue) : targetValue;
            const increment = numericValue / 50;

            const timer = setInterval(() => {
                current += increment;
                if (current >= numericValue) {
                    element.textContent = targetValue + suffix;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + suffix;
                }
            }, 20);
        }

        // Initialize counters
        function initCounters() {
            animateCounter("totalLogs", 15245);
            animateCounter("todayActivities", 1250);
            animateCounter("activeUsers", 156);
            animateCounter("failedLogins", 23);
            animateCounter("changesToday", 145);
            animateCounter("securityAlerts", 5);
        }

        // Initialize all charts
        function initCharts() {
            // Activity Trend Chart (Line)
            const activityCtx = document.getElementById('activityChart').getContext('2d');
            activityChart = new Chart(activityCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Activities',
                        data: [1250, 1320, 1480, 1560, 1680, 1420, 1180],
                        borderColor: '#d4af37',
                        backgroundColor: 'rgba(212, 175, 55, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#b8960c',
                        pointBorderColor: '#ffffff',
                        pointRadius: 5,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'top', labels: { font: { family: 'Inter', size: 12 } } } }
                }
            });

            // Module Wise Activity (Doughnut)
            const moduleCtx = document.getElementById('moduleChart').getContext('2d');
            moduleChart = new Chart(moduleCtx, {
                type: 'doughnut',
                data: {
                    labels: ['MLA Module', 'Complaint Module', 'Survey Module', 'Media Module', 'Feedback Module'],
                    datasets: [{
                        data: [35, 28, 20, 12, 5],
                        backgroundColor: ['#d4af37', '#10B981', '#3B82F6', '#8B5CF6', '#F59E0B'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'bottom', labels: { font: { family: 'Inter', size: 10 } } } }
                }
            });

            // Device Analytics (Pie)
            const deviceCtx = document.getElementById('deviceChart').getContext('2d');
            deviceChart = new Chart(deviceCtx, {
                type: 'pie',
                data: {
                    labels: ['Desktop', 'Mobile', 'Tablet'],
                    datasets: [{
                        data: [65, 28, 7],
                        backgroundColor: ['#d4af37', '#10B981', '#3B82F6'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'bottom', labels: { font: { family: 'Inter', size: 11 } } } }
                }
            });

            // Action Statistics (Bar)
            const actionCtx = document.getElementById('actionChart').getContext('2d');
            actionChart = new Chart(actionCtx, {
                type: 'bar',
                data: {
                    labels: ['Create', 'Update', 'Delete', 'View', 'Export'],
                    datasets: [{
                        label: 'Actions',
                        data: [425, 380, 125, 2150, 89],
                        backgroundColor: '#d4af37',
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'top', labels: { font: { family: 'Inter', size: 12 } } } }
                }
            });
        }

        // Populate Locations Table
        function populateLocations() {
            const locations = [
                { name: "Satara", logins: 125, percent: 41 },
                { name: "Pune", logins: 95, percent: 31 },
                { name: "Mumbai", logins: 85, percent: 28 }
            ];

            document.getElementById("locationsBody").innerHTML = locations.map(loc => `
            <tr>
                <td><i class="fa-solid fa-map-pin me-2" style="color: var(--gold);"></i> ${loc.name}</td>
                <td>${loc.logins}</td>
                <td><div class="progress" style="height: 6px; width: 80px;"><div class="progress-bar" style="width: ${loc.percent}%; background: linear-gradient(90deg, var(--gold), var(--gold-dark));"></div></div> ${loc.percent}%</td>
            </tr>
        `).join('');
        }

        // Populate Top Users
        function populateTopUsers() {
            const users = [
                { name: "ADMIN", role: "Admin", activities: 540, lastActive: "10:25 AM", trend: "↑ +12%" },
                { name: "Rahul", role: "Operator", activities: 320, lastActive: "10:20 AM", trend: "↑ +8%" },
                { name: "Amit", role: "MLA", activities: 290, lastActive: "10:15 AM", trend: "↑ +5%" },
                { name: "Sneha", role: "Supervisor", activities: 245, lastActive: "10:10 AM", trend: "↑ +3%" },
                { name: "Priya", role: "Data Entry", activities: 210, lastActive: "10:05 AM", trend: "→ +1%" }
            ];

            document.getElementById("topUsersBody").innerHTML = users.map(user => `
            <tr>
                <td><i class="fa-solid fa-user-circle me-2" style="color: var(--gold);"></i> ${user.name}</td>
                <td><span class="badge" style="background: rgba(212, 175, 55, 0.15); color: var(--gold-dark);">${user.role}</span></td>
                <td>${user.activities}</td>
                <td><i class="fa-regular fa-clock me-1"></i> ${user.lastActive}</td>
                <td style="color: #10B981;">${user.trend}</td>
            </tr>
        `).join('');
        }

        // Populate Audit Table
        function populateAuditTable() {
            const audits = [
                { user: "Admin", role: "Super Admin", module: "MLA", action: "Update", ip: "192.168.1.101", device: "Desktop", browser: "Chrome", time: "10:25 AM" },
                { user: "Rahul", role: "Operator", module: "Complaint", action: "Approve", ip: "192.168.1.102", device: "Mobile", browser: "Safari", time: "10:20 AM" },
                { user: "Amit", role: "MLA", module: "Survey", action: "Submit", ip: "192.168.1.103", device: "Desktop", browser: "Firefox", time: "10:15 AM" },
                { user: "Sneha", role: "Supervisor", module: "Media", action: "Upload", ip: "192.168.1.104", device: "Desktop", browser: "Edge", time: "10:10 AM" },
                { user: "Priya", role: "Data Entry", module: "Feedback", action: "Create", ip: "192.168.1.105", device: "Mobile", browser: "Chrome", time: "10:05 AM" },
                { user: "Admin", role: "Super Admin", module: "Settings", action: "Configure", ip: "192.168.1.106", device: "Desktop", browser: "Chrome", time: "09:55 AM" }
            ];

            document.getElementById("auditTableBody").innerHTML = audits.map(audit => `
            <tr>
                <td><i class="fa-solid fa-user me-1"></i> ${audit.user}</td>
                <td>${audit.role}</td>
                <td>${audit.module}</td>
                <td><span class="badge" style="background: rgba(212, 175, 55, 0.15); color: var(--gold-dark);">${audit.action}</span></td>
                <td>${audit.ip}</td>
                <td><i class="fa-solid fa-${audit.device === 'Desktop' ? 'desktop' : 'mobile-alt'} me-1"></i> ${audit.device}</td>
                <td><i class="fa-brands fa-${audit.browser === 'Chrome' ? 'chrome' : (audit.browser === 'Firefox' ? 'firefox' : 'safari')} me-1"></i> ${audit.browser}</td>
                <td><i class="fa-regular fa-clock me-1"></i> ${audit.time}</td>
            </tr>
        `).join('');
        }

        // Export Functions
        function exportCSV() {
            const table = document.getElementById("auditTable");
            const rows = table.querySelectorAll("tr");
            let csv = [];

            rows.forEach(row => {
                const cells = row.querySelectorAll("th, td");
                const rowData = Array.from(cells).map(cell => cell.innerText);
                csv.push(rowData.join(","));
            });

            const blob = new Blob([csv.join("\n")], { type: "text/csv" });
            const url = URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "audit_logs.csv";
            a.click();
            URL.revokeObjectURL(url);
        }

        function exportPDF() {
            alert("PDF Export functionality would be implemented with jsPDF.\n\nIn production, this would generate a professional PDF report with all audit logs, charts, and statistics.");
        }

        // Add click handlers for cards
        function addCardHandlers() {
            const cards = document.querySelectorAll('.audit_card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const title = card.querySelector('h6')?.innerText || 'Audit Card';
                    const value = card.querySelector('h2')?.innerText || '';
                    alert(`${title}\n\nCurrent Value: ${value}\n\nIn production, this would open a detailed modal with analytics, trends, and historical data for this metric.`);
                });
            });
        }

        // Initialize everything on page load
        document.addEventListener("DOMContentLoaded", function () {
            initCharts();
            populateLocations();
            populateTopUsers();
            populateAuditTable();
            initCounters();
            addCardHandlers();

            // Add floating class to some cards
            document.querySelectorAll('.audit_card:nth-child(2), .audit_card:nth-child(5)').forEach(card => {
                card.classList.add('floating');
            });
        });

        // Re-animate when page becomes visible
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) {
                initCounters();
            }
        });
    </script>
    <script src="<?= base_url('assets/admin/js/header.js') ?>"></script>
</body>

</html>