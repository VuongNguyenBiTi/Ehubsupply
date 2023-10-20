<div class="home_service">
    <div class="container">
        <div class="home_service_wrap">
            <div class="row">
                <?php if (have_rows('service_home', 2)) : ?>
                    <?php while (have_rows('service_home', 2)) : the_row();
                        $image = get_sub_field('service_img');
                    ?>
                        <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                            <div class="home_service_item ">
                                <div class="service_top">
                                    <img src="<?php echo $image; ?>" alt="">
                                </div>
                                <div class="service_bottom">
                                    <h4><?php echo the_sub_field('service_title'); ?></h4>
                                    <p><?php echo the_sub_field('service_desc'); ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>