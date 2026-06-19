<footer id="colophon" class="site-footer">
    <div class="container footer-grid grid grid-4">
        <!-- Footer Column 1: About/Statement & Socials -->
        <div class="footer-col">
            <div class="footer-logo" style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                <div class="footer-logo-card" style="background: white; padding: 0.4rem 0.8rem; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Mkarye Medical Technologies Logo" style="height: 32px; width: auto; object-fit: contain; max-width: 100%;">
                </div>
            </div>
            <p style="font-size: 0.825rem; line-height: 1.6; color: var(--color-text-light); margin-bottom: 1.5rem;">
                At Mkarye Medical Technologies we believe healthcare technology should be accessible, reliable and life changing. From hospitals and clinics to home care support and caregiver training we are dedicated to providing modern medical solutions that improve lives across Kenya and beyond. Whether you are searching for medical equipment, technical support, homecare assistance, or professional consultation, our team is ready to guide you with professionalism, compassion, and innovation. Your health, comfort, and confidence matter to us because at MMT, healthcare is more than equipment it is care with purposes.
            </p>
            <div class="footer-social-links">
                <a href="#facebook" class="footer-social-link" aria-label="Facebook">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                </a>
                <a href="#x-twitter" class="footer-social-link" aria-label="X-Twitter">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16h4.267l-11.733 -16z M4 20l6.768 -6.768 M20 4l-6.768 6.768"></path></svg>
                </a>
                <a href="#youtube" class="footer-social-link" aria-label="Youtube">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25a29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                </a>
                <a href="#instagram" class="footer-social-link" aria-label="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
            </div>
        </div>

        <!-- Footer Column 2: Useful Links -->
        <div class="footer-col">
            <h3>Useful Links</h3>
            <?php
            if ( has_nav_menu( 'footer' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'fallback_cb'    => false,
                ) );
            } else {
                ?>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#account">Account</a></li>
                </ul>
                <?php
            }
            ?>
        </div>

        <!-- Footer Column 3: Departments -->
        <div class="footer-col">
            <h3>Departments</h3>
            <ul>
                <li><a href="#dept-internship">Internship & Training Department</a></li>
                <li><a href="#dept-sales">Production & Sales Department</a></li>
                <li><a href="#dept-installation">Technology & Installation Department</a></li>
                <li><a href="#dept-consultation">Evaluation & Consultation Corner</a></li>
                <li><a href="#dept-children">Children’s Health & Safety Department</a></li>
            </ul>
        </div>

        <!-- Footer Column 4: Contact Info -->
        <div class="footer-col">
            <h3>Contact Info</h3>
            <ul class="contact-info-list">
                <li>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <span>Mnarani, Kilifi Kenya</span>
                </li>
                <li>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <a href="mailto:Info@mkaryemedicaltechnologies.co.ke">Info@mkaryemedicaltechnologies.co.ke</a>
                </li>
                <li>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.5 19.5 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <div>
                        <span style="font-size: 0.75rem; color: var(--color-text-light); display: block; margin-bottom: 0.25rem;">Talk To Our Support</span>
                        <a href="tel:+254795362750" style="display: block; font-weight: 600;">+254 795 362 750</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="container footer-bottom">
        <div class="footer-copy">
            <p>© Copyright 2025 by MkaryeMedicalTechnologies. All right reserved powered by LexPanda</p>
        </div>
        <div class="footer-bottom-links">
            <a href="#support">Support</a>
            <a href="#privacy">Privacy Policy</a>
            <a href="#terms">Term & Condition</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
