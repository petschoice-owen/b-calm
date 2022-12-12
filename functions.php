<?php
/*-----------------------------------------------------------------------------------*/
/* This file will be referenced every time a template/page loads on your Wordpress site
/* This is the place to define custom fxns and specialty code
/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
// define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;


/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'header_menu'	=>	__( 'Header Menu', 'blank' ), // Register the Header menu
		'footer_menu'	=>	__( 'Footer Menu', 'blank' ), // Register the Footer menu
	)
);


/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
/*
	function theme_register_sidebars() {
		register_sidebar(array(				// Start a series of sidebars to register
			'id' => 'sidebar', 					// Make an ID
			'name' => 'Sidebar',				// Name it
			'description' => 'Take it on the side...', // Dumb description for the admin side
			'before_widget' => '<div>',	// What to display before each widget
			'after_widget' => '</div>',	// What to display following each widget
			'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
			'after_title' => '</h3>',		// What to display following each widget's title
			'empty_title'=> '',					// What to display in the case of no title defined for a widget
			// Copy and paste the lines above right here if you want to make another sidebar, 
			// just change the values of id and name to another word/name
		));
	} 
	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'theme_register_sidebars' );
*/


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
function theme_scripts()  { 
	// enqueue css files
	wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.min.css');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');

	// enqueue js files
	wp_enqueue_script('jquery', get_template_directory_uri() . '/scripts/vendors/jquery.min.js');
	wp_enqueue_script('popper', get_template_directory_uri() . '/scripts/vendors/popper.min.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/scripts/vendors/bootstrap.min.js');
	wp_enqueue_script('slick', get_template_directory_uri() . '/scripts/vendors/slick.min.js');
	// wp_enqueue_script('masonry', get_template_directory_uri() . '/scripts/vendors/masonry.pkgd.min.js');
	wp_enqueue_script('wow', get_template_directory_uri() . '/scripts/vendors/wow.min.js');
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/scripts/script.js');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


/*-----------------------------------------------------------------------------------*/
/* PHP code for SVG support In WordPress
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
}, 10, 4 );
  
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );
  
function fix_svg() {
	echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', 'fix_svg' );


/*-----------------------------------------------------------------------------------*/
/* Advanced Custom Fields Modifications - Resize WYSIWYG Editor
/*-----------------------------------------------------------------------------------*/
function PREFIX_apply_acf_modifications() { ?>
	<style>
		.acf-editor-wrap iframe {
			min-height: 0;
		}
	</style>
	<script>
		(function($) {
			// (filter called before the tinyMCE instance is created)
			acf.add_filter('wysiwyg_tinymce_settings', function(mceInit, id, $field) {
				// enable autoresizing of the WYSIWYG editor
				mceInit.wp_autoresize_on = true;
				return mceInit;
			});
			// (action called when a WYSIWYG tinymce element has been initialized)
			acf.add_action('wysiwyg_tinymce_init', function(ed, id, mceInit, $field) {
				// reduce tinymce's min-height settings
				ed.settings.autoresize_min_height = 100;
				// reduce iframe's 'height' style to match tinymce settings
				$('.acf-editor-wrap iframe').css('height', '100px');
			});
		})(jQuery)
	</script>
<?php }
add_action('acf/input/admin_footer', 'PREFIX_apply_acf_modifications');


/*-----------------------------------------------------------------------------------*/
/* Advanced Custom Fields - Add Theme Settings
/*-----------------------------------------------------------------------------------*/
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header',
		'menu_title'	=> 'Header Section',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer',
		'menu_title'	=> 'Footer Section',
		'parent_slug'	=> 'general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'general-settings',
	));
}


/*-----------------------------------------------------------------------------------*/
/* WooCoomerce Shop Page
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'woocommerce' );


/*-----------------------------------------------------------------------------------*/
/* WooCoomerce - Cart Menu Item
/*-----------------------------------------------------------------------------------*/
function woo_cart_but() {
	ob_start();
	$cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
	$cart_url = wc_get_cart_url();  // Set Cart URL ?>

	<a class="menu-item cart-contents cart" href="<?php echo $cart_url; ?>" title="My Basket">
		<?php if ( $cart_count > 0 ) { ?>
			<span class="cart-contents-count"><?php echo $cart_count; ?></span>
		<?php } ?>
	</a>
	<?php  
    return ob_get_clean();
}
add_shortcode ('woo_cart_but','woo_cart_but');

// Add AJAX Shortcode when cart contents update
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
function woo_cart_but_count( $fragments ) {
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url(); ?>

    <a class="cart-contents menu-item cart" href="<?php echo $cart_url; ?>" title="Cart">
		<?php if ( $cart_count > 0 ) { ?>
			<span class="cart-contents-count"><?php echo $cart_count; ?></span>
		<?php } ?>
	</a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}


/*-----------------------------------------------------------------------------------*/
/* WooCommerce - Remove/Add elements on WooCommerce
/*-----------------------------------------------------------------------------------*/
function remove_woocommerce_elements() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 ); 					// Remove WooCommerce breadcrumbs
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); 						// Remove Result Count - before shop loop
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );							// Remove Result Count - after shop loop
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );			// Remove Product Meta - Single Product Page
	// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); 	// Remove Price Range of products in the loop
	// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );		// Remove Price - Single Product Page
}
add_action( 'after_setup_theme', 'remove_woocommerce_elements' );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );																			// Remove the description tab
    unset( $tabs['reviews'] ); 																				// Remove the reviews tab
    unset( $tabs['additional_information'] );																// Remove the additional information tab
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

// function remove_gallery_thumbnail_images() {
// 	if ( is_product() ) {
// 		remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );		// Remove product thumbnails - Single Product Page
// 	}
// }
// add_action('loop_start', 'remove_gallery_thumbnail_images');


/*-----------------------------------------------------------------------------------*/
/* Hide shipping rates when free shipping is available.
/* Updated to support WooCommerce 2.6 Shipping Zones.
/*-----------------------------------------------------------------------------------*/
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


/*-----------------------------------------------------------------------------------*/
/* WooCommerce - Remove "Choose an option" in dropdown menus
/*-----------------------------------------------------------------------------------*/
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
function filter_dropdown_option_html( $html, $args ) {
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
	$show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
	$html = str_replace($show_option_none_html, '', $html);
	return $html;
}


/*-----------------------------------------------------------------------------------*/
/* WooCommerce Shop - Change "Shop" link to "Product Page"
/*-----------------------------------------------------------------------------------*/
// function custom_shop_page_redirect() {
//     if( is_shop() ){
// 		wp_redirect( home_url( '/shop/b-calm-product-name' ) );												//Enter the slug of the desired product page
//         exit();
//     }
// }
// add_action( 'template_redirect', 'custom_shop_page_redirect' );

add_filter( 'woocommerce_return_to_shop_redirect', 'custom_empty_cart_redirect_url' );
function custom_empty_cart_redirect_url(){
	// return 'http://yoursite.com/page-example';
	return home_url( '/shop/b-calm-product-name' );	
}