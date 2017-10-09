<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ThemeAmber
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function consultancy_body_classes( $classes ) {
    global $post;
    global $woocommerce;

    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Page Full Width
    if ( is_page_template( 'page-fullwidth.php' ) || is_404() ) {
        $classes[] = 'page-fullwidth';
    }

    if(consultancy_option('header_sticky')){
        $classes[] = 'header-sticky';
    }
    // Transparent Header
    $post_types = get_post_types( '', 'names' );
    $transparent_header_meta = null;
    $transparent_header_meta_portfolio = null;
    if ( $woocommerce && is_woocommerce() ) {
        $transparent_header_meta = get_post_meta( woocommerce_get_page_id('shop'), '_st_transparent_header', false );
    } else {
        foreach ( $post_types as $post_type ) {
            if ( is_singular($post_type) ) {
                global $post;
                $transparent_header_meta = get_post_meta( $post->ID, '_st_transparent_header', true );
                $transparent_header_meta_portfolio = get_post_meta( $post->ID, '_ab_transparent_header', false );
            }
        }
    }
    if ( $transparent_header_meta == 'yes' ) {
        $classes[] = 'header-transparent';
    }

    if ( $transparent_header_meta_portfolio == 'yes' ) {
        $classes[] = 'header-transparent';
    }

    if(!consultancy_option('header_sticky') && $transparent_header_meta != 'yes'){
        $classes[] = 'header-normal';
    }

    // Boxed Layout
    if ( consultancy_option('site_boxed') || (isset($_REQUEST['boxed_layout']) && $_REQUEST['boxed_layout'] = 'enable' ) ) {
        $classes[] = 'layout-boxed';
    }

    // WooCommerce
    if ( $woocommerce ) {
        $woo_layout  = get_post_meta( woocommerce_get_page_id('shop'), '_st_page_layout', true );
        if ( $woo_layout == 'right-sidebar' || $woo_layout == 'left-sidebar' ) {
            $classes[] = 'shop-sidebar';
        }
    }

    return $classes;
}
add_filter( 'body_class', 'consultancy_body_classes' );


/**
 * Adds custom classes to the array of content area classes.
 *
 * @param array $classes Classes for the content area.
 * @return array
 */
function consultancy_content_class () {
    global $post;
    global $woocommerce;

    $classes        = 'right-sidebar';
    $consultancy_page_layout    = consultancy_option('page_layout');
    $archive_layout = consultancy_option('archive_layout');
    $blog_layout    = consultancy_option('blog_layout');
    $single_shop    = consultancy_option('single_shop_layout');

    // Pages
    if ( is_page() ){
        $page_meta = get_post_meta( $post->ID, '_st_page_layout', true );
        if ( $page_meta == 'default-sidebar' || $page_meta == '' ) {
            $classes = $consultancy_page_layout;
        } else {
            $classes = $page_meta;
        }
    }

    // Single Post
    if ( is_single() ) {
        if ( $blog_layout ) {
            $classes = $blog_layout;
        } else {
            $classes = 'right-sidebar';
        }
    }

    // Archive
    if ( (is_archive() || is_author()) & !is_front_page() ) {
        if ( $archive_layout !== '' ){
            $classes = $archive_layout;
        } else {
            $classes = 'right-sidebar';
        }

    }

    // Blog
    if ( !is_front_page() && is_home() ) {
        if ( $blog_layout ) {
            $classes = $blog_layout;
        } else {
            $classes = 'right-sidebar';
        }
    }

    // Search
    if ( is_search() ) {
        if ( $archive_layout !== '' ){
            $classes = $archive_layout;
        } else {
            $classes = 'right-sidebar';
        }

    }

    // Woo
    if ( $woocommerce ) {
        $shop_layout_meta = get_post_meta( woocommerce_get_page_id('shop'), '_st_page_layout', true );
        if ( $woocommerce && is_shop() || $woocommerce && is_product_category() || $woocommerce && is_product_tag() ) {
            if ( $shop_layout_meta ) {
                $classes = $shop_layout_meta;
            } else {
                $classes = 'no-sidebar';
            }
        }
        if ( $woocommerce && is_product() ) {
            if ( $single_shop ) {
                $classes = $single_shop;
            } else {
                $classes = 'no-sidebar';
            }
        }
    }

    return $classes;
}

function consultancy_GetCategoriesByPostID($post_ID = null,$taxo = 'category'){
    $term_cats = array();
    $categories = get_the_terms($post_ID,$taxo);
    if($categories){
        foreach($categories as $category){
            $term_cats[] = get_term( $category, $taxo );
        }
    }
    return $term_cats;
}

/**
 * Page layout.
 */
function consultancy_get_page_layout(){
    global $consultancy_page_layout, $consultancy_wcontent, $consultancy_wsidebar, $consultancy_wcontainer, $consultancy_wrow;
    $consultancy_page_layout = consultancy_content_class();
    $consultancy_wcontainer = 'container';
    $consultancy_wrow = 'row';
    if($consultancy_page_layout == 'right-sidebar'){
        $consultancy_wcontent = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
        $consultancy_wsidebar = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
    }elseif($consultancy_page_layout == 'left-sidebar'){
        $consultancy_wcontent = 'col-xs-12 col-sm-9 col-md-9 col-lg-9 pull-right';
        $consultancy_wsidebar = 'col-xs-12 col-sm-3 col-md-3 col-lg-3 pull-left';
    }elseif($consultancy_page_layout == 'full-screen'){
        $consultancy_wcontent = '';
        $consultancy_wcontainer = 'container-full';
        $consultancy_wrow = 'row-full';
    }else{
        $consultancy_wcontent = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
    }
    return $consultancy_wsidebar;
}

/**
 * Page title.
 */
function consultancy_get_page_title($post_id){
    global $woocommerce;

    $page_title             = get_post_meta( $post_id, '_st_page_title', true );
    $page_subtitle          = get_post_meta( $post_id, '_st_page_subtitle', true );
    $page_title_alignment          = get_post_meta( $post_id, '_st_page_title_alignment', true );

    $page_tilte_padding          = get_post_meta( $post_id, '_st_page_tilte_padding', true );
    $page_title_bg_color          = get_post_meta( $post_id, '_st_page_title_bg_color', true );
    $page_title_bg         = get_post_meta( $post_id, '_st_page_title_bg', true );
    $title_text_color         = get_post_meta( $post_id, '_st_title_text_color', true );
    $subtitle_text_color         = get_post_meta( $post_id, '_st_subtitle_text_color', true );
    $title_background_parallax         = get_post_meta( $post_id, '_st_title_background_parallax', true );

    $title_class ='';
    $background_attact ='';
    if ( $title_background_parallax == 'yes' ) {
        $title_class = 'parallax';
        $background_attact ='background-attachment: fixed;';
    }

    $style = 'style="';
    $style .= 'padding:'.$page_tilte_padding.';';
    if($page_title_bg_color != '')  $style .= 'background-color:'.$page_title_bg_color.';';
    if($page_title_bg != '') $style .= 'background-image:url('.$page_title_bg.');';
    $style .= $background_attact;
    $style .= '"';

    $hide_page_title    = get_post_meta( $post_id, '_st_hide_page_title', true );

    $page_breadcrumb = get_post_meta( $post_id, '_st_hide_breadcrumb', true );
    $hiden_text = '';
    if( $page_breadcrumb == 'yes') {
        $hiden_text = 'display_none';
    }

    if ( !is_front_page() && is_home() && get_option('page_for_posts') ) {
        if ( consultancy_option('blog_page_title') ) {
            ?>
            <div
                class="page-title-wrap <?php echo esc_attr($page_title_alignment) . ' ' . $title_class; ?>" <?php echo sanitize_text_field($style); ?>>
                <div class="container">
                    <?php if ($page_title != '') { ?>
                        <h1 class="page-title <?php echo esc_attr($hiden_text); ?>" style="color: <?php echo esc_attr($title_text_color); ?>;">
                            <span><?php echo esc_attr($page_title); ?></span>
                        </h1>
                    <?php } else { ?>
                        <h1 class="page-title <?php echo esc_attr($hiden_text); ?>" style="color: <?php echo esc_attr($title_text_color); ?>;">
                            <span><?php echo get_the_title(get_option('page_for_posts')); ?></span>
                        </h1>
                    <?php } ?>
                    <?php if ($page_subtitle != '') { ?>
                        <div class="page-subtitle <?php echo esc_attr($hiden_text); ?>" style="color: <?php echo esc_attr($subtitle_text_color); ?>;">
                            <?php echo esc_attr($page_subtitle); ?>
                        </div>
                    <?php } ?>
                    <?php consultancy_breadcrumb($post_id); ?>
                </div>
            </div>
            <?php
        }
    }

    elseif ( $hide_page_title != 'yes' && $woocommerce && is_shop() || $woocommerce && is_product() || $woocommerce && is_product_category() || $woocommerce && is_product_tag() ) {
        ?>
        <div class="page-title-wrap <?php echo esc_attr($page_title_alignment) . ' ' . $title_class; ?>" <?php echo sanitize_text_field($style); ?>">
        <div class="container">
            <h1 class="page-title woo-page-title pull-left <?php echo esc_attr($hiden_text); ?>">
                <span><?php woocommerce_page_title(); ?></span>
            </h1>
            <div class="shop-cart pull-right <?php echo esc_attr($hiden_text); ?>">
                <a class="shop-cart-link" href="<?php echo esc_attr($woocommerce)->cart->get_cart_url(); ?>" title="<?php echo esc_html__('Shopping Cart', 'consultancy-wp') ?>"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <?php consultancy_breadcrumb($post_id); ?>
        </div>
        </div>
        <?php
    }

    elseif ( $hide_page_title != 'yes' ) {
        ?>
        <div class="page-title-wrap <?php echo esc_attr($page_title_alignment).' '.$title_class; ?>" <?php echo sanitize_text_field($style); ?>>
            <div class="container">
                <?php if($page_title != '' ) { ?>
                    <h1 class="page-title <?php echo esc_attr($hiden_text); ?>" style="color: <?php echo esc_attr($title_text_color); ?>;">
                        <span><?php echo esc_attr($page_title); ?></span>
                    </h1>
                <?php } else {?>
                    <h1 class="page-title <?php echo esc_attr($hiden_text); ?>" style="color: <?php echo esc_attr($title_text_color); ?>;">
                        <span><?php the_title(); ?></span>
                    </h1>
                <?php } ?>
                <?php if ($page_subtitle != '') { ?>
                    <div class="page-subtitle <?php echo esc_attr($hiden_text); ?>" style="color: <?php echo esc_attr($subtitle_text_color); ?>;">
                        <span><?php echo esc_attr($page_subtitle); ?></span>
                    </div>
                <?php } ?>
                <?php consultancy_breadcrumb($post_id); ?>
            </div>
        </div>
        <?php
    }
}

/**
 * Side Bar.
 */
function consultancy_sidebar(){
    global $post, $woocommerce;

    $sidebar = '';
    $post_type = get_post_type($post);
    if ( is_page() || is_front_page() ) {
        if ( is_active_sidebar( 'sidebar-left' ) ) {
            $sidebar = dynamic_sidebar('sidebar-left');
        } else {
            $sidebar = dynamic_sidebar('sidebar-right');
        }
    } elseif ((is_single() || is_archive()) && ($post_type == 'post')) {
        $sidebar = dynamic_sidebar('sidebar-right');
    } elseif (is_search()) {
        $sidebar = dynamic_sidebar('sidebar-right');
    } elseif ( $woocommerce && is_shop() || $woocommerce && is_product() || $woocommerce && is_product_category() || $woocommerce && is_product_tag() ) {
        $sidebar = dynamic_sidebar('sidebar-shop');
    } else {
        $sidebar = dynamic_sidebar('sidebar-right');
    }
    return $sidebar;
}

/**
 * Footer Cols.
 */
function consultancy_get_footer_cols(){
    $footer_class ='';
    if(consultancy_option('footer_columns') == '4'){
        $footer_class = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
    }elseif(consultancy_option('footer_columns') == '3'){
        $footer_class = 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
    }elseif(consultancy_option('footer_columns') == '2'){
        $footer_class = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
    }else{
        $footer_class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
    }

    return $footer_class;
}

/**
 * Get label custom meta box
 */
function consultancy_get_label_meta($name){
    $a = get_field_object($name);
    $label = $a['label'];
    return $label;
}

/**
 * BreadCrumb.
 */
function consultancy_breadcrumb($post_id) {

    $page_breadcrumb = get_post_meta( $post_id, '_st_hide_breadcrumb', true );

    if( $page_breadcrumb !== 'yes' && function_exists('bcn_display') ) {
        if ( is_front_page() && is_home() ) {
            // Default homepage
        } elseif ( is_front_page() ) {
            // static homepage
        } elseif ( is_home() ) {
            // blog page
            ?>
            <div class="breadcrumbs">
                <div class="container">
                    <span class="pull-right"><?php bcn_display(); ?></span>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="breadcrumbs">
                <div class="container">
                    <span class="pull-right"><?php bcn_display(); ?></span>
                </div>
            </div>
            <?php
        }
    }
}


/**
 * Get Shortcode From Content
 *
 * @param string $shortcode
 * @param string $content
 * @return unknown
 */
function consultancy_getShortcodeFromContent($shortcode = '', $content = ''){

    preg_match("/\[".$shortcode."(.*)/", $content , $matches);

    return !empty($matches[0]) ? $matches[0] : null ;
}

/**
 * Get Tag From Content
 *
 * @param string $tag
 * @param string $content
 * @return unknown
 */
function consultancy_getTagFromContent($tag = '', $content = ''){

    preg_match("/\<".$tag."(.*)/", $content , $matches);

    return !empty($matches[0]) ? $matches[0] : null ;
}

function consultancy_blockquote() {
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if(!empty($blockquote[0])){
        echo '<div class="ab-post-quote">'.$blockquote[0].'</div>';
        return true;
    } else {
        if(has_post_thumbnail()){
            $imgzoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            echo '<div class="post-image"><div class="post-image-inner"><a class="imgzoom image-popup" href="'.$imgzoom[0].'"><i class="fa fa-search-plus"></i></a>';
            the_post_thumbnail( 'large' );
            echo '</div></div>';
        }
    }
}

/**
 * Gallerry Images Zoom
 */
function consultancy_gallery_zoom(){

    $shortcode = consultancy_getShortcodeFromContent('gallery', get_the_content());

    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if(!empty($ids)){

            $array_id = explode(",", $ids[1]);
            ?>
            <div id="ab-carousel-<?php the_ID(); ?>" class="st-carousel-wrap post-image gallery-popup-wrap post-image-inner ">
                <div class="st-carousel" data-margin="0" data-loop="true" data-nav="true" data-dots="false" data-autoplay="true" data-xsmall-items="1" data-small-items="1" data-medium-items="1" data-large-items="1">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $imgzoom = wp_get_attachment_image_src($image_id, 'full', false);
                        $attachment_image = wp_get_attachment_image_src($image_id, 'large', false);
                        if($attachment_image[0] != ''):?>
                            <div class="item">
                                <a class="imgzoom gallery-popup" href="<?php echo esc_attr($imgzoom[0]); ?>"><i class="fa fa-search-plus"></i></a>
                                <img style="width:100%;" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                            </div>
                            <?php $i++; endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php

            return true;

        } else {
            return false;
        }
    } else {
        if(has_post_thumbnail()){
            $imgzoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            echo '<div class="post-image"><div class="post-image-inner"><a class="imgzoom image-popup" href="'.$imgzoom[0].'"><i class="fa fa-search-plus"></i></a>';
            the_post_thumbnail( 'large' );
            echo '</div></div>';
        }
    }
}

/**
 * Media Video.
 */
function consultancy_video() {
    global $wp_embed;

    $local_video = consultancy_getShortcodeFromContent('video', get_the_content());
    $remote_video = consultancy_getShortcodeFromContent('embed', get_the_content());

    if($local_video){
        echo do_shortcode($local_video);
        return true;

    } elseif ($remote_video) {
        echo '<div class="ab-post-video post-image">'.$wp_embed->run_shortcode($remote_video).'</div>';
        return true;

    } else {
        if(has_post_thumbnail()){
            $imgzoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            echo '<div class="post-image"><div class="post-image-inner"><a class="imgzoom image-popup" href="'.$imgzoom[0].'"><i class="fa fa-search-plus"></i></a>';
            the_post_thumbnail( 'large' );
            echo '</div></div>';
        }
    }

}

/**
 * Media Audio.
 */
function consultancy_audio() {
    global $wp_embed;

    $shortcode = consultancy_getShortcodeFromContent('audio', get_the_content());

    $remote_audio = consultancy_getShortcodeFromContent('embed', get_the_content());
    $remote_audio_run = $wp_embed->run_shortcode($remote_audio);

    $remote_soundcloud = consultancy_getShortcodeFromContent('soundcloud', get_the_content());

    if($remote_soundcloud != ''){
        echo '<div class="ab-post-audio audio-soundcloud post-image">'.do_shortcode($remote_soundcloud).'</div>';
        return true;
    } elseif ($remote_audio) {
        echo '<div class="ab-post-audio audio-remote-audio post-image">'.do_shortcode($remote_audio_run).'</div>';
        return true;
    } elseif($shortcode != ''){
        echo '<div class="ab-post-audio shortcode-audio post-image">'.do_shortcode($shortcode).'</div>';
        return true;
    }  else {
        if(has_post_thumbnail()){
            $imgzoom = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            echo '<div class="post-image"><div class="post-image-inner"><a class="imgzoom image-popup" href="'.$imgzoom[0].'"><i class="fa fa-search-plus"></i></a>';
            the_post_thumbnail( 'large' );
            echo '</div></div>';
        }
    }
}

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function consultancy_wp_title( $title, $sep ) {
        if ( is_feed() ) {
            return $title;
        }

        global $page, $paged;

        // Add the blog name
        $title .= get_bloginfo( 'name', 'display' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title .= " $sep $site_description";
        }

        // Add a page page_number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
            $title .= " $sep " . sprintf( esc_html__( 'Page %s', 'consultancy-wp' ), max( $paged, $page ) );
        }

        return $title;
    }
    add_filter( 'wp_title', 'consultancy_wp_title', 10, 2 );

    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     * @todo Remove this function when WordPress 4.3 is released.
     */
    function consultancy_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php
    }
    add_action( 'wp_head', 'consultancy_render_title' );

    /**
     * html5 js file for ie9.
     */
    function consultancy_html5() {
        echo '<!--[if lt IE 9]>';
        echo '<script src="'. esc_url( get_template_directory_uri() ) .'/assets/js/html5.min.js"></script>';
        echo '<![endif]-->';
    }
    add_action( 'wp_head', 'consultancy_html5' );

    /**
     * Favicon to wp_head hook.
     */
    function consultancy_favicons() {
        $favicons = null;

        if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :

            if ( consultancy_option('site_favicon', '', 'url') ) $favicons .= '<link rel="shortcut icon" href="'. esc_url(consultancy_option('site_favicon', '', 'url')) .'">';

            if ( consultancy_option('site_iphone_icon', '', 'url') ) $favicons .= '<link rel="apple-touch-icon-precomposed" href="'. esc_url(consultancy_option('site_iphone_icon', '', 'url')) .'">';

            if ( consultancy_option('site_iphone_icon_retina', '', 'url') ) $favicons .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url(consultancy_option('site_iphone_icon_retina', '', 'url')) .'">';

            if ( consultancy_option('site_ipad_icon', '', 'url') ) $favicons .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. esc_url(consultancy_option('site_ipad_icon', '', 'url')) .'">';

            if ( consultancy_option('site_ipad_icon_retina', '', 'url') ) $favicons .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url(consultancy_option('site_ipad_icon_retina', '', 'url')) .'">';

        endif;

        echo esc_attr($favicons);
    }
    add_action( 'wp_head', 'consultancy_favicons' );

    /**
     * Header Tracking Code to wp_head hook.
     */
    function consultancy_header_code() {
        $site_header_code = consultancy_option('site_header_code');
        if ( $site_header_code !== '' ) echo esc_attr($site_header_code);
    }
    add_action( 'wp_head', 'consultancy_header_code' );

    /**
     * Footer Tracking Code to wp_footer hook.
     */
    function consultancy_footer_code() {
        $site_footer_code = consultancy_option('site_footer_code');
        if ( $site_footer_code !== '' ) echo esc_attr($site_footer_code);
    }
    add_action( 'wp_footer', 'consultancy_footer_code' );

    /**
     * Custom CSS to wp_head hook.
     */
    function consultancy_custom_css() {
        $styles     = null;
        $custom_css = consultancy_option('site_css');

        if ( $custom_css !== '' ) $styles .= $custom_css;

        $css_output = "\n<style id=\"theme_option_custom_css\" type=\"text/css\">\n" . preg_replace( '/\s+/', ' ', $styles ) . "\n</style>\n";

        if ( !empty( $custom_css ) ) echo esc_attr($css_output);

    }
    add_action( 'wp_head', 'consultancy_custom_css' );

endif;

/**
 * Woo Config.
 */
// Hide the default shop title in content area.
add_filter('woocommerce_show_page_title', '__return_false');

// Display products per page.
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 8;' ), 20 );