<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA White-Gold Executive Dashboard</title>
    <!-- Existing CSS dependencies (preserved) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css') ?>">
    <style>
      /* ========== TRANSPARENT FLOATING FOOTER ========== */

.footer {
    background: rgba(255, 255, 255, 0.08) !important;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px;

    padding: 1rem 2rem !important;

    text-align: center;

    margin: 2rem 20px 25px 20px !important; /* bottom pasun var */
    
    box-shadow:
        0 8px 32px rgba(0, 0, 0, 0.12),
        inset 0 1px 0 rgba(255, 255, 255, 0.15);

    position: relative;
    overflow: hidden;
}

.footer::before{
    display:none;
}

.footer p{
    margin:0;
    color:#666 !important;
    font-size:0.9rem;
    font-weight:500;
}

.footer a{
    color:#b8860b !important;
    text-decoration:none;
    font-weight:600;
}

.footer a:hover{
    color:#d4af37 !important;
}

/* Footer always content chya khali */
.container-fluid.cream-container{
    display:flex;
    flex-direction:column;
    min-height:100vh;
}

.footer{
    margin-top:auto !important;
}

/* Mobile */
@media (max-width:768px){
    .footer{
        margin:1.5rem 15px 20px 15px !important;
        padding:0.9rem 1rem !important;
    }

    .footer p{
        font-size:0.8rem;
    }
}
    </style>
</head>
<body class="inner_page widgets">
<div class="full_container">
    <div class="inner_container">
        <!-- SIDEBAR - Ultra-Premium White Gold Floating Navigation -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <!-- Logo removed as per existing HTML - preserving original structure -->
                </div>
                <div class="sidebar_user_info">
                    <div class="user_profle_side">
                        <div class="user_img">
                            <img class="img-responsive" src="images/layout_img/user_img.jpg" alt="User" />
                        </div>
                        <div class="user_info">
                            <h6>ADMIN</h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>Governance Panel</h4>
                <ul class="list-unstyled components">
                        <li><a href="<?= base_url('admin/mla-management') ?>" data-tooltip="MLA Management"><i class="fa fa-users"></i><span>MLA Management</span></a></li>
                        <li><a href="<?= base_url('admin/constituency-management') ?>" data-tooltip="Constituency"><i class="fa fa-map-marker"></i><span>Constituency Management</span></a></li>
                        <li><a href="<?= base_url('admin/complaint-management') ?>" data-tooltip="Complaints"><i class="fa fa-exclamation-circle"></i><span>Complaint Management</span></a></li>
                        <li><a href="<?= base_url('admin/survey-management') ?>" data-tooltip="Surveys"><i class="fa fa-bar-chart"></i><span>Survey Management</span></a></li>
                        <li><a href="<?= base_url('admin/media-library') ?>" data-tooltip="Media"><i class="fa fa-picture-o"></i><span>Media Library</span></a></li>
                        <li><a href="<?= base_url('admin/feedback-dashboard') ?>" data-tooltip="Feedback"><i class="fa fa-comments"></i><span>Feedback Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/activity-logs') ?>" data-tooltip="Logs"><i class="fa fa-history"></i><span>Activity Logs</span></a></li>
                        <li><a href="<?= base_url('admin/voter-management') ?>" data-tooltip="Voters"><i class="fa fa-user"></i><span>Voter Management</span></a></li>
                    </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        
        <div id="content">
            <!-- TOPBAR - Executive White-Gold Glass Pill -->
            <div class="topbar" id="premiumTopbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full d-flex align-items-center w-100">
                        <button type="button" id="sidebarCollapse" class="sidebar-toggle-gold-premium"><i class="fa fa-bars"></i></button>
                        <div class="logo_section mr-3 d-lg-none d-block">
                            <a href="index.html"><img class="img-responsive" src="images/logo/MLA LOGO.png" alt="#" style="max-height: 44px;" /></a>
                        </div>
                        <!-- Premium Gold Glass Search Bar -->
                        <div class="search-gold-exec">
                            <i class="fa fa-search"></i>
                            <input type="text" placeholder="Search MLA, constituency, reports..." id="globalSearch">
                        </div>
                        <div class="right_topbar ml-auto">
                            <div class="icon_info d-flex align-items-center">
                                <ul class="d-flex align-items-center mb-0">
                                    <!-- Live Digital Clock + Date -->
                                    <li><div class="clock-luxury-gold"><div class="clock-time" id="liveClock">--:--:--</div><div class="clock-date" id="liveDate">Loading...</div></div></li>
                                    <!-- Premium Notification Bell -->
                                    <li><a href="#" class="notif-gold-luxury"><i class="fa fa-bell-o"></i><span class="notif-badge-premium">2</span></a></li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" width="38" /><span class="name_user">ADMIN</span></a>
                                        <div class="dropdown-menu dropdown-menu-gold-luxury">
                                            <a class="dropdown-item" href="profile.html">My Profile</a>
                                            <a class="dropdown-item" href="settings.html">Settings</a>
                                            <a class="dropdown-item" href="help.html">Help</a>
                                            <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- EXISTING CONTENT AREA (COMPLETELY PRESERVED - NO MODIFICATIONS) -->
            <div class="content-wrapper" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background: rgba(244,244,244,0.88); backdrop-filter: blur(6px); border-radius: 32px; border: 1px solid rgba(242,196,90,0.35); box-shadow: 0 12px 28px -12px rgba(0,0,0,0.06);">
                            <div class="card-body">
                                <h3 style="color: #151515;">🏛️ MLA White-Gold Executive Command Center</h3>
                                <p style="color:#8B5722;">Ultra-premium VisionOS-inspired Glass UI. Floating gold-accent sidebar, animated active indicator, staggered menu, live clock, pulse notification, collapsible luxury navigation.</p>
                                <div class="alert" style="background: rgba(242,196,90,0.12); border-radius: 24px; color:#151515; border:none;">✨ White-Gold Government Theme | Premium active left bar | Magnetic hover | Glassmorphism topbar with scroll shadow</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Preserved original dashboard cards (NO CHANGES) -->
                <div class="row mt-4">
                    <div class="col-md-4"><div class="card p-3" style="background: white; border-radius: 24px; border: 1px solid #F2C45A20;">🏛️ Constituency Analytics</div></div>
                    <div class="col-md-4"><div class="card p-3" style="background: white; border-radius: 24px;">✅ MLA Performance Index: 94%</div></div>
                    <div class="col-md-4"><div class="card p-3" style="background: white; border-radius: 24px;">🗳️ Voter Engagement +12%</div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="header.js"></script>
</body>
</html>