<?php
vc_map(
	array(
		"name" => esc_html__("AB Contact Info", "consultancy-wp"),
	    "base" => "st_contact",
	    "class" => "vc-st-contact",
	    "category" => esc_html__("ThemeAmber", "consultancy-wp"),
	    "params" => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Phone', 'consultancy-wp' ),
				'param_name'  => 'phone',
				'description' => esc_html__( 'Enter phone number.', 'consultancy-wp' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Email', 'consultancy-wp' ),
				'param_name'  => 'email',
				'description' => esc_html__( 'Enter email.', 'consultancy-wp' ),
			),
			array(
					"type" => "dropdown",
					"param_name" => "st_template",
					"admin_label" => true,
					"heading" => esc_html__("Contact Infor Layout","consultancy-wp"),
					"value" => array(
							"Layout 1" => "layout1",
					),
					"std"  => "",
					"group" => esc_html__("Layout", "consultancy-wp"),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra Class","consultancy-wp"),
				"param_name" => "class",
				"value" => "",
				"description" => esc_html__("Extra Class","consultancy-wp")
			),

		)
	)
);

class WPBakeryShortCode_st_contact extends WPBakeryShortCode
{
	function content( $atts, $content = null ) {

        $atts_extra = shortcode_atts(array(
            'st_template' => 'layout1',
            'phone' => '',
            'email' => '',
            'class' => '',
        ), $atts);


        $atts = array_merge($atts_extra,$atts);

		global $consultancy_contact_template, $consultancy_contact_phone, $consultancy_contact_email, $consultancy_contact_extra_class;

		$consultancy_contact_template = $atts['st_template'];
		$consultancy_contact_phone = $atts['phone'];
		$consultancy_contact_email = $atts['email'];
		$consultancy_contact_extra_class = $atts['class'];

		ob_start();

		require(get_template_directory() . '/inc/vc_extend/layout/contact-' . $consultancy_contact_template . '.php');

        return ob_get_clean();
    }
}
?>