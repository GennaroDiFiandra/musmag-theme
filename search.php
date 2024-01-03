<?php defined('WPINC') || die; ?>

<?php get_header(); ?>

<main class="container-xxl">

  <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 gx-2 gy-4">

    <!-- load posts -->
    <?php get_template_part('template-parts/globals/archive'); ?>

  </section>

  <section class="row mt-5">

    <!-- load pagination -->
    <?php get_template_part('template-parts/globals/pagination'); ?>

  </section>

</main>

<?php get_footer(); ?>