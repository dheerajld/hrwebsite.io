<?php
if(walkermag_set_to_premium()){
$walkermag_section_args = get_query_var( 'walkermag_args' );?>
<div class="walkermag-wraper category-style-one">
	<div class="walkermag-container">
		<div class="walkermag-grid-9 section-main-content">
			
			<?php if(!empty($walkermag_section_args['section_secondary_cat'])){
				$content_main_clss='walkermag-grid-8';
				?>
			<div class="walkermag-grid-4 section-left-content">
			<?php
			if(!empty($walkermag_section_args['section_heading_two'])){
				echo '<h3 class="home-section-heading">'.esc_html($walkermag_section_args['section_heading_two']).'</h3>';
			}
			?>
				<?php
					$walkermag_main_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' =>4,
				    	'category_name' => $walkermag_section_args['section_secondary_cat'],
					);
					$walkermag_query = new WP_Query($walkermag_main_args);
					while ($walkermag_query->have_posts()) : $walkermag_query->the_post();
						echo '<div class="section-content-list">';
							if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink();?>" class="section-featured-image"><?php the_post_thumbnail();?></a>
							<?php 
								$after_sub_class= "with-thumbnails";
							} else{
								$after_sub_class= "without-thumbnails";
							}?>
							<div class="content-part <?php echo esc_attr($after_sub_class);?>">
								
								<h4><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h4>	
								<?php walkermag_custom_post_date(); ?>
								
							</div>
						</div>
					<?php endwhile; 
					wp_reset_postdata();?>
			</div>
		<?php } else{
			$content_main_clss='walkermag-grid-12';
		}?>
		<?php if(!empty($walkermag_section_args['section_main_cat'])){?>
			<div class="<?php echo esc_attr($content_main_clss);?> section-inner-content">
			<?php
			if(!empty($walkermag_section_args['section_heading_one'])){
				echo '<h3 class="home-section-heading">'.esc_html($walkermag_section_args['section_heading_one']).'</h3>';
			}
			?>
				<?php
					$walkermag_side_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' => 1,
				    	'category_name' => $walkermag_section_args['section_main_cat'],
					);
					$walkermag_query = new WP_Query($walkermag_side_args);
						while ($walkermag_query->have_posts()) : $walkermag_query->the_post();
							if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink();?>" class="section-featured-image"><?php the_post_thumbnail();?></a>
							<?php } ?>
							<div class="content-part">
								<?php walkermag_custom_category();
								walkermag_custom_post_date(); ?>
								<h1><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h1>	
								<?php  
									
									the_excerpt();
								?>
								<a href="<?php the_permalink();?>" class="walkermag-primary-button"><?php echo __('Read More','walkermag');?></a>
								
							</div>
						<?php endwhile; 
					wp_reset_postdata();
					
				?>
			
			<div class="main-content-list">
			<?php
				$walkermag_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 4,
			    	'offset'		 => 1,
			    	'category_name' => $walkermag_section_args['section_main_cat'],
				);
				$walkermag_query = new WP_Query($walkermag_args);
				while ($walkermag_query->have_posts()) : $walkermag_query->the_post();
					echo '<div class="side-post-list">';
						if ( has_post_thumbnail() ) {?>
							<a href="<?php the_permalink();?>" class="section-featured-image"><?php the_post_thumbnail();?></a>
						<?php 
							$content_clsss="with-thumbnails";
						 } else{
						 	$content_clsss="without-thumbnails";
						 }?>
						<div class="content-part <?php echo esc_attr($content_clsss);?>">
							<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
							<?php walkermag_custom_category();
								walkermag_custom_post_date();
							echo '<p>'. esc_html(walkermag_excerpt('12')) . '</p>';?>
							<a href="<?php the_permalink();?>" class="walkermag-primary-button small"><?php echo __('Read More','walkermag');?></a>
						</div>
					</div>
				<?php endwhile; 
			 wp_reset_postdata();?>
			</div>
		</div>
	</div>
		<?php } ?>
		<div class="walkermag-grid-3 section-sidebar-holder">
			<?php if(!empty($walkermag_section_args['section_third_cat'])){?>
			<div class="right-sidebar-cat">
			<?php
			if(!empty($walkermag_section_args['section_heading_three'])){
				echo '<h3 class="home-section-heading">'.esc_html($walkermag_section_args['section_heading_three']).'</h3>';
			}
			?>
				<?php
					$walkermag_main_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' =>2,
				    	'category_name' => $walkermag_section_args['section_third_cat'],
					);
					$walkermag_query = new WP_Query($walkermag_main_args);
					while ($walkermag_query->have_posts()) : $walkermag_query->the_post();
						echo '<div class="section-content-list">';
							if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink();?>" class="section-featured-image"><?php the_post_thumbnail();?></a>
							<?php 
								$after_sub_class= "with-thumbnails";
							} else{
								$after_sub_class= "without-thumbnails";
							}?>
							<div class="content-part <?php echo esc_attr($after_sub_class);?>">
								
								<h4><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h4>	
								<?php walkermag_custom_post_date(); ?>
								
							</div>
						</div>
					<?php endwhile; 
					wp_reset_postdata();?>
			</div>
		<?php } ?>
		<?php if ( is_active_sidebar( $walkermag_section_args['section_sidebar'] ) ) : ?>
			  <div class="section-sidebar-inner">
			        <?php dynamic_sidebar( $walkermag_section_args['section_sidebar'] ); ?>
			    </div>
		<?php endif; ?>
			
			
		</div>
		
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
<?php  } ?>