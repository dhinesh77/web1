<div class="st-counter-wraper st-counter-<?php echo esc_attr($consultancy_counter_template).' '.esc_attr($consultancy_counter_extra_class);?>">
    <div class="st-counter-inner clearfix">
        <?php if( $consultancy_counter_icon ): ?>
            <span class="st-icon pull-left"><i class="fa <?php echo esc_attr($consultancy_counter_icon); ?>"></i></span>
        <?php endif; ?>
        <div class="counter-fix">
            <span class="suffix">
                <?php echo esc_attr($consultancy_counter_suffix); ?>
            </span>
            <span class="counter">
                <?php echo esc_attr($consultancy_counter_digit); ?>
            </span>
            <span class="prefix">
                <?php echo esc_attr($consultancy_counter_prefix); ?>
            </span>
            <?php if($consultancy_counter_title):?>
                <div class="st-counter-title" style="color: <?php echo esc_attr($consultancy_counter_title_color); ?>"><?php echo apply_filters('the_title',$consultancy_counter_title);?></div>
            <?php endif;?>
        </div>
    </div>
</div>