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
	<!-- UCF Assets -->
	<link rel="icon" href="http://www.ucf.edu/img/pegasus-icon.png" type="image/png">
	<?php // UCF header bar is loaded in functions.php with the other scripts ?>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	

	<header class="site-header">
    	<div class="container">
            <div class="row">
            
            <div class="offset-lg-1 col-lg-3 logo">
            <a href="<?=home_url();?>">
					<h3>College of<br/>Arts and Humanities</h3>
			</a>
           </div>
	
    <div class="col-lg-8">
    
    <!-- Navigation -->
		<nav id="site-navigation" class="navbar-collapse main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<?php esc_html_e( 'Menu', 'cah-starter' ); ?>
            </button>
			<?php wp_nav_menu( array(
					'theme_location' => 'main_nav', 
					'menu'=>'primary',
					'menu_id' => 'primary-menu') ); ?>
        </nav><!-- #site-navigation -->
		</div>
        
        </div> 
	</div>
    </header>
    
	
    <?php if(is_front_page()) $fclass="site-content";
	      else $fclass = "container";
	 ?>

    
    	<div id="content" class="<? echo $fclass; ?>">