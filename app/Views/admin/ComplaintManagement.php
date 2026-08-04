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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- GOOGLE FONTS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">
    <style>

     

        /* ===================================================== */
        /* PREMIUM COMPLAINT MANAGEMENT - White + Beige + Gold Theme
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

        /* ===================================================== */
        /* MAIN HEADER - Premium Gold Gradient */
        /* ===================================================== */

        .complaint_header {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-xxl);
            padding: 50px;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold), var(--gold-light), #1e293b);
            box-shadow: var(--shadow-gold-lg);
            isolation: isolate;
        }

        /* Animated Glow Effects */
        .complaint_header::before {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent 70%);
            top: -180px;
            right: -120px;
            animation: floatGlow 6s ease-in-out infinite;
        }

        .complaint_header::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.2), transparent 70%);
            bottom: -180px;
            left: -100px;
            animation: floatGlowDelayed 8s ease-in-out infinite;
        }

        @keyframes floatGlow {

            0%,
            100% {
                transform: translateY(0px) scale(1);
            }

            50% {
                transform: translateY(20px) scale(1.05);
            }
        }

        @keyframes floatGlowDelayed {

            0%,
            100% {
                transform: translateY(0px) scale(1);
            }

            50% {
                transform: translateY(-20px) scale(1.08);
            }
        }

        .header_content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .header_content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 42px;
            font-weight: 800;
            color: white;
            margin-bottom: 15px;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header_content p {
            max-width: 600px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.7;
            font-size: 15px;
        }

        /* Header Stats Cards - Glassmorphism */
        .header_stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat_card {
            position: relative;
            min-width: 160px;
            padding: 22px 20px;
            border-radius: var(--radius-lg);
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            transition: all var(--transition-base);
            cursor: pointer;
            text-align: center;
        }

        /* Shine Effect */
        .stat_card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, transparent 10%, rgba(255, 255, 255, 0.15) 40%, transparent 60%);
            transform: rotate(25deg);
            transition: transform 0.5s ease;
            opacity: 0;
            pointer-events: none;
        }

        .stat_card:hover::after {
            opacity: 1;
            transform: rotate(25deg) translateX(50%);
        }

        .stat_card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.22);
            box-shadow: var(--shadow-gold);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Pulse Effect for Important Stats */
        .stat_card.pulse-stat {
            animation: pulseGoldBorder 2s infinite;
        }

        @keyframes pulseGoldBorder {

            0%,
            100% {
                border-color: rgba(255, 255, 255, 0.3);
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }

            50% {
                border-color: rgba(255, 255, 255, 0.7);
                box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.2);
            }
        }

        .stat_card h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 38px;
            color: var(--gold-light);
            font-weight: 800;
            margin-bottom: 5px;
        }

        .stat_card span {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 600;
        }

        /* ===================================================== */
        /* FILTER BOX - Glassmorphism */
        /* ===================================================== */

        .complaint_filter_box {
            position: relative;
            margin-top: 35px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
            padding: 30px;
            border-radius: var(--radius-xl);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .complaint_filter_box:hover {
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
        }

        /* Top Gradient Border */
        .complaint_filter_box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold-dark));
            animation: borderShimmer 3s linear infinite;
        }

        @keyframes borderShimmer {
            0% {
                background-position: -100% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        .complaint_filter_box label {
            font-weight: 700;
            margin-bottom: 10px;
            color: #1e293b;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        /* Input Styles */
        .complaint_input {
            height: 52px;
            border-radius: 48px;
            border: 1px solid var(--beige-dark);
            background: var(--pure-white);
            padding-left: 20px;
            font-size: 14px;
            transition: all var(--transition-base);
        }

        .complaint_input:focus {
            border-color: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 0 0 4px var(--gold-glow);
            outline: none;
        }

        /* Filter Button */
        .complaint_btn {
            height: 52px;
            border: none;
            border-radius: 48px;
            font-weight: 700;
            font-size: 14px;
            color: white;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            transition: all var(--transition-base);
            box-shadow: var(--shadow-gold);
            position: relative;
            overflow: hidden;
        }

        /* Ripple Effect */
        .complaint_btn:active::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            animation: rippleEffect 0.5s ease-out;
        }

        @keyframes rippleEffect {
            0% {
                width: 0;
                height: 0;
                opacity: 0.6;
            }

            100% {
                width: 200px;
                height: 200px;
                opacity: 0;
            }
        }

        .complaint_btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold-lg);
            filter: brightness(1.05);
        }

        /* ===================================================== */
        /* COMPLAINT CARDS - Premium Design */
        /* ===================================================== */

        .complaint_card {
            position: relative;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xl);
            padding: 25px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all var(--transition-base);
            box-shadow: var(--shadow-sm);
            height: 100%;
            animation: fadeInUp 0.5s ease backwards;
        }

        .complaint_card:nth-child(1) {
            animation-delay: 0.05s;
        }

        .complaint_card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .complaint_card:nth-child(3) {
            animation-delay: 0.15s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glow Border Animation */
        .complaint_card::before {
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
        .complaint_card::after {
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

        /* Hover Effects */
        .complaint_card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.4);
        }

        .complaint_card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .complaint_card:hover::after {
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

        /* Top Border Accent */
        .complaint_card .card-accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold-dark));
        }

        .complaint_top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .complaint_id {
            color: #64748B;
            font-size: 11px;
            letter-spacing: 1px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .complaint_top h4 {
            margin-top: 10px;
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #0F172A;
        }

        /* Priority Badges */
        .priority_badge {
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all var(--transition-fast);
        }

        .priority_badge:hover {
            transform: scale(1.05);
        }

        .high_priority {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.12), rgba(239, 68, 68, 0.05));
            color: var(--danger);
            border-left: 3px solid var(--danger);
        }

        .medium_priority {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(245, 158, 11, 0.05));
            color: var(--warning);
            border-left: 3px solid var(--warning);
        }

        .low_priority {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(16, 185, 129, 0.05));
            color: var(--success);
            border-left: 3px solid var(--success);
        }

        /* Complaint Info */
        .complaint_body {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .complaint_info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px dashed rgba(212, 175, 55, 0.2);
        }

        .complaint_info span {
            color: #64748B;
            font-weight: 600;
            font-size: 13px;
        }

        .complaint_info strong {
            color: #1E293B;
            font-weight: 700;
            font-size: 13px;
        }

        /* Status Badges */
        .status {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            transition: all var(--transition-fast);
        }

        .status:hover {
            transform: scale(1.05);
        }

        .pending {
            background: rgba(239, 68, 68, 0.12);
            color: var(--danger);
        }

        .progress_status {
            background: rgba(59, 130, 246, 0.12);
            color: var(--info);
        }

        .resolved {
            background: rgba(16, 185, 129, 0.12);
            color: var(--success);
        }

        /* Progress Bar */
        .complaint_progress {
            margin-top: 18px;
        }

        .progress_label {
            font-size: 12px;
            font-weight: 600;
            color: #64748B;
            margin-bottom: 8px;
        }

        .progress {
            height: 8px;
            border-radius: 20px;
            background: var(--beige-dark);
            overflow: hidden;
        }

        .progress_custom {
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            transition: width 0.5s ease;
        }

        /* Footer Buttons */
        .complaint_footer {
            display: flex;
            gap: 12px;
            margin-top: 22px;
        }

        .view_btn,
        .resolve_btn {
            flex: 1;
            height: 44px;
            border: none;
            border-radius: 40px;
            font-weight: 600;
            font-size: 13px;
            transition: all var(--transition-base);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .view_btn {
            background: linear-gradient(135deg, #EFF6FF, #DBEAFE);
            color: var(--info);
        }

        .view_btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: white;
            box-shadow: var(--shadow-gold);
        }

        .resolve_btn {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: white;
            box-shadow: var(--shadow-gold);
        }

        .resolve_btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold-lg);
            filter: brightness(1.05);
        }

        /* Ripple for buttons */
        .view_btn:active::after,
        .resolve_btn:active::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            animation: rippleEffect 0.5s ease-out;
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

        /* Floating Animation for Cards */
        .complaint_card.floating {
            animation: floatCard 4s ease-in-out infinite;
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
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
            .complaint_header {
                padding: 35px;
            }

            .header_content {
                flex-direction: column;
                align-items: flex-start;
            }

            .header_content h1 {
                font-size: 32px;
            }

            .header_stats {
                width: 100%;
            }

            .stat_card {
                flex: 1;
            }
        }

        @media (max-width: 768px) {
            .complaint_header {
                padding: 25px;
            }

            .header_content h1 {
                font-size: 26px;
            }

            .stat_card h2 {
                font-size: 28px;
            }

            .stat_card {
                padding: 15px;
                min-width: 120px;
            }

            .complaint_filter_box {
                padding: 20px;
            }

            .complaint_card {
                padding: 20px;
            }

            .complaint_footer {
                flex-direction: column;
            }

            .view_btn,
            .resolve_btn {
                width: 100%;
            }
        }

        /* Modal Styles for Details */
        .modal-content {
            border-radius: var(--radius-xl);
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            border: none;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .modal-title {
            color: white;
            font-weight: 700;
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
                <!-- ===================================================== -->

                <div class="container-fluid mt-5">

                    <!-- HEADER -->
                    <div class="complaint_header shadow-lg">
                        <div class="header_overlay"></div>

                        <div class="header_content">
                            <div>
                                <h1>
                                    <i class="fas fa-comment-dots me-2"></i> Complaint Management Module
                                </h1>

                                <p>
                                    Manage citizen complaints, assign departments, track escalation,
                                    and monitor resolutions efficiently.
                                </p>
                            </div>

                            <div class="header_stats">
                                <div class="stat_card pulse-stat">
                                    <h2 id="totalComplaint">1250</h2>
                                    <span><i class="fas fa-chart-line me-1"></i> Total Complaints</span>
                                </div>

                                <div class="stat_card">
                                    <h2 id="pendingComplaint">320</h2>
                                    <span><i class="fas fa-clock me-1"></i> Pending</span>
                                </div>

                                <div class="stat_card">
                                    <h2 id="resolvedComplaint">830</h2>
                                    <span><i class="fas fa-check-circle me-1"></i> Resolved</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FILTER SECTION -->
                    <div class="complaint_filter_box mt-4">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 mb-3">
                                <label><i class="fas fa-search me-1" style="color: var(--gold);"></i> Search
                                    Complaint</label>
                                <input type="text" class="form-control complaint_input" id="searchInput"
                                    placeholder="Complaint ID / Voter ID">
                            </div>

                            <div class="col-lg-2 col-md-6 mb-3">
                                <label><i class="fas fa-flag me-1" style="color: var(--gold);"></i> Priority</label>
                                <select class="form-select complaint_input" id="priorityFilter">
                                    <option value="all">All</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-6 mb-3">
                                <label><i class="fas fa-chart-simple me-1" style="color: var(--gold);"></i>
                                    Status</label>
                                <select class="form-select complaint_input" id="statusFilter">
                                    <option value="all">All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Escalated">Escalated</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-3">
                                <label><i class="fas fa-building me-1" style="color: var(--gold);"></i>
                                    Department</label>
                                <select class="form-select complaint_input" id="deptFilter">
                                    <option value="all">All Departments</option>
                                    <option value="Water Supply">Water Supply</option>
                                    <option value="Roads">Roads Department</option>
                                    <option value="Electricity">Electricity</option>
                                    <option value="Health">Health</option>
                                    <option value="Education">Education</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-12 mb-3 d-flex align-items-end">
                                <button class="btn complaint_btn w-100" onclick="filterComplaints()">
                                    <i class="fas fa-filter me-2"></i> Search Complaint
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- COMPLAINT CARDS CONTAINER -->
                    <div class="row mt-4" id="complaintsContainer"></div>

                </div>

                <!-- Modal for Complaint Details -->
                <div class="modal fade" id="complaintModal" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle"><i class="fas fa-file-alt me-2"></i> Complaint
                                    Details</h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" id="modalBody"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="resolveComplaint()"
                                    style="background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border: none;">Mark
                                    as Resolved</button>
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
        // Complaint Data
        const complaintsData = [
            {
                id: "CMP1001",
                title: "Road Damage Issue",
                priority: "High",
                voterId: "VTR8899",
                mla: "MLA Rajesh Patil",
                constituency: "Karad North",
                department: "Roads Department",
                status: "Pending",
                escalation: "Level 2",
                progress: 60,
                description: "Severe road damage near main market causing traffic congestion and accidents.",
                createdAt: "2025-05-15",
                resolvedDate: null
            },
            {
                id: "CMP1045",
                title: "Water Leakage Problem",
                priority: "Medium",
                voterId: "VTR4521",
                mla: "MLA Sunil Shinde",
                constituency: "Satara",
                department: "Water Supply",
                status: "In Progress",
                escalation: "Level 1",
                progress: 80,
                description: "Continuous water leakage from main pipeline wasting significant water.",
                createdAt: "2025-05-10",
                resolvedDate: null
            },
            {
                id: "CMP1100",
                title: "Street Light Failure",
                priority: "Low",
                voterId: "VTR9921",
                mla: "MLA Ashok Pawar",
                constituency: "Pune",
                department: "Electricity",
                status: "Resolved",
                escalation: "Level 0",
                progress: 100,
                description: "Street lights not working for over a week in the colony area.",
                createdAt: "2025-05-01",
                resolvedDate: "2025-05-20"
            },
            {
                id: "CMP1125",
                title: "Garbage Collection Issue",
                priority: "High",
                voterId: "VTR3344",
                mla: "MLA Meena Tai",
                constituency: "Mumbai South",
                department: "Health",
                status: "In Progress",
                escalation: "Level 1",
                progress: 45,
                description: "Irregular garbage collection leading to unhygienic conditions.",
                createdAt: "2025-05-18",
                resolvedDate: null
            },
            {
                id: "CMP1150",
                title: "School Building Repair",
                priority: "Medium",
                voterId: "VTR7788",
                mla: "MLA Anand Rao",
                constituency: "Nagpur Central",
                department: "Education",
                status: "Pending",
                escalation: "Level 0",
                progress: 20,
                description: "School building requires urgent repairs before monsoon.",
                createdAt: "2025-05-20",
                resolvedDate: null
            },
            {
                id: "CMP1175",
                title: "Power Outage Issue",
                priority: "High",
                voterId: "VTR5566",
                mla: "MLA Vijay Kumar",
                constituency: "Thane",
                department: "Electricity",
                status: "Resolved",
                escalation: "Level 2",
                progress: 100,
                description: "Frequent power outages affecting daily life.",
                createdAt: "2025-05-05",
                resolvedDate: "2025-05-22"
            }
        ];

        // Counter Animation Function
        function animateCounter(elementId, targetValue) {
            const element = document.getElementById(elementId);
            if (!element) return;
            let current = 0;
            const increment = targetValue / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= targetValue) {
                    element.textContent = targetValue;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 20);
        }

        // Update Statistics
        function updateStats() {
            const total = complaintsData.length;
            const pending = complaintsData.filter(c => c.status === "Pending" || c.status === "In Progress").length;
            const resolved = complaintsData.filter(c => c.status === "Resolved").length;

            animateCounter("totalComplaint", total);
            animateCounter("pendingComplaint", pending);
            animateCounter("resolvedComplaint", resolved);
        }

        // Create Complaint Card HTML
        function createComplaintCard(complaint) {
            const priorityClass = complaint.priority === "High" ? "high_priority" : (complaint.priority === "Medium" ? "medium_priority" : "low_priority");
            const statusClass = complaint.status === "Pending" ? "pending" : (complaint.status === "In Progress" ? "progress_status" : "resolved");

            return `
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="complaint_card">
                    <div class="card-accent"></div>
                    <div class="complaint_top">
                        <div>
                            <span class="complaint_id">
                                <i class="fas fa-hashtag me-1"></i> Complaint ID : ${complaint.id}
                            </span>
                            <h4>
                                <i class="fas fa-exclamation-triangle me-2" style="color: var(--gold); font-size: 18px;"></i> ${complaint.title}
                            </h4>
                        </div>
                        <span class="priority_badge ${priorityClass}">
                            ${complaint.priority}
                        </span>
                    </div>

                    <div class="complaint_body">
                        <div class="complaint_info">
                            <span><i class="fas fa-user me-2"></i> Voter ID</span>
                            <strong>${complaint.voterId}</strong>
                        </div>
                        <div class="complaint_info">
                            <span><i class="fas fa-user-tie me-2"></i> MLA Assigned</span>
                            <strong>${complaint.mla}</strong>
                        </div>
                        <div class="complaint_info">
                            <span><i class="fas fa-map-marker-alt me-2"></i> Constituency</span>
                            <strong>${complaint.constituency}</strong>
                        </div>
                        <div class="complaint_info">
                            <span><i class="fas fa-building me-2"></i> Department</span>
                            <strong>${complaint.department}</strong>
                        </div>
                        <div class="complaint_info">
                            <span><i class="fas fa-chart-simple me-2"></i> Status</span>
                            <strong class="status ${statusClass}">
                                ${complaint.status}
                            </strong>
                        </div>
                        <div class="complaint_info">
                            <span><i class="fas fa-arrow-up me-2"></i> Escalation</span>
                            <strong>${complaint.escalation}</strong>
                        </div>
                    </div>

                    <div class="complaint_progress mt-3">
                        <div class="progress_label">
                            <i class="fas fa-chart-line me-1"></i> Resolution Progress
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress_custom" style="width:${complaint.progress}%">
                                ${complaint.progress}%
                            </div>
                        </div>
                    </div>

                    <div class="complaint_footer">
                        <button class="view_btn" onclick="viewDetails('${complaint.id}')">
                            <i class="fas fa-eye me-2"></i> View Details
                        </button>
                        <button class="resolve_btn" onclick="resolveComplaintById('${complaint.id}')">
                            <i class="fas fa-check me-2"></i> ${complaint.status === "Resolved" ? "Closed" : "Resolve"}
                        </button>
                    </div>
                </div>
            </div>
        `;
        }

        // Render All Complaints
        function renderComplaints(complaints) {
            const container = document.getElementById("complaintsContainer");
            if (!container) return;

            if (complaints.length === 0) {
                container.innerHTML = `
                <div class="col-12 text-center p-5">
                    <i class="fas fa-inbox fa-4x mb-3" style="color: var(--gold);"></i>
                    <h4>No Complaints Found</h4>
                    <p class="text-muted">Try adjusting your filter criteria</p>
                </div>
            `;
                return;
            }

            let html = "";
            complaints.forEach(complaint => {
                html += createComplaintCard(complaint);
            });
            container.innerHTML = html;
        }

        // Filter Complaints
        function filterComplaints() {
            const searchTerm = document.getElementById("searchInput").value.toLowerCase();
            const priority = document.getElementById("priorityFilter").value;
            const status = document.getElementById("statusFilter").value;
            const department = document.getElementById("deptFilter").value;

            let filtered = complaintsData.filter(complaint => {
                let match = true;

                if (searchTerm && !complaint.id.toLowerCase().includes(searchTerm) && !complaint.voterId.toLowerCase().includes(searchTerm)) {
                    match = false;
                }
                if (priority !== "all" && complaint.priority !== priority) {
                    match = false;
                }
                if (status !== "all" && complaint.status !== status) {
                    match = false;
                }
                if (department !== "all" && complaint.department !== department) {
                    match = false;
                }

                return match;
            });

            renderComplaints(filtered);
        }

        // View Complaint Details
        function viewDetails(id) {
            const complaint = complaintsData.find(c => c.id === id);
            if (!complaint) return;

            document.getElementById("modalTitle").innerHTML = `<i class="fas fa-file-alt me-2"></i> ${complaint.title} - Complaint Details`;
            document.getElementById("modalBody").innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr><th style="width:40%">Complaint ID</th><td>${complaint.id}</td></tr>
                        <tr><th>Title</th><td>${complaint.title}</td></tr>
                        <tr><th>Priority</th><td><span class="priority_badge ${complaint.priority === "High" ? "high_priority" : (complaint.priority === "Medium" ? "medium_priority" : "low_priority")}">${complaint.priority}</span></td></tr>
                        <tr><th>Voter ID</th><td>${complaint.voterId}</td></tr>
                        <tr><th>MLA Assigned</th><td>${complaint.mla}</td></tr>
                        <tr><th>Constituency</th><td>${complaint.constituency}</td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr><th style="width:40%">Department</th><td>${complaint.department}</td></tr>
                        <tr><th>Status</th><td><span class="status ${complaint.status === "Pending" ? "pending" : (complaint.status === "In Progress" ? "progress_status" : "resolved")}">${complaint.status}</span></td></tr>
                        <tr><th>Escalation Level</th><td>${complaint.escalation}</td></tr>
                        <tr><th>Progress</th><td><div class="progress" style="height:10px;"><div class="progress-bar progress_custom" style="width:${complaint.progress}%">${complaint.progress}%</div></div></td></tr>
                        <tr><th>Created Date</th><td>${complaint.createdAt}</td></tr>
                        <tr><th>Resolved Date</th><td>${complaint.resolvedDate || "Not Resolved Yet"}</td></tr>
                    </table>
                </div>
            </div>
            <div class="mt-3 p-3 rounded-3" style="background: rgba(212, 175, 55, 0.08);">
                <strong><i class="fas fa-file-alt me-2"></i> Description:</strong>
                <p class="mt-2 mb-0">${complaint.description}</p>
            </div>
        `;

            new bootstrap.Modal(document.getElementById("complaintModal")).show();
        }

        // Resolve Complaint
        function resolveComplaintById(id) {
            const complaint = complaintsData.find(c => c.id === id);
            if (complaint && complaint.status !== "Resolved") {
                complaint.status = "Resolved";
                complaint.progress = 100;
                complaint.resolvedDate = new Date().toISOString().split('T')[0];
                updateStats();
                filterComplaints();

                // Show success message
                alert(`Complaint ${id} has been marked as Resolved!`);
            } else if (complaint && complaint.status === "Resolved") {
                alert("This complaint is already resolved.");
            }
        }

        // Global function for modal resolve button
        function resolveComplaint() {
            const title = document.getElementById("modalTitle").innerHTML;
            const match = title.match(/CMP\d+/);
            if (match) {
                resolveComplaintById(match[0]);
                bootstrap.Modal.getInstance(document.getElementById("complaintModal")).hide();
            }
        }

        // Initialize on page load
        document.addEventListener("DOMContentLoaded", function () {
            updateStats();
            renderComplaints(complaintsData);

            // Add event listeners for real-time filtering
            document.getElementById("searchInput").addEventListener("keyup", filterComplaints);
            document.getElementById("priorityFilter").addEventListener("change", filterComplaints);
            document.getElementById("statusFilter").addEventListener("change", filterComplaints);
            document.getElementById("deptFilter").addEventListener("change", filterComplaints);
        });
    </script>
    <script src="header.js"></script>
</body>

</html>