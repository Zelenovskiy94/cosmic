<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_cosmic_dolphin
 */

get_header();
?> 
<main class="main-single-page tablet-container">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <?php 
				while ( have_posts() ) :
					the_post();
		
					get_template_part( 'template-parts/content-post', get_post_type() );
		
				endwhile; // End of the loop.
				?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
