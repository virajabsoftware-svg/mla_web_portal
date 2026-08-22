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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
    <!-- GOOGLE FONTS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

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
        /* PREMIUM MEDIA DASHBOARD - White + Beige + Gold Theme
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

        .media_dashboard {
            padding: 30px;
        }

        /* ===================================================== */
        /* MEDIA CARDS - Premium Glassmorphism + All Effects */
        /* ===================================================== */

        .media_card {
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
        .media_card::before {
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
        .media_card::after {
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
        .media_card:hover {
            transform: translateY(-8px) rotateX(2deg);
            box-shadow: var(--shadow-gold);
        }

        .media_card:hover::before {
            opacity: 1;
            animation: borderPulse 1.5s infinite;
        }

        .media_card:hover::after {
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

        .media_card h6 {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: 0.9;
            margin-bottom: 12px;
        }

        .media_card h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 0;
            font-family: 'Space Grotesk', monospace;
        }

        /* Card Variants */
        .total {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-left: 4px solid var(--gold-light);
        }

        .images {
            background: linear-gradient(135deg, #10B981, #059669);
            border-left: 4px solid var(--gold);
        }

        .videos {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border-left: 4px solid var(--gold);
        }

        .docs {
            background: linear-gradient(135deg, #3B82F6, #2563EB);
            border-left: 4px solid var(--gold);
        }

        .uploads {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            border-left: 4px solid var(--gold);
        }

        .storage {
            background: linear-gradient(135deg, #8B5CF6, #7C3AED);
            border-left: 4px solid var(--gold);
        }

        /* Pulse Effect for Important Cards */
        .media_card.pulse-card {
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

        /* Floating Animation */
        .media_card.floating {
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
        /* BOX CARDS - Glassmorphism */
        /* ===================================================== */

        .box {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(12px);
            padding: 25px;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            margin-bottom: 0;
            transition: all var(--transition-base);
            border: 1px solid rgba(255, 255, 255, 0.6);
            height: 100%;
        }

        .box:hover {
            box-shadow: var(--shadow-gold);
            border-color: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        .box h5 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            font-size: 18px;
        }

        .box h5::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 3px;
        }

        /* Danger Box */
        .danger_box {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .danger_box::after {
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

        .danger_box:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold);
        }

        .danger_box:hover::after {
            opacity: 1;
            transform: rotate(25deg) translateX(50%);
        }

        .danger_box h5 {
            color: white;
        }

        .danger_box h5::after {
            background: linear-gradient(90deg, white, rgba(255, 255, 255, 0.5));
        }

        /* Progress Bar */
        .progress {
            height: 10px;
            border-radius: 20px;
            background: var(--beige-dark);
            overflow: hidden;
            margin-top: 15px;
        }

        .progress-bar {
            border-radius: 20px;
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
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

        /* Timeline */
        .timeline {
            max-height: 300px;
            overflow-y: auto;
            padding-right: 8px;
        }

        .timeline p {
            border-left: 3px solid var(--gold);
            padding-left: 15px;
            margin-bottom: 12px;
            transition: all var(--transition-fast);
            position: relative;
        }

        .timeline p:hover {
            border-left-color: var(--gold-dark);
            transform: translateX(6px);
            padding-left: 20px;
        }

        .timeline p::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 50%;
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            background: var(--gold);
            border-radius: 50%;
            border: 2px solid var(--pure-white);
            transition: all 0.2s ease;
        }

        .timeline p:hover::before {
            background: var(--gold-dark);
            transform: translateY(-50%) scale(1.2);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.2);
        }

        /* Table Styles */
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
        }

        .table td {
            padding: 12px;
            border: none;
            vertical-align: middle;
            font-size: 13px;
        }

        /* List Styles */
        .box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .box ul li {
            padding: 10px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            transition: all var(--transition-fast);
        }

        .box ul li:hover {
            transform: translateX(6px);
            color: var(--gold-dark);
        }

        .box ul li:last-child {
            border-bottom: none;
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

        /* Canvas Containers */
        canvas {
            max-height: 250px;
            width: 100%;
        }

        /* Fade In Animation */
        .media_card,
        .box {
            animation: fadeInUp 0.5s ease backwards;
        }

        .media_card:nth-child(1) {
            animation-delay: 0.02s;
        }

        .media_card:nth-child(2) {
            animation-delay: 0.04s;
        }

        .media_card:nth-child(3) {
            animation-delay: 0.06s;
        }

        .media_card:nth-child(4) {
            animation-delay: 0.08s;
        }

        .media_card:nth-child(5) {
            animation-delay: 0.1s;
        }

        .media_card:nth-child(6) {
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

        /* Responsive */
        @media (max-width: 768px) {
            .media_dashboard {
                padding: 15px;
            }

            .media_card h2 {
                font-size: 24px;
            }

            .media_card h6 {
                font-size: 11px;
            }

            .box {
                padding: 18px;
                margin-bottom: 15px;
            }

            .box h5 {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .media_dashboard {
                padding: 10px;
            }

            .media_card {
                padding: 18px 15px;
            }

            .media_card h2 {
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
                <div class="container-fluid media_dashboard">

                    <!-- ================= KPI CARDS ================= -->
                    <div class="row g-4">
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="media_card total pulse-card">
                                <h6><i class="fa-solid fa-database me-1"></i> Total Files</h6>
                                <h2 id="totalFiles">25,480</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="media_card images">
                                <h6><i class="fa-solid fa-image me-1"></i> Images</h6>
                                <h2 id="imagesCount">15,250</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="media_card videos">
                                <h6><i class="fa-solid fa-video me-1"></i> Videos</h6>
                                <h2 id="videosCount">3,420</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="media_card docs">
                                <h6><i class="fa-solid fa-file-alt me-1"></i> Documents</h6>
                                <h2 id="docsCount">6,810</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="media_card uploads">
                                <h6><i class="fa-solid fa-cloud-upload-alt me-1"></i> Today's Uploads</h6>
                                <h2 id="todayUploads">245</h2>
                            </div>
                        </div>

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="media_card storage">
                                <h6><i class="fa-solid fa-hdd me-1"></i> Storage Used</h6>
                                <h2 id="storageUsed">128 GB</h2>
                            </div>
                        </div>
                    </div>

                    <!-- ================= CHARTS ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="box">
                                <h5><i class="fa-solid fa-chart-line me-2" style="color: var(--gold);"></i> Upload Trend
                                </h5>
                                <canvas id="uploadTrend"></canvas>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="box">
                                <h5><i class="fa-solid fa-chart-pie me-2" style="color: var(--gold);"></i> File Type
                                    Distribution</h5>
                                <canvas id="fileType"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================= STORAGE ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <div class="box">
                                <h5><i class="fa-solid fa-chart-simple me-2" style="color: var(--gold);"></i> Storage
                                    Usage</h5>
                                <p><strong>Total:</strong> <span id="totalStorage">500 GB</span></p>
                                <p><strong>Used:</strong> <span id="usedStorage">128 GB</span> (<span
                                        id="usedPercent">25.6</span>%)</p>
                                <p><strong>Available:</strong> <span id="availableStorage">372 GB</span></p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" id="storageProgressBar" style="width: 25.6%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="box">
                                <h5><i class="fa-solid fa-chart-column me-2" style="color: var(--gold);"></i>
                                    Module-wise Media Usage</h5>
                                <canvas id="moduleChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- ================= RECENT UPLOADS ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="box">
                                <h5><i class="fa-solid fa-clock me-2" style="color: var(--gold);"></i> Recent Uploads
                                </h5>
                                <div class="timeline" id="recentUploads">
                                    <p>10:30 AM - Project_Report.pdf</p>
                                    <p>10:15 AM - MLA_Profile.jpg</p>
                                    <p>09:50 AM - Survey_Data.xlsx</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="box">
                                <h5><i class="fa-solid fa-trophy me-2" style="color: var(--gold);"></i> Top Uploaders
                                </h5>
                                <table class="table" id="topUploadersTable">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Files</th>
                                            <th><i class="fa-solid fa-chart-line"></i> Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Admin</td>
                                            <td>520</td>
                                            <td><span style="color: #10B981;">↑ +12%</span></td>
                                        </tr>
                                        <tr>
                                            <td>Rahul</td>
                                            <td>410</td>
                                            <td><span style="color: #10B981;">↑ +8%</span></td>
                                        </tr>
                                        <tr>
                                            <td>Amit</td>
                                            <td>355</td>
                                            <td><span style="color: #F59E0B;">→ +2%</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ================= SECURITY ================= -->
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <div class="box danger_box">
                                <h5><i class="fa-solid fa-shield-alt me-2"></i> Security Alerts</h5>
                                <p><i class="fa-solid fa-ban me-2"></i> Unauthorized Access: <strong
                                        id="unauthorizedAccess">5</strong></p>
                                <p><i class="fa-solid fa-download me-2"></i> Blocked Downloads: <strong
                                        id="blockedDownloads">2</strong></p>
                                <p><i class="fa-solid fa-lock me-2"></i> Private Files: <strong
                                        id="privateFiles">1,250</strong></p>
                                <p><i class="fa-solid fa-globe me-2"></i> Public Files: <strong
                                        id="publicFiles">24,230</strong></p>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="box">
                                <h5><i class="fa-solid fa-file-zipper me-2" style="color: var(--gold);"></i> Largest
                                    Files</h5>
                                <ul id="largestFiles">
                                    <li><i class="fa-solid fa-video me-2" style="color: #EF4444;"></i>
                                        Campaign_Video.mp4 - 450 MB</li>
                                    <li><i class="fa-solid fa-video me-2" style="color: #EF4444;"></i>
                                        Meeting_Record.mp4 - 380 MB</li>
                                    <li><i class="fa-solid fa-file-pdf me-2" style="color: #EF4444;"></i>
                                        Project_Document.pdf - 120 MB</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- ================= TABLE ================= -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="box">
                                <h5><i class="fa-solid fa-table me-2" style="color: var(--gold);"></i> Media Library
                                </h5>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="mediaLibrary">
                                        <thead>
                                            <tr>
                                                <th><i class="fa-regular fa-file"></i> File</th>
                                                <th><i class="fa-solid fa-tag"></i> Type</th>
                                                <th><i class="fa-solid fa-cube"></i> Module</th>
                                                <th><i class="fa-solid fa-hard-drive"></i> Size</th>
                                                <th><i class="fa-solid fa-user"></i> Uploaded By</th>
                                                <th><i class="fa-regular fa-calendar"></i> Date</th>
                                                <th><i class="fa-solid fa-chart-line"></i> Downloads</th>
                                            </tr>
                                        </thead>
                                        <tbody id="mediaLibraryBody">
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

    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Chart.js initialization
        let uploadTrendChart, fileTypeChart, moduleChart;

        // Counter Animation Function
        function animateCounter(elementId, targetValue, suffix = "") {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const numericValue = typeof targetValue === 'string' ? parseInt(targetValue) : targetValue;
            const increment = numericValue / 50;
            const hasSuffix = suffix || (elementId === "storageUsed" ? " GB" : "");

            const timer = setInterval(() => {
                current += increment;
                if (current >= numericValue) {
                    element.textContent = numericValue + hasSuffix;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + hasSuffix;
                }
            }, 20);
        }

        // Initialize all counters
        function initCounters() {
            animateCounter("totalFiles", 25480);
            animateCounter("imagesCount", 15250);
            animateCounter("videosCount", 3420);
            animateCounter("docsCount", 6810);
            animateCounter("todayUploads", 245);
            animateCounter("storageUsed", 128, " GB");
        }

        // Initialize Charts
        function initCharts() {
            // Upload Trend Chart (Line)
            const uploadCtx = document.getElementById('uploadTrend').getContext('2d');
            uploadTrendChart = new Chart(uploadCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Uploads',
                        data: [120, 145, 180, 210, 245, 230, 198],
                        borderColor: '#d4af37',
                        backgroundColor: 'rgba(212, 175, 55, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#b8960c',
                        pointBorderColor: '#ffffff',
                        pointRadius: 5,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'top', labels: { font: { family: 'Inter', size: 12 } } }
                    }
                }
            });

            // File Type Distribution Chart (Doughnut)
            const fileCtx = document.getElementById('fileType').getContext('2d');
            fileTypeChart = new Chart(fileCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Images', 'Videos', 'Documents'],
                    datasets: [{
                        data: [15250, 3420, 6810],
                        backgroundColor: ['#10B981', '#EF4444', '#3B82F6'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { family: 'Inter', size: 12 } } }
                    }
                }
            });

            // Module-wise Media Usage Chart (Bar)
            const moduleCtx = document.getElementById('moduleChart').getContext('2d');
            moduleChart = new Chart(moduleCtx, {
                type: 'bar',
                data: {
                    labels: ['MLA Profile', 'Survey', 'Complaint', 'Feedback', 'Reports'],
                    datasets: [{
                        label: 'Media Files',
                        data: [4250, 3180, 2560, 1890, 1450],
                        backgroundColor: 'linear-gradient(135deg, #d4af37, #b8960c)',
                        borderRadius: 8,
                        backgroundColor: '#d4af37'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'top', labels: { font: { family: 'Inter', size: 12 } } }
                    }
                }
            });
        }

        // Populate Media Library
        function populateMediaLibrary() {
            const mediaItems = [
                { file: "MLA_Profile.jpg", type: "Image", module: "MLA", size: "2 MB", uploadedBy: "Admin", date: "Today", downloads: 245 },
                { file: "Survey_Report.pdf", type: "Document", module: "Survey", size: "1.5 MB", uploadedBy: "Rahul", date: "Yesterday", downloads: 128 },
                { file: "Campaign_Video.mp4", type: "Video", module: "Campaign", size: "450 MB", uploadedBy: "Admin", date: "2 days ago", downloads: 532 },
                { file: "Water_Complaint.docx", type: "Document", module: "Complaint", size: "0.8 MB", uploadedBy: "Amit", date: "2 days ago", downloads: 67 },
                { file: "Feedback_Data.xlsx", type: "Document", module: "Feedback", size: "3.2 MB", uploadedBy: "Sneha", date: "3 days ago", downloads: 89 },
                { file: "Road_Development.jpg", type: "Image", module: "Development", size: "4.1 MB", uploadedBy: "Admin", date: "3 days ago", downloads: 156 },
                { file: "Meeting_Record.mp4", type: "Video", module: "Meeting", size: "380 MB", uploadedBy: "Rahul", date: "4 days ago", downloads: 234 }
            ];

            const tbody = document.getElementById("mediaLibraryBody");
            if (!tbody) return;

            tbody.innerHTML = mediaItems.map(item => `
            <tr>
                <td><i class="fa-regular ${item.type === 'Image' ? 'fa-image' : (item.type === 'Video' ? 'fa-video' : 'fa-file-alt')} me-2" style="color: var(--gold);"></i> ${item.file}</td>
                <td>${item.type}</td>
                <td>${item.module}</td>
                <td>${item.size}</td>
                <td><i class="fa-solid fa-user me-1"></i> ${item.uploadedBy}</td>
                <td><i class="fa-regular fa-calendar me-1"></i> ${item.date}</td>
                <td><i class="fa-solid fa-download me-1"></i> ${item.downloads}</td>
            </tr>
        `).join('');
        }

        // Update Storage Bar Animation
        function animateStorageBar() {
            const usedPercent = 25.6;
            const bar = document.getElementById('storageProgressBar');
            if (bar) {
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = usedPercent + '%';
                }, 300);
            }
        }

        // Page Load Animation
        function animateAll() {
            // Animate progress bars
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const targetWidth = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = targetWidth;
                }, 200);
            });
        }

        // Update stats with counter animations
        function updateAllStats() {
            initCounters();
            animateStorageBar();
        }

        // Initialize everything on page load
        document.addEventListener("DOMContentLoaded", function () {
            initCharts();
            populateMediaLibrary();
            updateAllStats();
            animateAll();

            // Add hover effect for cards
            const cards = document.querySelectorAll('.media_card');
            cards.forEach((card, index) => {
                card.style.cursor = 'pointer';
                card.addEventListener('click', () => {
                    const title = card.querySelector('h6')?.innerText || 'Media Card';
                    alert(`${title}\n\nDetailed analytics would be shown here.\nIn production, this would open a detailed modal with statistics.`);
                });
            });
        });

        // Re-animate counters when page becomes visible
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) {
                updateAllStats();
            }
        });
    </script>
    <script src="<?= base_url('assets/admin/js/header.js') ?>"></script>
</body>

</html>