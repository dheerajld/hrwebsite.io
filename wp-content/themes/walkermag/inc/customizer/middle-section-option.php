<?php
/**
*Middle Section  customizer options
*
* @package WalkerMag
*
*/
if (! function_exists('walkermag_middle_section_options_register')) {
	function walkermag_middle_section_options_register( $wp_customize ) {
		if(walkermag_set_to_premium()){
//Middle Section
		$wp_customize->add_section('walkermag_middle_section', 
		 	array(
		        'title' => esc_html__('Middle Section', 'walkermag'),
		        'panel' =>'walkermag_frontpage_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'middle_section_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );

	    
		$wp_customize->add_control( 'middle_section_status', 
			array(
			  'label'   => esc_html__( 'Enable Middle  Section', 'walkermag' ),
			  'section' => 'walkermag_middle_section',
			  'settings' => 'middle_section_status',
			  'type'    => 'checkbox',
			)
		);
	    	$section_choices = array(
				'single-cat-style-1'  => esc_html__('Single Category - Layout 1','walkermag'),
				'single-cat-style-2'  => esc_html__('Single Category - Layout 2','walkermag'),
				'single-cat-style-3'  => esc_html__('Single Category - Layout 3','walkermag'),
				'single-cat-style-4'  => esc_html__('Single Category - Layout 4','walkermag'),
				'double-cat-style-1'  => esc_html__('Dual Category - Layout 1','walkermag'),
				'double-cat-style-2'  => esc_html__('Dual Category - Layout 2','walkermag'),
				'double-cat-style-3'  => esc_html__('Dual Category - Layout 3','walkermag'),
				'three-cat-style-1'  => esc_html__('Three Category - Layout 1','walkermag'),
				'three-cat-style-2'  => esc_html__('Three Category - Layout 2','walkermag'),
			);
		$wp_customize->add_setting( 
	        'walkermag_middle_section_section', 
	        array(
	            'default'           => 'single-cat-style-1',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'walkermag_middle_section_section',
				array(
					'section'	  => 'walkermag_middle_section',
					'label'		  => __( 'Choose Section Layout', 'walkermag' ),
					'description' => '',
					'type'           => 'select',
					'choices'	  => $section_choices,
					'active_callback' => function(){
					    return get_theme_mod( 'middle_section_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting( 'middle_section_main_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkermag_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'middle_section_main_heading', 
			array(
				'type' => 'text',
				'section' => 'walkermag_middle_section',
				'label' => esc_html__( 'Section Heading','walkermag' ),
				'description' => esc_html__( 'Heading text for display on recent middle section main content','walkermag' ),
				'active_callback' => function(){
				    return get_theme_mod( 'middle_section_status', true );
				},
			)
		);
		$wp_customize->add_setting('walkermag_middle_section_main_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkermag_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new WalkerMag_Dropdown_Taxonomies_Control($wp_customize, 
			'walkermag_middle_section_main_category',
			    array(
			        'label'       => esc_html__('Select Main Category', 'walkermag'),
			        'description' =>esc_html('Select Cartgory to be shown on main content of middle section','walkermag'),
			        'section'     => 'walkermag_middle_section',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkermag_middle_section_main_category',
			        'priority'    => 10,
				    'active_callback' => function(){
					    return get_theme_mod( 'middle_section_status', true );
					},
			        
		    	)
			)
		);

		$wp_customize->add_setting( 'middle_section_sidebar_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkermag_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'middle_section_sidebar_heading', 
			array(
				'type' => 'text',
				'section' => 'walkermag_middle_section',
				'label' => esc_html__( 'Sidebar Section Heading','walkermag' ),
				'description' => '',
				'active_callback' => 'walkermag_middle_section_double_category_check',
			)
		);
		$wp_customize->add_setting('walkermag_middle_section_sidebar_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkermag_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new WalkerMag_Dropdown_Taxonomies_Control($wp_customize, 
			'walkermag_middle_section_sidebar_category',
			    array(
			        'label'       => esc_html__('Select Category 2', 'walkermag'),
			        'description' => esc_html__('Select secondary category to be shown on section','walkermag'),
			        'section'     => 'walkermag_middle_section',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkermag_middle_section_sidebar_category',
			        'priority'    => 10,
				    'active_callback' => 'walkermag_middle_section_double_category_check',
			        
		    	)
			)
		);
		$wp_customize->add_setting( 'middle_section_sidebar_heading_2', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkermag_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'middle_section_sidebar_heading_2', 
			array(
				'type' => 'text',
				'section' => 'walkermag_middle_section',
				'label' => esc_html__( 'Sidebar Section Heading 2','walkermag' ),
				'description' => '',
				'active_callback' => 'walkermag_middle_section_third_category_check',
			)
		);
		$wp_customize->add_setting('walkermag_middle_section_sidebar_category_2',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkermag_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new WalkerMag_Dropdown_Taxonomies_Control($wp_customize, 
			'walkermag_middle_section_sidebar_category_2',
			    array(
			        'label'       => esc_html__('Select Category 3', 'walkermag'),
			        'description' => esc_html__('Select secondary category to be shown on section','walkermag'),
			        'section'     => 'walkermag_middle_section',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkermag_middle_section_sidebar_category_2',
			        'priority'    => 10,
				    'active_callback' => 'walkermag_middle_section_third_category_check',
			        
		    	)
			)
		);
			$wp_customize->add_setting('middle_section_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkermag_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'middle_section_ads_image', array(
		        'label'             => esc_html__('Upload Image', 'walkermag'),
		        'description'       => esc_html__('Advertisement Image for middle section', 'walkermag'),
		        'section'           => 'walkermag_middle_section',
		        'settings'          => 'middle_section_ads_image',
		        'active_callback' => function(){
				    return get_theme_mod( 'middle_section_status', true );
				},
		    )));
		    $wp_customize->add_setting( 'middle_section_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'middle_section_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Advertisement Link', 'walkermag' ),
	              'section' => 'walkermag_middle_section',
	              'settings'   => 'middle_section_ads_image_link',
	              'type'     => 'text',
	              'active_callback' => function(){
				    return get_theme_mod( 'middle_section_status', true );
				},
	          )
	        );
	}
	function walkermag_middle_section_third_category_check(){
		$walkermag_section_status = get_theme_mod( 'middle_section_status');
        $section_chhoice_type= get_theme_mod( 'walkermag_middle_section_section' );
		$section_third_cat = false;
		if($walkermag_section_status == true && $section_chhoice_type == 'three-cat-style-1' || $walkermag_section_status == true && $section_chhoice_type == 'three-cat-style-2'){
			$section_third_cat = true;
		}
		return $section_third_cat;
    }
    function walkermag_middle_section_double_category_check(){
		$walkermag_section_status = get_theme_mod( 'middle_section_status');
        $section_chhoice_type= get_theme_mod( 'walkermag_middle_section_section' );
		$section_second_cat = false;
		if($walkermag_section_status == true && $section_chhoice_type == 'three-cat-style-1' || $walkermag_section_status == true && $section_chhoice_type == 'three-cat-style-2' ||  $walkermag_section_status == true && $section_chhoice_type == 'double-cat-style-3' || $walkermag_section_status == true && $section_chhoice_type == 'double-cat-style-2' ||  $walkermag_section_status == true && $section_chhoice_type == 'double-cat-style-1'){
			$section_second_cat = true;
		}
		return $section_second_cat;
    }
}
}
add_action( 'customize_register', 'walkermag_middle_section_options_register' );