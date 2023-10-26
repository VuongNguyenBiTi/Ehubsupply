<?php

/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined('ABSPATH') || exit;

$show_shipping = !wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">
	<?php if ($show_shipping) : ?>
		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col-set addresses">
			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-12">
			<?php endif; ?>

			<!-- <h2 class="woocommerce-column__title"><?php esc_html_e('Billing address', 'woocommerce'); ?></h2> -->
			<h3>Thông tin nhận hàng</h3>

			<?php
			$billing_first_name = $order->get_billing_first_name();
			$billing_address_1 = $order->get_billing_address_1();
			$billing_city = $order->get_billing_city();
			$billing_country = $order->get_billing_country();

			$billing_phone = $order->get_billing_phone();
			$billing_email = $order->get_billing_email();

			?>
			<div class="info">
				<div class="row">
					<p class="col-lg-3 col-md-4 info_name"> Tên người đặt : </p> <span class="col-lg-9  col-md-8  info_content"> <?php echo $billing_first_name; ?> </span>
				</div>
				<div class="row">
					<p class="col-lg-3  col-md-4  info_name"> Địa chỉ giao hàng :</p> <span class="col-lg-9  col-md-8  info_content"> <?php echo $billing_address_1; ?> </span>
				</div>
				<div class="row ">
					<p class="col-lg-3  col-md-4 info_name"> Tỉnh/ Thành phố :</p> <span class="col-lg-9  col-md-8  info_content"> <?php echo $billing_city; ?> </span>
				</div>
				<div class="row">
					<p class="col-lg-3  col-md-4 info_name"> Số điện thoại :</p> <span class="col-lg-9  col-md-8  info_content"> <?php echo $billing_phone; ?> </span>
				</div>
				<div class="row">
					<p class="col-lg-3  col-md-4 info_name">Email :</p> <span class="col-lg-9  col-md-8 info_content"> <?php echo $billing_email; ?> </span>
				</div>

			</div>
			<?php if ($show_shipping) : ?>
			</div>
		</section>
	<?php endif; ?>

	<?php do_action('woocommerce_order_details_after_customer_details', $order); ?>
</section>
<style>
	.info_item {
		display: flex;
	}

	.info_item p {
		margin-right: 20px;
	}

	.addresses h3 {
		color: #000;
	}

	@media (max-width: 500px) {
		.info_name {
			margin-bottom: 0;
			
		}
		.info_content{
			margin-bottom: 10px !important;
		}
	}
</style>