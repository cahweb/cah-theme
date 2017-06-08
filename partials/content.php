<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cah-starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php cah_starter_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; 

		$id = get_the_id();

		if(!empty(get_post_meta($id,"author"))){
			$author = get_post_meta($id,"author",true);
			echo "<p>By: ".$author."</p>";
		}

		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$thumbnail = get_the_post_thumbnail_url();
			echo "<img style=\"height: 250px\" src=\"".$thumbnail."\"/>";
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cah-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
