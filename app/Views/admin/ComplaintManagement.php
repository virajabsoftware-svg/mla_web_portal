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
            cursor: pointer;
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

        .expand_btn {
            background: none;
            border: none;
            color: var(--gold);
            font-size: 18px;
            transition: all var(--transition-fast);
            cursor: pointer;
        }

        .expand_btn:hover {
            transform: scale(1.2);
            color: var(--gold-dark);
        }

        .complaint_sub_row {
            background: rgba(250, 246, 237, 0.6) !important;
        }

        .complaint_sub_row td {
            padding: 10px 20px 10px 50px !important;
            font-size: 13px !important;
            border-bottom: 1px dashed rgba(212, 175, 55, 0.2) !important;
        }

        .complaint_sub_row .sub-complaint-id {
            font-weight: 700;
            color: var(--gold-dark);
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

            .complaint_sub_row td {
                padding-left: 20px !important;
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
    <?= $statistics['total']; ?>
</h2>
                                    <span><i class="fas fa-chart-line me-1"></i> Total Complaints</span>
                                </div>

                                <div class="stat_card">
                                    <h2 id="pendingComplaint">
    <?= $statistics['pending']; ?>
</h2>
                                    <span><i class="fas fa-clock me-1"></i> Pending</span>
                                </div>

                                <div class="stat_card">
                                    <h2 id="resolvedComplaint">
    <?= $statistics['resolved']; ?>
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
                                    placeholder="Search by MLA / Complaint ID / Voter ID">
                            </div>

                            <div class="col-lg-3 col-md-6 mb-3">
                                <label><i class="fas fa-flag me-1" style="color: var(--gold);"></i> Priority</label>
                                <select class="form-select complaint_input" id="priorityFilter">
                                    <option value="all">All</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-3">
                                <label><i class="fas fa-chart-simple me-1" style="color: var(--gold);"></i> Status</label>
                                <select class="form-select complaint_input" id="statusFilter">
                                    <option value="all">All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Escalated">Escalated</option>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-12 mb-3 d-flex align-items-end">
                                <button class="btn complaint_btn w-100" onclick="filterComplaints()">
                                    <i class="fas fa-filter me-2"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ===================================================== -->
                    <!-- MLA TRACKING SECTION -->
                    <!-- ===================================================== -->
                    <div class="mla_tracking_section">
                        <div class="section-title">
                            <i class="fas fa-users me-2"></i> MLA-wise Complaint Tracker
                            <span style="font-size: 14px; font-weight: 400; color: #64748B; margin-left: auto;">
                                <i class="fas fa-info-circle me-1"></i> Click on any MLA to view their complaints
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="mla_table" id="mlaTable">
                                <thead>
                                    <tr>
                                        <th style="width: 22%;">MLA Name</th>
                                        <th style="width: 15%;">Constituency</th>
                                        <th style="width: 9%;">Total</th>
                                        <th style="width: 9%;">Pending</th>
                                        <th style="width: 12%;">In Progress</th>
                                        <th style="width: 9%;">Resolved</th>
                                        <th style="width: 18%;">Performance</th>
                                    
                                    </tr>
                                </thead>
                               <tbody id="mlaTableBody">

<?php if(!empty($mlaComplaints)): ?>

<?php foreach($mlaComplaints as $mla): ?>

<tr>

<td data-label="MLA Name">

<strong style="color:#0F172A;">
<?= $mla['mla']; ?>
</strong>

</td>


<td data-label="Constituency">

<?= $mla['constituency']; ?>

</td>


<td data-label="Total">

<span class="mla_stats_badge"
style="background:rgba(59,130,246,0.12);color:var(--info);">

<?= $mla['total']; ?>

</span>

</td>


<td data-label="Pending">

<span class="mla_stats_badge high">

<?= $mla['pending']; ?>

</span>

</td>


<td data-label="In Progress">

<span class="mla_stats_badge medium">

0

</span>

</td>


<td data-label="Resolved">

<span class="mla_stats_badge low">

<?= $mla['resolved']; ?>

</span>

</td>


<td data-label="Performance">

<?php

$performance = 0;

if($mla['total'] > 0)
{
    $performance =
    round(($mla['resolved']/$mla['total'])*100);
}

?>

<div class="progress" style="width:80px;height:6px;">

<div class="progress-bar"

style="
width:<?= $performance ?>%;
background:var(--success)!important;
border-radius:20px;
">

</div>

</div>


<span>
<?= $performance ?>%
</span>


</td>





</tr>


<?php endforeach; ?>


<?php else: ?>


<tr>

<td colspan="8" style="text-align:center;">

No complaints found

</td>

</tr>


<?php endif; ?>


</tbody>
                            </table>
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
        // COMPLAINT DATA
        // =====================================================
        // const complaintsData = [
        //     {
        //         id: "CMP1001",
        //         title: "Road Damage Issue",
        //         priority: "High",
        //         voterId: "VTR8899",
        //         mla: "MLA Rajesh Patil",
        //         constituency: "Karad North",
        //         department: "Roads Department",
        //         status: "Pending",
        //         escalation: "Level 2",
        //         progress: 60,
        //         description: "Severe road damage near main market causing traffic congestion and accidents.",
        //         createdAt: "2025-05-15",
        //         resolvedDate: null
        //     },
        //     {
        //         id: "CMP1045",
        //         title: "Water Leakage Problem",
        //         priority: "Medium",
        //         voterId: "VTR4521",
        //         mla: "MLA Sunil Shinde",
        //         constituency: "Satara",
        //         department: "Water Supply",
        //         status: "In Progress",
        //         escalation: "Level 1",
        //         progress: 80,
        //         description: "Continuous water leakage from main pipeline wasting significant water.",
        //         createdAt: "2025-05-10",
        //         resolvedDate: null
        //     },
        //     {
        //         id: "CMP1100",
        //         title: "Street Light Failure",
        //         priority: "Low",
        //         voterId: "VTR9921",
        //         mla: "MLA Ashok Pawar",
        //         constituency: "Pune",
        //         department: "Electricity",
        //         status: "Resolved",
        //         escalation: "Level 0",
        //         progress: 100,
        //         description: "Street lights not working for over a week in the colony area.",
        //         createdAt: "2025-05-01",
        //         resolvedDate: "2025-05-20"
        //     },
        //     {
        //         id: "CMP1125",
        //         title: "Garbage Collection Issue",
        //         priority: "High",
        //         voterId: "VTR3344",
        //         mla: "MLA Meena Tai",
        //         constituency: "Mumbai South",
        //         department: "Health",
        //         status: "In Progress",
        //         escalation: "Level 1",
        //         progress: 45,
        //         description: "Irregular garbage collection leading to unhygienic conditions.",
        //         createdAt: "2025-05-18",
        //         resolvedDate: null
        //     },
        //     {
        //         id: "CMP1150",
        //         title: "School Building Repair",
        //         priority: "Medium",
        //         voterId: "VTR7788",
        //         mla: "MLA Anand Rao",
        //         constituency: "Nagpur Central",
        //         department: "Education",
        //         status: "Pending",
        //         escalation: "Level 0",
        //         progress: 20,
        //         description: "School building requires urgent repairs before monsoon.",
        //         createdAt: "2025-05-20",
        //         resolvedDate: null
        //     },
        //     {
        //         id: "CMP1175",
        //         title: "Power Outage Issue",
        //         priority: "High",
        //         voterId: "VTR5566",
        //         mla: "MLA Vijay Kumar",
        //         constituency: "Thane",
        //         department: "Electricity",
        //         status: "Resolved",
        //         escalation: "Level 2",
        //         progress: 100,
        //         description: "Frequent power outages affecting daily life.",
        //         createdAt: "2025-05-05",
        //         resolvedDate: "2025-05-22"
        //     },
        //     {
        //         id: "CMP1180",
        //         title: "Drainage Blockage",
        //         priority: "High",
        //         voterId: "VTR1122",
        //         mla: "MLA Rajesh Patil",
        //         constituency: "Karad North",
        //         department: "Health",
        //         status: "Pending",
        //         escalation: "Level 1",
        //         progress: 30,
        //         description: "Severe drainage blockage causing water logging in residential area.",
        //         createdAt: "2025-05-19",
        //         resolvedDate: null
        //     },
        //     {
        //         id: "CMP1190",
        //         title: "Electricity Meter Issue",
        //         priority: "Low",
        //         voterId: "VTR3345",
        //         mla: "MLA Sunil Shinde",
        //         constituency: "Satara",
        //         department: "Electricity",
        //         status: "Resolved",
        //         escalation: "Level 0",
        //         progress: 100,
        //         description: "Faulty electricity meter showing incorrect readings.",
        //         createdAt: "2025-05-12",
        //         resolvedDate: "2025-05-25"
        //     },
        //     {
        //         id: "CMP1200",
        //         title: "Road Safety Measures",
        //         priority: "Medium",
        //         voterId: "VTR9988",
        //         mla: "MLA Meena Tai",
        //         constituency: "Mumbai South",
        //         department: "Roads Department",
        //         status: "In Progress",
        //         escalation: "Level 1",
        //         progress: 55,
        //         description: "Need speed bumps and warning signs on accident-prone road.",
        //         createdAt: "2025-05-21",
        //         resolvedDate: null
        //     }
        // ];

        // =====================================================
        // COUNTER ANIMATION
        // =====================================================
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

        // =====================================================
        // UPDATE STATISTICS
        // =====================================================
        function updateStats() {
            const total = complaintsData.length;
            const pending = complaintsData.filter(c => c.status === "Pending" || c.status === "In Progress").length;
            const resolved = complaintsData.filter(c => c.status === "Resolved").length;

            animateCounter("totalComplaint", total);
            animateCounter("pendingComplaint", pending);
            animateCounter("resolvedComplaint", resolved);
        }

        // =====================================================
        // RENDER MLA TRACKING TABLE
        // =====================================================
        function renderMLATracking(complaints) {
            const tbody = document.getElementById('mlaTableBody');
            const dataToUse = complaints || complaintsData;
            
            // Group complaints by MLA
            const mlaMap = new Map();
            
            dataToUse.forEach(complaint => {
                if (!mlaMap.has(complaint.mla)) {
                    mlaMap.set(complaint.mla, {
                        mla: complaint.mla,
                        constituency: complaint.constituency,
                        complaints: [],
                        total: 0,
                        pending: 0,
                        inProgress: 0,
                        resolved: 0,
                        highPriority: 0,
                        mediumPriority: 0,
                        lowPriority: 0
                    });
                }
                
                const mlaData = mlaMap.get(complaint.mla);
                mlaData.complaints.push(complaint);
                mlaData.total++;
                
                if (complaint.status === "Pending") mlaData.pending++;
                else if (complaint.status === "In Progress") mlaData.inProgress++;
                else if (complaint.status === "Resolved") mlaData.resolved++;
                
                if (complaint.priority === "High") mlaData.highPriority++;
                else if (complaint.priority === "Medium") mlaData.mediumPriority++;
                else if (complaint.priority === "Low") mlaData.lowPriority++;
            });

            if (mlaMap.size === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 40px; color: #64748B;">
                            <i class="fas fa-inbox" style="font-size: 36px; display: block; margin-bottom: 15px;"></i>
                            No complaints found matching your filters
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            let index = 0;
            
            mlaMap.forEach((mlaData) => {
                const performance = mlaData.total > 0 
                    ? Math.round((mlaData.resolved / mlaData.total) * 100) 
                    : 0;
                
                let performanceColor = '';
                if (performance >= 80) performanceColor = 'success';
                else if (performance >= 50) performanceColor = 'warning';
                else performanceColor = 'danger';
                
                const rowId = `mla-row-${index}`;
                const subRowId = `mla-sub-${index}`;
                
                html += `
                    <tr id="${rowId}" onclick="toggleMLARow('${rowId}', '${subRowId}')" style="cursor: pointer;">
                        <td data-label="MLA Name">
                            <strong style="color: #0F172A;">${mlaData.mla}</strong>
                        </td>
                        <td data-label="Constituency">${mlaData.constituency}</td>
                        <td data-label="Total">
                            <span class="mla_stats_badge" style="background: rgba(59, 130, 246, 0.12); color: var(--info);">
                                ${mlaData.total}
                            </span>
                        </td>
                        <td data-label="Pending">
                            <span class="mla_stats_badge high">${mlaData.pending}</span>
                        </td>
                        <td data-label="In Progress">
                            <span class="mla_stats_badge medium">${mlaData.inProgress}</span>
                        </td>
                        <td data-label="Resolved">
                            <span class="mla_stats_badge low">${mlaData.resolved}</span>
                        </td>
                        <td data-label="Performance">
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress" style="width: 80px; height: 6px;">
                                    <div class="progress-bar bg-${performanceColor}" 
                                         style="width: ${performance}%; border-radius: 20px; 
                                                background: ${performance >= 80 ? 'var(--success)' : performance >= 50 ? 'var(--warning)' : 'var(--danger)'} !important;">
                                    </div>
                                </div>
                                <span style="font-size: 12px; font-weight: 700; color: #1E293B;">${performance}%</span>
                            </div>
                        </td>
                        <td data-label="Expand">
                            <button class="expand_btn" onclick="event.stopPropagation(); toggleMLARow('${rowId}', '${subRowId}')">
                                <i class="fas fa-chevron-down" id="${rowId}-icon"></i>
                            </button>
                        </td>
                    </tr>
                    <tr id="${subRowId}" style="display: none;" class="complaint_sub_row">
                        <td colspan="7">
                            <div style="padding: 5px 0;">
                                <strong style="color: var(--gold-dark); font-size: 14px;">
                                    <i class="fas fa-list me-2"></i>Complaints for ${mlaData.mla} (${mlaData.total} complaints)
                                </strong>
                                <div style="margin-top: 12px; display: flex; flex-direction: column; gap: 6px;">
                                    ${mlaData.complaints.map(c => `
                                        <div style="display: flex; justify-content: space-between; align-items: center; 
                                             padding: 6px 12px; background: rgba(255,255,255,0.7); border-radius: 8px;
                                             border-left: 3px solid ${c.priority === 'High' ? 'var(--danger)' : c.priority === 'Medium' ? 'var(--warning)' : 'var(--success)'};">
                                            <div>
                                                <span class="sub-complaint-id">${c.id}</span>
                                                <span style="color: #475569; margin-left: 10px;">${c.title}</span>
                                                <span style="color: #94A3B8; font-size: 11px; margin-left: 10px;">${c.voterId}</span>
                                            </div>
                                            <div>
                                                <span class="status ${c.status === 'Pending' ? 'pending' : c.status === 'In Progress' ? 'progress_status' : 'resolved'}" 
                                                      style="padding: 3px 10px; border-radius: 50px; font-size: 10px; font-weight: 700;">
                                                    ${c.status}
                                                </span>
                                                <span class="priority_badge ${c.priority === 'High' ? 'high_priority' : c.priority === 'Medium' ? 'medium_priority' : 'low_priority'}" 
                                                      style="padding: 2px 10px; font-size: 10px; margin-left: 8px; border-radius: 50px;">
                                                    ${c.priority}
                                                </span>
                                            </div>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
                index++;
            });
            
            tbody.innerHTML = html;
        }

        // =====================================================
        // TOGGLE MLA ROW EXPAND
        // =====================================================
        function toggleMLARow(rowId, subRowId) {
            const subRow = document.getElementById(subRowId);
            const icon = document.getElementById(`${rowId}-icon`);
            
            if (subRow.style.display === 'none') {
                subRow.style.display = 'table-row';
                icon.className = 'fas fa-chevron-up';
                document.getElementById(rowId).classList.add('active-row');
            } else {
                subRow.style.display = 'none';
                icon.className = 'fas fa-chevron-down';
                document.getElementById(rowId).classList.remove('active-row');
            }
        }

        // =====================================================
        // FILTER COMPLAINTS
        // =====================================================
       function filterComplaints() {

    const searchTerm = document.getElementById("searchInput").value.toLowerCase();
    const status = document.getElementById("statusFilter").value;

    const rows = document.querySelectorAll("#mlaTableBody tr");

    rows.forEach(row => {

        // Skip complaint sub rows
        if(row.classList.contains("complaint_sub_row")){
            return;
        }

        const mlaName = row.cells[0]?.innerText.toLowerCase() || "";
        const constituency = row.cells[1]?.innerText.toLowerCase() || "";
        const pending = row.cells[3]?.innerText || "";
        const resolved = row.cells[5]?.innerText || "";

        let show = true;


        // Search MLA / Constituency
        if(searchTerm){

            if(
                !mlaName.includes(searchTerm) &&
                !constituency.includes(searchTerm)
            ){
                show = false;
            }

        }


        // Status filter
        if(status !== "all"){

            if(status === "Pending" && pending == "0"){
                show = false;
            }

            if(status === "Resolved" && resolved == "0"){
                show = false;
            }

        }


        if(show){
            row.style.display = "";
        }
        else{
            row.style.display = "none";
        }


    });

}
        // =====================================================
        // SEARCH INPUT - LIVE SEARCH
        // =====================================================
      document.getElementById('searchInput')
.addEventListener('keyup', function(){
    filterComplaints();
});
        // =====================================================
        // FILTER CHANGES - AUTO FILTER
        // =====================================================
        document.getElementById('priorityFilter').addEventListener('change', filterComplaints);
        document.getElementById('statusFilter').addEventListener('change', filterComplaints);

        // =====================================================
        // INITIALIZATION
        // =====================================================
       $(document).ready(function() {

    updateStats();

});
    </script>
    <script src="header.js"></script>
</body>

</html>