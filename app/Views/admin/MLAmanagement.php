<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MLA Monitoring System</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/user/images/LOGO.png') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
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

        /* ================================================================
                   PREMIUM MLA CARD DESIGN — MATCHED RANK & LOGO BADGES
                   ================================================================ */
        .mla-card {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            height: 100%;
            box-shadow: var(--shadow-lg);
            border: 1px solid #f3ecd9;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .mla-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold-light);
        }

        .mla-card.party-themed {
            border-top: 5px solid var(--party-primary);
        }

        /* --- CARD HEADER --- */
        .mla-card-header {
            position: relative;
            padding: 20px 22px 0 22px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            background: var(--party-lightbg, #faf1e2);
            min-height: 100px;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            transition: background 0.3s ease;
        }

        /* --- UNIFIED BADGE STYLES (Rank & Logo share same dimensions) --- */
        .badge-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        /* --- LEFT: Party Logo Badge (clean single circle) --- */
        .party-logo-badge {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow:
                0 8px 24px rgba(0, 0, 0, 0.10),
                0 0 0 2px rgba(255, 255, 255, 0.9),
                0 0 0 3px rgba(212, 175, 55, 0.20);
            border: 1px solid rgba(255, 255, 255, 0.4);
            padding: 8px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(248, 242, 235, 0.85));
        }

        .party-logo-badge img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.06));
            transition: transform 0.4s ease;
        }

        .mla-card:hover .party-logo-badge {
            transform: scale(1.05);
            box-shadow:
                0 12px 32px rgba(0, 0, 0, 0.14),
                0 0 0 2px rgba(255, 255, 255, 0.95),
                0 0 0 4px rgba(212, 175, 55, 0.28);
        }

        .mla-card:hover .party-logo-badge img {
            transform: scale(1.04) rotate(-2deg);
        }

        /* --- RIGHT: Rank Badge (identical size & shadow weight) --- */
        .rank-badge {
            background: radial-gradient(circle at 30% 20%, #f5e7c8, #c9a03d);
            box-shadow:
                0 8px 24px rgba(0, 0, 0, 0.10),
                0 0 0 2px #fff3e0,
                0 0 0 4px rgba(212, 175, 55, 0.20);
            flex-direction: column;
            line-height: 1.1;
        }

        .mla-card:hover .rank-badge {
            transform: scale(1.05);
            box-shadow:
                0 12px 32px rgba(0, 0, 0, 0.14),
                0 0 0 2px #fff3e0,
                0 0 0 5px rgba(212, 175, 55, 0.28);
        }

        .rank-badge .rank-number {
            font-weight: 800;
            font-size: 1.5rem;
            color: #2c2418;
        }

        .rank-badge .rank-label {
            font-size: 0.5rem;
            font-weight: 600;
            color: #5a442a;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-top: -2px;
        }

        /* --- PHOTO SECTION --- */
        .mla-photo-wrapper {
            position: relative;
            margin-top: -36px;
            padding: 0 20px;
            display: flex;
            justify-content: center;
            z-index: 10;
        }

        .mla-photo-frame {
            position: relative;
            width: 130px;
            height: 150px;
            border-radius: 20px;
            padding: 4px;
            background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--gold-dark));
            box-shadow: 0 12px 28px -8px rgba(0, 0, 0, 0.18);
            transition: all 0.3s ease;
        }

        .mla-card:hover .mla-photo-frame {
            transform: scale(1.02);
            box-shadow: 0 16px 36px -8px rgba(0, 0, 0, 0.25);
        }

        .mla-photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 17px;
            background: #fef6ea;
        }

        /* --- CARD BODY --- */
        .mla-card-body {
            padding: 18px 22px 22px 22px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .mla-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2c1f0f;
            margin-bottom: 4px;
            letter-spacing: -0.2px;
        }

        .mla-party-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 4px 16px 4px 12px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 700;
            background: var(--party-lightbg, #f5ede1);
            color: var(--party-primary, #b47c2e);
            border: 1px solid var(--party-secondary, #e8d8c4);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
            margin: 0 auto 10px auto;
        }

        .mla-party-chip .party-icon-sm {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            object-fit: contain;
            background: rgba(255, 255, 255, 0.5);
            padding: 2px;
        }

        .mla-card:hover .mla-party-chip {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .mla-constituency {
            font-size: 0.85rem;
            color: #7a5f3a;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .mla-constituency i {
            color: var(--gold-dark);
            font-size: 0.85rem;
        }

        /* --- ACTION BUTTONS --- */
        .mla-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: auto;
            padding-top: 6px;
        }

        .btn-premium {
            padding: 7px 16px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.75rem;
            border: none;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--beige);
            color: #5a442a;
        }

        .btn-premium i {
            font-size: 0.8rem;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .btn-premium.gold {
            background: linear-gradient(115deg, #f1e0b5, #e5c989);
            color: #5e3e1a;
        }

        .btn-premium.gold:hover {
            background: #e9cf93;
        }

        .btn-premium.emerald {
            background: #e2ddcd;
            color: #4b5e3c;
        }

        .btn-premium.emerald:hover {
            background: #d6d0be;
        }

        .btn-premium.slate {
            background: #ebe1cf;
            color: #7b5f3a;
        }

        .btn-premium.slate:hover {
            background: #e0d5bf;
        }

        /* --- remove old flag elements --- */
        .flag-wave-stage,
        .flag-attached,
        .waving-flag-img,
        .flagpole-golden,
        .pole-orb,
        .shimmer-overlay,
        .party-flag-label,
        .watermark-logo,
        .flag-podium,
        .avatar-frame,
        .crown-rank,
        .party-chip {
            display: none !important;
        }

        /* ================================================================
                   RESPONSIVE
                   ================================================================ */
        @media (max-width: 576px) {
            .mla-card-header {
                padding: 16px 16px 0 16px;
                min-height: 80px;
            }
            .badge-circle {
                width: 52px;
                height: 52px;
            }
            .rank-badge .rank-number {
                font-size: 1.2rem;
            }
            .rank-badge .rank-label {
                font-size: 0.4rem;
            }
            .party-logo-badge {
                padding: 6px;
            }
            .mla-photo-wrapper {
                margin-top: -28px;
            }
            .mla-photo-frame {
                width: 104px;
                height: 120px;
            }
            .mla-card-body {
                padding: 14px 14px 18px 14px;
            }
            .mla-name {
                font-size: 1.05rem;
            }
            .btn-premium {
                font-size: 0.7rem;
                padding: 6px 12px;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .badge-circle {
                width: 58px;
                height: 58px;
            }
            .mla-photo-frame {
                width: 116px;
                height: 134px;
            }
        }

        /* ================================================================
                   MODAL (unchanged)
                   ================================================================ */
        .modal-cream .modal-content {
            background: var(--pure-white);
            border-radius: var(--radius-xxl);
            border: 1px solid var(--gold-light);
            box-shadow: var(--shadow-gold-lg);
        }

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

        .modal-cream .modal-body {
            padding: 2rem 2rem 2rem 2rem;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #2c2418;
            background: transparent;
        }

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

        .modal-cream input:focus,
        .modal-cream select:focus,
        .modal-cream textarea:focus {
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .modal-cream .modal-footer {
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            background: rgba(245, 235, 210, 0.4);
            border-radius: 0 0 28px 28px;
            padding: 1rem 1.75rem;
        }

        .modal.fade .modal-dialog {
            transform: scale(0.96) translateY(-10px);
            transition: transform 0.25s ease-out, opacity 0.2s;
        }

        .modal.show .modal-dialog {
            transform: scale(1) translateY(0);
        }

        @media (max-width: 576px) {
            .modal-cream .modal-body {
                padding: 1.25rem;
            }
            .modal-cream .modal-title {
                font-size: 1.3rem;
            }
        }

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

        .modal-cream .premium-glow {
            animation: softGoldPulse 2s infinite;
            border-radius: 20px;
        }

        /* ================================================================
                   FOOTER (unchanged)
                   ================================================================ */
        .footer {
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 1rem 2rem !important;
            text-align: center;
            margin: 2rem 20px 25px 20px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.15);
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

        .container-fluid.cream-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer {
            margin-top: auto !important;
        }

        @media (max-width:768px) {
            .footer {
                margin: 1.5rem 15px 20px 15px !important;
                padding: 0.9rem 1rem !important;
            }
            .footer p {
                font-size: 0.8rem;
            }
        }

        /* ================================================================
                   NEW TABLE STYLES (cream/gold premium theme)
                   ================================================================ */
        .premium-table-wrapper {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            padding: 1.5rem 1rem 0.5rem 1rem;
            border: 1px solid #f3ecd9;
            box-shadow: var(--shadow-md);
            overflow-x: auto;
        }

        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            min-width: 600px;
        }

        .premium-table thead th {
            background: linear-gradient(135deg, #faf3e6, #f5ede1);
            color: #7a5f3a;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 14px 16px;
            border: none;
            border-bottom: 2px solid var(--gold-light);
            text-align: left;
            white-space: nowrap;
        }

        .premium-table thead th:first-child {
            border-radius: 16px 0 0 16px;
        }

        .premium-table thead th:last-child {
            border-radius: 0 16px 16px 0;
        }

        .premium-table tbody tr {
            background: rgba(255, 252, 245, 0.7);
            transition: all 0.2s ease;
            border-radius: 12px;
        }

        .premium-table tbody tr:hover {
            background: #fffcf0;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.08);
        }

        .premium-table tbody td {
            padding: 12px 16px;
            border: none;
            border-bottom: 1px solid #f1e8db;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #2c2418;
        }

        .premium-table tbody tr:last-child td {
            border-bottom: none;
        }

        .premium-table tbody td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .premium-table tbody td:last-child {
            border-radius: 0 12px 12px 0;
        }

        /* Table Photo */
        .mla-table-photo {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gold-light);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: all 0.2s ease;
        }

        .premium-table tbody tr:hover .mla-table-photo {
            border-color: var(--gold);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
        }

        /* Status Badge */
        .status-active {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
        }

        /* Table Action Buttons */
        .action-btn-group {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 5px 12px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
            border: none;
            transition: all 0.2s ease;
            background: var(--beige);
            color: #5a442a;
            text-decoration: none;
            cursor: pointer;
        }

        .action-btn i {
            font-size: 0.7rem;
        }

        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .action-btn.view-btn {
            background: #f5ede1;
            color: #7a5f3a;
        }

        .action-btn.view-btn:hover {
            background: #e8dccc;
        }

        .action-btn.edit-btn {
            background: #f5ede1;
            color: #7a5f3a;
        }

        .action-btn.edit-btn:hover {
            background: #e8dccc;
        }

        .action-btn.delete-btn {
            background: #f5ede1;
            color: #9e6b6b;
        }

        .action-btn.delete-btn:hover {
            background: #fce4e4;
            color: #c62828;
        }

        @media (max-width: 768px) {
            .premium-table-wrapper {
                padding: 0.5rem 0.25rem;
            }
            .premium-table thead th,
            .premium-table tbody td {
                padding: 8px 10px;
                font-size: 0.75rem;
            }
            .mla-table-photo {
                width: 34px;
                height: 34px;
            }
            .action-btn {
                padding: 3px 8px;
                font-size: 0.6rem;
            }
            .action-btn i {
                font-size: 0.6rem;
            }
        }

        @media (max-width: 576px) {
            .premium-table thead th,
            .premium-table tbody td {
                padding: 6px 6px;
                font-size: 0.65rem;
            }
            .mla-table-photo {
                width: 28px;
                height: 28px;
            }
            .action-btn {
                padding: 2px 6px;
                font-size: 0.55rem;
                gap: 2px;
            }
            .action-btn i {
                font-size: 0.5rem;
            }
            .status-active {
                font-size: 0.55rem;
                padding: 2px 8px;
            }
        }

        /* ================================================================
                   VIEW MODAL - read-only fields (matches edit modal style)
                   ================================================================ */
        .view-field-readonly {
            background: #faf6ed !important;
            color: #4a3f32;
            cursor: default;
            border-color: #e9dfcf;
        }

        .view-field-readonly:focus {
            box-shadow: none !important;
            border-color: #e9dfcf !important;
        }

        .view-select-readonly {
            pointer-events: none;
            background: #faf6ed !important;
            color: #4a3f32;
            border-color: #e9dfcf;
        }
    </style>
</head>

<body class="inner_page widgets">
   <?php include "common/header.php"?>  
                <!-- end topbar -->

                <div class="container-fluid mt-4 px-3 px-lg-5 cream-container">
                    <!-- Hero Section -->
                    <div class="text-center mb-4">
                        <span class="badge badge-cream-gold px-4 py-2 rounded-pill"><i class="fas fa-chart-line me-2"></i> LEGISLATIVE PERFORMANCE INDEX</span>
                        <h1 class="display-5 fw-bold mt-3 gold-gradient-text"><i class="fas fa-landmark me-3"></i> Top 3 Most Ranking MLAs</h1>
                        <div class="gold-divider"></div>
                        <p class="text-muted mt-2" style="color:#9b7c54 !important;">Tracking excellence in governance & development</p>
                    </div>
                    <div id="topMlaSection" class="row g-4 mb-5">
                        <!-- STATIC TOP 3 MLA CARDS - with only View button -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="mla-card party-themed" style="--party-primary:#FF8C00; --party-lightbg:#FFF8E1; border-top: 5px solid #FF8C00;">
                                <div class="mla-card-header" style="background: #FFF8E1;">
                                    <div class="badge-circle party-logo-badge">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9qj-N8C5e58x8NOhIvOkNFALgk86OS3yqWmnWiVJbww&s=10" alt="Shiv Sena (ES)" onerror="this.src='assets/party/default.png'">
                                    </div>
                                    <div class="badge-circle rank-badge">
                                        <span class="rank-number">1</span>
                                        <span class="rank-label">Rank</span>
                                    </div>
                                </div>
                                <div class="mla-photo-wrapper">
                                    <div class="mla-photo-frame">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1NGljE8Ngab0V6mQkSMycyNgBuQ8jKzUhV-lEJbcUiw&s=10" onerror="this.src='https://ui-avatars.com/api/?background=FF8C00&color=fff&name=Eknath+Shinde&rounded=false&size=130'" alt="Eknath Shinde">
                                    </div>
                                </div>
                                <div class="mla-card-body">
                                    <div class="mla-name">Eknath Shinde</div>
                                    <div class="mla-party-chip" style="background:#FFF8E1; color:#FF8C00; border-color:#FFB74D;">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9qj-N8C5e58x8NOhIvOkNFALgk86OS3yqWmnWiVJbww&s=10" class="party-icon-sm" alt="Shiv Sena (ES)" onerror="this.src='assets/party/default.png'">
                                        Shiv Sena (ES)
                                    </div>
                                    <div class="mla-constituency">
                                        <i class="fas fa-location-dot"></i> Thane · Kopri-Pachpakhadi
                                    </div>
                                    <div class="mla-actions">
                                        <button class="btn-premium gold" data-bs-toggle="modal" data-bs-target="#viewMlaModal1"><i class="fas fa-eye"></i> View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="mla-card party-themed" style="--party-primary:#FF6B00; --party-lightbg:#FFF4E8; border-top: 5px solid #FF6B00;">
                                <div class="mla-card-header" style="background: #FFF4E8;">
                                    <div class="badge-circle party-logo-badge">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmBwcZ-_WB4yCVyhSwF4zZ3MK12ugxutbS7gpOikbaWg&s=10" alt="BJP" onerror="this.src='assets/party/default.png'">
                                    </div>
                                    <div class="badge-circle rank-badge">
                                        <span class="rank-number">2</span>
                                        <span class="rank-label">Rank</span>
                                    </div>
                                </div>
                                <div class="mla-photo-wrapper">
                                    <div class="mla-photo-frame">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStvxUGPAClLVGXg8r5U1Cxl7VuSn5KswQO6unnzhdIxQ&s=10" onerror="this.src='https://ui-avatars.com/api/?background=FF6B00&color=fff&name=Devendra+Fadnavis&rounded=false&size=130'" alt="Devendra Fadnavis">
                                    </div>
                                </div>
                                <div class="mla-card-body">
                                    <div class="mla-name">Devendra Fadnavis</div>
                                    <div class="mla-party-chip" style="background:#FFF4E8; color:#FF6B00; border-color:#FF8F33;">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmBwcZ-_WB4yCVyhSwF4zZ3MK12ugxutbS7gpOikbaWg&s=10" class="party-icon-sm" alt="BJP" onerror="this.src='assets/party/default.png'">
                                        BJP
                                    </div>
                                    <div class="mla-constituency">
                                        <i class="fas fa-location-dot"></i> Nagpur · Nagpur South West
                                    </div>
                                    <div class="mla-actions">
                                        <button class="btn-premium gold" data-bs-toggle="modal" data-bs-target="#viewMlaModal2"><i class="fas fa-eye"></i> View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="mla-card party-themed" style="--party-primary:#FF6B00; --party-lightbg:#FFF4E8; border-top: 5px solid #FF6B00;">
                                <div class="mla-card-header" style="background: #FFF4E8;">
                                    <div class="badge-circle party-logo-badge">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmBwcZ-_WB4yCVyhSwF4zZ3MK12ugxutbS7gpOikbaWg&s=10" alt="BJP" onerror="this.src='assets/party/default.png'">
                                    </div>
                                    <div class="badge-circle rank-badge">
                                        <span class="rank-number">3</span>
                                        <span class="rank-label">Rank</span>
                                    </div>
                                </div>
                                <div class="mla-photo-wrapper">
                                    <div class="mla-photo-frame">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq9MdbQ5p9mCdUedqffaq4_dJD_TKSJ64CtpvzEEnMcg&s=10" onerror="this.src='https://ui-avatars.com/api/?background=FF6B00&color=fff&name=Chh+Shivendra+Raje+Bhosale&rounded=false&size=130'" alt="Chh Shivendra Raje Bhosale">
                                    </div>
                                </div>
                                <div class="mla-card-body">
                                    <div class="mla-name">Chh Shivendra Raje Bhosale</div>
                                    <div class="mla-party-chip" style="background:#FFF4E8; color:#FF6B00; border-color:#FF8F33;">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmBwcZ-_WB4yCVyhSwF4zZ3MK12ugxutbS7gpOikbaWg&s=10" class="party-icon-sm" alt="BJP" onerror="this.src='assets/party/default.png'">
                                        BJP
                                    </div>
                                    <div class="mla-constituency">
                                        <i class="fas fa-location-dot"></i> Satara · Jaoli
                                    </div>
                                    <div class="mla-actions">
                                        <button class="btn-premium gold" data-bs-toggle="modal" data-bs-target="#viewMlaModal3"><i class="fas fa-eye"></i> View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('success')): ?>
                        <script>
                            alert("<?= session()->getFlashdata('success'); ?>");
                        </script>
                    <?php endif; ?>

                    <!-- FILTER PAVILION -->
                    <div class="filter-astro p-4 shadow-lg mt-2">
                        <h3 class="mb-4 fw-semibold" style="color:#876b42;"><i class="fas fa-tachometer-alt me-2" style="color: var(--gold-dark);"></i> MLA Management Command Center</h3>
                        <div class="row g-3">
                            <div class="col-md-3"><label><i class="fas fa-user-tie me-1"></i> MLA Name</label>
                            <input type="text" class="form-control" id="mlaName" placeholder="Search leader">
                        </div>
                            <div class="col-md-3"><label><i class="fas fa-flag-checkered me-1"></i> Party</label>
                                <select class="form-select" id="party" name="party" required>
                                    <option value="">Select Party</option>
                                    <?php foreach ($parties as $party): ?>
                                        <option value="<?= esc($party['party_name']); ?>">
                                            <?= esc($party['party_name']); ?> (<?= esc($party['party_code']); ?>)
                                        </option>                             
                                    <?php endforeach; ?>
                    
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>
                                    <i class="fas fa-flag me-1"></i>
                                    State
                                </label>

                                <select name="filter_state_id"
                                        id="filter_state_id"
                                        class="form-select">

                                    <option value="">All States</option>

                                    <?php if (!empty($states)): ?>
                                        <?php foreach ($states as $state): ?>

                                            <option value="<?= esc($state['id']); ?>">
                                                <?= esc($state['state_name']); ?>
                                            </option>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>
                                    <i class="fas fa-city me-1"></i>
                                    District
                                </label>

                                <select name="filter_district_id"
                                        id="filter_district_id"
                                        class="form-select">

                                    <option value="">All Districts</option>

                                    <?php if (!empty($districts)): ?>
                                        <?php foreach ($districts as $district): ?>

                                            <option value="<?= esc($district['id']); ?>">
                                                <?= esc($district['district_name']); ?>
                                            </option>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>
                                    <i class="fas fa-map-pin me-1"></i>
                                    Constituency
                                </label>

                                <input type="text"
                                    id="filter_constituency"
                                    class="form-control"
                                    placeholder="Search constituency">
                            </div>
                            <div class="col-md-3"><label><i class="fas fa-sort-amount-down me-1"></i> Sort by Name</label><select class="form-select" id="sortOrder"><option value="asc">A → Z</option><option value="desc">Z → A</option></select></div>
                        </div>
                        <div class="mt-4 d-flex gap-3 flex-wrap">
                            <button class="btn btn-warm-gold px-4 fw-bold" onclick="filterMLAs()"><i class="fas fa-filter me-2"></i>Deploy Filters</button>
                            <button class="btn btn-outline-cream px-4" onclick="resetAllFilters()"><i class="fas fa-sync-alt me-2"></i>Reset</button>
                            <button class="btn btn-warm-gold px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#addMlaModal"><i class="fas fa-user-plus me-2"></i>Add MLA</button>
                        </div>
                    </div>

                    <!-- PEOPLE'S REPRESENTATIVES TABLE -->
                    <div class="mt-5">
                        <h2 class="gold-gradient-text fs-2 fw-bold"><i class="fas fa-users me-2"></i> People's Representatives</h2>
                        <div class="premium-table-wrapper mt-3">
                            <table class="premium-table">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>MLA Name</th>
                                        <th>Party</th>
                                        <th>Constituency</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($mlas)): ?>

                                        <?php foreach ($mlas as $mla): ?>

                                            <tr>

                                                <td>

                                                    <?php if (!empty($mla['profile_photo'])): ?>

                                                        <img src="<?= base_url('uploads/mla/' . $mla['profile_photo']) ?>"
                                                            class="mla-table-photo"
                                                            alt="<?= esc($mla['mla_name']) ?>">

                                                    <?php else: ?>

                                                        <img src="<?= base_url('assets/admin/images/default-user.png') ?>"
                                                            class="mla-table-photo"
                                                            alt="No Photo">

                                                    <?php endif; ?>

                                                </td>

                                                <td>
                                                    <strong><?= esc($mla['mla_name']) ?></strong>
                                                </td>

                                                <td>
                                                    <?= esc($mla['party_name'] ?? 'Not Available') ?>
                                                </td>

                                                <td>
                                                    <?= esc($mla['district_name']) ?> ·
                                                    <?= esc($mla['constituency_name']) ?>
                                                </td>

                                                <td>

                                                    <?php if ($mla['status'] == 'Active'): ?>

                                                        <span class="status-active">Active</span>

                                                    <?php else: ?>

                                                        <span class="status-inactive">Inactive</span>

                                                    <?php endif; ?>

                                                </td>

                                                <td>

                                                    <div class="action-btn-group">

                                                        <button
                                                            class="action-btn view-btn"
                                                            data-id="<?= $mla['id']; ?>">

                                                            <i class="fas fa-eye"></i> View

                                                        </button>

                                                        <button
                                                            class="action-btn edit-btn"
                                                            data-id="<?= $mla['id']; ?>">

                                                            <i class="fas fa-edit"></i> Edit

                                                        </button>

                                                        

                                                        <button
                                                            class="action-btn delete-btn"
                                                            onclick="if(confirm('Are you sure you want to delete this MLA?')){ window.location.href='<?= base_url('admin/mla/delete/'.$mla['id']); ?>'; }">

                                                            <i class="fas fa-trash"></i> Delete

                                                        </button>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else: ?>

                                    <tr>

                                        <td colspan="6" class="text-center">

                                            No MLA Found

                                        </td>

                                    </tr>

                                    <?php endif; ?>

                                    </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- FOOTER -->
                    <div class="footer">
                       <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
                    </div>
                </div>

                <!-- ============================================================
                VIEW MLA MODALS — detailed information form-style (read-only)
                ============================================================ -->
                
                <!-- VIEW MLA MODAL -->
                <div class="modal fade modal-cream" id="viewMlaModal" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content modal-cream">

                            <div class="modal-header border-warning">
                                <h5 class="modal-title fw-bold">
                                    <i class="fas fa-eye me-2"></i>View MLA Details
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <form>
                                    <div class="row g-3">

                                        <!-- Profile Photo -->
                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-camera me-1"></i> Profile Photo
                                            </label>
                                            <div>
                                                <img id="view_photo" src="" alt="MLA Profile Photo"
                                                    style="width:100px;height:100px;object-fit:cover;border-radius:16px;border:2px solid var(--gold-light);">
                                            </div>
                                        </div>

                                        <!-- Basic Information -->
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-user me-1"></i> Full Name
                                            </label>
                                            <input type="text" id="view_mla_name" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-phone me-1"></i> Mobile Number
                                            </label>
                                            <input type="tel" id="view_mobile" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-envelope me-1"></i> Username (email)
                                            </label>
                                            <input type="email" id="view_email" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-venus-mars me-1"></i> Gender
                                            </label>
                                            <input type="text" id="view_gender" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-flag me-1"></i> Party
                                            </label>
                                            <input type="text" id="view_party" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <!-- Professional & Political Information -->
                                        <div class="col-12 mt-4">
                                            <h6 class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-user-tie me-2"></i>
                                                Professional & Political Information
                                            </h6>
                                            <hr>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-graduation-cap me-1"></i> Education
                                            </label>
                                            <input type="text" id="view_education" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-briefcase me-1"></i> Profession
                                            </label>
                                            <input type="text" id="view_profession" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-calendar-alt me-1"></i> Date of Birth
                                            </label>
                                            <input type="text" id="view_dob" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-calendar-check me-1"></i> First Elected
                                            </label>
                                            <input type="text" id="view_first_elected" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-landmark me-1"></i> Current Term
                                            </label>
                                            <input type="text" id="view_current_term" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-users me-1"></i> Committees
                                            </label>
                                            <input type="text" id="view_committees" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-align-left me-1"></i> Biography
                                            </label>
                                            <textarea id="view_biography" class="form-control view-field-readonly" rows="5" readonly></textarea>
                                        </div>

                                        <!-- Location Information -->
                                        <div class="col-12 mt-4">
                                            <h6 class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-map-marker-alt me-2"></i>
                                                Location Information
                                            </h6>
                                            <hr>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-map-marker-alt me-1"></i> State
                                            </label>
                                            <input type="text" id="view_state" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-city me-1"></i> District
                                            </label>
                                            <input type="text" id="view_district" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-map-pin me-1"></i> Constituency
                                            </label>
                                            <input type="text" id="view_constituency" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-home me-1"></i> Address
                                            </label>
                                            <textarea id="view_address" class="form-control view-field-readonly" rows="2" readonly></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-mailbox me-1"></i> Pincode
                                            </label>
                                            <input type="text" id="view_pincode" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-id-card me-1"></i> Aadhaar
                                            </label>
                                            <input type="text" id="view_aadhaar" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-calendar-alt me-1"></i> Joining Date
                                            </label>
                                            <input type="text" id="view_joining_date" class="form-control view-field-readonly" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-toggle-on me-1"></i> Status
                                            </label>
                                            <input type="text" id="view_status" class="form-control view-field-readonly" readonly>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ============================================================
                ADD MLA MODAL (unchanged)
                ============================================================ -->
                <div class="modal fade modal-cream" id="addMlaModal" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content modal-cream">
                            <div class="modal-header border-warning">
                                <h5 class="modal-title fw-bold"><i class="fas fa-user-plus me-2"></i>Add New MLA</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addMlaForm" action="<?= base_url('admin/mla/save') ?>" method="post"enctype="multipart/form-data" class="needs-validation" novalidate>
                                     <?= csrf_field(); ?>    
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-camera me-1"></i> Profile Photo</label>
                                            <input type="file" name="profile_photo" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-user me-1"></i> Full Name</label>
                                            <input type="text" name="mla_name" class="form-control" placeholder="Enter full name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-phone me-1"></i> Mobile Number (optional)</label>
                                            <input type="tel" name="mobile" class="form-control" placeholder="Enter mobile number">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-envelope me-1"></i> Username (email)</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-lock me-1"></i> Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-venus-mars me-1"></i> Gender</label>
                                            <select class="form-select" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-flag me-1"></i> Party</label>
                                            <select class="form-select" id="add_party" name="party" required>
                                                <option value="">Select Party</option>
                                                <?php foreach ($parties as $party): ?>
                                                    <option value="<?= esc($party['id']); ?>">
                                                        <?= esc($party['party_name']); ?> (<?= esc($party['party_code']); ?>)
                                                    </option>                             
                                                <?php endforeach; ?>
                                
                                            </select>
                                        </div>
                                      
                                        <!-- MLA Professional Details -->
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-graduation-cap me-1"></i> Education
                                            </label>
                                            <input type="text"
                                                name="education"
                                                class="form-control"
                                                placeholder="e.g. B.E. Civil">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-briefcase me-1"></i> Profession
                                            </label>
                                            <input type="text"
                                                name="profession"
                                                class="form-control"
                                                placeholder="e.g. Politician, Social Worker">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-calendar-alt me-1"></i> Date of Birth
                                            </label>
                                            <input type="date"
                                                name="dob"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-calendar-check me-1"></i> First Elected
                                            </label>
                                            <input type="number"
                                                name="first_elected"
                                                class="form-control"
                                                placeholder="e.g. 2004"
                                                min="1900"
                                                max="2100">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-landmark me-1"></i> Current Term
                                            </label>
                                            <input type="text"
                                                name="current_term"
                                                class="form-control"
                                                placeholder="e.g. 5th">
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-users me-1"></i> Committees
                                            </label>
                                            <input type="text"
                                                name="committees"
                                                class="form-control"
                                                placeholder="e.g. Public Works, Energy">
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-align-left me-1"></i> Biography
                                            </label>
                                            <textarea name="biography"
                                                    class="form-control"
                                                    rows="5"
                                                    placeholder="Enter MLA biography"></textarea>
                                        </div> 


                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-map-marker-alt me-1"></i> State
                                            </label>

                                            <select name="state_id"
                                                    id="mla_state_id"
                                                    class="form-select"
                                                    required>

                                                <option value="">Select State</option>

                                                <?php foreach ($states as $state): ?>

                                                    <option value="<?= $state['id']; ?>">
                                                        <?= esc($state['state_name']); ?>
                                                    </option>

                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-city me-1"></i> District
                                            </label>

                                            <select
                                                name="district_id"
                                                id="mla_district_id"
                                                class="form-select"
                                                required>

                                                <option value="">Select District</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;">
                                                <i class="fas fa-map-pin me-1"></i> Constituency
                                            </label>

                                            <select
                                                name="constituency_id"
                                                id="mla_constituency_id"
                                                class="form-select"
                                                required>

                                                <option value="">Select Constituency</option>

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-home me-1"></i> Address</label>
                                            <textarea class="form-control" name="address" rows="2" placeholder="Enter address"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-mailbox me-1"></i> Pincode (optional)</label>
                                            <input type="text" name="pincode" class="form-control" placeholder="Enter pincode">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-id-card me-1"></i> Aadhaar (optional)</label>
                                            <input type="text" name="aadhaar" class="form-control" placeholder="Enter Aadhaar number">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-calendar-alt me-1"></i> Joining Date (optional)</label>
                                            <input type="date" name="joining_date" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-toggle-on me-1"></i> Status</label>
                                            <select class="form-select" name="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-warm-gold px-4"> Add MLA </button>
                            </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- ============================================================
                EDIT MLA MODALS (unchanged - editable)
                ============================================================ -->
                
                <div class="modal fade modal-cream" id="editMlaModal" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content modal-cream">
                            <div class="modal-header border-warning">
                                <h5 class="modal-title fw-bold"><i class="fas fa-edit me-2"></i>Edit MLA</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editMlaForm" action="<?= base_url('admin/mla/update') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="edit_mla_id">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-camera me-1"></i> Profile Photo</label>
                                            <input type="file" id="edit_profile_photo" name="profile_photo" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-user me-1"></i> Full Name</label>
                                            <input type="text"  id="edit_mla_name" name="mla_name" class="form-control" value="Eknath Shinde" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-phone me-1"></i> Mobile Number (optional)</label>
                                            <input type="tel" id="edit_mobile" name="mobile" class="form-control" value="+91 98765 43210">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-envelope me-1"></i> Username (email)</label>
                                            <input type="email" id="edit_email" name="email" class="form-control" value="eknath.shinde@maharashtra.gov" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-lock me-1"></i> Password</label>
                                            <input type="password" id="edit_password" name="password" class="form-control" placeholder="Enter new password" value="••••••••">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-venus-mars me-1"></i> Gender</label>
                                            <select id="edit_gender" name="gender" class="form-select" required>
                                                <option value="Male" selected>Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-flag me-1"></i> Party</label>
                                            <select class="form-select" id="edit_party" name="party" required>
                                                <option value="">Select Party</option>
                                                <?php foreach ($parties as $party): ?>
                                                    <option value="<?= esc($party['id']); ?>">
                                                        <?= esc($party['party_name']); ?> (<?= esc($party['party_code']); ?>)
                                                    </option>                             
                                                <?php endforeach; ?>
                                
                                            </select>
                                        </div>

                                         <!-- Professional Information -->
                                        <div class="col-12 mt-4">
                                            <h6 class="fw-bold" style="color:#876b42;"><i class="fas fa-user-tie me-2"></i>Professional & Political Information</h6>
                                            <hr>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-graduation-cap me-1"></i>Education</label>
                                            <input type="text" id="edit_education" name="education" class="form-control" placeholder="e.g. B.E. Civil">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-briefcase me-1"></i>Profession</label>
                                            <input type="text" id="edit_profession" name="profession" class="form-control" placeholder="e.g. Politician, Social Worker">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-calendar-alt me-1"></i>Date of Birth</label>
                                            <input type="date" id="edit_dob" name="dob" class="form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-calendar-check me-1"></i>First Elected</label>
                                            <input type="number" id="edit_first_elected" name="first_elected" class="form-control" placeholder="e.g. 2004" min="1900" max="2100">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-landmark me-1"></i>Current Term</label>
                                            <input type="text" id="edit_current_term" name="current_term" class="form-control" placeholder="e.g. 5th">
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-users me-1"></i>Committees</label>
                                            <input type="text" id="edit_committees" name="committees" class="form-control" placeholder="e.g. Public Works, Energy">
                                        </div>

                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-align-left me-1"></i>Biography</label>
                                            <textarea id="edit_biography" name="biography" class="form-control" rows="5" placeholder="Enter MLA biography"></textarea>
                                        </div>



                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-map-marker-alt me-1"></i> State</label>
                                            <select id="edit_state_id" name="state_id" class="form-select" required>
                                                <option value="">Select State</option>

                                                <?php foreach ($states as $state): ?>

                                                    <option value="<?= $state['id']; ?>">
                                                        <?= esc($state['state_name']); ?>
                                                    </option>

                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-city me-1"></i> District</label>
                                            <select id="edit_district_id" name="district_id" class="form-select" required>

                                                <option value="">Select District</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-map-pin me-1"></i> Constituency</label>
                                            <select id="edit_constituency_id" name="constituency_id" class="form-select" required>

                                                <option value="">Select Constituency</option>

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-home me-1"></i> Address</label>
                                            <textarea id="edit_address" name="address" class="form-control" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-mailbox me-1"></i> Pincode (optional)</label>
                                            <input type="text" id="edit_pincode" name="pincode" class="form-control" value="400601">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-id-card me-1"></i> Aadhaar (optional)</label>
                                            <input type="text" id="edit_aadhaar" name="aadhaar" class="form-control" value="1234-5678-9012">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-calendar-alt me-1"></i> Joining Date (optional)</label>
                                            <input type="date" id="edit_joining_date" name="joining_date" class="form-control" value="2019-11-01">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold" style="color:#876b42;"><i class="fas fa-toggle-on me-1"></i> Status</label>
                                            <select id="edit_status" name="status" class="form-select">
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-warm-gold px-4"> Update MLA </button>
                                   </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // ============================================================
                    //  FILTER LOGIC (only for filtering static cards via display: none)
                    // ============================================================
                    function filterMLAs() {
                        const nameVal = document.getElementById("mlaName").value.toLowerCase().trim();
                        const partyVal = document.getElementById("party").value;
                        const districtVal = document.getElementById("district").value;
                        const constituencyVal = document.getElementById("constituency").value;
                        const sortVal = document.getElementById("sortOrder").value;

                        const cards = document.querySelectorAll("#mlaResult .col-lg-4");
                        let visibleCards = [];

                        cards.forEach(card => {
                            const name = card.querySelector(".mla-name")?.textContent?.toLowerCase() || "";
                            const party = card.querySelector(".mla-party-chip")?.textContent?.trim() || "";
                            const districtElem = card.querySelector(".mla-constituency");
                            let district = "";
                            let constituency = "";
                            if (districtElem) {
                                const parts = districtElem.textContent.split("·");
                                if (parts.length === 2) {
                                    district = parts[0].trim();
                                    constituency = parts[1].trim();
                                }
                            }
                            let visible = true;
                            if (nameVal && !name.includes(nameVal)) visible = false;
                            if (partyVal && party !== partyVal) visible = false;
                            if (districtVal && district !== districtVal) visible = false;
                            if (constituencyVal && constituency !== constituencyVal) visible = false;

                            if (visible) {
                                visibleCards.push({ card, name });
                            }
                            card.style.display = visible ? "" : "none";
                        });

                        // Sort visible cards by name
                        if (sortVal === "asc") {
                            visibleCards.sort((a, b) => a.name.localeCompare(b.name));
                        } else {
                            visibleCards.sort((a, b) => b.name.localeCompare(a.name));
                        }

                        const parent = document.getElementById("mlaResult");
                        visibleCards.forEach(item => parent.appendChild(item.card));
                    }

                    function resetAllFilters() {
                        document.getElementById("mlaName").value = "";
                        document.getElementById("party").value = "";
                        document.getElementById("district").value = "";
                        document.getElementById("constituency").innerHTML = '<option value="">Select Constituency</option>';
                        document.getElementById("sortOrder").value = "asc";
                        // Show all cards
                        document.querySelectorAll("#mlaResult .col-lg-4").forEach(c => c.style.display = "");
                        // Reset order to original (by id)
                        const parent = document.getElementById("mlaResult");
                        const cards = Array.from(parent.querySelectorAll(".col-lg-4"));
                        cards.sort((a, b) => {
                            const idA = parseInt(a.querySelector(".mla-card")?.getAttribute("data-id") || 0);
                            const idB = parseInt(b.querySelector(".mla-card")?.getAttribute("data-id") || 0);
                            return idA - idB;
                        });
                        cards.forEach(c => parent.appendChild(c));
                    }

                    // set data-id on cards for reset
                    document.querySelectorAll("#mlaResult .mla-card").forEach((card, index) => {
                        card.setAttribute("data-id", (index + 1));
                    });

                    // load constituencies on district change
                    document.getElementById("district")?.addEventListener("change", function() {
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
                        const district = this.value;
                        const constSelect = document.getElementById("constituency");
                        constSelect.innerHTML = '<option value="">Select Constituency</option>';
                        if (geography[district]) {
                            geography[district].forEach(c => constSelect.innerHTML += `<option value="${c}">${c}</option>`);
                        }
                    });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
                </script>
                <script src="header.js">
                </script>
            
                <script>
                     function loadDistricts(stateSelector, districtSelector) {

                        $(stateSelector).change(function () {

                            var stateId = $(this).val();

                            $(districtSelector).html('<option value="">Loading...</option>');

                            if (stateId != '') {

                                $.ajax({
                                    url: "<?= base_url('admin/get-districts'); ?>/" + stateId,
                                    type: "GET",
                                    dataType: "JSON",
                                    success: function (response) {

                                        $(districtSelector).html('<option value="">Select District</option>');

                                        $.each(response, function (index, district) {

                                            $(districtSelector).append(
                                                '<option value="' + district.id + '">' +
                                                district.district_name +
                                                '</option>'
                                            );

                                        });

                                    }
                                });

                            } else {

                                $(districtSelector).html('<option value="">Select District</option>');

                            }

                        });

                    }

                    $(document).ready(function () {

                        loadDistricts('#filter_state_id', '#filter_district_id');

                        loadDistricts('#modal_state_id', '#modal_district_id');

                        loadDistricts('#mla_state_id', '#mla_district_id');

                        loadConstituencies('#mla_district_id', '#mla_constituency_id');
                    });

                    function loadConstituencies(districtSelector, constituencySelector) {

    $(districtSelector).change(function () {

        var districtId = $(this).val();

        $(constituencySelector).html('<option value="">Loading...</option>');

        if (districtId != '') {

            $.ajax({

                url: "<?= base_url('admin/get-constituencies'); ?>/" + districtId,
                type: "GET",
                dataType: "JSON",

                success: function (response) {

                    $(constituencySelector).html('<option value="">Select Constituency</option>');

                    $.each(response, function (index, constituency) {

                        $(constituencySelector).append(
                            '<option value="' + constituency.id + '">' +
                            constituency.constituency_name +
                            '</option>'
                        );

                    });

                }

            });

        } else {

            $(constituencySelector).html('<option value="">Select Constituency</option>');

        }

    });

}
</script>

<script>
    $(document).on('click', '.view-btn', function () {

    let mlaId = $(this).data('id');

    $.ajax({

        url: "<?= base_url('admin/mla/get/') ?>" + mlaId,

        type: "GET",

        dataType: "json",

        success: function (response) {

            if (response.status) {

                let data = response.data;

                if (data.profile_photo != '') {

                    $('#view_photo').attr(
                        'src',
                        "<?= base_url('uploads/mla/') ?>" + data.profile_photo
                    );

                } else {

                    $('#view_photo').attr(
                        'src',
                        "<?= base_url('assets/admin/images/default-user.png') ?>"
                    );

                }

                $('#view_mla_name').val(data.mla_name);
                $('#view_mobile').val(data.mobile);
                $('#view_email').val(data.email);
                $('#view_gender').val(data.gender);
                $('#view_party').val(data.party_name || 'Not Available');
                $('#view_state').val(data.state_name);
                $('#view_district').val(data.district_name);
                $('#view_constituency').val(data.constituency_name);
                $('#view_address').val(data.address);
                $('#view_pincode').val(data.pincode);
                $('#view_aadhaar').val(data.aadhaar);
                $('#view_joining_date').val(data.joining_date);
                $('#view_status').val(data.status);
                $('#view_education').val(data.education || '');
                $('#view_profession').val(data.profession || '');
                $('#view_dob').val(data.dob || '');
                $('#view_first_elected').val(data.first_elected || '');
                $('#view_current_term').val(data.current_term || '');
                $('#view_committees').val(data.committees || '');
                $('#view_biography').val(data.biography || '');

                $('#viewMlaModal').modal('show');

            } else {

                alert(response.message);

            }

        },

        error: function (xhr) {

            console.log(xhr.responseText);

            alert('Unable to fetch MLA details.');

        }

    });

});

$(document).on('click', '.edit-btn', function () {

    let mlaId = $(this).data('id');

    $.ajax({

        url: "<?= base_url('admin/mla/get/') ?>" + mlaId,

        type: "GET",

        dataType: "json",

        success: function (response) {

            if (response.status) {

                let data = response.data;

                $('#edit_mla_id').val(data.id);

                $('#edit_mla_name').val(data.mla_name);
                $('#edit_mobile').val(data.mobile);
                $('#edit_email').val(data.email);
                $('#edit_password').val('');
                $('#edit_gender').val(data.gender);
                $('#edit_party').val(data.party);
                $('#edit_address').val(data.address);
                $('#edit_pincode').val(data.pincode);
                $('#edit_aadhaar').val(data.aadhaar);
                $('#edit_joining_date').val(data.joining_date);
                $('#edit_status').val(data.status);

                $('#edit_education').val(data.education || '');
                $('#edit_profession').val(data.profession || '');
                $('#edit_dob').val(data.dob || '');
                $('#edit_first_elected').val(data.first_elected || '');
                $('#edit_current_term').val(data.current_term || '');
                $('#edit_committees').val(data.committees || '');
                $('#edit_biography').val(data.biography || '');

                $('#edit_state_id').val(data.state_id);

                $('#edit_district_id').data('selected', data.district_id);

                $('#edit_constituency_id').data('selected', data.constituency_id);

                $('#edit_state_id').trigger('change');

                $('#editMlaModal').modal('show');

            } else {

                alert(response.message);

            }

        },

        error: function (xhr) {

            console.log(xhr.responseText);

            alert('Unable to fetch MLA details.');

        }

    });

});


$('#edit_state_id').on('change', function () {

    let stateId = $(this).val();

    let districtDropdown = $('#edit_district_id');

    districtDropdown.html('<option value="">Loading...</option>');

    $.ajax({

        url: "<?= base_url('admin/get-districts/') ?>" + stateId,

        type: "GET",

        dataType: "json",

        success: function (districts) {

            districtDropdown.html('<option value="">Select District</option>');

            $.each(districts, function (index, district) {

                districtDropdown.append(
                    '<option value="' + district.id + '">' +
                    district.district_name +
                    '</option>'
                );

            });

            let selectedDistrict = districtDropdown.data('selected');

            if (selectedDistrict) {

                districtDropdown.val(selectedDistrict);

                districtDropdown.removeData('selected');

                districtDropdown.trigger('change');

            }

        }

    });

});

$('#edit_district_id').on('change', function () {

    let districtId = $(this).val();

    let constituencyDropdown = $('#edit_constituency_id');

    constituencyDropdown.html('<option value="">Loading...</option>');

    $.ajax({

        url: "<?= base_url('admin/get-constituencies/') ?>" + districtId,

        type: "GET",

        dataType: "json",

        success: function (constituencies) {

            constituencyDropdown.html('<option value="">Select Constituency</option>');

            $.each(constituencies, function (index, constituency) {

                constituencyDropdown.append(
                    '<option value="' + constituency.id + '">' +
                    constituency.constituency_name +
                    '</option>'
                );

            });

            let selectedConstituency = constituencyDropdown.data('selected');

            if (selectedConstituency) {

                constituencyDropdown.val(selectedConstituency);

                constituencyDropdown.removeData('selected');

            }

        }

    });

});
</script>
<script src="<?= base_url('assets/admin/js/header.js') ?>"></script>
</body>

</html>
