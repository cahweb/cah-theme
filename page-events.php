<?php
/**
* Template Name: Events Page Template
*/
?>

<?php get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<header class="entry-header">
            <h1 class="entry-title"><? echo get_the_title(); ?></h1>
            <hr class="yellow-line">
        </header><br>
	</main><!-- #main -->

	<?php do_shortcode('[events numPosts="-1"]') ?>
 </div>

<?php
//get_sidebar();
get_footer();
?>





