<header id="masthead" class="site-header">
		<div class="walkermag-wraper topbar-wraper no-gap">
			<div class="walkermag-container">
				<div class="topbar-left">
					<?php
					if(get_theme_mod('current_date_status','true')){
						walkermag_header_current_date();
					}
					if(walkermag_set_to_premium()){
						do_action('walkermag_after_date','walkermag');
					}
					?>
					
				</div>
				<?php if(get_theme_mod('header_social_icons_status','true')){?>
					<div class="topbar-right">
					<?php walkermag_header_social_media();?>
				</div>
				<?php } ?>
				
			</div>
		</div>
		<div class="walkermag-wraper branding-wraper">
			<div class="walkermag-container">
				<?php walkermag_branding(); ?>
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
		</div>
			<div class="walkermag-wraper nav-wraper no-gap">
				<div class="walkermag-container">
					<?php 
					walkermag_site_navigation();
					if(get_theme_mod('search_icon_status','true')){
						walkermag_header_search_icon();
					}
					
					?>

				</div>
			</div>
	</header><!-- #masthead -->