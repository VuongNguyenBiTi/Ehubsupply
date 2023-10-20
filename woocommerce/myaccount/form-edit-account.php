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

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>
	<?php do_action('woocommerce_edit_account_form_start'); ?>
	<div class="user_top">
		<div class="row">
			<div class="col-lg-6">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_first_name"><?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr($user->first_name); ?>" />
				</p>
			</div>
			<div class="col-lg-6">
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
</script>
<style>
	.woocommerce-EditAccountForm {
		border-radius: 8px;
		background: #FFF;
		display: flex;
		padding: 20px;
		flex-direction: column;
		align-items: flex-start;
		gap: 8px;
		align-self: stretch;
		box-shadow: 0px 12px 24px 0px rgba(0, 0, 0, 0.12);
		transition: all 1s linear;
		margin-bottom: 50px;
	}

	.user_top {
		width: 100%;
	}

	.woocommerce form .form-row {
		padding: 3px;
		margin: 0 0 6px;
		width: 100%;
	}

	.user_bottom {
		width: 100%;
	}


	.user_top {
		padding: 20px;
		border: 1px solid #ddd;
		margin-bottom: 20px;
	}

	.user_top .row {
		display: flex;
		justify-content: space-between;
	}

	.user_top .col-lg-6 {
		width: 48%;
	}

	.user_bottom {
		padding: 20px;
		border: 1px solid #ddd;
	}

	.user_bottom .row {
		display: flex;
		justify-content: space-between;
	}

	.user_bottom .col-lg-6 {
		width: 48%;
	}

	.woocommerce-Input {
		width: 100%;
		padding: 10px;
		margin: 5px 0;
		border: 1px solid #ccc;
		border-radius: 5px;
		font-size: 16px;
	}

	.woocommerce-form-row label {
		font-weight: bold;
	}

	.woocommerce-Input:focus {
		border-color: #f92296;
		box-shadow: 0 0 5px #f92296;
		transition: border-color 0.3s, box-shadow 0.3s;

	}

	fieldset {
		display: none;
		transition: all 1s linear;
	}

	.woocommerce-Button.button {
		color: #fff;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		cursor: pointer;
		transition: background 0.3s, transform 0.2s;
	}

	.woocommerce-Button.button:hover {
		transform: scale(1.05);
	}

	:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button {
		background-color: #f92296;
		color: #fff;
	}

	:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:hover {
		background-color: #f92296;
		color: #fff;
	}
</style>