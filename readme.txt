=== Plugin Name ===
Contributors: bryceadams
Donate link: http://bryceadams.com
Tags: woocommerce, total sales, sales, sales shortcode, total sales shortcode, percent of sales, show total sales, show sales
Requires at least: 4.0.0
Tested up to: 4.3.0
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show off your site's total sales, orders or a percent of its sales with a simple shortcode!

== Description ==

You may want to show off your site's total sales, orders or a percent of its total sales on the front-end of your site. This plugin adds a new shortcode `[wctss_total_sales]`, that will do just that!

**Example Use:**

* Show off your site's total sales or orders
* You donate a percent of your site's sales to charity - easily display the dynamic amount that has been donated
* You want to brag to your customers how much money you're making
* You want to show your customers that you're not selling anything and as such, need their money more than ever
* You tell me!

**Using the Shortcode:**

The Shortcode: `[wctss_total_sales]`

The shortcode has three optional attributes:

* `percent` - integer: eg. **10**, would display 10% of your total sales
* `before` - string, **$** by default: eg. **฿**, would display ฿35,000 (if your total sales were 35,000)
* `after` - string: eg. **Total Sales**, you may want to add an empty space before so there's a gap between the amount and this text

**So for example:**

`[wctss_total_sales percent="50" before="€" after=" Donated to My Comic Book Collection!”]`

**Would display:**

`€5,250.42 Donated to My Comic Book Collection!`

Awesome! Right? I hope so...

Since 1.1.0 there's a ***new shortcode***! `[wctss_total_orders]`

== Installation ==

I'll make this as simple as possible.

1. Either download the plugin and upload it or search for it under **Plugins > Add New**. Activate it, too.
2. Use the `[wctss_total_sales]` shortcode.
5. Be awesome!

== Frequently Asked Questions ==

= It's all going to hell and I need help! =

Please calm down and start a support thread. Also, read the documentation / plugin information again - it's pretty simple.

= It's just showing $0.00! =

Make sure you're running the latest version of WooCommerce, or at least WC 2.5.0. Also make sure you have some orders that are either marked 'completed', 'processing' and/or 'on-hold'.

= Can you add this xx amazing feature? It'll get you so many more downloads! =

Open up a support thread with your brilliant idea and we'll try to make it possible.

= What about foo bar? =

Not helping you out this time either.

== Screenshots ==

1. People seem to like screenshots so here's a screenshot of me typing it in to the text editor.

== Changelog ==

= 1.1.0 =
* WooCommerce 2.5 compatibility
* Added [wctss_total_orders] shortcode

= 1.0.0 =
* The day it all began.

== Upgrade Notice ==