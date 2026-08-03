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
        .badge.bg-success {
            position: relative;
        }

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
                            <h3>28</h3>
                            <p class="mb-0">Total Feedback</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>18</h3>
                            <p class="mb-0">Reviewed</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>07</h3>
                            <p class="mb-0">Under Review</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h3>03</h3>
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

                    <form>

                        <div class="row g-3">

                            <!-- Feedback ID -->
                            <div class="col-md-3">
                                <label class="form-label">Feedback ID</label>
                                <input type="text" class="form-control" value="FDB001245" readonly>
                            </div>

                            <!-- Voter ID -->
                            <div class="col-md-3">
                                <label class="form-label">Voter ID</label>
                                <input type="text" class="form-control" value="VTR10254" readonly>
                            </div>

                            <!-- MLA ID -->
                            <div class="col-md-3">
                                <label class="form-label">MLA ID</label>
                                <input type="text" class="form-control" value="MLA501" readonly>
                            </div>

                            <!-- Work ID -->
                            <div class="col-md-3">
                                <label class="form-label">Work ID (Optional)</label>
                                <input type="text" class="form-control" placeholder="Enter Work ID">
                            </div>

                            <!-- District -->
                            <div class="col-md-4">
                                <label class="form-label">District</label>
                                <select class="form-select" id="district">
                                    <option value="">Select District</option>
                                </select>
                            </div>

                            <!-- Constituency -->
                            <div class="col-md-4">
                                <label class="form-label">Constituency</label>
                                <select class="form-select" id="constituency">
                                    <option value="">Select Constituency</option>
                                </select>
                            </div>

                            <!-- Village -->
                            <div class="col-md-4">
                                <label class="form-label">Village</label>
                                <input type="text" class="form-control" placeholder="Enter Village Name">
                            </div>

                            <!-- Feedback Category -->
                            <div class="col-md-6">
                                <label class="form-label">Feedback Category</label>
                                <select class="form-select">
                                    <option>Select Category</option>
                                    <option>MLA Performance</option>
                                    <option>Road Development</option>
                                    <option>Water Supply</option>
                                    <option>Health Services</option>
                                    <option>Education</option>
                                    <option>Public Services</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <!-- Source -->
                            <div class="col-md-6">
                                <label class="form-label">Source</label>
                                <input type="text" class="form-control" value="Web Portal" readonly>
                            </div>

                            <!-- Feedback Description -->
                            <div class="col-12">
                                <label class="form-label">Feedback Description</label>
                                <textarea class="form-control" rows="5"
                                    placeholder="Enter detailed feedback"></textarea>
                            </div>

                            <!-- Attachments -->
                            <div class="col-md-6">
                                <label class="form-label">Upload Attachments</label>
                                <input type="file" class="form-control" multiple>
                            </div>

                            <!-- Auto Date -->
                            <div class="col-md-6">
                                <label class="form-label">Submission Timestamp</label>
                                <input type="datetime-local" class="form-control" id="submissionDate" readonly>
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

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                                <tr>
                                    <th>Name</th>
                                    <th>Village</th>
                                    <th>Category</th>
                                    <th>Feedback</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                </tr>

                            </thead>

                            <tbody>

                                <tr>
                                    <td>Vedant Patil</td>

                                    <td>Bavdhan</td>

                                    <td>Road Development</td>

                                    <td>
                                        Road near main market requires urgent repair.
                                    </td>

                                    <td>
                                        01-Jun-2026 <br>
                                        <small class="text-muted">10:30 AM</small>
                                    </td>

                                    <td>
                                        <span class="badge bg-warning">
                                            Under Review
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Vedant Patil</td>

                                    <td>Wai</td>

                                    <td>Water Supply</td>

                                    <td>
                                        Water supply is irregular in our area.
                                    </td>

                                    <td>
                                        29-May-2026 <br>
                                        <small class="text-muted">03:45 PM</small>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Reviewed
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Vedant Patil</td>

                                    <td>Panchgani</td>

                                    <td>Health Services</td>

                                    <td>
                                        Need additional medical staff at PHC.
                                    </td>

                                    <td>
                                        24-May-2026 <br>
                                        <small class="text-muted">11:15 AM</small>
                                    </td>

                                    <td>
                                        <span class="badge bg-info">
                                            In Progress
                                        </span>
                                    </td>
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
    <!-- MAIN DASHBOARD CONTENT -->
    <script>// Feedback dashboard interactive features
        document.addEventListener('DOMContentLoaded', function () {
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

            // Handle form submission
            const submitBtn = document.querySelector('.btn-primary');
            if (submitBtn) {
                submitBtn.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Validate required fields
                    const category = document.querySelector('.form-select').value;
                    const description = document.querySelector('textarea').value;

                    if (!category || category === 'Select Category') {
                        alert('Please select a feedback category.');
                        return;
                    }

                    if (!description.trim()) {
                        alert('Please enter feedback description.');
                        return;
                    }

                    // Show success message
                    alert('Feedback submitted successfully! Your feedback ID will be sent to your registered email.');

                    // Reset form
                    document.querySelector('textarea').value = '';
                    document.querySelector('.form-select').selectedIndex = 0;
                    document.querySelector('input[type="file"]').value = '';

                    // Update summary stats
                    const totalFeedback = document.querySelector('.feedback_dashboard .row.g-4.mb-4 .card-body h3');
                    if (totalFeedback) {
                        const currentTotal = parseInt(totalFeedback.innerText);
                        totalFeedback.innerText = currentTotal + 1;
                    }

                    const underReview = document.querySelectorAll('.feedback_dashboard .row.g-4.mb-4 .card-body h3')[2];
                    if (underReview) {
                        const currentReview = parseInt(underReview.innerText);
                        underReview.innerText = currentReview + 1;
                    }
                });
            }

            // Handle reset button
            const resetBtn = document.querySelector('.btn-secondary');
            if (resetBtn) {
                resetBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector('textarea').value = '';
                    document.querySelector('.form-select').selectedIndex = 0;
                    document.querySelector('input[type="file"]').value = '';
                    document.querySelector('input[placeholder="Enter Work ID"]').value = '';
                    document.querySelector('input[type="datetime-local"]').value = '';
                });
            }

            // Add click handler to feedback rows for viewing details
            const feedbackRows = document.querySelectorAll('.table tbody tr');
            feedbackRows.forEach(row => {
                row.addEventListener('click', function () {
                    const feedbackId = this.cells[0].innerText;
                    const category = this.cells[1].innerText;
                    const status = this.cells[2].innerText;
                    alert(`Feedback ID: ${feedbackId}\nCategory: ${category}\nStatus: ${status}\n\nFull details will be available in the feedback tracking section.`);
                });
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

    <script src=navbar.js></script>
</body>

</html>