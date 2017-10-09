<div class="st-grid-wrap gallery-popup-wrap st-grid-layout1 st-grid-<?php echo esc_attr($consultancy_grid_template).' '. esc_attr($consultancy_grid_extra_class);?>">

    <?php if($consultancy_grid_title!='') :?>
    <div class="st-custom-heading-layout1">
        <h2 class="st-heading-title">
            <span><?php echo esc_attr($consultancy_grid_title); ?></span>
        </h2>
    </div>
    <?php endif;?>

    <div class="st-grid" style="margin:<?php echo '-'.esc_attr($consultancy_grid_item_space).'px' ;?>">
        <?php
		$taxo = '';
        $count  = 0;
        $args = array(
            'posts_per_page' => $consultancy_grid_posts_per_page,
            'post__not_in'   => $consultancy_grid_post_not_in,
            'post_parent'    => $consultancy_grid_post_parent,
            'orderby'        => 'date',
            'order'          => 'ASC',
            'post_status'    => 'publish',
            'post_type'      => 'page'
        );
        $posts = new WP_Query( $args );

        while($posts->have_posts()){
            $posts->the_post();
            ?>
            <div style="padding:<?php echo esc_attr($consultancy_grid_item_space).'px' ;?>" class="<?php echo esc_attr($consultancy_grid_item_class);?>">
                <div class="st-grid-item-wrap">
                    <?php
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                            $consultancy_grid_extra_class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                            $imgzoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        else:
                            $consultancy_grid_extra_class = ' no-image';
                            $thumbnail = '<img src="'.get_template_directory_uri() . '/images/no_image.png" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="st-grid-media '.esc_attr($consultancy_grid_extra_class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="st-grid-title">
                        <?php the_title();?>
                        <div class="st-grid-categories">
                            <?php echo get_the_term_list( get_the_ID(), $taxo, '', ', ', '' ); ?>
                        </div>
                    </div>
                    <div class="st-grid-action">
                        <a href="<?php the_permalink(); ?>" class="st-grid-link">
                            <i class="fa fa-link"></i>
                        </a>

                        <a href="<?php echo esc_attr($imgzoom[0]); ?>" class="st-grid-zoom gallery-popup">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>
</div>