<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Registration Portal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* ============================================
           COMPLETE STYLING
        ============================================ */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
            padding: 2.5rem 2rem;
            max-width: 600px;
            width: 100%;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.9);
        }

        .brand-icon-wrap {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .brand-icon-wrap i {
            font-size: 4rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .auth-title {
            font-weight: 700;
            color: #1a1a2e;
            font-size: 1.8rem;
            margin-bottom: 0.3rem;
        }

        .auth-subtitle {
            color: #6b7280;
            font-size: 0.95rem;
            margin-bottom: 1.8rem;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .required {
            color: #ef4444;
        }

        .optional {
            color: #9ca3af;
            font-weight: 400;
            font-size: 0.8rem;
        }

        .form-control,
        .form-select {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: #ffffff;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(102, 126, 234, 0.5);
            color: white;
        }

        .btn-gradient:active {
            transform: translateY(0);
        }

        .btn-outline-teal {
            border: 2px solid #667eea;
            color: #667eea;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-teal:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
        }

        .divider-line {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: #9ca3af;
            font-size: 0.85rem;
        }

        .divider-line::before,
        .divider-line::after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #e5e7eb;
        }

        .divider-line::before {
            margin-right: 1rem;
        }

        .divider-line::after {
            margin-left: 1rem;
        }

        .auth-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .auth-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .footer-secure {
            text-align: center;
            margin-top: 1.5rem;
            color: #9ca3af;
            font-size: 0.8rem;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
        }

        .footer-secure i {
            color: #10b981;
        }

        /* ============================================
           REGISTRATION FORM
        ============================================ */

        .registration-wrap {
            display: none;
        }

        /* ============================================
           FORGOT PASSWORD
        ============================================ */

        .forgot-wrap {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .forgot-step {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .forgot-step.active {
            display: block;
        }

        .forgot-wrap .form-control {
            width: 100%;
        }

        .forgot-wrap .btn-gradient {
            width: 100%;
        }

        .back-login {
            text-align: center;
            margin-top: 1rem;
        }

        .btn-back {
            background: none;
            border: none;
            color: #6b7280;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 0;
        }

        .btn-back:hover {
            color: #374151;
        }

        .completion-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* ============================================
           STEP INDICATOR
        ============================================ */

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding: 0 0.5rem;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 20px;
            right: 20px;
            height: 2px;
            background: #e5e7eb;
            transform: translateY(-50%);
            z-index: 0;
        }

        .step-dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e5e7eb;
            border: 3px solid white;
            position: relative;
            z-index: 1;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .step-dot.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-color: #667eea;
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }

        .step-dot.completed {
            background: #10b981;
            border-color: #10b981;
        }

        .step-dot.completed::after {
            content: '✓';
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
        }

        /* ============================================
           FORM STEPS
        ============================================ */

        .form-step {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .form-step.active {
            display: block;
        }

        @keyframes fadeIn {

            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        /* ============================================
           PROFILE PHOTO
        ============================================ */

        .profile-photo-upload {
            border: 2px dashed #e5e7eb;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .profile-photo-upload:hover {
            border-color: #667eea;
            background: #f3f4f6;
        }

        .profile-photo-upload i {
            font-size: 2rem;
            color: #667eea;
            display: block;
            margin-bottom: 0.5rem;
        }

        .profile-photo-upload img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 0.5rem;
        }

        /* ============================================
           OTP INPUT
        ============================================ */

        .otp-input {
            width: 50px;
            height: 60px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            margin: 0 0.25rem;
        }

        .otp-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        /* ============================================
           ALERT
        ============================================ */

        .alert-info {
            background: #e0e7ff;
            border-color: #c7d2fe;
            color: #4f46e5;
            border-radius: 12px;
        }

        /* ============================================
           POPUP
        ============================================ */

        .popup {
            position: fixed;
            top: 25px;
            right: 25px;
            min-width: 320px;
            max-width: 420px;
            padding: 18px 20px;
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            z-index: 999999;
            box-shadow: 0 10px 25px rgba(0,0,0,.25);
            transform: translateX(450px);
            opacity: 0;
            transition: .5s;
        }

        .popup.show {
            transform: translateX(0);
            opacity: 1;
        }

        .popup.success {
            background: #28a745;
        }

        .popup.error {
            background: #dc3545;
        }

        /* ============================================
           RESPONSIVE
        ============================================ */

        @media (max-width: 576px) {

            .auth-card {
                padding: 1.5rem 1rem;
            }

            .step-dot {
                width: 25px;
                height: 25px;
            }

            .otp-input {
                width: 40px;
                height: 50px;
                font-size: 1.2rem;
            }

        }

    </style>
</head>

<body>

<div class="auth-card">

    <!-- ============================================
         LOGIN FORM
    ============================================ -->

    <div class="login-wrap" id="loginWrap">

        <div class="brand-icon-wrap">
            <i class="bi bi-shield-fill-check"></i>
        </div>

        <h3 class="auth-title text-center">
            Welcome Back
        </h3>

        <p class="auth-subtitle text-center">
            Secure Government Portal Login
        </p>

        <form action="<?= base_url('user/login') ?>" method="post">

            <?= csrf_field() ?>

            <div class="mb-3">

                <label for="email" class="form-label">
                    Email Address <span class="required">*</span>
                </label>

                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       placeholder="Enter your email" 
                       required>

            </div>

            <div class="mb-3">

                <label for="loginPassword" class="form-label">
                    Password <span class="required">*</span>
                </label>

                <input type="password"
                       name="password"
                       id="loginPassword"
                       class="form-control" minlength="8"  maxlength="8"
                       required
                       placeholder="Enter your password">

            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="form-check">

                    <input class="form-check-input"
                           type="checkbox"
                           id="rememberMe"
                           name="remember_me">

                    <label class="form-check-label small text-muted"
                           for="rememberMe">
                        Remember Me
                    </label>

                </div>

                <a href="javascript:void(0)"
                   onclick="switchToForgotPassword()"
                   class="auth-link">
                    Forgot Password?
                </a>

            </div>

            <button type="submit" class="btn btn-gradient">

                <i class="bi bi-box-arrow-in-right me-2"></i>
                Secure Login

            </button>

            <div class="divider-line">
                OR
            </div>

            <button type="button"
                    class="btn btn-outline-teal"
                    onclick="switchToRegister()">

                <i class="bi bi-person-plus me-2"></i>
                Register New Account

            </button>

            <div class="footer-secure">

                <i class="bi bi-shield-lock-fill"></i>
                Protected by 256-bit SSL Encryption

            </div>

        </form>

    </div>


    <!-- ============================================
         REGISTRATION FORM
    ============================================ -->

    <div class="registration-wrap" id="registerWrap">

        <div class="d-flex align-items-center mb-3">

            <button type="button"
                    class="btn-back me-3"
                    onclick="switchToLogin()">

                <i class="bi bi-arrow-left-circle-fill me-1"></i>
                Back

            </button>

            <h4 class="auth-title mb-0"
                style="font-size: 1.2rem;">

                Voter Registration

            </h4>

            <span class="completion-badge ms-auto"
                  id="completionBadge">

                Profile: 0%

            </span>

        </div>


        <!-- Step Indicators -->

        <div class="step-indicator">

            <span class="step-dot active"
                  data-step="1"></span>

            <span class="step-dot"
                  data-step="2"></span>

            <span class="step-dot"
                  data-step="3"></span>

            <span class="step-dot"
                  data-step="4"></span>

        </div>


        <form id="regForm"
              action="<?= base_url('user/register') ?>"
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field() ?>


            <!-- ====================================
                 STEP 1
            ===================================== -->

            <div class="form-step active"
                 data-step="1">

                <h6 class="fw-bold text-dark mb-3">

                    <i class="bi bi-person-badge me-2 text-primary"></i>
                    Identity Core

                </h6>


                <div class="mb-2">

                    <label class="form-label">
                        Voter ID <span class="required">*</span>
                    </label>

                    <input type="text"
                           class="form-control"
                           id="voterIdInput"
                           name="voter_id"
                           placeholder="Enter Voter ID"
                           required>

                </div>


                <div id="voterIdError"
                     class="text-danger mt-1"
                     style="display:none;">
                </div>


                <div class="mb-2">

                    <label class="form-label">
                        Full Name <span class="required">*</span>
                    </label>

                    <input type="text"
                           name="full_name"
                           class="form-control"
                           required
                           placeholder="Enter full name as per voter ID">

                </div>


                <div class="row g-2">

                    <div class="col-7">

                        <label class="form-label">
                            Date of Birth
                            <span class="required">*</span>
                        </label>

                        <input type="date"
                               name="dob"
                               class="form-control"
                               max="<?= date('Y-m-d', strtotime('-18 years')) ?>"
                               required>

                    </div>


                    <div class="col-5">

                        <label class="form-label">
                            Gender <span class="required">*</span>
                        </label>

                        <select name="gender"
                                class="form-select"
                                required>

                            <option value="">
                                Select
                            </option>

                            <option value="Male">
                                Male
                            </option>

                            <option value="Female">
                                Female
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>

                </div>


                <div class="row g-2">

                    <div class="col-7">

                        <label class="form-label">

                            Mobile Number
                            <span class="optional">
                                (Optional)
                            </span>

                        </label>

                        <input type="tel"
                               name="mobile"
                               id="mobileInput"
                               class="form-control"
                               placeholder="Enter 10 digit mobile number"
                               maxlength="10"
                               pattern="[0-9]{10}"
                               inputmode="numeric">

                        <div id="mobileError"
                             class="text-danger mt-1"
                             style="display:none;">
                        </div>

                        <br>

                    </div>

                </div>


                <div class="row g-2">

                    <div class="profile-photo-upload"
                         onclick="document.getElementById('photoUpload').click()">

                        <img id="photoPreview"
                             src=""
                             style="display:none; max-height:80px; border-radius:8px;">

                        <i class="bi bi-camera"
                           id="cameraIcon"></i>

                        <p class="mb-0 text-muted small"
                           id="photoText">

                            Click to upload photo

                        </p>

                        <input type="file"
                               id="photoUpload"
                               name="profile_photo"
                               accept="image/*"
                               style="display:none;">

                    </div>

                </div>


                <div class="mt-4 text-end">

                    <button type="button"
                            class="btn btn-gradient"
                            style="width:auto; padding:0.6rem 1.8rem;"
                            onclick="nextStep(1)">

                        Next
                        <i class="bi bi-arrow-right ms-2"></i>

                    </button>

                </div>

            </div>


            <!-- ====================================
                 STEP 2
            ===================================== -->

            <div class="form-step"
                 data-step="2">

                <h6 class="fw-bold text-dark mb-3">

                    <i class="bi bi-key me-2 text-warning"></i>
                    Login & Verification

                </h6>


                <div class="mb-2">

                    <label class="form-label">

                        Email Address
                        <span class="optional">
                            (Optional)
                        </span>

                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="voter@example.com">

                </div>


                <div class="row g-2">

                    <div class="col-6">

                        <label class="form-label">

                            Password
                            <span class="required">*</span>

                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Min 8 chars"
                               id="passwordField" minlength="8"  maxlength="8"
                               required>

                    </div>


                    <div class="col-6">

                        <label class="form-label">

                            Confirm Password
                            <span class="required">*</span>

                        </label>

                        <input type="password"
                               name="confirm_password"
                               class="form-control"
                               placeholder="Re-enter password" minlength="8"  maxlength="8"
                               id="confirmPasswordField"
                               required>

                    </div>

                </div>


                <div class="mt-4 d-flex justify-content-between">

                    <button type="button"
                            class="btn btn-outline-teal"
                            style="width:auto; padding:0.5rem 1.5rem;"
                            onclick="prevStep(2)">

                        Back

                    </button>


                    <button type="button"
                            class="btn btn-gradient"
                            style="width:auto; padding:0.6rem 1.8rem;"
                            onclick="nextStep(2)">

                        Next
                        <i class="bi bi-arrow-right ms-2"></i>

                    </button>

                </div>

            </div>


            <!-- ====================================
                 STEP 3
            ===================================== -->

            <div class="form-step"
                 data-step="3">

                <h6 class="fw-bold text-dark mb-3">

                    <i class="bi bi-geo-alt me-2 text-success"></i>
                    Address & Location Mapping

                </h6>


                <div class="row g-2">

                    <div class="col-6">

                        <label class="form-label">

                            State <span class="required">*</span>

                        </label>

                        <select class="form-select"
                                id="stateSelect"
                                name="state_id"
                                required>

                            <option value="">
                                Select State
                            </option>

                            <?php if(isset($states) && !empty($states)): ?>

                                <?php foreach($states as $state): ?>

                                    <option value="<?= $state['id'] ?>">

                                        <?= $state['state_name'] ?>

                                    </option>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </select>

                    </div>


                    <div class="col-6">

                        <label class="form-label">

                            District <span class="required">*</span>

                        </label>

                        <select class="form-select"
                                id="districtSelect"
                                name="district_id"
                                required>

                            <option value="">
                                Select District
                            </option>

                        </select>

                    </div>

                </div>


                <div class="row g-2">

                    <div class="col-6">

                        <label class="form-label">

                            Constituency
                            <span class="required">*</span>

                        </label>

                        <select class="form-select"
                                id="constituencySelect"
                                name="constituency_id"
                                required
                                disabled>

                            <option value="">
                                Select Constituency
                            </option>

                        </select>

                    </div>


                    <div class="col-6">

                        <label class="form-label">

                            Pincode <span class="required">*</span>

                        </label>

                        <input type="text"
                               class="form-control"
                               name="pincode"
                               placeholder="400093"
                               required>

                    </div>

                </div>


                <div class="mb-2">

                    <label class="form-label">

                        Locality / Area Name
                        <span class="required">*</span>

                    </label>

                    <input type="text"
                           class="form-control"
                           name="locality"
                           placeholder="Shivaji Nagar, Andheri East"
                           required>

                </div>


                <div class="mt-4 d-flex justify-content-between">

                    <button type="button"
                            class="btn btn-outline-teal"
                            style="width:auto; padding:0.5rem 1.5rem;"
                            onclick="prevStep(3)">

                        Back

                    </button>


                    <button type="button"
                            class="btn btn-gradient"
                            style="width:auto; padding:0.6rem 1.8rem;"
                            onclick="nextStep(3)">

                        Next
                        <i class="bi bi-arrow-right ms-2"></i>

                    </button>

                </div>

            </div>


            <!-- ====================================
                 STEP 4
            ===================================== -->

            <div class="form-step"
                 data-step="4">

                <h6 class="fw-bold text-dark mb-3">

                    <i class="bi bi-person-vcard me-2 text-info"></i>
                    MLA Mapping & Verification

                </h6>


                <div class="alert alert-info py-2 small">

                    <i class="bi bi-info-circle me-1"></i>

                    Based on your constituency,
                    your assigned MLA will be auto-mapped.

                </div>


                <input type="hidden"
                       name="mla_id"
                       id="mlaIdHidden"
                       value="">


                <div class="row g-2">

                    <div class="col-6">

                        <label class="form-label">
                            Assigned MLA ID
                        </label>

                        <input type="text"
                               class="form-control"
                               id="mlaIdDisplay"
                               value="Auto-mapped"
                               disabled
                               style="background:#eef0ee;">

                    </div>


                    <div class="col-6">

                        <label class="form-label">
                            Assigned MLA Name
                        </label>

                        <input type="text"
                               class="form-control"
                               id="mlaNameDisplay"
                               value="Select constituency"
                               disabled
                               style="background:#eef0ee;">

                    </div>

                </div>


                <div class="row g-2">

                    <div class="col-6">

                        <label class="form-label">
                            Party Name
                        </label>

                        <input type="text"
                               class="form-control"
                               id="mlaPartyDisplay"
                               value="—"
                               disabled
                               style="background:#eef0ee;">

                    </div>


                    <div class="col-6">

                        <label class="form-label">
                            Constituency
                        </label>

                        <input type="text"
                               class="form-control"
                               id="mlaConstituencyDisplay"
                               value="—"
                               disabled
                               style="background:#eef0ee;">

                    </div>

                </div>


                <div class="row g-2">

                    <div class="col-12">

                        <label class="form-label">
                            District
                        </label>

                        <input type="text"
                               class="form-control"
                               id="mlaDistrictDisplay"
                               value="—"
                               disabled
                               style="background:#eef0ee;">

                    </div>

                </div>


                <div class="mt-4 d-flex justify-content-between">

                    <button type="button"
                            class="btn btn-outline-teal"
                            style="width:auto; padding:0.5rem 1.5rem;"
                            onclick="prevStep(4)">

                        Back

                    </button>


                    <button type="submit"
                            class="btn btn-gradient"
                            style="width:auto; padding:0.6rem 1.8rem;">

                        <i class="bi bi-check2-circle me-2"></i>

                        Submit Registration

                    </button>

                </div>

            </div>

        </form>

    </div>


    <!-- ============================================
         SINGLE FORGOT PASSWORD WINDOW
         
         STEP 1 = EMAIL
         STEP 2 = OTP
         STEP 3 = NEW PASSWORD
    ============================================ -->

    <div class="forgot-wrap"
         id="forgotWrap">


        <!-- ====================================
             FORGOT STEP 1 : EMAIL
        ===================================== -->

        <div class="forgot-step active"
             id="forgotStep1">

            <div class="brand-icon-wrap">

                <i class="bi bi-key-fill"
                   id="forgotIcon"></i>

            </div>


            <h3 class="auth-title text-center"
                id="forgotTitle">

                Forgot Password

            </h3>


            <p class="auth-subtitle text-center"
               id="forgotSubtitle">

                Enter your registered email to receive an OTP

            </p>


            <form id="sendOtpForm">

                <?= csrf_field() ?>


                <div class="mb-4">

                    <label class="form-label">

                        Email Address
                        <span class="required">*</span>

                    </label>

                    <input type="email"
                           name="email"
                           id="resetEmail"
                           class="form-control"
                           placeholder="Enter your registered email"
                           autocomplete="email"
                           required>

                </div>


                <button type="submit"
                        class="btn btn-gradient">

                    <i class="bi bi-send-fill me-2"></i>

                    Send OTP

                </button>

            </form>


            <div class="back-login">

                <a href="javascript:void(0)"
                   onclick="switchToLogin()"
                   class="auth-link">

                    <i class="bi bi-arrow-left me-1"></i>

                    Back to Login

                </a>

            </div>


            <div class="footer-secure">

                <i class="bi bi-shield-lock-fill"></i>

                Your account is securely protected

            </div>

        </div>


        <!-- ====================================
             FORGOT STEP 2 : OTP
        ===================================== -->

        <div class="forgot-step"
             id="forgotStep2">


            <div class="brand-icon-wrap">

                <i class="bi bi-shield-check"
                   id="otpIcon"></i>

            </div>


            <h3 class="auth-title text-center">

                Verify OTP

            </h3>


            <p class="auth-subtitle text-center">

                Enter the 6-digit OTP sent to your registered email

            </p>


            <form id="verifyOtpForm">

                <?= csrf_field() ?>


                <div class="mb-4">

                    <label class="form-label">

                        OTP
                        <span class="required">*</span>

                    </label>


                    <input type="text"
                           name="otp"
                           id="resetOtp"
                           class="form-control text-center"
                           placeholder="Enter 6-digit OTP"
                           maxlength="6"
                           minlength="6"
                           inputmode="numeric"
                           autocomplete="one-time-code"
                           required>

                </div>


                <button type="submit"
                        class="btn btn-gradient">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Verify OTP

                </button>

            </form>


            <div class="back-login">

                <a href="javascript:void(0)"
                   onclick="forgotBackToEmail()"
                   class="auth-link">

                    <i class="bi bi-arrow-left me-1"></i>

                    Change Email

                </a>

            </div>


            <div class="text-center mt-3">

                <div id="otpTimer"
                     class="small text-danger fw-semibold mb-2"
                     aria-live="polite">

                    OTP expires in 10:00

                </div>

                <button type="button"
                        class="btn-back"
                        onclick="resendResetOtp()">

                    <i class="bi bi-arrow-clockwise me-1"></i>

                    Resend OTP

                </button>

            </div>


            <div class="footer-secure">

                <i class="bi bi-shield-lock-fill"></i>

                OTP is valid for 10 minutes

            </div>

        </div>


        <!-- ====================================
             FORGOT STEP 3 : NEW PASSWORD
        ===================================== -->

        <div class="forgot-step"
             id="forgotStep3">


            <div class="brand-icon-wrap">

                <i class="bi bi-lock-fill"></i>

            </div>


            <h3 class="auth-title text-center">

                Create New Password

            </h3>


            <p class="auth-subtitle text-center">

                Enter your new password

            </p>


            <form id="resetPasswordForm">

                <?= csrf_field() ?>


                <input type="hidden"
                       name="email"
                       id="resetPasswordEmail">


                <div class="mb-3">

                    <label class="form-label">

                        New Password
                        <span class="required">*</span>

                    </label>


                    <input type="password"
                           name="password"
                           id="newResetPassword"
                           class="form-control"
                           placeholder="Enter new password" minlength="8"  maxlength="8"
                           minlength="8"
                           required>

                </div>


                <div class="mb-4">

                    <label class="form-label">

                        Confirm Password
                        <span class="required">*</span>

                    </label>


                    <input type="password"
                           name="confirm_password"
                           id="confirmResetPassword"
                           class="form-control"
                           placeholder="Confirm new password"
                           minlength="8"  maxlength="8"
                           required>

                </div>


                <button type="submit"
                        class="btn btn-gradient">

                    <i class="bi bi-key-fill me-2"></i>

                    Reset Password

                </button>

            </form>


            <div class="back-login">

                <a href="javascript:void(0)"
                   onclick="switchToLogin()"
                   class="auth-link">

                    <i class="bi bi-arrow-left me-1"></i>

                    Back to Login

                </a>

            </div>


            <div class="footer-secure">

                <i class="bi bi-shield-lock-fill"></i>

                Your account is securely protected

            </div>

        </div>

    </div>


</div>


<!-- ============================================
     POPUP MESSAGE
============================================ -->

<?php if(session()->getFlashdata('success')): ?>

    <div id="popupMessage"
         class="popup success">

        <span>
            <?= session()->getFlashdata('success'); ?>
        </span>

    </div>

<?php endif; ?>


<?php if(session()->getFlashdata('error')): ?>

    <div id="popupMessage"
         class="popup error">

        <span>
            <?= session()->getFlashdata('error'); ?>
        </span>

    </div>

<?php endif; ?>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script>


/* ============================================
   POPUP HANDLING
============================================ */

window.onload = function() {

    let popup = document.getElementById("popupMessage");

    if (popup) {

        setTimeout(() => {
            popup.classList.add("show");
        }, 100);

        setTimeout(() => {
            popup.classList.remove("show");
        }, 3500);

        setTimeout(() => {
            popup.remove();
        }, 4000);

    }

};


/* ============================================
   LOAD DISTRICTS BASED ON STATE ID
============================================ */

function loadDistricts(stateId) {

    const districtSelect =
        document.getElementById('districtSelect');

    const constituencySelect =
        document.getElementById('constituencySelect');


    districtSelect.innerHTML =
        '<option value="">Select District</option>';

    districtSelect.disabled = true;


    constituencySelect.innerHTML =
        '<option value="">Select Constituency</option>';

    constituencySelect.disabled = true;


    resetMlaDisplay();


    if (!stateId) {
        return;
    }


    fetch('<?= base_url("admin/get-districts") ?>/' + stateId)

        .then(response => response.json())

        .then(districts => {

            if (districts.length > 0) {

                districtSelect.disabled = false;


                districts.forEach(district => {

                    const option =
                        document.createElement('option');

                    option.value = district.id;

                    option.textContent =
                        district.district_name;

                    districtSelect.appendChild(option);

                });

            }

        })

        .catch(error => {

            console.error(
                'Error loading districts:',
                error
            );

        });

}


/* ============================================
   LOAD CONSTITUENCIES
============================================ */

function loadConstituencies(districtId) {

    const constituencySelect =
        document.getElementById('constituencySelect');


    constituencySelect.innerHTML =
        '<option value="">Select Constituency</option>';

    constituencySelect.disabled = true;


    resetMlaDisplay();


    if (!districtId) {
        return;
    }


    fetch(
        '<?= base_url("admin/get-constituencies") ?>/' +
        districtId
    )

        .then(response => response.json())

        .then(constituencies => {

            if (constituencies.length > 0) {

                constituencySelect.disabled = false;


                constituencies.forEach(constituency => {

                    const option =
                        document.createElement('option');

                    option.value =
                        constituency.id;

                    option.textContent =
                        constituency.constituency_name;

                    constituencySelect.appendChild(option);

                });

            }

        })

        .catch(error => {

            console.error(
                'Error loading constituencies:',
                error
            );

        });

}


/* ============================================
   LOAD MLA
============================================ */

function loadMla(constituencyId) {

    resetMlaDisplay();


    if (!constituencyId) {
        return;
    }


    fetch(
        '<?= base_url("user/get-mla") ?>/' +
        constituencyId
    )

        .then(response => response.json())

        .then(data => {

            if (data.success && data.mla) {

                document.getElementById(
                    'mlaIdHidden'
                ).value = data.mla.id;


                document.getElementById(
                    'mlaIdDisplay'
                ).value =
                    'MLA-' + data.mla.id;


                document.getElementById(
                    'mlaNameDisplay'
                ).value =
                    data.mla.mla_name || '—';


                document.getElementById(
                    'mlaPartyDisplay'
                ).value =
                    data.mla.party || '—';


                document.getElementById(
                    'mlaConstituencyDisplay'
                ).value =
                    data.mla.constituency_name || '—';


                document.getElementById(
                    'mlaDistrictDisplay'
                ).value =
                    data.mla.district_name || '—';

            }

            else {

                document.getElementById(
                    'mlaNameDisplay'
                ).value =
                    'No MLA assigned';

                document.getElementById(
                    'mlaIdHidden'
                ).value = '';

            }

        })

        .catch(error => {

            console.error(
                'Error loading MLA:',
                error
            );

            document.getElementById(
                'mlaNameDisplay'
            ).value =
                'Error loading MLA';

        });

}


/* ============================================
   RESET MLA DISPLAY
============================================ */

function resetMlaDisplay() {

    document.getElementById(
        'mlaIdHidden'
    ).value = '';


    document.getElementById(
        'mlaIdDisplay'
    ).value =
        'Auto-mapped';


    document.getElementById(
        'mlaNameDisplay'
    ).value =
        'Select constituency';


    document.getElementById(
        'mlaPartyDisplay'
    ).value =
        '—';


    document.getElementById(
        'mlaConstituencyDisplay'
    ).value =
        '—';


    document.getElementById(
        'mlaDistrictDisplay'
    ).value =
        '—';

}


/* ============================================
   EVENT LISTENERS
============================================ */

document.getElementById(
    'stateSelect'
).addEventListener(
    'change',
    function() {

        loadDistricts(this.value);

    }
);


document.getElementById(
    'districtSelect'
).addEventListener(
    'change',
    function() {

        loadConstituencies(this.value);

    }
);


document.getElementById(
    'constituencySelect'
).addEventListener(
    'change',
    function() {

        loadMla(this.value);

    }
);


/* ============================================
   VIEW TOGGLING
============================================ */

function switchToRegister() {

    document.getElementById(
        'loginWrap'
    ).style.display = 'none';


    document.getElementById(
        'forgotWrap'
    ).style.display = 'none';


    document.getElementById(
        'registerWrap'
    ).style.display = 'block';


    resetToStep(1);

}


function switchToLogin() {

    document.getElementById(
        'registerWrap'
    ).style.display = 'none';


    document.getElementById(
        'forgotWrap'
    ).style.display = 'none';


    document.getElementById(
        'loginWrap'
    ).style.display = 'block';


    resetToStep(1);

}


function switchToForgotPassword() {

    document.getElementById(
        'loginWrap'
    ).style.display = 'none';


    document.getElementById(
        'registerWrap'
    ).style.display = 'none';


    document.getElementById(
        'forgotWrap'
    ).style.display = 'block';


    resetForgotPassword();

}


/* ============================================
   FORGOT PASSWORD STEP CONTROL
============================================ */

function showForgotStep(step) {

    document.querySelectorAll(
        '.forgot-step'
    ).forEach(function(el) {

        el.classList.remove('active');

    });


    const currentStep =
        document.getElementById(
            'forgotStep' + step
        );


    if (currentStep) {

        currentStep.classList.add('active');

    }


    const icon =
        document.getElementById(
            'forgotIcon'
        );

    const title =
        document.getElementById(
            'forgotTitle'
        );

    const subtitle =
        document.getElementById(
            'forgotSubtitle'
        );


    if (step === 1) {

        icon.className =
            'bi bi-key-fill';

        title.textContent =
            'Forgot Password';

        subtitle.textContent =
            'Enter your registered email to receive an OTP';

    }


    if (step === 2) {

        title.textContent =
            'Verify OTP';

        subtitle.textContent =
            'Enter the 6-digit OTP sent to your registered email';


        setTimeout(function() {

            const otp =
                document.getElementById(
                    'resetOtp'
                );

            if (otp) {
                otp.focus();
            }

        }, 200);

    }


    if (step === 3) {

        title.textContent =
            'Create New Password';

        subtitle.textContent =
            'Enter your new password';


        setTimeout(function() {

            const password =
                document.getElementById(
                    'newResetPassword'
                );

            if (password) {
                password.focus();
            }

        }, 200);

    }

}


/* ============================================
   RESET FORGOT PASSWORD
============================================ */

function resetForgotPassword() {

    const sendForm =
        document.getElementById(
            'sendOtpForm'
        );

    const verifyForm =
        document.getElementById(
            'verifyOtpForm'
        );

    const resetForm =
        document.getElementById(
            'resetPasswordForm'
        );


    if (sendForm) {
        sendForm.reset();
    }


    if (verifyForm) {
        verifyForm.reset();
    }


    if (resetForm) {
        resetForm.reset();
    }


    showForgotStep(1);

}


function updateForgotPasswordCsrfToken(token) {

    if (!token) {
        return;
    }


    document.querySelectorAll(
        '#sendOtpForm input[name="<?= csrf_token() ?>"], ' +
        '#verifyOtpForm input[name="<?= csrf_token() ?>"], ' +
        '#resetPasswordForm input[name="<?= csrf_token() ?>"]'
    ).forEach(function(input) {

        input.value = token;

    });

}


let otpTimerInterval = null;


function startOtpTimer(expiresAt) {

    const timer = document.getElementById('otpTimer');
    const verifyButton = document.querySelector(
        '#verifyOtpForm button[type="submit"]'
    );


    if (otpTimerInterval) {
        clearInterval(otpTimerInterval);
    }


    if (!timer || !expiresAt) {
        return;
    }


    const updateTimer = function() {

        const remaining = Math.max(
            0,
            Math.ceil(Number(expiresAt) - Date.now() / 1000)
        );

        const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
        const seconds = String(remaining % 60).padStart(2, '0');


        if (remaining === 0) {
            timer.textContent = 'OTP expired. Please resend OTP.';
            timer.classList.remove('text-danger');
            timer.classList.add('text-secondary');

            if (verifyButton) {
                verifyButton.disabled = true;
            }

            clearInterval(otpTimerInterval);
            return;
        }


        timer.textContent = `OTP expires in ${minutes}:${seconds}`;

        if (verifyButton) {
            verifyButton.disabled = false;
        }

    };


    updateTimer();
    otpTimerInterval = setInterval(updateTimer, 1000);

}


/* ============================================
   BACK TO EMAIL
============================================ */

function forgotBackToEmail() {

    if (otpTimerInterval) {
        clearInterval(otpTimerInterval);
    }

    document.getElementById(
        'resetOtp'
    ).value = '';


    showForgotStep(1);

}


/* ============================================
   SEND RESET OTP
============================================ */

document.getElementById(
    'sendOtpForm'
).addEventListener(
    'submit',
    function(e) {

        e.preventDefault();


        const email =
            document.getElementById(
                'resetEmail'
            ).value.trim();


        if (!email) {

            alert(
                'Please enter your registered email.'
            );

            return;

        }


        const formData =
            new FormData(this);


        const button =
            this.querySelector(
                'button[type="submit"]'
            );


        const originalText =
            button.innerHTML;


        button.disabled = true;

        button.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span> Sending OTP...';


        fetch(
            "<?= base_url('user/send-reset-otp') ?>",
            {
                method: "POST",

                body: formData,

                headers: {
                    "X-Requested-With":
                        "XMLHttpRequest"
                }
            }
        )

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    'Server error: ' +
                    response.status
                );

            }

            return response.json();

        })

        .then(data => {

            updateForgotPasswordCsrfToken(data.csrfToken);

            if (data.status) {

                alert(
                    data.message ||
                    'OTP sent successfully.'
                );


                document.getElementById(
                    'resetPasswordEmail'
                ).value = email;


                showForgotStep(2);
                startOtpTimer(data.expiresAt);

            }

            else {

                alert(
                    data.message ||
                    'Unable to send OTP.'
                );

            }

        })

        .catch(error => {

            console.error(
                'Send OTP Error:',
                error
            );

            alert(
                'Something went wrong while sending OTP.'
            );

        })

        .finally(() => {

            button.disabled = false;

            button.innerHTML =
                originalText;

        });

    }
);


/* ============================================
   VERIFY OTP
============================================ */

document.getElementById(
    'verifyOtpForm'
).addEventListener(
    'submit',
    function(e) {

        e.preventDefault();


        const email =
            document.getElementById(
                'resetEmail'
            ).value.trim();


        const otp =
            document.getElementById(
                'resetOtp'
            ).value.trim();


        if (!email) {

            alert(
                'Email is missing.'
            );

            showForgotStep(1);

            return;

        }


        if (!/^[0-9]{6}$/.test(otp)) {

            alert(
                'Please enter a valid 6-digit OTP.'
            );

            return;

        }


        const formData =
            new FormData();


        formData.append(
            'email',
            email
        );


        formData.append(
            'otp',
            otp
        );


        /*
         * CSRF token
         */

        const csrfInput =
            this.querySelector(
                'input[name="<?= csrf_token() ?>"]'
            );


        if (csrfInput) {

            formData.append(
                '<?= csrf_token() ?>',
                csrfInput.value
            );

        }


        const button =
            this.querySelector(
                'button[type="submit"]'
            );


        const originalText =
            button.innerHTML;


        button.disabled = true;

        button.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span> Verifying...';


        fetch(
            "<?= base_url('user/verify-reset-otp') ?>",
            {
                method: "POST",

                body: formData,

                headers: {
                    "X-Requested-With":
                        "XMLHttpRequest"
                }
            }
        )

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    'Server error: ' +
                    response.status
                );

            }

            return response.json();

        })

        .then(data => {

            updateForgotPasswordCsrfToken(data.csrfToken);

            if (data.status) {

                alert(
                    data.message ||
                    'OTP verified successfully.'
                );


                document.getElementById(
                    'resetPasswordEmail'
                ).value = email;


                showForgotStep(3);

            }

            else {

                alert(
                    data.message ||
                    'Invalid OTP.'
                );

            }

        })

        .catch(error => {

            console.error(
                'Verify OTP Error:',
                error
            );

            alert(
                'Something went wrong while verifying OTP.'
            );

        })

        .finally(() => {

            button.disabled = false;

            button.innerHTML =
                originalText;

        });

    }
);


/* ============================================
   RESEND OTP
============================================ */

function resendResetOtp() {

    const email =
        document.getElementById(
            'resetEmail'
        ).value.trim();


    if (!email) {

        alert(
            'Email not found.'
        );

        showForgotStep(1);

        return;

    }


    const formData =
        new FormData();


    formData.append(
        'email',
        email
    );


    /*
     * Get CSRF from send OTP form
     */

    const csrfInput =
        document.querySelector(
            '#sendOtpForm input[name="<?= csrf_token() ?>"]'
        );


    if (csrfInput) {

        formData.append(
            '<?= csrf_token() ?>',
            csrfInput.value
        );

    }


    fetch(
        "<?= base_url('user/send-reset-otp') ?>",
        {
            method: "POST",

            body: formData,

            headers: {
                "X-Requested-With":
                    "XMLHttpRequest"
            }
        }
    )

    .then(response => response.json())

    .then(data => {

        updateForgotPasswordCsrfToken(data.csrfToken);

        if (data.status) {

            alert(
                data.message ||
                'New OTP sent successfully.'
            );

            startOtpTimer(data.expiresAt);

        }

        else {

            alert(
                data.message ||
                'Unable to resend OTP.'
            );

        }

    })

    .catch(error => {

        console.error(
            'Resend OTP Error:',
            error
        );

        alert(
            'Something went wrong while resending OTP.'
        );

    });

}


/* ============================================
   RESET PASSWORD
============================================ */

document.getElementById(
    'resetPasswordForm'
).addEventListener(
    'submit',
    function(e) {

        e.preventDefault();


        const password =
            document.getElementById(
                'newResetPassword'
            ).value;


        const confirmPassword =
            document.getElementById(
                'confirmResetPassword'
            ).value;


        if (password.length < 8) {

            alert(
                'Password must be at least 8 characters.'
            );

            return;

        }


        if (password !== confirmPassword) {

            alert(
                'Passwords do not match.'
            );

            return;

        }


        const formData =
            new FormData(this);


        const button =
            this.querySelector(
                'button[type="submit"]'
            );


        const originalText =
            button.innerHTML;


        button.disabled = true;

        button.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span> Resetting...';


        fetch(
            "<?= base_url('user/reset-password') ?>",
            {
                method: "POST",

                body: formData,

                headers: {
                    "X-Requested-With":
                        "XMLHttpRequest"
                }
            }
        )

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    'Server error: ' +
                    response.status
                );

            }

            return response.json();

        })

        .then(data => {

            updateForgotPasswordCsrfToken(data.csrfToken);

            if (data.status) {

                alert(
                    data.message ||
                    'Password reset successfully.'
                );


                /*
                 * Return to login
                 */

                switchToLogin();

            }

            else {

                alert(
                    data.message ||
                    'Unable to reset password.'
                );

            }

        })

        .catch(error => {

            console.error(
                'Reset Password Error:',
                error
            );

            alert(
                'Something went wrong while resetting password.'
            );

        })

        .finally(() => {

            button.disabled = false;

            button.innerHTML =
                originalText;

        });

    }
);


/* ============================================
   REGISTRATION STEP NAVIGATION
============================================ */

function resetToStep(step) {

    document.querySelectorAll(
        '.form-step'
    ).forEach(el => {

        el.classList.remove(
            'active'
        );

    });


    const targetStep =
        document.querySelector(
            `.form-step[data-step="${step}"]`
        );


    if (targetStep) {

        targetStep.classList.add(
            'active'
        );

    }


    updateStepIndicators(step);

    updateProfileCompletion(step);

}


/* ============================================
   NEXT STEP
============================================ */

function nextStep(current) {

    if (!validateStep(current)) {

        return;

    }


    let next =
        current + 1;


    /*
     * Special validation
     * Step 3 -> Step 4
     */

    if (current === 3) {

        const stateId =
            document.getElementById(
                'stateSelect'
            ).value;


        const districtId =
            document.getElementById(
                'districtSelect'
            ).value;


        const constituencyId =
            document.getElementById(
                'constituencySelect'
            ).value;


        const mlaId =
            document.getElementById(
                'mlaIdHidden'
            ).value;


        if (!stateId) {

            alert(
                '⚠️ Please select a State.'
            );

            return;

        }


        if (!districtId) {

            alert(
                '⚠️ Please select a District.'
            );

            return;

        }


        if (!constituencyId) {

            alert(
                '⚠️ Please select a Constituency.'
            );

            return;

        }


        if (!mlaId) {

            alert(
                '⚠️ No MLA found for the selected constituency. Please verify your selection.'
            );

            return;

        }

    }


    document.querySelector(
        `.form-step[data-step="${current}"]`
    ).classList.remove('active');


    document.querySelector(
        `.form-step[data-step="${next}"]`
    ).classList.add('active');


    updateStepIndicators(next);

    updateProfileCompletion(next);

}


/* ============================================
   PREVIOUS STEP
============================================ */

function prevStep(current) {

    let prev =
        current - 1;


    document.querySelector(
        `.form-step[data-step="${current}"]`
    ).classList.remove('active');


    document.querySelector(
        `.form-step[data-step="${prev}"]`
    ).classList.add('active');


    updateStepIndicators(prev);

    updateProfileCompletion(prev);

}


/* ============================================
   VALIDATION FUNCTIONS
============================================ */

function validateStep(step) {

    switch(step) {


        /* ====================================
           STEP 1
        ==================================== */

        case 1:

            const voterId =
                document.getElementById(
                    'voterIdInput'
                ).value.trim();


            const fullName =
                document.querySelector(
                    'input[name="full_name"]'
                ).value.trim();


            const dob =
                document.querySelector(
                    'input[name="dob"]'
                ).value;


            const gender =
                document.querySelector(
                    'select[name="gender"]'
                ).value;


            const mobile =
                document.querySelector(
                    'input[name="mobile"]'
                ).value;


            if (!voterId) {

                alert(
                    '⚠️ Please enter your Voter ID.'
                );

                return false;

            }


            if (!fullName) {

                alert(
                    '⚠️ Please enter your Full Name.'
                );

                return false;

            }


            if (
                mobile &&
                !/^[0-9]{10}$/.test(mobile)
            ) {

                alert(
                    '⚠️ Please enter a valid 10 digit Mobile Number.'
                );

                return false;

            }


            if (!dob) {

                alert(
                    '⚠️ Please select your Date of Birth.'
                );

                return false;

            }


            const eighteenthBirthday =
                new Date();


            eighteenthBirthday.setHours(
                0,
                0,
                0,
                0
            );


            eighteenthBirthday.setFullYear(
                eighteenthBirthday.getFullYear() - 18
            );


            const birthDate =
                new Date(
                    `${dob}T00:00:00`
                );


            if (
                birthDate >
                eighteenthBirthday
            ) {

                alert(
                    '⚠️ You must be at least 18 years old to register.'
                );

                return false;

            }


            if (!gender) {

                alert(
                    '⚠️ Please select your Gender.'
                );

                return false;

            }


            return true;


        /* ====================================
           STEP 2
        ==================================== */

        case 2:

            const password =
                document.getElementById(
                    'passwordField'
                ).value;


            const confirmPassword =
                document.getElementById(
                    'confirmPasswordField'
                ).value;


            if (password.length < 8) {

                alert(
                    '⚠️ Password must be at least 8 characters long.'
                );

                return false;

            }


            if (
                password !==
                confirmPassword
            ) {

                alert(
                    '⚠️ Passwords do not match.'
                );

                return false;

            }


            return true;


        /* ====================================
           STEP 3
        ==================================== */

        case 3:

            const stateId =
                document.getElementById(
                    'stateSelect'
                ).value;


            const districtId =
                document.getElementById(
                    'districtSelect'
                ).value;


            const constituencyId =
                document.getElementById(
                    'constituencySelect'
                ).value;


            const pincode =
                document.querySelector(
                    'input[name="pincode"]'
                ).value.trim();


            const locality =
                document.querySelector(
                    'input[name="locality"]'
                ).value.trim();


            if (!stateId) {

                alert(
                    '⚠️ Please select a State.'
                );

                return false;

            }


            if (!districtId) {

                alert(
                    '⚠️ Please select a District.'
                );

                return false;

            }


            if (!constituencyId) {

                alert(
                    '⚠️ Please select a Constituency.'
                );

                return false;

            }


            if (!pincode) {

                alert(
                    '⚠️ Please enter your Pincode.'
                );

                return false;

            }


            if (!locality) {

                alert(
                    '⚠️ Please enter your Locality/Area.'
                );

                return false;

            }


            return true;


        default:

            return true;

    }

}


/* ============================================
   UPDATE STEP INDICATORS
============================================ */

function updateStepIndicators(currentStep) {

    document.querySelectorAll(
        '.step-dot'
    ).forEach((dot, index) => {

        const stepNum =
            index + 1;


        dot.classList.remove(
            'active',
            'completed'
        );


        if (
            stepNum === currentStep
        ) {

            dot.classList.add(
                'active'
            );

        }

        else if (
            stepNum < currentStep
        ) {

            dot.classList.add(
                'completed'
            );

        }

    });

}


/* ============================================
   UPDATE PROFILE COMPLETION
============================================ */

function updateProfileCompletion(step) {

    const percentages = {

        1: 20,
        2: 40,
        3: 60,
        4: 80,
        5: 100

    };


    const badge =
        document.getElementById(
            'completionBadge'
        );


    if (
        badge &&
        percentages[step]
    ) {

        badge.textContent =
            `Profile: ${percentages[step]}%`;

    }

}


/* ============================================
   FORM SUBMIT VALIDATION
============================================ */

document.getElementById(
    'regForm'
).addEventListener(
    'submit',
    function(e) {


        if (
            !validateStep(1) ||
            !validateStep(2) ||
            !validateStep(3)
        ) {

            e.preventDefault();

            return false;

        }


        const mlaId =
            document.getElementById(
                'mlaIdHidden'
            ).value;


        if (!mlaId) {

            e.preventDefault();


            alert(
                '⚠️ No MLA assigned. Please verify your constituency selection.'
            );


            return false;

        }


        if (
            !confirm(
                'Are you sure all details are correct? This will register you as a voter.'
            )
        ) {

            e.preventDefault();

            return false;

        }

    }
);


/* ============================================
   PROFILE PHOTO UPLOAD PREVIEW
============================================ */

document.getElementById(
    'photoUpload'
)?.addEventListener(
    'change',
    function(e) {

        const file =
            e.target.files[0];


        if (file) {

            const reader =
                new FileReader();


            reader.onload =
                function(ev) {

                    document.getElementById(
                        'photoPreview'
                    ).src =
                        ev.target.result;


                    document.getElementById(
                        'photoPreview'
                    ).style.display =
                        'block';


                    document.getElementById(
                        'cameraIcon'
                    ).style.display =
                        'none';


                    document.getElementById(
                        'photoText'
                    ).innerHTML =
                        "Photo uploaded";

                };


            reader.readAsDataURL(file);

        }

    }
);


/* ============================================
   OTP AUTO FOCUS
============================================ */

document.querySelectorAll(
    '.otp-input'
).forEach(
    (inp, idx, arr) => {


        inp.addEventListener(
            'input',
            function() {

                if (
                    this.value.length === 1 &&
                    idx < arr.length - 1
                ) {

                    arr[idx + 1].focus();

                }

            }
        );


        inp.addEventListener(
            'keydown',
            function(e) {

                if (
                    e.key === 'Backspace' &&
                    this.value === '' &&
                    idx > 0
                ) {

                    arr[idx - 1].focus();

                }

            }
        );

    }
);


/* ============================================
   VOTER ID CHECK
============================================ */

document.addEventListener(
    'DOMContentLoaded',
    function() {


        const voterIdInput =
            document.getElementById(
                'voterIdInput'
            );


        const voterIdError =
            document.getElementById(
                'voterIdError'
            );


        if (!voterIdInput) {

            return;

        }


        voterIdInput.addEventListener(
            'blur',
            function() {


                const voterId =
                    this.value.trim();


                if (voterId === '') {

                    return;

                }


                fetch(
                    "<?= base_url('user/check-voter-id') ?>",
                    {

                        method: "POST",

                        headers: {

                            "Content-Type":
                                "application/x-www-form-urlencoded",

                            "X-Requested-With":
                                "XMLHttpRequest"

                        },

                        body:
                            "voter_id=" +
                            encodeURIComponent(
                                voterId
                            )

                    }
                )

                .then(response => {

                    if (!response.ok) {

                        throw new Error(
                            'Server error: ' +
                            response.status
                        );

                    }


                    return response.json();

                })

                .then(data => {


                    if (data.exists) {


                        voterIdInput.classList.add(
                            'is-invalid'
                        );


                        if (voterIdError) {

                            voterIdError.textContent =
                                data.message;


                            voterIdError.style.display =
                                'block';

                        }


                        voterIdInput.value = '';

                    }


                    else {


                        voterIdInput.classList.remove(
                            'is-invalid'
                        );


                        if (voterIdError) {

                            voterIdError.textContent =
                                '';


                            voterIdError.style.display =
                                'none';

                        }

                    }

                })

                .catch(error => {

                    console.error(
                        'Voter ID check failed:',
                        error
                    );

                });

            }

        );

    }
);


console.log(
    '✅ Login + Registration + Single Forgot Password loaded successfully!'
);


</script>

</body>
</html>