<?php
/**
 * Template Name: Splash Page Template
 */

get_header(); ?>

	</div>

	<?php
	$splashUrl = get_the_post_thumbnail_url();
	?>

	<div class="splash" style="background-image: url(<?=$splashUrl?>);">
	</div>

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<header class="entry-header">
	            <h1 class="entry-title"><? echo get_the_title(); ?>
	            </h1>
		            <hr class="yellow-line">
		        </header>

		        <?php 
		         while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
			        <div class="entry-content-page">
			            <?php the_content(); ?> <!-- Page Content -->
			        </div><!-- .entry-content-page -->

			    <?php
			    endwhile; //resetting the page loop
			    wp_reset_query(); //resetting the page query
			    ?>

			</main>
	        
	     </div>

<?php
// get_sidebar();
get_footer();
