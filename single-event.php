<?php defined('WPINC') || die; ?>

<?php get_header(); ?>

<main class="container-xxl g-0">

  <section class="row">

    <!-- load event -->
    <?php get_template_part('template-parts/singles/event'); ?>

    <!-- load widgets -->
    <?php get_sidebar(); ?>

  </section>

</main>

<?php get_footer(); ?>