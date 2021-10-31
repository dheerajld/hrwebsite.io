<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WalkerNews
 * @since version 1.0.0
 */

?>
<footer id="colophon" class="site-footer">
	<?php get_template_part( 'template-parts/partials/footer/footer-widgets'); ?>
	<div class="walkermag-wraper copyright-wraper">
		<div class="walkermag-container">
			<?php walkernews_footer_copyright();?>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php walkermag_scroll_top();?>
<?php wp_footer(); ?>

</body>
</html>
