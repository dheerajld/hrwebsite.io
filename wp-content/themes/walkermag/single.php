<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WalkerMag
 */

get_header();
?>
<div class="walkermag-wraper inner-page-wraper">
	<?php do_action('walkermag_before_single_content','walkermag');?>
	<div class="walkermag-container">
		<main id="primary" class="site-main walkermag-grid-9">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single');

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'walkermag' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'walkermag' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

		<div class="sidebar-block global-sidebar walkermag-grid-3"><?php get_sidebar();?></div>
</div>
<?php if(get_theme_mod('related_post_status','true')){?>
	<div class="walkermag-container related-posts">
		<div class="walkermag-grid-12">
			<h2 class="related-post-heading">
				<?php 
				if(get_theme_mod('single_post_related_post_title')){
					$related_post_heading = get_theme_mod('single_post_related_post_title');
				}else{
					$related_post_heading = __('Related Posts','walkermag');
				}
					echo esc_html($related_post_heading);
					?>
				
			</h2>
		</div>
		<?php $post_id = get_the_ID();
	    $cat_ids = array();
	    $categories = get_the_category( $post_id );

	    if(!empty($categories) && !is_wp_error($categories)):
	        foreach ($categories as $category):
	            array_push($cat_ids, $category->term_id);
	        endforeach;
	    endif;

	    $current_post_type = get_post_type($post_id);

	    $query_args = array( 
	        'category__in'   => $cat_ids,
	        'post_type'      => $current_post_type,
	        'post__not_in'    => array($post_id),
	        'posts_per_page'  => '3',
	     );

	    $related_cats_post = new WP_Query( $query_args );

	    if($related_cats_post->have_posts()):
	         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
	           <div class="walkermag-grid-4">
	           		<a href="<?php the_permalink(); ?>" class="related-post-feature-image">
	           			<?php walkermag_post_thumbnail(); ?>
	           		</a>
	                
	                    <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>

	                    <?php  walkermag_custom_post_date();
	                    the_excerpt(); ?>
	                   <a href="<?php the_permalink(); ?>" class="walkermag-primary-button small"><?php echo __('Read More','walkermag');?></a>
	              </div>
	        <?php endwhile;

	        // Restore original Post Data
	        wp_reset_postdata();
	     endif;
	     ?>
	 </div>
	<?php } ?>
	<?php do_action('walkermag_after_single_content','walkermag');?>
</div>
<?php 
get_footer();