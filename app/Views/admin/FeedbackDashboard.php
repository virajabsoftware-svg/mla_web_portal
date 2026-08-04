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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        .feedback_dashboard {
            padding: 30px;
        }

        /* ===================================================== */
        /* KPI CARDS - Premium Glassmorphism + All Effects */
        /* ===================================================== */

        .kpi_card {
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
        .kpi_card::before {
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
        .kpi_card::after {
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
        .kpi_card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
        }

        .kpi_card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .kpi_card:hover::after {
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

        .kpi_card h6 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: 0.9;
            margin-bottom: 12px;
        }

        .kpi_card h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 0;
            font-family: 'Space Grotesk', monospace;
        }

        /* Card Variants with Gold Accents */
        .total_feedback {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-left: 4px solid var(--gold-light);
        }

        .rating {
            background: linear-gradient(135deg, #10B981, #059669);
            border-left: 4px solid var(--gold);
        }

        .today {
            background: linear-gradient(135deg, #3B82F6, #2563EB);
            border-left: 4px solid var(--gold);
        }

        .mla {
            background: linear-gradient(135deg, #8B5CF6, #7C3AED);
            border-left: 4px solid var(--gold);
        }

        .work {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            border-left: 4px solid var(--gold);
        }

        .complaint {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border-left: 4px solid var(--gold);
        }

        /* Pulse Effect for Important Cards */
        .kpi_card.pulse-card {
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
        /* SENTIMENT CARDS - Premium Design */
        /* ===================================================== */

        .sentiment_card {
            padding: 28px;
            border-radius: var(--radius-xl);
            text-align: center;
            color: #fff;
            transition: all var(--transition-base);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .sentiment_card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, transparent 10%, rgba(255, 255, 255, 0.2) 40%, transparent 60%);
            transform: rotate(25deg);
            transition: transform 0.5s ease;
            opacity: 0;
            pointer-events: none;
        }

        .sentiment_card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: var(--shadow-gold);
        }

        .sentiment_card:hover::after {
            opacity: 1;
            transform: rotate(25deg) translateX(50%);
        }

        .positive {
            background: linear-gradient(135deg, #10B981, #059669);
            border-left: 4px solid var(--gold);
        }

        .neutral {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            border-left: 4px solid var(--gold);
        }

        .negative {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border-left: 4px solid var(--gold);
        }

        .sentiment_card h5 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .sentiment_card h2 {
            font-size: 42px;
            font-weight: 800;
            font-family: 'Space Grotesk', monospace;
        }

        /* Pulse for Sentiment Cards */
        .sentiment_card.pulse-card {
            animation: pulseCard 2s infinite;
        }

        @keyframes pulseCard {

            0%,
            100% {
                filter: brightness(1);
            }

            50% {
                filter: brightness(1.08);
            }
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
            margin-bottom: 18px;
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
            top: 12px;
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

        .timeline_item p {
            margin: 5px 0 0 0;
            font-size: 13px;
            color: #64748B;
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

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(16, 185, 129, 0.05));
            color: #059669;
            border-left: 3px solid #059669;
        }

        /* ===================================================== */
        /* CANVAS / CHART STYLES */
        /* ===================================================== */

        canvas {
            max-height: 280px;
            width: 100%;
        }

        /* ===================================================== */
        /* SCROLLBAR */
        /* ===================================================== */

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

        /* ===================================================== */
        /* FADE IN ANIMATION */
        /* ===================================================== */

        .kpi_card,
        .dashboard_box,
        .sentiment_card {
            animation: fadeInUp 0.5s ease backwards;
        }

        .kpi_card:nth-child(1) {
            animation-delay: 0.02s;
        }

        .kpi_card:nth-child(2) {
            animation-delay: 0.04s;
        }

        .kpi_card:nth-child(3) {
            animation-delay: 0.06s;
        }

        .kpi_card:nth-child(4) {
            animation-delay: 0.08s;
        }

        .kpi_card:nth-child(5) {
            animation-delay: 0.1s;
        }

        .kpi_card:nth-child(6) {
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

        /* ===================================================== */
        /* FLOATING ANIMATION */
        /* ===================================================== */

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

        /* ===================================================== */
        /* RESPONSIVE */
        /* ===================================================== */

        @media (max-width: 768px) {
            .feedback_dashboard {
                padding: 15px;
            }

            .kpi_card h2 {
                font-size: 24px;
            }

            .kpi_card h6 {
                font-size: 11px;
            }

            .dashboard_box {
                padding: 18px;
                margin-bottom: 15px;
            }

            .sentiment_card h2 {
                font-size: 32px;
            }

            .sentiment_card h5 {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .feedback_dashboard {
                padding: 10px;
            }

            .kpi_card {
                padding: 18px 15px;
            }

            .kpi_card h2 {
                font-size: 20px;
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
   <?php include "common/header.php"?>  
                <!-- EXISTING CONTENT AREA (COMPLETELY PRESERVED - NO MODIFICATIONS) -->
                <div class="container-fluid feedback_dashboard">

                    <!-- ================= KPI CARDS ================= -->
                    <div class="row g-4">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="kpi_card total_feedback pulse-card">
                                <h6><i class="fa-solid fa-comment-dots me-1"></i> Total Feedbacks</h6>
                                <h2 id="totalFeedbacks">18,540</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="kpi_card rating">
                                <h6><i class="fa-solid fa-star me-1"></i> Average Rating</h6>
                                <h2 id="avgRating">4.2 ⭐</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="kpi_card today">
                                <h6><i class="fa-solid fa-calendar-day me-1"></i> Today's Feedbacks</h6>
                                <h2 id="todayFeedbacks">245</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="kpi_card mla">
                                <h6><i class="fa-solid fa-user-tie me-1"></i> Rated MLAs</h6>
                                <h2 id="ratedMlas">288</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="kpi_card work">
                                <h6><i class="fa-solid fa-briefcase me-1"></i> Work Feedbacks</h6>
                                <h2 id="workFeedbacks">8,450</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="kpi_card complaint">
                                <h6><i class="fa-solid fa-exclamation-triangle me-1"></i> Complaint Feedbacks</h6>
                                <h2 id="complaintFeedbacks">5,230</h2>
                            </div>
                        </div>
                    </div>

                    <!-- ================= TREND & RATING ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-line me-2" style="color: var(--gold);"></i> Feedback
                                    Trend Analysis</h5>
                                <canvas id="feedbackTrendChart"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-pie me-2" style="color: var(--gold);"></i> Rating
                                    Distribution</h5>
                                <canvas id="ratingChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================= CATEGORY & SOURCE ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-tags me-2" style="color: var(--gold);"></i> Category Wise
                                    Feedback</h5>
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-simple me-2" style="color: var(--gold);"></i> Feedback
                                    Source Analytics</h5>
                                <canvas id="sourceChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================= SENTIMENT ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <div class="sentiment_card positive pulse-card">
                                <h5><i class="fa-regular fa-thumbs-up me-2"></i> Positive Feedback</h5>
                                <h2 id="positivePercent">72%</h2>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sentiment_card neutral">
                                <h5><i class="fa-regular fa-circle me-2"></i> Neutral Feedback</h5>
                                <h2 id="neutralPercent">18%</h2>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sentiment_card negative">
                                <h5><i class="fa-regular fa-thumbs-down me-2"></i> Negative Feedback</h5>
                                <h2 id="negativePercent">10%</h2>
                            </div>
                        </div>
                    </div>

                    <!-- ================= MLA PERFORMANCE ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-trophy me-2" style="color: var(--gold);"></i> Top Rated MLAs
                                </h5>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="topMlaTable">
                                        <thead>
                                            <tr>
                                                <th>MLA</th>
                                                <th>Constituency</th>
                                                <th>Rating</th>
                                                <th>Trend</th>
                                            </tr>
                                        </thead>
                                        <tbody id="topMlaBody">
                                            <!-- Dynamic content -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-simple me-2" style="color: var(--gold);"></i> Bottom
                                    Rated MLAs</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="bottomMlaTable">
                                        <thead>
                                            <tr>
                                                <th>MLA</th>
                                                <th>Constituency</th>
                                                <th>Rating</th>
                                                <th>Action Needed</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bottomMlaBody">
                                            <!-- Dynamic content -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================= FRAUD + RECENT ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-5">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-shield-haltered me-2" style="color: var(--gold);"></i> Fraud
                                    Detection Panel</h5>
                                <div class="alert alert-danger" id="fraudDuplicate">
                                    <i class="fa-solid fa-copy me-2"></i> Duplicate Ratings : <strong>45</strong>
                                </div>
                                <div class="alert alert-warning" id="fraudDevice">
                                    <i class="fa-solid fa-mobile-alt me-2"></i> Same Device Feedbacks :
                                    <strong>22</strong>
                                </div>
                                <div class="alert alert-info" id="fraudIp">
                                    <i class="fa-solid fa-network-wired me-2"></i> Same IP Feedbacks :
                                    <strong>18</strong>
                                </div>
                                <div class="alert alert-success" id="fraudBlocked">
                                    <i class="fa-solid fa-ban me-2"></i> Blocked Fake Entries : <strong>11</strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-clock me-2" style="color: var(--gold);"></i> Recent Feedback
                                    Feed</h5>
                                <div class="timeline" id="recentFeedback">
                                    <div class="timeline_item">
                                        ⭐⭐⭐⭐⭐
                                        <p>Road work completed successfully.</p>
                                        <small class="text-muted">2 mins ago</small>
                                    </div>
                                    <div class="timeline_item">
                                        ⭐⭐⭐
                                        <p>Complaint resolution delayed.</p>
                                        <small class="text-muted">15 mins ago</small>
                                    </div>
                                    <div class="timeline_item">
                                        ⭐⭐⭐⭐
                                        <p>Good healthcare facilities.</p>
                                        <small class="text-muted">1 hour ago</small>
                                    </div>
                                    <div class="timeline_item">
                                        ⭐⭐⭐⭐⭐
                                        <p>Excellent road development work in our area.</p>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================= ADDITIONAL ANALYTICS ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-map-marker-alt me-2" style="color: var(--gold);"></i>
                                    Constituency Wise Rating</h5>
                                <div class="table-responsive">
                                    <table class="table" id="constituencyTable">
                                        <thead>
                                            <tr>
                                                <th>Constituency</th>
                                                <th>Rating</th>
                                                <th>Responses</th>
                                            </tr>
                                        </thead>
                                        <tbody id="constituencyBody">
                                            <!-- Dynamic content -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-chart-column me-2" style="color: var(--gold);"></i> Feedback
                                    Resolution Impact</h5>
                                <canvas id="impactChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================= FEEDBACK TABLE ================= -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="dashboard_box">
                                <h5><i class="fa-solid fa-table-list me-2" style="color: var(--gold);"></i> Feedback
                                    Management Table</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="feedbackTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>MLA</th>
                                                <th>Constituency</th>
                                                <th>Category</th>
                                                <th>Rating</th>
                                                <th>Feedback</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="feedbackTableBody">
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
        // Chart.js instances
        let feedbackTrendChart, ratingChart, categoryChart, sourceChart, impactChart;

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
            animateCounter("totalFeedbacks", 18540);
            animateCounter("avgRating", 4.2, " ⭐");
            animateCounter("todayFeedbacks", 245);
            animateCounter("ratedMlas", 288);
            animateCounter("workFeedbacks", 8450);
            animateCounter("complaintFeedbacks", 5230);
            animateCounter("positivePercent", 72, "%");
            animateCounter("neutralPercent", 18, "%");
            animateCounter("negativePercent", 10, "%");
        }

        // Initialize all charts
        function initCharts() {
            // Feedback Trend Chart (Line)
            const trendCtx = document.getElementById('feedbackTrendChart').getContext('2d');
            feedbackTrendChart = new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Feedbacks',
                        data: [1250, 1380, 1420, 1560, 1680, 1750, 1820, 1890, 1950, 2010, 2080, 2150],
                        borderColor: '#d4af37',
                        backgroundColor: 'rgba(212, 175, 55, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#b8960c',
                        pointBorderColor: '#ffffff',
                        pointRadius: 4,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'top', labels: { font: { family: 'Inter', size: 12 } } } }
                }
            });

            // Rating Distribution (Doughnut)
            const ratingCtx = document.getElementById('ratingChart').getContext('2d');
            ratingChart = new Chart(ratingCtx, {
                type: 'doughnut',
                data: {
                    labels: ['5 Star', '4 Star', '3 Star', '2 Star', '1 Star'],
                    datasets: [{
                        data: [32, 28, 22, 12, 6],
                        backgroundColor: ['#d4af37', '#F59E0B', '#3B82F6', '#8B5CF6', '#EF4444'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'bottom', labels: { font: { family: 'Inter', size: 11 } } } }
                }
            });

            // Category Chart (Bar)
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            categoryChart = new Chart(categoryCtx, {
                type: 'bar',
                data: {
                    labels: ['Roads', 'Water', 'Electricity', 'Health', 'Education', 'Sanitation'],
                    datasets: [{
                        label: 'Feedbacks',
                        data: [4250, 3180, 2560, 1890, 1450, 1120],
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

            // Source Chart (Pie)
            const sourceCtx = document.getElementById('sourceChart').getContext('2d');
            sourceChart = new Chart(sourceCtx, {
                type: 'pie',
                data: {
                    labels: ['Mobile App', 'Web Portal', 'WhatsApp', 'SMS', 'IVRS'],
                    datasets: [{
                        data: [45, 28, 15, 7, 5],
                        backgroundColor: ['#d4af37', '#10B981', '#3B82F6', '#8B5CF6', '#F59E0B'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'bottom', labels: { font: { family: 'Inter', size: 11 } } } }
                }
            });

            // Impact Chart (Line)
            const impactCtx = document.getElementById('impactChart').getContext('2d');
            impactChart = new Chart(impactCtx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Resolution Rate (%)',
                        data: [65, 72, 78, 85],
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'top', labels: { font: { family: 'Inter', size: 12 } } } }
                }
            });
        }

        // Populate MLA Tables
        function populateMlaTables() {
            const topMlas = [
                { name: "MLA A", constituency: "Satara", rating: 4.9, trend: "↑ +12%" },
                { name: "MLA B", constituency: "Pune", rating: 4.8, trend: "↑ +8%" },
                { name: "MLA C", constituency: "Kolhapur", rating: 4.7, trend: "↑ +5%" },
                { name: "MLA D", constituency: "Nagpur", rating: 4.6, trend: "↑ +3%" }
            ];

            const bottomMlas = [
                { name: "MLA X", constituency: "Nashik", rating: 2.8, action: "⚠ Needs Attention" },
                { name: "MLA Y", constituency: "Mumbai", rating: 2.6, action: "⚠ Needs Attention" },
                { name: "MLA Z", constituency: "Aurangabad", rating: 2.4, action: "⚠ Needs Attention" }
            ];

            document.getElementById("topMlaBody").innerHTML = topMlas.map(mla => `
            <tr>
                <td><i class="fa-solid fa-user-tie me-2" style="color: var(--gold);"></i> ${mla.name}</td>
                <td>${mla.constituency}</td>
                <td><span class="badge" style="background: var(--gold); color: white;">${mla.rating}</span></td>
                <td style="color: #10B981;">${mla.trend}</td>
            </tr>
        `).join('');

            document.getElementById("bottomMlaBody").innerHTML = bottomMlas.map(mla => `
            <tr>
                <td><i class="fa-solid fa-user-tie me-2" style="color: var(--danger);"></i> ${mla.name}</td>
                <td>${mla.constituency}</td>
                    <td><span class="badge" style="background: #EF4444; color: white;">${mla.rating}</span></td>
                <td style="color: #EF4444;">${mla.action}</td>
            </tr>
        `).join('');
        }

        // Populate Constituency Table
        function populateConstituencyTable() {
            const constituencies = [
                { name: "Satara", rating: 4.6, responses: 12450 },
                { name: "Karad North", rating: 4.4, responses: 8920 },
                { name: "Karad South", rating: 4.3, responses: 7650 },
                { name: "Patan", rating: 4.1, responses: 5430 },
                { name: "Mahableshwar", rating: 3.9, responses: 4210 }
            ];

            document.getElementById("constituencyBody").innerHTML = constituencies.map(c => `
            <tr>
                <td><i class="fa-solid fa-map-marker-alt me-2" style="color: var(--gold);"></i> ${c.name}</td>
                <td><div class="progress" style="height: 6px; width: 100px;"><div class="progress-bar" style="width: ${(c.rating / 5) * 100}%; background: linear-gradient(90deg, var(--gold), var(--gold-dark));"></div></div> ${c.rating}</td>
                <td>${c.responses.toLocaleString()}</td>
            </tr>
        `).join('');
        }

        // Populate Feedback Table
        function populateFeedbackTable() {
            const feedbacks = [
                { id: "FB001", mla: "MLA A", constituency: "Satara", category: "Roads", rating: 5, feedback: "Excellent road work completed", date: "Today" },
                { id: "FB002", mla: "MLA B", constituency: "Pune", category: "Water", rating: 4, feedback: "Water supply improved", date: "Yesterday" },
                { id: "FB003", mla: "MLA C", constituency: "Kolhapur", category: "Electricity", rating: 3, feedback: "Power issues persist", date: "2 days ago" },
                { id: "FB004", mla: "MLA A", constituency: "Satara", category: "Health", rating: 5, feedback: "Great hospital facilities", date: "2 days ago" },
                { id: "FB005", mla: "MLA D", constituency: "Nagpur", category: "Education", rating: 4, feedback: "School infrastructure good", date: "3 days ago" }
            ];

            document.getElementById("feedbackTableBody").innerHTML = feedbacks.map(fb => `
            <tr>
                <td>${fb.id}</td>
                <td><i class="fa-solid fa-user-tie me-1" style="color: var(--gold);"></i> ${fb.mla}</td>
                <td>${fb.constituency}</td>
                <td><span class="badge" style="background: rgba(212, 175, 55, 0.15); color: var(--gold-dark);">${fb.category}</span></td>
                <td>${'⭐'.repeat(fb.rating)}</td>
                <td>${fb.feedback}</td>
                <td><i class="fa-regular fa-calendar me-1"></i> ${fb.date}</td>
            </tr>
        `).join('');
        }

        // Animate alert counters
        function animateAlerts() {
            const alerts = [
                { element: "fraudDuplicate", value: 45 },
                { element: "fraudDevice", value: 22 },
                { element: "fraudIp", value: 18 },
                { element: "fraudBlocked", value: 11 }
            ];

            alerts.forEach(alert => {
                const elem = document.getElementById(alert.element);
                if (elem) {
                    const strongElem = elem.querySelector('strong');
                    if (strongElem) {
                        let current = 0;
                        const increment = alert.value / 50;
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= alert.value) {
                                strongElem.textContent = alert.value;
                                clearInterval(timer);
                            } else {
                                strongElem.textContent = Math.floor(current);
                            }
                        }, 20);
                    }
                }
            });
        }

        // Add click handlers for cards
        function addCardHandlers() {
            const cards = document.querySelectorAll('.kpi_card, .sentiment_card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const title = card.querySelector('h6, h5')?.innerText || 'Dashboard Card';
                    const value = card.querySelector('h2')?.innerText || '';
                    alert(`${title}\n\nDetailed analytics would be shown here.\nCurrent Value: ${value}\n\nIn production, this would open a detailed modal with statistics and insights.`);
                });
            });
        }

        // Initialize everything on page load
        document.addEventListener("DOMContentLoaded", function () {
            initCharts();
            populateMlaTables();
            populateConstituencyTable();
            populateFeedbackTable();
            initCounters();
            animateAlerts();
            addCardHandlers();

            // Add floating class to some cards for visual interest
            document.querySelectorAll('.kpi_card:nth-child(2), .kpi_card:nth-child(5)').forEach(card => {
                card.classList.add('floating');
            });
        });

        // Re-animate when page becomes visible
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) {
                initCounters();
                animateAlerts();
            }
        });
    </script>
    <script src="header.js"></script>
</body>

</html>