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
					if(get_theme_mod('category_status','true')){
						walkermag_custom_category();
					}
				}else{
					walkermag_custom_category();
				}
				?>
			<?php if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php 
					if(walkermag_set_to_premium()){
						if(get_theme_mod('author_status','true')){
							walkermag_custom_post_author();
						}
						if(get_theme_mod('post_date_status','true')){
							walkermag_custom_post_date();
						}
						if(get_theme_mod('tags_status','true')){
							walkemag_custom_post_tag();
						}
						if(get_theme_mod('comment_status','true')){
							walkermag_post_comments();
						}
						
					}else{
						walkermag_custom_post_author();
						walkermag_custom_post_date();
						walkemag_custom_post_tag();
						walkermag_post_comments();
						
					}
						
					?>
				</div><!-- .entry-meta -->
			<?php endif;
			endif;

			 ?>
		</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
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
	} else{
		echo'<div class="walkermag-excerpt">'. esc_html(walkermag_excerpt('30')).'</div>';?>
		<a href="<?php echo the_permalink();?>" class="walkermag-primary-button"> 
		<?php if(get_theme_mod('walkermag_excerpt_more')){
				echo esc_html(get_theme_mod('walkermag_excerpt_more'));
			}else{
				echo __('Read More','walkermag');
			}?>
		</a>
	<?php }

		
		?>

		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->