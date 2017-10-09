<?php
$page_ids = get_all_page_ids();
$pages = array();
for ( $i = 0; $i < count($page_ids); $i++ ) {
    $pages[get_the_title($page_ids[$i])] = $page_ids[$i];
}
vc_map(
	array(
		"name" => esc_html__("AB Carousel", "consultancy-wp"),
	    "base" => "st_carousel",
	    "class" => "vc-st-carousel",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "param_name" => "st_template",
                "shortcode" => "st_carousel",
                "admin_label" => true,
                "value" => array(
                    "Layout 1" => "layout1",
                    "Layout 2" => "layout2",
                    "Layout Carousel Pages" => "pages"
                ),
				"std"  => "layout1",
                "heading" => esc_html__("Layout","consultancy-wp"),
                "group" => esc_html__("General", "consultancy-wp"),
            ),
	    	array(
	            "type" => "loop",
	            "heading" => esc_html__("Source","consultancy-wp"),
	            "param_name" => "source",
	            'settings' => array(
	                'size' => array('hidden' => false, 'value' => 10),
	                'order_by' => array('value' => 'date')
	            ),
	            "group" => esc_html__("General", "consultancy-wp"),
	        ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Select Parent Page', 'consultancy-wp' ),
                'param_name'  => 'parrent_page_id',
                'description' => esc_html__( 'Get page childen of that page. Use for Layout Carousel Pages.', 'consultancy-wp' ),
                'value'       => $pages,
				"std"  => "",
                "group" => esc_html__("Carousel Pages", "consultancy-wp"),
				"dependency" => Array('element' => "st_template", 'value' => array('pages'))
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Specify page NOT SHOW","consultancy-wp"),
                "param_name"	=> "remove",
                "value"			=> "",
                "description" 	=> "Use post ids. EX: 5, 12",
                "group" => esc_html__("Carousel Pages", "consultancy-wp"),
				"dependency" => Array('element' => "st_template", 'value' => array('pages'))
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Number Page Show","consultancy-wp"),
                "param_name"	=> "page_number",
                "value"			=> "",
                "description" 	=> "How many post to show? default: 6",
                "group" => esc_html__("Carousel Pages", "consultancy-wp"),
				"dependency" => Array('element' => "st_template", 'value' => array('pages'))
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
                "description" => __ ( 'Extra small devices (phones, less than 768px)', "consultancy-wp" ),
	            "edit_field_class" => "vc_col-sm-6 vc_carousel_item",
	            "value" => array(1,2,3,4,5,6),
	            "std" => 1,
	            "group" => esc_html__("Carousel Settings", "consultancy-wp")
	        ),
	    	array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Small Devices","consultancy-wp"),
	            "param_name" => "small_items",
                "description" => __ ( 'Small devices (tablets, 768px and up)', "consultancy-wp" ),
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
                "description" => __ ( 'Medium devices (desktops, 992px and up)', "consultancy-wp" ),
	            "value" => array(1,2,3,4,5,6),
	            "std" => 3,
	            "group" => esc_html__("Carousel Settings", "consultancy-wp")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Large Devices","consultancy-wp"),
	            "param_name" => "large_items",
                "description" => __ ( 'Large devices (large desktops, 1200px and up)', "consultancy-wp" ),
	            "edit_field_class" => "vc_col-sm-6 vc_carousel_item",
	            "value" => array(1,2,3,4,5,6),
	           	"std" => 4,
	            "group" => esc_html__("Carousel Settings", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Margin Items","consultancy-wp"),
	            "param_name" => "margin",
	            "description" => esc_html__("Margin Items","consultancy-wp"),
				"std"  => "",
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
	    )
	)
);

class WPBakeryShortCode_st_carousel extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'remove' => '',
            'xsmall_items' => 1,
            'small_items' => 2,
            'medium_items' => 3,
            'large_items' => 4,
            'margin' => '10',
            'page_number' => '6',
            'remove' => '',
            'parrent_page_id' => '',
            'loop' => false,
            'nav' => true,
            'dots' => false,
            'autoplay' => true,
            'class' => '',
        ), $atts);

        $atts = array_merge($atts_extra,$atts);

		global $consultancy_carousel_template, $consultancy_carousel_abposts, $consultancy_carousel_xsmall_items, $consultancy_carousel_small_items, $consultancy_carousel_medium_items, $consultancy_carousel_large_items, $consultancy_carousel_margin, $consultancy_carousel_loop, $consultancy_carousel_nav, $consultancy_carousel_dots, $consultancy_carousel_autoplay, $consultancy_carousel_extra_class, $consultancy_carousel_page_number, $consultancy_carousel_remove, $consultancy_carousel_parrent_page_id;

		$consultancy_carousel_template = $atts['st_template'];
		$consultancy_carousel_xsmall_items = $atts['xsmall_items'];
		$consultancy_carousel_small_items = $atts['small_items'];
		$consultancy_carousel_medium_items = $atts['medium_items'];
		$consultancy_carousel_large_items = $atts['large_items'];
		$consultancy_carousel_margin = $atts['margin'];
		$consultancy_carousel_page_number = $atts['page_number'];
		$consultancy_carousel_parrent_page_id = $atts['parrent_page_id'];
		$consultancy_carousel_remove = $atts['remove'];
		$consultancy_carousel_loop = $atts['loop'];
		$consultancy_carousel_nav = $atts['nav'];
		$consultancy_carousel_dots = $atts['dots'];
		$consultancy_carousel_autoplay = $atts['autoplay'];
		$consultancy_carousel_extra_class = $atts['class'];

        $source = $atts['source'];
        list($args, $consultancy_carousel_abposts) = vc_build_loop_query($source);
        $atts['posts'] = $consultancy_carousel_abposts;

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/carousel-' . $consultancy_carousel_template . '.php');

        return ob_get_clean();
    }
}
?>