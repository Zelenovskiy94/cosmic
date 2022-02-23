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
		<div class="tablet-content__left__container product-image-outer <?php echo $product->get_type() != 'phone_type' ? 'tablet-content__left__container__shop' : '' ?>">
			<!-- <div class="product-image-inner"> -->

			
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
			<!-- </div> -->
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
			?>
			<div class="tablet-content__left__bottom-slider border-list-container ">
                        <div class="border-list__items product-images-slider">
                            <div class="swiper-wrapper">
								<?php 
								$attachment_ids = $product->get_gallery_image_ids();

								$image_Product = wp_get_attachment_image_src( get_post_thumbnail_id( $phone_image->ID ), 'single-post-thumbnail' );
								?>
								<div class="border-list__item swiper-slide">
									<img src="<?php  echo $image_Product[0]; ?>" alt="<?php the_title() ?>">
                                </div>
                                <?php
								if($attachment_ids) {
                                foreach ($attachment_ids as $attachment_id) {
                                    $image_link = wp_get_attachment_url( $attachment_id );
                                    
                                    ?>
                                    <div class="border-list__item swiper-slide">
                                        <img src="<?php echo $image_link ?>" alt="">
                                    </div>
                                    <?php
                                }}
                                ?>
                            </div>
                        </div>
                        
                    </div>
		<?php
		}
		?>
	</div>

	<div class="tablet-content__right <?php echo $product->get_type() != 'phone_type' ? 'tablet-content__right__shop' : '' ?>">
		<?php do_action('woocommerce_template_single_title') ?>
		<?php 
		if($product->get_type() != 'phone_type') {
			?>
			<?php do_action('woocommerce_template_single_add_to_cart') ?>
			<?php do_action('sbw_wc_add_buy_now_button_single') ?>
			<?php
		}
		?>
		<div class="tablet-content__right__content">
            <div class="right-content">
				<?php
				if($product->get_type() === 'phone_type') {
				?>
					<div class="right-content-add-cart">
						<?php do_action('cosmic_phone_type_add_to_cart') ?>
					</div>
				<?php
				}
				?>
				
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
<script>
	jQuery(document).ready(function($){
		let swiper_product_images = new Swiper(".product-images-slider", {
			spaceBetween: 16,
			slidesPerView: 'auto',
			slideToClickedSlide: true
		});
		var swiper2 = new Swiper(".product-slider-image", {
			spaceBetween: 10,
			thumbs: {
			swiper: swiper_product_images,
			},
      	});

	// const currentPrice = <?php echo esc_js( $product->get_price() )  ?>;
	// const currentCurrency = <?php //echo esc_js( get_woocommerce_currency_symbol() )  ?>;
	// function changeCountProductPrice () {
	// 		$('body').on('change', 'input.qty', function(){

	// 		})
	// }
	// changeCountProductPrice()
	// console.log(currentPrice)
	// console.log(currentCurrency)

	},(jQuery))
</script>
<?php do_action( 'woocommerce_after_single_product' ); ?>

