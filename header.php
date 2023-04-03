<?php defined('WPINC') || die; ?>

<!doctype html>
<html class="is_js_off" <?php language_attributes() ?>>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.classList.remove("is_js_off");</script>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="app">

      <header class="sitewide-header">
        <p class="headnotes">qui va l'header</p>
      </header>