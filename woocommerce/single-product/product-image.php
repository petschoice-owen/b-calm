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

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="product-image-wrapper">
		<?php if ( is_product() ) { ?>
			<figure class="woocommerce-product-gallery__wrapper product-featured">
				<?php
				if ( $post_thumbnail_id ) {
					$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
				} else {
					$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
					$html .= '</div>';
				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
				?>
				<a href="#" class="product-nav product-nav-left"></a>
				<a href="#" class="product-nav product-nav-right"></a>
			</figure>
			<div class="product-thumbnails">
				<?php
					do_action( 'woocommerce_product_thumbnails' );
				?>
			</div>
			<!-- <div class="product-icons">
				<?php 
					if( get_field('product_icon_fresh_meat') == 'show' ) { ?>
						<div class="icon-holder fresh-meat">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-fresh-meat.png" title="Made with Fresh Meat" alt="" />
						</div>
					<?php }
				?>
				<?php 
					if( get_field('product_icon_gluten_free') == 'show' ) { ?>
						<div class="icon-holder fresh-meat">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-gluten-free.png" title="Wheat Gluten Free" alt="" />
						</div>
					<?php }
				?>
				<?php 
					if( get_field('product_icon_natural_ingredients') == 'show' ) { ?>
						<div class="icon-holder fresh-meat">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-natural-ingredients.png" title="Made with 100% Natural Ingredients" alt="" />
						</div>
					<?php }
				?>
			</div> -->
		<?php } 
		else { ?>
			<figure class="woocommerce-product-gallery__wrapper">
				<?php
				if ( $post_thumbnail_id ) {
					$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
				} else {
					$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
					$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
					$html .= '</div>';
				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

				do_action( 'woocommerce_product_thumbnails' );
				?>
			</figure>
		<?php } ?>
	</div>
</div>




