/**
 * Navigation JS
 *
 * Handles toggling the mobile menu and submenu displays.
 */
document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.querySelector('.nav-toggle');
    var overlay = document.querySelector('.mobile-nav-overlay');
    var links = document.querySelectorAll('.mobile-nav-overlay a');
    
    if (toggle && overlay) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('nav-active');
            
            // Toggle aria-expanded
            var expanded = toggle.getAttribute('aria-expanded') === 'true' || false;
            toggle.setAttribute('aria-expanded', !expanded);
        });
        
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                // If the link is the services submenu parent, toggle the menu rather than closing the navigation
                if (link.classList.contains('mobile-menu-parent')) {
                    e.preventDefault();
                    e.stopPropagation();
                    link.classList.toggle('active');
                    
                    var subMenu = link.nextElementSibling;
                    if (subMenu && subMenu.classList.contains('mobile-sub-menu')) {
                        subMenu.classList.toggle('sub-menu-open');
                    }
                } else {
                    // For standard links, close the mobile nav overlay
                    document.body.classList.remove('nav-active');
                    toggle.setAttribute('aria-expanded', 'false');
                    
                    // Reset mobile sub-menu states for next launch
                    var activeParent = document.querySelector('.mobile-menu-parent');
                    if (activeParent) {
                        activeParent.classList.remove('active');
                    }
                    var openSub = document.querySelector('.mobile-sub-menu.sub-menu-open');
                    if (openSub) {
                        openSub.classList.remove('sub-menu-open');
                    }
                }
            });
        });
    }
});
