<?php defined('WPINC') || die;

use MusMagTheme\HooksActivator;

use MusMagTheme\Style;
use MusMagTheme\Script;

use MusMagTheme\Feature;

use MusMagTheme\Sidebar;

use MusMagTheme\ThemeTranslationsLoader;

final class MusMagTheme
{
  private static ?MusMagTheme $instance = null;

  private HooksActivator $activator;
  private array $objects_actions_book = [];
  private array $objects_filters_book = [];

  private array $styles;
  private array $scripts;
  private array $features;
  private array $sidebars;

  private ThemeTranslationsLoader $translations_loader;

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

  public function get_objects_actions_book()
  {
    return $this->objects_actions_book;
  }

  public function get_objects_filters_book()
  {
    return $this->objects_filters_book;
  }

  private function add_to_actions_book($object)
  {
    $this->objects_actions_book[] = $object;
  }

  private function add_to_filters_book($object)
  {
    $this->objects_filters_book[] = $object;
  }

  public function init()
  {
    $this->require_files();

    // add compiled css files
    $this->styles['generated_styles'] = new Style('generated-styles', get_template_directory_uri().'/generated-styles.css');
    foreach ($this->styles as $style)
    {
      $this->add_to_actions_book($style);
    }

    // add compiled js files
    $this->scripts['generated-scripts'] = new Script('generated-scripts', get_template_directory_uri().'/generated-scripts.js');
    foreach ($this->scripts as $script)
    {
      $this->add_to_actions_book($script);
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
      $this->add_to_actions_book($feature);
    }

    // add sidebars
    $this->sidebars['event-sidebar'] = new Sidebar(__('Event sidebar','musmag-theme'), 'event-sidebar');
    foreach ($this->sidebars as $sidebar)
    {
      $this->add_to_actions_book($sidebar);
    }

    // load strings translations
    $this->translations_loader = new ThemeTranslationsLoader();
    $this->add_to_actions_book($this->translations_loader);

    // activate hooks
    $this->activator = new HooksActivator();
    foreach ($this->objects_actions_book as $object)
    {
      $this->activator->activate_actions($object);
    }
    foreach ($this->objects_filters_book as $object)
    {
      $this->activator->activate_filters($object);
    }
  }
}
MusMagTheme::instance()->init();