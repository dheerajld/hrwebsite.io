<?php $walkermag_section_args = get_query_var( 'walkermag_args' );?>
<div class="walkermag-wraper double-category-style-two">
		<div class="walkermag-container">
			<div class="walkermag-grid-9 dubble-main-content">

				<?php
				if(!empty($walkermag_section_args['section_main_cat'])){?>
					

						<?php
							if($walkermag_section_args['section_heading_one']){
								echo '<div class="walkermag-grid-12">';
									echo '<h3 class="home-section-heading">'.esc_html($walkermag_section_args['section_heading_one']).'</h3>';
								echo '</div>';
							}
						?>
						<div class="category-content-grid">
						<?php
							$before_footer_args = array(
						    	'post_type' => 'post',
						    	'order'=> 'DESC',
						    	'posts_per_page' =>4,
						    	'category_name' => $walkermag_section_args['section_main_cat'],
							);
							$walkermag_before_footer_query = new WP_Query($before_footer_args);
								while ($walkermag_before_footer_query->have_posts()) : $walkermag_before_footer_query->the_post();
									echo '<div class="walkermag-grid-6">';
										if ( has_post_thumbnail() ) {?>
											<a href="<?php the_permalink();?>" class="featured-before-images"><?php the_post_thumbnail();?></a>
										<?php 
											$after_sub_class= "with-thumbnails";
										} else{
											$after_sub_class= "without-thumbnails";
										}?>
										<div class="content-part <?php echo esc_attr($after_sub_class);?>">
											<?php walkermag_custom_category();?> <?php walkermag_custom_post_date();?>
											<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
											
										</div>
									</div>
								<?php endwhile; 
							wp_reset_postdata();
						?>
					</div>
				<?php } ?>

				<?php 
				if(!empty($walkermag_section_args['section_secondary_cat'])){?>
					<div class="dual-content-section-list">
						<?php
							if($walkermag_section_args['section_heading_two']){
								echo '<div class="walkermag-grid-12 heading-cols">';
									echo '<h3 class="home-section-heading">'.esc_html($walkermag_section_args['section_heading_two']).'</h3>';
								echo '</div>';
							}
						?>
						<?php
							$before_footer_args = array(
						    	'post_type' => 'post',
						    	'order'=> 'DESC',
						    	'posts_per_page' =>5,
						    	'category_name' => $walkermag_section_args['section_secondary_cat'],
							);
							$walkermag_before_footer_query = new WP_Query($before_footer_args);
								while ($walkermag_before_footer_query->have_posts()) : $walkermag_before_footer_query->the_post();
									echo '<div class="walkermag-grid-12">';
										if ( has_post_thumbnail() ) {?>
											<a href="<?php the_permalink();?>" class="walkermag-grid-6 featured-before-images"><?php the_post_thumbnail();?></a>
										<?php 
											$after_sub_class= "with-thumbnails";
										} else{
											$after_sub_class= "without-thumbnails";
										}?>
										<div class="walkermag-grid-6 content-part <?php echo esc_attr($after_sub_class);?>">
											
											<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
											<?php walkermag_custom_category();?> <?php walkermag_custom_post_date();
											the_excerpt();?>
											<a href="<?php the_permalink();?>" class="walkermag-primary-button"><?php echo __('Read More','walkermag');?></a>
										</div>
									</div>
								<?php endwhile; 
							wp_reset_postdata();
						?>
					</div>
				<?php } ?>
			</div>
			<div class="walkermag-grid-3 section-sidebar-holder">
				<?php if ( is_active_sidebar( $walkermag_section_args['section_sidebar'] ) ) : ?>
			   <div class="section-sidebar-inner">
			        <?php dynamic_sidebar( $walkermag_section_args['section_sidebar'] ); ?>
			    </div>
			<?php endif; ?>
			</div>
			<?php
			if(walkermag_set_to_premium()){
				if(!empty($walkermag_section_args['section_ads_image'])){
					if($walkermag_section_args['section_ads_image_link']){
						$section_ads_link = $walkermag_section_args['section_ads_image_link'];
					}else{
						$section_ads_link='#';
					}
					?>
					<div class="walkermag-grid-12 section-ads-image-bottom">
						<a href="<?php echo esc_url($section_ads_link);?>"><img src="<?php echo esc_url($walkermag_section_args['section_ads_image']);?>" title="<?php echo esc_attr($walkermag_section_args['section_ads_image']);?>" /></a>
					</div>
				<?php }
			}
			?>

		</div>
	</div>