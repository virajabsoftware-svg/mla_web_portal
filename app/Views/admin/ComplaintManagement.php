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
            0%, 100% {
                transform: translateY(0px) scale(1);
            }
            50% {
                transform: translateY(20px) scale(1.05);
            }
        }

        @keyframes floatGlowDelayed {
            0%, 100% {
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
            0%, 100% {
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
        /* MLA TRACKING TABLE - Premium Design */
        /* ===================================================== */

        .mla_tracking_section {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-xl);
            padding: 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-base);
        }

        .mla_tracking_section:hover {
            box-shadow: var(--shadow-gold);
        }

        .mla_tracking_section .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mla_tracking_section .section-title i {
            color: var(--gold);
        }

        .mla_table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        .mla_table thead th {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            color: white;
            padding: 15px 20px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .mla_table thead th:first-child {
            border-radius: 12px 0 0 12px;
        }

        .mla_table thead th:last-child {
            border-radius: 0 12px 12px 0;
        }

        .mla_table tbody tr {
            background: rgba(255, 255, 255, 0.8);
            transition: all var(--transition-base);
        }

        .mla_table tbody tr:hover {
            transform: scale(1.01);
            box-shadow: var(--shadow-gold);
            background: white;
        }

        .mla_table tbody td {
            padding: 15px 20px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-left: none;
            border-right: none;
            font-size: 14px;
            color: #1E293B;
        }

        .mla_table tbody td:first-child {
            border-left: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 12px 0 0 12px;
        }

        .mla_table tbody td:last-child {
            border-right: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 0 12px 12px 0;
        }

        .mla_table tbody tr.active-row {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
            border-color: var(--gold);
        }

        .mla_stats_badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
        }

        .mla_stats_badge.high {
            background: rgba(239, 68, 68, 0.12);
            color: var(--danger);
        }

        .mla_stats_badge.medium {
            background: rgba(245, 158, 11, 0.12);
            color: var(--warning);
        }

        .mla_stats_badge.low {
            background: rgba(16, 185, 129, 0.12);
            color: var(--success);
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
            .mla_table {
                font-size: 12px;
            }
            .mla_table thead th,
            .mla_table tbody td {
                padding: 10px 12px;
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
            .mla_tracking_section {
                padding: 15px;
            }
            .mla_table thead {
                display: none;
            }
            .mla_table tbody tr {
                display: block;
                margin-bottom: 15px;
                border-radius: var(--radius-md);
                padding: 15px;
                background: white;
                box-shadow: var(--shadow-sm);
            }
            .mla_table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 12px !important;
                border: none !important;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
                border-radius: 0 !important;
            }
            .mla_table tbody td:last-child {
                border-bottom: none;
            }
            .mla_table tbody td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #64748B;
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

        /* Hidden rows for filtering */
        .mla-row-hidden {
            display: none !important;
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
                       <i class="fas fa-comment-dots me-2"></i> MLA Complaint Monitoring System
                   </h1>

                   <p>
                       Track and monitor complaints assigned to each MLA. View performance metrics and complaint details.
                   </p>
               </div>

               <div class="header_stats">
                   <div class="stat_card pulse-stat">
                       <h2 id="totalComplaint">
                           <?= (int) ($statistics['total'] ?? 0); ?>
                       </h2>
                       <span><i class="fas fa-chart-line me-1"></i> Total Complaints</span>
                   </div>

                   <div class="stat_card">
                       <h2 id="pendingComplaint">
                           <?= (int) ($statistics['pending'] ?? 0); ?>
                       </h2>
                       <span><i class="fas fa-clock me-1"></i> Pending</span>
                   </div>

                   <div class="stat_card">
                       <h2 id="resolvedComplaint">
                           <?= (int) ($statistics['resolved'] ?? 0); ?>
                       </h2>
                       <span><i class="fas fa-check-circle me-1"></i> Resolved</span>
                   </div>
               </div>
           </div>
       </div>

       <!-- FILTER SECTION -->
       <div class="complaint_filter_box mt-4">
           <div class="row">
               <div class="col-lg-4 col-md-6 mb-3">
                   <label><i class="fas fa-search me-1" style="color: var(--gold);"></i> Search</label>
                   <input type="text" class="form-control complaint_input" id="searchInput"
                       placeholder="Search by MLA Name or Constituency">
               </div>

               <div class="col-lg-3 col-md-6 mb-3">
                   <label><i class="fas fa-chart-simple me-1" style="color: var(--gold);"></i> Status Filter</label>
                   <select class="form-select complaint_input" id="statusFilter">
                       <option value="all">All MLAs</option>
                       <option value="pending">Has Pending Complaints</option>
                       <option value="resolved">Has Resolved Complaints</option>
                       <option value="no_complaints">No Complaints</option>
                   </select>
               </div>

               <div class="col-lg-2 col-md-12 mb-3 d-flex align-items-end">
                   <button class="btn complaint_btn w-100" onclick="filterTable()">
                       <i class="fas fa-filter me-2"></i> Filter
                   </button>
               </div>

               <div class="col-lg-3 col-md-12 mb-3 d-flex align-items-end justify-content-md-end">
                   <button class="btn complaint_btn w-100" onclick="resetFilters()" style="background: linear-gradient(135deg, #64748B, #475569);">
                       <i class="fas fa-undo me-2"></i> Reset
                   </button>
               </div>
           </div>
       </div>

       <!-- ===================================================== -->
       <!-- MLA TRACKING SECTION -->
       <!-- ===================================================== -->
       <div class="mla_tracking_section">

           <div class="section-title">
               <i class="fas fa-users me-2"></i>
               MLA-wise Complaint Tracker

               <span style="
                   font-size:14px;
                   font-weight:400;
                   color:#64748B;
                   margin-left:auto;
               ">
                   <i class="fas fa-info-circle me-1"></i>
                   Complaint Summary
               </span>
           </div>

           <div class="table-responsive">

               <table class="mla_table" id="mlaTable">
                   <thead>
                       <tr>
                           <th style="width:30%;">MLA Name</th>
                           <th style="width:25%;">Constituency</th>
                           <th style="width:15%;">Total</th>
                           <th style="width:15%;">Pending</th>
                           <th style="width:15%;">Resolved</th>
                       </tr>
                   </thead>

                   <tbody id="mlaTableBody">
                       <?php if (!empty($mlaComplaints)): ?>
                           <?php foreach ($mlaComplaints as $mla): ?>
                               <tr data-mla-name="<?= esc(strtolower($mla['mla_name'] ?? '')); ?>"
                                   data-constituency="<?= esc(strtolower($mla['constituency_name'] ?? '')); ?>"
                                   data-total="<?= (int) ($mla['total'] ?? 0); ?>"
                                   data-pending="<?= (int) ($mla['pending'] ?? 0); ?>"
                                   data-resolved="<?= (int) ($mla['resolved'] ?? 0); ?>">
                                   <!-- MLA NAME -->
                                   <td data-label="MLA Name">
                                       <strong style="color:#0F172A;">
                                           <?= esc($mla['mla_name'] ?? 'N/A'); ?>
                                       </strong>
                                   </td>

                                   <!-- CONSTITUENCY -->
                                   <td data-label="Constituency">
                                       <?= esc($mla['constituency_name'] ?? 'N/A'); ?>
                                   </td>

                                   <!-- TOTAL -->
                                   <td data-label="Total">
                                       <span class="mla_stats_badge" style="background:rgba(59,130,246,0.12); color:#2563EB;">
                                           <?= (int) ($mla['total'] ?? 0); ?>
                                       </span>
                                   </td>

                                   <!-- PENDING -->
                                   <td data-label="Pending">
                                       <span class="mla_stats_badge high">
                                           <?= (int) ($mla['pending'] ?? 0); ?>
                                       </span>
                                   </td>

                                   <!-- RESOLVED -->
                                   <td data-label="Resolved">
                                       <span class="mla_stats_badge low">
                                           <?= (int) ($mla['resolved'] ?? 0); ?>
                                       </span>
                                   </td>
                               </tr>
                           <?php endforeach; ?>
                       <?php else: ?>
                           <tr>
                               <td colspan="5" style="text-align:center; padding:40px; color:#64748B;">
                                   <i class="fas fa-inbox" style="font-size:36px; display:block; margin-bottom:15px;"></i>
                                   No MLA data found.
                               </td>
                           </tr>
                       <?php endif; ?>
                   </tbody>
               </table>

           </div>

           <!-- Results count -->
           <div class="mt-3 text-muted" style="font-size:14px;">
               Showing <span id="visibleCount">0</span> MLAs
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
       // COUNTER ANIMATION
       // =====================================================
       function animateCounter(elementId, targetValue) {
           const element = document.getElementById(elementId);
           if (!element) return;
           
           // Get the numeric value from the element
           const currentText = element.textContent || '0';
           let current = parseInt(currentText.replace(/,/g, '')) || 0;
           
           if (current === targetValue) return;
           
           const increment = (targetValue - current) / 40;
           const timer = setInterval(() => {
               current += increment;
               if (Math.abs(current - targetValue) < 0.5) {
                   element.textContent = targetValue;
                   clearInterval(timer);
               } else {
                   element.textContent = Math.round(current);
               }
           }, 20);
       }

       // =====================================================
       // FILTER TABLE
       // =====================================================
       function filterTable() {
           const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
           const statusFilter = document.getElementById('statusFilter').value;
           
           const rows = document.querySelectorAll('#mlaTableBody tr');
           let visibleCount = 0;
           
           rows.forEach(row => {
               // Skip the "no data" row
               if (row.querySelector('td[colspan]')) {
                   return;
               }
               
               const mlaName = row.dataset.mlaName || '';
               const constituency = row.dataset.constituency || '';
               const total = parseInt(row.dataset.total) || 0;
               const pending = parseInt(row.dataset.pending) || 0;
               const resolved = parseInt(row.dataset.resolved) || 0;
               
               let show = true;
               
               // Search filter
               if (searchTerm) {
                   if (!mlaName.includes(searchTerm) && !constituency.includes(searchTerm)) {
                       show = false;
                   }
               }
               
               // Status filter
               if (show && statusFilter !== 'all') {
                   if (statusFilter === 'pending' && pending === 0) {
                       show = false;
                   } else if (statusFilter === 'resolved' && resolved === 0) {
                       show = false;
                   } else if (statusFilter === 'no_complaints' && total > 0) {
                       show = false;
                   }
               }
               
               if (show) {
                   row.style.display = '';
                   visibleCount++;
               } else {
                   row.style.display = 'none';
               }
           });
           
           document.getElementById('visibleCount').textContent = visibleCount;
       }

       // =====================================================
       // RESET FILTERS
       // =====================================================
       function resetFilters() {
           document.getElementById('searchInput').value = '';
           document.getElementById('statusFilter').value = 'all';
           filterTable();
       }

       // =====================================================
       // LIVE SEARCH
       // =====================================================
       document.getElementById('searchInput').addEventListener('keyup', filterTable);
       document.getElementById('statusFilter').addEventListener('change', filterTable);

       // =====================================================
       // INITIALIZATION
       // =====================================================
       document.addEventListener('DOMContentLoaded', function() {
           // Animate counters
           animateCounter('totalComplaint', <?= (int) ($statistics['total'] ?? 0); ?>);
           animateCounter('pendingComplaint', <?= (int) ($statistics['pending'] ?? 0); ?>);
           animateCounter('resolvedComplaint', <?= (int) ($statistics['resolved'] ?? 0); ?>);
           
           // Show initial count
           filterTable();
       });
   </script>
   <script src="header.js"></script>
</body>

</html>