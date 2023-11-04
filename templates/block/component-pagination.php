<!-- <div class="pagination-custom notranslate">
  <div class="container">
    <?php
    // previous_posts_link(__('<i class="far fa-chevron-double-left"></i>', 'glw'));
    the_posts_pagination(
      array(
        'prev_next' => true,
        'prev_text' => '<i class="far fa-angle-left"></i>',
        'next_text' => '<i class="far fa-angle-right"></i>',

      )
    );
    // next_posts_link(__('<i class="fas fa-angle-double-right"></i>', 'glw'));
    ?>
  </div>
</div> -->
<div class="pagination-custom notranslate">
  <div class="container">
    <?php
    global $wp_query;
    $max_pages = $wp_query->max_num_pages;

    if ($max_pages > 1) {
      the_posts_pagination(
        array(
          'prev_next' => true,
          'prev_text' => '<i class="far fa-angle-left"></i>',
          'next_text' => '<i class="far fa-angle-right"></i>',
        )
      );
    }
    ?>
  </div>
</div>
