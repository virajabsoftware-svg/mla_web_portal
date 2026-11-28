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
      width: 50px;
      height: 50px;
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
        <img src="<?= base_url('assets/user/images/logo.jpeg'); ?>"
             class="logo-img" alt="Maharashtra MLA Watch Logo">
        <img src="<?= base_url('assets/user/images/leaderTracker.png'); ?>"
              style="width:100%; height:70px;" alt="Maharashtra MLA Watch Logo">     
      </a>
      <nav class="nav-links d-none d-lg-flex">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('mla') ?>">MLAs</a>
        <a href="<?= base_url('leadership') ?>" class="active">Leaderboard</a>
      </nav>
      <div class="header-actions">
        <!-- <button class="theme-btn"><i class="bi bi-moon"></i></button> -->
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
  <option value="rating_desc">Highest Rating</option>
  <option value="rating_asc">Lowest Rating</option>
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
                    <p style="max-width:300px;margin-top:8px;color:var(--gray-600);">
                        A citizen-powered accountability platform tracking
                        work done and manifesto fulfillment by Maharashtra MLAs.
                    </p>
                    <p style="font-size:0.7rem;color:var(--gray-400);">
                        All ratings are citizen-submitted.
                        Data is crowdsourced and reflects public opinion.
                    </p>
                </div>

                <div class="col-6 col-md-2">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('/') ?>">Home</a></li>
                        <li><a href="<?= base_url('mla') ?>">MLAs</a></li>
                        <li><a href="<?= base_url('leadership') ?>">Leaderboard</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2">
                    <h6>Resources</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h6>Stay Updated</h6>
                    <div class="d-flex gap-2">
                        <input type="email" class="form-control" placeholder="Your email"
                            style="border-radius:var(--radius-full);border:1px solid var(--gray-200);padding:8px 14px;font-size:0.8rem;">
                        <button class="btn-orange" style="padding:8px 18px;font-size:0.75rem;">Subscribe</button>
                    </div>
                </div>

            </div>

            <div class="bottom">
                <p>&copy; <script>document.write(new Date().getFullYear());</script> Leader Tracker. All rights reserved.</p>
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

const mlaAssembly = <?= json_encode(
    $leaderboard_mlas ?? [],
    JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
); ?>;

// ============================================================
//  GRADE META - 8 Grades
// ============================================================
const gradesMeta = [
  { label: 'A+', desc: 'Outstanding', icon: 'bi-star-fill', color: '#10B981' },
  { label: 'A', desc: 'Excellent', icon: 'bi-star', color: '#34D399' },
  { label: 'B+', desc: 'Very Good', icon: 'bi-star-half', color: '#FBBF24' },
  { label: 'B', desc: 'Good', icon: 'bi-star', color: '#F59E0B' },
  { label: 'C+', desc: 'Average', icon: 'bi-arrow-right-circle', color: '#F97316' },
  { label: 'C', desc: 'Below Average', icon: 'bi-arrow-down-circle', color: '#EF4444' },
  { label: 'D', desc: 'Poor', icon: 'bi-exclamation-circle', color: '#DC2626' },
  { label: 'Not Rated', desc: 'No Ratings Yet', icon: 'bi-hourglass', color: '#94A3B8' }
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
  return String(name || 'MLA')
    .trim()
    .split(/\s+/)
    .map(w => w[0])
    .join('')
    .toUpperCase()
    .slice(0, 2);
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
 const hasRatings = Number(mla.ratings) > 0;
const ratingScore = Number(mla.ratingScore || 0);
const stars = hasRatings ? renderStars(ratingScore) : '☆☆☆☆☆';
const hasManifesto =
  mla.manifestoFulfilled !== null &&
  mla.manifestoFulfilled !== undefined &&
  mla.manifestoFulfilled !== '';
const avatarHtml = mla.image
  ? `<img src="${mla.image}" alt="${mla.name}"
       onerror="this.style.display='none';this.parentElement.textContent='${initials}';">`
  : initials;
  return `
    <div class="col-md-6 col-lg-4">
      <div class="mla-card">
        <div class="d-flex align-items-start gap-3">
          <div class="avatar" style="background:${color};">
  ${avatarHtml}
</div>
          <div>
            <div class="mla-name">${mla.name}</div>
            <div class="mla-name-mr">${mla.marathiName || mla.name}</div>
            <div class="mla-constituency"><i class="bi bi-geo-alt"></i> ${mla.constituency}, ${mla.district}</div>
            <div>
              <span class="party-badge ${partyClass}">${mla.party}</span>
              <span class="elected-year ms-2">Elected ${mla.firstElected || 'N/A'}</span>
            </div>
          </div>
        </div>
        
       <div class="info-row">
  <span>
    <i class="bi bi-person"></i> ${Number(mla.ratings || 0)} ratings
  </span>

  <span class="rating-value">
    <span class="stars">${stars}</span>
    ${hasRatings ? ratingScore.toFixed(2) + '/5' : 'Not Rated'}
  </span>
</div>
        
       ${hasManifesto ? `
  <div class="manifesto-row">
    <span class="manifesto-text">Manifesto Fulfilled</span>
    <div class="progress-bar-custom">
      <div class="fill" style="width:${Math.min(100, Math.max(0, Number(mla.manifestoFulfilled || 0)))}%;"></div>
    </div>
    <span class="manifesto-percent">
      ${Number(mla.manifestoFulfilled || 0).toFixed(2)}%
    </span>
  </div>
` : `
  <div class="manifesto-row">
    <span class="manifesto-text">Manifesto Fulfilled: Not Available</span>
  </div>
`}
        
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
  const m = mlaAssembly.find(d => Number(d.id) === Number(id));
  if (!m) return;

  const hasRatings = Number(m.ratings) > 0;
  const ratingScore = Number(m.ratingScore || 0);
  const manifesto = m.manifestoFulfilled;

  document.getElementById('profileName').innerHTML =
    `<i class="bi bi-person-badge me-2"></i>${m.name} · MLA Profile`;

  const body = document.getElementById('profileBody');

  const style = partyColorMap[m.party] || {
    primary: "#546E7A",
    lightBg: "#F5F8FA"
  };

  const initials = m.initials || getInitials(m.name || 'MLA');

  const imageHtml = m.image
    ? `<img src="${m.image}" alt="${m.name}"
         onerror="this.style.display='none';this.parentElement.textContent='${initials}';">`
    : initials;

  body.innerHTML = `
    <div class="profile-header">
      <div class="row align-items-center g-3">
        <div class="col-auto">
          <div class="avatar-lg"
               style="background:${style.lightBg};border-color:${style.primary};color:${style.primary};">
            ${imageHtml}
          </div>
        </div>

        <div class="col">
          <div class="name-lg">${m.name || 'N/A'}</div>
          <div class="name-mr-lg">${m.marathiName || m.name || ''}</div>
          <div class="constituency-lg">
            <i class="bi bi-geo-alt"></i>
            ${m.constituency || 'N/A'}, ${m.district || 'N/A'}
          </div>

          <div class="d-flex flex-wrap gap-2 mt-2">
            <span class="party-badge-lg">${m.party || 'N/A'}</span>
            <span class="grade-badge-lg">
              ${m.grade || 'Not Rated'}
            </span>
          </div>
        </div>

        <div class="col-auto text-end">
          <div class="rating-stars-lg">
            ${hasRatings ? renderStars(ratingScore) : '☆☆☆☆☆'}
          </div>
          <div class="rating-text-lg">
            ${hasRatings ? ratingScore.toFixed(2) + '/5' : 'Not Rated'}
            · ${Number(m.ratings || 0)} ratings
          </div>
        </div>
      </div>
    </div>

    <div class="section-card">
      <div class="section-title">
        <i class="bi bi-person"></i> Personal Information
      </div>

      <div class="row g-3">
        <div class="col-6 col-md-3">
          <strong>Age</strong>
          <div class="text-muted">${m.age || 'N/A'}</div>
        </div>

        <div class="col-6 col-md-3">
          <strong>Education</strong>
          <div class="text-muted">${m.education || 'N/A'}</div>
        </div>

        <div class="col-6 col-md-3">
          <strong>Profession</strong>
          <div class="text-muted">${m.profession || 'N/A'}</div>
        </div>

        <div class="col-6 col-md-3">
          <strong>Elected</strong>
          <div class="text-muted">${m.firstElected || 'N/A'}</div>
        </div>
      </div>

      <div class="mt-3">
        <strong>Biography</strong>
        <p class="text-muted mb-0" style="font-size:0.85rem;">
          ${m.bio || 'No biography available.'}
        </p>
      </div>
    </div>

    <div class="section-card">
      <div class="section-title">
        <i class="bi bi-clipboard-data"></i> Rating Statistics
      </div>

      <div class="row g-2">
        <div class="col-6 col-md-3">
          <div class="stat-box">
            <div class="stat-value">
              ${hasRatings ? ratingScore.toFixed(2) + '/5' : 'N/A'}
            </div>
            <div class="stat-label">Average Rating</div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="stat-box">
            <div class="stat-value">${Number(m.ratings || 0)}</div>
            <div class="stat-label">Total Ratings</div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="stat-box">
            <div class="stat-value">${m.grade || 'Not Rated'}</div>
            <div class="stat-label">Grade</div>
          </div>
        </div>

        <div class="col-6 col-md-3">
          <div class="stat-box">
            <div class="stat-value">
              ${manifesto !== null && manifesto !== '' && manifesto !== undefined
                ? Number(manifesto).toFixed(2) + '%'
                : 'N/A'}
            </div>
            <div class="stat-label">Manifesto Fulfilled</div>
          </div>
        </div>
      </div>
    </div>
  `;

  const modalElement = document.getElementById('profileModal');
  bootstrap.Modal.getOrCreateInstance(modalElement).show();
}


// ============================================================
//  FILTER FUNCTIONS
// ============================================================
function populateDistricts() {
  const select = document.getElementById("district");
  if (!select) return;

  const districts = [
    ...new Set(
      mlaAssembly.map(m => m.district).filter(Boolean)
    )
  ].sort();

  select.innerHTML = '<option value="">All Districts</option>';

  districts.forEach(d => {
    select.innerHTML += `<option value="${d}">${d}</option>`;
  });
}

function populatePartyFilter() {
  const partySelect = document.getElementById("party");
  if (!partySelect) return;

  const parties = [
    ...new Set(
      mlaAssembly.map(m => m.party).filter(Boolean)
    )
  ].sort();

  partySelect.innerHTML = '<option value="">All Parties</option>';

  parties.forEach(p => {
    partySelect.innerHTML += `<option value="${p}">${p}</option>`;
  });
}

function applyFiltersToCurrentData() {
  let name = document.getElementById("mlaName").value.toLowerCase();
  let party = document.getElementById("party").value;
  let district = document.getElementById("district").value;
  let sort = document.getElementById("sortOrder").value;

  let filtered = currentFilteredData.filter(m =>
   (!name ||
  (m.name || '').toLowerCase().includes(name) ||
  (m.marathiName || '').includes(name)) &&
    (!party || m.party === party) &&
    (!district || m.district === district)
  );

 filtered.sort((a, b) => {
  const ratingA = Number(a.ratingScore || 0);
  const ratingB = Number(b.ratingScore || 0);

  const hasA = Number(a.ratings || 0) > 0;
  const hasB = Number(b.ratings || 0) > 0;

  if (sort === 'rating_desc') {
    if (hasA !== hasB) return hasA ? -1 : 1;
    return ratingB - ratingA;
  }

  if (sort === 'rating_asc') {
    if (hasA !== hasB) return hasA ? -1 : 1;
    return ratingA - ratingB;
  }

  if (sort === 'asc') {
    return (a.name || '').localeCompare(b.name || '');
  }

  return (b.name || '').localeCompare(a.name || '');
});

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
document.getElementById("sortOrder").value = "rating_desc";
  
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

document.getElementById("sortOrder").value = "rating_desc";

renderCategories('All');
applyFiltersToCurrentData();
});
</script>
</body>
</html>