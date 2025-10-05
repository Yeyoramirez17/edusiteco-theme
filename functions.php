<?php
/**
 * edusiteco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edusiteco
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edusiteco_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on edusiteco, use a find and replace
		* to change 'edusiteco' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'edusiteco', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'edusiteco' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'edusiteco_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'edusiteco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edusiteco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edusiteco_content_width', 640 );
}
add_action( 'after_setup_theme', 'edusiteco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edusiteco_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'edusiteco' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'edusiteco' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'edusiteco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edusiteco_scripts() {
	// WordPress theme info (required but contains only header)
	wp_enqueue_style( 'edusiteco-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// Main Tailwind CSS stylesheet
	wp_enqueue_style( 'edusiteco-base', get_template_directory_uri() . '/assets/css/index.css', array(), _S_VERSION );
	wp_style_add_data( 'edusiteco-base', 'rtl', 'replace' );

	// RTL stylesheet for Tailwind
	if ( is_rtl() ) {
		wp_enqueue_style( 'edusiteco-base-rtl', get_template_directory_uri() . '/assets/css/base-rtl.css', array( 'edusiteco-base' ), _S_VERSION );
	}

	// Main theme script
	wp_enqueue_script( 'edusiteco-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	// Navigation script (keep existing if exists)
	if ( file_exists( get_template_directory() . '/js/navigation.js' ) ) {
		wp_enqueue_script( 'edusiteco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	}

	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Pass data to JavaScript
	wp_localize_script( 'edusiteco-main', 'edusiteco_data', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'edusiteco_nonce' ),
		'theme_url' => get_template_directory_uri(),
	) );
}
add_action( 'wp_enqueue_scripts', 'edusiteco_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

