<?php

namespace MusMagTheme;

defined('WPINC') || die;

class Feature
{
  private string $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function register_feature()
  {
    add_theme_support($this->name);
  }

  public function setup_actions()
  {
    return [
      'after_setup_theme' => ['register_feature',10,1],
    ];
  }
}