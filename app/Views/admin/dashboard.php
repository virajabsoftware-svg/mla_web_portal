<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Constituency Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cream-container {
            padding-top: 50px !important;
        }

          /* ===================================================== */
        /* DASHBOARD STYLES - WORKS WITH EXISTING HEADER */
        /* ===================================================== */

        :root {
            --pure-white: #ffffff;
            --cream: #fef8f0;
            --beige-light: #faf6ed;
            --beige: #f5ede1;
            --beige-dark: #e8dccc;
            --gold-light: #f5e7c8;
            --gold: #d4af37;
            --gold-dark: #b8960c;
            --gold-gradient: linear-gradient(135deg, #b37b2e, #b8960c, #d4af37, #e8c97a);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 16px 40px rgba(0, 0, 0, 0.08);
            --shadow-gold: 0 8px 30px rgba(212, 175, 55, 0.15);
            --shadow-gold-lg: 0 16px 40px rgba(212, 175, 55, 0.20);
            --transition: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --radius: 16px;
            --radius-lg: 20px;
            --radius-xl: 24px;
        }

        /* ----- BODY & BACKGROUND ----- */
        body {
            font-family: 'Playfair Display', 'Georgia', serif;
            background: linear-gradient(145deg, var(--beige-light) 0%, var(--cream) 100%);
            color: #1E293B;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ===================================================== */
        /* FIXED: DASHBOARD CONTENT - WORKS WITH HEADER'S #content */
        /* ===================================================== */
        #content {
            transition: all 0.3s ease;
            padding: 0 !important;
        }

        .dashboard-content-wrapper {
            padding: 30px 35px 20px 35px;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }

        /* When sidebar is collapsed */
        body.sidebar-collapsed #content .dashboard-content-wrapper {
            margin-left: 0;
        }

        /* ----- DASHBOARD HEADER ----- */
        .dashboard-header {
            margin-bottom: 40px;
        }

        .dashboard-badge {
            display: inline-block;
            font-family: 'Playfair Display', 'Georgia', serif;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 8px 22px;
            border-radius: 50px;
            background: var(--gold-gradient);
            color: #fff;
            box-shadow: 0 4px 14px rgba(212, 175, 55, 0.25);
            margin-bottom: 14px;
        }

        .dashboard-badge i {
            margin-right: 8px;
            font-size: 14px;
        }

        .dashboard-title {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-weight: 700;
            font-size: 38px;
            color: #0F172A;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }

        .dashboard-title .gold-text {
            background: var(--gold-gradient);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .dashboard-subtitle {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-weight: 400;
            font-size: 17px;
            color: #64748B;
            letter-spacing: 0.3px;
        }

        .dashboard-subtitle i {
            color: var(--gold);
            margin-right: 8px;
        }

        /* ============================================================ */
        /* PREMIUM DASHBOARD STAT CARDS — scoped with .dash-* classes  */
        /* ============================================================ */

        .dash-stats-row {
            --dash-gold: #d4af37;
            --dash-gold-dark: #b8960c;
            --dash-gold-light: #f5e7c8;
            --dash-shadow: 0 12px 30px rgba(0, 0, 0, 0.05), 0 4px 10px rgba(0, 0, 0, 0.03);
            --dash-shadow-hover: 0 20px 40px rgba(212, 175, 55, 0.15), 0 8px 20px rgba(0, 0, 0, 0.06);
            --dash-radius: 20px;
            --dash-transition: 0.35s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        .dash-stat-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: var(--dash-radius);
            padding: 28px 24px 26px;
            box-shadow: var(--dash-shadow);
            border: 1px solid rgba(255, 255, 255, 0.6);
            transition: all var(--dash-transition);
            height: 100%;
            min-height: 180px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 18px;
            cursor: default;
        }

        /* subtle gold border glow on hover */
        .dash-stat-card::before {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(212, 175, 55, 0.02), rgba(212, 175, 55, 0.15));
            opacity: 0;
            transition: opacity var(--dash-transition);
            pointer-events: none;
            z-index: 0;
        }

        .dash-stat-card:hover::before {
            opacity: 1;
        }

        .dash-stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--dash-shadow-hover);
            border-color: rgba(212, 175, 55, 0.25);
            background: rgba(255, 255, 255, 0.96);
        }

        /* decorative glow spot (soft premium effect) */
        .dash-stat-glow {
            position: absolute;
            top: -40%;
            right: -20%;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            transition: all 0.6s ease;
        }

        .dash-stat-card:hover .dash-stat-glow {
            transform: scale(1.3);
            opacity: 0.8;
        }

        /* all children above the glow */
        .dash-stat-icon,
        .dash-stat-content {
            position: relative;
            z-index: 1;
        }

        /* ---- icon circle (gold gradient) ---- */
        .dash-stat-icon {
            flex: 0 0 auto;
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: linear-gradient(145deg, #b37b2e, #b8960c, #d4af37, #e8c97a);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 28px;
            box-shadow: 0 6px 18px rgba(212, 175, 55, 0.30);
            transition: all var(--dash-transition);
        }

        .dash-stat-card:hover .dash-stat-icon {
            transform: scale(1.05) rotate(-1deg);
            box-shadow: 0 10px 28px rgba(212, 175, 55, 0.40);
        }

        /* ---- content area ---- */
        .dash-stat-content {
            flex: 1;
            min-width: 0;
        }

        .dash-stat-count {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-weight: 700;
            font-size: 38px;
            line-height: 1.1;
            color: #0F172A;
            letter-spacing: -0.5px;
            margin-bottom: 2px;
            background: linear-gradient(135deg, #1e293b, #0f172a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* gold accent for some counts (optional, but we keep all elegant) */
        .dash-stat-count.gold-accent {
            background: linear-gradient(135deg, #b37b2e, #d4af37, #e8c97a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dash-stat-title {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: #64748B;
            margin-bottom: 2px;
            -webkit-text-fill-color: #64748B; /* reset for non-gradient */
        }

        .dash-stat-sub {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-weight: 400;
            font-size: 13px;
            color: #94A3B8;
            font-style: italic;
            letter-spacing: 0.2px;
            margin-top: 2px;
        }

        /* ---- responsive fine-tune ---- */
        @media (max-width: 1200px) {
            .dash-stat-card {
                padding: 24px 20px;
                gap: 14px;
            }
            .dash-stat-icon {
                width: 56px;
                height: 56px;
                font-size: 24px;
            }
            .dash-stat-count {
                font-size: 34px;
            }
        }

        @media (max-width: 992px) {
            .dash-stat-card {
                padding: 22px 18px;
                min-height: 160px;
            }
            .dash-stat-icon {
                width: 52px;
                height: 52px;
                font-size: 22px;
                border-radius: 16px;
            }
            .dash-stat-count {
                font-size: 30px;
            }
            .dash-stat-title {
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            .dash-stat-card {
                padding: 20px 16px;
                gap: 12px;
                min-height: 140px;
                border-radius: 18px;
            }
            .dash-stat-icon {
                width: 48px;
                height: 48px;
                font-size: 20px;
                border-radius: 14px;
            }
            .dash-stat-count {
                font-size: 28px;
            }
            .dash-stat-title {
                font-size: 13px;
                letter-spacing: 0.5px;
            }
            .dash-stat-sub {
                font-size: 12px;
            }
        }

        @media (max-width: 576px) {
            .dash-stat-card {
                flex-direction: row;
                align-items: center;
                padding: 16px 14px;
                gap: 12px;
                min-height: 110px;
            }
            .dash-stat-icon {
                width: 44px;
                height: 44px;
                font-size: 18px;
                border-radius: 12px;
                flex-shrink: 0;
            }
            .dash-stat-count {
                font-size: 24px;
            }
            .dash-stat-title {
                font-size: 12px;
            }
            .dash-stat-sub {
                font-size: 11px;
                margin-top: 0;
            }
            .dash-stat-card .dash-stat-glow {
                width: 80px;
                height: 80px;
                top: -30%;
                right: -10%;
            }
        }

        /* ensure equal height in row */
        .dash-stats-row .col-xl-4,
        .dash-stats-row .col-md-6,
        .dash-stats-row .col-sm-12 {
            display: flex;
        }

        .dash-stats-row .dash-stat-card {
            width: 100%;
        }

        /* ================================================================ */
        /* FOOTER (unchanged) */
        /* ================================================================ */
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
        /* FADE-IN ANIMATION (for cards) */
        /* ===================================================== */
        .dash-stat-card {
            animation: fadeUp 0.5s ease backwards;
        }
        .dash-stat-card:nth-child(1) { animation-delay: 0.02s; }
        .dash-stat-card:nth-child(2) { animation-delay: 0.04s; }
        .dash-stat-card:nth-child(3) { animation-delay: 0.06s; }
        .dash-stat-card:nth-child(4) { animation-delay: 0.08s; }
        .dash-stat-card:nth-child(5) { animation-delay: 0.10s; }
        .dash-stat-card:nth-child(6) { animation-delay: 0.12s; }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="inner_page widgets">
    <?php include "common/header.php"?>

    <div class="dashboard-content-wrapper">
        <!-- ===== DASHBOARD HEADER ===== -->
        <div class="dashboard-header">
            <span class="dashboard-badge">
                <i class="fas fa-crown"></i> ADMIN DASHBOARD
            </span>
            <h1 class="dashboard-title">
                MLA <span class="gold-text">Monitoring</span> Dashboard
            </h1>
            <p class="dashboard-subtitle">
                <i class="fas fa-arrow-right"></i> Legislative Performance &amp; Governance Overview
            </p>
        </div>

        <!-- ========================================================== -->
        <!-- REDESIGNED PREMIUM STATISTIC CARDS (6)                     -->
        <!-- all classes are scoped: .dash-* to avoid conflicts        -->
        <!-- ========================================================== -->
        <div class="row g-4 dash-stats-row">

            <!-- 1. Total MLA -->
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="dash-stat-content">
                        <div class="dash-stat-count">288</div>
                        <div class="dash-stat-title">Total MLA</div>
                        <div class="dash-stat-sub">Legislative Representatives</div>
                    </div>
                    <div class="dash-stat-glow"></div>
                </div>
            </div>

            <!-- 2. Total Voters -->
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="dash-stat-content">
                        <div class="dash-stat-count">125,480</div>
                        <div class="dash-stat-title">Total Voters</div>
                        <div class="dash-stat-sub">Registered Electors</div>
                    </div>
                    <div class="dash-stat-glow"></div>
                </div>
            </div>

            <!-- 3. Total Constituency -->
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon">
                        <i class="fas fa-map-location-dot"></i>
                    </div>
                    <div class="dash-stat-content">
                        <div class="dash-stat-count">288</div>
                        <div class="dash-stat-title">Total Constituency</div>
                        <div class="dash-stat-sub">Electoral Districts</div>
                    </div>
                    <div class="dash-stat-glow"></div>
                </div>
            </div>

            <!-- 4. Total Complaint -->
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon">
                        <i class="fas fa-triangle-exclamation"></i>
                    </div>
                    <div class="dash-stat-content">
                        <div class="dash-stat-count">1,248</div>
                        <div class="dash-stat-title">Total Complaint</div>
                        <div class="dash-stat-sub">Citizen Grievances</div>
                    </div>
                    <div class="dash-stat-glow"></div>
                </div>
            </div>

            <!-- 5. Total Surveys -->
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon">
                        <i class="fas fa-square-poll-vertical"></i>
                    </div>
                    <div class="dash-stat-content">
                        <div class="dash-stat-count">86</div>
                        <div class="dash-stat-title">Total Surveys</div>
                        <div class="dash-stat-sub">Public Opinion Polls</div>
                    </div>
                    <div class="dash-stat-glow"></div>
                </div>
            </div>

            <!-- 6. Total Feedback -->
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="dash-stat-card">
                    <div class="dash-stat-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="dash-stat-content">
                        <div class="dash-stat-count">3,485</div>
                        <div class="dash-stat-title">Total Feedback</div>
                        <div class="dash-stat-sub">Citizen Responses</div>
                    </div>
                    <div class="dash-stat-glow"></div>
                </div>
            </div>

        </div><!-- /row -->

        <!-- ============================================================ -->
        <!-- FOOTER -->
        <!-- ============================================================ -->
        <div class="footer">
            <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="header.js">
    </script>
</body>

</html>