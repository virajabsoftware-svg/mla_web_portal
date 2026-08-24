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
            --radius-lg: 20px;
            --radius-xl: 24px;
            --radius-xxl: 32px;
            --transition-fast: 0.2s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            --transition-base: 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(145deg, var(--beige-light) 0%, var(--cream) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c2418;
            padding-bottom: 3rem;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1e8db;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold-dark);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gold);
        }

        .gold-gradient-text {
            background: linear-gradient(135deg, #b37b2e, var(--gold-dark), #d4af37, #e8c97a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 800;
        }

        .badge-cream-gold {
            background: var(--beige-dark);
            color: #7a5a2a;
            font-weight: 600;
            border-left: 4px solid var(--gold);
            box-shadow: var(--shadow-sm);
        }

        .filter-astro {
            background: rgba(255, 252, 242, 0.96);
            backdrop-filter: blur(16px);
            border-radius: var(--radius-xxl);
            border: 1px solid rgba(212, 175, 55, 0.6);
            box-shadow: var(--shadow-gold);
            transition: var(--transition-base);
        }

        .filter-astro:hover {
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold);
        }

        .filter-astro label {
            color: #8b6946;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .form-control,
        .form-select {
            background: var(--pure-white) !important;
            border: 1px solid #e9dfcf;
            border-radius: var(--radius-md);
            padding: 10px 16px;
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25);
        }

        .btn-warm-gold {
            background: linear-gradient(115deg, #d4af37, #b8860b);
            border: none;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 60px;
            box-shadow: var(--shadow-gold);
            transition: var(--transition-fast);
            color: #2c1f0f;
        }

        .btn-warm-gold:hover {
            transform: translateY(-2px);
            background: linear-gradient(115deg, #e0bc4a, #c9951a);
            box-shadow: 0 12px 22px rgba(180, 130, 30, 0.3);
        }

        .btn-outline-cream {
            border: 1px solid var(--gold);
            background: transparent;
            color: #8b6946;
            font-weight: 600;
            border-radius: 60px;
            padding: 10px 24px;
        }

        .btn-outline-cream:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
        }

        /* ================================================================
                   CONSTITUENCY CARD DESIGN — adapted from MLA cards
                   ================================================================ */
        .constituency-card {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            height: 100%;
            box-shadow: var(--shadow-lg);
            border: 1px solid #f3ecd9;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .constituency-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold-light);
        }

        .constituency-card .card-header {
            position: relative;
            padding: 20px 22px 0 22px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            background: #faf1e2;
            min-height: 90px;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            transition: background 0.3s ease;
        }

        .constituency-card .card-header .rank-badge {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: radial-gradient(circle at 30% 20%, #f5e7c8, #c9a03d);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.10), 0 0 0 2px #fff3e0, 0 0 0 4px rgba(212, 175, 55, 0.20);
            transition: all 0.3s ease;
        }

        .constituency-card:hover .rank-badge {
            transform: scale(1.05);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.14), 0 0 0 2px #fff3e0, 0 0 0 5px rgba(212, 175, 55, 0.28);
        }

        .rank-badge .rank-number {
            font-weight: 800;
            font-size: 1.5rem;
            color: #2c2418;
        }

        .rank-badge .rank-label {
            font-size: 0.5rem;
            font-weight: 600;
            color: #5a442a;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-top: -2px;
        }

        .constituency-card .location-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.10), 0 0 0 2px rgba(255, 255, 255, 0.9), 0 0 0 3px rgba(212, 175, 55, 0.20);
            border: 1px solid rgba(255, 255, 255, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--gold-dark);
            transition: all 0.3s ease;
        }

        .constituency-card:hover .location-icon {
            transform: scale(1.05);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.14), 0 0 0 2px rgba(255, 255, 255, 0.95), 0 0 0 4px rgba(212, 175, 55, 0.28);
        }

        .constituency-card .card-body {
            padding: 18px 22px 22px 22px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .constituency-card .constituency-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c1f0f;
            margin-bottom: 4px;
            letter-spacing: -0.2px;
        }

        .constituency-card .district-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 4px 16px 4px 12px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 700;
            background: #f5ede1;
            color: #b47c2e;
            border: 1px solid #e8d8c4;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
            margin: 0 auto 10px auto;
        }

        .constituency-card:hover .district-chip {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .constituency-card .stat-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 8px;
            margin: 10px 0 12px 0;
        }

        .constituency-card .stat-item {
            background: var(--beige-light);
            border-radius: var(--radius-sm);
            padding: 8px 4px;
            text-align: center;
        }

        .constituency-card .stat-item .stat-number {
            font-weight: 800;
            font-size: 1.1rem;
            color: #2c1f0f;
        }

        .constituency-card .stat-item .stat-label {
            font-size: 0.6rem;
            font-weight: 600;
            color: #7a5f3a;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .constituency-card .development-score {
            margin: 8px 0 12px 0;
        }

        .constituency-card .development-score .score-value {
            font-weight: 800;
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .constituency-card .development-score .score-label {
            font-size: 0.7rem;
            font-weight: 600;
            color: #7a5f3a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .constituency-card .progress {
            height: 6px;
            border-radius: 10px;
            background: var(--beige-dark);
            margin-top: 4px;
        }

        .constituency-card .progress .progress-bar {
            border-radius: 10px;
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
        }

        .constituency-card .status-active {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
            margin-top: 4px;
        }

        /* ================================================================
                   STATISTICS BOXES
                   ================================================================ */
        .stat-box {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            padding: 22px 20px;
            text-align: center;
            border: 1px solid #f3ecd9;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-base);
            height: 100%;
        }

        .stat-box:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold);
            border-color: var(--gold-light);
        }

        .stat-box .stat-icon {
            font-size: 2rem;
            color: var(--gold-dark);
            margin-bottom: 8px;
        }

        .stat-box .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2c1f0f, var(--gold-dark));
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .stat-box .stat-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #7a5f3a;
            margin-top: 4px;
        }

        /* ================================================================
                   PREMIUM TABLE STYLES (cream/gold theme)
                   ================================================================ */
        .premium-table-wrapper {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            padding: 1.5rem 1rem 0.5rem 1rem;
            border: 1px solid #f3ecd9;
            box-shadow: var(--shadow-md);
            overflow-x: auto;
        }

        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            min-width: 700px;
        }

        .premium-table thead th {
            background: linear-gradient(135deg, #faf3e6, #f5ede1);
            color: #7a5f3a;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 14px 16px;
            border: none;
            border-bottom: 2px solid var(--gold-light);
            text-align: left;
            white-space: nowrap;
        }

        .premium-table thead th:first-child {
            border-radius: 16px 0 0 16px;
        }

        .premium-table thead th:last-child {
            border-radius: 0 16px 16px 0;
        }

        .premium-table tbody tr {
            background: rgba(255, 252, 245, 0.7);
            transition: all 0.2s ease;
            border-radius: 12px;
        }

        .premium-table tbody tr:hover {
            background: #fffcf0;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.08);
        }

        .premium-table tbody td {
            padding: 12px 16px;
            border: none;
            border-bottom: 1px solid #f1e8db;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #2c2418;
        }

        .premium-table tbody tr:last-child td {
            border-bottom: none;
        }

        .premium-table tbody td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .premium-table tbody td:last-child {
            border-radius: 0 12px 12px 0;
        }

        .status-active {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
        }

        .status-inactive {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #fce4ec;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }

        .action-btn-group {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 5px 12px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
            border: none;
            transition: all 0.2s ease;
            background: var(--beige);
            color: #5a442a;
            text-decoration: none;
            cursor: pointer;
        }

        .action-btn i {
            font-size: 0.7rem;
        }

        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .action-btn.view-btn {
            background: #f5ede1;
            color: #7a5f3a;
        }

        .action-btn.view-btn:hover {
            background: #e8dccc;
        }

        .action-btn.edit-btn {
            background: #f5ede1;
            color: #7a5f3a;
        }

        .action-btn.edit-btn:hover {
            background: #e8dccc;
        }

        .action-btn.delete-btn {
            background: #f5ede1;
            color: #9e6b6b;
        }

        .action-btn.delete-btn:hover {
            background: #fce4e4;
            color: #c62828;
        }

        /* ================================================================
                   MODAL
                   ================================================================ */
        .modal-cream .modal-content {
            background: var(--pure-white);
            border-radius: var(--radius-xxl);
            border: 1px solid var(--gold-light);
            box-shadow: var(--shadow-gold-lg);
        }

        .modal-cream .modal-header {
            border-bottom: 2px solid #d4af37;
            border-radius: 28px 28px 0 0;
            background: rgba(212, 175, 55, 0.05);
            padding: 1.25rem 1.75rem;
        }

        .modal-cream .modal-title {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-size: 1.7rem;
            letter-spacing: -0.3px;
            background: linear-gradient(135deg, #b8860b, #d4af37, #f5e6a3);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .modal-cream .modal-title i {
            background: none;
            color: #d4af37;
            font-size: 1.6rem;
            margin-right: 12px;
            text-shadow: none;
        }

        .modal-cream .btn-close {
            filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.1));
            transition: all 0.2s ease;
            opacity: 0.7;
        }

        .modal-cream .btn-close:hover {
            opacity: 1;
            transform: scale(1.08);
            filter: drop-shadow(0 0 4px #d4af37);
        }

        .modal-cream .modal-body {
            padding: 2rem 2rem 2rem 2rem;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #2c2418;
            background: transparent;
        }

        .modal-cream .modal-footer {
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            background: rgba(245, 235, 210, 0.4);
            border-radius: 0 0 28px 28px;
            padding: 1rem 1.75rem;
        }

        .modal.fade .modal-dialog {
            transform: scale(0.96) translateY(-10px);
            transition: transform 0.25s ease-out, opacity 0.2s;
        }

        .modal.show .modal-dialog {
            transform: scale(1) translateY(0);
        }

        @media (max-width: 576px) {
            .modal-cream .modal-body {
                padding: 1.25rem;
            }
            .modal-cream .modal-title {
                font-size: 1.3rem;
            }
        }

        /* Read-only fields for view modal */
        .view-field-readonly {
            background: #faf6ed !important;
            color: #4a3f32;
            cursor: default;
            border-color: #e9dfcf;
        }

        .view-field-readonly:focus {
            box-shadow: none !important;
            border-color: #e9dfcf !important;
        }

        /* ================================================================
                   FOOTER
                   ================================================================ */
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

        @media (max-width: 576px) {
            .stat-grid {
                grid-template-columns: 1fr 1fr !important;
            }
        }
    </style>
</head>

<body class="inner_page widgets">
    <?php include "common/header.php"?>

    <div class="container-fluid mt-4 px-3 px-lg-5 cream-container">
        <!-- ============================================================ -->
        <!-- HERO SECTION -->
        <!-- ============================================================ -->
        <div class="text-center mb-4">
            <span class="badge badge-cream-gold px-4 py-2 rounded-pill"><i class="fas fa-map-location-dot me-2"></i> CONSTITUENCY MANAGEMENT</span>
            <h1 class="display-5 fw-bold mt-3 gold-gradient-text"><i class="fas fa-map-marked-alt me-3"></i> Constituency Management</h1>
            <div class="gold-divider"></div>
            <p class="text-muted mt-2" style="color:#9b7c54 !important;">Manage Maharashtra Assembly Constituencies, development status and constituency-level information</p>
        </div>

        <!-- ============================================================ -->
        <!-- STATISTICS BOXES -->
        <!-- ============================================================ -->
        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-md-6 ms-5">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-city"></i></div>
                    <div class="stat-number"><?= $totalDistricts ?></div>
                    <div class="stat-label">Total Districts</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 ms-5">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-map-pin"></i></div>
                    <div class="stat-number"><?= $totalConstituencies ?></div>
                    <div class="stat-label">Total Constituencies</div>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-md-6">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-number">215</div>
                    <div class="stat-label">Developed Constituencies</div>
                </div>
            </div> -->
            <div class="col-xl-3 col-md-6 ms-5">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-play-circle"></i></div>
                    <div class="stat-number"><?= $activeConstituencies ?></div>
                    <div class="stat-label">Active Constituencies</div>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- TOP 3 DEVELOPED CONSTITUENCIES -->
        <!-- ============================================================ -->
        <!-- <div class="text-center mb-4">
            <h2 class="gold-gradient-text fs-2 fw-bold"><i class="fas fa-trophy me-2"></i> Top 3 Developed Constituencies</h2>
            <p class="text-muted" style="color:#9b7c54 !important;">Leading constituencies in development performance</p>
        </div> -->

        <!-- <div class="row g-4 mb-5"> -->
            <!-- Constituency 1: Kopri-Pachpakhadi -->
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                <div class="constituency-card">
                    <div class="card-header" style="background: #FFF8E1;">
                        <div class="location-icon">
                            <i class="fas fa-map-location-dot"></i>
                        </div>
                        <div class="rank-badge">
                            <span class="rank-number">1</span>
                            <span class="rank-label">Rank</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="constituency-name">Kopri-Pachpakhadi</div>
                        <div class="district-chip">
                            <i class="fas fa-city me-1"></i> Thane
                        </div>
                        <div class="development-score">
                            <div class="score-value">96%</div>
                            <div class="score-label">Development Score</div>
                            <div class="progress"><div class="progress-bar" style="width:96%"></div></div>
                        </div>
                        <div class="stat-grid">
                            <div class="stat-item">
                                <div class="stat-number">28</div>
                                <div class="stat-label">Villages</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">42</div>
                                <div class="stat-label">Booths</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Coverage</div>
                            </div>
                        </div>
                        <span class="status-active">Active</span>
                    </div>
                </div>
            </div> -->

            <!-- Constituency 2: Nagpur South West -->
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                <div class="constituency-card">
                    <div class="card-header" style="background: #FFF4E8;">
                        <div class="location-icon">
                            <i class="fas fa-map-location-dot"></i>
                        </div>
                        <div class="rank-badge">
                            <span class="rank-number">2</span>
                            <span class="rank-label">Rank</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="constituency-name">Nagpur South West</div>
                        <div class="district-chip">
                            <i class="fas fa-city me-1"></i> Nagpur
                        </div>
                        <div class="development-score">
                            <div class="score-value">94%</div>
                            <div class="score-label">Development Score</div>
                            <div class="progress"><div class="progress-bar" style="width:94%"></div></div>
                        </div>
                        <div class="stat-grid">
                            <div class="stat-item">
                                <div class="stat-number">31</div>
                                <div class="stat-label">Villages</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">48</div>
                                <div class="stat-label">Booths</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Coverage</div>
                            </div>
                        </div>
                        <span class="status-active">Active</span>
                    </div>
                </div>
            </div> -->

            <!-- Constituency 3: Karad South -->
            <!-- <div class="col-lg-4 col-md-6 mb-4">
                <div class="constituency-card">
                    <div class="card-header" style="background: #FFF4E8;">
                        <div class="location-icon">
                            <i class="fas fa-map-location-dot"></i>
                        </div>
                        <div class="rank-badge">
                            <span class="rank-number">3</span>
                            <span class="rank-label">Rank</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="constituency-name">Karad South</div>
                        <div class="district-chip">
                            <i class="fas fa-city me-1"></i> Satara
                        </div>
                        <div class="development-score">
                            <div class="score-value">92%</div>
                            <div class="score-label">Development Score</div>
                            <div class="progress"><div class="progress-bar" style="width:92%"></div></div>
                        </div>
                        <div class="stat-grid">
                            <div class="stat-item">
                                <div class="stat-number">35</div>
                                <div class="stat-label">Villages</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">51</div>
                                <div class="stat-label">Booths</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Coverage</div>
                            </div>
                        </div>
                        <span class="status-active">Active</span>
                    </div>
                </div>
            </div>
        </div> -->
         
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?= session()->getFlashdata('success'); ?>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        <?php endif; ?>
       <!-- ============================================================ -->
<!-- FILTER SECTION - CONSTITUENCY COMMAND CENTER -->
<!-- ============================================================ -->
<div class="filter-astro p-4 shadow-lg mt-2">

    <h3 class="mb-4 fw-semibold" style="color:#876b42;">
        <i class="fas fa-map-location-dot me-2"
           style="color: var(--gold-dark);"></i>
        Constituency Command Center
    </h3>

    <div class="row g-3">

        <!-- STATE -->
        <div class="col-md-2">
            <label>
                <i class="fas fa-flag me-1"></i>
                State
            </label>

            <select name="state_id"
                    id="state_id"
                    class="form-select">

                <option value="">All States</option>

                <?php if (!empty($states)): ?>
                    <?php foreach ($states as $state): ?>

                        <option value="<?= esc($state['id']); ?>">
                            <?= esc($state['state_name']); ?>
                        </option>

                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>


        <!-- DISTRICT -->
        <div class="col-md-2">
            <label>
                <i class="fas fa-city me-1"></i>
                District
            </label>

            <select name="district_id"
                    id="district_id"
                    class="form-select">

                <option value="">All Districts</option>

                <?php if (!empty($districts)): ?>
                    <?php foreach ($districts as $district): ?>

                        <option value="<?= esc($district['id']); ?>">
                            <?= esc($district['district_name']); ?>
                        </option>

                    <?php endforeach; ?>
                <?php endif; ?>

            </select>
        </div>


        <!-- CONSTITUENCY SEARCH -->
        <div class="col-md-2">
            <label>
                <i class="fas fa-map-pin me-1"></i>
                Constituency
            </label>

            <input type="text"
                   id="filter_constituency"
                   class="form-control"
                   placeholder="Search constituency">
        </div>


        <!-- CONSTITUENCY CODE -->
        <div class="col-md-2">
            <label>
                <i class="fas fa-barcode me-1"></i>
                Constituency Code
            </label>

            <input type="text"
                   id="filter_code"
                   class="form-control"
                   placeholder="Search code">
        </div>


        <!-- STATUS -->
        <div class="col-md-2">
            <label>
                <i class="fas fa-toggle-on me-1"></i>
                Status
            </label>

            <select id="filter_status"
                    class="form-select">

                <option value="">All Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>

            </select>
        </div>


        <!-- SORT -->
        <div class="col-md-2">
            <label>
                <i class="fas fa-sort-amount-down me-1"></i>
                Sort By
            </label>

            <select id="filter_sort"
                    class="form-select">

                <option value="asc">A → Z</option>
                <option value="desc">Z → A</option>

            </select>
        </div>

    </div>


    <div class="mt-4 d-flex gap-3 flex-wrap">

        <button type="button"
                id="deployFiltersBtn"
                class="btn btn-warm-gold px-4 fw-bold">

            <i class="fas fa-filter me-2"></i>
            Deploy Filters

        </button>


        <button type="button"
                id="resetFiltersBtn"
                class="btn btn-outline-cream px-4">

            <i class="fas fa-sync-alt me-2"></i>
            Reset

        </button>


        <!-- ADD CONSTITUENCY - UNCHANGED -->
        <button type="button"
                class="btn btn-warm-gold px-4 fw-bold"
                data-bs-toggle="modal"
                data-bs-target="#addConstituencyModal">

            <i class="fas fa-plus me-2"></i>
            Add Constituency

        </button>

    </div>

</div>

        <!-- ============================================================ -->
        <!-- CONSTITUENCY DIRECTORY TABLE -->
        <!-- ============================================================ -->
        <div class="mt-5">
            <h2 class="gold-gradient-text fs-2 fw-bold"><i class="fas fa-table me-2"></i> Constituency Directory</h2>
            <div class="premium-table-wrapper mt-3">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Constituency</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Code</th>
                            <th>Villages</th>
                            <th>Booths</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($constituencies)): ?>

                           <?php foreach ($constituencies as $index => $constituency): ?>

<tr
    class="constituency-row"
    data-id="<?= esc($constituency['id']); ?>"
    data-state-id="<?= esc($constituency['state_id'] ?? ''); ?>"
    data-district-id="<?= esc($constituency['district_id'] ?? ''); ?>"
    data-constituency="<?= esc(strtolower(trim($constituency['constituency_name'] ?? ''))); ?>"
    data-code="<?= esc(strtolower(trim($constituency['constituency_code'] ?? ''))); ?>"
    data-status="<?= esc(strtolower(trim($constituency['status'] ?? ''))); ?>"
>
                                    <td><?= $index + 1 ?></td>

                                    <td>
                                        <strong>
                                            <?= esc($constituency['constituency_name']) ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= esc($constituency['district_name']) ?>
                                    </td>

                                    <td>
                                        <?= esc($constituency['state_name']) ?>
                                    </td>

                                    <td>
                                        <?= esc($constituency['constituency_code'] ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= esc($constituency['total_villages'] ?? 0) ?>
                                    </td>

                                    <td>
                                        <?= esc($constituency['total_booths'] ?? 0) ?>
                                    </td>

                                    <td>
                                        <?php if ($constituency['status'] === 'Active'): ?>

                                            <span class="status-active">
                                                Active
                                            </span>

                                        <?php else: ?>

                                            <span class="status-inactive">
                                                Inactive
                                            </span>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="action-btn-group">

                                            <button class="action-btn view-btn"
                                                    type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewConstituencyModal"
                                                    data-id="<?= $constituency['id'] ?>">

                                                <i class="fas fa-eye"></i> View
                                            </button>

                                            <button class="action-btn edit-btn"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editConstituencyModal"
                                                data-id="<?= $constituency['id'] ?>">

                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <form action="<?= base_url('admin/constituency/delete/' . $constituency['id']) ?>"
      method="post"
      style="display:inline;"
      onsubmit="return confirm('Are you sure you want to delete this constituency?');">

    <?= csrf_field() ?>

    <button type="submit" class="action-btn delete-btn">
        <i class="fas fa-trash"></i> Delete
    </button>

</form>

                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        No constituencies found.
                                    </td>
                                </tr>

                            <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- FOOTER -->
        <!-- ============================================================ -->
        <div class="footer">
            <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- VIEW CONSTITUENCY MODALS (read-only, form-style) -->
    <!-- ============================================================ -->
    
    <div class="modal fade modal-cream"
     id="viewConstituencyModal"
     tabindex="-1"
     data-bs-backdrop="static">

    <div class="modal-dialog modal-xl modal-dialog-scrollable">

        <div class="modal-content modal-cream">

            <div class="modal-header border-warning">

                <h5 class="modal-title fw-bold">
                    <i class="fas fa-eye me-2"></i>
                    Constituency Details
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="row g-3">

                    <div class="col-12 text-center mb-3">
                        <i class="fas fa-map-location-dot"
                           style="font-size:4rem;color:var(--gold-dark);">
                        </i>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-map-pin me-1"></i>
                            Constituency Name
                        </label>

                        <input type="text"
                               id="view_constituency_name"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-city me-1"></i>
                            District
                        </label>

                        <input type="text"
                               id="view_district_name"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-flag me-1"></i>
                            State
                        </label>

                        <input type="text"
                               id="view_state_name"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-barcode me-1"></i>
                            Constituency Code
                        </label>

                        <input type="text"
                               id="view_constituency_code"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-flag me-1"></i>
                            No. of Villages
                        </label>

                        <input type="text"
                               id="view_total_villages"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-building me-1"></i>
                            No. of Booths
                        </label>

                        <input type="text"
                               id="view_total_booths"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-chart-line me-1"></i>
                            Development Score
                        </label>

                        <input type="text"
                            id="view_development_score"
                            class="form-control view-field-readonly"
                            value="85%"
                            readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold" style="color:#876b42;">
                            <i class="fas fa-toggle-on me-1"></i>
                            Status
                        </label>

                        <input type="text"
                               id="view_status"
                               class="form-control view-field-readonly"
                               readonly>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-outline-cream px-4"
                        data-bs-dismiss="modal">
                    Close
                </button>

            </div>

        </div>

    </div>

</div>

    <!-- ============================================================ -->
    <!-- ADD CONSTITUENCY MODAL -->
    <!-- ============================================================ -->
    <div class="modal fade modal-cream" id="addConstituencyModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content modal-cream">
                <div class="modal-header border-warning">
                    <h5 class="modal-title fw-bold"><i class="fas fa-map-location-dot me-2"></i>Add Constituency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addConstituencyForm"
                        action="<?= base_url('admin/constituency/save') ?>"
                        method="post"
                        class="needs-validation"
                        novalidate>

                        <?= csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-flag me-1"></i> State <span class="text-danger">*</span></label>
                                <select name="state_id" id="modal_state_id" class="form-select">
                        <option value="">All States</option>

                        <?php if (!empty($states)): ?>
                            <?php foreach ($states as $state): ?>
                                <option value="<?= $state['id']; ?>">
                                    <?= esc($state['state_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-city me-1"></i> District <span class="text-danger">*</span></label>
                                                    <select name="district_id" id="modal_district_id" class="form-select">
                        <option value="">All Districts</option>

                        <?php if (!empty($districts)): ?>
                            <?php foreach ($districts as $district): ?>
                                <option value="<?= $district['id']; ?>">
                                    <?= esc($district['district_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-map-pin me-1"></i> Constituency Name <span class="text-danger">*</span></label>
                                <input type="text" name="constituency_name" class="form-control" placeholder="Enter constituency name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-barcode me-1"></i> Constituency Code</label>
                                <input type="text" name="constituency_code" class="form-control" placeholder="Enter constituency code">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-flag me-1"></i> No. of Villages</label>
                                <input type="number" name="total_villages" class="form-control" placeholder="Enter number of villages">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-flag me-1"></i> No. of Booths</label>
                                <input type="number" name="total_booths" class="form-control" placeholder="Enter number of booths">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;"><i class="fas fa-toggle-on me-1"></i> Status</label>
                                <select name="status" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                    <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warm-gold px-4">Save Constituency</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- EDIT CONSTITUENCY MODALS (editable, same layout) -->
    <!-- ============================================================ -->
    <div class="modal fade modal-cream"
     id="editConstituencyModal"
     tabindex="-1"
     data-bs-backdrop="static">

    <div class="modal-dialog modal-xl modal-dialog-scrollable">

        <div class="modal-content modal-cream">

            <div class="modal-header border-warning">

                <h5 class="modal-title fw-bold">
                    <i class="fas fa-edit me-2"></i>
                    Edit Constituency
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form id="editConstituencyForm">

                    <input type="hidden"
                           name="id"
                           id="edit_constituency_id">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-flag me-1"></i>
                                State
                            </label>

                            <select name="state_id"
                                    id="edit_state_id"
                                    class="form-select"
                                    required>

                                <option value="">Select State</option>

                                <?php if (!empty($states)): ?>

                                    <?php foreach ($states as $state): ?>

                                        <option value="<?= $state['id']; ?>">
                                            <?= esc($state['state_name']); ?>
                                        </option>

                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-city me-1"></i>
                                District
                            </label>

                            <select name="district_id"
                                    id="edit_district_id"
                                    class="form-select"
                                    required>
                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-map-pin me-1"></i>
                                Constituency Name
                            </label>

                            <input type="text"
                                   name="constituency_name"
                                   id="edit_constituency_name"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-barcode me-1"></i>
                                Constituency Code
                            </label>

                            <input type="text"
                                   name="constituency_code"
                                   id="edit_constituency_code"
                                   class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-flag me-1"></i>
                                No. of Villages
                            </label>

                            <input type="number"
                                   name="total_villages"
                                   id="edit_total_villages"
                                   class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-building me-1"></i>
                                No. of Booths
                            </label>

                            <input type="number"
                                   name="total_booths"
                                   id="edit_total_booths"
                                   class="form-control">

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-toggle-on me-1"></i>
                                Status
                            </label>

                            <select name="status"
                                    id="edit_status"
                                    class="form-select">

                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>

                            </select>

                        </div>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-outline-cream px-4"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button"
                        class="btn btn-warm-gold px-4"
                        id="updateConstituencyBtn">

                    <i class="fas fa-save me-2"></i>
                    Update Constituency

                </button>

            </div>

        </div>

    </div>

</div>

    <!-- ============================================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="header.js">
    </script>
    <script>
    function loadDistricts(stateSelector, districtSelector) {

    $(stateSelector).change(function () {

        var stateId = $(this).val();

        $(districtSelector).html('<option value="">Loading...</option>');

        if (stateId != '') {

            $.ajax({
                url: "<?= base_url('admin/get-districts'); ?>/" + stateId,
                type: "GET",
                dataType: "JSON",
                success: function (response) {

                    $(districtSelector).html('<option value="">Select District</option>');

                    $.each(response, function (index, district) {

                        $(districtSelector).append(
                            '<option value="' + district.id + '">' +
                            district.district_name +
                            '</option>'
                        );

                    });

                }
            });

        } else {

            $(districtSelector).html('<option value="">Select District</option>');

        }

    });

}

$(document).ready(function () {

    

    loadDistricts('#modal_state_id', '#modal_district_id');

});

$('#edit_state_id').on('change', function () {

    let stateId = $(this).val();
    let districtDropdown = $('#edit_district_id');

    districtDropdown.html('<option value="">Loading...</option>');

    if (stateId === '') {

        districtDropdown.html(
            '<option value="">Select District</option>'
        );

        return;
    }

    $.ajax({

        url: "<?= base_url('admin/get-districts'); ?>/" + stateId,

        type: "GET",

        dataType: "JSON",

        success: function (response) {

            districtDropdown.html(
                '<option value="">Select District</option>'
            );

            $.each(response, function (index, district) {

                districtDropdown.append(
                    '<option value="' + district.id + '">' +
                    district.district_name +
                    '</option>'
                );

            });

            // Existing district automatically select
            let selectedDistrictId =
                districtDropdown.data('selected');

            if (selectedDistrictId) {

                districtDropdown.val(selectedDistrictId);

                districtDropdown.removeData('selected');
            }

        },

        error: function (xhr) {

            console.log(xhr.responseText);

            districtDropdown.html(
                '<option value="">Unable to load districts</option>'
            );
        }

    });

});

$('#updateConstituencyBtn').on('click', function () {

    let formData = $('#editConstituencyForm').serialize();

    $.ajax({
        url: "<?= base_url('admin/constituency/update'); ?>",
        type: "POST",
        data: formData,
        dataType: "JSON",

        success: function (response) {

            if (response.status) {

                alert(response.message);

                // Close modal
                $('#editConstituencyModal').modal('hide');

                // Reload page to show updated data
                location.reload();

            } else {

                alert(response.message);
            }
        },

        error: function (xhr) {

            console.log(xhr.responseText);

            alert('Unable to update constituency.');
        }
    });

});
</script>

<script>
    $(document).on('click', '.view-btn', function () {

    let constituencyId = $(this).data('id');

    $.ajax({
        url: "<?= base_url('admin/constituency/get/') ?>" + constituencyId,
        type: "GET",
        dataType: "json",

        success: function (response) {

            if (response.status) {

                let data = response.data;

                $('#view_constituency_name').val(data.constituency_name);
                $('#view_district_name').val(data.district_name);
                $('#view_state_name').val(data.state_name);
                $('#view_constituency_code').val(data.constituency_code ?? '-');
                $('#view_total_villages').val(data.total_villages ?? 0);
                $('#view_total_booths').val(data.total_booths ?? 0);
                $('#view_status').val(data.status);

                // Temporary hardcoded development score
                $('#view_development_score').val('85%');

            } else {

                alert(response.message);
            }
        },

        error: function (xhr) {

            console.log(xhr.responseText);

            alert('Unable to fetch constituency details.');
        }
    });

});
</script>

<script>
    $(document).on('click', '.edit-btn', function () {

    let constituencyId = $(this).data('id');

    $.ajax({
        url: "<?= base_url('admin/constituency/get/') ?>" + constituencyId,
        type: "GET",
        dataType: "json",

        success: function (response) {

            if (response.status) {

                let data = response.data;

                // Hidden ID
                $('#edit_constituency_id').val(data.id);

                // Basic fields
                $('#edit_constituency_name').val(data.constituency_name);
                $('#edit_constituency_code').val(data.constituency_code ?? '');
                $('#edit_total_villages').val(data.total_villages ?? 0);
                $('#edit_total_booths').val(data.total_booths ?? 0);
                $('#edit_status').val(data.status);

                $('#edit_district_id').data('selected', data.district_id);

                $('#edit_state_id').val(data.state_id).trigger('change');

            } else {

                alert(response.message);
            }
        },

        error: function (xhr) {

            console.log(xhr.responseText);

            alert('Unable to fetch constituency details.');
        }
    });

});
</script><script>
$(document).ready(function () {

    // ============================================================
    // CONSTITUENCY FILTER SYSTEM
    // ============================================================

    const $state = $('#state_id');
    const $district = $('#district_id');
    const $constituency = $('#filter_constituency');
    const $code = $('#filter_code');
    const $status = $('#filter_status');
    const $sort = $('#filter_sort');
    const $rows = $('.constituency-row');


    // ------------------------------------------------------------
    // APPLY FILTERS
    // ------------------------------------------------------------

    function applyConstituencyFilters() {

        const stateValue =
            $.trim($state.val()).toLowerCase();

        const districtValue =
            $.trim($district.val()).toLowerCase();

        const constituencyValue =
            $.trim($constituency.val()).toLowerCase();

        const codeValue =
            $.trim($code.val()).toLowerCase();

        const statusValue =
            $.trim($status.val()).toLowerCase();

        let visibleRows = [];


        // --------------------------------------------------------
        // FILTER EACH ROW
        // --------------------------------------------------------

        $rows.each(function () {

            const $row = $(this);

            const rowState =
                String($row.attr('data-state-id') || '')
                    .trim()
                    .toLowerCase();

            const rowDistrict =
                String($row.attr('data-district-id') || '')
                    .trim()
                    .toLowerCase();

            const rowConstituency =
                String($row.attr('data-constituency') || '')
                    .trim()
                    .toLowerCase();

            const rowCode =
                String($row.attr('data-code') || '')
                    .trim()
                    .toLowerCase();

            const rowStatus =
                String($row.attr('data-status') || '')
                    .trim()
                    .toLowerCase();


            // STATE
            const stateMatch =
                stateValue === '' ||
                rowState === stateValue;


            // DISTRICT
            const districtMatch =
                districtValue === '' ||
                rowDistrict === districtValue;


            // CONSTITUENCY NAME
            const constituencyMatch =
                constituencyValue === '' ||
                rowConstituency.includes(constituencyValue);


            // CODE
            const codeMatch =
                codeValue === '' ||
                rowCode.includes(codeValue);


            // STATUS
            const statusMatch =
                statusValue === '' ||
                rowStatus === statusValue;


            // FINAL RESULT
            const show =
                stateMatch &&
                districtMatch &&
                constituencyMatch &&
                codeMatch &&
                statusMatch;


            if (show) {

                $row.show();

                visibleRows.push($row);

            } else {

                $row.hide();

            }

        });


        // --------------------------------------------------------
        // SORT VISIBLE ROWS
        // --------------------------------------------------------

        const sortOrder = $sort.val() || 'asc';

        const $tbody =
            $('.premium-table tbody');


        visibleRows.sort(function (a, b) {

            const nameA =
                String(a.attr('data-constituency') || '')
                    .trim()
                    .toLowerCase();

            const nameB =
                String(b.attr('data-constituency') || '')
                    .trim()
                    .toLowerCase();


            if (sortOrder === 'desc') {

                return nameB.localeCompare(
                    nameA,
                    undefined,
                    {
                        numeric: true,
                        sensitivity: 'base'
                    }
                );

            }

            return nameA.localeCompare(
                nameB,
                undefined,
                {
                    numeric: true,
                    sensitivity: 'base'
                }
            );

        });


        // --------------------------------------------------------
        // RE-APPEND SORTED ROWS
        // --------------------------------------------------------

        $.each(visibleRows, function (index, $row) {

            $tbody.append($row);

        });


        // --------------------------------------------------------
        // UPDATE SERIAL NUMBER
        // --------------------------------------------------------

        let serialNumber = 1;

        $tbody.find('.constituency-row:visible').each(function () {

            $(this)
                .find('td:first-child')
                .text(serialNumber);

            serialNumber++;

        });


        // --------------------------------------------------------
        // NO RESULT MESSAGE
        // --------------------------------------------------------

        $('#noFilterResultRow').remove();


        if (visibleRows.length === 0) {

            $tbody.append(`
                <tr id="noFilterResultRow">
                    <td colspan="9"
                        class="text-center py-5">

                        <div style="
                            color:#876b42;
                            font-weight:600;
                            font-size:1rem;
                        ">

                            <i class="fas fa-search"
                               style="
                                   font-size:2rem;
                                   color:#b8860b;
                                   margin-bottom:10px;
                               ">
                            </i>

                            <br>

                            No constituencies found
                            matching the selected filters.

                        </div>

                    </td>
                </tr>
            `);

        }

    }


    // ============================================================
    // DEPLOY FILTERS BUTTON
    // ============================================================

    $('#deployFiltersBtn').on('click', function () {

        applyConstituencyFilters();

    });


    // ============================================================
    // LIVE SEARCH
    // ============================================================

    $constituency.on('input', function () {

        applyConstituencyFilters();

    });


    $code.on('input', function () {

        applyConstituencyFilters();

    });


    // ============================================================
    // SELECT FILTERS
    // ============================================================

    $state.on('change', function () {

        applyConstituencyFilters();

    });


    $district.on('change', function () {

        applyConstituencyFilters();

    });


    $status.on('change', function () {

        applyConstituencyFilters();

    });


    $sort.on('change', function () {

        applyConstituencyFilters();

    });


    // ============================================================
    // RESET FILTERS
    // ============================================================

    $('#resetFiltersBtn').on('click', function () {

        $state.val('');
        $district.val('');
        $constituency.val('');
        $code.val('');
        $status.val('');
        $sort.val('asc');


        // Remove no-result message
        $('#noFilterResultRow').remove();


        // Show all rows
        $rows.show();


        // Reset serial numbers
        $rows.each(function (index) {

            $(this)
                .find('td:first-child')
                .text(index + 1);

        });


        // Apply default A-Z sorting
        applyConstituencyFilters();

    });


    // ============================================================
    // INITIAL LOAD
    // ============================================================

    applyConstituencyFilters();

});
</script>
<script src="<?= base_url('assets/admin/js/header.js') ?>"></script>
</body>

</html>