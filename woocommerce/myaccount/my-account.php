<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>

<script>
// Lấy phần tử có lớp CSS "woocommerce"
var woocommerceElement = document.querySelector('.woocommerce');

// Thêm lớp "container" cho phần tử "woocommerce"
woocommerceElement.classList.add('container');

</script>
<style>
	.woocommerce{
		margin-top: 50px;
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
		margin-top: 10px;
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