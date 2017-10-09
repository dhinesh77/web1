<?php
vc_map(
	array(
		"name" => esc_html__("AB Feature Box", "consultancy-wp"),
	    "base" => "st_feature_box",
	    "class" => "vc-st-fancy-boxes",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "param_name" => "st_template",
                "admin_label" => true,
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "value" => array(
                    "Layout 1" => "layout1",
                    "Layout 2" => "layout2",
                    "Layout 3" => "layout3"
                ),
				"std"  => "",
                "shortcode" => "st_feature_box",
                "group" => esc_html__("General", "consultancy-wp"),
            ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Content Align","consultancy-wp"),
	            "param_name" => "content_align",
	            "value" => array(
	            	"Default" => "text-default",
	            	"Left" => "text-left",
                    "Center" => "text-center",
	            	"Right" => "text-right"
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
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', "consultancy-wp" ),
				'value' => array(
					__( 'Font Awesome', "consultancy-wp" ) => 'fontawesome',
					__( 'Open Iconic', "consultancy-wp" ) => 'openiconic',
					__( 'Typicons', "consultancy-wp" ) => 'typicons',
					__( 'Entypo', "consultancy-wp" ) => 'entypo',
					__( 'Linecons', "consultancy-wp" ) => 'linecons',
					__( 'Pixel', "consultancy-wp" ) => 'pixelicons',
					__( 'P7 Stroke', "consultancy-wp" ) => 'pe7stroke',
				),
                "std"  => "",
				'param_name' => 'icon_type',
				'description' => esc_html__( 'Select icon library.', 'consultancy-wp' ),
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
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
				"group" => esc_html__("Feature Box", "consultancy-wp")
			),
			array(
	            "type" => "attach_image",
	            "heading" => esc_html__("Image Item","consultancy-wp"),
	            "param_name" => "image",
	            "group" => esc_html__("Feature Box", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Title Item","consultancy-wp"),
	            "param_name" => "title_item",
	            "value" => "",
	            "description" => esc_html__("Title Of Item","consultancy-wp"),
				"admin_label" => true,
	            "group" => esc_html__("Feature Box", "consultancy-wp")
	        ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("SubTitle Item","consultancy-wp"),
                "param_name" => "subtitle_item",
                "value" => "",
                "description" => esc_html__("SubTitle Of Item","consultancy-wp"),
                "group" => esc_html__("Feature Box", "consultancy-wp")
            ),
	        array(
	            "type" => "textarea",
	            "heading" => esc_html__("Content Item","consultancy-wp"),
	            "param_name" => "description_item",
	            "group" => esc_html__("Feature Box", "consultancy-wp")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Button Type","consultancy-wp"),
	            "param_name" => "button_type",
	            "value" => array(
	            	"Button" => "button",
	            	"Text" => "text"
	            	),
                "std"  => "",
	            "group" => esc_html__("Button", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Link","consultancy-wp"),
	            "param_name" => "button_link",
	            "value" => "",
	            "description" => esc_html__("Link","consultancy-wp"),
	            "group" => esc_html__("Button", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Text","consultancy-wp"),
	            "param_name" => "button_text",
	            "value" => "",
	            "description" => esc_html__("Text","consultancy-wp"),
	            "group" => esc_html__("Button", "consultancy-wp")
	        )
		)
	)
);

class WPBakeryShortCode_st_feature_box extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title_item' => '',
            'subtitle_item' => '',
            'description_item' => '',
            'image' => '',
            'content_align' => 'text-default',
            'button_type'=> 'button',
            'button_text'=> '',
            'button_link'=> '#',
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

		global $consultancy_feature_box_template, $consultancy_feature_box_title_item, $consultancy_feature_box_subtitle_item, $consultancy_feature_box_description_item, $consultancy_feature_box_image, $consultancy_feature_content_align, $consultancy_feature_button_type, $consultancy_feature_button_text, $consultancy_feature_button_link, $consultancy_feature_icon_type, $consultancy_feature_icon_class, $consultancy_feature_extra_class;

		$consultancy_feature_box_template = $atts['st_template'];
		$consultancy_feature_box_title_item = $atts['title_item'];
		$consultancy_feature_box_subtitle_item = $atts['subtitle_item'];
		$consultancy_feature_box_description_item = $atts['description_item'];
		$consultancy_feature_box_image = $atts['image'];
		$consultancy_feature_content_align = $atts['content_align'];
		$consultancy_feature_button_type = $atts['button_type'];
		$consultancy_feature_button_text = $atts['button_text'];
		$consultancy_feature_button_link = $atts['button_link'];
		$consultancy_feature_icon_type = $atts['icon_type'];
		$consultancy_feature_extra_class = $atts['class'];

		$icon_name = "icon_" . $atts['icon_type'];
		$consultancy_feature_icon_class = isset($atts[$icon_name])?$atts[$icon_name]:'';

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/feature_box-' . $consultancy_feature_box_template . '.php');

        return ob_get_clean();
    }
}
?>