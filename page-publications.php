<?php
/**
* Template Name: Publications Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>


<?php get_header(); 
//$css_uri = get_stylesheet_directory_uri(); 
//$css_link1 = $css_uri .'/includes/bootstrap_fctable.css'; 
include(getcwd() . "\\wp-content\\themes\\tbone\\common_newfunctions.php");
?>

<!--- <link rel="stylesheet" type="text/css" href="<?php //echo $css_link1; ?>" media='all'> --->



<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// TO SHOW THE PAGE CONTENTS
					while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
						<header class="entry-header">
                            <h1 class="entry-title"><? echo get_the_title(); ?></h1>
                            <hr class="yellow-line">
                        </header>
                        
                        <div class="entry-content-page">
							<?php the_content(); ?> <!-- Page Content -->
						</div><!-- .entry-content-page -->
				
					<?php
				endwhile; //resetting the page loop
				wp_reset_query(); //resetting the page query
		     ?>
             
             <div class="row">
             
             
							  <?
					
						print_cah_publications(0,1,0,0,36,3,0,false,false);
					?>

              </div>
             
		</main><!-- #main -->
        
     </div>

<?php
// get_sidebar();
get_footer();
?>


<!--- change the title --->
<script>
//$(".faculty-title").nextAll(".row:first").hide();
//$(".faculty-title").html("Faculty");
</script>


