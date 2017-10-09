<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ThemeAmber
 */
consultancy_get_page_layout();

get_header(); ?>

<?php consultancy_get_page_title($post->ID); ?>

    <div class="<?php echo esc_attr($consultancy_wcontainer); ?> ct-lv1">
        <div class="<?php echo esc_attr($consultancy_wrow); ?>">

            <div id="primary" class="content-area content-page <?php echo esc_attr($consultancy_wcontent); ?>">
                <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'template-parts/content', 'page' ); ?>

                        <?php
                        $consultancy_comment = consultancy_option('page_comments');
                        if ( !isset( $consultancy_comment ) ){
                            if (consultancy_option('page_comments')){
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            }
                        } else {
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        }
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