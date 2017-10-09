<?php
/**
 * The template for displaying all single posts.
 *
 * @package ThemeAmber
 */
consultancy_get_page_layout();

get_header(); ?>

    <?php
    // Page Title
    if ( consultancy_option('blog_single_page_title') && get_option('page_for_posts') ) {
        ?>
        <div class="page-title-wrap">
            <div class="container">
                <h1 class="page-title">
                    <?php echo get_the_title( get_option('page_for_posts') ); ?>
                </h1>
            </div>
        </div>
    <?php
    }
    ?>

    <?php consultancy_breadcrumb($post->ID); ?>

    <div class="<?php echo esc_attr($consultancy_wcontainer); ?> ct-lv1">
        <div class="<?php echo esc_attr($consultancy_wrow); ?>">

            <div id="primary" class="content-area content-post <?php echo esc_attr($consultancy_wcontent); ?>">
                <main id="main" class="site-main" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>

                    <?php consultancy_the_post_navigation(); ?>

                    <?php consultancy_the_post_author(); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>

                <?php endwhile; // end of the loop. ?>

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
