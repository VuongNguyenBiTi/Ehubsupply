<div class="home_feedback">
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl_feedback">
            <!-- <div class="feedback_wrap"> -->
                <?php if (have_rows('home_feedback', 2)) : ?>
                    <?php while (have_rows('home_feedback', 2)) : the_row();
                        $image = get_sub_field('avt');
                    ?>
                        <div class="feedback_item">
                            <div class="feedback_avt">
                                <img src="<?php echo $image; ?>" alt="">
                            </div>
                            <div class="feedback_desc">
                                <p><?php echo the_sub_field('desc'); ?></p>
                            </div>
                            <div class="feedback_star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="feedback_name">
                                <p><?php echo the_sub_field('name'); ?></p>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            <!-- </div> -->
        </div>
        <div class="overlay_fb">

        </div>
    </div>
</div>