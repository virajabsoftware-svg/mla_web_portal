<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>Ætheris | Silent OTP Authentication</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Playfair Display', 'Georgia', serif;
            background: #0A0C15;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Premium animated gradient background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at 20% 30%, #1A1F2E, #0A0C15);
            z-index: -3;
        }

        .moving-gradient {
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 40%, rgba(99, 102, 241, 0.15), rgba(139, 92, 246, 0.08), transparent);
            animation: rotateBg 28s infinite linear;
            z-index: -2;
        }

        @keyframes rotateBg {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Particle effect overlay */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(2px 2px at 20px 30px, rgba(139, 92, 246, 0.3), transparent),
                              radial-gradient(1px 1px at 60px 90px, rgba(6, 182, 212, 0.25), transparent);
            background-size: 50px 50px, 80px 80px;
            pointer-events: none;
            z-index: -1;
            opacity: 0.5;
        }

        /* Floating glass orbs */
        .glass-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.35;
            z-index: -1;
            animation: floatOrb 20s infinite alternate ease-in-out;
        }
        .orb-1 { width: 45vw; height: 45vw; background: #6366f1; top: -20vh; right: -10vw; opacity: 0.2; }
        .orb-2 { width: 55vw; height: 55vw; background: #8b5cf6; bottom: -30vh; left: -15vw; animation-duration: 25s; opacity: 0.18; }
        .orb-3 { width: 35vw; height: 35vw; background: #06b6d4; top: 45%; left: 25%; animation-duration: 18s; opacity: 0.15; }

        @keyframes floatOrb {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(4%, 5%) scale(1.1); }
        }

        .full_container {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            z-index: 5;
        }

        .container {
            width: 100%;
            max-width: 520px;
            margin: 0 auto;
        }

        /* Stunning Glassmorphic Card */
        .login_section {
            background: rgba(18, 22, 35, 0.65);
            backdrop-filter: blur(24px);
            border-radius: 72px;
            padding: 3rem 2.5rem;
            box-shadow: 0 40px 90px -25px rgba(0, 0, 0, 0.6), 
                        0 0 0 1px rgba(99, 102, 241, 0.25),
                        inset 0 1px 0 rgba(255, 255, 255, 0.05);
            transition: all 0.5s cubic-bezier(0.2, 0.95, 0.4, 1.05);
            border: 1px solid rgba(99, 102, 241, 0.2);
            position: relative;
            overflow: hidden;
        }

        .login_section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #6366f1, #8b5cf6, #06b6d4, transparent);
            opacity: 0.7;
        }

        .login_section:hover {
            transform: translateY(-6px);
            box-shadow: 0 50px 100px -30px rgba(0, 0, 0, 0.7), 0 0 0 2px rgba(99, 102, 241, 0.4);
            border-color: rgba(99, 102, 241, 0.4);
        }

        /* Branding with animated icon */
        .logo_login {
            text-align: center;
            margin-bottom: 2.2rem;
        }

        .logo_icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(145deg, #6366f1, #4c1d95);
            border-radius: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 20px 40px -12px rgba(99, 102, 241, 0.5);
            transition: all 0.3s;
            animation: iconGlow 3s infinite alternate;
        }

        @keyframes iconGlow {
            0% { box-shadow: 0 15px 35px -10px rgba(99, 102, 241, 0.4); transform: scale(1); }
            100% { box-shadow: 0 25px 50px -8px rgba(139, 92, 246, 0.7); transform: scale(1.03); }
        }

        .logo_icon i {
            font-size: 48px;
            color: #ffffff;
            filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2));
        }

        .logo_login h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 2.3rem;
            background: linear-gradient(135deg, #ffffff, #a78bfa, #c4b5fd);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -1px;
        }

        .logo_login p {
            color: rgba(167, 139, 250, 0.8);
            font-size: 0.8rem;
            margin-top: 8px;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* Security badges - modern pill design */
        .secure-badge {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin: 20px 0 12px;
            flex-wrap: wrap;
        }
        .secure-badge span {
            background: rgba(99, 102, 241, 0.12);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #c4b5fd;
            backdrop-filter: blur(8px);
            letter-spacing: 0.3px;
            border: 1px solid rgba(99, 102, 241, 0.3);
            transition: all 0.2s;
        }
        .secure-badge span:hover {
            background: rgba(99, 102, 241, 0.2);
            transform: translateY(-1px);
        }
        .secure-badge span i {
            margin-right: 6px;
            font-size: 0.7rem;
        }

        /* Form styling */
        .login_form {
            margin-top: 0.8rem;
        }

        .field {
            margin-bottom: 1.7rem;
            position: relative;
        }

        .label_field {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.8px;
            color: #a78bfa;
            margin-bottom: 10px;
            margin-left: 18px;
        }

        .label_field i {
            margin-right: 8px;
            font-size: 0.75rem;
        }

        .field input {
            width: 100%;
            background: rgba(12, 15, 28, 0.7);
            border: 1.5px solid rgba(99, 102, 241, 0.35);
            border-radius: 56px;
            padding: 16px 26px;
            font-size: 1rem;
            font-weight: 500;
            color: #f0f0ff;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Inter', monospace;
        }

        .field input:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 5px rgba(139, 92, 246, 0.2);
            background: rgba(18, 22, 40, 0.9);
            transform: scale(1.01);
        }

        .field input::placeholder {
            color: rgba(139, 148, 210, 0.45);
            font-weight: 400;
        }

        /* Premium button with gradient animation */
        .main_bt {
            width: 100%;
            background: linear-gradient(105deg, #6366f1, #8b5cf6, #a855f7);
            background-size: 200% auto;
            border: none;
            border-radius: 56px;
            padding: 16px 28px;
            font-weight: 700;
            font-size: 1rem;
            color: #ffffff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all 0.35s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 12px 32px -12px rgba(99, 102, 241, 0.5);
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .main_bt i {
            margin-right: 10px;
        }

        .main_bt::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.65s;
        }

        .main_bt:hover::after {
            left: 100%;
        }

        .main_bt:hover {
            transform: translateY(-3px);
            box-shadow: 0 22px 45px -15px rgba(99, 102, 241, 0.7);
            background-position: right center;
        }

        .hidden {
            display: none;
        }

        /* Slide animations */
        .slide-fade {
            animation: slideFadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideFadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-loading {
            pointer-events: none;
            opacity: 0.85;
        }
        .btn-loading i {
            animation: spinRing 0.8s linear infinite;
        }
        @keyframes spinRing {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Status message - elegant toast style */
        .status-message {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 12px 18px;
            border-radius: 60px;
            background: rgba(10, 12, 25, 0.85);
            backdrop-filter: blur(16px);
            letter-spacing: 0.2px;
            border: 1px solid rgba(139, 92, 246, 0.3);
            transition: all 0.2s;
        }
        .status-error {
            color: #fda4af;
            border-left: 4px solid #f43f5e;
            background: rgba(244, 63, 94, 0.1);
        }
        .status-success {
            color: #bef264;
            border-left: 4px solid #a3e635;
            background: rgba(163, 230, 53, 0.08);
        }
        .status-info {
            color: #a78bfa;
            border-left: 4px solid #8b5cf6;
        }

        .footer-note {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.65rem;
            color: rgba(167, 139, 250, 0.55);
            display: flex;
            justify-content: center;
            gap: 22px;
        }
        .footer-note i {
            margin-right: 5px;
        }

        .otp-hint {
            font-size: 0.62rem;
            margin-top: 8px;
            margin-left: 18px;
            color: #8b5cf6;
            opacity: 0.8;
        }

        @media (max-width: 550px) {
            .full_container { padding: 1rem; }
            .login_section { padding: 2rem 1.5rem; border-radius: 52px; }
            .logo_icon { width: 75px; height: 75px; }
            .logo_icon i { font-size: 40px; }
            .logo_login h2 { font-size: 1.8rem; }
            .field input { padding: 14px 22px; }
            .main_bt { padding: 14px 20px; }
        }

        /* ripple effect */
        .ripple-effect {
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="animated-bg"></div>
<div class="moving-gradient"></div>
<div class="particles"></div>
<div class="glass-orb orb-1"></div>
<div class="glass-orb orb-2"></div>
<div class="glass-orb orb-3"></div>

<div class="full_container">
    <div class="container">
        <div class="login_section">

            <div class="logo_login">
                <div style="display: flex; justify-content: center;">
                    <div class="logo_icon">
                        <i class="fas fa-shield-haltered"></i>
                    </div>
                </div>
                <h2>ÆTHERIS</h2>
                <p>Silent OTP · Zero-Knowledge Vault</p>
                <div class="secure-badge">
                    <span><i class="fas fa-eye-slash"></i> OTP Never Exposed</span>
                    <span><i class="fas fa-shield-virus"></i> Quantum Safe</span>
                    <span><i class="fas fa-hourglass-half"></i> 5 Min Validity</span>
                </div>
            </div>

            <div class="login_form">
                <form id="loginForm" onsubmit="return false;">
                    <!-- Mobile Number Input with icon -->
                    <div class="field">
                        <label class="label_field"><i class="fas fa-fingerprint"></i> ENCRYPTED CHANNEL</label>
                        <input type="tel"
                               id="mobile"
                               name="mobile"
                               maxlength="10"
                               placeholder="+91 · Mobile number"
                               autocomplete="off" />
                    </div>

                    <!-- Silent OTP Trigger Button -->
                    <div class="field">
                        <button type="button" class="main_bt" id="sendOtpBtn">
                            <i class="fas fa-lock"></i> Generate Silent Token
                        </button>
                    </div>

                    <!-- OTP Entry Panel (OTP code never displayed in UI) -->
                    <div class="field" id="otpSection" style="display:none;">
                        <label class="label_field"><i class="fas fa-database"></i> VERIFICATION CODE</label>
                        <input type="text"
                               id="otp"
                               name="otp"
                               maxlength="6"
                               placeholder="000000"
                               autocomplete="off" />
                        <div class="otp-hint">
                            <i class="fas fa-shield-haltered"></i> OTP is hidden — never displayed on interface
                        </div>
                    </div>

                    <!-- Authenticate Button -->
                    <div class="field" id="loginBtn" style="display:none;">
                        <button type="submit" class="main_bt" id="verifyBtn">
                            <i class="fas fa-unlock-alt"></i> Unlock Vault
                        </button>
                    </div>

                    <!-- Dynamic Status Area -->
                    <div id="statusMsg" class="status-message status-info" style="display: none;">
                        <i class="fas fa-info-circle"></i> <span id="statusText">Ready</span>
                    </div>
                </form>

                <div class="footer-note">
                    <span><i class="fas fa-incognito"></i> Silent delivery</span>
                    <span><i class="fas fa-shield-alt"></i> Military grade</span>
                    <span><i class="fas fa-brain"></i> Biometric ready</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ============================================================
    // SILENT OTP MODULE — OTP never rendered in UI, only via secure channel simulation
    // ============================================================
    let activeOTP = null;          
    let expiryTimer = null;
    let attemptCount = 0;
    let currentMobileNumber = '';

    // DOM References
    const mobileField = document.getElementById('mobile');
    const sendBtn = document.getElementById('sendOtpBtn');
    const otpContainer = document.getElementById('otpSection');
    const loginBtnContainer = document.getElementById('loginBtn');
    const otpInputField = document.getElementById('otp');
    const verifyActionBtn = document.getElementById('verifyBtn');
    const statusDiv = document.getElementById('statusMsg');
    const statusTextSpan = document.getElementById('statusText');

    // Helper: Show status message (no OTP leak)
    function setStatusMessage(msg, type = 'info') {
        statusDiv.style.display = 'block';
        statusTextSpan.innerText = msg;
        statusDiv.className = 'status-message';
        if (type === 'error') statusDiv.classList.add('status-error');
        else if (type === 'success') statusDiv.classList.add('status-success');
        else statusDiv.classList.add('status-info');
        
        // Auto hide after 5 sec for non-critical messages
        if (type !== 'error') {
            setTimeout(() => {
                if (statusDiv.style.display === 'block' && !statusDiv.classList.contains('status-success')) {
                    statusDiv.style.opacity = '0';
                    setTimeout(() => {
                        if (statusDiv.style.opacity === '0') statusDiv.style.display = 'none';
                        statusDiv.style.opacity = '';
                    }, 350);
                } else if (type === 'success') {
                    setTimeout(() => {
                        if (statusDiv.style.display === 'block') {
                            statusDiv.style.opacity = '0';
                            setTimeout(() => {
                                statusDiv.style.display = 'none';
                                statusDiv.style.opacity = '';
                            }, 350);
                        }
                    }, 4000);
                }
            }, 5000);
        }
    }

    function clearExpiryTimer() {
        if (expiryTimer) {
            clearTimeout(expiryTimer);
            expiryTimer = null;
        }
    }

    function resetOTPSessionUI() {
        otpContainer.style.display = 'none';
        loginBtnContainer.style.display = 'none';
        otpInputField.value = '';
        if (activeOTP) activeOTP = null;
        clearExpiryTimer();
        sendBtn.disabled = false;
        sendBtn.innerHTML = '<i class="fas fa-lock"></i> Generate Silent Token';
        sendBtn.classList.remove('btn-loading');
        attemptCount = 0;
    }

    // Silent OTP Generation — OTP stays invisible in UI.
    function generateSilentOTP() {
        resetOTPSessionUI();
        statusDiv.style.display = 'none';
        
        const mobileVal = mobileField.value.trim();
        if (!mobileVal) {
            setStatusMessage('❌ Please enter registered mobile number', 'error');
            mobileField.focus();
            mobileField.style.animation = 'shake 0.45s';
            setTimeout(() => mobileField.style.animation = '', 400);
            return;
        }
        if (!/^\d{10}$/.test(mobileVal)) {
            setStatusMessage('⚠️ Invalid number: must be 10 digits', 'error');
            mobileField.focus();
            return;
        }
        
        currentMobileNumber = mobileVal;
        sendBtn.disabled = true;
        sendBtn.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Encrypting & Sending...';
        sendBtn.classList.add('btn-loading');
        
        // Simulate secure SMS/network delay
        setTimeout(() => {
            // Generate 6-digit secure OTP — never displayed in DOM.
            const otpCode = Math.floor(100000 + Math.random() * 900000);
            activeOTP = otpCode.toString();
            
            // SECURE: OTP only appears in console (simulated SMS log) — production would send via actual SMS.
            console.log(`[ÆTHERIS VAULT] 🔐 Silent OTP for ${currentMobileNumber}: ${activeOTP} | Delivered via encrypted channel. Never shown on screen.`);
            
            // Success message without exposing OTP.
            setStatusMessage(`✨ Silent OTP delivered to ${currentMobileNumber.slice(0,3)}****${currentMobileNumber.slice(-3)} · Check console (demo mode)`, 'success');
            
            // Reveal OTP input fields (user can type OTP but never sees the actual code)
            otpContainer.style.display = 'block';
            loginBtnContainer.style.display = 'block';
            // Add smooth entrance animation
            otpContainer.classList.add('slide-fade');
            loginBtnContainer.classList.add('slide-fade');
            
            // Set OTP expiry: 5 minutes
            clearExpiryTimer();
            expiryTimer = setTimeout(() => {
                if (activeOTP) {
                    setStatusMessage('⏳ Silent OTP session expired. Please request a new token.', 'error');
                    resetOTPSessionUI();
                    activeOTP = null;
                }
            }, 5 * 60 * 1000);
            
            sendBtn.disabled = false;
            sendBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Resend Silent Code';
            sendBtn.classList.remove('btn-loading');
            otpInputField.focus();
            
            // Remove animation class after completion
            setTimeout(() => {
                otpContainer.classList.remove('slide-fade');
                loginBtnContainer.classList.remove('slide-fade');
            }, 600);
        }, 980);
    }

    // Verify OTP entered by user — still no OTP leak.
    function verifyAuthentication() {
        const enteredCode = otpInputField.value.trim();
        if (!enteredCode) {
            setStatusMessage('🔐 Please enter the verification token', 'error');
            otpInputField.focus();
            return;
        }
        if (!/^\d{6}$/.test(enteredCode)) {
            setStatusMessage('⚠️ Token must be 6 numeric digits', 'error');
            otpInputField.focus();
            return;
        }
        
        if (!activeOTP) {
            setStatusMessage('⌛ Token expired or missing. Please request a new silent OTP.', 'error');
            resetOTPSessionUI();
            return;
        }
        
        if (enteredCode === activeOTP) {
            // GRANT ACCESS
            setStatusMessage('✅ Authentication verified! Vault access granted. Redirecting...', 'success');
            const verifyButtonElem = document.getElementById('verifyBtn');
            verifyButtonElem.disabled = true;
            verifyButtonElem.innerHTML = '<i class="fas fa-spinner fa-pulse"></i> Decrypting Access...';
            
            // Smooth success effect
            const cardElement = document.querySelector('.login_section');
            cardElement.style.transform = 'scale(0.97)';
            setTimeout(() => cardElement.style.transform = '', 280);
            
            // Simulate redirect / reload after auth
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.8s cubic-bezier(0.2, 0.9, 0.4, 1)';
                document.body.style.opacity = '0';
                setTimeout(() => {
                    alert('🔓 ÆTHERIS VAULT UNLOCKED\nWelcome to the secure ecosystem. Access granted.');
                    window.location.reload();
                }, 550);
            }, 1200);
        } else {
            attemptCount++;
            setStatusMessage(`✗ Invalid verification token · Attempt ${attemptCount}/3`, 'error');
            otpInputField.value = '';
            otpInputField.focus();
            otpInputField.style.borderColor = '#f43f5e';
            setTimeout(() => otpInputField.style.borderColor = '', 500);
            
            if (attemptCount >= 3) {
                setStatusMessage('🔒 Maximum failed attempts. Silent token revoked. Please regenerate OTP.', 'error');
                resetOTPSessionUI();
                activeOTP = null;
                attemptCount = 0;
            }
        }
    }
    
    // Event Listeners
    sendBtn.addEventListener('click', generateSilentOTP);
    
    const loginFormElement = document.getElementById('loginForm');
    loginFormElement.addEventListener('submit', (e) => {
        e.preventDefault();
        if (otpContainer.style.display === 'block' && activeOTP) {
            verifyAuthentication();
        } else {
            setStatusMessage('🔐 Please request a silent OTP first', 'info');
        }
    });
    
    if (verifyActionBtn) {
        verifyActionBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (otpContainer.style.display === 'block') {
                verifyAuthentication();
            } else {
                setStatusMessage('⚡ No active OTP session. Generate token first.', 'info');
            }
        });
    }
    
    // Mobile field sanitization (numbers only)
    mobileField.addEventListener('input', (e) => {
        let rawValue = e.target.value.replace(/\D/g, '');
        if (rawValue.length > 10) rawValue = rawValue.slice(0, 10);
        e.target.value = rawValue;
    });
    
    // Enter key on OTP field triggers verification
    otpInputField.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            if (activeOTP && otpInputField.value.trim().length === 6) {
                verifyAuthentication();
            } else if (activeOTP) {
                setStatusMessage('Please enter full 6-digit OTP', 'info');
            } else {
                setStatusMessage('No active OTP session', 'info');
            }
        }
    });
    
    // Initial load animation with card entrance
    window.addEventListener('load', () => {
        const card = document.querySelector('.login_section');
        card.style.opacity = '0';
        card.style.transform = 'translateY(35px)';
        setTimeout(() => {
            card.style.transition = 'all 0.7s cubic-bezier(0.2, 0.9, 0.3, 1.2)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 80);
        mobileField.focus();
    });
    
    window.addEventListener('beforeunload', () => {
        if (expiryTimer) clearTimeout(expiryTimer);
    });
</script>

<style>
    @keyframes shake {
        0%,100% { transform: translateX(0); }
        20% { transform: translateX(-5px); }
        80% { transform: translateX(5px); }
    }
    .main_bt:active {
        transform: scale(0.97);
    }
</style>
</body>
</html>