<div class="row  " id="data">

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'product',
        'post_status'     => 'publish',
        'pagination' => true,
        'paged'  => $paged,
        'posts_per_page' => -1,
        'paged'           => get_query_var('paged'),
    );
    ?>
    <?php $getposts = new WP_query($args); ?>
    <?php global $wp_query;
    $wp_query->in_the_loop = true; ?>
    <?php if ($getposts->have_posts()) : ?>
        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <?php global $product; ?>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="shop_product1">
                    <div class="shop_product_wrap">
                        <div class="shop_product_main">
                            <div class="shop_product_left">
                                <a href="<?php the_permalink() ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'thumnail')); ?>
                                    <?php
                                    } else {
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </a>
                            </div>
                            <a href="<?php the_permalink() ?>">
                                <div class="shop_product_center">
                                    <div class="product_title">
                                        <h2><?php echo wp_trim_words(get_the_title(), 15) ?></h2>
                                    </div>
                                    <?php
                                    $product_id = get_the_ID();
                                    $regular_price = 0;
                                    $phan_tram = 0;
                                    $sale_price = 0;
                                    $variation = wc_get_product($product_id);
                                    if (is_a($variation, 'WC_Product_Variation')) {
                                        $price = $variation->get_price();
                                        $price = number_format($price, 0, ',', '.');
                                        $variation_attributes = $variation->get_variation_attributes();
                                    } else {
                                        $regular_price = get_post_meta($product_id, '_regular_price', true); // Giá gốc
                                        $sale_price = get_post_meta($product_id, '_sale_price', true); // Giá khuyến mãi
                                        $regular_price = floatval($regular_price);
                                        $sale_price = floatval($sale_price);
                                        if ($regular_price != 0) {
                                            $phan_tram = 100 - ($sale_price * 100) / $regular_price;
                                        } else {
                                            $phan_tram = 0;
                                        }
                                        $sale_price = number_format($sale_price, 0, ',', '.');
                                        $regular_price = number_format($regular_price, 0, ',', '.');
                                    }
                                    $price = $sale_price;
                                    $variations = wc_get_product($product_id)->get_children();
                                    if (!empty($variations)) {
                                        $min_variation_price = PHP_FLOAT_MAX;
                                        $min_regular_price = PHP_FLOAT_MAX;
                                        foreach ($variations as $variation_id) {
                                            $variation = wc_get_product($variation_id);
                                            if (is_a($variation, 'WC_Product_Variation')) {
                                                $variation_price = $variation->get_price();
                                                $variation_regular_price = $variation->get_regular_price();

                                                $min_variation_price = min($min_variation_price, $variation_price);
                                                $min_regular_price = min($min_regular_price, $variation_regular_price);
                                            }
                                        }
                                        if ($min_variation_price !== PHP_FLOAT_MAX) {
                                            $min_variation_price = number_format($min_variation_price, 0, ',', '.');
                                            $min_variation_price;
                                        } else {
                                        }
                                        if ($min_regular_price !== PHP_FLOAT_MAX) {
                                            $min_regular_price = number_format($min_regular_price, 0, ',', '.');
                                            $min_regular_price;
                                        } else {
                                        }
                                    } else {
                                    }
                                    ?>
                                    <div class="product_sale">
                                        <p><?php
                                            $product_id = get_the_ID();
                                            $product = wc_get_product($product_id);
                                            if ($product && $product->is_type('variable')) {
                                                // sản phẩm biến thể
                                                echo   $min_regular_price . " VNĐ";
                                            } else {
                                                // sản phẩm bình thường
                                                if (isset($regular_price) && !empty($sale_price)) {
                                                    echo $regular_price . " VNĐ";
                                                } else {
                                                    // echo " ";
                                                }


                                                // echo  $regular_price;
                                            }
                                            ?> </p>
                                        <span><?php
                                                $product_id = get_the_ID();
                                                $product = wc_get_product($product_id);
                                                if ($product && $product->is_type('variable')) {
                                                    if ($min_regular_price != 0) {
                                                        //   $phan_tram = 100 - ($min_variation_price * 100) / $min_regular_price;
                                                        //   $phan_tram = floatval($phan_tram);
                                                        //   echo gettype($phan_tram);
                                                        //   echo round($phan_tram, 1);
                                                        // $phan_tram = 100 - ((int)$min_variation_price * 100) / (int)$min_regular_price;
                                                        $phan_tram = ((float)$min_regular_price - (float)$min_variation_price) / (float)$min_regular_price * 100;
                                                        $phan_tram1 = (floatval($phan_tram));
                                                        echo "-" . round($phan_tram1, 1) . "%";
                                                    } else {


                                                        echo "-" . $phan_tram = 0 . "%";
                                                    }
                                                } else {
                                                    // sản phẩm bình thường
                                                    if (isset($regular_price) && !empty($sale_price)) {
                                                        echo "-" . round($phan_tram, 1) . "%";
                                                    } else {
                                                        // echo 0;
                                                    }
                                                    // echo round($phan_tram, 1);
                                                }
                                                ?></span>
                                    </div>
                                    <div class="product_price">
                                        <p><?php
                                            $product_id = get_the_ID(); // Lấy ID của sản phẩm trong WordPress
                                            $product = wc_get_product($product_id); // Lấy đối tượng sản phẩm
                                            if ($product && $product->is_type('variable')) {
                                                // Sản phẩm có biến thể
                                                echo $min_variation_price;
                                            } else {
                                                // Sản phẩm không có biến thể

                                                if (isset($regular_price) && !empty($sale_price)) {
                                                    echo $sale_price;
                                                } else {
                                                    echo $regular_price;
                                                }
                                            }
                                            ?> VNĐ</p>
                                    </div>
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
                                </div>
                            </a>
                        </div>

                        <div class="shop_product_right">

                            <?php
                            $product_id = get_the_ID();
                            $product = wc_get_product($product_id);
                            if ($product && $product->is_type('variable')) { ?>

                                <a href="<?php the_permalink() ?>">
                                    <div class="btn_cart">
                                        <i class="fal fa-cart-arrow-down"></i>
                                    </div>
                                </a>
                            <?php  } else { ?>

                                <a href="<?php echo get_home_url(); ?>/cua-hang/?add-to-cart=<?php the_ID(); ?>">
                                    <div class="btn_cart">
                                        <i class="fal fa-cart-arrow-down"></i>
                                    </div>
                                </a>
                            <?php }
                            ?>
                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
                        </div>


                       
                    </div>




                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
        <?php woocommerce_result_count(); ?>

        <?php get_template_part('templates/block/component', 'pagination'); ?>
    <?php else : ?>
        <p class="null_product">Không có kết quả nào được tìm thấy</p>
    <?php endif; ?>
</div>

<!-- test -->



<?php
global $wpdb;
$user_id = get_current_user_id();

// Truy vấn danh sách sản phẩm yêu thích của người dùng
$wishlist_table = $wpdb->prefix . 'yith_wcwl';
$query = $wpdb->prepare("SELECT product_id FROM $wishlist_table WHERE user_id = %d", $user_id);
$favorite_products = $wpdb->get_col($query);

if (!empty($favorite_products)) {
    foreach ($favorite_products as $product_id) {
        $product = wc_get_product($product_id);
        if ($product) {
            // Hiển thị tên sản phẩm và liên kết đến trang sản phẩm
            echo '<a href="' . get_permalink($product_id) . '">' . $product->get_name() . '</a><br>';
            // Hiển thị các thông tin sản phẩm khác nếu cần
        }
    }
} else {
    echo 'Không có sản phẩm nào trong danh sách yêu thích.';
}
?>




<!-- end -->




<!-- <script>
    // Lấy các nút và phần tử cần thay đổi
    const button1 = document.getElementById("button1");
    const button2 = document.getElementById("button2");
    const shopProduct = document.querySelectorAll(".shop_product_main");
    const shop_product_wrap = document.querySelectorAll(".shop_product_wrap");
    const elementsToModify = document.querySelectorAll(".col-lg-12, .col-md-12, .col-6");
    const images = document.querySelectorAll(".shop_product1 .shop_product_left img");
    const product_sale_p = document.querySelectorAll(".shop_product_center .product_sale p ");
    const product_sale = document.querySelectorAll(".shop_product_center .product_sale ");
    const product_price_p = document.querySelectorAll(".shop_product_center .product_price p");
    const shop_product_right = document.querySelectorAll(".shop_product_right");

    // Bắt sự kiện khi nhấp vào Button 2
    button2.addEventListener("click", function() {
        // Thay đổi lớp CSS của phần tử shopProduct

        shopProduct.forEach(function(element) {
            element.classList.add("shop_product_customer");
        });
        shop_product_wrap.forEach(function(element) {
            element.classList.add("shop_product_wrap_customer");
        });

        elementsToModify.forEach(function(element) {
            element.classList.remove("col-lg-12", "col-md-12", "col-6");
            element.classList.add("col-lg-4");
        });
        images.forEach(function(image) {
            image.style.width = "100%";
        });
        product_sale_p.forEach(function(element) {
            element.style.fontSize = "14px";
            element.style.margin = "0px";
        });
        product_sale.forEach(function(element) {
            element.style.justifyContent = "space-between";
        });
        product_price_p.forEach(function(element) {
            element.style.marginBottom = "0px";
        });
        shop_product_right.forEach(function(element) {
            element.style.flexDirection = "column"; 
        });
    });

    // Bắt sự kiện khi nhấp vào Button 1 để đảm bảo nó hoạt động ngược lại
    button1.addEventListener("click", function() {
        // Thay đổi lớp CSS của phần tử shopProduct
        shopProduct.forEach(function(element) {
            element.classList.remove("shop_product_customer");
        });
        shop_product_wrap.forEach(function(element) {
            element.classList.remove("shop_product_wrap_customer");
        });


        // Thay đổi lớp CSS của các phần tử col-lg-12, col-md-12, và col-6
        elementsToModify.forEach(function(element) {
            element.classList.remove("col-lg-4");
            element.classList.add("col-lg-12", "col-md-12", "col-6");
        });
        images.forEach(function(image) {
            image.style.width = "160px";
            // Bạn cũng có thể đặt thuộc tính height nếu cần
            // image.style.height = "100%";
        });
        product_sale_p.forEach(function(element) {
            element.style.fontSize = "16px";
            element.style.marginBottom = "1rem";
        });
        product_sale.forEach(function(element) {
            element.style.justifyContent = "normal";
        });
        product_price_p.forEach(function(element) {
            element.style.marginBottom = "1rem";
        });
        shop_product_right.forEach(function(element) {
            element.style.flexDirection = "c"; 
        });
    });
</script> -->

<!-- phân trang -->
<script>
    var rowsShown = 1;
    var isPaginationVisible = false;

    function updateRowsShown() {
        const screenWidth = $(window).width();

        if (screenWidth >= 1000) {
            rowsShown = 9;
        } else {
            rowsShown = 8;
        }
    }

    $(document).ready(function() {
        $('#data').after('<div id="nav"></div>');

        updateRowsShown();
        var rowsTotal = $('.shop_product1').length;
        var numPages = Math.ceil(rowsTotal / rowsShown);

        if (numPages > 1) { // Check if there is more than one page
            isPaginationVisible = true;
            $('#nav').prepend('<button href="#" id="first"><i class="fas fa-angle-double-left"></i></button> ');
            $('#nav').append('<button href="#" id="prev" ><i class="fas fa-chevron-left"></i></button> ');
            for (i = 1; i <= numPages; i++) {
                var pageNum = i + 1;
                $('#nav').append('<a href="#" rel="' + (i - 1) + '">' + i + '</a> ');
            }
            $('#nav').append('<button href="#" id="next"><i class="fas fa-chevron-right"></i></button> ');
            $('#nav').append('<button href="#" id="last"><i class="fas fa-angle-double-right"></i></button> ');
        }

        $('.shop_product1').hide();
        $('.shop_product1').slice(0, rowsShown).show();
        if (isPaginationVisible) {
            $('#nav a[rel="0"]').addClass('active');
        }

        $('#first').click(function() {
            $('#nav a[rel="0"]').click();
        });

        $('#last').click(function() {
            $('#nav a[rel="' + (numPages - 1) + '"]').click();
        });

        updatePrevNextVisibility();

        $('#prev').click(function() {
            var currentPage = parseInt($('#nav a.active').attr('rel'));
            if (currentPage > 0) {
                $('#nav a[rel="' + ((currentPage) - 1) + '"]').click();
            }
        });

        $('#next').click(function() {
            var currentPage = parseInt($('#nav a.active').attr('rel'));
            if (currentPage < numPages - 1) {
                $('#nav a[rel="' + ((currentPage) + 1) + '"]').click();
            }
        });

        $('#nav a').bind('click', function() {
            $('#nav a').removeClass('active');
            $(this).addClass('active');
            var currPage = $(this).attr('rel');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;

            $('.shop_product1').css('opacity', '0.0').hide().slice(startItem, endItem)
                .css('display', 'flex').animate({
                    opacity: 1
                }, 300);

            updatePrevNextVisibility();
        });

        function updatePrevNextVisibility() {
            var currPage = $('#nav a.active').attr('rel');

            if (currPage == 0) {
                $('#prev').hide();
                $('#first').hide();
            } else {
                $('#prev').show();
                $('#first').show();
            }
            if (currPage == numPages - 1) {
                $('#next').hide();
                $('#last').hide();
            } else {
                $('#next').show();
                $('#last').show();
            }
        }
    });
</script>