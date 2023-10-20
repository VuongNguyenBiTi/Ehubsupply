<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));

		if ($heading) :
		?>
			<h3><?php echo esc_html($heading); ?></h3>
		<?php endif; ?>
		<div class="owl-carousel owl-theme" id="owl_product_related">
			<?php
			// Trộn mảng sản phẩm ngẫu nhiên
			shuffle($related_products);

			$displayed_products = 0; // Biến đếm sản phẩm đã hiển thị
			foreach ($related_products as $related_product) :
				if ($displayed_products < 8) :
			?>
					<div class="row">
						<?php
						$post_object = get_post($related_product->get_id());
						setup_postdata($GLOBALS['post'] = &$post_object);
						wc_get_template_part('content', 'product');
						$displayed_products++; // Tăng biến đếm khi hiển thị sản phẩm
						?>
					</div>




			<?php
				endif;
			endforeach;
			wp_reset_postdata(); // Đặt lại dữ liệu post
			?>
		</div>
		</div>
	</section>
<?php
endif;
wp_reset_postdata();
?>


<style>
	.owl-carousel .woocommerce div.product p.price, .woocommerce div.product span.price {
    color: #EF4444;
	font-size: 16px;
		font-style: normal;
		font-weight: 700;
		line-height: 24px;
		color: var(--second-red, #EF4444);

	}

	.owl-carousel .price .woocommerce-Price-amount.amount:nth-child(2) {
		display: none;
	}


	.related {
		margin-top: 20px;
		margin-bottom: 50px;
	}

	.product_item {
		margin-left: 5px;
		margin-right: 5px;
	}

	.product_item_top a .product_img1 img {
		height: 200px;
	}

	.woocommerce-loop-product__title {
		color: var(--gray-gray-3-main, #1F2937);
		font-size: 16px;
		font-style: normal;
		font-weight: 400;
		line-height: 24px;
		text-transform: capitalize;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
	}

	.woocommerce div.product span.price {
		display: flex;
	}

	.related del .woocommerce-Price-amount bdi {
		display: none;
		font-size: 14px !important;
	}

	.related ins .woocommerce-Price-amount bdi {
		font-size: 14px;
		font-style: normal;
		font-weight: 700;
		line-height: 24px;
		color: var(--second-red, #EF4444);
	}
	.woocommerce div.product ins .woocommerce-Price-amount bdi {
		font-size: 20px;
	}

	
	.btn_right {
		display: none;
	}

	.product_item_bottom {
		padding-top: 10px;
	}
</style>