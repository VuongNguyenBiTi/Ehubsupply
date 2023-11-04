<div class="home_flashsale">
    <div class="container">
        <div class="home_flashsale_wrap">
            <div class="home_flashsale_top">
                <div class="flashsale_left">
                    <h2> Sản phẩm bán chạy</h2>
                </div>
                <div class="flashsale_right">
                    <i class="far fa-chevron-double-right"></i>
                    <a href="<?php echo get_home_url(); ?>/cua-hang/"> Xem tất cả</a>
                </div>
            </div>
            <div class="home_flashsale_bottom">
                <div class="product_list">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 4,
                            'meta_key' => 'total_sales', // lấy số lượng sản phẩm bán ra lớn nhất
                            'orderby' => 'meta_value_num', 
                            'order' => 'DESC', 
                        );
                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php global $wp_query;
                        $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                            <?php global $product; ?>
                            <div class="col-6 col-md-6 col-lg-3 mb-0 mb-lg-1">
                                <div class="product_item">
                                    <div class="product_top">
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
                                    <div class="product_bottom">
                                        <a href="<?php the_permalink() ?>">
                                            <h4 class="product_title"><?php echo wp_trim_words(get_the_title(), 15) ?></h4>
                                            <div class="price_wrap">
                                                <?php   // Lấy giá gốc và giá khuyến mãi từ cơ sở dữ liệu
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
                                                        //    echo "giá khuyến mãi nhỏ nhất:  VNĐ";
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
                                                <div class="oldprice">
                                                    <p class="oldprice1">
                                                        <?php
                                                        $product_id = get_the_ID(); // Lấy ID của sản phẩm trong WordPress
                                                        $product = wc_get_product($product_id); // Lấy đối tượng sản phẩm
                                                        if ($product && $product->is_type('variable')) {
                                                            // Sản phẩm có biến thể
                                                            echo   $min_regular_price . " VNĐ";
                                                        } else {
                                                            // Sản phẩm không có biến thể
                                                            if (isset($regular_price) && !empty($sale_price)) {
                                                                echo $regular_price . " VNĐ";
                                                            } else {
                                                                // echo 0;
                                                            }
                                                            // echo  $regular_price;
                                                        }
                                                        ?> </p>
                                                    <p class="oldprice2">
                                                        <?php
                                                        $product_id = get_the_ID(); // Lấy ID của sản phẩm trong WordPress
                                                        $product = wc_get_product($product_id); // Lấy đối tượng sản phẩm
                                                        if ($product && $product->is_type('variable')) {
                                                            // Sản phẩm có biến thể
                                                            if ($min_regular_price != 0) {
                                                                // $phan_tram = 100 - ($min_variation_price * 100) / $min_regular_price;
                                                                // echo round($phan_tram, 1);
                                                                $phan_tram = ((float)$min_regular_price - (float)$min_variation_price) / (float)$min_regular_price * 100;
                                                                $phan_tram1 = (floatval($phan_tram));
                                                                echo "-" . round($phan_tram1, 1) . "%";
                                                            } else {
                                                                
                                                                echo "-" . $phan_tram = 0 . "%"; 
                                                            }
                                                        } else {
                                                            // Sản phẩm không có biến thể
                                                            if (isset($regular_price) && !empty($sale_price)) {
                                                                echo "-" . round($phan_tram, 1) . "%";
                                                            } else {
                                                                // echo 0;
                                                            }
                                                            // echo round($phan_tram, 1);
                                                        }
                                                        ?></p>
                                                </div>
                                                <div class="newprice">
                                                    <p>
                                                        <?php
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
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>