=== Call for Price for WooCommerce ===
Contributors: algoritmika,anbinder
Donate link: https://www.paypal.me/anbinder
Tags: woocommerce,call for price
Requires at least: 3.8
Tested up to: 4.7
Stable tag: 3.1.0
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Plugin extends WooCommerce by outputting "Call for Price" when price field for product is left empty.

== Description ==

Call for Price for WooCommerce plugin extends WooCommerce by outputting "Call for Price" when price field for product is left empty.

Supports all product types:

* Simple and Custom products.
* Variable (and variation) products.
* Grouped products.
* External products.

Supported views:

* Single product page.
* Related products.
* Homepage.
* Pages (e.g. shortcodes).
* Archives (products category).

= Feedback =
* We are open to your suggestions and feedback. Thank you for using or trying out one of our plugins!
* Drop us a line at [www.algoritmika.com](http://www.algoritmika.com).

= More =
* Visit the [Call for Price for WooCommerce plugin page](https://wpcodefactory.com/item/woocommerce-call-for-price-plugin/).

== Installation ==

1. Upload the entire 'woocommerce-call-for-price' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. All empty prices will be automatically replaced with "Call for Price".

== Frequently Asked Questions ==

= Can I set where "Call for Price" text should be shown? =

Yes, in "WooCommerce > Settings > Call for Price" you can set if you want text to be shown on single product page, products archive page, related products and/or home page.

== Screenshots ==

1. Empty price replaced by "Call for Price".

== Changelog ==

= 3.1.0 - 26/04/2017 =
* Dev - WooCommerce v3.x.x compatibility - `woocommerce_product_get_price`, `woocommerce_product_variation_get_price`, `woocommerce_variation_empty_price_html`, `_product_id`.
* Dev - `woocommerce_get_variation_prices_hash` added.
* Dev - Admin - "Reset Section Settings" option added.
* Dev - Admin - Variations "price required" placeholder hidden.
* Dev - Admin - `alg_wc_call_for_price_textarea`.
* Tweak - Code refactoring.
* Tweak - `coder.fm` link changed to `wpcodefactory.com`.

= 3.0.3 - 21/12/2016 =
* Dev - General - Make All Products "Call for Price" - option added.

= 3.0.2 - 15/12/2016 =
* Fix - `handle_deprecated_options()` fixed. This produced notice on plugin activation.

= 3.0.1 - 14/12/2016 =
* Tweak - readme.txt updated.

= 3.0.0 - 08/12/2016 =
* Dev - Variable (and variation) and grouped products support added.
* Dev - `is_page` check added.
* Dev - Multisite support added.
* Dev - Translation (POT) file added.
* Dev - Version system added.
* Dev - Major code refactoring.
* Tweak - Author added.
* Tweak - Plugin renamed.

= 2.0.1 - 08/08/2015 =
* Dev - Solaris theme compatibility added.

= 2.0.0 - 28/07/2015 =
* Dev - Option to *hide/show sale tag* added.
* Dev - Option to set specific "call for price" text for *related products* added.
* Dev - Options to set specific "call for price" text for *single, category and homepage* added (instead of checkboxed).
* Dev - Major code refactoring. Settings are moved to "WooCommerce > Settings > Call for Price".

= 1.0.1 =
* Sale icon removed.

= 1.0.0 =
* Initial Release.

== Upgrade Notice ==

= 1.0.0 =
This is the first release of the plugin.
