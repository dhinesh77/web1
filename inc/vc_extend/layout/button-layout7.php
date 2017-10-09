<?php
$href = null;
// Button Link
if ( $consultancy_button_link !== '' ) { $href = vc_build_link($consultancy_button_link); }

// Button Class
$button_class = array();

if ( $consultancy_button_size ) {
    $button_class[] = ' btn-'.$consultancy_button_size;
}

$button_class[] = ' tertiary-background';

$button_class[] = ' '.$consultancy_button_align;

if ( $consultancy_button_extra_class ) {
    $button_class[] = ' '.esc_attr($consultancy_button_extra_class);
}

$button_class = implode('', $button_class);

// Button Style
$button_styles = array();

if ( $consultancy_button_margin_top || $consultancy_button_margin_top == '0' ) {
    $button_styles[] = 'margin-top: ' . intval($consultancy_button_margin_top) . 'px;';
}

if ( $consultancy_button_margin_bottom || $consultancy_button_margin_bottom == '0' ) {
    $button_styles[] = 'margin-bottom: ' . intval($consultancy_button_margin_bottom) . 'px;';
}

if ( $consultancy_button_margin_left || $consultancy_button_margin_left == '0') {
    $button_styles[] = 'margin-left: ' . intval($consultancy_button_margin_left) . 'px;';
}

if ( $consultancy_button_margin_right || $consultancy_button_margin_right == '0' ) {
    $button_styles[] = 'margin-right: ' . intval($consultancy_button_margin_right) . 'px;';
}

$button_styles = implode('', $button_styles);

if ( $button_styles ) {
    $button_styles = ' style="' . esc_attr($button_styles) . '"';
}

echo '<a href="'. esc_url($href['url']) .'" class="btn '. $button_class .'" '. $button_styles .'>'. esc_attr($consultancy_button_title) .'<i class="'.esc_attr($consultancy_button_icon_class).'"></i>'.'</a>';

?>
