<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
   <title>MLA Monitoring System · Voter Command Center</title>
   <!-- Existing CSS dependencies (preserved) -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <!-- jQuery and Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
   <link rel="stylesheet" href="css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="css/custom.css" />
   <!-- calendar file css -->
   <link rel="stylesheet" href="js/semantic.min.css" />

   <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
      rel="stylesheet">
   <style>
        /* ===================================================== */
        /* PREMIUM VOTER COMMAND CENTER - White + Beige + Gold Theme
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, var(--cream) 0%, var(--beige-light) 50%, var(--beige) 100%);
            font-family: 'Inter', sans-serif;
            color: #1E293B;
            min-height: 100vh;
        }
        
        .page_title h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #0F172A, var(--gold-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 8px;
            position: relative;
            display: inline-block;
        }
        
        .page_title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 4px;
            animation: titleUnderline 0.6s ease-out;
        }
        
        @keyframes titleUnderline {
            from { width: 0; opacity: 0; }
            to { width: 60px; opacity: 1; }
        }
        
        .white_shd {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xl);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
            overflow: hidden;
            height: 100%;
        }
        
        .white_shd:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
        }
        
        .margin_bottom_30 {
            margin-bottom: 30px;
        }
        
        .stat_card {
            padding: 28px;
            text-align: center;
            transition: all var(--transition-base);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .stat_card::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, var(--gold), var(--gold-light), var(--gold-dark), var(--gold));
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
        }
        
        .stat_card:hover::before {
            opacity: 0.5;
        }
        
        .stat_card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-gold);
        }
        
        .stat_number {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #0F172A, var(--gold-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }
        
        .stat_text {
            color: #64748B;
            font-weight: 600;
            margin-top: 8px;
            display: block;
        }
        
        .stat_card.pulse-card {
            animation: pulseGold 2s infinite;
        }
        
        @keyframes pulseGold {
            0%, 100% { box-shadow: var(--shadow-sm); border-color: rgba(212, 175, 55, 0.2); }
            50% { box-shadow: var(--shadow-gold); border-color: var(--gold); }
        }
        
        .info_people {
            padding: 25px;
            display: flex;
            gap: 18px;
            align-items: center;
            transition: all var(--transition-base);
        }
        
        .info_people:hover {
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.05), transparent);
        }
        
        .p_info_img img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--gold);
            transition: all var(--transition-base);
            box-shadow: var(--shadow-sm);
        }
        
        .p_info_img img:hover {
            transform: scale(1.05);
            border-color: var(--gold-dark);
            box-shadow: var(--shadow-gold);
        }
        
        .user_info_cont h4 {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 5px;
        }
        
        .user_info_cont p {
            margin: 0;
            color: #64748B;
            font-size: 13px;
        }
        
        .p_status {
            display: inline-block;
            margin-top: 8px !important;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.08));
            color: var(--gold-dark) !important;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 11px !important;
            font-weight: 600;
            transition: all var(--transition-fast);
            border-left: 3px solid var(--gold);
        }
        
        .p_status:hover {
            transform: scale(1.05);
        }
        
        .action_btn {
            border: none;
            padding: 8px 18px;
            border-radius: 48px;
            font-size: 13px;
            font-weight: 600;
            margin-right: 8px;
            transition: all var(--transition-base);
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .edit_btn {
            background: linear-gradient(135deg, var(--info), #0284C7);
        }
        
        .delete_btn {
            background: linear-gradient(135deg, var(--danger), #DC2626);
        }
        .approve_btn { background: linear-gradient(135deg, #10B981, #059669); }
        .reject_btn { background: linear-gradient(135deg, #F59E0B, #D97706); }
        
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
            animation: rippleAnim 0.5s ease-out;
        }
        
        @keyframes rippleAnim {
            0% { width: 0; height: 0; opacity: 0.5; }
            100% { width: 120px; height: 120px; opacity: 0; }
        }
        
        .action_btn:hover {
            transform: translateY(-3px);
            opacity: 1;
            filter: brightness(1.05);
            box-shadow: var(--shadow-gold);
        }
        
        .action_btn:active {
            transform: scale(0.97);
        }
        
        .filter-astro {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            border-radius: var(--radius-xxl);
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }
        
        .filter-astro:hover {
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.5);
        }
        
        .filter-astro h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #0F172A;
        }
        
        .btn-warm-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border: none;
            border-radius: 48px;
            padding: 10px 28px;
            font-weight: 600;
            color: white;
            transition: all var(--transition-base);
        }
        
        .btn-warm-gold:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold-lg);
            filter: brightness(1.05);
        }
        
        .btn-outline-cream {
            background: transparent;
            border: 1px solid var(--gold);
            border-radius: 48px;
            padding: 10px 28px;
            font-weight: 600;
            color: var(--gold-dark);
            transition: all var(--transition-base);
        }
        
        .btn-outline-cream:hover {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: white;
            transform: translateY(-3px);
            box-shadow: var(--shadow-gold);
        }
        
        .form-control, .form-select {
            border: 1px solid var(--beige-dark);
            border-radius: 48px !important;
            padding: 10px 16px;
            transition: all var(--transition-base);
            background: var(--pure-white);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-glow);
            transform: translateY(-1px);
            outline: none;
        }
        
        label {
            font-weight: 600;
            color: #1E293B;
            margin-bottom: 8px;
            display: block;
            font-size: 13px;
        }
        
        .feedback_list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .feedback_list li {
            padding: 15px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            transition: all var(--transition-base);
            position: relative;
            padding-left: 12px;
        }
        
        .feedback_list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-radius: 3px;
            transition: height 0.3s ease;
        }
        
        .feedback_list li:hover::before {
            height: 60%;
        }
        
        .feedback_list li:last-child {
            border-bottom: none;
        }
        
        .feedback_list li:hover {
            transform: translateX(6px);
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.05), transparent);
            border-radius: var(--radius-sm);
        }
        
        .feedback_user {
            font-weight: 700;
            color: #1E293B;
            display: block;
            margin-bottom: 5px;
            transition: color 0.2s ease;
        }
        
        .feedback_list li:hover .feedback_user {
            color: var(--gold-dark);
        }
        
        .feedback_msg {
            color: #64748B;
            font-size: 13px;
            display: block;
        }
        
        .feedback_time {
            color: #94A3B8;
            font-size: 11px;
            display: inline-block;
            margin-top: 5px;
        }
        
        .heading1 h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #0F172A;
            position: relative;
            display: inline-block;
            margin: 0;
        }
        
        .heading1 h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 3px;
            transition: width 0.3s ease;
        }
        
        .heading1:hover h2::after {
            width: 60px;
        }
        
        .constituency_badge {
            padding: 5px 12px;
            border-radius: 50px;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.08));
            color: var(--gold-dark);
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            transition: all var(--transition-fast);
            border-left: 3px solid var(--gold);
        }
        
        .constituency_badge:hover {
            transform: scale(1.05);
        }
        
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 6px;
            width: 100%;
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
            transition: background 0.2s ease;
        }
        
        .table td {
            vertical-align: middle;
            border: none;
            color: #475569;
            padding: 12px;
            font-size: 13px;
            border-radius: var(--radius-sm);
        }
        
        .btn-outline-warning {
            border-color: var(--gold);
            color: var(--gold-dark);
            border-radius: 40px;
            padding: 5px 15px;
            font-size: 12px;
        }
        
        .btn-outline-warning:hover {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: white;
            border-color: transparent;
        }
        
        .progress {
            height: 10px;
            border-radius: 20px;
            background: var(--beige-dark);
        }
        
        .progress-bar {
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
            border-radius: 20px;
        }
        
        .graph_head {
            border-bottom: 1px solid rgba(212, 175, 55, 0.15);
        }
        
        .badge.bg-light {
            background: rgba(212, 175, 55, 0.15) !important;
            color: var(--gold-dark) !important;
        }
        
        .footer {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            padding: 20px;
            text-align: center;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            margin-top: 30px;
            border-radius: var(--radius-lg);
        }
        
        .footer p {
            margin: 0;
            font-size: 13px;
            color: #64748B;
        }
        
        .footer a {
            color: var(--gold-dark);
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .footer a:hover {
            color: var(--gold);
        }
        
        .white_shd, .stat_card, .filter-astro {
            animation: fadeInUp 0.5s ease backwards;
        }
        
        .stat_card:nth-child(1) { animation-delay: 0.05s; }
        .stat_card:nth-child(2) { animation-delay: 0.1s; }
        .stat_card:nth-child(3) { animation-delay: 0.15s; }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        @media (max-width: 768px) {
            .info_people {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }
            
            .stat_number {
                font-size: 28px;
            }
            
            .action_btn {
                padding: 6px 14px;
                font-size: 12px;
            }
            
            .page_title h2 {
                font-size: 24px;
            }
            
            .heading1 h2 {
                font-size: 18px;
            }
            
            .filter-astro {
                padding: 20px !important;
            }
        }
        .badge-otp-verified { background: #d1fae5; color: #065f46; padding: 4px 12px; border-radius: 40px; }
        .badge-otp-pending { background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 40px; }
        .badge-fraud { background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 40px; }
   </style>
</head>

<body class="inner_page widgets">
   <?php include "common/header.php"?>  
<!-- DASHBOARD INNER -->
<div class="midde_cont">
    <div class="container-fluid">

        <!-- PAGE TITLE -->
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2><i class="fas fa-users-viewfinder me-2" style="color: var(--gold);"></i> Voter Command Center</h2>
                    <p class="text-muted mt-2 mb-0" style="color:#9b7c54 !important;"><i class="fas fa-chart-line me-1"></i> Real-time insights · Constituency intelligence · Registration workflow</p>
                </div>
            </div>
        </div>

        <!-- STATISTICS CARDS (enhanced interactive) -->
        <div class="row mb-4 g-4">
            <div class="col-md-3">
                <div class="white_shd full margin_bottom_30 stat_card pulse-card">
                    <div class="stat_number"><i class="fas fa-user-check me-2" style="color: var(--gold);"></i><span id="totalVotersStat">0</span></div>
                    <div class="stat_text"><i class="fas fa-users me-1"></i> Total Registered</div>
                    <small class="text-success mt-2 d-block"><i class="fas fa-arrow-up"></i> +12% this month</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="white_shd full margin_bottom_30 stat_card">
                    <div class="stat_number"><i class="fas fa-flag me-2" style="color: var(--gold);"></i><span id="pendingApprovalStat">0</span></div>
                    <div class="stat_text"><i class="fas fa-clock me-1"></i> Pending Approval</div>
                    <small class="text-warning mt-2 d-block"><i class="fas fa-hourglass-half"></i> Awaiting review</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="white_shd full margin_bottom_30 stat_card">
                    <div class="stat_number"><i class="fas fa-shield-alt me-2" style="color: var(--gold);"></i><span id="fraudRiskStat">0</span></div>
                    <div class="stat_text"><i class="fas fa-exclamation-triangle me-1"></i> Fraud Risk</div>
                    <small class="text-danger mt-2 d-block"><i class="fas fa-skull"></i> Requires review</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="white_shd full margin_bottom_30 stat_card">
                    <div class="stat_number"><i class="fas fa-map-marker-alt me-2" style="color: var(--gold);"></i>12</div>
                    <div class="stat_text"><i class="fas fa-globe me-1"></i> Constituencies</div>
                    <small class="text-primary mt-2 d-block"><i class="fas fa-chart-line"></i> Active monitoring</small>
                </div>
            </div>
        </div>

        <!-- VOTER CARDS (dynamic via JS) -->
        <div class="row column1 g-4 mb-5" id="voterCardsContainer"></div>

        <!-- FILTER PAVILION (enhanced constituency command center) -->
        <div class="filter-astro p-4 p-lg-5 shadow-lg mt-2 mb-5">
            <h3 class="mb-4 fw-semibold" style="color:#876b42;"><i class="fas fa-tachometer-alt me-2" style="color: var(--gold-dark);"></i> Constituency Command Center</h3>
            <div class="row g-4">
                <div class="col-md-3">
                    <label><i class="fas fa-city me-1"></i> District</label>
                    <select class="form-select" id="district" style="border-radius: 60px;">
                        <option value="">All Districts</option>
                        <option value="Satara">Satara</option><option value="Pune">Pune</option><option value="Kolhapur">Kolhapur</option><option value="Sangli">Sangli</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label><i class="fas fa-map-pin me-1"></i> Constituency</label>
                    <select class="form-select" id="constituency" style="border-radius: 60px;">
                        <option value="">All Constituencies</option>
                        <option value="Satara South">Satara South</option><option value="Pune Central">Pune Central</option><option value="Kolhapur North">Kolhapur North</option><option value="Sangli West">Sangli West</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label><i class="fas fa-sort-amount-down me-1"></i> Sort by Name</label>
                    <select class="form-select" id="sortOrder" style="border-radius: 60px;">
                        <option value="asc">A → Z</option>
                        <option value="desc">Z → A</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label><i class="fas fa-filter me-1"></i> Approval Status</label>
                    <select class="form-select" id="approvalFilter" style="border-radius: 60px;">
                        <option value="">All</option>
                        <option value="Approved">Approved</option>
                        <option value="Pending">Pending</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 d-flex gap-3 flex-wrap">
                <button class="btn btn-warm-gold px-4 fw-bold" id="applyFiltersBtn"><i class="fas fa-filter me-2"></i>Deploy Filters</button>
                <button class="btn btn-outline-cream px-4" id="resetFiltersBtn"><i class="fas fa-sync-alt me-2"></i>Reset</button>
            </div>
        </div>

        <!-- MAIN CONTENT (Voter feedback + profile summary) -->
        <div class="row column4 graph g-4 mb-5">
            <!-- VOTER FEEDBACK / REGISTRATION ACTIVITY -->
            <div class="col-md-6 col-lg-4">
                <div class="white_shd full margin_bottom_30 h-100">
                    <div class="full graph_head p-4">
                        <div class="heading1 margin_0">
                            <h2><i class="fas fa-message me-2" style="color:#c9a03d;"></i> Registration Activity</h2>
                        </div>
                    </div>
                    <div class="p-4" id="feedbackListContainer"></div>
                </div>
            </div>

            <!-- VOTER PROFILE SUMMARY (dynamic) -->
            <div class="col-md-6 col-lg-4">
                <div class="white_shd full margin_bottom_30 h-100">
                    <div class="full graph_head p-4">
                        <div class="heading1 margin_0">
                            <h2><i class="fas fa-chart-pie me-2" style="color:#c9a03d;"></i> Voter Profile Summary</h2>
                        </div>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table">
                            <thead><tr><th>Name</th><th>Constituency</th><th>Status</th></tr></thead>
                            <tbody id="summaryTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Quick Stats Summary extra -->
            <div class="col-md-12 col-lg-4">
                <div class="white_shd full margin_bottom_30 h-100 p-4 d-flex flex-column justify-content-center">
                    <div class="text-center">
                        <i class="fas fa-chalkboard-user fa-3x" style="color: #c9a03d;"></i>
                        <h4 class="mt-3 fw-bold">Constituency Engagement</h4>
                        <div class="progress mb-3 mt-3" style="height: 10px; border-radius: 10px;">
                            <div class="progress-bar" style="width: 74%;" role="progressbar">74%</div>
                        </div>
                        <p class="text-muted">Overall feedback responsiveness +22% this quarter</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FULL TABLE (Advanced Voter Profiles with registration workflow) -->
        <div class="row">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head p-4">
                        <div class="heading1 margin_0 d-flex justify-content-between align-items-center flex-wrap">
                            <h2><i class="fas fa-database me-2" style="color:#c9a03d;"></i> Complete Voter Registry</h2>
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill"><i class="fas fa-user-plus me-1"></i> Last updated: today</span>
                        </div>
                    </div>
                    <div class="table-responsive p-4">
                        <table class="table align-middle" id="voterRegistry">
                            <thead>
                                <tr><th>Voter Name</th><th>Email</th><th>Constituency</th><th>OTP</th><th>Approval</th><th>Risk</th><th>Action</th></tr>
                            </thead>
                            <tbody id="voterTableBody"></tbody>
                        </table>
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
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/animate.js"></script>
   <script src="js/bootstrap-select.js"></script>
   <script src="js/owl.carousel.js"></script>
   <script src="js/Chart.min.js"></script>
   <script src="js/Chart.bundle.min.js"></script>
   <script src="js/utils.js"></script>
   <script src="js/analyser.js"></script>
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <script src="js/custom.js"></script>
   <script src="js/semantic.min.js"></script>
   <script></script>
   <script src="header.js"></script>
<script>
    // =====================================================
    // ENHANCED VOTER DATASET — registration workflow
    // =====================================================
    const votersData = [
        { id: 1, name: "Amit Jadhav", email: "amitj@gmail.com", district: "Satara", constituency: "Satara South", feedback: 14, status: "Active", avatar: "https://randomuser.me/api/portraits/men/32.jpg", feedbackMsg: "✅ Road development work completed successfully.", feedbackTime: "10 min ago", phone: "+91 98765 43210", voterId: "VTR001234", otpVerified: true, approval: "Approved", risk: "Low", aadhaarMasked: "XXXX-XXXX-1234", address: "123 Main St, Satara" },
        { id: 2, name: "Priya Patil", email: "priyap@gmail.com", district: "Pune", constituency: "Pune Central", feedback: 10, status: "Active", avatar: "https://randomuser.me/api/portraits/women/68.jpg", feedbackMsg: "💧 Water supply issue needs urgent attention.", feedbackTime: "25 min ago", phone: "+91 98765 43211", voterId: "VTR001235", otpVerified: true, approval: "Approved", risk: "Low", aadhaarMasked: "XXXX-XXXX-5678", address: "456 Oak Ave, Pune" },
        { id: 3, name: "Rohit Shinde", email: "rohit@gmail.com", district: "Kolhapur", constituency: "Kolhapur North", feedback: 8, status: "Verified", avatar: "https://randomuser.me/api/portraits/men/45.jpg", feedbackMsg: "🏥 Public healthcare services improved.", feedbackTime: "1 hour ago", phone: "+91 98765 43212", voterId: "VTR001236", otpVerified: false, approval: "Pending", risk: "Medium", aadhaarMasked: "XXXX-XXXX-9012", address: "789 Elm St, Kolhapur" },
        { id: 4, name: "Meera Patankar", email: "meerap@example.com", district: "Sangli", constituency: "Sangli West", feedback: 22, status: "Top Contributor", avatar: "https://randomuser.me/api/portraits/women/89.jpg", feedbackMsg: "🌾 Farmers welfare scheme execution good.", feedbackTime: "3 hours ago", phone: "+91 98765 43213", voterId: "VTR001237", otpVerified: true, approval: "Approved", risk: "Low", aadhaarMasked: "XXXX-XXXX-3456", address: "321 Pine Rd, Sangli" },
        { id: 5, name: "Suresh More", email: "sureshm@example.com", district: "Satara", constituency: "Satara South", feedback: 5, status: "Registered", avatar: "https://randomuser.me/api/portraits/men/52.jpg", feedbackMsg: "⚡ Electricity supply improved in rural areas.", feedbackTime: "5 hours ago", phone: "+91 98765 43214", voterId: "VTR001238", otpVerified: false, approval: "Rejected", risk: "High", aadhaarMasked: "XXXX-XXXX-7890", address: "654 Cedar Ln, Satara" },
        { id: 6, name: "Kavita Deshmukh", email: "kavitad@example.com", district: "Pune", constituency: "Pune Central", feedback: 18, status: "Active", avatar: "https://randomuser.me/api/portraits/women/44.jpg", feedbackMsg: "🏫 New school building inaugurated.", feedbackTime: "Yesterday", phone: "+91 98765 43215", voterId: "VTR001239", otpVerified: true, approval: "Approved", risk: "Low", aadhaarMasked: "XXXX-XXXX-2345", address: "987 Birch Blvd, Pune" },
        { id: 7, name: "Vikram Gokhale", email: "vikramg@example.com", district: "Kolhapur", constituency: "Kolhapur North", feedback: 3, status: "Registered", avatar: "https://randomuser.me/api/portraits/men/22.jpg", feedbackMsg: "🚧 Road repair pending in ward 4.", feedbackTime: "2 hours ago", phone: "+91 98765 43216", voterId: "VTR001240", otpVerified: false, approval: "Pending", risk: "Medium", aadhaarMasked: "XXXX-XXXX-6789", address: "159 Maple St, Kolhapur" },
        { id: 8, name: "Sneha Joshi", email: "snehaj@example.com", district: "Sangli", constituency: "Sangli West", feedback: 12, status: "Active", avatar: "https://randomuser.me/api/portraits/women/33.jpg", feedbackMsg: "💊 Medicine availability improved at PHC.", feedbackTime: "4 hours ago", phone: "+91 98765 43217", voterId: "VTR001241", otpVerified: true, approval: "Approved", risk: "Low", aadhaarMasked: "XXXX-XXXX-8901", address: "753 Spruce Ave, Sangli" }
    ];

    // =====================================================
    // RENDER FUNCTIONS
    // =====================================================
    
    function renderVoterCards(data) {
        const container = document.getElementById('voterCardsContainer');
        container.innerHTML = data.slice(0, 3).map(voter => `
            <div class="col-md-6 col-lg-4">
                <div class="white_shd margin_bottom_30">
                    <div class="info_people">
                        <div class="p_info_img"><img src="${voter.avatar}" alt="${voter.name}"></div>
                        <div class="user_info_cont">
                            <h4>${voter.name} ${voter.otpVerified ? '<i class="fas fa-check-circle" style="color:#10B981;"></i>' : '<i class="fas fa-clock" style="color:#F59E0B;"></i>'}</h4>
                            <p><i class="fas fa-envelope me-1" style="color: var(--gold);"></i> ${voter.email}</p>
                            <p><span class="badge-otp-verified">${voter.otpVerified ? 'OTP Verified' : 'OTP Pending'}</span> <span class="constituency_badge">${voter.approval}</span></p>
                            <p class="p_status"><i class="fas ${voter.risk === 'High' ? 'fa-exclamation-triangle' : 'fa-shield-alt'} me-1"></i> Risk: ${voter.risk}</p>
                            <div style="margin-top:15px;">
                                ${voter.approval === 'Pending' ? `<button class="action_btn approve_btn" onclick="approveVoter('${voter.id}')"><i class="fa fa-check"></i> Approve</button>
                                <button class="action_btn reject_btn" onclick="rejectVoter('${voter.id}')"><i class="fa fa-times"></i> Reject</button>` : `<button class="action_btn edit_btn" onclick="editVoter('${voter.name}')"><i class="fa fa-pencil"></i> Edit</button>`}
                                <button class="action_btn delete_btn" onclick="deleteVoter('${voter.name}')"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function renderFeedbackList(data) {
        const container = document.getElementById('feedbackListContainer');
        container.innerHTML = `<ul class="feedback_list">${data.slice(0, 5).map(voter => `
            <li><span class="feedback_user"><i class="fas fa-user-circle me-1"></i> ${voter.name}</span>
            <span class="feedback_msg">${voter.feedbackMsg}</span>
            <div class="feedback_time"><i class="far fa-clock me-1"></i> ${voter.feedbackTime} · ${voter.approval}</div></li>
        `).join('')}</ul>`;
    }

    function renderSummaryTable(data) {
        const container = document.getElementById('summaryTable');
        container.innerHTML = data.slice(0, 4).map(voter => `
            <tr><td><i class="fas fa-user me-1"></i> ${voter.name}</td><td><span class="constituency_badge"><i class="fas fa-location-dot me-1"></i> ${voter.constituency}</span></td><td>${voter.approval}</td></tr>
        `).join('');
    }

    function renderVoterTable(data) {
        const container = document.getElementById('voterTableBody');
        container.innerHTML = data.map(voter => `
            <tr>
                <td><strong>${voter.name}</strong></td>
                <td>${voter.email}</td>
                <td>${voter.constituency}</td>
                <td><span class="${voter.otpVerified ? 'badge-otp-verified' : 'badge-otp-pending'}">${voter.otpVerified ? '✅ Verified' : '⏳ Pending'}</span></td>
                <td><span class="constituency_badge">${voter.approval}</span></td>
                <td><span class="${voter.risk === 'High' ? 'badge-fraud' : 'badge-otp-verified'}">${voter.risk}</span></td>
                <td>
                    <button class="btn btn-sm btn-outline-warning rounded-pill" onclick="viewVoter('${voter.name}')"><i class="fas fa-eye"></i> View</button>
                    ${voter.approval === 'Pending' ? `<button class="btn btn-sm btn-success rounded-pill" onclick="approveVoter('${voter.id}')"><i class="fas fa-check"></i></button>` : ''}
                </td>
            </tr>
        `).join('');
    }

    function updateStatistics(data) {
        document.getElementById('totalVotersStat').innerText = data.length;
        document.getElementById('pendingApprovalStat').innerText = data.filter(v => v.approval === 'Pending').length;
        document.getElementById('fraudRiskStat').innerText = data.filter(v => v.risk === 'High' || v.risk === 'Medium').length;
    }

    // =====================================================
    // FILTER FUNCTIONALITY
    // =====================================================
    
    let currentData = [...votersData];

    function filterVoters() {
        const district = document.getElementById('district').value;
        const constituency = document.getElementById('constituency').value;
        const sortOrder = document.getElementById('sortOrder').value;
        const approval = document.getElementById('approvalFilter').value;
        
        let filtered = [...votersData];
        if (district) filtered = filtered.filter(v => v.district === district);
        if (constituency) filtered = filtered.filter(v => v.constituency === constituency);
        if (approval) filtered = filtered.filter(v => v.approval === approval);
        filtered.sort((a, b) => sortOrder === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name));
        
        currentData = filtered;
        renderVoterCards(filtered);
        renderFeedbackList(filtered);
        renderSummaryTable(filtered);
        renderVoterTable(filtered);
        updateStatistics(filtered);
        showToast(`Showing ${filtered.length} voters out of ${votersData.length}`);
    }

    function resetFilters() {
        document.getElementById('district').value = '';
        document.getElementById('constituency').value = '';
        document.getElementById('sortOrder').value = 'asc';
        document.getElementById('approvalFilter').value = '';
        filterVoters();
        showToast('All filters have been reset');
    }

    // =====================================================
    // ACTION FUNCTIONS — Registration Workflow
    // =====================================================
    
    function approveVoter(id) {
        const voter = votersData.find(v => v.id === id);
        if (voter) {
            voter.approval = "Approved";
            voter.otpVerified = true;
            filterVoters();
            showToast(`${voter.name} approved and activated.`);
        }
    }
    function rejectVoter(id) {
        const voter = votersData.find(v => v.id === id);
        if (voter && confirm(`Reject ${voter.name}?`)) {
            voter.approval = "Rejected";
            filterVoters();
            showToast(`${voter.name} rejected.`);
        }
    }
    function editVoter(name) { showToast(`Edit Voter: ${name}`); }
    function deleteVoter(name) { if(confirm(`Delete ${name}?`)) showToast(`${name} deleted`); }
    function viewVoter(name) { showToast(`Viewing details for ${name}`); }
    
    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = `<i class="fas fa-bell me-2"></i> ${message}`;
        toast.style.cssText = 'position:fixed;bottom:20px;right:20px;background:linear-gradient(135deg,#d4af37,#b8960c);color:white;padding:12px 24px;border-radius:50px;font-size:13px;z-index:9999;opacity:0;transform:translateY(20px);transition:all 0.3s ease;';
        document.body.appendChild(toast);
        setTimeout(() => toast.style.cssText += 'opacity:1;transform:translateY(0);', 10);
        setTimeout(() => { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }, 2500);
    }

    // =====================================================
    // INITIALIZE
    // =====================================================
    
    document.addEventListener('DOMContentLoaded', () => {
        renderVoterCards(votersData);
        renderFeedbackList(votersData);
        renderSummaryTable(votersData);
        renderVoterTable(votersData);
        updateStatistics(votersData);
        document.getElementById('applyFiltersBtn').addEventListener('click', filterVoters);
        document.getElementById('resetFiltersBtn').addEventListener('click', resetFilters);
        
        document.querySelectorAll('.stat_card').forEach(card => {
            card.addEventListener('click', () => showToast(`${card.querySelector('.stat_text')?.innerText}: Click to view details`));
        });
    });
</script>

<style>
    .toast-notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: linear-gradient(135deg, #d4af37, #b8960c);
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        font-size: 13px;
        z-index: 9999;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        pointer-events: none;
    }
    .badge-otp-verified { background: #d1fae5; color: #065f46; padding: 4px 12px; border-radius: 40px; font-size: 12px; }
    .badge-otp-pending { background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 40px; font-size: 12px; }
    .badge-fraud { background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 40px; font-size: 12px; }
</style>

</body>

</html>