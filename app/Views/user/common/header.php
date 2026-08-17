<?php
/**
 * ============================================================
 * GovTrack Aura
 * Dynamic Header + Sidebar
 * CodeIgniter 4
 * ============================================================
 */

use App\Models\User\VoterModel;

// ============================================================
// SESSION
// ============================================================

$session = session();


// ============================================================
// LOGIN CHECK
// ============================================================

if (!$session->get('logged_in') || !$session->get('user_id')) {

    return redirect()
        ->to(base_url('user/login'));
}


// ============================================================
// GET LOGGED-IN USER ID
// ============================================================

$userId = $session->get('user_id');


// ============================================================
// GET VOTER FROM DATABASE
// ============================================================

$voterModel = new VoterModel();

$voter = $voterModel->find($userId);


// ============================================================
// USER NOT FOUND
// ============================================================

if (!$voter) {

    $session->destroy();

    return redirect()
        ->to(base_url('user/login'))
        ->with(
            'error',
            'User account not found. Please login again.'
        );
}


// ============================================================
// USER DATA
// ============================================================

$userName = $voter['full_name'] ?? 'User';

$userEmail = $voter['email'] ?? '';

$userDistrict = $voter['district'] ?? '';

$userConstituency = $voter['constituency'] ?? '';

$userMlaId = $voter['mla_id'] ?? '';

$userMlaName = $voter['mla_name'] ?? '';

$userMlaParty = $voter['mla_party'] ?? '';

$userStatus = $voter['status'] ?? '';

$userPhoto = $voter['profile_photo'] ?? '';


// ============================================================
// USER ROLE / STATUS
// ============================================================

$userRole = 'Voter';

switch (strtolower(trim($userStatus))) {

    case 'approved':

        $userRole = 'Verified Voter';

        break;


    case 'verified':

        $userRole = 'Verified Voter';

        break;


    case 'pending':

        $userRole = 'Verification Pending';

        break;


    case 'rejected':

        $userRole = 'Verification Rejected';

        break;


    default:

        $userRole = 'Voter';

        break;
}


// ============================================================
// PROFILE PHOTO
// ============================================================

if (!empty($userPhoto)) {

    /*
     * Database मध्ये जर फक्त filename असेल:
     *
     * profile_photo = abc.jpg
     *
     * तर:
     *
     * /uploads/profile/abc.jpg
     */

    $profilePhoto = base_url(
        'uploads/profile/' . $userPhoto
    );

} else {

    $profilePhoto = base_url(
        'assets/user/images/default-user.png'
    );
}


// ============================================================
// CURRENT URL / URI
// ============================================================

$currentSegments = service('uri')->getSegments();

$currentPath = implode(
    '/',
    $currentSegments
);


// ============================================================
// MENU ITEMS
// ============================================================

$menuItems = [

    'dashboard' => [

        'url' => base_url(
            'user/dashboard'
        ),

        'icon' => 'fas fa-chart-line',

        'label' => 'Dashboard',

        'segments' => [
            'dashboard'
        ]

    ],


    'my-profile' => [

        'url' => base_url(
            'user/my-profile'
        ),

        'icon' => 'fas fa-user-circle',

        'label' => 'My Profile',

        'segments' => [
            'my-profile',
            'profile'
        ]

    ],


    'assigned-mla' => [

        'url' => base_url(
            'user/assigned-mla'
        ),

        'icon' => 'fas fa-user-tie',

        'label' => 'Assigned MLA',

        'segments' => [
            'assigned-mla'
        ]

    ],


    'mla-works' => [

        'url' => base_url(
            'user/mla-works'
        ),

        'icon' => 'fas fa-hard-hat',

        'label' => 'Development Works',

        'segments' => [
            'mla-works',
            'works'
        ]

    ],


    'feedback' => [

        'url' => base_url(
            'user/feedback'
        ),

        'icon' => 'fas fa-comment-dots',

        'label' => 'Feedback',

        'segments' => [
            'feedback'
        ]

    ],


    'survey' => [

        'url' => base_url(
            'user/survey'
        ),

        'icon' => 'fas fa-poll',

        'label' => 'Surveys',

        'segments' => [
            'survey',
            'surveys'
        ]

    ],


    'complaint' => [

        'url' => base_url(
            'user/complaint'
        ),

        'icon' => 'fas fa-exclamation-triangle',

        'label' => 'Complaints',

        'segments' => [
            'complaint',
            'complaints'
        ]

    ],


    'mla-rating' => [

        'url' => base_url(
            'user/mla-rating'
        ),

        'icon' => 'fas fa-star-half-alt',

        'label' => 'MLA Rating',

        'segments' => [
            'mla-rating',
            'rating'
        ]

    ]

];


// ============================================================
// ACTIVE MENU FUNCTION
// ============================================================

if (!function_exists('isActiveMenuItem')) {

    function isActiveMenuItem(
        array $item,
        array $currentSegments,
        string $currentPath
    ): bool {

        // ------------------------------------------------------
        // Check URI segments
        // ------------------------------------------------------

        foreach ($item['segments'] as $segment) {

            if (
                in_array(
                    $segment,
                    $currentSegments,
                    true
                )
            ) {

                return true;
            }
        }


        // ------------------------------------------------------
        // Check exact path
        // ------------------------------------------------------

        $itemUrlPath = parse_url(
            $item['url'],
            PHP_URL_PATH
        );


        if ($itemUrlPath) {

            $itemUrlPath = trim(
                $itemUrlPath,
                '/'
            );

            $currentPath = trim(
                $currentPath,
                '/'
            );


            if (
                $itemUrlPath !== '' &&
                $itemUrlPath === $currentPath
            ) {

                return true;
            }
        }


        return false;
    }
}

?>


<!-- ============================================================
     ANIMATED BACKGROUND
============================================================ -->

<div class="animated-bg"></div>

<div
    class="particles-bg"
    id="particles">
</div>


<!-- ============================================================
     MOBILE SIDEBAR OVERLAY
============================================================ -->

<div
    class="sidebar-overlay"
    id="sidebarOverlay">
</div>


<!-- ============================================================
     PREMIUM SIDEBAR
============================================================ -->

<aside
    class="aura-sidebar"
    id="auraSidebar">


    <!-- ========================================================
         SIDEBAR HEADER
    ========================================================= -->

    <div class="sidebar-header">

        <div class="logo-wrapper">

            <div class="logo-icon">

                <i class="fas fa-landmark"></i>

            </div>


            <div class="logo-text">

                <h3>
                LEADER
                </h3>

                <p>
                    Tracker
                </p>

            </div>

        </div>

    </div>


    <!-- ========================================================
         DYNAMIC USER PROFILE
    ========================================================= -->

    <div class="sidebar-profile">

        <div class="profile-avatar">

            <img
                src="<?= esc($profilePhoto) ?>"
                alt="<?= esc($userName) ?>"
                onerror="
                    this.onerror=null;
                    this.src='<?= base_url('assets/user/images/default-user.png') ?>';
                ">

            <span
                class="online-dot">
            </span>

        </div>


        <h6>
            <?= esc($userName) ?>
        </h6>

  <span><i class="fas fa-check-circle"></i> Voter</span>
        <!-- <span>

            <?php if (
                strtolower(trim($userStatus)) === 'approved' ||
                strtolower(trim($userStatus)) === 'verified'
            ): ?>

                <i class="fas fa-check-circle"></i>

            <?php else: ?>

                <i class="fas fa-user"></i>

            <?php endif; ?>


            <?= esc($userRole) ?>

        </span> -->

    </div>


    <!-- ========================================================
         SIDEBAR NAVIGATION
    ========================================================= -->

    <div class="sidebar-nav">

        <div class="nav-section">


            <div class="nav-section-title">
                MAIN
            </div>


            <!-- ==================================================
                 DYNAMIC MENU
            ================================================== -->

            <?php foreach (
                $menuItems
                as $key => $item
            ): ?>


                <?php

                $activeClass =
                    isActiveMenuItem(
                        $item,
                        $currentSegments,
                        $currentPath
                    )
                    ? 'active'
                    : '';

                ?>


                <a
                    href="<?= esc($item['url']) ?>"
                    class="nav-link-premium <?= $activeClass ?>"
                >

                    <i
                        class="<?= esc($item['icon']) ?>">
                    </i>


                    <span>
                        <?= esc($item['label']) ?>
                    </span>

                </a>


            <?php endforeach; ?>


            <!-- ==================================================
                 LOGOUT
            ================================================== -->

            <a
                href="<?= base_url('user/logout') ?>"
                class="nav-link-premium"
            >

                <i class="fas fa-sign-out-alt"></i>

                <span>
                    Logout
                </span>

            </a>


        </div>

    </div>

</aside>


<!-- ============================================================
     PREMIUM TOP BAR
============================================================ -->

<header
    class="aura-topbar"
    id="auraTopbar">


    <!-- ========================================================
         TOPBAR LEFT
    ========================================================= -->

    <div class="topbar-left">


        <!-- Desktop Toggle -->

        <button
            type="button"
            class="sidebar-toggle-btn"
            id="sidebarToggleBtn"
            aria-label="Toggle Sidebar"
        >

            <i class="fas fa-bars"></i>

        </button>


        <!-- Mobile Toggle -->

        <button
            type="button"
            class="sidebar-toggle-mobile"
            id="sidebarToggleMobile"
            aria-label="Open Sidebar"
        >

            <i class="fas fa-bars"></i>

        </button>


    </div>


    <!-- ========================================================
         TOPBAR RIGHT
    ========================================================= -->

    <div class="topbar-right">


        <!-- ====================================================
             SEARCH
        ==================================================== -->

        <div class="search-wrapper">

            <i class="fas fa-search"></i>

            <input
                type="text"
                placeholder="Search governance data..."
                autocomplete="off"
            >

        </div>


        <!-- ====================================================
             NOTIFICATION
        ==================================================== -->

        <button
            type="button"
            class="notification-btn"
            onclick="
                window.location.href='<?= base_url('user/notification') ?>'
            "
            aria-label="Notifications"
        >

            <i class="fas fa-bell"></i>

            <span class="notification-badge">
                3
            </span>

        </button>


        <!-- ====================================================
             USER DROPDOWN
        ==================================================== -->

        <div class="user-dropdown-premium">


            <div class="user-info-dropdown">


                <div class="user-name">

                    <?= esc($userName) ?>

                </div>


                <!-- <div class="user-role">

                    <?= esc($userRole) ?>

                </div> -->
  <span><i class="fas fa-check-circle"></i> Voter</span>

            </div>


            <img
                src="<?= esc($profilePhoto) ?>"
                alt="<?= esc($userName) ?>"
                onerror="
                    this.onerror=null;
                    this.src='<?= base_url('assets/user/images/default-user.png') ?>';
                "
            >


        </div>


    </div>

</header>