<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package air-light
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />

  <?php wp_head(); ?>
</head>

<body <?php body_class( 'no-js' );; ?>>
  <div id="page" class="site">
   <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'air-light' ); ?></a>

   <div class="language">
    <div class="container">
      <div class="col-md-6">
        <?php wp_nav_menu( array(
                  'theme_location'    => 'languages',
                  'container'         => false,
                  'depth'             => 4,
                  'menu_class'        => 'menu-items',
                  'menu_id'           => 'main-menu',
                  'echo'              => true,
                  'fallback_cb'       => 'Air_Light_Navwalker::fallback',
                  'items_wrap'        => '<ul class="%2$s" id="%1$s">%3$s</ul>',
                  'walker'            => new Air_Light_Navwalker(),
                ) ); ?>
      </div>

      <div class="col-md-6 search-form">
        <?php get_search_form(); ?>
      </div>
    </div>
   </div>


  <?php if ( is_front_page() ) { ?>
   <div class="nav-container">
   <?php } else { ?>
   <div class="nav-container-bottom">
   <?php } ?>
    <header class="site-header" role="banner">

      <div class="site-branding">
          <p class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
              <img src="<?php echo get_template_directory_uri(); ?>/images/uusimaa-logo.png" alt="Pia Kauma">
            </a>
          </p>
        <?php

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <p class="site-description screen-reader-text"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php endif; ?>
      </div><!-- .site-branding -->

      <div class="main-navigation-wrapper" id="main-navigation-wrapper">
        <button id="nav-toggle" class="nav-toggle hamburger" type="button" aria-label="<?php esc_attr_e( 'Menu', 'air-light' ); ?>" aria-controls="navigation">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
          <span id="nav-toggle-label" class="screen-reader-text" aria-label="<?php esc_attr_e( 'Menu', 'air-light' ); ?>"><?php esc_attr_e( 'Menu', 'air-light' ); ?></span>
        </button>

        <nav id="nav" class="nav-primary" role="navigation">

          <?php wp_nav_menu( array(
            'theme_location'    => 'primary',
            'container'         => false,
            'depth'             => 4,
            'menu_class'        => 'menu-items',
            'menu_id'           => 'main-menu',
            'echo'              => true,
            'fallback_cb'       => 'Air_Light_Navwalker::fallback',
            'items_wrap'        => '<ul class="%2$s" id="%1$s">%3$s</ul>',
            'walker'            => new Air_Light_Navwalker(),
          ) ); ?>

        </nav><!-- #nav -->
      </div>
    </header>
  </div><!-- .nav-container -->

  <div class="site-content">
