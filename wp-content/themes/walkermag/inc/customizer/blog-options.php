<?php
/**
*Frontpage  customizer options
*
* @package WalkerMag
*
*/
if (! function_exists('walkermag_blog_options_register')) {
	function walkermag_blog_options_register( $wp_customize ) {
		$wp_customize->add_section('walkermag_blog_options', 
		 	array(
		        'title' => esc_html__('Blog', 'walkermag'),
		        'panel' =>'walkermag_theme_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );

		/** header layout layout */
	    $wp_customize->add_setting( 
	        'walkermag_blog_layout', 
	        array(
	            'default'           => 'sidebar-layout-right',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );

	   
    	$focus_news_choices = array(
			'sidebar-layout-right'  => esc_url( get_template_directory_uri() . '/images/customizer/sidebar-layout-right.png' ),
			'sidebar-layout-none'  => esc_url( get_template_directory_uri() . '/images/customizer/sidebar-layout-none.png' ),
            'sidebar-layout-left' => esc_url( get_template_directory_uri() . '/images/customizer/sidebar-layout-left.png' ),
		);

	    
	    $wp_customize->add_control(
			new WalkerMag_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkermag_blog_layout',
				array(
					'section'	  => 'walkermag_blog_options',
					'label'		  => esc_html__( 'Choose Sidebar Position', 'walkermag' ),
					'description' => '',
					'choices'	  => $focus_news_choices,
				)
			)
		);

		
	    $wp_customize->add_setting( 
	        'walkermag_blog_post_view', 
	        array(
	            'default'           => 'post-layout-grid',
	            'sanitize_callback' => 'walkermag_sanitize_choices'
	        ) 
	    );

	    
    	$focus_news_choices = array(
			'post-layout-grid'  => esc_url( get_template_directory_uri() . '/images/customizer/post-layout-grid.png' ),
			'post-layout-list'  => esc_url( get_template_directory_uri() . '/images/customizer/post-layout-list.png' ),
            'post-layout-full' => esc_url( get_template_directory_uri() . '/images/customizer/post-layout-full.png' ),
		);
	  
	    
	    $wp_customize->add_control(
			new WalkerMag_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkermag_blog_post_view',
				array(
					'section'	  => 'walkermag_blog_options',
					'label'		  => esc_html__( 'Choose Post View', 'walkermag' ),
					'description' => '',
					'choices'	  => $focus_news_choices,
				)
			)
		);
	    $wp_customize->add_setting( 'walkermag_excerpt_more', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' =>'',
				'sanitize_callback' => 'walkermag_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walkermag_excerpt_more', 
			array(
				'type' => 'text',
				'section' => 'walkermag_blog_options',
				'label' => esc_html__( 'Read More Text','walkermag' ),
			)
		);

		$walkermag_blog_pagination_choices = array(
				'walkermag-default-style'  => esc_html__('Next/Preview - Default','walkermag'),
				'walkermag-numeric-style'  => esc_html__('Numeric Style','walkermag'),
					
			);

			$wp_customize->add_setting( 
		        'walkermag_pagination_style', 
		        array(
		            'default'           => 'walkermag-default-style',
		            'sanitize_callback' => 'walkermag_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'walkermag_pagination_style',
					array(
						'section'	  => 'walkermag_blog_options',
						'label'		  => esc_html__( 'Choose Pagination Style', 'walkermag' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => $walkermag_blog_pagination_choices,
					)
				)
			);

		if(walkermag_set_to_premium()){
			$wp_customize->add_setting( 'author_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'author_status', 
				array(
				  'label'   => __( 'Show Author', 'walkermag' ),
				  'section' => 'walkermag_blog_options',
				  'settings' => 'author_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'post_date_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'post_date_status', 
				array(
				  'label'   => __( 'Show Date', 'walkermag' ),
				  'section' => 'walkermag_blog_options',
				  'settings' => 'post_date_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'category_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'category_status', 
				array(
				  'label'   => __( 'Show Category', 'walkermag' ),
				  'section' => 'walkermag_blog_options',
				  'settings' => 'category_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'tags_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'tags_status', 
				array(
				  'label'   => __( 'Show Tags', 'walkermag' ),
				  'section' => 'walkermag_blog_options',
				  'settings' => 'tags_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'comment_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'comment_status', 
				array(
				  'label'   => __( 'Show Comment', 'walkermag' ),
				  'section' => 'walkermag_blog_options',
				  'settings' => 'comment_status',
				  'type'    => 'checkbox',
				)
			);
		}
		if(walkermag_set_to_premium()){
			$wp_customize->add_setting('blog_top_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkermag_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_top_ads_image', array(
		        'label'             => esc_html__('Top Ads: Upload Image', 'walkermag'),
		        'description'       => esc_html__('Advertisement Image to be shown on top of the blog page', 'walkermag'),
		        'section'           => 'walkermag_blog_options',
		        'settings'          => 'blog_top_ads_image',
		    )));
		    $wp_customize->add_setting( 'blog_top_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'blog_top_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Top Advertisement Link', 'walkermag' ),
	              'section' => 'walkermag_blog_options',
	              'settings'   => 'blog_top_ads_image_link',
	              'type'     => 'text',
	          )
	        );
	        $wp_customize->add_setting('blog_bottom_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkermag_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_bottom_ads_image', array(
		        'label'             => esc_html__('Bottom Ads: Upload Image', 'walkermag'),
		        'description'       => esc_html__('Advertisement Image to be shown on bottom of the blog page', 'walkermag'),
		        'section'           => 'walkermag_blog_options',
		        'settings'          => 'blog_bottom_ads_image',
		    )));
		    $wp_customize->add_setting( 'blog_bottom_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'blog_bottom_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Bottom Advertisement Link', 'walkermag' ),
	              'section' => 'walkermag_blog_options',
	              'settings'   => 'blog_bottom_ads_image_link',
	              'type'     => 'text',
	          )
	        );
	    }

		/*Single post page*/
		$wp_customize->add_section('walkermag_single_blog_options', 
		 	array(
		        'title' => esc_html__('Single Blog Page', 'walkermag'),
		        'panel' =>'walkermag_theme_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		if(walkermag_set_to_premium()){
			$wp_customize->add_setting( 'related_post_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'related_post_status', 
				array(
				  'label'   => __( 'Enable Related Post', 'walkermag' ),
				  'section' => 'walkermag_single_blog_options',
				  'settings' => 'related_post_status',
				  'type'    => 'checkbox',
				)
			);
		
			$wp_customize->add_setting( 'single_author_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_author_status', 
				array(
				  'label'   => __( 'Show Author', 'walkermag' ),
				  'section' => 'walkermag_single_blog_options',
				  'settings' => 'single_author_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_post_date_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_post_date_status', 
				array(
				  'label'   => __( 'Show Date', 'walkermag' ),
				  'section' => 'walkermag_single_blog_options',
				  'settings' => 'single_post_date_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_category_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_category_status', 
				array(
				  'label'   => __( 'Show Category', 'walkermag' ),
				  'section' => 'walkermag_single_blog_options',
				  'settings' => 'single_category_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_tags_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkermag_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_tags_status', 
				array(
				  'label'   => __( 'Show Tags', 'walkermag' ),
				  'section' => 'walkermag_single_blog_options',
				  'settings' => 'single_tags_status',
				  'type'    => 'checkbox',
				)
			);
			
		}
		$wp_customize->add_setting( 'single_post_related_post_title',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_related_post_title', 
	            array(
	              'label'   => esc_html__( 'Heading for Related Post', 'walkermag' ),
	              'section' => 'walkermag_single_blog_options',
	              'settings'   => 'single_post_related_post_title',
	              'type'     => 'text',
	          )
	        );
		if(walkermag_set_to_premium()){
			$wp_customize->add_setting('single_post_top_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkermag_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_post_top_ads_image', array(
		        'label'             => esc_html__('Top Ads: Upload Image', 'walkermag'),
		        'description'       => esc_html__('Advertisement Image to be shown ontop of the single post', 'walkermag'),
		        'section'           => 'walkermag_single_blog_options',
		        'settings'          => 'single_post_top_ads_image',
		    )));
		    $wp_customize->add_setting( 'single_post_top_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_top_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Top Advertisement Link', 'walkermag' ),
	              'section' => 'walkermag_single_blog_options',
	              'settings'   => 'single_post_top_ads_image_link',
	              'type'     => 'text',
	          )
	        );
	        $wp_customize->add_setting('single_post_bottom_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkermag_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_post_bottom_ads_image', array(
		        'label'             => esc_html__('Bottom Ads: Upload Image', 'walkermag'),
		        'description'       => esc_html__('Advertisement Image to be shown on bottom of the single page', 'walkermag'),
		        'section'           => 'walkermag_single_blog_options',
		        'settings'          => 'single_post_bottom_ads_image',
		    )));
		    $wp_customize->add_setting( 'single_post_bottom_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkermag_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_bottom_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Bottom Advertisement Link', 'walkermag' ),
	              'section' => 'walkermag_single_blog_options',
	              'settings'   => 'single_post_bottom_ads_image_link',
	              'type'     => 'text',
	          )
	        );
	    }
		
		
	}
}
add_action( 'customize_register', 'walkermag_blog_options_register' );