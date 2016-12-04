<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my-simone
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'my-simone' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if (get_header_image() && ('blank' == get_header_textcolor())) : ?>
			<div class="header-image">
				<a href="<?php esc_url( home_url('/')); ?>" rel="home" >
					<img src="<?php header_image() ?>" width="<?php get_custom_header()->width; ?>" height="<?php get_custom_header()->height; ?>" alt="">
				</a>
			</div>
		<?php endif; ?>
        <?php
            if ( get_header_image() && !('blank' == get_header_textcolor()) ) {
                echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">';
            } else {
                echo '<div class="site-branding">';
            }
        ?>
			<div class="title-box">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
				</div><!-- .title-box -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
<!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Menu', 'my-simone' ); ?><!--</button>-->
			<h1  class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( '', 'my-simone' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'my-simone' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

			<div class="search-toggle">
				<i class="fa fa-search"></i>
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'my-simone' ); ?></a>
			</div>
			<?php my_simone_social_menu(); ?>
			
		</nav><!-- #site-navigation -->
</div>
<!--//divider!!!-->
<div id="search-container" class="search-box-wrapper clear">
	<div class="search-box clear">
		<?php get_search_form(); ?>
	</div>
</div>

</header><!-- #masthead -->

	<div id="content" class="site-content">
