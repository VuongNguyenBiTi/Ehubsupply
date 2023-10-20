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


				<a href="<?php echo get_home_url(); ?>/thanh-toan/?add-to-cart=<?php the_ID(); ?>">
					<button class="btn-31">
						<span class="text-container">
							<span class="text">Mua ngay</span>
						</span>
					</button>
				</a>

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

<!-- <style>
	.btn-31 {
		background-color: #fff;
		border: 1px solid #F92296;
		border-radius: 8px;
		padding: 6px 115px;
		color: #F92296;
		font-size: 18px;
		font-weight: 700;

	}



	.tintuc-related {
		display: none;
	}

	.woocommerce div.product div.images img {
		display: block;
		width: 100%;
		box-shadow: none;
		height: 358px;
	}

	.woocommerce div.product .product_title {
		color: var(--gray-gray-3-main, #1F2937);
		font-size: 30px;
		font-style: normal;
		font-weight: 700;
		line-height: 44px;
	}

	.woocommerce-product-rating a {
		color: var(--gray-gray-7-opacity, #9CA3AF);
		font-size: 16px;
		font-style: normal;
		font-weight: 400;
		line-height: 24px;
		/* 150% */
	}

	del .woocommerce-Price-amount bdi {
		color: #929292;
		font-size: 18px;
		font-style: normal;
		font-weight: 400;
		line-height: 18px;
		margin-right: 20px;
	}

	ins .woocommerce-Price-amount bdi {
		color: var(--pink-pink-4-main, #F92296);
		font-size: 24px;
		font-style: normal;
		font-weight: 700;
		line-height: 32px;
	}

	.single_add_to_cart_button {
		display: flex;
		height: 40px;
		max-height: 40px;
		padding: 8px 16px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		border-radius: 6px;
		border: 1px solid var(--pink-pink-4-main, #F92296);
	}

	.woocommerce div.product form.cart .single_add_to_cart_button {
		display: flex;
		height: 40px;
		max-height: 40px;
		padding: 8px 16px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		background-color: #F92296;
		color: #fff;
		border-radius: 6px;
		border: 1px solid var(--pink-pink-4-main, #F92296);
	}

	.woocommerce div.product form.cart .single_add_to_cart_button i {
		display: none;
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li {
		background-color: #fff;
		border: none;
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li a {
		font-size: 20px;
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
		background-color: #F92296;
		color: #fff;
	}

	ins {
		text-decoration: none;
	}

	.woocommerce-breadcrumb {
		display: none;
	}

	.woocommerce-notices-wrapper {
		margin-top: 30px;
	}

	/* sao */
	.rating_main {
		display: flex;
		align-items: baseline;
	}

	.rating_main i {
		color: orange;

	}

	.rating_main p {
		font-size: 18px;
		margin-left: 10px;
	}

	/* mô tả */
	.woocommerce div.product .woocommerce-tabs .panel h2 {
		display: none;
	}

	.woocommerce div.product .woocommerce-tabs .panel p {
		font-size: 18px;
		color: black;
	}

	/* .woocommerce div.product .woocommerce-tabs .panel strong a{
		font-size: 18px;
		color: black;
	} */
	.woocommerce #review_form #respond .form-submit input {
		background-color: #F92296;
		color: #fff;
	}

	.stars.selected a {
		color: orange;
	}

	.stars:hover a {
		color: orange;
	}
	.comment-text .rating_main{
		display: flex;
	order: 3;
	}
.comment-text .meta{
	order: 1;
	display: flex;

 	}
.comment-text .description{
	order: 2;
	display: flex;

 	}	
</style> -->