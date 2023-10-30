<?php

require get_template_directory() . '/inc/init.php';

function add_favicon()
{
	echo '<link rel="shortcut icon" type="image/png" href="' . get_theme_mod('html_favicon_icon') . '" />';
}
add_action('wp_head', 'add_favicon');


//đổi sang VNĐ

add_filter('woocommerce_currency_symbol', 'change_currency_symbol', 10, 2);
function change_currency_symbol($currency_symbol, $currency)
{
	switch ($currency) {
		case 'VND':
			$currency_symbol = 'VNĐ';
			break;
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
function show_rating($rating_html, $rating, $count)
{
	$rating_html  = '<div class="star-rating">';
	$rating_html .= wc_get_star_rating_html($rating, $count);
	$rating_html .= '</div>';

	return $rating_html;
};
add_filter('woocommerce_product_get_rating_html', 'show_rating', 100, 3);




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






// function hk_handle_register_form()
// {
// 	$userData = [];
// 	if (isset($_POST['userData']) && is_array($_POST['userData'])) {
// 		$userData = $_POST['userData'];
// 	}
// 	$response = array(
// 		'status' => 'error', // Assume there is an error by default
// 		'username_error' => '',
// 		'email_error' => '',
// 		'password_error' => '',
// 		'repassword_error' => ''
// 	);
// 	$has_errors = false; // Biến để kiểm tra có lỗi hay không

// 	$email_error = '';
// 	$username_error = '';
// 	$password_error = '';
// 	$repassword_error = '';

// 	if (isset($userData['_wpnonce']) && wp_verify_nonce($userData['_wpnonce'], 'form_register')) {
// 		$arr_signup = [];

// 		if (isset($userData['email']) && $userData['email']) {
// 			$arr_signup['email'] = sanitize_text_field($userData['email']);

// 			if (email_exists($arr_signup['email'])) {
// 				$email_error = 'Địa chỉ email đã tồn tại<br>';
// 				$has_errors = true; // Đánh dấu có lỗi
// 			}
// 		} else {
// 			$email_error = 'Bạn chưa nhập địa chỉ email<br>';
// 			$has_errors = true; // Đánh dấu có lỗi
// 		}

// 		if (isset($userData['username']) && $userData['username']) {
// 			$arr_signup['username'] = sanitize_text_field($userData['username']);

// 			if (username_exists($arr_signup['username'])) {
// 				$username_error = 'Username đã tồn tại<br>';
// 				$has_errors = true; // Đánh dấu có lỗi
// 			}
// 		} else {
// 			$username_error = 'Bạn chưa nhập username<br>';
// 			$has_errors = true; // Đánh dấu có lỗi
// 		}

// 		if (isset($userData['password']) && $userData['password']) {
// 			$arr_signup['password'] = sanitize_text_field($userData['password']);
// 		} else {
// 			$password_error = 'Bạn chưa nhập password<br>';
// 			$has_errors = true; // Đánh dấu có lỗi
// 		}

// 		if (isset($userData['repassword']) && $userData['repassword']) {
// 			$arr_signup['repassword'] = sanitize_text_field($userData['repassword']);

// 			if ($arr_signup['password'] != $arr_signup['repassword']) {
// 				$repassword_error = 'Xác nhận password chưa trùng nhau<br>';
// 				$has_errors = true; // Đánh dấu có lỗi
// 			}
// 		} else {
// 			$repassword_error = 'Bạn chưa nhập xác nhận password<br>';
// 			$has_errors = true; // Đánh dấu có lỗi
// 		}

// 		if ($has_errors) {
// 			// Set the error messages
// 			$response['username_error'] = $username_error;
// 			$response['email_error'] = $email_error;
// 			$response['password_error'] = $password_error;
// 			$response['repassword_error'] = $repassword_error;
// 		} else {
// 			// Registration successful
// 			$user_id = wp_create_user($arr_signup['username'], $arr_signup['password'], $arr_signup['email']);
// 			if ($user_id) {
// 				$response['status'] = 'success';
// 			}
// 		}

// 		// Return the response as JSON
// 		echo json_encode($response);
// 	}
// 	die();
// }




function hk_handle_register_form()
{
	$userData = [];
	if (isset($_POST['userData']) && is_array($_POST['userData'])) {
		$userData = $_POST['userData'];
	}
	$response = array(
		'status' => 'error', // Giả sử có lỗi mặc định
		'username_error' => '',
		'email_error' => '',
		'password_error' => '',
		'repassword_error' => ''
	);
	$has_errors = false; // Biến để kiểm tra có lỗi hay không

	$email_error = '';
	$username_error = '';
	$password_error = '';
	$repassword_error = '';

	if (isset($userData['_wpnonce']) && wp_verify_nonce($userData['_wpnonce'], 'form_register')) {
		$arr_signup = [];

		if (isset($userData['email']) && $userData['email']) {
			$arr_signup['email'] = sanitize_text_field($userData['email']);

			if (email_exists($arr_signup['email'])) {
				$email_error = 'Địa chỉ email đã tồn tại<br>';
				$has_errors = true; // Đánh dấu có lỗi
			}
		} else {
			$email_error = 'Bạn chưa nhập địa chỉ email<br>';
			$has_errors = true; // Đánh dấu có lỗi
		}

		if (isset($userData['username']) && $userData['username']) {
			$arr_signup['username'] = sanitize_text_field($userData['username']);

			if (username_exists($arr_signup['username'])) {
				$username_error = 'Username đã tồn tại<br>';
				$has_errors = true; // Đánh dấu có lỗi
			}
		} else {
			$username_error = 'Bạn chưa nhập username<br>';
			$has_errors = true; // Đánh dấu có lỗi
		}

		if (isset($userData['password']) && $userData['password']) {
			$arr_signup['password'] = sanitize_text_field($userData['password']);
		} else {
			$password_error = 'Bạn chưa nhập password<br>';
			$has_errors = true; // Đánh dấu có lỗi
		}

		if (isset($userData['repassword']) && $userData['repassword']) {
			$arr_signup['repassword'] = sanitize_text_field($userData['repassword']);

			if ($arr_signup['password'] != $arr_signup['repassword']) {
				$repassword_error = 'Xác nhận password chưa trùng nhau<br>';
				$has_errors = true; // Đánh dấu có lỗi
			}
		} else {
			$repassword_error = 'Bạn chưa nhập xác nhận password<br>';
			$has_errors = true; // Đánh dấu có lỗi
		}

		if ($has_errors) {
			// Đặt thông báo lỗi
			$response['username_error'] = $username_error;
			$response['email_error'] = $email_error;
			$response['password_error'] = $password_error;
			$response['repassword_error'] = $repassword_error;
		} else {
			// Đăng ký thành công
			$user_id = wp_create_user($arr_signup['username'], $arr_signup['password'], $arr_signup['email']);
			if ($user_id) {
				// Đăng nhập người dùng sau khi đăng ký thành công
				$user = get_user_by('id', $user_id);
				wp_set_current_user($user_id, $user->user_login);
				wp_set_auth_cookie($user_id);
				do_action('wp_login', $user->user_login);

				$response['status'] = 'success';
			}
		}

		// Trả kết quả dưới dạng JSON
		echo json_encode($response);
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
function wpshare247_format_money($amount, $currency = false)
{
	if ($currency) {
		return number_format($amount, 0, '.', '.') . '' . wpshare247_get_currency();
	}
	return number_format($amount, 0, '.', '.');
};

//upload avt

function hk_user_upload_image($file = array())
{
	require_once(ABSPATH . 'wp-admin/includes/admin.php');
	$file_return = wp_handle_upload($file, array('test_form' => false));

	if (isset($file_return['error']) || isset($file_return['upload_error_handler'])) {
		return false;
	} else {
		$filename = $file_return['file'];
		$attachment = array(
			'post_mime_type' => $file_return['type'],
			'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
			'post_content'   => '',
			'post_status'    => 'inherit',
			'guid'           => $file_return['url']
		);
		$attachment_id = wp_insert_attachment($attachment, $file_return['url']);
		require_once(ABSPATH . 'wp-admin/includes/image.php');
		$attachment_data = wp_generate_attachment_metadata($attachment_id, $filename);
		wp_update_attachment_metadata($attachment_id, $attachment_data);
		if (0 < intval($attachment_id)) {
			return array(
				'url' => $file_return['url'],
				'id'  => $attachment_id
			);
		}
	}
	return false;
}
add_action('wp_ajax_change_user_avatar', 'hk_change_user_avatar');
function hk_change_user_avatar()
{
	$file_upload = $_FILES['upload_avatar'];
	$user_id     = get_current_user_id();
	$avatar_data = array();

	if (isset($file_upload) && $file_upload) {
		$avatar_data = hk_user_upload_image($file_upload);

		if ($avatar_data) {

			$custom_avatar = get_user_meta($user_id, 'custom_avatar', true);
			if ($custom_avatar) {
				update_user_meta($user_id, 'custom_avatar', $avatar_data['url']);
			} else {
				add_user_meta($user_id, 'custom_avatar', $avatar_data['url']);
			}

			wp_send_json_success($avatar_data['url'], 200);
		}
	}

	die();
}

add_filter("get_avatar", "hk_custom_user_avatar", 1, 5);
function hk_custom_user_avatar($avatar, $id_or_email, $size, $alt, $args)
{
	$user       = false;
	$user_id    = '';
	$avatar_url = '';

	if (is_numeric($id_or_email)) {

		$id   = (int) $id_or_email;
		$user = get_user_by('id', $id);
	} elseif (is_object($id_or_email)) {

		if (!empty($id_or_email->user_id)) {
			$id   = (int) $id_or_email->user_id;
			$user = get_user_by('id', $id);
		}
	} else {
		$user = get_user_by('email', $id_or_email);
	}

	if ($user && is_object($user)) {
		$user_id     = $user->data->ID;
		$avatar_url  = get_user_meta($user_id, 'custom_avatar', true);
		$replace_img = get_avatar_url($user_id);
		$output_img  = '';

		if (isset($avatar_url) && $avatar_url) {
			$output_img = $avatar_url;
		} else {
			$output_img = $replace_img;
		}

		$avatar = '<img class="avatar" src="' . $output_img . '" width="' . $size . '" height="' . $size . '" />';
	}

	return $avatar;
};





// test btn mua ngay
add_action('woocommerce_after_add_to_cart_button', 'devvn_quickbuy_after_addtocart_button');
function devvn_quickbuy_after_addtocart_button()
{
	global $product;
?>
	<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt btn_mua_ngay" id="buy_now_button">
		<?php _e('Mua ngay', 'devvn'); ?>
	</button>
	<input type="hidden" name="is_buy_now" id="is_buy_now" value="0" />
	<script>
		jQuery(document).ready(function() {
			jQuery('body').on('click', '#buy_now_button', function() {
				if (jQuery(this).hasClass('disabled')) return;
				var thisParent = jQuery(this).closest('form.cart');
				jQuery('#is_buy_now', thisParent).val('1');
				thisParent.submit();
			});
		});
	</script>
	<?php
}
add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url)
{
	if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
		$redirect_url = wc_get_checkout_url();
	}
	return $redirect_url;
}


// ajax sp yêu thích
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
	function yith_wcwl_get_items_count() {
	  ob_start();
	  ?>
		  <span class="yith-wcwl-items-count" style=" padding-right: 11px;">
			<i class="yith-wcwl-icon fa fa-heart-o"><?php echo esc_html( yith_wcwl_count_all_products() ); ?></i>
		  </span>
	  <?php
	  return ob_get_clean();
	}
  
	add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
  }
  
  if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
	function yith_wcwl_ajax_update_count() {
	  wp_send_json( array(
		'count' => yith_wcwl_count_all_products()
	  ) );
	}
  
	add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
  }
  
  if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
	function yith_wcwl_enqueue_custom_script() {
	  wp_add_inline_script(
		'jquery-yith-wcwl',
		"
		  jQuery( function( $ ) {
			$( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
			  $.get( yith_wcwl_l10n.ajax_url, {
				action: 'yith_wcwl_update_wishlist_count'
			  }, function( data ) {
				$('.yith-wcwl-items-count').children('i').html( data.count );
			  } );
			} );
		  } );
		"
	  );
	}
  
	add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
  }