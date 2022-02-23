<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_cosmic_dolphin
 */

get_header();
?>
<?php 
    $background_image = get_field('background');
?>
<main class="main-shop-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
			<h2 class="tablet-content__right__title shop-title">
				<?php the_title() ?>
			</h2>
                <?php 
				while ( have_posts() ) :
					the_post();
		
					get_template_part( 'template-parts/content', 'shop' );
		
				endwhile; // End of the loop.
				?>
            </div> 
        </div>
    </div>
</main>
<?php
get_footer();
