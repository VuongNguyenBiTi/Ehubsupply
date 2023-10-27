<?php get_header(); ?>
<div class="container">
    <h3 class="sp_like">Sản phẩm yêu thích</h3>
    <?php echo do_shortcode('[yith_wcwl_wishlist]'); ?>

</div>
<?php get_footer(); ?>
<style>
    .sp_like{
        margin-top: 20px;
        color: #000;
    }
    
    .table.wishlist_table tr {
        text-align: center !important;
    }

    .product-name {
        text-align: center;

    }

    .product-price {
        text-align: center;
    }

    .product-stock-status {
        text-align: center;
    }

    .product-price ins {
        text-decoration: none;
    }

    .wishlist-title {
        display: none;
    }

    @media screen and (max-width: 900px) {

        .product-name {
            text-align: start;

        }

        .additional-info-wrapper {
            display: flex;
            justify-content: space-around;
        }

        .woocommerce-Price-amount {
            margin-left: 10px;
        }

        .mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 {
            display: flex;
        }

        .mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-thumbnail1::before {
            display: none;
        }

        .mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-remove1::before {
            display: none;
        }

        .mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-quantity1 {
            margin: 0;
        }
    }

    @media screen and (max-width: 500px) {
        .additional-info-wrapper {
            display: flex;
            justify-content: start;
        }

        .mobile_order_item .cart_main2 .woocommerce-cart-form__cart-item1 .product-remove1 {
            display: none;
        }
        .shop_table{
            padding: 0;
        }
        .sp_like{
            margin-bottom: 20px;
        }
    }
</style>