<?php defined('WPINC') || die;

use MusMagTheme\HooksActivator;

use MusMagTheme\Style;
use MusMagTheme\Script;

use MusMagTheme\Feature;

use MusMagTheme\Menu;

use MusMagTheme\Sidebar;

use MusMagTheme\TranslationsLoader;

final class MusMagTheme
{
  private static ?MusMagTheme $instance = null;

  private HooksActivator $activator;
  private array $hooks_book = [];

  private array $styles;
  private array $scripts;
  private array $features;
  private array $menus;
  private array $sidebars;

  private TranslationsLoader $translations_loader;

  public static function instance():MusMagTheme
  {
    if (self::$instance === null)
      self::$instance = new self();

    return self::$instance;
  }

  private function __construct()
  {}

  private function __clone()
  {}

  private function __wakeup()
  {}

  private function require_files()
  {
    // autoload all classes from includes directory
    require_once __DIR__.'/vendor/autoload.php';
  }

  public function hooks_book()
  {
    return $this->hooks_book;
  }

  private function add_to_hooks_book($object)
  {
    $this->hooks_book[] = $object;
  }

  public function init()
  {
    $this->require_files();

    // add compiled css files
    $this->styles['generated_styles'] = new Style('generated-styles', get_template_directory_uri().'/generated-styles.css');
    foreach ($this->styles as $style)
    {
      $this->add_to_hooks_book($style);
    }

    // add compiled js files
    $this->scripts['generated-scripts'] = new Script('generated-scripts', get_template_directory_uri().'/generated-scripts.js');
    foreach ($this->scripts as $script)
    {
      $this->add_to_hooks_book($script);
    }

    // add seo title
    $this->features['title_tag'] = new Feature('title-tag');
    // add html5 markup
    $this->features['html5'] = new Feature('html5', ['style', 'script', 'gallery', 'caption', 'search-form', 'comment-list', 'comment-form',]);
    // add logo by customizer
    $this->features['custom_logo'] = new Feature('custom-logo');
    // add post thumbnail
    $this->features['post_thumbnail'] = new Feature('post-thumbnails');
    // add widget selective refresh in customizer
    $this->features['customize_selective_refresh_widgets'] = new Feature('customize-selective-refresh-widgets');
    // add woocommerce support
    $this->features['woocommerce'] = new Feature('woocommerce');
    foreach ($this->features as $feature)
    {
      $this->add_to_hooks_book($feature);
    }

    // add menus
    $this->menus['main_menu'] = new Menu('main-menu', __('Main Menu', 'musmag-theme'));
    foreach ($this->menus as $menu)
    {
      $this->add_to_hooks_book($menu);
    }

    // add sidebars
    $this->sidebars['event_sidebar'] = new Sidebar(__('Event sidebar','musmag-theme'), 'event-sidebar');
    foreach ($this->sidebars as $sidebar)
    {
      $this->add_to_hooks_book($sidebar);
    }

    // load strings translations
    $this->translations_loader = new TranslationsLoader();
    $this->add_to_hooks_book($this->translations_loader);

    // activate hooks
    $this->activator = new HooksActivator();
    foreach ($this->hooks_book as $object)
    {
      $this->activator->activate_hooks($object);
    }
  }
}
MusMagTheme::instance()->init();