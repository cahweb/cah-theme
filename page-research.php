<?php
/**
* Template Name: Research Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>


<?php get_header(); 
	include(getcwd() . "\\wp-content\\themes\\tbone\\common_newfunctions.php");
?>


<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// TO SHOW THE PAGE CONTENTS
					while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
						<header class="entry-header">
                            <h1 class="entry-title"><? echo get_the_title(); ?></h1>
                        </header>
                        
                        <div class="entry-content-page">
							<?php the_content(); ?> <!-- Page Content -->
						</div><!-- .entry-content-page -->
				
					<?php
				endwhile; //resetting the page loop
				wp_reset_query(); //resetting the page query
		     ?>
             
             <div class="row">
             
             <div class="col-md-6">
             
             <h2><a href="/newsroom/publications/">Recent Faculty Publications</a></h2>
							  <?php
								print_cah_publications(0,1,0,6,36,3,0,false,false);
							  ?>
							<p style="padding-top:25px;"><a href="/publications.php" class="btn btn-primary">View all recent publications</a></button></p>
                            
              </div>
              
         <div class="col-md-6">
           <h2 id="yui-gen13">Featured Projects</h2>
             <a href="http://chdr.cah.ucf.edu/spaceandspirituality/"><img src="http://www.cah.ucf.edu/images/researchfeature/sss.jpg" width="385" height="188"></a><br><br>
             <a href="https://riches.cah.ucf.edu/?page_id=1764"><img src="http://www.cah.ucf.edu/images/researchfeature/richespodcast.jpg" width="385" height="188"></a><br><br>
             <a href="http://writingandrhetoric.cah.ucf.edu/showcase.php"><img src="http://www.cah.ucf.edu/images/researchfeature/knightswrite.jpg" width="385" height="188"></a><br><br>
             
           <a href="http://brockdenbrown.cah.ucf.edu/"><img src="http://www.cah.ucf.edu/images/researchfeature/brockdenbrown.jpg" width="385" height="188"></a>
                
          </div>
                            
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


