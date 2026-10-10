// =====================================================
// TOP BAR & SIDEBAR JAVASCRIPT - NAVIGATION ENABLED
// =====================================================

(function() {
    const body = document.body;
    const sidebar = document.getElementById('auraSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const isMobile = () => window.innerWidth <= 991;

    // DESKTOP: Collapse/Expand Sidebar (Toggle Button)
    const desktopToggle = document.getElementById('sidebarToggleBtn');
    if (desktopToggle) {
        desktopToggle.addEventListener('click', () => {
            if (!isMobile()) {
                body.classList.toggle('sidebar-collapsed');
            }
        });
    }

    // MOBILE: Open/Close Sidebar (Mobile Toggle Button)
    const mobileToggle = document.getElementById('sidebarToggleMobile');
    if (mobileToggle) {
        mobileToggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            body.classList.toggle('sidebar-mobile-open');
        });
    }

    // Close mobile sidebar when clicking overlay
    if (overlay) {
        overlay.addEventListener('click', () => {
            body.classList.remove('sidebar-mobile-open');
        });
    }

    // Close mobile sidebar when clicking on a nav link
    const navLinks = document.querySelectorAll('.nav-link-premium');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (isMobile()) {
                body.classList.remove('sidebar-mobile-open');
            }
            // REMOVED preventDefault() - Allow navigation to work
            // Also add active class to current link
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (!isMobile()) {
            body.classList.remove('sidebar-mobile-open');
        }
    });

    // Notification Bell Functionality
    document.getElementById('notificationBtn')?.addEventListener('click', () => {
        alert('🔔 3 New notifications from Election Commission');
    });

})();