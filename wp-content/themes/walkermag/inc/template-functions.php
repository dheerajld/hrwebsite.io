<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WalkerMag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function walkermag_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'walkermag_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function walkermag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'walkermag_pingback_header' );

/*=====================================================================================
* SITE NAVIGATION
=======================================================================================*/
if(! function_exists('walkermag_branding')):
	function walkermag_branding(){?>
		<div class="site-branding">
			<?php
				the_custom_logo();
				$walkermag_site_name = get_bloginfo('name');
				if ( $walkermag_site_name ){
					  echo '<h1 class="site-title"><a href="'.esc_url(home_url()).'" rel="home">' .esc_html( $walkermag_site_name ) . '</a></h1>';
				}
				$walkermag_description = get_bloginfo( 'description', 'display' );
				if ( $walkermag_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_textarea($walkermag_description); ?></p>
					<?php 
				endif; ?>
		</div><!-- .site-branding -->
	<?php }
endif;
/*======================================================================================
* SITE NAVIGATION
========================================================================================*/
if(! function_exists('walkermag_site_navigation')):
	function walkermag_site_navigation(){?>
		<nav id="site-navigation" class="main-navigation">
				<button type="button" class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
	<?php }
endif;

if(!function_exists('walkermag_after_header_section')){
	function walkermag_after_header_section(){
		$foucs_news_all_page_status = get_theme_mod('focus_news_all_page_status');
		if($foucs_news_all_page_status){
			if(walkermag_set_to_premium()){
				$walkermag_focus_news_position = get_theme_mod('focus_news_position','focusnews-position-below-featured');
				if($walkermag_focus_news_position=='focusnews-position-above-featured'){
					walkermag_header_focus_news();
				}
			}else{
				$walkermag_focus_news_position = 'focusnews-position-below-featured';
			}
		}elseif ( is_front_page() || is_home() ){
			if(walkermag_set_to_premium()){
				$walkermag_focus_news_position = get_theme_mod('focus_news_position','focusnews-position-below-featured');
				if($walkermag_focus_news_position=='focusnews-position-above-featured'){
					walkermag_header_focus_news();
				}
			}else{
				$walkermag_focus_news_position = 'focusnews-position-below-featured';
			}
		}
		
		$walkermag_featured_display_status = get_theme_mod('featured_news_allpage_status');
		if($walkermag_featured_display_status){
			walkermag_featured_section();
		}elseif ( is_front_page() || is_home() ){
			walkermag_featured_section();
		}
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
/*======================================================================================
* SITE FOOTER COPYRIGHT
========================================================================================*/
if ( ! function_exists( 'walkermag_footer_copyright' ) ) :
	function walkermag_footer_copyright() {?>
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
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'walkermag' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'walkermag' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'walkermag' ), 'WalkerMag', '<a href="http://walkerwp.com/">WalkerWP</a>' );
					?>
			</div><!-- .site-info -->
			
		<?php } ?>
		

		
	<?php }
endif;

if(!function_exists('walkermag_custom_category')){
	function walkermag_custom_category(){
		if(get_theme_mod('category_status','true')){?>
			 <span class="category">
                
               <?php $categories = get_the_category();
              if( ! empty( $categories ) ) :
                foreach ( $categories as $category ) { ?>
                    <a
                        href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    <?php }
             endif; ?>
                   
            </span>
		<?php }
	}
}

if(!function_exists('walkermag_custom_post_date')){
	function walkermag_custom_post_date(){
		if(get_theme_mod('post_date_status','true')){
			$archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?>
			<a class="walkermag-post-date" href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
	            <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?>
	        </a>
	        
		<?php } 
	}
}

if(!function_exists('walkermag_custom_post_author')){
	function walkermag_custom_post_author(){
		if(get_theme_mod('author_status','true')){?>
			 <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
	            <?php $author_avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 ); ?>
	            <?php if( $author_avatar ) : ?>
	            <div class="author-avtar">
	                <?php echo esc_url($author_avatar); ?>
	            </div>
	            <?php endif; ?>
	           <i class="fa fa-user-o" aria-hidden="true"></i> <?php echo esc_html( get_the_author() ); ?>
	        </a>
	<?php }
	}
}

if(! function_exists('walkemag_custom_post_tag')):
	function walkemag_custom_post_tag(){
		$walkermag_tags = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'walkermag' ) );
		if ( $walkermag_tags ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links"> <i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'walkermag' ) . '</span>', $walkermag_tags ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

/*
*Search Icon
*=============================================================================================================================*/
if(! function_exists('walkermag_header_search_icon')):
	function walkermag_header_search_icon(){
		//if(get_theme_mod('search_icon_status')){?>
			<span class="header-icon-search">
				<button class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></button>
				<!-- The Modal -->
				<div id="searchModel" class="search-modal modal">
					<div class="modal-content">
						<div class="modal-body">
							<button  class="modal-close">&times;</button>
							<p><?php get_Search_form(); ?></p>
						</div>
					</div>
				</div>
			</span>

		<?php
	 }
endif;

if(!function_exists('walkermag_featured_section')){
	function walkermag_featured_section(){
		$walkermag_featured_layout_style = get_theme_mod('walkermag_featured_layout','featured-layout-grid');
		if($walkermag_featured_layout_style=='featured-layout-slider'){
			$walkermag_featured_template = 'featured-slider';
		}
		elseif($walkermag_featured_layout_style=='featured-layout-slider-two'){
			$walkermag_featured_template = 'featured-slider-two';
		}else{
			$walkermag_featured_template = 'featured-section';
		}
		get_template_part( 'template-parts/partials/featured-section/'.$walkermag_featured_template);
	}
}

if(!function_exists('walkermag_header_current_date')){
	function walkermag_header_current_date(){?>
		<span class="walkermag-current-date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date_i18n("l, F j");// WPCS: XSS OK.?></span>
	<?php }
}
if(!function_exists('walkermag_header_focus_news')){
	function walkermag_header_focus_news(){
		if(get_theme_mod('walkermag_focus_layout')=='focus-layout-grid'){
			get_template_part( 'template-parts/partials/focus-news/focus-news');
		}else{
			get_template_part( 'template-parts/partials/focus-news/focus-ticker-layout');
		}
	}
}
if(!function_exists('walkermag_header_social_media')){
	function walkermag_header_social_media(){
		get_template_part( 'template-parts/partials/social-media/social-media');
	}
}

if(! function_exists('walkermag_header')){
	function walkermag_header(){
		if(walkermag_set_to_premium()){
			$walkermag_current_header_layout = get_theme_mod('walkermag_header_layout','header-layout-1');
			if($walkermag_current_header_layout =='header-layout-2'){
				$walkermag_header_templte_part = 'header-layout-two';
			}else{
				$walkermag_header_templte_part = 'header-layout-one';
			}
			get_template_part( 'template-parts/partials/header-layouts/'.$walkermag_header_templte_part);
		}else{
			get_template_part( 'template-parts/partials/header-layouts/header-layout-one');
		}
	}
}

if(!function_exists('walkermag_top_ads_for_archive_page')){
	function walkermag_top_ads_for_archive_page(){
		if(walkermag_set_to_premium()){
			if(get_theme_mod('blog_top_ads_image')){
				$featured_ads_src= get_theme_mod('blog_top_ads_image');
				if(get_theme_mod('blog_top_ads_image_link')){
					$featured_ads_link = get_theme_mod('blog_top_ads_image_link');
				}else{
					$featured_ads_link = '#';
				}
				?>
				<div class="walkermag-container archive-page-top-ads">
					<a href="<?php echo esc_url($featured_ads_link);?>" target="_blank"><img src="<?php echo esc_url($featured_ads_src);?>" /></a>
				</div>
			<?php }
		}
	}
}
add_action('walkermag_before_archive','walkermag_top_ads_for_archive_page');

if(!function_exists('walkermag_bottom_ads_for_archive_page')){
	function walkermag_bottom_ads_for_archive_page(){
		if(walkermag_set_to_premium()){
			if(get_theme_mod('blog_bottom_ads_image')){
				$featured_ads_src= get_theme_mod('blog_bottom_ads_image');
				if(get_theme_mod('blog_bottom_ads_image_link')){
					$featured_ads_link = get_theme_mod('blog_bottom_ads_image_link');
				}else{
					$featured_ads_link = '#';
				}
				?>
				<div class="walkermag-container archive-page-bottom-ads">
					<a href="<?php echo esc_url($featured_ads_link);?>" target="_blank"><img src="<?php echo esc_url($featured_ads_src);?>" /></a>
				</div>
			<?php }
		}
	}
}
add_action('walkermag_after_archive','walkermag_bottom_ads_for_archive_page');

if(!function_exists('walkermag_top_ads_for_single_page')){
	function walkermag_top_ads_for_single_page(){
		if(walkermag_set_to_premium()){
			if(get_theme_mod('single_post_top_ads_image')){
				$featured_ads_src= get_theme_mod('single_post_top_ads_image');
				if(get_theme_mod('single_post_top_ads_image_link')){
					$featured_ads_link = get_theme_mod('single_post_top_ads_image_link');
				}else{
					$featured_ads_link = '#';
				}
				?>
				<div class="walkermag-container single-page-top-ads">
					<a href="<?php echo esc_url($featured_ads_link);?>" target="_blank"><img src="<?php echo esc_url($featured_ads_src);?>" /></a>
				</div>
			<?php }
		}
	}
}
add_action('walkermag_before_single_content','walkermag_top_ads_for_single_page');

if(!function_exists('walkermag_bottom_ads_for_single_page')){
	function walkermag_bottom_ads_for_single_page(){
		if(walkermag_set_to_premium()){
			if(get_theme_mod('single_post_bottom_ads_image')){
				$featured_ads_src= get_theme_mod('single_post_bottom_ads_image');
				if(get_theme_mod('single_post_bottom_ads_image_link')){
					$featured_ads_link = get_theme_mod('single_post_bottom_ads_image_link');
				}else{
					$featured_ads_link = '#';
				}
				?>
				<div class="walkermag-container single-page-bottom-ads">
					<a href="<?php echo esc_url($featured_ads_link);?>" target="_blank"><img src="<?php echo esc_url($featured_ads_src);?>" /></a>
				</div>
			<?php }
		}
	}
}
add_action('walkermag_after_single_content','walkermag_bottom_ads_for_single_page');

if(! function_exists('walkermag_scroll_top')):
	function walkermag_scroll_top(){
		if(get_theme_mod('enable_scroll_top')){ ?>
			<a href="#" class="walkermag-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
	<?php }
	}
endif;

if(!function_exists('walkermag_pagination_style')){
	function walkermag_pagination_style(){
		if(get_theme_mod('walkermag_pagination_style')=='walkermag-numeric-style'){
			walkermag_pagination();
		}else{
			the_posts_navigation();
		}
	}
}