<?php defined('WPINC') || die; ?>

<section class="aside-content">

  <?php if (get_post_type() === 'event'  && is_active_sidebar('event-sidebar')) : ?>
    <?php dynamic_sidebar('event-sidebar'); ?>
  <?php endif; ?>

</section>