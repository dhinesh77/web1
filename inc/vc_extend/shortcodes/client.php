<?php
vc_map(
	array(
		"name" => esc_html__("AB Client - Testimonial", "consultancy-wp"),
	    "base" => "st_client",
	    "class" => "vc-st-client",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "param_name" => "st_template",
                "shortcode" => "st_client",
                "value" => array(
                    "Testimonial" => "layout1",
                    "Testimonial2" => "layout2",
                    "Testimonial3" => "layout3",
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
	            	/* "Left" => "text-left",
	            	"Right" => "text-right",
	            	"Center" => "text-center" */
	            	),
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
	            "param_name" => "title",
	            "value" => "",
	            "description" => esc_html__("Client Name","consultancy-wp"),
	            "group" => esc_html__("Client", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Position","consultancy-wp"),
	            "param_name" => "position",
	            "value" => "",
	            "description" => esc_html__("Position","consultancy-wp"),
	            "group" => esc_html__("Client", "consultancy-wp")
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => esc_html__("Description","consultancy-wp"),
	            "param_name" => "description",
	            "value" => "",
	            "description" => esc_html__("Description","consultancy-wp"),
	            "group" => esc_html__("Client", "consultancy-wp")
	        ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Client Image","consultancy-wp"),
                "param_name" => "image",
                "group" => esc_html__("Client", "consultancy-wp")
            ),
		)
	)
);

class WPBakeryShortCode_st_client extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title' => '',
            'position' => '',
            'description' => '',
            'image' => '',
            'content_align' => 'text-default',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_client_template, $consultancy_client_title, $consultancy_client_position, $consultancy_client_description, $consultancy_client_image, $consultancy_client_content_align, $consultancy_client_extra_class;

		$consultancy_client_template = $atts['st_template'];
		$consultancy_client_title = $atts['title'];
		$consultancy_client_position = $atts['position'];
		$consultancy_client_description = $atts['description'];
		$consultancy_client_image = $atts['image'];
		$consultancy_client_content_align = $atts['content_align'];
		$consultancy_client_extra_class = $atts['class'];

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/client-' . $consultancy_client_template . '.php');

        return ob_get_clean();
    }
}
?>