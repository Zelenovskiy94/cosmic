<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" class="tablet-content">
	<div class="tablet-content__left">
		<div class="tablet-content__left__container">
		
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>
		</div>
		<?php
		if($product->get_type() === 'phone_type') {
			$attributes = get_field('attributes');
			if($attributes) {
			?>
			<div class="attributes-gird-outer">
				<div class="attributes-gird">
					<?php
					foreach ($attributes as $attr) {
					?>
					<div class="attributes-gird__elem">
						<?php if($attr['label']): ?>
							<div class="attributes-gird__elem__label"><?php echo $attr['label'] ?></div>
						<?php endif?>
							<div class="attributes-gird__elem__value"><?php echo $attr['value'] ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
			
			<?php
			}
		} else {

		}
		?>
	</div>

	<div class="tablet-content__right">
		<?php do_action('woocommerce_template_single_title') ?>
		<div class="tablet-content__right__content">
            <div class="right-content">
				<div class="right-content-add-cart">
					<?php do_action('cosmic_phone_type_add_to_cart') ?>
				</div>
				<?php do_action('cosmic_product_description') ?>
			</div>
		</div>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 * 
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		// do_action( 'woocommerce_single_product_summary' );
		?>
		<!-- <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart"> Add to Cart </a> -->
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

