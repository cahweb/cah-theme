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
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
				<div class="container">
					<div class="navbar-header">
						<div class="logo">
							<a href="<?=home_url();?>">
								<h3>College of<br />Arts and Humanities</h3>
							</a>
						</div> <!-- .logo .navbar-brand -->
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-menu-wrapper">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> <!-- .navbar-header -->
					<div class="collapse navbar-collapse" id="nav-menu-wrapper">
						<?php wp_nav_menu( array(
							'theme_location'	=> 'main_nav',
							'menu' 				=> 'primary',
							'menu_id' 			=> 'primary-menu'
						)); ?>
					</div> <!-- #nav-menu-wrapper -->
				</div> <!-- .container-fluid -->
			</nav> <!-- #site-navigation -->
    </header>

    <?php if(!is_front_page()): ?>

    	<div class="row line-yellow"></div>

    	<?php endif; ?>

    <?php if(is_front_page()) $fclass="site-content";
	      else $fclass = "container";
	 ?>


    	<div id="content" class="<? echo $fclass; ?>">
