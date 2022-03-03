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
/*
Template Name: Standart page
*/
get_header();
?>
<?php 
    $background_image = get_field('background');
?>
<main class="main-shop-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
			<?php echo do_action('breadcrumbs');?>
            <div class="tablet-content">
				<?php
				if(is_bbpress()) {
					while ( have_posts() ) :
						the_post();
	
						get_template_part( 'template-parts/content', 'forum' );
	
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
	
					endwhile; // End of the loop.
				} else {
					while ( have_posts() ) :
						the_post();
	
						get_template_part( 'template-parts/content', 'page' );
	
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
	
					endwhile; // End of the loop.
				}

				?>
            </div> 
        </div>
    </div>
</main>

<?php
get_footer();
