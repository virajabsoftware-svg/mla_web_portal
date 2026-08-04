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
                        <label class="form-label">Voter ID <span class="required">*</span></label>
                        <input type="text" class="form-control" id="voterIdInput" placeholder="Enter Voter ID" required>
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
                        <label class="form-label">Email Address <span class="optional">(Optional)</span></label>
                        <input type="email" class="form-control" placeholder="voter@example.com">
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
                               
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">District <span class="required">*</span></label>
                            <select class="form-select" id="districtSelect" required>
                                <option value="">Select District</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Constituency<span class="required">*</span></label>
                            <select class="form-select" id="constituencySelect" required disabled>
                                <option value="">Select Constituency</option>
                            </select>
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
                            <input type="text" class="form-control" id="mlaIdDisplay" value="Auto-mapped" disabled style="background:#eef0ee;">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Assigned MLA Name</label>
                            <input type="text" class="form-control" id="mlaNameDisplay" value="Select constituency" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Party Name</label>
                            <input type="text" class="form-control" id="mlaPartyDisplay" value="—" disabled style="background:#eef0ee;">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Constituency</label>
                            <input type="text" class="form-control" id="mlaConstituencyDisplay" value="—" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-12">
                            <label class="form-label">District</label>
                            <input type="text" class="form-control" id="mlaDistrictDisplay" value="—" disabled style="background:#eef0ee;">
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-teal" style="width: auto; padding: 0.5rem 1.5rem;" onclick="prevStep(4)">Back</button>
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
        // CORRECTED DATA: MAHARASHTRA DISTRICTS, CONSTITUENCIES & MLA
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
        // MLA DATA (corrected from provided dataset)
        // ============================================
        const mlaData = [
            // Nandurbar
            { constituency: "Akkalkuwa (ST)", mla: "Aamshya Padavi", party: "SHS", district: "Nandurbar" },
            { constituency: "Shahada (ST)", mla: "Rajesh Padvi", party: "BJP", district: "Nandurbar" },
            { constituency: "Nandurbar (ST)", mla: "Vijaykumar Gavit", party: "BJP", district: "Nandurbar" },
            { constituency: "Navapur (ST)", mla: "Shirishkumar Naik", party: "INC", district: "Nandurbar" },
            // Dhule
            { constituency: "Sakri (ST)", mla: "Manjula Gavit", party: "SHS", district: "Dhule" },
            { constituency: "Dhule Rural", mla: "Raghavendra Patil", party: "BJP", district: "Dhule" },
            { constituency: "Dhule City", mla: "Anup Agrawal", party: "BJP", district: "Dhule" },
            { constituency: "Sindkheda", mla: "Jayakumar Rawal", party: "BJP", district: "Dhule" },
            { constituency: "Shirpur (ST)", mla: "Kashiram Pawara", party: "BJP", district: "Dhule" },
            // Jalgaon
            { constituency: "Chopda (ST)", mla: "Chandrakant Sonawane", party: "SHS", district: "Jalgaon" },
            { constituency: "Raver", mla: "Amol Jawale", party: "BJP", district: "Jalgaon" },
            { constituency: "Bhusawal (SC)", mla: "Sanjay Savkare", party: "BJP", district: "Jalgaon" },
            { constituency: "Jalgaon City", mla: "Suresh Bhole", party: "BJP", district: "Jalgaon" },
            { constituency: "Jalgaon Rural", mla: "Gulabrao Patil", party: "SHS", district: "Jalgaon" },
            { constituency: "Amalner", mla: "Anil Bhaidas Patil", party: "NCP", district: "Jalgaon" },
            { constituency: "Erandol", mla: "Amol Patil", party: "SHS", district: "Jalgaon" },
            { constituency: "Chalisgaon", mla: "Mangesh Chavan", party: "BJP", district: "Jalgaon" },
            { constituency: "Pachora", mla: "Kishor Appa Patil", party: "SHS", district: "Jalgaon" },
            { constituency: "Jamner", mla: "Girish Mahajan", party: "BJP", district: "Jalgaon" },
            { constituency: "Muktainagar", mla: "Chandrakant Nimba Patil", party: "SHS", district: "Jalgaon" },
            // Buldana
            { constituency: "Malkapur", mla: "Chainsukh Sancheti", party: "BJP", district: "Buldana" },
            { constituency: "Buldhana", mla: "Sanjay Gaikwad", party: "SHS", district: "Buldana" },
            { constituency: "Chikhali", mla: "Shweta Mahale", party: "BJP", district: "Buldana" },
            { constituency: "Sindkhed Raja", mla: "Manoj Kayande", party: "NCP", district: "Buldana" },
            { constituency: "Mehkar (SC)", mla: "Siddharth Kharat", party: "SS(UBT)", district: "Buldana" },
            { constituency: "Khamgaon", mla: "Akash Fundkar", party: "BJP", district: "Buldana" },
            { constituency: "Jalgaon (Jamod)", mla: "Sanjay Kute", party: "BJP", district: "Buldana" },
            // Akola
            { constituency: "Akot", mla: "Prakash Bharsakale", party: "BJP", district: "Akola" },
            { constituency: "Balapur", mla: "Nitin Tale", party: "SS(UBT)", district: "Akola" },
            { constituency: "Akola West", mla: "Sajid Khan Pathan", party: "INC", district: "Akola" },
            { constituency: "Akola East", mla: "Randhir Savarkar", party: "BJP", district: "Akola" },
            { constituency: "Murtizapur (SC)", mla: "Harish Pimple", party: "BJP", district: "Akola" },
            // Washim
            { constituency: "Risod", mla: "Amit Zanak", party: "INC", district: "Washim" },
            { constituency: "Washim (SC)", mla: "Shyam Khode", party: "BJP", district: "Washim" },
            { constituency: "Karanja", mla: "Sai Prakash Dahake", party: "BJP", district: "Washim" },
            // Amravati
            { constituency: "Dhamangaon Railway", mla: "Pratap Adsad", party: "BJP", district: "Amravati" },
            { constituency: "Badnera", mla: "Ravi Rana", party: "RYSP", district: "Amravati" },
            { constituency: "Amravati", mla: "Sulbha Khodke", party: "NCP", district: "Amravati" },
            { constituency: "Teosa", mla: "Rajesh Wankhade", party: "BJP", district: "Amravati" },
            { constituency: "Daryapur (SC)", mla: "Gajanan Lawate", party: "SS(UBT)", district: "Amravati" },
            { constituency: "Melghat (ST)", mla: "Kewalram Kale", party: "BJP", district: "Amravati" },
            { constituency: "Achalpur", mla: "Pravin Tayade", party: "BJP", district: "Amravati" },
            { constituency: "Morshi", mla: "Chandu Yawalkar", party: "BJP", district: "Amravati" },
            // Wardha
            { constituency: "Arvi", mla: "Sumit Wankhede", party: "BJP", district: "Wardha" },
            { constituency: "Deoli", mla: "Rajesh Bakane", party: "BJP", district: "Wardha" },
            { constituency: "Hinganghat", mla: "Samir Kunawar", party: "BJP", district: "Wardha" },
            { constituency: "Wardha", mla: "Pankaj Bhoyar", party: "BJP", district: "Wardha" },
            // Nagpur
            { constituency: "Katol", mla: "Charansing Thakur", party: "BJP", district: "Nagpur" },
            { constituency: "Savner", mla: "Ashish Deshmukh", party: "BJP", district: "Nagpur" },
            { constituency: "Hingna", mla: "Sameer Meghe", party: "BJP", district: "Nagpur" },
            { constituency: "Umred (SC)", mla: "Sanjay Meshram", party: "INC", district: "Nagpur" },
            { constituency: "Nagpur South West", mla: "Devendra Fadnavis", party: "BJP", district: "Nagpur" },
            { constituency: "Nagpur South", mla: "Mohan Mate", party: "BJP", district: "Nagpur" },
            { constituency: "Nagpur East", mla: "Krishna Khopde", party: "BJP", district: "Nagpur" },
            { constituency: "Nagpur Central", mla: "Pravin Datke", party: "BJP", district: "Nagpur" },
            { constituency: "Nagpur West", mla: "Vikas Thakre", party: "INC", district: "Nagpur" },
            { constituency: "Nagpur North (SC)", mla: "Nitin Raut", party: "INC", district: "Nagpur" },
            { constituency: "Kamthi", mla: "Chandrashekhar Bawankule", party: "BJP", district: "Nagpur" },
            { constituency: "Ramtek", mla: "Ashish Jaiswal", party: "SHS", district: "Nagpur" },
            // Bhandara
            { constituency: "Tumsar", mla: "Raju Karemore", party: "NCP", district: "Bhandara" },
            { constituency: "Bhandara (SC)", mla: "Narendra Bhondekar", party: "SHS", district: "Bhandara" },
            { constituency: "Sakoli", mla: "Nana Patole", party: "INC", district: "Bhandara" },
            // Gondia
            { constituency: "Arjuni Morgaon (SC)", mla: "Rajkumar Badole", party: "NCP", district: "Gondia" },
            { constituency: "Tirora", mla: "Vijay Rahangdale", party: "BJP", district: "Gondia" },
            { constituency: "Gondiya", mla: "Vinod Agrawal", party: "BJP", district: "Gondia" },
            { constituency: "Amgaon (ST)", mla: "Sanjay Puram", party: "BJP", district: "Gondia" },
            // Gadchiroli
            { constituency: "Armori (ST)", mla: "Ramdas Masram", party: "INC", district: "Gadchiroli" },
            { constituency: "Gadchiroli (ST)", mla: "Milind Narote", party: "BJP", district: "Gadchiroli" },
            { constituency: "Aheri (ST)", mla: "Dharamrao Baba Atram", party: "NCP", district: "Gadchiroli" },
            // Chandrapur
            { constituency: "Rajura", mla: "Deorao Bhongle", party: "BJP", district: "Chandrapur" },
            { constituency: "Chandrapur (SC)", mla: "Kishor Jorgewar", party: "BJP", district: "Chandrapur" },
            { constituency: "Ballarpur", mla: "Sudhir Mungantiwar", party: "BJP", district: "Chandrapur" },
            { constituency: "Bramhapuri", mla: "Vijay Wadettiwar", party: "INC", district: "Chandrapur" },
            { constituency: "Chimur", mla: "Bunty Bhangdiya", party: "BJP", district: "Chandrapur" },
            { constituency: "Warora", mla: "Karan Deotale", party: "BJP", district: "Chandrapur" },
            // Yavatmal
            { constituency: "Wani", mla: "Sanjay Derkar", party: "SS(UBT)", district: "Yavatmal" },
            { constituency: "Ralegaon (ST)", mla: "Ashok Uike", party: "BJP", district: "Yavatmal" },
            { constituency: "Yavatmal", mla: "Balasaheb Mangulkar", party: "INC", district: "Yavatmal" },
            { constituency: "Digras", mla: "Sanjay Rathod", party: "SHS", district: "Yavatmal" },
            { constituency: "Arni (ST)", mla: "Raju Todsam", party: "BJP", district: "Yavatmal" },
            { constituency: "Pusad", mla: "Indranil Naik", party: "NCP", district: "Yavatmal" },
            { constituency: "Umarkhed (SC)", mla: "Kisan Wankhede", party: "BJP", district: "Yavatmal" },
            // Nanded
            { constituency: "Kinwat", mla: "Bhimrao Keram", party: "BJP", district: "Nanded" },
            { constituency: "Hadgaon", mla: "Baburao Kadam", party: "SHS", district: "Nanded" },
            { constituency: "Bhokar", mla: "Sreejaya Chavan", party: "BJP", district: "Nanded" },
            { constituency: "Nanded North", mla: "Balaji Kalyankar", party: "SHS", district: "Nanded" },
            { constituency: "Nanded South", mla: "Anand Tidke", party: "SHS", district: "Nanded" },
            { constituency: "Loha", mla: "Prataprao Chikhalikar", party: "NCP", district: "Nanded" },
            { constituency: "Naigaon", mla: "Rajesh Pawar", party: "BJP", district: "Nanded" },
            { constituency: "Deglur (SC)", mla: "Jitesh Antapurkar", party: "BJP", district: "Nanded" },
            { constituency: "Mukhed", mla: "Tushar Rathod", party: "BJP", district: "Nanded" },
            // Hingoli
            { constituency: "Basmath", mla: "Chandrakant Nawghare", party: "NCP", district: "Hingoli" },
            { constituency: "Kalamnuri", mla: "Santosh Bangar", party: "SHS", district: "Hingoli" },
            { constituency: "Hingoli", mla: "Tanaji Mutkule", party: "BJP", district: "Hingoli" },
            // Parbhani
            { constituency: "Jintur", mla: "Meghana Bordikar", party: "BJP", district: "Parbhani" },
            { constituency: "Parbhani", mla: "Rahul Vedprakash Patil", party: "SS(UBT)", district: "Parbhani" },
            { constituency: "Gangakhed", mla: "Ratnakar Gutte", party: "RSPS", district: "Parbhani" },
            { constituency: "Pathri", mla: "Rajesh Vitekar", party: "NCP", district: "Parbhani" },
            // Jalna
            { constituency: "Partur", mla: "Babanrao Lonikar", party: "BJP", district: "Jalna" },
            { constituency: "Ghansawangi", mla: "Hikmat Udhan", party: "SHS", district: "Jalna" },
            { constituency: "Jalna", mla: "Arjun Khotkar", party: "SHS", district: "Jalna" },
            { constituency: "Badnapur (SC)", mla: "Narayan Kuche", party: "BJP", district: "Jalna" },
            { constituency: "Bhokardan", mla: "Santosh Danve", party: "BJP", district: "Jalna" },
            // Chhatrapati Sambhaji Nagar
            { constituency: "Sillod", mla: "Abdul Sattar", party: "SHS", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Kannad", mla: "Sanjana Jadhav", party: "SHS", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Phulambri", mla: "Anuradha Chavan", party: "BJP", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Aurangabad Central", mla: "Pradeep Jaiswal", party: "SHS", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Aurangabad West (SC)", mla: "Sanjay Shirsat", party: "SHS", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Aurangabad East", mla: "Atul Save", party: "BJP", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Paithan", mla: "Vilas Bhumre", party: "SHS", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Gangapur", mla: "Prashant Bamb", party: "BJP", district: "Chhatrapati Sambhaji Nagar" },
            { constituency: "Vaijapur", mla: "Ramesh Bornare", party: "SHS", district: "Chhatrapati Sambhaji Nagar" },
            // Nashik
            { constituency: "Nandgaon", mla: "Suhas Kande", party: "SHS", district: "Nashik" },
            { constituency: "Malegaon Central", mla: "Ismail Abdul Khalique", party: "AIMIM", district: "Nashik" },
            { constituency: "Malegaon Outer", mla: "Dadaji Bhuse", party: "SHS", district: "Nashik" },
            { constituency: "Baglan (ST)", mla: "Dilip Borse", party: "BJP", district: "Nashik" },
            { constituency: "Kalwan (ST)", mla: "Nitin Pawar", party: "NCP", district: "Nashik" },
            { constituency: "Chandwad", mla: "Rahul Aher", party: "BJP", district: "Nashik" },
            { constituency: "Yevla", mla: "Chhagan Bhujbal", party: "NCP", district: "Nashik" },
            { constituency: "Sinnar", mla: "Manikrao Kokate", party: "NCP", district: "Nashik" },
            { constituency: "Niphad", mla: "Diliprao Bankar", party: "NCP", district: "Nashik" },
            { constituency: "Dindori (ST)", mla: "Narhari Zirwal", party: "NCP", district: "Nashik" },
            { constituency: "Nashik East", mla: "Rahul Dhikale", party: "BJP", district: "Nashik" },
            { constituency: "Nashik Central", mla: "Devayani Farande", party: "BJP", district: "Nashik" },
            { constituency: "Nashik West", mla: "Seema Hiray", party: "BJP", district: "Nashik" },
            { constituency: "Deolali (SC)", mla: "Saroj Ahire", party: "NCP", district: "Nashik" },
            { constituency: "Igatpuri (ST)", mla: "Hiraman Khoskar", party: "NCP", district: "Nashik" },
            // Palghar
            { constituency: "Dahanu (ST)", mla: "Vinod Bhiva Nikole", party: "CPI(M)", district: "Palghar" },
            { constituency: "Vikramgad (ST)", mla: "Harishchandra Bhoye", party: "BJP", district: "Palghar" },
            { constituency: "Palghar (ST)", mla: "Rajendra Gavit", party: "SHS", district: "Palghar" },
            { constituency: "Boisar (ST)", mla: "Vilas Tare", party: "SHS", district: "Palghar" },
            { constituency: "Nalasopara", mla: "Rajan Naik", party: "BJP", district: "Palghar" },
            { constituency: "Vasai", mla: "Sneha Pandit", party: "NCP", district: "Palghar" },
            // Thane
            { constituency: "Bhiwandi Rural (ST)", mla: "Shantaram More", party: "SHS", district: "Thane" },
            { constituency: "Shahapur (ST)", mla: "Daulat Daroda", party: "NCP", district: "Thane" },
            { constituency: "Bhiwandi West", mla: "Mahesh Choughule", party: "BJP", district: "Thane" },
            { constituency: "Bhiwandi East", mla: "Rais Shaikh", party: "SP", district: "Thane" },
            { constituency: "Kalyan West", mla: "Vishwanath Bhoir", party: "SHS", district: "Thane" },
            { constituency: "Murbad", mla: "Kisan Kathore", party: "BJP", district: "Thane" },
            { constituency: "Ambernath (SC)", mla: "Balaji Kinikar", party: "SHS", district: "Thane" },
            { constituency: "Ulhasnagar", mla: "Kumar Ailani", party: "BJP", district: "Thane" },
            { constituency: "Kalyan East", mla: "Sulbha Gaikwad", party: "BJP", district: "Thane" },
            { constituency: "Dombivli", mla: "Ravindra Chavan", party: "BJP", district: "Thane" },
            { constituency: "Kalyan Rural", mla: "Rajesh More", party: "SHS", district: "Thane" },
            { constituency: "Mira Bhayandar", mla: "Narendra Mehta", party: "BJP", district: "Thane" },
            { constituency: "Ovala-Majiwada", mla: "Pratap Sarnaik", party: "SHS", district: "Thane" },
            { constituency: "Kopri-Pachpakhadi", mla: "Eknath Shinde", party: "SHS", district: "Thane" },
            { constituency: "Thane", mla: "Sanjay Kelkar", party: "BJP", district: "Thane" },
            { constituency: "Mumbra-Kalwa", mla: "Jitendra Awhad", party: "NCP-SP", district: "Thane" },
            { constituency: "Airoli", mla: "Ganesh Naik", party: "BJP", district: "Thane" },
            { constituency: "Belapur", mla: "Manda Mhatre", party: "BJP", district: "Thane" },
            // Mumbai Suburban
            { constituency: "Borivali", mla: "Sanjay Upadhyay", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Dahisar", mla: "Manisha Chaudhary", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Magathane", mla: "Prakash Surve", party: "SHS", district: "Mumbai Suburban" },
            { constituency: "Mulund", mla: "Mihir Kotecha", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Vikhroli", mla: "Sunil Raut", party: "SS(UBT)", district: "Mumbai Suburban" },
            { constituency: "Bhandup West", mla: "Ashok Patil", party: "SHS", district: "Mumbai Suburban" },
            { constituency: "Jogeshwari East", mla: "Anant Nar", party: "SS(UBT)", district: "Mumbai Suburban" },
            { constituency: "Dindoshi", mla: "Sunil Prabhu", party: "SS(UBT)", district: "Mumbai Suburban" },
            { constituency: "Kandivali East", mla: "Atul Bhatkhalkar", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Charkop", mla: "Yogesh Sagar", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Malad West", mla: "Aslam Shaikh", party: "INC", district: "Mumbai Suburban" },
            { constituency: "Goregaon", mla: "Vidya Thakur", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Versova", mla: "Haroon Rashid Khan", party: "SS(UBT)", district: "Mumbai Suburban" },
            { constituency: "Andheri West", mla: "Ameet Satam", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Andheri East", mla: "Murji Patel", party: "SHS", district: "Mumbai Suburban" },
            { constituency: "Vile Parle", mla: "Parag Alavani", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Chandivali", mla: "Dilip Lande", party: "SHS", district: "Mumbai Suburban" },
            { constituency: "Ghatkopar West", mla: "Ram Kadam", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Ghatkopar East", mla: "Parag Shah", party: "BJP", district: "Mumbai Suburban" },
            { constituency: "Mankhurd Shivaji Nagar", mla: "Abu Asim Azmi", party: "SP", district: "Mumbai Suburban" },
            { constituency: "Anushakti Nagar", mla: "Sana Malik", party: "NCP", district: "Mumbai Suburban" },
            { constituency: "Chembur", mla: "Tukaram Kate", party: "SHS", district: "Mumbai Suburban" },
            { constituency: "Kurla(SC)", mla: "Mangesh Kudalkar", party: "SHS", district: "Mumbai Suburban" },
            { constituency: "Kalina", mla: "Sanjay Potnis", party: "SS(UBT)", district: "Mumbai Suburban" },
            { constituency: "Vandre East", mla: "Varun Sardesai", party: "SS(UBT)", district: "Mumbai Suburban" },
            { constituency: "Vandre West", mla: "Ashish Shelar", party: "BJP", district: "Mumbai Suburban" },
            // Mumbai City
            { constituency: "Dharavi (SC)", mla: "Jyoti Gaikwad", party: "INC", district: "Mumbai City" },
            { constituency: "Sion Koliwada", mla: "R. Tamil Selvan", party: "BJP", district: "Mumbai City" },
            { constituency: "Wadala", mla: "Kalidas Kolambkar", party: "BJP", district: "Mumbai City" },
            { constituency: "Mahim", mla: "Mahesh Sawant", party: "SS(UBT)", district: "Mumbai City" },
            { constituency: "Worli", mla: "Aaditya Thackeray", party: "SS(UBT)", district: "Mumbai City" },
            { constituency: "Shivadi", mla: "Ajay Choudhari", party: "SHS", district: "Mumbai City" },
            { constituency: "Byculla", mla: "Manoj Jamsutkar", party: "SS(UBT)", district: "Mumbai City" },
            { constituency: "Malabar Hill", mla: "Mangal Lodha", party: "BJP", district: "Mumbai City" },
            { constituency: "Mumbadevi", mla: "Amin Patel", party: "INC", district: "Mumbai City" },
            { constituency: "Colaba", mla: "Rahul Narwekar", party: "BJP", district: "Mumbai City" },
            // Raigad
            { constituency: "Panvel", mla: "Prashant Thakur", party: "BJP", district: "Raigad" },
            { constituency: "Karjat", mla: "Mahendra Thorve", party: "SHS", district: "Raigad" },
            { constituency: "Uran", mla: "Mahesh Baldi", party: "BJP", district: "Raigad" },
            { constituency: "Pen", mla: "Ravisheth Patil", party: "BJP", district: "Raigad" },
            { constituency: "Alibag", mla: "Mahendra Dalvi", party: "SHS", district: "Raigad" },
            { constituency: "Shrivardhan", mla: "Aditi Tatkare", party: "NCP", district: "Raigad" },
            { constituency: "Mahad", mla: "Bharatshet Gogawale", party: "SHS", district: "Raigad" },
            // Pune
            { constituency: "Junnar", mla: "Sharaddada Sonavane", party: "IND", district: "Pune" },
            { constituency: "Ambegaon", mla: "Dilip Walse Patil", party: "NCP", district: "Pune" },
            { constituency: "Khed Alandi", mla: "Babaji Kale", party: "SS(UBT)", district: "Pune" },
            { constituency: "Shirur", mla: "Dnyaneshwar Katke", party: "NCP", district: "Pune" },
            { constituency: "Daund", mla: "Rahul Kul", party: "BJP", district: "Pune" },
            { constituency: "Indapur", mla: "Dattatray Bharne", party: "NCP", district: "Pune" },
            { constituency: "Baramati", mla: "Sunetra Pawar", party: "NCP", district: "Pune" },
            { constituency: "Purandar", mla: "Vijay Shivtare", party: "SHS", district: "Pune" },
            { constituency: "Bhor", mla: "Shankar Mandekar", party: "NCP", district: "Pune" },
            { constituency: "Maval", mla: "Sunil Shelke", party: "NCP", district: "Pune" },
            { constituency: "Chinchwad", mla: "Shankar Jagtap", party: "BJP", district: "Pune" },
            { constituency: "Pimpri (SC)", mla: "Anna Bansode", party: "NCP", district: "Pune" },
            { constituency: "Bhosari", mla: "Mahesh Landge", party: "BJP", district: "Pune" },
            { constituency: "Vadgaon Sheri", mla: "Bapusaheb Pathare", party: "NCP-SP", district: "Pune" },
            { constituency: "Shivajinagar", mla: "Siddharth Shirole", party: "BJP", district: "Pune" },
            { constituency: "Kothrud", mla: "Chandrakant Patil", party: "BJP", district: "Pune" },
            { constituency: "Khadakwasala", mla: "Bhimrao Tapkir", party: "BJP", district: "Pune" },
            { constituency: "Parvati", mla: "Madhuri Misal", party: "BJP", district: "Pune" },
            { constituency: "Hadapsar", mla: "Chetan Tupe", party: "NCP", district: "Pune" },
            { constituency: "Pune Cantonment", mla: "Sunil Kamble", party: "BJP", district: "Pune" },
            { constituency: "Kasba Peth", mla: "Hemant Rasane", party: "BJP", district: "Pune" },
            // Ahmednagar
            { constituency: "Akole (ST)", mla: "Kiran Lahamate", party: "NCP", district: "Ahmednagar" },
            { constituency: "Sangamner", mla: "Amol Khatal", party: "SHS", district: "Ahmednagar" },
            { constituency: "Shirdi", mla: "Radhakrishna Vikhe Patil", party: "BJP", district: "Ahmednagar" },
            { constituency: "Kopargaon", mla: "Ashutosh Kale", party: "NCP", district: "Ahmednagar" },
            { constituency: "Shrirampur (SC)", mla: "Hemant Ogale", party: "INC", district: "Ahmednagar" },
            { constituency: "Nevasa", mla: "Vitthalrao Langhe", party: "SHS", district: "Ahmednagar" },
            { constituency: "Shevgaon", mla: "Monika Rajale", party: "BJP", district: "Ahmednagar" },
            { constituency: "Rahuri", mla: "Akshay Shivajirao Kardile", party: "BJP", district: "Ahmednagar" },
            { constituency: "Parner", mla: "Kashinath Date", party: "NCP", district: "Ahmednagar" },
            { constituency: "Ahmednagar City", mla: "Sangram Jagtap", party: "NCP", district: "Ahmednagar" },
            { constituency: "Shrigonda", mla: "Vikram Pachpute", party: "BJP", district: "Ahmednagar" },
            { constituency: "Karjat Jamkhed", mla: "Rohit Pawar", party: "NCP-SP", district: "Ahmednagar" },
            // Beed
            { constituency: "Georai (SC)", mla: "Vijaysinh Pandit", party: "NCP", district: "Beed" },
            { constituency: "Majalgaon", mla: "Prakashdada Solanke", party: "NCP", district: "Beed" },
            { constituency: "Beed", mla: "Sandeep Kshirsagar", party: "NCP-SP", district: "Beed" },
            { constituency: "Ashti", mla: "Suresh Dhas", party: "BJP", district: "Beed" },
            { constituency: "Kaij (SC)", mla: "Namita Mundada", party: "BJP", district: "Beed" },
            { constituency: "Parli", mla: "Dhananjay Munde", party: "NCP", district: "Beed" },
            // Latur
            { constituency: "Latur Rural", mla: "Ramesh Karad", party: "BJP", district: "Latur" },
            { constituency: "Latur City", mla: "Amit Deshmukh", party: "INC", district: "Latur" },
            { constituency: "Ahmadpur", mla: "Babasaheb Patil", party: "NCP", district: "Latur" },
            { constituency: "Udgir (SC)", mla: "Sanjay Bansode", party: "NCP", district: "Latur" },
            { constituency: "Nilanga", mla: "Sambhaji Patil Nilangekar", party: "BJP", district: "Latur" },
            { constituency: "Ausa", mla: "Abhimanyu Pawar", party: "BJP", district: "Latur" },
            // Dharashiv
            { constituency: "Umarga (SC)", mla: "Pravin Virbhadrayya Swami", party: "SS(UBT)", district: "Dharashiv" },
            { constituency: "Tuljapur", mla: "Ranajagjitsinha Patil", party: "BJP", district: "Dharashiv" },
            { constituency: "Dharashiv", mla: "Kailas Patil", party: "SS(UBT)", district: "Dharashiv" },
            { constituency: "Paranda", mla: "Tanaji Sawant", party: "SHS", district: "Dharashiv" },
            // Solapur
            { constituency: "Karmala", mla: "Narayan Patil", party: "NCP-SP", district: "Solapur" },
            { constituency: "Madha", mla: "Abhijeet Patil", party: "NCP-SP", district: "Solapur" },
            { constituency: "Barshi", mla: "Dilip Sopal", party: "SS(UBT)", district: "Solapur" },
            { constituency: "Mohol (SC)", mla: "Raju Khare", party: "NCP-SP", district: "Solapur" },
            { constituency: "Solapur City North", mla: "Vijay Deshmukh", party: "BJP", district: "Solapur" },
            { constituency: "Solapur City Central", mla: "Devendra Kothe", party: "BJP", district: "Solapur" },
            { constituency: "Akkalkot", mla: "Sachin Kalyanshetti", party: "BJP", district: "Solapur" },
            { constituency: "Solapur South", mla: "Subhash Deshmukh", party: "BJP", district: "Solapur" },
            { constituency: "Pandharpur", mla: "Samadhan Autade", party: "BJP", district: "Solapur" },
            { constituency: "Sangola", mla: "Babasaheb Deshmukh", party: "PWPI", district: "Solapur" },
            { constituency: "Malshiras (SC)", mla: "Uttamrao Jankar", party: "NCP-SP", district: "Solapur" },
            // Satara
            { constituency: "Phaltan (SC)", mla: "Sachin Patil", party: "NCP", district: "Satara" },
            { constituency: "Wai", mla: "Makrand Jadhav - Patil", party: "NCP-SP", district: "Satara" },
            { constituency: "Koregaon", mla: "Mahesh Shinde", party: "SHS", district: "Satara" },
            { constituency: "Man", mla: "Jaykumar Gore", party: "BJP", district: "Satara" },
            { constituency: "Karad North", mla: "Manoj Ghorpade", party: "BJP", district: "Satara" },
            { constituency: "Karad South", mla: "Atulbaba Bhosale", party: "BJP", district: "Satara" },
            { constituency: "Patan", mla: "Shambhuraj Desai", party: "SHS", district: "Satara" },
            { constituency: "Satara", mla: "Shivendra Raje Bhosale", party: "BJP", district: "Satara" },
            // Ratnagiri
            { constituency: "Dapoli", mla: "Yogesh Kadam", party: "SHS", district: "Ratnagiri" },
            { constituency: "Guhagar", mla: "Bhaskar Jadhav", party: "SS(UBT)", district: "Ratnagiri" },
            { constituency: "Chiplun", mla: "Shekhar Nikam", party: "NCP", district: "Ratnagiri" },
            { constituency: "Ratnagiri", mla: "Uday Samant", party: "SHS", district: "Ratnagiri" },
            { constituency: "Rajapur", mla: "Kiran Samant", party: "SHS", district: "Ratnagiri" },
            // Sindhudurg
            { constituency: "Kankavli", mla: "Nitesh Rane", party: "BJP", district: "Sindhudurg" },
            { constituency: "Kudal", mla: "Nilesh Rane", party: "SHS", district: "Sindhudurg" },
            { constituency: "Sawantwadi", mla: "Deepak Kesarkar", party: "SHS", district: "Sindhudurg" },
            // Kolhapur
            { constituency: "Chandgad", mla: "Shivaji Patil", party: "IND", district: "Kolhapur" },
            { constituency: "Radhanagari", mla: "Prakashrao Abitkar", party: "SHS", district: "Kolhapur" },
            { constituency: "Kagal", mla: "Hasan Mushrif", party: "NCP", district: "Kolhapur" },
            { constituency: "Kolhapur South", mla: "Amal Mahadik", party: "BJP", district: "Kolhapur" },
            { constituency: "Karvir", mla: "Chandradip Narke", party: "SHS", district: "Kolhapur" },
            { constituency: "Kolhapur North", mla: "Rajesh Kshirsagar", party: "SHS", district: "Kolhapur" },
            { constituency: "Shahuwadi", mla: "Vinay Kore", party: "JSS", district: "Kolhapur" },
            { constituency: "Hatkanangle (SC)", mla: "Ashokrao Mane", party: "JSS", district: "Kolhapur" },
            { constituency: "Ichalkaranji", mla: "Rahul Awade", party: "BJP", district: "Kolhapur" },
            { constituency: "Shirol", mla: "Rajendra Patil Yadravkar", party: "RSVA", district: "Kolhapur" },
            // Sangli
            { constituency: "Miraj (SC)", mla: "Suresh Khade", party: "BJP", district: "Sangli" },
            { constituency: "Sangli", mla: "Sudhir Gadgil", party: "BJP", district: "Sangli" },
            { constituency: "Islampur", mla: "Jayant Patil", party: "NCP-SP", district: "Sangli" },
            { constituency: "Shirala", mla: "Satyajit Deshmukh", party: "BJP", district: "Sangli" },
            { constituency: "Palus-Kadegaon", mla: "Vishwajeet Kadam", party: "INC", district: "Sangli" },
            { constituency: "Khanapur", mla: "Suhas Babar", party: "SHS", district: "Sangli" },
            { constituency: "Tasgaon-Kavathe Mahankal", mla: "Rohit Patil", party: "NCP-SP", district: "Sangli" },
            { constituency: "Jat", mla: "Gopichand Padalkar", party: "BJP", district: "Sangli" }
        ];

        // ============================================
        // DOM Elements
        // ============================================
        const districtSelect = document.getElementById('districtSelect');
        const constituencySelect = document.getElementById('constituencySelect');
        const mlaNameDisplay = document.getElementById('mlaNameDisplay');
        const mlaPartyDisplay = document.getElementById('mlaPartyDisplay');
        const mlaConstituencyDisplay = document.getElementById('mlaConstituencyDisplay');
        const mlaDistrictDisplay = document.getElementById('mlaDistrictDisplay');
        const mlaIdDisplay = document.getElementById('mlaIdDisplay');

        // ============================================
        // Populate District Dropdown
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
        // District Change → Load Constituencies
        // ============================================
        districtSelect.addEventListener('change', function() {
            const selectedDistrict = this.value;
            // Reset constituency dropdown
            constituencySelect.innerHTML = '<option value="">Select Constituency</option>';
            constituencySelect.disabled = true;
            
            // Reset MLA display
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
        // Constituency Change → Auto-map MLA
        // ============================================
        constituencySelect.addEventListener('change', function() {
            const selectedConstituency = this.value;
            const selectedDistrict = districtSelect.value;
            
            if (selectedConstituency && selectedDistrict) {
                const mla = mlaData.find(m => m.constituency === selectedConstituency && m.district === selectedDistrict);
                if (mla) {
                    mlaNameDisplay.value = mla.mla;
                    mlaPartyDisplay.value = mla.party;
                    mlaConstituencyDisplay.value = mla.constituency;
                    mlaDistrictDisplay.value = mla.district;
                    mlaIdDisplay.value = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;
                } else {
                    resetMlaDisplay();
                    alert('⚠️ No MLA found for the selected constituency. Please verify the data.');
                }
            } else {
                resetMlaDisplay();
            }
        });

        // ============================================
        // Reset MLA Display
        // ============================================
        function resetMlaDisplay() {
            mlaNameDisplay.value = 'Select constituency';
            mlaPartyDisplay.value = '—';
            mlaConstituencyDisplay.value = '—';
            mlaDistrictDisplay.value = '—';
            mlaIdDisplay.value = 'Auto-mapped';
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
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
            updateStepIndicators(step);
        }

        function nextStep(current) {
            // Validation for Step 3 before moving to Step 4
            if (current === 3) {
                const district = districtSelect.value;
                const constituency = constituencySelect.value;
                const voterId = document.getElementById('voterIdInput').value.trim();
                
                if (!voterId) {
                    alert('⚠️ Voter ID is required. Please go back to Step 1 and enter your Voter ID.');
                    return;
                }
                if (!district) {
                    alert('⚠️ Please select a District.');
                    return;
                }
                if (!constituency) {
                    alert('⚠️ Please select a Constituency.');
                    return;
                }
                
                // Check if MLA exists for this constituency
                const mla = mlaData.find(m => m.constituency === constituency && m.district === district);
                if (!mla) {
                    alert('⚠️ No MLA found for the selected constituency. Please verify your selection.');
                    return;
                }
            }
            
            let next = current + 1;
            // If moving to step 4, ensure MLA is mapped
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
                // Update MLA display one more time
                mlaNameDisplay.value = mla.mla;
                mlaPartyDisplay.value = mla.party;
                mlaConstituencyDisplay.value = mla.constituency;
                mlaDistrictDisplay.value = mla.district;
                mlaIdDisplay.value = `MLA-${mla.district.substring(0,3).toUpperCase()}-${mla.constituency.substring(0,3).toUpperCase()}`;
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
            const voterId = document.getElementById('voterIdInput').value.trim();
            const district = districtSelect.value;
            const constituency = constituencySelect.value;
            
            if (!voterId) {
                alert('⚠️ Voter ID is required.');
                return;
            }
            if (!district) {
                alert('⚠️ District is required.');
                return;
            }
            if (!constituency) {
                alert('⚠️ Constituency is required.');
                return;
            }
            
            const mla = mlaData.find(m => m.constituency === constituency && m.district === district);
            if (!mla) {
                alert('⚠️ No MLA assigned for this constituency. Registration cannot be completed.');
                return;
            }
            
            if (confirm('Are you sure all details are correct? This will generate your Voter ID.')) {
                alert(`✅ Registration Successful!\n\nVoter ID: ${voterId}\nMLA: ${mla.mla} (${mla.party})\nConstituency: ${mla.constituency}\nDistrict: ${mla.district}\n\nPlease check your mobile for confirmation.`);
                switchToLogin();
            }
        }

        // ============================================
        // OTP AUTO-FOCUS (kept as is)
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
        // PROFILE PHOTO UPLOAD PREVIEW (kept as is)
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