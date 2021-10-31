<?php
/**
 *  Template for Woocommerce 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package walkermag
 */


get_header(); ?>
<div class="walkermag-wraper woocommerce-wraper">
	<div class="walkermag-container">
		<main id="primary" class="site-main walkermag-grid-9">
			<?php woocommerce_content(); ?>
		</main>
		<div class="walkermag-grid-3 sidebar-block global-sidebar">
			<?php get_sidebar();?>
		</div>
	</div>
</div>

<?php get_footer();