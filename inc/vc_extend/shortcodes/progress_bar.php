<?php
vc_map(
	array(
		"name" => esc_html__("AB Progress Bar", "consultancy-wp"),
	    "base" => "st_progress_bar",
	    "class" => "vc-st-progressbar",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "param_name" => "st_template",
                "admin_label" => true,
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "value" => array(
                    "Layout 1" => "layout1"
                ),
				"std"  => "layout1",
                "shortcode" => "st_feature_box",
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
	            "heading" => esc_html__("Mode","consultancy-wp"),
	            "param_name" => "mode",
	            "value" => array(
	            	"Horizontal" => "horizontal",
	            	"Vertical" => "vertical"
	            	),
				"std"  => "",
	            "group" => esc_html__("Progress Bar", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Item Title","consultancy-wp"),
	            "param_name" => "item_title",
	            "value" => "",
	            "description" => esc_html__("Item Title","consultancy-wp"),
	            "group" => esc_html__("Progress Bar", "consultancy-wp")
	        ),
	        array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Title', "consultancy-wp" ),
				'param_name' => 'icon',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Progress Bar", "consultancy-wp")
			),
			array(
			"type" => "dropdown",
			"heading" => __ ( 'Show Value', "consultancy-wp" ),
			"param_name" => "show_value",
			"value" => array(
					"Yes" => "true",
					"No" => "false"
			),
			"description" => '',
            "std"  => "",
			"group" => esc_html__("Progress Bar", "consultancy-wp")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"value" => "",
				"heading" => __ ( "Value", "consultancy-wp" ),
				"param_name" => "value",
				"description" => "Number only, ex: 60",
				"group" => esc_html__("Progress Bar", "consultancy-wp")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Value Suffix", "consultancy-wp" ),
				"group" => esc_html__("Progress Bar", "consultancy-wp"),
				"param_name" => "value_suffix",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => __ ( 'Background Color Bar', "consultancy-wp" ),
				"param_name" => "bg_color",
				"group" => esc_html__("Progress Bar", "consultancy-wp"),
				"value" =>"",
				"description" => esc_html__('Background color for wrapper bar. Default is #eeeeee',"consultancy-wp")
			),
			array(
				"type" => "colorpicker",
				"heading" => __ ( 'Progress Color', "consultancy-wp" ),
				"param_name" => "color",
				"group" => esc_html__("Progress Bar", "consultancy-wp"),
				"description" => esc_html__('Background color for progress.',"consultancy-wp")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Width", "consultancy-wp" ),
				"param_name" => "width",
				"value" => "",
				"group" => esc_html__("Progress Bar", "consultancy-wp"),
				"description" => "in px,%,..."
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Height", "consultancy-wp" ),
				"param_name" => "height",
				"value" => "",
				"group" => esc_html__("Progress Bar", "consultancy-wp"),
				"description" => "in px,%,..."
			),
			array(
			    "type" => "textfield",
			    "heading" => __ ( 'Border Radius', "consultancy-wp" ),
			    "param_name" => "border_radius",
			    "group" => esc_html__("Progress Bar", "consultancy-wp"),
			    "description" => 'px,%,...'
			),
			array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Striped","consultancy-wp"),
	            "param_name" => "striped",
	            "value" => array(
	            	"Yes" => "yes",
	            	"No" => "no"
	            	),
                "std"  => "",
	            "group" => esc_html__("Progress Bar", "consultancy-wp")
	        ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Animated","consultancy-wp"),
                "param_name" => "animated",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "std"  => "",
                "group" => esc_html__("Progress Bar", "consultancy-wp")
            )
	    )
	)
);

class WPBakeryShortCode_st_progress_bar extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'mode' => 'vertical',
            'item_title' => '',
            'icon' => '',
            'show_value' => 'false',
            'value'=> '60',
            'value_suffix'=> '',
            'bg_color'=> '#eee',
            'color'=> '',
            'width'=> '100%',
            'height'=> '50px',
            'border_radius'=> '',
            'striped'=> 'no',
            'class' => '',
        ), $atts);
        
        $atts = array_merge($atts_extra,$atts);

        /* CSS */
        wp_register_style('bootstrap-progressbar', get_template_directory_uri() . "/css/bootstrap-progressbar.min.css","","0.7.0","all");
        wp_enqueue_style('bootstrap-progressbar');

		global $consultancy_progress_bar_template, $consultancy_progress_bar_mode, $consultancy_progress_bar_item_title, $consultancy_progress_bar_icon, $consultancy_progress_bar_show_value, $consultancy_progress_bar_value, $consultancy_progress_bar_value_suffix, $consultancy_progress_bar_bg_color, $consultancy_progress_bar_color, $consultancy_progress_bar_width, $consultancy_progress_bar_height, $consultancy_progress_bar_border_radius, $consultancy_progress_bar_striped, $consultancy_progress_bar_vertical, $consultancy_progress_bar_animated, $consultancy_progress_bar_extra_class;

		$consultancy_progress_bar_template = $atts['st_template'];
		$consultancy_progress_bar_mode = $atts['mode'];
		$consultancy_progress_bar_item_title = $atts['item_title'];
		$consultancy_progress_bar_icon = $atts['icon'];
		$consultancy_progress_bar_show_value = $atts['show_value'];
		$consultancy_progress_bar_value = $atts['value'];
		$consultancy_progress_bar_value_suffix = $atts['value_suffix'];
		$consultancy_progress_bar_bg_color = $atts['bg_color'];
		$consultancy_progress_bar_color = $atts['color'];
		$consultancy_progress_bar_width = $atts['width'];
		$consultancy_progress_bar_height = $atts['height'];
		$consultancy_progress_bar_border_radius = $atts['border_radius'];
		$consultancy_progress_bar_extra_class = $atts['class'];

		$consultancy_progress_bar_vertical       = ($atts['mode']=='vertical')?true:false;
		$consultancy_progress_bar_striped        = ($atts['striped']=='yes')?true:false;
		$consultancy_progress_bar_animated       = ($atts['animated']=='yes')?true:false;

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/progress_bar-' . $consultancy_progress_bar_template . '.php');

        return ob_get_clean();
    }
}
?>