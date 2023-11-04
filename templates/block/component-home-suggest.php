<div class="home_flashsale">
    <div class="container">
        <div class="home_flashsale_wrap">
            <div class="home_flashsale_top">
                <div class="flashsale_left">
                    <h2> Gợi ý hôm nay</h2>
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
                            'posts_per_page' => 8,
                            'orderby' => 'rand', // Sắp xếp ngẫu nhiên
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
                                                // Attempt to retrieve the variation price
                                                $variation = wc_get_product($product_id);
                                                if (is_a($variation, 'WC_Product_Variation')) {
                                                    // If it's a variation, get its price
                                                    $price = $variation->get_price();
                                                    $price = number_format($price, 0, ',', '.');
                                                    $variation_attributes = $variation->get_variation_attributes();
                                                } else {
                                                    // If it's not a variation, get the regular and sale prices
                                                    $regular_price = get_post_meta($product_id, '_regular_price', true); // Giá gốc
                                                    $sale_price = get_post_meta($product_id, '_sale_price', true); // Giá khuyến mãi
                                                    // Convert the string values to numeric values
                                                    $regular_price = floatval($regular_price);
                                                    $sale_price = floatval($sale_price);
                                                    // Check if $regular_price is not zero to avoid division by zero
                                                    if ($regular_price != 0) {
                                                        $phan_tram = 100 - ($sale_price * 100) / $regular_price;
                                                    } else {
                                                        // Handle the case where $regular_price is zero
                                                        $phan_tram = 0; // You can adjust this default value as needed
                                                    }
                                                    // Format the prices after performing calculations
                                                    $sale_price = number_format($sale_price, 0, ',', '.');
                                                    $regular_price = number_format($regular_price, 0, ',', '.');
                                                }
                                                // Assign the desired price to $price (either regular or sale)
                                                $price = $sale_price; // You can change this to $regular_price if needed
                                                // Get all available variations
                                                $variations = wc_get_product($product_id)->get_children();
                                                if (!empty($variations)) {
                                                    $min_variation_price = PHP_FLOAT_MAX; // Set to a large initial value
                                                    $min_regular_price = PHP_FLOAT_MAX; // Set to a large initial value
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
                                                        //    echo "giá gốc nhỏ nhất: VNĐ";
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
                                                                // Handle the case where $regular_price is zero
                                                                echo "-" . $phan_tram = 0 . "%"; // You can adjust this default value as needed
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
                                                    <p><?php
                                                        $product_id = get_the_ID(); // Lấy ID của sản phẩm trong WordPress
                                                        $product = wc_get_product($product_id); // Lấy đối tượng sản phẩm
                                                        if ($product && $product->is_type('variable')) {
                                                            // Sản phẩm có biến thể
                                                            echo $min_variation_price;
                                                        } else {
                                                            // Sản phẩm không có biến thể
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

            <a href="<?php  echo get_home_url();?>/cua-hang/">
                <div class="add_shopping">
                    <div class="add_shopping_wrap">
                        <p> Mua sắm thêm
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <mask id="mask0_770_1246" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="25" height="24">
                                <rect x="0.5" width="24" height="24" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_770_1246)">
                                <path d="M5.5 22C4.95 22 4.47917 21.8042 4.0875 21.4125C3.69583 21.0208 3.5 20.55 3.5 20V8C3.5 7.45 3.69583 6.97917 4.0875 6.5875C4.47917 6.19583 4.95 6 5.5 6H7.5C7.5 4.61667 7.9875 3.4375 8.9625 2.4625C9.9375 1.4875 11.1167 1 12.5 1C13.8833 1 15.0625 1.4875 16.0375 2.4625C17.0125 3.4375 17.5 4.61667 17.5 6H19.5C20.05 6 20.5208 6.19583 20.9125 6.5875C21.3042 6.97917 21.5 7.45 21.5 8V20C21.5 20.55 21.3042 21.0208 20.9125 21.4125C20.5208 21.8042 20.05 22 19.5 22H5.5ZM5.5 20H19.5V8H5.5V20ZM12.5 14C13.8833 14 15.0625 13.5125 16.0375 12.5375C17.0125 11.5625 17.5 10.3833 17.5 9H15.5C15.5 9.83333 15.2083 10.5417 14.625 11.125C14.0417 11.7083 13.3333 12 12.5 12C11.6667 12 10.9583 11.7083 10.375 11.125C9.79167 10.5417 9.5 9.83333 9.5 9H7.5C7.5 10.3833 7.9875 11.5625 8.9625 12.5375C9.9375 13.5125 11.1167 14 12.5 14ZM9.5 6H15.5C15.5 5.16667 15.2083 4.45833 14.625 3.875C14.0417 3.29167 13.3333 3 12.5 3C11.6667 3 10.9583 3.29167 10.375 3.875C9.79167 4.45833 9.5 5.16667 9.5 6Z" fill="white" />
                            </g>
                        </svg>
                    </div>


                </div>

            </a>
        </div>
    </div>
</div>