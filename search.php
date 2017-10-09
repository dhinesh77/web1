<?php
/**
 * The template for displaying search results pages.
 *
 * @package ThemeAmber
 */
consultancy_get_page_layout();

get_header(); ?>

    <div class="page-title-wrap">
        <div class="container">
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'consultancy-wp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </div>
    </div>

    <div class="<?php echo esc_attr($consultancy_wcontainer); ?> ct-lv1">
        <div class="<?php echo esc_attr($consultancy_wrow); ?>">

            <section id="primary" class="content-area content-search <?php echo esc_attr($consultancy_wcontent); ?>">
                <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'search' );
                        ?>

                    <?php endwhile; ?>

                    <?php consultancy_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

                </main><!-- #main -->
            </section><!-- #primary -->

            <?php if($consultancy_page_layout == 'right-sidebar' || $consultancy_page_layout == 'left-sidebar') { ?>
                <div id="secondary" class="widget-area <?php echo esc_attr($consultancy_wsidebar); ?>" role="complementary">
                    <?php get_sidebar(); ?>
                </div><!-- #secondary -->
            <?php } ?>

        </div><!-- #row -->
    </div><!-- #container -->

<?php get_footer(); ?>
