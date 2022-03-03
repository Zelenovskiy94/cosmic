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
	<?php 
		if(has_post_thumbnail()) {
			thecosmicdolphin_post_thumbnail();
		} else {
			echo '<img src="'.get_bloginfo("template_url").'/images/img-default.png" />';
		}
	?>
	<a href="<?php echo get_permalink() ?>" class="post-bottom">
			<?php 
			$my_current_lang = apply_filters( 'wpml_current_language', NULL );
			$by_text = 'By';
			switch($my_current_lang) {
				case 'fr' :
					$by_text = "Par";
					break;
				case 'de' :
					$by_text = "Von";
					break;
			} ?>
		<div class="date-author-post">
			<div class="date-post"><?php echo get_the_date() ?></div>
			<div class="author-post"><?php echo $by_text ?> <?php echo get_the_author()?></div>
		</div>
		<?php
			the_title( '<h4 class="post-title">', '</h4>' );
		?>
	</a>
	

</div><!-- #post-<?php the_ID(); ?> -->
