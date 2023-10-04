<div class="introduce_login">
    <div class="container">
        <div class="introduce_login_wrap">
            <h3>
                Đăng ký nhận bản tin
            </h3>
            <p>Đăng ký để nhận được những thông tin sản phẩm mới và khuyến mãi của chúng tôi</p>
            <div class="login_post">


                <?php
                // Gắn mã shortcode của Contact Form 7 vào đây
                echo do_shortcode('[contact-form-7 id="6645862" title="Đăng Ký Nhận Bản Tin"]');
                ?>




            </div>
        </div>
    </div>
</div>
<style>
    .wpcf7-email {
        width: 360px;
        background: #fff;
        font: inherit;
        /* box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1); */
        box-shadow: #fff;
        border: 0;
        outline: 0;
        padding: 22px 18px;
        margin-right: 44px;
        width: 450px;

    }

    @media (max-width: 600px) {
        .wpcf7-email {
            margin-right: 30px;
            width: 90%;

        }
    }

    .wpcf7-submit {
        display: inline-block;
        background: transparent;
        color: inherit;
        font: inherit;
        border: 0;
        outline: 0;
        padding: 0;
        transition: all 200ms ease-in;
        cursor: pointer;
        background: #F92296;
        color: #fff;
        /* box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1); */
        box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1);

        border-radius: 2px;
        padding: 12px 36px;
        position: absolute;
        right: -12px;
        top: 11px;
    }

    .wpcf7-submit:hover {
        background: rgba(249, 34, 150, 0.96);
    }

    .wpcf7-submit:active {
        background: #F92296;
        box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, 0.2);
    }

    .login_post {
        position: relative;
    }

    .wpcf7-spinner {
        left: 200px;
        top: 10px;
    }
    @media (max-width: 600px) {
        .wpcf7-spinner {
        left: 160px;
    }
    }
    .wpcf7-response-output{
        color:#fff;
    }
</style>