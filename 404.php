<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ThemeAmber
 */

consultancy_get_page_layout();

get_header(); ?>

<div class="<?php echo esc_attr($consultancy_wcontainer); ?> ct-lv1">
	<div class="<?php echo esc_attr($consultancy_wrow); ?>">

		<div id="primary" class="content-area content-404 <?php echo esc_attr($consultancy_wcontent); ?>">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'consultancy-wp' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'consultancy-wp' ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->

		<div id="secondary" class="widget-area <?php echo esc_attr($consultancy_wsidebar); ?>" role="complementary">
			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<?php if ( consultancy_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'consultancy-wp' ); ?></h2>
					<ul>
						<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
						?>
					</ul>
				</div><!-- .widget -->
			<?php endif; ?>

			<?php
			/* translators: %1$s: smiley */
			$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'consultancy-wp' ), convert_smilies( ':)' ) ) . '</p>';
			the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
			?>

			<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
		</div><!-- #secondary -->

	</div><!-- #row -->
</div><!-- #container -->

<?php get_footer(); ?>