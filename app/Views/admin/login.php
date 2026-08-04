```html
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Ætheris | Admin Login</title>


    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">


    <style>

        /* =========================================
           RESET
        ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================
           BODY
        ========================================= */

        body {

            font-family: 'Inter', sans-serif;

            background: #0A0C15;

            min-height: 100vh;

            overflow-x: hidden;

            position: relative;

            color: white;
        }


        /* =========================================
           BACKGROUND
        ========================================= */

        .animated-bg {

            position: fixed;

            inset: 0;

            background:
                radial-gradient(
                    ellipse at 20% 30%,
                    #1A1F2E,
                    #0A0C15
                );

            z-index: -3;
        }


        .moving-gradient {

            position: fixed;

            top: -50%;
            left: -50%;

            width: 200%;
            height: 200%;

            background:
                radial-gradient(
                    circle at 30% 40%,
                    rgba(99,102,241,0.15),
                    rgba(139,92,246,0.08),
                    transparent
                );

            animation:
                rotateBg 28s infinite linear;

            z-index: -2;
        }


        @keyframes rotateBg {

            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }

        }


        /* =========================================
           PARTICLES
        ========================================= */

        .particles {

            position: fixed;

            inset: 0;

            background-image:

                radial-gradient(
                    2px 2px at 20px 30px,
                    rgba(139,92,246,0.3),
                    transparent
                ),

                radial-gradient(
                    1px 1px at 60px 90px,
                    rgba(6,182,212,0.25),
                    transparent
                );

            background-size:
                50px 50px,
                80px 80px;

            pointer-events: none;

            z-index: -1;

            opacity: 0.5;
        }


        /* =========================================
           FLOATING ORBS
        ========================================= */

        .glass-orb {

            position: fixed;

            border-radius: 50%;

            filter: blur(70px);

            z-index: -1;

            animation:
                floatOrb 20s
                infinite alternate ease-in-out;
        }


        .orb-1 {

            width: 45vw;

            height: 45vw;

            background: #6366f1;

            top: -20vh;

            right: -10vw;

            opacity: 0.2;
        }


        .orb-2 {

            width: 55vw;

            height: 55vw;

            background: #8b5cf6;

            bottom: -30vh;

            left: -15vw;

            animation-duration: 25s;

            opacity: 0.18;
        }


        .orb-3 {

            width: 35vw;

            height: 35vw;

            background: #06b6d4;

            top: 45%;

            left: 25%;

            animation-duration: 18s;

            opacity: 0.15;
        }


        @keyframes floatOrb {

            0% {

                transform:
                    translate(0,0)
                    scale(1);
            }

            100% {

                transform:
                    translate(4%,5%)
                    scale(1.1);
            }

        }


        /* =========================================
           MAIN CONTAINER
        ========================================= */

        .full_container {

            position: relative;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 25px;

            z-index: 5;
        }


        .container {

            width: 100%;

            max-width: 520px;

            margin: auto;
        }


        /* =========================================
           LOGIN CARD
        ========================================= */

        .login_section {

            background:
                rgba(18,22,35,0.65);

            backdrop-filter:
                blur(24px);

            border-radius: 60px;

            padding:
                48px 40px;

            border:
                1px solid
                rgba(99,102,241,0.2);

            box-shadow:

                0 40px 90px -25px
                rgba(0,0,0,0.6),

                0 0 0 1px
                rgba(99,102,241,0.25),

                inset 0 1px 0
                rgba(255,255,255,0.05);

            position: relative;

            overflow: hidden;

            animation:
                cardEntry 0.8s
                cubic-bezier(.16,1,.3,1);

            transition: 0.3s;
        }


        .login_section:hover {

            transform: translateY(-4px);

            box-shadow:

                0 50px 100px -30px
                rgba(0,0,0,0.7),

                0 0 0 2px
                rgba(99,102,241,0.3);
        }


        .login_section::before {

            content: '';

            position: absolute;

            top: 0;

            left: 0;

            right: 0;

            height: 3px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    #6366f1,
                    #8b5cf6,
                    #06b6d4,
                    transparent
                );

            opacity: 0.8;
        }


        @keyframes cardEntry {

            from {

                opacity: 0;

                transform:
                    translateY(40px)
                    scale(0.97);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }

        }


        /* =========================================
           LOGO
        ========================================= */

        .logo_login {

            text-align: center;

            margin-bottom: 35px;
        }


        .logo_icon {

            width: 90px;

            height: 90px;

            background:
                linear-gradient(
                    145deg,
                    #6366f1,
                    #4c1d95
                );

            border-radius: 35px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 20px auto;

            box-shadow:
                0 20px 40px -12px
                rgba(99,102,241,0.5);

            animation:
                iconGlow 3s
                infinite alternate;
        }


        @keyframes iconGlow {

            0% {

                box-shadow:
                    0 15px 35px -10px
                    rgba(99,102,241,0.4);

                transform: scale(1);
            }

            100% {

                box-shadow:
                    0 25px 50px -8px
                    rgba(139,92,246,0.7);

                transform: scale(1.03);
            }

        }


        .logo_icon i {

            font-size: 45px;

            color: white;

            filter:
                drop-shadow(
                    0 2px 5px
                    rgba(0,0,0,0.2)
                );
        }


        .logo_login h2 {

            font-family:
                'Plus Jakarta Sans',
                sans-serif;

            font-weight: 800;

            font-size: 2.3rem;

            background:
                linear-gradient(
                    135deg,
                    #ffffff,
                    #a78bfa,
                    #c4b5fd
                );

            background-clip: text;

            -webkit-background-clip: text;

            color: transparent;

            letter-spacing: -1px;
        }


        .logo_login p {

            color:
                rgba(167,139,250,0.8);

            font-size: 0.8rem;

            margin-top: 8px;

            font-weight: 500;

            letter-spacing: 0.3px;
        }


        /* =========================================
           SECURITY BADGES
        ========================================= */

        .secure-badge {

            display: flex;

            justify-content: center;

            gap: 10px;

            margin-top: 20px;

            flex-wrap: wrap;
        }


        .secure-badge span {

            background:
                rgba(99,102,241,0.12);

            border-radius: 50px;

            padding:
                7px 14px;

            font-size: 0.65rem;

            font-weight: 600;

            color: #c4b5fd;

            backdrop-filter:
                blur(8px);

            letter-spacing: 0.3px;

            border:
                1px solid
                rgba(99,102,241,0.3);
        }


        .secure-badge span i {

            margin-right: 6px;
        }


        /* =========================================
           FORM
        ========================================= */

        .login_form {

            margin-top: 10px;
        }


        .field {

            margin-bottom: 24px;

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


        /* =========================================
           INPUT
        ========================================= */

        .field input {

            width: 100%;

            background:
                rgba(12,15,28,0.7);

            border:
                1.5px solid
                rgba(99,102,241,0.35);

            border-radius: 56px;

            padding:
                16px 26px;

            font-size: 1rem;

            font-weight: 500;

            color: #f0f0ff;

            transition: 0.3s;

            outline: none;

            font-family:
                'Inter',
                sans-serif;
        }


        .field input:focus {

            border-color: #8b5cf6;

            box-shadow:
                0 0 0 5px
                rgba(139,92,246,0.2);

            background:
                rgba(18,22,40,0.9);

            transform: scale(1.01);
        }


        .field input::placeholder {

            color:
                rgba(139,148,210,0.45);

            font-weight: 400;
        }


        /* =========================================
           PASSWORD
        ========================================= */

        .password-wrapper {

            position: relative;
        }


        .password-wrapper input {

            padding-right: 60px;
        }


        .password-toggle {

            position: absolute;

            right: 20px;

            top: 50%;

            transform:
                translateY(-50%);

            background: none;

            border: none;

            color: #a78bfa;

            cursor: pointer;

            font-size: 16px;

            padding: 5px;
        }


        .password-toggle:hover {

            color: #c4b5fd;
        }


        /* =========================================
           LOGIN BUTTON
        ========================================= */

        .main_bt {

            width: 100%;

            background:
                linear-gradient(
                    105deg,
                    #6366f1,
                    #8b5cf6,
                    #a855f7
                );

            background-size:
                200% auto;

            border: none;

            border-radius: 56px;

            padding:
                16px 28px;

            font-weight: 700;

            font-size: 1rem;

            color: white;

            font-family:
                'Plus Jakarta Sans',
                sans-serif;

            cursor: pointer;

            transition: 0.35s;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 12px 32px -12px
                rgba(99,102,241,0.5);

            letter-spacing: 0.5px;

            text-transform: uppercase;
        }


        .main_bt i {

            margin-right: 10px;
        }


        .main_bt:hover {

            transform:
                translateY(-3px);

            box-shadow:
                0 22px 45px -15px
                rgba(99,102,241,0.7);

            background-position:
                right center;
        }


        .main_bt:active {

            transform: scale(0.97);
        }


        .main_bt.loading {

            pointer-events: none;

            opacity: 0.85;
        }


        /* =========================================
           ERROR MESSAGE
        ========================================= */

        .error-message {

            display: none;

            margin-top: 15px;

            padding:
                12px 18px;

            border-radius: 50px;

            text-align: center;

            font-size: 0.75rem;

            font-weight: 600;

            color: #fda4af;

            background:
                rgba(244,63,94,0.1);

            border:
                1px solid
                rgba(244,63,94,0.3);

            border-left:
                4px solid #f43f5e;
        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer-note {

            text-align: center;

            margin-top: 25px;

            font-size: 0.65rem;

            color:
                rgba(167,139,250,0.55);

            display: flex;

            justify-content: center;

            gap: 22px;

            flex-wrap: wrap;
        }


        .footer-note i {

            margin-right: 5px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 550px) {

            .full_container {

                padding: 15px;
            }


            .login_section {

                padding:
                    35px 25px;

                border-radius: 48px;
            }


            .logo_icon {

                width: 75px;

                height: 75px;
            }


            .logo_icon i {

                font-size: 38px;
            }


            .logo_login h2 {

                font-size: 1.9rem;
            }


            .field input {

                padding:
                    14px 22px;
            }


            .main_bt {

                padding:
                    14px 20px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================================
         BACKGROUND
    ========================================= -->

    <div class="animated-bg"></div>

    <div class="moving-gradient"></div>

    <div class="particles"></div>

    <div class="glass-orb orb-1"></div>

    <div class="glass-orb orb-2"></div>

    <div class="glass-orb orb-3"></div>


    <!-- =========================================
         LOGIN
    ========================================= -->

    <div class="full_container">

        <div class="container">

            <div class="login_section">


                <!-- =================================
                     LOGO
                ================================= -->

                <div class="logo_login">

                    <div class="logo_icon">

                        <i class="fas fa-shield-halved"></i>

                    </div>


                    <h2>ÆTHERIS</h2>


                    <p>
                        Secure Administrator Access
                    </p>


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
                     LOGIN FORM
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
                >

                    <i
                        class="fas fa-eye"
                        id="eyeIcon">
                    </i>

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



        <!-- ERROR MESSAGE -->


        <?php if(session()->getFlashdata('error')): ?>


        <div class="error-message" style="display:block">


            <i class="fas fa-circle-exclamation"></i>


            <span>

                <?= session()->getFlashdata('error') ?>

            </span>


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



<script>


// PASSWORD SHOW/HIDE


const passwordInput =
document.getElementById("password");


const togglePassword =
document.getElementById("togglePassword");


const eyeIcon =
document.getElementById("eyeIcon");



togglePassword.addEventListener(
"click",
function(){


    if(passwordInput.type === "password")
    {


        passwordInput.type = "text";


        eyeIcon.className =
        "fas fa-eye-slash";


    }
    else
    {


        passwordInput.type = "password";


        eyeIcon.className =
        "fas fa-eye";


    }


});




// AUTO FOCUS


window.addEventListener(
"load",
function(){


    document.getElementById("email").focus();


});



</script>

</body>

</html>
```
