<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>



        .cream-container {
            padding-top: 50px !important;
        }

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
            background: linear-gradient(145deg, var(--beige-light) 0%, var(--cream) 100%);
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c2418;
            padding-bottom: 3rem;
        }

        ::-webkit-scrollbar {
            width: 8px;
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

        .gold-gradient-text {
            background: linear-gradient(135deg, #b37b2e, var(--gold-dark), #d4af37, #e8c97a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 800;
        }

        .badge-cream-gold {
            background: var(--beige-dark);
            color: #7a5a2a;
            font-weight: 600;
            border-left: 4px solid var(--gold);
            box-shadow: var(--shadow-sm);
        }

        .filter-astro {
            background: rgba(255, 252, 242, 0.96);
            backdrop-filter: blur(16px);
            border-radius: var(--radius-xxl);
            border: 1px solid rgba(212, 175, 55, 0.6);
            box-shadow: var(--shadow-gold);
            transition: var(--transition-base);
        }

        .filter-astro:hover {
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold);
        }

        .filter-astro label {
            color: #8b6946;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .form-control,
        .form-select {
            background: var(--pure-white) !important;
            border: 1px solid #e9dfcf;
            border-radius: var(--radius-md);
            padding: 10px 16px;
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25);
        }

        .btn-warm-gold {
            background: linear-gradient(115deg, #d4af37, #b8860b);
            border: none;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 60px;
            box-shadow: var(--shadow-gold);
            transition: var(--transition-fast);
            color: #2c1f0f;
        }

        .btn-warm-gold:hover {
            transform: translateY(-2px);
            background: linear-gradient(115deg, #e0bc4a, #c9951a);
            box-shadow: 0 12px 22px rgba(180, 130, 30, 0.3);
        }

        .btn-outline-cream {
            border: 1px solid var(--gold);
            background: transparent;
            color: #8b6946;
            font-weight: 600;
            border-radius: 60px;
            padding: 10px 24px;
        }

        .btn-outline-cream:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
        }

        .mla-card {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: var(--transition-base);
            height: 100%;
            box-shadow: var(--shadow-lg);
            border: 1px solid #f3ecd9;
            position: relative;
        }

        .mla-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-gold-lg);
        }

        .mla-card.party-themed {
            border-top: 5px solid var(--party-primary);
        }

        .flag-podium {
            position: relative;
            width: 100%;
            height: 190px;
            background: var(--party-lightbg, #faf1e2);
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: visible;

        }

        .flag-wave-stage {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1100px;
            overflow: visible;
        }

        .flag-attached {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transform-origin: left center;
            animation: realisticClothWave 4.2s ease-in-out infinite;
            will-change: transform;
            filter: drop-shadow(0 12px 18px rgba(0, 0, 0, 0.2));
        }

        .waving-flag-img {
            max-width: 86%;
            max-height: 82%;
            width: auto;
            height: auto;
            object-fit: contain;
            object-position: left;
            display: block;
            border-radius: 6px;
            background: transparent;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }


        @keyframes realisticClothWave {
            0% {
                transform: perspective(1000px) rotateY(0deg) skewX(0deg) translateX(0%) scale(1);
            }

            12% {
                transform: perspective(1000px) rotateY(-5.5deg) skewX(1.8deg) translateX(-1%) scale(1.01);
            }

            25% {
                transform: perspective(1000px) rotateY(0deg) skewX(0deg) translateX(0%) scale(1);
            }

            37% {
                transform: perspective(1000px) rotateY(4.8deg) skewX(-1.2deg) translateX(1%) scale(1.01);
            }

            50% {
                transform: perspective(1000px) rotateY(2deg) skewX(0.5deg) translateX(0.5%) scale(1);
            }

            62% {
                transform: perspective(1000px) rotateY(-3.5deg) skewX(1.2deg) translateX(-0.8%) scale(1.01);
            }

            75% {
                transform: perspective(1000px) rotateY(0deg) skewX(0deg) translateX(0%) scale(1);
            }

            87% {
                transform: perspective(1000px) rotateY(3deg) skewX(-0.8deg) translateX(0.6%) scale(1);
            }

            100% {
                transform: perspective(1000px) rotateY(0deg) skewX(0deg) translateX(0%) scale(1);
            }
        }

        /* Enhanced hover effect - flag waves more dynamically */
        .flag-podium:hover .flag-attached {
            animation: realisticClothWave 1.8s ease-in-out infinite;
            filter: drop-shadow(0 16px 24px rgba(0, 0, 0, 0.3));
        }

        /* Golden flagpole with premium metallic finish */
        .flagpole-golden {
            position: absolute;
            left: 45px;
            top: 0;
            width: 16px;
            height: 100%;
            background: linear-gradient(135deg, #f3d382 0%, #d4a132 20%, #efd48b 45%, #b87a2a 70%, #e8c45a 100%);
            z-index: 20;
            box-shadow: 3px 0 12px rgba(0, 0, 0, 0.25);
            border-radius: 3px 0 0 3px;
        }

        /* Ornamental golden orb on top of pole */
        .pole-orb {
            position: absolute;
            left: 38px;
            top: -12px;
            width: 32px;
            height: 32px;
            background: radial-gradient(circle, #fff0b5, #e6b422, #c28a2e);
            border-radius: 50%;
            z-index: 21;
            box-shadow: 0 0 14px rgba(212, 175, 55, 0.9);
            animation: glowPulse 2.2s infinite alternate;
        }

        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 6px rgba(212, 175, 55, 0.5);
                transform: scale(1);
            }

            100% {
                box-shadow: 0 0 20px rgba(212, 175, 55, 1);
                transform: scale(1.06);
            }
        }

        /* Premium shimmer overlay (glossy reflection) */
        .shimmer-overlay {
            position: absolute;
            top: 0;
            left: -130%;
            width: 65%;
            height: 100%;
            background: linear-gradient(115deg,
                    rgba(255, 250, 210, 0) 0%,
                    rgba(255, 248, 205, 0.35) 25%,
                    rgba(255, 250, 220, 0.65) 50%,
                    rgba(255, 248, 205, 0.25) 75%,
                    rgba(255, 250, 210, 0) 100%);
            transform: skewX(-18deg);
            animation: shimmerFlow 5.5s infinite linear;
            pointer-events: none;
            z-index: 5;
            border-radius: 4px;
        }

        @keyframes shimmerFlow {
            0% {
                left: -130%;
                opacity: 0;
            }

            15% {
                opacity: 0.6;
            }

            50% {
                left: 80%;
                opacity: 0.8;
            }

            85% {
                opacity: 0.3;
            }

            100% {
                left: 150%;
                opacity: 0;
            }
        }

        /* Party label badge */
        .party-flag-label {
            position: absolute;
            bottom: 12px;
            right: 16px;
            font-size: 0.7rem;
            font-weight: 800;
            background: rgba(255, 250, 240, 0.92);
            backdrop-filter: blur(8px);
            padding: 5px 16px;
            border-radius: 60px;
            color: #7a572f;
            border-left: 3px solid var(--gold);
            z-index: 22;
            font-family: monospace;
            letter-spacing: 0.6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .avatar-frame {
            position: relative;
            margin-top: -54px;
            padding: 0 1rem;
            display: flex;
            justify-content: center;
            z-index: 25;
        }

        .mla-portrait {
            width: 140px;
            height: 160px;
            object-fit: cover;
            background: #fef6ea;
            padding: 4px;
            box-shadow: 0 12px 20px -8px rgba(0, 0, 0, 0.15);
            transition: 0.25s ease;
            border: 3px solid var(--gold-light);
            border-radius: 20px;
        }

        .mla-card:hover .mla-portrait {
            transform: scale(1.02);
            border-color: var(--gold);
        }

        .crown-rank {
            position: absolute;
            top: 16px;
            right: 20px;
            width: 48px;
            height: 48px;
            background: radial-gradient(circle at 30% 20%, #f5e7c8, #c9a03d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.5rem;
            color: #2c2418;
            z-index: 28;
            box-shadow: 0 0 0 2px #fff3e0, 0 0 0 5px rgba(212, 175, 55, 0.4);
        }

        .party-chip {
            padding: 5px 18px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--party-lightbg, #f5ede1);
            color: var(--party-primary, #b47c2e);
            border: 1px solid var(--party-secondary, #e8d8c4);
        }

        .btn-neo {
            padding: 8px 18px;
            border-radius: 60px;
            font-weight: 700;
            font-size: 0.8rem;
            transition: var(--transition-fast);
            border: none;
        }

        .btn-primary-gold {
            background: linear-gradient(115deg, #f1e0b5, #e5c989);
            color: #5e3e1a;
        }

        .btn-primary-gold:hover {
            background: #e9cf93;
            transform: translateY(-2px);
        }

        .btn-success-emerald {
            background: #e2ddcd;
            color: #4b5e3c;
        }

        .btn-dark-slate {
            background: #ebe1cf;
            color: #7b5f3a;
        }

        .modal-cream .modal-content {
            background: var(--pure-white);
            border-radius: var(--radius-xxl);
            border: 1px solid var(--gold-light);
            box-shadow: var(--shadow-gold-lg);
        }

        .stat-orb {
            background: #fdf8ef;
            border-radius: var(--radius-lg);
            padding: 1.2rem;
            border-bottom: 3px solid var(--gold);
            transition: 0.2s;
        }

        .stat-digit-xl {
            font-size: 2.3rem;
            font-weight: 800;
            color: #b8860b;
        }

        .progress-bar-custom {
            background: linear-gradient(90deg, #dec27a, #b58b3a);
            border-radius: 40px;
        }

        .gold-divider {
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold), var(--gold-dark), var(--gold), transparent);
            width: 80px;
            margin: 0.5rem auto;
        }

        /* ========== FOOTER STYLES - FIXED & APPLIED ========== */
        /* ========== TRANSPARENT FLOATING FOOTER ========== */

        .footer {
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;

            padding: 1rem 2rem !important;

            text-align: center;

            margin: 2rem 20px 25px 20px !important;
            /* bottom pasun var */

            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);

            position: relative;
            overflow: hidden;
        }

        .footer::before {
            display: none;
        }

        .footer p {
            margin: 0;
            color: #666 !important;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .footer a {
            color: #b8860b !important;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            color: #d4af37 !important;
        }

        /* Footer always content chya khali */
        .container-fluid.cream-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer {
            margin-top: auto !important;
        }

        /* Mobile */
        @media (max-width:768px) {
            .footer {
                margin: 1.5rem 15px 20px 15px !important;
                padding: 0.9rem 1rem !important;
            }

            .footer p {
                font-size: 0.8rem;
            }
        }

        /* Premium Modal Styling
   - Luxurious cream and gold palette
   - Subtle gradients and shadow effects
   - Smooth animations and transitions
   - Elegant typography and spacing
*/

        .modal-cream {
            background: linear-gradient(145deg, #fff9ef 0%, #fff3e0 100%);
            border: none;
            border-radius: 28px;
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(212, 175, 55, 0.2) inset;
        }

        /* Modal Header — Gold Accent */
        .modal-cream .modal-header {
            border-bottom: 2px solid #d4af37;
            border-radius: 28px 28px 0 0;
            background: rgba(212, 175, 55, 0.05);
            padding: 1.25rem 1.75rem;
        }

        .modal-cream .modal-title {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-size: 1.7rem;
            letter-spacing: -0.3px;
            background: linear-gradient(135deg, #b8860b, #d4af37, #f5e6a3);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .modal-cream .modal-title i {
            background: none;
            color: #d4af37;
            font-size: 1.6rem;
            margin-right: 12px;
            text-shadow: none;
        }

        /* Custom Close Button */
        .modal-cream .btn-close {
            filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.1));
            transition: all 0.2s ease;
            opacity: 0.7;
        }

        .modal-cream .btn-close:hover {
            opacity: 1;
            transform: scale(1.08);
            filter: drop-shadow(0 0 4px #d4af37);
        }

        /* Modal Body — Elegant & Readable */
        .modal-cream .modal-body {
            padding: 2rem 2rem 2rem 2rem;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #2c2418;
            background: transparent;
        }

        /* Custom Scrollbar for modal-dialog-scrollable */
        .modal-cream .modal-body::-webkit-scrollbar {
            width: 6px;
        }

        .modal-cream .modal-body::-webkit-scrollbar-track {
            background: #f0e5d2;
            border-radius: 10px;
        }

        .modal-cream .modal-body::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 10px;
        }

        .modal-cream .modal-body::-webkit-scrollbar-thumb:hover {
            background: #b8860b;
        }

        /* Premium Accordion / Card Inside (optional, if you use cards inside) */
        .modal-cream .card {
            background: rgba(255, 248, 235, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            transition: all 0.2s;
        }

        .modal-cream .card:hover {
            border-color: #d4af77;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        /* Gold badges or labels */
        .modal-cream .badge-premium {
            background: linear-gradient(110deg, #d4af37, #f3e5ab);
            color: #2c2418;
            font-weight: 600;
            padding: 0.35rem 0.9rem;
            border-radius: 40px;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* Legislator Dossier specific — info rows */
        .modal-cream .dossier-row {
            border-bottom: 1px dashed rgba(212, 175, 55, 0.4);
            padding: 0.9rem 0;
        }

        .modal-cream .dossier-label {
            font-weight: 700;
            color: #8b6b2c;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        .modal-cream .dossier-value {
            font-weight: 500;
            color: #2b2b1a;
            font-size: 1rem;
        }

        /* Gold gradient border on focus for interactive content inside */
        .modal-cream input:focus,
        .modal-cream select:focus,
        .modal-cream textarea:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        /* Premium Modal Footer (if added later) */
        .modal-cream .modal-footer {
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            background: rgba(245, 235, 210, 0.4);
            border-radius: 0 0 28px 28px;
            padding: 1rem 1.75rem;
        }

        /* Animation on modal open (requires Bootstrap's modal already) */
        .modal.fade .modal-dialog {
            transform: scale(0.96) translateY(-10px);
            transition: transform 0.25s ease-out, opacity 0.2s;
        }

        .modal.show .modal-dialog {
            transform: scale(1) translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .modal-cream .modal-body {
                padding: 1.25rem;
            }

            .modal-cream .modal-title {
                font-size: 1.3rem;
            }
        }

        /* Extras: shining gold line animation (optional, for premium feeling) */
        @keyframes softGoldPulse {
            0% {
                border-color: rgba(212, 175, 55, 0.3);
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.1);
            }

            50% {
                border-color: rgba(212, 175, 55, 0.9);
                box-shadow: 0 0 8px 0 rgba(212, 175, 55, 0.3);
            }

            100% {
                border-color: rgba(212, 175, 55, 0.3);
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }

        /* Apply to specific premium elements if you add .premium-glow class */
        .modal-cream .premium-glow {
            animation: softGoldPulse 2s infinite;
            border-radius: 20px;
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
                            <button type="button" id="sidebarCollapse" class="sidebar-toggle-gold-premium"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section mr-3 d-lg-none d-block">
                                <a href="index.html"><img class="img-responsive" src="images/logo/MLA LOGO.png" alt="#"
                                        style="max-height: 44px;" /></a>
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
                                        <li>
                                            <div class="clock-luxury-gold">
                                                <div class="clock-time" id="liveClock">--:--:--</div>
                                                <div class="clock-date" id="liveDate">Loading...</div>
                                            </div>
                                        </li>
                                        <!-- Premium Notification Bell -->
                                        <li><a href="<?= base_url('notification-center') ?>" class="notif-gold-luxury"><i
                                                    class="fa fa-bell-o"></i><span
                                                    class="notif-badge-premium">2</span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="images/layout_img/user_img.jpg" alt="#" width="38" /><span
                                                    class="name_user">ADMIN</span></a>
                                            <div class="dropdown-menu dropdown-menu-gold-luxury">
                                                
                                                <a class="dropdown-item" href="#"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- EXISTING CONTENT AREA (COMPLETELY PRESERVED - NO MODIFICATIONS) -->
                <!-- end topbar -->
                <div class="container-fluid mt-4 px-3 px-lg-5 cream-container">
                    <!-- Hero Section -->
                    <div class="text-center mb-4">
                        <span class="badge badge-cream-gold px-4 py-2 rounded-pill"><i
                                class="fas fa-chart-line me-2"></i> LEGISLATIVE PERFORMANCE INDEX</span>
                        <h1 class="display-5 fw-bold mt-3 gold-gradient-text"><i class="fas fa-landmark me-3"></i> Top 3
                            Most Ranking MLAs</h1>
                        <div class="gold-divider"></div>
                        <p class="text-muted mt-2" style="color:#9b7c54 !important;">Tracking excellence in governance &
                            development</p>
                    </div>
                    <div id="topMlaSection" class="row g-4 mb-5"></div>

                    <!-- FILTER PAVILION -->
                    <div class="filter-astro p-4 shadow-lg mt-2">
                        <h3 class="mb-4 fw-semibold" style="color:#876b42;"><i class="fas fa-tachometer-alt me-2"
                                style="color: var(--gold-dark);"></i> Constituency Command Center</h3>
                        <div class="row g-3">
                            <div class="col-md-3"><label><i class="fas fa-user-tie me-1"></i> MLA Name</label><input
                                    type="text" class="form-control" id="mlaName" placeholder="Search leader"></div>
                            <div class="col-md-3"><label><i class="fas fa-flag-checkered me-1"></i> Party</label><select
                                    class="form-select" id="party">
                                    <option value="">All Parties</option>
                                </select></div>
                            <div class="col-md-3"><label><i class="fas fa-city me-1"></i> District</label><select
                                    class="form-select" id="district">
                                    <option value="">Select District</option>
                                </select></div>
                            <div class="col-md-3"><label><i class="fas fa-map-pin me-1"></i> Constituency</label><select
                                    class="form-select" id="constituency">
                                    <option value="">Select Constituency</option>
                                </select></div>
                            <div class="col-md-3"><label><i class="fas fa-sort-amount-down me-1"></i> Sort by
                                    Name</label><select class="form-select" id="sortOrder">
                                    <option value="asc">A → Z</option>
                                    <option value="desc">Z → A</option>
                                </select></div>
                        </div>
                        <div class="mt-4 d-flex gap-3 flex-wrap">
                            <button class="btn btn-warm-gold px-4 fw-bold" onclick="filterMLAs()"><i
                                    class="fas fa-filter me-2"></i>Deploy Filters</button>
                            <button class="btn btn-outline-cream px-4" onclick="resetAllFilters()"><i
                                    class="fas fa-sync-alt me-2"></i>Reset</button>
                        </div>
                    </div>

                    <!-- MLA GRID -->
                    <div class="mt-5">
                        <h2 class="gold-gradient-text fs-2 fw-bold"><i class="fas fa-users me-2"></i> People's
                            Representatives</h2>
                        <div class="row mt-4" id="mlaResult"></div>
                    </div>

                    <!-- FOOTER - REMOVED extra container-fluid wrapper -->
                    <div class="footer">
                        <p class="mb-0"> &copy;
                            <script>document.write(new Date().getFullYear());</script> MLA Monitoring & Voter
                            Feedback System. All Rights Reserved. Design by <a href="https://absoftwaresolution.co.in/"
                                target="_blank">AB software Solution</a>
                        </p>
                    </div>
                </div>

                <!-- Premium Modal -->
                <div class="modal fade" id="premiumModal" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content modal-cream">
                            <div class="modal-header border-warning">
                                <h5 class="modal-title fw-bold" id="premiumModalTitle"><i
                                        class="fas fa-id-card me-2"></i>Legislator Dossier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body" id="premiumModalBody"></div>
                        </div>
                    </div>
                </div>
                <script>
                    // Party color & Flag Map (authentic flag images - full quality)
                    const partyColorMap = {
                        "BJP": { primary: "#FF6B00", secondary: "#FF8F33", lightBg: "#FFF4E8", flagImg: "data:image/png;base64,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" },
                        "Shiv Sena": { primary: "#FF8C00", secondary: "#FFB74D", lightBg: "#FFF8E1", flagImg: "data:image/jpeg;base64,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" },
                        "NCP": { primary: "#1565FF", secondary: "#42A5F5", lightBg: "#EEF5FF", flagImg: "data:image/png;base64,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" },
                        "Shiv Sena (UBT)": { primary: "#E53935", secondary: "#EF5350", lightBg: "#FFF1F1", flagImg: "data:image/jpeg;base64,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" },
                        "INC": { primary: "#00A86B", secondary: "#26C281", lightBg: "#EEFFF7", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Indian_National_Congress_Flag.svg/200px-Indian_National_Congress_Flag.svg.png" },
                        "NCP (Sharad Pawar)": { primary: "#7B2CBF", secondary: "#9C4DCC", lightBg: "#F8F0FF", flagImg: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY0s6JYeeICagmgCTZbIfAKx4OlAtu9Amjog&s" },
                        "SP": { primary: "#FF1744", secondary: "#FF4569", lightBg: "#FFF0F4", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Samajwadi_Party_Flag.svg/200px-Samajwadi_Party_Flag.svg.png" },
                        "Jan Surajya Shakti": { primary: "#00897B", secondary: "#26A69A", lightBg: "#ECFFFC", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Jan_Surajya_Shakti_flag.svg/200px-Jan_Surajya_Shakti_flag.svg.png" },
                        "AIMIM": { primary: "#00C853", secondary: "#2ECC71", lightBg: "#F0FFF6", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/AIMIM_Flag.svg/200px-AIMIM_Flag.svg.png" },
                        "CPI(M)": { primary: "#C62828", secondary: "#D32F2F", lightBg: "#FFF0F0", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/CPI-M-flag.svg/200px-CPI-M-flag.svg.png" },
                        "PWPI": { primary: "#795548", secondary: "#8D6E63", lightBg: "#F7F2F0", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/PWPI_Flag.svg/200px-PWPI_Flag.svg.png" },
                        "Rashtriya Samaj Paksha": { primary: "#D81B60", secondary: "#EC407A", lightBg: "#FFF0F6", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Rashtriya_Samaj_Paksha_flag.svg/200px-Rashtriya_Samaj_Paksha_flag.svg.png" },
                        "RSVA": { primary: "#3949AB", secondary: "#5C6BC0", lightBg: "#F1F3FF", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Republican_Sena_flag.svg/200px-Republican_Sena_flag.svg.png" },
                        "Rashtriya Yuva Swabhiman Party": { primary: "#00BCD4", secondary: "#26C6DA", lightBg: "#EEFDFF", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Rashtriya_Yuva_Swabhiman_Party_flag.svg/200px-Rashtriya_Yuva_Swabhiman_Party_flag.svg.png" },
                        "Independent (अपक्ष)": { primary: "#546E7A", secondary: "#78909C", lightBg: "#F5F8FA", flagImg: "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Independent_candidate_icon.svg/200px-Independent_candidate_icon.svg.png" }
                    };

                    // Geography & MLA dataset
                    const geography = {
                        "Thane": ["Thane", "Kopri-Pachpakhadi", "Ovala-Majiwada", "Mira Bhayandar", "Bhiwandi East", "Bhiwandi West", "Kalyan West", "Kalyan East", "Dombivli", "Ambernath", "Ulhasnagar", "Mumbra-Kalwa", "Airoli", "Belapur"],
                        "Nagpur": ["Katol", "Savner", "Hingna", "Umred", "Nagpur South West", "Nagpur South", "Nagpur East", "Nagpur Central", "Nagpur West", "Nagpur North", "Kamptee", "Ramtek"],
                        "Satara": ["Man", "Karad North", "Karad South", "Patan", "Jaoli", "Wai", "Koregaon", "Phaltan", "Khandala"],
                        "Pune": ["Shirur", "Daund", "Indapur", "Baramati", "Purandar", "Bhor", "Maval", "Chinchwad", "Pimpri", "Bhosari", "Vadgaon Sheri", "Shivajinagar", "Kothrud", "Khadakwasla", "Parvati", "Hadapsar", "Pune Cantonment", "Kasba Peth"],
                        "Mumbai": ["Colaba", "Malabar Hill", "Mumbadevi", "Byculla", "Shivadi", "Worli", "Mahim", "Dharavi", "Sion Koliwada", "Wadala"],
                        "Ahmednagar": ["Ahmednagar City", "Shrigonda", "Rahuri"],
                        "Kolhapur": ["Kolhapur North", "Kolhapur South", "Kagal"],
                        "Nashik": ["Nashik East", "Nashik West", "Deolali"]
                    };

                    const mlaAssembly = [
                        { id: 1, name: "Eknath Shinde", district: "Thane", constituency: "Kopri-Pachpakhadi", party: "Shiv Sena", mobile: "+91 98765 43210", email: "eknath.shinde@maharashtra.gov", totalWorks: 124, approval: "96%", ranking: 1, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlGOI36qqCxNsMAhzsx2LQ0cKyfgxglCFJjw&s", works: [{ id: "W001", title: "Thane Coastal Corridor", desc: "6-lane flyover & sea wall", category: "Infra", budget: "₹5.2Cr", status: "Ongoing", progress: "74%", rating: "4.8" }], analytics: { villages: 128, done: 102, pending: 26 } },
                        { id: 2, name: "Devendra Fadnavis", district: "Nagpur", constituency: "Nagpur South West", party: "BJP", mobile: "+91 99887 76655", email: "devendra.fadnavis@mla.in", totalWorks: 140, approval: "98%", ranking: 2, image: "data:image/jpeg;base64,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", works: [{ id: "W002", title: "Nagpur Metro Phase II", desc: "New corridors + stations", category: "Transport", budget: "₹12Cr", status: "Ongoing", progress: "68%", rating: "4.9" }], analytics: { villages: 112, done: 99, pending: 13 } },
                        { id: 3, name: "Chh Shivendra Raje Bhosale", district: "Satara", constituency: "Jaoli", party: "BJP", mobile: "+91 90909 09090", email: "shivendra@mla.com", totalWorks: 110, approval: "92%", ranking: 3, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTVeQ0WWK_m_3gzbtZg37O0MgOu5k08sYeM7JtS0Xujg&s", works: [{ id: "W003", title: "Lift Irrigation Scheme", desc: "Canal + solar pumps", category: "Agriculture", budget: "₹8Cr", status: "Ongoing", progress: "82%", rating: "4.7" }], analytics: { villages: 94, done: 72, pending: 22 } },
                        { id: 4, name: "Makarand Patil", district: "Satara", constituency: "Khandala", party: "NCP", mobile: "+91 88888 81111", email: "Makarandpatil@ncp.in", totalWorks: 130, approval: "94%", ranking: 4, image: "data:image/jpeg;base64,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", works: [{ id: "W004", title: "Jalyukta Shivar", desc: "Water conservation + reservoirs", category: "Water", budget: "₹15Cr", status: "Ongoing", progress: "85%", rating: "4.6" }], analytics: { villages: 156, done: 134, pending: 22 } },
                        { id: 5, name: "Uddhav Thackeray", district: "Mumbai", constituency: "Mahim", party: "Shiv Sena (UBT)", mobile: "+91 77777 72222", email: "uddhav@ssubt.org", totalWorks: 95, approval: "89%", ranking: 5, image: "https://i.pinimg.com/736x/f8/c4/68/f8c46840bee48df1157ae44b44dd25ef.jpg", works: [{ id: "W005", title: "Coastal Road Extension", desc: "Sea link + pedestrian plaza", category: "Infra", budget: "₹200Cr", status: "Ongoing", progress: "58%", rating: "4.9" }], analytics: { villages: 68, done: 49, pending: 19 } },
                        { id: 6, name: "Jayant Patil", district: "Pune", constituency: "Indapur", party: "NCP (Sharad Pawar)", mobile: "+91 9876543210", email: "jayant@ncp.com", totalWorks: 88, approval: "91%", ranking: 6, image: "data:image/jpeg;base64,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", works: [], analytics: { villages: 76, done: 62, pending: 14 } },
                        { id: 7, name: "Aaditya Thackeray", district: "Mumbai", constituency: "Worli", party: "Shiv Sena (UBT)", mobile: "+91 9988001122", email: "aaditya@ssubt.org", totalWorks: 112, approval: "93%", ranking: 7, image: "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQEhAPEBAPFQ8PEA8PEA8QEBAPEBAPFRUWFhUVFRUYHSggGBolHRUXITEiJikrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGC0dHx0vKy0tLS8tLS0rLS0tLS0tKystLS0tLS0tLSstLS0tLS0rLS0tLS0tLS0tLS0tKy0tLf/AABEIALkBEAMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAABAgAGAwQFBwj/xAA9EAACAQIEAwUFBwIGAgMAAAABAgADEQQSITEFQVEGEzJhcSKBkaGxBxRCUnLB8DPRI2KCsuHxFUNEkqL/xAAaAQADAQEBAQAAAAAAAAAAAAAAAQIEAwUG/8QAIxEAAgMAAQUBAAMBAAAAAAAAAAECAxEhBBIxQVEiE2FxMv/aAAwDAQACEQMRAD8A9MMkJgkFDiSQSRgLCIIwgAZDDaAwECMsAhWAwwGNAYCJIsErnaPtVTwwdaYz1V9k28CMRoGPXnaAyykznV+OYVGyNXp5huL3t6naeNcT7U4pyyNVqENq+pAPloRp5fKc04sWuWH6ReV2i0+g6NZXAZWDA7EEEH4TKBPnelj2AKoz6m+UkhSfTrMuE41iqBulashO4pvlB9RsffDtDT6FkM8Pw3a/iCHOMW7DQlKoVxL12Z7f08QVpYhRTrHTOp/wmPkCbg+WsGgLpJJDJAMkkkYCmSEwRAQQyCSMCGLGMWAEhEEIgBJDDAYAYTBGMEkYwhkEMYCwiCQQAeAwwGAAjLBaMIAGK8aafFMatCm9VzZUUsTz06ecBFH7d9qe7y0KVTKXJR2UgZRdb62uNCfjPPuJcbXJTpqblSWYm1s+u3lt8JxOL8RarUepc+1UdwNNMzXnMeqTKXAM61TGGq+Y6A6n6bfzebSsgG3i15aDW31nCotqLmbbVV6k33sDLTJw6uFZCSSbAa32v5fzrMNdDe5IOpHL5fzlOU1U7DSbmY8/+v4dYaM6Xe0wtr8rt57afzpMAvuDYD4XPIzRqONADpv74aeIOx8O+/OJgj2z7Pu061qVPDVm/wAdBlUsdKgG1ief9pdZ85UMZbLytpfnPVPs77WnEk4SsxaqqlqVRvFUQbq3Vh15i/TWWhl7gkkiABghgiAIhgEkaAhixjFgBIRBCIgDFaNA0YGIwSESSRjiSCExgCFYIRABoIYDAQYRFjLAAzzP7VuL2X7urakZiAeWoHzHyM9LM+d+2XEjWxuKYn2UqvTX9KHIP9vzjXkCtU6Jdgo3vpLHhOxlZwGOl+Vpv9guDrXdqrD2abADzO5nq+Fw6gWsJnttaeI1VUpruZ5CextRT+/WSt2adRsJ7GcEpOoh/wDFU23USVbL6dHVD4eN4Xss7nRST751j2DrMNLj1nq+H4cibATZKDlH3y+i7IfDxqt9mmJC5ldS35TeVTH8PqUWKVVsy9ddJ9FOs83+0bBKbPoCOf7SoWvuxnOypduo82udDeb/AAzibUK9KshN6LpVXLuwB1HvFx75y6jFW8usyoliD579LzSzMfUOGrrURKiG6OqupGxVhcTJKx9muMarw+hmGtLPQ02KoxCf/mw90s8kASSSRAQQyCSMQDFjmLEMEYQQxgSBoYGgIxGCEwSSh5DJIYwBCsEKxANIZBIYxAjCCFYAGfLHFHPfV83iNarm/XnbN87z6nE+Y+2GF7rG4un+XE1iB0DOWHyIgB6L9nFALh1P5iWPnrL7h6V5Tew2SnhKLVGCqUViSbeLYSy/+fwtP/2D4GYnFyk2ehGSjFI7aUZkFO05eG47Qqf06iN1ysCR7pnfiQ6yuEPGzoBZHpyo8a7X08OD+JrgBRzMr9Xtri38CFR1IAA8jmIPylR/REn2notVCJTe23CGxNJlS2caqOpGs0cP2g4gbOEpOOY+8lfiO6P1mxhu1Waq9PFU6OECoGWricWipV1se79mzEcxcEXHWJ1tPUxKxZjPGqtMqSjizKSpB3Bm3hT+E/wS6/aP2f8AaGMornpkWrPTF1UjZn/KD1Om0pVJrEdQNflNVc+5aZJx7Xh7r9lt/uCedauR6ZpbZXfs+p5eH4UdVqN/9qjt+8sUpkiySQSQGEkghjEAwQmLeJjJDBGjAEBhgMAMRkgkiGPIYYDAQIVghWAxpDJAYCDCIIRAAzyn7SuC4VcQapSuMXizSSgxSk2CzewrtULA2sLk39bWnq0oXbXjCjEUUZfZwWKwmJzm1ggI7xvcjMf9MmTSzTpXBy3PSKVhaDt31OrUcrhavci1Q901IKCjLTW1MKwGYEDYjWczH1aS2K0jY3s17A2tf6iejcU4eKlfFoKaICaIHdqFFQL3gDEDnra/kJzl4FYBDQUqpuM/tAHqAZylYlI7Kp9q+lNw+OcJmp51dVzgXzIQL8jsbcxY+onqvZaocXh1rJSphSDbvT3jtbz2HTTpKl2i4etDC1qpUBind01VRdqr+wqgDzPwBnoPYzAmhhKNI+JKahv1W1+d5MkpcnSOx4PK3w7vicW5Ud5SqLQAGyKKakkdMzEk26TEeE16gdrkVAVKAkAHXXfQaS48fwgweLbGNb7rixTpYkn/ANFdbilVbohzFSeV7mdRuC0nG1vRiPoY/HIs8plFwHDcYqhmI7wMea+D9Q3NydNrAbHWdTiuDNUYFnS70+IYVwLDUe0X91lzH9MtOH4HTU3OY9LuxmCpRFbEoqWNLBF3qNfT70yGmtMdSqPULdCyedlr3R4ksOX2zWoMO1WnUdHQhsyMVJU+yynqCDqDpKlwPspTrhK+IqZaRJvTpKENQgkb7C9tlA8rS+dp7fdsQDzpOPlON2Wq01ShSqhs2Q1KZ/DYuw+OkmMmo8FdilPlbwWngXFkRqWFWlkoi1KmM2bLba//AGZaJWaHDwayMBs6t+/0vLMTO1TbXJx6qMU12iySSTqZQiSQSRgQxYTBAARoIYASAwwGAGEyCQyCSMe8hkkMYgQrBCIDGghggIkZYsYQAMrPGeFK1VncAq4ubjll1Hpv8ZZpocYQlCygEpqQeaneRZHUdqJ9s/8AeCldn8XU7tGqJUqKi9ytRMrOERmC96rMCSAAMylidLgG5PQxXaOmg0p13P5RTKH41Co+F5zeGHItVBcWr1tDqQC2cD4MJMSqgX5zNKznwa4Vf2YcHTrcQxK1K2VKOE/xUoqc6q+oVmJAzObHlZQDbe5vmCxqqoF+Qnn+JxrYWkzowDNuDrm90q+H7bVVHt0r6+IMVG/MEGOLkypKC409ir0aNfOtSxQrZlJteUTEYCvhaj0cNiaq0AQaelKsEBHgy1VYLb/LaVdOL4zFFqgNRaANrUsy256kbmXLA4+h3QF2v+ZtdfM84/16FsPZkwuHxT/1sZWqIbXQClhwR0JoKhI8ryxYTLTRaaKiogsqIoRVHkBoJWcDiw59hgR0G4nUaowF+QF5HdLwxuMM1GLtQb0Ko6rYxOCYAPhaJcAFaaZXOlhufXc/GaPHMdei1tyQPdfnLNwLBI9GjZTlKISWGg0FyL76ylF5hzU0np1+FoCM/I+yp6gaE/KbxgRQoCjQAWA8oTNUY4sMc590tFkkkjICJJBJGADBCZIgBDBGjAEBhimAjEZBIZBEUPIZJDAQIVghEBjQGGKYAGMIl44gIMUxopgB5/xTLSxleiNn7uuo5gMoUj4oYvG2FKg1XewAHqdBG+0rCNRqYfiKWyqPu1be9iSUPpqw94nI4vxukaChrMrkZRcam1xMs4fo21Wfk4LY2wTvjdqhARNhY8z5f2lh4VwCrUJULRVVDa+PUHb5zeo4Om9Cn3lNXBRbhhvpqJ0sBXwtPwmohIsRmuPnzi8vlmmEX2/k1x2fq92hLoodrOoAsBY/2HxlaxODrPlTDrTrU2zB2ByoGDFSAwvrpLfVx+HNh7dQgggO5KgjY5dr6mZKNe+wUaWAAsqiGJDcWl+im9mcC+HxZpudO7JOtwG6Xll4vj1pIdRsZUuP8WFHFkrrZbcr3G84/GePmqNDvoR9Jf8AG3jMjsS1G2td6tRKIJ/xGy9bBjyHkD8p7lgVC06SjYU6YHoFE8Q7B4c1sSlQ7UQW2JFyLDX3z3DC+BP0J9BOq4eHCb1aZoIYDLOQsMkkACJJJIAKxkvCYsAII0URowJFMaKYAYpBBCIhjwGSQwAkIghUwAMEMBgBIyxI4gIaKYYIAanFuHU8TSehVF6dQAEehuD7iAfdPnjtDgK+Crthq1yKTXQ6lXQi6sLjW4t859JSl/aZ2V++0RWpgd/QBKg5vbTdl057fAwHpxuzHEaeIoLTL+2qjXy5TYx/BqgVnDaAE33vbpPJ+HcTeg11JFrjW9x7pZ8P22coqs2x5nlrOM6edRqqu4wsvB+B1HbM9QBRewzam3p752sZi6OGpk5wTbS2+2888r9rmF8jaHXfY/y84GM4zUrHUmwvpfl5QVWildhOOYrPWc763B8prg5rKBcmw981k1JJlt7K8JJYVXX9APLznaUlFHCMXJl07FcO+70gD42sz+R6S9cG4ilVWCnWk7UXHNXUA2PqpUjyYSr4NSq35zodiMIVGMrG+XEYrMg5EJSpoWHvUj/TI6V983vs6dSuytNei1CQzGDb0jZhO86nEyxsTDBJBOZY4kgEJjAUwQmLEARGiiNGBIpjRTExGGESSCBQ0BhgMAIIwixhAQRAYYpgBI4iRhABhFhEEAII9ol5y+IcQPtKunst6k20nWuqVngmc1HyeS9rODUcXUrYrCEDNWrcrLUIdlJ8rkH5Sk1eH1UNmpsPdLj2GxWajUpn8FZrejBT9SZ1a+GBJ85jla4ScTZGpTSZ5t3J2sbzPQ4dVJ8BAPMi0vf3NR+Ea76CEYYdIv5/iKXT/WcHhXBFBBIu3nt8JfOFYIKAZr8I4Y7m1NCbbnYL6nYS4cP4OqWNQ5m/KPAD9W/mkcKbLnwE7a6UYMJw9qgubrT/ADcyOij99vXad2iAoVVFlUBVA5ARWN4Fa5yjeetR08al/Z5V17sfPg2C0NAc+VtOcxVKqJox1/KN/fM1GqW1A9mW9w4mYAev0kbKISPW/O0Xub7mc8T8la14ANYSI+UCQTnKuL8Fxsa8mEwTPlB05xGpkTi62jtG1MQQwCNIOhIkaLECMUIghEBjQGGAwAkIixhAQ0BhimAEjxI4glvgNwkFusJEwsh5TTCjf+jhK74FzK9xPCqK9ItcmoxVbn2Q2Um5+EsFjNLHUM4RudJw/wBQfkTN1WQ4Rwk2/J4Z2SpPRfE0nBD06xRlO4ZdCJb6Thp3OPcFp1nNamAMSAM1tBXUbA/5gNj5AHlbhYalrPE6ylwnr9nr9LYpRH7ubXDMB3tVaewOrEckGpP7epEY4Uzsdl6YWtqN6br77qf2meiKlYkzRbJxg2iwUaK01CIoVF5DT3k8z5zIDCzLyBJ6an5Tm8d4kcOgOW9RzanSBGZmO3oOfu859FBekeBJ+2blasFDMWVVUXZ3OVVXqTympQxtWrcYalUCHQ4iohp5v0K2tvOY+A8HqsRiMY2apfNToD+jRP5rfjqcsx2GgtrezXtCU1F5mk5pz8Hw0L7Te03Mt/adHQf2mMvfQCZFTrOMpOXLGkkEQyQgyCiASQyRAKwiVauUE2va3zjmaz1rllAFly3P+aUloD67m1yL6C0EZyYt5xthxqO1UvRDEjkxJnO5jhEEggUPAwhgaAgRhFmNcUufu7nNYEG3snfQHrpt5iS5JeWBngjRTKEQCZDBS5xqg0mqmOLfpmtlrwXUQXEx99beEVVPlNGM5DkTC2h8uczDyN4KlO8EwKR2lxrYStSRkPcVMzU6o1Ga2qEW31B329DNekqVmzoRZzfTkef885csZgkqqaNVQyGxUkeFhsZwqfC0o1MqiwUZmtzZibfJT8RJ6ztnQ98o79JJxsXxhp4bTbaZ+G0QKqXUEElSCAdwQPnabQQ3AUXY8o/EK1LB0++rMAfwgasz7hVH86meX09MpTTXo9G++MYNP2Z+M8WpYSmXbfZEUe07clAnH7PYGpXqHGYnWo3gT8NJeg/vOJwyhVx9fv618qn2E3VF6DqepnoeFohQAOU9yWVRz2zxfI+2gkWnfeZAI0y6UALbaSBiYljAByYVEAWaePxZUqq7nU+kai5PEBvwEzClbS5/7Mma/wDOUWDFxNcIpY+ij8xOwmDD0iqEnxMczHzJmAt3tXTwUtB5tzM3cQbAL1InTM4+iGtFjgTG0nN4Gnj0Jiw3izA1jw2J6tMcStWVBmY6fMmPNLiHipfqH+4ThdNwg5I0UQU5qLNylVJF8pAO1yLn3colXEKih20Frn/iZqm3vX6iaHFvAvqv0nG2U4LuUvB1qhCcsazWZqmLXu+8U3BVSP8AULicXvSG8wM1/MnT/bOnxP8Ap+8fQzljxH9Cf7nnl9VfKya3jC4UxTZaLRTHMQz3zCZKI09ZktEpbfzoI83rwYX5MbUgZhqYQGbUBlqTQjRbBEeFiIVWsOYM3I4jc37A1MrncTV4mtMKKrsBkOu/tdBYbn/mdQyq9q/6a/qb9oKKs/LKjJxeo5PEe0FU5lwwKA6GpoajDy5L7tfOcnDcLrYiqC7OzWAL1GZ2t6mdUeI/6fpO9wfdvdNcYxrj+UKcm3ydLhHD1pKFUbTq5Zjw8zCYZybfIkhbSWjCCQMlpCIRCYAY2nCxD5qhPTSdypK+fE36jNNC8kyFOPLOVHgT6zbqYwrTv+JjkQdepnCwXib1b6zq4v8A+P6P9TO0oLhC06PDaGRRffc+syvq1+m0el4fhFMzN62yjMo0vMJMzP4T6TVpbCKID3ghEkx3L9GqrmJ//9k=", works: [{ id: "W006", title: "Worli Beautification", desc: "Coastal cycling track", category: "Infra", budget: "₹22Cr", status: "Ongoing", progress: "45%", rating: "4.7" }], analytics: { villages: 51, done: 40, pending: 11 } },
                        { id: 8, name: "Amit Kadam", district: "Satara", constituency: "Jaoli", party: "Shiv Sena (UBT)", mobile: "+91 90390 09090", email: "amitkadam@mla.com", totalWorks: 110, approval: "92%", ranking: 8, image: "data:image/jpeg;base64,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", works: [{ id: "W003", title: "Lift Irrigation Scheme", desc: "Canal + solar pumps", category: "Agriculture", budget: "₹5Cr", status: "Ongoing", progress: "52%", rating: "2.7" }], analytics: { villages: 94, done: 50, pending: 44 } },   
                        { id: 1, name: "Kedar Dighe", district: "Thane", constituency: "Kopri-Pachpakhadi", party: "Shiv Sena (UBT)", mobile: "+91 98767 43210", email: "kedardighe@maharashtra.gov", totalWorks: 30, approval: "66%", ranking: 9, image: "https://ananddighe.com/wp-content/uploads/2019/08/kedar_dighe.jpg", works: [{ id: "W001", title: "Thane Coastal Corridor", desc: "6-lane flyover & sea wall", category: "Infra", budget: "₹2.2Cr", status: "Ongoing", progress: "74%", rating: "3.8" }], analytics: { villages: 128, done: 70, pending: 56} },
                    ];
        

                    function getPartyStyles(party) {
                        return partyColorMap[party] || partyColorMap["Independent (अपक्ष)"];
                    }

                    // Build MLA Card with REALISTIC WAVING FLAG - FULL VISIBILITY - transform-origin left center
                    function buildMLACard(mla) {
                        const style = getPartyStyles(mla.party);
                        const flagImageUrl = style.flagImg;
                        return `<div class="col-lg-4 col-md-6 mb-4">
            <div class="mla-card party-themed" style="--party-primary: ${style.primary}; --party-lightbg: ${style.lightBg}; border-top: 5px solid ${style.primary};">
                <div class="flag-podium" style="background: ${style.lightBg};">
                    <div class="flagpole-golden"></div>
                    <div class="pole-orb"></div>
                    <div class="flag-wave-stage">
                        <div class="flag-attached">
                            <img src="${flagImageUrl}" class="waving-flag-img" alt="Party Flag" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Independent_candidate_icon.svg/200px-Independent_candidate_icon.svg.png'">
                        </div>
                    </div>
                    <div class="shimmer-overlay"></div>
                    <div class="party-flag-label"><i class="fas fa-crown me-1"></i> ${mla.party}</div>
                </div>
                <div class="avatar-frame"><img src="${mla.image}" class="mla-portrait" onerror="this.src='https://ui-avatars.com/api/?background=${style.primary.replace('#', '')}&color=fff&name=${encodeURIComponent(mla.name)}&rounded=false&size=112'" alt="${mla.name}"></div>
                <div class="crown-rank"><span>${mla.ranking}</span></div>
                <div class="p-4 pt-2 text-center">
                    <h3 class="fw-bold mb-1" style="color:#3b2c1a;">${mla.name}</h3>
                    <span class="party-chip" style="background:${style.lightBg}; color:${style.primary}; border-color:${style.secondary};"><i class="fas fa-flag"></i> ${mla.party}</span>
                    <p class="mt-3"><i class="fas fa-location-dot me-2" style="color:#b8860b;"></i><strong>${mla.district}</strong> · ${mla.constituency}</p>
                    <div class="btn-group-card d-flex gap-2 justify-content-center mt-2">
                        <button class="btn-neo btn-primary-gold" onclick="showProfile(${mla.id})"><i class="fas fa-id-card"></i> Bio</button>
                        <button class="btn-neo btn-success-emerald" onclick="showWorks(${mla.id})"><i class="fas fa-tasks"></i> Works</button>
                        <button class="btn-neo btn-dark-slate" onclick="showVillageAnalytics(${mla.id})"><i class="fas fa-chart-simple"></i> Impact</button>
                    </div>
                </div>
            </div>
        </div>`;
                    }

                    function populateDistricts() { let select = document.getElementById("district"); select.innerHTML = '<option value="">Select District</option>'; Object.keys(geography).sort().forEach(d => select.innerHTML += `<option value="${d}">${d}</option>`); }
                    window.loadConstituencies = function () { let district = document.getElementById("district").value; let constSelect = document.getElementById("constituency"); constSelect.innerHTML = '<option value="">Select Constituency</option>'; if (geography[district]) geography[district].forEach(c => constSelect.innerHTML += `<option value="${c}">${c}</option>`); };
                    document.getElementById("district")?.addEventListener("change", loadConstituencies);
                    function populatePartyFilter() { let parties = [...new Set(mlaAssembly.map(m => m.party))]; let partySelect = document.getElementById("party"); parties.forEach(p => { partySelect.innerHTML += `<option value="${p}">${p}</option>`; }); }
                    function displayTopChampions() { const topRankers = [...mlaAssembly].sort((a, b) => a.ranking - b.ranking).slice(0, 3); document.getElementById("topMlaSection").innerHTML = topRankers.map(m => buildMLACard(m)).join(''); }
                    function filterMLAs() { let name = document.getElementById("mlaName").value.toLowerCase(); let party = document.getElementById("party").value; let district = document.getElementById("district").value; let constituency = document.getElementById("constituency").value; let sort = document.getElementById("sortOrder").value; let filtered = mlaAssembly.filter(m => (!name || m.name.toLowerCase().includes(name)) && (!party || m.party === party) && (!district || m.district === district) && (!constituency || m.constituency === constituency)); filtered.sort((a, b) => sort === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name)); let container = document.getElementById("mlaResult"); if (filtered.length === 0) container.innerHTML = `<div class="col-12 text-center p-5"><i class="fas fa-chess-queen fa-4x" style="color:var(--gold);"></i><h4 class="mt-3">No representatives match</h4></div>`; else container.innerHTML = filtered.map(m => buildMLACard(m)).join(''); }
                    function resetAllFilters() { document.getElementById("mlaName").value = ""; document.getElementById("party").value = ""; document.getElementById("district").value = ""; document.getElementById("constituency").innerHTML = '<option value="">Select Constituency</option>'; document.getElementById("sortOrder").value = "asc"; filterMLAs(); }
                    window.showProfile = (id) => { let m = mlaAssembly.find(i => i.id === id); document.getElementById("premiumModalTitle").innerHTML = `<i class="fas fa-user-graduate"></i> ${m.name} · Ministerial Profile`; document.getElementById("premiumModalBody").innerHTML = `<div class="row"><div class="col-md-4 text-center"><img src="${m.image}" style="width:140px;height:140px;object-fit:cover;border-radius:20px;border:3px solid var(--gold);"><h3>${m.name}</h3><span class="badge fs-6 px-4 py-2" style="background:#d4af37;">${m.party}</span></div><div class="col-md-8"><table class="table table-cream table-bordered">${Object.entries({ Name: m.name, Party: m.party, District: m.district, Constituency: m.constituency, Mobile: m.mobile, Email: m.email, "Total Projects": m.totalWorks, Approval: m.approval, Rank: `#${m.ranking}` }).map(([k, v]) => `<tr><th>${k}</th><td>${v}<tr></tr>`).join('')}</table></div></div>`; new bootstrap.Modal(document.getElementById("premiumModal")).show(); };
                    window.showWorks = (id) => { let m = mlaAssembly.find(i => i.id === id); let workHtml = `<h4 class="mb-3">📌 Legislative Works · ${m.name}</h4>`; if (m.works.length === 0) workHtml += "<p>No works officially published yet.</p>"; else m.works.forEach(w => { workHtml += `<div class="card mb-3 border-0 shadow-sm bg-light"><div class="card-body"><h5><i class="fas fa-hard-hat me-2"></i>${w.title}</h5><table class="table table-sm">${Object.entries({ Category: w.category, Budget: w.budget, Status: w.status, Progress: w.progress, Rating: w.rating }).map(([k, v]) => `<tr><th>${k}</th><td>${v}</td></tr>`).join('')}</td><p>${w.desc}</p></div></div>`; }); document.getElementById("premiumModalBody").innerHTML = workHtml; new bootstrap.Modal(document.getElementById("premiumModal")).show(); };
                    window.showVillageAnalytics = (id) => { let m = mlaAssembly.find(i => i.id === id); let percent = Math.round((m.analytics.done / m.analytics.villages) * 100); document.getElementById("premiumModalBody").innerHTML = `<div class="text-center"><i class="fas fa-chart-pie fa-3x mb-3"></i><h3>${m.name} · Grassroot Index</h3><div class="row mt-4"><div class="col-md-4"><div class="stat-orb"><div class="stat-digit-xl">${m.analytics.villages}</div>Wards/Villages</div></div><div class="col-md-4"><div class="stat-orb"><div class="stat-digit-xl">${m.analytics.done}</div>Fully Developed</div></div><div class="col-md-4"><div class="stat-orb"><div class="stat-digit-xl">${m.analytics.pending}</div>Under Progress</div></div></div><div class="mt-4"><div class="progress" style="height:28px;"><div class="progress-bar progress-bar-custom fw-bold" style="width:${percent}%">${percent}% Coverage</div></div></div></div>`; new bootstrap.Modal(document.getElementById("premiumModal")).show(); };

                    document.addEventListener("DOMContentLoaded", () => { populateDistricts(); populatePartyFilter(); displayTopChampions(); filterMLAs(); });
                </script>
                <script
                    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                <script src="header.js"></script>
</body>

</html>