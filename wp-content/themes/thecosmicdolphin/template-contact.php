<?php
/*
Template Name: Contact us page
*/
get_header();


?>
<?php 
    $background_image = get_field('background');
?>
<main class="main-contact-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <div class="contact-us-form animation-active-block">
                    <?php echo do_shortcode('[contact-form-7 id="85" title="Contact form 1"]'); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();