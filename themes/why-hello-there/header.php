<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />  
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page">
  
    <header id="masthead" class="site-header">
      <div class="site-header-inner clearfix">
        <div class="container">
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <nav id="nav" class="site-nav" role="navigation">
            <div class="social"> 
              <div class="header-search"><?php get_search_form(); ?></div>
              <a class="search-btn"><i class="fa fa-search"></i></a>
              <?php whyhellothere_social_icon( 'facebook' ); ?>
              <?php whyhellothere_social_icon( 'twitter' ); ?>
            </div>
            <a href="#nav" title="Show navigation"><i class="fa fa-bars"></i></a>
            <a href="#hide" title="Hide navigation"><i class="fa fa-bars"></i></a>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div', 'container_class' => 'primary-navigation', 'fallback_cb' => 'wp_page_menu' ) ); ?>
          </nav>
        </div>
      </div>
    </header><!-- #masthead -->

    <div id="main" class="clearfix">
      <div class="main-inner">
        <div class="container">