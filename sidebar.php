<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cah-starter
 */

?>

<aside id="secondary" class="widget-area col-md-3" role="complementary">
	<?php get_search_form();?>
	<h4>Latest News</h4>
	<ul class="sidebar-list">
	<?php

		$query = new WP_Query(array(
		    'post_type' => 'news',
		    'post_status' => 'publish',
		    'posts_per_page' => 3
		));


		while ($query->have_posts()) {
		    $query->the_post();
		    $title = get_the_title();
		    $url = get_permalink();
		    
		  	echo "<a href=\"".$url."\"><li>".$title."</li></a>";
		}

		wp_reset_query();

	?>
	</ul>
	<a href="/newsroom/latest-news/" class="sidebar-news-link">View All Stories</a>
</aside><!-- #secondary -->
