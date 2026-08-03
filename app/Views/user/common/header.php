<!-- app/Views/common/header.php -->

<div class="animated-bg"></div>
<div class="particles-bg" id="particles"></div>

<!-- Sidebar Overlay for Mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- PREMIUM SIDEBAR -->
<aside class="aura-sidebar" id="auraSidebar">
    <div class="sidebar-header">
        <div class="logo-wrapper">
            <div class="logo-icon"><i class="fas fa-landmark"></i></div>
            <div class="logo-text">
                <h3>GovTrack</h3>
                <p>Aura Governance Suite</p>
            </div>
        </div>
    </div>
    <div class="sidebar-profile">
        <div class="profile-avatar"><img src="https://randomuser.me/api/portraits/men/32.jpg"><span
                class="online-dot"></span></div>
        <h6>Vedant Patil</h6><span><i class="fas fa-check-circle"></i> Verified Officer</span>
    </div>
    <div class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-title">MAIN</div>
            
            <?php
            // Define menu items with their URL segments for active detection
            $menuItems = [
                'dashboard' => [
                    'url' => base_url('user/dashboard'),
                    'icon' => 'fas fa-chart-line',
                    'label' => 'Dashboard',
                    'segments' => ['dashboard']
                ],
                'my-profile' => [
                    'url' => base_url('user/my-profile'),
                    'icon' => 'fas fa-user-circle',
                    'label' => 'My Profile',
                    'segments' => ['my-profile', 'profile']
                ],
                'assigned-mla' => [
                    'url' => base_url('user/assigned-mla'),
                    'icon' => 'fas fa-user-tie',
                    'label' => 'Assigned MLA',
                    'segments' => ['assigned-mla', 'mla']
                ],
                'mla-works' => [
                    'url' => base_url('user/mla-works'),
                    'icon' => 'fas fa-hard-hat',
                    'label' => 'Development Works',
                    'segments' => ['mla-works', 'works']
                ],
                'feedback' => [
                    'url' => base_url('user/feedback'),
                    'icon' => 'fas fa-comment-dots',
                    'label' => 'Feedback',
                    'segments' => ['feedback']
                ],
                'survey' => [
                    'url' => base_url('user/survey'),
                    'icon' => 'fas fa-poll',
                    'label' => 'Surveys',
                    'segments' => ['survey', 'surveys']
                ],
                'complaint' => [
                    'url' => base_url('user/complaint'),
                    'icon' => 'fas fa-exclamation-triangle',
                    'label' => 'Complaints',
                    'segments' => ['complaint', 'complaints']
                ],
                'mla-rating' => [
                    'url' => base_url('user/mla-rating'),
                    'icon' => 'fas fa-star-half-alt',
                    'label' => 'MLA Rating',
                    'segments' => ['mla-rating', 'rating']
                ]
            ];

            // Get current URI segments
            $currentSegments = service('uri')->getSegments();
            $currentPath = implode('/', $currentSegments);
            
            // Helper function to check if current page matches menu item
            function isActiveMenuItem($item, $currentSegments, $currentPath) {
                // Check if any segment matches
                foreach ($item['segments'] as $segment) {
                    if (in_array($segment, $currentSegments)) {
                        return true;
                    }
                }
                
                // Check if full URL matches (for exact matches)
                $itemUrlPath = parse_url($item['url'], PHP_URL_PATH);
                if ($itemUrlPath && strpos($currentPath, trim($itemUrlPath, '/')) !== false) {
                    return true;
                }
                
                return false;
            }
            ?>

            <?php foreach ($menuItems as $key => $item): ?>
                <a href="<?= $item['url'] ?>" 
                   class="nav-link-premium <?= isActiveMenuItem($item, $currentSegments, $currentPath) ? 'active' : '' ?>">
                    <i class="<?= $item['icon'] ?>"></i><span><?= $item['label'] ?></span>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
</aside>

<!-- PREMIUM TOP BAR -->
<header class="aura-topbar" id="auraTopbar">
    <div class="topbar-left">
        <button class="sidebar-toggle-btn" id="sidebarToggleBtn"><i class="fas fa-bars"></i></button>
        <button class="sidebar-toggle-mobile" id="sidebarToggleMobile"><i class="fas fa-bars"></i></button>
    </div>
    <div class="topbar-right">
        <div class="search-wrapper"><i class="fas fa-search"></i><input type="text"
                placeholder="Search governance data..."></div>
        <button class="notification-btn" onclick="window.location.href='<?= base_url('user/notification') ?>'">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </button>
        <div class="user-dropdown-premium">
            <div class="user-info-dropdown">
                <div class="user-name">Vedant Patil</div>
                <div class="user-role">Govt. Officer</div>
            </div><img src="https://randomuser.me/api/portraits/men/32.jpg">
        </div>
    </div>
</header>