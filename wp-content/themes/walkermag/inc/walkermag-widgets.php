<?php
if(! function_exists('walkermag_widgets_register')):
function walkermag_widgets_register() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #1', 'walkermag' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #2', 'walkermag' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #3', 'walkermag' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #4', 'walkermag' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'After Featured Sidebar', 'walkermag' ),
			'id'            => 'after-feature-sidebar',
			'description'   => esc_html__( 'Add widgets here to be shown on after featured section.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	if(walkermag_set_to_premium()){
		if(get_theme_mod('before_middle_section_status')){
			register_sidebar(
				array(
					'name'          => esc_html__( 'Before Middle Sidebar', 'walkermag' ),
					'id'            => 'before-middle-sidebar',
					'description'   => esc_html__( 'Add widgets here to be shown on before middle section.', 'walkermag' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}
		if(get_theme_mod('middle_section_status')){
			register_sidebar(
			array(
				'name'          => esc_html__( 'Middle Section Sidebar', 'walkermag' ),
				'id'            => 'middle-section-sidebar',
				'description'   => esc_html__( 'Add widgets here to be shown on middle section.', 'walkermag' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		}
		
		if(get_theme_mod('after_middle_section_status')){
			register_sidebar(
				array(
					'name'          => esc_html__( 'After Middle Sidebar', 'walkermag' ),
					'id'            => 'after-middle-sidebar',
					'description'   => esc_html__( 'Add widgets here to be shown on after middle section.', 'walkermag' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);

		}
		
	}
	register_sidebar(
		array(
			'name'          => esc_html__( 'Before Footer Sidebar', 'walkermag' ),
			'id'            => 'before-footer-sidebar',
			'description'   => esc_html__( 'Add widgets here to be shown on before footer section.', 'walkermag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'walkermag_widgets_register' );
endif;

?>