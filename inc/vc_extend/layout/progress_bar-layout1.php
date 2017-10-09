<?php
$style ="";
if($consultancy_progress_bar_vertical == true){
    $style ="height";
} else {
    $style ="width";
}
?>
<div class="st-progress-wraper st-progress-<?php echo esc_attr($consultancy_progress_bar_template);?>">
    <div class="st-progress-item-wrap">
        <?php if($consultancy_progress_bar_icon):?>
            <i class="<?php echo esc_attr($consultancy_progress_bar_icon);?>"></i>
        <?php endif;?>
        <?php if($consultancy_progress_bar_item_title):?>
            <div class="st-progress-title">
                <?php echo apply_filters('the_title',$consultancy_progress_bar_item_title);?>
            </div>
        <?php endif;?>
        <div class="st-progress progress<?php if($consultancy_progress_bar_vertical){ echo ' vertical bottom'; } ?> <?php if($consultancy_progress_bar_striped){echo ' progress-striped';}?> <?php if($consultancy_progress_bar_animated){echo ' active';}?>"
            style="background-color:<?php echo esc_attr($consultancy_progress_bar_bg_color);?>;
            width:<?php echo esc_attr($consultancy_progress_bar_width);?>;
            height:<?php echo esc_attr($consultancy_progress_bar_height);?>;
            border-radius:<?php echo esc_attr($consultancy_progress_bar_border_radius);?>;
            " >
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                style="background-color:<?php echo esc_attr($consultancy_progress_bar_color);?>; <?php echo esc_attr($style); ?>: <?php echo esc_attr($consultancy_progress_bar_value).'%';?>;"
                >
                <span>
                    <?php if($consultancy_progress_bar_show_value): ?>
                        <?php echo esc_attr($consultancy_progress_bar_value.$consultancy_progress_bar_value_suffix);?>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
</div>