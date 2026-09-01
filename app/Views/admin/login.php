<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ÆTHERIS | Admin Login</title>
     <link rel="icon" type="image/png" href="<?= base_url('assets/user/images/LOGO.png') ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Google Fonts: Playfair Display + Inter (MLA Dashboard style) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap"
          rel="stylesheet">


    <style>

        /* =========================================
           RESET & VARIABLES (MLA Dashboard palette)
        ========================================= */

        :root {
            --pure-white: #ffffff;
            --cream: #fef8f0;
            --beige-light: #faf6ed;
            --beige: #f5ede1;
            --beige-dark: #e8dccc;
            --gold-light: #f5e7c8;
            --gold: #d4af37;
            --gold-dark: #b8960c;
            --gold-gradient: linear-gradient(135deg, #b37b2e, #b8960c, #d4af37, #e8c97a);
            --gold-gradient-btn: linear-gradient(105deg, #b37b2e, #b8960c, #d4af37, #e8c97a);
            --text-navy: #0F172A;
            --text-charcoal: #1E293B;
            --text-slate: #64748B;
            --text-light-slate: #94A3B8;
            --shadow-gold: rgba(212, 175, 55, 0.30);
            --shadow-gold-hover: rgba(212, 175, 55, 0.35);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================
           BODY – warm cream / beige background
        ========================================= */

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            background: linear-gradient(145deg, var(--beige-light) 0%, var(--cream) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Very subtle decorative radial gold glow (extremely soft) */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.07), transparent 60%),
                        radial-gradient(circle at 80% 70%, rgba(212, 175, 55, 0.05), transparent 50%);
            pointer-events: none;
            z-index: 0;
        }


        /* =========================================
           MAIN CONTAINER (preserved structure)
        ========================================= */

        .full_container {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            z-index: 2;
            width: 100%;
        }

        .container {
            width: 100%;
            max-width: 520px;
            margin: auto;
        }


        /* =========================================
           LOGIN CARD – premium white/glass
        ========================================= */

        .login_section {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 24px;
            padding: 48px 40px 38px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08), 0 8px 24px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
            animation: cardEntry 0.7s cubic-bezier(.16, 1, .3, 1);
            transition: transform 0.25s ease, box-shadow 0.3s ease;
        }

        .login_section:hover {
            transform: translateY(-3px);
            box-shadow: 0 24px 56px rgba(0, 0, 0, 0.10), 0 12px 32px rgba(0, 0, 0, 0.06);
        }

        /* Elegant gold accent line at top */
        .login_section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #b37b2e, #d4af37, #e8c97a, transparent);
            opacity: 0.8;
            border-radius: 24px 24px 0 0;
        }

        @keyframes cardEntry {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        /* =========================================
           LOGO / ICON – BIG SIZE with actual image
        ========================================= */

        .logo_login {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo_icon {
            width: 150px;
            height: 150px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 12px 32px rgba(212, 175, 55, 0.30);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: iconSubtlePulse 4s infinite alternate ease-in-out;
            overflow: hidden;
            background: #ffffff;
            border: 3px solid rgba(212, 175, 55, 0.25);
            padding: 8px;
        }

        .logo_icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        @keyframes iconSubtlePulse {
            0% { transform: scale(1); box-shadow: 0 12px 32px rgba(212, 175, 55, 0.25); }
            100% { transform: scale(1.03); box-shadow: 0 16px 40px rgba(212, 175, 55, 0.35); }
        }


        /* =========================================
           BRAND TITLE – Removed, only logo visible
        ========================================= */

        .logo_login h2 {
            display: none;
        }


        /* =========================================
           SUBTITLE – Playfair, slate
        ========================================= */

        .logo_login p {
            font-family: 'Playfair Display', Georgia, serif;
            color: var(--text-slate);
            font-size: 15px;
            letter-spacing: 0.3px;
            font-weight: 400;
            margin-top: 2px;
        }


        /* =========================================
           SECURITY BADGES – gold/beige, elegant
        ========================================= */

        .secure-badge {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .secure-badge span {
            background: rgba(245, 231, 200, 0.45);
            border: 1px solid rgba(212, 175, 55, 0.25);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.65rem;
            font-weight: 600;
            color: #8a6a18;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.3px;
            backdrop-filter: blur(4px);
            transition: background 0.2s;
        }

        .secure-badge span i {
            margin-right: 6px;
            color: #b8960c;
        }


        /* =========================================
           FORM (structure preserved)
        ========================================= */

        .login_form {
            margin-top: 10px;
        }

        .field {
            margin-bottom: 22px;
            position: relative;
        }


        /* =========================================
           LABELS – Inter, gold uppercase
        ========================================= */

        .label_field {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #8a6a18;
            margin-bottom: 8px;
            margin-left: 4px;
        }

        .label_field i {
            margin-right: 8px;
            font-size: 0.75rem;
            color: #b8960c;
        }


        /* =========================================
           INPUTS – premium white/light
        ========================================= */

        .field input {
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #e8dccc;
            border-radius: 14px;
            padding: 15px 20px;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-charcoal);
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border 0.25s ease, box-shadow 0.3s ease, background 0.2s;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.02);
        }

        .field input:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.12);
            background: #ffffff;
        }

        .field input::placeholder {
            color: var(--text-light-slate);
            font-weight: 400;
        }

        /* override autofill style */
        .field input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: var(--text-charcoal) !important;
        }


        /* =========================================
           PASSWORD TOGGLE – gold tones
        ========================================= */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 60px;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #b8960c;
            cursor: pointer;
            font-size: 17px;
            padding: 8px 6px;
            transition: color 0.2s;
            border-radius: 8px;
        }

        .password-toggle:hover {
            color: #b37b2e;
        }


        /* =========================================
           LOGIN BUTTON – gold gradient, premium
        ========================================= */

        .main_bt {
            width: 100%;
            background: var(--gold-gradient-btn);
            border: none;
            border-radius: 14px;
            padding: 15px 24px;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            color: white;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.3s ease, background 0.3s;
            box-shadow: 0 8px 24px rgba(212, 175, 55, 0.25);
            position: relative;
            overflow: hidden;
        }

        .main_bt i {
            margin-right: 10px;
        }

        .main_bt:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.35);
        }

        .main_bt:active {
            transform: scale(0.97);
        }

        .main_bt.loading {
            pointer-events: none;
            opacity: 0.85;
        }


        /* =========================================
           ERROR MESSAGE – premium soft red
        ========================================= */

        .error-message {
            display: none;
            margin-top: 16px;
            padding: 12px 18px;
            background: rgba(244, 63, 94, 0.06);
            border: 1px solid rgba(244, 63, 94, 0.20);
            border-left: 4px solid #f43f5e;
            border-radius: 12px;
            text-align: left;
            font-size: 0.8rem;
            font-weight: 500;
            color: #be123c;
            font-family: 'Inter', sans-serif;
            align-items: center;
            gap: 10px;
        }

        .error-message i {
            color: #f43f5e;
            font-size: 0.9rem;
            margin-right: 6px;
        }


        /* =========================================
           FOOTER NOTE – elegant, slate
        ========================================= */

        .footer-note {
            text-align: center;
            margin-top: 28px;
            font-size: 11px;
            color: var(--text-light-slate);
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            gap: 22px;
            flex-wrap: wrap;
            letter-spacing: 0.2px;
        }

        .footer-note i {
            margin-right: 5px;
            color: #b8960c;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 600px) {
            .full_container {
                padding: 15px;
            }

            .login_section {
                padding: 32px 24px 28px;
                border-radius: 20px;
            }

            .login_section::before {
                height: 2.5px;
            }

            .logo_icon {
                width: 120px;
                height: 120px;
                border-radius: 20px;
                padding: 6px;
            }

            .logo_login p {
                font-size: 14px;
            }

            .secure-badge span {
                font-size: 0.6rem;
                padding: 5px 12px;
            }

            .field input {
                padding: 13px 18px;
                font-size: 0.9rem;
            }

            .main_bt {
                padding: 13px 20px;
                font-size: 0.85rem;
            }

            .footer-note {
                font-size: 10px;
                gap: 14px;
            }
        }

        @media (max-width: 400px) {
            .login_section {
                padding: 24px 18px 22px;
                border-radius: 18px;
            }
            .logo_icon {
                width: 100px;
                height: 100px;
                border-radius: 18px;
                padding: 5px;
            }
            .secure-badge {
                gap: 6px;
            }
            .secure-badge span {
                font-size: 0.55rem;
                padding: 4px 10px;
            }
            .field input {
                padding: 12px 16px;
                font-size: 0.85rem;
            }
            .main_bt {
                padding: 12px 16px;
                font-size: 0.8rem;
            }
        }

        /* no horizontal scroll */
        body, .full_container, .container {
            overflow-x: hidden;
        }

    </style>

</head>


<body>


    <!-- =========================================
         LOGIN CONTAINER (structure preserved)
    ========================================= -->

    <div class="full_container">

        <div class="container">

            <div class="login_section">


                <!-- =================================
                     LOGO / BRAND – BIG LOGO only
                ================================= -->

                <div class="logo_login">

                    <div class="logo_icon">
                        <img src="<?= base_url('assets/user/images/LOGO.png') ?>" alt="ÆTHERIS Logo">
                    </div>

                    <!-- ÆTHERIS title hidden, only logo visible -->
                    <h2>ÆTHERIS</h2>

                    <p>Secure Login Access</p>

                    <div class="secure-badge">
                        <span>
                            <i class="fas fa-lock"></i>
                            Secure Login
                        </span>
                        <span>
                            <i class="fas fa-user-shield"></i>
                            Admin Only
                        </span>
                        <span>
                            <i class="fas fa-shield-alt"></i>
                            Protected
                        </span>
                    </div>

                </div>


                <!-- =================================
                     LOGIN FORM (FUNCTIONAL CODE UNCHANGED)
                ================================= -->

                <div class="login_form">

                    <form id="loginForm" action="<?= base_url('admin/login') ?>" method="post">

                        <?= csrf_field() ?>


                        <!-- EMAIL -->

                        <div class="field">

                            <label class="label_field">
                                <i class="fas fa-envelope"></i>
                                ADMIN EMAIL
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                autocomplete="email"
                                required
                            >

                        </div>


                        <!-- PASSWORD -->

                        <div class="field">

                            <label class="label_field">
                                <i class="fas fa-lock"></i>
                                PASSWORD
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    autocomplete="current-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    id="togglePassword"
                                    aria-label="Toggle password visibility"
                                >
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>

                            </div>

                        </div>


                        <!-- LOGIN BUTTON -->

                        <div class="field">

                            <button
                                type="submit"
                                class="main_bt"
                            >
                                <i class="fas fa-right-to-bracket"></i>
                                LOGIN TO DASHBOARD
                            </button>

                        </div>


                        <!-- ERROR MESSAGE (flashdata preserved) -->

                        <?php if(session()->getFlashdata('error')): ?>

                        <div class="error-message" style="display:block">
                            <i class="fas fa-circle-exclamation"></i>
                            <span><?= session()->getFlashdata('error') ?></span>
                        </div>

                        <?php endif; ?>


                    </form>


                    <!-- FOOTER -->

                    <div class="footer-note">

                        <span>
                            <i class="fas fa-lock"></i>
                            Secure Access
                        </span>

                        <span>
                            <i class="fas fa-user-shield"></i>
                            Administrator
                        </span>

                        <span>
                            <i class="fas fa-server"></i>
                            Protected Server
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================
         JAVASCRIPT (password toggle + auto-focus)
    ========================================= -->

    <script>

        // PASSWORD SHOW/HIDE (exact existing functionality)
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const eyeIcon = document.getElementById("eyeIcon");

        togglePassword.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.className = "fas fa-eye-slash";
            } else {
                passwordInput.type = "password";
                eyeIcon.className = "fas fa-eye";
            }
        });

        // AUTO FOCUS (preserved)
        window.addEventListener("load", function() {
            document.getElementById("email").focus();
        });

    </script>


</body>

</html>