<?php defined('WPINC') || die; ?>

<?php get_header(); ?>

<main class="container-xxl g-0">

  <div class="row">

    <!-- load article -->
    <?php get_template_part('template-parts/singles/event'); ?>

    <!-- load widgets -->
    <?php get_sidebar(); ?>

  </div>

</main>

<?php get_footer(); ?>