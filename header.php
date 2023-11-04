<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:ital,wght@0,400;0,600;0,800;1,400;1,600;1,800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"> </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class('mb-0'); ?>>
    <div id="wrapper">
        <!-- Begin Header -->
        <header class="header">
            <div class="container">
                <div class="header_wrap">

                    <div class="header_logo">
                        <a href="<?php echo get_home_url(); ?>/">
                            <img src="<?php echo esc_html(get_theme_mod('html_logo_header')); ?>" alt="Logo Header">
                        </a>
                    </div>
                    <div class="header_menu_desktop">
                        <div class="header_menu_wrap">

                            <?php
                            $primarymenu = array(
                                'theme_location'  => 'primary',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'custom-menu',
                                'menu_id'         => 'my-custom-menu',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new wp_bootstrap_navwalker(),
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul  id="%1$s" class="list-unstyled mb-0">%3$s</ul>',
                                'depth'           => 0,
                            );
                            if (has_nav_menu('primary')) {
                                wp_nav_menu($primarymenu);
                            }
                            ?>


                        </div>

                    </div>
                    <div class="header_icon_wrap">


                        <div class="icon_header" id="icon_search">
                            <i class="far fa-search"></i>
                        </div>
                        <!--  -->

                        <a href="<?php echo get_home_url(); ?>/gio-hang/">
                            <div class="icon_header">
                                <i class="far fa-shopping-cart"></i>
                                <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                                <span id="mini-cart-count" class="count-cart button product_type_simple add_to_cart_button ajax_add_to_cart cart-quantity badge rounded-pill bg-light text-white"><?php echo $items_count ? $items_count : '0'; ?></span>
                            </div>
                        </a>

                        <a href="<?php echo get_home_url(); ?>/yeu-thich/">
                            <div class="icon_header">
                                <i class="fal fa-heart"></i>
                                <!-- <span id="wishlist-count">
                                    <?php $wishlistCount = yith_wcwl_count_products();
                                    echo $wishlistCount; ?>
                                   
                                </span> -->
                                <?php echo do_shortcode('[yith_wcwl_items_count]') ?>
                            </div>
                        </a>
                        <a href="<?php echo get_home_url(); ?>/tai-khoan/">
                            <div class="icon_header">
                                <i class="fal fa-user"></i>
                            </div>
                        </a>


                    </div>
                </div>
                <div class="header_mobile_top">
                    <div class="logo_menu" id="menu-toggle">
                        <i class="fal fa-bars"></i>
                    </div>
                    <div class="logo_shop">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="https://i.imgur.com/z6XLbjF.png" alt="">
                        </a>
                    </div>
                    <a href="<?php echo get_home_url(); ?>/gio-hang/">
                        <div class="cart_mobile" id="">
                            <i class="far fa-cart-arrow-down"></i>
                            <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
                            <span id="mini-cart-count" class="count-cart button product_type_simple add_to_cart_button ajax_add_to_cart cart-quantity badge rounded-pill bg-light text-white"><?php echo $items_count ? $items_count : '0'; ?></span>
                        </div>
                    </a>

                </div>
                <div class="mobile_order_item" id="mobile_order_item">
                </div>
                <div id="mobile-overlay-menu" class="mobile-menu-overlay">

                    <div class="web-container">
                        <div class="logo_shop_ov">
                            <img src="https://i.imgur.com/z6XLbjF.png" alt="">
                        </div>
                        <!-- sreach -->
                        <form action="" method="get">
                            <div class="search_left_mobile">
                                <input type="text" name="s" placeholder="Tìm kiếm">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <!-- end -->


                        <ul class="nav-menu menu">

                            <li>
                                <p id="menu_tp">Thực Phẩm Chức Năng <i class="far fa-angle-down"></i></p>
                                <ul class="sub-menu menu" id="menu_tp_con">
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/thuc-pham-chuc-nang/giam-can/?yith_wcan=1&orderby=date">Giảm
                                            Cân</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/thuc-pham-chuc-nang/thuoc-bo/?yith_wcan=1&orderby=date">Thuốc
                                            Bổ</a></li>
                                </ul>
                            </li>
                            <li>
                                <p href="#" id="menu_csd">Chăm Sóc Da <i class="far fa-angle-down"></i></p>
                                <ul class="sub-menu menu" id="menu_csd_con">
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/cham-soc-da/kem-chong-nang/?yith_wcan=1&orderby=date">Kem
                                            Chống Nắng</a></li>
                                </ul>
                            </li>
                            <li>
                                <p href="#" id="menu_clg">Collagen <i class="far fa-angle-down"></i></p>
                                <ul class="sub-menu menu" id="menu_clg_con">
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/collagen/collagen-dang-nuoc/?yith_wcan=1&orderby=date">
                                            Collagen Dạng Nước</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/collagen/collagen-dang-nuoc/?yith_wcan=1&orderby=date">
                                            Collagen Dạng Viên</a></li>
                                </ul>
                            </li>
                            <li>
                                <p id="menu_td">Trang Điểm <i class="far fa-angle-down"></i></p>
                                <ul class="sub-menu menu" id="menu_td_con">
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/trang-diem/tay-trang/?yith_wcan=1&orderby=date">Tẩy
                                            Trang</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/trang-diem/son-moi/?yith_wcan=1&orderby=date">Son
                                            Môi</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-san-pham/trang-diem/phan-ma-hong/?yith_wcan=1&orderby=date">Phấn
                                            Má Hồng</a></li>
                                </ul>
                            </li>
                            <li>
                                <p href="#" id="menu_cm">Cẩm Nang <i class="far fa-angle-down"></i></p>
                                <ul class="sub-menu menu" id="menu_cm_con">
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-cam-nang/cam-nang-san-pham/">Cẩm
                                            Nang Sản Phẩm</a></li>
                                    <li><a href="<?php echo get_home_url(); ?>/danh-muc-cam-nang/tin-nganh/">Tin
                                            Ngành</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="overlay" class="overlay"></div>
                <div class="header_mobile_bottom">

                    <div class="bottom-menu">
                        <a href="<?php echo get_home_url(); ?>/gioi-thieu/">
                            <i class="fal fa-id-card"></i>
                            <span>Giới Thiệu</span>
                        </a>
                        <a href="<?php echo get_home_url(); ?>/cua-hang/">
                            <i class="far fa-store"></i>
                            <span>Cửa Hàng</span>
                        </a>
                        <a href="<?php echo get_home_url(); ?>/cam-nang/" class="mb_left">
                            <i class="fal fa-book"></i>
                            <span> Cẩm Nang</span>
                        </a>

                        <span class="bosluk"></span>
                        <a href="<?php echo get_home_url(); ?>/" class="sat">
                            <i class="fas fa-home"></i>
                            <span class="home_mb">Trang chủ</span>
                        </a>

                        <a href="<?php echo get_home_url(); ?>/lien-he/" class="mb_right">
                            <i class="fal fa-phone-volume"></i>
                            <span>Liên Hệ</span>
                        </a>
                        <a href="<?php echo get_home_url(); ?>/yeu-thich/">
                            <i class="far fa-heart"></i>
                            <span>Yêu Thích</span>
                        </a>
                        <a href="<?php echo get_home_url(); ?>/tai-khoan/" class="account_mobile_1">
                            <i class="far fa-user-alt"></i>
                            <span>Tài khoản</span>
                        </a>
                        <a id="account_mobile_2" class="account_mobile_2">
                            <i class="far fa-user-alt"></i>
                            <span>Tài khoản</span>
                        </a>


                    </div>
                </div>
                <div class="acc_mobile_right" id="acc_mobile_right">
                    <nav class="menu_acc_woo">
                        <?php
                        if (is_user_logged_in()) {
                            // Đã đăng nhập
                            // Lấy thông tin của người dùng hiện tại
                            $current_user = wp_get_current_user();

                            // Sử dụng hàm get_avatar để lấy ảnh đại diện
                            $avatar_url = get_avatar($current_user->ID, 96); // Thay đổi kích thước ảnh tại đây (ở đây là 96)

                            // Lấy tên của người dùng
                            $user_name = $current_user->display_name;
                        ?>

                            <div class="avt_wrap">
                                <div class="avt">
                                    <?php echo $avatar_url; ?>
                                </div>
                                <div class="avt_name">
                                    <p><?php echo $user_name; ?></p>
                                </div>
                            </div>

                            <ul id="account-menu">
                                <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                                    <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                                        <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                                            <?php echo esc_html($label); ?>
                                        </li>
                                    </a>
                                <?php endforeach; ?>
                            </ul>

                        <?php
                        } else {
                            // Chưa đăng nhập
                            // Hiển thị nút đăng nhập
                        ?>

                     


                            <ul id="account-menu">
                                <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                                    <?php
                                    // Kiểm tra nếu là mục "Log Out" thì không hiển thị
                                    if ($endpoint === 'customer-logout') {
                                        continue;
                                    }
                                    ?>
                                    <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                                        <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                                            <?php echo esc_html($label); ?>
                                        </li>
                                    </a>
                                <?php endforeach; ?>
                            </ul>

                        <?php
                        }
                        ?>
                    </nav>



                </div>
            </div>
            <!-- popup -->
            <div class="popScroll" id="popScroll">
                <div class="popup">
                    <span class="ribbon top-left ribbon-primary">
                        <small>Xin Chào!</small>
                    </span>
                    <h1>Hãy nhập thông tin
                        <button type="button" class="btn_close" id="btn_close"><i class="fas fa-times"></i></button>
                    </h1>

                    <div class="subscribe-widget">
                        <!-- form -->
                        <form id="subscribe-form" action="<?php echo get_home_url(); ?>">
                            <input name="s" placeholder="Nhập thông tin" class="email-form" required>
                            <button type="submit" class="button">Tìm kiếm</button>
                        </form>
                        <!-- end form-->
                    </div>

                </div>

            </div>
            <div class="overlay_popup " id="overlay_popup"></div>
            <!--  -->
        </header>
        <!-- End Header -->
        <script>
            // Đoạn mã JavaScript
            document.addEventListener("DOMContentLoaded", function() {
                var searchIcon = document.getElementById("icon_search");
                var overlayPopup = document.getElementById("overlay_popup");
                var btn_close = document.getElementById("btn_close");
                var popScroll = document.getElementById("popScroll");

                searchIcon.addEventListener("click", function() {
                    overlayPopup.style.display = "block";
                    popScroll.style.display = "flex";



                    // Thêm lớp .active để đưa tới
                    popScroll.classList.add("active");

                    // Sau 0.3 giây (thời gian transition), gỡ bỏ lớp .active để dừng hiệu ứng
                    setTimeout(function() {
                        popScroll.classList.remove("active");
                    }, 300);
                });

                overlayPopup.addEventListener("click", function() {
                    overlayPopup.style.display = "none";
                    popScroll.style.display = "none";
                });
                overlayPopup.addEventListener("click", function() {
                    overlayPopup.style.display = "none";
                    popScroll.style.display = "none";
                });
                btn_close.addEventListener("click", function() {
                    overlayPopup.style.display = "none";
                    popScroll.style.display = "none";
                });
            });
        </script>
        <script>
            // thực hiện active cho menu bottom
            // Lấy URL hiện tại của trang
            var currentURL = window.location.href;

            // Tạo một mảng chứa các liên kết menu
            var menuLinks = document.querySelectorAll(".bottom-menu a");

            // Duyệt qua mảng các liên kết menu
            for (var i = 0; i < menuLinks.length; i++) {
                // So sánh URL của liên kết menu với URL hiện tại
                if (menuLinks[i].href === currentURL) {
                    // Đánh dấu liên kết menu hiện tại bằng lớp "current-page"
                    menuLinks[i].classList.add("active");
                }
            }

            // menu left 
            document.getElementById("menu-toggle").addEventListener("click", function() {
                var mobileMenu = document.getElementById("mobile-overlay-menu");
                var overlay = document.getElementById("overlay");
                mobileMenu.classList.add("show-mobile-menu");
                overlay.style.display = "block";
            });

            document.getElementById("overlay").addEventListener("click", function() {
                var mobileMenu = document.getElementById("mobile-overlay-menu");
                var overlay = document.getElementById("overlay");
                mobileMenu.classList.remove("show-mobile-menu");
                overlay.style.display = "none";
            });
            // 



            //
        </script>
        <script>
            (function($) {
                $(document).ready(function() {
                    $('#menu_tp').click(function(e) {
                        //   $('#menu_tp').hide(); // Hide the parent menu item
                        $('#menu_tp_con').addClass('active'); // Show the submenu
                        $('#menu_csd_con').removeClass('active');
                        $('#menu_clg_con').removeClass('active');
                        $('#menu_td_con').removeClass('active');
                        $('#menu_cm_con').removeClass('active');
                    });
                    $('#menu_csd').click(function(e) {
                        //   $('#menu_tp').hide(); // Hide the parent menu item
                        $('#menu_csd_con').addClass('active'); // Show the submenu
                        $('#menu_tp_con').removeClass('active');
                        $('#menu_clg_con').removeClass('active');
                        $('#menu_td_con').removeClass('active');
                        $('#menu_cm_con').removeClass('active');
                    });
                    $('#menu_clg').click(function(e) {
                        //   $('#menu_tp').hide(); // Hide the parent menu item
                        $('#menu_clg_con').addClass('active'); // Show the submenu
                        $('#menu_tp_con').removeClass('active');
                        $('#menu_csd_con').removeClass('active');
                        $('#menu_td_con').removeClass('active');
                        $('#menu_cm_con').removeClass('active');
                    });
                    $('#menu_td').click(function(e) {
                        //   $('#menu_tp').hide(); // Hide the parent menu item
                        $('#menu_td_con').addClass('active'); // Show the submenu
                        $('#menu_tp_con').removeClass('active');
                        $('#menu_csd_con').removeClass('active');
                        $('#menu_clg_con').removeClass('active');
                        $('#menu_cm_con').removeClass('active');
                    });
                    $('#menu_cm').click(function(e) {

                        //   $('#menu_tp').hide(); // Hide the parent menu item
                        $('#menu_cm_con').addClass('active'); // Show the submenu
                        $('#menu_tp_con').removeClass('active');
                        $('#menu_csd_con').removeClass('active');
                        $('#menu_td_con').removeClass('active');
                        $('#menu_clg_con').removeClass('active');
                    });
                });
            })(jQuery);
        </script>
        <!-- menu account -->
        <script>
            document.getElementById("account_mobile_2").addEventListener("click", function() {
                var acc_mobile_right = document.getElementById("acc_mobile_right");
                var overlay = document.getElementById("overlay");
                acc_mobile_right.classList.add("show_acc_mobile_right");
                overlay.style.display = "block";
            });
            document.getElementById("overlay").addEventListener("click", function() {
                var acc_mobile_right = document.getElementById("acc_mobile_right");
                var overlay = document.getElementById("overlay");
                acc_mobile_right.classList.remove("show_acc_mobile_right");
                overlay.style.display = "none";
            });
        </script>
        <script>
            var icons = [
                'far fa-user',
                'fal fa-luggage-cart',
                'far fa-cloud-download-alt',
                'fal fa-map-marker-alt',
                'far fa-user-circle',
                'fal fa-sign-out'
            ];

            var menuItems = document.querySelectorAll('#account-menu li');

            menuItems.forEach(function(item, index) {
                if (index < icons.length) {
                    var iconElement = document.createElement('i');
                    iconElement.className = icons[index];
                    item.insertBefore(iconElement, item.firstChild);
                }
            });
        </script>