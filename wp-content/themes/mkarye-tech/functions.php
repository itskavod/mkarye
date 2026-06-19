<?php
/**
 * Mkarye Medical Technologies functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

if ( ! function_exists( 'mkarye_tech_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function mkarye_tech_setup() {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'mkarye-tech', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'mkarye-tech' ),
            'footer'  => esc_html__( 'Footer Menu', 'mkarye-tech' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, comment-list, gallery, caption, and widgets
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Add theme support for Custom Logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        // Enable support for block editor styles (so backend matches frontend)
        add_theme_support( 'editor-styles' );

        // Add support for wide and full-width block alignments
        add_theme_support( 'align-wide' );

        // Load frontend stylesheet and Google fonts inside the Gutenberg editor
        add_editor_style( 'style.css' );
        add_editor_style( 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap' );

        // Add WooCommerce support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
endif;
add_action( 'after_setup_theme', 'mkarye_tech_setup' );

/**
 * Enqueue scripts and styles.
 */
function mkarye_tech_scripts() {
    // Enqueue Google Fonts (Outfit & Inter)
    wp_enqueue_style( 'mkarye-tech-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap', array(), null );

    // Enqueue theme stylesheet with cache busting for development/updates
    wp_enqueue_style( 'mkarye-tech-style', get_stylesheet_uri(), array( 'mkarye-tech-fonts' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

    // Enqueue navigation script (footer-loaded) with cache busting
    wp_enqueue_script( 'mkarye-tech-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), filemtime( get_template_directory() . '/assets/js/navigation.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'mkarye_tech_scripts' );

/**
 * Register [newsletter_form] shortcode to safely render form inputs.
 */
function mkarye_newsletter_form_shortcode() {
    ob_start();
    ?>
    <form class="newsletter-form" action="#newsletter" method="POST">
        <input type="email" placeholder="Enter your email address" required aria-label="Email Address">
        <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'newsletter_form', 'mkarye_newsletter_form_shortcode' );

/**
 * Register global color settings and controls for the WordPress Customizer.
 */
function mkarye_tech_customize_register( $wp_customize ) {
    // Add Global Colors Section
    $wp_customize->add_section( 'mkarye_tech_colors', array(
        'title'       => esc_html__( 'Global Colors', 'mkarye-tech' ),
        'priority'    => 30,
        'description' => esc_html__( 'Modify the theme color system. Changes will apply globally across all components.', 'mkarye-tech' ),
    ) );

    // Helper array to loop and define color settings/controls
    $colors = array(
        'color_primary' => array(
            'label'   => esc_html__( 'Primary Color', 'mkarye-tech' ),
            'default' => '#163be7',
        ),
        'color_primary_hover' => array(
            'label'   => esc_html__( 'Primary Hover Color', 'mkarye-tech' ),
            'default' => '#0f29ad',
        ),
        'color_secondary' => array(
            'label'   => esc_html__( 'Secondary/Dark Color', 'mkarye-tech' ),
            'default' => '#000000',
        ),
        'color_bg_base' => array(
            'label'   => esc_html__( 'Base Background Color', 'mkarye-tech' ),
            'default' => '#ffffff',
        ),
        'color_bg_accent' => array(
            'label'   => esc_html__( 'Accent Background Color', 'mkarye-tech' ),
            'default' => '#f5f5f5',
        ),
        'color_text_main' => array(
            'label'   => esc_html__( 'Main Text Color', 'mkarye-tech' ),
            'default' => '#171717',
        ),
        'color_text_muted' => array(
            'label'   => esc_html__( 'Muted Text Color', 'mkarye-tech' ),
            'default' => '#525252',
        ),
    );

    foreach ( $colors as $id => $color ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
            'label'    => $color['label'],
            'section'  => 'mkarye_tech_colors',
            'settings' => $id,
        ) ) );
    }
}
add_action( 'customize_register', 'mkarye_tech_customize_register' );

/**
 * Output dynamic CSS variables inside wp_head based on Customizer choices.
 */
function mkarye_tech_customize_css() {
    $primary       = get_theme_mod( 'color_primary', '#163be7' );
    $primary_hover = get_theme_mod( 'color_primary_hover', '#0f29ad' );
    $secondary     = get_theme_mod( 'color_secondary', '#000000' );
    $bg_base       = get_theme_mod( 'color_bg_base', '#ffffff' );
    $bg_accent     = get_theme_mod( 'color_bg_accent', '#f5f5f5' );
    $text_main     = get_theme_mod( 'color_text_main', '#171717' );
    $text_muted    = get_theme_mod( 'color_text_muted', '#525252' );

    // Convert hex to rgb helper for opacity-dependent vars
    $primary_rgb = '22, 59, 231';
    if ( preg_match( '/^#?([a-f0-9]{3}|[a-f0-9]{6})$/i', $primary ) ) {
        $hex = str_replace( '#', '', $primary );
        if ( strlen( $hex ) == 3 ) {
            $r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
            $g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
            $b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex, 0, 2 ) );
            $g = hexdec( substr( $hex, 2, 2 ) );
            $b = hexdec( substr( $hex, 4, 2 ) );
        }
        $primary_rgb = "$r, $g, $b";
    }
    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_html( $primary ); ?>;
            --color-primary-hover: <?php echo esc_html( $primary_hover ); ?>;
            --color-primary-light: rgba(<?php echo $primary_rgb; ?>, 0.05);
            --color-primary-glow: rgba(<?php echo $primary_rgb; ?>, 0.15);
            
            --color-secondary: <?php echo esc_html( $secondary ); ?>;
            --color-secondary-light: <?php echo esc_html( $secondary ); ?>;
            
            --color-text-main: <?php echo esc_html( $text_main ); ?>;
            --color-text-dark: <?php echo esc_html( $secondary ); ?>;
            --color-text-muted: <?php echo esc_html( $text_muted ); ?>;
            
            --color-bg-base: <?php echo esc_html( $bg_base ); ?>;
            --color-bg-card: <?php echo esc_html( $bg_base ); ?>;
            --color-bg-accent: <?php echo esc_html( $bg_accent ); ?>;
            
            /* Dynamic box shadow glow using primary customizer color */
            --shadow-glow: 0 0 25px 0 rgba(<?php echo $primary_rgb; ?>, 0.2);
        }
    </style>
    <?php
}
add_action( 'wp_head', 'mkarye_tech_customize_css' );


/**
 * Force WooCommerce to use our page-shop.php template for the products page
 */
function mkarye_force_shop_template( $template ) {
    if ( ( function_exists( 'is_shop' ) && is_shop() ) || is_page( 'shop' ) ) {
        $new_template = locate_template( array( 'page-shop.php' ) );
        if ( ! empty( $new_template ) ) {
            return $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'mkarye_force_shop_template', 99 );


/**
 * Register [mmt_booking_form] shortcode
 */
function mmt_booking_form_shortcode() {
    ob_start();
    ?>
    <form id="services-booking-form" class="appointment-form" action="#booking" method="POST" novalidate>
        <div class="form-group">
            <label for="booking-name">Full Name *</label>
            <input type="text" id="booking-name" name="booking-name" placeholder="Enter your full name" required aria-errormessage="name-error">
            <div id="name-error" class="error-msg" aria-live="polite">
                <span aria-hidden="true">❌</span> This field is required.
            </div>
        </div>
        
        <div class="form-grid-2">
            <div class="form-group">
                <label for="booking-phone">Phone *</label>
                <input type="tel" id="booking-phone" name="booking-phone" placeholder="Enter your phone number" required aria-errormessage="phone-error">
                <div id="phone-error" class="error-msg" aria-live="polite">
                    <span aria-hidden="true">❌</span> This field is required.
                </div>
            </div>
            <div class="form-group">
                <label for="booking-email">Email Address *</label>
                <input type="email" id="booking-email" name="booking-email" placeholder="Enter your email" required aria-errormessage="email-error">
                <div id="email-error" class="error-msg" aria-live="polite">
                    <span aria-hidden="true">❌</span> Please enter a valid email address.
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="booking-service">Service Required *</label>
            <select id="booking-service" name="booking-service" required aria-errormessage="service-error">
                <option value="" disabled selected>Select a Service</option>
                <option value="equipment-supply">Medical Equipment Supply</option>
                <option value="installation-maintenance">Installation & Maintenance</option>
                <option value="homecare">Homecare Solutions</option>
                <option value="consultation">Consultation Booking</option>
                <option value="collaboration">Community Collaborations</option>
                <option value="careers">Careers & Internships</option>
            </select>
            <div id="service-error" class="error-msg" aria-live="polite">
                <span aria-hidden="true">❌</span> Please select a service.
            </div>
        </div>

        <div class="form-group">
            <label for="booking-message">Your Message *</label>
            <textarea id="booking-message" name="booking-message" rows="4" placeholder="Describe your requirement (e.g. equipment specifications, timeline, location)..." required aria-errormessage="message-error"></textarea>
            <div id="message-error" class="error-msg" aria-live="polite">
                <span aria-hidden="true">❌</span> Please enter your message.
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-full">Submit Appointment Request</button>
    </form>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('services-booking-form');
        if (!form) return;

        const syncAriaInvalid = (input) => {
            const isValid = input.checkValidity();
            if (!isValid) {
                input.setAttribute('aria-invalid', 'true');
            } else {
                input.removeAttribute('aria-invalid');
            }
        };

        form.addEventListener('blur', (e) => {
            if (e.target.matches('input, select, textarea') && e.target.hasAttribute('required')) {
                syncAriaInvalid(e.target);
            }
        }, true);

        form.addEventListener('input', (e) => {
            if (e.target.matches('input, select, textarea') && e.target.hasAttribute('required')) {
                if (e.target.checkValidity()) {
                    e.target.removeAttribute('aria-invalid');
                    e.target.classList.remove('touched-invalid');
                }
            }
        });

        form.addEventListener('submit', (e) => {
            const inputs = form.querySelectorAll('input, select, textarea');
            let allValid = true;

            inputs.forEach(input => {
                if (input.hasAttribute('required')) {
                    syncAriaInvalid(input);
                    if (!input.checkValidity()) {
                        allValid = false;
                        input.classList.add('touched-invalid');
                    }
                }
            });

            if (!allValid) {
                e.preventDefault();
                const firstInvalid = form.querySelector('[aria-invalid="true"]');
                if (firstInvalid) firstInvalid.focus();
            } else {
                e.preventDefault();
                alert('Thank you for your appointment request! Our team will get back to you shortly.');
                form.reset();
                inputs.forEach(i => {
                    i.removeAttribute('aria-invalid');
                    i.classList.remove('touched-invalid');
                });
            }
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'mmt_booking_form', 'mmt_booking_form_shortcode' );

/**
 * Register [mmt_contact_form] shortcode
 */
function mmt_contact_form_shortcode() {
    ob_start();
    ?>
    <form id="contact-us-form" class="appointment-form" action="#contact-submit" method="POST" novalidate>
        <div class="form-grid-2">
            <div class="form-group">
                <label for="contact-name">Full Name *</label>
                <input type="text" id="contact-name" name="contact-name" placeholder="Enter your full name" required aria-errormessage="name-error">
                <div id="name-error" class="error-msg" aria-live="polite">
                    <span aria-hidden="true">❌</span> This field is required.
                </div>
            </div>
            <div class="form-group">
                <label for="contact-phone">Phone Number *</label>
                <input type="tel" id="contact-phone" name="contact-phone" placeholder="Enter your phone number" required aria-errormessage="phone-error">
                <div id="phone-error" class="error-msg" aria-live="polite">
                    <span aria-hidden="true">❌</span> This field is required.
                </div>
            </div>
        </div>

        <div class="form-grid-2">
            <div class="form-group">
                <label for="contact-email">Email Address *</label>
                <input type="email" id="contact-email" name="contact-email" placeholder="Enter your email address" required aria-errormessage="email-error">
                <div id="email-error" class="error-msg" aria-live="polite">
                    <span aria-hidden="true">❌</span> Please enter a valid email address.
                </div>
            </div>
            <div class="form-group">
                <label for="contact-service">Interest / Service *</label>
                <select id="contact-service" name="contact-service" required aria-errormessage="service-error">
                    <option value="" disabled selected>Select an Area</option>
                    <option value="equipment-supply">Medical Equipment Supply</option>
                    <option value="installation-maintenance">Installation & Maintenance</option>
                    <option value="homecare">Homecare Solutions</option>
                    <option value="consultation">Consultation Booking</option>
                    <option value="collaboration">Community Collaborations</option>
                    <option value="careers">Careers & Internships</option>
                </select>
                <div id="service-error" class="error-msg" aria-live="polite">
                    <span aria-hidden="true">❌</span> Please select a service area.
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="contact-message">Your Message *</label>
            <textarea id="contact-message" name="contact-message" rows="4" placeholder="Enter your detailed message here..." required aria-errormessage="message-error"></textarea>
            <div id="message-error" class="error-msg" aria-live="polite">
                <span aria-hidden="true">❌</span> Please enter your message.
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-full">Send Message</button>
    </form>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contact-us-form');
        if (!form) return;

        const syncAriaInvalid = (input) => {
            const isValid = input.checkValidity();
            if (!isValid) {
                input.setAttribute('aria-invalid', 'true');
            } else {
                input.removeAttribute('aria-invalid');
            }
        };

        form.addEventListener('blur', (e) => {
            if (e.target.matches('input, select, textarea') && e.target.hasAttribute('required')) {
                syncAriaInvalid(e.target);
            }
        }, true);

        form.addEventListener('input', (e) => {
            if (e.target.matches('input, select, textarea') && e.target.hasAttribute('required')) {
                if (e.target.checkValidity()) {
                    e.target.removeAttribute('aria-invalid');
                    e.target.classList.remove('touched-invalid');
                }
            }
        });

        form.addEventListener('submit', (e) => {
            const inputs = form.querySelectorAll('input, select, textarea');
            let allValid = true;

            inputs.forEach(input => {
                if (input.hasAttribute('required')) {
                    syncAriaInvalid(input);
                    if (!input.checkValidity()) {
                        allValid = false;
                        input.classList.add('touched-invalid');
                    }
                }
            });

            if (!allValid) {
                e.preventDefault();
                const firstInvalid = form.querySelector('[aria-invalid="true"]');
                if (firstInvalid) firstInvalid.focus();
            } else {
                e.preventDefault();
                alert('Thank you for contacting us! Your enquiry has been received and routed to the corresponding department.');
                form.reset();
                inputs.forEach(i => {
                    i.removeAttribute('aria-invalid');
                    i.classList.remove('touched-invalid');
                });
            }
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'mmt_contact_form', 'mmt_contact_form_shortcode' );

/**
 * Register [mmt_account_form] shortcode
 */
function mmt_account_form_shortcode() {
    if ( class_exists( 'WooCommerce' ) ) {
        return do_shortcode( '[woocommerce_my_account]' );
    }
    ob_start();
    ?>
    <div class="account-card-centered">
        <!-- Account Tabs Header -->
        <div class="account-tabs-header">
            <button class="account-tab-btn active" data-tab="login-panel" role="tab" aria-selected="true" aria-controls="login-panel">
                Sign In
            </button>
            <button class="account-tab-btn" data-tab="register-panel" role="tab" aria-selected="false" aria-controls="register-panel">
                Create Account
            </button>
        </div>

        <!-- Tab Panels Container -->
        <div class="account-tabs-content">
            <!-- Panel 1: Login Form -->
            <div id="login-panel" class="account-tab-panel active" role="tabpanel">
                <div class="panel-intro">
                    <h3>Welcome Back</h3>
                    <p>Sign in to track orders, schedule appointments, and coordinate service requests.</p>
                </div>

                <form id="account-login-form" class="appointment-form" action="#login" method="POST" novalidate>
                    <div class="form-group">
                        <label for="login-username">Username or E-mail *</label>
                        <input type="text" id="login-username" name="login-username" autocomplete="username" placeholder="Enter your username or email" required aria-errormessage="login-user-error">
                        <div id="login-user-error" class="error-msg" aria-live="polite">
                            <span aria-hidden="true">❌</span> Please enter your username or email.
                        </div>
                    </div>

                    <div class="form-group form-password-group">
                        <label for="login-password">Password *</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="login-password" name="login-password" autocomplete="current-password" placeholder="••••••••••••••••••••••••••••••••" required aria-errormessage="login-pass-error">
                            <button type="button" class="password-toggle-btn" aria-label="Show password" aria-pressed="false">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" class="eye-open-icon"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" class="eye-closed-icon" style="display: none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                            </button>
                        </div>
                        <div id="login-pass-error" class="error-msg" aria-live="polite">
                            <span aria-hidden="true">❌</span> Please enter your password.
                        </div>
                    </div>

                    <div class="form-flex-row">
                        <div class="form-group-checkbox">
                            <input type="checkbox" id="login-remember" name="login-remember" checked>
                            <label for="login-remember">Keep me signed in</label>
                        </div>
                        <div class="forgot-link-wrapper">
                            <a href="#forgot" class="forgot-link">Forgot password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">Login</button>
                </form>
            </div>

            <!-- Panel 2: Register Form -->
            <div id="register-panel" class="account-tab-panel" role="tabpanel" style="display: none;">
                <div class="panel-intro">
                    <h3>Create your MMT Account</h3>
                    <p>Register to manage procurement requests, keep track of support tickets, and access premium customer services.</p>
                </div>

                <form id="account-register-form" class="appointment-form" action="#register" method="POST" novalidate>
                    <div class="form-group">
                        <label for="register-email">E-mail Address *</label>
                        <input type="email" id="register-email" name="register-email" autocomplete="username" placeholder="Enter your email address" required aria-errormessage="register-email-error">
                        <div id="register-email-error" class="error-msg" aria-live="polite">
                            <span aria-hidden="true">❌</span> Please enter a valid email address.
                        </div>
                    </div>

                    <div class="form-group form-password-group">
                        <label for="register-password">Password *</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="register-password" name="register-password" autocomplete="new-password" placeholder="Create a secure password" minlength="8" required aria-errormessage="register-pass-error">
                            <button type="button" class="password-toggle-btn" aria-label="Show password" aria-pressed="false">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" class="eye-open-icon"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" class="eye-closed-icon" style="display: none;"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                            </button>
                        </div>
                        <div id="register-pass-error" class="error-msg" aria-live="polite">
                            <span aria-hidden="true">❌</span> Password must be at least 8 characters.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-full">Register Account</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
    (function() {
        const initFormEvents = () => {
            const tabButtons = document.querySelectorAll('.account-tab-btn');
            const panels = document.querySelectorAll('.account-tab-panel');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetId = btn.getAttribute('data-tab');
                    tabButtons.forEach(t => {
                        t.classList.remove('active');
                        t.setAttribute('aria-selected', 'false');
                    });
                    btn.classList.add('active');
                    btn.setAttribute('aria-selected', 'true');

                    panels.forEach(p => {
                        p.style.display = 'none';
                        p.classList.remove('active');
                    });
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.style.display = 'block';
                        targetPanel.classList.add('active');
                        const firstInput = targetPanel.querySelector('input');
                        if (firstInput) firstInput.focus();
                    }
                });
            });

            const toggleButtons = document.querySelectorAll('.password-toggle-btn');
            toggleButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const wrapper = btn.closest('.password-input-wrapper');
                    const input = wrapper.querySelector('input');
                    const eyeOpen = btn.querySelector('.eye-open-icon');
                    const eyeClosed = btn.querySelector('.eye-closed-icon');

                    if (input.type === 'password') {
                        input.type = 'text';
                        btn.setAttribute('aria-pressed', 'true');
                        eyeOpen.style.display = 'none';
                        eyeClosed.style.display = 'block';
                    } else {
                        input.type = 'password';
                        btn.setAttribute('aria-pressed', 'false');
                        eyeOpen.style.display = 'block';
                        eyeClosed.style.display = 'none';
                    }
                });
            });

            const forms = document.querySelectorAll('#account-login-form, #account-register-form');
            const syncAriaInvalid = (input) => {
                const isValid = input.checkValidity();
                if (!isValid) {
                    input.setAttribute('aria-invalid', 'true');
                } else {
                    input.removeAttribute('aria-invalid');
                }
            };

            forms.forEach(form => {
                form.addEventListener('blur', (e) => {
                    if (e.target.matches('input') && e.target.hasAttribute('required')) {
                        syncAriaInvalid(e.target);
                    }
                }, true);

                form.addEventListener('input', (e) => {
                    if (e.target.matches('input') && e.target.hasAttribute('required')) {
                        if (e.target.checkValidity()) {
                            e.target.removeAttribute('aria-invalid');
                            e.target.classList.remove('touched-invalid');
                        }
                    }
                });

                form.addEventListener('submit', (e) => {
                    const inputs = form.querySelectorAll('input');
                    let allValid = true;

                    inputs.forEach(input => {
                        if (input.hasAttribute('required')) {
                            syncAriaInvalid(input);
                            if (!input.checkValidity()) {
                                allValid = false;
                                input.classList.add('touched-invalid');
                            }
                        }
                    });

                    if (!allValid) {
                        e.preventDefault();
                        const firstInvalid = form.querySelector('[aria-invalid="true"]');
                        if (firstInvalid) firstInvalid.focus();
                    } else {
                        e.preventDefault();
                        const mode = form.id === 'account-login-form' ? 'Login successful!' : 'Registration submitted successfully!';
                        alert(mode + ' (Integration stub demonstration)');
                        form.reset();
                        inputs.forEach(i => {
                            i.removeAttribute('aria-invalid');
                            i.classList.remove('touched-invalid');
                        });
                    }
                });
            });
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFormEvents);
        } else {
            initFormEvents();
        }
    })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'mmt_account_form', 'mmt_account_form_shortcode' );


/**
 * ============================================================================
 * BESPOKE FAVORITES (WISHLIST) SYSTEM
 * ============================================================================
 */

// 1. Get Favorites for current user or guest (cookie-based)
function mmt_get_favorites() {
    if ( is_user_logged_in() ) {
        $favs = get_user_meta( get_current_user_id(), '_mmt_favorites', true );
        return is_array( $favs ) ? $favs : array();
    } else {
        $cookie = isset( $_COOKIE['mmt_favorites'] ) ? sanitize_text_field( $_COOKIE['mmt_favorites'] ) : '';
        return ! empty( $cookie ) ? array_map( 'intval', explode( ',', $cookie ) ) : array();
    }
}

// 2. Save Favorites for current user or guest (cookie-based)
function mmt_set_favorites( $favs ) {
    $favs = array_map( 'intval', $favs );
    if ( is_user_logged_in() ) {
        update_user_meta( get_current_user_id(), '_mmt_favorites', $favs );
    } else {
        // Set cookie for 30 days
        setcookie( 'mmt_favorites', implode( ',', $favs ), time() + 30 * DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true );
    }
}

// 3. AJAX Toggle Favorite Action
function mmt_toggle_favorite_action() {
    $product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : 0;
    if ( ! $product_id ) {
        wp_send_json_error( array( 'message' => 'Invalid Product ID' ) );
    }

    $favs = mmt_get_favorites();
    if ( in_array( $product_id, $favs ) ) {
        $favs = array_diff( $favs, array( $product_id ) );
        $status = 'removed';
    } else {
        $favs[] = $product_id;
        $status = 'added';
    }

    mmt_set_favorites( $favs );
    wp_send_json_success( array( 'status' => $status, 'favorites' => $favs ) );
}
add_action( 'wp_ajax_mmt_toggle_favorite', 'mmt_toggle_favorite_action' );
add_action( 'wp_ajax_nopriv_mmt_toggle_favorite', 'mmt_toggle_favorite_action' );

// 4. Sync Guest Favorites to User Profile on Login
function mmt_sync_favorites_on_login( $user_login, $user ) {
    $cookie = isset( $_COOKIE['mmt_favorites'] ) ? sanitize_text_field( $_COOKIE['mmt_favorites'] ) : '';
    if ( ! empty( $cookie ) ) {
        $guest_favs = array_map( 'intval', explode( ',', $cookie ) );
        $user_favs = get_user_meta( $user->ID, '_mmt_favorites', true );
        if ( ! is_array( $user_favs ) ) {
            $user_favs = array();
        }
        $merged = array_unique( array_merge( $user_favs, $guest_favs ) );
        update_user_meta( $user->ID, '_mmt_favorites', $merged );
        // Clear cookie
        setcookie( 'mmt_favorites', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true );
    }
}
add_action( 'wp_login', 'mmt_sync_favorites_on_login', 10, 2 );

// 5. Register Custom Query Var & Endpoint for My Account Tab
function mmt_favorites_endpoint() {
    add_rewrite_endpoint( 'favorites', EP_PAGES );
}
add_action( 'init', 'mmt_favorites_endpoint' );

function mmt_favorites_query_vars( $vars ) {
    $vars[] = 'favorites';
    return $vars;
}
add_filter( 'query_vars', 'mmt_favorites_query_vars', 0 );

// 6. Add "Favorites" tab in WooCommerce My Account Navigation
function mmt_add_favorites_link_my_account( $items ) {
    $logout = isset( $items['customer-logout'] ) ? $items['customer-logout'] : '';
    if ( $logout ) {
        unset( $items['customer-logout'] );
    }
    $items['favorites'] = 'My Favorites';
    if ( $logout ) {
        $items['customer-logout'] = $logout;
    }
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'mmt_add_favorites_link_my_account' );

// 7. Render Favorites List Content under Account Tab
function mmt_favorites_content() {
    echo '<h3 class="account-endpoint-title">My Favorites</h3>';
    echo do_shortcode( '[mmt_favorites_list]' );
}
add_action( 'woocommerce_account_favorites_endpoint', 'mmt_favorites_content' );

// 8. Flush rewrite rules once on init to enable the /account/favorites/ endpoint
add_action( 'init', function() {
    if ( ! get_option( 'mmt_favorites_rules_flushed' ) ) {
        flush_rewrite_rules();
        update_option( 'mmt_favorites_rules_flushed', 1 );
    }
}, 99 );

// 9. Shortcode to render Favorites List Grid
function mmt_favorites_list_shortcode() {
    $favs = mmt_get_favorites();
    
    ob_start();
    ?>
    <div class="mmt-favorites-list-container">
        <?php if ( empty( $favs ) ) : ?>
            <div class="empty-favorites">
                <p>Your Favorites list is currently empty.</p>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-primary">Browse Products</a>
            </div>
        <?php else : ?>
            <div class="popular-products-grid">
                <?php
                foreach ( $favs as $product_id ) {
                    $product = wc_get_product( $product_id );
                    if ( ! $product ) continue;
                    
                    $title = $product->get_name();
                    
                    // Map name to layout icon identifier
                    $icon = 'default';
                    if ( stripos( $title, 'glucose' ) !== false ) $icon = 'glucose';
                    elseif ( stripos( $title, 'rollator' ) !== false ) $icon = 'rollator';
                    elseif ( stripos( $title, 'icu' ) !== false || stripos( $title, 'electric patient' ) !== false ) $icon = 'bed';
                    elseif ( stripos( $title, 'gynaecology' ) !== false ) $icon = 'chair';
                    elseif ( stripos( $title, 'pressure' ) !== false ) $icon = 'pressure';
                    elseif ( stripos( $title, 'adjustable hospital' ) !== false ) $icon = 'bed-adjustable';
                    elseif ( stripos( $title, 'standard foldable' ) !== false ) $icon = 'wheelchair';
                    elseif ( stripos( $title, 'commode' ) !== false ) $icon = 'commode';
                    elseif ( stripos( $title, 'electric wheelchair' ) !== false ) $icon = 'wheelchair-electric';
                    elseif ( stripos( $title, 'manual adjustable' ) !== false ) $icon = 'bed-manual';
                    
                    echo do_shortcode( '[mmt_product_card title="' . esc_attr( $title ) . '" icon="' . esc_attr( $icon ) . '"]' );
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'mmt_favorites_list', 'mmt_favorites_list_shortcode' );

// 10. Dynamic Product Card Shortcode
function mmt_product_card_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'title' => '',
        'icon'  => '',
    ), $atts, 'mmt_product_card' );

    $title = sanitize_text_field( $atts['title'] );
    $icon  = sanitize_text_field( $atts['icon'] );

    $product_post = get_page_by_title( $title, OBJECT, 'product' );
    if ( ! $product_post ) {
        return '<!-- Product not found: ' . esc_html( $title ) . ' -->';
    }

    $product = wc_get_product( $product_post->ID );
    if ( ! $product ) {
        return '<!-- WC Product not found for ID: ' . $product_post->ID . ' -->';
    }

    $product_id   = $product->get_id();
    $price        = $product->get_price();
    $currency     = get_woocommerce_currency_symbol();
    $formatted_price = $currency . ' ' . number_format( $price );

    // SVG Icons Map
    $svg = '';
    switch ( $icon ) {
        case 'glucose':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>';
            break;
        case 'rollator':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>';
            break;
        case 'bed':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16M2 11h18M22 11v9M2 17h20"></path><circle cx="6" cy="18" r="1"></circle><circle cx="18" cy="18" r="1"></circle></svg>';
            break;
        case 'chair':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 18h16M4 14h16M8 6h8M6 10h12"></path></svg>';
            break;
        case 'pressure':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>';
            break;
        case 'bed-adjustable':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16M2 11h18M22 11v9M2 17h20"></path></svg>';
            break;
        case 'wheelchair':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"></path></svg>';
            break;
        case 'commode':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle></svg>';
            break;
        case 'wheelchair-electric':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="18" r="3"></circle><path d="M9 18h6M12 9v9M12 9h3M9 6h6"></path></svg>';
            break;
        case 'bed-manual':
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16M2 11h18M22 11v9M2 17h20"></path></svg>';
            break;
        default:
            $svg = '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"></rect></svg>';
            break;
    }

    $favs = mmt_get_favorites();
    $is_fav = in_array( $product_id, $favs );
    $fav_class = $is_fav ? 'active' : '';

    // Get featured image HTML, fallback to SVG
    $image_html = $product->get_image( 'woocommerce_thumbnail', array( 'class' => 'product-item-featured-image' ) );
    if ( ! $image_html ) {
        $image_html = '<div class="product-item-svg">' . $svg . '</div>';
    } else {
        $image_html = '<div class="product-item-image">' . $image_html . '</div>';
    }

    $add_to_cart_url = esc_url( wc_get_cart_url() . '?add-to-cart=' . $product_id );
    $product_permalink = esc_url( get_permalink( $product_id ) );

    ob_start();
    ?>
    <div class="product-item-card" data-product-id="<?php echo esc_attr( $product_id ); ?>">
        <div class="product-item-image-wrapper">
            <a href="<?php echo $product_permalink; ?>" class="product-item-link">
                <?php echo $image_html; ?>
            </a>
            <button class="mmt-favorite-btn <?php echo $fav_class; ?>" data-product-id="<?php echo esc_attr( $product_id ); ?>" aria-label="Toggle Favorite">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </button>
        </div>
        <div class="product-item-details">
            <h3 class="product-item-title"><a href="<?php echo $product_permalink; ?>"><?php echo esc_html( $title ); ?></a></h3>
            <div class="product-price-row">
                <span class="price"><?php echo esc_html( $formatted_price ); ?></span>
                <a href="<?php echo $add_to_cart_url; ?>" class="add-to-cart-action btn btn-primary add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo esc_attr( $product_id ); ?>" aria-label="Add &ldquo;<?php echo esc_attr( $title ); ?>&rdquo; to your cart" rel="nofollow">Add to cart</a>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'mmt_product_card', 'mmt_product_card_shortcode' );

// 11. Enqueue Javascript for AJAX Toggle Favorite in the footer
function mmt_favorites_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.addEventListener('click', function(e) {
            var btn = e.target.closest('.mmt-favorite-btn');
            if (!btn) return;
            
            e.preventDefault();
            e.stopPropagation();
            
            var productId = btn.getAttribute('data-product-id');
            if (!productId) return;
            
            btn.classList.add('loading');
            
            var formData = new FormData();
            formData.append('action', 'mmt_toggle_favorite');
            formData.append('product_id', productId);
            
            fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(result) {
                btn.classList.remove('loading');
                if (result.success) {
                    if (result.data.status === 'added') {
                        btn.classList.add('active');
                        btn.style.transform = 'scale(1.2)';
                        setTimeout(function() { btn.style.transform = ''; }, 200);
                    } else {
                        btn.classList.remove('active');
                    }
                    
                    if (document.querySelector('.mmt-favorites-list-container')) {
                        var card = btn.closest('.product-item-card');
                        if (card) {
                            card.style.opacity = '0';
                            card.style.transform = 'scale(0.8)';
                            setTimeout(function() {
                                card.remove();
                                var container = document.querySelector('.mmt-favorites-list-container');
                                if (container && container.querySelectorAll('.product-item-card').length === 0) {
                                    container.innerHTML = '<div class="empty-favorites"><p>Your Favorites list is currently empty.</p><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-primary">Browse Products</a></div>';
                                }
                            }, 300);
                        }
                    }
                } else {
                    console.error('Favorite action failed:', result.data.message);
                }
            })
            .catch(function(error) {
                btn.classList.remove('loading');
                console.error('Error toggling favorite:', error);
            });
        });
    });
    </script>
    <?php
}
add_action( 'wp_footer', 'mmt_favorites_script' );

/**
 * WooCommerce Global Content Wrapper Overrides to match theme container layout
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'mmt_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'mmt_woocommerce_wrapper_end', 10 );

function mmt_woocommerce_wrapper_start() {
    if ( ! is_shop() && ! is_account_page() ) {
        $title = function_exists( 'woocommerce_page_title' ) ? woocommerce_page_title( false ) : get_the_title();
        ?>
        <div class="page-header-default">
            <div class="page-header-bg-decoration">
                <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M10,0 C30,25 30,75 10,100" />
                    <path d="M30,0 C10,25 10,75 30,100" />
                </svg>
            </div>
            <div class="container page-header-inner">
                <h1 class="page-title"><?php echo esc_html( $title ); ?></h1>
            </div>
        </div>
        <?php
    }
    
    echo '<main id="primary-content" class="site-main-content">';
    echo '<div class="container" style="padding-top: 4rem; padding-bottom: 5rem;">';
}

function mmt_woocommerce_wrapper_end() {
    echo '</div>';
    echo '</main>';
}

/**
 * Update Header Cart Count via AJAX Cart Fragments
 */
function mmt_woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    $cart_count = ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
    <?php
    $fragments['span.cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mmt_woocommerce_header_add_to_cart_fragment' );


/**
 * Remove default WooCommerce sidebar globally
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * Add Logo and Profile Card to My Account dashboard sidebar
 */
add_action( 'woocommerce_before_account_navigation', 'mmt_add_dashboard_sidebar_header' );
function mmt_add_dashboard_sidebar_header() {
    $current_user = wp_get_current_user();
    $avatar = get_avatar( $current_user->ID, 60, '', 'User Avatar', array( 'class' => 'mmt-avatar' ) );
    $logo_url = get_template_directory_uri() . '/assets/images/logo.webp';
    $display_name = !empty( $current_user->display_name ) ? $current_user->display_name : $current_user->user_login;
    $user_email = $current_user->user_email;
    
    ?>
    <div class="mmt-dashboard-sidebar-header">
        <div class="mmt-dashboard-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $logo_url ); ?>" alt="Mkarye Medical Technologies">
            </a>
        </div>
        <div class="mmt-dashboard-profile-card">
            <div class="mmt-profile-avatar-wrapper">
                <?php echo $avatar; ?>
                <span class="mmt-online-badge"></span>
            </div>
            <div class="mmt-profile-info">
                <h4 class="mmt-profile-name"><?php echo esc_html( $display_name ); ?></h4>
                <p class="mmt-profile-role"><?php echo esc_html( $user_email ); ?></p>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Add Dynamic Header Bar to WooCommerce My Account content panel
 */
add_action( 'woocommerce_account_content', 'mmt_add_dashboard_content_header', 5 );
function mmt_add_dashboard_content_header() {
    $current_user = wp_get_current_user();
    
    // Determine the current WooCommerce account endpoint
    $endpoint = '';
    global $wp_query;
    foreach ( array( 'orders', 'downloads', 'edit-address', 'payment-methods', 'edit-account', 'favorites' ) as $key ) {
        if ( isset( $wp_query->query_vars[ $key ] ) ) {
            $endpoint = $key;
            break;
        }
    }
    
    $title = 'Dashboard';
    $subtitle = 'Overview of your recent activity and account status.';
    
    if ( $endpoint === 'orders' ) {
        $title = 'Your Orders';
        $subtitle = 'Track and view your purchase history.';
    } elseif ( $endpoint === 'downloads' ) {
        $title = 'Downloads';
        $subtitle = 'Access your digital files and products.';
    } elseif ( $endpoint === 'edit-address' ) {
        $title = 'Addresses';
        $subtitle = 'Manage your billing and shipping locations.';
    } elseif ( $endpoint === 'payment-methods' ) {
        $title = 'Payment Methods';
        $subtitle = 'Securely manage your saved credit cards and payment gateways.';
    } elseif ( $endpoint === 'edit-account' ) {
        $title = 'Account Details';
        $subtitle = 'Update your profile information and password credentials.';
    } elseif ( $endpoint === 'favorites' ) {
        $title = 'My Favorites';
        $subtitle = 'View your saved items and quick purchase favorites.';
    }
    
    ?>
    <div class="mmt-dashboard-content-header">
        <div class="mmt-dashboard-header-left">
            <span class="mmt-dashboard-badge">Customer Portal</span>
            <h2 class="mmt-dashboard-title"><?php echo esc_html( $title ); ?></h2>
            <p class="mmt-dashboard-subtitle"><?php echo esc_html( $subtitle ); ?></p>
        </div>
        <div class="mmt-dashboard-header-right">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mmt-btn-outline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                Exit Portal
            </a>
        </div>
    </div>
    <?php
}

/**
 * Automatically add anchor IDs to headings on the Services page
 */
function mmt_add_anchor_ids_to_headings( $content ) {
    if ( is_page( 'services' ) ) {
        $content = preg_replace_callback( '/<h3(.*?)>(.*?)<\/h3>/i', function( $matches ) {
            $title = strip_tags( $matches[2] );
            $slug = sanitize_title( $title );
            
            // Map text to clean short anchor tags matching our header links
            if ( stripos( $title, 'supply' ) !== false ) {
                $slug = 'supply';
            } elseif ( stripos( $title, 'maintenance' ) !== false || stripos( $title, 'installation' ) !== false ) {
                $slug = 'maintenance';
            } elseif ( stripos( $title, 'homecare' ) !== false ) {
                $slug = 'homecare';
            } elseif ( stripos( $title, 'consultation' ) !== false || stripos( $title, 'booking' ) !== false ) {
                $slug = 'booking';
            } elseif ( stripos( $title, 'collaborations' ) !== false ) {
                $slug = 'collaborations';
            } elseif ( stripos( $title, 'careers' ) !== false ) {
                $slug = 'careers';
            }
            
            return '<h3' . $matches[1] . ' id="' . esc_attr( $slug ) . '">' . $matches[2] . '</h3>';
        }, $content );
    }
    return $content;
}
add_filter( 'the_content', 'mmt_add_anchor_ids_to_headings', 15 );






