<?php get_header(); ?>
<div class="contact">
    <div class="contact_breadcrumbs">
        <div class="container">
   
            <h2>
                <a href="<?php echo get_home_url(); ?>">
                    <span>Trang chủ / </span>
                </a>
                <a href="<?php echo get_home_url(); ?>/lien-he/">
                    <span>Liên hệ</span>
                </a>
            </h2>
        </div>
    </div>
    <div class="contact_logo">
        <div class="container">
            <div class="contact_logo_img">
                <img src="https://i.imgur.com/z6XLbjF.png" alt="">
            </div>
        </div>
    </div>
    <div class="support">
        <div class="image">
            <img src="https://i.imgur.com/j2qPxDW.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="support_info">
                        <?php if (have_rows('info_footer')) : ?>
                            <?php while (have_rows('info_footer')) : the_row();
                                $phone = get_sub_field('phone');
                                $address = get_sub_field('address');
                                $email = get_sub_field('email');
                            ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <h2> EHUB SUPPLY COMPANY LIMITED</h2>
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <mask id="mask0_75_3275" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                        <rect y="0.5" width="24" height="24" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_75_3275)">
                                        <path d="M12 12.5C12.55 12.5 13.0208 12.3042 13.4125 11.9125C13.8042 11.5208 14 11.05 14 10.5C14 9.95 13.8042 9.47917 13.4125 9.0875C13.0208 8.69583 12.55 8.5 12 8.5C11.45 8.5 10.9792 8.69583 10.5875 9.0875C10.1958 9.47917 10 9.95 10 10.5C10 11.05 10.1958 11.5208 10.5875 11.9125C10.9792 12.3042 11.45 12.5 12 12.5ZM12 19.85C14.0333 17.9833 15.5417 16.2875 16.525 14.7625C17.5083 13.2375 18 11.8833 18 10.7C18 8.88333 17.4208 7.39583 16.2625 6.2375C15.1042 5.07917 13.6833 4.5 12 4.5C10.3167 4.5 8.89583 5.07917 7.7375 6.2375C6.57917 7.39583 6 8.88333 6 10.7C6 11.8833 6.49167 13.2375 7.475 14.7625C8.45833 16.2875 9.96667 17.9833 12 19.85ZM12 22.5C9.31667 20.2167 7.3125 18.0958 5.9875 16.1375C4.6625 14.1792 4 12.3667 4 10.7C4 8.2 4.80417 6.20833 6.4125 4.725C8.02083 3.24167 9.88333 2.5 12 2.5C14.1167 2.5 15.9792 3.24167 17.5875 4.725C19.1958 6.20833 20 8.2 20 10.7C20 12.3667 19.3375 14.1792 18.0125 16.1375C16.6875 18.0958 14.6833 20.2167 12 22.5Z" fill="#1F2937" />
                                    </g>
                                </svg>
                                <p style="white-space: nowrap;">
                                    Địa chỉ:
                                </p>
                                <p><?php echo $address; ?></p>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <mask id="mask0_75_3278" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                        <rect y="0.5" width="24" height="24" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_75_3278)">
                                        <path d="M19 12.5C19 10.55 18.3208 8.89583 16.9625 7.5375C15.6042 6.17917 13.95 5.5 12 5.5V3.5C13.25 3.5 14.4208 3.7375 15.5125 4.2125C16.6042 4.6875 17.5542 5.32917 18.3625 6.1375C19.1708 6.94583 19.8125 7.89583 20.2875 8.9875C20.7625 10.0792 21 11.25 21 12.5H19ZM15 12.5C15 11.6667 14.7083 10.9583 14.125 10.375C13.5417 9.79167 12.8333 9.5 12 9.5V7.5C13.3833 7.5 14.5625 7.9875 15.5375 8.9625C16.5125 9.9375 17 11.1167 17 12.5H15ZM19.95 21.5C17.8 21.5 15.7042 21.0208 13.6625 20.0625C11.6208 19.1042 9.8125 17.8375 8.2375 16.2625C6.6625 14.6875 5.39583 12.8792 4.4375 10.8375C3.47917 8.79583 3 6.7 3 4.55C3 4.25 3.1 4 3.3 3.8C3.5 3.6 3.75 3.5 4.05 3.5H8.1C8.33333 3.5 8.54167 3.575 8.725 3.725C8.90833 3.875 9.01667 4.06667 9.05 4.3L9.7 7.8C9.73333 8.03333 9.72917 8.24583 9.6875 8.4375C9.64583 8.62917 9.55 8.8 9.4 8.95L6.975 11.4C7.675 12.6 8.55417 13.725 9.6125 14.775C10.6708 15.825 11.8333 16.7333 13.1 17.5L15.45 15.15C15.6 15 15.7958 14.8875 16.0375 14.8125C16.2792 14.7375 16.5167 14.7167 16.75 14.75L20.2 15.45C20.4333 15.5 20.625 15.6125 20.775 15.7875C20.925 15.9625 21 16.1667 21 16.4V20.45C21 20.75 20.9 21 20.7 21.2C20.5 21.4 20.25 21.5 19.95 21.5ZM6.025 9.5L7.675 7.85L7.25 5.5H5.025C5.10833 6.18333 5.225 6.85833 5.375 7.525C5.525 8.19167 5.74167 8.85 6.025 9.5ZM14.975 18.45C15.625 18.7333 16.2875 18.9583 16.9625 19.125C17.6375 19.2917 18.3167 19.4 19 19.45V17.25L16.65 16.775L14.975 18.45Z" fill="#1F2937" />
                                    </g>
                                </svg>
                                <p>
                                    Hotline:
                                </p>
                                <p><a href="tel:<?php echo $phone; ?>" target="_blank"><?php echo $phone; ?></a></p>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <mask id="mask0_75_3281" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                        <rect y="0.5" width="24" height="24" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_75_3281)">
                                        <path d="M4 20.5C3.45 20.5 2.97917 20.3042 2.5875 19.9125C2.19583 19.5208 2 19.05 2 18.5V6.5C2 5.95 2.19583 5.47917 2.5875 5.0875C2.97917 4.69583 3.45 4.5 4 4.5H20C20.55 4.5 21.0208 4.69583 21.4125 5.0875C21.8042 5.47917 22 5.95 22 6.5V18.5C22 19.05 21.8042 19.5208 21.4125 19.9125C21.0208 20.3042 20.55 20.5 20 20.5H4ZM12 13.5L4 8.5V18.5H20V8.5L12 13.5ZM12 11.5L20 6.5H4L12 11.5ZM4 8.5V6.5V18.5V8.5Z" fill="#1F2937" />
                                    </g>
                                </svg>
                                <p>
                                    Email:
                                </p>

                                <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="support_form">
                        <div class="support_form_wrap">
                            <div class="support_form_title">
                                <h2>
                                    Bạn cần hỗ trợ thông tin!
                                </h2>
                                <p>
                                    Hãy gửi thông tin cho chúng tôi nhé
                                </p>
                            </div>
                            <div class="support_form_content">
                                <?php
                                echo do_shortcode('[contact-form-7 id="ff62f19" title="Hỗ trợ"]');
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d479.4070279612742!2d108.21892930000001!3d16.000172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421bd58d60294b%3A0xec41556ff963b277!2zQ8O0bmcgVHkgVGjGsMahbmcgTeG6oWkgVsOgIEPDtG5nIE5naOG7hyBCSVRJ!5e0!3m2!1svi!2s!4v1696216938609!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>


<?php get_footer(); ?>