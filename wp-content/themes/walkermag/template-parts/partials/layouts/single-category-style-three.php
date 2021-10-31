<?php
if(walkermag_set_to_premium()){
$walkermag_section_args = get_query_var( 'walkermag_args' );?>
<div class="walkermag-wraper single-catrgory-style-three">
	<div class="walkermag-container">
			<div class="walkermag-grid-12">
				<?php
				if(!empty($walkermag_section_args['section_heading_one'])){
					echo '<h3 class="home-section-heading">'.esc_html($walkermag_section_args['section_heading_one']).'</h3>';
				}
				?>
			</div>
			<?php if(!empty($walkermag_section_args['section_main_cat'])){?>
			
				<?php
					$walkermag_main_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' =>6,
				    	'category_name' => $walkermag_section_args['section_main_cat'],
					);
					$walkermag_query = new WP_Query($walkermag_main_args);
					while ($walkermag_query->have_posts()) : $walkermag_query->the_post();
						echo '<div class="walkermag-grid-4">';
							if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink();?>" class="section-featured-image"><?php the_post_thumbnail();?></a>
							<?php 
								$after_sub_class= "with-thumbnails";
							} else{
								$after_sub_class= "without-thumbnails";
							}?>
							<div class="content-part <?php echo esc_attr($after_sub_class);?>">
								<h4><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h4>	
								<?php walkermag_custom_category();?> <?php walkermag_custom_post_date(); ?>
								
							</div>
						</div>
					<?php endwhile; 
					wp_reset_postdata();?>
			<?php } ?>
			<?php
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
			?>
		
	</div>
</div>
<?php } ?>