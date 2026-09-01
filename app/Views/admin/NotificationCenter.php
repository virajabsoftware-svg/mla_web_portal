<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/user/images/LOGO.png') ?>">
    <!-- Existing CSS dependencies (preserved) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
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
/* PREMIUM NOTIFICATION CENTER - FULL DESKTOP OPTIMIZED
   White + Beige + Gold Theme | 100% Desktop Viewport Ready
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
    --success: #10B981;
    --warning: #F59E0B;
    --danger: #EF4444;
    --info: #3B82F6;
    --purple: #8B5CF6;
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
    background: linear-gradient(145deg, #faf6ed 0%, #fef8f0 100%);
    font-family: 'Playfair Display', 'Georgia', serif;
    color: #2c2418;
    min-height: 100vh;
    padding: 1.5rem 2rem;
    overflow-x: hidden;
}

.notification-wrapper {
    width: 100%;
    max-width: 100%;
    padding: 0;
}

/* ===================================================== */
/* BOOTSTRAP OVERRIDES - FULL WIDTH */
/* ===================================================== */

.container-fluid {
    width: 100% !important;
    max-width: 100% !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}

.container-fluid .row {
    width: 100% !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    display: flex !important;
    flex-wrap: wrap !important;
}

.container-fluid .row [class*="col-"] {
    padding-left: 16px !important;
    padding-right: 16px !important;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 10px;
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

/* ===================================================== */
/* NOTIFICATION SIDEBAR */
/* ===================================================== */

.notification-sidebar {
    background: rgba(255, 252, 242, 0.96);
    backdrop-filter: blur(16px);
    border-radius: var(--radius-xxl);
    border: 1px solid rgba(212, 175, 55, 0.5);
    box-shadow: var(--shadow-gold);
    padding: 28px 24px;
    transition: all var(--transition-base);
    height: 100%;
    animation: fadeInLeft 0.5s ease;
}

.notification-sidebar:hover {
    box-shadow: var(--shadow-gold-lg);
    border-color: var(--gold);
    transform: translateY(-2px);
}

@keyframes fadeInLeft {
    from { opacity: 0; transform: translateX(-25px); }
    to { opacity: 1; transform: translateX(0); }
}

.sidebar-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    font-size: 22px;
    background: linear-gradient(135deg, #b37b2e, var(--gold-dark), #d4af37);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    margin-bottom: 24px;
    padding-bottom: 14px;
    border-bottom: 2px solid rgba(212, 175, 55, 0.3);
    position: relative;
    display: flex;
    align-items: center;
    gap: 10px;
}

.sidebar-title::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    border-radius: 3px;
}

.sidebar-title i {
    color: var(--gold-dark);
    font-size: 24px;
}

/* ===================================================== */
/* NOTIFICATION MENU */
/* ===================================================== */

.notification-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.notification-menu li {
    padding: 14px 18px;
    margin-bottom: 8px;
    border-radius: var(--radius-lg);
    cursor: pointer;
    transition: all var(--transition-base);
    font-weight: 600;
    color: #5a4a32;
    display: flex;
    align-items: center;
    gap: 14px;
    position: relative;
    overflow: hidden;
    font-size: 15px;
}

.notification-menu li::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -60%;
    width: 200%;
    height: 200%;
    background: linear-gradient(115deg, transparent 10%, rgba(212, 175, 55, 0.12) 40%, transparent 60%);
    transform: rotate(25deg);
    transition: transform 0.5s ease;
    opacity: 0;
    pointer-events: none;
}

.notification-menu li:hover::after {
    opacity: 1;
    transform: rotate(25deg) translateX(50%);
}

.notification-menu li:hover {
    background: linear-gradient(90deg, rgba(212, 175, 55, 0.12), rgba(212, 175, 55, 0.05));
    color: var(--gold-dark);
    transform: translateX(6px);
}

.notification-menu li.active {
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    color: white;
    box-shadow: var(--shadow-gold);
}

.notification-menu li i {
    width: 28px;
    font-size: 18px;
    text-align: center;
    transition: transform var(--transition-fast);
}

.notification-menu li:hover i {
    transform: scale(1.1);
}

.notification-menu li .badge {
    background: rgba(212, 175, 55, 0.2) !important;
    color: var(--gold-dark) !important;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 40px;
    margin-left: auto;
    font-size: 12px;
}

.notification-menu li.active .badge {
    background: rgba(255, 255, 255, 0.25) !important;
    color: white !important;
}

/* ===================================================== */
/* NOTIFICATION FEED */
/* ===================================================== */

.notification-feed {
    background: rgba(255, 252, 242, 0.96);
    backdrop-filter: blur(16px);
    border-radius: var(--radius-xxl);
    border: 1px solid rgba(212, 175, 55, 0.5);
    box-shadow: var(--shadow-gold);
    overflow: hidden;
    transition: all var(--transition-base);
    animation: fadeInRight 0.5s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.notification-feed:hover {
    box-shadow: var(--shadow-gold-lg);
    border-color: var(--gold);
}

@keyframes fadeInRight {
    from { opacity: 0; transform: translateX(25px); }
    to { opacity: 1; transform: translateX(0); }
}

/* ===================================================== */
/* FEED HEADER */
/* ===================================================== */

.feed-header {
    padding: 22px 28px;
    background: linear-gradient(135deg, var(--gold-dark), var(--gold), var(--gold-light));
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.feed-header h4 {
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    color: white;
    margin: 0;
    font-size: 22px;
}

.feed-header h4 i {
    margin-right: 12px;
    font-size: 24px;
}

.today-badge {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(8px);
    padding: 8px 20px;
    border-radius: 60px;
    font-size: 13px;
    font-weight: 700;
    color: white;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* ===================================================== */
/* ACTIVITY CARDS */
/* ===================================================== */

#notificationsList {
    flex: 1;
    overflow-y: auto;
    max-height: 500px;
}

#notificationsList::-webkit-scrollbar {
    width: 8px;
}

.activity-card {
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 20px 28px;
    border-bottom: 1px solid rgba(212, 175, 55, 0.12);
    transition: all var(--transition-base);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.activity-card::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -60%;
    width: 200%;
    height: 200%;
    background: linear-gradient(115deg, transparent 10%, rgba(255, 255, 255, 0.18) 40%, transparent 60%);
    transform: rotate(25deg);
    transition: transform 0.6s ease;
    opacity: 0;
    pointer-events: none;
}

.activity-card:hover::after {
    opacity: 1;
    transform: rotate(25deg) translateX(50%);
}

.activity-card:hover {
    transform: translateX(6px);
    background: linear-gradient(90deg, rgba(212, 175, 55, 0.08), rgba(212, 175, 55, 0.02));
}

.activity-card:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    transition: all var(--transition-base);
    flex-shrink: 0;
}

.activity-card:hover .activity-icon {
    transform: scale(1.05);
}

/* Icon Variants */
.activity-card.complaint .activity-icon {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.15), rgba(239, 68, 68, 0.05));
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.12);
}
.activity-card.work .activity-icon {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(59, 130, 246, 0.05));
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
}
.activity-card.rating .activity-icon {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.18), rgba(212, 175, 55, 0.08));
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
}
.activity-card.survey .activity-icon {
    background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(139, 92, 246, 0.05));
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.12);
}
.activity-card.media .activity-icon {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(16, 185, 129, 0.05));
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
}
.activity-card.alert .activity-icon {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(245, 158, 11, 0.05));
    box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.12);
}
.activity-card.mla .activity-icon {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(59, 130, 246, 0.05));
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
}
.activity-card.voter .activity-icon {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(16, 185, 129, 0.05));
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
}

.activity-content {
    flex: 1;
}

.activity-content h6 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    color: #2c2418;
    margin-bottom: 6px;
    font-size: 17px;
    transition: color 0.2s ease;
}

.activity-card:hover .activity-content h6 {
    color: var(--gold-dark);
}

.activity-content p {
    color: #6b5a48;
    font-size: 14px;
    margin-bottom: 6px;
    line-height: 1.45;
}

.activity-content span {
    color: #9b8a72;
    font-size: 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

/* ===================================================== */
/* EMPTY STATE */
/* ===================================================== */

.empty-feed {
    text-align: center;
    padding: 60px 30px;
}

.empty-feed i {
    font-size: 64px;
    color: var(--beige-dark);
    margin-bottom: 20px;
}

.empty-feed h6 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 18px;
    color: #6b5a48;
}

/* ===================================================== */
/* FOOTER */
/* ===================================================== */

.footer {
    background: transparent;
    text-align: center;
    padding: 24px 0 16px;
    margin-top: 24px;
    border-top: 1px solid rgba(212, 175, 55, 0.2);
}

.footer p {
    color: #8a7a64;
    font-size: 13px;
    margin: 0;
}

.footer a {
    color: var(--gold-dark);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
}

.footer a:hover {
    color: var(--gold);
    text-decoration: underline;
}

/* ===================================================== */
/* TOAST NOTIFICATION */
/* ===================================================== */

.toast-notification {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: linear-gradient(135deg, var(--gold), var(--gold-dark));
    color: white;
    padding: 14px 28px;
    border-radius: 60px;
    font-size: 14px;
    font-weight: 600;
    z-index: 1000;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
    pointer-events: none;
    box-shadow: var(--shadow-gold-lg);
}

.toast-notification.show {
    opacity: 1;
    transform: translateY(0);
}

/* ===================================================== */
/* RESPONSIVE BREAKPOINTS - CLEAN & WORKING */
/* ===================================================== */

/* Desktop: Sidebar 280px, Feed takes remaining space */
@media (min-width: 992px) {
    .col-lg-3 {
        flex: 0 0 280px !important;
        max-width: 280px !important;
    }
    
    .col-lg-9 {
        flex: 1 !important;
        max-width: calc(100% - 280px) !important;
    }
}

/* Large Desktop: Wider sidebar */
@media (min-width: 1400px) {
    body {
        padding: 2rem 3rem;
    }
    
    .col-lg-3 {
        flex: 0 0 320px !important;
        max-width: 320px !important;
    }
    
    .col-lg-9 {
        flex: 1 !important;
        max-width: calc(100% - 320px) !important;
    }
    
    .notification-sidebar {
        padding: 36px 30px;
    }
    .sidebar-title {
        font-size: 24px;
    }
    .activity-card {
        padding: 24px 36px;
        gap: 28px;
    }
    .activity-icon {
        width: 72px;
        height: 72px;
        font-size: 32px;
    }
    .activity-content h6 {
        font-size: 18px;
    }
    .activity-content p {
        font-size: 15px;
    }
    #notificationsList {
        max-height: 650px;
    }
}

/* Standard Desktop (1200px to 1399px) */
@media (min-width: 1200px) and (max-width: 1399px) {
    body {
        padding: 1.75rem 2.5rem;
    }
    .notification-sidebar {
        padding: 32px 26px;
    }
    .activity-card {
        padding: 22px 32px;
        gap: 24px;
    }
    .activity-icon {
        width: 68px;
        height: 68px;
        font-size: 30px;
    }
}

/* Desktop / Laptop (992px to 1199px) */
@media (min-width: 992px) and (max-width: 1199px) {
    body {
        padding: 1.5rem 2rem;
    }
    .notification-sidebar {
        padding: 28px 22px;
    }
    .activity-card {
        padding: 18px 26px;
        gap: 20px;
    }
    .activity-icon {
        width: 60px;
        height: 60px;
        font-size: 26px;
    }
    .activity-content h6 {
        font-size: 16px;
    }
}

/* Tablet: Stack columns vertically */
@media (max-width: 991px) {
    body {
        padding: 1.25rem 1.5rem;
    }
    
    .col-lg-3,
    .col-lg-9 {
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }
    
    .notification-sidebar {
        margin-bottom: 24px;
        padding: 24px 20px;
        height: auto;
    }
    .notification-feed {
        height: auto;
    }
    .sidebar-title {
        font-size: 20px;
    }
    .notification-menu li {
        padding: 12px 16px;
        font-size: 14px;
    }
    .feed-header {
        padding: 18px 24px;
        flex-direction: column;
        align-items: flex-start;
    }
    .feed-header h4 {
        font-size: 20px;
    }
    .today-badge {
        padding: 6px 16px;
        font-size: 12px;
    }
    .activity-card {
        padding: 16px 22px;
        gap: 18px;
    }
    .activity-icon {
        width: 52px;
        height: 52px;
        font-size: 24px;
    }
    .activity-content h6 {
        font-size: 15px;
    }
    .activity-content p {
        font-size: 13px;
    }
    .toast-notification {
        bottom: 20px;
        right: 20px;
        left: 20px;
        text-align: center;
        padding: 12px 20px;
    }
}

/* Mobile */
@media (max-width: 767px) {
    body {
        padding: 1rem;
    }
    
    .container-fluid .row [class*="col-"] {
        padding-left: 12px !important;
        padding-right: 12px !important;
    }
    
    .notification-sidebar {
        padding: 20px 16px;
        height: auto;
    }
    .notification-feed {
        height: auto;
    }
    .activity-card {
        padding: 14px 18px;
        gap: 14px;
    }
    .activity-icon {
        width: 48px;
        height: 48px;
        font-size: 22px;
    }
    .activity-content h6 {
        font-size: 14px;
    }
    .footer {
        padding: 20px 0 12px;
    }
    .footer p {
        font-size: 11px;
    }
}

/* ===================================================== */
/* ANIMATIONS & UTILITIES */
/* ===================================================== */

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4);
    }
    70% {
        box-shadow: 0 0 0 8px rgba(212, 175, 55, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
    }
}

.pulse {
    animation: pulse 1.5s ease-in-out;
}

.activity-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
}

/* Fix parent containers */
#content,
.full_container,
.inner_container {
    width: 100% !important;
    max-width: 100% !important;
    overflow-x: visible !important;
}</style>
</head>

<body class="inner_page widgets">
   <?php include "common/header.php"?>  
               
             <div class="container-fluid mt-4">
    <div class="row">
        <!-- Categories Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="notification-sidebar">
                <h5 class="sidebar-title">
                    <i class="fas fa-layer-group me-2"></i>
                    Categories
                </h5>
                <ul class="notification-menu">
                    <li class="active" data-category="all">
                        <i class="fas fa-border-all"></i>
                        All
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">12</span>
                    </li>
                    <li data-category="mla">
                        <i class="fas fa-user-tie"></i>
                        MLA
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">3</span>
                    </li>
                    <li data-category="voter">
                        <i class="fas fa-users"></i>
                        Voter
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">2</span>
                    </li>
                    <li data-category="complaint">
                        <i class="fas fa-exclamation-circle"></i>
                        Complaints
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">4</span>
                    </li>
                    <li data-category="work">
                        <i class="fas fa-road"></i>
                        Works
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">2</span>
                    </li>
                    <li data-category="survey">
                        <i class="fas fa-poll"></i>
                        Surveys
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">1</span>
                    </li>
                    <li data-category="report">
                        <i class="fas fa-file-alt"></i>
                        Reports
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">0</span>
                    </li>
                    <li data-category="rating">
                        <i class="fas fa-star"></i>
                        Ratings
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">1</span>
                    </li>
                    <li data-category="alert">
                        <i class="fas fa-bell"></i>
                        Alerts
                        <span class="badge" style="margin-left: auto; background: rgba(212,175,55,0.2); color: var(--gold-dark);">2</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Notification Feed -->
        <div class="col-lg-9">
            <div class="notification-feed" id="notificationFeed">
                <div class="feed-header">
                    <h4>
                        <i class="fas fa-bell"></i>
                        Activity Feed
                    </h4>
                    <span class="today-badge">
                        <i class="far fa-calendar-alt me-1"></i> TODAY
                    </span>
                </div>

                <!-- Notification items will be dynamically filtered -->
                <div id="notificationsList">
                    <div class="activity-card complaint" data-category="complaint">
                        <div class="activity-icon">
                            🚨
                        </div>
                        <div class="activity-content">
                            <h6>New Complaint Submitted</h6>
                            <p>Rahul Patil reported Road Damage</p>
                            <span><i class="far fa-clock"></i> 2 min ago</span>
                        </div>
                    </div>

                    <div class="activity-card work" data-category="work">
                        <div class="activity-icon">
                            📈
                        </div>
                        <div class="activity-content">
                            <h6>Work Progress Updated</h6>
                            <p>Road Development Project reached 75%</p>
                            <span><i class="far fa-clock"></i> 5 min ago</span>
                        </div>
                    </div>

                    <div class="activity-card rating" data-category="rating">
                        <div class="activity-icon">
                            ⭐
                        </div>
                        <div class="activity-content">
                            <h6>MLA Rating Submitted</h6>
                            <p>5 Star rating submitted</p>
                            <span><i class="far fa-clock"></i> 10 min ago</span>
                        </div>
                    </div>

                    <div class="activity-card survey" data-category="survey">
                        <div class="activity-icon">
                            📋
                        </div>
                        <div class="activity-content">
                            <h6>Survey Response Received</h6>
                            <p>Road Development Survey completed</p>
                            <span><i class="far fa-clock"></i> 15 min ago</span>
                        </div>
                    </div>

                    <div class="activity-card media" data-category="work">
                        <div class="activity-icon">
                            🖼️
                        </div>
                        <div class="activity-content">
                            <h6>Work Images Uploaded</h6>
                            <p>5 images added to Road Project</p>
                            <span><i class="far fa-clock"></i> 20 min ago</span>
                        </div>
                    </div>

                    <div class="activity-card complaint" data-category="complaint">
                        <div class="activity-icon">
                            🚨
                        </div>
                        <div class="activity-content">
                            <h6>Escalated Complaint</h6>
                            <p>Water supply issue escalated to Level 2</p>
                            <span><i class="far fa-clock"></i> 35 min ago</span>
                        </div>
                    </div>

                    <div class="activity-card alert" data-category="alert">
                        <div class="activity-icon">
                            ⚠️
                        </div>
                        <div class="activity-content">
                            <h6>System Alert</h6>
                            <p>New security update available</p>
                            <span><i class="far fa-clock"></i> 1 hour ago</span>
                        </div>
                    </div>

                    <div class="activity-card mla" data-category="mla">
                        <div class="activity-icon">
                            👤
                        </div>
                        <div class="activity-content">
                            <h6>MLA Profile Updated</h6>
                            <p>MLA Eknath Shinde updated contact information</p>
                            <span><i class="far fa-clock"></i> 2 hours ago</span>
                        </div>
                    </div>

                    <div class="activity-card voter" data-category="voter">
                        <div class="activity-icon">
                            🗳️
                        </div>
                        <div class="activity-content">
                            <h6>New Voter Registration</h6>
                            <p>245 new voters registered in Satara district</p>
                            <span><i class="far fa-clock"></i> 3 hours ago</span>
                        </div>
                    </div>
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
    <!-- jQuery -->
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
    // =====================================================
    // CATEGORY FILTERING FUNCTIONALITY
    // =====================================================
    
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.notification-menu li');
        const notificationCards = document.querySelectorAll('.activity-card');
        const notificationsContainer = document.getElementById('notificationsList');
        
        // Add click handlers to category menu items
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all menu items
                menuItems.forEach(menu => menu.classList.remove('active'));
                // Add active class to clicked item
                this.classList.add('active');
                
                // Get selected category
                const selectedCategory = this.getAttribute('data-category');
                
                // Filter notifications
                let visibleCount = 0;
                notificationCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    
                    if (selectedCategory === 'all' || cardCategory === selectedCategory) {
                        card.style.display = 'flex';
                        visibleCount++;
                        // Add animation
                        card.style.animation = 'fadeInRight 0.3s ease';
                        setTimeout(() => {
                            card.style.animation = '';
                        }, 300);
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Update badge count in the active category
                updateBadgeCounts();
                
                // Show empty state if no notifications
                checkEmptyState(visibleCount);
                
                // Show toast notification
                const categoryName = this.querySelector('span:first-child')?.innerText || this.innerText.split('\\n')[0];
                showToast(`Showing ${visibleCount} notification(s) in ${categoryName}`);
            });
        });
        
        // Update badge counts based on actual visible notifications
        function updateBadgeCounts() {
            const categories = ['all', 'mla', 'voter', 'complaint', 'work', 'survey', 'report', 'rating', 'alert'];
            categories.forEach(cat => {
                const count = document.querySelectorAll(`.activity-card[data-category="${cat}"]`).length;
                const menuItem = document.querySelector(`.notification-menu li[data-category="${cat}"]`);
                if (menuItem && cat !== 'all') {
                    const badge = menuItem.querySelector('.badge');
                    if (badge) {
                        badge.textContent = count;
                        if (count === 0) {
                            badge.style.opacity = '0.5';
                        } else {
                            badge.style.opacity = '1';
                        }
                    }
                }
            });
        }
        
        // Check and show empty state
        function checkEmptyState(visibleCount) {
            const existingEmpty = document.querySelector('.empty-feed');
            if (visibleCount === 0) {
                if (!existingEmpty) {
                    const emptyDiv = document.createElement('div');
                    emptyDiv.className = 'empty-feed';
                    emptyDiv.innerHTML = `
                        <i class="fas fa-bell-slash"></i>
                        <h6>No notifications in this category</h6>
                        <p class="text-muted small">Check back later for updates</p>
                    `;
                    notificationsContainer.appendChild(emptyDiv);
                }
            } else {
                if (existingEmpty) {
                    existingEmpty.remove();
                }
            }
        }
        
        // Add click handlers to individual notifications
        notificationCards.forEach(card => {
            card.addEventListener('click', function() {
                const title = this.querySelector('h6')?.innerText || 'Notification';
                const message = this.querySelector('p')?.innerText || '';
                showToast(`📢 ${title}: ${message}`);
                
                // Remove pulse class if exists
                this.classList.remove('pulse');
                
                // Visual feedback
                this.style.opacity = '0.7';
                setTimeout(() => {
                    this.style.opacity = '1';
                }, 300);
            });
        });
        
        // Add hover ripple effect to menu items
        function addRippleEffect() {
            const menuItemsList = document.querySelectorAll('.notification-menu li');
            menuItemsList.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    ripple.style.position = 'absolute';
                    ripple.style.borderRadius = '50%';
                    ripple.style.backgroundColor = 'rgba(212, 175, 55, 0.3)';
                    ripple.style.width = '0';
                    ripple.style.height = '0';
                    ripple.style.transform = 'translate(-50%, -50%)';
                    ripple.style.left = e.clientX - this.getBoundingClientRect().left + 'px';
                    ripple.style.top = e.clientY - this.getBoundingClientRect().top + 'px';
                    ripple.style.pointerEvents = 'none';
                    ripple.style.transition = 'width 0.4s ease, height 0.4s ease, opacity 0.4s ease';
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    setTimeout(() => {
                        ripple.style.width = '200px';
                        ripple.style.height = '200px';
                        ripple.style.opacity = '0';
                    }, 10);
                    setTimeout(() => ripple.remove(), 400);
                });
            });
        }
        
        // Initialize
        updateBadgeCounts();
        addRippleEffect();
        
        // Add pulse animation to first notification
        const firstNotif = document.querySelector('.activity-card');
        if (firstNotif) {
            firstNotif.classList.add('pulse');
        }
    });
    
    // Toast notification function
    function showToast(message) {
        const existingToast = document.querySelector('.toast-notification');
        if (existingToast) {
            existingToast.remove();
        }
        
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = `<i class="fas fa-bell me-2"></i> ${message}`;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.add('show');
        }, 10);
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 2500);
    }
</script>
    <script src="<?= base_url('assets/admin/js/header.js') ?>"></script>
</body>

</html>