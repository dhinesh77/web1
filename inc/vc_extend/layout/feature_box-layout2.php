<div class="st-feature-box-wraper st-feature-box-<?php echo esc_attr($consultancy_feature_box_template).' '.esc_attr($consultancy_feature_content_align).' '.esc_attr($consultancy_feature_extra_class) ;?>">
    <div class="st-feature-box">
        <div class="st-feature-box-icon">
            <?php
            $consultancy_feature_box_image_url = '';
            if (!empty($consultancy_feature_box_image)) {
                $attachment_image = wp_get_attachment_image_src($consultancy_feature_box_image, 'full');
                $consultancy_feature_box_image_url = $attachment_image[0];
            }
            ?>
            <?php if($consultancy_feature_box_image_url):?>
                <div class="feature-box-image">
                    <img src="<?php echo esc_attr($consultancy_feature_box_image_url);?>" alt="" />
                </div>
            <?php else:?>
                <div class="feature-box-icon">
                    <i class="<?php echo esc_attr($consultancy_feature_icon_class);?>"></i>
                </div>
            <?php endif;?>
        </div>

        <?php if($consultancy_feature_box_subtitle_item):?>
            <span class="st-featurebox-sub"><?php echo esc_attr($consultancy_feature_box_subtitle_item);?></span>
        <?php endif;?>
        <?php if($consultancy_feature_box_title_item):?>
            <h3><?php echo apply_filters('the_title',$consultancy_feature_box_title_item);?></h3>
        <?php endif;?>

        <div class="feature-box-content">
            <?php echo esc_attr($consultancy_feature_box_description_item);?>
        </div>
        <?php if($consultancy_feature_button_text!=''):?>
            <div class="st-feature-box-button st-readmore">
                <?php
                $consultancy_feature_extra_class_btn = ($consultancy_feature_button_type=='button')?'btn':'';
                ?>
                <a href="<?php echo esc_url($consultancy_feature_button_link);?>" class="primary-hover-color <?php echo esc_attr($consultancy_feature_extra_class_btn);?>"><?php echo esc_attr($consultancy_feature_button_text);?></a>
            </div>
        <?php endif;?>
    </div>
</div>