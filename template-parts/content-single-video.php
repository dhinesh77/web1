<?php
/**
 * @package ThemeAmber
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php consultancy_video(); ?>

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php consultancy_posted_on(); ?> <?php consultancy_entry_footer(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo apply_filters('the_content', preg_replace('/\[embed(.*)]/', '', get_the_content(), 1)); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'consultancy-wp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clearfix">
		<div class="post-share pull-right">
			<span>Share :</span>
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
				<span class="share-box"><i class="fa fa-facebook"></i></span>
			</a>
			<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php the_title(); ?>%20-%20<?php the_permalink(); ?>">
				<span class="share-box"><i class="fa fa-twitter"></i></span>
			</a>
			<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
				<span class="share-box"><i class="fa fa-google-plus"></i></span>
			</a>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
