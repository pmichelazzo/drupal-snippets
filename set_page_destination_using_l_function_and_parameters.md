# Set page destination using l() and parameters

The right way to build links on Drupal is using the [l()](https://api.drupal.org/api/drupal/includes!common.inc/function/l/7.x) function. But, if you use the [drupal_get_destination()](https://api.drupal.org/api/drupal/includes%21common.inc/function/drupal_get_destination/7.x) to create a link with the destination set of parameters, you have a problem in your hands. The drupal_get_destination mess completely the URL converting special characters to HTML entities.

So, how to fix? The snippet below is the answer:

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

The trick is in the drupal_parse_url. This function prepare the URL and the variables on the right way to fix the problem with HTML entities.

So, how much you save with it?
