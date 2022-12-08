<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="variations variation-items quantity">
	<div class="variation-item options">
		<p class="label option-label">Quantity</p>
		<div class="value option-selection variation-quantity">
			<div class="product-quantity"><!-- id="qty_select" -->
				<input type="hidden" value="1" class="prod_id">
				<div class="input-group" id="qty_selector">
					<a class="qty-btn decrement-btn"></a>
					<input type="text" class="qty-input" value="1"/><!-- readonly="readonly" id="qty_display" -->
					<a class="qty-btn increment-btn"></a>
				</div>
			</div>
			<div class="d-none woocommerce-quantity">
				<?php
					do_action( 'woocommerce_before_add_to_cart_quantity' );

					woocommerce_quantity_input(
						array(
							'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
							'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
							'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
						)
					);
				
					do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>
			</div>
		</div>
	</div>
</div>

<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	// do_action( 'woocommerce_before_add_to_cart_quantity' );

	// woocommerce_quantity_input(
	// 	array(
	// 		'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
	// 		'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
	// 		'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
	// 	)
	// );

	// do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	<button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
