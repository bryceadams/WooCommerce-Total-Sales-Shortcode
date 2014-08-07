<?php
/**
 * Plugin Name: WooCommerce Total Sales Shortcode
 * Plugin URI: http://captaintheme.com/
 * Description: Easily show off the total amount of sales your WC store has made, or a percent of those sales, in a shortcode.
 * Version: 1.0.0
 * Author: Captain Theme
 * Author URI: http://captaintheme.com/
 * License: GPL2
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Check if WooCommerce is active
 **/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
	// Brace Yourself
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wctss.php' );

	// Start the Engine
	add_action( 'plugins_loaded', array( 'WCTSS', 'get_instance' ) );

}