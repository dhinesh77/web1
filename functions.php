<?php
/**
 * ThemeAmber functions and definitions
 *
 * @package ThemeAmber
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 800; /* pixels */
}

if ( ! function_exists( 'consultancy_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function consultancy_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on ThemeAmber, use a find and replace
         * to change 'consultancy-wp' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'consultancy-wp', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );


        /* Change default image thumbnail sizes in wordpress */
        update_option( 'thumbnail_size_w', 500);
        update_option( 'thumbnail_size_h', 500);
        update_option( 'thumbnail_crop', 1);
        update_option( 'medium_size_w', 600);
        update_option( 'medium_size_h', 400);
        update_option( 'medium_crop', 1);
        update_option( 'large_size_w', 850);
        update_option( 'large_size_h', 325);
        update_option( 'large_crop', 1);

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'consultancy-project-thumb', 556, 312, true );
        add_image_size( 'consultancy-news-thumb', 263, 278, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'topmenu' => esc_html__( 'Top Menu', 'consultancy-wp' ),
            'primary' => esc_html__( 'Primary Menu', 'consultancy-wp' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
        */

        add_theme_support( 'post-formats', array(
            'audio', 'video', 'gallery', 'quote'
        ) );


        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'consultancy_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }
endif; // consultancy_setup
add_action( 'after_setup_theme', 'consultancy_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function consultancy_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'consultancy-wp' ),
        'id'            => 'sidebar-right',
        'description'   => 'Blog Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'consultancy-wp' ),
        'id'            => 'sidebar-left',
        'description'   => 'Page Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Shop', 'consultancy-wp' ),
        'id'            => 'sidebar-shop',
        'description'   => 'Sidebar Shop',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Top', 'consultancy-wp' ),
        'id'            => 'footer-top',
        'description'   => 'Footer Top',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'consultancy-wp' ),
        'id'            => 'footer-1',
        'description'   => 'Footer 1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'consultancy-wp' ),
        'id'            => 'footer-2',
        'description'   => 'Footer 2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'consultancy-wp' ),
        'id'            => 'footer-3',
        'description'   => 'Footer 3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'consultancy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function consultancy_scripts() {
    // Stylesheet
    wp_enqueue_style( 'consultancy-style', get_stylesheet_uri() );
    wp_deregister_script( 'font-awesome' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css', array(), '4.4.0' );
    wp_enqueue_style( 'font-simple-line', get_template_directory_uri() .'/css/simple-line-icons.css', array(), '1.0' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/css/magnific-popup.min.css', array(), '1.0.0' );
    wp_enqueue_style('owl-carousel',get_template_directory_uri() . '/css/owl.carousel.css','','','all');

    if ( !class_exists( 'ReduxFramework' ) ) {
        wp_enqueue_style('consultancy-redux',get_template_directory_uri() . '/css/redux.css','','','all');
    }

    wp_enqueue_style( 'consultancy-style', get_stylesheet_uri() );

    wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array('jquery'), '', true );
    wp_enqueue_script( 'consultancy-libs', get_template_directory_uri() . '/js/libs.js', array('jquery'), '', true );

    wp_enqueue_script( 'consultancy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );

    wp_enqueue_script( 'consultancy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'consultancy-main', get_template_directory_uri() . '/js/main.js', array('consultancy-libs'), '', true );
}
add_action( 'wp_enqueue_scripts', 'consultancy_scripts' );

/**
 * Display logo base on page settings.
 */
function consultancy_logo_render(){
    global $post;
    global $woocommerce;

    $post_types = get_post_types( '', 'names' );
    $transparent_header_meta = null;
    if ( $woocommerce && is_woocommerce() ) {
        $transparent_header_meta = get_post_meta( woocommerce_get_page_id('shop'), '_consultancy_transparent_header', true );
    } else {
        foreach ( $post_types as $post_type ) {
            if ( is_singular($post_type) ) {
                global $post;
                $transparent_header_meta = get_post_meta( $post->ID, '_consultancy_transparent_header', true );
            }
        }
    }

    if ( $transparent_header_meta == 'yes' ) {
        $logo_url = consultancy_option('site_transparent_logo', false, 'url');
    } else {
        $logo_url = consultancy_option('site_logo', false, 'url');
    }

    return $logo_url;
}

// Style VC admin
function consultancy_custom_colors() {
    echo '<style type="text/css">
           .wpb_carousel_all .wpb_vc_row_inner{width:31%; float: left; padding-right: 2%;}
           .wpb_carousel_all .wpb_row_container > .wpb_vc_column_inner > .wpb_element_wrapper{background: #ccc;}
         </style>';
}
add_action('admin_head', 'consultancy_custom_colors');

/**
 * Load VC addons if Visual Compressor is installed.
 */
if ( class_exists('WPBakeryVisualComposerAbstract') ) {
    vc_set_as_theme( $disable_updater = true );
    require(get_template_directory() . '/inc/vc_extend/vc_extend.php');
}

/**
 * Custom excerpt
 */
function consultancy_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

/**
 * Custom content
 */
function consultancy_content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

/**
 * Add page support
 */
function consultancy_add_page_support() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'consultancy_add_page_support');

/* Automatic Plugin Activation */
require(get_template_directory() . '/inc/plugin-activation.php');

add_action('tgmpa_register', 'consultancy_register_required_plugins');
function consultancy_register_required_plugins() {
    $plugins = array(
        array(
            'name'      		=> 'Radium One Click Demo Install',
            'slug'      		=> 'radium-one-click-demo-install',
            'source'   				=> get_template_directory_uri() . '/inc/plugins/radium_one_click_demo_install.zip', // The plugin source
            'required'  		=> true,
            'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'external_url' 			=> 'https://github.com/FrankM1/radium-one-click-demo-install', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> 'Visual Composer', // The plugin name
            'slug'     				=> 'consultancy-wp', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory_uri() . '/inc/plugins/js_composer.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'external_url' 			=> 'http://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=ThemeAmber', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> 'Revolution Slider', // The plugin name
            'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory_uri() . '/inc/plugins/revslider.zip', // The plugin source
            'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'external_url' 			=> 'http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380?ref=ThemeAmber', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'               => 'Portfolio Post Type',
            'slug'               => 'portfolio-post-type',
            'required'           => true,
        ),
        array(
            'name'               => 'CMB2 Metabox',
            'slug'               => 'cmb2',
            'required'           => true,
        ),
        array(
            'name'               => 'Redux Framework',
            'slug'               => 'redux-framework',
            'required'           => true,
        ),
        array(
            'name'               => 'Newsletter',
            'slug'               => 'newsletter',
            'required'           => true,
        ),
        array(
            'name'      		=> 'Contact Form 7',
            'slug'      		=> 'contact-form-7',
            'required'  		=> false,
        ),
    );

    $config = array(
        'domain'       		=> 'consultancy-wp',         	        // Text domain - likely want to be the same as your theme.
        'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
        //'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
        //'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
        'menu'         		=> 'install-required-plugins', 	// Menu slug
        'has_notices'      	=> true,                       	// Show admin notices or not
        'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
        'message' 			=> '',							// Message to output right before the plugins table
        'strings'      		=> array(
            'page_title'                       			=> esc_html__( 'Install Required Plugins', 'consultancy-wp' ),
            'menu_title'                       			=> esc_html__( 'Install Plugins', 'consultancy-wp' ),
            'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'consultancy-wp' ), // %1$s = plugin name
            'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'consultancy-wp' ),
            'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'consultancy-wp' ), // %1$s = plugin name(s)
            'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'consultancy-wp' ),
            'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'consultancy-wp' ),
            'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'consultancy-wp' ),
            'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'consultancy-wp' ),
            'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'consultancy-wp' ), // %1$s = dashboard link
            'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa($plugins, $config);

}

function consultancy_add_editor_styles() {
    //add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'consultancy_add_editor_styles' );


/**
 * Theme Options
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load custom metaboxes and fields.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load theme widget.
 */
require get_template_directory() . '/widgets/portfolio.php';
require get_template_directory() . '/widgets/newsletter.php';
require get_template_directory() . '/widgets/recent-post.php';