<?php

require get_template_directory() . '/inc/init.php';

function add_favicon()
{
    echo '<link rel="shortcut icon" type="image/png" href="' . get_theme_mod('html_favicon_icon') . '" />';
}
add_action('wp_head', 'add_favicon');


//đổi sang VNĐ

add_filter('woocommerce_currency_symbol', 'change_currency_symbol', 10, 2);
function change_currency_symbol( $currency_symbol, $currency ) {
 switch( $currency ) {
 case 'VND': $currency_symbol = 'VNĐ'; break;
 }
 return $currency_symbol;
}


// ajax-refresh-mini-cart-count-----------------------------------------------
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments)
{
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
?>
    <span id="mini-cart-count" class="button bl__ajax-minicount ajax_add_to_cart cart-quantity badge rounded-pill bg-warning text-white">
        <?php echo $items_count ? $items_count : '0'; ?>
    </span>
<?php
    $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

// ajax-refresh-mini-cart-count-----mobile------------------------------------------
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count_mobile');
function wc_refresh_mini_cart_count_mobile($fragments)
{
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
?>
    <span id="mini-cart-count-mobile" class="button bl__ajax-minicount ajax_add_to_cart cart-quantity badge rounded-pill bg-warning text-white">
        <?php echo $items_count ? $items_count : '0'; ?>
    </span>
<?php
    $fragments['#mini-cart-count-mobile'] = ob_get_clean();
    return $fragments;
}

//hiển thị sao khi không có cmt
function show_rating( $rating_html, $rating, $count ) {
    $rating_html  = '<div class="star-rating">';
    $rating_html .= wc_get_star_rating_html( $rating, $count );
    $rating_html .= '</div>';

    return $rating_html;
};  
add_filter( 'woocommerce_product_get_rating_html', 'show_rating', 100, 3 );




// xóa các field ko dùng đến 
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields', 99);
function custom_override_checkout_fields($fields)
{


    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_address_2']);


    //  unset($fields['shipping']['shipping_country']);
    //  unset($fields['shipping']['shipping_state']);
    unset($fields['shipping']['shipping_postcode']);
    //  unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    //  unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_last_name']);
    //  unset($fields['shipping']['shipping_city']);


    //  unset($fields['order']['order_comments']);

    return $fields;
}

// xử lý đăng kí
add_action('wp_ajax_RegisterAction', 'hk_handle_register_form');
add_action('wp_ajax_nopriv_RegisterAction', 'hk_handle_register_form');

function hk_handle_register_form() {
    $userData = [];
    if ( isset( $_POST['userData'] ) && is_array( $_POST['userData'] ) ) {
        $userData = $_POST['userData'];
    }

	if ( isset( $userData['_wpnonce'] ) && wp_verify_nonce( $userData['_wpnonce'], 'form_register' ) ) {
		$arr_signup = [];
		$arr_error  = [];

		if ( isset( $userData['email'] ) && $userData['email'] ) {
			$arr_signup['email'] = sanitize_text_field( $userData['email'] );

			if ( email_exists( $arr_signup['email'] ) ) {
				$arr_error['email'] = 'Địa chỉ email đã tồn tại';
			}
		} else {
			$arr_error['email'] = 'Bạn chưa nhập địa chỉ email';
		}

		if ( isset( $userData['username'] ) && $userData['username'] ) {
			$arr_signup['username'] = sanitize_text_field( $userData['username'] );

			if ( username_exists( $arr_signup['username'] ) ) {
				$arr_error['username'] = 'Username đã tồn tại';
			}
		} else {
			$arr_error['username'] = 'Bạn chưa nhập username';
		}

		if ( isset( $userData['password'] ) && $userData['password'] ) {
			$arr_signup['password'] = sanitize_text_field( $userData['password'] );
		} else {
			$arr_error['password'] = 'Bạn chưa nhập password';
		}

		if ( isset( $userData['repassword'] ) && $userData['repassword'] ) {
			$arr_signup['repassword'] = sanitize_text_field( $userData['repassword'] );

			if ( $arr_signup['password'] != $arr_signup['repassword'] ) {
				$arr_error['repassword'] = 'Xác nhận password chưa trùng nhau';
			}
		} else {
			$arr_error['repassword'] = 'Bạn chưa nhập xác nhận password';
		}


		if ( count( $arr_error ) ) {
			echo '<ul>';
			foreach ( $arr_error as $key => $error ) {
				echo '<li>'.$error.'</li>';
			}
			echo '</ul>';
		} else {
			$user_id = wp_create_user( $arr_signup['username'], $arr_signup['password'], $arr_signup['email'] );
			if ( $user_id ) {
				$arr_signup = [];
				echo 'success';
			}
		}

	}
    die(); 
}


// test phân trang
//Code phan trang



// function new_loop_shop_per_page( $cols ) {
// 	// $cols contains the current number of products per page based on the value stored on Options –> Reading
// 	// Return the number of products you wanna show per page.
// 	$cols = 5;
// 	return $cols;
//   }


// format giá
function wpshare247_format_money($amount, $currency=false){
    if($currency){
        return number_format($amount, 0, '.', '.'). ''. wpshare247_get_currency();
    }
    return number_format($amount, 0, '.', '.');
}