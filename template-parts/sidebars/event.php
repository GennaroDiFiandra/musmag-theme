<?php defined('WPINC') || die; ?>

<?php
  if (get_post_type() === 'event'  && is_active_sidebar('event-sidebar'))
    dynamic_sidebar('event-sidebar');
?>