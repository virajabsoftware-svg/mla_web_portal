<?php
/**
 * Rating Question Management View
 * This page displays all rating questions with their details and actions
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Manage Rating Questions</title>
    
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
         PAGE-SPECIFIC CSS (merged with reference global CSS)
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
           PAGE CONTAINER
           ============================================================ */
        .cream-container {
            padding-top: 30px !important;
        }

        .container-fluid.cream-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
           PREMIUM CARD — FROM REFERENCE MLA CARD STYLING
           ============================================================ */
        .premium-card {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            box-shadow: var(--shadow-lg);
            border: 1px solid #f3ecd9;
            position: relative;
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
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            text-decoration: none;
        }

        .btn-premium i {
            font-size: 0.8rem;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            color: #5a442a;
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

        .btn-premium.info {
            background: #e3e8f0;
            color: #3a5a7b;
        }

        .btn-premium.info:hover {
            background: #d5dce8;
        }

        .btn-premium.danger {
            background: #f5e1e1;
            color: #9e6b6b;
        }

        .btn-premium.danger:hover {
            background: #fce4e4;
            color: #c62828;
        }

        .btn-premium.warning {
            background: #f5ede1;
            color: #8b6946;
        }

        .btn-premium.warning:hover {
            background: #e8dccc;
        }

        /* ============================================================
           PREMIUM TABLE — FROM REFERENCE
           ============================================================ */
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

        .premium-table .badge-premium {
            background: linear-gradient(110deg, #d4af37, #f3e5ab);
            color: #2c2418;
            font-weight: 600;
            padding: 0.35rem 0.9rem;
            border-radius: 40px;
            font-size: 0.75rem;
            letter-spacing: 0.3px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

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
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .status-inactive {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #fce4e4;
            color: #c62828;
            border: 1px solid #ef9a9a;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .action-btn-group {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        /* ============================================================
           ALERTS — FROM REFERENCE
           ============================================================ */
        .alert-premium-success {
            background: var(--beige-light);
            border: 1px solid var(--gold-light);
            border-left: 4px solid var(--gold);
            color: #7a5a2a;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        .alert-premium-danger {
            background: var(--beige-light);
            border: 1px solid #f5d0d0;
            border-left: 4px solid #d4af37;
            color: #7a5a2a;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        /* ============================================================
           EMPTY STATE — FROM REFERENCE
           ============================================================ */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-state i {
            color: var(--gold-light);
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        .empty-state h5 {
            font-family: 'Playfair Display', 'Georgia', serif;
            color: #2c1f0f;
            font-weight: 700;
        }

        .empty-state p {
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #7a5f3a;
        }

        /* ============================================================
           OPTIONS BADGE CONTAINER
           ============================================================ */
        .options-badge-container {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .options-badge-container .badge {
            background: var(--beige-dark);
            color: #7a5a2a;
            font-weight: 500;
            font-size: 0.7rem;
            padding: 0.25rem 0.6rem;
            border-radius: 30px;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            border: 1px solid rgba(212, 175, 55, 0.2);
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
            margin: 2rem 20px 25px 20px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
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
           RESPONSIVE — FROM REFERENCE
           ============================================================ */
        @media (max-width: 768px) {
            .cream-container {
                padding-top: 20px !important;
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

            .premium-table-wrapper {
                padding: 0.5rem 0.25rem;
            }

            .premium-table thead th,
            .premium-table tbody td {
                padding: 8px 10px;
                font-size: 0.75rem;
            }

            .btn-warm-gold,
            .btn-outline-cream {
                padding: 8px 18px;
                font-size: 0.85rem;
            }

            .btn-premium {
                padding: 4px 10px;
                font-size: 0.65rem;
            }

            .btn-premium i {
                font-size: 0.65rem;
            }

            .footer {
                margin: 1.5rem 15px 20px 15px !important;
                padding: 0.9rem 1rem !important;
            }

            .footer p {
                font-size: 0.8rem;
            }

            .badge-cream-gold {
                font-size: 0.75rem;
                padding: 0.3rem 1rem;
            }

            .options-badge-container .badge {
                font-size: 0.6rem;
                padding: 0.15rem 0.5rem;
            }

            .status-active,
            .status-inactive {
                font-size: 0.6rem;
                padding: 2px 10px;
            }
        }

        @media (max-width: 576px) {
            .premium-table thead th,
            .premium-table tbody td {
                padding: 6px 6px;
                font-size: 0.65rem;
            }

            .btn-premium {
                padding: 2px 8px;
                font-size: 0.55rem;
                gap: 2px;
            }

            .btn-premium i {
                font-size: 0.5rem;
            }

            .action-btn-group {
                gap: 3px;
            }

            .premium-card .card-header h1 {
                font-size: 1.2rem;
            }

            .btn-warm-gold,
            .btn-outline-cream {
                padding: 6px 14px;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid cream-container">
        <!-- EXISTING HEADER INCLUDE - KEPT EXACTLY AS IS -->
        <?php include "common/header.php"; ?>

        <!-- Hero Section -->
        <div class="text-center mb-4">
            <span class="badge badge-cream-gold px-4 py-2 rounded-pill">
                <i class="fas fa-edit me-2"></i> QUESTION MANAGEMENT
            </span>
            <h1 class="display-5 fw-bold mt-3 gold-gradient-text">
                <i class="fas fa-star me-3"></i> Manage Rating Questions
            </h1>
            <div class="gold-divider"></div>
            <p class="mt-2" style="color:#9b7c54; font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;">
                <i class="fas fa-cog me-2"></i> Configure and manage evaluation criteria
            </p>
        </div>

        <!-- Alerts -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-premium-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2" style="color: var(--gold-dark);"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-premium-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2" style="color: var(--gold-dark);"></i>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Main Card -->
        <div class="premium-card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-list me-2" style="color: var(--gold-dark);"></i> Question List</h5>
                <a href="<?= base_url('admin/ratingquestion/create') ?>" class="btn btn-warm-gold">
                    <i class="fas fa-plus me-2"></i> Add New Question
                </a>
            </div>
            <div class="card-body">
                <?php if (!empty($questions)): ?>
                    <div class="premium-table-wrapper">
                        <table class="premium-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Type</th>
                                    <th>Options</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($questions as $q): ?>
                                    <tr>
                                        <td><?= $q['question_no'] ?></td>
                                        <td><strong><?= esc($q['question']) ?></strong></td>
                                        <td>
                                            <span class="badge-premium">
                                                <?= ucfirst($q['question_type']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($q['question_type'] === 'select' || $q['question_type'] === 'checkbox_group'): ?>
                                                <?php
                                                    $options = json_decode($q['options'] ?? '[]', true);
                                                    $ratings = json_decode($q['option_ratings'] ?? '[]', true);
                                                ?>
                                                <div class="options-badge-container">
                                                    <?php foreach ($options as $i => $opt): ?>
                                                        <span class="badge">
                                                            <?= esc($opt) ?> (<?= $ratings[$i] ?? 0 ?>)
                                                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php elseif ($q['question_type'] === 'range'): ?>
                                                <div class="options-badge-container">
                                                    <span class="badge">
                                                        <?= $q['min_value'] ?> - <?= $q['max_value'] ?>
                                                    </span>
                                                </div>
                                            <?php elseif ($q['question_type'] === 'textarea' || $q['question_type'] === 'text'): ?>
                                                <div class="options-badge-container">
                                                    <span class="badge">
                                                        <?= esc($q['placeholder'] ?? 'No placeholder') ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="<?= $q['status'] == 1 ? 'status-active' : 'status-inactive' ?>">
                                                <?= $q['status'] == 1 ? 'Active' : 'Inactive' ?>
                                            </span>
                                        </td>
                                        <td><?= $q['sort_order'] ?></td>
                                        <td>
                                            <div class="action-btn-group">
                                                <a href="<?= base_url('admin/ratingquestion/view/' . $q['id']) ?>" 
                                                   class="btn-premium info" title="View">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="<?= base_url('admin/ratingquestion/edit/' . $q['id']) ?>" 
                                                   class="btn-premium gold" title="Edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url('admin/ratingquestion/delete/' . $q['id']) ?>" 
                                                   class="btn-premium danger" title="Delete" 
                                                   onclick="return confirm('Are you sure you want to delete this question?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                                <a href="<?= base_url('admin/ratingquestion/toggle-status/' . $q['id']) ?>" 
                                                   class="btn-premium <?= $q['status'] == 1 ? 'warning' : 'emerald' ?>" 
                                                   title="<?= $q['status'] == 1 ? 'Disable' : 'Enable' ?>">
                                                    <i class="fas fa-<?= $q['status'] == 1 ? 'ban' : 'check' ?>"></i>
                                                    <?= $q['status'] == 1 ? 'Disable' : 'Enable' ?>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-question-circle"></i>
                        <h5>No Questions Found</h5>
                        <p>Click "Add New Question" to create your first rating question.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS (for alert dismissals and modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Header JS (if required by header.php) -->
    <script src="header.js"></script>
</body>
</html>