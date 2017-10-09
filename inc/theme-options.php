<?php

/**
 * Theme Options Config
 */

if ( ! class_exists( 'ThemeAmber_Options_Config' ) ) {

    class ThemeAmber_Options_Config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if ( ! class_exists( 'ReduxFramework' ) ) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->consultancy_initSettings();
            } else {
                add_action( 'plugins_loaded', array( $this, 'consultancy_initSettings' ), 10 );
            }

        }

        public function consultancy_initSettings() {

            // Set the default arguments
            $this->consultancy_setArguments();

            // Set a few help tabs so you can see how it's done
            $this->consultancy_setHelpTabs();

            // Create the sections and fields
            $this->consultancy_setSections();

            if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
        }

        public function consultancy_setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'      => 'redux-help-tab-1',
                'title'   => esc_html__( 'Theme Information 1', 'consultancy-wp' ),
                'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'consultancy-wp' )
            );

            $this->args['help_tabs'][] = array(
                'id'      => 'redux-help-tab-2',
                'title'   => esc_html__( 'Theme Information 2', 'consultancy-wp' ),
                'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'consultancy-wp' )
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'consultancy-wp' );
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function consultancy_setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'           => 'st_options',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'       => $theme->get( 'Name' ),
                // Name that appears at the top of your panel
                'display_version'    => false,
                // Version that appears at the top of your panel
                'menu_type'          => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'     => true,
                // Show the sections below the admin menu item or not
                'menu_title'         => esc_html__( 'Theme Options', 'consultancy-wp' ),
                'page_title'         => esc_html__( 'Theme Options', 'consultancy-wp' ),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'     => '',
                // Must be defined to add google fonts to the typography module

                'async_typography'   => false,
                // Use a asynchronous font on the front end or font string
                'admin_bar'          => true,
                // Show the panel pages on the admin bar
                'global_variable'    => 'st_option',
                // Set a different name for your global variable other than the opt_name
                'dev_mode'           => false,
                // Show the time the page took to load, etc
                'customizer'         => false,
                // Enable basic customizer support

                // OPTIONAL -> Give you extra features
                'page_priority'      => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'        => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'   => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon'          => '',
                // Specify a custom URL to an icon
                'last_tab'           => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon'          => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug'          => 'consultancy_options',
                // Page slug used to denote the panel
                'save_defaults'      => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show'       => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark'       => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time'     => 60 * MINUTE_IN_SECONDS,
                'output'             => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'         => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                'footer_credit'     => ' ',
                // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'           => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'        => false,
                // REMOVE

                // HINTS
                'hints'              => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'   => 'light',
                        'shadow'  => true,
                        'rounded' => false,
                        'style'   => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'click mouseleave',
                        ),
                    ),
                )
            );

            // Panel Intro text -> before the form
            if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                if ( ! empty( $this->args['global_variable'] ) ) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace( '-', '_', $this->args['opt_name'] );
                }

            }
        }

        public function consultancy_setSections() {

            /* GENERAL SETTINGS /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'General', 'consultancy-wp' ),
                //'desc'   => sprintf( esc_html__( 'Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at: %d', 'consultancy-wp' ), '<a href="' . 'https://' . 'github.com/ReduxFramework/Redux-Framework">' . 'https://' . 'github.com/ReduxFramework/Redux-Framework</a>' ),
                'desc'   => '',
                'icon'   => 'el-icon-home el-icon-large',
                'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(

                    array(
                        'id'        => 'logo_setting',
                        'type'      => 'info',
                        'desc'      => esc_html__('Logo Settings', 'consultancy-wp')
                    ),
                    array(
                        'id'       =>'site_logo',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Site Logo', 'consultancy-wp'),
                        'default'  => array( 'url' => get_template_directory_uri() .'/images/logo.png' ),
                        'subtitle' => esc_html__('Upload your logo here.', 'consultancy-wp'),
                    ),
                    array(
                        'id'       =>'site_transparent_logo',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Transparent Logo', 'consultancy-wp'),
                        'default'  => array( 'url' => get_template_directory_uri() .'/images/logo_transparent.png' ),
                        'subtitle' => esc_html__('Upload your transparent logo here, transparent logo display on a transparent header when applicable.', 'consultancy-wp'),
                    ),
                    array(
                        'id'             => 'logo_margin',
                        'type'           => 'spacing',
                        'output'         => array('.site-header .site-branding'),
                        'mode'           => 'margin',
                        'units'          => array('px'),
                        'units_extended' => 'false',
                        'title'          => esc_html__('Logo Margin', 'consultancy-wp'),
                        'subtitle'       => '',
                        'desc'           => esc_html__('Set your logo margin in px. ee.g. 20', 'consultancy-wp'),
                        'default'        => array(
                            'margin-top'     => '0px',
                            'margin-right'   => '0px',
                            'margin-bottom'  => '0px',
                            'margin-left'    => '0px',
                            'units'          => 'px',
                        )

                    ),

                    array(
                        'id'        => 'favicon_setting',
                        'type'      => 'info',
                        'desc'      => esc_html__('Favicon Settings', 'consultancy-wp')
                    ),
                    array(
                        'id'       =>'site_favicon',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Site Favicon', 'consultancy-wp'),
                        'default'  => '',
                        'subtitle' => esc_html__('Upload your Favicon (16x16px ico/png - use favicon.cc to make sure its fully compatible)', 'consultancy-wp'),
                    ),
                    array(
                        'id'       =>'site_iphone_icon',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Apple iPhone Icon ', 'consultancy-wp'),
                        'default'  => '',
                        'subtitle' => esc_html__('iPhone icon (57px x 57px).', 'consultancy-wp'),
                    ),

                    array(
                        'id'       =>'site_iphone_icon_retina',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Apple iPhone Retina Icon ', 'consultancy-wp'),
                        'default'  => '',
                        'subtitle' => esc_html__('iPhone retina icon (114px x 114px).', 'consultancy-wp'),
                    ),

                    array(
                        'id'       =>'site_ipad_icon',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Apple iPad Icon ', 'consultancy-wp'),
                        'default'  => '',
                        'subtitle' => esc_html__('iPad icon (72px x 72px).', 'consultancy-wp'),
                    ),

                    array(
                        'id'       =>'site_ipad_icon_retina',
                        'url'      => false,
                        'type'     => 'media',
                        'title'    => esc_html__('Apple iPad Retina Icon ', 'consultancy-wp'),
                        'default'  => '',
                        'subtitle' => esc_html__('iPad retina icon (144px x 144px).', 'consultancy-wp'),
                    ),

                    array(
                        'id'        => 'other_setting',
                        'type'      => 'info',
                        'desc'      => esc_html__('Other Settings', 'consultancy-wp')
                    ),
                    array(
                        'id'       => 'page_comments',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Page Comments?', 'consultancy-wp'),
                        'subtitle' => esc_html__('Do you want to enable comments on single page?', 'consultancy-wp'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'page_loading',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Page Loading?', 'consultancy-wp'),
                        'subtitle' => esc_html__('Do you want to enable loading effect?', 'consultancy-wp'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'scroll_totop',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Scroll To Top Button?', 'consultancy-wp'),
                        'subtitle' => esc_html__('Do you want to enable scroll to top button?', 'consultancy-wp'),
                        'default'  => true,
                    ),
                )
            );

            /* LAYOUTS /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Layout', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el-icon-th el-icon-large',
                'submenu' => true,
                'fields' => array(
                    array(
                        'id'       => 'site_boxed',
                        'type'     => 'switch',
                        'title'    => esc_html__('Boxed Layout?', 'consultancy-wp'),
                        'subtitle' => esc_html__('Enable boxed layout?', 'consultancy-wp'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'page_layout',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Page Layout', 'consultancy-wp' ),
                        'subtitle' => esc_html__( 'Default page layout.', 'consultancy-wp' ),
                        'options'  => array(
                            'left-sidebar'  => 'Left Sidebar',
                            'no-sidebar'    => 'No Sidebar',
                            'right-sidebar' => 'Right Sidebar'
                        ),
                        'default'  => 'no-sidebar'
                    ),
                    array(
                        'id'       => 'archive_layout',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Archive Layout', 'consultancy-wp' ),
                        'subtitle' => esc_html__( 'Default archive layout ( front page, category, tag, search, author, archive ).', 'consultancy-wp' ),
                        'options'  => array(
                            'left-sidebar'  => 'Left Sidebar',
                            'no-sidebar'    => 'No Sidebar',
                            'right-sidebar' => 'Right Sidebar'
                        ),
                        'default'  => 'right-sidebar'
                    ),
                    array(
                        'id'       => 'blog_layout',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Blog Layout', 'consultancy-wp' ),
                        'subtitle' => esc_html__( 'Set your blog layout to display, i_nclude blog page and single blog post.', 'consultancy-wp' ),
                        'options'  => array(
                            'left-sidebar'  => 'Left Sidebar',
                            'no-sidebar'    => 'No Sidebar',
                            'right-sidebar' => 'Right Sidebar'
                        ),
                        'default'  => 'right-sidebar'
                    ),
                    array(
                        'id'       => 'single_shop_layout',
                        'type'     => 'button_set',
                        'title'    => esc_html__( 'Single WooCommerce Product Layout', 'consultancy-wp' ),
                        'subtitle' => esc_html__( 'Layout for single product and products archive.', 'consultancy-wp' ),
                        'options'  => array(
                            'left-sidebar'  => 'Left Sidebar',
                            'no-sidebar'    => 'No Sidebar',
                            'right-sidebar' => 'Right Sidebar'
                        ),
                        'default'  => 'right-sidebar'
                    ),
                )
            );

            /* SOCIAL /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Social Connect', 'consultancy-wp' ),
                'desc'   => 'Please enter your social url and then active them in header, footer options. URLs i_nclude "http://".',
                'icon'   => 'el el-twitter',
                'submenu' => true,
                'fields' => array(
                    array(
                        'id'       =>'facebook',
                        'type'     => 'text',
                        'title'    => esc_html__('Facebook', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Facebook URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'twitter',
                        'type'     => 'text',
                        'title'    => esc_html__('Twitter', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Twitter URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'linkedin',
                        'type'     => 'text',
                        'title'    => esc_html__('Linkedin', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Linkedin URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'google',
                        'type'     => 'text',
                        'title'    => esc_html__('Google Plus', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Google Plus URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'flickr',
                        'type'     => 'text',
                        'title'    => esc_html__('Flickr', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Flickr URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'pinterest',
                        'type'     => 'text',
                        'title'    => esc_html__('Pinterest', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Pinterest URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'instagram',
                        'type'     => 'text',
                        'title'    => esc_html__('Instagram', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Instagram URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),
                    array(
                        'id'       =>'youtube',
                        'type'     => 'text',
                        'title'    => esc_html__('Youtube', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Youtube URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),

                    array(
                        'id'       =>'email',
                        'type'     => 'text',
                        'title'    => esc_html__('Email', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter your Email URL.', 'consultancy-wp'),
                        'default'  => '#',
                    ),

                )
            );

            /* HEADER /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Header', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el-icon-th-list',
                'submenu' => true,
                'fields' => array(

                    array(
                        'id'       => 'header_sticky',
                        'type'     => 'switch',
                        'title'    => esc_html__('Header Sticky.', 'consultancy-wp'),
                        'default'  => true,
                    ),

                    // Header Top Bar
                    array(
                        'id'       => 'header_social',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable header social icon', 'consultancy-wp'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'header_facebook',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Facebook', 'consultancy-wp'),
                        'subtitle'  => 'Enable Facebook',
                        'default'  => true,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_twitter',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Twitter', 'consultancy-wp'),
                        'subtitle'  => 'Enable Twitter',
                        'default'  => true,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_youtube',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Youtube', 'consultancy-wp'),
                        'subtitle'  => 'Enable Youtube',
                        'default'  => true,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_linkedin',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Linkedin', 'consultancy-wp'),
                        'subtitle'  => 'Enable Linkedin',
                        'default'  => false,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_google',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Google', 'consultancy-wp'),
                        'subtitle'  => 'Enable Google',
                        'default'  => false,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_flickr',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Flickr', 'consultancy-wp'),
                        'subtitle'  => 'Enable Flickr',
                        'default'  => false,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_pinterest',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Pinterest', 'consultancy-wp'),
                        'subtitle'  => 'Enable Pinterest',
                        'default'  => false,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_instagram',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Instagram', 'consultancy-wp'),
                        'subtitle'  => 'Enable Instagram',
                        'default'  => false,
                        'required' => array('header_social','=',true, ),
                    ),
                    array(
                        'id'       => 'header_email',
                        'type'     => 'switch',
                        'title'    => esc_html__('Enable Email', 'consultancy-wp'),
                        'subtitle'  => 'Enable Email',
                        'default'  => false,
                        'required' => array('header_social','=',true, ),
                    ),

                )
            );

            /* PRIMARY MENU /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Primary Menu', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el-icon-credit-card',
                'submenu' => true,
                'fields' => array(
                    array(
                        'id'             =>'primary_menu_typography',
                        'type'           => 'typography',
                        'title'          => esc_html__('Primary Menu Typography', 'consultancy-wp'),
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'text-align'     =>false,
                        'text-transform' =>true,
                        'font-weight'    =>true,
                        'all_styles'     =>false,
                        'font-style'     =>true,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>false,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'output'         => array('.main-navigation a'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Custom for primary menu.', 'consultancy-wp'),
                        'default'        => array(
                        )
                    ),
                )
            );

            /* PAGE /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Page', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el-icon-file-new',
                'submenu' => true,
                'fields' => array(

                    array(
                        'id'       => 'page_title_bg',
                        'type'     => 'background',
                        'compiler' => true,
                        'output'   => array('.page-title-wrap'),
                        'title'    => esc_html__('Page Title Background', 'consultancy-wp'),
                        'desc'     => 'Background for page title.',
                        'default'  => array(
                            'background-color' => '',
                        ),
                    ),
                    array(
                        'id'       => 'page_title_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'output'   => array('.page-title-wrap h1'),
                        'title'    => esc_html__('Page Title Custom Color', 'consultancy-wp'),
                        'desc'     => 'Default color inherit from Heading color settings.',
                        'default'  => ''
                    ),

                    array(
                        'id'       => 'page_subtitle_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'output'   => array('.page-subtitle'),
                        'title'    => esc_html__('Page Title Custom Color', 'consultancy-wp'),
                        'desc'     => 'Page subtitle color.',
                        'default'  => ''
                    ),

                )
            );

            /* STYLING /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Styling', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el el-brush',
                'submenu' => true,
                'fields' => array(
                    array(
                        'id'       => 'primary_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'title'    => esc_html__('Primary Color', 'consultancy-wp'),
                        'default'  => '#ffbb2a',
                        'output'   => array(
                            'color'             => '.primary-link a, .primary-color, .primary-hover-color:hover, .primary-link-hover-color a:hover, .entry-header a:hover, .widget ul li a:hover, .widget .tagcloud a:hover, .toggled #menu-search, .toggled .menu-toggle, .menu-toggle:hover, .st-counter-layout1 .st-icon, .st-counter-layout1 .counter, .st-grid-filter .active, .owl-nav, .st-carousel-layout2 .post-categories a, #site-navigation > div > ul > li.current-menu-item > a, #site-navigation > div > ul > li.current-menu-ancestor > a, #site-navigation > div > ul > li:hover > a, .content-area ul li:before, .main-navigation ul.nav-menu > li:hover > a, .header-transparent .site-header .main-navigation ul.nav-menu > li:hover > a',

                            'background-color'  => '.primary-background, .primary-background-hover:hover, .btn-primary, .st-custom-heading-layout1 .st-heading-title span:before, .st-custom-heading-layout2 .st-heading-title span:before, .st-grid-layout1 .st-grid-item-wrap .st-grid-action a:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .st-custom-heading-layout3 .st-heading-title:before, input[type="submit"]:hover, input[type="submit"]:focus, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .widget-area .widget-title:after, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, .tagcloud a:hover',

                            'border-color'      => 'textarea:focus, input[type="date"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="email"]:focus, input[type="month"]:focus, input[type="number"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="text"]:focus, input[type="time"]:focus, input[type="url"]:focus, input[type="week"]:focus, .widget-portfolio-item a:hover, .st-grid-filter li a:hover span:before, .st-grid-filter li a.active span:before, .btn-outline-primary, .st-partner-layout1 .st-partner-inner:hover, .st-feature-box-layout2 .st-feature-box:hover .st-feature-box-icon',

                            'border-left-color' => ''

                        )
                    ),

                    array(
                        'id'       => 'secondary_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'title'    => esc_html__('Secondary Color', 'consultancy-wp'),
                        'default'  => '#fe5722',
                        'output'   => array(
                            'color'            => 'a:hover, a:focus, .secondary-color, .secondary-hover-color:hover, .secondary-link-hover-color a:hover, .st-client-layout1 .st-client-meta small:before, .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a, .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a, body .zeus.tparrows:hover:before, .header-transparent .tertiary_color',
                            'border-color'    => '.secondary-border ,#site-navigation > div > ul > li.current-menu-item, #site-navigation > div > ul > li.current-menu-ancestor, #site-navigation > div > ul > li:hover, #menu-search:hover, .toggled .menu-toggle, .menu-toggle:hover, .portfolio-navigation:hover, blockquote',

                            'background-color' => '.secondary-background, .btn.secondary-background-hover:hover, .secondary-background-link a, .btn-secondary, .owl-theme .owl-controls .owl-nav .owl-prev, input[type="submit"].secondary-background, .comments-link span, .main-navigation ul ul, .header-transparent .tertiary-background'
                        )
                    ),

                    array(
                        'id'       => 'tertiary_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'title'    => esc_html__('Tertiary Color', 'consultancy-wp'),
                        'default'  => '#03a9f5',
                        'output'   => array(
                            'color'            => '.tertiary_color, a.tertiary_color, .entry-meta .author a, .widget .comment-author-link, .widget .comment-author-link a, body.header-transparent .zeus.tparrows:hover:before',
                            'border-color'    => '.tertiary-border, .nav-links a:hover, .nav-links a.next, .header-transparent .secondary-border',
                            'background-color' => '.tertiary-background, .tertiary-background-link a, .owl-theme .owl-controls .owl-nav .owl-next, .footer-top-area .footer-top, input[type="reset"], input[type="submit"], input[type="submit"], .tagcloud a, .header-transparent .secondary-background, .nav-links a.next, .header-transparent .newsletter-submit.secondary-background'
                        )
                    ),

                    array(
                        'id'       => 'meta_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'title'    => esc_html__('Meta Color', 'consultancy-wp'),
                        'default'  => '#f8f9f9',
                        'output'   => array(
                            'background-color' => ''
                        )
                    ),

                    array(
                        'id'       => 'border_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'title'    => esc_html__('Border Color', 'consultancy-wp'),
                        'default'  => '#e5e7ed',
                        'output'   => array(
                            'border-color' => 'hr, abbr, acronym, dfn, table, table > thead > tr > th, table > tbody > tr > th, table > tfoot > tr > th, table > thead > tr > td, table > tbody > tr > td, table > tfoot > tr > td,
                            fieldset, select, textarea, input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"]'
                        )
                    ),

                    array(
                        'id'       => 'body_bg',
                        'type'     => 'background',
                        'compiler' => true,
                        'output'   => array('body'),
                        'title'    => esc_html__('Site Background', 'consultancy-wp'),
                        'default'  => array(
                            'background-color' => '#ffffff',
                        )

                    ),
                    array(
                        'id'       => 'boxed_bg',
                        'type'     => 'background',
                        'compiler' => true,
                        'output'   => array('body.layout-boxed'),
                        'title'    => esc_html__('Body Background for boxed layout', 'consultancy-wp'),
                        'default'  => array(
                            'background-color' => '#cccccc',
                        )
                    ),

                )
            );

            /* TYPOGRAPHY /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'      => esc_html__('Typography', 'consultancy-wp'),
                'header'     => '',
                'desc'       => '',
                'icon_class' => 'el-icon-large',
                'icon'       => 'el-icon-font',
                'submenu'    => true,
                'fields'     => array(
                    array(
                        'id'             =>'font_body',
                        'type'           => 'typography',
                        'title'          => esc_html__('Body', 'consultancy-wp'),
                        'font-weight'    =>false,
                        'all_styles'     =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>false,
                        'color'          =>true,
                        'preview'        =>true,
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'output'         => array('body'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select font for main body text.', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#698591",
                            'font-family' =>'Karla',
                            'font-size'   =>'15px',
                            'line-height'   =>'26px',
                        )
                    ),
                    array(
                        'id'             =>'heading_h1',
                        'type'           => 'typography',
                        'title'          => esc_html__('H1', 'consultancy-wp'),
                        'font-weight'    =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'all_styles'     =>true,
                        'output'         => array('h1'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select custom font for H1', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#114366",
                            'font-family' =>'Raleway',
                            'font-weight' =>'700',
                            'font-size'   =>'48px',
                            'line-height' =>'',
                        )
                    ),
                    array(
                        'id'             =>'heading_h2',
                        'type'           => 'typography',
                        'title'          => esc_html__('H2', 'consultancy-wp'),
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'all_styles'     =>true,
                        'font-weight'    =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'output'         => array('h2'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select custom font for H2', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#114366",
                            'font-family' =>'Raleway',
                            'font-weight' =>'700',
                            'font-size'   =>'36px',
                            'line-height' =>'',
                        )
                    ),
                    array(
                        'id'             =>'heading_h3',
                        'type'           => 'typography',
                        'title'          => esc_html__('H3', 'consultancy-wp'),
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'all_styles'     =>true,
                        'font-weight'    =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'output'         => array('h3'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select custom font for H3', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#114366",
                            'font-family' =>'Raleway',
                            'font-weight' =>'700',
                            'font-size'   =>'26px',
                            'line-height' =>'',
                        )
                    ),
                    array(
                        'id'             =>'heading_h4',
                        'type'           => 'typography',
                        'title'          => esc_html__('H4', 'consultancy-wp'),
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'all_styles'     =>true,
                        'font-weight'    =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'output'         => array('h4'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select custom font for H4', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#114366",
                            'font-family' =>'Raleway',
                            'font-weight' =>'700',
                            'font-size'   =>'18px',
                            'line-height' =>'',
                        )
                    ),
                    array(
                        'id'             =>'heading_h5',
                        'type'           => 'typography',
                        'title'          => esc_html__('H5', 'consultancy-wp'),
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'all_styles'     =>true,
                        'font-weight'    =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'output'         => array('h5'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select custom font for H5', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#114366",
                            'font-family' =>'Raleway',
                            'font-weight' =>'700',
                            'font-size'   =>'16px',
                            'line-height' =>'',
                        )
                    ),
                    array(
                        'id'             =>'heading_h6',
                        'type'           => 'typography',
                        'title'          => esc_html__('H6', 'consultancy-wp'),
                        'compiler'       =>true,
                        'google'         =>true,
                        'font-backup'    =>false,
                        'all_styles'     =>true,
                        'font-weight'    =>true,
                        'font-style'     =>false,
                        'subsets'        =>true,
                        'font-size'      =>true,
                        'line-height'    =>true,
                        'word-spacing'   =>false,
                        'letter-spacing' =>true,
                        'color'          =>true,
                        'preview'        =>true,
                        'output'         => array('h6'),
                        'units'          =>'px',
                        'subtitle'       => esc_html__('Select custom font for H6', 'consultancy-wp'),
                        'default'        => array(
                            'color'       =>"#114366",
                            'font-family' =>'Raleway',
                            'font-weight' =>'700',
                            'font-size'   =>'15px',
                            'line-height' =>'',
                        )
                    ),
                ),
            );

            /* BLOG SETTINGS /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Blog', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el-icon-pencil el-icon-pencil',
                'submenu' => true,
                'fields' => array(
                    array(
                        'id'       => 'blog_page_title',
                        'type'     => 'switch',
                        'title'    => esc_html__('Show Blog Page Title', 'consultancy-wp'),
                        'subtitle' => esc_html__('Select On to enable it', 'consultancy-wp'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'blog_single_page_title',
                        'type'     => 'switch',
                        'title'    => esc_html__('Show Blog Page Title For Single Blog Post', 'consultancy-wp'),
                        'subtitle' => esc_html__('Select On to enable it', 'consultancy-wp'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'blog_single_thumb',
                        'type'     => 'switch',
                        'title'    => esc_html__('Show Featured Image', 'consultancy-wp'),
                        'desc'     => esc_html__('Show featured image on single blog post?', 'consultancy-wp'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'blog_single_author',
                        'type'     => 'switch',
                        'title'    => esc_html__('Show Author Box', 'consultancy-wp'),
                        'desc'     => esc_html__('Show author bio box on single blog post?', 'consultancy-wp'),
                        'default'  => true,
                    ),
                )
            );

            /* FOOTER /--------------------------------------------------------- */
            $this->sections[] = array(
                'title'  => esc_html__( 'Footer', 'consultancy-wp' ),
                'desc'   => '',
                'icon'   => 'el-icon-photo',
                'submenu' => true,
                'fields' => array(
                    array(
                        'id'       => 'footer_widgets',
                        'type'     => 'switch',
                        'title'    => esc_html__('Show footer widgets area.', 'consultancy-wp'),
                        'default'  => true,
                    ),
                    array(
                        'id'      => 'footer_columns',
                        'type'    => 'button_set',
                        'title'   => esc_html__( 'Footer Columns', 'consultancy-wp' ),
                        'desc'    => esc_html__( 'Select the number of columns for footer widgets area.', 'consultancy-wp' ),
                        'type'    => 'button_set',
                        'default' => '3',
                        'required' => array('footer_widgets','=',true, ),
                        'options' => array(
                            '1'   => esc_html__( '1 Columns', 'consultancy-wp' ),
                            '2'   => esc_html__( '2 Columns', 'consultancy-wp' ),
                            '3'   => esc_html__( '3 Columns', 'consultancy-wp' ),
                        ),
                    ),

                    array(
                        'id'       => 'footer_bg',
                        'type'     => 'background',
                        'compiler' => true,
                        'output'   => array('.footer-top-area'),
                        'title'    => esc_html__('Footer Background', 'consultancy-wp'),
                        'default'  => array(
                            'background-color' => '#3a526a',
                        )
                    ),
                    array(
                        'id'       => 'footer_widget_title_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'output'   => array('.footer-top-area .widget-title'),
                        'title'    => esc_html__('Footer Widget Title Color', 'consultancy-wp'),
                        'default'  => '#fff'
                    ),
                    array(
                        'id'       => 'footer_text_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'output'   => array('.footer-top-area, .footer-bottom-area'),
                        'title'    => esc_html__('Footer Text Color', 'consultancy-wp'),
                        'default'  => '#8b9db0'
                    ),
                    array(
                        'id'       => 'footer_link_color',
                        'type'     => 'color',
                        'compiler' => true,
                        'output'   => array('.footer-top-area a, .footer-bottom-area a'),
                        'title'    => esc_html__('Footer Link Color', 'consultancy-wp'),
                        'default'  => '#8b9db0'
                    ),
                    array(
                        'id'       => 'footer_link_color_hover',
                        'type'     => 'color',
                        'compiler' => true,
                        'output'   => array('.footer-top-area a:hover, .footer-bottom-area a:hover'),
                        'title'    => esc_html__('Footer Link Color Hover', 'consultancy-wp'),
                        'default'  => '#ffffff'
                    ),

                    array(
                        'id'        => 'footer_bottom',
                        'type'      => 'info',
                        'desc'      => esc_html__('Footer Bottom', 'consultancy-wp')
                    ),

                    array(
                        'id'       =>'footer_copyright',
                        'type'     => 'textarea',
                        'title'    => esc_html__('Footer Copyright', 'consultancy-wp'),
                        'subtitle' => esc_html__('Enter the copyright section text.', 'consultancy-wp'),
                    ),
                    array(
                        'id'       => 'footer_bottom_bg',
                        'type'     => 'background',
                        'compiler' => true,
                        'output'   => array('.footer-bottom-area'),
                        'title'    => esc_html__('Footer Background', 'consultancy-wp'),
                        'default'  => array(
                            'background-color' => '#455e76',
                        )
                    ),
                )
            );

            /* HEADER,FOOTER CODE /--------------------------------------------------------- */
            $this->sections[] = array(
                'icon'       => 'el-icon-edit',
                'icon_class' => 'el-icon-large',
                'title'      => esc_html__('Custom Codes', 'consultancy-wp'),
                'submenu'    => true,
                'fields'     => array(
                    array(
                        'id'       =>'site_header_code',
                        'type'     => 'textarea',
                        'theme'    => 'chrome',
                        'title'    => esc_html__('Header Custom Codes', 'consultancy-wp'),
                        'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'consultancy-wp'),
                    ),
                    array(
                        'id'       =>'site_footer_code',
                        'type'     => 'textarea',
                        'theme'    => 'chrome',
                        'title'    => esc_html__('Footer Custom Codes', 'consultancy-wp'),
                        'subtitle' => esc_html__('It will insert the code to wp_footer hook.) ', 'consultancy-wp'),
                    ),
                )
            );

            /* CUSTOM CSS /--------------------------------------------------------- */
            $this->sections[] = array(
                'icon'       => 'el-icon-css',
                'icon_class' => 'el-icon-large',
                'title'      => esc_html__('Custom CSS', 'consultancy-wp'),
                'submenu'    => true,
                'fields'     => array(
                    array(
                        'id'       => 'site_css',
                        'type'     => 'ace_editor',
                        'title'    => esc_html__( 'CSS Code', 'consultancy-wp' ),
                        'subtitle' => esc_html__( 'Advanced CSS Options. You can paste your custom CSS Code here.', 'consultancy-wp' ),
                        'mode'     => 'css',
                        'theme'    => 'chrome',
                        'default'  => ""
                    ),
                )
            );

            /* AUTO UPDATE /--------------------------------------------------------- */
            /*
            $this->sections[] = array(
                'icon'       => 'el-icon-random',
                'icon_class' => 'el-icon-large',
                'title'      => esc_html__('One Click Update', 'consultancy-wp'),
                'desc'    => esc_html__( 'Let us notify you when new versions of this theme are live on ThemeForest! Update with just one button click and forget about manual updates!<br> If you have any troubles while using auto update ( It is likely to be a permissions issue ) then you may want to manually update the theme as normal.', 'consultancy-wp' ),
                'submenu'    => true,
                'fields'     => array(
                    array(
                        'id'       =>'tf_username',
                        'type'     => 'text',
                        'title'    => esc_html__('ThemeForest Username', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter here your ThemeForest (or Envato) username account (i.e. ThemeAmber).', 'consultancy-wp'),
                    ),
                    array(
                        'id'       =>'tf_api',
                        'type'     => 'text',
                        'title'    => esc_html__('ThemeForest Secret API Key', 'consultancy-wp'),
                        'subtitle' => '',
                        'desc'     => esc_html__('Enter here the secret api key you have created on ThemeForest. You can create a new one in the Settings > API Keys section of your profile.', 'consultancy-wp'),
                    ),
                )
            );
            *
            */

        }

    }

    global $reduxConfig;
    $reduxConfig = new ThemeAmber_Options_Config();

    // Retrieve theme option values
    if ( ! function_exists('consultancy_option') ) {
        function consultancy_option($id, $fallback = false, $key = false ) {
            global $st_option;
            if ( $fallback == false ) $fallback = '';
            $output = ( isset($st_option[$id]) && $st_option[$id] !== '' ) ? $st_option[$id] : $fallback;
            if ( !empty($st_option[$id]) && $key ) {
                $output = $st_option[$id][$key];
            }
            return $output;
        }
    }
}