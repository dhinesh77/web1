<?php
vc_map(
	array(
		"name" => esc_html__("AB Custom Heading", "consultancy-wp"),
	    "base" => "st_customheading",
	    "class" => "vc-st-customheading",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__("Custom heading","consultancy-wp"),
                "param_name" => "heading",
                "value" => "",
                "description" => esc_html__("Custom heading","consultancy-wp"),
                "admin_label" => true,
                "group" => esc_html__("Custom Heading", "consultancy-wp")
            ),
            array(
                "type"       => "colorpicker",
                "heading"    => esc_html__("Heading Color","consultancy-wp"),
                "param_name" => "heading_color",
                "value"      => "",
                "group" => esc_html__("Custom Heading", "consultancy-wp")
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon library', "consultancy-wp" ),
                'value' => array(
                    esc_html__( 'Font Awesome', "consultancy-wp" ) => 'fontawesome',
                ),
                'param_name' => 'icon_type',
                'description' => esc_html__( 'Select icon library.', 'consultancy-wp' ),
                "group" => esc_html__("Custom Heading", "consultancy-wp")
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
                'param_name' => 'icon_fontawesome',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
                "group" => esc_html__("Custom Heading", "consultancy-wp")
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__("Custom Heading Layout","consultancy-wp"),
                "param_name" => "st_template",
                "shortcode" => "st_customheading",
                "value" => array(
                    "Layout 1" => "layout1",
                    "Layout 2" => "layout2",
                    "Layout 3" => "layout3",
                    "Layout 4" => "layout4",
                ),
                "std"  => "layout1",
                "admin_label" => true,
                "group" => esc_html__("General", "consultancy-wp"),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Heading margin bottom","consultancy-wp"),
                "param_name" => "margin_bottom",
                "value" => "",
                "description" => esc_html__("In px. Ex: 20px","consultancy-wp"),
                "group" => esc_html__("General", "consultancy-wp"),
            ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Content Align","consultancy-wp"),
	            "param_name" => "content_align",
	            "value" => array(
	            	"Default" => "text-default",
	            	"Left" => "text-left",
	            	"Right" => "text-right",
	            	"Center" => "text-center"
	            	),
                "std"  => "",
	            "group" => esc_html__("General", "consultancy-wp")
	        ),

		)
	)
);

class WPBakeryShortCode_st_customheading extends WPBakeryShortCode
{
    function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'heading' => '',
            'heading_color' => '',
            'content_align' => '',
            'margin_bottom' => '',
            'icon_fontawesome' => '',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

        global $consultancy_custom_heading_template, $consultancy_custom_heading_heading, $consultancy_custom_heading_heading_color, $consultancy_custom_heading_content_align, $consultancy_custom_heading_margin_bottom, $consultancy_custom_heading_icon_fontawesome, $consultancy_custom_heading_extra_class;

        $consultancy_custom_heading_template = $atts['st_template'];
        $consultancy_custom_heading_heading = $atts['heading'];
        $consultancy_custom_heading_icon_fontawesome = $atts['icon_fontawesome'];
        $consultancy_custom_heading_heading_color = $atts['heading_color'];
        $consultancy_custom_heading_content_align = $atts['content_align'];
        $consultancy_custom_heading_margin_bottom = $atts['margin_bottom'];
        $consultancy_custom_heading_extra_class = $atts['class'];

        ob_start();

        require(get_template_directory() . '/inc/vc_extend/layout/customheading-' . $consultancy_custom_heading_template . '.php');

        return ob_get_clean();
    }
}
?>