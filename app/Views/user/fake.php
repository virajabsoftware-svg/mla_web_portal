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
           REGISTRATION FORM STYLES
           ============================================ */
        .registration-wrap {
            display: none;
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

        /* Step Indicator */
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

        /* Form Steps */
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

        /* Profile Photo Upload */
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

        /* OTP Input */
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

        /* Alert customization */
        .alert-info {
            background: #e0e7ff;
            border-color: #c7d2fe;
            color: #4f46e5;
            border-radius: 12px;
        }

        /* MLA Card */
        .mla-card {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.25rem;
            border: 1px solid #e9edf2;
            text-align: center;
            transition: all 0.3s ease;
        }
        .mla-card .mla-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 0.75rem;
        }
        .mla-card .mla-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #0f172a;
        }
        .mla-card .mla-party {
            font-size: 0.9rem;
            color: #475569;
        }
        .mla-card .mla-detail {
            font-size: 0.85rem;
            color: #64748b;
        }

        /* Responsive */
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
            .mla-card .mla-img {
                width: 80px;
                height: 80px;
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

        <h3 class="auth-title text-center">Welcome Back</h3>
        <p class="auth-subtitle text-center">Secure Government Portal Login</p>

        <form action="<?= base_url('login/auth') ?>" method="post">
            <!-- <?= csrf_field() ?> -->

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
                <label for="loginPassword" class="form-label">Password <span class="required">*</span></label>
                <input type="password"
                name="password"
                class="form-control"
                required
                placeholder="Enter your password">
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember_me">
                    <label class="form-check-label small text-muted" for="rememberMe">Remember Me</label>
                </div>
                <a href="#" class="auth-link">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-gradient">
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

    <!-- ============================================
    REGISTRATION FORM - COMPLETE FIXED VERSION
    ============================================ -->
    <div class="registration-wrap" id="registerWrap">

        <div class="d-flex align-items-center mb-3">
            <button type="button" class="btn-back me-3" onclick="switchToLogin()">
                <i class="bi bi-arrow-left-circle-fill me-1"></i> Back
            </button>
            <h4 class="auth-title mb-0" style="font-size: 1.2rem;">Voter Registration</h4>
            <span class="completion-badge ms-auto" id="completionBadge">Profile: 0%</span>
        </div>

        <!-- Step Indicators -->
        <div class="step-indicator">
            <span class="step-dot active" data-step="1"></span>
            <span class="step-dot" data-step="2"></span>
            <span class="step-dot" data-step="3"></span>
            <span class="step-dot" data-step="4"></span>
        </div>

        <form id="regForm"
        action="<?= base_url('register/save') ?>" method="post"
        enctype="multipart/form-data">

        <!-- <?= csrf_field() ?> -->

        <!-- ================================
        STEP 1: IDENTITY CORE FIELDS
        ================================ -->
        <div class="form-step active" data-step="1">
            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-badge me-2 text-primary"></i>Identity Core</h6>

            <div class="mb-2">
                <label class="form-label">Voter ID <span class="required">*</span></label>
                <input type="text"
                class="form-control"
                id="voterIdInput"
                name="voter_id"
                placeholder="Enter Voter ID"
                required>
            </div>

            <div class="mb-2">
                <label class="form-label">Full Name <span class="required">*</span></label>
                <input type="text"
                name="full_name"
                class="form-control"
                required
                placeholder="Enter full name as per voter ID">
            </div>

            <div class="row g-2">
                <div class="col-7">
                    <label class="form-label">Date of Birth <span class="required">*</span></label>
                    <input type="date"
                    name="dob"
                    class="form-control"
                    required>
                </div>
                <div class="col-5">
                    <label class="form-label">Gender <span class="required">*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">Profile Photo <span class="optional">(Optional)</span></label>
                <div class="profile-photo-upload" onclick="document.getElementById('photoUpload').click()">
                    <i class="bi bi-camera"></i>
                    <p class="mb-0 text-muted small">Click to upload photo</p>
                    <input type="file"
                    id="photoUpload"
                    name="profile_photo"
                    accept="image/*"
                    style="display:none;">
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(1)">
                    Next <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </div>
        </div>

        <!-- ================================
        STEP 2: LOGIN FIELDS
        ================================ -->
        <div class="form-step" data-step="2">
            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-key me-2 text-warning"></i>Login & Verification</h6>

            <div class="mb-2">
                <label class="form-label">Email Address <span class="optional">(Optional)</span></label>
                <input type="email"
                name="email"
                class="form-control"
                placeholder="voter@example.com">
            </div>

            <div class="row g-2">
                <div class="col-6">
                    <label class="form-label">Password <span class="required">*</span></label>
                    <input type="password"
                    name="password"
                    class="form-control"
                    placeholder="Min 8 chars"
                    id="passwordField"
                    required>
                </div>
                <div class="col-6">
                    <label class="form-label">Confirm Password <span class="required">*</span></label>
                    <input type="password"
                    name="confirm_password"
                    class="form-control"
                    placeholder="Re-enter password"
                    id="confirmPasswordField"
                    required>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(2)">Back</button>
                <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(2)">Next <i class="bi bi-arrow-right ms-2"></i></button>
            </div>
        </div>

        <!-- ================================
        STEP 3: ADDRESS & LOCATION MAPPING
        ================================ -->
        <div class="form-step" data-step="3">
            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-geo-alt me-2 text-success"></i>Address & Location Mapping</h6>

            <div class="row g-2">
                <div class="col-6">
                    <label class="form-label">State <span class="required">*</span></label>
                    <select class="form-select" name="state" required>
                        <option value="">Select State</option>
                        <option value="Maharashtra" selected>Maharashtra</option>
                    </select>
                </div>
                <div class="col-6">
                    <label class="form-label">District <span class="required">*</span></label>
                    <select class="form-select"
                    id="districtSelect"
                    name="district"
                    required>
                    <option value="">Select District</option>
                </select>
            </div>
        </div>

        <div class="row g-2">
            <div class="col-6">
                <label class="form-label">Constituency <span class="required">*</span></label>
                <select class="form-select"
                id="constituencySelect"
                name="constituency"
                required
                disabled>
                <option value="">Select Constituency</option>
            </select>
        </div>
        <div class="col-6">
            <label class="form-label">Pincode <span class="required">*</span></label>
            <input type="text"
            class="form-control"
            name="pincode"
            placeholder="400093"
            required>
        </div>
    </div>

    <div class="mb-2">
        <label class="form-label">Locality / Area Name <span class="required">*</span></label>
        <input type="text"
        class="form-control"
        name="locality"
        placeholder="Shivaji Nagar, Andheri East"
        required>
    </div>

    <div class="mt-4 d-flex justify-content-between">
        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(3)">Back</button>
        <button type="button" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;" onclick="nextStep(3)">Next <i class="bi bi-arrow-right ms-2"></i></button>
    </div>
</div>

<!-- ================================
STEP 4: MLA MAPPING & SUBMIT
=============================== -->
<div class="form-step" data-step="4">
    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-vcard me-2 text-info"></i>MLA Mapping & Verification</h6>

    <div class="alert alert-info py-2 small">
        <i class="bi bi-info-circle me-1"></i> Based on your constituency, your assigned MLA will be auto-mapped.
    </div>

    <!-- Hidden inputs for MLA data submission -->
    <input type="hidden" name="mla_name" id="mlaNameHidden">
    <input type="hidden" name="mla_party" id="mlaPartyHidden">
    <input type="hidden" name="mla_id" id="mlaIdHidden">

    <!-- MLA DISPLAY CARD -->
    <div class="mla-card" id="mlaCard">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
        alt="MLA Photo"
        class="mla-img"
        id="mlaPhotoDisplay"
        onerror="this.src='https://cdn-icons-png.flaticon.com/512/149/149071.png'">
        <div class="mla-name" id="mlaNameDisplay">Select constituency</div>
        <div class="mla-party" id="mlaPartyDisplay">—</div>
        <div class="mla-detail mt-2">
            <span id="mlaDistrictDisplay">—</span> &middot; <span id="mlaConstituencyDisplay">—</span>
        </div>
        <div class="mt-2 small text-muted">
            MLA ID: <span id="mlaIdDisplay">Auto-mapped</span>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-between">
        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(4)">Back</button>
        <button type="submit" class="btn btn-gradient" style="width: auto; padding: 0.6rem 1.8rem;">
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
    // COMPLETE JAVASCRIPT - WITH MLA PHOTOS
    // ============================================

    // ============================================
    // DEFAULT MLA IMAGE
    // ============================================
    const defaultMLAImage = "https://cdn-icons-png.flaticon.com/512/149/149071.png";

    // ============================================
    // MAHARASHTRA DATA
    // ============================================
    const maharashtraData = {
        "Nandurbar": ["Akkalkuwa (ST)", "Shahada (ST)", "Nandurbar (ST)", "Navapur (ST)"],
        "Dhule": ["Sakri (ST)", "Dhule Rural", "Dhule City", "Sindkheda", "Shirpur (ST)"],
        "Jalgaon": ["Chopda (ST)", "Raver", "Bhusawal (SC)", "Jalgaon City", "Jalgaon Rural", "Amalner", "Erandol", "Chalisgaon", "Pachora", "Jamner", "Muktainagar"],
        "Buldana": ["Malkapur", "Buldhana", "Chikhali", "Sindkhed Raja", "Mehkar (SC)", "Khamgaon", "Jalgaon (Jamod)"],
        "Akola": ["Akot", "Balapur", "Akola West", "Akola East", "Murtizapur (SC)"],
        "Washim": ["Risod", "Washim (SC)", "Karanja"],
        "Amravati": ["Dhamangaon Railway", "Badnera", "Amravati", "Teosa", "Daryapur (SC)", "Melghat (ST)", "Achalpur", "Morshi"],
        "Wardha": ["Arvi", "Deoli", "Hinganghat", "Wardha"],
        "Nagpur": ["Katol", "Savner", "Hingna", "Umred (SC)", "Nagpur South West", "Nagpur South", "Nagpur East", "Nagpur Central", "Nagpur West", "Nagpur North (SC)", "Kamthi", "Ramtek"],
        "Bhandara": ["Tumsar", "Bhandara (SC)", "Sakoli"],
        "Gondia": ["Arjuni Morgaon (SC)", "Tirora", "Gondiya", "Amgaon (ST)"],
        "Gadchiroli": ["Armori (ST)", "Gadchiroli (ST)", "Aheri (ST)"],
        "Chandrapur": ["Rajura", "Chandrapur (SC)", "Ballarpur", "Bramhapuri", "Chimur", "Warora"],
        "Yavatmal": ["Wani", "Ralegaon (ST)", "Yavatmal", "Digras", "Arni (ST)", "Pusad", "Umarkhed (SC)"],
        "Nanded": ["Kinwat", "Hadgaon", "Bhokar", "Nanded North", "Nanded South", "Loha", "Naigaon", "Deglur (SC)", "Mukhed"],
        "Hingoli": ["Basmath", "Kalamnuri", "Hingoli"],
        "Parbhani": ["Jintur", "Parbhani", "Gangakhed", "Pathri"],
        "Jalna": ["Partur", "Ghansawangi", "Jalna", "Badnapur (SC)", "Bhokardan"],
        "Chhatrapati Sambhaji Nagar": ["Sillod", "Kannad", "Phulambri", "Aurangabad Central", "Aurangabad West (SC)", "Aurangabad East", "Paithan", "Gangapur", "Vaijapur"],
        "Nashik": ["Nandgaon", "Malegaon Central", "Malegaon Outer", "Baglan (ST)", "Kalwan (ST)", "Chandwad", "Yevla", "Sinnar", "Niphad", "Dindori (ST)", "Nashik East", "Nashik Central", "Nashik West", "Deolali (SC)", "Igatpuri (ST)"],
        "Palghar": ["Dahanu (ST)", "Vikramgad (ST)", "Palghar (ST)", "Boisar (ST)", "Nalasopara", "Vasai"],
        "Thane": ["Bhiwandi Rural (ST)", "Shahapur (ST)", "Bhiwandi West", "Bhiwandi East", "Kalyan West", "Murbad", "Ambernath (SC)", "Ulhasnagar", "Kalyan East", "Dombivli", "Kalyan Rural", "Mira Bhayandar", "Ovala-Majiwada", "Kopri-Pachpakhadi", "Thane", "Mumbra-Kalwa", "Airoli", "Belapur"],
        "Mumbai Suburban": ["Borivali", "Dahisar", "Magathane", "Mulund", "Vikhroli", "Bhandup West", "Jogeshwari East", "Dindoshi", "Kandivali East", "Charkop", "Malad West", "Goregaon", "Versova", "Andheri West", "Andheri East", "Vile Parle", "Chandivali", "Ghatkopar West", "Ghatkopar East", "Mankhurd Shivaji Nagar", "Anushakti Nagar", "Chembur", "Kurla(SC)", "Kalina", "Vandre East", "Vandre West"],
        "Mumbai City": ["Dharavi (SC)", "Sion Koliwada", "Wadala", "Mahim", "Worli", "Shivadi", "Byculla", "Malabar Hill", "Mumbadevi", "Colaba"],
        "Raigad": ["Panvel", "Karjat", "Uran", "Pen", "Alibag", "Shrivardhan", "Mahad"],
        "Pune": ["Junnar", "Ambegaon", "Khed Alandi", "Shirur", "Daund", "Indapur", "Baramati", "Purandar", "Bhor", "Maval", "Chinchwad", "Pimpri (SC)", "Bhosari", "Vadgaon Sheri", "Shivajinagar", "Kothrud", "Khadakwasala", "Parvati", "Hadapsar", "Pune Cantonment", "Kasba Peth"],
        "Ahmednagar": ["Akole (ST)", "Sangamner", "Shirdi", "Kopargaon", "Shrirampur (SC)", "Nevasa", "Shevgaon", "Rahuri", "Parner", "Ahmednagar City", "Shrigonda", "Karjat Jamkhed"],
        "Beed": ["Georai (SC)", "Majalgaon", "Beed", "Ashti", "Kaij (SC)", "Parli"],
        "Latur": ["Latur Rural", "Latur City", "Ahmadpur", "Udgir (SC)", "Nilanga", "Ausa"],
        "Dharashiv": ["Umarga (SC)", "Tuljapur", "Dharashiv", "Paranda"],
        "Solapur": ["Karmala", "Madha", "Barshi", "Mohol (SC)", "Solapur City North", "Solapur City Central", "Akkalkot", "Solapur South", "Pandharpur", "Sangola", "Malshiras (SC)"],
        "Satara": ["Phaltan (SC)", "Wai", "Koregaon", "Man", "Karad North", "Karad South", "Patan", "Satara"],
        "Ratnagiri": ["Dapoli", "Guhagar", "Chiplun", "Ratnagiri", "Rajapur"],
        "Sindhudurg": ["Kankavli", "Kudal", "Sawantwadi"],
        "Kolhapur": ["Chandgad", "Radhanagari", "Kagal", "Kolhapur South", "Karvir", "Kolhapur North", "Shahuwadi", "Hatkanangle (SC)", "Ichalkaranji", "Shirol"],
        "Sangli": ["Miraj (SC)", "Sangli", "Islampur", "Shirala", "Palus-Kadegaon", "Khanapur", "Tasgaon-Kavathe Mahankal", "Jat"]
    };

    // ============================================
    // MLA DATA WITH PHOTO URLs (Wikimedia / Wikipedia)
    // ============================================
    const mlaData = [
          // Nandurbar
    { constituency: "Akkalkuwa (ST)", mla: "Aamshya Padavi", party: "SHS", district: "Nandurbar", photo: "" },

    { constituency: "Shahada (ST)", mla: "Rajesh Padvi", party: "BJP", district: "Nandurbar", photo: "" },

    { constituency: "Nandurbar (ST)", mla: "Vijaykumar Gavit", party: "BJP", district: "Nandurbar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Vijaykumar_Gavit.jpg/220px-Vijaykumar_Gavit.jpg" },

    { constituency: "Navapur (ST)", mla: "Shirishkumar Naik", party: "INC", district: "Nandurbar", photo: "" },


    // Dhule
    { constituency: "Sakri (ST)", mla: "Manjula Gavit", party: "SHS", district: "Dhule", photo: "" },

    { constituency: "Dhule Rural", mla: "Raghavendra Patil", party: "BJP", district: "Dhule", photo: "" },

    { constituency: "Dhule City", mla: "Anup Agrawal", party: "BJP", district: "Dhule", photo: "" },

    { constituency: "Sindkheda", mla: "Jayakumar Rawal", party: "BJP", district: "Dhule", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Jaykumar_Rawal.jpg/220px-Jaykumar_Rawal.jpg" },

    { constituency: "Shirpur (ST)", mla: "Kashiram Pawara", party: "BJP", district: "Dhule", photo: "" },


    // Jalgaon
    { constituency: "Chopda (ST)", mla: "Chandrakant Sonawane", party: "SHS", district: "Jalgaon", photo: "" },

    { constituency: "Raver", mla: "Amol Jawale", party: "BJP", district: "Jalgaon", photo: "" },

    { constituency: "Bhusawal (SC)", mla: "Sanjay Savkare", party: "BJP", district: "Jalgaon", photo: "" },

    { constituency: "Jalgaon City", mla: "Suresh Bhole", party: "BJP", district: "Jalgaon", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Suresh_Bhole.jpg/220px-Suresh_Bhole.jpg" },

    { constituency: "Jalgaon Rural", mla: "Gulabrao Patil", party: "SHS", district: "Jalgaon", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Gulabrao_Patil.jpg/220px-Gulabrao_Patil.jpg" },

    { constituency: "Amalner", mla: "Anil Bhaidas Patil", party: "NCP", district: "Jalgaon", photo: "" },

    { constituency: "Erandol", mla: "Amol Patil", party: "SHS", district: "Jalgaon", photo: "" },

    { constituency: "Chalisgaon", mla: "Mangesh Chavan", party: "BJP", district: "Jalgaon", photo: "" },

    { constituency: "Pachora", mla: "Kishor Appa Patil", party: "SHS", district: "Jalgaon", photo: "" },

    { constituency: "Jamner", mla: "Girish Mahajan", party: "BJP", district: "Jalgaon", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Girish_Mahajan.JPG/220px-Girish_Mahajan.JPG" },

    { constituency: "Muktainagar", mla: "Chandrakant Nimba Patil", party: "SHS", district: "Jalgaon", photo: "" }
      // Buldana
{ constituency: "Malkapur", mla: "Chainsukh Sancheti", party: "BJP", district: "Buldana", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Chainsukh_Sancheti.jpg/220px-Chainsukh_Sancheti.jpg" },

{ constituency: "Buldhana", mla: "Sanjay Gaikwad", party: "SHS", district: "Buldana", photo: "" },

{ constituency: "Chikhali", mla: "Shweta Mahale", party: "BJP", district: "Buldana", photo: "" },

{ constituency: "Sindkhed Raja", mla: "Manoj Kayande", party: "NCP", district: "Buldana", photo: "" },

{ constituency: "Mehkar (SC)", mla: "Siddharth Kharat", party: "SS(UBT)", district: "Buldana", photo: "" },

{ constituency: "Khamgaon", mla: "Akash Fundkar", party: "BJP", district: "Buldana", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Akash_Fundkar.jpg/220px-Akash_Fundkar.jpg" },

{ constituency: "Jalgaon (Jamod)", mla: "Sanjay Kute", party: "BJP", district: "Buldana", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Sanjay_Kute.jpg/220px-Sanjay_Kute.jpg" },


// Akola
{ constituency: "Akot", mla: "Prakash Bharsakale", party: "BJP", district: "Akola", photo: "" },

{ constituency: "Balapur", mla: "Nitin Tale", party: "SS(UBT)", district: "Akola", photo: "" },

{ constituency: "Akola West", mla: "Sajid Khan Pathan", party: "INC", district: "Akola", photo: "" },

{ constituency: "Akola East", mla: "Randhir Savarkar", party: "BJP", district: "Akola", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Randhir_Savarkar.jpg/220px-Randhir_Savarkar.jpg" },

{ constituency: "Murtizapur (SC)", mla: "Harish Pimple", party: "BJP", district: "Akola", photo: "" },


// Washim
{ constituency: "Risod", mla: "Amit Zanak", party: "INC", district: "Washim", photo: "" },

{ constituency: "Washim (SC)", mla: "Shyam Khode", party: "BJP", district: "Washim", photo: "" },

{ constituency: "Karanja", mla: "Sai Prakash Dahake", party: "BJP", district: "Washim", photo: "" },


// Amravati
{ constituency: "Dhamangaon Railway", mla: "Pratap Adsad", party: "BJP", district: "Amravati", photo: "" },

{ constituency: "Badnera", mla: "Ravi Rana", party: "RYSP", district: "Amravati", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Ravi_Rana.jpg/220px-Ravi_Rana.jpg" },

{ constituency: "Amravati", mla: "Sulbha Khodke", party: "NCP", district: "Amravati", photo: "" },

{ constituency: "Teosa", mla: "Rajesh Wankhade", party: "BJP", district: "Amravati", photo: "" },

{ constituency: "Daryapur (SC)", mla: "Gajanan Lawate", party: "SS(UBT)", district: "Amravati", photo: "" },

{ constituency: "Melghat (ST)", mla: "Kewalram Kale", party: "BJP", district: "Amravati", photo: "" },

{ constituency: "Achalpur", mla: "Pravin Tayade", party: "BJP", district: "Amravati", photo: "" },

{ constituency: "Morshi", mla: "Chandu Yawalkar", party: "BJP", district: "Amravati", photo: "" },
     // Wardha
{ constituency: "Arvi", mla: "Sumit Wankhede", party: "BJP", district: "Wardha", photo: "" },

{ constituency: "Deoli", mla: "Rajesh Bakane", party: "BJP", district: "Wardha", photo: "" },

{ constituency: "Hinganghat", mla: "Samir Kunawar", party: "BJP", district: "Wardha", photo: "" },

{ constituency: "Wardha", mla: "Pankaj Bhoyar", party: "BJP", district: "Wardha", photo: "" },


// Nagpur
{ constituency: "Katol", mla: "Charansing Thakur", party: "BJP", district: "Nagpur", photo: "" },

{ constituency: "Savner", mla: "Ashish Deshmukh", party: "BJP", district: "Nagpur", photo: "" },

{ constituency: "Hingna", mla: "Sameer Meghe", party: "BJP", district: "Nagpur", photo: "" },

{ constituency: "Umred (SC)", mla: "Sanjay Meshram", party: "INC", district: "Nagpur", photo: "" },

{ constituency: "Nagpur South West", mla: "Devendra Fadnavis", party: "BJP", district: "Nagpur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Devendra_Fadnavis_2022.jpg/220px-Devendra_Fadnavis_2022.jpg" },

{ constituency: "Nagpur South", mla: "Mohan Mate", party: "BJP", district: "Nagpur", photo: "" },

{ constituency: "Nagpur East", mla: "Krishna Khopde", party: "BJP", district: "Nagpur", photo: "" },

{ constituency: "Nagpur Central", mla: "Pravin Datke", party: "BJP", district: "Nagpur", photo: "" },

{ constituency: "Nagpur West", mla: "Vikas Thakre", party: "INC", district: "Nagpur", photo: "" },

{ constituency: "Nagpur North (SC)", mla: "Nitin Raut", party: "INC", district: "Nagpur", photo: "" },

{ constituency: "Kamthi", mla: "Chandrashekhar Bawankule", party: "BJP", district: "Nagpur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Chandrashekhar_Bawankule.jpg/220px-Chandrashekhar_Bawankule.jpg" },

{ constituency: "Ramtek", mla: "Ashish Jaiswal", party: "SHS", district: "Nagpur", photo: "" },


// Bhandara
{ constituency: "Tumsar", mla: "Raju Karemore", party: "NCP", district: "Bhandara", photo: "" },

{ constituency: "Bhandara (SC)", mla: "Narendra Bhondekar", party: "SHS", district: "Bhandara", photo: "" },

{ constituency: "Sakoli", mla: "Nana Patole", party: "INC", district: "Bhandara", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Nana_Patole.jpg/220px-Nana_Patole.jpg" },


// Gondia
{ constituency: "Arjuni Morgaon (SC)", mla: "Rajkumar Badole", party: "NCP", district: "Gondia", photo: "" },

{ constituency: "Tirora", mla: "Vijay Rahangdale", party: "BJP", district: "Gondia", photo: "" },

{ constituency: "Gondiya", mla: "Vinod Agrawal", party: "BJP", district: "Gondia", photo: "" },

{ constituency: "Amgaon (ST)", mla: "Sanjay Puram", party: "BJP", district: "Gondia", photo: "" },


// Gadchiroli
{ constituency: "Armori (ST)", mla: "Ramdas Masram", party: "INC", district: "Gadchiroli", photo: "" },

{ constituency: "Gadchiroli (ST)", mla: "Milind Narote", party: "BJP", district: "Gadchiroli", photo: "" },

{ constituency: "Aheri (ST)", mla: "Dharamrao Baba Atram", party: "NCP", district: "Gadchiroli", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Dharamrao_Baba_Atram.jpg/220px-Dharamrao_Baba_Atram.jpg" },


// Chandrapur
{ constituency: "Rajura", mla: "Deorao Bhongle", party: "BJP", district: "Chandrapur", photo: "" },

{ constituency: "Chandrapur (SC)", mla: "Kishor Jorgewar", party: "BJP", district: "Chandrapur", photo: "" },

{ constituency: "Ballarpur", mla: "Sudhir Mungantiwar", party: "BJP", district: "Chandrapur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Sudhir_Mungantiwar.jpg/220px-Sudhir_Mungantiwar.jpg" },

{ constituency: "Bramhapuri", mla: "Vijay Wadettiwar", party: "INC", district: "Chandrapur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Vijay_Wadettiwar.jpg/220px-Vijay_Wadettiwar.jpg" },

{ constituency: "Chimur", mla: "Bunty Bhangdiya", party: "BJP", district: "Chandrapur", photo: "" },

{ constituency: "Warora", mla: "Karan Deotale", party: "BJP", district: "Chandrapur", photo: "" },
      // Yavatmal
{ constituency: "Wani", mla: "Sanjay Derkar", party: "SS(UBT)", district: "Yavatmal", photo: "" },

{ constituency: "Ralegaon (ST)", mla: "Ashok Uike", party: "BJP", district: "Yavatmal", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Ashok_Uike.jpg/220px-Ashok_Uike.jpg" },

{ constituency: "Yavatmal", mla: "Balasaheb Mangulkar", party: "INC", district: "Yavatmal", photo: "" },

{ constituency: "Digras", mla: "Sanjay Rathod", party: "SHS", district: "Yavatmal", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Sanjay_Rathod.jpg/220px-Sanjay_Rathod.jpg" },

{ constituency: "Arni (ST)", mla: "Raju Todsam", party: "BJP", district: "Yavatmal", photo: "" },

{ constituency: "Pusad", mla: "Indranil Naik", party: "NCP", district: "Yavatmal", photo: "" },

{ constituency: "Umarkhed (SC)", mla: "Kisan Wankhede", party: "BJP", district: "Yavatmal", photo: "" },


// Nanded
{ constituency: "Kinwat", mla: "Bhimrao Keram", party: "BJP", district: "Nanded", photo: "" },

{ constituency: "Hadgaon", mla: "Baburao Kadam", party: "SHS", district: "Nanded", photo: "" },

{ constituency: "Bhokar", mla: "Sreejaya Chavan", party: "BJP", district: "Nanded", photo: "" },

{ constituency: "Nanded North", mla: "Balaji Kalyankar", party: "SHS", district: "Nanded", photo: "" },

{ constituency: "Nanded South", mla: "Anand Tidke", party: "SHS", district: "Nanded", photo: "" },

{ constituency: "Loha", mla: "Prataprao Chikhalikar", party: "NCP", district: "Nanded", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Prataprao_Chikhalikar.jpg/220px-Prataprao_Chikhalikar.jpg" },

{ constituency: "Naigaon", mla: "Rajesh Pawar", party: "BJP", district: "Nanded", photo: "" },

{ constituency: "Deglur (SC)", mla: "Jitesh Antapurkar", party: "BJP", district: "Nanded", photo: "" },

{ constituency: "Mukhed", mla: "Tushar Rathod", party: "BJP", district: "Nanded", photo: "" },


// Hingoli
{ constituency: "Basmath", mla: "Chandrakant Nawghare", party: "NCP", district: "Hingoli", photo: "" },

{ constituency: "Kalamnuri", mla: "Santosh Bangar", party: "SHS", district: "Hingoli", photo: "" },

{ constituency: "Hingoli", mla: "Tanaji Mutkule", party: "BJP", district: "Hingoli", photo: "" },


// Parbhani
{ constituency: "Jintur", mla: "Meghana Bordikar", party: "BJP", district: "Parbhani", photo: "" },

{ constituency: "Parbhani", mla: "Rahul Vedprakash Patil", party: "SS(UBT)", district: "Parbhani", photo: "" },

{ constituency: "Gangakhed", mla: "Ratnakar Gutte", party: "RSPS", district: "Parbhani", photo: "" },

{ constituency: "Pathri", mla: "Rajesh Vitekar", party: "NCP", district: "Parbhani", photo: "" },


// Jalna
{ constituency: "Partur", mla: "Babanrao Lonikar", party: "BJP", district: "Jalna", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Babanrao_Lonikar.jpg/220px-Babanrao_Lonikar.jpg" },

{ constituency: "Ghansawangi", mla: "Hikmat Udhan", party: "SHS", district: "Jalna", photo: "" },

{ constituency: "Jalna", mla: "Arjun Khotkar", party: "SHS", district: "Jalna", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Arjun_Khotkar.jpg/220px-Arjun_Khotkar.jpg" },

{ constituency: "Badnapur (SC)", mla: "Narayan Kuche", party: "BJP", district: "Jalna", photo: "" },

{ constituency: "Bhokardan", mla: "Santosh Danve", party: "BJP", district: "Jalna", photo: "" },


// Chhatrapati Sambhaji Nagar
{ constituency: "Sillod", mla: "Abdul Sattar", party: "SHS", district: "Chhatrapati Sambhaji Nagar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Abdul_Sattar_Maharashtra.jpg/220px-Abdul_Sattar_Maharashtra.jpg" },

{ constituency: "Kannad", mla: "Sanjana Jadhav", party: "SHS", district: "Chhatrapati Sambhaji Nagar", photo: "" },

{ constituency: "Phulambri", mla: "Anuradha Chavan", party: "BJP", district: "Chhatrapati Sambhaji Nagar", photo: "" },

{ constituency: "Aurangabad Central", mla: "Pradeep Jaiswal", party: "SHS", district: "Chhatrapati Sambhaji Nagar", photo: "" },

{ constituency: "Aurangabad West (SC)", mla: "Sanjay Shirsat", party: "SHS", district: "Chhatrapati Sambhaji Nagar", photo: "" },

{ constituency: "Aurangabad East", mla: "Atul Save", party: "BJP", district: "Chhatrapati Sambhaji Nagar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Atul_Save.jpg/220px-Atul_Save.jpg" },

{ constituency: "Paithan", mla: "Vilas Bhumre", party: "SHS", district: "Chhatrapati Sambhaji Nagar", photo: "" },

{ constituency: "Gangapur", mla: "Prashant Bamb", party: "BJP", district: "Chhatrapati Sambhaji Nagar", photo: "" },

{ constituency: "Vaijapur", mla: "Ramesh Bornare", party: "SHS", district: "Chhatrapati Sambhaji Nagar", photo: "" },
       // Nashik
{ constituency: "Nandgaon", mla: "Suhas Kande", party: "SHS", district: "Nashik", photo: "" },

{ constituency: "Malegaon Central", mla: "Ismail Abdul Khalique", party: "AIMIM", district: "Nashik", photo: "" },

{ constituency: "Malegaon Outer", mla: "Dadaji Bhuse", party: "SHS", district: "Nashik", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Dadaji_Bhuse.jpg/220px-Dadaji_Bhuse.jpg" },

{ constituency: "Baglan (ST)", mla: "Dilip Borse", party: "BJP", district: "Nashik", photo: "" },

{ constituency: "Kalwan (ST)", mla: "Nitin Pawar", party: "NCP", district: "Nashik", photo: "" },

{ constituency: "Chandwad", mla: "Rahul Aher", party: "BJP", district: "Nashik", photo: "" },

{ constituency: "Yevla", mla: "Chhagan Bhujbal", party: "NCP", district: "Nashik", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Chhagan_Bhujbal.jpg/220px-Chhagan_Bhujbal.jpg" },

{ constituency: "Sinnar", mla: "Manikrao Kokate", party: "NCP", district: "Nashik", photo: "" },

{ constituency: "Niphad", mla: "Diliprao Bankar", party: "NCP", district: "Nashik", photo: "" },

{ constituency: "Dindori (ST)", mla: "Narhari Zirwal", party: "NCP", district: "Nashik", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Narhari_Zirwal.jpg/220px-Narhari_Zirwal.jpg" },

{ constituency: "Nashik East", mla: "Rahul Dhikale", party: "BJP", district: "Nashik", photo: "" },

{ constituency: "Nashik Central", mla: "Devayani Farande", party: "BJP", district: "Nashik", photo: "" },

{ constituency: "Nashik West", mla: "Seema Hiray", party: "BJP", district: "Nashik", photo: "" },

{ constituency: "Deolali (SC)", mla: "Saroj Ahire", party: "NCP", district: "Nashik", photo: "" },

{ constituency: "Igatpuri (ST)", mla: "Hiraman Khoskar", party: "NCP", district: "Nashik", photo: "" },


// Palghar
{ constituency: "Dahanu (ST)", mla: "Vinod Bhiva Nikole", party: "CPI(M)", district: "Palghar", photo: "" },

{ constituency: "Vikramgad (ST)", mla: "Harishchandra Bhoye", party: "BJP", district: "Palghar", photo: "" },

{ constituency: "Palghar (ST)", mla: "Rajendra Gavit", party: "SHS", district: "Palghar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Rajendra_Gavit.jpg/220px-Rajendra_Gavit.jpg" },

{ constituency: "Boisar (ST)", mla: "Vilas Tare", party: "SHS", district: "Palghar", photo: "" },

{ constituency: "Nalasopara", mla: "Rajan Naik", party: "BJP", district: "Palghar", photo: "" },

{ constituency: "Vasai", mla: "Sneha Pandit", party: "NCP", district: "Palghar", photo: "" },


// Thane
{ constituency: "Bhiwandi Rural (ST)", mla: "Shantaram More", party: "SHS", district: "Thane", photo: "" },

{ constituency: "Shahapur (ST)", mla: "Daulat Daroda", party: "NCP", district: "Thane", photo: "" },

{ constituency: "Bhiwandi West", mla: "Mahesh Choughule", party: "BJP", district: "Thane", photo: "" },

{ constituency: "Bhiwandi East", mla: "Rais Shaikh", party: "SP", district: "Thane", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Rais_Shaikh.jpg/220px-Rais_Shaikh.jpg" },

{ constituency: "Kalyan West", mla: "Vishwanath Bhoir", party: "SHS", district: "Thane", photo: "" },

{ constituency: "Murbad", mla: "Kisan Kathore", party: "BJP", district: "Thane", photo: "" },

{ constituency: "Ambernath (SC)", mla: "Balaji Kinikar", party: "SHS", district: "Thane", photo: "" },

{ constituency: "Ulhasnagar", mla: "Kumar Ailani", party: "BJP", district: "Thane", photo: "" },

{ constituency: "Kalyan East", mla: "Sulbha Gaikwad", party: "BJP", district: "Thane", photo: "" },

{ constituency: "Dombivli", mla: "Ravindra Chavan", party: "BJP", district: "Thane", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Ravindra_Chavan.jpg/220px-Ravindra_Chavan.jpg" },

{ constituency: "Kalyan Rural", mla: "Rajesh More", party: "SHS", district: "Thane", photo: "" },

{ constituency: "Ovala-Majiwada", mla: "Pratap Sarnaik", party: "SHS", district: "Thane", photo: "" },

{ constituency: "Kopri-Pachpakhadi", mla: "Eknath Shinde", party: "SHS", district: "Thane", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Eknath_Shinde.jpg/220px-Eknath_Shinde.jpg" },

{ constituency: "Mumbra-Kalwa", mla: "Jitendra Awhad", party: "NCP-SP", district: "Thane", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Jitendra_Awhad.jpg/220px-Jitendra_Awhad.jpg" },


// Mumbai Suburban
{ constituency: "Dahisar", mla: "Manisha Chaudhary", party: "BJP", district: "Mumbai Suburban", photo: "" },

{ constituency: "Mulund", mla: "Mihir Kotecha", party: "BJP", district: "Mumbai Suburban", photo: "" },

{ constituency: "Dindoshi", mla: "Sunil Prabhu", party: "SS(UBT)", district: "Mumbai Suburban", photo: "" },

{ constituency: "Kandivali East", mla: "Atul Bhatkhalkar", party: "BJP", district: "Mumbai Suburban", photo: "" },

{ constituency: "Malad West", mla: "Aslam Shaikh", party: "INC", district: "Mumbai Suburban", photo: "" },

{ constituency: "Goregaon", mla: "Vidya Thakur", party: "BJP", district: "Mumbai Suburban", photo: "" },

{ constituency: "Andheri West", mla: "Ameet Satam", party: "BJP", district: "Mumbai Suburban", photo: "" },

{ constituency: "Vile Parle", mla: "Parag Alavani", party: "BJP", district: "Mumbai Suburban", photo: "" },

{ constituency: "Ghatkopar West", mla: "Ram Kadam", party: "BJP", district: "Mumbai Suburban", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Ram_Kadam.jpg/220px-Ram_Kadam.jpg" },

{ constituency: "Vandre West", mla: "Ashish Shelar", party: "BJP", district: "Mumbai Suburban", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Ashish_Shelar.jpg/220px-Ashish_Shelar.jpg" },


// Mumbai City
{ constituency: "Dharavi (SC)", mla: "Jyoti Gaikwad", party: "INC", district: "Mumbai City", photo: "" },

{ constituency: "Sion Koliwada", mla: "R. Tamil Selvan", party: "BJP", district: "Mumbai City", photo: "" },

{ constituency: "Wadala", mla: "Kalidas Kolambkar", party: "BJP", district: "Mumbai City", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Kalidas_Kolambkar.jpg/220px-Kalidas_Kolambkar.jpg" },

{ constituency: "Worli", mla: "Aaditya Thackeray", party: "SS(UBT)", district: "Mumbai City", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Aaditya_Thackeray.jpg/220px-Aaditya_Thackeray.jpg" },

{ constituency: "Malabar Hill", mla: "Mangal Lodha", party: "BJP", district: "Mumbai City", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Mangal_Prabhat_Lodha.jpg/220px-Mangal_Prabhat_Lodha.jpg" },

{ constituency: "Mumbadevi", mla: "Amin Patel", party: "INC", district: "Mumbai City", photo: "" },

{ constituency: "Colaba", mla: "Rahul Narwekar", party: "BJP", district: "Mumbai City", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Rahul_Narwekar.jpg/220px-Rahul_Narwekar.jpg" }
      // Raigad

{ constituency: "Panvel", mla: "Prashant Thakur", party: "BJP", district: "Raigad", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Prashant_Thakur.jpg/220px-Prashant_Thakur.jpg" },

{ constituency: "Karjat", mla: "Mahendra Thorve", party: "SHS", district: "Raigad", photo: "" },

{ constituency: "Uran", mla: "Mahesh Baldi", party: "BJP", district: "Raigad", photo: "" },

{ constituency: "Pen", mla: "Ravisheth Patil", party: "BJP", district: "Raigad", photo: "" },

{ constituency: "Alibag", mla: "Mahendra Dalvi", party: "SHS", district: "Raigad", photo: "" },

{ constituency: "Shrivardhan", mla: "Aditi Tatkare", party: "NCP", district: "Raigad", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Aditi_Tatkare.jpg/220px-Aditi_Tatkare.jpg" },

{ constituency: "Mahad", mla: "Bharatshet Gogawale", party: "SHS", district: "Raigad", photo: "" },


// Pune

{ constituency: "Junnar", mla: "Sharaddada Sonavane", party: "IND", district: "Pune", photo: "" },

{ constituency: "Ambegaon", mla: "Dilip Walse Patil", party: "NCP", district: "Pune", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Dilip_Walse_Patil.jpg/220px-Dilip_Walse_Patil.jpg" },

{ constituency: "Khed Alandi", mla: "Babaji Kale", party: "SS(UBT)", district: "Pune", photo: "" },

{ constituency: "Shirur", mla: "Dnyaneshwar Katke", party: "NCP", district: "Pune", photo: "" },

{ constituency: "Daund", mla: "Rahul Kul", party: "BJP", district: "Pune", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Rahul_Kul.jpg/220px-Rahul_Kul.jpg" },

{ constituency: "Indapur", mla: "Dattatray Bharne", party: "NCP", district: "Pune", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Dattatray_Bharne.jpg/220px-Dattatray_Bharne.jpg" },

{ constituency: "Baramati", mla: "Sunetra Pawar", party: "NCP", district: "Pune", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Sunetra_Pawar.jpg/220px-Sunetra_Pawar.jpg" },

{ constituency: "Purandar", mla: "Vijay Shivtare", party: "SHS", district: "Pune", photo: "" },

{ constituency: "Bhor", mla: "Shankar Mandekar", party: "NCP", district: "Pune", photo: "" },

{ constituency: "Maval", mla: "Sunil Shelke", party: "NCP", district: "Pune", photo: "" },

{ constituency: "Chinchwad", mla: "Shankar Jagtap", party: "BJP", district: "Pune", photo: "" },

{ constituency: "Pimpri (SC)", mla: "Anna Bansode", party: "NCP", district: "Pune", photo: "" },

{ constituency: "Bhosari", mla: "Mahesh Landge", party: "BJP", district: "Pune", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Mahesh_Landge.jpg/220px-Mahesh_Landge.jpg" },

{ constituency: "Vadgaon Sheri", mla: "Bapusaheb Pathare", party: "NCP-SP", district: "Pune", photo: "" },

{ constituency: "Shivajinagar", mla: "Siddharth Shirole", party: "BJP", district: "Pune", photo: "" },

{ constituency: "Kothrud", mla: "Chandrakant Patil", party: "BJP", district: "Pune", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Chandrakant_Patil.jpg/220px-Chandrakant_Patil.jpg" },

{ constituency: "Khadakwasala", mla: "Bhimrao Tapkir", party: "BJP", district: "Pune", photo: "" },

{ constituency: "Parvati", mla: "Madhuri Misal", party: "BJP", district: "Pune", photo: "" },

{ constituency: "Hadapsar", mla: "Chetan Tupe", party: "NCP", district: "Pune", photo: "" },

{ constituency: "Pune Cantonment", mla: "Sunil Kamble", party: "BJP", district: "Pune", photo: "" },

{ constituency: "Kasba Peth", mla: "Hemant Rasane", party: "BJP", district: "Pune", photo: "" },
// Ahmednagar

{ constituency: "Akole (ST)", mla: "Kiran Lahamate", party: "NCP", district: "Ahmednagar", photo: "" },

{ constituency: "Sangamner", mla: "Amol Khatal", party: "SHS", district: "Ahmednagar", photo: "" },

{ constituency: "Shirdi", mla: "Radhakrishna Vikhe Patil", party: "BJP", district: "Ahmednagar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Radhakrishna_Vikhe_Patil.jpg/220px-Radhakrishna_Vikhe_Patil.jpg" },

{ constituency: "Kopargaon", mla: "Ashutosh Kale", party: "NCP", district: "Ahmednagar", photo: "" },

{ constituency: "Shrirampur (SC)", mla: "Hemant Ogale", party: "INC", district: "Ahmednagar", photo: "" },

{ constituency: "Nevasa", mla: "Vitthalrao Langhe", party: "SHS", district: "Ahmednagar", photo: "" },

{ constituency: "Shevgaon", mla: "Monika Rajale", party: "BJP", district: "Ahmednagar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Monika_Rajale.jpg/220px-Monika_Rajale.jpg" },

{ constituency: "Rahuri", mla: "Akshay Shivajirao Kardile", party: "BJP", district: "Ahmednagar", photo: "" },

{ constituency: "Parner", mla: "Kashinath Date", party: "NCP", district: "Ahmednagar", photo: "" },

{ constituency: "Ahmednagar City", mla: "Sangram Jagtap", party: "NCP", district: "Ahmednagar", photo: "" },

{ constituency: "Shrigonda", mla: "Vikram Pachpute", party: "BJP", district: "Ahmednagar", photo: "" },

{ constituency: "Karjat Jamkhed", mla: "Rohit Pawar", party: "NCP-SP", district: "Ahmednagar", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Rohit_Pawar.jpg/220px-Rohit_Pawar.jpg" },


// Beed

{ constituency: "Georai (SC)", mla: "Vijaysinh Pandit", party: "NCP", district: "Beed", photo: "" },

{ constituency: "Majalgaon", mla: "Prakashdada Solanke", party: "NCP", district: "Beed", photo: "" },

{ constituency: "Beed", mla: "Sandeep Kshirsagar", party: "NCP-SP", district: "Beed", photo: "" },

{ constituency: "Ashti", mla: "Suresh Dhas", party: "BJP", district: "Beed", photo: "" },

{ constituency: "Kaij (SC)", mla: "Namita Mundada", party: "BJP", district: "Beed", photo: "" },

{ constituency: "Parli", mla: "Dhananjay Munde", party: "NCP", district: "Beed", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Dhananjay_Munde.jpg/220px-Dhananjay_Munde.jpg" },


// Latur

{ constituency: "Latur Rural", mla: "Ramesh Karad", party: "BJP", district: "Latur", photo: "" },

{ constituency: "Latur City", mla: "Amit Deshmukh", party: "INC", district: "Latur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Amit_Deshmukh.jpg/220px-Amit_Deshmukh.jpg" },

{ constituency: "Ahmadpur", mla: "Babasaheb Patil", party: "NCP", district: "Latur", photo: "" },

{ constituency: "Udgir (SC)", mla: "Sanjay Bansode", party: "NCP", district: "Latur", photo: "" },

{ constituency: "Nilanga", mla: "Sambhaji Patil Nilangekar", party: "BJP", district: "Latur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Sambhaji_Patil_Nilangekar.jpg/220px-Sambhaji_Patil_Nilangekar.jpg" },

{ constituency: "Ausa", mla: "Abhimanyu Pawar", party: "BJP", district: "Latur", photo: "" },


// Dharashiv

{ constituency: "Umarga (SC)", mla: "Pravin Virbhadrayya Swami", party: "SS(UBT)", district: "Dharashiv", photo: "" },

{ constituency: "Tuljapur", mla: "Ranajagjitsinha Patil", party: "BJP", district: "Dharashiv", photo: "" },

{ constituency: "Dharashiv", mla: "Kailas Patil", party: "SS(UBT)", district: "Dharashiv", photo: "" },

{ constituency: "Paranda", mla: "Tanaji Sawant", party: "SHS", district: "Dharashiv", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Tanaji_Sawant.jpg/220px-Tanaji_Sawant.jpg" },


// Solapur

{ constituency: "Karmala", mla: "Narayan Patil", party: "NCP-SP", district: "Solapur", photo: "" },

{ constituency: "Madha", mla: "Abhijeet Patil", party: "NCP-SP", district: "Solapur", photo: "" },

{ constituency: "Barshi", mla: "Dilip Sopal", party: "SS(UBT)", district: "Solapur", photo: "" },

{ constituency: "Mohol (SC)", mla: "Raju Khare", party: "NCP-SP", district: "Solapur", photo: "" },

{ constituency: "Solapur City North", mla: "Vijay Deshmukh", party: "BJP", district: "Solapur", photo: "" },

{ constituency: "Solapur City Central", mla: "Devendra Kothe", party: "BJP", district: "Solapur", photo: "" },

{ constituency: "Akkalkot", mla: "Sachin Kalyanshetti", party: "BJP", district: "Solapur", photo: "" },

{ constituency: "Solapur South", mla: "Subhash Deshmukh", party: "BJP", district: "Solapur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Subhash_Deshmukh.jpg/220px-Subhash_Deshmukh.jpg" },

{ constituency: "Pandharpur", mla: "Samadhan Autade", party: "BJP", district: "Solapur", photo: "" },

{ constituency: "Sangola", mla: "Babasaheb Deshmukh", party: "PWPI", district: "Solapur", photo: "" },

{ constituency: "Malshiras (SC)", mla: "Uttamrao Jankar", party: "NCP-SP", district: "Solapur", photo: "" },
      
// Satara

{ constituency: "Phaltan (SC)", mla: "Sachin Patil", party: "NCP", district: "Satara", photo: "" },

{ constituency: "Wai", mla: "Makrand Jadhav - Patil", party: "NCP-SP", district: "Satara", photo: "" },

{ constituency: "Koregaon", mla: "Mahesh Shinde", party: "SHS", district: "Satara", photo: "" },

{ constituency: "Man", mla: "Jaykumar Gore", party: "BJP", district: "Satara", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Jaykumar_Gore.jpg/220px-Jaykumar_Gore.jpg" },

{ constituency: "Karad North", mla: "Manoj Ghorpade", party: "BJP", district: "Satara", photo: "" },

{ constituency: "Karad South", mla: "Atulbaba Bhosale", party: "BJP", district: "Satara", photo: "" },

{ constituency: "Patan", mla: "Shambhuraj Desai", party: "SHS", district: "Satara", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Shambhuraj_Desai.jpg/220px-Shambhuraj_Desai.jpg" },

{ constituency: "Satara", mla: "Shivendra Raje Bhosale", party: "BJP", district: "Satara", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Shivendra_Raje_Bhosale.jpg/220px-Shivendra_Raje_Bhosale.jpg" },


// Ratnagiri

{ constituency: "Dapoli", mla: "Yogesh Kadam", party: "SHS", district: "Ratnagiri", photo: "" },

{ constituency: "Guhagar", mla: "Bhaskar Jadhav", party: "SS(UBT)", district: "Ratnagiri", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Bhaskar_Jadhav.jpg/220px-Bhaskar_Jadhav.jpg" },

{ constituency: "Chiplun", mla: "Shekhar Nikam", party: "NCP", district: "Ratnagiri", photo: "" },

{ constituency: "Ratnagiri", mla: "Uday Samant", party: "SHS", district: "Ratnagiri", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Uday_Samant.jpg/220px-Uday_Samant.jpg" },

{ constituency: "Rajapur", mla: "Kiran Samant", party: "SHS", district: "Ratnagiri", photo: "" },


// Sindhudurg

{ constituency: "Kankavli", mla: "Nitesh Rane", party: "BJP", district: "Sindhudurg", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Nitesh_Rane.jpg/220px-Nitesh_Rane.jpg" },

{ constituency: "Kudal", mla: "Nilesh Rane", party: "SHS", district: "Sindhudurg", photo: "" },

{ constituency: "Sawantwadi", mla: "Deepak Kesarkar", party: "SHS", district: "Sindhudurg", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/Deepak_Kesarkar.jpg/220px-Deepak_Kesarkar.jpg" },


// Kolhapur

{ constituency: "Chandgad", mla: "Shivaji Patil", party: "IND", district: "Kolhapur", photo: "" },

{ constituency: "Radhanagari", mla: "Prakashrao Abitkar", party: "SHS", district: "Kolhapur", photo: "" },

{ constituency: "Kagal", mla: "Hasan Mushrif", party: "NCP", district: "Kolhapur", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Hasan_Mushrif.jpg/220px-Hasan_Mushrif.jpg" },

{ constituency: "Kolhapur South", mla: "Amal Mahadik", party: "BJP", district: "Kolhapur", photo: "" },

{ constituency: "Karvir", mla: "Chandradip Narke", party: "SHS", district: "Kolhapur", photo: "" },

{ constituency: "Kolhapur North", mla: "Rajesh Kshirsagar", party: "SHS", district: "Kolhapur", photo: "" },

{ constituency: "Shahuwadi", mla: "Vinay Kore", party: "JSS", district: "Kolhapur", photo: "" },

{ constituency: "Hatkanangle (SC)", mla: "Ashokrao Mane", party: "JSS", district: "Kolhapur", photo: "" },

{ constituency: "Ichalkaranji", mla: "Rahul Awade", party: "BJP", district: "Kolhapur", photo: "" },

{ constituency: "Shirol", mla: "Rajendra Patil Yadravkar", party: "RSVA", district: "Kolhapur", photo: "" },


// Sangli

{ constituency: "Miraj (SC)", mla: "Suresh Khade", party: "BJP", district: "Sangli", photo: "" },

{ constituency: "Sangli", mla: "Sudhir Gadgil", party: "BJP", district: "Sangli", photo: "" },

{ constituency: "Islampur", mla: "Jayant Patil", party: "NCP-SP", district: "Sangli", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Jayant_Patil.jpg/220px-Jayant_Patil.jpg" },

{ constituency: "Shirala", mla: "Satyajit Deshmukh", party: "BJP", district: "Sangli", photo: "" },

{ constituency: "Palus-Kadegaon", mla: "Vishwajeet Kadam", party: "INC", district: "Sangli", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Vishwajeet_Kadam.jpg/220px-Vishwajeet_Kadam.jpg" },

{ constituency: "Khanapur", mla: "Suhas Babar", party: "SHS", district: "Sangli", photo: "" },

{ constituency: "Tasgaon-Kavathe Mahankal", mla: "Rohit Patil", party: "NCP-SP", district: "Sangli", photo: "" },

{ constituency: "Jat", mla: "Gopichand Padalkar", party: "BJP", district: "Sangli", photo: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Gopichand_Padalkar.jpg/220px-Gopichand_Padalkar.jpg" }
    ];

    // ============================================
    // DOM ELEMENTS
    // ============================================
    const districtSelect = document.getElementById('districtSelect');
    const constituencySelect = document.getElementById('constituencySelect');

    // MLA display elements
    const mlaPhotoDisplay = document.getElementById('mlaPhotoDisplay');
    const mlaNameDisplay = document.getElementById('mlaNameDisplay');
    const mlaPartyDisplay = document.getElementById('mlaPartyDisplay');
    const mlaConstituencyDisplay = document.getElementById('mlaConstituencyDisplay');
    const mlaDistrictDisplay = document.getElementById('mlaDistrictDisplay');
    const mlaIdDisplay = document.getElementById('mlaIdDisplay');

    // Hidden fields
    const mlaNameHidden = document.getElementById('mlaNameHidden');
    const mlaPartyHidden = document.getElementById('mlaPartyHidden');
    const mlaIdHidden = document.getElementById('mlaIdHidden');

    // ============================================
    // POPULATE DISTRICTS
    // ============================================
    function populateDistricts() {
        const districts = Object.keys(maharashtraData).sort();
        districts.forEach(dist => {
            const option = document.createElement('option');
            option.value = dist;
            option.textContent = dist;
            districtSelect.appendChild(option);
        });
    }
    populateDistricts();

    // ============================================
    // DISTRICT CHANGE → LOAD CONSTITUENCIES
    // ============================================
    districtSelect.addEventListener('change', function() {
        const selectedDistrict = this.value;
        constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
        constituencySelect.disabled = true;
        resetMlaDisplay();

        if (selectedDistrict && maharashtraData[selectedDistrict]) {
            const constituencies = maharashtraData[selectedDistrict];
            constituencies.forEach(cons => {
                const option = document.createElement('option');
                option.value = cons;
                option.textContent = cons;
                constituencySelect.appendChild(option);
            });
            constituencySelect.disabled = false;
        }
    });

    // ============================================
    // CONSTITUENCY CHANGE → AUTO-MAP MLA WITH PHOTO
    // ============================================
    constituencySelect.addEventListener('change', function() {
        const selectedConstituency = this.value;
        const selectedDistrict = districtSelect.value;

        if (selectedConstituency && selectedDistrict) {
            const mla = mlaData.find(m => m.constituency === selectedConstituency && m.district === selectedDistrict);
            if (mla) {
                // Update display
                const photoUrl = mla.photo && mla.photo.trim() !== '' ? mla.photo : defaultMLAImage;
                mlaPhotoDisplay.src = photoUrl;
                mlaPhotoDisplay.alt = `Photo of ${mla.mla}`;
                mlaNameDisplay.textContent = mla.mla;
                mlaPartyDisplay.textContent = mla.party;
                mlaConstituencyDisplay.textContent = mla.constituency;
                mlaDistrictDisplay.textContent = mla.district;
                mlaIdDisplay.textContent = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;

                // Hidden fields
                mlaNameHidden.value = mla.mla;
                mlaPartyHidden.value = mla.party;
                mlaIdHidden.value = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;
            } else {
                resetMlaDisplay();
                alert('⚠️ No MLA found for the selected constituency. Please verify the data.');
            }
        } else {
            resetMlaDisplay();
        }
    });

    // ============================================
    // RESET MLA DISPLAY
    // ============================================
    function resetMlaDisplay() {
        mlaPhotoDisplay.src = defaultMLAImage;
        mlaPhotoDisplay.alt = 'Default MLA Photo';
        mlaNameDisplay.textContent = 'Select constituency';
        mlaPartyDisplay.textContent = '—';
        mlaConstituencyDisplay.textContent = '—';
        mlaDistrictDisplay.textContent = '—';
        mlaIdDisplay.textContent = 'Auto-mapped';
        mlaNameHidden.value = '';
        mlaPartyHidden.value = '';
        mlaIdHidden.value = '';
    }

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
        const targetStep = document.querySelector(`.form-step[data-step="${step}"]`);
        if (targetStep) {
            targetStep.classList.add('active');
        }
        updateStepIndicators(step);
        updateProfileCompletion(step);
    }

    function nextStep(current) {
        if (!validateStep(current)) return;
        let next = current + 1;
        if (current === 3) {
            const district = districtSelect.value;
            const constituency = constituencySelect.value;
            const voterId = document.getElementById('voterIdInput').value.trim();
            if (!voterId) { alert('⚠️ Voter ID is required. Please go back to Step 1.'); return; }
            if (!district) { alert('⚠️ Please select a District.'); return; }
            if (!constituency) { alert('⚠️ Please select a Constituency.'); return; }
            const mla = mlaData.find(m => m.constituency === constituency && m.district === district);
            if (!mla) { alert('⚠️ No MLA found for the selected constituency.'); return; }
        }
        if (next === 4) {
            const constituency = constituencySelect.value;
            const district = districtSelect.value;
            if (!constituency || !district) {
                alert('⚠️ Please select District and Constituency first.');
                return;
            }
            const mla = mlaData.find(m => m.constituency === constituency && m.district === district);
            if (!mla) {
                alert('⚠️ No MLA mapping available. Please verify your selection.');
                return;
            }
            // Update MLA display with photo
            const photoUrl = mla.photo && mla.photo.trim() !== '' ? mla.photo : defaultMLAImage;
            mlaPhotoDisplay.src = photoUrl;
            mlaPhotoDisplay.alt = `Photo of ${mla.mla}`;
            mlaNameDisplay.textContent = mla.mla;
            mlaPartyDisplay.textContent = mla.party;
            mlaConstituencyDisplay.textContent = mla.constituency;
            mlaDistrictDisplay.textContent = mla.district;
            mlaIdDisplay.textContent = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;
            mlaNameHidden.value = mla.mla;
            mlaPartyHidden.value = mla.party;
            mlaIdHidden.value = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;
        }
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

    // ============================================
    // VALIDATION
    // ============================================
    function validateStep(step) {
        switch(step) {
            case 1:
                const voterId = document.getElementById('voterIdInput').value.trim();
                const fullName = document.querySelector('input[name="full_name"]').value.trim();
                const dob = document.querySelector('input[name="dob"]').value;
                const gender = document.querySelector('select[name="gender"]').value;
                if (!voterId) { alert('⚠️ Please enter your Voter ID.'); return false; }
                if (!fullName) { alert('⚠️ Please enter your Full Name.'); return false; }
                if (!dob) { alert('⚠️ Please select your Date of Birth.'); return false; }
                if (!gender) { alert('⚠️ Please select your Gender.'); return false; }
                return true;
            case 2:
                const password = document.getElementById('passwordField').value;
                const confirmPassword = document.getElementById('confirmPasswordField').value;
                if (password.length < 8) { alert('⚠️ Password must be at least 8 characters.'); return false; }
                if (password !== confirmPassword) { alert('⚠️ Passwords do not match.'); return false; }
                return true;
            case 3:
                const district = districtSelect.value;
                const constituency = constituencySelect.value;
                const pincode = document.querySelector('input[name="pincode"]').value.trim();
                const locality = document.querySelector('input[name="locality"]').value.trim();
                if (!district) { alert('⚠️ Please select a District.'); return false; }
                if (!constituency) { alert('⚠️ Please select a Constituency.'); return false; }
                if (!pincode) { alert('⚠️ Please enter your Pincode.'); return false; }
                if (!locality) { alert('⚠️ Please enter your Locality/Area.'); return false; }
                return true;
            default: return true;
        }
    }

    // ============================================
    // UPDATE STEP INDICATORS
    // ============================================
    function updateStepIndicators(currentStep) {
        document.querySelectorAll('.step-dot').forEach((dot, index) => {
            const stepNum = index + 1;
            dot.classList.remove('active', 'completed');
            if (stepNum === currentStep) dot.classList.add('active');
            else if (stepNum < currentStep) dot.classList.add('completed');
        });
    }

    // ============================================
    // UPDATE PROFILE COMPLETION
    // ============================================
    function updateProfileCompletion(step) {
        const percentages = {1: 20, 2: 40, 3: 60, 4: 80, 5: 100};
        const badge = document.getElementById('completionBadge');
        if (badge && percentages[step]) {
            badge.textContent = `Profile: ${percentages[step]}%`;
        }
    }

    // ============================================
    // FORM SUBMIT VALIDATION
    // ============================================
    document.getElementById('regForm').addEventListener('submit', function(e) {
        if (!validateStep(1) || !validateStep(2) || !validateStep(3)) {
            e.preventDefault();
            return false;
        }
        const voterId = document.getElementById('voterIdInput').value.trim();
        const district = districtSelect.value;
        const constituency = constituencySelect.value;
        if (!voterId || !district || !constituency) {
            e.preventDefault();
            alert('⚠️ Please complete all required fields.');
            return false;
        }
        const mla = mlaData.find(m => m.constituency === constituency && m.district === district);
        if (!mla) {
            e.preventDefault();
            alert('⚠️ No MLA assigned for this constituency. Registration cannot be completed.');
            return false;
        }
        mlaNameHidden.value = mla.mla;
        mlaPartyHidden.value = mla.party;
        mlaIdHidden.value = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;
        if (!confirm('Are you sure all details are correct? This will register you as a voter.')) {
            e.preventDefault();
            return false;
        }
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

    console.log('✅ Registration form with MLA photos loaded successfully!');
</script>

</body>
</html>