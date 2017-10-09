<?php
vc_map(
	array(
		"name" => esc_html__("AB Button", "consultancy-wp"),
	    "base" => "st_button",
	    "class" => "vc-st-button",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Button Text', 'consultancy-wp' ),
				'holder'      => 'button',
				"admin_label" => true,
				'param_name'  => 'title',
				'description' => esc_html__( 'Text on the button.', 'consultancy-wp' )
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'URL (Link)', 'consultancy-wp' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Button link.', 'consultancy-wp' ),
			),
            array(
                "type" => "dropdown",
                "param_name" => "st_template",
                "admin_label" => true,
                "heading" => esc_html__("Button Layout","consultancy-wp"),
                "value" => array(
                    "Outline Normal" => "layout1",
                    "Outline Main Color" => "layout2",
					"Outline White" => "layout3",
					"Outline Blue" => "layout4",
					"Outline Custom Color" => "ocustom",
					"Background Primary" => "layout5",
					"Background Secondary" => "layout6",
					"Background Tertiary" => "layout7",
                    "Background Custom Color" => "custom"
                ),
				"std"  => "",
                "shortcode" => "st_button",
                "group" => esc_html__("Button", "consultancy-wp"),
            ),
			array(
				"type"       => "colorpicker",
				"class"      => "",
				"heading"    => esc_html__("Custom Background,Ouline Color","consultancy-wp"),
				"param_name" => "button_custom_color",
				"value"      => "",
				"group" => esc_html__("Button", "consultancy-wp"),
				"dependency" => Array('element' => "st_template", 'value' => array('ocustom','custom'))
			),
			array(
				"type"       => "colorpicker",
				"class"      => "",
				"heading"    => esc_html__("Custom Text Color","consultancy-wp"),
				"param_name" => "button_custom_text_color",
				"group" => esc_html__("Button", "consultancy-wp"),
				"dependency" => Array('element' => "st_template", 'value' => array('ocustom','custom'))
			),

			array(
				"type" => "dropdown",
				"param_name" => "size",
				"heading" => esc_html__("Button Size","consultancy-wp"),
				"value" => array(
					"Regular Size" => "regular",
					"Large Size" => "large",
					"Small Size" => "small"
				),
				"std"  => "",
				"group" => esc_html__("Button", "consultancy-wp"),
			),

			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Custom Margin Top","consultancy-wp"),
				"param_name"	=> "margin_top",
				"value"			=> "",
				"description" 	=> "Enter number. EX: 50",
				"group" => esc_html__("Button", "consultancy-wp"),
			),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Custom Margin Bottom","consultancy-wp"),
				"param_name"	=> "margin_bottom",
				"value"			=> "",
				"description" 	=> "Enter number. EX: 50",
				"group" => esc_html__("Button", "consultancy-wp"),
			),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Custom Margin Left","consultancy-wp"),
				"param_name"	=> "margin_left",
				"value"			=> "",
				"description" 	=> "Enter number. EX: 50",
				"group" => esc_html__("Button", "consultancy-wp"),
			),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Custom Margin Right","consultancy-wp"),
				"param_name"	=> "margin_right",
				"value"			=> "",
				"description" 	=> "Enter number. EX: 50",
				"group" => esc_html__("Button", "consultancy-wp"),
			),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Button Align","consultancy-wp"),
	            "param_name" => "button_align",
	            "value" => array(
	            	"Default" => "text-default",
	            	"Left" => "left",
                    "Center" => "center",
	            	"Right" => "right"
	            	),
                "std"  => "",
	            "group" => esc_html__("Button", "consultancy-wp")
	        ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class","consultancy-wp"),
                "param_name" => "class",
                "value" => "",
                "description" => esc_html__("Extra Class","consultancy-wp"),
                "group" => esc_html__("Button", "consultancy-wp")
            ),
	        array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', "consultancy-wp" ),
				'value' => array(
					__( 'Font Awesome', "consultancy-wp" ) => 'fontawesome',
					/* esc_html__( 'Open Iconic', "consultancy-wp" ) => 'openiconic',
					__( 'Typicons', "consultancy-wp" ) => 'typicons',
					__( 'Entypo', "consultancy-wp" ) => 'entypo',
					__( 'Linecons', "consultancy-wp" ) => 'linecons',
					__( 'Pixel', "consultancy-wp" ) => 'pixelicons',
					__( 'P7 Stroke', "consultancy-wp" ) => 'pe7stroke', */
				),
                "std"  => "",
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'consultancy-wp' ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_fontawesome',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'fontawesome',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
	        array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_openiconic',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_typicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_entypo',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_linecons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_pixelicons',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pixelicons',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'pixelicons',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon Item', "consultancy-wp" ),
				'param_name' => 'icon_pe7stroke',
	            'value' => '',
				'settings' => array(
					'emptyIcon' => true, // default true, display an "EMPTY" icon?
					'type' => 'pe7stroke',
					'iconsPerPage' => 200, // default 200, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'pe7stroke',
				),
				'description' => esc_html__( 'Select icon from library.', "consultancy-wp" ),
				"group" => esc_html__("Icon", "consultancy-wp")
			),

		)
	)
);

class WPBakeryShortCode_st_button extends WPBakeryShortCode
{

    function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'button_align' => 'text-default',
			'title'               => '',
			'link'                => '',
			'color'               => '',
			'button_custom_color' => '',
			'button_custom_text_color' => '',
			'size'                => '',
			'margin_top'          => '',
			'margin_bottom'       => '',
			'margin_left'         => '',
			'margin_right'        => '',
            'icon_type' => 'fontawesome',
            'icon_fontawesome' => '',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_button_title, $consultancy_button_template, $consultancy_button_align, $consultancy_button_link, $consultancy_button_color, $consultancy_button_custom_color, $consultancy_button_custom_text_color, $consultancy_button_size, $consultancy_button_margin_top, $consultancy_button_margin_bottom, $consultancy_button_margin_left, $consultancy_button_margin_right, $consultancy_button_icon_type, $consultancy_button_icon_class, $consultancy_button_extra_class;

		$consultancy_button_template = $atts['st_template'];
		$consultancy_button_title = $atts['title'];	
		$consultancy_button_align = $atts['button_align'];
		$consultancy_button_link = $atts['link'];
		$consultancy_button_color = $atts['color'];
		$consultancy_button_custom_color = $atts['button_custom_color'];
		$consultancy_button_custom_text_color = $atts['button_custom_text_color'];
		$consultancy_button_size = $atts['size'];
		$consultancy_button_margin_top = $atts['margin_top'];
		$consultancy_button_margin_bottom = $atts['margin_bottom'];
		$consultancy_button_margin_left = $atts['margin_left'];
		$consultancy_button_margin_right = $atts['margin_right'];
		$consultancy_button_icon_type = $atts['icon_type'];
		$consultancy_button_extra_class = $atts['class'];

		// Icon
		$icon_name = "icon_" . $consultancy_button_icon_type;
		$consultancy_button_icon_class = isset($atts[$icon_name])?$atts[$icon_name]:'';

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/button-' . $consultancy_button_template . '.php');

        return ob_get_clean();
    }
}

?>