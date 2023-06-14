<?php

namespace MusMagTheme;

defined('WPINC') || die;

class ThemeTranslationsLoader
{
  private string $textdomain;

  public function __construct()
  {
    $this->textdomain = $this->get_textdomain();
  }

  private function set_textdomain()
  {
    return wp_get_theme()->get('TextDomain');
  }

  private function get_textdomain()
  {
    return $this->set_textdomain();
  }

  public function load_translations()
  {
    load_theme_textdomain($this->textdomain, get_template_directory() . '/languages');
  }

  public function setup_actions()
  {
    return [
      'after_setup_theme' => ['load_translations',10,0],
    ];
  }
}