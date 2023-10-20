<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>

<!-- <div <?php wc_product_class('', $product); ?>>
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action('woocommerce_before_shop_loop_item');

		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action('woocommerce_before_shop_loop_item_title');

		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action('woocommerce_shop_loop_item_title');

		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action('woocommerce_after_shop_loop_item_title');

		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action('woocommerce_after_shop_loop_item');
		?>
	</div>
</div>

 -->




<!-- test -->

<div class="col-lg-12 ">

	<div class="product_item">
		<div class="product_item_top">
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action('woocommerce_before_shop_loop_item');
			?>
			<div class="product_img1">
				<?php
				/**
				 * Hook: woocommerce_before_shop_loop_item_title.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action('woocommerce_before_shop_loop_item_title');
				?>
			</div>
		</div>

		<div class="product_item_bottom">
			<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action('woocommerce_shop_loop_item_title');
			?>
			<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 * @hooked woocommerce_template_loop_rating - 5
			 */
			// do_action('woocommerce_after_shop_loop_item_title');
			woocommerce_template_loop_price();
			// woocommerce_template_loop_rating();
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

			</div>
			<div class="btn_right">
				<a href="<?php echo get_home_url(); ?>/cua-hang/?add-to-cart=<?php the_ID(); ?>">
					<div class="btn_cart">
						<i class="fal fa-cart-arrow-down"></i>
					</div>

				</a>
			
			
				
				<!-- http://localhost/Ehubsupply/san-pham/ma-hong-muzigae-mansion-fitting-blush-han-quoc/?add_to_wishlist=166&_wpnonce=cbb52d1505 -->
					<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
				


			</div>

		</div>

	</div>
</div>
<style>
	/* Tạo khung cho sản phẩm */

	.rating_main i {
		color: orange;

	}
	
</style>