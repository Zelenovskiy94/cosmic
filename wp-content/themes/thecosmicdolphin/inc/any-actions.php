<?php 

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


//single product hooks
add_action('woocommerce_template_single_title', 'woocommerce_template_single_title', 5);

function cosmic_product_description() {
    global $product;
    echo $product->post->post_content;
};
add_action('cosmic_product_description', 'cosmic_product_description', 15);

add_action('woocommerce_template_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 15);