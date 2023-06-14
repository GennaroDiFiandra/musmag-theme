<?php

namespace MusMagTheme\Data_Generator;

defined('WPINC') || die;

class Event
{
  private int $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function get_the_date()
  {
    return get_post_meta($this->id, 'event_date', true);
  }

  public function get_the_duration()
  {
    return get_post_meta($this->id, 'event_duration', true);
  }

  public function get_the_city()
  {
    return get_post_meta($this->id, 'event_city', true);
  }

  public function get_the_price()
  {
    return get_post_meta($this->id, 'event_price', true);
  }
}