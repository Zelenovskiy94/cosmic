<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cobaloba
 */

get_header();
?>

<main class="main-products-page tablet-container">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-product', get_post_type() );

			endwhile; // End of the loop.
			?>
		</div>
    </div>
</main>

<?php
get_footer();
