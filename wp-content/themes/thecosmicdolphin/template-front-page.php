<?php
/*
Template Name: Home page
*/
get_header();

?>
<main class="main-front-page">
    <video autoplay muted loop>
        <source src="<?php echo get_template_directory_uri() ?>/assets/images/bg/home_video.mp4" type="video/mp4">
    </video>
    <a class="to_product_link" href="<?php echo get_permalink( 36 ) ?>"></a>
    <div class="front-page-content">
        <h1 class="title-in-wrap" style="max-width: 531px; margin-bottom: 32px"><?php the_field('title') ?></h1>
        <?php $button = get_field('button'); ?>
        <a href="<?php echo $button['url'] ?>" class="button">
            <?php echo $button['label']  ?>
        </a>
    </div>
</main>
<?php
get_footer();