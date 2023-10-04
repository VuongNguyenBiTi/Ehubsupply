<?php
get_header();
$queried_object = get_queried_object();
global $post;
?>
<section class="page-blogs">
    <div class="page-blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="page-blog-left">
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
                                    Tin Mới
                                </h3>
                            </div>
                        </div>
                        <div class="acs">
                            <?php foreach ($posts_array_time as $post) {
                                // Lấy tiêu đề của bài viết
                                $post_title = get_the_title($post->ID);
                                // Lấy hình ảnh đại diện của bài viết
                                $post_image = get_the_post_thumbnail($post->ID, 'thumbnail');
                                $post_name = get_post_field('post_name', $post->ID);
                            ?>
                                <a href="../<?php echo $post_name; ?>">
                                    <div class="content_right">
                                        <div class="bgr_img">
                                            <?php echo $post_image; ?>
                                        </div>
                                        <div class="content_main">
                                            <h4><?php echo $post_title; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            <?php }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-9">
                    <ul class="blog-list list-unstyled">
                        <?php
                        $args = array(
                            'posts_per_page'     => -1,
                            // 'post_type'          => '',
                            'orderby'            => 'date',
                            'order'              => 'DESC',
                            'paged'             => get_query_var('paged'),
                            's'                  => get_search_query()
                        );
                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php if ($_GET['s'] == '') { ?>
                            <h4 class="mb-3 mb-md-4">Vui lòng nhập từ khóa bạn muốn tìm kiếm.</h4>
                        <?php } else { ?>
                            <h4 class="mb-3 mb-md-4 tb_kq"><?php echo count($getposts->posts) ?> kết quả tìm kiếm được tìm thấy</h4>
                            <div class="row">
                                <?php if ($getposts->have_posts()) : ?>
                                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                                        <div class="col-lg-4">
                                            <li class="blog-item">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="image">
                                                        <img class="blog-item__img" src="<?php the_post_thumbnail_url('full') ?>" alt="">
                                                    </div>
                                                    <div class="blog-item__info">
                                                        <?php
                                                        $categorys =  get_the_category(get_the_ID());
                                                        foreach ($categorys as $key => $category) {
                                                            echo '<p class="next">' . $category->name . '</p>';
                                                        }
                                                        ?>

                                                        <h3>
                                                            <?php
                                                            $title = get_the_title();
                                                            echo wp_trim_words($title, 15);
                                                            ?>
                                                        </h3>

                                                        <?php
                                                        $excerpt = get_the_excerpt(); // Lấy excerpt của bài viết
                                                        $trimmed_excerpt = wp_trim_words($excerpt, 20); // Rút gọn excerpt thành 20 từ
                                                        echo $trimmed_excerpt;
                                                        ?>
                                                        <p class="next">Xem thêm >></p>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>


                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                <?php endif; ?>
                            <?php } //if (function_exists('prw_wp_corenavi')) prw_wp_corenavi($getposts, $paged); 
                            ?>
                            </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<div class="clear"></div>

<?php get_footer(); ?>

<style>
    .tb_kq {
        color: black;

    }

    .blog-item .image img {
        width: 100%;
        border-radius: 8px;
    }

    .blog-item__info {
        /* padding-top: 5px; */
        padding-left: 10px;
        padding-right: 10px;

    }

    .blog-item__info:hover {
        color: black;

    }

    .blog-item__info h3 {
        padding-top: 10px;
        padding-bottom: 0px;
    }

    /* sidebar */
    .title_right {
        display: flex;
    }

    .title_right h3 {
        color: black;
        padding-left: 5px;
    }

    .content_right {
        margin-bottom: 20px;
    }

    .content_right .bgr_img img {
        width: 100%;
        height: 76px;
        object-fit: cover;
    }

    .content_main h4 {
        font-size: 18px;
        margin-top: 5px;
        color: black;
        padding: 5px;
    }

    .acs {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 4px;
    }

    .page-blogs {
        padding-top: 30px;
    }

    @media (max-width: 600px) {
        .page-blog-left {
            /* display: flex; */
            /* order:2; */
            display: none ;
        }
        .page-blogs {
        padding-top: 0px;
    }

      
    }
</style>