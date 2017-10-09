<?php
vc_map(
	array(
		"name" => esc_html__("AB Counter", "consultancy-wp"),
	    "base" => "st_counter",
	    "class" => "vc-st-counter",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "param_name" => "st_template",
                "shortcode" => "st_counter",
                "value" => array(
                    "Layout 1" => "layout1"
                ),
                "std"  => "layout1",
                "admin_label" => true,
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
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class","consultancy-wp"),
                "param_name" => "class",
                "value" => "",
                "description" => esc_html__("Extra Class","consultancy-wp"),
                "group" => esc_html__("General", "consultancy-wp")
            ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Title Counter","consultancy-wp"),
	            "param_name" => "title",
	            "value" => "",
	            "description" => esc_html__("Title Of Item","consultancy-wp"),
	            "group" => esc_html__("Counter", "consultancy-wp")
	        ),
            array(
                "type"       => "colorpicker",
                "heading"    => esc_html__("Title Color","consultancy-wp"),
                "param_name" => "title_color",
                "value"      => "",
                "group" => esc_html__("Counter", "consultancy-wp")
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon library', "consultancy-wp" ),
                'value' => array(
                    esc_html__( 'Font Awesome', "consultancy-wp" ) => 'fontawesome',
                ),
                "std"  => "",
                'param_name' => 'icon_type',
                'description' => esc_html__( 'Select icon library.', 'consultancy-wp' ),
                "group" => esc_html__("Counter", "consultancy-wp")
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
                "group" => esc_html__("Counter", "consultancy-wp")
            ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Digit","consultancy-wp"),
	            "param_name" => "digit",
	            "value" => "",
	            "description" => esc_html__("Digit","consultancy-wp"),
	            "group" => esc_html__("Counter", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Suffix","consultancy-wp"),
	            "param_name" => "suffix",
	            "value" => "",
	            "description" => esc_html__("Suffix","consultancy-wp"),
	            "group" => esc_html__("Counter", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Prefix","consultancy-wp"),
	            "param_name" => "prefix",
	            "value" => "",
	            "description" => esc_html__("Prefix","consultancy-wp"),
	            "group" => esc_html__("Counter", "consultancy-wp")
	        )
		)
	)
);

class WPBakeryShortCode_st_counter extends WPBakeryShortCode
{
    function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title' => '',
            'title_color' => '',
            'suffix' => '',
            'prefix' => '',
            'digit' => '50',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

        wp_enqueue_script( 'waypoints', vc_asset_url( '/js/waypoints.min.js' ), array( 'jquery' ), '1.6.2', true );

        global $consultancy_counter_template, $consultancy_counter_title, $consultancy_counter_title_color, $consultancy_counter_icon, $consultancy_counter_suffix, $consultancy_counter_prefix, $consultancy_counter_digit, $consultancy_counter_extra_class;

        $consultancy_counter_template = $atts['st_template'];
        $consultancy_counter_title = $atts['title'];
        $consultancy_counter_title_color = $atts['title_color'];
        $consultancy_counter_icon = $atts['icon_fontawesome'];
        $consultancy_counter_suffix = $atts['suffix'];
        $consultancy_counter_prefix = $atts['prefix'];
        $consultancy_counter_digit = $atts['digit'];
        $consultancy_counter_extra_class = $atts['class'];

        ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/counter-' . $consultancy_counter_template . '.php');

        return ob_get_clean();
    }
}
?>