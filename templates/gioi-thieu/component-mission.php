<div class="mission">
    <div class="container">
        <div class="row">
            <?php if (have_rows('mission_gioi_thieu')) : ?>
                <?php while (have_rows('mission_gioi_thieu')) : the_row();
                    $image = get_sub_field('image');
                    $image1 = get_sub_field('image1');
                ?>
                    <div class="col-lg-6 col-md-5">
                        <div class="mission_img">
                            <div class="img2">
                                <img src="<?php echo $image1 ?>" alt="">
                            </div>
                            <div class="img1">
                                <img src="<?php echo $image ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="row">
                            <div class="mission_wrap">
                                <div class="col-lg-12">
                                    <div class="mission_item">
                                        <h4>
                                            <?php the_sub_field('vision'); ?>
                                        </h4>
                                        <p>
                                            <?php the_sub_field('title_vision'); ?> </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mission_item">
                                        <h4>
                                            <?php the_sub_field('mission'); ?>
                                        </h4>
                                        <p>
                                            <?php the_sub_field('title_mission'); ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>





        </div>

    </div>
</div>