<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_cosmic_dolphin
 */

get_header();
?>
<main class="main-blog-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <div class="tablet-content__blog__left">
                    <h2 class="tablet-content__right__title shop-title">
                        <?php single_post_title(); ?>
                    </h2>
					<div class="posts-outer">
						<div class="blog-posts-container">
							<?php
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', 'blog');

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						
						</div>
						<div class="loader-filter-container">
							<div class="loader-filter">
								<div class="bar bar1"></div>
								<div class="bar bar2"></div>
								<div class="bar bar3"></div>
								<div class="bar bar4"></div>
								<div class="bar bar5"></div>
								<div class="bar bar6"></div>
								<div class="bar bar7"></div>
								<div class="bar bar8"></div>
							</div>
						</div>
					</div>
					
					
					
                </div>
				<div class="tablet-content__blog__right">
					<h2 class="tablet-content__right__title shop-title">
                        <?php _e('Categories', 'thecosmicdolphins') ?>
                    </h2>
					<div class="posts-filter-container">
						<?php
							if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) )  :
						?>
						<div class="posts-filter__by-categories">
							<div class="filter-post__category" data-value="all">All</div>
							<?php 
							foreach ( $terms as $term ) {
								echo '<div class="filter-post__category" data-value="' . $term->term_id . '">' . $term->name . '</div>';
							}	
							?>
						</div>
						<?php 
							endif;
						?>
					</div>
				</div>
            </div> 
        </div>
    </div>
</main>

<?php
get_footer();
