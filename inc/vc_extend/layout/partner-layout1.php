<div class="st-partner-wraper st-partner-<?php echo esc_attr($consultancy_partner_template).' '.esc_attr($consultancy_partner_extra_class);?>">
    <div class="st-partner-inner clearfix">
        <?php
        $consultancy_partner_image_url = '';
        if (!empty($consultancy_partner_image)) {
            $attachment_image = wp_get_attachment_image_src($consultancy_partner_image, 'full');
            $consultancy_partner_image_url = $attachment_image[0];
        }
        ?>
        <?php if($consultancy_partner_image_url):?>
            <div class="st-partner-image">
                <a href="<?php echo esc_attr($consultancy_partner_link); ?>"><img src="<?php echo esc_attr($consultancy_partner_image_url);?>" alt="" /></a>
            </div>
        <?php endif;?>
    </div>
</div>