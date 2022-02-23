<?php
/*
Template Name: Blog page
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
                <div class="tablet-content__blog__left">
                    <h2 class="tablet-content__right__title shop-title">
                        <?php the_title() ?>
                    </h2>
                </div>
			
                <?php 
				while ( have_posts() ) :
					the_post();
		
					get_template_part( 'template-parts/content', 'content' );
		
				endwhile; // End of the loop.
				?>
            </div> 
        </div>
    </div>
</main>
<?php
get_footer();
