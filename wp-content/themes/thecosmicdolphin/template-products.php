<?php
/*
Template Name: Products page
*/
get_header();


$products_phone = new WP_Query;
$phones = $products_phone->query( array(
	'post_type' => 'product',
    'category' => 'products',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_type',
            'field'    => 'slug',
            'terms'    => 'phone_type', 
        ),
    ),
    'meta_key'       => 'in_progress', 
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC'
) );

?>
<?php 
    $background_image = get_field('background');
?>
<main class="main-products-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <div class="tablet-content__left">
                    <div class="tablet-content__left__container tablet-content__left__container__product">
                        <div class="product-slider-image product-content-animation">
                            <?php
                                foreach ($phones as $phone_image) {
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $phone_image->ID ), 'single-post-thumbnail' );
                            ?>
                                <img class="product-content-<?php echo $phone_image->ID; ?>  products-content__product" src="<?php  echo $image[0]; ?>" data-id="<?php echo $phone_image->ID; ?>">
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="tablet-content__left__bottom-slider border-list-container">
                        <div class="border-list__items">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($phones as $phone_item) {
                                    $phone_item_id = $phone_item->ID;
                                    $in_progress = get_field('in_progress', $phone_item->ID);
                                    if($in_progress) {
                                    ?>
                                        <div data-id="<?php echo $phone_item->ID; ?>" class="border-list__item swiper-slide in-progress-product">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/in_progress.png" alt="">
                                            <span>In Progress</span>

                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                    <div data-id="<?php echo $phone_item->ID; ?>" class="border-list__item swiper-slide">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/dolphin_1.png" alt="">
                                    </div>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="tablet-content__right">
                    <h2 class="tablet-content__right__title">
                        <div class="product-slider-title product-content-animation">
                            <?php
                                foreach ($phones as $phone_title) {
                                    ?>
                                    <div class="product-content-<?php echo $phone_title->ID; ?> products-content__product"><?php echo $phone_title->post_title; ?></div>
                                    <?php
                                }
                            ?>
                        </div>
                    </h2>
                    <div class="tablet-content__right__content">
                        <div class="right-content">
                            <div class="product-slider-content product-content-animation">
                                <?php
                                    foreach ($phones as $phone_content) {
                                ?>
                                <div class="product-content-<?php echo $phone_content->ID; ?> products-content__product">
                                    <div><?php echo $phone_content->post_excerpt ?></div>
                                    <a href="<?php echo get_permalink($phone_content->ID) ?>" class="button"><?php _e('Learn more', 'cosmic') ?></a>
                                </div>
                                    
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
jQuery(document).ready(function($){
    let swiper_product_items = new Swiper(".border-list__items", {
        spaceBetween: 16,
        slidesPerView: 'auto',
        slideToClickedSlide: true
      });
    let activeData =  $('.border-list__items').find('.swiper-slide-active').data()
    $(".product-content-" + activeData.id).each(function () {
        $(this).fadeIn(0)
    })
    $('body').on('click', '.border-list__item', function() {
        $('.border-list__item').removeClass('swiper-slide-active').removeClass('active')
        $(this).addClass('.swiper-slide-active').addClass('active')
        let data = $(this).data()
        $('.products-content__product').fadeOut(300)
        setTimeout(function(){
            $(".product-content-" + data.id).fadeIn(300)
        }, 300)
    })
},(jQuery))
</script>
<?php
get_footer();