<main class="sitewide-main">

  <?php if (get_post_type() === 'event') : ?>
    <!-- load article -->
    <?php get_template_part('template-parts/singles/event'); ?>
  <?php endif; ?>

  <!-- load widgets -->
  <?php get_sidebar(); ?>

</main>