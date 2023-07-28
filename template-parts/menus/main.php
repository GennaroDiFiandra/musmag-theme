<?php defined('WPINC') || die; ?>

<?php if (has_nav_menu('main-menu')) : ?>
  <div class="main-menu-wrapper">
    <div class="menu-opener">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </div>

    <nav class="menu-sitewide-navigation">
      <?php
        wp_nav_menu([
          'menu'=>'main-manu',
          'theme_location'=>'main-menu',
          'container'=>'',
          'depth'=>2,
        ]);
      ?>

      <div class="menu-closer">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
      </div>
    </nav>
  </div>
<?php endif; ?>