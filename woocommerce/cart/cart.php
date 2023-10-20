<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>
<div class="row cart_main1">
	<div class="col-lg-8">
		<h2 class="title-mycart">Giỏ hàng của bạn</h2>
		<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
			<?php do_action('woocommerce_before_cart_table'); ?>

			<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead>
					<tr class="tt_top">
						<th class="product-remove">&nbsp;</th>
						<th class="product-thumbnail">&nbsp;</th>
						<th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
						<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
						<th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
						<th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php do_action('woocommerce_before_cart_contents'); ?>

					<?php
					foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

						if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
							$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					?>
							<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

								<td class="product-remove">
									<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fal fa-trash"></i></a>',
											esc_url(wc_get_cart_remove_url($cart_item_key)),
											esc_html__('Remove this item', 'woocommerce'),
											esc_attr($product_id),
											esc_attr($_product->get_sku())
										),
										$cart_item_key
									);
									?>
								</td>

								<td class="product-thumbnail">
									<?php
									$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

									if (!$product_permalink) {
										echo $thumbnail; // PHPCS: XSS ok.
									} else {
										printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
									}
									?>
								</td>

								<td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
									<?php
									if (!$product_permalink) {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
									} else {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
									}

									do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

									// Meta data.
									echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

									// Backorder notification.
									if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
									}
									?>
								</td>

								<td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>

								<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
									<?php
									if ($_product->is_sold_individually()) {
										$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
									} else {
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $_product->get_max_purchase_quantity(),
												'min_value'    => '0',
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);
									}

									echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
									?>
								</td>

								<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>
							</tr>
					<?php
						}
					}
					?>

					<?php do_action('woocommerce_cart_contents'); ?>

					<tr>
						<td colspan="6" class="actions">

							<?php if (wc_coupons_enabled()) { ?>
								<div class="coupon">
									<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
									<?php do_action('woocommerce_cart_coupon'); ?>
								</div>
							<?php } ?>

							<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

							<?php do_action('woocommerce_cart_actions'); ?>

							<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
						</td>
					</tr>

					<?php do_action('woocommerce_after_cart_contents'); ?>
				</tbody>
			</table>
			<?php do_action('woocommerce_after_cart_table'); ?>
		</form>
	</div>
	<div class="col-lg-4">
		<div class="cart-collaterals">
			<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action('woocommerce_cart_collaterals');
			?>
		</div>
	</div>
</div>



<?php do_action('woocommerce_before_cart_collaterals'); ?>



<?php do_action('woocommerce_after_cart'); ?>

<style>
	.woocommerce .cart-collaterals .cart_totals,
	.woocommerce-page .cart-collaterals .cart_totals {
		float: none;
		width: 100%;
	}

	.cart_main1 {
		margin-top: 50px;
	}

	.title-mycart {
		border: 1px solid rgba(0, 0, 0, .1);
		border-radius: 8px 8px 0 0;
		border-bottom: 0;
		text-align: center;
		background: #f7f6f7;
		font-size: 21px;
		text-transform: uppercase;
		padding: 10px 0;
		margin: 0;
		color: black !important;

	}

	.tt_top {
		background: #f7f6f7;
	}

	.meta-data {
		display: none;
	}

	.woocommerce-cart table.cart img {
		width: 150px;
	}

	.quantity input.qty_button {
		width: 30px;
		height: 30px;
		background: #f4f2f5;
		content: "";
		font-size: 20px;
		color: black;
		text-align: center;
		line-height: 20px;
		cursor: pointer;
		border: none;
	}

	.woocommerce .quantity .qty {
		height: 30px;
		font-size: 18px;
		color: black;
		font-weight: 400;
	}

	.cart_totals h2 {
		border-radius: 8px 8px 0 0;
		border: 1px solid rgba(0, 0, 0, .1);
		margin-bottom: 0;
		text-align: center;
		color: black;
		font-size: 25px;
		padding-top: 5px;
		padding-bottom: 11px;
	}
	.cart_totals .wc-proceed-to-checkout a{
		background-color:#F92296 !important;
	}
	.woocommerce a.remove{
		transform: scale(0.8);
		width: 40px;
		height: 40px;
		padding-top: 8px;
	}
	.woocommerce a.remove:hover{
		background-color: red; /* Đặt màu nền về giá trị mặc định */
    color: #fff; 
	}
	.woocommerce form.woocommerce-cart-form table tbody tr.cart_item td.product-thumbnail a img{
		width: 150px !important;
	}
</style>
<!-- <style>
	@media screen and (max-width: 900px) {

		/* CSS rules for screens with a width of 768 pixels or less */
		.product-name {
			text-align: start;

		}

		.additional-info-wrapper {
			display: flex;
			justify-content: space-around;
		}

		.woocommerce-Price-amount {
			margin-left: 10px;
		}

		/* fix order menu */
		.mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 {
			display: flex;
		}

		.mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-thumbnail1::before {
			display: none;
		}

		.mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-remove1::before {
			display: none;
		}

		.mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-quantity1 {
			margin: 0;
		}
	}

	@media screen and (max-width: 500px) {
		.additional-info-wrapper {
			display: flex;
			justify-content: space-evenly;
		}

		.mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-remove1 {
			display: none;
		}
	}
</style> -->