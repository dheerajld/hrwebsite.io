<?php
/**
*Footer customizer options
*
* @package walkermag
*
*/

	if (! function_exists('walkermag_footer_options_register')) {
		function walkermag_footer_options_register( $wp_customize ) {
			$wp_customize->add_section('walkermag_footer_setting', 
			 	array(
			        'title' => esc_html__('Footer', 'walkermag'),
			        'panel' =>'walkermag_theme_option',
			        'priority' => 12
		    	)
			 );
			if(walkermag_set_to_premium()):
			$wp_customize->add_setting( 'walkermag_footer_bg_color', 
				array(
			        'default'        => '#000000',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_footer_bg_color', 
				array(
			        'label'   => esc_html__( 'Footer Background Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_footer_bg_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->selective_refresh->add_partial( 'walkermag_footer_bg_color', array(
	            'selector' => 'footer#colophon',
	        ) );
			$wp_customize->add_setting( 'walkermag_footer_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_footer_text_color', 
				array(
			        'label'   => esc_html__( 'Footer Text Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_footer_text_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walkermag_footer_link_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_footer_link_color', 
				array(
			        'label'   => esc_html__( 'Footer Link Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_footer_link_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walkermag_footer_link_hover_color', 
				array(
			        'default'        => '#d80133',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_footer_link_hover_color', 
				array(
			        'label'   => esc_html__( 'Footer Link Hover Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_footer_link_hover_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walkermag_footer_bottom_color', 
				array(
			        'default'        => '#000000',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_footer_bottom_color', 
				array(
			        'label'   => esc_html__( 'Copyright Background Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_footer_bottom_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walkermag_copyright_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_copyright_text_color', 
				array(
			        'label'   => esc_html__( 'Footer Copyright Text Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_copyright_text_color',
			        'priority' => 4
			    ) ) 
			);

			$wp_customize->add_setting( 'walkermag_copyright_text_link_hover_color', 
				array(
			        'default'        => '#d80133',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_copyright_text_link_hover_color', 
				array(
			        'label'   => esc_html__( 'Copyright Link Hover Color', 'walkermag' ),
			        'section' => 'walkermag_footer_setting',
			        'settings'   => 'walkermag_copyright_text_link_hover_color',
			        'priority' => 4
			    ) ) 
			);
			
			$wp_customize->add_setting( 'footer_copiright_text', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'footer_copiright_text', 
				array(
					'type' => 'textarea',
					'section' => 'walkermag_footer_setting',
					'label' => esc_html__( 'Footer Text','walkermag' ),
					'description' => esc_html__( 'Adding Footer Copyright Text','walkermag' ),
				)
			);
			$wp_customize->add_setting( 
	        'copyright_text_alignment', 
	        array(
	            'default'           => 'copyright-text-align-left',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'copyright_text_alignment',
				array(
					'section'	  => 'walkermag_footer_setting',
					'label'		  => esc_html__( 'Copyright Text Alignment', 'walkermag' ),
					'description' => '',
					'type'        => 'select',
					'choices'	  => array(
						'copyright-text-align-left'  => esc_html__('Left','walkermag'),
						'copyright-text-align-center'  => esc_html__('Center','walkermag'),
					),
					
				)
			)
		);
			$wp_customize->selective_refresh->add_partial( 'footer_copiright_text', array(
	            'selector' => '.site-info',
	        ) );
	    endif;
		}

	}
	add_action( 'customize_register', 'walkermag_footer_options_register' );

