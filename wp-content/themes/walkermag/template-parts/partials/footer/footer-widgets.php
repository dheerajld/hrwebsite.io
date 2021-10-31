<?php
/**
 *Footer widget for WalkerMag
 *
 * @package walkermag
 * @since version 1.0.0
 */
	if(is_active_sidebar('footer-1') 
		&& is_active_sidebar('footer-2')
		&& is_active_sidebar('footer-3')
		&& is_active_sidebar('footer-4')
	){
		$walkermag_widget_class ="walkermag-grid-3";
	}
	elseif(is_active_sidebar('footer-1') 
		&& is_active_sidebar('footer-2')
		&& is_active_sidebar('footer-3')
	){
		$walkermag_widget_class ="walkermag-grid-4";
	}
	elseif(is_active_sidebar('footer-1') 
		&& is_active_sidebar('footer-2')
		){
		$walkermag_widget_class ="walkermag-grid-6";
	}else{
		$walkermag_widget_class ="walkermag-grid-12";
	}
?>
<?php
if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')){ ?>
	<div class="walkermag-wraper walkermag-footer-widgets">
		<div class="walkermag-container">
			<div class="walkermag-grid-12 walkermag-footer-widget">
				<div class="walker-container">
					<div id="secondary" class="widget-area walkermag-bottom <?php echo esc_attr($walkermag_widget_class); ?>" role="complementary" >
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>

					<div id="secondary" class="widget-area walkermag-bottom <?php echo esc_attr($walkermag_widget_class); ?>" role="complementary" >
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<div id="secondary" class="widget-area walkermag-bottom <?php echo esc_attr($walkermag_widget_class); ?>" role="complementary" >
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
					<div id="secondary" class="widget-area walkermag-bottom <?php echo esc_attr($walkermag_widget_class); ?>" role="complementary" >
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
} ?>