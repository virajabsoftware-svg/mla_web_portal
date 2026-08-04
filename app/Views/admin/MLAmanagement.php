<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>
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
                   PREMIUM MLA CARD DESIGN — MATCHED RANK & LOGO BADGES
                   ================================================================ */
        .mla-card {
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

        .mla-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold-light);
        }

        .mla-card.party-themed {
            border-top: 5px solid var(--party-primary);
        }

        /* --- CARD HEADER --- */
        .mla-card-header {
            position: relative;
            padding: 20px 22px 0 22px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            background: var(--party-lightbg, #faf1e2);
            min-height: 100px;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            transition: background 0.3s ease;
        }

        /* --- UNIFIED BADGE STYLES (Rank & Logo share same dimensions) --- */
        .badge-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        /* --- LEFT: Party Logo Badge (clean single circle) --- */
        .party-logo-badge {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow:
                0 8px 24px rgba(0, 0, 0, 0.10),
                0 0 0 2px rgba(255, 255, 255, 0.9),
                0 0 0 3px rgba(212, 175, 55, 0.20);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 8px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(248, 242, 235, 0.85));
        }

        .party-logo-badge img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.06));
            transition: transform 0.4s ease;
        }

        .mla-card:hover .party-logo-badge {
            transform: scale(1.05);
            box-shadow:
                0 12px 32px rgba(0, 0, 0, 0.14),
                0 0 0 2px rgba(255, 255, 255, 0.95),
                0 0 0 4px rgba(212, 175, 55, 0.28);
        }

        .mla-card:hover .party-logo-badge img {
            transform: scale(1.04) rotate(-2deg);
        }

        /* --- RIGHT: Rank Badge (identical size & shadow weight) --- */
        .rank-badge {
            background: radial-gradient(circle at 30% 20%, #f5e7c8, #c9a03d);
            box-shadow:
                0 8px 24px rgba(0, 0, 0, 0.10),
                0 0 0 2px #fff3e0,
                0 0 0 4px rgba(212, 175, 55, 0.20);
            flex-direction: column;
            line-height: 1.1;
        }

        .mla-card:hover .rank-badge {
            transform: scale(1.05);
            box-shadow:
                0 12px 32px rgba(0, 0, 0, 0.14),
                0 0 0 2px #fff3e0,
                0 0 0 5px rgba(212, 175, 55, 0.28);
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

        /* --- PHOTO SECTION --- */
        .mla-photo-wrapper {
            position: relative;
            margin-top: -36px;
            padding: 0 20px;
            display: flex;
            justify-content: center;
            z-index: 10;
        }

        .mla-photo-frame {
            position: relative;
            width: 130px;
            height: 150px;
            border-radius: 20px;
            padding: 4px;
            background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--gold-dark));
            box-shadow: 0 12px 28px -8px rgba(0, 0, 0, 0.18);
            transition: all 0.3s ease;
        }

        .mla-card:hover .mla-photo-frame {
            transform: scale(1.02);
            box-shadow: 0 16px 36px -8px rgba(0, 0, 0, 0.25);
        }

        .mla-photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 17px;
            background: #fef6ea;
        }

        /* --- CARD BODY --- */
        .mla-card-body {
            padding: 18px 22px 22px 22px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .mla-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c1f0f;
            margin-bottom: 4px;
            letter-spacing: -0.2px;
        }

        .mla-party-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 4px 16px 4px 12px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 700;
            background: var(--party-lightbg, #f5ede1);
            color: var(--party-primary, #b47c2e);
            border: 1px solid var(--party-secondary, #e8d8c4);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
            margin: 0 auto 10px auto;
        }

        .mla-party-chip .party-icon-sm {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            object-fit: contain;
            background: rgba(255, 255, 255, 0.5);
            padding: 2px;
        }

        .mla-card:hover .mla-party-chip {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .mla-constituency {
            font-size: 0.85rem;
            color: #7a5f3a;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .mla-constituency i {
            color: var(--gold-dark);
            font-size: 0.85rem;
        }

        /* --- ACTION BUTTONS --- */
        .mla-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 6px;
        }

        .btn-premium {
            padding: 7px 16px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.75rem;
            border: none;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--beige);
            color: #5a442a;
        }

        .btn-premium i {
            font-size: 0.8rem;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .btn-premium.gold {
            background: linear-gradient(115deg, #f1e0b5, #e5c989);
            color: #5e3e1a;
        }

        .btn-premium.gold:hover {
            background: #e9cf93;
        }

        .btn-premium.emerald {
            background: #e2ddcd;
            color: #4b5e3c;
        }

        .btn-premium.emerald:hover {
            background: #d6d0be;
        }

        .btn-premium.slate {
            background: #ebe1cf;
            color: #7b5f3a;
        }

        .btn-premium.slate:hover {
            background: #e0d5bf;
        }

        /* --- remove old flag elements --- */
        .flag-wave-stage,
        .flag-attached,
        .waving-flag-img,
        .flagpole-golden,
        .pole-orb,
        .shimmer-overlay,
        .party-flag-label,
        .watermark-logo,
        .flag-podium,
        .avatar-frame,
        .crown-rank,
        .party-chip {
            display: none !important;
        }

        /* ================================================================
                   RESPONSIVE
                   ================================================================ */
        @media (max-width: 576px) {
            .mla-card-header {
                padding: 16px 16px 0 16px;
                min-height: 80px;
            }
            .badge-circle {
                width: 52px;
                height: 52px;
            }
            .rank-badge .rank-number {
                font-size: 1.2rem;
            }
            .rank-badge .rank-label {
                font-size: 0.4rem;
            }
            .party-logo-badge {
                padding: 6px;
            }
            .mla-photo-wrapper {
                margin-top: -28px;
            }
            .mla-photo-frame {
                width: 104px;
                height: 120px;
            }
            .mla-card-body {
                padding: 14px 14px 18px 14px;
            }
            .mla-name {
                font-size: 1.05rem;
            }
            .btn-premium {
                font-size: 0.7rem;
                padding: 6px 12px;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .badge-circle {
                width: 58px;
                height: 58px;
            }
            .mla-photo-frame {
                width: 116px;
                height: 134px;
            }
        }

        /* ================================================================
                   MODAL (unchanged)
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

        .modal-cream .modal-body::-webkit-scrollbar {
            width: 6px;
        }

        .modal-cream .modal-body::-webkit-scrollbar-track {
            background: #f0e5d2;
            border-radius: 10px;
        }

        .modal-cream .modal-body::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 10px;
        }

        .modal-cream .modal-body::-webkit-scrollbar-thumb:hover {
            background: #b8860b;
        }

        .modal-cream .card {
            background: rgba(255, 248, 235, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            transition: all 0.2s;
        }

        .modal-cream .card:hover {
            border-color: #d4af77;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .modal-cream .badge-premium {
            background: linear-gradient(110deg, #d4af37, #f3e5ab);
            color: #2c2418;
            font-weight: 600;
            padding: 0.35rem 0.9rem;
            border-radius: 40px;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .modal-cream .dossier-row {
            border-bottom: 1px dashed rgba(212, 175, 55, 0.4);
            padding: 0.9rem 0;
        }

        .modal-cream .dossier-label {
            font-weight: 700;
            color: #8b6b2c;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        .modal-cream .dossier-value {
            font-weight: 500;
            color: #2b2b1a;
            font-size: 1rem;
        }

        .modal-cream input:focus,
        .modal-cream select:focus,
        .modal-cream textarea:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
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

        @keyframes softGoldPulse {
            0% {
                border-color: rgba(212, 175, 55, 0.3);
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.1);
            }
            50% {
                border-color: rgba(212, 175, 55, 0.9);
                box-shadow: 0 0 8px 0 rgba(212, 175, 55, 0.3);
            }
            100% {
                border-color: rgba(212, 175, 55, 0.3);
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }

        .modal-cream .premium-glow {
            animation: softGoldPulse 2s infinite;
            border-radius: 20px;
        }

        /* ================================================================
                   FOOTER (unchanged)
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
    </style>
</head>

<body class="inner_page widgets">
   <?php include "common/header.php"?>  
                <!-- end topbar -->

                <div class="container-fluid mt-4 px-3 px-lg-5 cream-container">
                    <!-- Hero Section -->
                    <div class="text-center mb-4">
                        <span class="badge badge-cream-gold px-4 py-2 rounded-pill"><i class="fas fa-chart-line me-2"></i> LEGISLATIVE PERFORMANCE INDEX</span>
                        <h1 class="display-5 fw-bold mt-3 gold-gradient-text"><i class="fas fa-landmark me-3"></i> Top 3 Most Ranking MLAs</h1>
                        <div class="gold-divider"></div>
                        <p class="text-muted mt-2" style="color:#9b7c54 !important;">Tracking excellence in governance & development</p>
                    </div>
                    <div id="topMlaSection" class="row g-4 mb-5"></div>

                    <!-- FILTER PAVILION -->
                    <div class="filter-astro p-4 shadow-lg mt-2">
                        <h3 class="mb-4 fw-semibold" style="color:#876b42;"><i class="fas fa-tachometer-alt me-2" style="color: var(--gold-dark);"></i> Constituency Command Center</h3>
                        <div class="row g-3">
                            <div class="col-md-3"><label><i class="fas fa-user-tie me-1"></i> MLA Name</label><input type="text" class="form-control" id="mlaName" placeholder="Search leader"></div>
                            <div class="col-md-3"><label><i class="fas fa-flag-checkered me-1"></i> Party</label><select class="form-select" id="party"><option value="">All Parties</option></select></div>
                            <div class="col-md-3"><label><i class="fas fa-city me-1"></i> District</label><select class="form-select" id="district"><option value="">Select District</option></select></div>
                            <div class="col-md-3"><label><i class="fas fa-map-pin me-1"></i> Constituency</label><select class="form-select" id="constituency"><option value="">Select Constituency</option></select></div>
                            <div class="col-md-3"><label><i class="fas fa-sort-amount-down me-1"></i> Sort by Name</label><select class="form-select" id="sortOrder"><option value="asc">A → Z</option><option value="desc">Z → A</option></select></div>
                        </div>
                        <div class="mt-4 d-flex gap-3 flex-wrap">
                            <button class="btn btn-warm-gold px-4 fw-bold" onclick="filterMLAs()"><i class="fas fa-filter me-2"></i>Deploy Filters</button>
                            <button class="btn btn-outline-cream px-4" onclick="resetAllFilters()"><i class="fas fa-sync-alt me-2"></i>Reset</button>
                        </div>
                    </div>

                    <!-- MLA GRID -->
                    <div class="mt-5">
                        <h2 class="gold-gradient-text fs-2 fw-bold"><i class="fas fa-users me-2"></i> People's Representatives</h2>
                        <div class="row mt-4" id="mlaResult"></div>
                    </div>

                    <!-- FOOTER -->
                    <div class="footer">
                       <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
                    </div>
                </div>

                <!-- Premium Modal -->
                <div class="modal fade" id="premiumModal" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content modal-cream">
                            <div class="modal-header border-warning">
                                <h5 class="modal-title fw-bold" id="premiumModalTitle"><i class="fas fa-id-card me-2"></i>Legislator Dossier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" id="premiumModalBody"></div>
                        </div>
                    </div>
                </div>
                <script>
                    // ============================================================
                    //  PARTY ASSETS CONFIGURATION (centralized)
                    // ============================================================
                    const partyAssets = {
                        "BJP": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmBwcZ-_WB4yCVyhSwF4zZ3MK12ugxutbS7gpOikbaWg&s=10" },
                        "Shiv Sena (ES)": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9qj-N8C5e58x8NOhIvOkNFALgk86OS3yqWmnWiVJbww&s=10" },
                        "NCP": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGWfyFzZjk548RABqcdENBkVxtvamZpWr2VclSPcZHqA&s=10" },
                        "INC": { logo: "assets/party/congress.png" },
                        "NCP (Sharad Pawar)": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGCVHPDHZ0I1H4XD84_f6kdvS5-fCdmbjaKe2sN7wgjQ&s=10" },
                        "Shiv Sena (UBT)": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS13aS-AjFH1-cZwHzxjQivUbfkAYLgroRqU_3C0uwmtg&s=10" },
                        "SP": { logo: "assets/party/sp.png" },
                        "Jan Surajya Shakti": { logo: "assets/party/jansurajya.png" },
                        "AIMIM": { logo: "assets/party/aimim.png" },
                        "CPI(M)": { logo: "assets/party/cpim.png" },
                        "PWPI": { logo: "assets/party/pwpi.png" },
                        "Rashtriya Samaj Paksha": { logo: "assets/party/rsp.png" },
                        "RSVA": { logo: "assets/party/rsva.png" },
                        "Rashtriya Yuva Swabhiman Party": { logo: "assets/party/rysp.png" },
                        "Independent (अपक्ष)": { logo: "assets/party/independent.png" }
                    };

                    // fallback logo for any unmapped party
                    const FALLBACK_LOGO = "assets/party/default.png";

                    // ============================================================
                    //  PARTY COLOR MAP (kept for styling)
                    // ============================================================
                    const partyColorMap = {
                        "BJP": { primary: "#FF6B00", secondary: "#FF8F33", lightBg: "#FFF4E8" },
                        "Shiv Sena (ES)": { primary: "#FF8C00", secondary: "#FFB74D", lightBg: "#FFF8E1" },
                        "NCP": { primary: "#1565FF", secondary: "#42A5F5", lightBg: "#EEF5FF" },
                        "Shiv Sena (UBT)": { primary: "#E53935", secondary: "#EF5350", lightBg: "#FFF1F1" },
                        "INC": { primary: "#00A86B", secondary: "#26C281", lightBg: "#EEFFF7" },
                        "NCP (Sharad Pawar)": { primary: "#7B2CBF", secondary: "#9C4DCC", lightBg: "#F8F0FF" },
                        "SP": { primary: "#FF1744", secondary: "#FF4569", lightBg: "#FFF0F4" },
                        "Jan Surajya Shakti": { primary: "#00897B", secondary: "#26A69A", lightBg: "#ECFFFC" },
                        "AIMIM": { primary: "#00C853", secondary: "#2ECC71", lightBg: "#F0FFF6" },
                        "CPI(M)": { primary: "#C62828", secondary: "#D32F2F", lightBg: "#FFF0F0" },
                        "PWPI": { primary: "#795548", secondary: "#8D6E63", lightBg: "#F7F2F0" },
                        "Rashtriya Samaj Paksha": { primary: "#D81B60", secondary: "#EC407A", lightBg: "#FFF0F6" },
                        "RSVA": { primary: "#3949AB", secondary: "#5C6BC0", lightBg: "#F1F3FF" },
                        "Rashtriya Yuva Swabhiman Party": { primary: "#00BCD4", secondary: "#26C6DA", lightBg: "#EEFDFF" },
                        "Independent (अपक्ष)": { primary: "#546E7A", secondary: "#78909C", lightBg: "#F5F8FA" }
                    };

                    // ============================================================
                    //  MLA DATA (unchanged)
                    // ============================================================
                    const geography = {
                        "Thane": ["Thane", "Kopri-Pachpakhadi", "Ovala-Majiwada", "Mira Bhayandar", "Bhiwandi East",
                            "Bhiwandi West", "Kalyan West", "Kalyan East", "Dombivli", "Ambernath", "Ulhasnagar",
                            "Mumbra-Kalwa", "Airoli", "Belapur"
                        ],
                        "Nagpur": ["Katol", "Savner", "Hingna", "Umred", "Nagpur South West", "Nagpur South",
                            "Nagpur East", "Nagpur Central", "Nagpur West", "Nagpur North", "Kamptee", "Ramtek"
                        ],
                        "Satara": ["Man", "Karad North", "Karad South", "Patan", "Jaoli", "Wai", "Koregaon", "Phaltan",
                            "Khandala"
                        ],
                        "Pune": ["Shirur", "Daund", "Indapur", "Baramati", "Purandar", "Bhor", "Maval", "Chinchwad",
                            "Pimpri", "Bhosari", "Vadgaon Sheri", "Shivajinagar", "Kothrud", "Khadakwasla", "Parvati",
                            "Hadapsar", "Pune Cantonment", "Kasba Peth"
                        ],
                        "Mumbai": ["Colaba", "Malabar Hill", "Mumbadevi", "Byculla", "Shivadi", "Worli", "Mahim",
                            "Dharavi", "Sion Koliwada", "Wadala"
                        ],
                        "Ahmednagar": ["Ahmednagar City", "Shrigonda", "Rahuri"],
                        "Kolhapur": ["Kolhapur North", "Kolhapur South", "Kagal"],
                        "Nashik": ["Nashik East", "Nashik West", "Deolali"]
                    };

                    const mlaAssembly = [
                        { id: 1, name: "Eknath Shinde", district: "Thane", constituency: "Kopri-Pachpakhadi",
                            party: "Shiv Sena (ES)", mobile: "+91 98765 43210",
                            email: "eknath.shinde@maharashtra.gov", totalWorks: 124, approval: "96%", ranking: 1,
                            image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1NGljE8Ngab0V6mQkSMycyNgBuQ8jKzUhV-lEJbcUiw&s=10",
                            works: [{ id: "W001", title: "Thane Coastal Corridor", desc: "6-lane flyover & sea wall",
                                category: "Infra", budget: "₹5.2Cr", status: "Ongoing", progress: "74%",
                                rating: "4.8" }],
                            analytics: { villages: 128, done: 102, pending: 26 } },
                        { id: 2, name: "Devendra Fadnavis", district: "Nagpur", constituency: "Nagpur South West",
                            party: "BJP", mobile: "+91 99887 76655", email: "devendra.fadnavis@mla.in",
                            totalWorks: 140, approval: "98%", ranking: 2, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStvxUGPAClLVGXg8r5U1Cxl7VuSn5KswQO6unnzhdIxQ&s=10",
                            works: [{ id: "W002", title: "Nagpur Metro Phase II", desc: "New corridors + stations",
                                category: "Transport", budget: "₹12Cr", status: "Ongoing", progress: "68%",
                                rating: "4.9" }],
                            analytics: { villages: 112, done: 99, pending: 13 } },
                        { id: 3, name: "Chh Shivendra Raje Bhosale", district: "Satara", constituency: "Jaoli",
                            party: "BJP", mobile: "+91 90909 09090", email: "shivendra@mla.com", totalWorks: 110,
                            approval: "92%", ranking: 3, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq9MdbQ5p9mCdUedqffaq4_dJD_TKSJ64CtpvzEEnMcg&s=10",
                            works: [{ id: "W003", title: "Lift Irrigation Scheme", desc: "Canal + solar pumps",
                                category: "Agriculture", budget: "₹8Cr", status: "Ongoing", progress: "82%",
                                rating: "4.7" }],
                            analytics: { villages: 94, done: 72, pending: 22 } },
                        { id: 4, name: "Makarand Patil", district: "Satara", constituency: "Khandala", party: "NCP",
                            mobile: "+91 88888 81111", email: "Makarandpatil@ncp.in", totalWorks: 130,
                            approval: "94%", ranking: 4, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTksDnHBv0qgkjvbIwYhetTmC4Gg3HAGcot8CdfeZ-XNw&s=10",
                            works: [{ id: "W004", title: "Jalyukta Shivar", desc: "Water conservation + reservoirs",
                                category: "Water", budget: "₹15Cr", status: "Ongoing", progress: "85%",
                                rating: "4.6" }],
                            analytics: { villages: 156, done: 134, pending: 22 } },
                        { id: 5, name: "Uddhav Thackeray", district: "Mumbai", constituency: "Mahim",
                            party: "Shiv Sena (UBT)", mobile: "+91 77777 72222", email: "uddhav@ssubt.org",
                            totalWorks: 95, approval: "89%", ranking: 5, image: "https://i.pinimg.com/736x/f8/c4/68/f8c46840bee48df1157ae44b44dd25ef.jpg",
                            works: [{ id: "W005", title: "Coastal Road Extension", desc: "Sea link + pedestrian plaza",
                                category: "Infra", budget: "₹200Cr", status: "Ongoing", progress: "58%",
                                rating: "4.9" }],
                            analytics: { villages: 68, done: 49, pending: 19 } },
                        { id: 6, name: "Jayant Patil", district: "Pune", constituency: "Indapur",
                            party: "NCP (Sharad Pawar)", mobile: "+91 9876543210", email: "jayant@ncp.com",
                            totalWorks: 88, approval: "91%", ranking: 6, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgW4DmOIsgWr_MlVFaIBQwr0GBxHJzq4MDA1YWpdi0wQ&s=10", works: [],
                            analytics: { villages: 76, done: 62, pending: 14 } },
                        { id: 7, name: "Aaditya Thackeray", district: "Mumbai", constituency: "Worli",
                            party: "Shiv Sena (UBT)", mobile: "+91 9988001122", email: "aaditya@ssubt.org",
                            totalWorks: 112, approval: "93%", ranking: 7, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOBJk4aw0Id3PwJnySMln-nJYdR3vJsTgINJAs3FBtg&s=10",
                            works: [{ id: "W006", title: "Worli Beautification", desc: "Coastal cycling track",
                                category: "Infra", budget: "₹22Cr", status: "Ongoing", progress: "45%",
                                rating: "4.7" }],
                            analytics: { villages: 51, done: 40, pending: 11 } },
                        { id: 8, name: "Amit Kadam", district: "Satara", constituency: "Jaoli",
                            party: "Shiv Sena (UBT)", mobile: "+91 90390 09090", email: "amitkadam@mla.com",
                            totalWorks: 110, approval: "92%", ranking: 8, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVsYF2Sfv60e4N3RTNPDbmvIH2xGdbTn9D5WdQfGa6pw&s=10",
                            works: [{ id: "W003", title: "Lift Irrigation Scheme", desc: "Canal + solar pumps",
                                category: "Agriculture", budget: "₹5Cr", status: "Ongoing", progress: "52%",
                                rating: "2.7" }],
                            analytics: { villages: 94, done: 50, pending: 44 } },
                        { id: 9, name: "Kedar Dighe", district: "Thane", constituency: "Kopri-Pachpakhadi",
                            party: "Shiv Sena (UBT)", mobile: "+91 98767 43210",
                            email: "kedardighe@maharashtra.gov", totalWorks: 30, approval: "66%", ranking: 9,
                            image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWvvLHD_KEEToCjzzaVXJAbczt1cKLuTldAXrFWmGYwsLple0zQY5saPeE&s=10",
                            works: [{ id: "W001", title: "Thane Coastal Corridor", desc: "6-lane flyover & sea wall",
                                category: "Infra", budget: "₹2.2Cr", status: "Ongoing", progress: "74%",
                                rating: "3.8" }],
                            analytics: { villages: 128, done: 70, pending: 56 } }
                    ];

                    // ============================================================
                    //  HELPER: get party logo URL
                    // ============================================================
                    function getPartyLogo(partyName) {
                        const asset = partyAssets[partyName];
                        if (asset && asset.logo) return asset.logo;
                        return FALLBACK_LOGO;
                    }

                    // ============================================================
                    //  BUILD MLA CARD — MATCHED BADGE STYLING
                    // ============================================================
                    function buildMLACard(mla) {
                        const style = partyColorMap[mla.party] || partyColorMap["Independent (अपक्ष)"];
                        const logoUrl = getPartyLogo(mla.party);

                        return `<div class="col-lg-4 col-md-6 mb-4">
                            <div class="mla-card party-themed" style="--party-primary: ${style.primary}; --party-lightbg: ${style.lightBg}; border-top: 5px solid ${style.primary};">
                                <!-- HEADER: party logo (left) + rank (right) — identical styling -->
                                <div class="mla-card-header" style="background: ${style.lightBg};">
                                    <!-- Left: Party Logo Badge (clean single circle) -->
                                    <div class="badge-circle party-logo-badge">
                                        <img src="${logoUrl}" alt="${mla.party}" onerror="this.src='${FALLBACK_LOGO}'">
                                    </div>
                                    <!-- Right: Rank Badge (identical size & shadow) -->
                                    <div class="badge-circle rank-badge">
                                        <span class="rank-number">${mla.ranking}</span>
                                        <span class="rank-label">Rank</span>
                                    </div>
                                </div>

                                <!-- PHOTO -->
                                <div class="mla-photo-wrapper">
                                    <div class="mla-photo-frame">
                                        <img src="${mla.image}" onerror="this.src='https://ui-avatars.com/api/?background=${style.primary.replace('#', '')}&color=fff&name=${encodeURIComponent(mla.name)}&rounded=false&size=130'" alt="${mla.name}">
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="mla-card-body">
                                    <div class="mla-name">${mla.name}</div>
                                    <div class="mla-party-chip" style="background:${style.lightBg}; color:${style.primary}; border-color:${style.secondary};">
                                        <img src="${logoUrl}" class="party-icon-sm" alt="${mla.party}" onerror="this.src='${FALLBACK_LOGO}'">
                                        ${mla.party}
                                    </div>
                                    <div class="mla-constituency">
                                        <i class="fas fa-location-dot"></i> ${mla.district} · ${mla.constituency}
                                    </div>
                                    <div class="mla-actions">
                                        <button class="btn-premium gold" onclick="showProfile(${mla.id})"><i class="fas fa-id-card"></i> Bio</button>
                                        <button class="btn-premium emerald" onclick="showWorks(${mla.id})"><i class="fas fa-tasks"></i> Works</button>
                                        <button class="btn-premium slate" onclick="showVillageAnalytics(${mla.id})"><i class="fas fa-chart-simple"></i> Impact</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    }

                    // ============================================================
                    //  FILTER / RENDER LOGIC (unchanged)
                    // ============================================================
                    function populateDistricts() {
                        let select = document.getElementById("district");
                        select.innerHTML = '<option value="">Select District</option>';
                        Object.keys(geography).sort().forEach(d => select.innerHTML +=
                        `<option value="${d}">${d}</option>`);
                    }
                    window.loadConstituencies = function() {
                        let district = document.getElementById("district").value;
                        let constSelect = document.getElementById("constituency");
                        constSelect.innerHTML = '<option value="">Select Constituency</option>';
                        if (geography[district]) geography[district].forEach(c => constSelect.innerHTML +=
                            `<option value="${c}">${c}</option>`);
                    };
                    document.getElementById("district")?.addEventListener("change", loadConstituencies);

                    function populatePartyFilter() {
                        let parties = [...new Set(mlaAssembly.map(m => m.party))];
                        let partySelect = document.getElementById("party");
                        parties.forEach(p => { partySelect.innerHTML += `<option value="${p}">${p}</option>`; });
                    }

                    function displayTopChampions() {
                        const topRankers = [...mlaAssembly].sort((a, b) => a.ranking - b.ranking).slice(0, 3);
                        document.getElementById("topMlaSection").innerHTML = topRankers.map(m => buildMLACard(m)).join('');
                    }

                    function filterMLAs() {
                        let name = document.getElementById("mlaName").value.toLowerCase();
                        let party = document.getElementById("party").value;
                        let district = document.getElementById("district").value;
                        let constituency = document.getElementById("constituency").value;
                        let sort = document.getElementById("sortOrder").value;
                        let filtered = mlaAssembly.filter(m =>
                            (!name || m.name.toLowerCase().includes(name)) &&
                            (!party || m.party === party) &&
                            (!district || m.district === district) &&
                            (!constituency || m.constituency === constituency)
                        );
                        filtered.sort((a, b) => sort === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a
                        .name));
                        let container = document.getElementById("mlaResult");
                        if (filtered.length === 0) container.innerHTML =
                            `<div class="col-12 text-center p-5"><i class="fas fa-chess-queen fa-4x" style="color:var(--gold);"></i><h4 class="mt-3">No representatives match</h4></div>`;
                        else container.innerHTML = filtered.map(m => buildMLACard(m)).join('');
                    }

                    function resetAllFilters() {
                        document.getElementById("mlaName").value = "";
                        document.getElementById("party").value = "";
                        document.getElementById("district").value = "";
                        document.getElementById("constituency").innerHTML = '<option value="">Select Constituency</option>';
                        document.getElementById("sortOrder").value = "asc";
                        filterMLAs();
                    }

                    // ============================================================
                    //  MODAL FUNCTIONS (unchanged)
                    // ============================================================
                    window.showProfile = (id) => {
                        let m = mlaAssembly.find(i => i.id === id);
                        document.getElementById("premiumModalTitle").innerHTML =
                            `<i class="fas fa-user-graduate"></i> ${m.name} · Ministerial Profile`;
                        document.getElementById("premiumModalBody").innerHTML = `
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img src="${m.image}" style="width:140px;height:140px;object-fit:cover;border-radius:20px;border:3px solid var(--gold);">
                                    <h3>${m.name}</h3>
                                    <span class="badge fs-6 px-4 py-2" style="background:#d4af37;">${m.party}</span>
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-cream table-bordered">
                                        ${Object.entries({ Name: m.name, Party: m.party, District: m.district, Constituency: m.constituency, Mobile: m.mobile, Email: m.email, "Total Projects": m.totalWorks, Approval: m.approval, Rank: `#${m.ranking}` }).map(([k, v]) => `<tr><th>${k}</th><td>${v}<tr></tr>`).join('')}
                                    </table>
                                </div>
                            </div>`;
                        new bootstrap.Modal(document.getElementById("premiumModal")).show();
                    };

                    window.showWorks = (id) => {
                        let m = mlaAssembly.find(i => i.id === id);
                        let workHtml = `<h4 class="mb-3">📌 Legislative Works · ${m.name}</h4>`;
                        if (m.works.length === 0) workHtml += "<p>No works officially published yet.</p>";
                        else m.works.forEach(w => {
                            workHtml +=
                                `<div class="card mb-3 border-0 shadow-sm bg-light"><div class="card-body"><h5><i class="fas fa-hard-hat me-2"></i>${w.title}</h5><table class="table table-sm">${Object.entries({ Category: w.category, Budget: w.budget, Status: w.status, Progress: w.progress, Rating: w.rating }).map(([k, v]) => `<tr><th>${k}</th><td>${v}</td></tr>`).join('')}</td><p>${w.desc}</p></div></div>`;
                        });
                        document.getElementById("premiumModalBody").innerHTML = workHtml;
                        new bootstrap.Modal(document.getElementById("premiumModal")).show();
                    };

                    window.showVillageAnalytics = (id) => {
                        let m = mlaAssembly.find(i => i.id === id);
                        let percent = Math.round((m.analytics.done / m.analytics.villages) * 100);
                        document.getElementById("premiumModalBody").innerHTML = `
                            <div class="text-center">
                                <i class="fas fa-chart-pie fa-3x mb-3"></i>
                                <h3>${m.name} · Grassroot Index</h3>
                                <div class="row mt-4">
                                    <div class="col-md-4"><div class="stat-orb"><div class="stat-digit-xl">${m.analytics.villages}</div>Wards/Villages</div></div>
                                    <div class="col-md-4"><div class="stat-orb"><div class="stat-digit-xl">${m.analytics.done}</div>Fully Developed</div></div>
                                    <div class="col-md-4"><div class="stat-orb"><div class="stat-digit-xl">${m.analytics.pending}</div>Under Progress</div></div>
                                </div>
                                <div class="mt-4"><div class="progress" style="height:28px;"><div class="progress-bar progress-bar-custom fw-bold" style="width:${percent}%">${percent}% Coverage</div></div></div>
                            </div>`;
                        new bootstrap.Modal(document.getElementById("premiumModal")).show();
                    };

                    // ============================================================
                    //  INIT
                    // ============================================================
                    document.addEventListener("DOMContentLoaded", () => {
                        populateDistricts();
                        populatePartyFilter();
                        displayTopChampions();
                        filterMLAs();
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
                </script>
                <script src="header.js">
                </script>
</body>

</html>