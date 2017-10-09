<div class="st-client-wraper st-client-<?php echo esc_attr($consultancy_client_template).' '.esc_attr($consultancy_client_extra_class);?>">
    <div class="st-client-inner clearfix">
        <i class="fa fa-quote-left secondary-border tertiary_color"></i>
        <div class="st-client-desctiption">
            <?php echo esc_attr($consultancy_client_description); ?>
        </div>
        <div class="st-client-name-image clearfix">
            <?php
            $consultancy_client_image_url = '';
            if (!empty($consultancy_client_image)) {
                $attachment_image = wp_get_attachment_image_src($consultancy_client_image, 'full');
                $consultancy_client_image_url = $attachment_image[0];
            }
            ?>

            <?php if($consultancy_client_title):?>
                <div class="st-client-meta">
                    <small class="st-client-position">
                        <?php echo esc_html__( 'by', 'consultancy-wp' ); ?>
                    </small>
                    <span class="st-client-name">
                        <?php echo apply_filters('the_title',$consultancy_client_title);?> <?php if($consultancy_client_position) echo ' - '.$consultancy_client_position; ?>
                    </span>

                </div>
            <?php endif;?>

            <?php if($consultancy_client_image_url):?>
                <div class="st-client-image">
                    <img src="<?php echo esc_attr($consultancy_client_image_url);?>" alt="" />
                </div>
            <?php endif;?>
        </div>
    </div>
</div>