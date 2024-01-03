<?php defined('WPINC') || die; ?>

<?php use MusMagTheme\Data_Generator\Event; ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>

        <?php $event = new Event(get_the_ID()); ?>

        <article class="col-lg-9">
          <div>
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full', ['class'=>'img-fluid d-block mx-auto']); ?>
            <h1 class="w-75 mx-auto p-3 translateY-n50 text-center text-bg-primary"><?php echo esc_html(get_the_title()); ?></h1>
          </div>

          <?php do_action('musmag_theme/single_event/after_title') ?>

          <div><?php the_content(); ?></div>

          <?php if ($event->is_event_details()) get_template_part('template-parts/chunks/event-details', null, $event->get_the_data_array()); ?>

          <div><?php echo apply_filters('musmag_theme/single_event/author',get_the_author(),get_the_ID()); ?></div>

          <?php do_action('musmag_theme/single_event/after_content') ?>
        </article>

    <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>