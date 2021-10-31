<?php 
$featured_section_status = get_theme_mod('featured_news_status');
if($featured_section_status){
	if(walkermag_set_to_premium()){
		if(get_theme_mod('featured_grid_layout_type') =='featured-section-layout-box'){
			$featured_section_layout = 'box-layout';
		}else{
			$featured_section_layout = 'full-width';
		}
	}else{
		$featured_section_layout = 'full-width';
	}?>
	<div class="walkermag-wraper no-gap featured-wraper">
		<div class="walkermag-container <?php echo esc_attr($featured_section_layout);?>">
			<div class="walkermag-grid-6 featured-slide">
				<div class="swiper-container walkermag-featured-grid-slider">
					<div class="swiper-wrapper">
						<?php
							$featured_slide_cat = get_theme_mod('walkermag_featured_slide_category');
							if(get_theme_mod('featured_slide_items_show')){
								$featured_image_slides= get_theme_mod('featured_slide_items_show');
							}else{
								$featured_image_slides =3;
							}
							if(!empty($featured_slide_cat)){
								$featured_args = array(
							    	'post_type' => 'post',
							    	'order'=> 'DESC',
							    	'posts_per_page' => $featured_image_slides,
							    	'category_name' => $featured_slide_cat,
								);
							}else{
								$featured_args = array(
							    	'post_type' => 'post',
							    	'order'=> 'DESC',
							    	'posts_per_page' => $featured_image_slides,
								);
							}
							$walkermag_featured_query = new WP_Query($featured_args);
								while ($walkermag_featured_query->have_posts()) : $walkermag_featured_query->the_post();?>
								    <div class="swiper-slide">
								    	<div class="walkerwp-featured-box">
									  	<?php 
									    	if ( has_post_thumbnail() ) {?>
												<a href="<?php the_permalink();?>" class="focus-news-thumbnails"><?php the_post_thumbnail();?></a>
											<?php } ?>
											<?php if(!has_post_thumbnail()){
												$content_part_class="without-thumbnail";
											} else{
												$content_part_class="with-thumbnail";
											}?>
											<div class="content-part <?php echo esc_attr($content_part_class);?>">
												<?php walkermag_custom_category();?>
												<h1><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h1>	
												<?php  walkermag_custom_post_date(); ?>
												
											</div>
										
										</div>
									</div>
								<?php endwhile; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="swiper-pagination grid-slider-pagination"></div>
			</div>
		<div class="walkermag-grid-6 featured-grid">
			<?php
				$featured_grid_cat = get_theme_mod('walkermag_featured_grid_category');
				if(!empty($featured_grid_cat)){
					$featured_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' => 4,
				    	'category_name' => $featured_grid_cat,
					);
				}else{
					$featured_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' => 4,
					);
				}

				$walkermag_featured_query = new WP_Query($featured_args);
					while ($walkermag_featured_query->have_posts()) : $walkermag_featured_query->the_post();?>
					   <div class="walkermag-grid-6">
					    	<div class="walkerwp-featured-box">
						  	<?php 
						    	if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink();?>" class="focus-news-thumbnails"><?php the_post_thumbnail();?></a>
								<?php } ?>
								<?php if(!has_post_thumbnail()){
									$content_part_class="without-thumbnail";
								} else{
									$content_part_class="with-thumbnail";
								}?>
								<div class="content-part <?php echo esc_attr($content_part_class);?>">
									<?php walkermag_custom_category();?>
									<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
									<?php  walkermag_custom_post_date(); ?>
									
								</div>
								
							
							</div>
						</div>
					<?php endwhile; 
				wp_reset_postdata();?>
			
		</div>
		<?php
		if(walkermag_set_to_premium()){
			if(get_theme_mod('featured_secton_ads_image')){
				$featured_ads_src= get_theme_mod('featured_secton_ads_image');
				if(get_theme_mod('featured_secton_ads_image_link')){
					$featured_ads_link = get_theme_mod('featured_secton_ads_image_link');
				}else{
					$featured_ads_link = '#';
				}
				?>
				<div class="walkermag-grid-12 section-ads-image-bottom">
					<a href="<?php echo esc_url($featured_ads_link);?>" target="_blank"><img src="<?php echo esc_url($featured_ads_src);?>" /></a>
				</div>
			<?php }
		}
		?>
	</div>
</div>
<?php }?>
