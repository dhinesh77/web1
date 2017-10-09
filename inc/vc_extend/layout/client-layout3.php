<?php
$consultancy_client_image_url = '';
if (!empty($consultancy_client_image)) {
    $attachment_image = wp_get_attachment_image_src($consultancy_client_image, 'thumbnail');
    $consultancy_client_image_url = $attachment_image[0];
}

if($consultancy_client_image_url):
    $st = 'style="background-image: url('.$consultancy_client_image_url.')"';
endif;
?>
<div class="st-client-wraper st-client-<?php echo esc_attr($consultancy_client_template).' '.esc_attr($consultancy_client_extra_class);?>">
    <div class="st-client-inner clearfix">

        <div class="st-client-name-image clearfix">
            <div class="polygon-clip-hexagon" <?php echo esc_attr($st); ?>></div>
        </div>
        <div class="st-client-right">
            <div class="st-client-desctiption">
                <?php echo esc_attr($consultancy_client_description); ?>
            </div>

            <?php if($consultancy_client_title):?>
                <div class="st-client-meta pull-left">
                    <small class="st-client-position">
                        <?php echo esc_html__( 'By', 'consultancy-wp' ); ?>
                    </small>
                    <span class="st-client-name">
                        <?php echo apply_filters('the_title',$consultancy_client_title);?> <?php if($consultancy_client_position) echo ' - '.esc_attr($consultancy_client_position); ?>
                    </span>

                </div>
            <?php endif;?>
        </div>
    </div>
</div>