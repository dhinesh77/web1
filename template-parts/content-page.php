<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeAmber
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'consultancy-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="page-edit">
		<?php edit_post_link( esc_html__( 'Edit', 'consultancy-wp' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-footer -->
</div><!-- #post-## -->
