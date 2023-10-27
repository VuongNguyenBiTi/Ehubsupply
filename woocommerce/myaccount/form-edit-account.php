<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<!-- edit avt -->

<div class="dashboard_wrap">
	<main id="site-content">
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
								echo '<img id="blah" src="' . $custom_avatar . '" class="custom_avatar" />';
							} else {
								echo '<img id="blah" src="' . get_avatar_url($user->ID) . '" class="custom_avatar" />';
							}
							?>
						</p>
					</div>
					<div class="change_right">
						<p>
							<input type="file" id="upload_avatar" accept="image/*" required>
						</p>
						<p>
							<button type="submit">Xác nhận</button>
						</p>
					</div>


				</form>

			<?php } ?>

		</div>
	</main>
	<!-- edit name -->
	<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>
		<?php do_action('woocommerce_edit_account_form_start'); ?>
		<div class="user_top">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
						<label for="account_first_name"><?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr($user->first_name); ?>" />
					</p>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
						<label for="account_last_name"><?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>" />
					</p>
				</div>
			</div>
		</div>
		<div class="user_bottom">
			<div class="row">
				<div class="col-lg-6">
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="account_display_name"><?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr($user->display_name); ?>" />
					</p>
				</div>

				<div class="col-lg-6">
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="account_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>" />
					</p>
				</div>
			</div>
		</div>
		<legend id="password-legend" style="cursor: pointer;"><?php esc_html_e('Password change', 'woocommerce'); ?></legend>
		<fieldset id="password-fieldset">
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_current"><?php esc_html_e('Current password (leave blank to leave unchanged)', 'woocommerce'); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_1"><?php esc_html_e('New password (leave blank to leave unchanged)', 'woocommerce'); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_2"><?php esc_html_e('Confirm new password', 'woocommerce'); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</p>
		</fieldset>
		<div class="clear"></div>
		<?php do_action('woocommerce_edit_account_form'); ?>
		<p>
			<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
			<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</p>
		<?php do_action('woocommerce_edit_account_form_end'); ?>
	</form>
</div>
<?php do_action('woocommerce_after_edit_account_form'); ?>
<script>
	document.getElementById("password-legend").addEventListener("click", function() {
		var fieldset = document.getElementById("password-fieldset");
		if (fieldset.style.display === "none") {
			fieldset.style.display = "block";
		} else {
			fieldset.style.display = "none";
		}
	});
	upload_avatar.onchange = evt => {
		const [file] = upload_avatar.files
		if (file) {
			blah.src = URL.createObjectURL(file)
		}
	};
</script>
<style>
	.woocommerce {
		margin-top: 20px;
	}
</style>


