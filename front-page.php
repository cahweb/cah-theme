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

	<div id="primary" class="content-area home-content">
		<main id="main" class="site-main" role="main">
        
        <? $files = glob("wp-content/themes/cah-theme/public/images/hero/*.jpg"); 
			shuffle($files);
		?>
        
        
			
			<div class="hero" style="background-image: url(<?=site_url() . "/" . $files[0]?>);">
            
			
			
				
				<div class="hero-words">
					<div class="hero-title"><h2>Creativity. Culture. Collaboration.</h2></div>
					<div class="hero-subtitle"><h3>College of Arts and Humanities</h3></div>
				</div>

			</div>

			
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p>“The arts and humanities fuel innovation across the university by the creative process itself. The arts and humanities help our students see the world through different lenses. They are where you learn to write and communicate more effectively, explore creativity, and study culture to better understand how we interact with each other."</p><p style="text-align:right;margin-top:-10px;"><i>—Dean Jeff Moore</i></p>
					</div>

					<div class="col-md-6">
						<h2 style="margin-top:0;">Take a Tour</h2>
						<p>Summer is a great time to tour campus. Before your visit, don’t forget to set up an appointment with your intended <a href="#deptbuttonanchor">department</a> so you can learn why the UCF College of Arts and Humanities is your top destination.</p>
					</div>
				</div>
				
            

				<div class="row">
				    <?php wp_nav_menu( array( 'menu' => 'CallToAction' )); ?>
				</div>

			</div>

			<div class="video">
				<div class="container">
					<div class="row video-container">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/pdzdjAskWBs" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>

			<div class="yellow">
				<div class="yellow-title">
					<h3>Pursue your dreams in a BIG way.<br/><span>Study the Arts and Humanities at UCF.</span></h3>
				</div>
				<img src="<?= get_stylesheet_directory_uri() . "/public/images/student.png"?>">
				<a href="#"><div>Learn More</div></a>
			</div>

			<div class="container">
				<div class="row">
					<div class="title">
						<h1>News</h1>
						<a href="/newsroom/latest-news/">Check out more stories</a>
					</div>
					<?php do_shortcode('[news]'); ?>
				</div>
			</div>

			<!-- Events section -->
			<div class="events" id="eventsbuttonanchor" style="background-image: url('<?=get_stylesheet_directory_uri() . '/public/images/knight.jpg'?>')">
				<div class="container">
					<div class="row">
						<div class="title">
							<h1>Events</h1>
							<a href="#">Check out more events</a>
						</div>
						<?php do_shortcode('[events numposts="4"]'); ?>
					</div>
				</div>
			</div>

			<div class="container" id="deptbuttonanchor">
				<div class="row">
					<div class="col-md-8 degree-programs">
						
						<div class="title">
							<h1 style="font-size:29px;">Departments, Schools and Centers</h1>
						</div>

						<p>The College of Arts and Humanities is home to a diverse range of disciplines, centers, and institutes, which allows for both immersive training in a single area and collaborative, interdisciplinary activities.</p>

						<ul class="col-md-6">
							<a href="https://africana.cah.ucf.edu/" target="_blank"><li>Africana Studies</li></a>
							<a href="https://american.cah.ucf.edu/"><li>American Studies</li></a>
							<a href="https://english.cah.ucf.edu/"><li>English</li></a>
							<a href="https://fiea.ucf.edu/" target="_blank"><li>Florida Interactive<br/> Entertainment Academy</li></a>
							<a href="https://flstudies.cah.ucf.edu/" target="_blank"><li>Florida Studies</li></a>
							<a href="https://history.cah.ucf.edu/" target="_blank"><li>History</li></a>
							<a href="https://judaicstudies.cah.ucf.edu/" target="_blank"><li>Judaic Studies</li></a>
							<a href="https://las.cah.ucf.edu/" target="_blank"><li>Latin American Studies</li></a>
							<a href="https://middleeasternstudies.cah.ucf.edu/" target="_blank"><li>Middle Eastern Studies</li></a>
							<a href="https://mll.cah.ucf.edu/" target="_blank"><li>Modern Languages and Literatures</li></a>
							<a href="https://performingarts.cah.ucf.edu/" target="_blank"><li>Performing Arts</li></a>
						</ul>

						<ul class="col-md-6">
							<a href="https://philosophy.cah.ucf.edu/" target="_blank"><li>Philosophy</li></a>
							<a href="https://tandt.cah.ucf.edu/" target="_blank"><li>Texts and Technology, Ph.D.</li></a>
							<a href="https://svad.cah.ucf.edu/" target="_blank"><li>Visual Arts and Design</li></a>
							<a href="https://wgst.cah.ucf.edu/" target="_blank"><li>Women's and Gender Studies</li></a>
							<a href="https://writingandrhetoric.cah.ucf.edu/" target="_blank"><li>Writing and Rhetoric</li></a>
							<a href="https://chdr.cah.ucf.edu/" target="_blank"><li>Center for Humanities and Digital Research</li></a>
							<a href="https://create.cah.ucf.edu/" target="_blank"><li>Center for Research and Education in Arts, Technology and Entertainment</li></a>
							<a href="https://flyinghorse.cah.ucf.edu/" target="_blank"><li>Flying Horse Editions</li></a>
							<a href="https://gallery.cah.ucf.edu/" target="_blank"><li>UCF Art Gallery</li></a>
							<a href="https://uwc.cah.ucf.edu/" target="_blank"><li>University Writing Center</li></a>
							<a href="https://zora.cah.ucf.edu/" target="_blank"><li>Zora Neale Hurston Institute</li></a>
						</ul>

					</div>
					<div class="col-md-4 aside">
						<div class="yellow-box">
							<img src="<?=get_stylesheet_directory_uri() . "/public/images/degree-icon-small.png"?>">
							<h1>Degree <br/>Programs</h1>
						</div>
						
						<p>The college has more than 120 of degree programs and areas of study</p>

						<ul>
							<a href="//www.ucf.edu/degree-search/?program-type%5B0%5D=accelerated-program&program-type%5B1%5D=graduate-degree&college%5B0%5D=college-of-arts-and-humanities&sort-by=title&default=0&offset=0&search-default=0" target="_blank"><li>&#9656; Graduate Degrees</li></a>
							<a href="//www.ucf.edu/degree-search/?program-type%5B0%5D=undergraduate-degree&program-type%5B1%5D=accelerated-program&college%5B0%5D=college-of-arts-and-humanities&sort-by=title&default=0&offset=0&search-default=0" target="_blank"><li>&#9656; Bachelor's Degrees</li></a>
							<a href="//www.ucf.edu/degree-search/?program-type%5B0%5D=minor&college%5B0%5D=college-of-arts-and-humanities&sort-by=title&default=0&offset=0&search-default=0" target="_blank"><li>&#9656; Minors</li></a>
							<a href="//www.ucf.edu/degree-search/?program-type%5B0%5D=certificate&college%5B0%5D=college-of-arts-and-humanities&sort-by=title&default=0&offset=0&search-default=0" target="_blank"><li>&#9656; Certificates</li></a>
						</ul>
					</div>
				</div>
			</div>
		</main><!-- #main -->


<?php
// get_sidebar();
get_footer();

?>