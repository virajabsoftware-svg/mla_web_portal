 (function() {
        // SIDEBAR COLLAPSE/EXPAND with gold premium state
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarCollapse');
        
        let isCollapsed = localStorage.getItem('whiteGoldExecutive') === 'true';
        if (isCollapsed) sidebar.classList.add('collapsed-sidebar');
        
        function toggleSidebarBehavior() {
            if (window.innerWidth <= 992) {
                sidebar.classList.toggle('show-mobile');
                document.body.classList.toggle('sidebar-mobile-open');
            } else {
                sidebar.classList.toggle('collapsed-sidebar');
                const newState = sidebar.classList.contains('collapsed-sidebar');
                localStorage.setItem('whiteGoldExecutive', newState);
            }
        }
        
        if (toggleBtn) {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                toggleSidebarBehavior();
            });
        }
        
        // close mobile on outside click
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 992 && sidebar.classList.contains('show-mobile') && 
                !sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('show-mobile');
                document.body.classList.remove('sidebar-mobile-open');
            }
        });
        
       // LIVE CLOCK + DATE
function updateExecutiveClock() {
    const now = new Date();

    let hours = now.getHours();
    const ampm = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12;
    hours = hours ? hours : 12; // 0 असेल तर 12 दाखवेल

    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');

    const clockElem = document.getElementById('liveClock');
    if (clockElem) {
        clockElem.innerText = `${hours.toString().padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;
    }

    const options = {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    };

    const dateElem = document.getElementById('liveDate');
    if (dateElem) {
        dateElem.innerText = now.toLocaleDateString('en-US', options);
    }
}

updateExecutiveClock();
setInterval(updateExecutiveClock, 1000);
        
        // Scroll shadow effect on topbar
        const topbarEl = document.getElementById('premiumTopbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 15) topbarEl.classList.add('scrolled');
            else topbarEl.classList.remove('scrolled');
        });
        
        // Preserve active menu highlighting based on current route
        const currentPath = window.location.pathname.split('/').pop() || 'dashboard.html';
        const allNavLinks = document.querySelectorAll('#sidebar ul li a[href]');
        allNavLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href && (href === currentPath || (currentPath === '' && href === 'dashboard.html'))) {
                const parentLi = link.closest('li');
                if (parentLi) parentLi.classList.add('active');
            }
        });
        
        // Non-intrusive search placeholder
        const searchField = document.getElementById('globalSearch');
        if (searchField) {
            searchField.addEventListener('input', (e) => {
                // Search functionality preserved - no modifications to existing logic
                console.log('Search query:', e.target.value);
            });
        }
    })();
    // =====================================
// ACTIVE MENU HIGHLIGHT
// =====================================
function setActiveMenu() {

    const currentPage = window.location.pathname
        .split("/")
        .pop()
        .split("?")[0]
        .split("#")[0];

    const navLinks = document.querySelectorAll("#sidebar a[href]");

    // Remove old active classes
    document.querySelectorAll("#sidebar li.active").forEach(li => {
        li.classList.remove("active");
    });

    navLinks.forEach(link => {

        const href = link.getAttribute("href");

        if (!href ||
            href === "#" ||
            href.startsWith("javascript:")) {
            return;
        }

        const linkPage = href
            .split("/")
            .pop()
            .split("?")[0]
            .split("#")[0];

        if (linkPage === currentPage) {

            const parentLi = link.closest("li");

            if (parentLi) {
                parentLi.classList.add("active");
            }

            // Bootstrap collapse submenu support
            const parentCollapse = link.closest(".collapse");

            if (parentCollapse) {

                parentCollapse.classList.add("show");

                const trigger = document.querySelector(
                    `[href="#${parentCollapse.id}"]`
                );

                if (trigger) {
                    const triggerLi = trigger.closest("li");

                    if (triggerLi) {
                        triggerLi.classList.add("active");
                    }
                }
            }
        }
    });

    // Default Dashboard Active
    if (!document.querySelector("#sidebar li.active")) {

        const dashboardLink =
            document.querySelector(
                '#sidebar a[href="dashboard.html"]'
            );

        if (dashboardLink) {
            dashboardLink.closest("li").classList.add("active");
        }
    }
}

setActiveMenu();