<?php
add_action( 'init', 'cosmic_register_product_type' );
 
function cosmic_register_product_type() {
 
	class WC_Product_Phone_Type extends WC_Product {
 
		public function get_type() {
			return 'phone_type';
		}

		public function add_to_cart_url() {
			$url = $this->is_purchasable() && $this->is_in_stock() ? remove_query_arg( 'added-to-cart', add_query_arg( 'add-to-cart', $this->id ) ) : get_permalink( $this->id );
			return apply_filters( 'woocommerce_product_add_to_cart_url', $url, $this );
		}
 
		// тут можно переписать и другие метода WC_Product, например get_price()
 
	}
 
}

add_action( 'cosmic_phone_type_add_to_cart', 'cosmic_product_type_add_to_cart', 20 );
 
function cosmic_product_type_add_to_cart() {
	global $product;
 
	if ( 'phone_type' == $product->get_type() ) {
		echo '<a href="' . esc_url( $product->add_to_cart_url() ) . '" rel="nofollow" class="single_add_to_cart_button button button-absolute">Buy now</a>';
	}
}

add_action( 'init', function () {
	if ( ! get_term_by( 'slug', 'phone_type', 'product_type' ) ) {
		wp_insert_term( 'phone_type', 'product_type' );
	}
} );

add_filter( 'product_type_selector', 'cosmic_product_type_select' );
 
function cosmic_product_type_select( $types ) {
	$types[ 'phone_type' ] = 'Phone';
	return $types;
}
 

add_action( 'admin_footer', 'cosmic_show_prices_tab' );
 
function cosmic_show_prices_tab() {
 
	global $post, $product_object;
 
	if ( ! $post ) {
		return;
	}
 
	if ( 'product' !== get_post_type( $post ) ) {
		return;
	}
 
	$is_phone_type = $product_object && 'phone_type' === $product_object->get_type() ? true : false;
 
	echo "<script type='text/javascript'>
		jQuery(document).ready(function ( $ ) {
			$( '#general_product_data .pricing' ).addClass( 'show_if_phone_type' );
			$( '.general_options.general_tab' ).addClass( 'show_if_phone_type' );
			
			";
 
			if ( $is_phone_type ) {
				echo "$( '#general_product_data .pricing' ).show();";
				echo "$( '.general_options.general_tab' ).show();";
			}
 
	echo "});</script>";
 
}