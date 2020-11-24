<?php
if ( ! function_exists( 'woocommerce_shop_loop_item_title' ) ) {
	/**
	 * Show the product title in the product loop. By default this is an H2.
	 * Overridden function `woocommerce_shop_loop_item_title`
	 */
	function woocommerce_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product__title">';
		woocommerce_template_loop_product_link_open();
		echo get_the_title();
		woocommerce_template_loop_product_link_close();
		echo '</h2>';
	}
}


?>