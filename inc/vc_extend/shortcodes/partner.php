<?php
vc_map(
	array(
		"name" => esc_html__("AB Partner", "consultancy-wp"),
	    "base" => "st_partner",
	    "class" => "vc-st-partner",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "param_name" => "st_template",
                "shortcode" => "st_partner",
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
	            "heading" => esc_html__("Name","consultancy-wp"),
	            "param_name" => "link",
	            "value" => "",
	            "description" => esc_html__("Partner Link","consultancy-wp"),
	            "group" => esc_html__("Partner", "consultancy-wp")
	        ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Partner Image","consultancy-wp"),
                "param_name" => "image",
                "group" => esc_html__("Partner", "consultancy-wp")
            ),
		)
	)
);

class WPBakeryShortCode_st_partner extends WPBakeryShortCode
{
    function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'content_align' => 'text-default',
            'link' => '#',
            'position' => '',
            'image' => '',
            'description' => '',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

        global $consultancy_partner_template, $consultancy_partner_content_align, $consultancy_partner_link, $consultancy_partner_position, $consultancy_partner_image, $consultancy_partner_description, $consultancy_partner_extra_class;

        $consultancy_partner_template = $atts['st_template'];
        $consultancy_partner_content_align = $atts['content_align'];
        $consultancy_partner_link = $atts['link'];
        $consultancy_partner_position = $atts['position'];
        $consultancy_partner_image = $atts['image'];
        $consultancy_partner_description = $atts['description'];
        $consultancy_partner_extra_class = $atts['class'];

        ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/partner-' . $consultancy_partner_template . '.php');

        return ob_get_clean();
    }
}
?>