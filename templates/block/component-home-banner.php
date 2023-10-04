<div class="home_banner">
    <div class="home_banner_wrap">
        <div class="owl-carousel owl-theme" id="banner_home_owl">
            <?php
            $images = get_field('banner_home', 2);
            if ($images) : ?>
                <?php foreach ($images as $image) : ?>
                    <div class="item">
                        <div class="home_banner_img">
                            <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>
    </div>
</div>