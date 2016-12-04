<?php
/**
 * my-simone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my-simone
 */

/**
 * set the content width based on the theme 's design and stylesheet.
 */

if (! isset($content_width)){
	$content_width = 600; /* pixel */
}

if ( ! function_exists( 'my_simone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function my_simone_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on my-simone, use a find and replace
	 * to change 'my-simone' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'my-simone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	add_image_size('large-thumb', 1060, 650, true);
	add_image_size('index-thumb', 780, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'my-simone' ),
		'social' => esc_html__( 'Social Menu', 'my-simone' ),
	) );

	// Set up support for formats
	add_theme_support( 'post-formats', array('aside','standard'));

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
//	add_theme_support( 'custom-background', apply_filters( 'my_simone_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );



}
endif;
add_action( 'after_setup_theme', 'my_simone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_simone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_simone_content_width', 600 );
}
add_action( 'after_setup_theme', 'my_simone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_simone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'my-simone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'my-simone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'my-simone' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here. this widgets appear at footer of the site', 'my-simone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'my_simone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my_simone_scripts() {
	wp_enqueue_style( 'my-simone-style', get_stylesheet_uri() );

	wp_enqueue_style( 'my-simone-font-style', get_template_directory_uri().'/fontiran.css' );

	if (is_page_template('page-template/page-nosidebar.php')) {
		wp_enqueue_style( 'my-sinome-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
	} else {
		wp_enqueue_style( 'my-sinome-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}

	wp_enqueue_script('my-simone-fontawsome','https://use.fontawesome.com/44a08c9391.js');

	wp_enqueue_script( 'my-simone-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20160728', true );

	wp_enqueue_script( 'my-simone-superfish-settings', get_template_directory_uri() . '/js/superfish-setting.js', array('my-simone-superfish'), '20160728', true );

//	wp_enqueue_script( 'my-simone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'my-simone-navigations', get_template_directory_uri() . '/js/navigations.js', array('jquery'), '20160815', true );

	wp_enqueue_script( 'my-simone-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20160728', true );

	wp_enqueue_script( 'my-simone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'my-simone-masonry', get_template_directory_uri() . '/js/masonry-setting.js', array('masonry'), '20160823', true );

}
add_action( 'wp_enqueue_scripts', 'my_simone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
