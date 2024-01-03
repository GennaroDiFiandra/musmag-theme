<?php

namespace MusMagTheme;

defined('WPINC') || die;

class Menu
{
  private string $location;
  private string $desctiption;

  public function __construct($location, $desctiption)
  {
    $this->location = $location;
    $this->desctiption = $desctiption;
  }

  public function register_menu()
  {
    register_nav_menu($this->location, $this->desctiption);
  }

  public function setup_hooks()
  {
    return [
      'after_setup_theme' => ['register_menu',10,0],
    ];
  }
}