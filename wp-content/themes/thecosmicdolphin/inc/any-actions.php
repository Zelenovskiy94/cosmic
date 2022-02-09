<?php 

if ( ! function_exists( 'banner_slider' ) ) {
    function banner_slider() { 
        echo get_template_part( 'template-parts/banner-slider' );
        
    }
}
// add_action('banner_slider', 'banner_slider');



function is_stock() {
    global $product;

    $is_stock = $product->get_stock_status();
    if($is_stock == 'instock') {
        ?>
            <span class="cl-black-300 uppercase">In stock</span>
        <?php
    } else {
        ?>
            <span class="cl-black-300 uppercase">stock</span>
        <?php
    }
}
// add_action('woocommerce_single_product_summary', 'is_stock', 12);


function breadcrumbs() {
    ?>
    <div class="breadcrumbs">
        <?php echo true_breadcrumbs() ?>
    </div>
    <?php
};

add_action('breadcrumbs', 'breadcrumbs', 10);