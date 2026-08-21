<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Leader Tracker -Party Management</title>
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

        .stat-box {
            background: var(--pure-white);
            border-radius: var(--radius-xl);
            padding: 22px 20px;
            text-align: center;
            border: 1px solid #f3ecd9;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-base);
            height: 100%;
        }

        .stat-box:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-gold);
            border-color: var(--gold-light);
        }

        .stat-box .stat-icon {
            font-size: 2rem;
            color: var(--gold-dark);
            margin-bottom: 8px;
        }

        .stat-box .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2c1f0f, var(--gold-dark));
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .stat-box .stat-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #7a5f3a;
            margin-top: 4px;
        }

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
            min-width: 700px;
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

        .status-inactive {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            background: #fce4ec;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }

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
            padding: 2rem;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            color: #2c2418;
        }

        .modal-cream .modal-footer {
            border-top: 1px solid rgba(212, 175, 55, 0.3);
            background: rgba(245, 235, 210, 0.4);
            border-radius: 0 0 28px 28px;
            padding: 1rem 1.75rem;
        }

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

        @media (max-width: 576px) {
            .stat-grid {
                grid-template-columns: 1fr 1fr !important;
            }
        }

        /* Party Logo Styles */
        .party-logo-placeholder {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #f5e7c8, #c9a03d);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.7rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
        }

        .party-logo-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f3ecd9;
        }

        .logo-preview-container {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px dashed #e9dfcf;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #faf6ed;
        }

        .logo-preview-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logo-preview-container i {
            font-size: 2rem;
            color: #d4af37;
        }
    </style>
</head>

<body class="inner_page widgets">
    <?php include "common/header.php"?>

    <div class="container-fluid mt-4 px-3 px-lg-5 cream-container">
        <!-- ============================================================ -->
        <!-- HERO SECTION – PARTY MANAGEMENT -->
        <!-- ============================================================ -->
        <div class="text-center mb-4">
            <span class="badge badge-cream-gold px-4 py-2 rounded-pill"><i class="fas fa-flag me-2"></i> PARTY MANAGEMENT</span>
            <h1 class="display-5 fw-bold mt-3 gold-gradient-text"><i class="fas fa-flag me-3"></i> Party Management</h1>
            <div class="gold-divider"></div>
            <p class="text-muted mt-2" style="color:#9b7c54 !important;">Manage political parties, their leadership, and legislative presence</p>
        </div>

        <!-- ============================================================ -->
        <!-- STATISTICS BOXES -->
        <!-- ============================================================ -->
        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-md-6">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-flag"></i></div>
                    <div class="stat-number"><?= $totalParties ?? 18 ?></div>
                    <div class="stat-label">Total Parties</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-star"></i></div>
                    <div class="stat-number"><?= $nationalParties ?? 4 ?></div>
                    <div class="stat-label">National Parties</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-building"></i></div>
                    <div class="stat-number"><?= $stateParties ?? 9 ?></div>
                    <div class="stat-label">State Parties</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-box">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-number"><?= $activeParties ?? 17 ?></div>
                    <div class="stat-label">Active Parties</div>
                </div>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- ============================================================ -->
        <!-- FILTER SECTION – PARTY COMMAND CENTER -->
        <!-- ============================================================ -->
        <div class="filter-astro p-4 shadow-lg mt-2">
            <h3 class="mb-4 fw-semibold" style="color:#876b42;">
                <i class="fas fa-flag me-2" style="color: var(--gold-dark);"></i>
                Party Command Center
            </h3>
            <div class="row g-3">
                <div class="col-md-2">
                    <label><i class="fas fa-tag me-1"></i> Party Name</label>
                    <input type="text" id="filter_party_name" class="form-control" placeholder="Search party">
                </div>
                <div class="col-md-2">
                    <label><i class="fas fa-barcode me-1"></i> Party Code</label>
                    <input type="text" id="filter_party_code" class="form-control" placeholder="Search code">
                </div>
                <div class="col-md-2">
                    <label><i class="fas fa-layer-group me-1"></i> Party Type</label>
                    <select id="filter_party_type" class="form-select">
                        <option value="">All Types</option>
                        <option value="National">National</option>
                        <option value="State">State</option>
                        <option value="Regional">Regional</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label><i class="fas fa-flag me-1"></i> State</label>
                    <select id="filter_state" class="form-select">
                        <option value="">All States</option>
                        <?php if (!empty($states)): ?>
                            <?php foreach ($states as $state): ?>
                                <option value="<?= esc($state['id']); ?>"><?= esc($state['state_name']); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label><i class="fas fa-toggle-on me-1"></i> Status</label>
                    <select id="filter_status" class="form-select">
                        <option value="">All Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label><i class="fas fa-sort-amount-down me-1"></i> Sort By</label>
                    <select id="filter_sort" class="form-select">
                        <option value="asc">A → Z</option>
                        <option value="desc">Z → A</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 d-flex gap-3 flex-wrap">
                <button type="button" id="deployFiltersBtn" class="btn btn-warm-gold px-4 fw-bold">
                    <i class="fas fa-filter me-2"></i> Deploy Filters
                </button>
                <button type="button" id="resetFiltersBtn" class="btn btn-outline-cream px-4">
                    <i class="fas fa-sync-alt me-2"></i> Reset
                </button>
                <button type="button" class="btn btn-warm-gold px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#addPartyModal">
                    <i class="fas fa-plus me-2"></i> Add Party
                </button>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- PARTY DIRECTORY TABLE -->
        <!-- ============================================================ -->
        <div class="mt-5">
            <h2 class="gold-gradient-text fs-2 fw-bold"><i class="fas fa-table me-2"></i> Party Directory</h2>
            <div class="premium-table-wrapper mt-3">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Party Name</th>
                            <th>Party Code</th>
                            <th>Party Type</th>
                            <th>State</th>
                            <th>Total MLAs</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($parties)): ?>
                            <?php foreach ($parties as $index => $party): ?>
                                <tr class="party-row" 
                                    data-id="<?= esc($party['id']) ?>"
                                    data-party="<?= esc(strtolower(trim($party['party_name'] ?? ''))) ?>"
                                    data-code="<?= esc(strtolower(trim($party['party_code'] ?? ''))) ?>"
                                    data-type="<?= esc(strtolower(trim($party['party_type'] ?? ''))) ?>"
                                    data-state="<?= esc($party['state_id'] ?? '') ?>"
                                    data-status="<?= esc(strtolower(trim($party['status'] ?? ''))) ?>">
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <?php if (!empty($party['logo']) && file_exists(FCPATH . 'uploads/parties/' . $party['logo'])): ?>
                                            <img src="<?= base_url('uploads/parties/' . $party['logo']) ?>" 
                                                 alt="<?= esc($party['party_name']) ?>" 
                                                 class="party-logo-img">
                                        <?php else: ?>
                                            <span class="party-logo-placeholder">
                                                <?= esc(substr($party['party_code'] ?? $party['party_name'], 0, 3)) ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td><strong><?= esc($party['party_name']) ?></strong></td>
                                    <td><?= esc($party['party_code'] ?? '-') ?></td>
                                    <td><?= esc($party['party_type']) ?></td>
                                    <td><?= esc($party['state_name'] ?? '-') ?></td>
                                    <td><?= esc($party['total_mlas'] ?? 0) ?></td>
                                    <td>
                                        <?php if ($party['status'] === 'Active'): ?>
                                            <span class="status-active">Active</span>
                                        <?php else: ?>
                                            <span class="status-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="action-btn-group">
                                            <button class="action-btn view-btn" type="button" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#viewPartyModal" 
                                                    data-id="<?= $party['id'] ?>">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <button class="action-btn edit-btn" type="button" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editPartyModal" 
                                                    data-id="<?= $party['id'] ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="action-btn delete-btn" type="button"
                                                    data-id="<?= $party['id'] ?>"
                                                    data-name="<?= esc($party['party_name']) ?>">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center py-4">No parties found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- FOOTER -->
        <!-- ============================================================ -->
        <div class="footer">
            <p>&copy; 2026 Leader Tracker. All rights reserved.</p>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- VIEW PARTY MODAL -->
    <!-- ============================================================ -->
    <div class="modal fade modal-cream" id="viewPartyModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content modal-cream">
                <div class="modal-header border-warning">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-eye me-2"></i>
                        Party Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12 text-center mb-3">
                            <div id="view_party_logo_container" style="display:inline-block;">
                                <img id="view_party_logo_img" 
                                     src="" 
                                     alt="Party Logo" 
                                     style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid var(--gold-light);display:none;">
                                <i id="view_party_logo_icon" 
                                   class="fas fa-flag" 
                                   style="font-size:4rem;color:var(--gold-dark);display:inline-block;"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-tag me-1"></i>
                                Party Name
                            </label>
                            <input type="text" id="view_party_name" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-barcode me-1"></i>
                                Party Code
                            </label>
                            <input type="text" id="view_party_code" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-layer-group me-1"></i>
                                Party Type
                            </label>
                            <input type="text" id="view_party_type" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-flag me-1"></i>
                                State
                            </label>
                            <input type="text" id="view_state_name" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-calendar me-1"></i>
                                Founded Year
                            </label>
                            <input type="text" id="view_founded_year" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-user-tie me-1"></i>
                                Party President / Leader
                            </label>
                            <input type="text" id="view_leader" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-users me-1"></i>
                                Total MLAs
                            </label>
                            <input type="text" id="view_total_mlas" class="form-control view-field-readonly" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold" style="color:#876b42;">
                                <i class="fas fa-toggle-on me-1"></i>
                                Status
                            </label>
                            <input type="text" id="view_status" class="form-control view-field-readonly" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- ADD PARTY MODAL with Logo Upload -->
    <!-- ============================================================ -->
    <div class="modal fade modal-cream" id="addPartyModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content modal-cream">
                <div class="modal-header border-warning">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-plus me-2"></i>
                        Add Party
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPartyForm" 
                          action="<?= base_url('admin/party/save') ?>" 
                          method="post" 
                          enctype="multipart/form-data"
                          class="needs-validation" 
                          novalidate>
                        
                        <?= csrf_field(); ?>
                        
                        <div class="row g-3">
                            <!-- Party Logo Upload -->
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="fw-bold" style="color:#876b42;">
                                            <i class="fas fa-image me-1"></i>
                                            Party Logo
                                        </label>
                                        <input type="file" 
                                               name="party_logo" 
                                               id="add_party_logo" 
                                               class="form-control" 
                                               accept="image/*"
                                               style="padding:6px 12px;">
                                        <small class="text-muted" style="font-size:0.7rem;">
                                            Accepted: JPG, PNG, GIF (Max 2MB)
                                        </small>
                                        <div id="add_logo_error" class="text-danger" style="font-size:0.8rem;display:none;"></div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <label class="fw-bold" style="color:#876b42;">Logo Preview</label>
                                        <div class="logo-preview-container">
                                            <img id="add_logo_preview" src="" alt="Logo Preview" style="display:none;">
                                            <i id="add_logo_placeholder" class="fas fa-image"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-tag me-1"></i>
                                    Party Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       name="party_name" 
                                       class="form-control" 
                                       placeholder="Enter party name" 
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-barcode me-1"></i>
                                    Party Code
                                </label>
                                <input type="text" 
                                       name="party_code" 
                                       class="form-control" 
                                       placeholder="Enter party code (e.g., BJP)">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-layer-group me-1"></i>
                                    Party Type <span class="text-danger">*</span>
                                </label>
                                <select name="party_type" class="form-select" required>
                                    <option value="">Select Party Type</option>
                                    <option value="National">National</option>
                                    <option value="State">State</option>
                                    <option value="Regional">Regional</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-flag me-1"></i>
                                    State
                                </label>
                                <select name="state_id" class="form-select">
                                    <option value="">Select State</option>
                                    <?php if (!empty($states)): ?>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?= $state['id']; ?>">
                                                <?= esc($state['state_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-calendar me-1"></i>
                                    Founded Year
                                </label>
                                <input type="text" 
                                       name="founded_year" 
                                       class="form-control" 
                                       placeholder="e.g., 1980">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-user-tie me-1"></i>
                                    Party President / Leader
                                </label>
                                <input type="text" 
                                       name="leader" 
                                       class="form-control" 
                                       placeholder="Enter leader name">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-users me-1"></i>
                                    Total MLAs
                                </label>
                                <input type="number" 
                                       name="total_mlas" 
                                       class="form-control" 
                                       placeholder="Enter number of MLAs"
                                       min="0">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-toggle-on me-1"></i>
                                    Status
                                </label>
                                <select name="status" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-warm-gold px-4">
                                <i class="fas fa-save me-2"></i>
                                Save Party
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- EDIT PARTY MODAL with Logo Upload -->
    <!-- ============================================================ -->
    <div class="modal fade modal-cream" id="editPartyModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content modal-cream">
                <div class="modal-header border-warning">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-edit me-2"></i>
                        Edit Party
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editPartyForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="edit_party_id">
                        <input type="hidden" name="existing_logo" id="edit_existing_logo">
                        
                        <div class="row g-3">
                            <!-- Party Logo Upload -->
                            <div class="col-md-12">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="fw-bold" style="color:#876b42;">
                                            <i class="fas fa-image me-1"></i>
                                            Party Logo
                                        </label>
                                        <input type="file" 
                                               name="party_logo" 
                                               id="edit_party_logo" 
                                               class="form-control" 
                                               accept="image/*"
                                               style="padding:6px 12px;">
                                        <small class="text-muted" style="font-size:0.7rem;">
                                            Leave empty to keep current logo. Accepted: JPG, PNG, GIF (Max 2MB)
                                        </small>
                                        <div id="edit_logo_error" class="text-danger" style="font-size:0.8rem;display:none;"></div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <label class="fw-bold" style="color:#876b42;">Current Logo</label>
                                        <div class="logo-preview-container">
                                            <img id="edit_logo_preview" src="" alt="Current Logo">
                                            <i id="edit_logo_placeholder" class="fas fa-image" style="display:none;"></i>
                                        </div>
                                        <small class="text-muted" style="font-size:0.7rem;">Preview of current logo</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-tag me-1"></i>
                                    Party Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       name="party_name" 
                                       id="edit_party_name" 
                                       class="form-control" 
                                       required>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-barcode me-1"></i>
                                    Party Code
                                </label>
                                <input type="text" 
                                       name="party_code" 
                                       id="edit_party_code" 
                                       class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-layer-group me-1"></i>
                                    Party Type <span class="text-danger">*</span>
                                </label>
                                <select name="party_type" id="edit_party_type" class="form-select" required>
                                    <option value="National">National</option>
                                    <option value="State">State</option>
                                    <option value="Regional">Regional</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-flag me-1"></i>
                                    State
                                </label>
                                <select name="state_id" id="edit_state_id" class="form-select">
                                    <option value="">Select State</option>
                                    <?php if (!empty($states)): ?>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?= $state['id']; ?>">
                                                <?= esc($state['state_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-calendar me-1"></i>
                                    Founded Year
                                </label>
                                <input type="text" 
                                       name="founded_year" 
                                       id="edit_founded_year" 
                                       class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-user-tie me-1"></i>
                                    Party President / Leader
                                </label>
                                <input type="text" 
                                       name="leader" 
                                       id="edit_leader" 
                                       class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-users me-1"></i>
                                    Total MLAs
                                </label>
                                <input type="number" 
                                       name="total_mlas" 
                                       id="edit_total_mlas" 
                                       class="form-control"
                                       min="0">
                            </div>

                            <div class="col-md-6">
                                <label class="fw-bold" style="color:#876b42;">
                                    <i class="fas fa-toggle-on me-1"></i>
                                    Status
                                </label>
                                <select name="status" id="edit_status" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-warm-gold px-4" id="updatePartyBtn">
                        <i class="fas fa-save me-2"></i>
                        Update Party
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- DELETE CONFIRMATION MODAL -->
    <!-- ============================================================ -->
    <div class="modal fade modal-cream" id="deletePartyModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content modal-cream">
                <div class="modal-header border-warning">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-exclamation-triangle me-2" style="color:#c62828;"></i>
                        Confirm Delete
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-trash-alt" style="font-size:3rem;color:#c62828;margin-bottom:15px;"></i>
                    <h5 class="fw-bold" style="color:#2c2418;">Are you sure?</h5>
                    <p style="color:#7a5f3a;">You are about to delete <strong id="delete_party_name"></strong>.</p>
                    <p style="color:#9e6b6b;font-size:0.9rem;">This action cannot be undone.</p>
                    <form id="deletePartyForm" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="delete_party_id">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-cream px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn">
                        <i class="fas fa-trash me-2"></i>
                        Delete Party
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="<?= base_url('assets/admin/js/header.js') ?>">
    </script>
    <script>
    $(document).ready(function() {
        // ============================================================
        // PARTY LOGO PREVIEW - ADD MODAL
        // ============================================================
        $('#add_party_logo').on('change', function() {
            const file = this.files[0];
            const errorDiv = $('#add_logo_error');
            errorDiv.hide();
            
            if (file) {
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    errorDiv.text('Please select a valid image file (JPG, PNG, GIF, WEBP).');
                    errorDiv.show();
                    this.value = '';
                    $('#add_logo_preview').hide();
                    $('#add_logo_placeholder').show();
                    return false;
                }
                
                if (file.size > 2 * 1024 * 1024) {
                    errorDiv.text('File size exceeds 2MB. Please select a smaller image.');
                    errorDiv.show();
                    this.value = '';
                    $('#add_logo_preview').hide();
                    $('#add_logo_placeholder').show();
                    return false;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#add_logo_preview').attr('src', e.target.result).show();
                    $('#add_logo_placeholder').hide();
                };
                reader.readAsDataURL(file);
            } else {
                $('#add_logo_preview').hide();
                $('#add_logo_placeholder').show();
            }
        });

        // ============================================================
        // PARTY LOGO PREVIEW - EDIT MODAL
        // ============================================================
        $('#edit_party_logo').on('change', function() {
            const file = this.files[0];
            const errorDiv = $('#edit_logo_error');
            errorDiv.hide();
            
            if (file) {
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    errorDiv.text('Please select a valid image file (JPG, PNG, GIF, WEBP).');
                    errorDiv.show();
                    this.value = '';
                    return false;
                }
                
                if (file.size > 2 * 1024 * 1024) {
                    errorDiv.text('File size exceeds 2MB. Please select a smaller image.');
                    errorDiv.show();
                    this.value = '';
                    return false;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit_logo_preview').attr('src', e.target.result);
                    $('#edit_logo_placeholder').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        // ============================================================
        // FILTER SYSTEM
        // ============================================================
        const $party = $('#filter_party_name');
        const $code = $('#filter_party_code');
        const $type = $('#filter_party_type');
        const $state = $('#filter_state');
        const $status = $('#filter_status');
        const $sort = $('#filter_sort');
        const $rows = $('.party-row');

        function applyPartyFilters() {
            const partyVal = $.trim($party.val()).toLowerCase();
            const codeVal = $.trim($code.val()).toLowerCase();
            const typeVal = $.trim($type.val()).toLowerCase();
            const stateVal = $.trim($state.val()).toLowerCase();
            const statusVal = $.trim($status.val()).toLowerCase();
            let visible = [];

            $rows.each(function() {
                const $r = $(this);
                const p = String($r.attr('data-party') || '').trim().toLowerCase();
                const c = String($r.attr('data-code') || '').trim().toLowerCase();
                const t = String($r.attr('data-type') || '').trim().toLowerCase();
                const s = String($r.attr('data-state') || '').trim().toLowerCase();
                const st = String($r.attr('data-status') || '').trim().toLowerCase();
                const match = (partyVal === '' || p.includes(partyVal)) &&
                    (codeVal === '' || c.includes(codeVal)) &&
                    (typeVal === '' || t === typeVal) &&
                    (stateVal === '' || s === stateVal) &&
                    (statusVal === '' || st === statusVal);
                if (match) { visible.push($r);
                    $r.show(); } else { $r.hide(); }
            });

            const order = $sort.val() || 'asc';
            const $tbody = $('.premium-table tbody');
            visible.sort((a, b) => {
                const na = String(a.attr('data-party') || '').trim().toLowerCase();
                const nb = String(b.attr('data-party') || '').trim().toLowerCase();
                return order === 'desc' ? nb.localeCompare(na, undefined, { numeric: true,
                        sensitivity: 'base' }) : na.localeCompare(nb, undefined, { numeric: true,
                        sensitivity: 'base' });
            });
            $.each(visible, function(i, row) { $tbody.append(row); });
            let sn = 1;
            $tbody.find('.party-row:visible').each(function() { $(this).find('td:first-child').text(sn);
                sn++; });
            $('#noFilterResultRow').remove();
            if (visible.length === 0) {
                $tbody.append(
                    `<tr id="noFilterResultRow"><td colspan="9" class="text-center py-5"><div style="color:#876b42;font-weight:600;font-size:1rem;"><i class="fas fa-search" style="font-size:2rem;color:#b8860b;margin-bottom:10px;"></i><br>No parties found.</div></td></tr>`
                    );
            }
        }

        $('#deployFiltersBtn').on('click', applyPartyFilters);
        $party.on('input', applyPartyFilters);
        $code.on('input', applyPartyFilters);
        $type.on('change', applyPartyFilters);
        $state.on('change', applyPartyFilters);
        $status.on('change', applyPartyFilters);
        $sort.on('change', applyPartyFilters);

        $('#resetFiltersBtn').on('click', function() {
            $party.val('');
            $code.val('');
            $type.val('');
            $state.val('');
            $status.val('');
            $sort.val('asc');
            $('#noFilterResultRow').remove();
            $rows.show();
            $rows.each(function(i) { $(this).find('td:first-child').text(i + 1); });
            applyPartyFilters();
        });
        applyPartyFilters();

        // ============================================================
        // VIEW PARTY
        // ============================================================
        $(document).on('click', '.view-btn', function() {
            let partyId = $(this).data('id');

            $.ajax({
                url: "<?= base_url('admin/party/get/') ?>" + partyId,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        let data = response.data;
                        $('#view_party_name').val(data.party_name);
                        $('#view_party_code').val(data.party_code || '-');
                        $('#view_party_type').val(data.party_type);
                        $('#view_state_name').val(data.state_name || '-');
                        $('#view_founded_year').val(data.founded_year || '-');
                        $('#view_leader').val(data.leader || '-');
                        $('#view_total_mlas').val(data.total_mlas || 0);
                        $('#view_status').val(data.status);

                        if (data.logo) {
                            const logoPath = "<?= base_url('uploads/parties/') ?>" + data.logo;
                            $('#view_party_logo_img').attr('src', logoPath).show();
                            $('#view_party_logo_icon').hide();
                        } else {
                            $('#view_party_logo_img').hide();
                            $('#view_party_logo_icon').show();
                        }
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Unable to fetch party details.');
                }
            });
        });

        // ============================================================
        // EDIT PARTY
        // ============================================================
        $(document).on('click', '.edit-btn', function() {
            let partyId = $(this).data('id');

            $.ajax({
                url: "<?= base_url('admin/party/get/') ?>" + partyId,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        let data = response.data;
                        $('#edit_party_id').val(data.id);
                        $('#edit_existing_logo').val(data.logo || '');
                        $('#edit_party_name').val(data.party_name);
                        $('#edit_party_code').val(data.party_code || '');
                        $('#edit_party_type').val(data.party_type);
                        $('#edit_state_id').val(data.state_id || '');
                        $('#edit_founded_year').val(data.founded_year || '');
                        $('#edit_leader').val(data.leader || '');
                        $('#edit_total_mlas').val(data.total_mlas || 0);
                        $('#edit_status').val(data.status);

                        if (data.logo) {
                            const logoPath = "<?= base_url('uploads/parties/') ?>" + data.logo;
                            $('#edit_logo_preview').attr('src', logoPath).show();
                            $('#edit_logo_placeholder').hide();
                        } else {
                            $('#edit_logo_preview').hide();
                            $('#edit_logo_placeholder').show();
                        }

                        $('#edit_party_logo').val('');
                        $('#edit_logo_error').hide();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Unable to fetch party details.');
                }
            });
        });

        // ============================================================
        // UPDATE PARTY
        // ============================================================
        $('#updatePartyBtn').on('click', function() {
            var formData = new FormData($('#editPartyForm')[0]);

            $.ajax({
                url: "<?= base_url('admin/party/update') ?>",
                type: "POST",
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        $('#editPartyModal').modal('hide');
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('Unable to update party.');
                }
            });
        });

        // ============================================================
        // DELETE PARTY
        // ============================================================
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let partyId = $(this).data('id');
            let partyName = $(this).data('name') || 'this party';

            $('#delete_party_id').val(partyId);
            $('#delete_party_name').text(partyName);
            $('#deletePartyModal').modal('show');
        });

        $('#confirmDeleteBtn').on('click', function() {
            let partyId = $('#delete_party_id').val();
            let form = $('#deletePartyForm');
            form.attr('action', "<?= base_url('admin/party/delete/') ?>" + partyId);
            form.submit();
        });
    });
    </script>
</body>

</html>