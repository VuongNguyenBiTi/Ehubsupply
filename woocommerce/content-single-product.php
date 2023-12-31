<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="chi_tiet_sp">
	<div class="container">

		<?php $average      = $product->get_average_rating(); ?>
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action('woocommerce_before_single_product_summary');
			?>

			<div class="summary entry-summary">

				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				// do_action('woocommerce_single_product_summary');

				woocommerce_template_single_title();
				?>
				<div class="rating_main">

					<?php
					$average = $product->get_average_rating();
					for ($i = 1; $i <= 5; $i++) {
						if ($i <= floor($average)) {
							echo '<i class="fas fa-star"></i>';
						} elseif ($i - 0.5 <= $average) {
							echo '<i class="fas fa-star-half-alt"></i>';
						} else {
							echo '<i class="far fa-star"></i>';
						}
					}
					?>
					<p><?php echo round($average, 1); ?></p>

				</div>
				<?php
				// woocommerce_template_single_rating();
				woocommerce_template_single_price();
				woocommerce_template_single_excerpt();
				woocommerce_template_single_add_to_cart(); ?>
				<!-- test nút thanh toán ngay -->
		


				<!-- end -->





				<!-- <a href="<?php echo get_home_url(); ?>/thanh-toan/?add-to-cart=<?php the_ID(); ?>">
					<button class="btn-31">
						<span class="text-container">
							<span class="text">Mua ngay</span>
						</span>
					</button>
				</a> -->

				<?php
				woocommerce_template_single_meta();
				woocommerce_template_single_sharing();
				// WC_Structured_Data::generate_product_data() ;
				?>

			</div>

			<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action('woocommerce_after_single_product_summary');
			?>
		</div>
	</div>
</div>



<?php do_action('woocommerce_after_single_product'); ?>

<script>
	// Lấy phần tử có lớp "woocommerce-notices-wrapper"
	var noticesWrapper = document.querySelector('.woocommerce-notices-wrapper');

	// Kiểm tra xem phần tử tồn tại
	if (noticesWrapper) {
		// Thêm lớp "container" vào phần tử
		noticesWrapper.classList.add('container');
	}
</script>
<style>
	.woocommerce-notices-wrapper {
		margin: 0 auto;
	}
</style>