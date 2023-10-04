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

    <?php wp_head(); ?>
</head>

<body <?php body_class('mb-0'); ?>>
    <div id="wrapper">
        <!-- Begin Header -->
        <header class="header">
            <div class="container">
                <div class="header_wrap">
                    <div class="header_logo">
                        <img src="https://i.imgur.com/z6XLbjF.png" alt="logo" class="logo">
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

                            <!-- <ul>
                                <li><a href=""> Trang chủ</a></li>
                                <li><a href="">Sản phẩm <i class="fal fa-angle-down"></i></a></li>
                                <li><a href="">Cẩm nang <i class="fal fa-angle-down"></i></a></li>
                                <li><a href=""> Giới thiệu </a></li>
                                <li><a href=""> Liên hệ</a></li>

                            </ul> -->
                        </div>

                    </div>
                    <div class="header_icon_wrap">
                        <div class="icon_header">
                            <i class="far fa-search"></i>
                        </div>
                        <div class="icon_header">
                            <i class="far fa-shopping-cart"></i>
                        </div>
                        <div class="icon_header">
                            <i class="fal fa-heart"></i>
                        </div>
                        <div class="icon_header">
                            <i class="fal fa-user"></i>
                        </div>
                    </div>
                </div>

            </div>




        </header>
        <!-- End Header -->