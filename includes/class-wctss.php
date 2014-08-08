<?php
/**
 * WooCommerce Total Sales Shortcode Class
 *
 * @package   WooCommerce Total Sales Shortcode
 * @author    Captain Theme <info@captaintheme.com>
 * @license   GPL-2.0+
 * @link      http://captaintheme.com
 * @copyright 2014 Captain Theme
 * @since     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * WCBP Class
 *
 * @package  WooCommerce Total Sales Shortcode
 * @author   Captain Theme <info@captaintheme.com>
 * @since    1.0.0
 */

class WCTSS {

	const VERSION = '1.0.0';

	protected $plugin_slug = 'woocommerce-total-sales-shortcode';

	protected static $instance = null;

	private function __construct() {

		add_shortcode( 'wctss_total_sales', array( $this, 'wctss_total_sales_shortcode' ) );

	}

	/**
	 * Start the Class when called
	 *
	 * @package  WooCommerce Total Sales Shortcode
	 * @author  Captain Theme <info@captaintheme.com>
	 * @since   1.0.0
	 */

	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}


    /**
	 * Get Total Sales
	 *
	 * @package WooCommerce Total Sales Shortcode
	 * @author  Captain Theme <info@captaintheme.com>
	 * @since   1.0.0
	 */

	public function wctss_get_total_sales() {

	    global $wpdb;

	    $order_totals = apply_filters( 'woocommerce_reports_sales_overview_order_totals', $wpdb->get_row( "
	        SELECT SUM(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts

	        LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	        LEFT JOIN {$wpdb->term_relationships} AS rel ON posts.ID=rel.object_ID
	        LEFT JOIN {$wpdb->term_taxonomy} AS tax USING( term_taxonomy_id )
	        LEFT JOIN {$wpdb->terms} AS term USING( term_id )

	        WHERE   meta.meta_key       = '_order_total'
	        AND     posts.post_type     = 'shop_order'
	        AND     posts.post_status   = 'publish'
	        AND     tax.taxonomy        = 'shop_order_status'
	        AND     term.slug           IN ('" . implode( "','", apply_filters( 'woocommerce_reports_order_statuses', array( 'completed', 'processing', 'on-hold' ) ) ) . "')
	    " ) );

	    return $order_totals->total_sales;

	}

	/**
	 * Render Total Sales
	 *
	 * @package WooCommerce Total Sales Shortcode
	 * @author  Captain Theme <info@captaintheme.com>
	 * @since   1.0.0
	 */

	public function wctss_render_total_sales( $percent = '', $before = '$', $after = '' ) {

		$total_sales = $this->wctss_get_total_sales();

		$before_text = $before;
		$percent_amount = $percent / 100;
		$after_text = $after;

		if ( $percent_amount ) {

	    	$total_amount_pre = $total_sales * $percent_amount;

	    } else {

	    	$total_amount_pre = $total_sales;

	    }

	    $total_amount = number_format( $total_amount_pre, 2, '.', ',' );

	    return $before_text . $total_amount . $after_text;

	}

	/**
	 * Total Sales Shortcode
	 *
	 * @package WooCommerce Total Sales Shortcode
	 * @author  Captain Theme <info@captaintheme.com>
	 * @since   1.0.0
	 */

	public function wctss_total_sales_shortcode( $atts, $content = null ) {

		$a = shortcode_atts( array(
	 	      'percent' => '',
	 	      'before'	=> '$',
	 	      'after' 	=> '',
	      	), $atts );

      	return $this->wctss_render_total_sales( $a['percent'], $a['before'], $a['after'] );

	}

}