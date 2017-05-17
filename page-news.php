<?php
/**
* Template Name: News Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>

<?php get_header(); ?>


<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
                            <h1 class="entry-title"><? echo get_the_title(); ?></h1>
            </header><br>
		</main><!-- #main -->

		<?php do_shortcode('[news numPosts="-1"]') ?>
        
     </div>

<?php
// get_sidebar();
get_footer();
?>





