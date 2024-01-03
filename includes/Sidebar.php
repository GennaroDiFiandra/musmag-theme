<?php

namespace MusMagTheme;

defined('WPINC') || die;

class Sidebar
{
  private const OPEN_WIDGET_MARKUP = '<aside id="%1$s" class="widget %2$s">';
  private const CLOSE_WIDGET_MARKUP = '</aside>';
  private string $name;
  private string $unique_identifier;
  private array $args;

  public function __construct($name, $unique_identifier)
  {
    $this->name = $name;
    $this->unique_identifier = $unique_identifier;
    $this->args = [
      'name' => $this->name,
      'id' => $this->unique_identifier,
      'before_widget' => self::OPEN_WIDGET_MARKUP,
      'after_widget' => self::CLOSE_WIDGET_MARKUP,
    ];
  }

  public function register_sidebar()
  {
    register_sidebar($this->args);
  }

  public function setup_hooks()
  {
    return [
      'widgets_init' => ['register_sidebar',10,0],
    ];
  }
}