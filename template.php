<?php

/**
 * @file File template.php
  *
  */

/**
 * Implements theme_preprocess_page().
 *
 */
function kohu_preprocess_page(&$variables) {
  backdrop_add_library('layout', 'bootstrap4-gs');

  if (module_exists('civicrm')) {
    backdrop_add_css('css/kohu.civicrm.css');
  }

  // Get theme settings.
  $settings['dark'] = theme_get_setting('dark', 'kohu');
  $settings['primary'] = lumi_get_color(theme_get_setting('primary', 'kohu'));
  $settings['links'] = lumi_get_color(theme_get_setting('links', 'kohu'));
  $settings['stickyactions'] = theme_get_setting('stickyactions', 'kohu');

  if ($settings['stickyactions']) {
    backdrop_add_css(backdrop_get_path('theme', 'kohu') . '/css/sticky_actions.css', 'file');
  }

  // Send theme settings to JS (so it can update the CSS).
  backdrop_add_js(array(
    'kohu' => $settings,
  ), 'setting');

  $path = current_path();
  $path_parts = explode('/', $path);
  $segment = 'page-';
  foreach ($path_parts as $path_part) {
    $segment .= $path_part;
    $variables['classes'][] = $segment;
    $segment .= '-';
  }

  $data = array(
    '#tag' => 'link',
    '#value' => '',
    '#attributes' => array(
      'href' => url('https://fonts.gstatic.com'),
      'rel' => 'preconnect',
      'crossorigin' => 'anonymous',
    ),
  );
  backdrop_add_html_head($data, 'kohu_gstatic');
  $data = array(
    '#tag' => 'link',
    '#value' => '',
    '#attributes' => array(
      'href' => url('https://fonts.googleapis.com'),
      'rel' => 'preconnect',
    ),
  );
  backdrop_add_html_head($data, 'kohu_googlefont_preconnect');
  $data = array(
    '#tag' => 'link',
    '#value' => '',
    '#attributes' => array(
      'href' => url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&display=swap'),
      'rel' => 'stylesheet',
    ),
  );
  backdrop_add_html_head($data, 'kohu_googlefont');
}
