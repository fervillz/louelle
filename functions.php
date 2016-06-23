<?php
/**
 * louelle functions and definitions
 *
 * @package louelle
 */

if ( ! function_exists( 'louelle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function louelle_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on louelle, use a find and replace
	 * to change 'louelle' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'louelle', get_template_directory() . '/languages' );

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

	add_image_size( 'louelle-featured', '656', '300', true );
	add_image_size( 'louelle-site-logo', '300', '300' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'louelle' ),
	) );

	add_editor_style( array( 'editor-style.css', louelle_fonts_url(), get_template_directory_uri() . '/genericons/genericons.css' ) );

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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'louelle_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // louelle_setup
add_action( 'after_setup_theme', 'louelle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function louelle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'louelle_content_width', 640 );
}
add_action( 'after_setup_theme', 'louelle_content_width', 0 );

/**
 * Enqueue the stylesheet.
 */
function enqueue_customizer_stylesheet() {

	wp_register_style( 'customizer-css', get_template_directory_uri() . '/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'customizer-css' );

}
add_action( 'customize_controls_print_styles', 'enqueue_customizer_stylesheet' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function louelle_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'louelle' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'louelle_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function louelle_scripts() {
	wp_enqueue_style( 'louelle-style', get_stylesheet_uri() );

	wp_enqueue_style( 'louelle-fonts', louelle_fonts_url(), array(), null );

	wp_enqueue_style( 'louelle-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	wp_enqueue_style( 'louelle-sidr', get_template_directory_uri() . '/sidr.css', array(), '3.0.3' );

	wp_enqueue_style( 'louelle-animate', get_template_directory_uri() . '/animate.css', false , false );

	wp_enqueue_script( 'louelle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( 'jquery' ), '1.0', true  );

	wp_enqueue_script( 'louelle-headroom', get_template_directory_uri() . '/js/headroom.min.js', false , '0.9.3', true  );

	wp_enqueue_script( 'loulle-sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array() , '2.2.1', true  );

	wp_enqueue_script( 'loulle-scripts', get_template_directory_uri() . '/js/scripts.js', false , '1.0', true  );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'louelle_scripts' );

/**
 * Register Google Fonts
 */
function louelle_fonts_url() {
    $fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Roboto Slab, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$font_families = array();
	
	$heading_font_family = get_theme_mod( 'louelle_google_fonts_heading_font', null );
	$body_font_family = get_theme_mod( 'louelle_google_fonts_body_font', null );

	if ( !empty( $heading_font_family ) && $heading_font_family !== 'none' ) {
		$heading_font = _x( 'on', $heading_font_family . ' font: on or off', 'louelle' );
		if ( 'off' !== $heading_font ) {
			$font_families[] = $heading_font_family;
		}
	}

	if ( !empty( $body_font_family ) && $body_font_family !== 'none' && $body_font_family !== $heading_font_family ) {
		$body_font = _x( 'on', $body_font_family . ' font: on or off', 'louelle' );
		if ( 'off' !== $body_font ) {
			$font_families[] = $body_font_family;
		}
	}


	if ( count( $font_families ) === 4 ) {
		array_slice( $font_families, 2 );
	}

	if ( !empty( $font_families ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

function louelle_load_theme_fonts()
{
	$heading = get_theme_mod( 'louelle_google_fonts_heading_font' );
	$body = get_theme_mod( 'louelle_google_fonts_body_font' );
	if ( ( !empty( $heading ) && $heading != 'none' ) || ( !empty( $body ) && $body != 'none' ) ) {
		echo '<style type="text/css">';
		$imports = array();
		$styles = array();
		if ( !empty( $heading ) && $heading != 'none' ) {
			$imports[] = '@import url(//fonts.googleapis.com/css?family=' . urlencode( $heading ) . ');';
			$styles[] = 'h1, h2, h3, h4, h5, h6 { font-family: "' . $heading . '" !important }';
		}
		if ( !empty( $body ) && $body != 'none' ) {
			$imports[] = '@import url(//fonts.googleapis.com/css?family=' . urlencode( $body ) . ');';
			$styles[] = 'body, .herotext, .herobuttons .button { font-family: "' . $body . '" !important }';
		}

		echo implode( "\r\n", $imports );
		echo implode( "\r\n", $styles );
		echo '</style>';

	}
}
add_action( 'wp_head', 'louelle_load_theme_fonts' );

/**
 * Enqueue Google Fonts for custom headers
 */
function louelle_admin_styles() {

	wp_enqueue_style( 'louelle-fonts', louelle_fonts_url(), array(), null );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'louelle_admin_styles' );


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

/**
 * Dynamic styling.
 */
require get_template_directory() . '/inc/style.php';

?>
