<?php

/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined('ABSPATH') || exit;

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if (!$order) {
	return;
}

$order_items           = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note    = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ($show_downloads) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<?php
$order = wc_get_order($order_id);

if ($order) {
	$order_status = $order->get_status();
	$status_to_number = array(
		'pending' => 1,
		'processing' => 2,
		'on-hold' => 2,
		'completed' => 3,
		'cancelled' => 4,
		'refunded' => 3,
		'failed' => 2,
	);

	if (isset($status_to_number[$order_status])) {
		$status_number = $status_to_number[$order_status];
	} else {
	}
}
?>
<div class="detail_wrap">
	<div class="container ">
		<ul class="nav nav-tabs custom-tabs">
			<li class="nav-item">
				<a class="nav-link active custom-tab-link" id="1-tab" data-toggle="tab">
					<i class="fas fa-hand-holding-usd custom-tab-icon"></i> Chờ thanh toán
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($status_number >= 2) {
										echo "active";
									} ?> custom-tab-link" id="2-tab" data-toggle="tab">
					<i class="fa fa-clock custom-tab-icon"></i> Đang xử lý đơn hàng
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  <?php if ($status_number >= 3) {
										echo "active";
									} ?> custom-tab-link" id="3-tab" data-toggle="tab">
					<i class="fa fa-truck custom-tab-icon"></i> Đã giao tới khách
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($status_number >= 4) {
										echo "active";
									} ?> custom-tab-link" id="4-tab" data-toggle="tab">
					<i class="fa fa-check-circle custom-tab-icon"></i> Đã hủy
				</a>
			</li>
		</ul>
		
		<div class="custom-tabs-progress"></div>
	</div>

	<section class="woocommerce-order-details">
		<?php do_action('woocommerce_order_details_before_order_table', $order); ?>
		<h3 class="woocommerce-order-details__title"><?php esc_html_e('Order details', 'woocommerce'); ?></h3>

		<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

			<thead>
				<tr>
					<th class="woocommerce-table__product-name product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
					<th class="woocommerce-table__product-table product-total"><?php esc_html_e('Total', 'woocommerce'); ?></th>
				</tr>
			</thead>

			<tbody>
				<?php
				do_action('woocommerce_order_details_before_order_table_items', $order);

				foreach ($order_items as $item_id => $item) {
					$product = $item->get_product();

					wc_get_template(
						'order/order-details-item.php',
						array(
							'order'              => $order,
							'item_id'            => $item_id,
							'item'               => $item,
							'show_purchase_note' => $show_purchase_note,
							'purchase_note'      => $product ? $product->get_purchase_note() : '',
							'product'            => $product,
						)
					);
				}

				do_action('woocommerce_order_details_after_order_table_items', $order);
				?>
			</tbody>

			<tfoot>
				<?php
				foreach ($order->get_order_item_totals() as $key => $total) {
				?>
					<tr>
						<th scope="row"><?php echo esc_html($total['label']); ?></th>
						<td><?php echo ('payment_method' === $key) ? esc_html($total['value']) : wp_kses_post($total['value']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></td>
					</tr>
				<?php
				}
				?>
				<?php if ($order->get_customer_note()) : ?>
					<tr>
						<th><?php esc_html_e('Note:', 'woocommerce'); ?></th>
						<td><?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?></td>
					</tr>
				<?php endif; ?>
			</tfoot>
		</table>

		<?php do_action('woocommerce_order_details_after_order_table', $order); ?>
	</section>
</div>


<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

if ($show_customer_details) {
	wc_get_template('order/order-details-customer.php', array('order' => $order));
}
?>

<style>
	.custom-tab-link:before {
		content: "";
		position: absolute;
		top: 37%;
		left: -70px !important;
		width: 225%;
		height: 3px;
		background-color: #ddd;
		z-index: -1;
	}

	.nav-item a:hover {
		color: #725057;
	}

	.woocommerce-order-details h3 {
		color: #000;
	}
</style>