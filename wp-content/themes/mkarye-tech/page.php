<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

get_header();
?>

<main id="primary-content" class="site-main-content">
    <?php
    while ( have_posts() ) :
        the_post();
        
        // If it's a page builder page, let the page builder handle the container.
        // Otherwise, wrap in standard container for classic editor compatibility.
        $is_elementor = did_action( 'elementor/loaded' ) && \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() );
        
        if ( $is_elementor ) {
            the_content();
        } else {
            ?>
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
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <div class="page-breadcrumbs">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <?php
                        global $post;
                        if ( isset( $post ) && $post->post_parent ) {
                            $parent = get_post( $post->post_parent );
                            echo ' &nbsp;/&nbsp; <a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
                        }
                        ?>
                        &nbsp;/&nbsp; <?php the_title(); ?>
                    </div>
                </div>
            </div>
            <div class="container page-content-inner" style="padding-top: 4rem; padding-bottom: 4rem;">
                <?php the_content(); ?>
            </div>
            <?php
        }
    endwhile;
    ?>
</main>

<?php
get_footer();
