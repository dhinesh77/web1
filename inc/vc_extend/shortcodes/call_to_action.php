<?php
vc_map(
	array(
		"name" => esc_html__("AB Call To Action", "consultancy-wp"),
	    "base" => "st_call_to_action",
	    "class" => "vc-st-call-to-action",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading', 'consultancy-wp' ),
				'param_name'  => 'heading',
				'description' => esc_html__( 'Enter text for heading line.', 'consultancy-wp' ),
			),
			array(
				"type"       => "colorpicker",
				"class"      => "",
				"heading"    => esc_html__("Heading Color","consultancy-wp"),
				"param_name" => "heading_color",
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'SubHeading', 'consultancy-wp' ),
				'param_name'  => 'subheading',
				'description' => esc_html__( 'Enter text for subheading line.', 'consultancy-wp' ),
			),
			array(
				"type"       => "colorpicker",
				"class"      => "",
				"heading"    => esc_html__("SubHeading Color","consultancy-wp"),
				"param_name" => "subheading_color",
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Text Align","consultancy-wp"),
				"param_name" => "text_align",
				"value" => array(
						"Default" => "text-default",
						"Left" => "text-left",
						"Center" => "text-center",
						"Right" => "text-right"
				),
				"std"  => "",
			),
			array(
					"type" => "dropdown",
					"param_name" => "st_template",
					"admin_label" => true,
					"heading" => esc_html__("Call To Action Layout","consultancy-wp"),
					"value" => array(
							"Layout 1" => "layout1",
							"Layout 2" => "layout2",
					),
					"std"  => "",
					"group" => esc_html__("Layout", "consultancy-wp"),
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Button Text', 'consultancy-wp' ),
				"admin_label" => true,
				'param_name'  => 'button_text',
				'group' => esc_html__("Button", "consultancy-wp"),
				'description' => esc_html__( 'Text on the button.', 'consultancy-wp' ),
			),
			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'URL (Link)', 'consultancy-wp' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Button link.', 'consultancy-wp' ),
				'group' => esc_html__("Button", "consultancy-wp"),
			),
            array(
                "type" => "dropdown",
                "param_name" => "st_button_template",
                "admin_label" => true,
                "heading" => esc_html__("Button Layout","consultancy-wp"),
                "value" => array(
                    "Outline Normal" => "layout1",
                    "Outline Main Color" => "layout2",
					"Outline White" => "layout3",
					"Outline Blue" => "layout4",
					"Background Primary" => "layout5",
					"Background Secondary" => "layout6",
					"Background Tertiary" => "layout7",
                    "Custom Background Color" => "custom"
                ),
				"std"  => "",
                "shortcode" => "st_call_to_action",
                "group" => esc_html__("Button", "consultancy-wp"),
            ),
			array(
				"type"       => "colorpicker",
				"class"      => "",
				"heading"    => esc_html__("Custom Button BG Color","consultancy-wp"),
				"param_name" => "button_custom_color",
				"value"      => "",
				"group" => esc_html__("Button", "consultancy-wp"),
				"dependency" => Array('element' => "st_button_template", 'value' => array('custom'))
			),
			array(
				"type"       => "colorpicker",
				"class"      => "",
				"heading"    => esc_html__("Custom Button Text Color","consultancy-wp"),
				"param_name" => "button_custom_text_color",
				"value"      => "",
				"group" => esc_html__("Button", "consultancy-wp"),
				"dependency" => Array('element' => "st_button_template", 'value' => array('custom'))
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
	            	"Left" => "text-left",
                    "Center" => "text-center",
	            	"Right" => "text-right"
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

class WPBakeryShortCode_st_call_to_action extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'heading' => '',
            'heading_color' => '',
            'subheading' => '',
            'subheading_color' => '',
			'text_align' => 'text-default',
			'st_button_template' => 'layout1',
            'button_align' => 'text-default',
			'button_text'               => '',
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
            'icon_openiconic' => '',
            'icon_typicons' => '',
            'icon_entypoicons' => '',
            'icon_linecons' => '',
            'icon_entypo' => '',
            'icon_pe7stroke' => '',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_call_to_action_template, $consultancy_call_to_action_heading, $consultancy_call_to_action_heading_color, $consultancy_call_to_action_subheading, $consultancy_call_to_action_subheading_color, $consultancy_call_to_action_text_align, $consultancy_call_to_action_button_template, $consultancy_call_to_action_button_align, $consultancy_call_to_action_button_text, $consultancy_call_to_action_button_link, $consultancy_call_to_action_button_color, $consultancy_call_to_action_button_custom_color, $consultancy_call_to_action_button_custom_text_color, $consultancy_call_to_action_button_size, $consultancy_call_to_action_button_margin_top, $consultancy_call_to_action_button_margin_bottom, $consultancy_call_to_action_button_margin_left, $consultancy_call_to_action_button_margin_right, $consultancy_call_to_action_button_icon_type, $consultancy_call_to_action_button_icon_class, $consultancy_call_to_action_extra_class;

		$consultancy_call_to_action_template = $atts['st_template'];
		$consultancy_call_to_action_heading = $atts['heading'];
		$consultancy_call_to_action_heading_color = $atts['heading_color'];
		$consultancy_call_to_action_subheading = $atts['subheading'];
		$consultancy_call_to_action_subheading_color = $atts['subheading_color'];
		$consultancy_call_to_action_text_align = $atts['text_align'];
		$consultancy_call_to_action_button_template = $atts['st_button_template'];
		$consultancy_call_to_action_button_align = $atts['button_align'];
		$consultancy_call_to_action_button_text = $atts['button_text'];
		$consultancy_call_to_action_button_link = $atts['link'];
		$consultancy_call_to_action_button_color = $atts['color'];
		$consultancy_call_to_action_button_custom_color = $atts['button_custom_color'];
		$consultancy_call_to_action_button_custom_text_color = $atts['button_custom_text_color'];
		$consultancy_call_to_action_button_size = $atts['size'];
		$consultancy_call_to_action_button_margin_top = $atts['margin_top'];
		$consultancy_call_to_action_button_margin_bottom = $atts['margin_bottom'];
		$consultancy_call_to_action_button_margin_left = $atts['margin_left'];
		$consultancy_call_to_action_button_margin_right = $atts['margin_right'];
		$consultancy_call_to_action_button_icon_type = $atts['icon_type'];
		$consultancy_call_to_action_extra_class = $atts['class'];

		// Icon
		$icon_name = "icon_" . $consultancy_call_to_action_button_icon_type;
		$consultancy_call_to_action_button_icon_class = isset($atts[$icon_name])?$atts[$icon_name]:'';

		$st_template = $atts['st_template'];

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/call_to_action-' . $st_template . '.php');

        return ob_get_clean();
    }
}
?>