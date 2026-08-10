<?php
/**
 * @var \App\Entities\RatingQuestion $question
 * @var int $maxQuestionNo
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?= isset($question) ? 'Edit' : 'Add' ?> Rating Question</title>

    <!-- ============================================================
    REFERENCE HEADER DEPENDENCIES
    ============================================================ -->
    <!-- Font Awesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap 4.0.0 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js 1.12.9 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Bootstrap 4.0.0 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Header CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/header.css') ?>">

    <!-- Font Awesome 6.0.0-beta3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts: Inter + Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.0-alpha1 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ============================================================
    PAGE-SPECIFIC CSS — WIDE DASHBOARD LAYOUT (DOES NOT TOUCH HEADER/SIDEBAR)
    ============================================================ -->
    <style>
        /* ============================================================
           CSS VARIABLES — EXACTLY FROM REFERENCE CODE
           ============================================================ */
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
            --sidebar-width: 260px; /* Match your actual sidebar width from header.css */
        }

        /* ============================================================
           GLOBAL RESET & BODY — MERGED FROM REFERENCE
           ============================================================ */
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
            overflow-x: hidden;
        }

        /* ============================================================
           SCROLLBAR STYLING — FROM REFERENCE
           ============================================================ */
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

        /* ============================================================
           PAGE-SPECIFIC LAYOUT - WIDE DASHBOARD
           Uses the actual sidebar width from header.css
           ============================================================ */
        .rating-question-page {
            margin-left: var(--sidebar-width, 260px);
            padding: 15px 20px 0 20px;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s ease, padding 0.3s ease;
            width: auto;
            max-width: none;
        }

        /* Override container-fluid to use full width with minimal padding */
        .rating-question-page .container-fluid.cream-container {
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            flex: 0 0 100% !important;
        }

        /* ============================================================
           PREMIUM CARD - FULL WIDTH
           ============================================================ */
        .premium-card {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: var(--shadow-lg);
            border: 1px solid #f3ecd9;
            position: relative;
            width: 100% !important;
            max-width: 100% !important;
        }

        .premium-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold-lg);
            border-color: var(--gold-light);
        }

        .premium-card .card-header {
            background: linear-gradient(135deg, #faf3e6, #f5ede1);
            border-bottom: 2px solid var(--gold-light);
            padding: 1.5rem 2rem;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }

        .premium-card .card-header h1,
        .premium-card .card-header h5 {
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c1f0f;
        }

        .premium-card .card-body {
            padding: 2rem;
            background: rgba(255, 252, 245, 0.5);
        }

        /* ============================================================
           HERO SECTION - CENTERED BUT NOT NARROW
           ============================================================ */
        .rating-question-page .text-center {
            padding: 0 10px;
        }

        /* ============================================================
           BUTTONS — FROM REFERENCE
           ============================================================ */
        .btn-warm-gold {
            background: linear-gradient(115deg, #d4af37, #b8860b);
            border: none;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 60px;
            box-shadow: var(--shadow-gold);
            transition: var(--transition-fast);
            color: #2c1f0f;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .btn-warm-gold:hover {
            transform: translateY(-2px);
            background: linear-gradient(115deg, #e0bc4a, #c9951a);
            box-shadow: 0 12px 22px rgba(180, 130, 30, 0.3);
            color: #2c1f0f;
        }

        .btn-outline-cream {
            border: 1px solid var(--gold);
            background: transparent;
            color: #8b6946;
            font-weight: 600;
            border-radius: 60px;
            padding: 10px 24px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            transition: var(--transition-fast);
        }

        .btn-outline-cream:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
            color: #8b6946;
        }

        /* ============================================================
           FORM ELEMENTS — FROM REFERENCE
           ============================================================ */
        .form-control,
        .form-select {
            background: var(--pure-white) !important;
            border: 1px solid #e9dfcf;
            border-radius: var(--radius-md);
            padding: 10px 16px;
            font-weight: 500;
            transition: var(--transition-fast);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            width: 100% !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25);
        }

        .form-label {
            color: #8b6946;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .text-danger {
            color: #b8860b !important;
        }

        /* ============================================================
           ALERTS — FROM REFERENCE
           ============================================================ */
        .alert-premium-danger {
            background: var(--beige-light);
            border: 1px solid #f5d0d0;
            border-left: 4px solid #d4af37;
            color: #7a5a2a;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .alert-premium-danger ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .alert-premium-danger ul li {
            padding: 2px 0;
        }

        /* ============================================================
           SUB-CARDS FOR FIELD GROUPS — FROM REFERENCE
           ============================================================ */
        .sub-card {
            background: rgba(255, 252, 245, 0.7);
            border: 1px solid #f3ecd9;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: var(--transition-fast);
        }

        .sub-card:hover {
            border-color: var(--gold-light);
            box-shadow: var(--shadow-md);
        }

        .sub-card .card-header {
            background: var(--beige-light);
            border-bottom: 1px solid var(--gold-light);
            border-radius: var(--radius-lg) var(--radius-lg) 0 0 !important;
            padding: 0.75rem 1.25rem;
        }

        .sub-card .card-header h6 {
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c1f0f;
            font-weight: 600;
        }

        .sub-card .card-body {
            background: var(--pure-white);
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
            padding: 1.25rem;
        }

        /* ============================================================
           OPTION ROWS
           ============================================================ */
        .option-row .btn-danger {
            background: #f5e1e1;
            border: none;
            color: #9e6b6b;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 6px 14px;
            transition: var(--transition-fast);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .option-row .btn-danger:hover {
            background: #fce4e4;
            color: #c62828;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(115deg, #f1e0b5, #e5c989);
            border: none;
            color: #5e3e1a;
            font-weight: 600;
            border-radius: 40px;
            padding: 8px 20px;
            transition: var(--transition-fast);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .btn-primary:hover {
            background: #e9cf93;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            color: #5e3e1a;
        }

        .btn-primary i {
            font-size: 0.8rem;
        }

        .btn-secondary {
            background: var(--beige);
            border: none;
            color: #5a442a;
            font-weight: 600;
            border-radius: 40px;
            padding: 10px 24px;
            transition: var(--transition-fast);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .btn-secondary:hover {
            background: #e0d5bf;
            transform: translateY(-2px);
            color: #5a442a;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .btn-success {
            background: linear-gradient(115deg, #d4af37, #b8860b);
            border: none;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 60px;
            box-shadow: var(--shadow-gold);
            transition: var(--transition-fast);
            color: #2c1f0f;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            background: linear-gradient(115deg, #e0bc4a, #c9951a);
            box-shadow: 0 12px 22px rgba(180, 130, 30, 0.3);
            color: #2c1f0f;
        }

        /* ============================================================
           FOOTER — FROM REFERENCE
           ============================================================ */
        .footer {
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 1rem 2rem !important;
            text-align: center;
            margin: 2rem 0 25px 0 !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .footer p {
            margin: 0;
            color: #666 !important;
            font-size: 0.9rem;
            font-weight: 500;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .footer a {
            color: #b8860b !important;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            color: #d4af37 !important;
        }

        /* ============================================================
           OVERRIDE ANY NARROW BOOTSTRAP CONTAINER RULES
           ============================================================ */
        .container,
        .container-fluid,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            max-width: 100% !important;
        }

        /* ============================================================
           RESPONSIVE — Tablet and Mobile
           ============================================================ */
        @media (max-width: 992px) {
            .rating-question-page {
                margin-left: 0;
                padding: 12px 15px 0 15px;
            }

            .premium-card .card-body {
                padding: 1.25rem;
            }
        }

        @media (max-width: 768px) {
            .rating-question-page {
                padding: 10px 12px 0 12px;
                margin-left: 0;
            }

            .premium-card .card-header {
                padding: 1rem 1.25rem;
            }

            .premium-card .card-header h1 {
                font-size: 1.5rem;
            }

            .premium-card .card-body {
                padding: 1rem;
            }

            .btn-warm-gold,
            .btn-outline-cream,
            .btn-success,
            .btn-secondary {
                padding: 8px 18px;
                font-size: 0.85rem;
            }

            .footer {
                margin: 1.5rem 0 20px 0 !important;
                padding: 0.9rem 1rem !important;
            }

            .footer p {
                font-size: 0.8rem;
            }

            .badge-cream-gold {
                font-size: 0.75rem;
                padding: 0.3rem 1rem;
            }

            .option-row .col-md-4 {
                margin-top: 8px;
            }
        }

        @media (max-width: 576px) {
            .rating-question-page {
                padding: 8px 8px 0 8px;
            }

            .premium-card .card-header h1 {
                font-size: 1.2rem;
            }

            .btn-warm-gold,
            .btn-outline-cream,
            .btn-success,
            .btn-secondary {
                padding: 6px 14px;
                font-size: 0.75rem;
            }

            .form-control,
            .form-select {
                font-size: 0.9rem;
                padding: 8px 12px;
            }

            .premium-card .card-body {
                padding: 0.75rem;
            }

            .sub-card .card-body {
                padding: 0.75rem;
            }
        }

        /* ============================================================
           GOLD GRADIENT TEXT — FROM REFERENCE
           ============================================================ */
        .gold-gradient-text {
            background: linear-gradient(135deg, #b37b2e, var(--gold-dark), #d4af37, #e8c97a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 800;
        }

        /* ============================================================
           BADGE CREAM GOLD — FROM REFERENCE
           ============================================================ */
        .badge-cream-gold {
            background: var(--beige-dark);
            color: #7a5a2a;
            font-weight: 600;
            border-left: 4px solid var(--gold);
            box-shadow: var(--shadow-sm);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            padding: 0.5rem 1.5rem;
            font-size: 0.85rem;
        }

        /* ============================================================
           GOLD DIVIDER — FROM REFERENCE
           ============================================================ */
        .gold-divider {
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-dark));
            margin: 0.5rem auto;
            border-radius: 4px;
        }

        /* ============================================================
           BACK BUTTON SPACING
           ============================================================ */
        .rating-question-page .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        /* ============================================================
           ACTION BUTTONS - FULL WIDTH ON MOBILE
           ============================================================ */
        @media (max-width: 576px) {
            .rating-question-page .d-flex.gap-3 {
                gap: 0.5rem !important;
            }

            .rating-question-page .d-flex.gap-3 .btn {
                flex: 1;
                text-align: center;
                justify-content: center;
                padding: 8px 12px;
                font-size: 0.8rem;
            }
        }

        /* ============================================================
           EXTRA WIDTH FIXES - ENSURE MAXIMUM HORIZONTAL SPACE
           ============================================================ */
        .rating-question-page .row {
            margin-left: 0;
            margin-right: 0;
        }

        .rating-question-page .row > [class*="col-"] {
            padding-left: 10px;
            padding-right: 10px;
        }

        .rating-question-page .premium-card .card-body .row > [class*="col-"] {
            padding-left: 10px;
            padding-right: 10px;
        }

        /* Make sure the card body uses full width */
        .premium-card .card-body {
            width: 100%;
            max-width: none;
        }

        /* Option rows full width */
        .option-row .col-md-5,
        .option-row .col-md-3,
        .option-row .col-md-4 {
            flex: 1 1 auto;
        }

        @media (min-width: 768px) {
            .option-row .col-md-5 {
                flex: 0 0 45%;
                max-width: 45%;
            }
            .option-row .col-md-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }
            .option-row .col-md-4 {
                flex: 0 0 30%;
                max-width: 30%;
            }
        }

        /* Full width form groups inside sub-cards */
        .sub-card .card-body .row {
            margin-left: 0;
            margin-right: 0;
        }

        .sub-card .card-body .row > [class*="col-"] {
            padding-left: 10px;
            padding-right: 10px;
        }

        /* Fix for any lingering narrow containers */
        .cream-container {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* Ensure the main wrapper uses full width */
        .rating-question-page .container-fluid {
            padding: 0 !important;
        }

        /* Force body to have no extra margins that could affect layout */
        body {
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Ensure the page wrapper doesn't add extra margins */
        .page-wrapper {
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Make sure any parent containers are full width */
        .main-content,
        #main-content,
        .content-area {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* Override any Bootstrap container max-width */
        .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /* Fix for common dashboard wrappers that might restrict width */
        [class*="wrapper"],
        [class*="content"],
        [class*="main"] {
            max-width: 100% !important;
        }

        /* Ensure card uses full width within its container */
        .card {
            width: 100% !important;
            max-width: 100% !important;
        }

        /* Make sure form elements use full width */
        form {
            width: 100% !important;
            max-width: 100% !important;
        }

        /* Fix for any hidden overflow issues */
        .rating-question-page {
            overflow-x: hidden;
        }

        /* Ensure the card and its children use full width */
        .premium-card .card-body form,
        .premium-card .card-body form .row,
        .premium-card .card-body form .sub-card {
            width: 100% !important;
            max-width: 100% !important;
        }

        /* Keep the premium card properly aligned */
        .premium-card {
            display: block;
            clear: both;
        }
    </style>
</head>
<body>
<!-- HEADER (kept exactly as is) -->
<?php include "common/header.php"; ?>

<!-- ============================================================
     WIDE DASHBOARD CONTENT - Positioned after the existing sidebar
     ============================================================ -->
<div class="rating-question-page">
    <div class="container-fluid cream-container">
        <!-- Hero Section -->
        <div class="text-center mb-4">
            <span class="badge badge-cream-gold px-4 py-2 rounded-pill">
                <i class="fas fa-<?= isset($question) ? 'edit' : 'plus' ?> me-2"></i> <?= isset($question) ? 'EDIT' : 'ADD' ?> QUESTION
            </span>
            <h1 class="display-5 fw-bold mt-3 gold-gradient-text">
                <i class="fas fa-<?= isset($question) ? 'edit' : 'plus' ?> me-3"></i> <?= isset($question) ? 'Edit' : 'Add' ?> Rating Question
            </h1>
            <div class="gold-divider"></div>
            <p class="mt-2" style="color:#9b7c54; font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">
                <i class="fas fa-cog me-2"></i> Configure question details and response options
            </p>
        </div>

        <!-- Back Button -->
        <div class="mb-4">
            <a href="<?= base_url('admin/manageratingquestion') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>

        <!-- Alerts -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-premium-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2" style="color: var(--gold-dark);"></i>
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Main Card - FULL WIDTH -->
        <div class="premium-card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-<?= isset($question) ? 'edit' : 'plus' ?> me-2" style="color: var(--gold-dark);"></i> Question Details</h5>
            </div>
            <div class="card-body">
                <form action="<?= isset($question) ? base_url('admin/manageratingquestion/update/' . $question['id']) : base_url('admin/manageratingquestion/store') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="question_no" class="form-label">Question Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="question_no" name="question_no"
                                       value="<?= old('question_no', $question['question_no'] ?? $maxQuestionNo ?? 1) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="question" class="form-label">Question Text <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="question" name="question"
                                       value="<?= old('question', $question['question'] ?? '') ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="question_type" class="form-label">Question Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="question_type" name="question_type" required>
                                    <option value="">Select Type...</option>
                                    <option value="select" <?= old('question_type', $question['question_type'] ?? '') == 'select' ? 'selected' : '' ?>>Select / Dropdown</option>
                                    <option value="range" <?= old('question_type', $question['question_type'] ?? '') == 'range' ? 'selected' : '' ?>>Range Slider</option>
                                    <option value="checkbox_group" <?= old('question_type', $question['question_type'] ?? '') == 'checkbox_group' ? 'selected' : '' ?>>Checkbox Group</option>
                                    <option value="textarea" <?= old('question_type', $question['question_type'] ?? '') == 'textarea' ? 'selected' : '' ?>>Textarea</option>
                                    <option value="text" <?= old('question_type', $question['question_type'] ?? '') == 'text' ? 'selected' : '' ?>>Text Input</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" <?= old('status', $question['status'] ?? 1) == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= old('status', $question['status'] ?? 1) == 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order"
                                       value="<?= old('sort_order', $question['sort_order'] ?? 0) ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Select / Checkbox Fields -->
                    <div id="selectFields" style="display: none;">
                        <div class="sub-card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0"><i class="fas fa-list me-2" style="color: var(--gold-dark);"></i>Options & Ratings</h6>
                            </div>
                            <div class="card-body">
                                <div id="optionsContainer">
                                    <?php
                                    $options = old('options', isset($question['options']) ? $question['options'] : ['', '']);
                                    $ratings = old('option_ratings', isset($question['option_ratings']) ? $question['option_ratings'] : ['', '']);
                                    if (!is_array($options)) $options = [];
                                    if (!is_array($ratings)) $ratings = [];

                                    while (count($options) < 2) {
                                        $options[] = '';
                                        $ratings[] = '';
                                    }
                                    ?>
                                    <?php foreach ($options as $index => $opt): ?>
                                        <div class="row mb-2 option-row">
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="options[]"
                                                       placeholder="Option <?= $index + 1 ?>" value="<?= esc($opt) ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="option_ratings[]"
                                                       placeholder="Rating (0-5)" value="<?= esc($ratings[$index] ?? '') ?>"
                                                       min="0" max="5" step="0.1" required>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (count($options) > 2): ?>
                                                    <button type="button" class="btn btn-danger btn-sm remove-option">
                                                        <i class="fas fa-times"></i> Remove
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" id="addOptionBtn">
                                    <i class="fas fa-plus me-1"></i>Add Option
                                </button>
                                <small class="text-muted d-block mt-2" style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif; color: #7a5f3a !important;">
                                    <i class="fas fa-info-circle me-1"></i>Define each option and its corresponding rating value (0-5).
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Range Fields -->
                    <div id="rangeFields" style="display: none;">
                        <div class="sub-card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0"><i class="fas fa-sliders-h me-2" style="color: var(--gold-dark);"></i>Range Settings</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="min_value" class="form-label">Minimum Value <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="min_value" name="min_value"
                                                   value="<?= old('min_value', $question['min_value'] ?? 1) ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="max_value" class="form-label">Maximum Value <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="max_value" name="max_value"
                                                   value="<?= old('max_value', $question['max_value'] ?? 10) ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Fields -->
                    <div id="textFields" style="display: none;">
                        <div class="sub-card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0"><i class="fas fa-font me-2" style="color: var(--gold-dark);"></i>Text Settings</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="placeholder" class="form-label">Placeholder Text</label>
                                    <input type="text" class="form-control" id="placeholder" name="placeholder"
                                           value="<?= old('placeholder', $question['placeholder'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="rows" class="form-label">Number of Rows</label>
                                    <input type="number" class="form-control" id="rows" name="rows"
                                           value="<?= old('rows', $question['rows'] ?? 3) ?>" min="1">
                                    <small class="text-muted" style="font-family: 'Inter', 'Segoe UI', system-ui, sans-serif; color: #7a5f3a !important;">
                                        <i class="fas fa-info-circle me-1"></i>Only for Textarea type
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-3 flex-wrap">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i><?= isset($question) ? 'Update' : 'Add' ?> Question
                        </button>
                        <a href="<?= base_url('admin/manageratingquestion') ?>" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS (for alert dismissals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Header JS (if required by header.php) -->
<script src="header.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const questionType = document.getElementById('question_type');
        const selectFields = document.getElementById('selectFields');
        const rangeFields = document.getElementById('rangeFields');
        const textFields = document.getElementById('textFields');
        const optionsContainer = document.getElementById('optionsContainer');
        const addOptionBtn = document.getElementById('addOptionBtn');

        function showTypeFields(type) {
            selectFields.style.display = 'none';
            rangeFields.style.display = 'none';
            textFields.style.display = 'none';

            if (type === 'select' || type === 'checkbox_group') {
                selectFields.style.display = 'block';
            } else if (type === 'range') {
                rangeFields.style.display = 'block';
            } else if (type === 'textarea' || type === 'text') {
                textFields.style.display = 'block';
            }
        }

        const initialType = questionType.value;
        if (initialType) {
            showTypeFields(initialType);
        }

        questionType.addEventListener('change', function() {
            showTypeFields(this.value);
        });

        addOptionBtn.addEventListener('click', function() {
            const index = optionsContainer.querySelectorAll('.option-row').length;
            const row = document.createElement('div');
            row.className = 'row mb-2 option-row';
            row.innerHTML = `
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="options[]" placeholder="Option ${index + 1}" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="option_ratings[]" placeholder="Rating (0-5)" min="0" max="5" step="0.1" required>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger btn-sm remove-option">
                            <i class="fas fa-times"></i> Remove
                        </button>
                    </div>
                `;
            optionsContainer.appendChild(row);

            row.querySelector('.remove-option').addEventListener('click', function() {
                const rows = optionsContainer.querySelectorAll('.option-row');
                if (rows.length > 2) {
                    row.remove();
                } else {
                    alert('Minimum 2 options are required.');
                }
            });
        });

        document.querySelectorAll('.remove-option').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const rows = optionsContainer.querySelectorAll('.option-row');
                if (rows.length > 2) {
                    this.closest('.option-row').remove();
                } else {
                    alert('Minimum 2 options are required.');
                }
            });
        });
    });
</script>
</body>
</html>