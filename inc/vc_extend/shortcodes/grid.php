<?php
$page_ids = get_all_page_ids();
$pages = array();
for ( $i = 0; $i < count($page_ids); $i++ ) {
    $pages[get_the_title($page_ids[$i])] = $page_ids[$i];
}
vc_map(
	array(
		"name" => esc_html__("AB Grid", "consultancy-wp"),
	    "base" => "st_grid",
	    "class" => "vc-st-grid",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "param_name" => "st_template",
                "shortcode" => "st_grid",
                "admin_label" => true,
                "value" => array(
                    "Layout 1" => "layout1",
                    "Layout Portfolio" => "portfolio",
                    "Layout Grid Pages" => "pages"
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
                "std"  => "",
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
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Select Parent Page', 'consultancy-wp' ),
                'param_name'  => 'parrent_page_id',
                'description' => esc_html__( 'Get page childen of that page. Use for Layout Carousel Pages.', 'consultancy-wp' ),
                'value'       => $pages,
                "std"  => "",
                "group" => esc_html__("Grid Pages", "consultancy-wp"),
                "dependency" => Array('element' => "st_template", 'value' => array('pages'))
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Specify page NOT SHOW","consultancy-wp"),
                "param_name"	=> "remove",
                "value"			=> "",
                "description" 	=> "Use post ids. EX: 5, 12",
                "group" => esc_html__("Grid Pages", "consultancy-wp"),
                "dependency" => Array('element' => "st_template", 'value' => array('pages'))
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Number Page Show","consultancy-wp"),
                "param_name"	=> "page_number",
                "value"			=> "",
                "description" 	=> "How many post to show? default: 6",
                "group" => esc_html__("Grid Pages", "consultancy-wp"),
                "dependency" => Array('element' => "st_template", 'value' => array('pages'))
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Grid Title","consultancy-wp"),
                "param_name" => "title",
                "value" => "",
                "description" => esc_html__("Grid Title","consultancy-wp"),
                "group" => esc_html__("Grid Settings", "consultancy-wp"),
            ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Extra Small Devices","consultancy-wp"),
	            "param_name" => "xsmall_items",
                "description" => __ ( 'Extra small devices (phones, less than 768px)', "consultancy-wp" ),
	            "edit_field_class" => "vc_col-sm-6 vc_grid_item",
	            "value" => array(1,2,3,4,6),
	            "std" => 1,
	            "group" => esc_html__("Grid Settings", "consultancy-wp")
	        ),
	    	array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Small Devices","consultancy-wp"),
	            "param_name" => "small_items",
                "description" => __ ( 'Small devices (tablets, 768px and up)', "consultancy-wp" ),
	            "edit_field_class" => "vc_col-sm-6 vc_grid_item",
	            "value" => array(1,2,3,4,6),
	            "std" => 2,
	            "group" => esc_html__("Grid Settings", "consultancy-wp")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Medium Devices","consultancy-wp"),
	            "param_name" => "medium_items",
	            "edit_field_class" => "vc_col-sm-6 vc_grid_item",
                "description" => __ ( 'Medium devices (desktops, 992px and up)', "consultancy-wp" ),
	            "value" => array(1,2,3,4,6),
	            "std" => 3,
	            "group" => esc_html__("Grid Settings", "consultancy-wp")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Large Devices","consultancy-wp"),
	            "param_name" => "large_items",
                "description" => __ ( 'Large devices (large desktops, 1200px and up)', "consultancy-wp" ),
	            "edit_field_class" => "vc_col-sm-6 vc_grid_item",
	            "value" => array(1,2,3,4,6),
	           	"std" => 4,
	            "group" => esc_html__("Grid Settings", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Margin Items","consultancy-wp"),
	            "param_name" => "margin",
	            "value" => "",
	            "description" => esc_html__("Insert number only, ex: 30","consultancy-wp"),
	            "group" => esc_html__("Grid Settings", "consultancy-wp")
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Show Filter","consultancy-wp"),
	            "param_name" => "filter",
	            "value" => array(
	            	"True" => "true",
	            	"False" => "false"
	            	),
                "std"  => "",
	            "group" => esc_html__("Grid Settings", "consultancy-wp")
	        ),
	    )
	)
);

class WPBakeryShortCode_st_grid extends WPBakeryShortCode
{
    function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title' => '',
            'remove' => '',
            'page_number' => '6',
            'xsmall_items' => 1,
            'small_items' => 2,
            'medium_items' => 3,
            'large_items' => 4,
            'margin' => '10',
            'parrent_page_id' => '',
            'filter' => false,
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

        global $consultancy_grid_template, $abg_posts, $consultancy_grid_title, $consultancy_grid_remove, $consultancy_grid_page_number, $consultancy_grid_xsmall_items, $consultancy_grid_small_items, $consultancy_grid_medium_items, $consultancy_grid_large_items, $consultancy_grid_margin, $consultancy_grid_filter, $consultancy_grid_item_class, $consultancy_grid_item_space, $consultancy_grid_extra_class, $consultancy_grid_posts_per_page, $consultancy_grid_post_not_in, $consultancy_grid_post_parent;

        $consultancy_grid_template = $atts['st_template'];
        $consultancy_grid_title = $atts['title'];
        $consultancy_grid_remove = $atts['remove'];
        $consultancy_grid_page_number = $atts['page_number'];
        $consultancy_grid_xsmall_items = $atts['xsmall_items'];
        $consultancy_grid_small_items = $atts['small_items'];
        $consultancy_grid_medium_items = $atts['medium_items'];
        $consultancy_grid_large_items = $atts['large_items'];
        $consultancy_grid_margin = $atts['margin'];
        $consultancy_grid_filter = $atts['filter'];
        $consultancy_grid_extra_class = $atts['class'];

        wp_enqueue_script('shuffle',get_template_directory_uri() . '/js/jquery.shuffle.js',array('jquery'),'',true);

        $source = $atts['source'];
        list($args, $abg_posts) = vc_build_loop_query($source);

        /* get posts */
        $atts['posts'] = $abg_posts;

        $consultancy_grid_item_space = '';
        $consultancy_grid_item_space = $atts['margin'] / 2;

        $col_lg = 12 / $atts['large_items'];
        $col_md = 12 / $atts['medium_items'];
        $col_sm = 12 / $atts['small_items'];
        $col_xs = 12 / $atts['xsmall_items'];
        $consultancy_grid_item_class = "st-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "st-grid";
        $consultancy_grid_extra_class = isset($atts['class'])?$atts['class']:'';

        $consultancy_grid_posts_per_page = esc_attr($atts['page_number']);
        $consultancy_grid_post_not_in   = esc_attr($atts['remove']);
        $consultancy_grid_post_parent    = $atts['parrent_page_id'];

        ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/grid-' . $consultancy_grid_template . '.php');

        return ob_get_clean();
    }
}
?>