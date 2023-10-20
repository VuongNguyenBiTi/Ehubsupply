<?php
/**
 * Downloads
 *
 * Shows downloads on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<?php if ( $has_downloads ) : ?>

	<?php do_action( 'woocommerce_before_available_downloads' ); ?>

	<?php do_action( 'woocommerce_available_downloads', $downloads ); ?>

	<?php do_action( 'woocommerce_after_available_downloads' ); ?>

<?php else : ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Browse products', 'woocommerce' ); ?>
		</a>
		<?php esc_html_e( 'No downloads available yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>
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