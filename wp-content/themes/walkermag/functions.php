<?php
/**
 * WalkerMag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WalkerMag
 */

if ( ! defined( 'WALKERMAG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'WALKERMAG_VERSION', '1.0.0' );
}

if ( ! function_exists( 'walkermag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function walkermag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WalkerMag, use a find and replace
		 * to change 'walkermag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'walkermag', get_template_directory() . '/languages' );

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
		/*
		*Custom header theme support
		*
		*/
		add_theme_support( 'custom-header' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary Menu', 'walkermag' ),
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
		$args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $args );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'walkermag_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'walkermag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function walkermag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'walkermag_content_width', 640 );
}
add_action( 'after_setup_theme', 'walkermag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function walkermag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'walkermag' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
}
add_action( 'widgets_init', 'walkermag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function walkermag_scripts() {
	wp_enqueue_style( 'walkermag-style', get_stylesheet_uri(), array(), WALKERMAG_VERSION );
	wp_style_add_data( 'walkermag-style', 'rtl', 'replace' );
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '4.7.0');
	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.css', '6.5.9');

	wp_enqueue_script( 'walkermag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), WALKERMAG_VERSION , true );
	wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.js', array('jquery'), '6.5.9', true );
	wp_enqueue_script( 'walkermag-scripts', get_template_directory_uri() . '/js/walkermag-scripts.js', array('jquery'), '', true );


	$walkermag_body_font = esc_html(get_theme_mod('walkermag_body_fonts'));
	$walkermag_heading_font = esc_html(get_theme_mod('walker_heading_fonts'));
	

	if( $walkermag_body_font ) {
		wp_enqueue_style( 'walkermag-body-fonts', '//fonts.googleapis.com/css?family='. $walkermag_body_font );
	} else {
		wp_enqueue_style( 'walkermag-body-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
	}

	if( $walkermag_heading_font ) {
		wp_enqueue_style( 'walkermag-headings-fonts', '//fonts.googleapis.com/css?family='. $walkermag_heading_font );
	} else {
		wp_enqueue_style( 'walkermag-headings-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
	}

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'walkermag_scripts' );

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
 * Walkermag dynamic sidebar register
 */
require get_template_directory() . '/inc/walkermag-widgets.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Recommended plugins for this theme.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Adds customizable styles to your <head>
 */
if ( ! function_exists( 'walkermag_dynamic_css' ) ) :
	function walkermag_dynamic_css(){
		get_template_part('inc/customizer/dynamic-style');

	} 
endif;
add_action( 'wp_head', 'walkermag_dynamic_css');
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if( ! function_exists('walkermag_filter_archive_title')):
	function walkermag_filter_archive_title( $title ) {
		return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
	}
endif;
add_filter( 'get_the_archive_title', 'walkermag_filter_archive_title' );


/**
Adding Woocommerce support to the theme walkermag
*/
if ( ! function_exists( 'walkermag_woocommerce_support' ) ) :
function walkermag_woocommerce_support() {
    add_theme_support( 'woocommerce' );
} endif;
add_action( 'after_setup_theme', 'walkermag_woocommerce_support' );

if(class_exists('woocommerce')){
	add_filter('loop_shop_columns', 'walkermag_alter_woo_columns');
	if (!function_exists('walkermag_alter_woo_columns')) {
		function walkermag_alter_woo_columns() {
			return 3;
		}
	}
}


function walkermag_set_to_premium() {
	$premium_status = false;
	if ( class_exists( 'Walker_Core' ) ) {
		$WC = new Walker_Core();
		$premium_status = $WC->walker_core_premium_status();
	}
	return $premium_status;

}