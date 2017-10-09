<?php
$href = null;
// Button Link
if ( $consultancy_pricing_button_link !== '' ) { $href = vc_build_link($consultancy_pricing_button_link); }
?>
<div class="st-pricing-wraper st-pricing-<?php echo esc_attr($consultancy_pricing_template).' '.esc_attr($consultancy_pricing_extra_class);?>">
    <?php if($consultancy_pricing_popular) { ?>
        <div class="st-pricing-popular secondary-background">
            <?php echo esc_attr($consultancy_pricing_popular); ?>
        </div>
    <?php } else { ?>
        <div class="st-pricing-no-popular"></div>
    <?php } ?>
    <div class="st-pricing-inner clearfix">
        <div class="st-pricing-title">
            <?php echo esc_attr($consultancy_pricing_title); ?>
        </div>
        <div class="st-pricing primary-color">
            <span class="st-pricing-price"><?php echo esc_attr($consultancy_pricing_price); ?></span>
            <span class="st-pricing-date"><?php echo '/ '.esc_attr($consultancy_pricing_time); ?></span>
        </div>
        <div class="st-pricing-desctiption">
            <?php echo esc_attr($consultancy_pricing_description); ?>
        </div>
        <div class="st-pricing-button">
            <a href="<?php echo esc_url($href['url']);?>" class="btn tertiary-background">
                <?php echo esc_attr($consultancy_pricing_button_text); ?>
            </a>
        </div>
    </div>
</div>