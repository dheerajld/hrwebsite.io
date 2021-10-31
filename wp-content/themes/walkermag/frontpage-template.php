<?php
/**
 *  Template Name: Front Page for Theme
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WalkerMag
 */


get_header(); ?>
<div class="walkermag-home">
<?php
//Starting frontpage section
	
	get_template_part( 'template-parts/partials/after-featured/after-featured');
	if(walkermag_set_to_premium()){
		get_template_part( 'template-parts/partials/before-middle/before-middle');
		get_template_part( 'template-parts/partials/middle-section/middle-section');
		get_template_part( 'template-parts/partials/after-middle/after-middle');
	}
	get_template_part( 'template-parts/partials/before-footer/before-footer');

	// get_template_part( 'template-parts/partials/layouts/single-category-style-four');
?>
</div>
<?php get_footer();