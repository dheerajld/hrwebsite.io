<header id="masthead" class="site-header">
	<?php
		$walkernews_header_bg = "";
		if( has_header_image() ) {
			$walkernews_header_bg = ' style=background-image:url('. esc_url( get_header_image() ) .')';
		}
		?>
		<div class="walkermag-wraper branding-wraper header-layout-2" <?php echo esc_attr( $walkernews_header_bg ); ?>>
			<?php 
				$header_banner_ads_position = get_theme_mod('header_ads_position','header-ads-position-top');
				if($header_banner_ads_position == 'header-ads-position-top'){
			?>

			<div class="walkermag-container">
				<div class="header-banner">
					<?php 
						if(get_theme_mod('header_ads_image')){
							if(get_theme_mod('header_ads_image_link')){
								$header_ads_link = get_theme_mod('header_ads_image_link');
							}else{
								$header_ads_link = '#';
							}
							$header_image_source= get_theme_mod('header_ads_image');?>
							<a href="<?php echo esc_url($header_ads_link);?>" target="_blank" ><img src="<?php echo esc_url($header_image_source);?>" /></a>
						<?php }
						?>
				</div>
			</div>
			<?php  } ?>
			<div class="walkermag-container">
				<?php 
				if(get_theme_mod('current_date_status','true')){
					walkermag_header_current_date();
				}
				walkermag_branding();
				if(get_theme_mod('header_social_icons_status','true')){
					walkermag_header_social_media();
				}
				?>
				
			</div>
			<?php if($header_banner_ads_position == 'header-ads-position-bottom'){?>
			<div class="walkermag-container ads-below-branding">
				<div class="header-banner">
					<?php 
						if(get_theme_mod('header_ads_image')){
							if(get_theme_mod('header_ads_image_link')){
								$header_ads_link = get_theme_mod('header_ads_image_link');
							}else{
								$header_ads_link = '#';
							}
							$header_image_source= get_theme_mod('header_ads_image');?>
							<a href="<?php echo esc_url($header_ads_link);?>" target="_blank" ><img src="<?php echo esc_url($header_image_source);?>" /></a>
						<?php }
						?>
				</div>
			</div>
		<?php } ?>
		</div>
			<div class="walkermag-wraper nav-wraper no-gap header-layout-2">
				<div class="walkermag-container">
					<?php
					if(walkermag_set_to_premium()){
						do_action('walkermag_after_date','walkernews');
					}
					walkermag_site_navigation();
					if(get_theme_mod('search_icon_status','true')){
						walkermag_header_search_icon();
					}
					?>

				</div>
			</div>
	</header><!-- #masthead -->