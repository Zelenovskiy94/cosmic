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
        <h1 class="title-in-wrap" style="max-width: 531px; margin-bottom: 32px">Safe Phone<br>
                Privacy for everyone</h1>
        <button class="button">Order now</button>
    </div>
</main>
<?php
get_footer();