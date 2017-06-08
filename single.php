<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cah-starter
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md-9" role="main">
        
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'partials/content', get_post_format() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php get_sidebar();?>
    </div>
<?php
get_footer();
