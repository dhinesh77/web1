<?php
$href = null;
// Button Link
if ( $consultancy_call_to_action_button_link !== '' ) { $href = vc_build_link($consultancy_call_to_action_button_link); }

// Button Class
$button_class = array();

if ( $consultancy_call_to_action_button_size ) {
    $button_class[] = ' btn-'.$consultancy_call_to_action_button_size;
}

if ( $consultancy_call_to_action_button_template == 'layout1' ) {
    $button_class[] = ' btn-outline-normal';
}

if ( $consultancy_call_to_action_button_template == 'layout2' ) {
    $button_class[] = ' btn-outline-primary primary-background-hover';
}

if ( $consultancy_call_to_action_button_template == 'layout3' ) {
    $button_class[] = ' btn-outline-white';
}

if ( $consultancy_call_to_action_button_template == 'layout4' ) {
    $button_class[] = ' btn-outline-blue';
}

if ( $consultancy_call_to_action_button_template == 'layout5' ) {
    $button_class[] = ' primary-background';
}

if ( $consultancy_call_to_action_button_template == 'layout6' ) {
    $button_class[] = ' secondary-background';
}

if ( $consultancy_call_to_action_button_template == 'layout7' ) {
    $button_class[] = ' tertiary-background';
}


if ( $consultancy_call_to_action_button_template == 'custom' ) {
    $button_class[] = ' btn-custom';
}

if ( $consultancy_call_to_action_extra_class) {
    $button_class[] = ' '.esc_attr($consultancy_call_to_action_extra_class);
}

$button_class = implode('', $button_class);

// Button Style
$button_styles = array();

if ( $consultancy_call_to_action_button_margin_top || $consultancy_call_to_action_button_margin_top == '0' ) {
    $button_styles[] = 'margin-top: ' . intval($consultancy_call_to_action_button_margin_top) . 'px;';
}

if ( $consultancy_call_to_action_button_margin_bottom || $consultancy_call_to_action_button_margin_bottom == '0' ) {
    $button_styles[] = 'margin-bottom: ' . intval($consultancy_call_to_action_button_margin_bottom) . 'px;';
}

if ( $consultancy_call_to_action_button_margin_left || $consultancy_call_to_action_button_margin_left == '0') {
    $button_styles[] = 'margin-left: ' . intval($consultancy_call_to_action_button_margin_left) . 'px;';
}

if ( $consultancy_call_to_action_button_margin_right || $consultancy_call_to_action_button_margin_right == '0' ) {
    $button_styles[] = 'margin-right: ' . intval($consultancy_call_to_action_button_margin_right) . 'px;';
}

if ( $consultancy_call_to_action_button_template == 'custom' && $consultancy_call_to_action_button_custom_color ) {
    $button_styles[] = 'background-color: ' . $consultancy_call_to_action_button_custom_color . ';';
    $button_styles[] = 'color: ' . $consultancy_call_to_action_button_custom_text_color . ';';
}

$button_styles = implode('', $button_styles);

if ( $button_styles ) {
    $button_styles = ' style="' . $button_styles . '"';
}

if ( $consultancy_call_to_action_heading_color) {
    $consultancy_call_to_action_heading_color = 'style="color: ' . $consultancy_call_to_action_heading_color . '"';
}

if ( $consultancy_call_to_action_subheading_color) {
    $consultancy_call_to_action_subheading_color = 'style="color: ' . $consultancy_call_to_action_subheading_color . '"';
}

?>

<div class="call-to-action call-to-action-<?php echo esc_attr($consultancy_call_to_action_template); ?>">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 call-to-action-text <?php echo esc_attr($consultancy_call_to_action_text_align); ?>">
            <h2 class="cta-heading" <?php echo sanitize_text_field($consultancy_call_to_action_heading_color); ?>>
                <?php echo esc_attr($consultancy_call_to_action_heading); ?>
            </h2>
            <div class="cta-subheading" <?php echo sanitize_text_field($consultancy_call_to_action_subheading_color); ?>>
                <?php echo esc_attr($consultancy_call_to_action_subheading); ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 call-to-action-button <?php echo $consultancy_call_to_action_button_align; ?>">
            <a href="<?php echo esc_url($href['url']);?>" class="btn <?php echo esc_attr($button_class); ?>" <?php echo sanitize_text_field($button_styles); ?>>
                <?php echo esc_attr($consultancy_call_to_action_button_text); ?> <i class="<?php echo esc_attr($consultancy_call_to_action_button_icon_class); ?>"></i>
            </a>
        </div>
    </div>
</div>