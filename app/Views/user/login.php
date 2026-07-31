<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maharashtra MLA Watch · Complete Registration</title>
    <!-- Bootstrap 5 + Icons + Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           COMPLETE DESIGN SYSTEM
           ============================================ */
        :root {
            --brand-teal: #225661;
            --brand-lime: #C3C848;
            --brand-green: #8c9e37;
            --brand-dark: #454D28;
            --bg-light: #f4f6f5;
            --border-light: #e3e8e3;
            --text-muted: #6c7a6c;
            --shadow-card: 0 15px 35px rgba(34, 86, 97, 0.10);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        
        body {
            background: var(--bg-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .auth-card {
            background: #ffffff;
            max-width: 580px;
            width: 100%;
            border-radius: 28px;
            box-shadow: var(--shadow-card);
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--brand-lime), var(--brand-green), var(--brand-teal));
        }

        .brand-icon-wrap {
            width: 60px;
            height: 60px;
            background: var(--brand-teal);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            box-shadow: 0 4px 12px rgba(34, 86, 97, 0.2);
        }
        .brand-icon-wrap i {
            color: #ffffff;
            font-size: 1.8rem;
        }

        .auth-title {
            color: var(--brand-teal);
            font-weight: 700;
            letter-spacing: -0.5px;
            font-size: 1.6rem;
            margin-bottom: 0.25rem;
        }

        .auth-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 1.8rem;
        }

        .form-label {
            font-weight: 600;
            color: #2b3b2b;
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
        }
        
        .form-label .required {
            color: #dc3545;
        }
        
        .form-label .optional {
            color: var(--text-muted);
            font-weight: 400;
            font-size: 0.75rem;
        }

        .form-control, .form-select {
            background: #fafbfa;
            border: 1px solid var(--border-light);
            border-radius: 10px;
            padding: 0.65rem 1rem;
            font-size: 0.92rem;
            color: #1a1f1a;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
            transition: var(--transition);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--brand-lime);
            box-shadow: 0 0 0 4px rgba(195, 200, 72, 0.15);
            background: #ffffff;
        }

        .form-control-sm-custom {
            font-size: 0.85rem;
            padding: 0.5rem 0.75rem;
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--brand-lime) 0%, var(--brand-green) 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: var(--transition);
            box-shadow: 0 6px 16px rgba(140, 158, 55, 0.30);
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(140, 158, 55, 0.40);
            color: #ffffff;
        }

        .btn-outline-teal {
            background: transparent;
            color: var(--brand-teal);
            border: 2px solid var(--brand-teal);
            border-radius: 12px;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
            transition: var(--transition);
        }
        
        .btn-outline-teal:hover {
            background: var(--brand-teal);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-back {
            background: transparent;
            border: none;
            color: var(--brand-teal);
            font-weight: 600;
            transition: var(--transition);
            padding: 0.5rem 0;
        }
        .btn-back:hover {
            color: var(--brand-dark);
            transform: translateX(-3px);
        }

        /* Registration Styles */
        .registration-wrap {
            display: none;
            animation: slideFadeIn 0.4s ease forwards;
        }
        
        .login-wrap {
            display: block;
            animation: slideFadeIn 0.4s ease forwards;
        }

        @keyframes slideFadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .form-step { display: none; }
        .form-step.active { display: block; }

        .step-indicator {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }
        .step-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #dce0dc;
            transition: var(--transition);
        }
        .step-dot.active {
            background: var(--brand-teal);
            width: 28px;
            border-radius: 12px;
        }
        .step-dot.completed {
            background: var(--brand-green);
        }

        .section-divider {
            border-top: 2px dashed var(--border-light);
            margin: 1.5rem 0;
            position: relative;
        }
        .section-divider span {
            position: absolute;
            top: -11px;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            padding: 0 12px;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-photo-upload {
            border: 2px dashed var(--border-light);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: #fafbfa;
        }
        .profile-photo-upload:hover {
            border-color: var(--brand-lime);
            background: #f8faf5;
        }
        .profile-photo-upload i {
            font-size: 2.5rem;
            color: var(--brand-teal);
            opacity: 0.5;
        }

        .otp-container {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin: 0.5rem 0 1rem;
        }
        .otp-input {
            width: 44px;
            height: 50px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            border: 2px solid var(--border-light);
            border-radius: 10px;
            background: #fafbfa;
            transition: var(--transition);
        }
        .otp-input:focus {
            border-color: var(--brand-lime);
            box-shadow: 0 0 0 4px rgba(195, 200, 72, 0.15);
            outline: none;
        }

        .footer-secure {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 1.8rem;
            color: var(--text-muted);
            font-size: 0.85rem;
        }
        .footer-secure i {
            color: var(--brand-green);
            font-size: 1.1rem;
        }

        .divider-line {
            display: flex;
            align-items: center;
            text-align: center;
            color: #a0a8a0;
            font-size: 0.85rem;
            margin: 1.8rem 0;
        }
        .divider-line::before, .divider-line::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #f0f2f0;
        }
        .divider-line::before { margin-right: 15px; }
        .divider-line::after { margin-left: 15px; }

        .form-check-input:checked {
            background-color: var(--brand-teal);
            border-color: var(--brand-teal);
        }
        
        .form-check-input:focus {
            border-color: var(--brand-teal);
            box-shadow: 0 0 0 4px rgba(34, 86, 97, 0.15);
        }

        .auth-link {
            color: var(--brand-teal);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .auth-link:hover {
            text-decoration: underline;
        }

        .completion-badge {
            background: var(--bg-light);
            border-radius: 20px;
            padding: 0.3rem 1rem;
            font-size: 0.8rem;
            color: var(--brand-teal);
            font-weight: 600;
        }

        .risk-badge {
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
        }

        @media (max-width: 576px) {
            .auth-card { padding: 1.5rem 1rem; border-radius: 20px; }
            .auth-title { font-size: 1.3rem; }
            .otp-input { width: 36px; height: 42px; font-size: 1rem; }
        }
    </style>
</head>
<body>

    <div class="auth-card">
        
        <!-- LOGIN FORM -->
        <div class="login-wrap" id="loginWrap">
            
            <div class="brand-icon-wrap">
                <i class="bi bi-shield-fill-check"></i>
            </div>

            <h3 class="auth-title text-center">Welcome Back</h3>
            <p class="auth-subtitle text-center">Secure Government Portal Login</p>

            <form>
                <div class="mb-3">
                    <label for="loginMobile" class="form-label">Mobile Number <span class="required">*</span></label>
                    <input type="text" class="form-control" id="loginMobile" placeholder="9876543210">
                </div>
                
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password <span class="required">*</span></label>
                    <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label small text-muted" for="rememberMe">Remember Me</label>
                    </div>
                    <a href="#" class="auth-link">Forgot Password?</a>
                </div>

                <button type="button" class="btn btn-gradient"
        onclick="window.location.href='Dashboard.html'">
    <i class="bi bi-box-arrow-in-right me-2"></i> Secure Login
</button>

                <div class="divider-line">OR</div>

                <button type="button" class="btn btn-outline-teal" onclick="switchToRegister()">
                    <i class="bi bi-person-plus me-2"></i> Register New Account
                </button>

                <div class="footer-secure">
                    <i class="bi bi-shield-lock-fill"></i> Protected by 256-bit SSL Encryption
                </div>
            </form>
        </div>

        <!-- REGISTRATION FORM - COMPLETE WITH ALL FIELDS -->
        <div class="registration-wrap" id="registerWrap">
            
            <div class="d-flex align-items-center mb-3">
                <button type="button" class="btn-back me-3" onclick="switchToLogin()">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Back
                </button>
                <h4 class="auth-title mb-0" style="font-size: 1.2rem;">Voter Registration</h4>
                <span class="completion-badge ms-auto">Profile: 0%</span>
            </div>

            <!-- Step Indicators -->
            <div class="step-indicator">
                <span class="step-dot active" data-step="1"></span>
                <span class="step-dot" data-step="2"></span>
                <span class="step-dot" data-step="3"></span>
                <span class="step-dot" data-step="4"></span>
                <span class="step-dot" data-step="5"></span>
            </div>

            <form id="regForm">
                
                <!-- STEP 1: IDENTITY CORE FIELDS -->
                <div class="form-step active" data-step="1">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-badge me-2 text-primary"></i>Identity Core</h6>
                    
                    <div class="mb-2">
                        <label class="form-label">Voter ID <span class="optional">(System Generated)</span></label>
                        <input type="text" class="form-control" value="MH/26/2026/XXXXX" disabled style="background:#eef0ee; color:#555;">
                    </div>
                    
                    <div class="mb-2">
                        <label class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter full name as per voter ID" required>
                    </div>
                    
                    <div class="row g-2">
                        <div class="col-7">
                            <label class="form-label">Date of Birth <span class="required">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="col-5">
                            <label class="form-label">Gender <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Select</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Profile Photo <span class="optional">(Optional)</span></label>
                        <div class="profile-photo-upload" onclick="document.getElementById('photoUpload').click()">
                            <i class="bi bi-camera"></i>
                            <p class="mb-0 text-muted small">Click to upload photo</p>
                            <input type="file" id="photoUpload" accept="image/*" style="display:none;">
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(1)">
                            Next <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 2: LOGIN FIELDS + VERIFICATION -->
                <div class="form-step" data-step="2">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-key me-2 text-warning"></i>Login & Verification</h6>
                    
                    <div class="mb-2">
                        <label class="form-label">Mobile Number <span class="required">*</span> <small class="text-muted">(Primary Login Key)</small></label>
                        <input type="tel" class="form-control" placeholder="9876543210" required>
                    </div>
                    
                    <div class="mb-2">
                        <label class="form-label">Email Address <span class="optional">(Optional)</span></label>
                        <input type="email" class="form-control" placeholder="voter@example.com">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Verify OTP <span class="required">*</span></label>
                        <div class="otp-container">
                            <input type="text" class="otp-input" maxlength="1" pattern="\d">
                            <input type="text" class="otp-input" maxlength="1" pattern="\d">
                            <input type="text" class="otp-input" maxlength="1" pattern="\d">
                            <input type="text" class="otp-input" maxlength="1" pattern="\d">
                            <input type="text" class="otp-input" maxlength="1" pattern="\d">
                            <input type="text" class="otp-input" maxlength="1" pattern="\d">
                        </div>
                        <small class="text-muted" style="font-size: 0.75rem;">
                            Timer: <span class="fw-bold">60s</span> · <a href="#" class="auth-link">Resend</a>
                        </small>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Password <span class="required">*</span></label>
                            <input type="password" class="form-control" placeholder="Min 8 chars" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Confirm Password <span class="required">*</span></label>
                            <input type="password" class="form-control" placeholder="Re-enter password" required>
                        </div>
                    </div>

                    <div class="section-divider"><span>Security</span></div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Device ID</label>
                            <input type="text" class="form-control form-control-sm-custom" placeholder="Auto-detected" disabled style="background:#eef0ee;">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Device Fingerprint</label>
                            <input type="text" class="form-control form-control-sm-custom" placeholder="Auto-generated" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(2)">Back</button>
                        <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(2)">Next <i class="bi bi-arrow-right ms-2"></i></button>
                    </div>
                </div>

                <!-- STEP 3: ADDRESS & LOCATION MAPPING -->
                <div class="form-step" data-step="3">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-geo-alt me-2 text-success"></i>Address & Location Mapping</h6>
                    
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">State <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Select State</option>
                                <option selected>Maharashtra</option>
                                <option>Gujarat</option>
                                <option>Karnataka</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">District <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Select District</option>
                                <option>Mumbai City</option>
                                <option>Thane</option>
                                <option>Pune</option>
                                <option>Nagpur</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Constituency ID <span class="required">*</span></label>
                            <select class="form-select" required>
                                <option value="">Select Constituency</option>
                                <option>Mumbai South (MH-26-01)</option>
                                <option>Mumbai North (MH-26-02)</option>
                                <option>Thane (MH-26-03)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Ward / Booth Number</label>
                            <input type="text" class="form-control" placeholder="Ward-12 / Booth-45">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Locality / Area Name <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Shivaji Nagar, Andheri East" required>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Pincode <span class="required">*</span></label>
                            <input type="text" class="form-control" placeholder="400093" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label">GPS Location</label>
                            <input type="text" class="form-control" placeholder="19.0760°N, 72.8777°E">
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(3)">Back</button>
                        <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(3)">Next <i class="bi bi-arrow-right ms-2"></i></button>
                    </div>
                </div>

                <!-- STEP 4: MLA MAPPING & VERIFICATION -->
                <div class="form-step" data-step="4">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-vcard me-2 text-info"></i>MLA Mapping & Verification</h6>
                    
                    <div class="alert alert-info py-2 small">
                        <i class="bi bi-info-circle me-1"></i> Based on your constituency, your assigned MLA will be auto-mapped.
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Assigned MLA ID</label>
                            <input type="text" class="form-control" value="MLA-MH-026-001" disabled style="background:#eef0ee;">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Assigned MLA Name</label>
                            <input type="text" class="form-control" value="Shri. Anand Patil" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Party Name</label>
                            <input type="text" class="form-control" value="Bharatiya Janata Party" disabled style="background:#eef0ee;">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Constituency Match Status</label>
                            <span class="badge bg-success w-100 py-2">✅ Verified Match</span>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">MLA Display Status</label>
                        <select class="form-select">
                            <option>Show MLA Details</option>
                            <option>Hide MLA Details</option>
                        </select>
                    </div>

                    <div class="section-divider"><span>Verification Documents</span></div>

                    <div class="mb-2">
                        <label class="form-label">Voter ID / EPIC Number <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="ABC1234567" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Aadhaar Number <span class="optional">(Optional - Masked Storage)</span></label>
                        <input type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-1234">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Address Line 1 <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Flat/House No, Building Name" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Address Line 2 <span class="optional">(Optional)</span></label>
                        <input type="text" class="form-control" placeholder="Street, Landmark">
                    </div>

                    <div class="mt-2">
                        <label class="form-label">Address Verification Status</label>
                        <select class="form-select">
                            <option>Pending</option>
                            <option>Verified</option>
                            <option>Rejected</option>
                        </select>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(4)">Back</button>
                        <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(4)">Next <i class="bi bi-arrow-right ms-2"></i></button>
                    </div>
                </div>

                <!-- STEP 5: SYSTEM MAPPING & SECURITY -->
                <div class="form-step" data-step="5">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-server me-2 text-secondary"></i>System Mapping & Security</h6>
                    
                    <div class="row g-2">
                        <div class="col-4">
                            <label class="form-label">Booth ID</label>
                            <input type="text" class="form-control" placeholder="BOOTH-045">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Registration Source</label>
                            <select class="form-select">
                                <option>Web</option>
                                <option>Mobile</option>
                                <option>Agent</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Profile Completion</label>
                            <input type="text" class="form-control" value="68%" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Registration Timestamp</label>
                        <input type="text" class="form-control" value="2026-07-29 14:30:25 IST" disabled style="background:#eef0ee;">
                    </div>

                    <div class="section-divider"><span>Security Enhancement</span></div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">IP Address</label>
                            <input type="text" class="form-control" value="192.168.1.100" disabled style="background:#eef0ee;">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Login Attempt Count</label>
                            <input type="text" class="form-control" value="0" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Login History Flag</label>
                            <select class="form-select">
                                <option>Enabled</option>
                                <option>Disabled</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Risk Score</label>
                            <div class="d-flex align-items-center gap-2">
                                <span class="risk-badge">Low Risk</span>
                                <span class="text-muted small">(0/100)</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Login Status</label>
                        <select class="form-select">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>

                    <div class="alert alert-success mt-3 py-2 small">
                        <i class="bi bi-check-circle-fill me-1"></i> All fields completed. Your voter registration is ready for submission.
                    </div>

                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(5)">Back</button>
                        <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="finishRegistration()">
                            <i class="bi bi-check2-circle me-2"></i> Submit Registration
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ============================================
        // VIEW TOGGLING
        // ============================================
        function switchToRegister() {
            document.getElementById('loginWrap').style.display = 'none';
            document.getElementById('registerWrap').style.display = 'block';
            resetToStep(1);
        }

        function switchToLogin() {
            document.getElementById('registerWrap').style.display = 'none';
            document.getElementById('loginWrap').style.display = 'block';
            resetToStep(1);
        }

        // ============================================
        // STEP NAVIGATION
        // ============================================
        function resetToStep(step) {
            document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
            updateStepIndicators(step);
        }

        function nextStep(current) {
            let next = current + 1;
            document.querySelector(`.form-step[data-step="${current}"]`).classList.remove('active');
            document.querySelector(`.form-step[data-step="${next}"]`).classList.add('active');
            updateStepIndicators(next);
            updateProfileCompletion(next);
        }

        function prevStep(current) {
            let prev = current - 1;
            document.querySelector(`.form-step[data-step="${current}"]`).classList.remove('active');
            document.querySelector(`.form-step[data-step="${prev}"]`).classList.add('active');
            updateStepIndicators(prev);
            updateProfileCompletion(prev);
        }

        function updateStepIndicators(currentStep) {
            document.querySelectorAll('.step-dot').forEach((dot, index) => {
                const stepNum = index + 1;
                dot.classList.remove('active', 'completed');
                if (stepNum === currentStep) {
                    dot.classList.add('active');
                } else if (stepNum < currentStep) {
                    dot.classList.add('completed');
                }
            });
        }

        function updateProfileCompletion(step) {
            const percentages = {1: 20, 2: 40, 3: 60, 4: 80, 5: 100};
            const badge = document.querySelector('.completion-badge');
            if (badge && percentages[step]) {
                badge.textContent = `Profile: ${percentages[step]}%`;
            }
        }

        function finishRegistration() {
            if (confirm('Are you sure all details are correct? This will generate your Voter ID.')) {
                alert('✅ Registration Successful!\n\nVoter ID: MH/26/2026/XXXXX\n\nPlease check your mobile for confirmation.');
                switchToLogin();
            }
        }

        // ============================================
        // OTP AUTO-FOCUS
        // ============================================
        document.querySelectorAll('.otp-input').forEach((inp, idx, arr) => {
            inp.addEventListener('input', function() {
                if (this.value.length === 1 && idx < arr.length - 1) {
                    arr[idx + 1].focus();
                }
            });
            inp.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && this.value === '' && idx > 0) {
                    arr[idx - 1].focus();
                }
            });
        });

        // ============================================
        // PROFILE PHOTO UPLOAD PREVIEW
        // ============================================
        document.getElementById('photoUpload')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const preview = document.querySelector('.profile-photo-upload');
                    preview.innerHTML = `
                        <img src="${ev.target.result}" style="max-height:80px; border-radius:8px;">
                        <p class="mb-0 text-muted small mt-1">Photo uploaded</p>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>