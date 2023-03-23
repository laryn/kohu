<?php
/**
 * @file
 * Kohu theme settings.
 */

$colors = array(
  'blue' => t('Blue'),
  'indigo' => t('Indigo'),
  'purple' => t('Purple'),
  'pink' => t('Pink'),
  'red' => t('Red'),
  'orange' => t('Orange'),
  'yellow' => t('Yellow'),
  'green' => t('Green'),
  'teal' => t('Teal'),
  'cyan' => t('Cyan'),
);

$form['stickyactions'] = array(
  '#type' => 'checkbox',
  '#title' => t('Sticky Action Buttons'),
  '#default_value' => theme_get_setting('stickyactions', 'kohu'),
  '#weight' => 1,
);
$form['dark'] = array(
  '#type' => 'checkbox',
  '#title' => t('Dark mode (experimental)'),
  '#default_value' => theme_get_setting('dark', 'kohu'),
  '#weight' => 2,
);
$form['primary'] = array(
  '#type' => 'select',
  '#title' => t('Primary color'),
  '#description' => t('The primary color is used for elements such as the site header and form buttons.'),
  '#options' => $colors,
  '#default_value' => theme_get_setting('primary', 'kohu'),
  '#weight' => 3,
);
$form['links'] = array(
  '#type' => 'select',
  '#title' => t('Link color'),
  '#options' => $colors,
  '#default_value' => theme_get_setting('links', 'kohu'),
  '#weight' => 4,
);
