<h2><?php _e('Event Details', 'musmag_theme') ?></h2>

<ul class="list-group list-group-horizontal justify-content-around mb-3">

  <?php if ($args['date']) : ?>
    <li class="list-group-item text-center text-bg-primary border-0 rounded-2"><span><?php echo __('When start', 'musmag-theme'); ?><br><?php echo esc_html($args['date']); ?></span></li>
  <?php endif; ?>

  <?php if ($args['duration']) : ?>
    <li class="list-group-item text-center text-bg-primary border-0 rounded-2"><span><?php echo __('Duration (in days)', 'musmag-theme'); ?><br><?php echo esc_html($args['duration']); ?></span></li>
  <?php endif; ?>

  <?php if ($args['city']) : ?>
    <li class="list-group-item text-center text-bg-primary border-0 rounded-2"><span><?php echo __('City', 'musmag-theme'); ?><br><?php echo esc_html($args['city']); ?></span></li>
  <?php endif; ?>

  <?php if ($args['price']) : ?>
    <li class="list-group-item text-center text-bg-primary border-0 rounded-2"><span><?php echo __('Price', 'musmag-theme'); ?><br><?php echo esc_html($args['price'].$args['currency']); ?></span></li>
  <?php endif; ?>

</ul>