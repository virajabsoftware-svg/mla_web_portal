<!DOCTYPE html>
<html lang="mr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
  <title>GovTrack Aura | MLA सर्वेक्षण</title>
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- Bootstrap 5 Grid & Utilities (light) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* =====================================================
       PREMIUM DESIGN SYSTEM - FULLY RESPONSIVE WITH FIXED TOGGLE
    ===================================================== */

    :root {
        --soft-white: #F4F2F5;
        --pure-white: #FFFFFF;
        --lime-gold: #C3C848;
        --lime-gold-light: #D8E06A;
        --olive-green: #6B8A22;
        --teal-blue: #225661;
        --teal-dark: #1A4450;
        --dark-olive: #454D28;
        --sidebar-width: 280px;
        --sidebar-collapsed: 80px;
        --header-height: 70px;
        --shadow-sm: 0 8px 20px rgba(34, 86, 97, 0.08);
        --shadow-md: 0 12px 30px rgba(34, 86, 97, 0.12);
        --shadow-lime: 0 15px 35px rgba(195, 200, 72, 0.35);
        --radius-sm: 12px;
        --radius-md: 18px;
        --radius-lg: 24px;
        --transition-smooth: 0.3s ease;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        background: radial-gradient(circle at 0% 0%, #EDEBF0, #DFDCE3);
        font-family: 'Inter', sans-serif;
        color: var(--dark-olive);
        min-height: 100vh;
        overflow-x: hidden;
        position: relative;
    }

    /* Animated Background */
    .animated-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 50%, rgba(195,200,72,0.08), rgba(34,86,97,0.05));
        z-index: 0;
        pointer-events: none;
        animation: bgPulse 8s ease-in-out infinite;
    }
    @keyframes bgPulse { 0%,100%{opacity:0.5} 50%{opacity:1} }

    /* Floating Particles */
    .particles-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
        overflow: hidden;
    }
    .particle {
        position: absolute;
        background: radial-gradient(circle, var(--lime-gold) 0%, rgba(107,138,34,0.15) 100%);
        border-radius: 50%;
        opacity: 0.15;
        animation: floatParticle 20s infinite alternate ease-in-out;
    }
    @keyframes floatParticle {
        0% { transform: translateY(0px) translateX(0px) scale(1); opacity: 0.08; }
        100% { transform: translateY(-60px) translateX(40px) scale(1.3); opacity: 0.25; }
    }

    /* ========== PREMIUM SIDEBAR ========== */
    .aura-sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: var(--sidebar-width);
        height: 100vh;
        background: linear-gradient(145deg, rgba(34, 86, 97, 0.97), rgba(26, 67, 76, 0.99));
        backdrop-filter: blur(20px);
        border-right: 1px solid rgba(195, 200, 72, 0.35);
        transition: transform var(--transition-smooth), width var(--transition-smooth);
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 8px 0 40px rgba(0, 0, 0, 0.25);
    }

    /* Desktop: collapsed state */
    @media (min-width: 992px) {
        body.sidebar-collapsed .aura-sidebar { width: var(--sidebar-collapsed); }
        body.sidebar-collapsed .main-content { margin-left: var(--sidebar-collapsed); }
        body.sidebar-collapsed .aura-topbar { left: var(--sidebar-collapsed); }
        body.sidebar-collapsed .logo-text, 
        body.sidebar-collapsed .sidebar-profile h6, 
        body.sidebar-collapsed .sidebar-profile span,
        body.sidebar-collapsed .nav-link-premium span,
        body.sidebar-collapsed .nav-section-title { display: none; }
        body.sidebar-collapsed .sidebar-header { text-align: center; padding: 28px 0; }
        body.sidebar-collapsed .logo-wrapper { justify-content: center; }
        body.sidebar-collapsed .sidebar-profile { padding: 0 0 20px; }
        body.sidebar-collapsed .profile-avatar { width: 50px; height: 50px; margin: 0 auto; }
        body.sidebar-collapsed .nav-link-premium { justify-content: center; padding: 12px; }
    }

    /* Mobile: sidebar hidden by default, shown when class active */
    @media (max-width: 991px) {
        .aura-sidebar {
            transform: translateX(-100%);
            width: var(--sidebar-width);
        }
        body.sidebar-mobile-open .aura-sidebar {
            transform: translateX(0);
        }
        .main-content { margin-left: 0 !important; }
        .aura-topbar { left: 0 !important; }
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
            cursor: pointer;
        }
        body.sidebar-mobile-open .sidebar-overlay {
            display: block;
        }
    }

    .aura-sidebar::-webkit-scrollbar { width: 5px; }
    .aura-sidebar::-webkit-scrollbar-track { background: rgba(255,255,255,0.1); border-radius: 10px; }
    .aura-sidebar::-webkit-scrollbar-thumb { background: var(--lime-gold); border-radius: 10px; }

    .sidebar-header { padding: 28px 24px; border-bottom: 1px solid rgba(195,200,72,0.3); }
    .logo-wrapper { display: flex; align-items: center; gap: 12px; }
    .logo-icon {
        width: 48px; height: 48px;
        background: linear-gradient(135deg, var(--lime-gold), var(--olive-green));
        border-radius: var(--radius-sm);
        display: flex; align-items: center; justify-content: center;
        animation: logoGlow 2s infinite;
    }
    @keyframes logoGlow { 0%,100%{box-shadow:0 0 0 0 rgba(195,200,72,0.5)} 50%{box-shadow:0 0 0 8px rgba(195,200,72,0.2)} }
    .logo-icon i { font-size: 24px; color: var(--dark-olive); }
    .logo-text h3 { color: white; font-family: 'Space Grotesk', monospace; font-weight: 800; font-size: 1.3rem; margin: 0; }
    .logo-text p { color: rgba(255,255,255,0.6); font-size: 0.65rem; }

    .sidebar-profile { padding: 20px 20px 28px; border-bottom: 1px solid rgba(195,200,72,0.3); text-align: center; }
    .profile-avatar { width: 85px; height: 85px; margin: 0 auto 12px; position: relative; }
    .profile-avatar img { width: 100%; height: 100%; border-radius: 50%; border: 3px solid var(--lime-gold); transition: all 0.3s; }
    .profile-avatar img:hover { transform: scale(1.05); }
    .online-dot { position: absolute; bottom: 5px; right: 5px; width: 16px; height: 16px; background: #4CAF50; border-radius: 50%; border: 2px solid white; animation: pulseDot 1.5s infinite; }
    @keyframes pulseDot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.7;transform:scale(1.15)} }
    .sidebar-profile h6 { color: white; font-weight: 700; margin-bottom: 5px; }
    .sidebar-profile span { color: var(--lime-gold); font-size: 0.7rem; font-weight: 600; }

    .sidebar-nav { padding: 0 16px; }
    .nav-section { margin-bottom: 28px; }
    .nav-section-title { color: rgba(255,255,255,0.45); font-size: 0.7rem; letter-spacing: 2px; text-transform: uppercase; padding: 0 16px; margin-bottom: 12px; font-weight: 700; }
    .nav-link-premium {
        display: flex; align-items: center; gap: 14px; padding: 12px 18px;
        border-radius: var(--radius-md); color: rgba(255,255,255,0.85);
        font-weight: 500; font-size: 0.9rem; transition: all 0.25s ease;
        cursor: pointer; text-decoration: none;
    }
    .nav-link-premium:hover { background: rgba(195,200,72,0.15); color: white; transform: translateX(6px); }
    .nav-link-premium i { width: 24px; font-size: 1.1rem; color: var(--lime-gold); }
    .nav-link-premium.active {
        background: linear-gradient(135deg, var(--lime-gold), var(--olive-green));
        color: var(--dark-olive); font-weight: 700;
        box-shadow: var(--shadow-lime);
        animation: activeGlow 2s infinite;
    }
    @keyframes activeGlow { 0% { box-shadow: 0 0 0 0 rgba(195,200,72,0.5); } 70% { box-shadow: 0 0 0 10px rgba(195,200,72,0); } 100% { box-shadow: 0 0 0 0; } }
    .nav-link-premium.active i { color: var(--dark-olive); }

    /* ========== GLASS TOP BAR ========== */
    .aura-topbar {
        position: fixed; top: 0; left: var(--sidebar-width); right: 0; height: var(--header-height);
        background: rgba(255, 255, 255, 0.88); backdrop-filter: blur(18px);
        border-bottom: 1px solid rgba(195, 200, 72, 0.4);
        display: flex; align-items: center; justify-content: space-between; padding: 0 32px; z-index: 999;
        transition: all var(--transition-smooth);
    }
    .topbar-left { display: flex; align-items: center; gap: 20px; }
    .topbar-right { display: flex; align-items: center; gap: 24px; }
        
    /* Toggle Buttons */
    .sidebar-toggle-btn {
        background: rgba(34,86,97,0.1);
        border: none;
        width: 44px;
        height: 44px;
        border-radius: var(--radius-sm);
        font-size: 1.2rem;
        color: var(--teal-blue);
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sidebar-toggle-btn:hover { background: linear-gradient(135deg, var(--lime-gold), var(--olive-green)); color: var(--dark-olive); transform: rotate(90deg); }
        
    .sidebar-toggle-mobile {
        background: rgba(34,86,97,0.1);
        border: none;
        width: 44px;
        height: 44px;
        border-radius: var(--radius-sm);
        font-size: 1.2rem;
        color: var(--teal-blue);
        cursor: pointer;
        transition: all 0.3s;
        display: none;
        align-items: center;
        justify-content: center;
    }
    .sidebar-toggle-mobile:hover { background: rgba(195,200,72,0.2); color: var(--lime-gold); }
        
    @media (max-width: 991px) {
        .sidebar-toggle-btn { display: none; }
        .sidebar-toggle-mobile { display: flex; }
    }
    @media (min-width: 992px) {
        .sidebar-toggle-mobile { display: none; }
    }

    .search-wrapper { position: relative; }
    .search-wrapper input {
        background: rgba(34,86,97,0.06); border: 1px solid rgba(69,77,40,0.12);
        border-radius: 45px; padding: 10px 18px 10px 45px; width: 260px;
        transition: all 0.3s ease; outline: none;
    }
    .search-wrapper input:focus { border-color: var(--lime-gold); box-shadow: 0 0 0 4px rgba(195,200,72,0.2); width: 300px; background: white; }
    .search-wrapper i { position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--teal-blue); }
        
    .notification-btn {
        position: relative; background: transparent; border: none; font-size: 1.3rem;
        color: var(--teal-blue); cursor: pointer; width: 44px; height: 44px;
        border-radius: 50%; transition: all 0.2s;
    }
    .notification-btn:hover { background: rgba(195,200,72,0.2); color: var(--lime-gold); }
    .notification-badge {
        position: absolute; top: -2px; right: -2px;
        background: var(--lime-gold); color: var(--dark-olive);
        font-size: 0.6rem; font-weight: 800; padding: 2px 7px; border-radius: 30px;
        animation: ringSoft 3s infinite;
    }
    @keyframes ringSoft { 0%,80%,100%{transform:rotate(0deg)} 85%{transform:rotate(12deg)} 90%{transform:rotate(-8deg)} 95%{transform:rotate(4deg)} }
        
    .user-dropdown-premium {
        display: flex; align-items: center; gap: 12px; padding: 6px 18px 6px 12px;
        border-radius: 60px; background: rgba(34,86,97,0.05); transition: all 0.3s; cursor: pointer;
    }
    .user-dropdown-premium:hover { background: rgba(195,200,72,0.12); }
    .user-dropdown-premium img { width: 42px; height: 42px; border-radius: 50%; border: 2px solid var(--lime-gold); }
    .user-info-dropdown .user-name { font-weight: 700; font-size: 0.85rem; color: var(--teal-blue); }
    .user-info-dropdown .user-role { font-size: 0.7rem; color: var(--olive-green); font-weight: 600; }

    /* ========== MAIN CONTENT ========== */
    .main-content {
        margin-left: var(--sidebar-width);
        margin-top: var(--header-height);
        padding: 28px 32px;
        transition: all var(--transition-smooth);
        position: relative;
        z-index: 2;
        min-height: calc(100vh - var(--header-height));
    }
    .survey-container { max-width: 1200px; margin: 0 auto; }

    /* Premium Glass Card */
    .premium-card {
        background: rgba(244, 242, 245, 0.85);
        backdrop-filter: blur(14px);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(195, 200, 72, 0.3);
        box-shadow: var(--shadow-sm);
        transition: all 0.3s;
        overflow: hidden;
    }
    .premium-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lime); border-color: var(--lime-gold); }

    .card-header {
        background: rgba(255,255,255,0.6);
        border-bottom: 1px solid rgba(195,200,72,0.3);
        padding: 1.2rem 1.8rem;
    }
    .card-header h4 { font-weight: 700; color: var(--teal-blue); }
    .badge-page {
        background: rgba(195,200,72,0.15);
        padding: 4px 16px; border-radius: 40px;
        font-size: 0.75rem; font-weight: 600; color: var(--teal-blue);
    }

    /* question blocks */
    .question-block {
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(2px);
        border-radius: 20px;
        padding: 1.2rem 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(195,200,72,0.15);
        transition: all 0.3s;
    }
    .question-block:hover {
        border-color: var(--lime-gold);
        background: rgba(255,255,255,0.8);
        box-shadow: 0 4px 16px rgba(195,200,72,0.08);
    }
    .q-number {
        background: var(--lime-gold);
        color: #1F3F3A;
        font-weight: 700;
        font-size: 0.7rem;
        padding: 2px 12px;
        border-radius: 30px;
        display: inline-block;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
    }
    .question-block p {
        font-weight: 600;
        color: var(--teal-blue);
        margin-bottom: 10px;
    }
    .form-control, .form-select {
        border-radius: 16px;
        border: 1px solid rgba(195,200,72,0.4);
        padding: 10px 16px;
        background: rgba(255,255,255,0.8);
        transition: all 0.3s;
    }
    .form-control:focus, .form-select:focus {
        border-color: var(--lime-gold);
        box-shadow: 0 0 0 4px rgba(195,200,72,0.15);
        background: white;
    }
    .form-range {
        height: 6px;
        background: rgba(195,200,72,0.2);
        border-radius: 10px;
    }
    .form-range::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px; height: 18px;
        border-radius: 50%;
        background: var(--lime-gold);
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        cursor: pointer;
    }
    .form-check {
        padding-left: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
    }
    .form-check-input {
        width: 18px; height: 18px;
        border-radius: 6px;
        border: 2px solid rgba(195,200,72,0.5);
        accent-color: var(--olive-green);
        cursor: pointer;
    }
    .form-check-label {
        font-weight: 500;
        color: var(--dark-olive);
    }
    .btn-success {
        background: linear-gradient(95deg, var(--lime-gold), var(--olive-green));
        border: none;
        padding: 12px 40px;
        border-radius: 60px;
        font-weight: 700;
        color: #1F3F3A;
        transition: all 0.3s;
        box-shadow: 0 6px 20px rgba(195,200,72,0.25);
    }
    .btn-success:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(195,200,72,0.35);
        color: #1F3F3A;
    }

    /* footer */
    .footer {
        margin-top: 2.5rem;
        padding: 1rem 1.5rem;
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(6px);
        border-radius: 24px;
        border: 1px solid rgba(195,200,72,0.2);
        text-align: center;
        font-weight: 500;
        color: var(--dark-olive);
        transition: all 0.3s;
    }
    .footer:hover { transform: translateY(-2px); box-shadow: var(--shadow-sm); }
    .footer a { color: var(--teal-blue); text-decoration: none; font-weight: 700; }
    .footer a:hover { color: var(--olive-green); }

    /* modal */
    .modal-content {
        border-radius: 28px;
        border: 1px solid rgba(195,200,72,0.2);
        backdrop-filter: blur(8px);
    }
    .modal-header { border-bottom: 1px solid rgba(195,200,72,0.2); }
    .report-stars { font-size: 2.8rem; color: var(--lime-gold); letter-spacing: 4px; }
    .report-section-item {
        display: flex; justify-content: space-between; align-items: center;
        padding: 6px 0; border-bottom: 1px solid rgba(0,0,0,0.03);
    }
    .stars-small { color: var(--lime-gold); letter-spacing: 1px; }

    /* Responsive Media Queries */
    @media (max-width: 1200px) {
        .main-content { padding: 24px; }
    }
    @media (max-width: 992px) {
        .main-content { margin-left: 0; padding: 20px; }
        .aura-topbar { left: 0; padding: 0 20px; }
        .search-wrapper input { width: 200px; }
        .search-wrapper input:focus { width: 220px; }
        .user-info-dropdown { display: none; }
    }
    @media (max-width: 768px) {
        .main-content { padding: 16px; }
        .search-wrapper { display: none; }
        .topbar-right { gap: 12px; }
        .user-dropdown-premium { padding: 4px 12px; }
        .user-dropdown-premium img { width: 35px; height: 35px; }
        .card-header { padding: 1rem; }
        .card-body { padding: 1rem; }
        .question-block { padding: 1rem; }
        .btn-success { width: 100%; }
    }
    @media (max-width: 576px) {
        .main-content { padding: 12px; }
        .aura-topbar { padding: 0 12px; }
        .user-dropdown-premium .user-info-dropdown { display: none; }
        .user-dropdown-premium { padding: 4px 8px; }
    }

    /* ========== PARTICLES GENERATED ========== */
    .particle:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 5%; animation-duration: 18s; }
    .particle:nth-child(2) { width: 50px; height: 50px; top: 70%; left: 85%; animation-duration: 22s; }
    .particle:nth-child(3) { width: 100px; height: 100px; top: 40%; left: 50%; animation-duration: 26s; }
    .particle:nth-child(4) { width: 40px; height: 40px; top: 85%; left: 10%; animation-duration: 15s; }
    .particle:nth-child(5) { width: 60px; height: 60px; top: 20%; left: 75%; animation-duration: 20s; }
    .particle:nth-child(6) { width: 30px; height: 30px; top: 55%; left: 25%; animation-duration: 19s; }
  </style>
</head>
<body>
  <!-- Animated Background -->
  <div class="animated-bg"></div>
  <div class="particles-bg">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
  </div>

  <!-- overlay for mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- SIDEBAR -->
 <aside class="aura-sidebar" id="auraSidebar">
        <div class="sidebar-header">
            <div class="logo-wrapper">
                <div class="logo-icon"><i class="fas fa-landmark"></i></div>
                <div class="logo-text">
                    <h3>GovTrack</h3>
                    <p>Aura Governance Suite</p>
                </div>
            </div>
        </div>
        <div class="sidebar-profile">
            <div class="profile-avatar"><img src="https://randomuser.me/api/portraits/men/32.jpg"><span
                    class="online-dot"></span></div>
            <h6>Vedant Patil</h6><span><i class="fas fa-check-circle"></i> Verified Officer</span>
        </div>
        <div class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">MAIN</div>
                <a href="<?= base_url('user/dashboard') ?>" class="nav-link-premium active">
                    <i class="fas fa-chart-line"></i><span>Dashboard</span>
                </a>
                <a href="<?= base_url('user/my-profile') ?>" class="nav-link-premium">
                    <i class="fas fa-user-circle"></i><span>My Profile</span>
                </a>
                <a href="<?= base_url('user/assigned-mla') ?>" class="nav-link-premium">
                    <i class="fas fa-user-tie"></i><span>Assigned MLA</span>
                </a>
                <a href="<?= base_url('user/mla-works') ?>" class="nav-link-premium">
                    <i class="fas fa-hard-hat"></i><span>Development Works</span>
                </a>
                <a href="<?= base_url('user/feedback') ?>" class="nav-link-premium">
                    <i class="fas fa-comment-dots"></i><span>Feedback</span>
                </a>
                <a href="<?= base_url('user/survey') ?>" class="nav-link-premium">
                    <i class="fas fa-poll"></i><span>Surveys</span>
                </a>
                <a href="<?= base_url('user/complaint') ?>" class="nav-link-premium">
                    <i class="fas fa-exclamation-triangle"></i><span>Complaints</span>
                </a>
                <a href="<?= base_url('user/mla-rating') ?>" class="nav-link-premium">
                    <i class="fas fa-star-half-alt"></i><span>MLA Rating</span>
                </a>

            </div>
        </div>
    </aside>
  <!-- TOP BAR -->
  <header class="aura-topbar" id="auraTopbar">
    <div class="topbar-left">
      <button class="sidebar-toggle-btn" id="sidebarToggleBtn"><i class="fas fa-bars"></i></button>
      <button class="sidebar-toggle-mobile" id="sidebarToggleMobile"><i class="fas fa-bars"></i></button>
    </div>
    <div class="topbar-right">
      <div class="search-wrapper"><i class="fas fa-search"></i><input type="text" placeholder="Search governance data..."></div>
      <button class="notification-btn"><i class="fas fa-bell"></i><span class="notification-badge">3</span></button>
      <div class="user-dropdown-premium">
        <div class="user-info-dropdown">
          <div class="user-name">Vedant Patil</div>
          <div class="user-role">Govt. Officer</div>
        </div>
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="user">
      </div>
    </div>
  </header>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    <div class="survey-container">
      <div class="card premium-card">
        <div class="card-header">
          <h4><i class="fas fa-chart-pie me-2"></i>महाराष्ट्र नागरिक सर्वेक्षण</h4>
          <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">
            <span class="badge-page"><i class="far fa-calendar-alt me-1"></i> आमदार कामगिरी मूल्यांकन</span>
            <span class="badge-page">सर्व प्रश्न एकाच पृष्ठावर</span>
          </div>
        </div>
        <div class="card-body">
          <form id="mainSurveyForm">
            <div id="questionsContainer"></div>
            <div class="text-center mt-4">
              <button type="button" class="btn btn-success" id="submitBtn"><i class="fas fa-check-circle"></i> सर्वेक्षण सबमिट करा</button>
            </div>
          </form>
        </div>
      </div>
      <div class="footer"><i class="fas fa-chart-line me-1"></i> सर्व प्रश्नांची उत्तरे द्या. सबमिट केल्यावर आमदार कामगिरीचे रेटिंग मोडलमध्ये दिसेल.</div>
      <footer class="footer mt-3">
       <p>&copy; <script>document.write(new Date().getFullYear())</script> Leader Tracker. All rights reserved.</p>
      </footer>
    </div>
  </main>

  <!-- REPORT MODAL -->
  <div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold"><i class="fas fa-star text-warning me-2"></i> MLA कामगिरी रिपोर्ट</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" id="reportModalBody"></div>
        <div class="modal-footer flex-wrap">
          <button class="btn btn-success" onclick="downloadReport()"><i class="fas fa-download me-1"></i> डाउनलोड</button>
          <button class="btn btn-primary" onclick="shareReport()"><i class="fas fa-share-alt me-1"></i> शेअर</button>
          <button class="btn btn-outline-secondary" data-bs-dismiss="modal">बंद</button>
          <button class="btn btn-outline-secondary" onclick="resetSurvey()"><i class="fas fa-redo me-1"></i> पुन्हा सर्वेक्षण</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // ========== SIDEBAR TOGGLE ==========
    const sidebar = document.getElementById('auraSidebar');
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    const toggleMobile = document.getElementById('sidebarToggleMobile');
    const overlay = document.getElementById('sidebarOverlay');

    // Desktop toggle: collapse/expand
    toggleBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      document.body.classList.toggle('sidebar-collapsed');
      // Remove mobile class if present
      document.body.classList.remove('sidebar-mobile-open');
    });

    // Mobile toggle: open/close overlay
    toggleMobile.addEventListener('click', function(e) {
      e.stopPropagation();
      document.body.classList.toggle('sidebar-mobile-open');
      // Remove desktop collapsed if present
      document.body.classList.remove('sidebar-collapsed');
    });

    overlay.addEventListener('click', function() {
      document.body.classList.remove('sidebar-mobile-open');
    });

    // ========== SURVEY ENGINE ==========
    const surveyQuestions = [
      { id:1, text:"आमदार नागरिकांच्या समस्या सोडवतात का?", type:"select", options:["हो","अंशतः","नाही"], name:"q1_solve", positiveScore:{"हो":2,"अंशतः":1,"नाही":0} },
      { id:2, text:"सामान्य नागरिकांना सहज भेट देतात का?", type:"select", options:["हो","अंशतः","नाही"], name:"q1_meeting", positiveScore:{"हो":2,"अंशतः":1,"नाही":0} },
      { id:3, text:"प्रश्न सोडवण्याबाबत रेटिंग (1-10)", type:"range", min:1, max:10, name:"q1_rating", scoreFromRange:true },
      { id:4, text:"आमदार निधी कोणत्या कामासाठी वापरला गेला?", type:"textarea", placeholder:"रस्ते, पूल, शाळा, पाणीपुरवठा...", name:"q2_fund_works" },
      { id:5, text:"कोणती वचने पूर्ण झाली? (एकाधिक निवडा)", type:"checkbox_group", options:["Tree plantation","Environment protection","Pothole-free roads","Beach cleanup"], name:"q3_promises", positivePerCheck:0.75 },
      { id:6, text:"मतदार म्हणून तुमची गरज विचारली गेली का?", type:"select", options:["हो","अंशतः","नाही"], name:"q4_need_asked", positiveScore:{"हो":2,"अंशतः":1,"नाही":0} },
      { id:7, text:"पायाभूत सुविधा रेटिंग (1-5)", type:"select", options:["1","2","3","4","5"], name:"rating_infra", ratingValueScore:true },
      { id:8, text:"रस्ते रेटिंग (1-5)", type:"select", options:["1","2","3","4","5"], name:"rating_roads", ratingValueScore:true },
      { id:9, text:"स्वच्छता रेटिंग (1-5)", type:"select", options:["1","2","3","4","5"], name:"rating_sanitation", ratingValueScore:true },
      { id:10, text:"पर्यावरण रेटिंग (1-5)", type:"select", options:["1","2","3","4","5"], name:"rating_environment", ratingValueScore:true },
      { id:11, text:"तुमच्या भागात कोणती कामे झाली?", type:"textarea", placeholder:"रस्ते, नाली, पाणी, स्ट्रीट लाईट", name:"q6_local_works" },
      { id:12, text:"ही कामे भागाच्या गरजांशी जुळतात का?", type:"select", options:["हो","अंशतः","नाही"], name:"q7_match_needs", positiveScore:{"हो":2,"अंशतः":1,"नाही":0} },
      { id:13, text:"आमदार निधी वापर रेटिंग (1-10)", type:"range", min:1, max:10, name:"q8_fund_rating", scoreFromRange:true },
      { id:14, text:"तुमचे नाव (ऐच्छिक)", type:"text", placeholder:"तुमचे नाव", name:"optional_name" },
      { id:15, text:"मतदारसंघ (ऐच्छिक)", type:"text", placeholder:"मतदारसंघ", name:"optional_constituency" },
      { id:16, text:"निधी वापर पारदर्शक आहे का?", type:"select", options:["हो","अंशतः","नाही"], name:"q10_transparent", positiveScore:{"हो":2,"अंशतः":1,"नाही":0} },
      { id:17, text:"भ्रष्टाचार / पारदर्शकता मत", type:"textarea", placeholder:"तुमचे मत लिहा", name:"q11_corruption_view" },
      { id:18, text:"आमदाराने काय चांगले केले?", type:"textarea", placeholder:"रस्ते, पूल, शाळा, स्वच्छता", name:"q12_good_work" },
      { id:19, text:"कुठे सुधारणा हवी?", type:"textarea", placeholder:"पाणी समस्या, वाहतूक, रस्ते", name:"q13_improvements" },
      { id:20, text:"इतर टिप्पणी", type:"textarea", placeholder:"तुमचा सल्ला / निरीक्षण", name:"q14_other_comments" },
      { id:21, text:"आमदाराने पक्ष बदलला का?", type:"select", options:["हो","नाही"], name:"q15_party_change", positiveScore:{"हो":-1,"नाही":1} },
      { id:22, text:"विकासावर परिणाम", type:"select", options:["सकारात्मक","नकारात्मक","काही फरक नाही"], name:"q16_impact", positiveScore:{"सकारात्मक":2,"नकारात्मक":-1,"काही फरक नाही":0} },
      { id:23, text:"रस्ते, पाणी, ड्रेनेज, स्वच्छता सुधारली का?", type:"select", options:["हो","अंशतः","नाही"], name:"q17_improved", positiveScore:{"हो":2,"अंशतः":1,"नाही":0} },
      { id:24, text:"तुम्ही खूश किंवा नाराज का आहात? (कारण)", type:"textarea", placeholder:"तुमचा अभिप्राय लिहा", name:"q18_happy_reason", rows:4 }
    ];

    let formDataStore = {};
    const container = document.getElementById('questionsContainer');
    const submitBtn = document.getElementById('submitBtn');
    let reportModal = null;

    function renderAllQuestions() {
      container.innerHTML = '';
      surveyQuestions.forEach((q, idx) => {
        const block = document.createElement('div');
        block.className = 'question-block';
        const num = document.createElement('span');
        num.className = 'q-number';
        num.innerText = `प्रश्न ${idx+1}`;
        block.appendChild(num);
        const p = document.createElement('p');
        p.innerText = q.text;
        block.appendChild(p);

        let inputEl = null;
        if (q.type === 'select') {
          const sel = document.createElement('select');
          sel.className = 'form-select';
          sel.name = q.name;
          const def = document.createElement('option');
          def.value = ''; def.innerText = '-- निवडा --';
          sel.appendChild(def);
          q.options.forEach(opt => {
            const o = document.createElement('option');
            o.value = opt; o.innerText = opt;
            sel.appendChild(o);
          });
          inputEl = sel; block.appendChild(sel);
        }
        else if (q.type === 'textarea') {
          const ta = document.createElement('textarea');
          ta.className = 'form-control';
          ta.rows = q.rows || 3;
          ta.placeholder = q.placeholder || '';
          ta.name = q.name;
          inputEl = ta; block.appendChild(ta);
        }
        else if (q.type === 'range') {
          const wrap = document.createElement('div');
          const range = document.createElement('input');
          range.type = 'range';
          range.className = 'form-range';
          range.min = q.min || 1; range.max = q.max || 10;
          range.name = q.name;
          const valSpan = document.createElement('div');
          valSpan.className = 'mt-1 small text-secondary';
          const id = `rangeVal_${q.name}`;
          valSpan.id = id;
          valSpan.innerText = range.value;
          range.addEventListener('input', function(e) {
            document.getElementById(id).innerText = e.target.value;
            saveAllData();
          });
          wrap.appendChild(range); wrap.appendChild(valSpan);
          inputEl = range; block.appendChild(wrap);
        }
        else if (q.type === 'checkbox_group') {
          const div = document.createElement('div');
          q.options.forEach(opt => {
            const checkDiv = document.createElement('div');
            checkDiv.className = 'form-check';
            const cb = document.createElement('input');
            cb.type = 'checkbox';
            cb.className = 'form-check-input';
            cb.name = q.name;
            cb.value = opt;
            const lbl = document.createElement('label');
            lbl.className = 'form-check-label';
            lbl.innerText = opt;
            checkDiv.appendChild(cb);
            checkDiv.appendChild(lbl);
            div.appendChild(checkDiv);
          });
          inputEl = div; block.appendChild(div);
        }
        else if (q.type === 'text') {
          const inp = document.createElement('input');
          inp.type = 'text';
          inp.className = 'form-control';
          inp.placeholder = q.placeholder || '';
          inp.name = q.name;
          inputEl = inp; block.appendChild(inp);
        }

        if (inputEl) {
          if (q.type === 'checkbox_group') {
            inputEl.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.addEventListener('change', saveAllData));
          } else {
            inputEl.addEventListener('change', saveAllData);
            inputEl.addEventListener('input', saveAllData);
          }
        }
        container.appendChild(block);

        // restore
        if (formDataStore[q.name] !== undefined) {
          if (q.type === 'checkbox_group') {
            const saved = formDataStore[q.name] || [];
            inputEl.querySelectorAll('input[type="checkbox"]').forEach(cb => {
              cb.checked = saved.includes(cb.value);
            });
          } else if (q.type === 'range') {
            inputEl.value = formDataStore[q.name];
            const sp = document.getElementById(`rangeVal_${q.name}`);
            if (sp) sp.innerText = formDataStore[q.name];
          } else {
            inputEl.value = formDataStore[q.name];
          }
        }
      });
    }

    function saveAllData() {
      document.querySelectorAll('.question-block').forEach((block, idx) => {
        const q = surveyQuestions[idx];
        if (!q) return;
        if (q.type === 'checkbox_group') {
          const cbs = block.querySelectorAll('input[type="checkbox"]');
          const checked = [];
          cbs.forEach(cb => { if (cb.checked) checked.push(cb.value); });
          formDataStore[q.name] = checked;
        } else {
          const inp = block.querySelector('input, select, textarea');
          if (inp) formDataStore[q.name] = inp.value;
        }
      });
    }

    function computeFullRating() {
      let totalEarned = 0, totalMax = 0;
      let sectionDetails = [];
      surveyQuestions.forEach((q, idx) => {
        let val = formDataStore[q.name];
        if (val === undefined || val === '' || (Array.isArray(val) && val.length === 0)) return;
        let qEarned = 0, qMax = 0;
        if (q.type === 'select' && q.positiveScore) {
          const scores = q.positiveScore;
          const values = Object.values(scores);
          const maxVal = Math.max(...values, 0);
          const minVal = Math.min(...values, 0);
          const range = maxVal - minVal || 1;
          const raw = scores[val] !== undefined ? scores[val] : 0;
          const norm = Math.max(0, raw - minVal);
          qEarned += norm; qMax += range;
        }
        else if (q.type === 'range' && q.scoreFromRange) {
          const num = Number(val);
          if (!isNaN(num)) {
            const score = (num / 10) * 2;
            qEarned += score; qMax += 2;
          }
        }
        else if (q.type === 'checkbox_group' && q.positivePerCheck) {
          const items = Array.isArray(val) ? val : (val ? [val] : []);
          const count = items.length;
          const per = q.positivePerCheck;
          qEarned += count * per;
          qMax += q.options.length * per;
        }
        else if (q.ratingValueScore === true && q.type === 'select') {
          const num = Number(val);
          if (!isNaN(num) && num >= 1 && num <= 5) {
            const score = (num / 5) * 2;
            qEarned += score; qMax += 2;
          }
        }
        if (qMax > 0) {
          totalEarned += qEarned; totalMax += qMax;
          const percent = (qEarned / qMax) * 100;
          sectionDetails.push({
            qNum: idx+1,
            text: q.text.length > 45 ? q.text.substring(0,42)+'...' : q.text,
            starRating: (percent / 100) * 5
          });
        }
      });
      const overallStars = totalMax > 0 ? (totalEarned / totalMax) * 5 : 0;
      return { overallStars: Math.min(5, Math.max(0, overallStars)), sectionDetails };
    }

    function showReportInModal() {
      const { overallStars, sectionDetails } = computeFullRating();
      let starHtml = '';
      const full = Math.floor(overallStars);
      const partial = overallStars - full;
      for (let i=0; i<5; i++) {
        starHtml += (i < full || (i === full && partial >= 0.25)) ? '★' : '☆';
      }
      let remark = overallStars >= 4 ? '🌟 उत्कृष्ट कामगिरी' :
                  overallStars >= 3 ? '👍 चांगली कामगिरी' :
                  overallStars >= 2 ? '📈 सुधारणेची आवश्यकता' : '⚠️ असमाधानकारक';
      let html = `
        <div class="text-center mb-4">
          <div class="report-stars">${starHtml}</div>
          <h4 class="fw-bold mt-2 text-primary">${overallStars.toFixed(1)} / 5.0</h4>
          <p class="text-secondary">${remark}</p>
          <div class="alert alert-light p-2 rounded-4"><i class="fas fa-info-circle text-primary me-1"></i>सर्व प्रश्नांच्या सकारात्मक उत्तरांवर आधारित रेटिंग</div>
        </div>
        <div class="fw-bold mb-2"><i class="fas fa-list-ul me-1 text-primary"></i> प्रश्ननिहाय विश्लेषण</div>
      `;
      if (sectionDetails.length === 0) {
        html += `<p class="text-secondary">कृपया किमान काही प्रश्नांची उत्तरे द्या.</p>`;
      } else {
        sectionDetails.forEach(s => {
          let starSec = '';
          const filled = Math.floor(s.starRating);
          for (let i=0; i<5; i++) {
            starSec += i < filled ? '★' : (i === filled && (s.starRating % 1) >= 0.3 ? '★' : '☆');
          }
          html += `<div class="report-section-item"><span class="small">${s.qNum}. ${s.text}</span><span class="stars-small">${starSec}</span></div>`;
        });
      }
      document.getElementById('reportModalBody').innerHTML = html;
      if (!reportModal) reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
      reportModal.show();
    }

    function onSubmitSurvey() {
      saveAllData();
      let answered = 0;
      surveyQuestions.forEach(q => {
        const val = formDataStore[q.name];
        if (val !== undefined && val !== '' && !(Array.isArray(val) && val.length === 0)) answered++;
      });
      if (answered < 3) {
        alert('कृपया किमान 3-4 प्रश्नांची उत्तरे द्या.');
        return;
      }
      showReportInModal();
    }

    // global exports for modal buttons
    window.downloadReport = function() {
      const { overallStars, sectionDetails } = computeFullRating();
      let report = '=== MLA कामगिरी रिपोर्ट ===\n\n';
      report += `एकूण रेटिंग: ${overallStars.toFixed(1)} / 5.0 ★\n\n`;
      report += '--- प्रश्ननिहाय विश्लेषण ---\n';
      sectionDetails.forEach(s => {
        let starStr = '';
        const filled = Math.floor(s.starRating);
        for (let i=0; i<5; i++) {
          starStr += i < filled ? '★' : (i === filled && (s.starRating % 1) >= 0.3 ? '★' : '☆');
        }
        report += `${s.qNum}. ${s.text} → ${starStr} (${s.starRating.toFixed(1)}/5)\n`;
      });
      report += '\n--- उत्तरे ---\n';
      surveyQuestions.forEach(q => {
        let val = formDataStore[q.name];
        if (val !== undefined && val !== '' && !(Array.isArray(val) && val.length === 0)) {
          if (Array.isArray(val)) val = val.join(', ');
          report += `${q.text.substring(0,50)}... → ${val}\n`;
        }
      });
      report += '\n--- रिपोर्ट तयार: ' + new Date().toLocaleString() + ' ---';
      const blob = new Blob([report], { type: 'text/plain' });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = `MLA_Rating_Report_${new Date().toISOString().slice(0,10)}.txt`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(link.href);
    };
    window.shareReport = function() {
      const { overallStars } = computeFullRating();
      let shareText = `🌟 MLA कामगिरी रेटिंग: ${overallStars.toFixed(1)} / 5.0 ★\n📅 ${new Date().toLocaleString()}\n\nGovTrack Aura द्वारे सर्वेक्षण रिपोर्ट.`;
      if (navigator.share) {
        navigator.share({ title: 'MLA कामगिरी रिपोर्ट', text: shareText }).catch(()=>{});
      } else {
        navigator.clipboard.writeText(shareText).then(() => alert('रिपोर्ट कॉपी झाला!')).catch(() => prompt('खालील टेक्स्ट कॉपी करा:', shareText));
      }
    };
    window.resetSurvey = function() {
      if (confirm('सर्व उत्तरे रीसेट करायची आहेत का?')) {
        formDataStore = {};
        renderAllQuestions();
        if (reportModal) reportModal.hide();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    };

    submitBtn.addEventListener('click', onSubmitSurvey);
    renderAllQuestions();
  </script>
</body>
</html>