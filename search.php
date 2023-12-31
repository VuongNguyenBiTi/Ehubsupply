<?php
get_header();
$queried_object = get_queried_object();
global $post;
?>
<section class="page-blogs">
    <div class="page-blog">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="page-blog-left">
                        <?php
                        $args = array(
                            'type'                     => 'post',
                            'child_of'                 => 0,
                            'parent'                   => '',
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
                                    'posts_per_page' => 5,
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
                                    Cẩm nang
                                </h3>
                            </div>
                        </div>
                        <div class="acs">
                            <?php foreach ($posts_array_time as $post) {
                                $post_title = get_the_title($post->ID);
                                $post_image = get_the_post_thumbnail($post->ID, 'thumbnail');
                                $post_name = get_post_field('post_name', $post->ID);
                            ?>
                                <a href="<?php echo get_home_url(); ?>/<?php echo $post_name; ?>">
                                    <div class="content_right_search">
                                        <div class="bgr_img">
                                            <?php echo $post_image; ?>
                                        </div>
                                        <div class="content_main_search">
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
                <div class="col-12 col-lg-9 col-md-8">
                    <ul class="blog-list list-unstyled">
                        <?php
                        $args = array(
                            'posts_per_page'     => -1,
                            // 'post_type'          => '',
                            'orderby'            => 'date',
                            'order'              => 'DESC',
                            'pagination' => true,
                            'posts_per_page' => 6,
                            'paged'  => $paged,
                            'paged'             => get_query_var('paged'),
                            's'                  => get_search_query(),
                        );
                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php if ($_GET['s'] == '') { ?>
                            <h4 class="mb-3 mb-md-4">Vui lòng nhập từ khóa bạn muốn tìm kiếm.</h4>
                        <?php } else { ?>
                            <h4 class="mb-3 mb-md-4 tb_kq"><?php
                                                            $count = $getposts->found_posts;
                                                            echo $count;
                                                            ?> kết quả tìm kiếm được tìm thấy</h4>
                            <div class="row">
                                <?php if ($getposts->have_posts()) : ?>
                                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                                        <div class="col-lg-4 col-md-6 col-6 ">
                                            <li class="blog-items">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="image">
                                                        <img class="blog-items__img" src="<?php the_post_thumbnail_url('full') ?>" alt="">
                                                    </div>
                                                    <div class="blog-items__info">
                                                        <?php
                                                        $categorys =  get_the_category(get_the_ID());
                                                        foreach ($categorys as $key => $category) {
                                                            echo '<p class="next">' . $category->name . '</p>';
                                                        }
                                                        ?>

                                                        <h3>
                                                            <?php
                                                            $title = get_the_title();
                                                            echo wp_trim_words($title, 20);
                                                            ?>
                                                        </h3>

                                                        <?php
                                                        $excerpt = get_the_excerpt(); // Lấy excerpt của bài viết
                                                        $trimmed_excerpt = wp_trim_words($excerpt, 20); // Rút gọn excerpt thành 20 từ
                                                        $trimmed_excerpt;
                                                        ?>
                                                        <p><?php echo $trimmed_excerpt ?></p>
                                                        <p class="next">Xem chi tiết <i class="fal fa-angle-double-right"></i></p>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                    <?php get_template_part('templates/block/component', 'pagination'); ?>
                                <?php else : ?>
                                    <!-- Code to display when there are no posts to show -->

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
<!-- <style>
    .tb_kq {
        color: black;
        margin: 0 !important;
    }

    .blog-items {
        transition: all .5s;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .blog-items:hover {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        box-shadow: 4px 7px 20px 3px rgba(0, 0, 0, 0.14);
        transform: translate3d(0px, -8px, 15px);
    }

    .blog-items .image img {
        width: 100%;
        border-radius: 8px 8px 0px 0px;
        height: 200px;
        object-fit: contain;

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
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .blog-item__info p {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
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
        transition: all 0.5s linear;
        border-radius: 8px;
        background-color: #fff;
        
    }
    .content_right:hover {
        box-shadow: 4px 7px 20px 3px rgba(0, 0, 0, 0.14);
        transform: translate3d(0px, -8px, 15px);
    }

    .content_right .bgr_img img {
        width: 100%;
        height: 76px;
        object-fit: cover;
        border-radius: 8px;
    }
    .content_main{
        padding: 7px;
    }
    .content_main h4 {
        font-size: 18px;
        margin-top: 5px;
        color: black;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
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
           
            display: none;
        }

        .page-blogs {
            padding-top: 0px;
        }
    }
</style> -->