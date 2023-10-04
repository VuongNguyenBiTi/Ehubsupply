<div class="introduce_share">
    <div class="container">
        <div class="row">
            <?php if (have_rows('chia_se_gioi_thieu')) : ?>
                <?php while (have_rows('chia_se_gioi_thieu')) : the_row();
                ?>
                    <div class="col-lg-6 col-md-12">
                        <div class="introduce_share_wrap">
                            <h4>
                                <?php echo  get_sub_field('title');?>
                            </h4>
                            <p><?php echo  get_sub_field('desc');?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">

                    <!-- lỗi js ở đây -->
                    <?php echo  get_sub_field('iframe');?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>