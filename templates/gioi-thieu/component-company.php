<div class="introduce_company">
    <div class="contact_breadcrumbs">
        <div class="container">

            <p>
                <a href="<?php echo get_home_url(); ?>">
                    <span>Trang chủ / </span>
                </a>
                <a href="<?php echo get_home_url(); ?>/gioi-thieu/">
                    <span>Giới thiệu</span>
                </a>
            </p>
        </div>
    </div>
    <div class="container">

        <div class="introduce_company_wrap">
            <?php if (have_rows('gioi_thieu_cong_ty')) : ?>
                <?php while (have_rows('gioi_thieu_cong_ty')) : the_row();
                    $name_company = get_sub_field('name_company');
                    $desc_company = get_sub_field('desc_company');

                ?>

                    <h2>
                        <?php echo $name_company; ?>
                    </h2>
                    <p><?php echo $desc_company; ?></p>


                <?php endwhile; ?>
            <?php endif; ?>





        </div>
    </div>
</div>