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
<!-- ============================================================ -->
<!-- GLOBAL SEARCH - DEBUG VERSION -->
<!-- ============================================================ -->
<script>
$(document).ready(function() {
    console.log('=== SEARCH SCRIPT STARTED ===');
    
    var searchInput = document.getElementById('globalSearch');
    if (!searchInput) {
        console.error('Search input not found!');
        return;
    }

    // Check if admin page
    var isAdminPage = window.location.pathname.indexOf('/admin/') !== -1;
    console.log('Is admin page:', isAdminPage);
    
    if (!isAdminPage) {
        console.log('Not admin page - disabling search');
        searchInput.placeholder = 'Search...';
        searchInput.disabled = true;
        searchInput.style.opacity = '0.6';
        searchInput.style.cursor = 'not-allowed';
        return;
    }

    console.log('Admin page detected - enabling search');

    // Build dropdown
    var searchContainer = $(searchInput).closest('.search-gold-exec');
    if (searchContainer.length === 0) {
        console.error('Search container not found!');
        return;
    }

    searchContainer.css('position', 'relative');
    $('#globalSearchDropdown').remove();

    var dropdown = $('<div>', {
        id: 'globalSearchDropdown',
        css: {
            display: 'none',
            position: 'absolute',
            top: '100%',
            left: '0',
            width: '100%',
            maxWidth: '600px',
            maxHeight: '400px',
            overflowY: 'auto',
            background: '#ffffff',
            border: '1px solid #d1d5db',
            borderRadius: '8px',
            boxShadow: '0 10px 40px rgba(0,0,0,0.15)',
            zIndex: '99999',
            marginTop: '8px',
            padding: '8px 0'
        }
    });
    
    searchContainer.append(dropdown);
    console.log('Dropdown created');

    var searchTimeout = null;
    var currentQuery = '';

    function renderLoading() {
        dropdown.html(`
            <div style="padding: 20px; text-align: center; color: #6b7280;">
                <i class="fa fa-spinner fa-spin" style="font-size: 20px; margin-right: 10px;"></i>
                Searching...
            </div>
        `);
        dropdown.show();
    }

    function renderNoResults(query) {
        dropdown.html(`
            <div style="padding: 20px; text-align: center; color: #6b7280;">
                <i class="fa fa-search" style="font-size: 24px; display: block; margin-bottom: 10px; color: #d1d5db;"></i>
                No results found for "<strong>${escapeHtml(query)}</strong>"
            </div>
        `);
        dropdown.show();
    }

    function renderError(message) {
        dropdown.html(`
            <div style="padding: 20px; text-align: center; color: #dc2626;">
                <i class="fa fa-exclamation-circle" style="font-size: 24px; display: block; margin-bottom: 10px;"></i>
                ${escapeHtml(message)}
            </div>
        `);
        dropdown.show();
    }

    function renderResults(results) {
        if (results.length === 0) {
            renderNoResults(currentQuery);
            return;
        }

        var html = `
            <div style="padding: 8px 16px; font-size: 11px; color: #6b7280; border-bottom: 1px solid #f0f0f0; font-weight: 600;">
                Results (${results.length})
            </div>
        `;

        results.forEach(function(result) {
            var icon = result.icon || 'fa-link';
            html += `
                <div class="search-result-item" data-url="${escapeHtml(result.url)}" 
                     style="padding: 10px 16px; cursor: pointer; border-bottom: 1px solid #f5f5f5; display: flex; align-items: center;">
                    <i class="fa ${icon}" style="color: #4f46e5; width: 24px; margin-right: 12px;"></i>
                    <div style="flex: 1;">
                        <div style="font-weight: 500; color: #1f2937; font-size: 14px;">${escapeHtml(result.title)}</div>
                        ${result.description ? `<div style="color: #6b7280; font-size: 12px; margin-top: 2px;">${escapeHtml(result.description)}</div>` : ''}
                        ${result.module ? `<div style="color: #9ca3af; font-size: 10px; margin-top: 2px;">${escapeHtml(result.module)}</div>` : ''}
                    </div>
                </div>
            `;
        });

        dropdown.html(html);
        dropdown.show();

        // Click handler
        $('.search-result-item').off('click').on('click', function() {
            var url = $(this).data('url');
            if (url) {
                window.location.href = url;
            }
        });
    }

    function escapeHtml(text) {
        if (!text) return '';
        var div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function performSearch(query) {
        currentQuery = query.trim();
        
        if (currentQuery.length < 2) {
            dropdown.hide();
            return;
        }

        renderLoading();

        // Use the correct base URL
        var searchUrl = '<?= base_url('admin/search') ?>';
        var url = searchUrl + '?q=' + encodeURIComponent(currentQuery);
        
        console.log('Search URL:', url);
        
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(data) {
                console.log('Search response:', data);
                if (data.status && data.results) {
                    renderResults(data.results);
                } else if (data.message) {
                    renderError(data.message);
                } else {
                    renderNoResults(currentQuery);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error - Status:', status);
                console.error('AJAX Error - Error:', error);
                console.error('AJAX Error - Response:', xhr.responseText);
                console.error('AJAX Error - Status Code:', xhr.status);
                
                var errorMsg = 'Unable to load search results.';
                if (xhr.status === 403) {
                    errorMsg = 'Unauthorized. Please login as admin.';
                } else if (xhr.status === 404) {
                    errorMsg = 'Search endpoint not found. Please check configuration.';
                } else if (xhr.status === 500) {
                    errorMsg = 'Server error. Please check logs.';
                }
                renderError(errorMsg + ' Please try again later.');
            }
        });
    }

    // Input handler
    $(searchInput).off('input').on('input', function() {
        var query = $(this).val();
        
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        if (query.trim() === '') {
            dropdown.hide();
            return;
        }

        searchTimeout = setTimeout(function() {
            performSearch(query);
        }, 400);
    });

    // Focus handler
    $(searchInput).off('focus').on('focus', function() {
        var val = $(this).val();
        if (val.trim().length >= 2) {
            performSearch(val);
        }
    });

    // Outside click
    $(document).off('click.search').on('click.search', function(e) {
        var searchContainer = $('.search-gold-exec');
        if (searchContainer.length > 0 && !searchContainer[0].contains(e.target)) {
            $('#globalSearchDropdown').hide();
        }
    });

    // Escape key
    $(searchInput).off('keydown').on('keydown', function(e) {
        if (e.key === 'Escape') {
            $('#globalSearchDropdown').hide();
            $(this).blur();
        }
    });

    console.log('=== SEARCH SCRIPT READY ===');
});
</script>