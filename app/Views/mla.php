
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>

    <!-- Bootstrap & Fonts -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700;800&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        /* ============================================================
           GLOBAL FONT
        ============================================================ */

        * {
            font-family: 'El Messiri', sans-serif !important;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'El Messiri', 'Elms Sans', 'Inter', sans-serif;
            background: #F5F3F0;
            overflow-x: hidden;
        }


        :root {
            --primary: #1A1A2E;
            --accent: #E87A2A;
            --accent-light: #F5A623;
            --accent-dark: #C96A1F;

            --gray-50: #FAF8F6;
            --gray-100: #F0EEEA;
            --gray-200: #E0DCD6;
            --gray-300: #C5C0B8;
            --gray-400: #A8A29A;
            --gray-500: #8A847C;
            --gray-600: #6B655D;
            --gray-700: #4C4741;
            --gray-800: #2E2A26;
            --gray-900: #1A1714;

            --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.06);
            --shadow-lg: 0 12px 40px rgba(0,0,0,0.08);
            --shadow-xl: 0 24px 60px rgba(0,0,0,0.10);

            --radius-sm: 8px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 32px;
            --radius-full: 9999px;

            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }


        /* ============================================================
           TYPOGRAPHY
        ============================================================ */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading,
        .playfair {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--primary);
        }

        .body-text {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            line-height: 1.7;
            color: var(--gray-600);
        }

        .text-accent {
            color: var(--accent);
        }


        /* ============================================================
           BUTTONS
        ============================================================ */

        .btn-orange {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            border: none;
            color: #fff;
            padding: 10px 28px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition);
            box-shadow: 0 6px 20px rgba(232, 122, 42, 0.25);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(232, 122, 42, 0.35);
            color: #fff;
        }

        .btn-outline-orange {
            background: transparent;
            border: 2px solid var(--accent);
            color: var(--accent);
            padding: 8px 24px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-outline-orange:hover {
            background: var(--accent);
            color: #fff;
            transform: translateY(-2px);
        }


        /* ============================================================
           HEADER
        ============================================================ */

        .header-premium {
            background: #fff;
            display: flex;
            align-items: center;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            border-radius: 0 0 18px 18px;
            position: sticky;
            top: 0;
            z-index: 999;
            flex-direction: column;
            width: 100%;
        }

        .header-flag-strip {
            width: 100%;
            height: 5px;
            flex-shrink: 0;

            background: linear-gradient(
                90deg,
                #FF9933 0%,
                #FF9933 33.33%,
                #ffffff 33.33%,
                #ffffff 66.66%,
                #138808 66.66%,
                #138808 100%
            );
        }

        .header-premium .container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            height: 76px;
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .logo-img {
            width: 46px;
            height: 46px;
            object-fit: contain;
            border-radius: 50%;
            border: 2px solid rgba(232, 122, 42, 0.15);
            padding: 2px;
            transition: var(--transition);
        }

        .logo-img:hover {
            border-color: var(--accent);
            transform: scale(1.05);
        }

        .logo-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1.1;
        }

        .logo-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .logo-title span {
            color: var(--accent);
        }

        .logo-subtitle {
            font-size: 0.65rem;
            font-weight: 600;
            color: #D72638;
            margin-top: 0px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            opacity: 0.85;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-links a {
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--gray-600);
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-links a:hover {
            background: var(--gray-100);
            color: var(--primary);
        }

        .nav-links a.active {
            color: var(--accent);
            background: rgba(232, 122, 42, 0.08);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .theme-btn {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.1rem;
            color: var(--gray-600);
        }

        .theme-btn:hover {
            background: var(--gray-100);
            color: var(--accent);
        }

        .hamburger {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            cursor: pointer;
            transition: var(--transition);
        }

        .hamburger:hover {
            background: var(--gray-100);
        }

        .hamburger span {
            width: 18px;
            height: 2px;
            background: var(--gray-800);
            border-radius: 2px;
            transition: var(--transition);
        }

        .hamburger:hover span {
            background: var(--accent);
        }

        .offcanvas {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            width: 300px;
            max-width: 85vw;
            border: none;
        }

        .offcanvas .offcanvas-header {
            border-bottom: 1px solid var(--gray-100);
            padding: 16px 20px;
        }

        .offcanvas .offcanvas-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .offcanvas .offcanvas-body a {
            padding: 12px 0;
            font-weight: 500;
            color: var(--gray-700);
            text-decoration: none;
            border-bottom: 1px solid var(--gray-100);
            transition: var(--transition);
        }

        .offcanvas .offcanvas-body a:hover {
            color: var(--accent);
            padding-left: 8px;
        }


        /* ============================================================
           ALL MLA SECTION
        ============================================================ */

        .section-padding {
            padding: 60px 0;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
        }

        .section-sub {
            color: var(--gray-500);
            font-size: 0.85rem;
        }

        .all-mlas-section {
            background: var(--gray-50);
            min-height: 500px;
        }


        /* ============================================================
           FILTER BAR
        ============================================================ */

        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .filter-bar input,
        .filter-bar select {
            padding: 8px 14px;
            border-radius: var(--radius-full);
            border: 1px solid var(--gray-200);
            font-size: 0.8rem;
            background: #fff;
            transition: var(--transition);
            flex: 1;
            min-width: 140px;
        }

        .filter-bar input:focus,
        .filter-bar select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(232, 122, 42, 0.06);
        }


        /* ============================================================
           MLA CARD
        ============================================================ */

        .mla-card-ref {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-100);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .mla-card-ref:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: rgba(232, 122, 42, 0.1);
        }

        .mla-card-ref .avatar-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            color: #fff;
            flex-shrink: 0;
            overflow: hidden;
        }

        .mla-card-ref .avatar-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .mla-card-ref .avatar-circle .initials-fallback {
            font-weight: 700;
            font-size: 1.2rem;
            color: #fff;
        }

        .mla-card-ref .mla-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0;
        }

        .mla-card-ref .mla-name-mr {
            font-size: 0.8rem;
            color: var(--gray-500);
            font-weight: 400;
        }

        .mla-card-ref .mla-constituency {
            font-size: 0.8rem;
            color: var(--gray-500);
        }

        .mla-card-ref .mla-constituency i {
            font-size: 0.7rem;
        }

        .mla-card-ref .party-badge {
            display: inline-block;
            padding: 2px 14px;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 700;
            background: var(--gray-100);
            color: var(--gray-700);
        }

        .mla-card-ref .party-badge.bjp {
            background: #FF6B00;
            color: #fff;
        }

        .mla-card-ref .party-badge.ss {
            background: #FF8C00;
            color: #fff;
        }

        .mla-card-ref .party-badge.ncp {
            background: #1565FF;
            color: #fff;
        }

        .mla-card-ref .party-badge.inc {
            background: #00A86B;
            color: #fff;
        }

        .mla-card-ref .party-badge.ssubt {
            background: #E53935;
            color: #fff;
        }

        .mla-card-ref .elected-year {
            font-size: 0.6rem;
            color: var(--gray-400);
        }

        .mla-card-ref .info-row {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 0.75rem;
            color: var(--gray-600);
            margin-top: 8px;
            flex-wrap: wrap;
        }

        .mla-card-ref .info-row .rating-value {
            font-weight: 700;
            color: var(--primary);
        }

        .mla-card-ref .info-row .stars {
            color: var(--accent);
            letter-spacing: 1px;
        }

        .mla-card-ref .manifesto-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 6px;
        }

        .mla-card-ref .manifesto-row .manifesto-text {
            font-size: 0.7rem;
            color: var(--gray-500);
        }

        .mla-card-ref .manifesto-row .progress-bar-custom {
            height: 6px;
            background: var(--gray-200);
            border-radius: 4px;
            overflow: hidden;
            flex: 1;
            max-width: 100px;
        }

        .mla-card-ref .manifesto-row .progress-bar-custom .fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(
                90deg,
                var(--accent),
                var(--accent-light)
            );
            transition: width 0.6s ease;
        }

        .mla-card-ref .manifesto-row .manifesto-percent {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--primary);
        }

        .mla-card-ref .card-actions {
            display: flex;
            gap: 8px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid var(--gray-100);
        }

        .btn-rate {
            background: linear-gradient(
                135deg,
                var(--accent),
                var(--accent-dark)
            );
            border: none;
            color: #fff;
            padding: 6px 18px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.75rem;
            transition: var(--transition);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-rate:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 16px rgba(232, 122, 42, 0.3);
            color: #fff;
        }

        .btn-view-all {
            background: var(--gray-100);
            border: none;
            color: var(--gray-700);
            padding: 6px 20px;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.75rem;
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-view-all:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
        }


        /* ============================================================
           FOOTER
        ============================================================ */

        .footer-premium {
            background: #ffffff;
            color: var(--gray-700);
            padding: 0;
            margin-top: 0;
            border: none;
            box-shadow: 0 -4px 30px rgba(0, 0, 0, 0.04);
        }

        .footer-flag-strip {
            width: 100%;
            height: 5px;
            flex-shrink: 0;

            background: linear-gradient(
                90deg,
                #FF9933 0%,
                #FF9933 33.33%,
                #ffffff 33.33%,
                #ffffff 66.66%,
                #138808 66.66%,
                #138808 100%
            );
        }

        .footer-content {
            padding: 40px 0 24px;
        }

        .footer-premium .brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
        }

        .footer-premium .brand span {
            color: var(--accent);
        }

        .footer-premium p {
            font-size: 0.8rem;
            color: var(--gray-600);
        }

        .footer-premium a {
            color: var(--gray-500);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.8rem;
        }

        .footer-premium a:hover {
            color: var(--accent);
        }

        .footer-premium h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--primary);
            font-size: 0.9rem;
            margin-bottom: 16px;
        }

        .footer-premium ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-premium ul li {
            margin-bottom: 8px;
        }

        .footer-premium .bottom {
            border-top: 1px solid var(--gray-100);
            padding-top: 16px;
            margin-top: 24px;
            text-align: center;
            font-size: 0.7rem;
            color: var(--gray-400);
        }


        /* ============================================================
           MODAL
        ============================================================ */

        .modal-premium .modal-content {
            border-radius: var(--radius-lg);
            border: none;
            box-shadow: var(--shadow-xl);
        }

        .modal-premium .modal-header {
            border-bottom: 1px solid var(--gray-100);
            padding: 16px 24px;
        }

        .modal-premium .modal-header .modal-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .modal-premium .modal-body {
            padding: 24px;
        }


        /* ============================================================
           RATING QUESTIONS
        ============================================================ */

        .rating-question {
            background: var(--gray-50);
            padding: 16px 20px;
            border-radius: var(--radius-md);
            margin-bottom: 12px;
            border-left: 3px solid var(--accent);
        }

        .rating-question .q-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--primary);
            margin-bottom: 6px;
        }

        .rating-stars {
            display: flex;
            gap: 2px;
        }

        .rating-stars button {
            background: none;
            border: none;
            font-size: 1.6rem;
            padding: 0 2px;
            cursor: pointer;
            color: var(--gray-300);
            transition: var(--transition);
        }

        .rating-stars button.active {
            color: #F5A623;
        }

        .rating-stars button:hover {
            transform: scale(1.1);
            color: #F5A623;
        }


        /* ============================================================
           REPORT CARD
        ============================================================ */

        .report-card {
            max-width: 600px;
            margin: 0 auto;
        }

        .report-card .stars-big {
            font-size: 2.4rem;
            letter-spacing: 4px;
            color: var(--accent);
        }

        .report-card .report-section {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f5f0e8;
        }

        .report-card .report-section .label {
            font-weight: 600;
            color: #5a442a;
            font-size: 0.9rem;
        }

        .report-card .report-section .value {
            font-weight: 500;
            color: #2c2418;
            text-align: right;
            max-width: 60%;
            font-size: 0.9rem;
        }


        /* ============================================================
           SHARE BUTTONS
        ============================================================ */

        .share-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 20px;
            justify-content: center;
        }

        .share-btn {
            padding: 6px 16px;
            border: none;
            border-radius: var(--radius-full);
            font-weight: 600;
            font-size: 0.75rem;
            transition: var(--transition);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .share-btn:hover {
            transform: translateY(-2px);
        }

        .share-btn.whatsapp {
            background: #25D366;
            color: #fff;
        }

        .share-btn.twitter {
            background: #1DA1F2;
            color: #fff;
        }

        .share-btn.facebook {
            background: #1877F2;
            color: #fff;
        }

        .share-btn.copy {
            background: var(--gray-600);
            color: #fff;
        }


        /* ============================================================
           RESPONSIVE
        ============================================================ */

        @media (max-width: 768px) {

            .filter-premium {
                padding: 16px;
            }

            .mla-card-ref .info-row {
                flex-wrap: wrap;
                gap: 8px;
            }

            .section-padding {
                padding: 40px 0;
            }
        }

        @media (max-width: 576px) {

            .logo-title {
                font-size: 1rem;
            }

            .logo-subtitle {
                font-size: 0.55rem;
                letter-spacing: 0.8px;
            }

            .logo-img {
                width: 36px;
                height: 36px;
            }

            .logo-wrapper {
                gap: 8px;
            }

            .header-premium .container {
                height: 64px;
            }
        }


        /* ============================================================
           SCROLL REVEAL
        ============================================================ */

        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: all 0.7s cubic-bezier(
                0.25,
                0.46,
                0.45,
                0.94
            );
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }


        /* ============================================================
           HEADER SCROLL
        ============================================================ */

        .header-premium.scrolled {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

    </style>

</head>


<body>


    <!-- ============================================================
         HEADER
    ============================================================ -->

    <header class="header-premium" id="premiumHeader">

        <div class="header-flag-strip"></div>

        <div class="container">

            <div class="header-inner">

                <a href="<?= base_url('/') ?>" class="logo-wrapper">

                    <img
                        src="https://png.pngtree.com/png-clipart/20250222/original/pngtree-vibrant-watercolor-painting-of-the-ashoka-chakra-indian-flag-emblem-png-image_20495965.png"
                        class="logo-img"
                        alt="Logo">

                    <div class="logo-content">

                        <div class="logo-title">
                            Leader
                        </div>

                        <div class="logo-subtitle">
                            Tracker
                        </div>

                    </div>

                </a>


                <nav class="nav-links d-none d-lg-flex">

                    <a href="<?= base_url('/') ?>">
                        Home
                    </a>

                    <a href="<?= base_url('mla') ?>" class="active">
                        MLAs
                    </a>

                    <a href="<?= base_url('leadership') ?>">
                        Leaderboard
                    </a>

                </nav>


                <div class="header-actions">

                    <button class="theme-btn" type="button">
                        <i class="bi bi-moon"></i>
                    </button>

                    <button
                        class="hamburger d-lg-none"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#mobileMenu">

                        <span></span>
                        <span></span>
                        <span></span>

                    </button>

                </div>

            </div>

        </div>

    </header>


    <!-- ============================================================
         MOBILE MENU
    ============================================================ -->

    <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="mobileMenu">

        <div class="offcanvas-header">

            <div class="logo-text">
                Maharashtra
                <span>MLA Watch</span>
            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas">
            </button>

        </div>


        <div class="offcanvas-body">

            <a href="<?= base_url('/') ?>">
                Home
            </a>

            <a href="<?= base_url('mla') ?>" class="active">
                MLAs
            </a>

            <a href="<?= base_url('leadership') ?>">
                Leaderboard
            </a>

            <a href="#">
                Report Cards
            </a>

        </div>

    </div>


    <!-- ============================================================
         MAIN CONTENT
    ============================================================ -->

    <section
        class="all-mlas-section section-padding"
        id="allMlasSection">

        <div class="container">


            <div class="section-header reveal">

                <div>

                    <h2 class="section-title-sm">
                        All MLAs
                    </h2>

                    <span class="section-sub">
                        Browse and rate Maharashtra representatives
                    </span>

                </div>

            </div>


            <!-- ====================================================
                 FILTER BAR
            ==================================================== -->

            <div class="filter-bar reveal">

                <input
                    type="text"
                    id="mlaName"
                    placeholder="Search by name..."
                    class="form-control"
                    style="border-radius:var(--radius-full);">


                <select
                    id="party"
                    class="form-select"
                    style="border-radius:var(--radius-full);">

                    <option value="">
                        All Parties
                    </option>

                </select>


                <select
                    id="district"
                    class="form-select"
                    style="border-radius:var(--radius-full);">

                    <option value="">
                        All Districts
                    </option>

                </select>


                <select
                    id="sortOrder"
                    class="form-select"
                    style="border-radius:var(--radius-full);">

                    <option value="asc">
                        A → Z
                    </option>

                    <option value="desc">
                        Z → A
                    </option>

                </select>


                <button
                    class="btn-orange"
                    onclick="filterMLAs()"
                    style="padding:8px 24px;font-size:0.8rem;">

                    <i class="bi bi-search"></i>
                    Filter

                </button>


                <button
                    class="btn-outline-orange"
                    onclick="resetAllFilters()"
                    style="padding:8px 20px;font-size:0.8rem;">

                    Reset

                </button>

            </div>


            <!-- ====================================================
                 MLA RESULT
            ==================================================== -->

            <div  class="row g-4"   id="mlaResult">
            </div>


        </div>

    </section>


    <!-- ============================================================
         FOOTER
    ============================================================ -->

    <footer class="footer-premium">

        <div class="footer-flag-strip"></div>

        <div class="container footer-content">

            <div class="row g-4">


                <div class="col-md-4">

                    <div class="brand">
                        Leader<span> Tracker</span>
                    </div>

                    <p
                        style="max-width:300px;margin-top:8px;color:var(--gray-600);">

                        A citizen-powered accountability platform tracking
                        work done and manifesto fulfillment by Maharashtra MLAs.

                    </p>

                    <p
                        style="font-size:0.7rem;color:var(--gray-400);">

                        All ratings are citizen-submitted.
                        Data is crowdsourced and reflects public opinion.

                    </p>

                </div>


                <div class="col-6 col-md-2">

                    <h6>
                        Quick Links
                    </h6>

                    <ul class="list-unstyled">

                        <li>
                            <a href="<?= base_url('/') ?>">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('mla') ?>">
                                MLAs
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('leadership') ?>">
                                Leaderboard
                            </a>
                        </li>

                    </ul>

                </div>


                <div class="col-6 col-md-2">

                    <h6>
                        Resources
                    </h6>

                    <ul class="list-unstyled">

                        <li>
                            <a href="#">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Contact
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Privacy Policy
                            </a>
                        </li>

                    </ul>

                </div>


                <div class="col-md-4">

                    <h6>
                        Stay Updated
                    </h6>

                    <div class="d-flex gap-2">

                        <input
                            type="email"
                            class="form-control"
                            placeholder="Your email"
                            style="
                                border-radius:var(--radius-full);
                                border:1px solid var(--gray-200);
                                padding:8px 14px;
                                font-size:0.8rem;
                            ">

                        <button
                            class="btn-orange"
                            style="
                                padding:8px 18px;
                                font-size:0.75rem;
                            ">

                            Subscribe

                        </button>

                    </div>

                </div>

            </div>


            <div class="bottom">

                <p>

                    &copy;

                    <script>
                        document.write(new Date().getFullYear());
                    </script>

                    Leader Tracker.
                    All rights reserved.

                </p>

            </div>

        </div>

    </footer>


    <!-- ============================================================
         PROFILE MODAL
    ============================================================ -->

    <div
        class="modal fade modal-premium"
        id="premiumModal"
        tabindex="-1">

        <div
            class="modal-dialog modal-xl modal-dialog-scrollable">

            <div class="modal-content">

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="premiumModalTitle">

                        <i class="bi bi-person-badge me-2"></i>
                        MLA Profile

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div
                    class="modal-body"
                    id="premiumModalBody">
                </div>

            </div>

        </div>

    </div>


    <!-- ============================================================
         RATING MODAL
    ============================================================ -->

    <div
        class="modal fade modal-premium"
        id="ratingModal"
        tabindex="-1">

        <div
            class="modal-dialog modal-xl modal-dialog-scrollable">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-star-fill text-accent me-2"></i>

                        Rate Your MLA

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div
                    class="modal-body"
                    id="ratingModalBody">


                    <div
                        id="ratingMlaInfo"
                        class="p-4 mb-4"
                        style="
                            background:var(--gray-50);
                            border-radius:var(--radius-md);
                            border-left:4px solid var(--accent);
                        ">

                        <h5 class="fw-bold">

                            <i class="bi bi-person me-2"></i>

                            Rate Your MLA

                        </h5>


                        <div class="row mt-2">

                            <div class="col-md-6">

                                <strong>
                                    MLA Name:
                                </strong>

                                <span id="ratingMlaName">
                                    —
                                </span>

                            </div>


                            <div class="col-md-6">

                                <strong>
                                    Constituency:
                                </strong>

                                <span id="ratingMlaConstituency">
                                    —
                                </span>

                            </div>

                        </div>

                    </div>


                    <div
                        id="ratingSurveyContainer">
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ============================================================
         REPORT MODAL
    ============================================================ -->

    <div
        class="modal fade modal-premium"
        id="reportModal"
        tabindex="-1">

        <div
            class="modal-dialog modal-xl modal-dialog-scrollable">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-file-earmark-text me-2"></i>

                        MLA Performance Report

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div
                    class="modal-body"
                    id="reportModalBody">
                </div>

            </div>

        </div>

    </div>


    <!-- ============================================================
         BOOTSTRAP 5
    ============================================================ -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>


    <script>


        /* ============================================================
           DYNAMIC MLA DATA FROM CODEIGNITER
        ============================================================ */

        const mlaAssembly = <?= json_encode(
            array_map(function ($mla) {

                $profilePhoto = $mla['profile_photo'] ?? '';

                /*
                 * If profile_photo already contains full URL,
                 * use it directly.
                 *
                     * Otherwise use public/uploads/mla/
                 */

                if (!empty($profilePhoto)) {

                    if (
                        filter_var(
                            $profilePhoto,
                            FILTER_VALIDATE_URL
                        )
                    ) {

                        $image = $profilePhoto;

                    } else {

                        $image = base_url(
                            'uploads/mla/' . rawurlencode(basename(str_replace('\\', '/', $profilePhoto)))
                        );

                    }

                } else {

                    $image = '';

                }


                $joiningYear = '';

                if (!empty($mla['joining_date'])) {

                    $timestamp = strtotime(
                        $mla['joining_date']
                    );

                    if ($timestamp) {

                        $joiningYear = date(
                            'Y',
                            $timestamp
                        );

                    }

                }


                return [

                    'id' => (int)($mla['id'] ?? 0),

                    'name' => $mla['mla_name'] ?? '',

                    /*
                     * If Marathi name is not stored separately,
                     * English name will be displayed.
                     */
                    'marathiName' => $mla['marathi_name']
                        ?? $mla['mla_name']
                        ?? '',

                    'district' => $mla['district_name'] ?? '',

                    'constituency' => $mla['constituency_name'] ?? '',

                    'party' => $mla['party'] ?? '',

                    'mobile' => $mla['mobile'] ?? '',

                    'email' => $mla['email'] ?? '',

                    'gender' => $mla['gender'] ?? '',

                    'address' => $mla['address'] ?? '',

                    'pincode' => $mla['pincode'] ?? '',

                    'image' => $image,

                    'firstElected' => $joiningYear ?: 'N/A',

                    /*
                     * Existing UI fields.
                     * Later these can also be connected
                     * with rating/work tables.
                     */

                    'totalWorks' => (int)(
                        $mla['totalWorks']
                        ?? $mla['total_works']
                        ?? 0
                    ),

                    'approval' => $mla['approval']
                        ?? '0%',

                    'ranking' => (int)(
                        $mla['ranking']
                        ?? 0
                    ),

                    'ratings' => (int)(
                        $mla['ratings']
                        ?? 0
                    ),

                    'ratingScore' => (float)(
                        $mla['ratingScore']
                        ?? $mla['rating_score']
                        ?? 0
                    ),

                    'manifestoFulfilled' => (int)(
                        $mla['manifestoFulfilled']
                        ?? $mla['manifesto_fulfilled']
                        ?? 0
                    ),

                    'education' => $mla['education']
                        ?? 'N/A',

                    'profession' => $mla['profession']
                        ?? 'Politician',

                    'age' => $mla['age']
                        ?? 'N/A',

                    'currentTerm' => $mla['currentTerm']
                        ?? $mla['current_term']
                        ?? 'N/A',

                    'committees' => $mla['committees']
                        ?? 'N/A',

                    'contact' => $mla['mobile']
                        ?? 'N/A',

                    'social' => $mla['social']
                        ?? '',

                    'bio' => $mla['bio']
                        ?? ''

                ];

            }, $mlas ?? []),

            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        ) ?>;


        console.log(
            'Dynamic MLA Data:',
            mlaAssembly
        );


        /* ============================================================
           PARTY COLORS
        ============================================================ */

        const partyColorMap = {

            "BJP": {
                primary: "#FF6B00",
                secondary: "#FF8F33",
                lightBg: "#FFF4E8"
            },

            "Shiv Sena (ES)": {
                primary: "#FF8C00",
                secondary: "#FFB74D",
                lightBg: "#FFF8E1"
            },

            "NCP": {
                primary: "#1565FF",
                secondary: "#42A5F5",
                lightBg: "#EEF5FF"
            },

            "Shiv Sena (UBT)": {
                primary: "#E53935",
                secondary: "#EF5350",
                lightBg: "#FFF1F1"
            },

            "INC": {
                primary: "#00A86B",
                secondary: "#26C281",
                lightBg: "#EEFFF7"
            },

            "NCP (Sharad Pawar)": {
                primary: "#7B2CBF",
                secondary: "#9C4DCC",
                lightBg: "#F8F0FF"
            }

        };


        /* ============================================================
           PARTY CLASS
        ============================================================ */

        function getPartyClass(party) {

            const map = {

                "BJP": "bjp",

                "Shiv Sena (ES)": "ss",

                "NCP": "ncp",

                "INC": "inc",

                "NCP (Sharad Pawar)": "ncp",

                "Shiv Sena (UBT)": "ssubt"

            };

            return map[party] || "";

        }


        /* ============================================================
           AVATAR COLOR
        ============================================================ */

        function getAvatarColor(party) {

            const colors = {

                "BJP": "#FF6B00",

                "Shiv Sena (ES)": "#FF8C00",

                "NCP": "#1565FF",

                "INC": "#00A86B",

                "NCP (Sharad Pawar)": "#7B2CBF",

                "Shiv Sena (UBT)": "#E53935"

            };

            return colors[party] || "#6B655D";

        }


        /* ============================================================
           INITIALS
        ============================================================ */

        function getInitials(name) {

            if (!name) {
                return "ML";
            }

            return name
                .split(' ')
                .map(w => w[0])
                .join('')
                .toUpperCase()
                .slice(0, 2);

        }


        /* ============================================================
           STARS
        ============================================================ */

        function renderStars(rating) {

            rating = Number(rating) || 0;

            const full = Math.floor(rating);

            const half =
                rating % 1 >= 0.5
                    ? 1
                    : 0;

            const empty =
                5 - full - half;

            return (
                '★'.repeat(full) +
                (half ? '½' : '') +
                '☆'.repeat(empty)
            );

        }


        /* ============================================================
           AVATAR
        ============================================================ */

        function buildAvatar(mla) {

            if (
                mla.image &&
                mla.image.trim() !== ''
            ) {

                return `
                    <img
                        src="${mla.image}"
                        alt="${mla.name}"
                        onerror="
                            this.style.display='none';
                            this.parentElement.innerHTML=
                            '<span class=\\'initials-fallback\\'>
                            ${getInitials(mla.name)}
                            </span>';
                        "
                    >
                `;

            }

            return `
                <span class="initials-fallback">
                    ${getInitials(mla.name)}
                </span>
            `;

        }


        /* ============================================================
           MLA CARD
        ============================================================ */

        function buildGridMLACard(mla) {

            const color =
                getAvatarColor(mla.party);

            const partyClass =
                getPartyClass(mla.party);

            const stars =
                renderStars(
                    mla.ratingScore || 0
                );


            return `

                <div class="col-md-6 col-lg-4">

                    <div class="mla-card-ref">


                        <div class="d-flex align-items-start gap-3">

                            <div
                                class="avatar-circle"
                                style="background:${color};">

                                ${buildAvatar(mla)}

                            </div>


                            <div>

                                <div class="mla-name">

                                    ${mla.name || 'Unknown MLA'}

                                </div>


                                <div class="mla-name-mr">

                                    ${mla.marathiName || mla.name || ''}

                                </div>


                                <div class="mla-constituency">

                                    <i class="bi bi-geo-alt"></i>

                                    ${mla.constituency || 'N/A'},

                                    ${mla.district || 'N/A'}

                                </div>


                                <div>

                                    <span
                                        class="party-badge ${partyClass}">

                                        ${mla.party || 'Independent'}

                                    </span>


                                    <span
                                        class="elected-year ms-2">

                                        Elected
                                        ${mla.firstElected || 'N/A'}

                                    </span>

                                </div>

                            </div>

                        </div>


                        <div class="info-row">

                            <span>

                                <i class="bi bi-person"></i>

                                ${mla.ratings || 0}
                                ratings

                            </span>


                            <span class="rating-value">

                                <span class="stars">

                                    ${stars}

                                </span>

                                ${Number(
                                    mla.ratingScore || 0
                                ).toFixed(1)}
                                /5

                            </span>

                        </div>


                        <div class="manifesto-row">

                            <span class="manifesto-text">

                                Manifesto Fulfilled

                            </span>


                            <div
                                class="progress-bar-custom">

                                <div
                                    class="fill"
                                    style="
                                        width:${Math.min(
                                            100,
                                            Math.max(
                                                0,
                                                Number(
                                                    mla.manifestoFulfilled || 0
                                                )
                                            )
                                        )}%;
                                    ">
                                </div>

                            </div>


                            <span class="manifesto-percent">

                                ${mla.manifestoFulfilled || 0}%

                            </span>

                        </div>


                        <div class="card-actions">

                            <button
                                class="btn-rate"
                                onclick="openRatingModal(${mla.id})">

                                <i class="bi bi-star-fill"></i>

                                Rate MLA

                            </button>


                            <button
                                class="btn-view-all"
                                onclick="showProfile(${mla.id})">

                                View Profile

                            </button>

                        </div>


                    </div>

                </div>

            `;

        }


        /* ============================================================
           POPULATE PARTY FILTER
        ============================================================ */

        function populatePartyFilter() {

            const partySelect =
                document.getElementById('party');

            const parties = [
                ...new Set(
                    mlaAssembly
                        .map(m => m.party)
                        .filter(Boolean)
                )
            ];

            parties.sort();

            partySelect.innerHTML =
                '<option value="">All Parties</option>';


            parties.forEach(party => {

                partySelect.innerHTML += `

                    <option value="${party}">

                        ${party}

                    </option>

                `;

            });

        }


        /* ============================================================
           POPULATE DISTRICT FILTER
        ============================================================ */

        function populateDistricts() {

            const districtSelect =
                document.getElementById('district');

            const districts = [
                ...new Set(
                    mlaAssembly
                        .map(m => m.district)
                        .filter(Boolean)
                )
            ];

            districts.sort();

            districtSelect.innerHTML =
                '<option value="">All Districts</option>';


            districts.forEach(district => {

                districtSelect.innerHTML += `

                    <option value="${district}">

                        ${district}

                    </option>

                `;

            });

        }


        /* ============================================================
           FILTER MLAs
        ============================================================ */

        function filterMLAs() {

            const name =
                document
                    .getElementById('mlaName')
                    .value
                    .toLowerCase()
                    .trim();


            const party =
                document
                    .getElementById('party')
                    .value;


            const district =
                document
                    .getElementById('district')
                    .value;


            const sort =
                document
                    .getElementById('sortOrder')
                    .value;


            let filtered =
                mlaAssembly.filter(mla => {

                    const mlaName =
                        (
                            mla.name || ''
                        ).toLowerCase();


                    return (

                        (
                            !name ||
                            mlaName.includes(name)
                        )

                        &&

                        (
                            !party ||
                            mla.party === party
                        )

                        &&

                        (
                            !district ||
                            mla.district === district
                        )


                    );

                });


            filtered.sort(
                (a, b) => {

                    const nameA =
                        (
                            a.name || ''
                        ).toLowerCase();

                    const nameB =
                        (
                            b.name || ''
                        ).toLowerCase();


                    return sort === 'asc'
                        ? nameA.localeCompare(nameB)
                        : nameB.localeCompare(nameA);

                }
            );


            const container =
                document.getElementById(
                    'mlaResult'
                );


            if (filtered.length === 0) {

                container.innerHTML = `

                    <div class="col-12 text-center p-5">

                        <i
                            class="bi bi-search"
                            style="
                                font-size:3rem;
                                color:var(--gray-300);
                            ">
                        </i>


                        <h5
                            class="mt-3"
                            style="
                                color:var(--gray-500);
                            ">

                            No representatives match

                        </h5>

                    </div>

                `;

            } else {

                container.innerHTML =
                    filtered
                        .map(
                            mla =>
                                buildGridMLACard(mla)
                        )
                        .join('');

            }

        }


        /* ============================================================
           RESET FILTER
        ============================================================ */

        function resetAllFilters() {

            document
                .getElementById('mlaName')
                .value = '';


            document
                .getElementById('party')
                .value = '';


            document
                .getElementById('district')
                .value = '';


            document
                .getElementById('sortOrder')
                .value = 'asc';


            filterMLAs();

        }


        /* ============================================================
           PROFILE MODAL
        ============================================================ */

        window.showProfile = function(id) {

            const mla =
                mlaAssembly.find(
                    item =>
                        Number(item.id) === Number(id)
                );


            if (!mla) {
                return;
            }


            document
                .getElementById(
                    'premiumModalTitle'
                )
                .innerHTML = `

                    <i class="bi bi-person-badge me-2"></i>

                    ${mla.name} · MLA Profile

                `;


            const imageHtml =
                mla.image
                    ? `

                        <img
                            src="${mla.image}"
                            style="
                                width:120px;
                                height:120px;
                                object-fit:cover;
                                border-radius:50%;
                                border:4px solid var(--accent);
                                box-shadow:
                                    0 8px 24px
                                    rgba(0,0,0,0.06);
                            "
                            onerror="
                                this.style.display='none';
                            "
                        >

                    `
                    : `

                        <div
                            style="
                                width:120px;
                                height:120px;
                                border-radius:50%;
                                background:${getAvatarColor(
                                    mla.party
                                )};
                                color:#fff;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                margin:auto;
                                font-size:2rem;
                                font-weight:700;
                            ">

                            ${getInitials(mla.name)}

                        </div>

                    `;


            document
                .getElementById('premiumModalBody').innerHTML = `


                    <div class="row">


                        <div class="col-md-4 text-center">

                            ${imageHtml}


                            <h3
                                class="mt-3"
                                style="
                                    font-family:
                                    'Playfair Display',
                                    serif;
                                ">

                                ${mla.name}

                            </h3>


                            <span
                                class="badge"
                                style="
                                    background:var(--accent);
                                    color:#fff;
                                    padding:4px 16px;
                                    border-radius:
                                    var(--radius-full);
                                ">

                                ${mla.party || 'N/A'}

                            </span>


                            <p
                                class="mt-2 text-muted">

                                <i
                                    class="bi bi-geo-alt">
                                </i>

                                ${mla.constituency || 'N/A'}
                                ,
                                ${mla.district || 'N/A'}

                            </p>

                        </div>


                        <div class="col-md-8">


                            <div class="row g-2">


                                <div class="col-6">

                                    <strong>
                                        MLA Code:
                                    </strong>

                                    ${mla.mla_code || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        Gender:
                                    </strong>

                                    ${mla.gender || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        Education:
                                    </strong>

                                    ${mla.education || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        Profession:
                                    </strong>

                                    ${mla.profession || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        First Elected:
                                    </strong>

                                    ${mla.firstElected || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        Current Term:
                                    </strong>

                                    ${mla.currentTerm || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        Mobile:
                                    </strong>

                                    ${mla.mobile || 'N/A'}

                                </div>


                                <div class="col-6">

                                    <strong>
                                        Email:
                                    </strong>

                                    ${mla.email || 'N/A'}

                                </div>


                                <div class="col-12">

                                    <strong>
                                        Address:
                                    </strong>

                                    ${mla.address || 'N/A'}

                                </div>


                            </div>


                            <div
                                class="mt-3 p-3"
                                style="
                                    background:
                                    var(--gray-50);
                                    border-radius:
                                    var(--radius-md);
                                ">

                                <strong>
                                    Biography:
                                </strong>

                                ${mla.bio || 'No biography available.'}

                            </div>


                            <div
                                class="mt-3 d-flex gap-2 flex-wrap">


                                <button
                                    class="btn-rate"
                                    onclick="
                                        openRatingModal(
                                            ${mla.id}
                                        )
                                    ">

                                    <i
                                        class="bi bi-star-fill">
                                    </i>

                                    Rate MLA

                                </button>


                            </div>


                        </div>


                    </div>

                `;


            new bootstrap.Modal(
                document.getElementById(
                    'premiumModal'
                )
            ).show();

        };


        /* ============================================================
           SURVEY QUESTIONS
        ============================================================ */

        const surveyQuestions = [

            {
                id: 1,
                text: "आमदार नागरिकांच्या समस्या सोडवतात का?",
                type: "stars",
                name: "q1_solve"
            },

            {
                id: 2,
                text: "सामान्य नागरिकांना सहज भेट देतात का?",
                type: "stars",
                name: "q1_meeting"
            },

            {
                id: 3,
                text: "आमदार निधी कोणत्या कामासाठी वापरला गेला? (तपशील)",
                type: "textarea",
                name: "q2_fund_works"
            },

            {
                id: 4,
                text: "कोणती वचने पूर्ण झाली? (एकाधिक निवडा)",
                type: "checkbox",
                name: "q3_promises",
                options: [
                    "Tree plantation",
                    "Environment protection",
                    "Pothole-free roads",
                    "Beach cleanup"
                ]
            },

            {
                id: 5,
                text: "मतदार म्हणून तुमची गरज विचारली गेली का?",
                type: "select",
                name: "q4_need_asked",
                options: [
                    "हो",
                    "अंशतः",
                    "नाही"
                ]
            },

            {
                id: 6,
                text: "पायाभूत सुविधा रेटिंग (1-5)",
                type: "stars",
                name: "rating_infra",
                max: 5
            },

            {
                id: 7,
                text: "रस्ते रेटिंग (1-5)",
                type: "stars",
                name: "rating_roads",
                max: 5
            },

            {
                id: 8,
                text: "स्वच्छता रेटिंग (1-5)",
                type: "stars",
                name: "rating_sanitation",
                max: 5
            },

            {
                id: 9,
                text: "पर्यावरण रेटिंग (1-5)",
                type: "stars",
                name: "rating_environment",
                max: 5
            },

            {
                id: 10,
                text: "तुमच्या भागात कोणती कामे झाली? (तपशील)",
                type: "textarea",
                name: "q6_local_works"
            },

            {
                id: 11,
                text: "ही कामे भागाच्या गरजांशी जुळतात का?",
                type: "select",
                name: "q7_match_needs",
                options: [
                    "हो",
                    "अंशतः",
                    "नाही"
                ]
            },

            {
                id: 12,
                text: "आमदार निधी वापर रेटिंग (1-10)",
                type: "range",
                name: "q8_fund_rating",
                min: 1,
                max: 10
            },

            {
                id: 13,
                text: "तुमचे नाव (ऐच्छिक)",
                type: "text",
                name: "optional_name"
            },

            {
                id: 14,
                text: "तुमचा मतदारसंघ (ऐच्छिक)",
                type: "text",
                name: "optional_constituency"
            },

            {
                id: 15,
                text: "निधी वापर पारदर्शक आहे का?",
                type: "select",
                name: "q10_transparent",
                options: [
                    "हो",
                    "अंशतः",
                    "नाही"
                ]
            },

            {
                id: 16,
                text: "भ्रष्टाचार / पारदर्शकता मत (तपशील)",
                type: "textarea",
                name: "q11_corruption_view"
            },

            {
                id: 17,
                text: "आमदाराने काय चांगले केले? (तपशील)",
                type: "textarea",
                name: "q12_good_work"
            },

            {
                id: 18,
                text: "कुठे सुधारणा हवी? (तपशील)",
                type: "textarea",
                name: "q13_improvements"
            }

        ];


        let formDataStore = {};

        let currentRatingMlaId = null;


        /* ============================================================
           BUILD SURVEY
        ============================================================ */

        function buildSinglePageSurvey(container) {

            container.innerHTML = '';


            const scrollWrapper =
                document.createElement('div');


            scrollWrapper.style.maxHeight =
                '60vh';

            scrollWrapper.style.overflowY =
                'auto';

            scrollWrapper.style.paddingRight =
                '6px';


            surveyQuestions.forEach(q => {


                const card =
                    document.createElement('div');

                card.className =
                    'rating-question';


                const label =
                    document.createElement('div');

                label.className =
                    'q-label';

                label.textContent =
                    `${q.id}. ${q.text}`;

                card.appendChild(label);


                const inputWrapper =
                    document.createElement('div');


                /* =========================
                   STARS
                ========================= */

                if (q.type === 'stars') {

                    const max =
                        q.max || 5;


                    const starContainer =
                        document.createElement('div');

                    starContainer.className =
                        'rating-stars';


                    for (
                        let i = 1;
                        i <= max;
                        i++
                    ) {

                        const btn =
                            document.createElement('button');

                        btn.type = 'button';

                        btn.dataset.value = i;

                        btn.innerHTML = '★';


                        btn.addEventListener(
                            'click',
                            function(e) {

                                e.preventDefault();


                                const val =
                                    parseInt(
                                        this.dataset.value
                                    );


                                const siblings =
                                    this.parentElement
                                        .querySelectorAll(
                                            'button'
                                        );


                                siblings.forEach(
                                    s => {

                                        if (
                                            parseInt(
                                                s.dataset.value
                                            ) <= val
                                        ) {

                                            s.classList.add(
                                                'active'
                                            );

                                        } else {

                                            s.classList.remove(
                                                'active'
                                            );

                                        }

                                    }
                                );


                                formDataStore[
                                    q.name
                                ] = val;

                            }
                        );


                        starContainer.appendChild(
                            btn
                        );

                    }


                    inputWrapper.appendChild(
                        starContainer
                    );

                }


                /* =========================
                   TEXTAREA
                ========================= */

                else if (
                    q.type === 'textarea'
                ) {

                    const ta =
                        document.createElement(
                            'textarea'
                        );

                    ta.className =
                        'form-control';

                    ta.style.borderRadius =
                        'var(--radius-sm)';

                    ta.rows = 3;

                    ta.placeholder =
                        'तुमचे उत्तर लिहा...';


                    ta.addEventListener(
                        'input',
                        function() {

                            formDataStore[
                                q.name
                            ] = this.value;

                        }
                    );


                    inputWrapper.appendChild(ta);

                }


                /* =========================
                   SELECT
                ========================= */

                else if (
                    q.type === 'select'
                ) {

                    const sel =
                        document.createElement(
                            'select'
                        );

                    sel.className =
                        'form-select';

                    sel.style.borderRadius =
                        'var(--radius-sm)';


                    const defaultOpt =
                        document.createElement(
                            'option'
                        );

                    defaultOpt.value = '';

                    defaultOpt.textContent =
                        '-- निवडा --';

                    sel.appendChild(
                        defaultOpt
                    );


                    q.options.forEach(
                        opt => {

                            const op =
                                document.createElement(
                                    'option'
                                );

                            op.value = opt;

                            op.textContent = opt;

                            sel.appendChild(op);

                        }
                    );


                    sel.addEventListener(
                        'change',
                        function() {

                            formDataStore[
                                q.name
                            ] = this.value;

                        }
                    );


                    inputWrapper.appendChild(sel);

                }


                /* =========================
                   CHECKBOX
                ========================= */

                else if (
                    q.type === 'checkbox'
                ) {

                    const group =
                        document.createElement(
                            'div'
                        );

                    group.className =
                        'd-flex flex-wrap gap-3';


                    q.options.forEach(
                        opt => {

                            const checkDiv =
                                document.createElement(
                                    'div'
                                );

                            checkDiv.className =
                                'form-check';


                            const cb =
                                document.createElement(
                                    'input'
                                );

                            cb.type =
                                'checkbox';

                            cb.className =
                                'form-check-input';

                            cb.value = opt;


                            cb.addEventListener(
                                'change',
                                function() {

                                    if (
                                        !Array.isArray(
                                            formDataStore[
                                                q.name
                                            ]
                                        )
                                    ) {

                                        formDataStore[
                                            q.name
                                        ] = [];

                                    }


                                    if (
                                        this.checked
                                    ) {

                                        if (
                                            !formDataStore[
                                                q.name
                                            ].includes(
                                                this.value
                                            )
                                        ) {

                                            formDataStore[
                                                q.name
                                            ].push(
                                                this.value
                                            );

                                        }

                                    } else {

                                        const idx =
                                            formDataStore[
                                                q.name
                                            ].indexOf(
                                                this.value
                                            );


                                        if (
                                            idx !== -1
                                        ) {

                                            formDataStore[
                                                q.name
                                            ].splice(
                                                idx,
                                                1
                                            );

                                        }

                                    }

                                }
                            );


                            const lbl =
                                document.createElement(
                                    'label'
                                );

                            lbl.className =
                                'form-check-label';

                            lbl.textContent =
                                opt;


                            checkDiv.appendChild(cb);

                            checkDiv.appendChild(lbl);

                            group.appendChild(
                                checkDiv
                            );

                        }
                    );


                    inputWrapper.appendChild(
                        group
                    );

                }


                /* =========================
                   RANGE
                ========================= */

                else if (
                    q.type === 'range'
                ) {

                    const rangeContainer =
                        document.createElement(
                            'div'
                        );

                    rangeContainer.className =
                        'd-flex align-items-center gap-3';


                    const rangeInput =
                        document.createElement(
                            'input'
                        );

                    rangeInput.type = 'range';

                    rangeInput.className =
                        'form-range';

                    rangeInput.style.width =
                        '200px';

                    rangeInput.min =
                        q.min || 1;

                    rangeInput.max =
                        q.max || 10;

                    rangeInput.value =
                        q.min || 1;


                    const valSpan =
                        document.createElement(
                            'span'
                        );

                    valSpan.className =
                        'fw-bold';

                    valSpan.style.color =
                        'var(--accent)';

                    valSpan.textContent =
                        rangeInput.value;


                    rangeInput.addEventListener(
                        'input',
                        function() {

                            valSpan.textContent =
                                this.value;

                            formDataStore[
                                q.name
                            ] =
                                parseInt(
                                    this.value
                                );

                        }
                    );


                    rangeContainer.appendChild(
                        rangeInput
                    );

                    rangeContainer.appendChild(
                        valSpan
                    );


                    inputWrapper.appendChild(
                        rangeContainer
                    );

                }


                /* =========================
                   TEXT
                ========================= */

                else if (
                    q.type === 'text'
                ) {

                    const inp =
                        document.createElement(
                            'input'
                        );

                    inp.type = 'text';

                    inp.className =
                        'form-control';

                    inp.style.borderRadius =
                        'var(--radius-sm)';

                    inp.placeholder =
                        'तुमचे उत्तर...';


                    inp.addEventListener(
                        'input',
                        function() {

                            formDataStore[
                                q.name
                            ] = this.value;

                        }
                    );


                    inputWrapper.appendChild(
                        inp
                    );

                }


                card.appendChild(
                    inputWrapper
                );


                scrollWrapper.appendChild(
                    card
                );

            });


            /* ========================================================
               SUBMIT
            ======================================================== */

            const footer =
                document.createElement(
                    'div'
                );

            footer.className =
                'text-center mt-4 pt-3 border-top';


            footer.innerHTML = `

                <button
                    class="btn-orange"
                    id="singlePageSubmitBtn"
                    type="button"
                    style="padding:10px 40px;">

                    <i
                        class="bi bi-check-circle me-2">
                    </i>

                    Submit Rating

                </button>

            `;


            scrollWrapper.appendChild(
                footer
            );


            container.appendChild(
                scrollWrapper
            );


            document
                .getElementById(
                    'singlePageSubmitBtn'
                )
                ?.addEventListener(
                    'click',
                    onSubmitSinglePage
                );

        }


        /* ============================================================
           COMPUTE RATING
        ============================================================ */

        function computeFullRating() {

            let totalEarned = 0;

            let totalMax = 0;


            const ratingFields = [

                'rating_infra',

                'rating_roads',

                'rating_sanitation',

                'rating_environment'

            ];


            ratingFields.forEach(
                field => {

                    const val =
                        Number(
                            formDataStore[field]
                        );


                    if (
                        !isNaN(val) &&
                        val >= 1 &&
                        val <= 5
                    ) {

                        totalEarned +=
                            (val / 5) * 2;

                        totalMax += 2;

                    }

                }
            );


            const rangeValue =
                Number(
                    formDataStore.q8_fund_rating
                );


            if (
                !isNaN(rangeValue) &&
                rangeValue >= 1 &&
                rangeValue <= 10
            ) {

                totalEarned +=
                    (rangeValue / 10) * 2;

                totalMax += 2;

            }


            const positiveFields = [

                'q1_solve',

                'q1_meeting',

                'q4_need_asked',

                'q7_match_needs',

                'q10_transparent'

            ];


            const positiveScore = {

                "हो": 2,

                "अंशतः": 1,

                "नाही": 0

            };


            positiveFields.forEach(
                field => {

                    const value =
                        formDataStore[field];


                    if (
                        value &&
                        positiveScore[
                            value
                        ] !== undefined
                    ) {

                        totalEarned +=
                            positiveScore[value];

                        totalMax += 2;

                    }

                }
            );


            if (
                Array.isArray(
                    formDataStore.q3_promises
                )
            ) {

                const count =
                    formDataStore.q3_promises.length;


                totalEarned +=
                    Math.min(
                        count,
                        4
                    ) * 0.75;

                totalMax +=
                    4 * 0.75;

            }


            if (totalMax <= 0) {

                return 0;

            }


            const stars =
                (
                    totalEarned /
                    totalMax
                ) * 5;


            return Math.min(
                5,
                Math.max(
                    0,
                    stars
                )
            );

        }


        /* ============================================================
           REPORT DATA
        ============================================================ */

        let lastReportData = null;


        function getResponse(name) {

            const value =
                formDataStore[name];


            if (
                value === undefined ||
                value === null ||
                value === ''
            ) {

                return 'Not answered';

            }


            if (
                Array.isArray(value)
            ) {

                return value.length
                    ? value.join(', ')
                    : 'Not answered';

            }


            return value;

        }


        /* ============================================================
           GENERATE REPORT
        ============================================================ */

        function generateReport(
            mla,
            stars
        ) {

            const starCount =
                Math.round(stars);


            const starDisplay =
                '★'.repeat(starCount) +
                '☆'.repeat(
                    5 - starCount
                );


            const percentage =
                Math.round(
                    (stars / 5) * 100
                );


            return `

                <div class="report-card">


                    <div class="text-center mb-4">


                        <h3
                            style="
                                font-family:
                                'Playfair Display',
                                serif;
                            ">

                            ${mla.name}

                        </h3>


                        <p class="text-muted">

                            ${mla.constituency || 'N/A'}
                            ·
                            ${mla.district || 'N/A'}
                            ·
                            ${mla.party || 'N/A'}

                        </p>


                        <div class="stars-big">

                            ${starDisplay}

                        </div>


                        <h2
                            class="fw-bold mt-2"
                            style="
                                color:var(--accent);
                            ">

                            ${stars.toFixed(1)}
                            / 5 ★

                        </h2>


                        <div
                            class="progress"
                            style="
                                height:6px;
                                background:
                                var(--gray-200);
                                border-radius:4px;
                                max-width:300px;
                                margin:8px auto;
                            ">

                            <div
                                class="progress-bar"
                                style="
                                    width:${percentage}%;
                                    background:
                                    linear-gradient(
                                        90deg,
                                        var(--accent),
                                        var(--accent-light)
                                    );
                                    border-radius:4px;
                                ">
                            </div>

                        </div>


                        <p>

                            <strong>
                                ${percentage}%
                            </strong>

                            Performance Score

                        </p>


                    </div>


                    <div class="report-section">

                        <div class="label">
                            📋 Problem Solving Ability
                        </div>

                        <div class="value">
                            ${getResponse('q1_solve')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🤝 Accessibility to Citizens
                        </div>

                        <div class="value">
                            ${getResponse('q1_meeting')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            💰 Fund Utilization
                        </div>

                        <div class="value">
                            ${getResponse('q2_fund_works')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            ✅ Promises Fulfilled
                        </div>

                        <div class="value">
                            ${getResponse('q3_promises')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            📊 Infrastructure Rating
                        </div>

                        <div class="value">
                            ${getResponse('rating_infra')} / 5
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🛣️ Roads Rating
                        </div>

                        <div class="value">
                            ${getResponse('rating_roads')} / 5
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🧹 Sanitation Rating
                        </div>

                        <div class="value">
                            ${getResponse('rating_sanitation')} / 5
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🌳 Environment Rating
                        </div>

                        <div class="value">
                            ${getResponse('rating_environment')} / 5
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🏗️ Local Works Done
                        </div>

                        <div class="value">
                            ${getResponse('q6_local_works')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🎯 Needs Alignment
                        </div>

                        <div class="value">
                            ${getResponse('q7_match_needs')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            💰 Fund Usage Transparency
                        </div>

                        <div class="value">
                            ${getResponse('q10_transparent')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            ⭐ Good Work Done
                        </div>

                        <div class="value">
                            ${getResponse('q12_good_work')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            🔧 Areas for Improvement
                        </div>

                        <div class="value">
                            ${getResponse('q13_improvements')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            📝 Additional Comments
                        </div>

                        <div class="value">
                            ${getResponse('q11_corruption_view')}
                        </div>

                    </div>


                    <div class="report-section">

                        <div class="label">
                            👤 Voter Name
                        </div>

                        <div class="value">

                            ${
                                getResponse(
                                    'optional_name'
                                ) === 'Not answered'
                                    ? 'Anonymous'
                                    : getResponse(
                                        'optional_name'
                                    )
                            }

                        </div>

                    </div>


                    <div class="share-buttons">


                        <button
                            class="share-btn whatsapp"
                            onclick="
                                shareReport('whatsapp')
                            ">

                            <i
                                class="bi bi-whatsapp">
                            </i>

                            WhatsApp

                        </button>


                        <button
                            class="share-btn twitter"
                            onclick="
                                shareReport('twitter')
                            ">

                            <i
                                class="bi bi-twitter-x">
                            </i>

                            Twitter

                        </button>


                        <button
                            class="share-btn facebook"
                            onclick="
                                shareReport('facebook')
                            ">

                            <i
                                class="bi bi-facebook">
                            </i>

                            Facebook

                        </button>


                        <button
                            class="share-btn copy"
                            onclick="
                                copyReportLink()
                            ">

                            <i
                                class="bi bi-clipboard">
                            </i>

                            Copy

                        </button>


                    </div>


                    <p
                        class="text-center text-muted mt-3"
                        style="font-size:0.7rem;">

                        Report generated on

                        ${new Date().toLocaleDateString(
                            'en-IN',
                            {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            }
                        )}

                    </p>


                </div>

            `;

        }


        /* ============================================================
           SHARE REPORT
        ============================================================ */

        function shareReport(platform) {

            if (!lastReportData) {
                return;
            }


            const {
                mla,
                stars
            } = lastReportData;


            const shareText = `📊 MLA Performance Report

👤 ${mla.name}

📍 ${mla.constituency || 'N/A'}

⭐ ${stars.toFixed(1)} / 5 ★

(${Math.round(
    (stars / 5) * 100
)}%)

📅 ${new Date().toLocaleDateString(
    'en-IN',
    {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }
)}`;


            const encodedText =
                encodeURIComponent(
                    shareText
                );


            let url = '';


            switch (platform) {

                case 'whatsapp':

                    url =
                        `https://wa.me/?text=${encodedText}`;

                    break;


                case 'twitter':

                    url =
                        `https://twitter.com/intent/tweet?text=${encodedText}`;

                    break;


                case 'facebook':

                    url =
                        `https://www.facebook.com/sharer/sharer.php?quote=${encodedText}`;

                    break;


                default:

                    return;

            }


            window.open(
                url,
                '_blank',
                'width=600,height=500'
            );

        }


        /* ============================================================
           COPY REPORT
        ============================================================ */

        function copyReportLink() {

            if (!lastReportData) {
                return;
            }


            const {
                mla,
                stars
            } = lastReportData;


            const copyText =
                `📊 MLA Performance Report

👤 ${mla.name}

📍 ${mla.constituency || 'N/A'}

⭐ ${stars.toFixed(1)} / 5 ★

(${Math.round(
    (stars / 5) * 100
)}%)

📅 ${new Date().toLocaleDateString(
    'en-IN',
    {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }
)}`;


            if (
                navigator.clipboard
            ) {

                navigator.clipboard
                    .writeText(copyText)
                    .then(() => {

                        alert(
                            '✅ Report copied to clipboard!'
                        );

                    })
                    .catch(() => {

                        fallbackCopy(
                            copyText
                        );

                    });

            } else {

                fallbackCopy(
                    copyText
                );

            }

        }


        function fallbackCopy(text) {

            const textarea =
                document.createElement(
                    'textarea'
                );

            textarea.value = text;

            document.body.appendChild(
                textarea
            );

            textarea.select();

            document.execCommand(
                'copy'
            );

            document.body.removeChild(
                textarea
            );


            alert(
                '✅ Report copied to clipboard!'
            );

        }


        /* ============================================================
           SUBMIT RATING
        ============================================================ */

        function onSubmitSinglePage() {

            const overallStars =
                computeFullRating();


            const mla =
                mlaAssembly.find(
                    item =>
                        Number(item.id) ===
                        Number(currentRatingMlaId)
                );


            if (!mla) {
                return;
            }


            lastReportData = {

                mla: mla,

                stars: overallStars

            };


            const ratingModalEl =
                document.getElementById(
                    'ratingModal'
                );


            const ratingModal =
                bootstrap.Modal.getInstance(
                    ratingModalEl
                );


            if (ratingModal) {

                ratingModal.hide();

            }


            document
                .getElementById(
                    'reportModalBody'
                )
                .innerHTML =
                generateReport(
                    mla,
                    overallStars
                );


            new bootstrap.Modal(
                document.getElementById(
                    'reportModal'
                )
            ).show();


            /*
             * Reset form after report generation
             */

            formDataStore = {};

        }


        /* ============================================================
           OPEN RATING MODAL
        ============================================================ */

        window.openRatingModal = function(id) {

            const mla =
                mlaAssembly.find(
                    item =>
                        Number(item.id) ===
                        Number(id)
                );


            if (!mla) {
                return;
            }


            currentRatingMlaId =
                Number(id);


            document
                .getElementById(
                    'ratingMlaName'
                )
                .innerText =
                mla.name || '—';


            document
                .getElementById(
                    'ratingMlaConstituency'
                )
                .innerText =
                mla.constituency || '—';


            const container =
                document.getElementById(
                    'ratingSurveyContainer'
                );


            container.innerHTML = '';


            formDataStore = {};


            buildSinglePageSurvey(
                container
            );


            new bootstrap.Modal(
                document.getElementById(
                    'ratingModal'
                )
            ).show();

        };


        /* ============================================================
           HEADER SCROLL
        ============================================================ */

        const premiumHeader =
            document.getElementById(
                'premiumHeader'
            );


        window.addEventListener(
            'scroll',
            () => {

                if (!premiumHeader) {
                    return;
                }


                if (
                    window.scrollY > 60
                ) {

                    premiumHeader
                        .classList
                        .add(
                            'scrolled'
                        );

                } else {

                    premiumHeader
                        .classList
                        .remove(
                            'scrolled'
                        );

                }

            }
        );


        /* ============================================================
           SCROLL REVEAL
        ============================================================ */

        document
            .querySelectorAll(
                '.reveal'
            )
            .forEach(
                element => {

                    const observer =
                        new IntersectionObserver(
                            entries => {

                                entries.forEach(
                                    entry => {

                                        if (
                                            entry.isIntersecting
                                        ) {

                                            entry.target
                                                .classList
                                                .add(
                                                    'visible'
                                                );

                                            observer
                                                .unobserve(
                                                    entry.target
                                                );

                                        }

                                    }
                                );

                            },
                            {
                                threshold: 0.15
                            }
                        );


                    observer.observe(
                        element
                    );

                }
            );


        /* ============================================================
           INITIALIZE
        ============================================================ */

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                populateDistricts();

                populatePartyFilter();

                filterMLAs();

            }
        );

    </script>

</body>

</html>

