<?php get_header(); ?>
<?php get_template_part('templates/block', 'breadcrumb'); ?>
<main class="cam_nang_main">
    <!-- lấy theo thời gian mới nhất -->
    <?php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        // 'orderby'    => 'name',
        'orderby'    => 'date', // Sắp xếp theo thời gian
        'order'      => 'DESC', // Sắp xếp giảm dần (mới nhất đầu tiên)
        'hide_empty'               => 1,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'danh-muc-cam-nang',
        'pad_counts'               => false,
    );

    $categories = get_categories($args);
    foreach ($categories as $cat) {
        $posts_array_time = get_posts(
            array(
                'posts_per_page' => 10,
                'post_type' => '',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'danh-muc-cam-nang',
                        'field' => 'term_id',
                        'terms' => $cat->term_id,
                    )
                )
            )
        );
    }
    wp_reset_postdata();
    ?>
    <div class="contact_breadcrumbs">
        <div class="container">
            <h2>Trang chủ / <span><?php echo $post_title = get_the_title($post->ID); ?></span></h2>
        </div>
    </div>
    <div class="single_cam_nang">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="bg_left">
                        <div class="left_cm">
                            <div class="image_cam_nang ">
                                <?php echo $post_image = get_the_post_thumbnail($post->ID, 'full'); ?>
                            </div>
                            <h1> <?php the_title(); ?></h1>
                            <p>
                                <?php the_content(); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="cam_nang_right">
                        <div class="title_right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <mask id="mask0_57_2314" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                    <rect width="24" height="24" fill="#D9D9D9" />
                                </mask>
                                <g mask="url(#mask0_57_2314)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.95 20.3L12.3 23.6L15.65 20.3H20.3V15.65L23.6 12.3L20.3 8.95V4.3H15.65L12.3 1L8.95 4.3H4.3V8.95L1 12.3L4.3 15.65V20.3H8.95ZM14.8 18.3L12.3 20.8L9.8 18.3H6.3V14.8L3.8 12.3L6.3 9.8V6.3H9.8L12.3 3.8L14.8 6.3H18.3V9.8L20.8 12.3L18.3 14.8V18.3H14.8ZM15.3 15.3V9.30005H13.865V13.4165L10.5145 9.30005H9.29999V15.3H10.6839V11.7258H10.7318L14.1047 15.3H15.3Z" fill="#F92296" />
                                </g>
                            </svg>
                            <h3>
                                Tin Mới Nhất
                            </h3>
                        </div>
                    </div>
                    <div class="asc1">
                        <?php foreach ($posts_array_time as $post) {
                            $post_title = get_the_title($post->ID);
                            $post_image = get_the_post_thumbnail($post->ID, 'thumbnail');
                            $post_name = get_post_field('post_name', $post->ID);
                        ?>
                            <a href="<?php echo get_home_url(); ?>/<?php echo $post_name; ?>">
                                <div class="content_right">
                                    <div class="content_right_img">
                                        <?php echo $post_image; ?>
                                    </div>
                                    <div class="content_main">
                                        <p><?php echo $post_title; ?></+>
                                    </div>
                                </div>
                            </a>
                        <?php }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related_cm">
        <div class="container">
            <div class="related_wrap">
                <div class="related_title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <mask id="mask0_62_2144" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_62_2144)">
                            <path d="M5 21C4.45 21 3.97917 20.8042 3.5875 20.4125C3.19583 20.0208 3 19.55 3 19V5C3 4.45 3.19583 3.97917 3.5875 3.5875C3.97917 3.19583 4.45 3 5 3H19C19.55 3 20.0208 3.19583 20.4125 3.5875C20.8042 3.97917 21 4.45 21 5V19C21 19.55 20.8042 20.0208 20.4125 20.4125C20.0208 20.8042 19.55 21 19 21H5ZM5 19H19V5H5V19ZM9.075 16.25L12 14.475L14.925 16.25L14.15 12.925L16.75 10.675L13.325 10.4L12 7.25L10.675 10.4L7.25 10.675L9.85 12.925L9.075 16.25Z" fill="#F92296" />
                        </g>
                    </svg>
                    <h3>
                        Tin Liên Quan
                    </h3>
                </div>
                <a href="<?php echo get_home_url(); ?>/cam-nang/">
                    <div class="related_xem">

                        <i class="far fa-chevron-double-right"></i>
                        <p>Xem thêm</p>
                    </div>
                </a>
            </div>
            <div class="row">
                <?php
                $args = array(
                    'type'                     => 'post',
                    'child_of'                 => 0,
                    'parent'                   => '',
                    'orderby'                  => 'name',
                    'order'                    => 'ASC',
                    'hide_empty'               => 1,
                    'hierarchical'             => 1,
                    'exclude'                  => '',
                    'include'                  => '',
                    'number'                   => '',
                    'taxonomy'                 => 'danh-muc-cam-nang',
                    'pad_counts'               => false,
                );
                foreach ($categories as $cat) {
                    $posts_array = get_posts(
                        array(
                            'posts_per_page' => 4,
                            'post_type' => '',
                            'orderby'        => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'danh-muc-cam-nang',
                                    'field' => 'term_id',
                                    'terms' => $cat->term_id,
                                )
                            )
                        )
                    );
                }
                wp_reset_postdata();
                ?>
                <?php foreach ($posts_array as $post) {
                    $post_title = get_the_title($post->ID);
                    $post_image = get_the_post_thumbnail($post->ID, 'thumbnail');
                    $post_name = get_post_field('post_name', $post->ID);
                    $post_content = get_post_field('post_content', $post->ID);
                ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="<?php echo get_home_url(); ?>/<?php echo $post_name; ?>">
                            <div class="related_item">
                                <div class="related_img">
                                    <?php echo $post_image; ?>
                                </div>
                                <h5>
                                </h5>
                                <h4>
                                    <?php echo $post_title; ?>
                                </h4>
                                <p>
                                    <?php echo wp_trim_words($post_content, 15); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>