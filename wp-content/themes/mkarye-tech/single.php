<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

get_header();
?>

<main id="primary-content" class="page-content-wrapper">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="page-header-default">
                <div class="container">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta" style="margin-top: 1rem; font-size: 0.9rem; color: var(--color-text-muted);">
                        <span>Published on: <?php echo get_the_date(); ?></span> | 
                        <span>Author: <?php the_author(); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="container page-content-inner" style="padding-top: 4rem; padding-bottom: 4rem;">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail" style="margin-bottom: 2.5rem;">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
