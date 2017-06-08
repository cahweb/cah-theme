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
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <!--- Bootstrap --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- UCF Assets -->
	<link rel="icon" href="http://www.ucf.edu/img/pegasus-icon.png" type="image/png">
	<?php // UCF header bar is loaded in functions.php with the other scripts ?>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="site-header">
			<nav id="site-navigation" class="navbar navbar-inverse main-navigation" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu-collapse-1">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?=home_url();?>" class="navbar-brand logo">
							<h3 style="margin: 0;">College of<br />Arts and Humanities</h3>
						</a>
					</div> <!-- .navbar-header -->
				<?php
					wp_nav_menu( array(
						'theme_location'	=> 'main_nav',
						'menu' 				=> 'primary',
						'menu_id' 			=> 'primary-menu',
						'depth'				=> 0,
						'container'			=> 'div',
						'container_class'	=> 'collapse navbar-collapse',
						'container_id'		=> 'nav-menu-collapse-1',
						'menu_class'		=> 'nav navbar-nav navbar-right',
						'fallback_cb'		=> 'WP_CAH_Bootstrap_Navwalker::fallback',
						'walker'			=> new WP_CAH_Bootstrap_Navwalker()
					));
				 ?>
				</div> <!-- .container-fluid -->
			</nav> <!-- #site-navigation -->
    </header>

    <?php if(is_front_page()) $fclass="site-content";
	      else $fclass = "container";
	 ?>


    	<div id="content" class="<? echo $fclass; ?>">
