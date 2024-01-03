<?php defined('WPINC') || die; ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>

        <article class="col-lg-9">
          <h1><?php echo esc_html(get_the_title()); ?></h1>
          <div><?php the_content(); ?></div>
        </article>

    <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>