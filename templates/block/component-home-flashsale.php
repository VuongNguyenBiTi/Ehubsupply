<div class="home_flashsale">

    <div class="container">
        <div class="home_flashsale_wrap">
            <div class="home_flashsale_top">
                <div class="flashsale_left">
                    <div class="flashsale_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <mask id="mask0_17_1904" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="33">
                                <rect y="0.5" width="32" height="32" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_17_1904)">
                                <path d="M14.0666 24.7666L20.9666 16.5H15.6333L16.6 8.93329L10.4333 17.8333H15.0666L14.0666 24.7666ZM10.6666 29.8333L12 20.5H5.33331L17.3333 3.16663H20L18.6666 13.8333H26.6666L13.3333 29.8333H10.6666Z" fill="#F92296" />
                            </g>
                        </svg>
                    </div>
                    <h2> Flash Sale </h2>
                    <div class="flashsale_time">
                        <!-- <div id="countdown">
                            <ul>
                                <li style="display: none;"><span id="days"></span></li>
                                <li><span id="hours"></span></li>:
                                <li><span id="minutes"></span></li>:
                                <li><span id="seconds"></span></li>
                            </ul>
                        </div> -->
                        <div class="countdown">
                            <div class="container-timer">
                                <h3 id="headline"></h3>
                                <div id="countdown">
                                    <ul>
                                        <li><span id="days"></span></li>
                                        <li><span id="hours"></span></li>
                                        <li><span id="minutes"></span></li>
                                        <li><span id="seconds"></span></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="flashsale_right">
                    <i class="far fa-chevron-double-right"></i>
                    <a href="<?php echo get_home_url(); ?>/cua-hang"> Xem tất cả</a>
                </div>
            </div>
            <div class="home_flashsale_bottom">
                <div class="product_list">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 8,
                            'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                    'key' => '_sale_price',
                                    'value' => '',
                                    'compare' => '>',
                                    'type' => 'NUMERIC',
                                ),
                                array(
                                    'key' => '_price',
                                    'value' => 0,
                                    'compare' => '>',
                                    'type' => 'NUMERIC',
                                ),
                            ),
                            'orderby' => 'date', 
                            'order' => 'DESC', 
                        );
                        ?>



                        <?php $getposts = new WP_query($args); ?>
                        <?php global $wp_query;
                        $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                            <?php global $product; ?>
                            <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-1">
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
                                        <h4 class="product_title"><?php echo wp_trim_words(get_the_title(), 15) ?></h4>
                                        <div class="price_wrap">
                                            <?php   // Lấy giá gốc và giá khuyến mãi từ cơ sở dữ liệu
                                            $product_id = get_the_ID();
                                            $regular_price = 0;
                                            $phan_tram = 0;
                                            $sale_price = 0;
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
                                                $regular_price = floatval($regular_price);
                                                $sale_price = floatval($sale_price);
                                                if ($regular_price != 0) {
                                                    $phan_tram = 100 - ($sale_price * 100) / $regular_price;
                                                } else {
                                                    $phan_tram = 0; // You can adjust this default value as needed
                                                }
                                                $sale_price = number_format($sale_price, 0, ',', '.');
                                                $regular_price = number_format($regular_price, 0, ',', '.');
                                            }
                                            $price = $sale_price; // You can change this to $regular_price if needed
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
                                                <p>
                                                    <?php
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
</div>

<!-- 
<script>
    (function() {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        //I'm adding this section so I don't have to keep updating this pen every year :-)
        //remove this if you don't need it
        let today = new Date(),
            dd = String(today.getDate()).padStart(2, "0"),
            mm = String(today.getMonth() + 1).padStart(2, "0"),
            yyyy = today.getFullYear(),
            nextYear = yyyy + 1,
            dayMonth = "09/30/",
            birthday = dayMonth + yyyy;

        today = mm + "/" + dd + "/" + yyyy;
        if (today > birthday) {
            birthday = dayMonth + nextYear;
        }
        //end

        const countDown = new Date(birthday).getTime(),
            x = setInterval(function() {

                const now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                    document.getElementById("headline").innerText = "It's my birthday!";
                    document.getElementById("countdown").style.display = "none";
                    document.getElementById("content").style.display = "block";
                    clearInterval(x);
                }
                //seconds
            }, 0)
    }());
</script> -->

<script>
    // Timer
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "<?php echo esc_html(get_field('set_your_date_countdown', 2)); ?>/",
        birthday = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
        birthday = dayMonth + nextYear;
    }
    //end

    const countDown = new Date(birthday).getTime(),
        x = setInterval(function() {
            const now = new Date().getTime(),
                distance = countDown - now;

            (document.getElementById("days").innerText = Math.floor(distance / day)),
            (document.getElementById("hours").innerText = Math.floor((distance % day) / hour)),
            (document.getElementById("minutes").innerText = Math.floor((distance % hour) / minute)),
            (document.getElementById("seconds").innerText = Math.floor((distance % minute) / second));

            //do something later when date is reached
            if (distance < 0) {
                document.getElementById("headline").innerText = "Đã hết thời gian ưu đãi!";
                document.getElementById("countdown").style.display = "none";
                document.getElementById("content").style.display = "block";
                clearInterval(x);
            }
            //seconds
        }, 0);
    // Timer
</script>