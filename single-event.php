<?php defined('WPINC') || die; ?>

<?php get_header(); ?>

<main class="sitewide-main">

  <!-- load article -->
  <?php get_template_part('template-parts/singles/event'); ?>

  <!-- load widgets -->
  <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>