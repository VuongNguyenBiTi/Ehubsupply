<div class="home_ads " data-aos="fade-up"
     data-aos-duration="3000">
    <div class="container">
        <div class="row">
            <?php
            $images = get_field('home_ads', 2);
            if ($images) : ?>
                <?php foreach ($images as $image) : ?>
                    <div class="col-lg-6 col-md-12">
                    <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>