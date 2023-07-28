<?php

namespace MusMagTheme;

defined('WPINC') || die;

class Style
{
  private string $unique_identifier;
  private string $src;
  private array $deps;
  private string $version;
  private string $media;

  public function __construct($unique_identifier, $src, $deps=[], $media='all')
  {
    $this->unique_identifier = $unique_identifier;
    $this->src = $src;
    $this->deps = $deps;
    $this->version = $this->get_version();
    $this->media = $media;
  }

  private function set_version()
  {
    return wp_get_theme()->get('Version');
  }

  private function get_version()
  {
    return $this->set_version();
  }

  public function register_style()
  {
    wp_enqueue_style($this->unique_identifier, $this->src, $this->deps, $this->version, $this->media);
  }

  public function setup_actions()
  {
    return [
      'wp_enqueue_scripts' => ['register_style',10,0],
    ];
  }
}