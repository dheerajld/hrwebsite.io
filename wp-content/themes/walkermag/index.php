<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WalkerMag
 */

get_header();
?>
<?php
	if(get_theme_mod('walkermag_blog_layout')){
		$walkermag_blog_layout = get_theme_mod('walkermag_blog_layout');
	} else{
		$walkermag_blog_layout ='sidebar-layout-right';
	}

	if($walkermag_blog_layout =='sidebar-layout-none'){
		$walkermag_content_class= 'walkermag-grid-12';
	} else{
		$walkermag_content_class= 'walkermag-grid-9';
	}
	if($walkermag_blog_layout =='sidebar-layout-right'){
		$content_sub_class='right-sidebar-layout';
	} elseif($walkermag_blog_layout =='sidebar-layout-left'){
		$content_sub_class='left-sidebar-layout';
	} else{
		$content_sub_class='full-width-content';
	}
	
	if(get_theme_mod('walkermag_blog_post_view')=='post-layout-list'){
		$walkermag_blog_view= 'blog-list-layout';
	}elseif(get_theme_mod('walkermag_blog_post_view')=='post-layout-full'){
		$walkermag_blog_view= 'blog-full-layout';
	}else{
		$walkermag_blog_view= 'blog-layout-grid';
	}
	
	
	
?>
<div class="walkermag-wraper inner-page-wraper">
	<?php do_action('walkermag_before_archive','walkermag');?>
	<div class="walkermag-container">
		<?php if($walkermag_blog_layout=='sidebar-layout-left'){?>
			<div class="walkermag-grid-3 sidebar-block global-sidebar left-sidebar"><?php get_sidebar(); ?></div>
		<?php } ?>
		<main id="primary" class="site-main <?php echo esc_attr($walkermag_content_class); echo ' '. esc_attr($content_sub_class); ?>">
			
			<div class="<?php echo esc_attr($walkermag_blog_view); ?>">
			<!-- <div class="blog-layout-list"> -->
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;


				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
			<?php walkermag_pagination_style(); ?>
		</main><!-- #main -->

		<?php if($walkermag_blog_layout=='sidebar-layout-right'){?>
			<div class="walkermag-grid-3 sidebar-block global-sidebar"><?php get_sidebar(); ?></div>
		<?php } ?>
	</div>
	<?php do_action('walkermag_after_archive','walkermag');?>
</div>
<?php 
get_footer();