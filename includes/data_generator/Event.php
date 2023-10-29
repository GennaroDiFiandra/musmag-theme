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
    return carbon_get_post_meta($this->id, 'event_date');
  }

  public function get_the_duration()
  {
    return carbon_get_post_meta($this->id, 'event_duration');
  }

  public function get_the_city()
  {
    return carbon_get_post_meta($this->id, 'event_city');
  }

  public function get_the_price()
  {
    return carbon_get_post_meta($this->id, 'event_price').(new \NumberFormatter(get_locale(), \NumberFormatter::CURRENCY))->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
  }
}