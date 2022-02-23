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

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action('woocommerce_template_loop_product_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_template_loop_price', 'woocommerce_template_loop_price', 12);
add_action('woocommerce_template_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 15);
add_action('woocommerce_template_single_price', 'woocommerce_template_single_price', 13);



function sbw_wc_add_buy_now_button_single()
{
    global $product;
    printf( '<button id="sbw_wc-adding-button" type="submit" name="sbw-wc-buy-now" value="%d" class="single_add_to_cart_button buy_now_button button-shop-add-to-cart alt">%s</button>', $product->get_ID(), esc_html__( 'Buy now', 'sbw-wc' ) );
}

add_action( 'woocommerce_after_add_to_cart_button', 'sbw_wc_add_buy_now_button_single' );



/*** Handle for click on buy now ***/

function sbw_wc_handle_buy_now()
{
    if ( !isset( $_REQUEST['sbw-wc-buy-now'] ) )
    {
        return false;
    }

    WC()->cart->empty_cart();

    $product_id = absint( $_REQUEST['sbw-wc-buy-now'] );
    $quantity = absint( $_REQUEST['quantity'] );

    if ( isset( $_REQUEST['variation_id'] ) ) {

        $variation_id = absint( $_REQUEST['variation_id'] );
        WC()->cart->add_to_cart( $product_id, 1, $variation_id );

    }else{
        WC()->cart->add_to_cart( $product_id, $quantity );
    }

    wp_safe_redirect( wc_get_checkout_url() );
    exit;
}

add_action( 'wp_loaded', 'sbw_wc_handle_buy_now' );
