<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeAmber
 */
consultancy_get_page_layout();

get_header(); ?>

    <div class="page-title-wrap">
        <div class="container">
            <h1 class="page-title">
                <?php consultancy_the_archive_title(); ?>
            </h1>
        </div>
    </div>

    <?php consultancy_breadcrumb($post->ID); ?>

    <div class="<?php echo esc_attr($consultancy_wcontainer); ?> ct-lv1">
        <div class="<?php echo esc_attr($consultancy_wrow); ?>">

            <div id="primary" class="content-area content-archive <?php echo esc_attr($consultancy_wcontent); ?>">
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
