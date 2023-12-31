<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order">

	<?php
	if ($order) :

		do_action('woocommerce_before_thankyou', $order->get_id());
	?>

		<?php if ($order->has_status('failed')) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																											?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e('Order number:', 'woocommerce'); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e('Date:', 'woocommerce'); ?>
					<strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e('Email:', 'woocommerce'); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e('Total:', 'woocommerce'); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<?php if ($order->get_payment_method_title()) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e('Payment method:', 'woocommerce'); ?>
						<strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
		<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																										?></p>

	<?php endif; ?>

</div>

<a href="<?php echo get_home_url(); ?>/cua-hang/" class="d-flex justify-content-center">
	<button class="button1 pulse">
		Tiếp tục mua hàng <i class="fal fa-kiss-wink-heart"></i>
	</button>
</a>

<style>
	.woocommerce div.woocommerce-order p.woocommerce-thankyou-order-received {
		margin-top: 30px;
		text-align: center;
		font-size: 25px;
		text-transform: uppercase;
		margin-bottom: 30px;
		background: #aee59a82;
		padding: 5px;
		border-radius: 12px;
	}

	@media (max-width: 500px) {
		.woocommerce div.woocommerce-order p.woocommerce-thankyou-order-received {
			font-size: 19px;
		}
	}

	.woocommerce-order-details__title {
		font-weight: 600;
		color: #c1272d;
	}

	.woocommerce-table__line-item a {
		color: #c1272d;
	}

	.woocommerce-customer-details {
		display: none;
	}

	.meta-data {
		display: none !important;
	}

	.button1 {
		display: block;
		text-align: center;
		font-weight: 600;
		text-decoration: none;
		background-color: #fff;
		padding: 10px 34px;
		color: #F92296;
		border: 1px solid #F92296;
		border-radius: 60px;
		font-size: 16px;
		box-shadow: 0 1vw 2vw 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .19);
		margin-bottom: 50px;
	}

	.pulse {
		animation-name: pulse_animation;
		animation-duration: 4000ms;
		transform-origin: 70% 70%;
		animation-iteration-count: infinite;
		animation-timing-function: linear;
	}

	.custom-tabs {
		display: none;
	}

	.woocommerce-order p {
		display: none;
	}

	.woocommerce div.woocommerce-order p.woocommerce-thankyou-order-received {
		display: block;
	}

	.woocommerce ul.order_details {
		display: flex;
		justify-content: center;
	}

	.detail_wrap {
		box-shadow: none;
	}

	@media (max-width: 500px) {
		.woocommerce ul.order_details {
			flex-direction: column;
			border-right: none;
			margin: 10px;
		}

		.woocommerce ul.order_details li {
			border-right: none;
		}

		.detail_wrap {
			padding: 0px;
		}
	}

	.woocommerce ul.order_details {
		display: flex;
		justify-content: start;
		/* margin: 0; */
		padding: 0;
	}

	.wc-bacs-bank-details-heading {
		color: #000;
	}

	.wc-bacs-bank-details-account-name {
		color: #000;
	}
</style>