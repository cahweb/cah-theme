<?php
/**
 * cah-starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cah-starter
 *
 * !!! DO NOT PUT CUSTOM POST TYPES HERE !!!
 *     Make a plugin for them, plenty of examples on the github
 *	   https://github.com/cahweb
 *
 * If you need to add custom functionality, put your functions in the bottom
 * section of this file
 */

// Register Custom Navigation Walker
//require_once('wp-bootstrap-navwalker.php');
require_once('wp-bootstrap-navwalker-cah.php');

if ( ! function_exists( 'cah_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cah_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cah-starter, use a find and replace
	 * to change 'cah-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cah-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'edit_post_link', '__return_false' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'cah-starter' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cah_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;

add_action( 'after_setup_theme', 'cah_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cah_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cah_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'cah_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cah_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cah-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cah-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cah_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cah_starter_scripts() {
	wp_enqueue_style( 'cah-starter-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'cah-starter-navigation', get_template_directory_uri() . '/public/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cah-starter-skip-link-focus-fix', get_template_directory_uri() . '/public/js/skip-link-focus-fix.js', array(), '20151215', true );

	// wp_enqueue_script( 'responsive-menu-fix', get_template_directory_uri() . '/public/js/menu-fix.js', array('jquery'), '20170518', true);

	// UCF Header bar
	wp_enqueue_script( 'cahweb-starter-ucfhb-script', '//universityheader.ucf.edu/bar/js/university-header.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cah_starter_scripts' );

/**
 * Load Dashicons for the front end (used for nav menu).
 */
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/*******
 * General custom functions
 * If you need to add a function put it here, and please comment it so
 * The next guy knows what the hell is going on.
 * Because chances are he'll also be an intern with
 * very little PHP experience at first. Help the little guys out.
 ****/

/**
 * Little function to display logo in markup and to keep the code relatively clean
 * The default style (in the css) will make it overlay the header image/slideshow
 */
$default_logo_location = get_stylesheet_directory_uri() . '/public/images/logo.png';
function display_logo( $logo_location ) {
	echo '<img class="site-logo" src="' . $logo_location . '">';
}

/**
 * Display copyright info for footer
 */
function display_footer_info() {
	echo get_bloginfo() . '&nbsp; | &nbsp;' . 'University of Central Florida';
	echo '<br>';
	// This should be changed to have site info stored in a plugin and pulled dynamically here
	echo '<a href="' . get_site_url() . "/about/contact/" . '">';
	echo '<u>Contact info</u>';
	echo '</a>';

	echo '&nbsp; | &nbsp;';

	echo '<a href="tel:+14078232251">';
	echo 'Phone: 407.823.2251';
	echo '</a>';
	echo '<br>';

	echo '12421 Aquarius Agora Dr., Orlando, FL 32816';
	echo '<br><br>';

	echo '<a href="https://www.facebook.com/UCFCAH" class="footer-facebook">';
	echo '<img src="' . get_stylesheet_directory_uri() . '/public/images/facebook-icon.png">';
	echo '</a>';
	echo '<br><br>';

	echo '&copy; ' . date("Y") . ' University of Central Florida';
}

/**
 * Get post by slug
 * I'm using this to display three small posts on the homepage as part of the 3 col layout
 */
function get_post_by_slug($slug) {
	$args=array(
		'name'           => $slug,
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 1
	);

	$returned_posts = get_posts( $args );
	if( $returned_posts ) {
		echo '<h2>' . $returned_posts[0] -> post_title . '</h2>';
		echo '<p>' . $returned_posts[0] -> post_content . '</p>';
	}
}

/**
 * Display Events index shortcode
 */
add_shortcode('events', 'display_events_index');

function display_events_index($atts = [], $content = null, $tag = '') {

	$atts = array_change_key_case((array)$atts, CASE_LOWER);
	$events_atts = shortcode_atts([
		'path' => 'upcoming/',
		'numposts' => '4'
	], $atts, $tag);

	$events_url = 'https://events.ucf.edu/calendar/3611/cah-events/';
	$json = array();


	$file = file_get_contents($events_url . $events_atts['path'] . 'feed.json');

	if (!empty($file)) {
		$result = json_decode($file);
		$json = array_merge($result, $json);
	} else {
		echo "Something went wrong while retrieving events.";
	}

	echo '<div class="cah-events row">';

	$num_posts = $events_atts['numposts'];
	$count = 0;

	foreach ($json as $post) {

		if ($count == $num_posts) {
			break;
		}

		$title = $post->{"title"};
		$starts = date("F j", strtotime($post->{"starts"}));
		$ends = date("F j", strtotime($post->{"ends"}));;
		$location = $post->{"location"};
		$description = strip_tags(substr($post->{"description"}, 0, 200) . "...");
		$url = $post->{"url"};

		?>
			<div class="cah-events-item col-6" onclick="location.href='<?=$url?>'">
				<h3><?=$starts?></h3>
				<h4><?=$title?></h4>
				<div class="cah-events-description"><?=$description?></div>
			</div>
		<?php

		$count++;
	}

	echo "</div>";
}
