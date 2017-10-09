<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeAmber
 */
consultancy_get_page_layout();

$blog_id    = absint( get_option( 'page_for_posts' ) );

get_header(); ?>

    <?php consultancy_get_page_title($blog_id); ?>

    <?php consultancy_breadcrumb($post->ID); ?>

    <div class="<?php echo esc_attr($consultancy_wcontainer); ?> ct-lv1">
        <div class="<?php echo esc_attr($consultancy_wrow); ?>">

            <div id="primary" class="content-area content-blog <?php echo esc_attr($consultancy_wcontent); ?>">
                <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );
                        ?>

                    <?php endwhile; ?>

                    <?php consultancy_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php if($consultancy_page_layout == 'right-sidebar' || $consultancy_page_layout == 'left-sidebar') { ?>
                <div id="secondary" class="widget-area <?php echo esc_attr($consultancy_wsidebar); ?>" role="complementary">
                    <?php get_sidebar(); ?>
                </div><!-- #secondary -->
            <?php } ?>

        </div><!-- #row -->
    </div><!-- #container -->

<?php get_footer(); ?>
