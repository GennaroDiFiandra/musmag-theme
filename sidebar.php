<section class="main-widgets">

  <?php if (get_post_type() === 'event') : ?>
    <?php dynamic_sidebar('event-sidebar'); ?>
  <?php endif; ?>

</section>