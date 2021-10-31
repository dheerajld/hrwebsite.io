<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WalkerMag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="walkermag-post-thumbnails">
		<?php walkermag_post_thumbnail(); ?>
	</div>
		<?php if ( has_post_thumbnail() ) {
			$inner_content_class= 'has-thumbnails';
		}else{
			$inner_content_class= 'has-no-thumbnails';
		}

	 ?>
	<div class="article-inner <?php echo $inner_content_class;?>">
		<header class="entry-header">
			<?php 
			if(walkermag_set_to_premium()){
				if(get_theme_mod('single_category_status','true')){
					walkermag_custom_category();
				}
			}else{
				walkermag_custom_category();
			}

				?>
			<?php 
				the_title( '<h1 class="entry-title">', '</h1>' );
			

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					if(walkermag_set_to_premium()){
						if(get_theme_mod('single_author_status','true')){
							walkermag_custom_post_author();
						}
						if(get_theme_mod('single_post_date_status','true')){
							walkermag_custom_post_date();
						}
						if(get_theme_mod('single_tags_status','true')){
							walkemag_custom_post_tag();
						}
						
					}else{
						walkermag_custom_post_author();
						walkermag_custom_post_date();
						walkemag_custom_post_tag();
						
					}
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		
			the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'walkermag' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'walkermag' ),
				'after'  => '</div>',
			)
		);
		
		?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->