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
        .feedback_dashboard {
            width: 100%;
            max-width: 100%;
        }

        /* Bootstrap row overrides */
        .feedback_dashboard .row,
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

        /* All cards in feedback dashboard */
        .feedback_dashboard .card {
            border-radius: 20px !important;
            transition: var(--transition-smooth);
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(195, 200, 72, 0.3);
            position: relative;
            overflow: hidden;
        }

        /* Gradient border animation */
        .feedback_dashboard .card::before {
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

        .feedback_dashboard .card:hover::before {
            opacity: 0.6;
            animation: gradientShift 3s ease infinite;
        }

        .feedback_dashboard .card:hover {
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

        /* Summary cards (Feedback Stats) */
        .feedback_dashboard .row.g-4.mb-4 .card-body {
            padding: 1.5rem;
            text-align: center;
        }

        .feedback_dashboard .row.g-4.mb-4 .card-body h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--teal-blue);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--teal-blue), var(--olive-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feedback_dashboard .row.g-4.mb-4 .card-body p {
            color: var(--dark-olive);
            font-weight: 500;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        /* Card headers */
        .feedback_dashboard .card-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            padding: 1rem 1.5rem;
            border-radius: 20px 20px 0 0 !important;
        }

        .feedback_dashboard .card-header.bg-white {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05)) !important;
        }

        .feedback_dashboard .card-header h5 {
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

        .form-control[readonly] {
            background: rgba(195, 200, 72, 0.1);
            cursor: not-allowed;
        }

        /* File input styling */
        input[type="file"].form-control {
            padding: 8px 12px;
        }

        input[type="file"].form-control::-webkit-file-upload-button {
            background: linear-gradient(95deg, var(--lime-gold), #A9B43C);
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            color: #1F3F3A;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        input[type="file"].form-control::-webkit-file-upload-button:hover {
            transform: scale(1.02);
            background: linear-gradient(95deg, #d4da5a, #7f9f2f);
        }

        /* Button styling */
        .btn-primary {
            background: linear-gradient(95deg, var(--lime-gold), #A9B43C);
            border: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            color: #1F3F3A;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
            margin-right: 12px;
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

        .btn-secondary {
            background: rgba(195, 200, 72, 0.2);
            border: 1px solid rgba(195, 200, 72, 0.6);
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 600;
            color: var(--teal-blue);
            transition: all 0.2s;
        }

        .btn-secondary:hover {
            background: rgba(195, 200, 72, 0.3);
            transform: scale(1.02);
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 0.8rem;
            border-radius: 8px;
            margin: 0 2px;
        }

        .btn-outline-primary {
            border: 1px solid var(--lime-gold);
            color: var(--teal-blue);
        }

        .btn-outline-primary:hover {
            background: var(--lime-gold);
            color: #1F3F3A;
        }

        .btn-outline-danger {
            border: 1px solid #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background: #dc3545;
            color: white;
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

        .badge.bg-info {
            background: var(--teal-blue) !important;
            color: white;
        }

        .badge.bg-secondary {
            background: #6c757d !important;
            color: white;
        }

        .badge.bg-danger {
            background: #dc3545 !important;
            color: white;
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

        .table-bordered {
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        /* Table responsive */
        .table-responsive {
            border-radius: 12px;
            overflow-x: auto;
        }

        /* Textarea styling */
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
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

        /* Pulse animation for under review items */
        .pulse-feedback {
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

            .feedback_dashboard .row.g-4.mb-4 .card-body h3 {
                font-size: 2rem;
            }

            .btn-primary,
            .btn-secondary {
                padding: 10px 20px;
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

            .feedback_dashboard .row.g-4.mb-4 .card-body h3 {
                font-size: 1.75rem;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                margin-right: 0;
                margin-bottom: 10px;
            }

            .col-12 .btn-primary,
            .col-12 .btn-secondary {
                display: block;
                width: 100%;
            }
        }

        /* Mobile (576px) */
        @media (max-width: 576px) {
            .main-content {
                padding: 0.875rem 1rem;
            }

            .feedback_dashboard .card-header {
                padding: 0.875rem 1rem;
            }

            .feedback_dashboard .card-body {
                padding: 1rem;
            }

            .feedback_dashboard .row.g-4.mb-4 .card-body h3 {
                font-size: 1.5rem;
            }

            .table thead th,
            .table tbody td {
                padding: 8px;
                font-size: 0.8rem;
            }

            .form-label {
                font-size: 0.85rem;
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
           FEEDBACK SPECIFIC STYLES
           ============================================ */

        /* Hover effect for table rows with feedback */
        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background: rgba(195, 200, 72, 0.08);
            transform: translateX(2px);
        }

        /* Under review indicator animation */
        .badge.bg-warning {
            position: relative;
            padding-right: 20px;
        }

        .badge.bg-warning::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 6px;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background: var(--dark-olive);
            border-radius: 50%;
            animation: pulseReview 1.5s infinite;
        }

        @keyframes pulseReview {
            0% {
                opacity: 1;
                transform: translateY(-50%) scale(1);
            }

            50% {
                opacity: 0.3;
                transform: translateY(-50%) scale(0.8);
            }

            100% {
                opacity: 1;
                transform: translateY(-50%) scale(1);
            }
        }

        /* Success badge styling */
        .badge.bg-success::before {
            content: '✓';
            margin-right: 4px;
            font-weight: bold;
        }

        /* Form row spacing */
        .feedback_dashboard .row.g-3 {
            margin-bottom: 0;
        }

        /* Attachment info text */
        .small-text {
            font-size: 0.75rem;
            color: var(--dark-olive);
            opacity: 0.7;
            margin-top: 4px;
            display: block;
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

        /* Delete form styling */
        .delete-form {
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 20px !important;
            border: 1px solid rgba(195, 200, 72, 0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, rgba(195, 200, 72, 0.2), rgba(34, 86, 97, 0.05));
            border-bottom: 1px solid rgba(195, 200, 72, 0.4);
            border-radius: 20px 20px 0 0 !important;
        }

        .modal-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
        }

        .modal-footer {
            border-top: 1px solid rgba(195, 200, 72, 0.3);
        }

        .detail-row {
            padding: 8px 0;
            border-bottom: 1px solid rgba(195, 200, 72, 0.1);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--teal-blue);
            font-size: 0.85rem;
        }

        .detail-value {
            color: var(--dark-olive);
            font-size: 0.95rem;
            margin-top: 2px;
        }

        /* Modal form styling */
        .modal .form-label {
            font-size: 0.85rem;
            margin-bottom: 4px;
        }

        .modal .form-control,
        .modal .form-select {
            font-size: 0.9rem;
            padding: 8px 12px;
        }

        /* Pagination styling to match existing theme */
        .pagination {
            margin-top: 1rem;
            margin-bottom: 0;
        }

        .pagination .page-link {
            color: var(--teal-blue);
            border: 1px solid rgba(195, 200, 72, 0.3);
            background: white;
            border-radius: 8px !important;
            margin: 0 2px;
            padding: 8px 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .pagination .page-link:hover {
            background: rgba(195, 200, 72, 0.1);
            border-color: var(--lime-gold);
            color: var(--olive-green);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(95deg, var(--lime-gold), #A9B43C);
            border-color: var(--lime-gold);
            color: #1F3F3A;
            font-weight: 600;
        }

        .pagination .page-item.disabled .page-link {
            color: #b0b0b0;
            background: #f5f5f5;
            border-color: #e0e0e0;
            cursor: not-allowed;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            border-radius: 8px !important;
        }
    </style>
</head>

<body>
   <?php include "common/header.php"?>
    <main class="main-content fade-page-transition">

        <div class="container-fluid feedback_dashboard">

            <!-- ================================= -->
            <!-- FEEDBACK SUMMARY -->
            <!-- ================================= -->

            <div class="row g-4 mb-4">

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3><?= isset($totalFeedback) ? $totalFeedback : 0 ?></h3>
                            <p class="mb-0">Total Feedback</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3><?= isset($reviewed) ? $reviewed : 0 ?></h3>
                            <p class="mb-0">Reviewed</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3><?= isset($underReview) ? $underReview : 0 ?></h3>
                            <p class="mb-0">Under Review</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3><?= isset($resolved) ? $resolved : 0 ?></h3>
                            <p class="mb-0">Resolved</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ================================= -->
            <!-- SUBMIT FEEDBACK -->
            <!-- ================================= -->

            <div class="card border-0 shadow mb-4">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        Submit Feedback
                    </h5>
                </div>

                <div class="card-body">

                    <!-- Validation Errors -->
                    <?php if(session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <div><?= $error ?></div>
                            <?php endforeach; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

            <form action="<?= base_url('user/feedback/save'); ?>" method="post"   enctype="multipart/form-data">

                    <?= csrf_field(); ?>

                        <div class="row g-3">

                            <!-- Feedback ID -->
                            <div class="col-md-3">
                                <label class="form-label">Feedback ID</label>
                                <input  type="text" name="feedback_id" class="form-control" value="<?= esc($feedback_id ?? '') ?>"
                                    readonly>
                            </div>

                            <!-- Voter ID -->
                            <div class="col-md-3">
                                <label class="form-label">Voter ID</label>
                                <input type="text" name="voter_id" class="form-control" value="<?= esc($voter_id ?? '') ?>"
                                readonly>
                            </div>

                            <!-- MLA ID -->
                            <div class="col-md-3">
                            <label class="form-label">MLA ID</label>
                            <input type="text" name="mla_id" class="form-control" value="<?= esc($mla_id ?? '') ?>"
                            readonly >
                            </div>

                            <!-- Work ID -->
                            <div class="col-md-3">
                                <label class="form-label">Work ID (Optional)</label>
                                <input type="text" class="form-control" placeholder="Enter Work ID" name="work_id" value="<?= isset($work_id) ? $work_id : '' ?>">
                            </div>

                            <!-- District -->
                            <div class="col-md-4">
                                <label class="form-label">District</label>
                                <input
                                    type="text"
                                    name="district"
                                    class="form-control"
                                    value="<?= esc($district ?? '') ?>"
                                    readonly>
                            </div>

                            <!-- Constituency -->
                            <div class="col-md-4">
                                <label class="form-label">Constituency</label>
                                <input
                                type="text"  name="constituency" class="form-control"  value="<?= esc($constituency ?? '') ?>"
                                readonly >
                             </div>

                            <!-- Village -->
                            <div class="col-md-4">
                                <label class="form-label">Village</label>
                                <input type="text" class="form-control" placeholder="Enter Village Name" name="village" value="<?= isset($village) ? $village : '' ?>">
                            </div>

                            <!-- Feedback Category -->
                            <div class="col-md-6">
                                <label class="form-label">Feedback Category</label>
                                <select class="form-select" name="category">
                                    <option value="">Select Category</option>
                                    <option value="MLA Performance">MLA Performance</option>
                                    <option value="Road Development">Road Development</option>
                                    <option value="Water Supply">Water Supply</option>
                                    <option value="Health Services">Health Services</option>
                                    <option value="Education">Education</option>
                                    <option value="Public Services">Public Services</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Source -->
                            <div class="col-md-6">
                                <label class="form-label">Source</label>
                                <input type="text" class="form-control" value="Web Portal" readonly name="source">
                            </div>

                            <!-- Feedback Description -->
                            <div class="col-12">
                                <label class="form-label">Feedback Description</label>
                                <textarea
                                    name="description"
                                    class="form-control"><?= isset($description) ? $description : '' ?></textarea>
                            </div>

                            <!-- Attachments -->
                            <div class="col-md-6">
                                <label class="form-label">Upload Attachments</label>
                                <input
                                type="file"
                                name="attachment"
                                class="form-control">
                            </div>

                            <!-- Auto Date -->
                            <div class="col-md-6">
                                <label class="form-label">Submission Timestamp</label>
                                <input type="datetime-local" class="form-control" id="submissionDate" readonly name="submitted_at">
                            </div>

                            <!-- Buttons -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Submit Feedback
                                </button>

                                <button type="reset" class="btn btn-secondary">
                                    Reset Form
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>


            <!-- ================================= -->
            <!-- FEEDBACK HISTORY -->
            <!-- ================================= -->

            <div class="card border-0 shadow">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        My Feedback History
                    </h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle" id="feedbackTable">

                            <thead class="table-light">

                                <tr>
                                    <th>Feedback ID</th>
                                    <th>Village</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Submitted Date</th>
                                    <th>Status</th>
                                    <th>Attachment</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody id="feedbackTableBody">
                                <?php if(isset($feedbacks) && !empty($feedbacks)): ?>
                                    <?php foreach($feedbacks as $feedback): ?>
                                        <tr data-id="<?= $feedback['id'] ?>">
                                            <td><?= esc($feedback['feedback_id']) ?></td>
                                            <td><?= esc($feedback['village']) ?></td>
                                            <td><?= esc($feedback['category']) ?></td>
                                            <td><?= esc(substr($feedback['description'], 0, 50) . (strlen($feedback['description']) > 50 ? '...' : '')) ?></td>
                                            <td>
                                                <?= date('d-M-Y', strtotime($feedback['submitted_at'])) ?><br>
                                                <small class="text-muted"><?= date('h:i A', strtotime($feedback['submitted_at'])) ?></small>
                                            </td>
                                            <td>
                                                <?php 
                                                    $statusClass = 'bg-secondary';
                                                    
                                                    if(strtolower($feedback['status']) == 'pending') {
                                                        $statusClass = 'bg-warning';
                                                    } elseif(strtolower($feedback['status']) == 'under review') {
                                                        $statusClass = 'bg-info';
                                                    } elseif(strtolower($feedback['status']) == 'reviewed') {
                                                        $statusClass = 'bg-success';
                                                    } elseif(strtolower($feedback['status']) == 'resolved') {
                                                        $statusClass = 'bg-success';
                                                    } elseif(strtolower($feedback['status']) == 'rejected') {
                                                        $statusClass = 'bg-danger';
                                                    }
                                                ?>
                                                <span class="badge <?= $statusClass ?>">
                                                    <?= ucfirst(esc($feedback['status'])) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if(!empty($feedback['attachment'])): ?>
                                                    <a href="<?= base_url('uploads/feedback/' . $feedback['attachment']) ?>" target="_blank" class="btn btn-sm btn-outline-primary" title="Download Attachment">
                                                        <i class="fas fa-paperclip"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">No file</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary view-feedback" 
                                                    data-id="<?= $feedback['id'] ?>"
                                                    title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-primary edit-feedback"
                                                    data-id="<?= $feedback['id'] ?>"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="<?= base_url('user/feedback/delete/' . $feedback['id']) ?>" method="post" class="delete-form" onsubmit="return confirmDelete(event)">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                <i class="fas fa-info-circle me-2"></i> No Feedback Found
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>

                    <!-- Pagination - FIXED: Removed invalid 'bootstrap_full' template -->
                    <?php if(isset($pager) && $pager): ?>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <span class="text-muted small">
                                Showing <?= (($pager->getCurrentPage() - 1) * $pager->getPerPage()) + 1 ?> 
                                to <?= min(($pager->getCurrentPage() * $pager->getPerPage()), $pager->getTotal()) ?> 
                                of <?= $pager->getTotal() ?> entries
                            </span>
                        </div>
                        <div>
                            <?= $pager->links() ?>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>
        <footer class="footer">
          <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
        </footer>
    </main>

    <!-- ================================= -->
    <!-- VIEW FEEDBACK MODAL -->
    <!-- ================================= -->
    <div class="modal fade" id="viewFeedbackModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle me-2"></i> Feedback Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewModalBody">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading feedback details...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================= -->
    <!-- EDIT FEEDBACK MODAL -->
    <!-- ================================= -->
    <div class="modal fade" id="editFeedbackModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2"></i> Edit Feedback
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editFeedbackForm" action="<?= base_url('user/feedback/update') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" id="editFeedbackId" value="">
                    <div class="modal-body">
                        <div id="editModalContent">
                            <div class="text-center py-4">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2">Loading feedback data...</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="editModalFooter" style="display:none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete confirmation function
        function confirmDelete(event) {
            event.preventDefault();
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#C3C848',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
            
            return false;
        }

        document.addEventListener('DOMContentLoaded', function () {
            // View Feedback Modal
            const viewModal = new bootstrap.Modal(document.getElementById('viewFeedbackModal'));
            const viewModalBody = document.getElementById('viewModalBody');
            
            document.querySelectorAll('.view-feedback').forEach(button => {
                button.addEventListener('click', function() {
                    const feedbackId = this.getAttribute('data-id');
                    
                    // Show loading
                    viewModalBody.innerHTML = `
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Loading feedback details...</p>
                        </div>
                    `;
                    
                    viewModal.show();
                    
                    // Fetch feedback data via AJAX
                    fetch('<?= base_url('user/feedback/getFeedbackData') ?>/' + feedbackId)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const f = data.data;
                                const statusClass = f.status_class || 'bg-secondary';
                                
                                viewModalBody.innerHTML = `
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="detail-row">
                                                    <div class="detail-label">Feedback ID</div>
                                                    <div class="detail-value">${f.feedback_id || '-'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Voter ID</div>
                                                    <div class="detail-value">${f.voter_id || '-'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">MLA ID</div>
                                                    <div class="detail-value">${f.mla_id || '-'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Work ID</div>
                                                    <div class="detail-value">${f.work_id || 'N/A'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">District</div>
                                                    <div class="detail-value">${f.districtName || '-'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Constituency</div>
                                                    <div class="detail-value">${f.constituencyName || '-'}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="detail-row">
                                                    <div class="detail-label">Village</div>
                                                    <div class="detail-value">${f.village || '-'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Category</div>
                                                    <div class="detail-value">${f.category || '-'}</div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Status</div>
                                                    <div class="detail-value">
                                                        <span class="badge ${statusClass}">${f.status || 'Pending'}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Submitted Date</div>
                                                    <div class="detail-value">${f.submitted_at || '-'}</div>
                                                </div>
                                                ${f.attachment ? `
                                                <div class="detail-row">
                                                    <div class="detail-label">Attachment</div>
                                                    <div class="detail-value">
                                                        <a href="<?= base_url('uploads/feedback/') ?>${f.attachment}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-download me-1"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                                ` : ''}
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="detail-row">
                                                    <div class="detail-label">Description</div>
                                                    <div class="detail-value">${f.description || '-'}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            } else {
                                viewModalBody.innerHTML = `
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-circle me-2"></i> ${data.message || 'Failed to load feedback data'}
                                    </div>
                                `;
                            }
                        })
                        .catch(error => {
                            viewModalBody.innerHTML = `
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle me-2"></i> Error loading feedback data
                                </div>
                            `;
                            console.error('Error:', error);
                        });
                });
            });

            // Edit Feedback Modal
            const editModal = new bootstrap.Modal(document.getElementById('editFeedbackModal'));
            const editModalContent = document.getElementById('editModalContent');
            const editModalFooter = document.getElementById('editModalFooter');
            const editFeedbackId = document.getElementById('editFeedbackId');
            
            document.querySelectorAll('.edit-feedback').forEach(button => {
                button.addEventListener('click', function() {
                    const feedbackId = this.getAttribute('data-id');
                    editFeedbackId.value = feedbackId;
                    
                    // Show loading
                    editModalContent.innerHTML = `
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Loading feedback data...</p>
                        </div>
                    `;
                    editModalFooter.style.display = 'none';
                    
                    editModal.show();
                    
                    // Fetch feedback data via AJAX
                    fetch('<?= base_url('user/feedback/getFeedbackData') ?>/' + feedbackId)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const f = data.data;
                                
                                editModalContent.innerHTML = `
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Feedback ID</label>
                                                    <input type="text" class="form-control" value="${f.feedback_id || ''}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Voter ID</label>
                                                    <input type="text" name="voter_id" class="form-control" value="${f.voter_id || ''}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">MLA ID</label>
                                                    <input type="text" name="mla_id" class="form-control" value="${f.mla_id || ''}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">District</label>
                                                    <input type="text" name="district" readonly class="form-control" value="${f.districtName || ''}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Constituency</label>
                                                    <input type="text" name="constituency" readonly class="form-control" value="${f.constituencyName || ''}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Village</label>
                                                    <input type="text" name="village" class="form-control" value="${f.village || ''}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select name="category" class="form-select" required>
                                                        <option value="MLA Performance" ${f.category == 'MLA Performance' ? 'selected' : ''}>MLA Performance</option>
                                                        <option value="Road Development" ${f.category == 'Road Development' ? 'selected' : ''}>Road Development</option>
                                                        <option value="Water Supply" ${f.category == 'Water Supply' ? 'selected' : ''}>Water Supply</option>
                                                        <option value="Health Services" ${f.category == 'Health Services' ? 'selected' : ''}>Health Services</option>
                                                        <option value="Education" ${f.category == 'Education' ? 'selected' : ''}>Education</option>
                                                        <option value="Public Services" ${f.category == 'Public Services' ? 'selected' : ''}>Public Services</option>
                                                        <option value="Other" ${f.category == 'Other' ? 'selected' : ''}>Other</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select" required>
                                                        <option value="Pending" ${f.status == 'Pending' ? 'selected' : ''}>Pending</option>
                                                        <option value="Under Review" ${f.status == 'Under Review' ? 'selected' : ''}>Under Review</option>
                                                        <option value="Reviewed" ${f.status == 'Reviewed' ? 'selected' : ''}>Reviewed</option>
                                                        <option value="Resolved" ${f.status == 'Resolved' ? 'selected' : ''}>Resolved</option>
                                                        <option value="Rejected" ${f.status == 'Rejected' ? 'selected' : ''}>Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Attachment</label>
                                                    <input type="file" name="attachment" class="form-control">
                                                    ${f.attachment ? `
                                                    <small class="text-muted mt-1 d-block">
                                                        Current: <a href="<?= base_url('uploads/feedback/') ?>${f.attachment}" target="_blank">${f.attachment}</a>
                                                    </small>
                                                    ` : ''}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" rows="4" required>${f.description || ''}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                
                                editModalFooter.style.display = 'flex';
                            } else {
                                editModalContent.innerHTML = `
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-circle me-2"></i> ${data.message || 'Failed to load feedback data'}
                                    </div>
                                `;
                            }
                        })
                        .catch(error => {
                            editModalContent.innerHTML = `
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle me-2"></i> Error loading feedback data
                                </div>
                            `;
                            console.error('Error:', error);
                        });
                });
            });

            // Handle Edit Form Submission via AJAX
            document.getElementById('editFeedbackForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const form = this;
                const formData = new FormData(form);
                
                Swal.fire({
                    title: 'Updating...',
                    text: 'Please wait while we update your feedback.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.message || 'Feedback updated successfully!',
                            confirmButtonColor: '#C3C848',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Close modal
                            bootstrap.Modal.getInstance(document.getElementById('editFeedbackModal')).hide();
                            // Reload page to refresh data
                            location.reload();
                        });
                    } else {
                        let errorMsg = data.message || 'Failed to update feedback';
                        if (data.errors) {
                            errorMsg = Object.values(data.errors).join('\n');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: errorMsg,
                            confirmButtonColor: '#C3C848',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while updating feedback.',
                        confirmButtonColor: '#C3C848',
                        confirmButtonText: 'OK'
                    });
                    console.error('Error:', error);
                });
            });

            // Counter animations for numbers
            const counters = document.querySelectorAll('.feedback_dashboard .row.g-4.mb-4 .card-body h3');
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
        });

        /* ===================================================== */
        /* DISTRICT + CONSTITUENCY DATA */
        /* ===================================================== */

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

        const districtSelect = document.getElementById("district");
        const constituencySelect = document.getElementById("constituency");

        // Load Districts
        Object.keys(districtData).forEach(district => {
            let option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });

        // Load Constituencies Based on District
        districtSelect.addEventListener("change", function () {

            constituencySelect.innerHTML =
                '<option value="">Select Constituency</option>';

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

            document.getElementById('submissionDate').value =
                `${year}-${month}-${day}T${hours}:${minutes}`;
        }

        updateDateTime();
        setInterval(updateDateTime, 60000);

    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?= session()->getFlashdata('success') ?>',
            confirmButtonColor: '#C3C848',
            confirmButtonText: 'OK'
        });
    </script>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?= session()->getFlashdata('error') ?>',
            confirmButtonColor: '#C3C848',
            confirmButtonText: 'OK'
        });
    </script>
    <?php endif; ?>

      <script src="<?= base_url('assets/user/js/navbar.js') ?>"></script>
</body>

</html>