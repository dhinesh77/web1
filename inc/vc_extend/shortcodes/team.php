<?php
vc_map(
	array(
		"name" => esc_html__("AB Team", "consultancy-wp"),
	    "base" => "st_team",
	    "class" => "vc-st-team",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Shortcode Template","consultancy-wp"),
                "param_name" => "st_template",
                "shortcode" => "st_team",
                "value" => array(
                    "Layout 1" => "layout1",
                    "Layout 2" => "layout2"
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
	            "param_name" => "title",
	            "value" => "",
	            "description" => esc_html__("Team Name","consultancy-wp"),
	            "group" => esc_html__("Team", "consultancy-wp")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => esc_html__("Position","consultancy-wp"),
	            "param_name" => "position",
	            "value" => "",
	            "description" => esc_html__("Position","consultancy-wp"),
	            "group" => esc_html__("Team", "consultancy-wp")
	        ),
	        array(
	            "type" => "textarea",
	            "heading" => esc_html__("Description","consultancy-wp"),
	            "param_name" => "description",
	            "value" => "",
	            "description" => esc_html__("Description","consultancy-wp"),
	            "group" => esc_html__("Team", "consultancy-wp")
	        ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Team Image","consultancy-wp"),
                "param_name" => "image",
                "group" => esc_html__("Team", "consultancy-wp")
            ),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Facebook","consultancy-wp"),
				"param_name"	=> "facebook",
				"value"			=> "",
				"description" 	=> "Insert your facebook link here",
				"group" => esc_html__("Social", "consultancy-wp"),
			),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Twitter","consultancy-wp"),
				"param_name"	=> "twitter",
				"value"			=> "",
				"description" 	=> "Insert your twitter link here",
				"group" => esc_html__("Social", "consultancy-wp"),
			),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Pinterest","consultancy-wp"),
				"param_name"	=> "pinterest",
				"value"			=> "",
				"description" 	=> "Insert your pinterest link here",
				"group" => esc_html__("Social", "consultancy-wp"),
			),
			array(
				"type"			=> "textfield",
				"class"			=> "",
				"heading"		=> esc_html__("Google +","consultancy-wp"),
				"param_name"	=> "google",
				"value"			=> "",
				"description" 	=> "Insert your google+ link here",
				"group" => esc_html__("Social", "consultancy-wp"),
			),
		)
	)
);

class WPBakeryShortCode_st_team extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'title' => '',
            'position' => '',
            'description' => '',
            'image' => '',
            'facebook' => '#',
            'twitter' => '#',
            'pinterest' => '#',
            'google' => '#',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_team_template, $consultancy_team_title, $consultancy_team_position, $consultancy_team_description, $consultancy_team_image, $consultancy_team_facebook, $consultancy_team_twitter, $consultancy_team_pinterest, $consultancy_team_google, $consultancy_team_extra_class;

		$consultancy_team_template = $atts['st_template'];
		$consultancy_team_title = $atts['title'];
		$consultancy_team_position = $atts['position'];
		$consultancy_team_description = $atts['description'];
		$consultancy_team_image = $atts['image'];
		$consultancy_team_facebook = $atts['facebook'];
		$consultancy_team_twitter = $atts['twitter'];
		$consultancy_team_pinterest = $atts['pinterest'];
		$consultancy_team_google = $atts['google'];
		$consultancy_team_extra_class = $atts['class'];

        ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/team-' . $consultancy_team_template . '.php');

        return ob_get_clean();
    }
}
?>