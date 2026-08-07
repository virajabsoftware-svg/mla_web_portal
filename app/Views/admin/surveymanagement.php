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
  
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
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
        /* PREMIUM SURVEY DASHBOARD - White + Beige + Gold Theme
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
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03), 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.08);
            --shadow-gold: 0 12px 30px rgba(212, 175, 55, 0.2);
            --shadow-gold-lg: 0 20px 40px rgba(212, 175, 55, 0.25);
            --radius-sm: 12px;
            --radius-md: 18px;
            --radius-lg: 24px;
            --radius-xl: 28px;
            --radius-xxl: 32px;
            --transition-fast: 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --transition-base: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        body {
            background: linear-gradient(135deg, var(--cream) 0%, var(--beige-light) 50%, var(--beige) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #1E293B;
            min-height: 100vh;
        }

        .survey_section {
            padding: 35px;
        }

        /* ===================================================== */
        /* HEADER - Premium Gold Gradient */
        /* ===================================================== */

        .survey_header {
            position: relative;
            overflow: hidden;
            padding: 45px;
            border-radius: var(--radius-xxl);
            background: linear-gradient(135deg, var(--gold-dark), var(--gold), var(--gold-light), #1e293b);
            box-shadow: var(--shadow-gold-lg);
            margin-bottom: 35px;
        }

        .survey_header::before {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.12), transparent);
            border-radius: 50%;
            top: -180px;
            right: -120px;
            animation: floatGlow 6s ease-in-out infinite;
        }

        .survey_header::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15), transparent);
            border-radius: 50%;
            bottom: -120px;
            left: -80px;
            animation: floatGlowDelayed 8s ease-in-out infinite;
        }

        @keyframes floatGlow {

            0%,
            100% {
                transform: translateY(0px) scale(1);
            }

            50% {
                transform: translateY(15px) scale(1.05);
            }
        }

        @keyframes floatGlowDelayed {

            0%,
            100% {
                transform: translateY(0px) scale(1);
            }

            50% {
                transform: translateY(-15px) scale(1.08);
            }
        }

        .survey_header h2 {
            color: white;
            font-size: 36px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .survey_header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            max-width: 600px;
            line-height: 1.7;
            position: relative;
            z-index: 2;
        }

        .header_btn {
            position: relative;
            overflow: hidden;
            border: none;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            color: white;
            padding: 14px 28px;
            border-radius: 48px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all var(--transition-base);
            box-shadow: var(--shadow-md);
            z-index: 2;
            cursor: pointer;
        }

        .header_btn i {
            margin-right: 8px;
        }

        .header_btn::before {
            content: "";
            position: absolute;
            width: 120%;
            height: 120%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            top: -130%;
            left: -130%;
            transform: rotate(25deg);
            transition: 0.6s;
        }

        .header_btn:hover::before {
            top: 100%;
            left: 100%;
        }

        .header_btn:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: var(--shadow-gold);
        }

        .header_btn:active {
            transform: scale(0.97);
        }

        /* ===================================================== */
        /* STAT CARDS - Premium Glassmorphism */
        /* ===================================================== */

        .stat_card {
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xl);
            padding: 28px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            height: 100%;
            cursor: pointer;
        }

        .stat_card::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--gold), var(--gold-light), var(--gold-dark), var(--gold));
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .stat_card::after {
            content: "";
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

        .stat_card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .stat_card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .stat_card:hover::after {
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

        .stat_icon {
            width: 65px;
            height: 65px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: white;
            margin-bottom: 18px;
            box-shadow: var(--shadow-gold);
            transition: all var(--transition-base);
        }

        .stat_card:hover .stat_icon {
            transform: scale(1.05);
        }

        .blue {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        }

        .green {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
        }

        .orange {
            background: linear-gradient(135deg, var(--gold-dark), #b8860b);
        }

        .red {
            background: linear-gradient(135deg, #c0392b, var(--gold-dark));
        }

        .stat_card h3 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
            background: linear-gradient(135deg, #0F172A, var(--gold-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .stat_card p {
            font-size: 14px;
            font-weight: 600;
            color: #64748B;
            margin: 0;
        }

        /* Counter Animation */
        .counter-number {
            animation: countPop 0.4s ease-out;
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

        /* Pulse Effect for Important Cards */
        .stat_card.pulse-card {
            animation: pulseGold 2s infinite;
        }

        @keyframes pulseGold {

            0%,
            100% {
                box-shadow: var(--shadow-md);
                border-color: rgba(212, 175, 55, 0.2);
            }

            50% {
                box-shadow: var(--shadow-gold);
                border-color: var(--gold);
            }
        }

        /* ===================================================== */
        /* MLA SURVEY COUNT TABLE - Premium Design */
        /* ===================================================== */

        .mla_survey_section {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-xl);
            padding: 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .mla_survey_section:hover {
            box-shadow: var(--shadow-gold);
        }

        .mla_survey_section .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mla_survey_section .section-title i {
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

        /* ===================================================== */
        /* ANALYTICS BOX */
        /* ===================================================== */

        .analytics_box {
            margin-top: 35px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            border-radius: var(--radius-xl);
            padding: 30px;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .analytics_box:hover {
            box-shadow: var(--shadow-gold);
        }

        .analytics_box h4 {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 25px;
            color: #0F172A;
            position: relative;
            display: inline-block;
        }

        .analytics_box h4::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 3px;
        }

        .analytics_title {
            font-weight: 700;
            margin-bottom: 10px;
            color: #1E293B;
            font-size: 14px;
        }

        .progress {
            height: 10px;
            border-radius: 20px;
            background: var(--beige-dark);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .progress-bar {
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            transition: width 1s cubic-bezier(0.2, 0.9, 0.4, 1.1);
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: progressShimmer 1.5s infinite;
        }

        @keyframes progressShimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
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

        /* Fade In Animation */
        .stat_card,
        .analytics_box,
        .mla_survey_section {
            animation: fadeInUp 0.5s ease backwards;
        }

        .stat_card:nth-child(1) {
            animation-delay: 0.05s;
        }

        .stat_card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .stat_card:nth-child(3) {
            animation-delay: 0.15s;
        }

        .stat_card:nth-child(4) {
            animation-delay: 0.2s;
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

        /* Responsive */
        @media (max-width: 992px) {
            .survey_section {
                padding: 20px;
            }

            .survey_header {
                padding: 30px;
                text-align: center;
            }

            .survey_header h2 {
                font-size: 28px;
            }

            .text-lg-end {
                text-align: center !important;
                margin-top: 20px;
            }
        }

        @media (max-width: 768px) {
            .survey_section {
                padding: 15px;
            }

            .survey_header {
                padding: 25px;
            }

            .survey_header h2 {
                font-size: 24px;
            }

            .stat_card h3 {
                font-size: 26px;
            }

            .stat_icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            .mla_survey_section {
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

            .analytics_box {
                padding: 20px !important;
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

        /* ==========================
           MOBILE RESPONSIVE FIX
           ========================== */

        @media (max-width: 768px) {

            .survey_section{
                padding:10px !important;
            }

            .survey_header{
                padding:20px !important;
                text-align:center;
                border-radius:20px;
            }

            .survey_header h2{
                font-size:22px !important;
                line-height:1.4;
            }

            .survey_header p{
                font-size:13px;
            }

            .header_btn{
                width:100%;
                margin-top:15px;
            }

            .stat_card{
                margin-bottom:15px;
                padding:20px;
            }

            .stat_card h3{
                font-size:22px !important;
            }

            .analytics_box{
                padding:20px !important;
            }
        }

        @media (max-width: 576px){

            .survey_header h2{
                font-size:20px !important;
            }

            .survey_header p{
                font-size:12px;
            }

            .analytics_box h4{
                font-size:18px;
            }
        }
    </style>
</head>

<body class="inner_page widgets">
   <?php include "common/header.php"?>  
                <div class="container-fluid survey_section">

                    <!-- ===================================================== -->
                    <!-- HEADER -->
                    <!-- ===================================================== -->

                    <div class="survey_header mb-4">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h2>
                                    <i class="fa-solid fa-chart-simple me-2"></i> Smart Survey Management Dashboard
                                </h2>
                                <p>
                                    AI-based public feedback, sentiment analysis, MLA analytics & participation
                                    monitoring system.
                                </p>
                            </div>
                            <div class="col-lg-4 text-lg-end">
                                <button class="header_btn" onclick="createNewSurvey()">
                                    <i class="fa-solid fa-plus"></i>
                                    Create New Survey
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- STATS -->
                    <!-- ===================================================== -->

                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="stat_card pulse-card">
                                <div class="stat_icon blue">
                                    <i class="fa-solid fa-square-poll-vertical"></i>
                                </div>
                                <h3 id="surveyCount">125</h3>
                                <p><i class="fa-solid fa-chart-line me-1"></i> Total Surveys</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="stat_card">
                                <div class="stat_icon green">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h3 id="responseCount">24K</h3>
                                <p><i class="fa-solid fa-message me-1"></i> Total Responses</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="stat_card">
                                <div class="stat_icon orange">
                                    <i class="fa-solid fa-face-smile"></i>
                                </div>
                                <h3 id="satisfaction">86%</h3>
                                <p><i class="fa-solid fa-star me-1"></i> Citizen Satisfaction</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="stat_card">
                                <div class="stat_icon red">
                                    <i class="fa-solid fa-chart-line"></i>
                                </div>
                                <h3 id="participation">74%</h3>
                                <p><i class="fa-solid fa-person-walking-arrow-right me-1"></i> Participation Rate</p>
                            </div>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- MLA SURVEY COUNT SECTION - ONLY COUNT, NO DETAILS -->
                    <!-- ===================================================== -->
                    <div class="mla_survey_section">
                        <div class="section-title">
                            <i class="fas fa-user-tie me-2"></i> MLA-wise Survey Count
                            <span style="font-size: 14px; font-weight: 400; color: #64748B; margin-left: auto;">
                                <i class="fas fa-chart-bar me-1"></i> Total surveys conducted by each MLA
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="mla_count_table" id="mlaCountTable">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;">MLA Name</th>
                                        <th style="width: 25%;">Total Surveys</th>
                                        <th style="width: 25%;">Total Responses</th>
                                        <th style="width: 20%;">Avg. Participation</th>
                                    </tr>
                                </thead>
                                <tbody id="mlaCountBody">
                                    <!-- Dynamic content will be rendered here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- ANALYTICS -->
                    <!-- ===================================================== -->

                    <div class="analytics_box">
                        <h4 class="mb-4 fw-bold">
                            <i class="fa-solid fa-chart-pie me-2" style="color: var(--gold);"></i> Survey Analytics
                        </h4>

                        <div class="analytics_title">
                            <i class="fa-regular fa-thumbs-up me-2" style="color: #10B981;"></i> Positive Feedback
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 78%" id="positiveBar">
                                78%
                            </div>
                        </div>

                        <div class="analytics_title">
                            <i class="fa-regular fa-circle me-2" style="color: #F59E0B;"></i> Neutral Feedback
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 15%" id="neutralBar">
                                15%
                            </div>
                        </div>

                        <div class="analytics_title">
                            <i class="fa-regular fa-thumbs-down me-2" style="color: #EF4444;"></i> Negative Feedback
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 7%" id="negativeBar">
                                7%
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

    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // =====================================================
        // SURVEY DATA
        // =====================================================
        // const surveysData = [
        //     { id: "#SR101", title: "Road Development Feedback", mla: "MLA Rahul Patil", responses: 3245, sentiment: "Positive", participation: 82, status: "Active", description: "Feedback survey for road development projects in the constituency." },
        //     { id: "#SR102", title: "Water Supply Survey", mla: "MLA Amit Deshmukh", responses: 2100, sentiment: "Neutral", participation: 61, status: "Pending", description: "Assessment of water supply quality and coverage." },
        //     { id: "#SR103", title: "Healthcare Facility Review", mla: "MLA Vikas More", responses: 5420, sentiment: "Negative", participation: 47, status: "Closed", description: "Review of healthcare facilities and services." },
        //     { id: "#SR104", title: "Education Quality Survey", mla: "MLA Meena Sharma", responses: 1870, sentiment: "Positive", participation: 73, status: "Active", description: "Evaluation of school education quality." },
        //     { id: "#SR105", title: "Electricity Supply Feedback", mla: "MLA Sanjay Patil", responses: 2980, sentiment: "Neutral", participation: 68, status: "Active", description: "Feedback on electricity supply and outages." },
        //     { id: "#SR106", title: "Sanitation Drive Survey", mla: "MLA Rahul Patil", responses: 1560, sentiment: "Positive", participation: 55, status: "Pending", description: "Survey on sanitation drive effectiveness." },
        //     { id: "#SR107", title: "Public Transport Survey", mla: "MLA Amit Deshmukh", responses: 4300, sentiment: "Positive", participation: 79, status: "Active", description: "Feedback on public transport services." },
        //     { id: "#SR108", title: "Waste Management Review", mla: "MLA Vikas More", responses: 2890, sentiment: "Neutral", participation: 52, status: "Closed", description: "Review of waste management practices." },
        //     { id: "#SR109", title: "Digital Literacy Survey", mla: "MLA Meena Sharma", responses: 1450, sentiment: "Positive", participation: 44, status: "Pending", description: "Assessment of digital literacy programs." }
        // ];

        // =====================================================
        // COUNTER ANIMATION
        // =====================================================
        function animateCounter(elementId, targetValue, suffix = "") {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const isPercentage = targetValue.toString().includes('%');
            const numericValue = parseInt(targetValue);
            const increment = numericValue / 50;

            const timer = setInterval(() => {
                current += increment;
                if (current >= numericValue) {
                    element.textContent = targetValue;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + (isPercentage ? '%' : '');
                }
            }, 20);
        }

        // =====================================================
        // UPDATE STATISTICS
        // =====================================================
        function updateStats() {
            const totalSurveys = surveysData.length;
            const totalResponses = surveysData.reduce((sum, s) => sum + s.responses, 0);
            const positiveCount = surveysData.filter(s => s.sentiment === "Positive").length;
            const satisfactionRate = Math.round((positiveCount / totalSurveys) * 100);

            animateCounter("surveyCount", totalSurveys);
            animateCounter("responseCount", totalResponses >= 1000 ? (totalResponses / 1000).toFixed(0) + "K" : totalResponses);
            animateCounter("satisfaction", satisfactionRate + "%");

            const avgParticipation = Math.round(surveysData.reduce((sum, s) => sum + s.participation, 0) / totalSurveys);
            animateCounter("participation", avgParticipation + "%");
        }

        // =====================================================
        // RENDER MLA SURVEY COUNT - ONLY COUNTS, NO DETAILS
        // =====================================================
        function renderMLACount(data)
{

let tbody=document.getElementById("mlaCountBody");


let html="";


data.forEach((mla,index)=>{


let badge="low";


if(mla.total_surveys>=5)
{
    badge="high";
}
else if(mla.total_surveys>=2)
{
    badge="medium";
}



html+=`

<tr>

<td data-label="MLA Name">

<strong>

${index+1}. ${mla.mla_name}

</strong>

</td>



<td data-label="Total Surveys">

<span class="mla_count_badge ${badge}">

${mla.total_surveys}

Surveys

</span>

</td>



<td data-label="Total Responses">

0

</td>



<td data-label="Avg Participation">


<div class="progress" style="width:100px;height:6px">

<div class="progress-bar"

style="width:${0}%;
background:#d4af37">

</div>

</div>


${Math.round(mla.avg_participation ?? 0)}%


</td>



</tr>


`;

});


tbody.innerHTML=html;


}
        // =====================================================
        // CREATE NEW SURVEY
        // =====================================================
        function createNewSurvey() {
            alert(`Create New Survey Form\n\nThis would open a form to create a new survey with fields like:\n- Survey Title\n- MLA Assignment\n- Department\n- Questions\n- Target Audience\n- Start/End Date\n\nIn production, this would open a modal with all necessary fields.`);
        }

        // =====================================================
        // ANIMATE PROGRESS BARS
        // =====================================================
        function animateProgressBars() {
            const bars = document.querySelectorAll('.progress-bar');
            bars.forEach(bar => {
                const targetWidth = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = targetWidth;
                }, 200);
            });
        }

        // =====================================================
        // EVENT LISTENERS
        // =====================================================
     document.addEventListener("DOMContentLoaded", function(){

    loadSurveyDashboard();

});



function loadSurveyDashboard()
{

fetch("<?= base_url('admin/survey-management/data') ?>")

.then(response=>response.json())

.then(data=>{

let stats=data.stats;

animateCounter(
    "surveyCount",
    stats.total_surveys
);

renderMLACount(data.mlaCount);

});

}
    </script>
    <script src="header.js"></script>
</body>

</html>