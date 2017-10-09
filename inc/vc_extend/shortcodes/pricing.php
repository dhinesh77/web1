<?php
vc_map(
	array(
		"name" => esc_html__("AB Pricing Table", "consultancy-wp"),
	    "base" => "st_pricing",
	    "class" => "vc-st-pricing",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "param_name" => "st_template",
                "shortcode" => "st_pricing",
                "value" => array(
                    "Layout 1" => "layout1",
                ),
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
	            "group" => esc_html__("General", "consultancy-wp")
	        ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class","consultancy-wp"),
                "param_name" => "class",
                "description" => esc_html__("Extra Class","consultancy-wp"),
                "group" => esc_html__("General", "consultancy-wp")
            ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Title","consultancy-wp"),
	            "param_name" => "title",
	            "description" => esc_html__("Title of Pricing","consultancy-wp"),
	            "group" => esc_html__("Pricing Table", "consultancy-wp")
	        ),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Price","consultancy-wp"),
				"param_name" => "price",
				"description" => esc_html__("Price (insert number)","consultancy-wp"),
				"group" => esc_html__("Pricing Table", "consultancy-wp")
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Time","consultancy-wp"),
				"param_name" => "time",
				"description" => esc_html__("Time","consultancy-wp"),
				"group" => esc_html__("Pricing Table", "consultancy-wp")
			),
	        array(
	            "type" => "textarea",
	            "heading" => esc_html__("Description","consultancy-wp"),
	            "param_name" => "description",
	            "description" => esc_html__("Description","consultancy-wp"),
	            "group" => esc_html__("Pricing Table", "consultancy-wp")
	        ),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Popular","consultancy-wp"),
				"param_name" => "popular",
				"description" => esc_html__("Popular","consultancy-wp"),
				"group" => esc_html__("Button", "consultancy-wp")
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Button Text', 'consultancy-wp' ),
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
		)
	)
);

class WPBakeryShortCode_st_pricing extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title' => '',
            'popular' => '',
            'description' => '',
            'price' => '',
            'time' => '',
            'button_text' => '',
            'link' => '',
            'content_align' => 'text-default',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_pricing_template, $consultancy_pricing_title, $consultancy_pricing_popular, $consultancy_pricing_description, $consultancy_pricing_price, $consultancy_pricing_time, $consultancy_pricing_button_text, $consultancy_pricing_button_link, $consultancy_pricing_content_align, $consultancy_pricing_extra_class;

		$consultancy_pricing_template = $atts['st_template'];
		$consultancy_pricing_title = $atts['title'];
		$consultancy_pricing_popular = $atts['popular'];
		$consultancy_pricing_description = $atts['description'];
		$consultancy_pricing_price = $atts['price'];
		$consultancy_pricing_time = $atts['time'];
		$consultancy_pricing_button_text = $atts['button_text'];
		$consultancy_pricing_button_link = $atts['link'];
		$consultancy_pricing_content_align = $atts['content_align'];
		$consultancy_pricing_extra_class = $atts['class'];

		$st_template = $atts['st_template'];

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/pricing-' . $st_template . '.php');

        return ob_get_clean();
    }

}
?>