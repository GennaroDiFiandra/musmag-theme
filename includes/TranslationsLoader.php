<?php

namespace MusMagTheme;

defined('WPINC') || die;

class TranslationsLoader
{
  public function load_translations()
  {
    load_theme_textdomain('musmag-theme', get_template_directory().'/languages');
  }

  public function setup_hooks()
  {
    return [
      'after_setup_theme' => ['load_translations',10,0],
    ];
  }
}