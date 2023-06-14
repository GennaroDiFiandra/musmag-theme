<?php defined('WPINC') || die; ?>

<?php
  use MusMagTheme\Data_Generator\Event;
  $event = new Event(get_the_ID());
?>

<article class="main-content">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>

        <div class="event-header">
          <?php echo get_the_post_thumbnail(); ?>
          <h1 class="event-title"><?php echo esc_html(get_the_title()); ?></h1>
        </div>

        <?php do_action('musmag_theme/single_event/after_title') ?>

        <div class="event-description"><?php the_content(); ?></div>

        <ul class="event-details">
          <li class="event-detail"><?php echo __('Data', 'musmag-theme'); ?><br><?php echo esc_html($event->get_the_date()); ?></li>
          <li class="event-detail"><?php echo __('Giorni', 'musmag-theme'); ?><br><?php echo esc_html($event->get_the_duration()); ?></li>
          <li class="event-detail"><?php echo __('Città', 'musmag-theme'); ?><br><?php echo esc_html($event->get_the_city()); ?></li>
          <li class="event-detail"><?php echo __('Prezzo', 'musmag-theme'); ?><br><?php echo esc_html($event->get_the_price()); ?></li>
        </ul>

        <div class="event-author"><?php echo apply_filters('musmag_theme/single_event/author',get_the_author(),get_the_ID()); ?></div>

        <?php do_action('musmag_theme/single_event/after_content') ?>

    <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>
  </article>