<div class="st-carousel-wrap st-carousel-<?php echo esc_attr($consultancy_carousel_template).' '. esc_attr($consultancy_carousel_extra_class);?>">
    <div class="st-carousel" data-margin="<?php echo esc_attr($consultancy_carousel_margin);?>" data-loop="<?php echo esc_attr($consultancy_carousel_loop);?>" data-nav="<?php echo esc_attr($consultancy_carousel_nav);?>" data-dots="<?php echo esc_attr($consultancy_carousel_dots);?>" data-autoplay="<?php echo esc_attr($consultancy_carousel_autoplay);?>" data-xsmall-items="<?php echo esc_attr($consultancy_carousel_xsmall_items);?>" data-small-items="<?php echo esc_attr($consultancy_carousel_small_items);?>" data-medium-items="<?php echo esc_attr($consultancy_carousel_medium_items);?>" data-large-items="<?php echo esc_attr($consultancy_carousel_large_items);?>">
        <?php
        while($consultancy_carousel_abposts->have_posts()){
            $consultancy_carousel_abposts->the_post();
            ?>
            <div class="st-carousel-item primary-background-hover">
                <?php
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $im_class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'consultancy-project-thumb');
                    else:
                        $im_class = ' no-image';
                        $thumbnail = '<img src="'.get_template_directory_uri() . '/images/no_image_project.png" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="st-carousel-media '.esc_attr($im_class).'">'.$thumbnail.'</div>';
                ?>
                <h3 class="st-carousel-title">
                    <a class="st-carousel-more" href="<?php the_permalink() ?>">
                        <?php the_title();?>
                    </a>
                </h3>
            </div>
            <?php
        }
        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>
</div>