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
        /* TABLE BOX - Premium Glassmorphism */
        /* ===================================================== */

        .table_box {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            border-radius: var(--radius-xl);
            padding: 30px;
            margin-top: 35px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .table_box:hover {
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .table_box h4 {
            font-size: 24px;
            font-weight: 800;
            color: #0F172A;
            position: relative;
            display: inline-block;
        }

        .table_box h4::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 45px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 3px;
        }

        /* Search Input */
        #searchInput {
            border: 1px solid var(--beige-dark);
            background: rgba(255, 255, 255, 0.9);
            padding: 12px 20px;
            min-width: 250px;
            border-radius: 48px;
            font-weight: 500;
            transition: all var(--transition-base);
        }

        #searchInput:focus {
            outline: none;
            background: var(--pure-white);
            border-color: var(--gold);
            box-shadow: 0 0 0 4px var(--gold-glow);
        }

        /* Table Styles */
        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
            width: 100%;
        }

        .table thead tr {
            background: transparent;
        }

        .table th {
            border: none;
            padding: 14px 12px;
            color: #1E293B;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            background: rgba(255, 255, 255, 0.7);
            transition: all var(--transition-base);
            border-radius: var(--radius-md);
        }

        .table tbody tr:nth-child(even) {
            background: rgba(250, 246, 237, 0.6);
        }

        .table tbody tr:hover {
            transform: translateX(4px);
            background: rgba(212, 175, 55, 0.08);
            box-shadow: var(--shadow-gold);
        }

        .table td {
            padding: 14px 12px;
            border: none;
            vertical-align: middle;
            font-weight: 500;
            color: #475569;
        }

        /* Survey Status Badges */
        .survey_status {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
            transition: all var(--transition-fast);
        }

        .survey_status:hover {
            transform: scale(1.05);
        }

        .active_status {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.12), rgba(16, 185, 129, 0.05));
            color: #10B981;
            border-left: 3px solid #10B981;
        }

        .pending_status {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(245, 158, 11, 0.05));
            color: #F59E0B;
            border-left: 3px solid #F59E0B;
        }

        .closed_status {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.12), rgba(239, 68, 68, 0.05));
            color: #EF4444;
            border-left: 3px solid #EF4444;
        }

        /* Action Buttons */
        .action_btn {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: var(--radius-sm);
            color: white;
            font-size: 13px;
            margin-right: 5px;
            transition: all var(--transition-base);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .action_btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: var(--shadow-gold);
        }

        .action_btn:active::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-50%, -50%);
            animation: rippleEffect 0.5s ease-out;
        }

        @keyframes rippleEffect {
            0% {
                width: 0;
                height: 0;
                opacity: 0.5;
            }

            100% {
                width: 80px;
                height: 80px;
                opacity: 0;
            }
        }

        .view_btn {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        }

        .edit_btn {
            background: linear-gradient(135deg, #F59E0B, #D97706);
        }

        .delete_btn {
            background: linear-gradient(135deg, #EF4444, #DC2626);
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
        .table_box,
        .analytics_box {
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

        /* Modal Styles */
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

            .table_box {
                padding: 20px;
            }

            .action_btn {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }

            #searchInput {
                min-width: 100%;
                margin-top: 15px;
            }

            .table th,
            .table td {
                padding: 10px 8px;
                font-size: 12px;
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

    .table_box{
        padding:15px !important;
        overflow-x:auto;
    }

    .table{
        min-width:900px;
    }

    .analytics_box{
        padding:20px !important;
    }

    #searchInput{
        width:100%;
        min-width:100%;
    }

    .action_btn{
        width:30px;
        height:30px;
        font-size:11px;
    }
}

@media (max-width: 576px){

    .survey_header h2{
        font-size:20px !important;
    }

    .survey_header p{
        font-size:12px;
    }

    .table th,
    .table td{
        white-space:nowrap;
        font-size:11px;
        padding:8px;
    }

    .analytics_box h4,
    .table_box h4{
        font-size:18px;
    }
}
    </style>
</head>

<body class="inner_page widgets">
    <div class="full_container">
        <div class="inner_container">
            <!-- SIDEBAR - Ultra-Premium White Gold Floating Navigation -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <!-- Logo removed as per existing HTML - preserving original structure -->
                    </div>
                    <div class="sidebar_user_info">
                        <div class="user_profle_side">
                            <div class="user_img">
                                <img class="img-responsive" src="images/layout_img/user_img.jpg" alt="User" />
                            </div>
                            <div class="user_info">
                                <h6>ADMIN</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>Governance Panel</h4>
                    <ul class="list-unstyled components">
                        <li><a href="<?= base_url('admin/mla-management') ?>" data-tooltip="MLA Management"><i class="fa fa-users"></i><span>MLA Management</span></a></li>
                        <li><a href="<?= base_url('admin/constituency-management') ?>" data-tooltip="Constituency"><i class="fa fa-map-marker"></i><span>Constituency Management</span></a></li>
                        <li><a href="<?= base_url('admin/complaint-management') ?>" data-tooltip="Complaints"><i class="fa fa-exclamation-circle"></i><span>Complaint Management</span></a></li>
                        <li><a href="<?= base_url('admin/survey-management') ?>" data-tooltip="Surveys"><i class="fa fa-bar-chart"></i><span>Survey Management</span></a></li>
                        <li><a href="<?= base_url('admin/media-library') ?>" data-tooltip="Media"><i class="fa fa-picture-o"></i><span>Media Library</span></a></li>
                        <li><a href="<?= base_url('admin/feedback-dashboard') ?>" data-tooltip="Feedback"><i class="fa fa-comments"></i><span>Feedback Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/activity-logs') ?>" data-tooltip="Logs"><i class="fa fa-history"></i><span>Activity Logs</span></a></li>
                        <li><a href="<?= base_url('admin/voter-management') ?>" data-tooltip="Voters"><i class="fa fa-user"></i><span>Voter Management</span></a></li>
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->

            <div id="content">
                <!-- TOPBAR - Executive White-Gold Glass Pill -->
                <div class="topbar" id="premiumTopbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full d-flex align-items-center w-100">
                            <button type="button" id="sidebarCollapse" class="sidebar-toggle-gold-premium"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section mr-3 d-lg-none d-block">
                                <a href="index.html"><img class="img-responsive" src="images/logo/MLA LOGO.png" alt="#"
                                        style="max-height: 44px;" /></a>
                            </div>
                            <!-- Premium Gold Glass Search Bar -->
                            <div class="search-gold-exec">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Search MLA, constituency, reports..." id="globalSearch">
                            </div>
                            <div class="right_topbar ml-auto">
                                <div class="icon_info d-flex align-items-center">
                                    <ul class="d-flex align-items-center mb-0">
                                        <!-- Live Digital Clock + Date -->
                                        <li>
                                            <div class="clock-luxury-gold">
                                                <div class="clock-time" id="liveClock">--:--:--</div>
                                                <div class="clock-date" id="liveDate">Loading...</div>
                                            </div>
                                        </li>
                                        <!-- Premium Notification Bell -->
                                        <li><a href="<?= base_url('notification-center') ?>" class="notif-gold-luxury"><i
                                                    class="fa fa-bell-o"></i><span
                                                    class="notif-badge-premium">2</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="images/layout_img/user_img.jpg" alt="#" width="38" /><span
                                                    class="name_user">ADMIN</span></a>
                                            <div class="dropdown-menu dropdown-menu-gold-luxury">
                                                
                                                <a class="dropdown-item" href="#"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
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
                    <!-- SURVEY TABLE -->
                    <!-- ===================================================== -->

                    <div class="table_box">
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                            <h4>
                                <i class="fa-solid fa-list-check me-2" style="color: var(--gold);"></i> Recent Surveys
                            </h4>
                            <input type="text" class="form-control" placeholder="🔍 Search Survey..." id="searchInput">
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Survey ID</th>
                                        <th>Title</th>
                                        <th>MLA</th>
                                        <th>Responses</th>
                                        <th>Sentiment</th>
                                        <th>Participation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="surveyTable">
                                    <!-- Dynamic content loaded via JavaScript -->
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

                <!-- Modal for Survey Details -->
                <div class="modal fade" id="surveyModal" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle"><i class="fa-solid fa-file-alt me-2"></i> Survey
                                    Details</h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" id="modalBody"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="editSurvey()"
                                    style="background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border: none;">Edit
                                    Survey</button>
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
        // Survey Data
        const surveysData = [
            { id: "#SR101", title: "Road Development Feedback", mla: "Rahul Patil", responses: 3245, sentiment: "Positive", participation: 82, status: "Active", description: "Feedback survey for road development projects in the constituency." },
            { id: "#SR102", title: "Water Supply Survey", mla: "Amit Deshmukh", responses: 2100, sentiment: "Neutral", participation: 61, status: "Pending", description: "Assessment of water supply quality and coverage." },
            { id: "#SR103", title: "Healthcare Facility Review", mla: "Vikas More", responses: 5420, sentiment: "Negative", participation: 47, status: "Closed", description: "Review of healthcare facilities and services." },
            { id: "#SR104", title: "Education Quality Survey", mla: "Meena Sharma", responses: 1870, sentiment: "Positive", participation: 73, status: "Active", description: "Evaluation of school education quality." },
            { id: "#SR105", title: "Electricity Supply Feedback", mla: "Sanjay Patil", responses: 2980, sentiment: "Neutral", participation: 68, status: "Active", description: "Feedback on electricity supply and outages." },
            { id: "#SR106", title: "Sanitation Drive Survey", mla: "Rajesh Kulkarni", responses: 1560, sentiment: "Positive", participation: 55, status: "Pending", description: "Survey on sanitation drive effectiveness." }
        ];

        // Counter Animation Function
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

        // Update Statistics
        function updateStats() {
            const totalSurveys = surveysData.length;
            const totalResponses = surveysData.reduce((sum, s) => sum + s.responses, 0);
            const positiveCount = surveysData.filter(s => s.sentiment === "Positive").length;
            const satisfactionRate = Math.round((positiveCount / totalSurveys) * 100);

            animateCounter("surveyCount", totalSurveys);
            animateCounter("responseCount", totalResponses >= 1000 ? (totalResponses / 1000).toFixed(0) + "K" : totalResponses);
            animateCounter("satisfaction", satisfactionRate + "%");

            // Calculate average participation
            const avgParticipation = Math.round(surveysData.reduce((sum, s) => sum + s.participation, 0) / totalSurveys);
            animateCounter("participation", avgParticipation + "%");
        }

        // Render Survey Table
        function renderSurveyTable(filteredData = null) {
            const tbody = document.getElementById("surveyTable");
            const data = filteredData || surveysData;

            if (!tbody) return;

            if (data.length === 0) {
                tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <i class="fa-solid fa-inbox fa-3x mb-3" style="color: var(--gold);"></i>
                        <h5>No Surveys Found</h5>
                        <p class="text-muted">Try adjusting your search criteria</p>
                    </td>
                </tr>
            `;
                return;
            }

            tbody.innerHTML = data.map(survey => {
                const statusClass = survey.status === "Active" ? "active_status" : (survey.status === "Pending" ? "pending_status" : "closed_status");
                const sentimentIcon = survey.sentiment === "Positive" ? "😊" : (survey.sentiment === "Neutral" ? "😐" : "😞");

                return `
                <tr>
                    <td><strong>${survey.id}</strong></td>
                    <td>${survey.title}</td>
                    <td><i class="fa-solid fa-user-tie me-1" style="color: var(--gold);"></i> ${survey.mla}</td>
                    <td><i class="fa-solid fa-users me-1"></i> ${survey.responses.toLocaleString()}</td>
                    <td>${sentimentIcon} ${survey.sentiment}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="progress flex-grow-1" style="height: 6px;">
                                <div class="progress-bar" style="width: ${survey.participation}%; background: linear-gradient(90deg, var(--gold), var(--gold-dark));"></div>
                            </div>
                            <span class="small fw-bold">${survey.participation}%</span>
                        </div>
                    </td>
                    <td><span class="survey_status ${statusClass}">${survey.status}</span></td>
                    <td>
                        <button class="action_btn view_btn" onclick="viewSurvey('${survey.id}')" title="View Details">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="action_btn edit_btn" onclick="editSurveyById('${survey.id}')" title="Edit Survey">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="action_btn delete_btn" onclick="deleteSurvey('${survey.id}')" title="Delete Survey">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
            }).join('');
        }

        // Search/Filter Surveys
        function filterSurveys() {
            const searchTerm = document.getElementById("searchInput").value.toLowerCase();

            if (!searchTerm) {
                renderSurveyTable();
                return;
            }

            const filtered = surveysData.filter(survey =>
                survey.id.toLowerCase().includes(searchTerm) ||
                survey.title.toLowerCase().includes(searchTerm) ||
                survey.mla.toLowerCase().includes(searchTerm)
            );

            renderSurveyTable(filtered);
        }

        // View Survey Details
        function viewSurvey(id) {
            const survey = surveysData.find(s => s.id === id);
            if (!survey) return;

            const statusClass = survey.status === "Active" ? "active_status" : (survey.status === "Pending" ? "pending_status" : "closed_status");

            document.getElementById("modalTitle").innerHTML = `<i class="fa-solid fa-file-alt me-2"></i> ${survey.title} - Survey Details`;
            document.getElementById("modalBody").innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr><th style="width:40%">Survey ID</th><td>${survey.id}</td></tr>
                        <tr><th>Title</th><td>${survey.title}</td></tr>
                        <tr><th>MLA</th><td><i class="fa-solid fa-user-tie me-1"></i> ${survey.mla}</td></tr>
                        <tr><th>Responses</th><td><i class="fa-solid fa-users me-1"></i> ${survey.responses.toLocaleString()}</td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr><th>Sentiment</th><td>${survey.sentiment}</td></tr>
                        <tr><th>Participation</th><td>${survey.participation}%</td></tr>
                        <tr><th>Status</th><td><span class="survey_status ${statusClass}">${survey.status}</span></td></tr>
                    \]

                </div>
            </div>
            <div class="mt-3 p-3 rounded-3" style="background: rgba(212, 175, 55, 0.08);">
                <strong><i class="fa-solid fa-circle-info me-2"></i> Description:</strong>
                <p class="mt-2 mb-0">${survey.description}</p>
            </div>
        `;

            // Store current survey ID for edit
            window.currentSurveyId = id;

            new bootstrap.Modal(document.getElementById("surveyModal")).show();
        }

        // Edit Survey
        function editSurvey() {
            if (window.currentSurveyId) {
                editSurveyById(window.currentSurveyId);
                bootstrap.Modal.getInstance(document.getElementById("surveyModal")).hide();
            }
        }

        function editSurveyById(id) {
            alert(`Edit functionality for survey ${id} would open edit form.\n\nIn production, this would open a modal with editable fields.`);
        }

        // Delete Survey
        function deleteSurvey(id) {
            if (confirm(`Are you sure you want to delete survey ${id}?`)) {
                const index = surveysData.findIndex(s => s.id === id);
                if (index !== -1) {
                    surveysData.splice(index, 1);
                    updateStats();
                    filterSurveys();
                    alert(`Survey ${id} has been deleted successfully!`);
                }
            }
        }

        // Create New Survey
        function createNewSurvey() {
            alert(`Create New Survey Form\n\nThis would open a form to create a new survey with fields like:\n- Survey Title\n- MLA Assignment\n- Department\n- Questions\n- Target Audience\n- Start/End Date\n\nIn production, this would open a modal with all necessary fields.`);
        }

        // Animate Progress Bars
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

        // Event Listeners
        document.addEventListener("DOMContentLoaded", function () {
            updateStats();
            renderSurveyTable();
            animateProgressBars();

            // Search input event
            document.getElementById("searchInput").addEventListener("keyup", filterSurveys);
        });
    </script>
    <script src="header.js"></script>
</body>

</html>