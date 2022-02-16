<?php
/*
Template Name: Company page
*/
get_header();


?>
<main class="main-company-page tablet-container">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <div class="tablet-content__left">
                    <div class="tablet-content__left__container tablet-content__left__container__product ">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/map.svg" class="company-map" />
                    </div>
                </div>
                <div class="tablet-content__right">
                    <h2 class="tablet-content__right__title">
                        <?php the_field('title') ?>
                    </h2>
                    <div class="tablet-content__right__content">
                        <div class="right-content">
                            <?php the_field('description') ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();