<?php
get_header();
$queried_object = get_queried_object();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
global $post;
?>


<div class="contact_breadcrumbs">
    <div class="container">

        <h2>
            <a href="<?php echo get_home_url(); ?>">
               <span>Trang chủ / </span> 
            </a>
            <a href="<?php echo get_home_url(); ?>/cam-nang/">
                <span>Cẩm nang</span>
            </a>
        </h2>
    </div>
</div>

<section class="cam_nang">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-3">
                <?php get_template_part('templates/block/component', 'sidebar'); ?>

                <form class="cam_nang_search" action="<?php echo get_home_url(); ?>">
                    <div class="input-group mb-3">
                        <input name="s" type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Username" aria-describedby="basic-addon1">
                        <button type="submit" class="btn_search">
                            <i class="fas fa-search search-icon"></i>
                        </button>
                    </div>
                </form>
                <div class="hot">
                    <img src="https://i.imgur.com/aVryaVd.png" alt="">
                </div>
            </div>
            <div class="col-lg-9">
                <?php
                //  $term_current_slug = get_the_terms(get_the_ID(), 'danh-muc-cam-nang')[0]->slug;
                ?>
                <div class="content_wrap">

                    <div class="row">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(

                            'post_status'     => 'publish',
                            'post_type'       => 'cam-nang',
                            'pagination' => true,
                            'posts_per_page' => 6,
                            'paged'  => $paged,
                            'paged'           => get_query_var('paged'),
                        );

                        ?>
                        <?php $getposts = new WP_query($args); ?>
                        <?php if ($getposts->have_posts()) : ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="blog_item ">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="blog_item_wrap ">
                                                <div class="blog_item_content">
                                                    <div class="blog_item_top">
                                                        <div class="blog_item__img">
                                                            <img class="" src="<?php the_post_thumbnail_url('full') ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="blog_item_bottom">
                                                        <div class="blog_item__info">
                                                            <h3><?php the_title(); ?></h3>
                                                            <div class="excerpt line-2">

                                                                <p> <?php echo wp_trim_words(get_the_content(), $num_words = 20, $more = null); ?></p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                            ?>
                        <?php endif; ?>
                    </div>
                    <?php get_template_part('templates/block/component', 'pagination'); ?>
                </div>
            </div>
        </div>
</section>
<?php get_footer(); ?>
<?php get_template_part('templates/block/component', 'home-to-top'); ?>
