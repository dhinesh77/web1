<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeAmber
 */
?>

	</div><!-- #content -->

    <?php  if(consultancy_option('footer_widgets') && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) )) { ?>
        <div class="footer-top-area">
            <?php if ( is_active_sidebar( 'footer-top' )) { ?>
                <div class="container">
                    <div class="footer-top clearfix">
                        <?php dynamic_sidebar('footer-top');?>
                    </div>
                </div>
            <?php } ?>

            <?php $footer_columns = consultancy_option('footer_columns'); ?>
            <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) { ?>
                <div class="container footer-<?php echo esc_attr($footer_columns); ?>-columns clearfix">
                    <div class="row">
                        <?php
                        for ( $count = 1; $count <= $footer_columns; $count++ ) {
                            ?>
                                <div id="footer-<?php echo esc_attr($count); ?>" class="footer-<?php echo esc_attr($count).' '.consultancy_get_footer_cols() ?> footer-column" role="complementary">
                                    <?php dynamic_sidebar('footer-'.$count);?>
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

	<footer id="colophon" class="footer-bottom-area">
        <div class="container">
            <div class="st-copyright">
                <?php
                if (consultancy_option('footer_copyright') == '') {
                    printf( esc_html__( '&copy; 2015 %1$s - Theme by %2$s', 'consultancy-wp' ), get_bloginfo('name'), '<a href="'. esc_url( esc_html__( 'http://www.themeamber.com/', 'consultancy-wp' ) ) .'">ThemeAmber</a>' );
                } else {
                    echo wp_kses_post(consultancy_option('footer_copyright'));
                }
                ?>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if(consultancy_option('scroll_totop')){ ?>
<!-- scroll to top  -->
<a href="#" class="scroll_top scroll-top"><i class="fa fa-angle-up fa-2x"></i></a>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
