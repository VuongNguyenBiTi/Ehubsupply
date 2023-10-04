<div class="home_category">
    <div class="container">
        <h2>Danh mục sản phẩm</h2>
        <div class="home_category_wrap">
            <?php if (have_rows('category_home', 2)) : ?>
                <?php while (have_rows('category_home', 2)) : the_row();
                    $image = get_sub_field('category_img');
                ?>
                    <div class="category_item">
                        <div class="category_icon">
                            <img src="<?php echo $image; ?>" alt="">
                        </div>
                        <div class="category_title">
                            <h4><?php echo the_sub_field('title'); ?></h4>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>