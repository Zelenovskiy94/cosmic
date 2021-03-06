<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_cosmic_dolphin
 */

?>

<div class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	
	<?php thecosmicdolphin_post_thumbnail(); ?>
	
	<div class="date-author-post">
			<div class="date-post"><?php echo get_the_date() ?></div>
			<div class="author-post">By <?php echo get_the_author()?></div>
		</div>
		<?php
			the_title( '<h4 class="post-title">', '</h4>' );
		?>

</div><!-- #post-<?php the_ID(); ?> -->
