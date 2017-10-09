<?php
vc_map(
	array(
		"name" => esc_html__("AB News", "consultancy-wp"),
	    "base" => "st_news",
	    "class" => "vc-st-news",
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
                ),
				"std"  => "",
                "shortcode" => "st_news",
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
				"type" => "textfield",
				"heading" => esc_html__("Day","consultancy-wp"),
				"param_name" => "day",
				"description" => esc_html__("Day","consultancy-wp"),
				"group" => esc_html__("News", "consultancy-wp")
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Month","consultancy-wp"),
				"param_name" => "month",
				"description" => esc_html__("Month","consultancy-wp"),
				"group" => esc_html__("News", "consultancy-wp")
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Year","consultancy-wp"),
				"param_name" => "year",
				"description" => esc_html__("Year","consultancy-wp"),
				"group" => esc_html__("News", "consultancy-wp")
			),
			array(
	            "type" => "attach_image",
	            "heading" => esc_html__("Image Item","consultancy-wp"),
	            "param_name" => "image",
	            "group" => esc_html__("News", "consultancy-wp"),
				"dependency" => Array('element' => "st_template", 'value' => array('layout2'))
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Title Item","consultancy-wp"),
	            "param_name" => "title_item",
	            "value" => "",
	            "description" => esc_html__("Title Of Item","consultancy-wp"),
				"admin_label" => true,
	            "group" => esc_html__("News", "consultancy-wp")
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => esc_html__("Content Item","consultancy-wp"),
	            "param_name" => "description_item",
	            "group" => esc_html__("News", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Link","consultancy-wp"),
	            "param_name" => "link",
	            "description" => esc_html__("Link","consultancy-wp"),
	            "group" => esc_html__("News", "consultancy-wp")
	        ),
		)
	)
);

class WPBakeryShortCode_st_news extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title_item' => '',
            'description_item' => '',
            'image' => '',
            'link'=> '#',
            'day' => '',
            'month' => '',
            'year' => '',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_news_template, $consultancy_news_title_item, $consultancy_news_description_item, $consultancy_news_image, $consultancy_news_link, $consultancy_news_day, $consultancy_news_month, $consultancy_news_year, $consultancy_news_extra_class;

		$consultancy_news_template = $atts['st_template'];
		$consultancy_news_title_item = $atts['title_item'];
		$consultancy_news_description_item = $atts['description_item'];
		$consultancy_news_image = $atts['image'];
		$consultancy_news_day = $atts['day'];
		$consultancy_news_month = $atts['month'];
		$consultancy_news_year = $atts['year'];
		$consultancy_news_link = $atts['link'];
		$consultancy_news_extra_class = $atts['class'];

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/news-' . $consultancy_news_template . '.php');

        return ob_get_clean();
    }
}
?>