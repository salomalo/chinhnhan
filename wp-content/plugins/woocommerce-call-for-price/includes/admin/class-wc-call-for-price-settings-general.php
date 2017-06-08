<?php
/**
 * WooCommerce Call for Price - General Section Settings
 *
 * @version 3.1.0
 * @since   2.0.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_Call_For_Price_Settings_General' ) ) :

class Alg_WC_Call_For_Price_Settings_General {

	/**
	 * Constructor.
	 *
	 * @version 3.0.0
	 */
	function __construct() {

		$this->id   = '';
		$this->desc = __( 'General', 'woocommerce-call-for-price' );

		add_filter( 'woocommerce_get_sections_alg_call_for_price',              array( $this, 'settings_section' ) );
		add_filter( 'woocommerce_get_settings_alg_call_for_price_' . $this->id, array( $this, 'get_settings' ), PHP_INT_MAX );
	}

	/**
	 * settings_section.
	 */
	function settings_section( $sections ) {
		$sections[ $this->id ] = $this->desc;
		return $sections;
	}

	/**
	 * get_settings.
	 *
	 * @version 3.1.0
	 */
	function get_settings() {
		$settings = array(
			array(
				'title'     => __( 'Call for Price Options', 'woocommerce-call-for-price' ),
				'type'      => 'title',
				'id'        => 'alg_wc_call_for_price_options',
			),
			array(
				'title'     => __( 'WooCommerce Call for Price', 'woocommerce-call-for-price' ),
				'desc'      => '<strong>' . __( 'Enable', 'woocommerce-call-for-price' ) . '</strong>',
				'desc_tip'  => __( 'Create any custom price label for all WooCommerce products with empty price.', 'woocommerce-call-for-price' ),
				'id'        => 'alg_wc_call_for_price_enabled',
				'default'   => 'yes',
				'type'      => 'checkbox',
			),
			array(
				'title'     => __( 'Hide Sale Tag for Products with Empty Prices', 'woocommerce-call-for-price' ),
				'desc'      => __( 'Hide', 'woocommerce-call-for-price' ),
				'id'        => 'alg_wc_call_for_price_hide_sale_sign',
				'default'   => 'yes',
				'type'      => 'checkbox',
			),
			array(
				'title'     => __( 'Hide Disabled Add to Cart Button for Variations with Empty Prices', 'woocommerce-call-for-price' ),
				'desc'      => __( 'Hide', 'woocommerce-call-for-price' ),
				'id'        => 'alg_wc_call_for_price_hide_variations_add_to_cart_button',
				'default'   => 'yes',
				'type'      => 'checkbox',
			),
			array(
				'title'     => __( 'Make All Products "Call for Price"', 'woocommerce-call-for-price' ),
				'desc'      => __( 'Enable', 'woocommerce-call-for-price' ),
				'id'        => 'alg_call_for_price_make_all_empty',
				'default'   => 'no',
				'type'      => 'checkbox',
			),
			array(
				'type'      => 'sectionend',
				'id'        => 'alg_wc_call_for_price_options',
			),
		);
		return $settings;
	}

}

endif;

return new Alg_WC_Call_For_Price_Settings_General();
