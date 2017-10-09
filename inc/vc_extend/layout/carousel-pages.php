<div class="st-carousel-wrap st-carousel-<?php echo esc_attr($consultancy_carousel_template).' '. esc_attr($consultancy_carousel_extra_class);?>">
    <div class="st-carousel" data-margin="<?php echo esc_attr($consultancy_carousel_margin);?>" data-loop="<?php echo esc_attr($consultancy_carousel_loop);?>" data-nav="<?php echo esc_attr($consultancy_carousel_nav);?>" data-dots="<?php echo esc_attr($consultancy_carousel_dots);?>" data-autoplay="<?php echo esc_attr($consultancy_carousel_autoplay);?>" data-xsmall-items="<?php echo esc_attr($consultancy_carousel_xsmall_items);?>" data-small-items="<?php echo esc_attr($consultancy_carousel_small_items);?>" data-medium-items="<?php echo esc_attr($consultancy_carousel_medium_items);?>" data-large-items="<?php echo esc_attr($consultancy_carousel_large_items);?>">
        <?php
        $count  = 0;
        $args = array(
            'posts_per_page' => esc_attr($consultancy_carousel_page_number),
            'post__not_in'   => esc_attr($consultancy_carousel_remove),
            'post_parent'    => esc_attr($consultancy_carousel_parrent_page_id),
            'orderby'        => 'date',
            'order'          => 'ASC',
            'post_status'    => 'publish',
            'post_type'      => 'page'
        );
        $posts = new WP_Query( $args );

        while($posts->have_posts()){
            $posts->the_post();
            ?>
            <div class="st-carousel-item">
                <?php
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $im_class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                    else:
                        $im_class = ' no-image';
                        $thumbnail = '<img src="'.get_template_directory_uri() . '/images/no_image.png" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="st-grid-media '.esc_attr($im_class).'">'.$thumbnail.'</div>';
                ?>
                <h3 class="st-carousel-title">
                    <?php the_title();?>
                </h3>

                <div class="st-carousel-content">
                    <?php echo consultancy_excerpt(20); ?>
                </div>

                <div class="st-readmore">
                    <a href="<?php the_permalink() ?>"><?php esc_html_e( 'Read More', 'consultancy-wp' ); ?> <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>
</div>