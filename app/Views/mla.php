
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
            width: 50px;
            height: 50px;
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

        /* viraj css start */
     .lekha {
  /* ---- Theme: change these to match your site ---- */
  --lekha-ink: #1B2437;         /* text, buttons, chosen answers */
  --lekha-ink-soft: #566079;    /* secondary text */
  --lekha-paper: #FFFFFF;       /* form background */
  --lekha-tint: #EDF1F8;        /* background of a chosen answer */
  --lekha-rule: #D2D9E5;        /* ruled lines and borders */
  --lekha-margin: #C23B3B;      /* ledger margin line, required marks, errors */
  --lekha-stamp: #2F4BA0;       /* "recorded" stamp */
  --lekha-font: "Mukta", "Noto Sans Devanagari", "Nirmala UI", "Kohinoor Devanagari", "Mangal", system-ui, sans-serif;
  --lekha-font-display: "Tiro Devanagari Marathi", "Noto Serif Devanagari", "Mukta", "Noto Sans Devanagari", "Nirmala UI", serif;
  --lekha-sticky-top: 0px;      /* height of your site's fixed header, if any */
  --lekha-gutter: 16px;

  max-width: 100%;
  margin: 0 auto;
  padding: 22px var(--lekha-gutter) 44px;
  background: var(--lekha-paper);
  color: var(--lekha-ink);
  font-family: var(--lekha-font);
  font-size: 17px;
  line-height: 1.65;
  text-align: left;
  -webkit-font-smoothing: antialiased;
}
.lekha, .lekha *, .lekha *::before, .lekha *::after { box-sizing: border-box; }
.lekha [hidden] { display: none !important; }

/* Reset the few elements host themes usually restyle */
.lekha h1, .lekha h2, .lekha p, .lekha fieldset, .lekha legend { margin: 0; padding: 0; }
.lekha fieldset { border: 0; min-width: 0; }
.lekha legend { display: block; float: none; width: 100%; border: 0; color: inherit; font-size: inherit; line-height: inherit; }
.lekha label { display: block; margin: 0; font-weight: inherit; }
.lekha button, .lekha input, .lekha textarea { margin: 0; font: inherit; color: inherit; letter-spacing: inherit; }

/* ---------- Head ---------- */
.lekha .lekha-head { padding-bottom: 16px; border-bottom: 4px double var(--lekha-ink); }
.lekha .lekha-title {
  font-family: var(--lekha-font-display);
  font-weight: 400;
  font-size: 1.8em;
  font-size: clamp(1.7em, 6.4vw, 2.55em);
  line-height: 1.35;
}
.lekha .lekha-sub { margin-top: 2px; font-size: 1.06em; color: var(--lekha-ink-soft); }
.lekha .lekha-intro { padding-top: 16px; }
.lekha .lekha-intro p + p { margin-top: 10px; }

.lekha .lekha-demo {
  margin-bottom: 18px; padding: 10px 12px;
  border: 1px dashed var(--lekha-margin); border-radius: 6px;
  background: #FFF5F4; font-size: .9em; line-height: 1.55;
}

/* ---------- Progress: one segment per question ---------- */
.lekha .lekha-progress {
  position: -webkit-sticky; position: sticky; top: var(--lekha-sticky-top); z-index: 5;
  display: flex; align-items: center;
  margin: 16px calc(var(--lekha-gutter) * -1) 0;
  padding: 10px var(--lekha-gutter);
  background: var(--lekha-paper);
  border-bottom: 1px solid var(--lekha-rule);
}
.lekha .lekha-progress-text { flex: 0 0 auto; margin-right: 14px; font-size: .88em; color: var(--lekha-ink-soft); white-space: nowrap; }
.lekha .lekha-progress-segs { flex: 1 1 auto; display: flex; }
.lekha .lekha-seg { flex: 1 1 0; height: 8px; margin-right: 3px; border-radius: 2px; background: var(--lekha-rule); transition: background-color .2s; }
.lekha .lekha-seg:last-child { margin-right: 0; }
.lekha .lekha-seg.is-done { background: var(--lekha-ink); }
.lekha .lekha-seg.is-missing { background: var(--lekha-margin); }

/* ---------- The ledger sheet: a margin line runs down the whole form ---------- */
.lekha .lekha-sheet { border-left: 1px solid var(--lekha-margin); }
.lekha .lekha-who, .lekha .lekha-q {
  position: relative;
  padding: 20px 0 24px 14px;
  border-bottom: 1px solid var(--lekha-rule);
  scroll-margin-top: calc(var(--lekha-sticky-top) + 56px);
}
.lekha .lekha-q:last-child { border-bottom-color: var(--lekha-ink); }
.lekha .lekha-section-title { font-size: 1.12em; font-weight: 700; line-height: 1.4; }

/* ---------- Text fields ---------- */
.lekha .lekha-field { margin-top: 14px; }
.lekha .lekha-field label { margin-bottom: 4px; font-size: .95em; font-weight: 600; }
.lekha .lekha-field input {
  display: block; width: 100%; min-height: 48px; padding: 8px 12px;
  border: 1px solid var(--lekha-rule); border-bottom-color: var(--lekha-ink-soft); border-radius: 6px;
  background: #fff; box-shadow: none;
}
.lekha .lekha-field input[readonly] { background: var(--lekha-tint); }
.lekha .lekha-field input:focus, .lekha .lekha-note textarea:focus {
  outline: 2px solid var(--lekha-ink); outline-offset: 1px; border-color: var(--lekha-ink);
}
.lekha .lekha-hint { margin-top: 6px; font-size: .87em; line-height: 1.5; color: var(--lekha-ink-soft); }

/* ---------- Question ---------- */
.lekha .lekha-q-num {
  display: inline-block; margin-right: 10px;
  font-family: var(--lekha-font-display); font-size: 1.55em; line-height: 1; vertical-align: -2px;
}
.lekha .lekha-q-topic { font-size: 1.06em; font-weight: 700; }
.lekha .lekha-q-text { display: block; margin-top: 6px; }
.lekha .lekha-count { margin-top: 8px; font-size: .9em; font-weight: 600; color: var(--lekha-ink-soft); }

.lekha .lekha-opt { position: relative; margin-top: 8px; cursor: pointer; -webkit-tap-highlight-color: transparent; }
.lekha .lekha-opt input { position: absolute; top: 22px; left: 22px; width: 1px; height: 1px; opacity: 0; }
.lekha .lekha-opt-body {
  display: flex; align-items: flex-start; min-height: 50px; padding: 10px 12px 10px 10px;
  border: 1px solid var(--lekha-rule); border-radius: 8px; background: var(--lekha-paper);
  transition: background-color .15s, border-color .15s;
}
.lekha .lekha-opt-letter {
  flex: 0 0 auto; display: flex; align-items: center; justify-content: center;
  width: 28px; height: 28px; margin-right: 12px;
  border: 1.5px solid var(--lekha-ink-soft); border-radius: 50%;
  font-size: .82em; font-weight: 600; line-height: 1; color: var(--lekha-ink-soft);
  transition: background-color .15s, color .15s;
}
.lekha .lekha-opt--multi .lekha-opt-letter { border-radius: 7px; }
.lekha .lekha-opt-text { padding-top: 1px; min-width: 0; }
.lekha .lekha-opt input:checked + .lekha-opt-body {
  border-color: var(--lekha-ink); background: var(--lekha-tint); box-shadow: inset 0 0 0 1px var(--lekha-ink);
}
.lekha .lekha-opt input:checked + .lekha-opt-body .lekha-opt-letter {
  border-color: var(--lekha-ink); background: var(--lekha-ink); color: #fff;
}
.lekha .lekha-opt input:focus + .lekha-opt-body { outline: 2px solid var(--lekha-ink); outline-offset: 2px; }
.lekha .lekha-opt input:focus:not(:focus-visible) + .lekha-opt-body { outline: none; }
.lekha .lekha-opt input:disabled + .lekha-opt-body { opacity: .45; cursor: not-allowed; }
@media (hover: hover) {
  .lekha .lekha-opt:hover input:not(:checked):not(:disabled) + .lekha-opt-body { border-color: var(--lekha-ink-soft); }
}

/* ---------- Comment box: ruled like a notebook page ---------- */
.lekha .lekha-note { margin-top: 18px; }
.lekha .lekha-note label { margin-bottom: 4px; font-size: .9em; color: var(--lekha-ink-soft); }
.lekha .lekha-note textarea {
  display: block; width: 100%; padding: 0 12px;
  border: 1px solid var(--lekha-rule); border-radius: 6px;
  line-height: 30px; resize: vertical; overflow: hidden;
  background-color: #FCFDFF;
  background-image: linear-gradient(to bottom, transparent 29px, var(--lekha-rule) 29px);
  background-size: 100% 30px; background-position: 0 0; background-attachment: local;
  box-shadow: none;
}

/* ---------- Errors ---------- */
.lekha .lekha-err { margin-top: 10px; font-size: .93em; font-weight: 600; color: var(--lekha-margin); }
.lekha .lekha-err:empty { display: none; }
.lekha .lekha-has-error { box-shadow: inset 3px 0 0 var(--lekha-margin); }
.lekha .lekha-has-error .lekha-q-num { color: var(--lekha-margin); }

/* ---------- End: consent + send ---------- */
.lekha .lekha-end { padding-top: 22px; }
.lekha .lekha-consent { position: relative; display: flex; align-items: flex-start; cursor: pointer; }
.lekha .lekha-consent input { flex: 0 0 auto; width: 22px; height: 22px; margin: 3px 12px 0 0; accent-color: var(--lekha-ink); }
.lekha .lekha-submit {
  display: block; width: 100%; min-height: 54px; margin-top: 18px; padding: 12px 22px;
  border: 0; border-radius: 8px; background: var(--lekha-ink); color: #fff;
  font-size: 1.08em; font-weight: 600; cursor: pointer;
}
.lekha .lekha-submit:hover { filter: brightness(1.25); }
.lekha .lekha-submit:focus-visible { outline: 2px solid var(--lekha-ink); outline-offset: 3px; }
.lekha .lekha-submit:disabled { opacity: .6; cursor: progress; filter: none; }

/* ---------- After sending ---------- */
.lekha .lekha-done { padding: 34px 0 10px; outline: none; }
.lekha .lekha-stamp {
  display: inline-block; padding: 4px 18px 6px; border: 4px double var(--lekha-stamp); border-radius: 6px;
  color: var(--lekha-stamp); font-family: var(--lekha-font-display); font-size: 1.5em; line-height: 1.4;
  opacity: .92; transform: rotate(-5deg); transform-origin: left center;
  animation: lekha-stamp .38s cubic-bezier(.2, .9, .3, 1.25) both;
}
@keyframes lekha-stamp {
  from { opacity: 0; transform: rotate(-5deg) scale(1.7); }
  to   { opacity: .92; transform: rotate(-5deg) scale(1); }
}
.lekha .lekha-done h2 { margin-top: 22px; font-family: var(--lekha-font-display); font-weight: 400; font-size: 1.5em; line-height: 1.4; }
.lekha .lekha-done p { margin-top: 8px; }
.lekha .lekha-sent { margin-top: 22px; font-size: .9em; }
.lekha .lekha-sent summary { cursor: pointer; font-weight: 600; }
.lekha .lekha-sent-scroll { overflow-x: auto; margin-top: 8px; }
.lekha .lekha-sent table { width: 100%; border-collapse: collapse; }
.lekha .lekha-sent th, .lekha .lekha-sent td { padding: 5px 8px; border-bottom: 1px solid var(--lekha-rule); text-align: left; vertical-align: top; font-weight: 400; }
.lekha .lekha-sent th { white-space: nowrap; color: var(--lekha-ink-soft); }

.lekha .lekha-hp { position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; }

/* ---------- Wider screens: question numbers move into the ledger margin ---------- */
@media (min-width: 620px) {
  .lekha { --lekha-gutter: 32px; padding-top: 34px; font-size: 18px; }
  .lekha .lekha-sheet { margin-left: 58px; }
  .lekha .lekha-who, .lekha .lekha-q { padding-left: 22px; }
  .lekha .lekha-who::after, .lekha .lekha-q::after {
    content: ""; position: absolute; left: -59px; bottom: -1px; width: 59px; height: 1px; background: var(--lekha-rule);
  }
  .lekha .lekha-q:last-child::after { background: var(--lekha-ink); }
  .lekha .lekha-q-num { position: absolute; top: 20px; left: -59px; width: 58px; margin: 0; text-align: center; font-size: 1.7em; line-height: 1.15; }
  .lekha .lekha-submit { width: auto; min-width: 280px; }
  .lekha .lekha-pair { display: grid; grid-template-columns: 1fr 1fr; grid-column-gap: 16px; }
}

@media (prefers-reduced-motion: reduce) {
  .lekha *, .lekha *::before, .lekha *::after { transition: none !important; animation: none !important; }
}
    /* viraj css end */
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
                   <img src="<?= base_url('assets/user/images/logo.jpeg'); ?>"
             class="logo-img" alt="Maharashtra MLA Watch Logo">
        <img src="<?= base_url('assets/user/images/leaderTracker.png'); ?>"
              style="width:100%; height:70px;" alt="Maharashtra MLA Watch Logo">     
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

    <div class="modal fade modal-premium" id="premiumModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="premiumModalTitle"><i class="bi bi-person-badge me-2"></i>MLA Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="premiumModalBody"></div>
    </div>
  </div>
</div>

<div class="modal fade modal-premium" id="ratingModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-star-fill text-accent me-2"></i>Rate Your MLA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="ratingModalBody">
        <div id="ratingSurveyContainer"></div>
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

                    'education' => $mla['education']?? 'N/A','profession' => $mla['profession']?? 'Politician',

                    'age' => $mla['age']?? 'N/A',

                    
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

       window.showProfile=function(id)
       {

        const mla=mlaAssembly.find(item=>Number(item.id)===Number(id));
        if(!mla)return;
        document.getElementById('premiumModalTitle').innerHTML=`<i class="bi bi-person-badge me-2"></i>${mla.name} · MLA Profile`;
        const imageHtml=mla.image?`<img src="${mla.image}" style="width:120px;height:120px;object-fit:cover;border-radius:50%;border:4px solid var(--accent);box-shadow:0 8px 24px rgba(0,0,0,.06);" onerror="this.style.display='none';">`:`<div style="width:120px;height:120px;border-radius:50%;background:${getAvatarColor(mla.party)};color:#fff;display:flex;align-items:center;justify-content:center;margin:auto;font-size:2rem;font-weight:700;">${getInitials(mla.name)}</div>`;

        document.getElementById('premiumModalBody').innerHTML=`
            <div class="row">
                <div class="col-md-4 text-center">
                ${imageHtml}
                <h3 class="mt-3" style="font-family:'Playfair Display',serif;">${mla.name}</h3>
                <span class="badge" style="background:var(--accent);color:#fff;padding:4px 16px;border-radius:var(--radius-full);">${mla.party||'N/A'}</span>
                <p class="mt-2 text-muted"><i class="bi bi-geo-alt"></i>${mla.constituency||'N/A'}, ${mla.district||'N/A'}</p>
                </div>

                <div class="col-md-8">
                <div class="row g-2">

                <div class="col-6"><strong>MLA Code:</strong> ${mla.mla_code||'N/A'}</div>
                <div class="col-6"><strong>Gender:</strong> ${mla.gender||'N/A'}</div>
                <div class="col-6"><strong>Age:</strong> ${mla.age||'N/A'} Years</div>
                <div class="col-6"><strong>Education:</strong> ${mla.education||'N/A'}</div>
                <div class="col-6"><strong>Profession:</strong> ${mla.profession||'N/A'}</div>
                <div class="col-6"><strong>First Elected:</strong> ${mla.firstElected||'N/A'}</div>
                <div class="col-6"><strong>Current Term:</strong> ${mla.currentTerm||'N/A'}</div>
                <div class="col-6"><strong>Mobile:</strong> ${mla.mobile||'N/A'}</div>
                <div class="col-6"><strong>Email:</strong> ${mla.email||'N/A'}</div>
                <div class="col-12"><strong>Address:</strong> ${mla.address||'N/A'}</div>

                </div>

                <div class="mt-3 p-3" style="background:var(--gray-50);border-radius:var(--radius-md);">
                <strong>Biography:</strong> ${mla.bio||'No biography available.'}
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                <button class="btn-rate" onclick="openRatingModal(${mla.id})"><i class="bi bi-star-fill"></i> Rate MLA</button>
                </div>

                </div>
            </div>`;

          new bootstrap.Modal(document.getElementById('premiumModal')).show();
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

        window.openRatingModal = (id) => {

    const container = document.getElementById("ratingModalBody");

    container.innerHTML = `
        <div class="lekha" id="lekha-root" lang="mr"
     data-endpoint=""
     data-constituency=""
     data-mla=""
     data-require-all="true">

      <div class="lekha-demo" id="lekha-demo" hidden>
    चाचणी मोड: उत्तरे अजून कुठेही साठवली जात नाहीत. वेबसाइटवर लावण्यापूर्वी data-endpoint मध्ये तुमच्या सर्व्हरची लिंक भरा.
  </div>

  <header class="lekha-head">
    <h1 class="lekha-title">आमदारांच्या कामाचा लेखाजोखा</h1>
    <p class="lekha-sub">मतदारांसाठी प्रश्नावली</p>
  </header>

  <noscript><p style="padding:16px 0;font-weight:600">ही प्रश्नावली भरण्यासाठी ब्राउझरमध्ये JavaScript सुरू असणे आवश्यक आहे.</p></noscript>

  <form class="lekha-form" action="" method="post" novalidate>

    <div class="lekha-intro">
      <p>आमदार हे आपणच निवडून दिलेले लोकप्रतिनिधी आहेत. त्यांनी केलेल्या कामाचा आणि खर्च केलेल्या निधीचा हिशेब मागणे हा प्रत्येक मतदाराचा अधिकार आहे. ही प्रश्नावली कोणत्याही पक्षाच्या बाजूने किंवा विरोधात नाही. तुमचा अनुभव जसा आहे तसा सांगा, एवढीच विनंती.</p>
      <p>प्रत्येक प्रश्नासाठी तुम्हाला योग्य वाटणारा एक पर्याय निवडा; फक्त प्रश्न १२ मध्ये तीन पर्याय निवडायचे आहेत. एखाद्या प्रश्नाबद्दल आणखी काही सांगायचे असल्यास त्याखालील चौकटीत मोकळेपणाने लिहा. शक्य असेल तिथे कामाचे नाव, ठिकाण आणि वर्षही लिहा, म्हणजे माहितीची पडताळणी करणे सोपे जाईल.</p>
    </div>

    <div class="lekha-progress" role="group" aria-label="प्रश्नावलीची प्रगती">
      <span class="lekha-progress-text" id="lekha-progress-text">१३ पैकी ० प्रश्न पूर्ण</span>
      <span class="lekha-progress-segs" aria-hidden="true"><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span><span class="lekha-seg"></span></span>
    </div>

    <div class="lekha-sheet">

      <div class="lekha-who" id="lekha-who">
        <h2 class="lekha-section-title">तुमची माहिती</h2>
        <div class="lekha-pair">
          <div class="lekha-field">
            <label for="lekha-constituency">विधानसभा मतदारसंघ</label>
            <input type="text" id="lekha-constituency" name="constituency" maxlength="120" autocomplete="off" list="lekha-constituency-list">
            <!-- Developers: fill this list with the 288 constituency names from your database to get clean, uniform data. -->
            <datalist id="lekha-constituency-list"></datalist>
          </div>
          <div class="lekha-field">
            <label for="lekha-mla">आमदारांचे नाव</label>
            <input type="text" id="lekha-mla" name="mla_name" maxlength="120" autocomplete="off">
          </div>
        </div>
        <p class="lekha-hint">मतदारसंघ किंवा आमदारांचे नाव, यांपैकी किमान एक लिहा.</p>
        <p class="lekha-err" id="lekha-who-err"></p>
        <div class="lekha-pair">
          <div class="lekha-field">
            <label for="lekha-locality">तुमचे गाव / शहर आणि प्रभाग (ऐच्छिक)</label>
            <input type="text" id="lekha-locality" name="locality" maxlength="120" autocomplete="off">
          </div>
          <div class="lekha-field">
            <label for="lekha-name">तुमचे नाव (ऐच्छिक)</label>
            <input type="text" id="lekha-name" name="respondent_name" maxlength="120" autocomplete="name">
          </div>
        </div>
        <div class="lekha-pair">
          <div class="lekha-field" id="lekha-mobile-wrap">
            <label for="lekha-mobile">मोबाईल क्रमांक (ऐच्छिक)</label>
            <input type="tel" id="lekha-mobile" name="mobile_number" maxlength="10" inputmode="numeric" autocomplete="tel-national" aria-describedby="lekha-mobile-err" placeholder="१० अंकी मोबाईल क्रमांक">
            <p class="lekha-err" id="lekha-mobile-err"></p>
          </div>
          <div class="lekha-field" id="lekha-pin-wrap">
            <label for="lekha-pin">पिन कोड (ऐच्छिक)</label>
            <input type="text" id="lekha-pin" name="pin_code" maxlength="6" inputmode="numeric" autocomplete="postal-code" aria-describedby="lekha-pin-err" placeholder="६ अंकी पिन कोड">
            <p class="lekha-err" id="lekha-pin-err"></p>
          </div>
        </div>
        <p class="lekha-hint">नाव, मोबाईल क्रमांक आणि पिन कोड देणे ऐच्छिक आहे. तुमचे नाव किंवा वैयक्तिक माहिती कुठेही जाहीर केली जाणार नाही.</p>
      </div>

      <div class="lekha-q" id="lekha-q1" data-q="1">
        <fieldset aria-describedby="lekha-q1-err">
          <legend><span class="lekha-q-num">१</span><span class="lekha-q-topic">जाहीरनामा</span><span class="lekha-q-text">निवडणुकीच्या वेळी तुमच्या आमदारांनी दिलेल्या आश्वासनांपैकी किती प्रत्यक्षात पूर्ण झाली आहेत?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q1" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">बहुतेक सर्व</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q1" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">साधारण निम्मी</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q1" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">फारच थोडी</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q1" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">एकही नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q1" value="E"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">इ</span><span class="lekha-opt-text">आश्वासने काय होती हेच माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q1-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q1-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q1-note" name="q1_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q2" data-q="2">
        <fieldset aria-describedby="lekha-q2-err">
          <legend><span class="lekha-q-num">२</span><span class="lekha-q-topic">निधीची पारदर्शकता</span><span class="lekha-q-text">गेल्या आर्थिक वर्षात आमदार स्थानिक विकास निधीतून तुमच्या मतदारसंघासाठी किती निधी उपलब्ध झाला, त्यापैकी किती खर्च झाला आणि कोणत्या कामावर किती रक्कम खर्च झाली, याची माहिती सार्वजनिकरीत्या उपलब्ध आहे का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q2" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, सविस्तर माहिती उपलब्ध आहे</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q2" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">अर्धवट माहिती उपलब्ध आहे</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q2" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">माहिती उपलब्ध नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q2" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">ही माहिती कुठे मिळते हेच माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q2-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q2-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q2-note" name="q2_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q3" data-q="3">
        <fieldset aria-describedby="lekha-q3-err">
          <legend><span class="lekha-q-num">३</span><span class="lekha-q-topic">मतदारांचा सहभाग</span><span class="lekha-q-text">आमदार निधी कोणत्या कामांवर खर्च करायचा, हे ठरवताना तुमचे किंवा तुमच्या परिसरातील नागरिकांचे मत विचारण्यात आले होते का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q3" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, सभा किंवा बैठक घेऊन</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q3" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">होय, पण मोजक्याच लोकांना विचारले</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q3" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q3" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q3-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q3-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q3-note" name="q3_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q4" data-q="4">
        <fieldset aria-describedby="lekha-q4-err">
          <legend><span class="lekha-q-num">४</span><span class="lekha-q-topic">गरज आणि प्राधान्य</span><span class="lekha-q-text">आमदार निधीतून झालेली कामे तुमच्या परिसराच्या खऱ्या गरजेनुसार होती का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q4" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">पूर्णपणे</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q4" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">काही प्रमाणात</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q4" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">नाही, गरज वेगळी होती आणि कामे वेगळीच झाली</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q4" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">आमच्या परिसरात एकही काम झाले नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q4" value="E"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">इ</span><span class="lekha-opt-text">कोणती कामे झाली हेच माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q4-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q4-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q4-note" name="q4_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q5" data-q="5">
        <fieldset aria-describedby="lekha-q5-err">
          <legend><span class="lekha-q-num">५</span><span class="lekha-q-topic">विशेष निधीचे निकष</span><span class="lekha-q-text">मतदारसंघासाठी विशेष निधी आला असल्यास, तो कोणत्या निकषांवर आणि कशाच्या आधारे वापरला गेला, हे आमदारांनी जाहीर केले आहे का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q5" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, निकष जाहीर केले</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q5" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">निधी आल्याचे सांगितले, पण निकष सांगितले नाहीत</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q5" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">काहीच माहिती दिली नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q5" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">विशेष निधी आला की नाही हेच माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q5-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q5-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q5-note" name="q5_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q6" data-q="6">
        <fieldset aria-describedby="lekha-q6-err">
          <legend><span class="lekha-q-num">६</span><span class="lekha-q-topic">कामाचा दर्जा</span><span class="lekha-q-text">आमदार निधीतून झालेल्या कामांचा (रस्ते, गटारे, पथदिवे, समाजमंदिर इ.) दर्जा कसा आहे?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q6" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">चांगला, काम टिकून आहे</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q6" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">साधारण</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q6" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">निकृष्ट, वर्षभरातच खराब झाले</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q6" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">काम फक्त कागदावरच आहे</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q6" value="E"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">इ</span><span class="lekha-opt-text">कोणती कामे झाली हेच माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q6-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q6-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q6-note" name="q6_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>
      
      <div class="lekha-q" id="lekha-q7" data-q="7">
        <fieldset aria-describedby="lekha-q7-err">
          <legend><span class="lekha-q-num">७</span><span class="lekha-q-topic">पर्यावरण रक्षण व संगोपन</span><span class="lekha-q-text">तुमच्या मतदारसंघात पर्यावरणाचे रक्षण व संगोपन करण्यासाठी—वृक्षलागवड व झाडांचे संगोपन, उद्याने व जलस्रोतांचे संरक्षण आणि प्रदूषण नियंत्रण यांसाठी—तुमच्या आमदारांनी संबंधित यंत्रणांकडे केलेल्या पाठपुराव्यामुळे प्रत्यक्ष सुधारणा झाल्या आहेत का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q7" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, लक्षणीय सुधारणा झाल्या आहेत</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q7" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">काही प्रमाणात सुधारणा झाल्या आहेत</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q7" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">उपक्रम किंवा पाठपुरावा झाला, पण प्रत्यक्ष सुधारणा दिसत नाहीत</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q7" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">अशा कोणत्याही उपक्रमाची किंवा पाठपुराव्याची माहिती मिळालेली नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q7" value="E"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">इ</span><span class="lekha-opt-text">माहीत नाही / सांगता येत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q7-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q7-note">पर्यावरणविषयक उपक्रम, ठिकाण किंवा तुमचा अनुभव लिहा (ऐच्छिक)</label>
          <textarea id="lekha-q7-note" name="q7_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q8" data-q="8">
    <fieldset aria-describedby="lekha-q8-err">
      <legend>
        <span class="lekha-q-num">८</span>
        <span class="lekha-q-topic">पक्षांतर आणि मतदारांचा कौल</span>
        <span class="lekha-q-text">निवडून आल्यानंतर तुमच्या आमदारांनी पक्ष, गट किंवा आघाडी बदलली असल्यास, त्याआधी मतदारांना विश्वासात घेतले होते का?</span>
      </legend>

      <label class="lekha-opt">
        <input type="radio" name="q8" value="A">
        <span class="lekha-opt-body">
          <span class="lekha-opt-letter" aria-hidden="true">अ</span>
          <span class="lekha-opt-text">होय</span>
        </span>
      </label>

      <label class="lekha-opt">
        <input type="radio" name="q8" value="B">
        <span class="lekha-opt-body">
          <span class="lekha-opt-letter" aria-hidden="true">ब</span>
          <span class="lekha-opt-text">नाही</span>
        </span>
      </label>

      <label class="lekha-opt">
        <input type="radio" name="q8" value="C">
        <span class="lekha-opt-body">
          <span class="lekha-opt-letter" aria-hidden="true">क</span>
          <span class="lekha-opt-text">बदल केलेला नाही</span>
        </span>
      </label>

      <label class="lekha-opt">
        <input type="radio" name="q8" value="D">
        <span class="lekha-opt-body">
          <span class="lekha-opt-letter" aria-hidden="true">ड</span>
          <span class="lekha-opt-text">माहीत नाही</span>
        </span>
      </label>

      <p class="lekha-err" id="lekha-q8-err"></p>
    </fieldset>

    <div class="lekha-note">
      <label for="lekha-q8-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
      <textarea id="lekha-q8-note" name="q8_comment" rows="2" maxlength="1000"></textarea>
    </div>
</div>

      <div class="lekha-q" id="lekha-q9" data-q="9">
        <fieldset aria-describedby="lekha-q9-err">
          <legend><span class="lekha-q-num">९</span><span class="lekha-q-topic">विधानसभेतील कामगिरी</span><span class="lekha-q-text">तुमच्या आमदारांनी विधानसभेत मतदारसंघाचे प्रश्न मांडले आहेत का, याची माहिती तुम्हाला मिळते का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q9" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, आमदार स्वतः नियमित माहिती देतात</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q9" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">बातम्यांमधून कधीतरी कळते</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q9" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">माहिती मिळत नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q9" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">प्रश्न मांडल्याचे कधी ऐकले नाही</span></span></label>
          <p class="lekha-err" id="lekha-q9-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q9-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q9-note" name="q9_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q10" data-q="10">
        <fieldset aria-describedby="lekha-q10-err">
          <legend><span class="lekha-q-num">१०</span><span class="lekha-q-topic">तक्रार निवारण</span><span class="lekha-q-text">तुम्ही आमदारांच्या कार्यालयाकडे केलेल्या तक्रारीचे किंवा मागणीचे काय झाले?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q10" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">वेळेत सोडवली</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q10" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">उशिरा, पण सोडवली</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q10" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">फक्त आश्वासन मिळाले</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q10" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">प्रतिसादच नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q10" value="E"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">इ</span><span class="lekha-opt-text">कधी संपर्क केला नाही</span></span></label>
          <p class="lekha-err" id="lekha-q10-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q10-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q10-note" name="q10_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q11" data-q="11">
        <fieldset aria-describedby="lekha-q11-err">
          <legend><span class="lekha-q-num">११</span><span class="lekha-q-topic">वार्षिक हिशेब</span><span class="lekha-q-text">तुमच्या आमदारांनी आपल्या कामाचा आणि निधीच्या खर्चाचा लेखी कार्यअहवाल जनतेसमोर मांडला आहे का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q11" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, दरवर्षी</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q11" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">फक्त निवडणुकीच्या आधी</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q11" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">कधीच नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q11" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">माहीत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q11-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q11-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q11-note" name="q11_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q12" data-q="12">
        <fieldset aria-describedby="lekha-q12-err">
          <legend><span class="lekha-q-num">१२</span><span class="lekha-q-topic">आदर्श आमदार</span><span class="lekha-q-text">तुमचे सध्याचे आमदार तुम्हाला “आदर्श आमदार” वाटतात का?</span></legend>
          <label class="lekha-opt"><input type="radio" name="q12" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">होय, पूर्णपणे</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q12" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">काही बाबतींत</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q12" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">नाही</span></span></label>
          <label class="lekha-opt"><input type="radio" name="q12" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">सांगता येत नाही</span></span></label>
          <p class="lekha-err" id="lekha-q12-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q12-note">या प्रश्नाबद्दल तुमचे मत किंवा अनुभव (ऐच्छिक)</label>
          <textarea id="lekha-q12-note" name="q12_comment" rows="2" maxlength="1000"></textarea>
        </div>
      </div>

      <div class="lekha-q" id="lekha-q13" data-q="13">
        <fieldset aria-describedby="lekha-q13-err">
          <legend><span class="lekha-q-num">१३</span><span class="lekha-q-topic">आदर्श आमदाराचे गुण</span><span class="lekha-q-text">तुमच्या मते आदर्श आमदार कसे असावेत? खालीलपैकी तुम्हाला सर्वांत महत्त्वाचे वाटणारे तीन गुण निवडा.</span></legend>
          <p class="lekha-count" id="lekha-q13-count" aria-live="polite">३ पैकी ० निवडले</p>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="A"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">अ</span><span class="lekha-opt-text">मतदारसंघात सहज भेटणारे आणि लोकांचे ऐकून घेणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="B"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ब</span><span class="lekha-opt-text">निधीच्या प्रत्येक रुपयाचा हिशेब जाहीरपणे देणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="C"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">क</span><span class="lekha-opt-text">विधानसभेत मतदारसंघाचे प्रश्न ठामपणे मांडणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="D"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ड</span><span class="lekha-opt-text">स्वच्छ चारित्र्याचे आणि भ्रष्टाचारापासून दूर राहणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="E"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">इ</span><span class="lekha-opt-text">दिलेला शब्द पाळणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="F"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">फ</span><span class="lekha-opt-text">जात, धर्म किंवा पक्ष न पाहता सर्वांची कामे करणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="G"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ग</span><span class="lekha-opt-text">महत्त्वाचे निर्णय घेण्यापूर्वी मतदारांना विश्वासात घेणारे</span></span></label>
          <label class="lekha-opt lekha-opt--multi"><input type="checkbox" name="q13_opt" value="H"><span class="lekha-opt-body"><span class="lekha-opt-letter" aria-hidden="true">ह</span><span class="lekha-opt-text">इतर</span></span></label>
          <div class="lekha-field lekha-other" id="lekha-q13-other-wrap" hidden>
            <label for="lekha-q13-other">इतर गुण थोडक्यात लिहा</label>
            <input type="text" id="lekha-q13-other" name="q13_other" maxlength="200" autocomplete="off">
          </div>
          <p class="lekha-err" id="lekha-q13-err"></p>
        </fieldset>
        <div class="lekha-note">
          <label for="lekha-q13-note">आदर्श आमदार कसे असावेत, याबद्दल तुमचे मत (ऐच्छिक)</label>
          <textarea id="lekha-q13-note" name="q13_comment" rows="4" maxlength="1000"></textarea>
        </div>
      </div>

    </div>

    <div class="lekha-end">
      <div id="lekha-consent-wrap">
        <label class="lekha-consent"><input type="checkbox" id="lekha-consent" name="consent" value="yes"><span>माझी उत्तरे या सर्वेक्षणासाठी वापरण्यास माझी संमती आहे.</span></label>
        <p class="lekha-err" id="lekha-consent-err"></p>
      </div>
      <div class="lekha-hp" aria-hidden="true"><label>ही जागा रिकामी ठेवा <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
      <p class="lekha-err" id="lekha-form-err" role="alert"></p>
      <button type="button" class="lekha-submit" id="lekha-submit">उत्तरे नोंदवा</button>
    </div>
  </form>

  <div class="lekha-done" id="lekha-done" tabindex="-1" hidden>
    <div class="lekha-stamp" aria-hidden="true">नोंद झाली</div>
    <h2>तुमची उत्तरे नोंदवली गेली</h2>
    <p>तुमचा वेळ दिल्याबद्दल आणि मोकळेपणाने मत मांडल्याबद्दल मनःपूर्वक आभार.</p>
    <details class="lekha-sent" id="lekha-sent" hidden>
      <summary>चाचणी: सर्व्हरकडे जाणारी माहिती</summary>
      <div class="lekha-sent-scroll"><table><tbody id="lekha-sent-body"></tbody></table></div>
    </details>
  </div>
</div>
    `;

    initLekhaForm();

    new bootstrap.Modal(document.getElementById("ratingModal")).show();
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
    <!-- viraj js start -->
<script>
  window.initLekhaForm = function () {

"use strict";

var root = document.getElementById("lekha-root");

if (!root || root.getAttribute("data-ready")) { 
    return; 
}

root.setAttribute("data-ready", "1");

var FORM_VERSION = "v1-2026-09";
  var TOTAL = 13, MULTI_Q = 13, MULTI_PICK = 3, OTHER = "H";

  var form = root.querySelector(".lekha-form");
  var endpoint = trim(root.getAttribute("data-endpoint"));
  var requireAll = root.getAttribute("data-require-all") !== "false";
  var startedAt = new Date().getTime();
  var sending = false;

  var progressText = byId("lekha-progress-text");
  var segs = all(".lekha-seg");
  var submitBtn = byId("lekha-submit");
  var formErr = byId("lekha-form-err");
  var otherWrap = byId("lekha-q" + MULTI_Q + "-other-wrap");
  var otherInput = byId("lekha-q" + MULTI_Q + "-other");
  var multiCount = byId("lekha-q" + MULTI_Q + "-count");

  /* ---------- helpers ---------- */
  function byId(id) { return document.getElementById(id); }
  function all(sel, ctx) { return Array.prototype.slice.call((ctx || root).querySelectorAll(sel)); }
  function trim(s) { return String(s == null ? "" : s).replace(/^\s+|\s+$/g, ""); }
  function mr(n) { return String(n).replace(/[0-9]/g, function (d) { return "०१२३४५६७८९".charAt(+d); }); }
  function show(el, on) { if (on) { el.removeAttribute("hidden"); } else { el.setAttribute("hidden", ""); } }
  function field(name) { return form.querySelector('[name="' + name + '"]'); }
  function optName(n) { return n === MULTI_Q ? "q" + n + "_opt" : "q" + n; }
  function picked(n) { return all('input[name="' + optName(n) + '"]:checked', form); }
  function isAnswered(n) { var c = picked(n).length; return n === MULTI_Q ? c === MULTI_PICK : c === 1; }
  function urlParam(key) {
    try {
      var m = new RegExp("[?&]" + key + "=([^&#]*)").exec(window.location.search);
      return m ? decodeURIComponent(m[1].replace(/\+/g, " ")) : "";
    } catch (e) { return ""; }
  }

  /* ---------- pre-fill (form placed on one MLA's page) ---------- */
  function prefill(input, attr, key) {
    var v = trim(root.getAttribute(attr)) || trim(urlParam(key));
    if (v) { input.value = v.slice(0, 120); input.readOnly = true; }
  }
  prefill(field("constituency"), "data-constituency", "constituency");
  prefill(field("mla_name"), "data-mla", "mla");

  if (!endpoint) { show(byId("lekha-demo"), true); }

  /* ---------- live state ---------- */
  function updateProgress() {
    var done = 0;
    for (var n = 1; n <= TOTAL; n++) {
      var ok = isAnswered(n);
      if (ok) { done++; }
      if (segs[n - 1]) {
        segs[n - 1].classList[ok ? "add" : "remove"]("is-done");
        if (ok) { segs[n - 1].classList.remove("is-missing"); }
      }
    }
    progressText.textContent = mr(TOTAL) + " पैकी " + mr(done) + " प्रश्न पूर्ण";
  }

  function updateMulti() {
    var boxes = all('input[name="' + optName(MULTI_Q) + '"]', form);
    var count = picked(MULTI_Q).length;
    var otherOn = false;
    for (var i = 0; i < boxes.length; i++) {
      boxes[i].disabled = count >= MULTI_PICK && !boxes[i].checked;
      if (boxes[i].value === OTHER && boxes[i].checked) { otherOn = true; }
    }
    multiCount.textContent = mr(MULTI_PICK) + " पैकी " + mr(count) + " निवडले";
    show(otherWrap, otherOn);
    if (!otherOn) { otherInput.value = ""; }
  }

  function grow(t) { t.style.height = "auto"; t.style.height = (t.scrollHeight + 2) + "px"; }

  function setError(block, errEl, msg) {
    if (errEl) { errEl.textContent = msg || ""; }
    if (block) { block.classList[msg ? "add" : "remove"]("lekha-has-error"); }
  }
  function clearQuestionError(n) {
    setError(byId("lekha-q" + n), byId("lekha-q" + n + "-err"), "");
  }

  form.addEventListener("change", function (ev) {
    var t = ev.target;
    var block = t.closest ? t.closest(".lekha-q") : null;
    if (block) {
      var n = +block.getAttribute("data-q");
      if (n === MULTI_Q) {
        updateMulti();
        if (t.value === OTHER && t.checked) { otherInput.focus(); }
        if (isAnswered(n)) { clearQuestionError(n); }
      } else if (t.type === "radio") {
        clearQuestionError(n);
      }
    }
    if (t.id === "lekha-consent" && t.checked) { setError(byId("lekha-consent-wrap"), byId("lekha-consent-err"), ""); }
    updateProgress();
    formErr.textContent = "";
  });

  form.addEventListener("input", function (ev) {
    var t = ev.target;
    if (t.tagName === "TEXTAREA") { grow(t); }
    if (t.name === "constituency" || t.name === "mla_name") { setError(byId("lekha-who"), byId("lekha-who-err"), ""); }
    if (t === otherInput && trim(t.value) && isAnswered(MULTI_Q)) { clearQuestionError(MULTI_Q); }
  });

  /* ---------- validation ---------- */
  function validate() {
    var firstBad = null, missing = [];
    function bad(el) { if (!firstBad) { firstBad = el; } }

    if (!trim(field("constituency").value) && !trim(field("mla_name").value)) {
      setError(byId("lekha-who"), byId("lekha-who-err"), "कृपया तुमचा मतदारसंघ किंवा आमदारांचे नाव, यांपैकी किमान एक लिहा.");
      bad(field("constituency"));
    }

    for (var n = 1; n <= TOTAL; n++) {
      var block = byId("lekha-q" + n), err = byId("lekha-q" + n + "-err");
      var count = picked(n).length, msg = "";
      if (n === MULTI_Q) {
        var otherOn = !!form.querySelector('input[name="' + optName(n) + '"][value="' + OTHER + '"]:checked');
        if ((requireAll || count > 0) && count !== MULTI_PICK) { msg = "कृपया तीन गुण निवडा."; }
        else if (otherOn && !trim(otherInput.value)) { msg = "तुम्ही ‘इतर’ निवडले आहे. तो गुण कोणता, ते थोडक्यात लिहा."; }
      } else if (requireAll && count !== 1) {
        msg = "कृपया एक पर्याय निवडा.";
      }
      setError(block, err, msg);
      if (msg) {
        missing.push(n);
        if (segs[n - 1]) { segs[n - 1].classList.add("is-missing"); }
        bad(msg.indexOf("इतर") > -1 ? otherInput : block.querySelector("input:not(:disabled)"));
      }
    }

    var consent = byId("lekha-consent");
    if (!consent.checked) {
      setError(byId("lekha-consent-wrap"), byId("lekha-consent-err"), "उत्तरे नोंदवण्यासाठी तुमची संमती आवश्यक आहे.");
      bad(consent);
    }

    if (firstBad) {
      var parts = [];
      if (missing.length) {
        var nums = [];
        for (var i = 0; i < missing.length; i++) { nums.push(mr(missing[i])); }
        parts.push("हे प्रश्न राहिले आहेत: " + nums.join(", ") + ".");
      }
      parts.push("लाल रंगात दाखवलेल्या जागा पूर्ण करून पुन्हा ‘उत्तरे नोंदवा’ दाबा.");
      formErr.textContent = parts.join(" ");
      var target = firstBad.closest ? (firstBad.closest(".lekha-q") || firstBad.closest(".lekha-who") || firstBad) : firstBad;
      try { target.scrollIntoView({ behavior: "smooth", block: "start" }); } catch (e) { target.scrollIntoView(true); }
      try { firstBad.focus({ preventScroll: true }); } catch (e2) { firstBad.focus(); }
      return false;
    }
    formErr.textContent = "";
    return true;
  }

  /* ---------- collect + send ---------- */
  function collect() {
    var d = {};
    d.form_version = FORM_VERSION;
    d.submitted_at = new Date().toISOString();
    d.page_url = window.location.href;
    d.elapsed_seconds = Math.round((new Date().getTime() - startedAt) / 1000);
    d.constituency = trim(field("constituency").value);
    d.mla_name = trim(field("mla_name").value);
    d.locality = trim(field("locality").value);
    d.respondent_name = trim(field("respondent_name").value);
    for (var n = 1; n <= TOTAL; n++) {
      var vals = [], p = picked(n);
      for (var i = 0; i < p.length; i++) { vals.push(p[i].value); }
      d["q" + n] = vals.join(",");
      if (n === MULTI_Q) { d["q" + n + "_other"] = trim(otherInput.value); }
      d["q" + n + "_comment"] = trim(field("q" + n + "_comment").value);
    }
    d.consent = "yes";
    return d;
  }

  function finish(data, showData) {
    sending = false;
    show(form, false);
    show(byId("lekha-demo"), false);
    if (showData) {
      var body = byId("lekha-sent-body");
      for (var k in data) {
        if (!Object.prototype.hasOwnProperty.call(data, k)) { continue; }
        var tr = document.createElement("tr"), th = document.createElement("th"), td = document.createElement("td");
        th.textContent = k; td.textContent = data[k] === "" ? "—" : data[k];
        tr.appendChild(th); tr.appendChild(td); body.appendChild(tr);
      }
      show(byId("lekha-sent"), true);
    }
    var done = byId("lekha-done");
    show(done, true);
    try { root.scrollIntoView({ block: "start" }); } catch (e) { root.scrollIntoView(true); }
    try { done.focus({ preventScroll: true }); } catch (e2) { done.focus(); }
  }

  function fail() {
    sending = false;
    submitBtn.disabled = false;
    submitBtn.textContent = "उत्तरे नोंदवा";
    formErr.textContent = "उत्तरे नोंदवता आली नाहीत. इंटरनेट जोडणी तपासून पुन्हा प्रयत्न करा. तुम्ही भरलेली उत्तरे तशीच आहेत.";
  }

  function send() {
    if (sending || !validate()) { return; }
    var data = collect();

    if (trim(field("website").value)) { finish(data, false); return; }   /* spam trap: quietly drop */
    if (!endpoint) { finish(data, true); return; }                        /* test mode */

    sending = true;
    submitBtn.disabled = true;
    submitBtn.textContent = "नोंदवत आहे…";

    var fd = new FormData();
    for (var k in data) { if (Object.prototype.hasOwnProperty.call(data, k)) { fd.append(k, data[k]); } }
    fd.append("website", "");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", endpoint, true);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.timeout = 25000;
    xhr.onload = function () { if (xhr.status >= 200 && xhr.status < 300) { finish(data, false); } else { fail(); } };
    xhr.onerror = fail;
    xhr.ontimeout = fail;
    xhr.send(fd);
  }

  submitBtn.addEventListener("click", send);
  form.addEventListener("submit", function (ev) { ev.preventDefault(); send(); });

  updateMulti();
  updateProgress();

};
</script>
<!-- viraj js end -->

</body>

</html>

