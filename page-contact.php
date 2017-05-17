<?php
/**
* Template Name: Contact Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css">


<?php get_header(); 
include(getcwd() . "\\wp-content\\themes\\tbone\\common_newfunctions.php");
?>



<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.min.js"></script>

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
             
          <?
						$sql = "select description,id from departments where show_directory=true order by description";
	
	print_selectfield("dept","Choose a Department/Program/Office/Center ","","departments","description",$dept,$dept_error,$extra,$sql);
					?>
             
             <div class="row">
           
           <table id="directory" class="table table-striped table-bordered responsive no-wrap" width="100%">
  <thead>
	<tr>
        
        <th>Name</th>
        <th>Position</th>
        <th>Email</th>
        <th>Phone</th>
	</tr>
  </thead>
  <tfoot>
	<tr>
        
        <th>Name</th>
        <th>Position</th>
        <th>Email</th>
        <th>Phone</th>
	</tr>
  </tfoot>
  <tbody>
  </tbody>
</table>		  

              </div>
             
		</main><!-- #main -->
        
     </div>

<?php
// get_sidebar();
get_footer();
include(getcwd() . "\\wp-content\\includes\\directory_js.php");
?>





