<?php
/**
 * Template Name: Page Builder / Full Width
 * Template Post Type: page, post
 *
 * This template displays content edge-to-edge without a page title or default page padding,
 * making it perfect for page builders like Spectra, Elementor, or Gutenberg block extensions.
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

get_header();
?>

<main id="primary-content" class="page-builder-canvas">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();
