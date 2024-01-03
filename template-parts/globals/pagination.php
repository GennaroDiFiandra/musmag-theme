<?php defined('WPINC') || die; ?>

<?php
  use MusMagTheme\Data_Generator\Pagination;
  $pagination = new Pagination();

  if ($pagination->get_the_posts_pagination())
    echo $pagination->get_the_posts_pagination();
?>