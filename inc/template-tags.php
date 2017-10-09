<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ThemeAmber
 */

if ( ! function_exists( 'consultancy_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function consultancy_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

    $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset ( $url_parts[1] ) ) {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

    // Set up paginated links.
    $navs = paginate_links( array(
        'consultancy-wp'     => $pagenum_link,
        'format'    => $format,
        'total'     => $GLOBALS['wp_query']->max_num_pages,
        'current'   => $paged,
        'mid_size'  => 1,
        'add_args'  => array_map( 'urlencode', $query_args ),
        'prev_text' => esc_html__( '&larr; Previous', 'consultancy-wp' ),
        'next_text' => esc_html__( 'Next &rarr;', 'consultancy-wp' ),
    ) );

    if ( $navs ) :
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'consultancy-wp' ); ?></h2>
		<div class="nav-links">

            <?php echo ''.$navs; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
    endif;
}
endif;

if ( ! function_exists( 'consultancy_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function consultancy_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'consultancy-wp' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'consultancy_the_post_author' ) ) :

	function consultancy_the_post_author() {

		?>
		<div class="post-author clearfix">

			<div class="author-avata pull-left">
				<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
			</div>

			<div class="author-info pull-right">
				<h5><?php the_author_posts_link(); ?></h5>
				<p><?php the_author_meta('description'); ?></p>
				<span><?php the_author_meta('user_url'); ?></span>
			</div>

		</div>
		<?php
	}
endif;

if ( ! function_exists( 'consultancy_the_post_related' ) ) :

	function consultancy_the_post_related() {

		global $post;

		$categories = get_the_category($post->ID);

		if ($categories) {

			$category_ids = array();

			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			$args = array(
				'category__in'     => $category_ids,
				'post__not_in'     => array($post->ID),
				'posts_per_page'   => 3, // posts show.
				'ignore_sticky_posts' => 1,
				'orderby' => 'rand'
			);

			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) { ?>
			<div class="ab-post-related clearfix">
				<div class="ab-post-related-title">
					<h4 class="post-related-title"><?php esc_html_e('You Might Also Like', 'consultancy-wp'); ?></h4>
				</div>
			<?php while( $my_query->have_posts() ) {
				$my_query->the_post();?>
				<div class="related-item">

					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
					<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('medium'); ?></a>
					<?php endif; ?>

					<h3 class="related-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span class="related-date"><?php the_time( get_option('date_format') ); ?></span>

				</div>
				<?php
				}
			echo '</div>';
			}
		}

		wp_reset_query();

	}
endif;

if ( ! function_exists( 'consultancy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function consultancy_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'On %s', 'post date', 'consultancy-wp' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by: %s', 'post author', 'consultancy-wp' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	// echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	echo '<span class="byline"> '. $byline .'</span>';

}
endif;

if ( ! function_exists( 'consultancy_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function consultancy_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'consultancy-wp' ) );
		if ( $categories_list && consultancy_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'In %1$s', 'consultancy-wp' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'consultancy-wp' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'consultancy-wp' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'consultancy-wp' ), '<span>1</span>'.esc_html__( ' Comment', 'consultancy-wp' ), '<span>%</span>'.esc_html__( ' Comments', 'consultancy-wp' ) );
		echo '</span>';
	}

	edit_post_link( esc_html__( 'Edit', 'consultancy-wp' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'consultancy_the_archive_title' ) ) :
/**
 * Shim for `consultancy_the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function consultancy_the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'consultancy-wp' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'consultancy-wp' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'consultancy-wp' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'consultancy-wp' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'consultancy-wp' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'consultancy-wp' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'consultancy-wp' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'consultancy-wp' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'consultancy-wp' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'consultancy-wp' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'consultancy-wp' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'consultancy-wp' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'consultancy-wp' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'consultancy-wp' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_consultancy_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo esc_attr($before) . $title . $after;
	}
}
endif;

if ( ! function_exists( 'consultancy_the_archive_description' ) ) :
/**
 * Shim for `consultancy_the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function consultancy_the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_consultancy_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo esc_attr($before) . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function consultancy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'consultancy_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'consultancy_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so consultancy_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so consultancy_categorized_blog should return false.
		return false;
	}
}

/**
 * Custom Comment
 */
function consultancy_comment( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>

    <<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( array( 'clearfix', empty( $args['has_children'] ) ? '' : 'parent' ) ); ?>>
    <div class="avatar-container">
        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="comment-content">
        <div class="clearfix">
            <h4 class="comment-author vcard pull-left">
                <?php echo get_comment_author_link(); ?>
                <time datetime="<?php comment_time( 'c' ); ?>">
                    <?php printf( _x( '%1$s', '1: date' , 'consultancy-wp' ), get_comment_date(), get_comment_time() ); ?>
                </time>
            </h4>

            <div class="comment-metadata pull-right">
                <?php comment_reply_link( array_merge( $args, array(
                    'depth' => $depth,
                    'before' => ''
                ) ) ); ?>
                <?php edit_comment_link( esc_html__( 'Edit' , 'consultancy-wp' ), ' / ' ); ?>
            </div>
        </div>

        <div class="comment-text">
            <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' , 'consultancy-wp' ); ?></p>
            <?php endif; ?>

            <?php comment_text(); ?>
        </div>
    </div>

<?php
}

/**
 * Flush out the transients used in consultancy_categorized_blog.
 */
function consultancy_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'consultancy_categories' );
}
add_action( 'edit_category', 'consultancy_category_transient_flusher' );
add_action( 'save_post',     'consultancy_category_transient_flusher' );
