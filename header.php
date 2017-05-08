<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cah-starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // All scripts should be loaded in functions.php using cah_starter_scripts() or equivalent ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- UCF Assets -->
	<link rel="icon" href="http://www.ucf.edu/img/pegasus-icon.png" type="image/png">
	<?php // UCF header bar is loaded in functions.php with the other scripts ?>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header" role="banner">

		<!-- Navigation -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a href="<?=home_url();?>">
				<div class="logo">
					<h3>College of<br/>Arts and Humanities</h3>
				</div>
			</a>

			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'cah-starter' ); ?></button>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
