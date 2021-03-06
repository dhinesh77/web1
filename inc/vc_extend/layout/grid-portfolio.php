<?php
    /* get categories */
    $taxo = 'portfolio_category';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxo);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
?>
<div class="st-grid-wrap gallery-popup-wrap st-grid-layout1 st-grid-<?php echo esc_attr($consultancy_grid_template).' '. esc_attr($consultancy_grid_extra_class);?>">

    <?php if(($consultancy_grid_filter=='true') || ($consultancy_grid_title!='')) :?>
    <div class="st-custom-heading-layout1">
        <h2 class="st-heading-title">
            <span><?php echo esc_attr($consultancy_grid_title); ?></span>

            <ul class="st-grid-filter list-inline right">
                <li><a class="active" href="#" data-group="all"><span>All</span></a></li>
                <?php foreach($atts['categories'] as $category): ?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <span><?php echo esc_html__($term->name, "consultancy-wp");?></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </h2>
    </div>
    <?php endif;?>

    <div class="st-grid" style="margin:<?php echo '-'.esc_attr($consultancy_grid_item_space).'px' ;?>">
        <?php
        while($abg_posts->have_posts()){
            $abg_posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(consultancy_GetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div style="padding:<?php echo esc_attr($consultancy_grid_item_space).'px' ;?>" class="clearfix <?php echo esc_attr($consultancy_grid_item_class);?>" data-groups='[<?php echo implode(',', $groups); ?>]'>
                <div class="st-grid-item-wrap">
                    <?php
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                            $im_class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                            $imgzoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        else:
                            $im_class = ' no-image';
                            $thumbnail = '<img src="'.get_template_directory_uri() . '/images/no_image.png" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="st-grid-media '.esc_attr($im_class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="st-grid-title">
                        <?php the_title();?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="st-grid-link">
                        <i class="fa fa-link"></i>
                    </a>

                    <a href="<?php echo esc_attr($imgzoom[0]); ?>" class="st-grid-zoom gallery-popup">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        wp_reset_query();
        ?>
		<!-- sizer -->
		<div class="<?php echo esc_attr($consultancy_grid_item_class);?> shuffle_sizer"></div>
    </div>
</div>