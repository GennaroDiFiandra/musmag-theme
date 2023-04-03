<article class="main-content <?php echo get_post_type(); ?>">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>

        <div class="main-content-header">
          <?php echo get_the_post_thumbnail(); ?>
          <h1 class="main-content-title"><?php echo esc_html(get_the_title()); ?></h1>
        </div>

        <?php do_action('musmag_theme/single_event/after_title') ?>

        <div><?php the_content(); ?></div>

        <ul class="event-details">
          <li class="event-detail"><?php echo __('Data', 'musmag-theme'); ?><br><?php echo esc_html(get_post_meta(get_the_ID(), 'event_date', true)); ?></li>
          <li class="event-detail"><?php echo __('Giorni', 'musmag-theme'); ?><br><?php echo esc_html(get_post_meta(get_the_ID(), 'event_duration', true)); ?></li>
          <li class="event-detail"><?php echo __('Città', 'musmag-theme'); ?><br><?php echo esc_html(get_post_meta(get_the_ID(), 'event_city', true)); ?></li>
          <li class="event-detail"><?php echo __('Prezzo', 'musmag-theme'); ?><br><?php echo esc_html(get_post_meta(get_the_ID(), 'event_price', true)); ?></li>
        </ul>

        <div class="main-content-author"><?php echo apply_filters('musmag_theme/single_event/author',get_the_author(),get_the_ID()); ?></dvi>

        <?php do_action('musmag_theme/single_event/after_content') ?>

    <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>
  </article>