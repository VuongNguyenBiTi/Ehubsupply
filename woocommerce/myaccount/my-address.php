<?php

/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined('ABSPATH') || exit;

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __('Billing address', 'woocommerce'),
			'shipping' => __('Shipping address', 'woocommerce'),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __('Billing address', 'woocommerce'),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<p>
	<?php echo apply_filters('woocommerce_my_account_my_address_description', esc_html__('The following addresses will be used on the checkout page by default.', 'woocommerce')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
	?>
</p>

<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
	<div class="u-columns woocommerce-Addresses col2-set addresses">
	<?php endif; ?>
	<div class="row">
		<?php
		foreach ($get_addresses as $name => $address_title) :
		?>
			<?php
			$address = wc_get_account_formatted_address($name);
			?>
			<!-- <div class="u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 1 : 2; ?> woocommerce-Address"> -->
			<div class="col-lg-12">
				<!-- <header class="woocommerce-Address-title title">
					<h3><?php echo esc_html($address_title); ?></h3>
					<a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="edit"><?php echo $address ? esc_html__('Edit', 'woocommerce') : esc_html__('Add', 'woocommerce'); ?></a>
				</header> -->
				<address>
					<?php
					// echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
					$customer_id = get_current_user_id();
					$customer = new WC_Customer($customer_id);
					// Lấy thông tin địa chỉ giao hàng
					$billing_address = $customer->get_billing();

					// Lấy thông tin địa chỉ giao hàng
					$shipping_address = $customer->get_shipping();
					if (!empty($billing_address)) {
						// echo 'dia chi';
						// echo 'Name: ' . esc_html($billing_address['first_name'] . ' ' . $billing_address['last_name']) . '<br>';
						// echo 'Address: ' . esc_html($billing_address['address_1']) . '<br>';
						// echo 'Phone: ' . esc_html($billing_address['phone']) . '<br>';
						//Thêm các trường thông tin khác theo cùng cách
					?>
						<div class="address_wrap">
							<div class="dc_title">
								<h3><i class="fas fa-map-marker-smile"></i><?php echo esc_html($address_title); ?></h3>
								<a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="edit"><?php echo $address ? esc_html__('Edit', 'woocommerce') : esc_html__('Add', 'woocommerce'); ?></a>
							</div>
							<div class="dc_ten">
								<p>Họ và Tên :</p>
								<h6> <?php echo esc_html($billing_address['first_name'] . ' ' . $billing_address['last_name']);  ?></h6>
							</div>
							<div class="dc_ten">
								<p>Số điện thoại :</p>
								<h6> <?php echo esc_html($billing_address['phone']);   ?></h6>
							</div>
							<div class="dc_ten">
								<p>Địa chỉ :</p>
								<h6> <?php echo esc_html($billing_address['address_1']);  ?>, <?php echo esc_html($billing_address['city']); ?>
								</h6>
							</div>
						</div>
					<?php
					}
					?>
				</address>
			</div>
			<!-- </div> -->
			<!-- <?php endforeach; ?> -->
	</div>
	<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
	</div>
<?php
	endif;	?>
<style>
	.woocommerce {
		margin-top: 50px;
	}
	.woocommerce-MyAccount-content p {
    display: none;
  }
</style>
<script>
	var woocommerceElement = document.querySelector('.woocommerce');
	woocommerceElement.classList.add('container');
	document.addEventListener('DOMContentLoaded', function() {
		var icons = [
			'far fa-user',
			'fal fa-phone-volume',
			'fal fa-map-marker-alt',
		];
		var menuItems = document.querySelectorAll('.address_wrap .dc_ten');
		for (var i = 0; i < menuItems.length; i++) {
			var index = i % icons.length; 
			var iconElement = document.createElement('i');
			iconElement.className = icons[index];
			menuItems[i].insertBefore(iconElement, menuItems[i].firstChild);
		}
	});
</script>