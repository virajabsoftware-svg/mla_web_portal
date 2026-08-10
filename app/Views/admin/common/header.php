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
                            <img class="img-responsive" src="https://img.magnific.com/premium-vector/accountant_757131-15630.jpg?semt=ais_test_b&w=740&q=80" alt="User" />
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
                    <?php
                    // Define admin menu items with URL segments for active detection
                    $adminMenuItems = [
                        'dashboard' => [
    'url' => base_url('admin/dashboard'),
    'icon' => 'fa fa-dashboard',
    'label' => 'Dashboard',
    'tooltip' => 'Dashboard',
    'segments' => ['dashboard']
],
 'constituency-management' => [
                            'url' => base_url('admin/constituency-management'),
                            'icon' => 'fa fa-map-marker',
                            'label' => 'Constituency Management',
                            'tooltip' => 'Constituency',
                            'segments' => ['constituency-management', 'constituency']
                        ],
                        'mla-management' => [
                            'url' => base_url('admin/mla-management'),
                            'icon' => 'fa fa-users',
                            'label' => 'MLA Management',
                            'tooltip' => 'MLA Management',
                            'segments' => ['mla-management', 'mla']
                        ],
                       
                        'complaint-management' => [
                            'url' => base_url('admin/complaint-management'),
                            'icon' => 'fa fa-exclamation-circle',
                            'label' => 'Complaint Management',
                            'tooltip' => 'Complaints',
                            'segments' => ['complaint-management', 'complaint']
                        ],
                        'survey-management' => [
                            'url' => base_url('admin/survey-management'),
                            'icon' => 'fa fa-bar-chart',
                            'label' => 'Survey Management',
                            'tooltip' => 'Surveys',
                            'segments' => ['survey-management', 'survey']
                        ],
                        // 'media-library' => [
                        //     'url' => base_url('admin/media-library'),
                        //     'icon' => 'fa fa-picture-o',
                        //     'label' => 'Media Library',
                        //     'tooltip' => 'Media',
                        //     'segments' => ['media-library', 'media']
                        // ],
                        'feedback-dashboard' => [
                            'url' => base_url('admin/feedback-dashboard'),
                            'icon' => 'fa fa-comments',
                            'label' => 'Feedback Dashboard',
                            'tooltip' => 'Feedback',
                            'segments' => ['feedback-dashboard', 'feedback']
                        ],
                        // 'activity-logs' => [
                        //     'url' => base_url('admin/activity-logs'),
                        //     'icon' => 'fa fa-history',
                        //     'label' => 'Activity Logs',
                        //     'tooltip' => 'Logs',
                        //     'segments' => ['activity-logs', 'logs']
                        // ],
                        'voter-management' => [
                            'url' => base_url('admin/voter-management'),
                            'icon' => 'fa fa-user',
                            'label' => 'Voter Management',
                            'tooltip' => 'Voters',
                            'segments' => ['voter-management', 'voter']
                        ],
                        'rating-question' => [
    'url' => base_url('admin/ratingquestion'),
    'icon' => 'fa fa-star',
    'label' => 'Rating Questions',
    'tooltip' => 'Rating Questions',
    'segments' => ['rating-question', 'ratingquestion']
]

                        
                    ];

                    // Get current URI segments
                    $currentSegments = service('uri')->getSegments();
                    $currentPath = implode('/', $currentSegments);
                    
                    // Helper function to check if current page matches menu item
                    function isActiveMenuItem($item, $currentSegments, $currentPath) {
                        // Check if any configured segment matches
                        foreach ($item['segments'] as $segment) {
                            if (in_array($segment, $currentSegments)) {
                                return true;
                            }
                        }
                        
                        // Check if full URL path matches
                        $itemUrlPath = parse_url($item['url'], PHP_URL_PATH);
                        if ($itemUrlPath && strpos($currentPath, trim($itemUrlPath, '/')) !== false) {
                            return true;
                        }
                        
                        return false;
                    }
                    ?>

                    <?php foreach ($adminMenuItems as $key => $item): ?>
                        <li class="<?= isActiveMenuItem($item, $currentSegments, $currentPath) ? 'active' : '' ?>">
                            <a href="<?= $item['url'] ?>" data-tooltip="<?= $item['tooltip'] ?>">
                                <i class="<?= $item['icon'] ?>"></i>
                                <span><?= $item['label'] ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
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
                            <a href="index.html"><img class="img-responsive" src="https://img.magnific.com/premium-vector/accountant_757131-15630.jpg?semt=ais_test_b&w=740&q=80" alt="#"
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
                                    <li><a href="<?=base_url('notification-center') ?>" class="notif-gold-luxury"><i
                                                class="fa fa-bell-o"></i><span
                                                class="notif-badge-premium">2</span></a></li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                class="img-responsive rounded-circle"
                                                src="https://img.magnific.com/premium-vector/accountant_757131-15630.jpg?semt=ais_test_b&w=740&q=80" alt="#" width="38" /><span
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
            <script>
document.addEventListener("DOMContentLoaded", function () {

    function updateClock() {
        const now = new Date();

        // Time
        const time = now.toLocaleTimeString('en-IN', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        });

        // Date
        const date = now.toLocaleDateString('en-IN', {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });

        const clockElement = document.getElementById("liveClock");
        const dateElement = document.getElementById("liveDate");

        if (clockElement) {
            clockElement.innerHTML = time;
        }

        if (dateElement) {
            dateElement.innerHTML = date;
        }
    }

    updateClock();
    setInterval(updateClock, 1000);

});
</script>