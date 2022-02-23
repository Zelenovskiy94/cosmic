<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_cosmic_dolphin
 */

?>

<article id="post-<?php the_ID(); ?>" class="post-article">
	<header class="post-header">
		<div class="post-categories">
			<?php 
			$post_id = get_the_ID();
			$post_categories = get_the_category();
			if($post_categories) {
				foreach($post_categories as $post_category) {
			?>
			
				<div class="post-category"><?php echo $post_category->name ?></div>
			
			<?php
				}
			}
			?>
		</div>
		<?php
			the_title( '<h1 class="post-title">', '</h1>' );
		?>
		<div class="date-author-post">
			<div class="date-post"><?php echo get_the_date() ?></div>
			<div class="author-post">By <?php echo get_the_author()?></div>
		</div>
		
	</header>

	<div class="post-content">
		<div class="post-content__inner">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'thecosmicdolphin' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<script>
	jQuery(document).ready(function($){
		function setHeightPostContent() {
			let postHeaderHeight = $('.post-header').outerHeight()
			let postArticleHeight = $('.post-article').outerHeight()
			$('.post-content').css('max-height', postArticleHeight - postHeaderHeight + 'px')
		}
		setHeightPostContent()
	
		window.addEventListener('resize', setHeightPostContent());
	},(jQuery))
</script>
