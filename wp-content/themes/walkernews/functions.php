<?php
if ( ! function_exists( 'walkernews_setup' ) ) :
	function walkernews_setup() {
		add_theme_support( "title-tag");
		add_theme_support( 'automatic-feed-links' );
	}
endif;
add_action( 'after_setup_theme', 'walkernews_setup' );


function walkernews_enqueue_styles() {
    wp_enqueue_style( 'walkermag-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'walkernews-style',get_stylesheet_directory_uri() . '/style.css',array('walkermag-style'));
}
add_action( 'wp_enqueue_scripts', 'walkernews_enqueue_styles' );


function walkernews_customizer_default_settings() {
	set_theme_mod( 'walkermag_primary_color', '#2c03ab' );
	set_theme_mod( 'walkermag_secondary_color', '#97d502' );
	set_theme_mod('focus_news_position','focusnews-position-above-featured');
	set_theme_mod('walkermag_featured_layout','featured-layout-grid');
	set_theme_mod('walkermag_heading_fonts','Lato:400,700,400italic,700italic');
	set_theme_mod('walkermag_body_fonts','Roboto:400,400italic,700,700italic');
	set_theme_mod('walkermag_heading_four_size','18');
	set_theme_mod('walkermag_heaer_bg_color','#000000');
	set_theme_mod('walkermag_header_text_color','#ffffff');
	set_theme_mod('walkermag_header_site_name_color','#ffffff');
}
add_action( 'after_switch_theme', 'walkernews_customizer_default_settings' );



/**
 * Implement the Custom Header feature.
 */
require get_stylesheet_directory() . '/inc/custom-header.php';

if ( ! function_exists( 'walkernews_footer_copyright' ) ) :
	function walkernews_footer_copyright() {?>
		<?php 

		$walkermag_copyright = get_theme_mod('footer_copiright_text');
		if(walkermag_set_to_premium()){
			if(get_theme_mod('copyright_text_alignment') =='copyright-text-align-left'){
				$copyright_text_align_class ="text-left";
			}else{
				$copyright_text_align_class ="text-center";
			}
		}else{
			$copyright_text_align_class ="text-center";
		}
		
		if($walkermag_copyright && walkermag_set_to_premium() ){?>
			<div class="site-info walkerwp-grid-12 <?php echo esc_attr($copyright_text_align_class);?>"><?php echo wp_kses_post($walkermag_copyright);?></div>
		<?php } else{ ?>
			<div class="site-info walkerwp-grid-12 <?php echo esc_attr($copyright_text_align_class);?>">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'walkernews' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'walkernews' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'walkernews' ), 'WalkerNews', '<a href="http://walkerwp.com/">WalkerWP</a>' );
					?>
			</div><!-- .site-info -->
			
		<?php } 
	}
endif;

if(!function_exists('walkernews_after_header_section')){
	function walkernews_after_header_section(){
		if(walkermag_set_to_premium()){
			$foucs_news_all_page_status = get_theme_mod('focus_news_all_page_status');
			if($foucs_news_all_page_status){
				if(walkermag_set_to_premium()){
					$walkermag_focus_news_position = get_theme_mod('focus_news_position','focusnews-position-above-featured');
					if($walkermag_focus_news_position=='focusnews-position-above-featured'){
						walkermag_header_focus_news();
					}
				}else{
					$walkermag_focus_news_position = 'focusnews-position-below-featured';
				}
			}elseif ( is_front_page() || is_home() ){
				if(walkermag_set_to_premium()){
					$walkermag_focus_news_position = get_theme_mod('focus_news_position','focusnews-position-above-featured');
					if($walkermag_focus_news_position=='focusnews-position-above-featured'){
						walkermag_header_focus_news();
					}
				}else{
					$walkermag_focus_news_position = 'focusnews-position-below-featured';
				}
			}
		}else{
			$foucs_news_all_page_status = get_theme_mod('focus_news_all_page_status');
			if($foucs_news_all_page_status){
				walkermag_header_focus_news();
			}
			elseif ( is_front_page() || is_home() ){
				walkermag_header_focus_news();
			}
		}
		
		$walkermag_featured_display_status = get_theme_mod('featured_news_allpage_status');
		if($walkermag_featured_display_status){
			walkermag_featured_section();
		}elseif ( is_front_page() || is_home() ){
			walkermag_featured_section();
		}
		if(walkermag_set_to_premium()){
			if($foucs_news_all_page_status){
				if($walkermag_focus_news_position=='focusnews-position-below-featured' ){
					walkermag_header_focus_news();
				}
			}elseif ( is_front_page() || is_home() ){
				if($walkermag_focus_news_position=='focusnews-position-below-featured' ){
					walkermag_header_focus_news();
				}
			}
		}
	}
}