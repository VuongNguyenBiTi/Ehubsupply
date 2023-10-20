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
								<h6> <?php echo esc_html($billing_address['address_1']);  ?></h6>
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

	.address_wrap {
		padding: 12px 24px;
		gap: 8px;
		border-radius: 8px;
		background: var(--color-gray-gray-11-main-white, #fff);
		box-shadow: 0px 12px 24px 0px rgba(0, 0, 0, 0.12);
	}

	.dc_title {
		display: flex;
		justify-content: space-between;
		border-radius: 4px;
		background: linear-gradient(90deg, #FEE4F2 0%, #FFF1F9 100%);
		margin-bottom: 10px;
	}

	.dc_title h3 {
		color: var(--pink-pink-4-main, #F92296);
		font-size: 16px;
		font-style: normal;
		font-weight: 700;
		line-height: 24px;
		padding-left: 5px;
		padding-top: 10px;
	}

	.dc_title h3 i {
		padding-right: 10px;
	}

	.dc_title a {
		padding: 10px;
		color: var(--Blue-Main, #2563EB);

	}

	.dc_ten {
		display: flex;
	}

	.dc_ten p {
		margin-right: 10px;
		max-width: 150px;
		width: 100%;
		color: var(--gray-gray-7-opacity, #9CA3AF);
		font-size: 16px;
		font-style: normal;
		font-weight: 400;
		line-height: 24px;
	}

	.dc_ten h6 {
		color: var(--gray-gray-3-main, #1F2937);
		font-size: 16px;
		font-style: normal;
		font-weight: 400;
		line-height: 24px;

	}

	/* sidebar */
	.woocommerce-MyAccount-navigation {
		border-radius: 8px;
		background: var(--gray-gray-11-main, #FFF);
		display: flex;
		padding: 8px;
		flex-direction: column;
		align-items: flex-start;
		gap: 8px;
		align-self: stretch;
		background: var(--color-gray-gray-11-main-white, #fff);
		box-shadow: 0px 12px 24px 0px rgba(0, 0, 0, 0.12);
	}

	.woocommerce-MyAccount-navigation ul {
		list-style: none;
		width: 100%;
		padding: 0px;
	}

	.woocommerce-MyAccount-navigation ul li {
		padding-top: 5px;
		padding-bottom: 5px;
		font-size: 16px;
		padding-left: 20px;
	}

	.is-active {
		border-radius: 8px;
		background: var(--pink-pink-4-main, #F92296);
		color: #fff;
	}

	.is-active a {
		font-size: 18px;
		color: #fff;
	}
</style>
<script>
	// Lấy phần tử có lớp CSS "woocommerce"
	var woocommerceElement = document.querySelector('.woocommerce');
	// Thêm lớp "container" cho phần tử "woocommerce"
	woocommerceElement.classList.add('container');
</script>