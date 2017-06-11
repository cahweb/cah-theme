<?php
/**
* Template Name: News Submission Page Template
*
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
*/
?>

<?php get_header(); 

	if(isset($_POST['submit']))
	{
	 	$to = 'aleangel1212@gmail.com';
	 	$subject = 'CAH News Submission';
	   	$headline=$_POST['headline'];

	   	if(mail($to,$subject,$headline))
	   	{
	     	echo "mail sent";
	   	}	
	   	else
	   	{
	     	echo "mail failed";
	   	}
	}
	
?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<header class="entry-header">
                        <h1 class="entry-title"><? echo get_the_title(); ?></h1>
                        <hr class="yellow-line">
        </header><br>

        <form name="news-form" method="post" action="#">
        	<label for="headline">Headline:</label>
        	<input type="text" name="headline">
        	<input type="submit" value="Submit" name="submit" id="sub">
        </form>

	</main><!-- #main -->
        
</div>

<?php

get_footer();
?>





