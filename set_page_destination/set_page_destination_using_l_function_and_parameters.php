<?php

/**
 * @file
 *
 * Snippet to set the destination page using the i() function.
 */

// Get the URL query parameters.
$dest = drupal_get_destination();
// Parse the parameters.
$new_url = drupal_parse_url($dest['destination']);
// Create the link.
$link = l(t('Click Here'), $new_url['path'], array('query' => $new_url['query']));

// Print the link.
print $link;

// Or use in a form button.
$form['cancel'] = [
  '#markup' => l(t('Cancel'), $new_url['path'], ['query' => $new_url['query']]),
];
