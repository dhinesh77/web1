<?php
vc_map(
    array(
        "name" => esc_html__("AB Carousel All", "consultancy-wp"),
        "base" => "carousel_all",
        "class" => "vc-st-carousel-all",
        "as_parent" => array( 'only' => 'vc_row,vc_row_inner' ),
        "js_view" => 'VcColumnView',
        "content_element" => true,
        "container_not_allowed" => false,
        "category" => esc_html__("ThemeAmber", "consultancy-wp"),
        "params" => array(
            array(
                "type" => "dropdown",
                "param_name" => "st_template",
                "shortcode" => "st_carousel",
                "admin_label" => true,
                "value" => array(
                    "Layout 1" => "layout1",
                    "Layout 2" => "layout2"
                ),
                "std"  => "layout1",
                "heading" => esc_html__("Layout","consultancy-wp"),
                "group" => esc_html__("General", "consultancy-wp"),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class","consultancy-wp"),
                "param_name" => "class",
                "value" => "",
                "description" => esc_html__("Extra Class","consultancy-wp"),
                "group" => esc_html__("General", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Extra Small Devices","consultancy-wp"),
                "param_name" => "xsmall_items",
                "description" => esc_html__( 'Extra small devices (phones, less than 768px)', "consultancy-wp" ),
                "edit_field_class" => "vc_col-sm-6 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 1,
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Small Devices","consultancy-wp"),
                "param_name" => "small_items",
                "description" => esc_html__( 'Small devices (tablets, 768px and up)', "consultancy-wp" ),
                "edit_field_class" => "vc_col-sm-6 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 2,
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Medium Devices","consultancy-wp"),
                "param_name" => "medium_items",
                "edit_field_class" => "vc_col-sm-6 vc_carousel_item",
                "description" => esc_html__( 'Medium devices (desktops, 992px and up)', "consultancy-wp" ),
                "value" => array(1,2,3,4,5,6),
                "std" => 3,
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Large Devices","consultancy-wp"),
                "param_name" => "large_items",
                "description" => esc_html__( 'Large devices (large desktops, 1200px and up)', "consultancy-wp" ),
                "edit_field_class" => "vc_col-sm-6 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 4,
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Margin Items","consultancy-wp"),
                "param_name" => "margin",
                "std"  => "",
                "description" => esc_html__("Margin Items","consultancy-wp"),
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Loop Items","consultancy-wp"),
                "param_name" => "loop",
                "value" => array(
                    "False" => "false",
                    "True" => "true",
                ),
                "std"  => "",
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Show Nav","consultancy-wp"),
                "param_name" => "nav",
                "value" => array(
                    "True" => "true",
                    "False" => "false"
                ),
                "std"  => "",
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Show Dots","consultancy-wp"),
                "param_name" => "dots",
                "value" => array(
                    "False" => "false",
                    "True" => "true",
                ),
                "std"  => "",
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Auto Play","consultancy-wp"),
                "param_name" => "autoplay",
                "value" => array(
                    "True" => "true",
                    "False" => "false"
                ),
                "std"  => "",
                "group" => esc_html__("Carousel Settings", "consultancy-wp")
            )
        ),
        'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',
    )
);


class WPBakeryShortCode_Carousel_All extends WPBakeryShortCodesContainer {
    function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'xsmall_items' => 1,
            'small_items' => 2,
            'medium_items' => 3,
            'large_items' => 4,
            'margin' => '30',
            'loop' => false,
            'nav' => true,
            'dots' => false,
            'autoplay' => true,
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

        global $consultancy_carousel_all_template, $consultancy_carousel_all_xsmall_items, $consultancy_carousel_all_small_items, $consultancy_carousel_all_medium_items, $consultancy_carousel_all_large_items, $consultancy_carousel_all_margin, $consultancy_carousel_loop, $consultancy_carousel_nav, $consultancy_carousel_dots, $consultancy_carousel_autoplay, $consultancy_carousel_extra_class;

        $consultancy_carousel_all_template = $atts['st_template'];
        $consultancy_carousel_all_xsmall_items = $atts['xsmall_items'];
        $consultancy_carousel_all_small_items = $atts['small_items'];
        $consultancy_carousel_all_medium_items = $atts['medium_items'];
        $consultancy_carousel_all_large_items = $atts['large_items'];
        $consultancy_carousel_all_margin = $atts['margin'];
        $consultancy_carousel_loop = $atts['loop'];
        $consultancy_carousel_nav = $atts['nav'];
        $consultancy_carousel_dots = $atts['dots'];
        $consultancy_carousel_autoplay = $atts['autoplay'];
        $consultancy_carousel_extra_class = $atts['class'];

        ob_start();

        ?>

        <div class="st-carousel-all-wrap st-carousel-all-<?php echo esc_attr($consultancy_carousel_all_template).' '. $consultancy_carousel_extra_class;?>">
            <div class="st-carousel" data-margin="<?php echo esc_attr($consultancy_carousel_all_margin);?>" data-loop="<?php echo esc_attr($consultancy_carousel_loop);?>" data-nav="<?php echo esc_attr($consultancy_carousel_nav);?>" data-dots="<?php echo esc_attr($consultancy_carousel_dots);?>" data-autoplay="<?php echo esc_attr($consultancy_carousel_autoplay);?>" data-xsmall-items="<?php echo esc_attr($consultancy_carousel_all_xsmall_items);?>" data-small-items="<?php echo esc_attr($consultancy_carousel_all_small_items);?>" data-medium-items="<?php echo esc_attr($consultancy_carousel_all_medium_items);?>" data-large-items="<?php echo esc_attr($consultancy_carousel_all_large_items);?>">
                <?php echo do_shortcode( $content ); ?>
            </div>
        </div>

        <?php

        return ob_get_clean();
    }
}
?>