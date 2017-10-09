<?php
/**
 * The template for displaying all single posts.
 *
 * @package ThemeAmber
 */
consultancy_get_page_layout();

get_header(); ?>

    <div class="page-title-wrap">
        <div class="container">
            <h1 class="page-title">
                <span><?php the_title(); ?></span>
                <div class="portfolio-navigation pull-right">
                    <?php
                    $prev = get_adjacent_post(false, '', true);
                    $next = get_adjacent_post(false, '', false);
                    if($prev){
                        $url = get_permalink($prev->ID);
                        echo '<a href="' . $url . '" class="portfolio-nav portfolio-prev" title="' . $prev->post_title . '">'. esc_html__( 'Prev', 'consultancy-wp' ) .'</a>';
                    }
                    if($next){
                        $url = get_permalink($next->ID);
                        echo '<a href="' . $url . '" class="portfolio-nav portfolio-next" title="' . $next->post_title . '">'. esc_html__( 'Next', 'consultancy-wp' ) .'</a>';
                    }
                    ?>
                </div>
            </h1>
        </div>
    </div>

    <div class="container ct-lv1">

        <div id="primary" class="content-area content-portfolio">
            <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

            <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- #container -->

<?php get_footer(); ?>