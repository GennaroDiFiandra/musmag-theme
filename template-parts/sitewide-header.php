<?php defined('WPINC') || die; ?>

<?php
  use MusMagTheme\Data_Generator\Logo;
  $logo = (new Logo())->get_the_logo();

  use MusMagTheme\Data_Generator\WalkerNavMenu;
  $walker_nav_menu = new WalkerNavMenu();
?>

<nav class="sitewide-header navbar navbar-expand-lg">
  <div class="container-fluid">

    <!-- logo -->
    <?php echo $logo; ?>

    <!-- mobile menu handler -->
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#sitewide-navigation" aria-controls="sitewide-navigation" aria-expanded="false" aria-label="Toggle sitewide navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse justify-content-end gap-3" id="sitewide-navigation">

      <!-- navigation -->
      <?php
        wp_nav_menu([
          'menu'=>'main-manu',
          'theme_location'=>'main-menu',
          'depth'=>2,
          'container'=>'',
          'menu_class'=>'navbar-nav mb-2 mb-lg-0',
          'walker'=>$walker_nav_menu,
        ]);
      ?>

      <!-- search form -->
      <form class="d-flex" role="search" method="get" action="<?php echo home_url('/'); ?>">
        <input class="form-control me-2" type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Search', 'musmag-theme'); ?>" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><?php _e('Search', 'musmag-theme'); ?></button>
      </form>

    </div>

  </div>
</nav>