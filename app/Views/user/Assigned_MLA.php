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
        .dashboard_module {
            width: 100%;
            max-width: 100%;
        }

        /* Bootstrap row overrides */
        .dashboard_module .row,
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

        /* All cards in dashboard module */
        .dashboard_module .card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* Gradient border animation */
        .dashboard_module .card::before {
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

        .dashboard_module .card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .dashboard_module .card:hover {
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

        /* MLA Profile Card - Premium styling */
        .dashboard_module .card:first-child {
            background: linear-gradient(135deg, var(--glass-bg), rgba(195, 200, 72, 0.15));
        }

        .dashboard_module .card:first-child h3 {
            color: var(--teal-blue);
            font-weight: 800;
        }

        .dashboard_module .card:first-child p {
            color: var(--dark-olive);
            margin-bottom: 8px;
        }

        .dashboard_module .card:first-child strong {
            color: var(--teal-blue);
        }

        /* ============================================
           SQUARE PROFILE IMAGE STYLING (UPDATED)
           Converted from circle to elegant square box
           ============================================ */

        /* Profile image styling - SQUARE with subtle rounded corners */
        .img-thumbnail {
            border: 3px solid var(--lime-gold);
            padding: 3px;
            background: white;
            border-radius: 16px !important;
            /* Square shape with soft corners */
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Enhanced hover effect for square profile */
        .img-thumbnail:hover {
            transform: scale(1.05);
            border-color: var(--teal-blue);
            box-shadow: 0 12px 28px rgba(34, 86, 97, 0.25);
        }

        /* Optional: Decorative gradient frame behind square image on hover */
        .dashboard_module .card:first-child .text-center {
            position: relative;
        }

        .dashboard_module .card:first-child .text-center::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 116px;
            height: 116px;
            background: linear-gradient(135deg, var(--lime-gold), var(--olive-green), var(--teal-blue));
            border-radius: 20px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .dashboard_module .card:first-child .text-center:hover::before {
            opacity: 0.2;
        }

        /* Rating stars */
        .text-warning {
            color: var(--lime-gold) !important;
        }

        h4.text-warning {
            font-weight: 700;
            letter-spacing: 2px;
        }

        /* Badge styling */
        .badge.bg-success {
            background: linear-gradient(135deg, var(--olive-green), #8ab33a) !important;
            color: white;
            padding: 6px 14px;
            border-radius: 30px;
            font-weight: 600;
        }

        /* KPI Cards - Summary Stats */
        .dashboard_module .row.g-4.mb-4 .card {
            cursor: pointer;
        }

        .dashboard_module .row.g-4.mb-4 .card-body {
            padding: 1.25rem;
        }

        .dashboard_module .row.g-4.mb-4 h3 {
            font-size: 2rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin: 0.5rem 0;
            transition: all 0.2s;
        }

        .dashboard_module .row.g-4.mb-4 .card:hover h3 {
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dashboard_module .row.g-4.mb-4 p {
            color: var(--dark-olive);
            font-weight: 500;
            margin-bottom: 0;
        }

        /* Icon colors */
        .fa-road.fa-2x.text-primary {
            color: var(--teal-blue) !important;
        }

        .fa-check-circle.fa-2x.text-success,
        .fa-check-double.fa-2x.text-success {
            color: var(--olive-green) !important;
        }

        .fa-clock.fa-2x.text-warning,
        .fa-star.fa-2x.text-warning {
            color: var(--lime-gold) !important;
        }

        .fa-exclamation-circle.fa-2x.text-danger {
            color: #dc3545 !important;
        }

        /* Card headers */
        .dashboard_module .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }

        .dashboard_module .card-header.bg-white {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05)) !important;
        }

        .dashboard_module .card-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
        }

        /* Progress bar styling */
        .progress {
            height: 12px;
            border-radius: 20px;
            background: rgba(195, 200, 72, 0.2);
            overflow: hidden;
        }

        .progress-bar {
            border-radius: 20px;
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

        .progress-bar.bg-success {
            background: linear-gradient(90deg, var(--olive-green), #8ab33a) !important;
        }

        .progress-bar.bg-warning {
            background: linear-gradient(90deg, var(--lime-gold), #d4da5a) !important;
        }

        .progress-bar.bg-primary {
            background: linear-gradient(90deg, var(--teal-blue), #2e7a8a) !important;
        }

        .progress-bar.bg-info {
            background: linear-gradient(90deg, #17a2b8, #20c7e0) !important;
        }

        /* Table styling */
        .table {
            margin-bottom: 0;
        }

        .table th {
            background: rgba(195, 200, 72, 0.1);
            color: var(--teal-blue);
            font-weight: 600;
            border-bottom: 2px solid var(--lime-gold);
            padding: 12px;
        }

        .table td {
            padding: 12px;
            color: var(--dark-olive);
            font-weight: 500;
        }

        .table-bordered {
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        .table tbody tr:hover {
            background: rgba(195, 200, 72, 0.08);
            transition: background 0.2s;
        }

        /* Display numbers */
        .display-4 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .text-success.display-4 {
            color: var(--olive-green) !important;
        }

        .text-primary.display-4 {
            color: var(--teal-blue) !important;
        }

        /* Badge colors in tables */
        .badge.bg-danger {
            background: #dc3545 !important;
            font-size: 0.85rem;
            padding: 5px 12px;
            border-radius: 20px;
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

        .badge.bg-success {
            background: var(--olive-green) !important;
            font-size: 0.85rem;
            padding: 5px 12px;
            border-radius: 20px;
        }

        /* Survey participation text */
        .dashboard_module .card-body h3.text-primary {
            color: var(--teal-blue) !important;
            font-weight: 800;
            margin-bottom: 0.5rem;
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

        /* ============================================
           RESPONSIVE BREAKPOINTS
           ============================================ */

        /* Tablet Landscape (1024px) */
        @media (max-width: 1024px) {
            .main-content {
                padding: 1.25rem 1.5rem;
            }

            .dashboard_module .row.g-4.mb-4 h3 {
                font-size: 1.5rem;
            }

            .display-4 {
                font-size: 2.5rem;
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

            .dashboard_module .row.g-4.mb-4 h3 {
                font-size: 1.25rem;
            }

            .display-4 {
                font-size: 2rem;
            }

            .col-lg-2.text-center {
                margin-bottom: 1rem;
            }

            .col-lg-7,
            .col-lg-3 {
                text-align: center !important;
            }

            .dashboard_module .card:first-child .row {
                flex-direction: column;
            }
        }

        /* Mobile (576px) - Square profile responsive */
        @media (max-width: 576px) {
            .main-content {
                padding: 0.875rem 1rem;
            }

            .dashboard_module .card-header {
                padding: 0.875rem 1rem;
            }

            .dashboard_module .card-body {
                padding: 1rem;
            }

            .dashboard_module .row.g-4.mb-4 h3 {
                font-size: 1.1rem;
            }

            .dashboard_module .row.g-4.mb-4 .card-body {
                padding: 0.875rem;
            }

            .display-4 {
                font-size: 1.75rem;
            }

            .table th,
            .table td {
                padding: 8px;
                font-size: 0.85rem;
            }

            /* Square profile on mobile - slightly smaller but maintains square shape */
            .img-thumbnail {
                width: 80px !important;
                height: 80px !important;
                border-radius: 12px !important;
            }

            .dashboard_module .card:first-child .text-center::before {
                width: 86px;
                height: 86px;
            }

            h4.text-warning {
                font-size: 1.25rem;
            }
        }

        /* Large Desktop (1920px+) */
        @media (min-width: 1920px) {
            .main-content {
                padding: 2rem 2.5rem;
            }

            .dashboard_module .row.g-4.mb-4 h3 {
                font-size: 2.2rem;
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
        .dashboard_module .row.g-4.mb-4 .card {
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
        .dashboard_module .row.g-4.mb-4 .col-xl-2:nth-child(1) .card {
            --i: 1;
        }

        .dashboard_module .row.g-4.mb-4 .col-xl-2:nth-child(2) .card {
            --i: 2;
        }

        .dashboard_module .row.g-4.mb-4 .col-xl-2:nth-child(3) .card {
            --i: 3;
        }

        .dashboard_module .row.g-4.mb-4 .col-xl-2:nth-child(4) .card {
            --i: 4;
        }

        .dashboard_module .row.g-4.mb-4 .col-xl-2:nth-child(5) .card {
            --i: 5;
        }

        .dashboard_module .row.g-4.mb-4 .col-xl-2:nth-child(6) .card {
            --i: 6;
        }

        /* Glow effect on important cards */
        .dashboard_module .card:first-child {
            box-shadow: 0 12px 28px rgba(34, 86, 97, 0.1);
        }

        /* Progress bar text styling */
        .d-flex.justify-content-between {
            margin-bottom: 8px;
            font-weight: 500;
        }

        .d-flex.justify-content-between span:first-child {
            color: var(--teal-blue);
        }

        .d-flex.justify-content-between span:last-child {
            color: var(--dark-olive);
            font-weight: 600;
        }

        /* MLA tagline */
        .mla-quote {
            font-size: 0.9rem;
            color: var(--dark-olive);
            font-style: italic;
            border-left: 3px solid var(--lime-gold);
            padding-left: 12px;
            margin-top: 12px;
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
        <div class="container-fluid dashboard_module">

            <!-- ===================================== -->
            <!-- MLA PROFILE OVERVIEW -->
            <!-- ===================================== -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-lg-2 text-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHU7JyHwMp4-aGduf9KRGRs2xpyfTRNMV10lrRCXPC&s"
                                class="rounded-circle img-thumbnail" width="120">
                        </div>

                        <div class="col-lg-7">

                            <h3 class="fw-bold mb-2">
                                Chh. Shivendrasinh Bhosale
                            </h3>

                            <p class="mb-1">
                                <strong>MLA ID :</strong> MLA-501
                            </p>

                            <p class="mb-1">
                                <strong>Constituency ID :</strong> CON-102
                            </p>

                            <p class="mb-0">
                                <strong>Constituency :</strong> Satara
                            </p>

                        </div>

                        <div class="col-lg-3 text-center">

                            <h4 class="text-warning">
                                ★ 4.8 / 5
                            </h4>

                            <span class="badge bg-success">
                                High Performance
                            </span>

                        </div>

                    </div>

                </div>
            </div>

            <!-- ===================================== -->
            <!-- KPI CARDS -->
            <!-- ===================================== -->
            <div class="row g-4 mb-4">

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-road fa-2x text-primary mb-2"></i>
                            <h3>145</h3>
                            <p>Total Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                            <h3>118</h3>
                            <p>Completed Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                            <h3>27</h3>
                            <p>Ongoing Works</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-exclamation-circle fa-2x text-danger mb-2"></i>
                            <h3>15</h3>
                            <p>Pending Complaints</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-check-double fa-2x text-success mb-2"></i>
                            <h3>420</h3>
                            <p>Resolved Complaints</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-star fa-2x text-warning mb-2"></i>
                            <h3>4.8</h3>
                            <p>Average Rating</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ===================================== -->
            <!-- PERFORMANCE ANALYTICS -->
            <!-- ===================================== -->
            <div class="row g-4 mb-4">

                <div class="col-lg-6">

                    <div class="card border-0 shadow h-100">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Work Progress Summary
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="mb-4">

                                <div class="d-flex justify-content-between">
                                    <span>Completed Works</span>
                                    <span>81%</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width:81%">
                                    </div>
                                </div>

                            </div>

                            <div>

                                <div class="d-flex justify-content-between">
                                    <span>Ongoing Works</span>
                                    <span>19%</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:19%">
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border-0 shadow h-100">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Rating Analytics
                            </h5>
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">

                                <tr>
                                    <th>Average Rating</th>
                                    <td>4.8 / 5</td>
                                </tr>

                                <tr>
                                    <th>Total Reviews</th>
                                    <td>3,245</td>
                                </tr>

                                <tr>
                                    <th>Positive Ratings</th>
                                    <td>91%</td>
                                </tr>

                                <tr>
                                    <th>Citizen Satisfaction</th>
                                    <td>89%</td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ===================================== -->
            <!-- CREDIBILITY & ENGAGEMENT -->
            <!-- ===================================== -->
            <div class="row g-4 mb-4">

                <div class="col-lg-6">

                    <div class="card border-0 shadow">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Credibility Score
                            </h5>
                        </div>

                        <div class="card-body text-center">

                            <h1 class="display-4 text-success">
                                91%
                            </h1>

                            <div class="progress">
                                <div class="progress-bar bg-success" style="width:91%">
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border-0 shadow">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Engagement Score
                            </h5>
                        </div>

                        <div class="card-body text-center">

                            <h1 class="display-4 text-primary">
                                88%
                            </h1>

                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width:88%">
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ===================================== -->
            <!-- COMPLAINTS & SURVEY -->
            <!-- ===================================== -->
            <div class="row g-4">

                <div class="col-lg-6">

                    <div class="card border-0 shadow h-100">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Complaint Status Overview
                            </h5>
                        </div>

                        <div class="card-body">

                            <table class="table">

                                <tr>
                                    <th>Pending Complaints</th>
                                    <td>
                                        <span class="badge bg-danger">
                                            15
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Resolved Complaints</th>
                                    <td>
                                        <span class="badge bg-success">
                                            420
                                        </span>
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border-0 shadow h-100">

                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                Survey Participation Summary
                            </h5>
                        </div>

                        <div class="card-body">

                            <h3 class="text-primary">
                                12,450 Responses
                            </h3>

                            <p>
                                Citizens actively participated in constituency surveys.
                            </p>

                            <div class="progress">
                                <div class="progress-bar bg-info" style="width:78%">
                                    78%
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
    <script>// MLA Dashboard counter animations
        document.addEventListener('DOMContentLoaded', function () {
            // Counter animations for all numbers
            const counters = document.querySelectorAll('.dashboard_module .row.g-4.mb-4 h3, .dashboard_module .display-4');

            counters.forEach(counter => {
                const text = counter.innerText;
                // Skip if it contains rating stars or non-numeric
                if (text.includes('★') || text.includes('/')) return;

                let target = parseFloat(text.replace(/,/g, ''));
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
                            counter.innerText = Math.round(current).toLocaleString();
                        }
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.innerText = text;
                    }
                };
                updateCounter();
            });

            // Animate progress bars on load
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
        });</script>
      <script src="<?= base_url('assets/user/js/navbar.js') ?>"></script>
</body>

</html>