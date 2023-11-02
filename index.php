<?php /* Template Name: Trang chủ */ ?>

<?php get_header(); ?>
<main class="home">
    <?php get_template_part('templates/block/component', 'home-banner'); ?>
    <?php get_template_part('templates/block/component', 'home-service'); ?>
    <?php get_template_part('templates/block/component', 'home-flashsale'); ?>
    <?php get_template_part('templates/block/component', 'home-category'); ?>
    <?php get_template_part('templates/block/component', 'home-selling-product'); ?>
    <?php get_template_part('templates/block/component', 'home-ads'); ?>
    <?php get_template_part('templates/block/component', 'home-suggest'); ?>
    <?php get_template_part('templates/block/component', 'home-feedback'); ?>

</main>
<?php get_template_part('templates/gioi-thieu/component', 'gioi-thieu'); ?>

<?php get_footer(); ?>
<?php get_template_part('templates/block/component', 'home-to-top'); ?>