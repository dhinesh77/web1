<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'consultancy_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' consultancy_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function consultancy_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function consultancy_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function consultancy_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'consultancy_page_meta_boxes' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function consultancy_page_meta_boxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_st_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__( 'Page Settings', 'consultancy-wp' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on_cb'    => 'st_show_if_front_page', // function should return a bool value
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $cmb_demo->add_field( array(
        'name'       => esc_html__( 'Transparent Header?', 'consultancy-wp' ),
        'desc'       => esc_html__( 'Transparent header, use transparent logo from theme option.', 'consultancy-wp' ),
        'id'   => $prefix . 'transparent_header',
        'type'       => 'select',
        'default'    => 'no',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'consultancy-wp' ),
            'no'   => esc_html__( 'No', 'consultancy-wp' ),
        ),
    ) );

    $cmb_demo->add_field( array(
        'name'       => esc_html__( 'Page Layout', 'consultancy-wp' ),
        'desc'       => esc_html__( 'Set the page layout, inherit from Theme Option by default.', 'consultancy-wp' ),
        'id'         => $prefix . 'page_layout',
        'type'       => 'select',
        'default'    => 'sidebar-default',
        'options'          => array(
            'default-sidebar' => esc_html__( 'Default', 'consultancy-wp' ),
            'right-sidebar'   => esc_html__( 'Blog Sidebar', 'consultancy-wp' ),
            'left-sidebar'    => esc_html__( 'Page Sidebar', 'consultancy-wp' ),
            'no-sidebar'      => esc_html__( 'No Sidebar', 'consultancy-wp' ),
            'full-screen'     => esc_html__( 'Full Screen', 'consultancy-wp' ),
        ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Hide page title?', 'consultancy-wp' ),
        'id'      => $prefix . 'hide_page_title',
        'default'    => 'no',
        'type'       => 'select',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'consultancy-wp' ),
            'no'   => esc_html__( 'No', 'consultancy-wp' ),
        ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Hide Text?', 'consultancy-wp' ),
        'id'      => $prefix . 'hide_breadcrumb',
        'default'    => 'yes',
        'type'       => 'select',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'consultancy-wp' ),
            'no'   => esc_html__( 'No', 'consultancy-wp' ),
        ),
    ) );

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Page Title Custom', 'consultancy-wp' ),
        'desc' => esc_html__( 'Enter in the page title here, accept simple HTML code.', 'consultancy-wp' ),
        'id'   => $prefix . 'page_title',
        'type' => 'textarea_code'
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Title Text Color', 'consultancy-wp' ),
        'desc'    => esc_html__( 'Set title text color.', 'consultancy-wp' ),
        'id'      => $prefix . 'title_text_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Page Subtitle', 'consultancy-wp' ),
        'desc' => esc_html__( 'Enter in the page subtitle here.', 'consultancy-wp' ),
        'id'   => $prefix . 'page_subtitle',
        'type' => 'text_medium'
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'SubTitle Text Color', 'consultancy-wp' ),
        'desc'    => esc_html__( 'Set subtitle text color.', 'consultancy-wp' ),
        'id'      => $prefix . 'subtitle_text_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Page Title Alignment', 'consultancy-wp' ),
        'desc'    => esc_html__( 'Title text to be align', 'consultancy-wp' ),
        'id'      => $prefix . 'page_title_alignment',
        'type'    => 'radio_inline',
        'default' => 'text-left',
        'options' => array(
            'text-left'   => esc_html__( 'Left', 'consultancy-wp' ),
            'text-center' => esc_html__( 'Center', 'consultancy-wp' ),
            'text-right'  => esc_html__( 'Right', 'consultancy-wp' ),
        ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Page Title Padding', 'consultancy-wp' ),
        'desc'    => esc_html__( 'Enter your titpe padding (top right bottom left) in px. Default is: 120px 0', 'consultancy-wp' ),
        'id'      => $prefix . 'page_tilte_padding',
        'type'    => 'text_small',
        'default' => ''
    ) );

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Page Title Background Image', 'consultancy-wp' ),
        'desc' => esc_html__( 'Upload background for page title here.', 'consultancy-wp' ),
        'id'   => $prefix . 'page_title_bg',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Background Parallax?', 'consultancy-wp' ),
        'desc' => esc_html__( 'Background parallax scroll effect.', 'consultancy-wp' ),
        'id'      => $prefix . 'title_background_parallax',
        'default'    => 'yes',
        'type'       => 'select',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'consultancy-wp' ),
            'no'   => esc_html__( 'No', 'consultancy-wp' ),
        ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Page Title Background Color', 'consultancy-wp' ),
        'desc'    => esc_html__( 'Select background color.', 'consultancy-wp' ),
        'id'      => $prefix . 'page_title_bg_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
}


add_action( 'cmb2_admin_init', 'consultancy_portfolio_meta_boxes' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function consultancy_portfolio_meta_boxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ab_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => esc_html__( 'Page Settings', 'consultancy-wp' ),
        'object_types'  => array( 'portfolio', ), // Post type
        'show_on_cb'    => 'st_show_if_front_page', // function should return a bool value
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $cmb_demo->add_field( array(
        'name'       => esc_html__( 'Transparent Header?', 'consultancy-wp' ),
        'desc'       => esc_html__( 'Transparent header, use transparent logo from theme option.', 'consultancy-wp' ),
        'id'   => $prefix . 'transparent_header',
        'type'       => 'select',
        'default'    => 'yes',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'consultancy-wp' ),
            'no'   => esc_html__( 'No', 'consultancy-wp' ),
        ),
    ) );
}