<?php
/**
 * The Front Page Template
 *
 * I wish it was more explicit how this worked, other than "Name it front-page.php and it
 * will change the front page." Edit this to change the front page.
 *
 * @package cah-starter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">
			
			<div class="hero" style="background-image: url(<?=get_stylesheet_directory_uri() . "/public/images/hero.jpg"?>);">
				
				<div class="hero-words">
					<div class="hero-title"><h2>Creativity. Community. Donuts.</h2></div>
					<div class="hero-subtitle"><h3>Subtitle copy on 80% background.</h3></div>
				</div>

			</div>

			
				<div class="container">
					<div class="col-lg-6">
						<h2>Intro, Mission, Whatever</h2>
						<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
					</div>

					<div class="col-lg-6">
						<h2>More Copy or Links</h2>
						<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
					</div>
				
            

	<!--- <div class="row nav-black">   --->
    	<?php //wp_nav_menu( array( 'menu' => 'CallToAction' )); ?>
	<!---  </div>    --->

			<div class="section yellow">
				<div class="yellow-title">
					<h3>Ad space, call to action, etc. Online programs?<br/><span>Grad Programs, Other</span></h3>
				</div>
				<img src="<?= get_stylesheet_directory_uri() . "/public/images/student.png"?>">
				<a href="#"><div>Learn More</div></a>
			</div>

			<div class="section">
				<div class="title">
					<h1>News</h1>
					<a href="#">Check out more stories</a>
				</div>
				<?php do_shortcode('[news]'); ?>
			</div>

			<div class="section">
				<div class="departments-container">
					<div class="departments-content">
						
						<div class="title">
							<h1>Departments</h1>
						</div>

						<p>The College of Arts and Humanities at UCF houses a variety of disciplines and entities, some of which may not belong in this prominent position on the homepage.</p>

					</div>
					<div class="departments-aside"></div>
				</div>
			</div>
</div>
		</main><!-- #main -->


<?php
// get_sidebar();
get_footer();

?>