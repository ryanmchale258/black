<?php
/**
 * Black Mountain Marketing functions and definitions
 *
 * @package Black Mountain Marketing
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bmm_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bmm_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Black Mountain Marketing, use a find and replace
	 * to change 'bmm' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bmm', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size('large-thumb', 1060, 650, true);
        add_image_size('archive-thumb', 780, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bmm' ),
                'social' => __( 'Social Menu', 'bmm' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'bmm_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // bmm_setup
add_action( 'after_setup_theme', 'bmm_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bmm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bmm' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'bmm' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Footer widgets area. Appears in the footer of the site', 'bmm' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bmm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bmm_scripts() {
	wp_enqueue_style( 'bmm-style', get_stylesheet_uri() );
        
        if (is_page_template('page-templates/page-nosidebar.php')) {
            wp_enqueue_style( 'bmm-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
        } else {
            wp_enqueue_style( 'bmm-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
        }

	wp_enqueue_script( 'bmm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bmm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        
        wp_enqueue_script( 'bmm-masonry', get_template_directory_uri() . '/js/main.js', array('jquery', 'masonry'), '20150419', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bmm_scripts' );

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

function my_custom_frontpage_content() {
    $labels = array(
            'menu_name' => 'Front Page',
            'name' => 'Front Page Items',
            'singular_name' => 'Front Page Item'
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true,
        'description'   => 'Custom home page content. Displays on front page only',
    );
    register_post_type( 'front-page', $args ); 
}
add_action( 'init', 'my_custom_frontpage_content' );