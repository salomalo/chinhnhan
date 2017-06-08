<?php
/**
 * WooCommerce Call for Price
 *
 * @version 3.1.0
 * @since   2.0.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_Call_For_Price' ) ) :

class Alg_WC_Call_For_Price {

	/**
	 * Constructor.
	 *
	 * @version 3.1.0
	 */
	function __construct() {
		if ( 'yes' === get_option( 'alg_wc_call_for_price_enabled', 'yes' ) ) {
			add_filter( 'woocommerce_get_variation_prices_hash', array( $this, 'get_variation_prices_hash' ), PHP_INT_MAX, 3 ); // not sure if this is really needed
			if ( 'yes' === get_option( 'alg_call_for_price_make_all_empty', 'no' ) ) {
				$filter = ( version_compare( get_option( 'woocommerce_version', null ), '3.0.0', '<' ) ) ? 'woocommerce_get_price' : 'woocommerce_product_get_price';
				add_filter( $filter, array( $this, 'make_empty_price' ), PHP_INT_MAX, 2 );
				add_filter( 'woocommerce_variation_prices_price', array( $this, 'make_empty_price' ), PHP_INT_MAX, 2 );
				if ( version_compare( get_option( 'woocommerce_version', null ), '3.0.0', '>=' ) ) {
					add_filter( 'woocommerce_product_variation_get_price', array( $this, 'make_empty_price' ), PHP_INT_MAX, 2 );
				}
			}
			add_action( 'init', array( $this, 'add_hooks' ), PHP_INT_MAX );
			add_filter( 'woocommerce_sale_flash', array( $this, 'hide_sales_flash' ), PHP_INT_MAX, 3 );
			if ( 'yes' === get_option( 'alg_wc_call_for_price_' . 'variable' . '_enabled', 'yes' ) ) {
				if ( 'yes' === get_option( 'alg_wc_call_for_price_' . 'variable' . '_' . 'variation' . '_enabled', 'yes' ) ) {
					add_filter( 'woocommerce_variation_is_visible', array( $this, 'make_variation_visible_with_empty_price' ), PHP_INT_MAX, 4 );
					add_action( 'admin_head', array( $this, 'hide_variation_price_required_placeholder' ), PHP_INT_MAX );
				}
				if ( 'yes' === get_option( 'alg_wc_call_for_price_hide_variations_add_to_cart_button', 'yes' ) ) {
					add_action( 'wp_head', array( $this, 'hide_disabled_variation_add_to_cart_button' ) );
				}
			}
		}
	}

	/**
	 * get_variation_prices_hash.
	 *
	 * @version 3.1.0
	 * @since   3.1.0
	 */
	function get_variation_prices_hash( $price_hash, $_product, $display ) {
		$price_hash['alg_call_for_price'] = array(
			get_option( 'alg_call_for_price_make_all_empty', 'no' ),
		);
		return $price_hash;
	}

	/**
	 * hide_variation_price_required_placeholder.
	 *
	 * @version 3.1.0
	 * @since   3.1.0
	 */
	function hide_variation_price_required_placeholder() {
		echo '<style>
			div.variable_pricing input.wc_input_price::-webkit-input-placeholder { /* WebKit browsers */
				color: transparent;
			}
			div.variable_pricing input.wc_input_price:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
				color: transparent;
			}
			div.variable_pricing input.wc_input_price::-moz-placeholder { /* Mozilla Firefox 19+ */
				color: transparent;
			}
			div.variable_pricing input.wc_input_price:-ms-input-placeholder { /* Internet Explorer 10+ */
				color: transparent;
			}
		</style>';
	}

	/**
	 * make_empty_price.
	 *
	 * @version 3.0.3
	 * @since   3.0.3
	 */
	function make_empty_price( $price, $_product ) {
		return '';
	}

	/**
	 * make_variation_visible_with_empty_price.
	 *
	 * @return  bool
	 * @version 3.0.0
	 * @since   3.0.0
	 */
	function make_variation_visible_with_empty_price( $visible, $_variation_id, $_id, $_product ) {
		if ( '' === $_product->get_price() ) {
			$visible = true;
			// Published == enabled checkbox
			if ( get_post_status( $_variation_id ) != 'publish' ) {
				$visible = false;
			}
		}
		return $visible;
	}

	/**
	 * hide_disabled_variation_add_to_cart_button.
	 *
	 * @version 3.0.0
	 * @since   3.0.0
	 */
	function hide_disabled_variation_add_to_cart_button() {
		echo '<style>div.woocommerce-variation-add-to-cart-disabled { display: none ! important; }</style>';
	}

	/**
	 * add_hooks.
	 *
	 * @version 3.1.0
	 */
	function add_hooks() {

		add_filter( 'woocommerce_empty_price_html',           array( $this, 'on_empty_price' ), PHP_INT_MAX, 2 );
		add_filter( 'woocommerce_variable_empty_price_html',  array( $this, 'on_empty_price' ), PHP_INT_MAX, 2 );
		add_filter( 'woocommerce_grouped_empty_price_html',   array( $this, 'on_empty_price' ), PHP_INT_MAX, 2 );
		add_filter( 'woocommerce_variation_empty_price_html', array( $this, 'on_empty_price' ), PHP_INT_MAX, 2 ); // Only in < WC3

		require_once( 'class-wc-call-for-price-compatibility.php' );
	}

	/**
	 * Hide "sales" icon for empty price products.
	 *
	 * @version 3.0.0
	 */
	function hide_sales_flash( $onsale_html, $post, $_product ) {
		if ( 'yes' === get_option( 'alg_wc_call_for_price_hide_sale_sign', 'yes' ) && '' === $_product->get_price() ) {
			return '';
		}
		return $onsale_html; // No changes
	}

	/**
	 * On empty price filter - return the label.
	 *
	 * @version 3.1.0
	 */
	function on_empty_price( $price, $_product ) {

		// Get product type and id
		$current_filter = current_filter();
		if ( version_compare( get_option( 'woocommerce_version', null ), '3.0.0', '<' ) ) {
			$_product_id = $_product->id;
			$product_type = 'simple'; // default
			switch ( $current_filter ) {
				case 'woocommerce_variable_empty_price_html':
				case 'woocommerce_variation_empty_price_html':
					$product_type = 'variable';
					break;
				case 'woocommerce_grouped_empty_price_html':
					$product_type = 'grouped';
					break;
				default: // 'woocommerce_empty_price_html'
					$product_type = ( $_product->is_type( 'external' ) ) ? 'external' : 'simple';
			}
		} else {
			$_product_id = ( $_product->is_type( 'variation' ) ) ? $_product->get_parent_id() : $_product->get_id();
			if ( $_product->is_type( 'variation' ) ) {
				$current_filter = 'woocommerce_variation_empty_price_html';
				$product_type = 'variable';
			} else {
				$product_type = $_product->get_type();
			}
		}

		// Check if enabled for current product type
		if ( 'yes' !== get_option( 'alg_wc_call_for_price_' . $product_type . '_enabled', 'yes' ) ) {
			return $price;
		}

		// Get view
		$view = 'single'; // default
		if ( 'woocommerce_variation_empty_price_html' === $current_filter ) {
			$view = 'variation';
		} elseif ( is_single( $_product_id ) ) {
			$view = 'single';
		} elseif ( is_single() ) {
			$view = 'related';
		} elseif ( is_front_page() ) {
			$view = 'home';
		} elseif ( is_page() ) {
			$view = 'page';
		} elseif ( is_archive() ) {
			$view = 'archive';
		}

		// Check if enabled for current view
		if ( 'yes' !== get_option( 'alg_wc_call_for_price_' . $product_type . '_' . $view . '_enabled', 'yes' ) ) {
			return $price;
		}

		// Apply the label
		$label = apply_filters( 'alg_call_for_price', '<strong>' . __( 'Call for Price', 'woocommerce-call-for-price' ) . '</strong>', 'value', $product_type, $view );
		return do_shortcode( $label );
	}
}

endif;

return new Alg_WC_Call_For_Price();
