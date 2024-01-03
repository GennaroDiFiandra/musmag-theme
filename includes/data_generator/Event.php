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
    return carbon_get_post_meta($this->id, 'event_price');
  }

  public function get_the_currency()
  {
    return (new \NumberFormatter(get_locale(), \NumberFormatter::CURRENCY))->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
  }

  public function get_the_data_array()
  {
    return [
      'date' => $this->get_the_date(),
      'duration' => $this->get_the_duration(),
      'city' => $this->get_the_city(),
      'price' => $this->get_the_price(),
      'currency' => $this->get_the_currency(),
    ];
  }

  public function is_event_details()
  {
    return ($this->get_the_date() || $this->get_the_duration() || $this->get_the_city() || $this->get_the_price()) ? true : false;
  }
}