<div class="our_partners">
    <div class="container">
        <div class="our_partners_wrap">
            <h3>Our partners</h3>
            <div class="owl-carousel owl-theme" id="owl_our_partners">
                <?php
                $images = get_field('doi_tac_gioi_thieu');
                if ($images) : ?>
                    <?php foreach ($images as $image) : ?>
                        <div class="item_our_partners">
                            <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>