<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ThemeAmber
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
    wp_head();
?>
</head>

<body <?php body_class(); ?>>
<!-- Preloader -->
<?php if(consultancy_option('page_loading')) {?>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
<?php } ?>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'consultancy-wp' ); ?></a>

	<header id="masthead" class="site-header">

        <div class="top-menu-social clearfix">
            <div class="container">
                <div class="row">
                    <?php if ( consultancy_option('header_social')) { ?>
                        <div class="header-social col-xs-4 col-sm-5 col-md-6 col-lg-6">
                            <?php if ( consultancy_option('header_facebook')) { ?>
                                <a class="header-social-icons" title="Facebook" href="<?php echo esc_url(consultancy_option('facebook')); ?>" target="_blank"><i class="icon-social-facebook icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_twitter')) { ?>
                                <a class="header-social-icons" title="Twitter" href="<?php echo esc_url(consultancy_option('twitter')); ?>" target="_blank"><i class="icon-social-twitter icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_youtube')) { ?>
                                <a class="header-social-icons" title="Youtube" href="<?php echo esc_url(consultancy_option('youtube')); ?>" target="_blank"><i class="icon-social-youtube icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_linkedin')) { ?>
                                <a class="header-social-icons" title="Linkedin" href="<?php echo esc_url(consultancy_option('linkedin')); ?>" target="_blank"><i class="icon-social-linkedin icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_google')) { ?>
                                <a class="header-social-icons" title="Google +" href="<?php echo esc_url(consultancy_option('google')); ?>" target="_blank"><i class="icon-globe icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_flickr')) { ?>
                                <a class="header-social-icons" title="Flickr" href="<?php echo esc_url(consultancy_option('flickr')); ?>" target="_blank"><i class="icon-social-foursqare icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_pinterest')) { ?>
                                <a class="header-social-icons" title="Pinterest" href="<?php echo esc_url(consultancy_option('pinterest')); ?>" target="_blank"><i class="icon-social-pinterest icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_instagram')) { ?>
                                <a class="header-social-icons" title="Instagram" href="<?php echo esc_url(consultancy_option('instagram')); ?>" target="_blank"><i class="icon-social-instagram icons"></i></a>
                            <?php } ?>
                            <?php if ( consultancy_option('header_email')) { ?>
                                <a class="header-social-icons" title="Email" href="<?php echo esc_url(consultancy_option('email')); ?>" target="_blank"><i class="icon-envelope-open icons"></i></a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="top-menu text-right pull-right col-xs-8 col-sm-7 col-md-6 col-lg-6">
                        <?php
                        if(has_nav_menu('topmenu')) {
                            wp_nav_menu( array(
                                    'theme_location' => 'topmenu',
                                    'container' =>false,
                                    'menu_id' => 'top-menu',
                                    'echo' => true,
                                    'menu_class' => 'menu',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'depth' => 0
                                )
                            );
                        }
                        else {
                            echo '<ul><li><a href=""><strong>NO MENU ASSIGNED</strong> <span>Go To Appearance > Menus and create a Menu</span></a></li></ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="ab-header clearfix">
            <div class="container">
                <div class="site-branding pull-left">
                    <?php if ( consultancy_option('site_logo', false, 'url') !== '' ) { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo consultancy_logo_render(); ?>" alt="<?php get_bloginfo( 'name' ) ?>" />
                        </a>
                    <?php } else { ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    <?php } ?>
                </div><!-- .site-branding -->

                <div class="header-right pull-right">



                    <div class="header-menu clearfix">
                        <div id="menu-search" class="pull-right">
                            <a href="#" class="open-search st-search"><i class="secondary-background fa fa-search"></i></a>
                            <a href="#" class="close-search st-search"><i class="secondary-background fa fa-close"></i></a>
                            <div class="form-search">
                                <?php get_search_form(); ?>
                            </div>
                        </div>

                        <div id="site-navigation" class="main-navigation pull-right" role="navigation">
                            <nav class="menu-toggle pull-right" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></nav>
                            <?php
                            if(has_nav_menu('primary')) {
                                wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'container' =>false,
                                        'menu_id' => 'primary-menu',
                                        'echo' => true,
                                        'menu_class' => 'menu',
                                        'before' => '',
                                        'after' => '',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'depth' => 0
                                    )
                                );
                            }
                            else {
                                echo '<ul><li><a href=""><strong>NO MENU ASSIGNED</strong> <span>Go To Appearance > Menus and create a Menu</span></a></li></ul>';
                            }
                            ?>
                        </div><!-- #site-navigation -->
                    </div>

                </div>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">