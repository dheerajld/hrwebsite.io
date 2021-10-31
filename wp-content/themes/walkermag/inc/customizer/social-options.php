<?php
/**
*Social Media customizer options
*
* @package WalkerMag
*
*/

if (! function_exists('walkermag_social_options_register')) {
    function walkermag_social_options_register( $wp_customize ) {
        // Social media 
        $wp_customize->add_section('walkermag_social_setup', 
          array(
            'title' => esc_html__('Social Media', 'walkermag'),
            'panel' => 'walkermag_theme_option',
            'priority' => 6
          )
        );

        //Facebook Link
        $wp_customize->add_setting( 'walkermag_facebook',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_facebook', 
            array(
              'label'   => esc_html__( 'Facebook', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_facebook',
              'type'     => 'text',
              'priority' => 1
          )
        );
        $wp_customize->selective_refresh->add_partial( 'walkermag_facebook', array(
            'selector' => '.walkermag-top-header ul.walkermag-social',
        ) );
        //Twitter Link
        $wp_customize->add_setting( 'walkermag_twitter',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_twitter', 
            array(
              'label'   => esc_html__( 'Twitter', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_twitter',
              'type'     => 'text',
              'priority' => 2
          )
        );
        $wp_customize->selective_refresh->add_partial( 'walkermag_twitter', array(
            'selector' => '.walkermag-top-header ul.walkermag-social',
        ) );
        //Youtube Link
        $wp_customize->add_setting( 'walkermag_youtube',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_youtube', 
            array(
              'label'   => esc_html__( 'Youtube', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_youtube',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Instagram
        $wp_customize->add_setting( 'walkermag_instagram',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_instagram', 
            array(
              'label'   => esc_html__( 'Instagram', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_instagram',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Linkedin
        $wp_customize->add_setting( 'walkermag_linkedin',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_linkedin', 
            array(
              'label'   => esc_html__( 'Linkedin', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_linkedin',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Google
        $wp_customize->add_setting( 'walkermag_google',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_google', 
            array(
              'label'   => esc_html__( 'Google Business', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_google',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'walkermag_pinterest',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_pinterest', 
            array(
              'label'   => esc_html__( 'Pinterest', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_pinterest',
              'type'     => 'text',
              'priority' => 2
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'walkermag_vk',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkermag_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkermag_vk', 
            array(
              'label'   => esc_html__( 'VK', 'walkermag' ),
              'section' => 'walkermag_social_setup',
              'settings'   => 'walkermag_vk',
              'type'     => 'text',
              'priority' => 2
          )
        );
        
    }

}
add_action( 'customize_register', 'walkermag_social_options_register' );