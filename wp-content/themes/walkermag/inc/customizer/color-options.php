<?php
/**
*Typography customizer options
*
* @package WalkerMag
*
*/
add_action( 'customize_register', 'walkermag_color_settings_panel' );

function walkermag_color_settings_panel( $wp_customize)  {
    $wp_customize->get_section('colors')->priority = 1;
    $wp_customize->get_section( 'colors' )->title  = esc_html__('Color', 'walkermag');
    $wp_customize->get_section('colors')->panel = 'walkermag_theme_option';
}
if (! function_exists('walkermag_colors_options_register')) {
	function walkermag_colors_options_register( $wp_customize ) {
	
		$wp_customize->add_setting( 'walkermag_primary_color', 
			array(
		        'default'        => '#c70315',
		        'sanitize_callback' => 'walkermag_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkermag_primary_color', 
			array(
		        'label'   => esc_html__( 'Primary Color', 'walkermag' ),
		        'section' => 'colors',
		        'settings'   => 'walkermag_primary_color',
		        'priority' => 1
		    ) ) 
		);
		$wp_customize->add_setting( 'walkermag_secondary_color', 
			array(
		        'default'        => '#3f208e',
		        'sanitize_callback' => 'walkermag_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkermag_secondary_color', 
			array(
		        'label'   => esc_html__( 'Secondary Color', 'walkermag' ),
		        'section' => 'colors',
		        'settings'   => 'walkermag_secondary_color',
		        'priority' => 2
		    ) ) 
		);
		$wp_customize->add_setting( 'walkermag_text_color', 
			array(
		        'default'        => '#404040',
		        'sanitize_callback' => 'walkermag_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkermag_text_color', 
			array(
		        'label'   => esc_html__( 'Text Color', 'walkermag' ),
		        'section' => 'colors',
		        'settings'   => 'walkermag_text_color',
		        'priority' => 3
		    ) ) 
		);
		$wp_customize->add_setting( 'walkermag_dark_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walkermag_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkermag_dark_color', 
			array(
		        'label'   => esc_html__( 'Dark Color', 'walkermag' ),
		        'section' => 'colors',
		        'settings'   => 'walkermag_dark_color',
		        'priority' => 4
		    ) ) 
		);
		$wp_customize->add_setting( 'walkermag_light_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walkermag_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkermag_light_color', 
			array(
		        'label'   => esc_html__( 'Light Color', 'walkermag' ),
		        'section' => 'colors',
		        'settings'   => 'walkermag_light_color',
		        'priority' => 5
		    ) ) 
		);
		
	}

}
add_action( 'customize_register', 'walkermag_colors_options_register' );