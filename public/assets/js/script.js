document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.sidebar-menu-item');
    const submenus = document.querySelectorAll('.submenu');
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menu-toggle');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const mainContentWrapper = document.getElementById('main-content-wrapper');
    const body = document.body;

    function toggleSubmenu(button) {
        const submenu = button.nextElementSibling;
        if (submenu && submenu.classList.contains('submenu')) {
            submenu.classList.toggle('hidden');
            button.classList.toggle('active'); // Apply active class to the parent menu item for arrow rotation
        }
    }

    function setActiveLink(clickedLink) {
        // Remove active from all main menu items
        menuItems.forEach(item => {
            item.classList.remove('active', 'bg-primary-purple', 'text-white');
            item.querySelectorAll('svg').forEach(svg => {
                svg.classList.remove('text-white');
                svg.classList.add('text-gray-500');
            });
            if (item.tagName === 'BUTTON') { // Ensure arrow resets for collapsed menus
                item.querySelector('.menu-arrow').classList.remove('rotate-90');
            }
        });

        // Remove active from all submenu items
        document.querySelectorAll('.submenu-item').forEach(item => {
            item.classList.remove('active');
        });

        // If a sub-menu item was clicked
        if (clickedLink.classList.contains('submenu-item')) {
            clickedLink.classList.add('active');
            // Find the parent menu item and activate it
            let parentButton = clickedLink.closest('.relative').querySelector('.sidebar-menu-item');
            if (parentButton) {
                parentButton.classList.add('active', 'bg-primary-purple', 'text-white');
                parentButton.querySelectorAll('svg').forEach(svg => {
                    svg.classList.add('text-white');
                    svg.classList.remove('text-gray-500');
                });
                parentButton.querySelector('.menu-arrow').classList.add('rotate-90'); // Ensure arrow rotates for active parent
                parentButton.nextElementSibling.classList.remove('hidden'); // Ensure submenu is open
            }
        } else { // If a main menu item was clicked (non-submenu parent or direct link)
            clickedLink.classList.add('active', 'bg-primary-purple', 'text-white');
            clickedLink.querySelectorAll('svg').forEach(svg => {
                svg.classList.add('text-white');
                svg.classList.remove('text-gray-500');
            });
        }
        // Close sidebar on mobile after clicking a link
        if (window.innerWidth < 768) { // md breakpoint
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        }
    }

    // Event Listeners for menu items
    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            if (this.tagName === 'BUTTON') {
                toggleSubmenu(this);
            }
            setActiveLink(this);
        });
    });

    submenus.forEach(submenu => {
        submenu.querySelectorAll('.submenu-item').forEach(subItem => {
            subItem.addEventListener('click', function (e) {
                e.preventDefault();
                setActiveLink(this);
            });
        });
    });

    // Set initial active state (e.g., Dashboard)
    const initialActiveLink = document.querySelector('.sidebar-menu-item[data-menu="dashboard"]');
    if (initialActiveLink) {
        setActiveLink(initialActiveLink);
    }

    // Toggle sidebar visibility and main content width
    menuToggle.addEventListener('click', () => {
        const isSidebarHidden = sidebar.classList.contains('-translate-x-full');

        if (isSidebarHidden) {
            // Show sidebar
            sidebar.classList.remove('-translate-x-full');
            mainContentWrapper.classList.add('md:ml-64'); // Re-add margin for desktop
            body.classList.remove('sidebar-hidden'); // Remove full width class
            if (window.innerWidth < 768) { // For mobile overlay
                sidebarOverlay.classList.remove('hidden');
            }
        } else {
            // Hide sidebar
            sidebar.classList.add('-translate-x-full');
            mainContentWrapper.classList.remove('md:ml-64'); // Remove margin for desktop
            body.classList.add('sidebar-hidden'); // Add full width class
            if (window.innerWidth < 768) { // For mobile overlay
                sidebarOverlay.classList.add('hidden');
            }
        }
    });


    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        mainContentWrapper.classList.remove('md:ml-64');
        body.classList.add('sidebar-hidden');
    });

    // Adjust sidebar visibility and main content width on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) { // md breakpoint
            // On desktop, ensure sidebar is visible and content takes margin
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            mainContentWrapper.classList.add('md:ml-64');
            body.classList.remove('sidebar-hidden');
        } else {
            // On mobile, hide sidebar by default
            sidebar.classList.add('-translate-x-full');
            // Overlay should only be shown when sidebar is explicitly opened on mobile
            sidebarOverlay.classList.add('hidden');
            mainContentWrapper.classList.remove('md:ml-64');
            body.classList.remove('sidebar-hidden'); // Ensure no lingering sidebar-hidden class from desktop
        }
    });

    // Initial check on load for desktop view
    if (window.innerWidth >= 768) {
        sidebar.classList.remove('-translate-x-full');
        mainContentWrapper.classList.add('md:ml-64');
    } else {
        sidebar.classList.add('-translate-x-full');
        mainContentWrapper.classList.remove('md:ml-64');
        body.classList.remove('sidebar-hidden');
    }




    // Modall
    document.addEventListener('DOMContentLoaded', function () {
        const dateElement = document.getElementById('currentDate');
        const options = {
            weekday: 'long',
            day: 'numeric',
            month: 'long'
        };
        const today = new Date();
        dateElement.textContent = today.toLocaleDateString('en-US', options);
    });
    // Modal functionality
    $(document).on('click', '[data-modal-target]', function () {
        const target = $(this).data('modal-target');
        const $modal = $('#' + target);
        const $content = $modal.find('.modal-content');

        // ✅ Tutup semua dropdown menu floating
        $('.custom-floating-dropdown').remove();

        // ✅ Tampilkan modal dengan animasi
        $modal.removeClass('hidden').addClass('flex');
        setTimeout(() => {
            $content.removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
        }, 10);
    });


    $(document).on('click', '[data-modal-close]', function () {
        const target = $(this).data('modal-close');
        const $modal = $('#' + target);
        const $content = $modal.find('.modal-content');

        $content.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');
        setTimeout(() => {
            $modal.removeClass('flex').addClass('hidden');
        }, 300); // Durasi sesuai class `duration-300`
    });

    $(document).on('click', '.modal-background', function (e) {
        if (e.target === this) {
            const $modal = $(this);
            const $content = $modal.find('.modal-content');

            $content.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');
            setTimeout(() => {
                $modal.removeClass('flex').addClass('hidden');
            }, 300);
        }
    });

});
