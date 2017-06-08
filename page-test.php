<?php
/**
* Template Name: Test Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>

<?php error_reporting(E_ALL);
ini_set('display_errors', 1); get_header(); ?>


<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="entry-header">
                            <h1 class="entry-title"><? echo get_the_title(); ?></h1>
                            <hr class="yellow-line">
            </header><br>
		</main><!-- #main -->

		<?php 
		
		/* echo site_url();
			
		$files = glob("wp-content/themes/cah-theme/public/images/hero/*.jpg");
		
		echo "<pre>";
		print_r($files);
		echo "</pre>"; */				
		
		
		
			
			//$files = scandir($path);
			
			//print_r($files);
		
		// Get the current blog id
$original_blog_id = get_current_blog_id(); 



// All the blog_id's to loop through
$bids = array( 5,8,9,11,13,18,20,22,26,30,33); 

foreach( $bids as $bid )
{
    // Switch to the blog with the blog_id $bid
    switch_to_blog( $bid ); 

    // ... your code for each blog ...
    $myposts = get_posts( 
        array( 
            'numberposts' => 1,
			'post_type' => 'post',
			'orderby' => 'date',
			'order' => 'ASC',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'category_name' => 'highlight',
        )
    );
	
	$returned_posts = get_posts( $myposts );
	
	/*echo "<pre>";
	print_r($returned_posts);
	echo "</pre>";*/
	
	
	if( $returned_posts ) {
		echo '<h2><a href="' . $returned_posts[0] -> guid . '">' . $returned_posts[0] -> post_title . '</a></h2>';
		echo '<p>' . $returned_posts[0] -> post_content . '</p>';
	}
	
}

// Switch back to the current blog
switch_to_blog( $original_blog_id ); 
		
		
		
		 ?>
        
     </div>

<?php
// get_sidebar();
get_footer();
?>





