<?php
/**
 * WalkerMag Theme Customizer
 *
 * @package WalkerMag
 */
/**
*
*Custom controls for theme
*/

require get_template_directory() . '/inc/walkermag-custom-controls.php';
/**
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function walkermag_customize_register( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->priority = 15;
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'walkermag_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'walkermag_customize_partial_blogdescription',
			)
		);
	}
	//Panel register for theme option
    $wp_customize->add_panel( 'walkermag_theme_option', 
	  	array(
		    'priority'       => 20,
		    'capability'     => 'edit_theme_options',
		    'title'      => esc_html__('General Settings', 'walkermag'),
		) 
	);

	$wp_customize->add_panel( 'walkermag_frontpage_option', 
	  	array(
		    'priority'       => 21,
		    'capability'     => 'edit_theme_options',
		    'title'      => esc_html__('Front Page Settings', 'walkermag'),
		) 
	);
	$wp_customize->add_setting( 'enable_scroll_top', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_scroll_top', 
			array(
			  'label'   => esc_html__( 'Enable Scroll Top Icon', 'walkermag' ),
			  'section' => 'walkermag_footer_setting',
			  'settings' => 'enable_scroll_top',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
			
		);
}
add_action( 'customize_register', 'walkermag_customize_register' );

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/walkermag-sanitization-functions.php';
/**
*
*Includeing theme customizer options
*
*/
require get_template_directory() . '/inc/customizer/color-options.php';
require get_template_directory() . '/inc/customizer/typography-options.php';
require get_template_directory() . '/inc/customizer/header-options.php';
require get_template_directory() . '/inc/customizer/social-options.php';
require get_template_directory() . '/inc/customizer/frontpage-options.php';
require get_template_directory() . '/inc/customizer/blog-options.php';
require get_template_directory() . '/inc/customizer/footer-options.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function walkermag_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function walkermag_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
*
*Enqueue customizer styles and scripts
*/
function walkermag_customize_controls_register_scripts() {
	wp_enqueue_style( 'walkermag-customizer-styles', get_template_directory_uri() . '/inc/customizer/walkermag-customizer-style.css', array(), '1.0.0' );
}
add_action( 'customize_controls_enqueue_scripts', 'walkermag_customize_controls_register_scripts', 0 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function walkermag_customize_preview_js() {
	wp_enqueue_script( 'walkermag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), WALKERMAG_VERSION, true );
}
add_action( 'customize_preview_init', 'walkermag_customize_preview_js' );
