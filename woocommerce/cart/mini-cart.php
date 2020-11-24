<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<script>
	fghsd(<?php echo wp_kses_data(WC()->cart->get_cart_contents_count());?>);
</script>


<h5 class="uk-heading-bullet zdy-sda-title">Your cart 
	<span>(<?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?>)</span>
	<a class="uk-align-right" href="<?php echo home_url();?>/index.php/cart/">View cart</a>
</h5>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart dsdssd cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?> uk-nav uk-nav-default uk-width-medium" uk-sortable="handle: .uk-card" uk-grid>
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?> uk-inline uk-margin uk-width-1-1">
					<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button uk-position-center-right uk-overlay uk-overlay-default" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" uk-icon="icon: trash"></a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_attr__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
					<div class="uk-text-center" uk-grid>
					<?php if ( empty( $product_permalink ) ) : ?>
						<div class="uk-width-1-3 gfd_img">
							<?php echo $thumbnail;?>
						</div>
						<div class="uk-width-2-3 gfd_tit uk-text-left">
							<a href="<?php echo esc_url( $product_permalink ); ?>" class="uk-text-small uk-text-left dsd_tit">
								<?php echo $product_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<h6 class="uk-text-center fgd_price"><span><?php echo $product_price;?></span>(<span>
							<?php
								$price = $product_price;
								$pattern = '/(\d+\.?\d+)/';
								$jg = '';
								if(preg_match_all($pattern,$price,$match)){
									$jg = $match[0][1];
								}
								$jh = floatval($jg)*intval($cart_item['quantity']);
								$xj = strval($jh);
								$okpo = str_replace($jg,$xj,$price);
								echo $okpo;
							?>
							</span>)</h6>

							<div class="quantity dedsjw uk-text-center">
								<span id='butt_minus' class="uk-margin-small-right uk-icon" uk-icon="minus"></span>
								<input id="ipu_num" class="uk-input uk-form-width-xsmall" type="text" placeholder="X-Small" post_type="<?php echo $_product->{'post_type'};?>" data_product_id="<?php echo $cart_item['product_id'];?>" data_variation_id="<?php echo $cart_item['variation_id'];?>" value='<?php echo $cart_item['quantity'];?>'>
								<span id='butt_plus' class="uk-margin-small-right uk-icon" uk-icon="plus"></span>
							</div>

						</div>
					<?php else : ?>
						<div class="uk-width-1-3 gfd_img">
							<?php echo $thumbnail;?>
						</div>
						<div class="uk-width-2-3 gfd_tit uk-text-left">
							<a href="<?php echo esc_url( $product_permalink ); ?>" class="uk-text-small uk-text-left dsd_tit">
								<?php echo $product_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<h6 class="uk-text-center fgd_price"><span><?php echo $product_price;?></span>(<span>
							<?php
								$price = $product_price;
								$pattern = '/(\d+\.?\d+)/';
								$jg = '';
								if(preg_match_all($pattern,$price,$match)){
									$jg = $match[0][1];
								}
								$jh = floatval($jg)*intval($cart_item['quantity']);
								$xj = strval($jh);
								$okpo = str_replace($jg,$xj,$price);
								echo $okpo;
							?>
							</span>)</h6>

							<div class="quantity dedsjw uk-text-center">
								<span id='butt_minus' class="uk-margin-small-right uk-icon" uk-icon="minus"></span>
								<input id="ipu_num" class="uk-input uk-form-width-xsmall" type="text" placeholder="X-Small" post_type="<?php echo $_product->{'post_type'};?>" data_product_id="<?php echo $cart_item['product_id'];?>" data_variation_id="<?php echo $cart_item['variation_id'];?>" value='<?php echo $cart_item['quantity'];?>'>
								<span id='butt_plus' class="uk-margin-small-right uk-icon" uk-icon="plus"></span>
							</div>

						</div>
					<?php endif; ?>
					
					</div>
				</li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>

	<p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>

