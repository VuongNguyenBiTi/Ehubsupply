<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_account_navigation');
?>






<nav class="woocommerce-MyAccount-navigation">

	<?php
	if (is_user_logged_in()) {
		// Lấy thông tin của người dùng hiện tại
		$current_user = wp_get_current_user();

		// Sử dụng hàm get_avatar để lấy ảnh đại diện
		$avatar_url = get_avatar($current_user->ID, 96); // Thay đổi kích thước ảnh tại đây (ở đây là 96)

		// Hiển thị ảnh đại diện
		$avatar_url;
		// Lấy tên của người dùng
		$user_name = $current_user->display_name;

		// Hiển thị tên người dùng
		$user_name;
	}
	?>
	<div class="avt_wrap">
		<div class="avt">
			<?php echo $avatar_url; ?>

		</div>
		<div class="avt_name">
			<p><?php echo $user_name; ?></p>
		</div>

	</div>
	<ul id="account-menu1">
		<?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
				<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>



</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>

<script>
	var icons = [
		'far fa-user',
		'fal fa-luggage-cart',
		'far fa-cloud-download-alt',
		'fal fa-map-marker-alt',
		'far fa-user-circle',
		'fal fa-sign-out'
	];

	var menuItems = document.querySelectorAll('#account-menu1 li');

	menuItems.forEach(function(item, index) {
		if (index < icons.length) {
			var iconElement = document.createElement('i');
			iconElement.className = icons[index];
			item.insertBefore(iconElement, item.firstChild);
		}
	});
</script>



