<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
	<div class="u-columns col2-set" id="customer_login">
		<div class="u-column1 col-1">
		<?php endif; ?>
		<div class="login_main">
			<div class="login_wrap">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 col1">
						<img src="https://colorlib.com/etc/regform/colorlib-regform-20/images/registration-form-4.jpg" alt="">
					</div>
					<div class="col-lg-6 col-md-6 col-12 col2" id="id_dangki">
						<!-- <main id="site-content">
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
										<?php
										$username_error = '';
										$email_error = '';
										$password_error = '';
										$repassword_error = '';
										?>
										<p style="display:none" id="hk-success">
											Đăng ký người dùng thành công. Mời bạn nhập thông tin vào form đăng nhập.
										</p>
										<p>
											<label class="lb_user lb">Tên đăng nhập&nbsp;<span class="required">*</span></label>
											<input type="text" name="username" id="username">
											<?php echo $username_error; ?>
										</p>

										<p>
											<label class="lb_email lb">Nhập Email&nbsp;<span class="required">*</span></label>

											<input type="email" name="email" id="email">
											<?php echo $email_error; ?>
										</p>
										<p>
											<label class="lb_pass lb">Nhập mật khẩu&nbsp;<span class="required">*</span></label>

											<input type="password" name="password" id="password">
											<?php echo $password_error; ?>
										</p>
										<p>
											<label class="lb_repass lb">Xác nhận lại mật khẩu&nbsp;<span class="required">*</span></label>

											<input type="password" name="repassword" id="repassword">
											<?php echo $repassword_error; ?>
										</p>
										<p class="text-center mb-0">
											<button class="form-submit" type="submit">Đăng ký</button>
											<span id="btn_dangnhap">Đăng nhập</span>
										</p>
									</form>
								<?php } ?>
							</div>
						</main> -->
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
										<?php
										$username_error = '';
										$email_error = '';
										$password_error = '';
										$repassword_error = '';
										?>
										<p style="display:none" id="hk-success">
											Đăng ký người dùng thành công. Mời bạn nhập thông tin vào form đăng nhập.
										</p>
										<p>
											<label class="lb_user lb">Tên đăng nhập&nbsp;<span class="required">*</span></label>
											<input type="text" name="username" id="username">
											<?php echo $username_error; ?>
										</p>

										<p>
											<label class="lb_email lb">Nhập Email&nbsp;<span class="required">*</span></label>
											<input type="email" name="email" id="email">
											<?php echo $email_error; ?>
										</p>
										<p>
											<label class="lb_pass lb">Nhập mật khẩu&nbsp;<span class="required">*</span></label>
											<input type="password" name="password" id="password">
											<?php echo $password_error; ?>
										</p>
										<p>
											<label class="lb_repass lb">Xác nhận lại mật khẩu&nbsp;<span class="required">*</span></label>
											<input type="password" name="repassword" id="repassword">
											<?php echo $repassword_error; ?>
										</p>
										<p class="text-center mb-0">
											<button class="form-submit" type="submit">Đăng ký</button>
											<span id="btn_dangnhap">Đăng nhập</span>
										</p>
									</form>
								<?php } ?>
							</div>
						</main>

					</div>
					<div class="col-lg-6 col-md-6 col-12 col2" id="id_dangnhap">
						<?php
						$login_error = '';
						if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
							// Check if username and password fields are empty
							if (empty($_POST['username'])) {
								$username_error = 'Vui lòng nhập tên người dùng hoặc địa chỉ email.';
							}

							if (empty($_POST['password'])) {
								$password_error = 'Vui lòng nhập mật khẩu.';
							}

							// If both fields are not empty, perform login validation
							if (empty($username_error) && empty($password_error)) {
								$username = $_POST['username'];
								$password = $_POST['password'];

								// Define a simple login validation function
								function your_login_validation_function($entered_username, $entered_password)
								{
									// Replace this with your actual login validation logic.
									$valid_username = 'your_valid_username';
									$valid_password = 'your_valid_password';

									if ($entered_username === $valid_username && $entered_password === $valid_password) {
										return true;
									} else {
										return false;
									}
								}

								// Check if login credentials are valid
								if (your_login_validation_function($username, $password)) {
									// Valid login credentials, perform the desired action.
									// You can also set a success message here if needed.
								} else {
									$login_error = 'Thông tin đăng nhập không hợp lệ.';
								}
							}
						}

						// Display the error message if login error exists
						if (!empty($login_error)) {
							$error_login_ms = '<div class="error-message">' . esc_html($login_error) . '</div>';
						}
						?>

						<div class="dang_nhap_main">
							<h2><?php esc_html_e('Login', 'woocommerce'); ?></h2>
							<form class="woocommerce-form woocommerce-form-login login" method="post">
								<?php do_action('woocommerce_login_form_start'); ?>

								<div class="error-message">
									<?php
									if (!empty($login_error)) {
										echo $login_error;
									}
									?>

								</div>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />

								<div class="error-message">
									<?php
									if (!empty($username_error)) {
										echo $username_error;
									}
									?>
								</div>
								</p>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
								<div class="error-message">
									<?php
									if (!empty($password_error)) {
										echo $password_error;
									}
									?>
								</div>
								</p>
								<?php do_action('woocommerce_login_form'); ?>
								<p class="form-row">
									<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
									</label>
									<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
									<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
								</p>

								<div class="dangnhap_bt">
									<p class="woocommerce-LostPassword lost_password">
										<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
									</p>
									<p id="bt_create"> Tạo tài khoản</p>
								</div>
								<?php do_action('woocommerce_login_form_end'); ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
		</div>
		<div class="u-column2 col-2">
			<h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>
			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>
				<?php do_action('woocommerce_register_form_start'); ?>
				<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																		?>
					</p>
				<?php endif; ?>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																														?>
				</p>
				<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
					</p>
				<?php else : ?>
					<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>
				<?php endif; ?>
				<?php do_action('woocommerce_register_form'); ?>
				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
				</p>
				<?php do_action('woocommerce_register_form_end'); ?>
			</form>
		</div>
	</div>
<?php endif; ?>
<?php do_action('woocommerce_after_customer_login_form'); ?>
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

				// Clear previous error messages
				$('#hk-message').html('');
				$('#username + .error').remove();
				$('#email + .error').remove();
				$('#password + .error').remove();
				$('#repassword + .error').remove();

				$.ajax({
					type: "POST",
					url: ajaxUrl,
					data: {
						'action': 'RegisterAction',
						'userData': data
					},
					dataType: "json",
					beforeSend: function() {},
					success: function(response) {
						if (response.status === 'success') {

						} else {
							// Display new error messages
							if (response.username_error) {
								$('#username').after('<span class="error">' + response.username_error + '</span>');
							}
							if (response.email_error) {
								$('#email').after('<span class="error">' + response.email_error + '</span>');
							}
							if (response.password_error) {
								$('#password').after('<span class="error">' + response.password_error + '</span>');
							}
							if (response.repassword_error) {
								$('#repassword').after('<span class="error">' + response.repassword_error + '</span>');
							}
						}
					},
					error: function(error) {
						window.location.href = '<?php echo get_home_url(); ?>';
					}
				});
			});
		});






	})(jQuery);
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Get the elements and buttons
		const dangkiDiv = document.getElementById("id_dangki");
		const dangnhapDiv = document.getElementById("id_dangnhap");
		const createButton = document.getElementById("bt_create");
		const loginButton = document.getElementById("btn_dangnhap");

		// Function to show the registration form and hide the login form
		function showRegistrationForm() {
			dangkiDiv.style.display = "block";
			dangnhapDiv.style.display = "none";
		}

		// Function to show the login form and hide the registration form
		function showLoginForm() {
			dangkiDiv.style.display = "none";
			dangnhapDiv.style.display = "block";
		}

		// Initially, show the login form and hide the registration form
		showLoginForm();

		// Add a click event listener to the "Tạo tài khoản" button
		createButton.addEventListener("click", function() {
			showRegistrationForm();
		});

		// Add a click event listener to the "Đăng nhập" button
		loginButton.addEventListener("click", function() {
			showLoginForm();
		});
	});
</script>
<style>
	.error-message {
		color: red;
		text-align: center;
	}

	.username {
		margin-bottom: 10px !important;
	}

	.password {
		margin-bottom: 10px !important;
	}

	.error {
		color: red;
	}

	.woocommerce-notices-wrapper {
		display: none;
	}

	#username {
		width: 100%;
		padding: 10px;
		border: 1px solid #ff9a9c;
		border-radius: 25px;
		font-size: 16px;
		color: #333;
	}

	#username:focus {
		outline: none;
		border-color: #ff9a9c;
		/* Change the border color on focus */
		box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		/* Add a subtle box shadow on focus */
	}

	#email {
		width: 100%;
		padding: 10px;
		border: 1px solid #ff9a9c;
		border-radius: 25px;
		font-size: 16px;
		color: #333;
	}

	#email:focus {
		outline: none;
		border-color: #ff9a9c;
		/* Change the border color on focus */
		box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		/* Add a subtle box shadow on focus */
	}

	#password {
		width: 100%;
		padding: 10px;
		border: 1px solid #ff9a9c;
		border-radius: 25px;
		font-size: 16px;
		color: #333;
	}

	#password:focus {
		outline: none;
		border-color: #ff9a9c;
		/* Change the border color on focus */
		box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		/* Add a subtle box shadow on focus */
	}

	#repassword {
		width: 100%;
		padding: 10px;
		border: 1px solid #ff9a9c;
		border-radius: 25px;
		font-size: 16px;
		color: #333;
	}

	#repassword:focus {
		outline: none;
		border-color: #ff9a9c;
		/* Change the border color on focus */
		box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		/* Add a subtle box shadow on focus */
	}

	.tintuc-main {
		background-color: #fad9d2;
	}

	.form-submit {
		background-color: #ff9a9c;
	}

	.dangnhap_bt {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.dangnhap_bt p {
		margin-top: 10px;
	}

	/* form login  */
	.login_main {
		padding: 50px 0px 50px 0px;
		background-color: #fad9d2;


	}

	.text-center {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.text-center span {
		color: #ff9a9c;
		cursor: pointer;

	}

	.login_wrap {
		background-color: #fff;
		padding: 40px 20px 5px 20px;
		box-shadow: 0 0 10px 0 rgba(0, 0, 0, .2);
		-webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, .2);
		max-width: 850px;
		margin: 0 auto;

	}


	.section-inner h1 {
		font-size: 35px;
		font-family: "elmessiri-semibold";
		text-align: center;
		margin-bottom: 27px;
		color: #ff9a9c;
	}

	label {
		color: #ff9a9c;
	}

	/* ddawng nhap
	 */
	.dang_nhap_main {
		max-width: 400px;
		margin: 0 auto;
		padding: 20px;

		background-color: #ffffff;
		border: 1px solid #ccc;
		border-radius: 5px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		text-align: center;

	}

	.dang_nhap_main h2 {
		font-size: 24px;
		/* margin-bottom: 20px; */
		border-bottom: 1px solid #ccc;
		padding-bottom: 20px;
		/* border: 1px solid #ccc; */
		font-size: 35px;
		font-family: "elmessiri-semibold";
		text-align: center;
		margin-bottom: 27px;
		color: #ff9a9c;
	}

	.dang_nhap_main form.login {
		display: flex;
		flex-direction: column;
		border: none;
	}

	.dang_nhap_main label {
		font-weight: bold;
		margin-bottom: 10px;
	}

	.dang_nhap_main input[type="text"],
	.dang_nhap_main input[type="password"] {
		width: 100%;
		padding: 10px;
		margin-bottom: 15px;
		border: 1px solid #ccc;
		border-radius: 5px;
	}

	.dang_nhap_main input[type="checkbox"] {
		margin-right: 5px;
	}

	.dang_nhap_main button.woocommerce-button {
		letter-spacing: 2px;
		border: none;
		width: 133px;
		height: 42px;
		border-radius: 23.5px;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 0;
		background: #ff9a9c;
		font-size: 15px;
		color: #fff;
		text-transform: uppercase;
		font-family: "montserrat-semibold";
		-webkit-transform: perspective(1px) translateZ(0);
		transform: perspective(1px) translateZ(0);
		box-shadow: 0 0 1px transparent;
	}

	.dang_nhap_main button.woocommerce-button:hover {
		-webkit-animation: hvr-wobble-horizontal 1s ease-in-out 1;
		animation: hvr-wobble-horizontal 1s ease-in-out 1;
		background-color: #ff9a9c;
		color: #fff;
	}



	.dang_nhap_main .woocommerce-LostPassword {
		margin-top: 10px;
	}

	.dang_nhap_main a {
		color: #ff9a9c;
		text-decoration: none;
	}

	#bt_create {
		color: #ff9a9c;
		cursor: pointer;
	}

	.dang_nhap_main a:hover {
		text-decoration: underline;
	}

	.woocommerce-form-login.login {
		margin: 0 !important;
		padding: 0 !important;
	}

	/* ddawng kis */
	#site-content {
		background-color: #fff;
		/* padding: 20px; */
		border-radius: 5px;
		/* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
		text-align: center;
	}

	.section-inner {
		max-width: 400px;
		margin: 0 auto;
		padding: 20px;
		background-color: #fff;
		border-radius: 5px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		border: 1px solid #ccc;


	}

	h1 {
		font-size: 24px;
		margin-bottom: 20px;
	}

	form#hk-registerform {
		margin-top: 20px;
	}

	#hk-success {
		color: green;
		margin-top: 10px;
		font-weight: bold;
	}

	form input[type="text"],
	form input[type="email"],
	form input[type="password"] {
		width: 100%;
		padding: 10px;
		margin: 10px 0;
		border: 1px solid #ccc;
		border-radius: 5px;
	}

	.form-submit {
		padding: 10px 20px;
		border-radius: 5px;
		font-weight: bold;
		letter-spacing: 2px;
		border: none;
		width: 133px;
		height: 47px;
		margin-right: 19px;
		border-radius: 23.5px;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 0;
		background: #ff9a9c;
		font-size: 15px;
		color: #fff;
		text-transform: uppercase;
		font-family: "montserrat-semibold";
		-webkit-transform: perspective(1px) translateZ(0);
		transform: perspective(1px) translateZ(0);
		box-shadow: 0 0 1px transparent;


	}

	.form-submit:hover {
		-webkit-animation: hvr-wobble-horizontal 1s ease-in-out 1;
		animation: hvr-wobble-horizontal 1s ease-in-out 1;
	}

	@-webkit-keyframes hvr-wobble-horizontal {
		16.65% {
			-webkit-transform: translateX(8px);
			transform: translateX(8px);
		}

		33.3% {
			-webkit-transform: translateX(-6px);
			transform: translateX(-6px);
		}

		49.95% {
			-webkit-transform: translateX(4px);
			transform: translateX(4px);
		}

		66.6% {
			-webkit-transform: translateX(-2px);
			transform: translateX(-2px);
		}

		83.25% {
			-webkit-transform: translateX(1px);
			transform: translateX(1px);
		}

		100% {
			-webkit-transform: translateX(0);
			transform: translateX(0);
		}
	}

	@keyframes hvr-wobble-horizontal {
		16.65% {
			-webkit-transform: translateX(8px);
			transform: translateX(8px);
		}

		33.3% {
			-webkit-transform: translateX(-6px);
			transform: translateX(-6px);
		}

		49.95% {
			-webkit-transform: translateX(4px);
			transform: translateX(4px);
		}

		66.6% {
			-webkit-transform: translateX(-2px);
			transform: translateX(-2px);
		}

		83.25% {
			-webkit-transform: translateX(1px);
			transform: translateX(1px);
		}

		100% {
			-webkit-transform: translateX(0);
			transform: translateX(0);
		}
	}


	/* p .form-submit:hover {
		background-color: #0059b3;
	} */

	.lb {
		display: flex;
		color: #ff9a9c;
		font-weight: 700;
	}

	.required {
		color: red;
	}

	.meta-data {
		display: none;
	}

	#hk-message ul li {
		color: red;
		list-style-type: none;
	}

	@media (max-width: 500px) {
		.col1 {
			order: 2;
		}

		.col2 {
			order: 1;
		}

		.login_main {
			padding: 0;
		}
	}
</style>