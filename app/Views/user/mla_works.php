<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes" />
  <title>MLA Development · Premium Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- Bootstrap 5 Grid & Utilities (only for layout, no conflict) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    :root {
      --white: #ffffff;
      --navy: #0B1F4D;
      --sky: #6DB3F2;
      --green: #2E9A6E;
      --light-gray: #F4F6FA;
      --glass: rgba(255, 255, 255, 0.95);
      --shadow-sm: 0 8px 20px rgba(0,0,0,0.04);
      --shadow-lift: 0 16px 32px -8px rgba(0,0,0,0.08);
      --radius: 28px;
      --transition: 0.25s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      --font: 'Inter', sans-serif;
      /* Code 2 inspired colors */
      --lime-gold: #C3C848;
      --lime-gold-light: #D8DD7A;
      --olive-green: #6B8A22;
      --teal-blue: #225661;
      --teal-blue-light: #3A7A8A;
      --dark-olive: #454D28;
      --soft-white: #F4F2F5;
    }
    body { background: var(--soft-white); font-family: var(--font); color: #1A2A3A; min-height: 100vh; overflow-x: hidden; }
    .main-content {
      position: relative; min-height: 100vh; max-width: none; margin: 0; margin-left: 280px; margin-top: 70px;
      padding: 1.5rem 2rem; transition: margin-left 0.3s ease; overflow-x: hidden; height: calc(100vh - 70px); overflow-y: auto;
    }
    .sidebar-collapsed .main-content { margin-left: 80px; }
    .main-content::-webkit-scrollbar { width: 6px; }
    .main-content::-webkit-scrollbar-track { background: #e8e8e8; border-radius: 10px; }
    .main-content::-webkit-scrollbar-thumb { background: var(--lime-gold-light); border-radius: 10px; }
    .main-content::-webkit-scrollbar-thumb:hover { background: var(--lime-gold); }
    .dashboard {
      max-width: 1440px; width: 100%; background: var(--glass); backdrop-filter: blur(2px);
      border-radius: var(--radius); box-shadow: var(--shadow-sm); padding: 24px 28px 32px;
      border: 1px solid rgba(195,200,72,0.15);
    }
    /* Header area – keeping same structure */
    .top-header {
      display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; margin-bottom: 20px;
    }
    .header-left h1 { font-size: 1.6rem; font-weight: 700; color: var(--teal-blue); letter-spacing: -0.4px; }
    .header-left h1 i { color: var(--lime-gold); margin-right: 10px; }
    .breadcrumb { font-size: 0.85rem; color: #5B6F87; margin-top: 2px; }
    .breadcrumb span { color: var(--teal-blue); font-weight: 600; }
    .header-actions { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin-top: 4px; }
    .search-bar {
      background: white; border-radius: 60px; padding: 4px 14px 4px 18px; display: flex; align-items: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02); border: 1px solid rgba(195,200,72,0.20);
    }
    .search-bar i { color: var(--lime-gold); font-size: 0.85rem; }
    .search-bar input {
      border: none; padding: 6px 10px 6px 8px; font-size: 0.85rem; min-width: 140px;
      background: transparent; outline: none; font-weight: 400;
    }
    .filter-group { display: flex; flex-wrap: wrap; gap: 8px; }
    .filter-group select {
      background: white; border: 1px solid rgba(195,200,72,0.25); border-radius: 40px;
      padding: 6px 14px 6px 16px; font-size: 0.8rem; font-weight: 500; color: var(--teal-blue);
      outline: none; cursor: pointer; transition: var(--transition);
    }
    .filter-group select:focus { border-color: var(--lime-gold); box-shadow: 0 0 0 3px rgba(195,200,72,0.12); }

    /* ===== GRID – 4 cards per row, compact ===== */
    .projects-grid {
      display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin: 20px 0 24px;
    }

    /* ===== CARD – Premium, compact, equal height ===== */
    .project-card {
      background: white; border-radius: 24px; box-shadow: var(--shadow-sm);
      overflow: hidden; transition: all 0.3s ease; border: 1px solid rgba(195,200,72,0.12);
      backdrop-filter: blur(2px); display: flex; flex-direction: column; position: relative;
      height: 100%; min-height: 380px; /* compact but consistent */
    }
    .project-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 28px -8px rgba(0,0,0,0.06), 0 0 0 1px rgba(195,200,72,0.15);
    }

    /* Slider – smaller height */
    .slider-container {
      position: relative; width: 100%; height: 140px; background: #D9E3F0; overflow: hidden;
      border-radius: 24px 24px 0 0;
    }
    .slider-track { display: flex; width: 100%; height: 100%; transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .slide { min-width: 100%; height: 100%; object-fit: cover; display: block; }
    .slider-btn {
      position: absolute; top: 50%; transform: translateY(-50%);
      background: rgba(0,0,0,0.25); backdrop-filter: blur(4px); color: white; border: none;
      width: 28px; height: 28px; border-radius: 40px; font-size: 0.8rem; cursor: pointer; z-index: 10;
      transition: 0.2s; display: flex; align-items: center; justify-content: center;
    }
    .slider-btn:hover { background: rgba(0,0,0,0.5); }
    .slider-btn.prev { left: 6px; }
    .slider-btn.next { right: 6px; }
    .slider-dots {
      position: absolute; bottom: 6px; left: 50%; transform: translateX(-50%);
      display: flex; gap: 4px; z-index: 10;
    }
    .dot { width: 6px; height: 6px; border-radius: 20px; background: rgba(255,255,255,0.5); cursor: pointer; transition: 0.25s; }
    .dot.active { background: white; width: 16px; }
    .slider-counter {
      position: absolute; top: 8px; right: 8px; background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);
      color: white; padding: 1px 8px; border-radius: 40px; font-size: 0.6rem; font-weight: 600; z-index: 10;
    }
    .status-badge {
      position: absolute; top: 8px; left: 8px; padding: 2px 12px; border-radius: 40px;
      font-size: 0.55rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px;
      color: white; box-shadow: 0 4px 12px rgba(0,0,0,0.08); z-index: 10;
      background: var(--green); animation: pulse-badge 2s infinite;
    }
    .status-badge.ongoing { background: #2D7FC1; }
    .status-badge.pending { background: #E68A2E; }
    .status-badge.delayed { background: #C0392B; }
    .status-badge.cancelled { background: #6C7A89; }
    @keyframes pulse-badge { 0% { opacity: 1; } 50% { opacity: 0.75; } 100% { opacity: 1; } }

    /* MLA profile – compact */
    .mla-profile {
      display: flex; align-items: center; gap: 10px; padding: 8px 14px 6px;
      border-bottom: 1px solid rgba(195,200,72,0.10);
    }
    .mla-avatar { width: 36px; height: 36px; border-radius: 10px; object-fit: cover; border: 2px solid var(--lime-gold-light); }
    .mla-info h4 { font-weight: 700; font-size: 0.85rem; color: var(--teal-blue); display: flex; align-items: center; gap: 4px; }
    .mla-info h4 i { color: var(--green); font-size: 0.7rem; }
    .mla-info .party { font-size: 0.55rem; color: #2A3B4F; background: rgba(195,200,72,0.10); padding: 0 8px; border-radius: 40px; display: inline-block; }
    .mla-info .constituency { font-size: 0.6rem; color: #5B6F87; }

    /* Card body – compact padding */
    .card-body { padding: 8px 14px 12px; flex: 1; display: flex; flex-direction: column; gap: 4px; }
    .project-title { font-size: 0.95rem; font-weight: 700; color: var(--teal-blue); }
    .project-id { font-size: 0.5rem; color: #7B8DA0; font-weight: 500; letter-spacing: 0.3px; }
    .project-dept { font-size: 0.65rem; color: #5B6F87; }
    .project-desc {
      font-size: 0.7rem; color: #2A3B4F; line-height: 1.3;
      display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    }
    .category-badge {
      display: inline-block; padding: 1px 10px; border-radius: 40px; font-size: 0.55rem; font-weight: 600;
      background: rgba(195,200,72,0.08); color: var(--teal-blue); margin-right: 2px; margin-bottom: 2px;
    }
    .category-badge.road { background: #D4E6F1; color: #1A5276; }
    .category-badge.bridge { background: #D5D8DC; color: #2C3E50; }
    .category-badge.hospital { background: #FADBD8; color: #922B21; }
    .category-badge.school { background: #FDEBD0; color: #935E38; }
    .category-badge.water { background: #D6EAF8; color: #1B4F72; }
    .category-badge.electricity { background: #FCF3CF; color: #7D6608; }
    .category-badge.health { background: #F5B7B1; color: #78281F; }
    .category-badge.agriculture { background: #D5F5E3; color: #1A6E4D; }
    .category-badge.sports { background: #D4E6F1; color: #1A5276; }
    .category-badge.women { background: #EBDEF0; color: #6C3483; }
    .category-badge.digital { background: #D2B4DE; color: #4A235A; }
    .category-badge.tourism { background: #FAD7A0; color: #7E5109; }
    .category-badge.smart { background: #A9DFBF; color: #1E8449; }

    .location-compact {
      display: flex; flex-wrap: wrap; gap: 2px 8px; font-size: 0.6rem; color: #2A3B4F;
      background: rgba(195,200,72,0.04); padding: 4px 10px; border-radius: 10px; margin: 2px 0 4px;
    }
    .location-compact i { color: var(--lime-gold); width: 12px; }

    .progress-compact { margin: 2px 0 4px; }
    .progress-row {
      display: flex; align-items: center; gap: 4px; font-size: 0.6rem;
    }
    .progress-row .label { min-width: 52px; color: #2A3B4F; font-weight: 500; }
    .progress-track { flex: 1; height: 4px; background: #E9EEF6; border-radius: 20px; overflow: hidden; }
    .progress-fill { height: 100%; border-radius: 20px; transition: width 1s ease; background: linear-gradient(90deg, var(--lime-gold-light), var(--lime-gold)); }

    .fund-compact {
      display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 4px; margin: 2px 0 4px;
    }
    .fund-item {
      background: rgba(195,200,72,0.04); border-radius: 10px; padding: 4px 2px; text-align: center;
    }
    .fund-item .label { font-size: 0.45rem; text-transform: uppercase; color: #5B6F87; letter-spacing: 0.3px; }
    .fund-item .value { font-weight: 700; font-size: 0.75rem; color: var(--teal-blue); }
    .fund-item .value.green { color: var(--green); }
    .fund-item .value.orange { color: #E68A2E; }

    .gallery-thumbs {
      display: flex; gap: 4px; flex-wrap: wrap; margin: 2px 0 4px;
    }
    .gallery-thumbs img {
      width: 36px; height: 36px; object-fit: cover; border-radius: 8px;
      cursor: pointer; border: 2px solid transparent; transition: 0.2s;
    }
    .gallery-thumbs img:hover { border-color: var(--lime-gold); transform: scale(1.05); }

    .feedback-summary-compact {
      display: flex; align-items: center; gap: 8px; background: rgba(195,200,72,0.04);
      padding: 4px 10px; border-radius: 12px; margin: 4px 0 6px; border: 1px solid rgba(195,200,72,0.08);
    }
    .feedback-avg-compact { display: flex; align-items: center; gap: 4px; }
    .feedback-avg-compact .big-rating { font-size: 1.1rem; font-weight: 700; color: var(--teal-blue); }
    .feedback-avg-compact .stars { color: #F5B342; font-size: 0.6rem; letter-spacing: 0.5px; }
    .feedback-avg-compact .total { font-size: 0.5rem; color: #5B6F87; }

    .action-buttons {
      display: flex; flex-wrap: wrap; gap: 4px; margin-top: 4px; border-top: 1px solid rgba(195,200,72,0.08); padding-top: 8px;
    }
    .btn-action {
      background: transparent; border: 1px solid rgba(195,200,72,0.20); padding: 2px 10px; border-radius: 40px;
      font-size: 0.6rem; font-weight: 600; color: var(--teal-blue); transition: 0.2s; cursor: pointer;
      display: inline-flex; align-items: center; gap: 3px;
    }
    .btn-action i { font-size: 0.6rem; }
    .btn-action:hover { background: var(--teal-blue); color: white; border-color: var(--teal-blue); }
    .btn-action.primary { background: var(--teal-blue); color: white; border-color: var(--teal-blue); }
    .btn-action.primary:hover { background: #1A3A5A; }
    .btn-action.feedback-btn { background: var(--lime-gold); color: var(--dark-olive); border-color: var(--lime-gold); }
    .btn-action.feedback-btn:hover { background: var(--olive-green); color: white; border-color: var(--olive-green); }

    /* Modals – unchanged */
    .modal-overlay {
      position: fixed; inset: 0; background: rgba(11, 31, 77, 0.4); backdrop-filter: blur(4px);
      display: flex; align-items: center; justify-content: center; visibility: hidden; opacity: 0;
      transition: 0.3s; z-index: 999; padding: 20px;
    }
    .modal-overlay.active { visibility: visible; opacity: 1; }
    .modal-box {
      background: white; max-width: 820px; width: 100%; border-radius: 28px; padding: 24px 28px 28px;
      box-shadow: 0 20px 40px -12px rgba(0,0,0,0.08); transform: scale(0.96); transition: 0.25s;
      max-height: 90vh; overflow-y: auto;
    }
    .modal-overlay.active .modal-box { transform: scale(1); }
    .modal-box h2 { color: var(--teal-blue); font-weight: 700; margin-bottom: 12px; display: flex; align-items: center; gap: 12px; }
    .modal-box .close-modal { margin-left: auto; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #5B6F87; }
    .modal-box .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .modal-box .detail-item { background: #F8FAFE; padding: 8px 12px; border-radius: 16px; border: 1px solid rgba(195,200,72,0.08); }
    .modal-box .detail-item .label { font-size: 0.6rem; text-transform: uppercase; color: #5B6F87; }
    .modal-box .detail-item .value { font-weight: 600; color: var(--teal-blue); font-size: 0.85rem; }
    .modal-box .detail-full { grid-column: 1 / -1; }
    .modal-box .detail-timeline { grid-column: 1 / -1; display: flex; flex-wrap: wrap; gap: 6px; }
    .modal-box .timeline-step { background: #F8FAFE; padding: 4px 10px; border-radius: 20px; font-size: 0.7rem; border: 1px solid rgba(195,200,72,0.08); display: flex; align-items: center; gap: 4px; }
    .modal-box .timeline-step .done { color: var(--green); }
    .modal-box .timeline-step .pending { color: #E68A2E; }
    @media (max-width: 600px) { .modal-box .detail-grid { grid-template-columns: 1fr; } }

    .fb-modal .modal-box { max-width: 480px; }
    .fb-modal .form-group { margin-bottom: 10px; }
    .fb-modal label { font-weight: 600; font-size: 0.75rem; color: #1A2A3A; display: block; margin-bottom: 3px; }
    .fb-modal input, .fb-modal select, .fb-modal textarea {
      width: 100%; padding: 6px 12px; border: 1px solid #DDE4EE; border-radius: 14px;
      font-size: 0.85rem; background: #F9FBFD; outline: none;
    }
    .fb-modal input:focus, .fb-modal select:focus, .fb-modal textarea:focus {
      border-color: var(--lime-gold); box-shadow: 0 0 0 3px rgba(195,200,72,0.12);
    }
    .fb-modal .star-rating { font-size: 1.4rem; letter-spacing: 3px; color: #D0D8E3; cursor: pointer; }
    .fb-modal .star-rating .active { color: #F5B342; }
    .fb-modal .modal-actions { display: flex; gap: 10px; margin-top: 14px; }
    .fb-modal .btn-submit { background: var(--lime-gold); border: none; padding: 8px 24px; border-radius: 60px; font-weight: 700; color: var(--dark-olive); flex: 1; cursor: pointer; }
    .fb-modal .btn-submit:hover { background: var(--olive-green); color: white; }
    .fb-modal .btn-cancel { background: #E9EEF6; border: none; padding: 8px 20px; border-radius: 60px; font-weight: 600; color: #1A2A3A; cursor: pointer; }
    .fb-modal .image-preview-area { display: flex; flex-wrap: wrap; gap: 6px; margin: 4px 0; }
    .fb-modal .preview-thumb { position: relative; width: 50px; height: 50px; border-radius: 10px; overflow: hidden; border: 1px solid #DDE4EE; }
    .fb-modal .preview-thumb img { width: 100%; height: 100%; object-fit: cover; }
    .fb-modal .preview-thumb .remove-img { position: absolute; top: 1px; right: 1px; background: rgba(0,0,0,0.5); color: white; border-radius: 30px; width: 16px; height: 16px; font-size: 8px; line-height: 16px; text-align: center; cursor: pointer; }

    .toast {
      position: fixed; bottom: 30px; right: 30px; background: var(--teal-blue); color: white;
      padding: 12px 22px; border-radius: 60px; font-weight: 600; box-shadow: 0 10px 30px rgba(0,0,0,0.06);
      transform: translateY(20px); opacity: 0; transition: 0.3s; z-index: 1000; pointer-events: none;
    }
    .toast.show { transform: translateY(0); opacity: 1; }

    .lightbox {
      position: fixed; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(8px);
      display: flex; align-items: center; justify-content: center; visibility: hidden; opacity: 0;
      transition: 0.25s; z-index: 1200; padding: 30px;
    }
    .lightbox.active { visibility: visible; opacity: 1; }
    .lightbox img { max-width: 90%; max-height: 85vh; border-radius: 28px; object-fit: contain; }
    .lightbox .close-lightbox {
      position: absolute; top: 30px; right: 40px; font-size: 2.2rem; color: white; cursor: pointer; opacity: 0.7;
    }
    .lightbox .close-lightbox:hover { opacity: 1; }

    /* Responsive */
    @media (max-width: 1024px) {
      .main-content { padding: 1.25rem 1.5rem; }
    }
    @media (max-width: 768px) {
      .main-content { padding: 1rem 1.25rem; margin-left: 0; }
      body.sidebar-collapsed .main-content { margin-left: 0; }
      .dashboard { padding: 16px; }
      .projects-grid { grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; }
      .slider-container { height: 120px; }
    }
    @media (max-width: 576px) {
      .main-content { padding: 0.75rem 0.85rem; }
      .dashboard { padding: 12px; }
      .slider-container { height: 100px; }
      .mla-avatar { width: 30px; height: 30px; }
      .fund-compact { grid-template-columns: 1fr 1fr 1fr; }
      .projects-grid { grid-template-columns: 1fr; }
    }
    @media (min-width: 1920px) {
      .main-content { padding: 2rem 2.5rem; }
    }
  </style>
</head>
<body>
 <?php include "common/header.php"?>
<div class="main-content">
  <div class="dashboard" id="app">

    <!-- TOP HEADER (unchanged structure) -->
    <div class="top-header">
      <div class="header-left">
        <h1><i class="fas fa-hard-hat"></i> MLA Development Work</h1>
        <div class="breadcrumb">Dashboard <i class="fas fa-chevron-right" style="margin:0 6px;font-size:10px;"></i> <span>Development Work</span></div>
      </div>
      <div class="header-actions">
        <div class="search-bar">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="Search projects..." id="globalSearch" />
        </div>
        <div class="filter-group">
          <select id="statusFilter"><option value="all">All Status</option><option value="Completed">Completed</option><option value="Ongoing">Ongoing</option><option value="Pending">Pending</option><option value="Delayed">Delayed</option></select>
          <select id="categoryFilter"><option value="all">All Categories</option><option value="Road">Road</option><option value="Bridge">Bridge</option><option value="Hospital">Hospital</option><option value="School">School</option><option value="Water">Water</option><option value="Electricity">Electricity</option><option value="Health">Health</option><option value="Agriculture">Agriculture</option><option value="Sports">Sports</option><option value="Women">Women Safety</option><option value="Digital">Digital</option><option value="Tourism">Tourism</option><option value="Smart">Smart Village</option></select>
        </div>
      </div>
    </div>

    <!-- PROJECT GRID -->
    <div class="projects-grid" id="projectsGrid"></div>

  </div>
</div>

<!-- ===== DETAIL MODAL ===== -->
<div class="modal-overlay" id="detailModal">
  <div class="modal-box">
    <h2><span id="detailTitle">Project</span> <button class="close-modal" id="closeDetailModal">&times;</button></h2>
    <div id="detailContent" class="detail-grid"></div>
  </div>
</div>

<!-- ===== FEEDBACK MODAL ===== -->
<div class="modal-overlay fb-modal" id="feedbackModal">
  <div class="modal-box">
    <h3 style="display:flex;justify-content:space-between;align-items:center;">
      <span><i class="fas fa-star" style="color:var(--lime-gold);"></i> Give Feedback</span>
      <button class="close-modal" id="closeFeedbackModal" style="background:none;border:none;font-size:1.5rem;cursor:pointer;">&times;</button>
    </h3>
    <div class="form-group">
      <label>Your Name</label>
      <input type="text" id="fbName" placeholder="e.g. Rajesh Kumar" />
    </div>
    <div class="form-group">
      <label>Rating</label>
      <div class="star-rating" id="starRating">
        <i class="fas fa-star" data-val="1"></i>
        <i class="fas fa-star" data-val="2"></i>
        <i class="fas fa-star" data-val="3"></i>
        <i class="fas fa-star" data-val="4"></i>
        <i class="fas fa-star" data-val="5"></i>
      </div>
      <input type="hidden" id="fbRating" value="5" />
    </div>
    <div class="form-group">
      <label>Feedback Category</label>
      <select id="fbCategory"><option>Road Quality</option><option>Water</option><option>Electricity</option><option>Drainage</option><option>Suggestion</option><option>Other</option></select>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea id="fbDesc" rows="2" placeholder="Describe your experience..."></textarea>
    </div>
    <div class="form-group">
      <label>Upload Images</label>
      <input type="file" id="fbImages" multiple accept="image/*" />
      <div class="image-preview-area" id="imagePreviewArea"></div>
    </div>
    <div class="modal-actions">
      <button class="btn-submit" id="submitFeedbackBtn"><i class="fas fa-paper-plane"></i> Submit</button>
      <button class="btn-cancel" id="cancelFeedbackBtn">Cancel</button>
    </div>
  </div>
</div>

<!-- ===== TOAST ===== -->
<div class="toast" id="toastMsg">✅ Thank you for your feedback.</div>

<!-- ===== LIGHTBOX ===== -->
<div class="lightbox" id="lightbox">
  <span class="close-lightbox" id="closeLightbox">&times;</span>
  <img id="lightboxImg" src="" alt="preview" />
</div>

<script>
  (function() {
    "use strict";

    // ===== DATA =====
    const projectsData = [{
      id: 101,
      title: "Village Road Connectivity",
      dept: "Public Works",
      desc: "Construction of 4.2 km road connecting rural hamlets to state highway with drainage and street lights.",
      category: "Road",
      subCategory: "Rural Road",
      status: "Completed",
      progress: 100,
      cost: "₹1.25 Cr",
      start: "01-Jan-2026",
      end: "31-May-2026",
      mla: "Vedant Patil",
      party: "BJP",
      constituency: "Satara",
      district: "Satara",
      taluka: "Satara",
      village: "Wadhe",
      pincode: "415001",
      avatar: "https://randomuser.me/api/portraits/men/32.jpg",
      cover: [
        "https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=600&h=300&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&h=300&fit=crop",
        "https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&h=300&fit=crop"
      ],
      fundTotal: 12500000,
      fundUsed: 12500000,
      gallery: [
        "https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=100&h=100&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=100&h=100&fit=crop",
        "https://images.unsplash.com/photo-1518770660439-4636190af475?w=100&h=100&fit=crop"
      ],
      timeline: [
        { stage: "Proposal", date: "10-Dec-2025", done: true },
        { stage: "Approval", date: "20-Dec-2025", done: true },
        { stage: "Tender", date: "28-Dec-2025", done: true },
        { stage: "Started", date: "01-Jan-2026", done: true },
        { stage: "25%", date: "10-Feb-2026", done: true },
        { stage: "50%", date: "15-Mar-2026", done: true },
        { stage: "75%", date: "20-Apr-2026", done: true },
        { stage: "Completed", date: "31-May-2026", done: true }
      ],
      documents: [
        { name: "Work Order", icon: "fa-file-pdf" },
        { name: "Tender PDF", icon: "fa-file-pdf" },
        { name: "Completion Certificate", icon: "fa-file-alt" }
      ],
      reviews: [
        { name: "Ramesh S.", village: "Wadhe", rating: 5, desc: "Excellent road quality!", date: "01-Jun-2026", images: ["https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=60&h=60&fit=crop"] },
        { name: "Sneha M.", village: "Wadhe", rating: 4, desc: "Good but need street lights.", date: "02-Jun-2026", images: [] }
      ]
    }, {
      id: 102,
      title: "Water Pipeline Project",
      dept: "Water Supply",
      desc: "Installation of 8 km pipeline for clean drinking water in Wai region.",
      category: "Water",
      subCategory: "Drinking Water",
      status: "Ongoing",
      progress: 75,
      cost: "₹80 Lakh",
      start: "15-Feb-2026",
      end: "15-Aug-2026",
      mla: "Vedant Patil",
      party: "BJP",
      constituency: "Wai",
      district: "Satara",
      taluka: "Wai",
      village: "Wai",
      pincode: "412803",
      avatar: "https://randomuser.me/api/portraits/men/32.jpg",
      cover: [
        "https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=600&h=300&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&h=300&fit=crop"
      ],
      fundTotal: 8000000,
      fundUsed: 6000000,
      gallery: [
        "https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=100&h=100&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=100&h=100&fit=crop"
      ],
      timeline: [
        { stage: "Proposal", date: "01-Jan-2026", done: true },
        { stage: "Approval", date: "15-Jan-2026", done: true },
        { stage: "Tender", date: "25-Jan-2026", done: true },
        { stage: "Started", date: "15-Feb-2026", done: true },
        { stage: "25%", date: "01-Mar-2026", done: true },
        { stage: "50%", date: "01-Apr-2026", done: true },
        { stage: "75%", date: "15-May-2026", done: false },
        { stage: "Completed", date: "15-Aug-2026", done: false }
      ],
      documents: [
        { name: "Work Order", icon: "fa-file-pdf" },
        { name: "Inspection Report", icon: "fa-file-alt" }
      ],
      reviews: [
        { name: "Anil K.", village: "Wai", rating: 4, desc: "Water quality improved.", date: "10-May-2026", images: [] }
      ]
    }, {
      id: 103,
      title: "Electricity Grid Upgrade",
      dept: "Energy",
      desc: "Upgrading transformers and lines in industrial zone.",
      category: "Electricity",
      subCategory: "Grid",
      status: "Pending",
      progress: 20,
      cost: "₹2.0 Cr",
      start: "01-Apr-2026",
      end: "30-Sep-2026",
      mla: "Vedant Patil",
      party: "BJP",
      constituency: "Satara",
      district: "Satara",
      taluka: "Satara",
      village: "Koregaon",
      pincode: "415002",
      avatar: "https://randomuser.me/api/portraits/men/32.jpg",
      cover: [
        "https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=300&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&h=300&fit=crop"
      ],
      fundTotal: 20000000,
      fundUsed: 4000000,
      gallery: [
        "https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=100&h=100&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=100&h=100&fit=crop"
      ],
      timeline: [
        { stage: "Proposal", date: "01-Feb-2026", done: true },
        { stage: "Approval", date: "15-Feb-2026", done: true },
        { stage: "Tender", date: "01-Mar-2026", done: false },
        { stage: "Started", date: "01-Apr-2026", done: false }
      ],
      documents: [
        { name: "Tender PDF", icon: "fa-file-pdf" }
      ],
      reviews: []
    }];

    const feedbackStore = {};

    const grid = document.getElementById('projectsGrid');
    const detailModal = document.getElementById('detailModal');
    const detailContent = document.getElementById('detailContent');
    const detailTitle = document.getElementById('detailTitle');
    const closeDetail = document.getElementById('closeDetailModal');
    const feedbackModal = document.getElementById('feedbackModal');
    const closeFeedback = document.getElementById('closeFeedbackModal');
    const cancelFeedback = document.getElementById('cancelFeedbackBtn');
    const submitFeedback = document.getElementById('submitFeedbackBtn');
    const toast = document.getElementById('toastMsg');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    const closeLightbox = document.getElementById('closeLightbox');

    let currentProjectId = null;
    let selectedImages = [];

    function renderProjects(filterStatus = 'all', filterCategory = 'all', searchTerm = '') {
      const filtered = projectsData.filter(p => {
        const statusMatch = filterStatus === 'all' || p.status === filterStatus;
        const catMatch = filterCategory === 'all' || p.category === filterCategory;
        const searchMatch = p.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
          p.mla.toLowerCase().includes(searchTerm.toLowerCase()) ||
          p.constituency.toLowerCase().includes(searchTerm.toLowerCase());
        return statusMatch && catMatch && searchMatch;
      });

      grid.innerHTML = '';
      filtered.forEach(proj => {
        const card = createCard(proj);
        grid.appendChild(card);
      });
    }

    function createCard(proj) {
      const card = document.createElement('div');
      card.className = 'project-card';

      const slides = proj.cover.length;
      let slideIndex = 0;
      const sliderHtml = `
        <div class="slider-container" id="slider-${proj.id}">
          <div class="slider-track" id="track-${proj.id}">
            ${proj.cover.map(src => `<img class="slide" src="${src}" alt="slide" loading="lazy" />`).join('')}
          </div>
          <button class="slider-btn prev" data-id="${proj.id}"><i class="fas fa-chevron-left"></i></button>
          <button class="slider-btn next" data-id="${proj.id}"><i class="fas fa-chevron-right"></i></button>
          <div class="slider-counter" id="counter-${proj.id}">1 / ${slides}</div>
          <div class="slider-dots" id="dots-${proj.id}">
            ${Array.from({ length: slides }, (_, i) => `<span class="dot ${i===0?'active':''}" data-index="${i}"></span>`).join('')}
          </div>
          <span class="status-badge ${proj.status.toLowerCase()}">${proj.status}</span>
        </div>
      `;

      const mlaHtml = `
        <div class="mla-profile">
          <img src="${proj.avatar}" class="mla-avatar" alt="MLA" />
          <div class="mla-info">
            <h4>${proj.mla} <i class="fas fa-check-circle" style="color:#2E9A6E;font-size:0.65rem;"></i></h4>
            <div><span class="party"><i class="fas fa-flag"></i> ${proj.party}</span> <span class="constituency">${proj.constituency}</span></div>
          </div>
        </div>
      `;

      const locationHtml = `
        <div class="location-compact">
          <span><i class="fas fa-map-marker-alt"></i> ${proj.district}</span>
          <span><i class="fas fa-city"></i> ${proj.taluka}</span>
          <span><i class="fas fa-home"></i> ${proj.village}</span>
          <span><i class="fas fa-code"></i> ${proj.pincode}</span>
        </div>
      `;

      const fundUsed = proj.fundUsed;
      const fundRemain = proj.fundTotal - fundUsed;
      const fundPercent = Math.round((fundUsed / proj.fundTotal) * 100);

      const fundHtml = `
        <div class="fund-compact">
          <div class="fund-item"><span class="label">Total</span><div class="value">₹${(proj.fundTotal/10000000).toFixed(2)}Cr</div></div>
          <div class="fund-item"><span class="label">Used</span><div class="value green">₹${(fundUsed/10000000).toFixed(2)}Cr</div></div>
          <div class="fund-item"><span class="label">Remain</span><div class="value orange">₹${(fundRemain/10000000).toFixed(2)}Cr</div></div>
        </div>
      `;

      const progressHtml = `
        <div class="progress-compact">
          <div class="progress-row"><span class="label">Overall</span><div class="progress-track"><div class="progress-fill" style="width:${proj.progress}%"></div></div><span>${proj.progress}%</span></div>
          <div class="progress-row"><span class="label">Financial</span><div class="progress-track"><div class="progress-fill" style="width:${fundPercent}%"></div></div><span>${fundPercent}%</span></div>
        </div>
      `;

      const galleryHtml = `
        <div class="gallery-thumbs">
          ${proj.gallery.map(src => `<img src="${src}" data-img="${src}" class="gallery-thumb" />`).join('')}
        </div>
      `;

      const fbData = feedbackStore[proj.id] || { list: [], avgRating: 0 };
      const avg = fbData.avgRating || 4.5;
      const total = fbData.list ? fbData.list.length : 0;
      const stars = Array.from({ length: 5 }, (_, i) =>
        i < Math.floor(avg) ? '<i class="fas fa-star"></i>' : '<i class="fas fa-star" style="color:#D0D8E3;"></i>'
      ).join('');

      const feedbackHtml = `
        <div class="feedback-summary-compact">
          <div class="feedback-avg-compact">
            <span class="big-rating">${avg.toFixed(1)}</span>
            <div><span class="stars">${stars}</span><div class="total">${total} reviews</div></div>
          </div>
          <div style="margin-left:auto;font-size:0.6rem;color:#5B6F87;"><i class="fas fa-comment"></i> ${total}</div>
        </div>
      `;

      const actionsHtml = `
        <div class="action-buttons">
          <button class="btn-action primary view-detail" data-id="${proj.id}"><i class="fas fa-eye"></i> Detail</button>
          <button class="btn-action feedback-btn give-feedback" data-id="${proj.id}"><i class="fas fa-comment-medical"></i> Feedback</button>
          <button class="btn-action"><i class="fas fa-share-alt"></i></button>
          <button class="btn-action"><i class="fas fa-bookmark"></i></button>
        </div>
      `;

      card.innerHTML = `
        ${sliderHtml}
        ${mlaHtml}
        <div class="card-body">
          <div class="project-title">${proj.title}</div>
          <div class="project-id">ID: MLA-${String(proj.id).padStart(4,'0')}</div>
          <div class="project-dept"><i class="fas fa-building"></i> ${proj.dept}</div>
          <div>
            <span class="category-badge ${proj.category.toLowerCase()}">${proj.category}</span>
            <span class="category-badge">${proj.subCategory}</span>
          </div>
          <div class="project-desc">${proj.desc}</div>
          ${locationHtml}
          ${fundHtml}
          ${progressHtml}
          ${galleryHtml}
          ${feedbackHtml}
          ${actionsHtml}
        </div>
      `;

      const track = card.querySelector(`#track-${proj.id}`);
      const prevBtn = card.querySelector(`.slider-btn.prev[data-id="${proj.id}"]`);
      const nextBtn = card.querySelector(`.slider-btn.next[data-id="${proj.id}"]`);
      const dots = card.querySelectorAll(`#dots-${proj.id} .dot`);
      const counter = card.querySelector(`#counter-${proj.id}`);

      function goToSlide(index) {
        if (index < 0) index = slides - 1;
        if (index >= slides) index = 0;
        slideIndex = index;
        track.style.transform = `translateX(-${slideIndex * 100}%)`;
        counter.textContent = `${slideIndex+1} / ${slides}`;
        dots.forEach((d, i) => d.classList.toggle('active', i === slideIndex));
      }

      prevBtn.addEventListener('click', () => goToSlide(slideIndex - 1));
      nextBtn.addEventListener('click', () => goToSlide(slideIndex + 1));
      dots.forEach((d, i) => d.addEventListener('click', () => goToSlide(i)));

      let interval = setInterval(() => goToSlide(slideIndex + 1), 4000);
      card.addEventListener('mouseenter', () => clearInterval(interval));
      card.addEventListener('mouseleave', () => {
        clearInterval(interval);
        interval = setInterval(() => goToSlide(slideIndex + 1), 4000);
      });

      card.querySelectorAll('.gallery-thumb').forEach(img => {
        img.addEventListener('click', (e) => {
          const src = img.dataset.img || img.src;
          if (src) openLightbox(src);
        });
      });

      card.querySelector('.view-detail').addEventListener('click', () => openDetail(proj.id));
      card.querySelector('.give-feedback').addEventListener('click', () => {
        currentProjectId = proj.id;
        openFeedbackModal();
      });

      return card;
    }

    function openDetail(id) {
      const proj = projectsData.find(p => p.id === id);
      if (!proj) return;
      detailTitle.textContent = `${proj.title} (MLA-${String(proj.id).padStart(4,'0')})`;
      const fbData = feedbackStore[proj.id] || { list: [], avgRating: 0 };
      const avg = fbData.avgRating || 4.5;
      const total = fbData.list ? fbData.list.length : 0;

      const timelineHtml = proj.timeline.map(t => `
        <span class="timeline-step">
          <i class="fas ${t.done ? 'fa-check-circle done' : 'fa-clock pending'}"></i>
          ${t.stage} <span style="font-weight:400;color:#5B6F87;">${t.date}</span>
        </span>
      `).join('');

      detailContent.innerHTML = `
        <div class="detail-item"><span class="label">Status</span><div class="value"><span class="status-badge ${proj.status.toLowerCase()}" style="position:static;padding:2px 12px;font-size:0.7rem;">${proj.status}</span></div></div>
        <div class="detail-item"><span class="label">Department</span><div class="value">${proj.dept}</div></div>
        <div class="detail-item"><span class="label">Category</span><div class="value">${proj.category} / ${proj.subCategory}</div></div>
        <div class="detail-item"><span class="label">Cost</span><div class="value">${proj.cost}</div></div>
        <div class="detail-item"><span class="label">Start Date</span><div class="value">${proj.start}</div></div>
        <div class="detail-item"><span class="label">End Date</span><div class="value">${proj.end}</div></div>
        <div class="detail-item detail-full"><span class="label">Description</span><div class="value">${proj.desc}</div></div>
        <div class="detail-item detail-full"><span class="label">Location</span><div class="value">${proj.district}, ${proj.taluka}, ${proj.village} - ${proj.pincode}</div></div>
        <div class="detail-item detail-full"><span class="label">MLA</span><div class="value">${proj.mla} (${proj.party}) · ${proj.constituency}</div></div>
        <div class="detail-item detail-full"><span class="label">Funding</span><div class="value">Total: ₹${(proj.fundTotal/10000000).toFixed(2)}Cr | Used: ₹${(proj.fundUsed/10000000).toFixed(2)}Cr | Remaining: ₹${((proj.fundTotal - proj.fundUsed)/10000000).toFixed(2)}Cr</div></div>
        <div class="detail-item detail-full"><span class="label">Progress</span><div class="value">${proj.progress}% (Physical) · ${Math.round((proj.fundUsed/proj.fundTotal)*100)}% (Financial)</div></div>
        <div class="detail-item detail-full"><span class="label">Feedback</span><div class="value">⭐ ${avg.toFixed(1)} / 5 (${total} reviews)</div></div>
        <div class="detail-timeline"><span class="label" style="width:100%;font-size:0.6rem;text-transform:uppercase;color:#5B6F87;">Timeline</span>${timelineHtml}</div>
        <div class="detail-item detail-full"><span class="label">Documents</span><div class="value" style="display:flex;gap:6px;flex-wrap:wrap;">${proj.documents.map(d => `<span style="background:#E9EEF6;padding:2px 10px;border-radius:40px;font-size:0.65rem;"><i class="fas ${d.icon}"></i> ${d.name}</span>`).join('')}</div></div>
      `;
      detailModal.classList.add('active');
    }

    closeDetail.addEventListener('click', () => detailModal.classList.remove('active'));
    detailModal.addEventListener('click', (e) => { if (e.target === detailModal) detailModal.classList.remove('active'); });

    function openFeedbackModal() {
      feedbackModal.classList.add('active');
      document.getElementById('fbName').value = '';
      document.getElementById('fbDesc').value = '';
      document.getElementById('fbCategory').value = 'Road Quality';
      document.getElementById('fbRating').value = 5;
      selectedImages = [];
      document.getElementById('imagePreviewArea').innerHTML = '';
      document.getElementById('fbImages').value = '';
      updateStarHighlight(5);
    }

    function closeFeedbackModal() {
      feedbackModal.classList.remove('active');
    }

    const starContainer = document.getElementById('starRating');
    starContainer.addEventListener('click', (e) => {
      const star = e.target.closest('i');
      if (!star) return;
      const val = parseInt(star.dataset.val);
      document.getElementById('fbRating').value = val;
      updateStarHighlight(val);
    });

    function updateStarHighlight(val) {
      const stars = starContainer.querySelectorAll('i');
      stars.forEach((s, i) => {
        s.classList.toggle('active', i < val);
      });
    }

    document.getElementById('fbImages').addEventListener('change', function(e) {
      const files = Array.from(e.target.files);
      files.forEach(file => {
        const reader = new FileReader();
        reader.onload = (ev) => {
          selectedImages.push(ev.target.result);
          renderImagePreviews();
        };
        reader.readAsDataURL(file);
      });
      this.value = '';
    });

    function renderImagePreviews() {
      const area = document.getElementById('imagePreviewArea');
      area.innerHTML = selectedImages.map((src, idx) =>
        `<div class="preview-thumb"><img src="${src}" /><span class="remove-img" data-idx="${idx}">×</span></div>`
      ).join('');
      area.querySelectorAll('.remove-img').forEach(el => {
        el.addEventListener('click', function() {
          const idx = parseInt(this.dataset.idx);
          selectedImages.splice(idx, 1);
          renderImagePreviews();
        });
      });
    }

    submitFeedback.addEventListener('click', function() {
      const name = document.getElementById('fbName').value.trim();
      const rating = parseInt(document.getElementById('fbRating').value) || 5;
      const category = document.getElementById('fbCategory').value;
      const desc = document.getElementById('fbDesc').value.trim();

      if (!name || !desc) {
        alert('Please fill name and description.');
        return;
      }

      if (!currentProjectId) {
        alert('Project not selected.');
        return;
      }

      const fbObj = {
        name,
        rating,
        category,
        desc,
        images: selectedImages.slice(),
        date: new Date().toLocaleDateString('en-IN')
      };

      if (!feedbackStore[currentProjectId]) {
        feedbackStore[currentProjectId] = { list: [] };
      }
      feedbackStore[currentProjectId].list.push(fbObj);

      const list = feedbackStore[currentProjectId].list;
      const avg = list.reduce((acc, f) => acc + f.rating, 0) / list.length;
      feedbackStore[currentProjectId].avgRating = Math.round(avg * 10) / 10;

      closeFeedbackModal();
      toast.textContent = '✅ Thank you for your feedback.';
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 2500);

      const status = document.getElementById('statusFilter').value;
      const cat = document.getElementById('categoryFilter').value;
      const search = document.getElementById('globalSearch').value;
      renderProjects(status, cat, search);
    });

    closeFeedback.addEventListener('click', closeFeedbackModal);
    cancelFeedback.addEventListener('click', closeFeedbackModal);
    feedbackModal.addEventListener('click', (e) => { if (e.target === feedbackModal) closeFeedbackModal(); });

    function openLightbox(src) {
      lightboxImg.src = src;
      lightbox.classList.add('active');
    }
    closeLightbox.addEventListener('click', () => lightbox.classList.remove('active'));
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) lightbox.classList.remove('active'); });

    document.getElementById('statusFilter').addEventListener('change', applyFilters);
    document.getElementById('categoryFilter').addEventListener('change', applyFilters);
    document.getElementById('globalSearch').addEventListener('input', applyFilters);

    function applyFilters() {
      const status = document.getElementById('statusFilter').value;
      const cat = document.getElementById('categoryFilter').value;
      const search = document.getElementById('globalSearch').value;
      renderProjects(status, cat, search);
    }

    renderProjects('all', 'all', '');
  })();
</script>
  <script src="<?= base_url('assets/user/js/navbar.js') ?>"></script>
</body>
</html>