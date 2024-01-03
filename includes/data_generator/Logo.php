<?php

namespace MusMagTheme\Data_Generator;

defined('WPINC') || die;

class Logo
{
  private function has_logo()
  {
    return get_theme_mod('custom_logo');
  }

  private function get_logo_url()
  {
    return get_bloginfo('url');
  }

  private function get_logo_content()
  {
    if ($this->has_logo())
      return wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, [ 'class'=>'logo-img', 'alt'=>get_bloginfo('name') ]);
    else
      return get_bloginfo('name');
  }

  public function get_the_logo()
  {
    return '<a href="'.esc_attr($this->get_logo_url()).'" class="logo-link navbar-brand">'.$this->get_logo_content().'</a>';
  }
}