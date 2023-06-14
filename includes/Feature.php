<?php

namespace MusMagTheme;

defined('WPINC') || die;

class Feature
{
  private string $name;
  private array $args;
  private string $operation;

  public function __construct($name, $args=[], $operation='add')
  {
    $this->name = $name;
    $this->args = $args;
    $this->operation = $operation;
  }

  public function register_feature()
  {
    if ($this->operation === 'add' && count($this->args) === 0)
      add_theme_support($this->name);

    if ($this->operation === 'add' && count($this->args) > 0)
      add_theme_support($this->name, $this->args);

    if ($this->operation === 'remove')
      remove_theme_support($this->name);
  }

  public function setup_actions()
  {
    return [
      'after_setup_theme' => ['register_feature',10,0],
    ];
  }
}