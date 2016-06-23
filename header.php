<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package louelle
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php $sidebar_location = get_theme_mod( 'louelle_sidebar', 'sidebar--right'); ?>
<?php $sidebar_style = get_theme_mod( 'louelle_sidebar_style', 'sidebar--type0'); ?>

<body <?php body_class($sidebar_location.' '.$sidebar_style); ?> >
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'louelle' ); ?></a>

	<!-- Get backgruind color -->
	<?php 
		if ( get_theme_mod( 'header_bgcolor' ) ) {
			$header_bgcolor = get_theme_mod( 'header_bgcolor' );
		} 
		else { 
			$header_bgcolor = '#292f36';
		}
	?>

	<header id="masthead" class="headroom animated site-header site-header--fixed" role="banner">
		<div class="header-content">
			<div class="site-branding">
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
				
				<?php if ( get_theme_mod( 'louelle_logo' ) ) : ?>
					<?php $louelle_logo_size = get_theme_mod( 'louelle_logo_size', '250' ); ?>
					<div class='site-logo'>
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'louelle_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' style="width: <?php echo $louelle_logo_size ?>px;"></a>
					</div>
				<?php else : ?>
					<hgroup>
						<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
					</hgroup>
				<?php endif; ?>
			</div><!-- .site-branding -->

			
			<div class="right-branding">
				<a class="menu-toggle" href="#site-navigation"></a>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- .right-branding -->
		</div><!-- .header-content -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
