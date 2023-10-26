<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>
<div class="dashboard_wrap">
	<p>
		<?php
		printf(
			/* translators: 1: user display name 2: logout url */
			wp_kses(__('Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce'), $allowed_html),
			'<strong>' . esc_html($current_user->display_name) . '</strong>',
			esc_url(wc_logout_url())
		);
		?>
	</p>

	<p>
		<?php
		/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
		$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
		if (wc_shipping_enabled()) {
			/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
			$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
		}
		printf(
			wp_kses($dashboard_desc, $allowed_html),
			esc_url(wc_get_endpoint_url('orders')),
			esc_url(wc_get_endpoint_url('edit-address')),
			esc_url(wc_get_endpoint_url('edit-account'))
		);
		?>
	</p>

	<!-- <main id="site-content">
		<div class="section-inner">

			<?php
			if (!is_user_logged_in()) {

				echo 'Bạn chưa đăng nhập. Vui lòng <a href="/dang-nhap">đăng nhập</a>.';
			} else {

				$current_user = wp_get_current_user();

			?>
				<h4 class="tt_avt">Thay đổi ảnh đại diện</h4>
				<hr>
				<form id="hk-change-avatar" class="change_wrap">
					<?php wp_nonce_field('form_change_avatar'); ?>
					<div class="change_left">
						<p id="hk-success" style="display:none">Cập nhập thành công</p>
						<p class="img_change">
							<?php
							$user = wp_get_current_user();
							$custom_avatar = get_user_meta($user->ID, 'custom_avatar', true);
							if ($custom_avatar) {
								echo '<img src="' . $custom_avatar . '" class="custom_avatar" />';
							} else {
								echo '<img src="' . get_avatar_url($user->ID) . '" class="custom_avatar" />';
							}
							?>
						</p>
					</div>
					<div class="change_right">
						<p >
							<input type="file" id="upload_avatar" accept="image/*" required>
						</p>
						<p>
							<button type="submit">Xác nhận</button>
						</p>
					</div>


				</form>

			<?php } ?>

		</div>
	</main> -->

</div>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>
<script>
	// Lấy phần tử có lớp CSS "woocommerce"
	var woocommerceElement = document.querySelector('.woocommerce');

	// Thêm lớp "container" cho phần tử "woocommerce"
	woocommerceElement.classList.add('container');
</script>
<style>
	.woocommerce {
		margin-top: 20px;
	}
</style>