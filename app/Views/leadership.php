<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Maharashtra MLA Watch</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700;800&family=Inter:opsz@14..32&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
  <style>
    /* ===== GLOBAL ===== */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      background: #F8FAFC;
      color: #1A1A2E;
      -webkit-font-smoothing: antialiased;
    }

    /* ============================================================
       MLA CARD
    ============================================================ */
    .mla-card {
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      height: 100%;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
      border: 1px solid #f0ece6;
      position: relative;
      display: flex;
      flex-direction: column;
      padding: 20px 20px 18px 20px;
    }
    .mla-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
      border-color: rgba(232, 122, 42, 0.15);
    }

    .mla-card .avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 1.1rem;
      color: #fff;
      flex-shrink: 0;
      overflow: hidden;
    }
    .mla-card .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .mla-card .mla-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.05rem;
      font-weight: 700;
      color: #1A1A2E;
      margin-bottom: 0;
    }
    .mla-card .mla-name-mr {
      font-size: 0.78rem;
      color: #8A847C;
      font-weight: 400;
      margin-bottom: 2px;
    }
    .mla-card .mla-constituency {
      font-size: 0.75rem;
      color: #8A847C;
    }
    .mla-card .mla-constituency i {
      font-size: 0.65rem;
    }

    .mla-card .party-badge {
      display: inline-block;
      padding: 2px 12px;
      border-radius: 9999px;
      font-size: 0.65rem;
      font-weight: 700;
      background: #F0EEEA;
      color: #4C4741;
    }
    .mla-card .party-badge.bjp { background: #FF6B00; color: #fff; }
    .mla-card .party-badge.ss { background: #FF8C00; color: #fff; }
    .mla-card .party-badge.ncp { background: #1565FF; color: #fff; }
    .mla-card .party-badge.inc { background: #00A86B; color: #fff; }
    .mla-card .party-badge.ssubt { background: #E53935; color: #fff; }

    .mla-card .elected-year {
      font-size: 0.6rem;
      color: #A8A29A;
    }

    .mla-card .info-row {
      display: flex;
      align-items: center;
      gap: 16px;
      font-size: 0.75rem;
      color: #6B655D;
      margin-top: 8px;
      flex-wrap: wrap;
    }
    .mla-card .info-row .rating-value {
      font-weight: 700;
      color: #1A1A2E;
    }
    .mla-card .info-row .stars {
      color: #F5A623;
      letter-spacing: 1px;
    }

    .mla-card .manifesto-row {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 6px;
    }
    .mla-card .manifesto-row .manifesto-text {
      font-size: 0.7rem;
      color: #8A847C;
    }
    .mla-card .manifesto-row .progress-bar-custom {
      height: 5px;
      background: #E0DCD6;
      border-radius: 4px;
      overflow: hidden;
      flex: 1;
      max-width: 80px;
    }
    .mla-card .manifesto-row .progress-bar-custom .fill {
      height: 100%;
      border-radius: 4px;
      background: linear-gradient(90deg, #E87A2A, #F5A623);
      transition: width 0.6s ease;
    }
    .mla-card .manifesto-row .manifesto-percent {
      font-size: 0.7rem;
      font-weight: 600;
      color: #1A1A2E;
    }

    .mla-card .card-actions {
      display: flex;
      gap: 8px;
      margin-top: 12px;
      padding-top: 12px;
      border-top: 1px solid #F0EEEA;
      justify-content: center;
    }
    .btn-view-profile {
      background: linear-gradient(135deg, #E87A2A, #C96A1F);
      border: none;
      color: #fff;
      padding: 8px 28px;
      border-radius: 9999px;
      font-weight: 600;
      font-size: 0.8rem;
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .btn-view-profile:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 16px rgba(232, 122, 42, 0.3);
      color: #fff;
    }

    /* ===== HEADER - UPDATED ===== */
    .header-premium {
      background: #fff;
      display: flex;
      align-items: center;
      box-shadow: 0 12px 35px rgba(0,0,0,0.08);
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
      background: linear-gradient(90deg, #FF9933 0%, #FF9933 33.33%, #ffffff 33.33%, #ffffff 66.66%, #138808 66.66%, #138808 100%);
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

    /* ===== UPDATED LOGO STYLES ===== */
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
      transition: all 0.3s ease;
    }
    .logo-img:hover {
      border-color: #E87A2A;
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
      color: #1A1A2E;
      margin: 0;
      letter-spacing: -0.5px;
    }
    .logo-title span {
      color: #E87A2A;
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
      border-radius: 9999px;
      font-size: 0.8rem;
      font-weight: 500;
      color: #6B655D;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .nav-links a:hover { background: #F0EEEA; color: #1A1A2E; }
    .nav-links a.active { color: #E87A2A; background: rgba(232,122,42,0.08); }
    .header-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .theme-btn {
      width: 40px;
      height: 40px;
      border-radius: 8px;
      background: #FAF8F6;
      border: 1px solid #E0DCD6;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 1.1rem;
      color: #6B655D;
    }
    .theme-btn:hover { background: #F0EEEA; color: #E87A2A; }
    .hamburger {
      width: 40px;
      height: 40px;
      border-radius: 8px;
      background: #FAF8F6;
      border: 1px solid #E0DCD6;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 4px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .hamburger:hover { background: #F0EEEA; }
    .hamburger span {
      width: 18px;
      height: 2px;
      background: #2E2A26;
      border-radius: 2px;
      transition: all 0.3s ease;
    }
    .hamburger:hover span { background: #E87A2A; }

    /* ===== FOOTER ===== */
    .footer-premium {
      background: #ffffff;
      color: #6B655D;
      padding: 0;
      margin-top: 0;
      border: none;
      box-shadow: 0 -4px 30px rgba(0, 0, 0, 0.04);
    }
    .footer-flag-strip {
      width: 100%;
      height: 5px;
      flex-shrink: 0;
      background: linear-gradient(90deg, #FF9933 0%, #FF9933 33.33%, #ffffff 33.33%, #ffffff 66.66%, #138808 66.66%, #138808 100%);
    }
    .footer-content { padding: 40px 0 24px; }
    .footer-premium .brand {
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: #1A1A2E;
    }
    .footer-premium .brand span { color: #E87A2A; }
    .footer-premium p { font-size: 0.8rem; color: #6B655D; }
    .footer-premium a { color: #8A847C; text-decoration: none; transition: all 0.3s ease; font-size: 0.8rem; }
    .footer-premium a:hover { color: #E87A2A; }
    .footer-premium h6 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: #1A1A2E;
      font-size: 0.9rem;
      margin-bottom: 16px;
    }
    .footer-premium ul { list-style: none; padding: 0; margin: 0; }
    .footer-premium ul li { margin-bottom: 8px; }
    .footer-premium .bottom {
      border-top: 1px solid #F0EEEA;
      padding-top: 16px;
      margin-top: 24px;
      text-align: center;
      font-size: 0.7rem;
      color: #A8A29A;
    }

    /* ===== FILTER BAR ===== */
    .filter-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 20px;
    }
    .filter-bar input,
    .filter-bar select {
      padding: 8px 14px;
      border-radius: 9999px;
      border: 1px solid #E0DCD6;
      font-size: 0.8rem;
      background: #fff;
      transition: all 0.3s ease;
      flex: 1;
      min-width: 140px;
    }
    .filter-bar input:focus,
    .filter-bar select:focus {
      outline: none;
      border-color: #E87A2A;
      box-shadow: 0 0 0 4px rgba(232, 122, 42, 0.06);
    }
    .btn-orange {
      background: linear-gradient(135deg, #E87A2A, #C96A1F);
      border: none;
      color: #fff;
      padding: 8px 24px;
      border-radius: 9999px;
      font-weight: 600;
      font-size: 0.8rem;
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .btn-orange:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(232, 122, 42, 0.3);
      color: #fff;
    }
    .btn-outline-orange {
      background: transparent;
      border: 2px solid #E87A2A;
      color: #E87A2A;
      padding: 6px 20px;
      border-radius: 9999px;
      font-weight: 600;
      font-size: 0.8rem;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    .btn-outline-orange:hover {
      background: #E87A2A;
      color: #fff;
      transform: translateY(-2px);
    }

    /* ===== GRADE CATEGORY CARDS ===== */
    .category-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 14px 10px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
      border: 2px solid #e9dfcf;
      box-shadow: 0 4px 12px rgba(0,0,0,0.04);
      height: 100%;
    }
    .category-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 28px rgba(0,0,0,0.08);
      border-color: #d4af37;
    }
    .category-card.active {
      border-color: #d4af37;
      background: #fcf8f0;
      box-shadow: 0 8px 24px rgba(212,175,55,0.15);
    }
    .category-card .grade {
      font-size: 1.6rem;
      font-weight: 800;
      color: #1A1A2E;
      line-height: 1.2;
    }
    .category-card .grade-label {
      font-size: 0.6rem;
      font-weight: 600;
      color: #8A847C;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }
    .category-card .grade-count {
      font-size: 0.7rem;
      font-weight: 600;
      color: #6B655D;
      margin-top: 2px;
    }

    /* ===== SECTION ===== */
    .section-padding { padding: 60px 0; }
    .section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 12px;
      margin-bottom: 24px;
    }
    .section-title-sm {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #1A1A2E;
    }
    .section-sub {
      color: #8A847C;
      font-size: 0.85rem;
    }

    /* ===== SCROLL REVEAL ===== */
    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: all 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* ============================================================
       MODAL - ATTRACTIVE PERFORMANCE PROFILE
    ============================================================ */
    .modal-premium .modal-content {
      border-radius: 28px;
      border: none;
      box-shadow: 0 30px 80px rgba(0,0,0,0.15);
      overflow: hidden;
    }
    .modal-premium .modal-header {
      border-bottom: none;
      padding: 24px 28px 0 28px;
      background: linear-gradient(135deg, #F8FAFC 0%, #fff 100%);
    }
    .modal-premium .modal-header .modal-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.5rem;
      color: #1A1A2E;
    }
    .modal-premium .modal-body {
      padding: 24px 28px 28px;
    }

    /* Profile Header */
    .profile-header {
      background: linear-gradient(135deg, #1A1A2E 0%, #2C2C3E 100%);
      border-radius: 20px;
      padding: 28px 30px;
      margin-bottom: 24px;
      position: relative;
      overflow: hidden;
    }
    .profile-header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -10%;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: rgba(232,122,42,0.08);
      pointer-events: none;
    }
    .profile-header .avatar-lg {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.2rem;
      font-weight: 700;
      border: 3px solid #E87A2A;
      flex-shrink: 0;
      background: rgba(255,255,255,0.1);
      color: #fff;
      overflow: hidden;
    }
    .profile-header .avatar-lg img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .profile-header .name-lg {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 2px;
    }
    .profile-header .name-mr-lg {
      font-size: 0.9rem;
      color: rgba(255,255,255,0.6);
    }
    .profile-header .constituency-lg {
      font-size: 0.85rem;
      color: rgba(255,255,255,0.7);
    }
    .profile-header .party-badge-lg {
      display: inline-block;
      padding: 4px 16px;
      border-radius: 9999px;
      font-size: 0.7rem;
      font-weight: 700;
      background: rgba(255,255,255,0.15);
      color: #fff;
      border: 1px solid rgba(255,255,255,0.1);
    }
    .profile-header .grade-badge-lg {
      display: inline-block;
      padding: 4px 16px;
      border-radius: 9999px;
      font-size: 0.7rem;
      font-weight: 700;
      background: #F5A623;
      color: #1A1A2E;
    }
    .profile-header .rating-stars-lg {
      color: #F5A623;
      font-size: 1.1rem;
      letter-spacing: 2px;
    }
    .profile-header .rating-text-lg {
      font-size: 0.85rem;
      color: rgba(255,255,255,0.7);
    }
    .profile-header .btn-rate-lg {
      background: linear-gradient(135deg, #E87A2A, #C96A1F);
      border: none;
      color: #fff;
      padding: 8px 24px;
      border-radius: 9999px;
      font-weight: 600;
      font-size: 0.8rem;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    .profile-header .btn-rate-lg:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 24px rgba(232,122,42,0.3);
    }

    /* Section Cards */
    .section-card {
      background: #fff;
      border-radius: 16px;
      padding: 18px 20px;
      border: 1px solid #F0EEEA;
      margin-bottom: 16px;
      transition: all 0.3s ease;
    }
    .section-card:hover {
      border-color: #E87A2A;
      box-shadow: 0 4px 16px rgba(232,122,42,0.06);
    }
    .section-card .section-title {
      font-family: 'Playfair Display', serif;
      font-size: 1rem;
      font-weight: 700;
      color: #1A1A2E;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .section-card .section-title i {
      color: #E87A2A;
      font-size: 1.1rem;
    }

    .progress-bar-custom-lg {
      height: 6px;
      background: #F0EEEA;
      border-radius: 10px;
      overflow: hidden;
      flex: 1;
    }
    .progress-bar-custom-lg .fill {
      height: 100%;
      border-radius: 10px;
      transition: width 0.8s ease;
    }

    .stat-box {
      background: #F8FAFC;
      border-radius: 12px;
      padding: 10px 12px;
      text-align: center;
      border: 1px solid #F0EEEA;
      transition: all 0.3s ease;
    }
    .stat-box:hover {
      border-color: #E87A2A;
      transform: translateY(-2px);
    }
    .stat-box .stat-value {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: #1A1A2E;
    }
    .stat-box .stat-label {
      font-size: 0.6rem;
      font-weight: 600;
      color: #8A847C;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .timeline-item {
      padding: 8px 0;
      border-bottom: 1px solid #F0EEEA;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .timeline-item:last-child {
      border-bottom: none;
    }
    .timeline-item .timeline-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #E87A2A;
      flex-shrink: 0;
    }
    .timeline-item .timeline-text {
      font-size: 0.85rem;
      color: #4C4741;
    }
    .timeline-item .timeline-num {
      font-size: 0.7rem;
      font-weight: 700;
      color: #8A847C;
      width: 28px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 576px) {
      .mla-card { padding: 16px; }
      .mla-card .mla-name { font-size: 0.95rem; }
      .mla-card .mla-name-mr { font-size: 0.7rem; }
      .logo-title { font-size: 1rem; }
      .logo-subtitle { font-size: 0.55rem; letter-spacing: 0.8px; }
      .logo-img { width: 36px; height: 36px; }
      .logo-wrapper { gap: 8px; }
      .header-premium .container { height: 64px; }
      .category-card .grade { font-size: 1.2rem; }
      .profile-header { padding: 20px; }
      .profile-header .avatar-lg { width: 70px; height: 70px; font-size: 1.6rem; }
      .profile-header .name-lg { font-size: 1.2rem; }
      .modal-premium .modal-body { padding: 16px; }
      .section-card { padding: 14px 16px; }
      .stat-box .stat-value { font-size: 1rem; }
    }
  </style>
</head>
<body>

<!-- ===== HEADER - UPDATED ===== -->
<header class="header-premium" id="premiumHeader">
  <div class="header-flag-strip"></div>
  <div class="container">
    <div class="header-inner">
      <a href="#" class="logo-wrapper">
        <img src="https://png.pngtree.com/png-clipart/20250222/original/pngtree-vibrant-watercolor-painting-of-the-ashoka-chakra-indian-flag-emblem-png-image_20495965.png" class="logo-img" alt="Maharashtra MLA Watch Logo">
        <div class="logo-content">
          <div class="logo-title">Leader</div>
          <div class="logo-subtitle">Tracker</div>
        </div>
      </a>
      <nav class="nav-links d-none d-lg-flex">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('mla') ?>">MLAs</a>
        <a href="<?= base_url('leadership') ?>" class="active">Leaderboard</a>
      </nav>
      <div class="header-actions">
        <button class="theme-btn"><i class="bi bi-moon"></i></button>
        <button class="hamburger d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </div>
</header>

<!-- ===== MOBILE MENU ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" style="background:rgba(255,255,255,0.98);backdrop-filter:blur(20px);width:300px;max-width:85vw;border:none;">
  <div class="offcanvas-header" style="border-bottom:1px solid #F0EEEA;padding:16px 20px;">
    <div class="logo-text" style="font-size:20px;">Maharashtra <span>MLA Watch</span></div>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body" style="padding:20px;">
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('mla') ?>">MLAs</a>
    <a href="<?= base_url('leadership') ?>" class="active">Leaderboard</a>
  </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<section class="section-padding" id="allMlasSection">
  <div class="container">
    <div class="section-header reveal">
      <div>
        <h2 class="section-title-sm">All MLAs</h2>
        <span class="section-sub">Browse and rate Maharashtra representatives</span>
      </div>
    </div>

    <!-- Grade Score Boxes -->
    <div class="row g-3 mb-4" id="categoryContainer">
      <!-- injected by JS -->
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar reveal">
      <input type="text" id="mlaName" placeholder="Search by name..." class="form-control">
      <select id="party" class="form-select">
        <option value="">All Parties</option>
      </select>
      <select id="district" class="form-select">
        <option value="">All Districts</option>
      </select>
      <select id="sortOrder" class="form-select">
        <option value="asc">A → Z</option>
        <option value="desc">Z → A</option>
      </select>
      <button class="btn-orange" onclick="filterMLAs()">
        <i class="bi bi-search"></i> Filter
      </button>
      <button class="btn-outline-orange" onclick="resetAllFilters()">
        Reset
      </button>
    </div>

    <!-- MLA Grid -->
    <div class="row g-4 mt-2" id="mlaResult"></div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer-premium">
  <div class="footer-flag-strip"></div>
  <div class="container footer-content">
    <div class="row g-4">
      <div class="col-md-4">
          <div class="brand">Leader<span> Tracker</span></div>
        <p style="max-width:300px;margin-top:8px;">A citizen-powered accountability platform tracking work done and manifesto fulfillment by Maharashtra MLAs.</p>
        <p style="font-size:0.7rem;color:#A8A29A;">All ratings are citizen-submitted. Data is crowdsourced and reflects public opinion.</p>
      </div>
      <div class="col-6 col-md-2">
        <h6>Quick Links</h6>
        <ul><li><a href="#">Home</a></li><li><a href="#">MLAs</a></li><li><a href="#">Leaderboard</a></li></ul>
      </div>
    </div>
    <div class="bottom">
      <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- ===== MODAL: Attractive Performance Profile ===== -->
<div class="modal fade modal-premium" id="profileModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileName"><i class="bi bi-person-badge me-2"></i>MLA Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="profileBody"></div>
    </div>
  </div>
</div>

<!-- ===== SCRIPTS ===== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ============================================================
//  PARTY ASSETS
// ============================================================
const partyAssets = {
  "BJP": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmBwcZ-_WB4yCVyhSwF4zZ3MK12ugxutbS7gpOikbaWg&s=10" },
  "Shiv Sena (ES)": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9qj-N8C5e58x8NOhIvOkNFALgk86OS3yqWmnWiVJbww&s=10" },
  "NCP": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGWfyFzZjk548RABqcdENBkVxtvamZpWr2VclSPcZHqA&s=10" },
  "INC": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdGt1cQ8XjQUQO0CVpWX4m1mX4m1mX4m1mX4m1mX4&s=10" },
  "NCP (Sharad Pawar)": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGCVHPDHZ0I1H4XD84_f6kdvS5-fCdmbjaKe2sN7wgjQ&s=10" },
  "Shiv Sena (UBT)": { logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS13aS-AjFH1-cZwHzxjQivUbfkAYLgroRqU_3C0uwmtg&s=10" }
};
const FALLBACK_LOGO = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Crect width='100' height='100' fill='%23e8dccc'/%3E%3Ctext x='50' y='50' font-size='12' text-anchor='middle' dy='.3em' fill='%237a5a2a'%3EParty%3C/text%3E%3C/svg%3E";

const partyColorMap = {
  "BJP": { primary: "#FF6B00", secondary: "#FF8F33", lightBg: "#FFF4E8" },
  "Shiv Sena (ES)": { primary: "#FF8C00", secondary: "#FFB74D", lightBg: "#FFF8E1" },
  "NCP": { primary: "#1565FF", secondary: "#42A5F5", lightBg: "#EEF5FF" },
  "Shiv Sena (UBT)": { primary: "#E53935", secondary: "#EF5350", lightBg: "#FFF1F1" },
  "INC": { primary: "#00A86B", secondary: "#26C281", lightBg: "#EEFFF7" },
  "NCP (Sharad Pawar)": { primary: "#7B2CBF", secondary: "#9C4DCC", lightBg: "#F8F0FF" }
};

const geography = {
  "Thane": ["Thane", "Kopri-Pachpakhadi", "Ovala-Majiwada", "Mira Bhayandar", "Bhiwandi East", "Bhiwandi West", "Kalyan West", "Kalyan East", "Dombivli", "Ambernath", "Ulhasnagar", "Mumbra-Kalwa", "Airoli", "Belapur"],
  "Nagpur": ["Katol", "Savner", "Hingna", "Umred", "Nagpur South West", "Nagpur South", "Nagpur East", "Nagpur Central", "Nagpur West", "Nagpur North", "Kamptee", "Ramtek"],
  "Satara": ["Man", "Karad North", "Karad South", "Patan", "Jaoli", "Wai", "Koregaon", "Phaltan", "Khandala"],
  "Pune": ["Shirur", "Daund", "Indapur", "Baramati", "Purandar", "Bhor", "Maval", "Chinchwad", "Pimpri", "Bhosari", "Vadgaon Sheri", "Shivajinagar", "Kothrud", "Khadakwasla", "Parvati", "Hadapsar", "Pune Cantonment", "Kasba Peth"],
  "Mumbai": ["Colaba", "Malabar Hill", "Mumbadevi", "Byculla", "Shivadi", "Worli", "Mahim", "Dharavi", "Sion Koliwada", "Wadala"],
  "Ahmednagar": ["Ahmednagar City", "Shrigonda", "Rahuri"],
  "Kolhapur": ["Kolhapur North", "Kolhapur South", "Kagal"],
  "Nashik": ["Nashik East", "Nashik West", "Deolali"]
};

const mlaAssembly = [
  { id: 1, name: "Devendra Fadnavis", marathiName: "देवेंद्र फडणवीस", initials: "DF", district: "Nagpur", constituency: "Nagpur South West", party: "BJP", grade: "A+", ratingScore: 2.7, ratings: 3, manifestoFulfilled: 13, firstElected: "2024", 
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStvxUGPAClLVGXg8r5U1Cxl7VuSn5KswQO6unnzhdIxQ&s=10",
    age: 52, education: "LL.B.", profession: "Politician, Lawyer", bio: "Devendra Fadnavis is a senior BJP leader and former Chief Minister of Maharashtra.",
    infra: 98, womenSafety: 90, healthcare: 94, education: 92, transparency: 92, accessibility: 90, employment: 88, road: 97, water: 94, digital: 92, environment: 82, lawOrder: 93, youth: 88, farmer: 78, publicSat: 98,
    completed: 72, running: 30, pending: 6, complaintsResolved: 2100, responseTime: 1.8, fundUtil: 92, schemeSuccess: 90, attendance: 95,
    timeline: ['Elected 1999', 'Became CM 2014', 'Urban Development Project', 'Smart City Initiative', 'IT Park Launch'] },
  { id: 2, name: "Eknath Shinde", marathiName: "एकनाथ शिंदे", initials: "ES", district: "Thane", constituency: "Kopri-Pachpakhadi", party: "Shiv Sena (ES)", grade: "A+", ratingScore: 2.7, ratings: 3, manifestoFulfilled: 13, firstElected: "2024",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1NGljE8Ngab0V6mQkSMycyNgBuQ8jKzUhV-lEJbcUiw&s=10",
    age: 58, education: "B.E. Civil", profession: "Politician, Social Worker", bio: "Eknath Shinde is a senior leader of Shiv Sena (ES) and currently serves as the Chief Minister of Maharashtra.",
    infra: 95, womenSafety: 88, healthcare: 92, education: 90, transparency: 85, accessibility: 94, employment: 82, road: 96, water: 92, digital: 80, environment: 78, lawOrder: 90, youth: 85, farmer: 75, publicSat: 96,
    completed: 65, running: 28, pending: 8, complaintsResolved: 1850, responseTime: 2.5, fundUtil: 88, schemeSuccess: 85, attendance: 92,
    timeline: ['Elected 2004', 'Became CM 2022', 'Major Road Project', 'School Renovation', 'Hospital Expansion'] },
  { id: 3, name: "Chh Shivendra Raje Bhosale", marathiName: "शिवेंद्र राजे भोसले", initials: "SRB", district: "Satara", constituency: "Jaoli", party: "BJP", grade: "A-", ratingScore: 2.7, ratings: 3, manifestoFulfilled: 13, firstElected: "2024",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq9MdbQ5p9mCdUedqffaq4_dJD_TKSJ64CtpvzEEnMcg&s=10",
    age: 48, education: "B.A. History", profession: "Politician, Agriculturist", bio: "Shivendra Raje Bhosale is a BJP leader from Satara district.",
    infra: 88, womenSafety: 82, healthcare: 86, education: 85, transparency: 84, accessibility: 88, employment: 80, road: 90, water: 92, digital: 76, environment: 80, lawOrder: 84, youth: 82, farmer: 92, publicSat: 92,
    completed: 55, running: 25, pending: 10, complaintsResolved: 1400, responseTime: 3.2, fundUtil: 84, schemeSuccess: 82, attendance: 88,
    timeline: ['Elected 2009', 'Water Pipeline Project', 'Solar Plant Initiative'] },
  { id: 4, name: "Makarand Patil", marathiName: "मकरंद पाटील", initials: "MP", district: "Satara", constituency: "Khandala", party: "NCP", grade: "B+", ratingScore: 2.7, ratings: 3, manifestoFulfilled: 13, firstElected: "2024",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTksDnHBv0qgkjvbIwYhetTmC4Gg3HAGcot8CdfeZ-XNw&s=10",
    age: 55, education: "B.Com.", profession: "Politician, Businessman", bio: "Makarand Patil is an NCP leader from Satara.",
    infra: 82, womenSafety: 75, healthcare: 80, education: 78, transparency: 76, accessibility: 82, employment: 84, road: 80, water: 78, digital: 72, environment: 70, lawOrder: 76, youth: 78, farmer: 80, publicSat: 84,
    completed: 50, running: 22, pending: 14, complaintsResolved: 1200, responseTime: 4.0, fundUtil: 78, schemeSuccess: 76, attendance: 82,
    timeline: ['Elected 2009', 'Industrial Park Project'] },
  { id: 5, name: "Uddhav Thackeray", marathiName: "उद्धव ठाकरे", initials: "UT", district: "Mumbai", constituency: "Mahim", party: "Shiv Sena (UBT)", grade: "A-", ratingScore: 1.7, ratings: 3, manifestoFulfilled: 27, firstElected: "2019",
    image: "https://i.pinimg.com/736x/f8/c4/68/f8c46840bee48df1157ae44b44dd25ef.jpg",
    age: 64, education: "B.Sc.", profession: "Politician, Photographer", bio: "Uddhav Thackeray is the chief of Shiv Sena (UBT) and former Chief Minister.",
    infra: 90, womenSafety: 85, healthcare: 88, education: 86, transparency: 82, accessibility: 86, employment: 80, road: 88, water: 84, digital: 78, environment: 82, lawOrder: 85, youth: 80, farmer: 72, publicSat: 89,
    completed: 48, running: 26, pending: 12, complaintsResolved: 1600, responseTime: 3.0, fundUtil: 82, schemeSuccess: 80, attendance: 86,
    timeline: ['Elected 2009', 'Became CM 2019', 'Housing Project', 'Metro Initiative'] },
  { id: 6, name: "Jayant Patil", marathiName: "जयंत पाटील", initials: "JP", district: "Pune", constituency: "Indapur", party: "NCP (Sharad Pawar)", grade: "B+", ratingScore: 1.7, ratings: 3, manifestoFulfilled: 27, firstElected: "2019",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgW4DmOIsgWr_MlVFaIBQwr0GBxHJzq4MDA1YWpdi0wQ&s=10",
    age: 50, education: "B.E. Mechanical", profession: "Politician, Engineer", bio: "Jayant Patil is a senior NCP (Sharad Pawar) leader.",
    infra: 80, womenSafety: 72, healthcare: 78, education: 76, transparency: 74, accessibility: 80, employment: 78, road: 76, water: 80, digital: 70, environment: 68, lawOrder: 74, youth: 76, farmer: 78, publicSat: 82,
    completed: 45, running: 20, pending: 15, complaintsResolved: 1100, responseTime: 4.5, fundUtil: 76, schemeSuccess: 74, attendance: 80,
    timeline: ['Elected 2004', 'Irrigation Project'] },
  { id: 7, name: "Aaditya Thackeray", marathiName: "आदित्य ठाकरे", initials: "AT", district: "Mumbai", constituency: "Worli", party: "Shiv Sena (UBT)", grade: "B+", ratingScore: 1.7, ratings: 3, manifestoFulfilled: 27, firstElected: "2019",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpOBJk4aw0Id3PwJnySMln-nJYdR3vJsTgINJAs3FBtg&s=10",
    age: 34, education: "B.A. Law", profession: "Politician, Social Activist", bio: "Aaditya Thackeray is a young leader of Shiv Sena (UBT).",
    infra: 78, womenSafety: 80, healthcare: 76, education: 82, transparency: 80, accessibility: 88, employment: 72, road: 76, water: 74, digital: 78, environment: 90, lawOrder: 78, youth: 92, farmer: 65, publicSat: 84,
    completed: 42, running: 28, pending: 10, complaintsResolved: 1500, responseTime: 2.8, fundUtil: 80, schemeSuccess: 78, attendance: 84,
    timeline: ['Elected 2019', 'Beach Cleanup Initiative', 'Tree Plantation Drive'] },
  { id: 8, name: "Amit Kadam", marathiName: "अमित कदम", initials: "AK", district: "Satara", constituency: "Jaoli", party: "Shiv Sena (UBT)", grade: "B-", ratingScore: 1.7, ratings: 3, manifestoFulfilled: 27, firstElected: "2014",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVsYF2Sfv60e4N3RTNPDbmvIH2xGdbTn9D5WdQfGa6pw&s=10",
    age: 42, education: "B.A. Political Science", profession: "Politician, Farmer", bio: "Amit Kadam is a Shiv Sena (UBT) leader from Satara.",
    infra: 74, womenSafety: 70, healthcare: 72, education: 70, transparency: 72, accessibility: 78, employment: 74, road: 72, water: 76, digital: 68, environment: 72, lawOrder: 70, youth: 72, farmer: 82, publicSat: 76,
    completed: 38, running: 18, pending: 18, complaintsResolved: 900, responseTime: 5.0, fundUtil: 72, schemeSuccess: 70, attendance: 74,
    timeline: ['Elected 2014', 'Agriculture Development'] },
  { id: 9, name: "Kedar Dighe", marathiName: "केदार दिघे", initials: "KD", district: "Thane", constituency: "Kopri-Pachpakhadi", party: "Shiv Sena (UBT)", grade: "C-", ratingScore: 1.7, ratings: 3, manifestoFulfilled: 27, firstElected: "2019",
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWvvLHD_KEEToCjzzaVXJAbczt1cKLuTldAXrFWmGYwsLple0zQY5saPeE&s=10",
    age: 38, education: "B.Sc. IT", profession: "Politician, Social Worker", bio: "Kedar Dighe is a young Shiv Sena (UBT) leader from Thane.",
    infra: 68, womenSafety: 65, healthcare: 66, education: 70, transparency: 68, accessibility: 72, employment: 66, road: 68, water: 66, digital: 74, environment: 64, lawOrder: 66, youth: 70, farmer: 60, publicSat: 66,
    completed: 28, running: 15, pending: 20, complaintsResolved: 700, responseTime: 6.0, fundUtil: 66, schemeSuccess: 64, attendance: 68,
    timeline: ['Elected 2019', 'IT Initiatives'] }
];

// ============================================================
//  GRADE META - 8 Grades
// ============================================================
const gradesMeta = [
  {label:'A+', desc:'Outstanding', icon:'bi-star-fill', color:'#10B981'},
  {label:'A-', desc:'Excellent', icon:'bi-star', color:'#34D399'},
  {label:'B+', desc:'Very Good', icon:'bi-star-half', color:'#FBBF24'},
  {label:'B-', desc:'Good', icon:'bi-star', color:'#F59E0B'},
  {label:'C+', desc:'Average', icon:'bi-arrow-right-circle', color:'#F97316'},
  {label:'C-', desc:'Below Average', icon:'bi-arrow-down-circle', color:'#EF4444'},
  {label:'D+', desc:'Poor', icon:'bi-exclamation-circle', color:'#DC2626'},
  {label:'D-', desc:'Critical', icon:'bi-exclamation-circle', color:'#B91C1C'}
];

// ============================================================
//  STATE VARIABLES
// ============================================================
let currentGrade = 'All';
let currentFilteredData = [...mlaAssembly];

// ============================================================
//  RENDER GRADE CATEGORIES
// ============================================================
function renderCategories(active = 'All') {
  const container = document.getElementById('categoryContainer');
  if (!container) return;
  
  let html = `<div class="col-6 col-md-3 col-lg-2">
    <div class="category-card ${active === 'All' ? 'active' : ''}" onclick="filterByGrade('All')">
      <div class="grade">All</div>
      <div class="grade-label">All MLAs</div>
      <div class="grade-count">${mlaAssembly.length} MLAs</div>
    </div>
  </div>`;
  
  gradesMeta.forEach(g => {
    const count = mlaAssembly.filter(m => m.grade === g.label).length;
    const isActive = active === g.label;
    html += `<div class="col-6 col-md-3 col-lg-2">
      <div class="category-card ${isActive ? 'active' : ''}" onclick="filterByGrade('${g.label}')">
        <div class="grade" style="color:${g.color}">${g.label}</div>
        <div class="grade-label">${g.desc}</div>
        <div class="grade-count"><i class="bi ${g.icon}"></i> ${count} MLAs</div>
      </div>
    </div>`;
  });
  
  container.innerHTML = html;
}

function filterByGrade(grade) {
  currentGrade = grade;
  renderCategories(grade);
  
  if (grade === 'All') {
    currentFilteredData = [...mlaAssembly];
  } else {
    currentFilteredData = mlaAssembly.filter(m => m.grade === grade);
  }
  
  applyFiltersToCurrentData();
}

// ============================================================
//  BUILD MLA CARD
// ============================================================
function getInitials(name) {
  return name.split(' ').map(w => w[0]).join('').toUpperCase().slice(0, 2);
}

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

function renderStars(rating) {
  const full = Math.floor(rating);
  const half = rating % 1 >= 0.5 ? 1 : 0;
  const empty = 5 - full - half;
  return '★'.repeat(full) + (half ? '½' : '') + '☆'.repeat(empty);
}

function buildGridMLACard(mla) {
  const color = getAvatarColor(mla.party);
  const initials = mla.initials || getInitials(mla.name);
  const partyClass = getPartyClass(mla.party);
  const stars = renderStars(mla.ratingScore || 0);

  return `
    <div class="col-md-6 col-lg-4">
      <div class="mla-card">
        <div class="d-flex align-items-start gap-3">
          <div class="avatar" style="background:${color};">
            <img src="${mla.image}" alt="${mla.name}" onerror="this.style.display='none';this.parentElement.textContent='${initials}';">
          </div>
          <div>
            <div class="mla-name">${mla.name}</div>
            <div class="mla-name-mr">${mla.marathiName || mla.name}</div>
            <div class="mla-constituency"><i class="bi bi-geo-alt"></i> ${mla.constituency}, ${mla.district}</div>
            <div>
              <span class="party-badge ${partyClass}">${mla.party}</span>
              <span class="elected-year ms-2">Elected ${mla.firstElected || '2024'}</span>
            </div>
          </div>
        </div>
        
        <div class="info-row">
          <span><i class="bi bi-person"></i> ${mla.ratings || 0} ratings</span>
          <span class="rating-value"><span class="stars">${stars}</span> ${mla.ratingScore || 0}/5</span>
        </div>
        
        <div class="manifesto-row">
          <span class="manifesto-text">Manifesto Fulfilled</span>
          <div class="progress-bar-custom">
            <div class="fill" style="width:${mla.manifestoFulfilled || 0}%;"></div>
          </div>
          <span class="manifesto-percent">${mla.manifestoFulfilled || 0}%</span>
        </div>
        
        <div class="card-actions">
          <button class="btn-view-profile" onclick="openProfile(${mla.id})">
            <i class="bi bi-eye"></i> View Profile
          </button>
        </div>
      </div>
    </div>
  `;
}

// ============================================================
//  PROFILE MODAL - Complete Attractive Performance Dashboard
// ============================================================
function openProfile(id) {
  const m = mlaAssembly.find(d => d.id === id);
  if (!m) return;
  
  document.getElementById('profileName').innerHTML = `<i class="bi bi-person-badge me-2"></i>${m.name} · MLA Profile`;
  const body = document.getElementById('profileBody');
  
  const style = partyColorMap[m.party] || { primary: "#546E7A", lightBg: "#F5F8FA" };
  const stars = renderStars(m.ratingScore || 0);
  
  // All performance ratings - 15 parameters
  const ratings = [
    {label:'Infrastructure', val:m.infra || 0, icon:'bi-building', color:'#10B981'},
    {label:'Women Safety', val:m.womenSafety || 0, icon:'bi-person-hearts', color:'#8B5CF6'},
    {label:'Healthcare', val:m.healthcare || 0, icon:'bi-heart-pulse', color:'#EF4444'},
    {label:'Education', val:m.education || 0, icon:'bi-mortarboard', color:'#3B82F6'},
    {label:'Transparency', val:m.transparency || 0, icon:'bi-shield-check', color:'#8B5CF6'},
    {label:'Accessibility', val:m.accessibility || 0, icon:'bi-door-open', color:'#10B981'},
    {label:'Employment', val:m.employment || 0, icon:'bi-briefcase', color:'#F59E0B'},
    {label:'Road Development', val:m.road || 0, icon:'bi-signpost-2', color:'#8B5CF6'},
    {label:'Water Supply', val:m.water || 0, icon:'bi-droplet', color:'#3B82F6'},
    {label:'Digital Governance', val:m.digital || 0, icon:'bi-wifi', color:'#8B5CF6'},
    {label:'Environment', val:m.environment || 0, icon:'bi-tree', color:'#10B981'},
    {label:'Law & Order', val:m.lawOrder || 0, icon:'bi-gavel', color:'#EF4444'},
    {label:'Youth Development', val:m.youth || 0, icon:'bi-people', color:'#F59E0B'},
    {label:'Farmer Support', val:m.farmer || 0, icon:'bi-seedling', color:'#10B981'},
    {label:'Public Satisfaction', val:m.publicSat || 0, icon:'bi-emoji-smile', color:'#3B82F6'}
  ];

  let html = `
    <!-- Profile Header -->
    <div class="profile-header">
      <div class="row align-items-center g-3">
        <div class="col-auto">
          <div class="avatar-lg" style="background:${style.lightBg}; border-color:${style.primary}; color:${style.primary};">
            <img src="${m.image}" alt="${m.name}" onerror="this.style.display='none';this.parentElement.textContent='${m.initials}';">
          </div>
        </div>
        <div class="col">
          <div class="name-lg">${m.name}</div>
          <div class="name-mr-lg">${m.marathiName || m.name}</div>
          <div class="constituency-lg"><i class="bi bi-geo-alt"></i> ${m.constituency}, ${m.district}</div>
          <div class="d-flex flex-wrap gap-2 mt-2">
            <span class="party-badge-lg">${m.party}</span>
            <span class="grade-badge-lg">Grade ${m.grade}</span>
          </div>
        </div>
        <div class="col-auto text-end">
          <div class="rating-stars-lg">${stars}</div>
          <div class="rating-text-lg">${m.ratingScore} · ${m.ratings || 0} reviews</div>
          <button class="btn-rate-lg mt-2" onclick="alert('Rate MLA: ${m.name}')">
            <i class="bi bi-star-fill"></i> Rate MLA
          </button>
        </div>
      </div>
    </div>

    <!-- Personal Info -->
    <div class="section-card">
      <div class="section-title"><i class="bi bi-person"></i> Personal Information</div>
      <div class="row g-2">
        <div class="col-6 col-md-3"><strong>Age</strong> <span class="text-muted">${m.age || 'N/A'}</span></div>
        <div class="col-6 col-md-3"><strong>Education</strong> <span class="text-muted">${m.education || 'N/A'}</span></div>
        <div class="col-6 col-md-3"><strong>Profession</strong> <span class="text-muted">${m.profession || 'N/A'}</span></div>
        <div class="col-6 col-md-3"><strong>Elected</strong> <span class="text-muted">${m.firstElected || 'N/A'}</span></div>
      </div>
      <div class="mt-2">
        <strong>Biography</strong>
        <p class="text-muted mb-0" style="font-size:0.85rem;">${m.bio || 'No biography available.'}</p>
      </div>
    </div>

    <!-- Performance Ratings - 15 Parameters -->
    <div class="section-card">
      <div class="section-title"><i class="bi bi-star-fill text-warning"></i> Performance Ratings</div>
      <div class="row g-2">`;
  
  ratings.forEach(r => {
    const color = r.val > 80 ? '#10B981' : r.val > 60 ? '#F59E0B' : '#EF4444';
    html += `
      <div class="col-md-6">
        <div class="d-flex align-items-center">
          <i class="bi ${r.icon} me-2" style="font-size:0.9rem;color:#6B655D;"></i>
          <span style="width:115px;font-size:0.75rem;">${r.label}</span>
          <div class="progress-bar-custom-lg flex-grow-1">
            <div class="fill" style="width:${r.val}%; background:${color};"></div>
          </div>
          <span class="ms-2 small fw-bold" style="font-size:0.7rem;min-width:32px;">${r.val}%</span>
        </div>
      </div>`;
  });
  
  html += `
      </div>
    </div>

    <!-- Leadership Statistics -->
    <div class="section-card">
      <div class="section-title"><i class="bi bi-clipboard-data"></i> Leadership Statistics</div>
      <div class="row g-2">
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${Math.round(m.ratingScore * 10)}</div><div class="stat-label">Score</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.ratings || 0}</div><div class="stat-label">Ratings</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.manifestoFulfilled || 0}%</div><div class="stat-label">Manifesto</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.grade}</div><div class="stat-label">Grade</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.schemeSuccess || 0}%</div><div class="stat-label">Scheme Success</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.attendance || 0}%</div><div class="stat-label">Attendance</div></div>
      </div>
    </div>

    <!-- Project Statistics -->
    <div class="section-card">
      <div class="section-title"><i class="bi bi-diagram-3"></i> Project Statistics</div>
      <div class="row g-2">
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.completed || 0}</div><div class="stat-label">Completed</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.running || 0}</div><div class="stat-label">Running</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.pending || 0}</div><div class="stat-label">Pending</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.complaintsResolved || 0}</div><div class="stat-label">Resolved</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.responseTime || 0}h</div><div class="stat-label">Response Time</div></div>
        <div class="col-4 col-md-2 stat-box"><div class="stat-value">${m.fundUtil || 0}%</div><div class="stat-label">Fund Util.</div></div>
      </div>
    </div>

    <!-- Leadership Timeline -->
    <div class="section-card">
      <div class="section-title"><i class="bi bi-clock-history"></i> Leadership Timeline</div>
      <div>`;
  
  if (m.timeline && m.timeline.length > 0) {
    m.timeline.forEach((ev, idx) => {
      html += `
        <div class="timeline-item">
          <span class="timeline-num">#${idx+1}</span>
          <span class="timeline-dot"></span>
          <span class="timeline-text">${ev}</span>
        </div>`;
    });
  } else {
    html += `<p class="text-muted small">No timeline data available.</p>`;
  }
  
  html += `
      </div>
    </div>
  `;
  
  body.innerHTML = html;
  const modal = new bootstrap.Modal(document.getElementById('profileModal'));
  modal.show();
}

// ============================================================
//  FILTER FUNCTIONS
// ============================================================
function populateDistricts() {
  let select = document.getElementById("district");
  if (!select) return;
  select.innerHTML = '<option value="">All Districts</option>';
  Object.keys(geography).sort().forEach(d => select.innerHTML += `<option value="${d}">${d}</option>`);
}

function populatePartyFilter() {
  let parties = [...new Set(mlaAssembly.map(m => m.party))];
  let partySelect = document.getElementById("party");
  if (!partySelect) return;
  partySelect.innerHTML = '<option value="">All Parties</option>';
  parties.forEach(p => { partySelect.innerHTML += `<option value="${p}">${p}</option>`; });
}

function applyFiltersToCurrentData() {
  let name = document.getElementById("mlaName").value.toLowerCase();
  let party = document.getElementById("party").value;
  let district = document.getElementById("district").value;
  let sort = document.getElementById("sortOrder").value;

  let filtered = currentFilteredData.filter(m =>
    (!name || m.name.toLowerCase().includes(name) || (m.marathiName && m.marathiName.includes(name))) &&
    (!party || m.party === party) &&
    (!district || m.district === district)
  );

  filtered.sort((a, b) => sort === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name));

  let container = document.getElementById("mlaResult");
  if (!container) return;
  
  if (filtered.length === 0) {
    container.innerHTML = `<div class="col-12 text-center p-5"><i class="bi bi-search" style="font-size:3rem;color:#A8A29A;"></i><h5 class="mt-3" style="color:#8A847C;">No representatives match</h5></div>`;
  } else {
    container.innerHTML = filtered.map(m => buildGridMLACard(m)).join('');
  }
}

function filterMLAs() {
  applyFiltersToCurrentData();
}

function resetAllFilters() {
  document.getElementById("mlaName").value = "";
  document.getElementById("party").value = "";
  document.getElementById("district").value = "";
  document.getElementById("sortOrder").value = "asc";
  
  currentGrade = 'All';
  currentFilteredData = [...mlaAssembly];
  renderCategories('All');
  applyFiltersToCurrentData();
}

// ============================================================
//  HEADER SCROLL
// ============================================================
const premiumHeader = document.getElementById('premiumHeader');
window.addEventListener('scroll', () => {
  if (premiumHeader) {
    if (window.scrollY > 60) premiumHeader.classList.add('scrolled');
    else premiumHeader.classList.remove('scrolled');
  }
});

// ============================================================
//  INIT
// ============================================================
document.addEventListener("DOMContentLoaded", function() {
  populateDistricts();
  populatePartyFilter();
  
  document.getElementById("mlaName").addEventListener("input", filterMLAs);
  document.getElementById("party").addEventListener("change", filterMLAs);
  document.getElementById("district").addEventListener("change", filterMLAs);
  document.getElementById("sortOrder").addEventListener("change", filterMLAs);
  
  currentGrade = 'All';
  currentFilteredData = [...mlaAssembly];
  renderCategories('All');
  applyFiltersToCurrentData();
});
</script>
</body>
</html>