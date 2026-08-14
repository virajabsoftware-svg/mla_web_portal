<?php
// In your feedback-dashboard.php controller or view, 
// make sure the page uses the same layout structure as the main dashboard
?>

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
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        /* ===================================================== */
        /* PREMIUM FEEDBACK DASHBOARD - White + Beige + Gold Theme
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

        /* ===================================================== */
        /* FIX: USE SAME LAYOUT AS MAIN ADMIN DASHBOARD */
        /* ===================================================== */
        
        /* Remove any custom padding that might restrict width */
        .feedback_dashboard {
            padding: 30px 15px;
            width: 100%;
            max-width: 100%;
            margin: 0;
        }

        /* Ensure the container matches the main dashboard structure */
        .feedback_dashboard .container-fluid,
        .feedback_dashboard > .container-fluid,
        .feedback_dashboard .row {
            padding-left: 0;
            padding-right: 0;
            margin-left: 0;
            margin-right: 0;
            width: 100%;
            max-width: 100%;
        }

        /* Match the main dashboard's content area */
        .feedback_dashboard .col-12 {
            padding-left: 12px;
            padding-right: 12px;
        }

        /* ===================================================== */
        /* MAHARASHTRA FEEDBACK CARD - Premium Design (UNCHANGED) */
        /* ===================================================== */

        .maharashtra-feedback-card {
            background: linear-gradient(145deg, #ffffff 0%, #fef8f0 50%, #faf3e6 100%);
            border-radius: var(--radius-xxl);
            padding: 40px 30px 35px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            cursor: default;
        }

        /* Premium Gold Gradient Border Animation */
        .maharashtra-feedback-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--gold-light), var(--gold), var(--gold-dark), var(--gold), var(--gold-light));
            background-size: 300% 300%;
            border-radius: calc(var(--radius-xxl) + 2px);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .maharashtra-feedback-card:hover::before {
            opacity: 0.7;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Subtle Shine Effect */
        .maharashtra-feedback-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, transparent 10%, rgba(255, 255, 240, 0.4) 40%, transparent 60%);
            transform: rotate(25deg);
            transition: transform 0.7s ease;
            opacity: 0;
            pointer-events: none;
        }

        .maharashtra-feedback-card:hover::after {
            opacity: 1;
            transform: rotate(25deg) translateX(40%);
        }

        .maharashtra-feedback-card:hover {
            transform: translateY(-8px) scale(1.005);
            box-shadow: var(--shadow-gold-lg);
        }

        /* Decorative corner accents */
        .maharashtra-feedback-card .corner-accent {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 2px solid rgba(212, 175, 55, 0.2);
            border-radius: 8px;
            opacity: 0.6;
            transition: all var(--transition-base);
        }

        .maharashtra-feedback-card .corner-accent.tl {
            top: 15px;
            left: 15px;
            border-right: none;
            border-bottom: none;
            border-radius: 8px 0 0 0;
        }

        .maharashtra-feedback-card .corner-accent.tr {
            top: 15px;
            right: 15px;
            border-left: none;
            border-bottom: none;
            border-radius: 0 8px 0 0;
        }

        .maharashtra-feedback-card .corner-accent.bl {
            bottom: 15px;
            left: 15px;
            border-right: none;
            border-top: none;
            border-radius: 0 0 0 8px;
        }

        .maharashtra-feedback-card .corner-accent.br {
            bottom: 15px;
            right: 15px;
            border-left: none;
            border-top: none;
            border-radius: 0 0 8px 0;
        }

        .maharashtra-feedback-card:hover .corner-accent {
            border-color: var(--gold);
            opacity: 1;
        }

        /* Card Header */
        .feedback-card-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .feedback-card-header .header-icon {
            font-size: 28px;
            color: var(--gold);
            animation: floatIcon 3s ease-in-out infinite;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .feedback-card-header .header-title {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #0F172A;
            letter-spacing: 2px;
            text-transform: uppercase;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold), var(--gold-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Decorative line */
        .feedback-card-divider {
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            margin: 0 auto 18px auto;
            border-radius: 10px;
        }

        /* Content */
        .feedback-card-content {
            position: relative;
            z-index: 1;
        }

        .feedback-label {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 6px;
        }

        .feedback-total {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 4px;
        }

        .feedback-arrow {
            font-size: 36px;
            font-weight: 700;
            color: var(--gold);
            animation: arrowPulse 1.8s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes arrowPulse {
            0%, 100% { transform: translateY(0px) scale(1); opacity: 1; }
            50% { transform: translateY(-6px) scale(1.1); opacity: 0.8; }
        }

        .feedback-number {
            font-family: 'Space Grotesk', monospace;
            font-size: 58px;
            font-weight: 800;
            color: #0F172A;
            line-height: 1.1;
            background: linear-gradient(135deg, #0F172A, var(--gold-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        /* Subtitle */
        .feedback-subtitle {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 400;
            color: #94A3B8;
            margin-top: 8px;
            letter-spacing: 0.5px;
        }

        .feedback-subtitle i {
            color: var(--gold);
            margin-right: 4px;
        }

        /* ===================================================== */
        /* MLA FEEDBACK COUNT TABLE - Premium Design (UNCHANGED) */
        /* ===================================================== */

        .mla_feedback_section {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-xl);
            padding: 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .mla_feedback_section:hover {
            box-shadow: var(--shadow-gold);
        }

        .mla_feedback_section .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mla_feedback_section .section-title i {
            color: var(--gold);
        }

        .mla_count_table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .mla_count_table thead th {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            color: white;
            padding: 15px 20px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .mla_count_table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .mla_count_table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .mla_count_table tbody tr {
            background: rgba(255, 255, 255, 0.8);
            transition: all var(--transition-base);
            cursor: default;
        }

        .mla_count_table tbody tr:hover {
            transform: scale(1.01);
            box-shadow: var(--shadow-gold);
            background: white;
        }

        .mla_count_table tbody td {
            padding: 15px 20px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-left: none;
            border-right: none;
            font-size: 14px;
            color: #1E293B;
        }

        .mla_count_table tbody td:first-child {
            border-left: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 12px 0 0 12px;
        }

        .mla_count_table tbody td:last-child {
            border-right: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 0 12px 12px 0;
        }

        .mla_count_badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
            color: var(--gold-dark);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .mla_count_badge.high {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.12), rgba(239, 68, 68, 0.05));
            color: #EF4444;
            border-color: rgba(239, 68, 68, 0.2);
        }

        .mla_count_badge.medium {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(245, 158, 11, 0.05));
            color: #F59E0B;
            border-color: rgba(245, 158, 11, 0.2);
        }

        .mla_count_badge.low {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(16, 185, 129, 0.05));
            color: #10B981;
            border-color: rgba(16, 185, 129, 0.2);
        }

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

        .maharashtra-feedback-card,
        .mla_feedback_section {
            animation: fadeInUp 0.5s ease backwards;
        }

        .maharashtra-feedback-card {
            animation-delay: 0.02s;
        }

        .mla_feedback_section {
            animation-delay: 0.08s;
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

        .floating {
            animation: floatCard 4s ease-in-out infinite;
        }

        @keyframes floatCard {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-6px); }
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
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.15);
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

        .container-fluid.cream-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer {
            margin-top: auto !important;
        }

        @media (max-width: 768px) {
            .feedback_dashboard {
                padding: 15px 10px;
            }

            .maharashtra-feedback-card {
                padding: 30px 20px 25px 20px;
                min-height: 220px;
            }

            .feedback-card-header .header-title {
                font-size: 18px;
            }

            .feedback-number {
                font-size: 42px;
            }

            .feedback-arrow {
                font-size: 28px;
            }

            .mla_feedback_section {
                padding: 15px;
            }

            .mla_count_table thead {
                display: none;
            }

            .mla_count_table tbody tr {
                display: block;
                margin-bottom: 15px;
                border-radius: var(--radius-md);
                padding: 15px;
                background: white;
                box-shadow: var(--shadow-sm);
            }

            .mla_count_table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 12px !important;
                border: none !important;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
                border-radius: 0 !important;
            }

            .mla_count_table tbody td:last-child {
                border-bottom: none;
            }

            .mla_count_table tbody td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #64748B;
                font-size: 12px;
            }

            .footer {
                margin: 1.5rem 15px 20px 15px !important;
                padding: 0.9rem 1rem !important;
            }

            .footer p {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .feedback_dashboard {
                padding: 10px 5px;
            }

            .maharashtra-feedback-card {
                padding: 20px 15px 18px 15px;
                min-height: 180px;
            }

            .feedback-card-header .header-title {
                font-size: 15px;
            }

            .feedback-card-header .header-icon {
                font-size: 20px;
            }

            .feedback-number {
                font-size: 34px;
            }

            .feedback-arrow {
                font-size: 22px;
            }

            .feedback-label {
                font-size: 12px;
                letter-spacing: 2px;
            }

            .feedback-card-divider {
                width: 50px;
                margin-bottom: 12px;
            }
        }

        @media (min-width: 1400px) {
            .maharashtra-feedback-card {
                padding: 50px 40px 40px 40px;
                min-height: 320px;
            }

            .feedback-number {
                font-size: 72px;
            }

            .feedback-card-header .header-title {
                font-size: 28px;
            }
        }
    </style>
</head>

<body class="inner_page widgets">
    <?php include "common/header.php"?>  
    
    <!-- ===================================================== -->
    <!-- MAIN CONTENT WRAPPER - MATCHING ADMIN DASHBOARD      -->
    <!-- ===================================================== -->
    <div class="main-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar is already included via header.php or separate -->
                <div class="col-md-12 col-lg-10 col-xl-10 offset-lg-1 offset-xl-1">
                    <!-- Your existing content -->
                    <div class="feedback_dashboard">

                        <!-- ================= MAHARASHTRA FEEDBACK CARD ================= -->
                        <div class="row">
                            <div class="col-12">
                                <div class="maharashtra-feedback-card" id="maharashtraFeedbackCard">
                                    <!-- Corner Accents -->
                                    <div class="corner-accent tl"></div>
                                    <div class="corner-accent tr"></div>
                                    <div class="corner-accent bl"></div>
                                    <div class="corner-accent br"></div>

                                    <!-- Header -->
                                    <div class="feedback-card-header">
                                        <i class="fas fa-map-marked-alt header-icon"></i>
                                        <span class="header-title">Maharashtra Feedback</span>
                                    </div>

                                    <!-- Divider -->
                                    <div class="feedback-card-divider"></div>

                                    <!-- Content -->
                                    <div class="feedback-card-content">
                                        <div class="feedback-label">
                                            <i class="fas fa-chart-line me-1"></i> Total Feedbacks
                                        </div>

                                        <div class="feedback-total">
                                            <span class="feedback-arrow">↑</span>
                                            <span class="feedback-number" id="maharashtraTotalFeedbacks">
                                                <?= number_format((int)($totalFeedbacks ?? 0)) ?>
                                            </span>
                                        </div>

                                        <div class="feedback-subtitle">
                                            <i class="fas fa-database"></i> Live from database
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ================= MLA FEEDBACK COUNT SECTION ================= -->
                        <div class="mla_feedback_section">
                            <div class="section-title">
                                <i class="fas fa-user-tie me-2"></i> MLA-wise Feedback Count
                                <span style="font-size: 14px; font-weight: 400; color: #64748B; margin-left: auto;">
                                    <i class="fas fa-chart-bar me-1"></i> Total feedbacks received by each MLA
                                </span>
                            </div>

                            <div class="table-responsive">
                                <table class="mla_count_table" id="mlaCountTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%;">MLA Name</th>
                                            <th style="width: 25%;">Total Feedbacks</th>
                                            <th style="width: 25%;">Avg. Rating</th>
                                            <th style="width: 20%;">Performance</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mlaCountBody">
                                        <!-- Dynamic content will be rendered here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // =====================================================
        // MAHARASHTRA FEEDBACK COUNT - DATABASE DRIVEN
        // =====================================================

        // Get the initial total from PHP (passed from controller)
        const initialTotal = <?= (int)($totalFeedbacks ?? 0) ?>;

        // =====================================================
        // COUNTER ANIMATION
        // =====================================================
        function animateCounter(elementId, targetValue) {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const numericValue = parseInt(targetValue);
            const duration = 1000; // 1 second
            const steps = 50;
            const increment = numericValue / steps;
            let step = 0;

            const timer = setInterval(() => {
                step++;
                current += increment;
                if (step >= steps) {
                    element.textContent = numericValue.toLocaleString('en-IN');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString('en-IN');
                }
            }, duration / steps);
        }

        // =====================================================
        // UPDATE MAHARASHTRA COUNT FROM DATABASE
        // =====================================================
        function updateMaharashtraCount() {
            // Use AJAX to get the latest count from database
            $.ajax({
                url: '<?= base_url('admin/feedback-dashboard/count') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const newTotal = response.totalFeedbacks;
                        const currentElement = document.getElementById('maharashtraTotalFeedbacks');
                        const currentText = currentElement.textContent.replace(/,/g, '');
                        const currentValue = parseInt(currentText) || 0;

                        // Only update if the value has changed
                        if (newTotal !== currentValue) {
                            animateCounter('maharashtraTotalFeedbacks', newTotal);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX error:', error);
                }
            });
        }

        // =====================================================
        // MLA FEEDBACK DATA (Static for now - preserve existing)
        // =====================================================
        const feedbackData = [
            { mla: "MLA Rahul Patil", feedbacks: 2450, rating: 4.8 },
            { mla: "MLA Amit Deshmukh", feedbacks: 2100, rating: 4.5 },
            { mla: "MLA Vikas More", feedbacks: 1850, rating: 4.2 },
            { mla: "MLA Meena Sharma", feedbacks: 1700, rating: 4.6 },
            { mla: "MLA Sanjay Patil", feedbacks: 1500, rating: 4.0 },
            { mla: "MLA Rajesh Kulkarni", feedbacks: 1200, rating: 3.8 },
            { mla: "MLA Sunil Shinde", feedbacks: 980, rating: 3.5 },
            { mla: "MLA Ashok Pawar", feedbacks: 850, rating: 3.2 }
        ];

        // =====================================================
        // RENDER MLA FEEDBACK COUNT
        // =====================================================
        function renderMLACount() {
            const tbody = document.getElementById('mlaCountBody');
            if (!tbody) return;

            // Sort by feedbacks (highest first)
            const sortedMLAs = [...feedbackData].sort((a, b) => b.feedbacks - a.feedbacks);

            let html = '';
            let rank = 1;

            sortedMLAs.forEach((mlaData) => {
                let badgeClass = 'low';
                if (mlaData.feedbacks >= 2000) badgeClass = 'high';
                else if (mlaData.feedbacks >= 1200) badgeClass = 'medium';

                let rankIcon = '';
                if (rank === 1) rankIcon = '🥇 ';
                else if (rank === 2) rankIcon = '🥈 ';
                else if (rank === 3) rankIcon = '🥉 ';

                let performanceColor = '';
                if (mlaData.rating >= 4.5) performanceColor = '#10B981';
                else if (mlaData.rating >= 3.8) performanceColor = '#F59E0B';
                else performanceColor = '#EF4444';

                html += `
                    <tr>
                        <td data-label="MLA Name">
                            <strong style="color: #0F172A;">
                                ${rankIcon}${mlaData.mla}
                            </strong>
                        </td>
                        <td data-label="Total Feedbacks">
                            <span class="mla_count_badge ${badgeClass}">
                                ${mlaData.feedbacks.toLocaleString()}
                            </span>
                        </td>
                        <td data-label="Avg. Rating">
                            <span style="font-weight: 700; color: #1E293B;">
                                ${mlaData.rating.toFixed(1)} ⭐
                            </span>
                        </td>
                        <td data-label="Performance">
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress" style="width: 100px; height: 6px;">
                                    <div class="progress-bar" 
                                         style="width: ${(mlaData.rating / 5) * 100}%; border-radius: 20px; 
                                                background: ${performanceColor} !important;">
                                    </div>
                                </div>
                                <span style="font-size: 13px; font-weight: 700; color: #1E293B;">
                                    ${Math.round((mlaData.rating / 5) * 100)}%
                                </span>
                            </div>
                        </td>
                    </tr>
                `;
                rank++;
            });

            tbody.innerHTML = html;
        }

        // =====================================================
        // INITIALIZE
        // =====================================================
        document.addEventListener("DOMContentLoaded", function() {
            // Animate the initial count
            animateCounter('maharashtraTotalFeedbacks', initialTotal);

            // Render MLA table
            renderMLACount();

            // Add floating class to card
            document.getElementById('maharashtraFeedbackCard')?.classList.add('floating');

            // Auto-refresh count every 30 seconds (AJAX polling)
            setInterval(updateMaharashtraCount, 30000);
        });
    </script>
    <script src="header.js"></script>
</body>

</html>