<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.webp" type="image/webp">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.webp" type="image/webp">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.webp">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#primary-content"><?php esc_html_e( 'Skip to content', 'mkarye-tech' ); ?></a>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <!-- Site Logo/Title -->
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link logo-image-link" rel="home" style="display: flex; align-items: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Mkarye Medical Technologies Logo" style="height: 48px; width: auto; object-fit: contain; max-width: 100%;">
                </a>
                <?php
            }
            ?>
        </div>

        <!-- Desktop Navigation -->
        <nav id="site-navigation" class="main-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'mkarye-tech' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'mkarye_default_menu',
            ) );
            
            // Fallback function for menu in case it's not configured yet
            function mkarye_default_menu() {
                global $post;
                $current_slug = '';
                if ( is_front_page() || is_home() ) {
                    $current_slug = 'home';
                } elseif ( is_page() && isset( $post ) ) {
                    $current_slug = $post->post_name;
                }
                // Handle WooCommerce shop page check if WooCommerce is active
                if ( function_exists( 'is_shop' ) && is_shop() ) {
                    $current_slug = 'shop';
                }
                
                echo '<ul class="nav-menu">';
                echo '<li class="' . ( $current_slug === 'home' ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
                echo '<li class="' . ( $current_slug === 'shop' ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( home_url( '/shop/' ) ) . '">Products</a></li>';
                echo '<li class="menu-item-has-children ' . ( $current_slug === 'services' ? 'current-menu-item' : '' ) . '">';
                echo '<a href="' . esc_url( home_url( '/services/' ) ) . '">Services<svg class="dropdown-chevron" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg></a>';
                echo '<ul class="sub-menu">';
                echo '<li><a href="' . esc_url( home_url( '/services/medical-equipment-supply/' ) ) . '">Medical Equipment Supply</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/services/installation-maintenance/' ) ) . '">Installation & Maintenance</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/services/homecare-solutions/' ) ) . '">Homecare Solutions</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/services/consultation-booking/' ) ) . '">Consultation Booking</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/services/community-collaborations/' ) ) . '">Community Collaborations</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/services/careers-internships/' ) ) . '">Careers & Internships</a></li>';
                echo '</ul>';
                echo '</li>';
                echo '<li class="' . ( $current_slug === 'contact' ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( home_url( '/contact/' ) ) . '">Contact</a></li>';
                echo '<li class="' . ( $current_slug === 'account' ? 'current-menu-item' : '' ) . '"><a href="' . esc_url( home_url( '/account/' ) ) . '">Account</a></li>';
                echo '</ul>';
            }
            ?>
        </nav>

        <!-- Header Actions: Search & Cart -->
        <div class="header-actions">
            <!-- Search Form -->
            <form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="search-input-wrapper">
                    <input type="search" class="search-input" placeholder="<?php echo esc_attr_x( 'Search products...', 'placeholder', 'mkarye-tech' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required />
                    <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                        <input type="hidden" name="post_type" value="product" />
                    <?php endif; ?>
                    <button type="submit" class="search-button" aria-label="Search">
                        <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- WooCommerce Cart Button -->
            <div class="header-cart">
                <?php
                $cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : '#cart';
                $cart_count = ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
                ?>
                <a href="<?php echo esc_url( $cart_url ); ?>" class="cart-btn" aria-label="View Cart">
                    <svg class="cart-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button class="nav-toggle" aria-controls="mobile-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'mkarye-tech' ); ?>">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<!-- Mobile Navigation Overlay -->
<div class="mobile-nav-overlay" id="mobile-navigation">
    <nav aria-label="<?php esc_attr_e( 'Mobile Menu', 'mkarye-tech' ); ?>">
        <!-- Mobile Search Form -->
        <form role="search" method="get" class="mobile-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="search-input-wrapper">
                <input type="search" class="search-input" placeholder="<?php echo esc_attr_x( 'Search products...', 'placeholder', 'mkarye-tech' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required />
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                    <input type="hidden" name="post_type" value="product" />
                <?php endif; ?>
                <button type="submit" class="search-button" aria-label="Search">
                    <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
        </form>
        <?php
        global $post;
        $mob_current_slug = '';
        if ( is_front_page() || is_home() ) {
            $mob_current_slug = 'home';
        } elseif ( is_page() && isset( $post ) ) {
            $mob_current_slug = $post->post_name;
        }
        if ( function_exists( 'is_shop' ) && is_shop() ) {
            $mob_current_slug = 'shop';
        }
        ?>
        <ul>
            <li class="<?php echo $mob_current_slug === 'home' ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li class="<?php echo $mob_current_slug === 'shop' ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">Products</a></li>
            <li class="menu-item-has-children <?php echo $mob_current_slug === 'services' ? 'current-menu-item' : ''; ?>">
                <a href="#" class="mobile-menu-parent">Services<svg class="mobile-dropdown-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg></a>
                <ul class="mobile-sub-menu">
                    <li><a href="<?php echo esc_url( home_url( '/services/medical-equipment-supply/' ) ); ?>">Medical Equipment Supply</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/installation-maintenance/' ) ); ?>">Installation & Maintenance</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/homecare-solutions/' ) ); ?>">Homecare Solutions</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/consultation-booking/' ) ); ?>">Consultation Booking</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/community-collaborations/' ) ); ?>">Community Collaborations</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/careers-internships/' ) ); ?>">Careers & Internships</a></li>
                </ul>
            </li>
            <li class="<?php echo $mob_current_slug === 'contact' ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
            <li class="<?php echo $mob_current_slug === 'account' ? 'current-menu-item' : ''; ?>"><a href="<?php echo esc_url( home_url( '/account/' ) ); ?>">Account</a></li>
        </ul>
    </nav>
</div>
