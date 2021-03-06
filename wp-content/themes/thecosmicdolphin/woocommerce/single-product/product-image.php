<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="product-slider-image">
	<!-- <?php 
	$image_Product = wp_get_attachment_image_src( get_post_thumbnail_id( $phone_image->ID ), 'single-post-thumbnail' );
	?>
	<img src="<?php  echo $image_Product[0]; ?>" alt="<?php the_title() ?>"> -->
	<div class="swiper-wrapper">
		<?php 
		$attachment_ids = $product->get_gallery_image_ids();

		$image_Product = wp_get_attachment_image_src( get_post_thumbnail_id( $phone_image->ID ), 'single-post-thumbnail' );
		?>
		<div class="swiper-slide">
			<img src="<?php  echo $image_Product[0]; ?>" alt="<?php the_title() ?>">
		</div>
		<?php
		if($attachment_ids) {
		foreach ($attachment_ids as $attachment_id) {
			$image_link = wp_get_attachment_url( $attachment_id );
			
			?>
			<div class="swiper-slide">
				<img src="<?php echo $image_link ?>" alt="">
			</div>
			<?php
		}}
		?>
	</div>
</div>
