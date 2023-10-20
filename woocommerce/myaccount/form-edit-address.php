	<?php
	/**
	 * Edit address form
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce\Templates
	 * @version 3.6.0
	 */

	defined('ABSPATH') || exit;

	$page_title = ('billing' === $load_address) ? esc_html__('Billing address', 'woocommerce') : esc_html__('Shipping address', 'woocommerce');

	do_action('woocommerce_before_edit_account_address_form'); ?>

	<?php if (!$load_address) : ?>
		<?php wc_get_template('myaccount/my-address.php'); ?>
	<?php else : ?>

		<form method="post">

			<h3><?php echo apply_filters('woocommerce_my_account_edit_address_title', $page_title, $load_address); ?></h3><?php // @codingStandardsIgnoreLine 
																															?>

			<div class="woocommerce-address-fields">
				<?php do_action("woocommerce_before_edit_address_form_{$load_address}"); ?>

				<div class="woocommerce-address-fields__field-wrapper">
					<?php
					foreach ($address as $key => $field) {
						woocommerce_form_field($key, $field, wc_get_post_data_by_key($key, $field['value']));
					}
					?>
				</div>

				<?php do_action("woocommerce_after_edit_address_form_{$load_address}"); ?>

				<p>
					<button type="submit" class="button" name="save_address" value="<?php esc_attr_e('Save address', 'woocommerce'); ?>"><?php esc_html_e('Save address', 'woocommerce'); ?></button>
					<?php wp_nonce_field('woocommerce-edit_address', 'woocommerce-edit-address-nonce'); ?>
					<input type="hidden" name="action" value="edit_address" />
				</p>
			</div>

		</form>
		<script>
			var elements = document.getElementsByClassName("woocommerce-MyAccount-content");
			for (var i = 0; i < elements.length; i++) {
				elements[i].classList.add("border_address");
			}
		</script>
	<?php endif; ?>

	<?php do_action('woocommerce_after_edit_account_address_form'); ?>


	<style>
		.border_address {
			background: var(--color-gray-gray-11-main-white, #fff);
			box-shadow: 0px 12px 24px 0px rgba(0, 0, 0, 0.12);
			padding: 30px;
			border-radius: 8px;
			margin-bottom: 30px;
		}

		.woocommerce-input-wrapper input {
			width: 100%;
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			outline: none !important;

		}

		.woocommerce-input-wrapper input:focus {
			border-color: #f92296;
			box-shadow: 0 0 5px #f92296;
			transition: border-color 0.3s, box-shadow 0.3s;
			outline: none !important;

		}

		div.woocommerce form .form-row input[type=text]:focus {
			outline: none !important;

		}

		div.woocommerce form .form-row input[type=email]:focus {
			outline: none !important;

		}

		div.woocommerce form .form-row input[type=tel]:focus {
			outline: none !important;

		}

		.select2-search__field {
			width: 100%;
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			outline: none !important;
		}

		.select2-search__field:focus {
			border-color: #f92296;
			box-shadow: 0 0 5px #f92296;
			transition: border-color 0.3s, box-shadow 0.3s;
			outline: none !important;

		}

		div.woocommerce form .form-row .select2-container .select2-selection {
			border-radius: 8px;
		}

		div.woocommerce form .form-row .select2-container .select2-selection:focus {
			border-color: #f92296;
			box-shadow: 0 0 5px #f92296;
			transition: border-color 0.3s, box-shadow 0.3s;
			outline: none !important;

		}
	</style>