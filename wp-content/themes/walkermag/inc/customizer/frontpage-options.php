<?php
/**
*Frontpage  customizer options
*
* @package WalkerMag
*
*/
if (! function_exists('walkermag_frontpage_options_register')) {
	function walkermag_frontpage_options_register( $wp_customize ) {
		//Focus news
		$wp_customize->add_section('walkermag_focus_options', 
		 	array(
		        'title' => esc_html__('News Ticker', 'walkermag'),
		        'panel' =>'walkermag_theme_option',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'focus_news_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'focus_news_status', 
			array(
			  'label'   => esc_html__( 'Enable News Ticker', 'walkermag' ),
			  'section' => 'walkermag_focus_options',
			  'settings' => 'focus_news_status',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_setting( 'focus_news_all_page_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'focus_news_all_page_status', 
			array(
			  'label'   => esc_html__( 'Enable News Ticker all over site', 'walkermag' ),
			  'section' => 'walkermag_focus_options',
			  'settings' => 'focus_news_all_page_status',
			  'type'    => 'checkbox',
			)
		);

		$focus_news_choices = array(
			'focus-layout-ticker'  => esc_url( get_template_directory_uri() . '/images/customizer/focus-layout-ticker.png' ),
			'focus-layout-grid'  => esc_url( get_template_directory_uri() . '/images/customizer/focus-grid.png' ),
				
		);
		$wp_customize->add_setting( 
	        'walkermag_focus_layout', 
	        array(
	            'default'           => 'focus-layout-ticker',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );
	    $wp_customize->add_control(
			new WalkerMag_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkermag_focus_layout',
				array(
					'section'	  => 'walkermag_focus_options',
					'label'		  => esc_html__( 'Choose Focus News Layout', 'walkermag' ),
					'description' => '',
					'choices'	  => $focus_news_choices,
					'active_callback' => function(){
							return get_theme_mod( 'focus_news_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting( 'focus_news_ticker_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkermag_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'focus_news_ticker_heading', 
			array(
				'type' => 'text',
				'section' => 'walkermag_focus_options',
				'label' => esc_html__( 'Ticker News Heading','walkermag' ),
				'description' => esc_html__( 'Heading text for display on ticker news section','walkermag' ),
				'active_callback' =>'walkermag_check_focus_layout',
			)
		);
		/** header layout layout */
		$wp_customize->add_setting( 'focus_news_items_show', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => 5,
				'sanitize_callback' => 'absint',
			) 
		);
		$wp_customize->add_control( 'focus_news_items_show', 
			array(
				'type' => 'number',
				'section' => 'walkermag_focus_options',
				'label' => esc_html__( 'Items to show','walkermag' ),
				'description' => esc_html__( 'Total items to be shown on news news-ticker','walkermag' ),
				'active_callback' => function(){
				    return get_theme_mod( 'focus_news_status', true );
				},
				'input_attrs' => array(
			        'min'   => 5,
			        'max'   => 15,
			        'step'  => 1,
			    ),
			)
		);

		$wp_customize->add_setting( 
	        'focus_news_post_type', 
	        array(
	            'default'           => 'latest-post',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'focus_news_post_type',
				array(
					'section'	  => 'walkermag_focus_options',
					'label'		  => esc_html__( 'Choose Post Type', 'walkermag' ),
					'description' => '',
					'type'           => 'select',
					'choices'	  => array(
						'latest-post'    => esc_html__('Latest Posts','walkermag'),
						'select-category'  => esc_html__('Select Category','walkermag'),
					),
					'active_callback' => function(){
							return get_theme_mod( 'focus_news_status', true );
					},
				)
			)
		);

		$wp_customize->add_setting('walkermag_focus_news_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkermag_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new WalkerMag_Dropdown_Taxonomies_Control($wp_customize, 
			'walkermag_focus_news_category',
			    array(
			        'label'       => esc_html__('Select Category', 'walkermag'),
			        'description' => esc_html__('Select category to be shown on home page news ticker section. Recommended minimum 5 and maximum 15', 'walkermag'),
			        'section'     => 'walkermag_focus_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkermag_focus_news_category',
			        'priority'    => 10,
			        'active_callback' => 'walkermag_current_post_type',
		    	)
			)
		);
		if(walkermag_set_to_premium()){
			$focus_news_position_choices = array(
				'focusnews-position-below-featured'  => esc_html__('Below Featured Section','walkermag'),
				'focusnews-position-above-featured'  => esc_html__('Above Featured Section','walkermag'),
					
			);

			$wp_customize->add_setting( 
		        'focus_news_position', 
		        array(
		            'default'           => 'focusnews-position-below-featured',
		            'sanitize_callback' => 'walkermag_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'focus_news_position',
					array(
						'section'	  => 'walkermag_focus_options',
						'label'		  => esc_html__( 'Choose Position', 'walkermag' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => $focus_news_position_choices,
						'active_callback' => function(){
								return get_theme_mod( 'focus_news_status', true );
						},
					)
				)
			);
		}


		//Featured news
		$wp_customize->add_section('walkermag_featured_options', 
		 	array(
		        'title' => esc_html__('Featured Section', 'walkermag'),
		        'panel' =>'walkermag_frontpage_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'featured_news_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'featured_news_status', 
			array(
			  'label'   => esc_html__( 'Enable Featured Section', 'walkermag' ),
			  'section' => 'walkermag_featured_options',
			  'settings' => 'featured_news_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'featured_news_allpage_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkermag_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'featured_news_allpage_status', 
			array(
			  'label'   => esc_html__( 'Enable featured section all over site', 'walkermag' ),
			  'section' => 'walkermag_featured_options',
			  'settings' => 'featured_news_allpage_status',
			  'type'    => 'checkbox',
			  'active_callback' => function(){
					return get_theme_mod( 'featured_news_status', true );
			   },
			)
		);
		/** featured layout layout */
		if(walkermag_set_to_premium()){
			$featured_news_choices = array(
				'featured-layout-grid'  => esc_url( get_template_directory_uri() . '/images/customizer/featured-layout-grid.png' ),
				'featured-layout-slider-two'  => esc_url( get_template_directory_uri() . '/images/customizer/featured-layout-slider-two.png' ),
				'featured-layout-slider'  => esc_url( get_template_directory_uri() . '/images/customizer/featured-layout-slider.png' ),
			);
		}else{
			$featured_news_choices = array(
				'featured-layout-grid'  => esc_url( get_template_directory_uri() . '/images/customizer/featured-layout-grid.png' ),
				'featured-layout-slider-two'  => esc_url( get_template_directory_uri() . '/images/customizer/featured-layout-slider-two.png' ),
			);
		}
    	

	    
	    $wp_customize->add_setting( 
	        'walkermag_featured_layout', 
	        array(
	            'default'           => 'featured-layout-slider-two',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );
	    $wp_customize->add_control(
			new WalkerMag_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkermag_featured_layout',
				array(
					'section'	  => 'walkermag_featured_options',
					'label'		  => esc_html__( 'Choose Featured Layout', 'walkermag' ),
					'description' => '',
					'choices'	  => $featured_news_choices,
					'active_callback' => function(){
							return get_theme_mod( 'featured_news_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting('walkermag_featured_slide_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkermag_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new WalkerMag_Dropdown_Taxonomies_Control($wp_customize, 
			'walkermag_featured_slide_category',
			    array(
			        'label'       => esc_html__('Select Slide Category', 'walkermag'),
			        'description' =>'',
			        'section'     => 'walkermag_featured_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkermag_featured_slide_category',
			        'priority'    => 10,
			        'active_callback' => function(){
							return get_theme_mod( 'featured_news_status', true );
					},
			        
		    	)
			)
		);
		$wp_customize->add_setting( 'featured_slide_items_show', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => 4,
				'sanitize_callback' => 'absint',
			) 
		);
		$wp_customize->add_control( 'featured_slide_items_show', 
			array(
				'type' => 'number',
				'section' => 'walkermag_featured_options',
				'label' => esc_html__( 'Slide Items to show','walkermag' ),
				'description' => esc_html__( 'Total maximum items to be slide on featured slider. Recommended minimum 3 and maximum 10','walkermag' ),
				'active_callback' => function(){
				    return get_theme_mod( 'featured_news_status', true );
				},
				'input_attrs' => array(
			        'min'   => 3,
			        'max'   => 10,
			        'step'  => 1,
			    ),
			)
		);

		$wp_customize->add_setting('walkermag_featured_grid_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkermag_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new WalkerMag_Dropdown_Taxonomies_Control($wp_customize, 
			'walkermag_featured_grid_category',
			    array(
			        'label'       => esc_html__('Select Grid Category', 'walkermag'),
			        'description' =>esc_html('Select Cartgory to be shown on right grid of slider in featured section','walkermag'),
			        'section'     => 'walkermag_featured_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkermag_featured_grid_category',
			        'priority'    => 10,
			        'active_callback' => 'walkermag_current_feature_type',
			        
		    	)
			)
		);
		if(walkermag_set_to_premium()){
			$wp_customize->add_setting( 
		        'featured_grid_layout_type', 
		        array(
		            'default'           => 'featured-section-layout-box',
		            'sanitize_callback' => 'walkermag_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'featured_grid_layout_type',
					array(
						'section'	  => 'walkermag_featured_options',
						'label'		  => esc_html__( 'Featured Container Style', 'walkermag' ),
						'description' => '',
						'type'        => 'select',
						'settings'	  => 'featured_grid_layout_type',
						'choices'	  => array(
							'featured-section-layout-box'    => esc_html__('Box Layout','walkermag'),
							'featured-section-layout-full'  => esc_html__('Full width Layout','walkermag'),
						),
						'active_callback' => 'walkermag_current_feature_type',
					)
				)
			);
		}
	    if(walkermag_set_to_premium()){
		    $wp_customize->add_setting('featured_secton_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkermag_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_secton_ads_image', array(
		        'label'             => esc_html__('Upload Image', 'walkermag'),
		        'description'       => esc_html__('Advertisement Image for featured section', 'walkermag'),
		        'section'           => 'walkermag_featured_options',
		        'settings'          => 'featured_secton_ads_image',
		        'active_callback' => function(){
				    return get_theme_mod( 'featured_news_status', true );
				},
		    )));
		    
		    $wp_customize->add_setting( 'featured_secton_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'featured_secton_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Advertisement Link', 'walkermag' ),
	              'section' => 'walkermag_featured_options',
	              'settings'   => 'featured_secton_ads_image_link',
	              'type'     => 'text',
	              'active_callback' => function(){
				    return get_theme_mod( 'featured_news_status', true );
				},
	          )
	        );
	    }

	}
	function walkermag_current_post_type(){
		$current_blog_status = get_theme_mod( 'focus_news_status');
        $choice_post_type= get_theme_mod( 'focus_news_post_type' );
		$blog_display_type = false;
		if($current_blog_status == true && $choice_post_type == 'select-category'){
			$blog_display_type = true;
		}
		return $blog_display_type;
    }

    function walkermag_current_feature_type(){
		$current_featured_status = get_theme_mod( 'featured_news_status');
        $featured_layout_type= get_theme_mod( 'walkermag_featured_layout','featured-layout-grid' );
		$featured_display_grid = false;
		if($current_featured_status == true && $featured_layout_type == 'featured-layout-grid'){
			$featured_display_grid = true;
		}
		return $featured_display_grid;
    }
    function walkermag_check_focus_layout(){
		$current_focus_status = get_theme_mod( 'focus_news_status');
        $choice_focus_type= get_theme_mod( 'walkermag_focus_layout' );
		$focus_display_status = false;
		if($current_focus_status == true && $choice_focus_type == 'focus-layout-ticker'){
			$focus_display_status = true;
		}
		return $focus_display_status;
    }
}
add_action( 'customize_register', 'walkermag_frontpage_options_register' );
/*
*Including front page section parts
*/
require get_template_directory() . '/inc/customizer/after-featured-options.php';
if(walkermag_set_to_premium()){
	require get_template_directory() . '/inc/customizer/before-middle-options.php';
	require get_template_directory() . '/inc/customizer/middle-section-option.php';
	require get_template_directory() . '/inc/customizer/after-middle-options.php';
}
require get_template_directory() . '/inc/customizer/before-footer-options.php';
