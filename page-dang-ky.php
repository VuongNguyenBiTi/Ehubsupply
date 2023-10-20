<?php get_header(); ?>

<main id="site-content">
	<div class="section-inner">

		<?php
		$home_url = get_home_url();
		if (is_user_logged_in()) {

			echo 'Bạn đã đăng nhập rồi. <a href="' . wp_logout_url($home_url) . '">Đăng xuất</a> ?';
		} else {
		?>
			<h1>Đăng ký</h1>
			<hr>
			<form id="hk-registerform" action="<?php echo get_home_url() . '/dang-ky'; ?>">
				<?php wp_nonce_field('form_register'); ?>
				<div id="hk-message"></div>
				<p style="display:none" id="hk-success">
					Đăng ký người dùng thành công. Nhấp vào <a href="<?php echo get_home_url(); ?>/dang-nhap">đây</a> để đăng nhập.
				</p>
				<p>
					<input type="text" name="username" id="username" placeholder="Tên đăng nhập">
				</p>
				<p>
					<input type="email" name="email" id="email" placeholder="Email">
				</p>
				<p>
					<input type="password" name="password" id="password" placeholder="Mật khẩu">
				</p>
				<p>
					<input type="password" name="repassword" id="repassword" placeholder="Xác nhận mật khẩu">
				</p>
				<p class="text-center mb-0">
					<button class="form-submit" type="submit">Đăng ký</button>
				</p>
			</form>

		<?php } ?>

	</div>


	<div class="section-inner">

		<?php
		$home_url = get_home_url();
		if (is_user_logged_in()) {

			echo 'Bạn đã đăng nhập rồi. <a href="' . wp_logout_url($home_url) . '">Đăng xuất</a> ?';
		} else {

			$args = array(
				'redirect' => $home_url,
			);

			wp_login_form($args);
		}
		?>

	</div>
</main>

<?php get_footer(); ?>
<script>
	(function($) {
		$(document).ready(function() {
			var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
			$('#hk-registerform').submit(function(e) {
				e.preventDefault();
				var data = {};
				var ArrayForm = $(this).serializeArray();
				$.each(ArrayForm, function() {
					data[this.name] = this.value;
				});

				$.ajax({
					type: "POST",
					url: ajaxUrl,
					data: {
						'action': 'RegisterAction',
						'userData': data
					},
					dataType: "html",
					beforeSend: function() {},
					success: function(response) {
						$('#hk-message').html(response);
						if (response == 'success') {
							$("#hk-registerform")[0].reset();
							$('#hk-message').hide();
							$('#hk-success').show();
						}
					}
				});
			});
		});
	})(jQuery);
</script>
<style>
#site-content {
    display: flex;
    justify-content: space-between;
    margin: 20px;
    background-color: #f0f0f0; /* Màu nền cho toàn bộ #site-content */
    padding: 20px; /* Khoảng cách giữa #site-content và nền */
}

.section-inner {
    flex: 1;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff; /* Màu nền cho mỗi .section-inner */
    margin-right: 10px;
    border-radius: 5px; /* Góc bo tròn */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng đổ */
}

#hk-registerform {
    margin-top: 20px;
}

#hk-success {
    color: green;
    margin-top: 10px;
    font-weight: bold;
}

form p {
    margin: 10px 0;
}

form input {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-submit {
    background-color: #0073e6;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.form-submit:hover {
    background-color: #0059b3;
}



</style>