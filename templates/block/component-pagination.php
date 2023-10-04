<div class="pagination-custom notranslate">
  <div class="container">
    <?php
    // previous_posts_link(__('<-- Newer posts', 'glw'));
    the_posts_pagination(
      array(
        'prev_next' => true,
        'prev_text' => '<i class="far fa-angle-left"></i>',
        'next_text' => '<i class="far fa-angle-right"></i>',

      )
    );
    // next_posts_link(__('Older posts -->', 'glw'));
    ?>
  </div>
</div>