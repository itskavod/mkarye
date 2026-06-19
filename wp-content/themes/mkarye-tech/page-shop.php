<?php
/**
 * The template for displaying the Products/Shop page
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

get_header();
?>

<main id="primary-content" class="site-main-content">
    <div class="page-header-default">
        <!-- Abstract Medical DNA Helix SVG overlay -->
        <div class="page-header-bg-decoration">
            <svg viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M10,0 C30,25 30,75 10,100" />
                <path d="M30,0 C10,25 10,75 30,100" />
                <line x1="15" y1="12.5" x2="25" y2="12.5" />
                <line x1="17.5" y1="25" x2="22.5" y2="25" />
                <line x1="20" y1="37.5" x2="20" y2="37.5" />
                <line x1="17.5" y1="50" x2="22.5" y2="50" />
                <line x1="15" y1="62.5" x2="25" y2="62.5" />
                <line x1="11" y1="75" x2="29" y2="75" />
                <line x1="10" y1="87.5" x2="30" y2="87.5" />
            </svg>
        </div>
        <div class="container page-header-inner">
            <h1 class="page-title">Products</h1>
            <div class="page-breadcrumbs">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;/&nbsp; Products
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 4rem; padding-bottom: 5rem;">
        <div class="shop-page-wrapper">
            <?php 
            $shop_page_id = function_exists( 'wc_get_page_id' ) ? wc_get_page_id( 'shop' ) : 16;
            $shop_post = get_post( $shop_page_id );
            if ( $shop_post ) {
                remove_filter( 'the_content', 'wpautop' );
                echo apply_filters( 'the_content', $shop_post->post_content );
                add_filter( 'the_content', 'wpautop' );
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
?>

