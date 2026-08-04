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
        /* MLA FEEDBACK COUNT TABLE - Premium Design */
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

        .kpi_card,
        .mla_feedback_section {
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
        // =====================================================
        // FEEDBACK DATA
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
        // COUNTER ANIMATION
        // =====================================================
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

        // =====================================================
        // UPDATE STATISTICS
        // =====================================================
        function updateStats() {
            const totalFeedbacks = feedbackData.reduce((sum, mla) => sum + mla.feedbacks, 0);
            const avgRating = (feedbackData.reduce((sum, mla) => sum + mla.rating, 0) / feedbackData.length).toFixed(1);
            const todayFeedbacks = Math.floor(totalFeedbacks * 0.013);
            const ratedMlas = feedbackData.length;
            const workFeedbacks = Math.floor(totalFeedbacks * 0.46);
            const complaintFeedbacks = Math.floor(totalFeedbacks * 0.28);

            animateCounter("totalFeedbacks", totalFeedbacks);
            animateCounter("avgRating", avgRating, " ⭐");
            animateCounter("todayFeedbacks", todayFeedbacks);
            animateCounter("ratedMlas", ratedMlas);
            animateCounter("workFeedbacks", workFeedbacks);
            animateCounter("complaintFeedbacks", complaintFeedbacks);
        }

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
                // Determine badge color based on feedback count
                let badgeClass = 'low';
                if (mlaData.feedbacks >= 2000) badgeClass = 'high';
                else if (mlaData.feedbacks >= 1200) badgeClass = 'medium';

                // Rank medal
                let rankIcon = '';
                if (rank === 1) rankIcon = '🥇 ';
                else if (rank === 2) rankIcon = '🥈 ';
                else if (rank === 3) rankIcon = '🥉 ';

                // Performance color
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
        document.addEventListener("DOMContentLoaded", function () {
            updateStats();
            renderMLACount();

            // Add floating class to some cards for visual interest
            document.querySelectorAll('.kpi_card:nth-child(2), .kpi_card:nth-child(5)').forEach(card => {
                card.classList.add('floating');
            });

            // Add click handlers for cards
            document.querySelectorAll('.kpi_card').forEach(card => {
                card.addEventListener('click', () => {
                    const title = card.querySelector('h6')?.innerText || 'Dashboard Card';
                    const value = card.querySelector('h2')?.innerText || '';
                    alert(`${title}\n\nDetailed analytics would be shown here.\nCurrent Value: ${value}\n\nIn production, this would open a detailed modal with statistics and insights.`);
                });
            });
        });
    </script>
    <script src="header.js"></script>
</body>

</html>