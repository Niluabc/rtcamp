<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package styling
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'styling' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<img src = "<?php echo get_template_directory_uri(); ?>/images/logo.png" tile="<?php bloginfo( 'name' ); ?>" alt="<?php echo get_bloginfo('description','display');; ?>">
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<div class="border-menu"></div>
			<div class="border-menu"></div>
			<div class="border-menu"></div>
			<div class="border-menu"></div>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'styling' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
