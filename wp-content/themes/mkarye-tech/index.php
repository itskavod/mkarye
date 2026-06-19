<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

get_header();
?>

<main id="primary-content" class="page-content-wrapper">
    <div class="page-header-default">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'Blog Archives', 'mkarye-tech' ); ?></h1>
        </div>
    </div>
    
    <div class="container page-content-inner" style="padding-top: 3rem; padding-bottom: 3rem;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> style="margin-bottom: 2rem;">
                    <header class="entry-header" style="margin-bottom: 1rem;">
                        <h2 class="entry-title" style="font-size: 1.5rem;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;
            
            the_posts_navigation();
        else :
            ?>
            <p><?php esc_html_e( 'No posts found.', 'mkarye-tech' ); ?></p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
