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
<div class="container container-narrow">
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">
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
			do_action( 'woocommerce_single_product_summary' );
			?>
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
		
		<section class="product-tabs">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<?php if( get_field('product_tab_description') ): ?>
						<button class="nav-link" id="nav_description" data-bs-toggle="tab" data-bs-target="#tab_description" type="button" role="tab" aria-controls="tab_description" aria-selected="false">Description</button><!-- active --><!-- aria-selected="false" -->
					<?php endif; ?>
					<?php if( get_field('product_tab_nutrition') ): ?>
						<button class="nav-link" id="nav_nutrition" data-bs-toggle="tab" data-bs-target="#tab_nutrition" type="button" role="tab" aria-controls="tab_nutrition" aria-selected="false">Nutrition</button>
					<?php endif; ?>
					<?php if( get_field('product_tab_ingredients') ): ?>
						<button class="nav-link" id="nav_ingredients" data-bs-toggle="tab" data-bs-target="#tab_ingredients" type="button" role="tab" aria-controls="tab_ingredients" aria-selected="false">Ingredients</button>
					<?php endif; ?>
					<?php if( get_field('product_tab_feeding_guide_text_editor') || get_field('product_tab_feeding_guide') ): ?>
						<button class="nav-link" id="nav_feeding_guide" data-bs-toggle="tab" data-bs-target="#tab_feeding_guide" type="button" role="tab" aria-controls="tab_feeding_guide" aria-selected="false">Feeding Guide</button>
					<?php endif; ?>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<?php if( get_field('product_tab_description') ): ?>
					<div class="tab-pane" id="tab_description" role="tabpanel" aria-labelledby="nav_description"><!-- fade show active -->
						<div class="tab-content-wrapper">
							<?php the_field('product_tab_description'); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('product_tab_nutrition') ): ?>
					<div class="tab-pane fade" id="tab_nutrition" role="tabpanel" aria-labelledby="nav_nutrition">
						<div class="tab-content-wrapper">
							<?php
								if( have_rows('product_tab_nutrition') ): ?>
									<table>
										<?php while( have_rows('product_tab_nutrition') ) : the_row();
											$name = get_sub_field('name');
											$percentage = get_sub_field('percentage'); ?>
											<tr>
												<td><?php echo $name; ?></td>
												<td><?php echo $percentage; ?></td>
											</tr>
										<?php endwhile; ?>
									</table>
								<?php else :
								endif;
							?>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('product_tab_ingredients') ): ?>
					<div class="tab-pane fade" id="tab_ingredients" role="tabpanel" aria-labelledby="nav_ingredients">
						<div class="tab-content-wrapper">
							<?php the_field('product_tab_ingredients'); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if( get_field('product_tab_feeding_guide_text_editor') || get_field('product_tab_feeding_guide') ): ?>
					<div class="tab-pane fade" id="tab_feeding_guide" role="tabpanel" aria-labelledby="nav_feeding_guide">
						<div class="tab-content-wrapper">
							<?php if( get_field('product_tab_feeding_guide_text_editor') ): ?>
								<?php the_field('product_tab_feeding_guide_text_editor'); ?>
							<?php endif; ?>
							<?php
								if( have_rows('product_tab_feeding_guide') ): ?>
									<table>
										<thead>
											<tr>
												<th>Weight of Dog (kg)</th>
												<th>Packs/Grams per day</th>
											</tr>
										</thead>
										<?php while( have_rows('product_tab_feeding_guide') ) : the_row();
											$weight = get_sub_field('weight');
											$grams = get_sub_field('grams'); ?>
											<tr>
												<td><?php echo $weight; ?></td>
												<td><?php echo $grams; ?></td>
											</tr>
										<?php endwhile; ?>
									</table>
								<?php else :
								endif;
							?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>

	<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>