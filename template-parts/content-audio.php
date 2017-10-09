<?php
/**
 * @package ThemeAmber
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php
        if( has_post_thumbnail( ) ) {
            echo '<div class="post-image"><span class="secondary-background icon-post-type"><i class="fa fa-music"></i></span>';
            the_post_thumbnail( 'large' );
            echo '</div>';
        }
        ?>

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php consultancy_posted_on(); ?><?php consultancy_entry_footer(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="entry-content-inner">
			<?php echo apply_filters('the_content', preg_replace(array('/\[soundcloud(.*)]/','/\[audio(.*)]/'), '', get_the_excerpt())); ?>
		</div>

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