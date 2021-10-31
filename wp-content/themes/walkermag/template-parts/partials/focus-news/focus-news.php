<?php
$walkermag_focus_news_status = esc_attr(get_theme_mod('focus_news_status'));
if($walkermag_focus_news_status){?>
	<div class="walkemag-wraper focus-news-wraper">
		<div class="walkermag-container">
			<div class="focusnews-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
		    		<div class="focusnews-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
			<div class="swiper-container walkermag-focus-news">
				<div class="swiper-wrapper">
				<?php
					$focus_post_type = get_theme_mod('focus_news_post_type');
					if(get_theme_mod('focus_news_items_show')){
						$focus_news_total= get_theme_mod('focus_news_items_show');
					}else{
						$focus_news_total =8;
					}
					$sticky = get_option( 'sticky_posts' );
					$focus_post_cat = get_theme_mod('walkermag_focus_news_category');
					if($focus_post_type =='latest-post'){
						$focus_args = array(
					    	'post_type' => 'post',
					    	'order'=> 'DESC',
					    	'posts_per_page' => $focus_news_total,
					    	'ignore_sticky_posts' => 1,
					    	'post__not_in' => $sticky
						);
					}else{
						$focus_args = array(
					    	'post_type' => 'post',
					    	'order'=> 'DESC',
					    	'posts_per_page' => $focus_news_total,
					    	'ignore_sticky_posts' => 1,
					    	'post__not_in' => $sticky,
					    	'category_name' => $focus_post_cat,
						);
					}
					$walkermag_focus_query = new WP_Query($focus_args);
						while ($walkermag_focus_query->have_posts()) : $walkermag_focus_query->the_post();?>
						    <div class="swiper-slide">
						    	<span class="focus-news-box">
							    	<?php
							    	if ( has_post_thumbnail() ) {
							    		$content_sub_class="with-thumbnail";
							    		?>
										  <span class="focus-news-thumb"> <?php the_post_thumbnail();?></span>
										<?php } else{
											$content_sub_class="without-thumbnail";
										}
									?>
										<span class="focus-content <?php echo esc_attr($content_sub_class);?>"> 
											<a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a>
											<?php walkermag_custom_post_date(); ?>
										</span>
									
									</span>
								</div>
							
						<?php endwhile; 
					wp_reset_postdata(); ?>	
				</div>
			</div>
		</div>
	</div>
<?php } ?>