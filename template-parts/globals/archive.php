<?php defined('WPINC') || die; ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>

      <article class="col d-flex">
        <div class="card shadow-sm" style="--bs-card-border-width:0">
          <div class="ratio ratio-16x9">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full', ['class'=>'img-fluid card-img-top']); ?>
          </div>
          <div class="card-body d-flex flex-column align-items-start">
            <h2 class="card-title h5"><?php echo esc_html(get_the_title()); ?></h2>
            <p class="card-text"><?php echo wp_trim_words(wp_filter_nohtml_kses(get_the_content()), 20); ?></p>
            <a href="<?php echo esc_attr(get_the_permalink()); ?>" class="btn btn-primary mt-auto"><?php _e('Read', 'musmag-theme') ?></a>
          </div>
        </div>
      </article>

    <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>