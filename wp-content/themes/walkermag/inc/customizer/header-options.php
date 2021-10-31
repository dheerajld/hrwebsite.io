<?php
/**
*Frontpage  customizer options
*
* @package WalkerMag
*
*/
if (! function_exists('walkermag_header_options_register')) {
	function walkermag_header_options_register( $wp_customize ) {
		//header

		$wp_customize->add_section('walkermag_header_options', 
		 	array(
		        'title' => esc_html__('Header', 'walkermag'),
		        'panel' =>'walkermag_theme_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'enable_stikcy_header', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_stikcy_header', 
			array(
			  'label'   => esc_html__( 'Enable Sticky Header', 'walkermag' ),
			  'section' => 'walkermag_header_options',
			  'settings' => 'enable_stikcy_header',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
			
		);
		$wp_customize->add_setting( 'current_date_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'current_date_status', 
			array(
			  'label'   => esc_html__( 'Enable current date', 'walkermag' ),
			  'section' => 'walkermag_header_options',
			  'settings' => 'current_date_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
			
		);
		$wp_customize->add_setting( 'header_social_icons_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_social_icons_status', 
			array(
			  'label'   => esc_html__( 'Enable Social Icons', 'walkermag' ),
			  'section' => 'walkermag_header_options',
			  'settings' => 'header_social_icons_status',
			  'type'    => 'checkbox',
			  'priority' => 2,
			)
		);

		$wp_customize->add_setting( 'search_icon_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'search_icon_status', 
			array(
			  'label'   => esc_html__( 'Show Search Icon in Header', 'walkermag' ),
			  'section' => 'walkermag_header_options',
			  'settings' => 'search_icon_status',
			  'type'    => 'checkbox',
			  'priority' => 3,
			)
		);
		$wp_customize->add_setting( 'walkermag_heaer_bg_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_heaer_bg_color', 
				array(
			        'label'   => esc_html__( 'Background Color', 'walkermag' ),
			        'section' => 'walkermag_header_options',
			        'settings'   => 'walkermag_heaer_bg_color',
			         'priority' => 4
			    ) ) 
			);
			
			$wp_customize->add_setting( 'walkermag_header_text_color', 
				array(
			        'default'        => '#000000',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_header_text_color', 
				array(
			        'label'   => esc_html__( 'Text Color', 'walkermag' ),
			        'section' => 'walkermag_header_options',
			        'settings'   => 'walkermag_header_text_color',
			        'priority' => 4
			    ) ) 
			);
			$wp_customize->add_setting( 'walkermag_header_site_name_color', 
				array(
			        'default'        => '#c70315',
			        'sanitize_callback' => 'walkermag_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkermag_header_site_name_color', 
				array(
			        'label'   => esc_html__( 'Site Name color', 'walkermag' ),
			        'section' => 'walkermag_header_options',
			        'settings'   => 'walkermag_header_site_name_color',
			        'priority' => 4
			    ) ) 
			);

		/** header layout layout */
	    $wp_customize->add_setting( 
	        'walkermag_header_layout', 
	        array(
	            'default'           => 'header-layout-1',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );

	    if(walkermag_set_to_premium()){
	    	$header_layout_choices = array(
				'header-layout-1'  => esc_url( get_template_directory_uri() . '/images/customizer/header-layout-1.png' ),
				'header-layout-2'  => esc_url( get_template_directory_uri() . '/images/customizer/header-layout-2.png' ),
			);
	    }else{
	    	$header_layout_choices = array(
				'header-layout-1'  => esc_url( get_template_directory_uri() . '/images/customizer/header-layout-1.png' ),
			);
	    }
	    
	    $wp_customize->add_control(
			new WalkerMag_Radio_Image_Control_Vertical(
				$wp_customize,
				'walkermag_header_layout',
				array(
					'section'	  => 'walkermag_header_options',
					'label'		  => esc_html__( 'Choose Layout', 'walkermag' ),
					'description' => '',
					'choices'	  => $header_layout_choices,
					'priority' => 4,
				)
			)
		);

		$wp_customize->add_setting('header_ads_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walkermag_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_ads_image', array(
	        'label'             => esc_html__('Advertisement Banner Image', 'walkermag'),
	        'section'           => 'walkermag_header_options',
	        'settings'          => 'header_ads_image',
	        'active_callback'   => 'walkermag_current_header_layout',
	        'priority' => 5,
	    )));
	    $wp_customize->add_setting( 'header_ads_image_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'header_ads_image_link', 
            array(
              'label'   => esc_html__( 'Advertisement Link', 'walkermag' ),
              'section' => 'walkermag_header_options',
              'settings'   => 'header_ads_image_link',
              'type'     => 'text',
              'priority' => 6,
          )
        );
        if(walkermag_set_to_premium()){
		    $wp_customize->add_setting( 
		        'header_ads_position', 
		        array(
		            'default'           => 'header-ads-position-bottom',
		            'sanitize_callback' => 'walkermag_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_ads_position',
					array(
						'section'	  => 'walkermag_header_options',
						'label'		  => esc_html__( 'Banner Ads Image Position', 'walkermag' ),
						'description' => esc_html__( 'Select position to display advertisement image above/below the logo', 'walkermag' ),
						'type'        => 'select',
						'settings'	  => 'header_ads_position',
						'choices'	  => array(
							'header-ads-position-top'    => esc_html__('Top - Above Logo','walkermag'),
							'header-ads-position-bottom'  => esc_html__('Bottom - Below Logo','walkermag'),
						),
						'active_callback' => 'walkermag_ads_position_status',
						'priority' => 7,
					)
				)
			);
		}

		
	}
	function walkermag_current_header_layout(){
        $header_choice_type= get_theme_mod( 'walkermag_header_layout' );
		$header_ads_display_status = false;
		if($header_choice_type == 'header-layout-1' || $header_choice_type == 'header-layout-2'){
			$header_ads_display_status = true;
		}
		return $header_ads_display_status;
    }
    function walkermag_ads_position_status(){
    	$current_header_layout = get_theme_mod( 'walkermag_header_layout' );
    	$ads_position_status= false;
    	if($current_header_layout == 'header-layout-2'){
			$ads_position_status = true;
		}
		return $ads_position_status;
    }
    function walkermag_topmenu_status(){
        $header_choice_layout= get_theme_mod( 'walkermag_header_layout' );
		$header_topmenu_status = false;
		if($header_choice_layout == 'header-layout-1' || $header_choice_layout == 'header-layout-3'){
			$header_topmenu_status = true;
		}
		return $header_topmenu_status;
    }
    
}
add_action( 'customize_register', 'walkermag_header_options_register' );