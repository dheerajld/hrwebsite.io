<?php
/**
*Typography customizer options
*
* @package WalkerMag
*
*/

if (! function_exists('walkermag_typography_options_register')) {
	function walkermag_typography_options_register( $wp_customize ) {
	//Typography
		$wp_customize->add_section('walkermag_site_typography', 
		 	array(
		        'title' => esc_html__('Typography', 'walkermag'),
		        'panel' =>'walkermag_theme_option',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$font_choices = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

		$wp_customize->add_setting( 'walkermag_body_fonts', array(
				'sanitize_callback' => 'walkermag_sanitize_fonts',
				'default' => 'Roboto:400,400italic,700,700italic',
			)
		);

		$wp_customize->add_control( 'walkermag_body_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Select Body Font', 'walkermag' ),
				'section' => 'walkermag_site_typography',
				'choices' => $font_choices
			)
		);
		$wp_customize->add_setting( 'walkermag_font_size',
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 16,
			) 
		);

		$wp_customize->add_control( 'walkermag_font_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_font_size',
				'label' => esc_html__( 'Font Size for Body','walkermag' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'walkermag_heading_fonts', array(
				'sanitize_callback' => 'walkermag_sanitize_fonts',
				'default' => 'Roboto:400,400italic,700,700italic',
			)
		);

		$wp_customize->add_control( 'walkermag_heading_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Select Heading Font', 'walkermag' ),
				'section' => 'walkermag_site_typography',
				'choices' => $font_choices
			)
		);
		$wp_customize->add_setting( 'walkermag_heading_one_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 48,
			) 
		);

		$wp_customize->add_control( 'walkermag_heading_one_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_heading_one_size',
				'label' => esc_html__( 'Font Size for H1','walkermag' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'walkermag_heading_two_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 36,
			) 
		);

		$wp_customize->add_control( 'walkermag_heading_two_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_heading_two_size',
				'label' => esc_html__( 'Font Size for H2','walkermag' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'walkermag_heading_three_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 24,
			) 
		);

		$wp_customize->add_control( 'walkermag_heading_three_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_heading_three_size',
				'label' => esc_html__( 'Font Size for H3','walkermag' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'walkermag_heading_four_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 20,
			) 
		);

		$wp_customize->add_control( 'walkermag_heading_four_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_heading_four_size',
				'label' => esc_html__( 'Font Size for H4','walkermag' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'walkermag_heading_five_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 16,
			) 
		);

		$wp_customize->add_control( 'walkermag_heading_five_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_heading_five_size',
				'label' => esc_html__( 'Font Size for H5','walkermag' ),
				'description' => '',
			) 
		);
		$wp_customize->add_setting( 'walkermag_heading_six_size', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkermag_sanitize_number_absint',
				'default' => 13,
			) 
		);

		$wp_customize->add_control( 'walkermag_heading_six_size', 
			array(
				'type' => 'number',
				'section' => 'walkermag_site_typography',
				'settings' => 'walkermag_heading_six_size',
				'label' => esc_html__( 'Font Size for H6','walkermag' ),
				'description' => '',
			) 
		);
		
	}

}
add_action( 'customize_register', 'walkermag_typography_options_register' );