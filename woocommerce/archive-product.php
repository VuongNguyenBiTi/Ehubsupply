<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>
<!-- <div class="container"> -->
<div class="shop_product">
	<div class="category_product">
		<div class="container">
			<div class="row ">
				<div class="col-lg-3 col-md-4 col-12 ">
					<div class="sidebar">
						<?php echo  do_shortcode('[yith_wcan_filters slug="sidebar"]'); ?>
					</div>
					<div class="sidebar_mobile">
						<?php echo  do_shortcode('[yith_wcan_filters slug="loc_sidebar"]'); ?>

					</div>
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<div class="product_main">
						<div class="product_main_top">
							
							<div class="product_main_topl">
							<div class="icon_layout">
								<p>Chế độ xem </p>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" id="button1" class="icon_layout_active">
									<mask id="mask0_39_1543" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
										<rect width="24" height="24" fill="#D9D9D9" />
									</mask>
									<g mask="url(#mask0_39_1543)">
										<path d="M5 11C4.45 11 3.97917 10.8042 3.5875 10.4125C3.19583 10.0208 3 9.55 3 9V5C3 4.45 3.19583 3.97917 3.5875 3.5875C3.97917 3.19583 4.45 3 5 3H19C19.55 3 20.0208 3.19583 20.4125 3.5875C20.8042 3.97917 21 4.45 21 5V9C21 9.55 20.8042 10.0208 20.4125 10.4125C20.0208 10.8042 19.55 11 19 11H5ZM5 9H19V5H5V9ZM5 21C4.45 21 3.97917 20.8042 3.5875 20.4125C3.19583 20.0208 3 19.55 3 19V15C3 14.45 3.19583 13.9792 3.5875 13.5875C3.97917 13.1958 4.45 13 5 13H19C19.55 13 20.0208 13.1958 20.4125 13.5875C20.8042 13.9792 21 14.45 21 15V19C21 19.55 20.8042 20.0208 20.4125 20.4125C20.0208 20.8042 19.55 21 19 21H5ZM5 19H19V15H5V19Z" fill="#9CA3AF" />
									</g>
								</svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" id="button2">
									<mask id="mask0_39_1546" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
										<rect width="24" height="24" fill="#D9D9D9" />
									</mask>
									<g mask="url(#mask0_39_1546)">
										<path d="M3 11V3H11V11H3ZM3 21V13H11V21H3ZM13 11V3H21V11H13ZM13 21V13H21V21H13ZM5 9H9V5H5V9ZM15 9H19V5H15V9ZM15 19H19V15H15V19ZM5 19H9V15H5V19Z" fill="#1F2937" />
									</g>
								</svg>
							</div>

							</div>
							<div class="product_main_topr">
								<?php echo  do_shortcode('[yith_wcan_filters slug="draft-preset"]'); ?>
							</div>
						</div>

					</div>
					
					<!-- <div class="row  "> -->

					<!-- Lấy tất cả sản phẩm -->
					<?php

					// woocommerce_product_loop_start();
					// if (wc_get_loop_prop('total')) {

					// 	while (have_posts()) {

					// 		the_post();

					// 		/**
					// 		 * Hook: woocommerce_shop_loop.
					// 		 */
					// 		do_action('woocommerce_shop_loop');
					// 		wc_get_template_part('content', 'product');
					// 	}
					// }
					// woocommerce_product_loop_end();
					?>

					<?php get_template_part('templates/shop-product/bussiness', 'product');
					?>
					<!-- </div> -->

					<?php woocommerce_pagination(); ?>

				</div>
			</div>
		</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_sidebar.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	// do_action( 'woocommerce_sidebar' );
	?>
</div>
</div>

</div>
</div>
<?php
?>


<?php get_footer('shop'); ?>
<style>
	.product_main {
		/* margin-bottom: 30px; */
	}

	.sidebar_mobile {
		display: none;
	}

	.sidebar {
		padding: 20px 15px 10px 15px;
		background-color: #fff;
		border-radius: 8px;
	}

	.product_main_topl {
		width: 30%;
	}

	.product_main_topr {
		display: flex;
		width: 70%;
		justify-content: flex-end;
	}

	.woocommerce-result-count {
		font-size: 18px;
	}

	@media screen and (max-width: 1200px) {
		.shop_product .category_product .product_main_top .yith-wcan-filters {
			width: 50%;
		}

		.yith-wcan-filters .yith-wcan-filter .price-slider {
			padding: 18px 25px;
		}
	}

	@media screen and (max-width: 500px) {
		.sidebar {
			display: none;
		}

		.sidebar_mobile {
			display: block;
		}

		.shop_product1 {
			padding: 0;
			margin-bottom: 10px;
		}

		.shop_product_wrap {
			flex-direction: column;

		}

		.shop_product_right {
			/* flex-direction: row;
			gap: 10px;
			padding: 0px 10px 10px 10px; */
			display: none
		}

		.shop_product1 .shop_product_left img {
			width: 100%;
		}

		.btn_cart {
			margin-bottom: 0px;

		}

		.shop_product_main {
			flex-direction: column;
		}

		.product_title {
			text-transform: capitalize;
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		.product_sale p {
			display: none;
		}

		.product_sale span {
			display: none;
		}

		.btn_cart {
			padding: 8px 12px;
		}

		.product_price p {
			margin: 0;
		}

		.col-6 {
			padding-left: 5px;
			padding-right: 5px;
		}

		.shop_product_center {
			padding: 0px 10px 10px 10px;
		}

		#nav {
			margin-top: -30px;
		}

		.shop_product1 .shop_product_wrap {
			gap: 10px;
		}

		.product_main_topl {
			width: 50%;
		}

		.product_main_topr {
			width: 50%;
		}

		.shop_product .category_product .product_main_top .yith-wcan-filters {
			width: 100%;
		}
	}
</style>
<!-- <style>
	/* .shop_product_top {}
	.product_item_bottom {
		height: 100px !important;
	}
	.price{
		display: flex !important;
    justify-content: center !important;
    padding-bottom: 21px !important;
	} */
	.yith-wcan-filters .yith-wcan-filter .price-slider {
		padding: 20px 25px;
	}

	del .woocommerce-Price-amount bdi {
		color: var(--gray-gray-7-opacity, #9ca3af);
		font-size: 16px;
		font-style: normal;
		font-weight: 400;
		line-height: 18px;
		/* 128.571% */
	}

	ins .woocommerce-Price-amount bdi {
		color: var(--second-red, #EF4444);
		font-size: 20px;
		font-style: normal;
		font-weight: 700;
		line-height: 24px;
		/* 150% */
	}

	.price {
		display: contents;
	}

	.star-rating {
		width: 100%;
	}

	.star-rating span {
		font-family: 'star';
		color: red;
	}

	.woocommerce .star-rating span::before {
		content: "SSSSS";
		top: -3px;
		position: absolute;
		left: 0;
	}

	.star-rating span .rating {
		position: absolute;
		top: -2px;
		left: 102px;
	}

	.star-rating {
		width: 100% !important;
	}

	/* code dc chú thích bên cửa hàng */
	.product_item {
		display: flex;
		width: 100%;
		margin-bottom: 20px;
	}

	.product_item_top a .product_img1 img {
		width: 160px;
		height: 160px;
		border-radius: 8px;
	}

	.product_item_bottom {
		display: flex;
		flex-direction: row;
		width: 70%;
		justify-content: space-between;
		padding-left: 10px;
	}

	.product_item_bottom a {
		display: flex;
		flex-direction: column;
	}

	.product_item_bottom a h2 {
		color: var(--gray-gray-3-main, #1f2937);
		font-size: 20px;
		padding-top: 20px;
		font-style: normal;
		font-weight: 700;
		line-height: 24px;
		/* 150% */
	}

	.product_item_bottom .btn_right {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: space-around;
	}

	.product_item_bottom .btn_right .btn_cart {
		display: flex;
		height: 40px;
		max-height: 40px;
		padding: 8px 16px;
		justify-content: center;
		align-items: center;
		background-color: #F92296;
		gap: 8px;
		border-radius: 6px;
		margin-bottom: 20px;
		transition: all 0.2s linear;
	}

	.product_item_bottom .btn_right .btn_cart:hover {
		background-color: #f3f4f6;
	}

	.product_item_bottom .btn_right .btn_cart:hover i {
		color: #F92296;
	}

	.product_item_bottom .btn_right .btn_cart i {
		padding: 15px;
		font-size: 20px;
		color: #fff;
	}

	.product_item_bottom .btn_right .btn_like {
		display: flex;
		height: 40px;
		max-height: 40px;
		padding: 8px 16px;
		justify-content: center;
		align-items: center;
		border-radius: 6px;
		background: var(--gray-gray-10-bgr, #f3f4f6);
		gap: 8px;
		border-radius: 6px;
		margin-bottom: 20px;
	}

	.product_item_bottom .btn_right .btn_like:hover {
		background-color: #F92296;
	}

	.product_item_bottom .btn_right .btn_like:hover i {
		color: #f3f4f6;
	}

	.product_item_bottom .btn_right .btn_like i {
		padding: 15px;
		font-size: 20px;
		color: #F92296;
	}

	.sidebar_mobile {
		display: none;
	}

	ins {
		text-decoration: none;
	}



	.woocommerce a.add_to_wishlist.button.alt {
		padding-left: 36px;
		padding-right: 25px;
		padding-bottom: 8px;
		padding-top: 8px;

		align-items: center;
		gap: 8px;
		border-radius: 6px;
		margin-bottom: 20px;
		transition: all 0.2s linear;
	}

	.yith-wcwl-add-button a i {
		transform: scale(1.3);
	}

	#yith-wcwl-popup-message {
		display: none !important;
	}

	.yith-wcwl-wishlistexistsbrowse {
		display: flex;
		padding-left: 23px;
		padding-right: 27px;
		padding-bottom: 8px;
		padding-top: 8px;
		justify-content: center;
		align-items: center;
		border-radius: 6px;
		background: var(--gray-gray-10-bgr, #f3f4f6);
		gap: 8px;
		border-radius: 6px;
		margin-bottom: 20px;
	}

	.yith-wcwl-wishlistexistsbrowse span i {
		transform: scale(1.3);
		padding-left: 11px;
		color: red;
	}




















	@media screen and (max-width: 900px) {
		.shop_product .category_product .sidebar .filter-title {
			color: var(--gray-gray-3-main, #1f2937);
			font-size: 20px;
			font-style: normal;
			font-weight: 700;
		}

		.product_item_bottom a h2 {
			font-size: 18px;
			padding-top: 5px;
			line-height: 19px;
		}
	}

	@media screen and (max-width: 500px) {
		.sidebar {
			display: none;
		}

		.sidebar_mobile {
			display: block;
		}

		.shop_product .category_product .product_main_top {
			justify-content: start;
		}

		.product_main_top .yith-wcan-filters .yith-wcan-filter .yith-wcan-dropdown {
			border: 1px solid #D7D7D7;
			border-radius: 4px;
			padding: 8px 15px;
			cursor: pointer;
			width: 240px;
			position: relative;
		}

		.product_item {
			flex-direction: column;
			background: #eeeeee33;
			box-shadow: -3px -3px 4px #fff, 4px 4px 4px #ddd;
			border-radius: 12px;
			padding: 10px 15px;
			font-size: 14px;
			border: none;
			cursor: pointer;
		}

		.product_item_top a .product_img1 img {
			width: 100%;

		}

		.product_item_bottom {
			flex-direction: column;
			width: 100%;
			padding-left: 0px;
		}

		.product_item_bottom .btn_right {
			flex-direction: row;
			justify-content: flex-end;
		}

		.product_item_bottom .btn_right .btn_cart {
			margin-right: 30px;
		}

		ins .woocommerce-Price-amount bdi {
			font-size: 18px;
		}
	}
</style> -->

<script>

</script>