<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Black Mountain Marketing
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="beNZT8zdFLD76Nu3xoi3ndLnE-nPtSWMPn1VTQsWqTg" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="google-site-verification" content="LdsTU9edlvwmfJoz3Ue9OdocGTbnz7Lm8vtdtf8ONPY" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bmm' ); ?></a>
        
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="nav-inner">
                <div class="logo-icon">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/images/icon-nav.png" alt="Black Mountain Marketing"></a>
                </div>
                <button class="menu-toggle lines-button arrow arrow-left" type="button" role="button" aria-controls="primary-menu" aria-expanded="false"><span class="lines"></span></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </div>
        </nav><!-- #site-navigation -->

        <?php if(is_front_page()): ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding" style="background-image: url(<?php header_image(); ?>)">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                        <div class="brand-box">
                            <img src="<?php echo get_template_directory_uri() ?>/images/logo-main.png" alt="Black Mountain Marketing">
                            <h2>More Leads,<br>More Conversions,<br>More <em>Sales</em></h2>
                        </div>
		</div><!-- .site-branding -->
                <div class="header-overlay"></div>

	</header><!-- #masthead -->
        <?php endif; ?>

	<div id="content" class="site-content">
