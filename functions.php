<?php defined('WPINC') || die;

use MusMagTheme\Style;
use MusMagTheme\Script;
use MusMagTheme\Sidebar;
use MusMagTheme\Feature;
use MusMagTheme\HooksActivator;

final class MusMagTheme
{
  private HooksActivator $activator;
  private Style $generated_styles;
  private Script $generated_scripts;
  private Sidebar $event_sidebar;
  private Feature $post_thumbnail;

  public function __construct()
  {
    $this->require_files();
    $this->init();
  }

  private function require_files()
  {
    // autoload all classes from includes directory
    require_once __DIR__.'/vendor/autoload.php';
  }

  public function init()
  {
    // add compiled css file
    $this->generated_styles = new Style('generated-styles', get_template_directory_uri().'/generated-styles.css');
    // add compiled js file
    $this->generated_scripts = new Script('generated-scripts', get_template_directory_uri().'/generated-scripts.js');

    // add event sidebar
    $this->event_sidebar = new Sidebar(__('Event sidebar','musmag-theme'), 'event-sidebar');

    // add post thumbnail feature
    $this->post_thumbnail = new Feature('post-thumbnails');

    // activate hooks
    $this->activator = new HooksActivator();
    $this->activator->activate_actions($this->generated_styles);
    $this->activator->activate_actions($this->generated_scripts);
    $this->activator->activate_actions($this->event_sidebar);
    $this->activator->activate_actions($this->post_thumbnail);
  }
}
new MusMagTheme();
