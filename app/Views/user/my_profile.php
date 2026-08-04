<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>GovTrack Aura | Premium Governance Dashboard</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
    <!-- Bootstrap 5 Grid & Utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #F4F2F5;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Color Scheme Variables - Lighter & Softer */
        :root {
            --soft-white: #F4F2F5;
            --lime-gold: #C3C848;
            --lime-gold-light: #D8DD7A;
            --olive-green: #6B8A22;
            --teal-blue: #225661;
            --teal-blue-light: #3A7A8A;
            --dark-olive: #454D28;
            --glass-bg: rgba(255, 255, 255, 0.95);
            --shadow-sm: 0 8px 20px rgba(0,0,0,0.04);
            --shadow-lift: 0 16px 32px -8px rgba(0,0,0,0.08);
            --transition-smooth: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* ============================================
           MAIN CONTENT - FIXED POSITIONING FOR SIDEBAR & TOPBAR
           ============================================ */
        .main-content {
            position: relative;
            min-height: 100vh;
            max-width: none;
            margin: 0;
            margin-left: 280px;
            margin-top: 70px;
            padding: 1.5rem 2rem;
            transition: margin-left 0.3s ease;
            overflow-x: hidden;
            height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .sidebar-collapsed .main-content,
        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        .main-content::-webkit-scrollbar {
            width: 6px;
        }
        .main-content::-webkit-scrollbar-track {
            background: #e8e8e8;
            border-radius: 10px;
        }
        .main-content::-webkit-scrollbar-thumb {
            background: var(--lime-gold-light);
            border-radius: 10px;
        }
        .main-content::-webkit-scrollbar-thumb:hover {
            background: var(--lime-gold);
        }

        /* Premium card base - Lighter hover effect */
        .premium-card {
            background: var(--glass-bg);
            backdrop-filter: blur(2px);
            border-radius: 28px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            border: 1px solid rgba(195,200,72,0.20);
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        /* Subtle gradient border - Light & Elegant */
        .premium-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(135deg, rgba(195,200,72,0.15), rgba(34,86,97,0.08), rgba(195,200,72,0.15));
            background-size: 200% 200%;
            border-radius: 29px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .premium-card:hover::before {
            opacity: 1;
            animation: gradientShiftLight 4s ease infinite;
        }

        @keyframes gradientShiftLight {
            0% { background-position: 0% 50%;}
            50% { background-position: 100% 50%;}
            100% { background-position: 0% 50%;}
        }

        /* Light lift effect - No dark shadows */
        .premium-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px -8px rgba(0,0,0,0.06), 0 0 0 1px rgba(195,200,72,0.15);
            transition: transform 0.25s ease, box-shadow 0.3s ease;
        }

        .fade-up {
            opacity: 0;
            transform: translateY(28px);
            animation: fadeUpSlide 0.6s forwards;
        }

        @keyframes fadeUpSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-1 { animation-delay: 0.05s; }

        .card-header-premium {
            background: linear-gradient(135deg, rgba(195,200,72,0.08), rgba(34,86,97,0.03));
            padding: 1rem 1.8rem;
            border-bottom: 1px solid rgba(195,200,72,0.15);
            border-radius: 28px 28px 0 0;
        }

        .card-header-premium h5 {
            color: var(--teal-blue);
            font-weight: 700;
            margin: 0;
            font-size: 1.1rem;
        }

        .badge-premium {
            background: var(--olive-green);
            color: white;
            padding: 6px 14px;
            border-radius: 60px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Value display - Lighter background */
        .value-display {
            background: rgba(195,200,72,0.06);
            padding: 10px 14px;
            border-radius: 16px;
            font-weight: 500;
            color: var(--dark-olive);
            font-size: 0.95rem;
            transition: all 0.2s;
            border: 1px solid rgba(195,200,72,0.08);
        }

        .value-display:hover {
            background: rgba(195,200,72,0.10);
            transform: translateX(3px);
            border-color: rgba(195,200,72,0.20);
        }

        .value-display-readonly {
            background: #f8f8f8;
            padding: 10px 14px;
            border-radius: 16px;
            font-weight: 500;
            color: #777;
            font-size: 0.95rem;
            border: 1px solid #ececec;
        }

        .info-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--dark-olive);
            opacity: 0.6;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .info-label i {
            color: var(--lime-gold);
            width: 18px;
        }

        /* Button - Light gold with soft glow */
        .btn-gold {
            background: linear-gradient(135deg, var(--lime-gold), #B5BA4A);
            border: none;
            padding: 10px 28px;
            border-radius: 40px;
            font-weight: 700;
            color: #2A3A2A;
            transition: all 0.25s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(195,200,72,0.20);
            cursor: pointer;
        }
        .btn-gold::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(115deg, rgba(255,255,255,0) 10%, rgba(255,255,240,0.4) 50%, rgba(255,255,255,0) 90%);
            transform: rotate(25deg);
            transition: all 0.6s;
            opacity: 0;
        }
        .btn-gold:hover::after {
            left: 100%;
            opacity: 1;
        }
        .btn-gold:hover {
            transform: translateY(-2px) scale(1.01);
            box-shadow: 0 8px 24px rgba(195,200,72,0.30);
            background: linear-gradient(135deg, #D0D55A, #B0B844);
        }
        .btn-gold:active {
            transform: scale(0.98);
        }

        .profile-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--lime-gold);
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            transition: var(--transition-smooth);
        }
        .profile-avatar-large:hover {
            transform: scale(1.03);
            border-color: var(--teal-blue-light);
            box-shadow: 0 12px 28px rgba(0,0,0,0.08);
        }

        .section-divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(195,200,72,0.25), transparent);
            margin: 1.5rem 0;
        }

        /* Footer - Light & Clean */
        .footer {
            position: relative;
            margin-top: 2rem;
            padding: 18px 25px;
            background: var(--glass-bg);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(195, 200, 72, 0.15);
            border-radius: 24px;
            box-shadow: var(--shadow-sm);
            text-align: center;
            overflow: hidden;
            transition: var(--transition-smooth);
        }
        .footer::before {
            content: "";
            position: absolute;
            inset: -1px;
            background: linear-gradient(135deg, rgba(195,200,72,0.10), rgba(34,86,97,0.05), rgba(195,200,72,0.10));
            background-size: 200% 200%;
            border-radius: 25px;
            z-index: -1;
            opacity: 0;
            transition: 0.5s ease;
        }
        .footer:hover::before {
            opacity: 1;
            animation: gradientShiftLight 4s ease infinite;
        }
        .footer:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px -8px rgba(0,0,0,0.06);
        }
        .footer p {
            margin: 0;
            color: var(--dark-olive);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.3px;
        }
        .footer a {
            color: var(--teal-blue);
            text-decoration: none;
            font-weight: 700;
            position: relative;
            transition: 0.3s ease;
        }
        .footer a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 0;
            height: 2px;
            background: var(--lime-gold);
            transition: 0.3s ease;
        }
        .footer a:hover {
            color: var(--olive-green);
        }
        .footer a:hover::after {
            width: 100%;
        }

        /* Edit Profile Modal - Clean & Light */
        .modal-content {
            border-radius: 24px;
            border: 1px solid rgba(195,200,72,0.15);
            box-shadow: 0 20px 40px -12px rgba(0,0,0,0.08);
        }
        .modal-header {
            border-bottom: 1px solid rgba(195,200,72,0.12);
            background: linear-gradient(135deg, rgba(195,200,72,0.05), rgba(34,86,97,0.02));
            border-radius: 24px 24px 0 0;
        }
        .modal-header h5 {
            color: var(--teal-blue);
            font-weight: 700;
        }
        .modal-footer {
            border-top: 1px solid rgba(195,200,72,0.12);
        }
        .modal-body .form-label {
            font-weight: 600;
            color: var(--teal-blue);
            font-size: 0.85rem;
        }
        .modal-body .form-control {
            border-radius: 12px;
            border: 1px solid rgba(195,200,72,0.25);
            padding: 10px 14px;
            transition: all 0.2s;
            background: #fafafa;
        }
        .modal-body .form-control:focus {
            border-color: var(--lime-gold);
            box-shadow: 0 0 0 3px rgba(195,200,72,0.12);
            background: white;
        }
        .modal-body .form-control:hover {
            border-color: rgba(195,200,72,0.4);
        }

        .btn-outline-secondary {
            border-radius: 40px;
            padding: 8px 24px;
            border-color: #ddd;
            color: #666;
            transition: all 0.2s;
        }
        .btn-outline-secondary:hover {
            background: #f5f5f5;
            border-color: #ccc;
        }

        /* Toast notification - Soft & Clean */
        .toast-notification {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: white;
            color: var(--dark-olive);
            padding: 14px 24px;
            border-radius: 16px;
            font-weight: 600;
            box-shadow: 0 12px 32px -8px rgba(0,0,0,0.08);
            z-index: 9999;
            transform: translateY(80px);
            opacity: 0;
            transition: all 0.4s ease;
            border-left: 4px solid var(--lime-gold);
            border: 1px solid rgba(195,200,72,0.15);
        }
        .toast-notification.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .main-content { padding: 1.25rem 1.5rem; }
        }
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 1.25rem;
                margin-left: 0;
            }
            body.sidebar-collapsed .main-content { margin-left: 0; }
            .profile-avatar-large { width: 90px; height: 90px; }
            .card-header-premium { padding: 0.875rem 1.2rem; }
            .card-header-premium h5 { font-size: 1rem; }
        }
        @media (max-width: 576px) {
            .main-content { padding: 0.75rem 0.85rem; }
            .profile-avatar-large { width: 75px; height: 75px; }
            .btn-gold { width: 100%; }
            .value-display { font-size: 0.85rem; padding: 8px 12px; }
            .info-label { font-size: 0.65rem; }
            .modal-dialog { margin: 0.5rem; }
        }
        @media (min-width: 1920px) {
            .main-content { padding: 2rem 2.5rem; }
        }

        body.sidebar-expanded .main-content { margin-left: 280px; }
        body.sidebar-collapsed .main-content { margin-left: 80px; }

        /* Profile header gradient - Light & Airy */
        .profile-header-bg {
            background: linear-gradient(135deg, rgba(195,200,72,0.06) 0%, rgba(34,86,97,0.04) 100%);
        }
    </style>
</head>

<body>
    <?php include "common/header.php"?>

    <!-- ============================================================
         INNER DASHBOARD CONTENT — my_profile.php
         Light & Premium Design
         ============================================================ -->
    <main class="main-content fade-page-transition">

        <div class="premium-card fade-up stagger-1" style="border-radius: 32px;">

            <!-- ============================================================
                 PROFILE HEADER - Light & Clean
                 ============================================================ -->
            <div class="profile-header-bg"
                 style="padding: 2rem 2rem 1.5rem 2rem;
                        border-bottom: 1px solid rgba(195,200,72,0.12);">

                <div class="row align-items-center">
                    <!-- Avatar -->
                    <div class="col-md-3 col-lg-2 text-center text-md-start mb-3 mb-md-0">
                        <div style="position: relative; display: inline-block;">
                            <img src="https://mockmind-api.uifaces.co/content/human/218.jpg"
                                 alt="Profile Photo"
                                 class="profile-avatar-large"
                                 id="profileAvatar">
                            <button class="btn btn-sm btn-light rounded-circle"
                                    style="position: absolute; bottom: 4px; right: 4px; width: 34px; height: 34px;
                                           border: 2px solid white; box-shadow: 0 4px 12px rgba(0,0,0,0.06);
                                           background: white; color: var(--teal-blue); font-size: 0.9rem;
                                           transition: var(--transition-smooth);"
                                    onclick="document.getElementById('photoUpload').click();">
                                <i class="fas fa-camera"></i>
                            </button>
                            <input type="file" id="photoUpload" accept="image/*" style="display:none;" onchange="updateProfilePhoto(event)">
                        </div>
                    </div>

                    <!-- Name & Details -->
                    <div class="col-md-6 col-lg-7 text-center text-md-start">
                        <h2 class="fw-bold" style="color: var(--teal-blue); letter-spacing: -0.5px;" id="displayFullName">Rahul Patil</h2>
                        <div class="d-flex flex-wrap align-items-center gap-3 mb-2">
                            <span style="background: rgba(195,200,72,0.08); padding: 0.3rem 1rem; border-radius: 40px; font-weight: 500; color: var(--dark-olive); font-size: 0.9rem;">
                                <i class="fas fa-id-card me-1" style="color: var(--lime-gold);"></i> <span id="displayVoterId">MH1234567890</span>
                            </span>
                            <span class="badge-premium" style="background: var(--teal-blue); padding: 0.3rem 1rem;">
                                <i class="fas fa-circle-check me-1"></i> Verified User
                            </span>
                        </div>
                        <div class="d-flex flex-wrap gap-3 text-muted" style="font-weight: 500; font-size: 0.95rem; color: var(--dark-olive); opacity: 0.7;">
                            <span><i class="fas fa-map-pin me-1" style="color: var(--lime-gold);"></i> <span id="displayDistrict">Satara</span></span>
                            <span><i class="fas fa-landmark me-1" style="color: var(--lime-gold);"></i> <span id="displayConstituency">Karad South</span></span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="col-md-3 col-lg-3 text-center text-md-end mt-3 mt-md-0">
                        <button class="btn-gold" style="padding: 0.6rem 1.8rem; font-size: 0.9rem; min-width: 140px;" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-user-edit me-2"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>

            <!-- ============================================================
                 BODY — All sections in one card
                 ============================================================ -->
            <div class="p-4 p-md-5">

                <!-- SECTION 1: Basic Information -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fas fa-user" style="color: var(--lime-gold); font-size: 1.2rem;"></i>
                        <h5 class="mb-0" style="color: var(--teal-blue); font-weight: 700;">Basic Information</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-id-card"></i> Voter ID</div>
                            <div class="value-display" id="voterIdValue">MH1234567890</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-calendar"></i> Date of Birth</div>
                            <div class="value-display" id="dobValue">15 August 2001</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-venus-mars"></i> Gender</div>
                            <div class="value-display" id="genderValue">Male</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-user"></i> Full Name</div>
                            <div class="value-display" id="fullNameValue">Rahul Patil</div>
                        </div>
                    </div>
                </div>

                <hr class="section-divider">

                <!-- SECTION 2: Account Information -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fas fa-envelope" style="color: var(--lime-gold); font-size: 1.2rem;"></i>
                        <h5 class="mb-0" style="color: var(--teal-blue); font-weight: 700;">Account Information</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-label"><i class="fas fa-envelope"></i> Email Address</div>
                            <div class="value-display" id="emailValue"><i class="fas fa-at me-1" style="color: var(--teal-blue); opacity: 0.6;"></i> rahul@gmail.com</div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-label"><i class="fas fa-phone"></i> Mobile Number</div>
                            <div class="value-display" id="mobileValue"><i class="fas fa-phone-alt me-1" style="color: var(--teal-blue); opacity: 0.6;"></i> 9876543210</div>
                        </div>
                    </div>
                </div>

                <hr class="section-divider">

                <!-- SECTION 3: Address Information -->
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fas fa-map-marker-alt" style="color: var(--lime-gold); font-size: 1.2rem;"></i>
                        <h5 class="mb-0" style="color: var(--teal-blue); font-weight: 700;">Address Information</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-map"></i> State</div>
                            <div class="value-display" id="stateValue">Maharashtra</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-location-dot"></i> District</div>
                            <div class="value-display" id="districtValue">Satara</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-landmark"></i> Assembly Constituency</div>
                            <div class="value-display" id="constituencyValue">Karad South</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-home"></i> Locality / Area</div>
                            <div class="value-display" id="localityValue">Malkapur</div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-label"><i class="fas fa-mailbox"></i> Pincode</div>
                            <div class="value-display" id="pincodeValue">415110</div>
                        </div>
                    </div>
                </div>

                <hr class="section-divider">

                <!-- SECTION 4: Assigned MLA Information (Read-Only) -->
                <div>
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fas fa-user-tie" style="color: var(--lime-gold); font-size: 1.2rem;"></i>
                        <h5 class="mb-0" style="color: var(--teal-blue); font-weight: 700;">Assigned MLA Information</h5>
                        <span class="badge ms-2" style="background: rgba(195,200,72,0.10); color: var(--dark-olive); font-weight: 500; border-radius: 40px; padding: 0.2rem 0.9rem; font-size: 0.65rem;">
                            <i class="fas fa-lock me-1"></i> Read-Only
                        </span>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-id-card"></i> MLA ID</div>
                            <div class="value-display-readonly">MLA-178</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-user-tie"></i> MLA Name</div>
                            <div class="value-display-readonly">Shri ABC Patil</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-building"></i> Party</div>
                            <div class="value-display-readonly">XYZ Party</div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="info-label"><i class="fas fa-landmark"></i> Constituency</div>
                            <div class="value-display-readonly">Karad South</div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-label"><i class="fas fa-map-pin"></i> District</div>
                            <div class="value-display-readonly">Satara</div>
                        </div>
                        <div class="col-12 mt-2">
                            <span class="badge" style="background: rgba(107,138,34,0.06); color: var(--olive-green); padding: 0.5rem 1.2rem; border-radius: 40px; font-weight: 500; font-size: 0.85rem;">
                                <i class="fas fa-arrow-right me-1"></i> Auto Mapped Based on Constituency
                            </span>
                        </div>
                    </div>
                </div>

            </div><!-- end body -->
        </div><!-- end premium-card -->

        <!-- FOOTER -->
        <footer class="footer">
            <p class="mb-0">
                &copy; <script>document.write(new Date().getFullYear());</script>
                MLA Monitoring & Voter Feedback System. All Rights Reserved.
                Design by
                <a href="https://absoftwaresolution.co.in/" target="_blank">
                    AB Software Solution
                </a>
            </p>
        </footer>

    </main>

    <!-- ============================================================
         EDIT PROFILE MODAL
         ============================================================ -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-edit me-2" style="color: var(--lime-gold);"></i>Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-user me-1" style="color: var(--lime-gold);"></i> Full Name</label>
                                <input type="text" class="form-control" id="editFullName" value="Rahul Patil">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-id-card me-1" style="color: var(--lime-gold);"></i> Voter ID</label>
                                <input type="text" class="form-control" id="editVoterId" value="MH1234567890">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-calendar me-1" style="color: var(--lime-gold);"></i> Date of Birth</label>
                                <input type="text" class="form-control" id="editDob" value="15 August 2001">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-venus-mars me-1" style="color: var(--lime-gold);"></i> Gender</label>
                                <select class="form-control" id="editGender">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-envelope me-1" style="color: var(--lime-gold);"></i> Email Address</label>
                                <input type="email" class="form-control" id="editEmail" value="rahul@gmail.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-phone me-1" style="color: var(--lime-gold);"></i> Mobile Number</label>
                                <input type="text" class="form-control" id="editMobile" value="9876543210">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fas fa-map me-1" style="color: var(--lime-gold);"></i> State</label>
                                <input type="text" class="form-control" id="editState" value="Maharashtra">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fas fa-location-dot me-1" style="color: var(--lime-gold);"></i> District</label>
                                <input type="text" class="form-control" id="editDistrict" value="Satara">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fas fa-landmark me-1" style="color: var(--lime-gold);"></i> Assembly Constituency</label>
                                <input type="text" class="form-control" id="editConstituency" value="Karad South">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-home me-1" style="color: var(--lime-gold);"></i> Locality / Area</label>
                                <input type="text" class="form-control" id="editLocality" value="Malkapur">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fas fa-mailbox me-1" style="color: var(--lime-gold);"></i> Pincode</label>
                                <input type="text" class="form-control" id="editPincode" value="415110">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-gold" id="saveProfileBtn" style="padding: 8px 32px;">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast-notification" id="toastNotification">
        <i class="fas fa-check-circle me-2" style="color: var(--lime-gold);"></i> Profile updated successfully!
    </div>

    <!-- Bootstrap JS for Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="navbar.js"></script>
    <script>
        // ============================================================
        // EDIT PROFILE FUNCTIONALITY
        // ============================================================
        document.addEventListener("DOMContentLoaded", function() {

            const displayFullName = document.getElementById('displayFullName');
            const displayVoterId = document.getElementById('displayVoterId');
            const displayDistrict = document.getElementById('displayDistrict');
            const displayConstituency = document.getElementById('displayConstituency');

            const fullNameValue = document.getElementById('fullNameValue');
            const voterIdValue = document.getElementById('voterIdValue');
            const dobValue = document.getElementById('dobValue');
            const genderValue = document.getElementById('genderValue');
            const emailValue = document.getElementById('emailValue');
            const mobileValue = document.getElementById('mobileValue');
            const stateValue = document.getElementById('stateValue');
            const districtValue = document.getElementById('districtValue');
            const constituencyValue = document.getElementById('constituencyValue');
            const localityValue = document.getElementById('localityValue');
            const pincodeValue = document.getElementById('pincodeValue');

            const editFullName = document.getElementById('editFullName');
            const editVoterId = document.getElementById('editVoterId');
            const editDob = document.getElementById('editDob');
            const editGender = document.getElementById('editGender');
            const editEmail = document.getElementById('editEmail');
            const editMobile = document.getElementById('editMobile');
            const editState = document.getElementById('editState');
            const editDistrict = document.getElementById('editDistrict');
            const editConstituency = document.getElementById('editConstituency');
            const editLocality = document.getElementById('editLocality');
            const editPincode = document.getElementById('editPincode');

            const saveBtn = document.getElementById('saveProfileBtn');
            const toast = document.getElementById('toastNotification');

            function showToast(message) {
                toast.innerHTML = '<i class="fas fa-check-circle me-2" style="color: var(--lime-gold);"></i> ' + message;
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }

            saveBtn.addEventListener('click', function() {
                const newName = editFullName.value.trim() || 'Rahul Patil';
                const newVoterId = editVoterId.value.trim() || 'MH1234567890';
                const newDob = editDob.value.trim() || '15 August 2001';
                const newGender = editGender.value;
                const newEmail = editEmail.value.trim() || 'rahul@gmail.com';
                const newMobile = editMobile.value.trim() || '9876543210';
                const newState = editState.value.trim() || 'Maharashtra';
                const newDistrict = editDistrict.value.trim() || 'Satara';
                const newConstituency = editConstituency.value.trim() || 'Karad South';
                const newLocality = editLocality.value.trim() || 'Malkapur';
                const newPincode = editPincode.value.trim() || '415110';

                displayFullName.textContent = newName;
                displayVoterId.textContent = newVoterId;
                displayDistrict.textContent = newDistrict;
                displayConstituency.textContent = newConstituency;

                fullNameValue.textContent = newName;
                voterIdValue.textContent = newVoterId;
                dobValue.textContent = newDob;
                genderValue.textContent = newGender;

                emailValue.innerHTML = '<i class="fas fa-at me-1" style="color: var(--teal-blue); opacity: 0.6;"></i> ' + newEmail;
                mobileValue.innerHTML = '<i class="fas fa-phone-alt me-1" style="color: var(--teal-blue); opacity: 0.6;"></i> ' + newMobile;

                stateValue.textContent = newState;
                districtValue.textContent = newDistrict;
                constituencyValue.textContent = newConstituency;
                localityValue.textContent = newLocality;
                pincodeValue.textContent = newPincode;

                const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
                modal.hide();
                showToast('Profile updated successfully!');
            });

            document.getElementById('editProfileForm').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    saveBtn.click();
                }
            });

            document.getElementById('editProfileModal').addEventListener('show.bs.modal', function() {
                editFullName.value = fullNameValue.textContent;
                editVoterId.value = voterIdValue.textContent;
                editDob.value = dobValue.textContent;
                editGender.value = genderValue.textContent;
                let emailText = emailValue.textContent.trim();
                let mobileText = mobileValue.textContent.trim();
                editEmail.value = emailText;
                editMobile.value = mobileText;
                editState.value = stateValue.textContent;
                editDistrict.value = districtValue.textContent;
                editConstituency.value = constituencyValue.textContent;
                editLocality.value = localityValue.textContent;
                editPincode.value = pincodeValue.textContent;
            });

        });

        // ============================================================
        // PROFILE PHOTO UPLOAD
        // ============================================================
        function updateProfilePhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatar = document.getElementById('profileAvatar');
                    avatar.src = e.target.result;
                    const toast = document.getElementById('toastNotification');
                    toast.innerHTML = '<i class="fas fa-check-circle me-2" style="color: var(--lime-gold);"></i> Profile photo updated!';
                    toast.classList.add('show');
                    setTimeout(() => {
                        toast.classList.remove('show');
                    }, 3000);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>