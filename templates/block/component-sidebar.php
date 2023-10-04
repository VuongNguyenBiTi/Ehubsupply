<?php

$current_term = get_queried_object();

if ($current_term->has_archive) {
    $current_term_slug = "all";
} else {
    $current_term_slug = $current_term->slug;
    if ($current_term_slug == "") {
        $current_term = array_shift(array_values(get_the_terms(get_the_ID(), 'danh-muc-cam-nang')));
        $current_term_slug = $current_term->slug;
    }
}
?>

<div class="component-sidebar">
    <h3 class="title mb-0 text-uppercase"> Cẩm Nang</h3>
    <?php
    $terms = get_terms([
        'taxonomy' => 'danh-muc-cam-nang',
        'hide_empty' => false,
        'orderby'       => 'id',
    ]);

    ?>
    <a href="<?php echo get_home_url(); ?>/cam-nang">
        <button id="btn-category" class="btn <?php echo ($current_term_slug == 'all') ? "active" : ""; ?>"> <i class="fas fa-caret-right"></i>Tất cả</button>
    </a>
    <?php
    foreach ($terms as $term) {
    ?>
        <a href="<?php echo get_home_url(); ?><?php echo  "/" . $term->taxonomy . "/" . $term->slug; ?>">
            <button id="btn-category" class="btn <?php echo ($current_term_slug == $term->slug) ? "active" : ""; ?>">
            <i class="fas fa-caret-right"></i><?php echo $term->name; ?>
            </button>
        </a>
    <?php
    }
    ?>
</div>

