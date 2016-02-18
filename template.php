<?php

/**
 * Page alter.
 */
function datagovau_bootstrap_page_alter($page) {
  $mobileoptimized = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'MobileOptimized',
      'content' => 'width'
    )
  );
  $handheldfriendly = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'HandheldFriendly',
      'content' => 'true'
    )
  );
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1, maximum-scale=2, user-scalable=0'
    )
  );
  drupal_add_html_head($mobileoptimized, 'MobileOptimized');
  drupal_add_html_head($handheldfriendly, 'HandheldFriendly');
  drupal_add_html_head($viewport, 'viewport');
}


/**
 * Implement hook_node_view_alter
 * Set node title to the title string in the title field rather than the unique name
 */
function datagovau_bootstrap_node_view_alter(&$build) {
  if (isset($build) && !empty($build) && isset($build['#node']) && !empty($build['#node']) && isset($build['#node']->field_title) && !empty($build['#node']->field_title)) {
    drupal_set_title($build['#node']->field_title['und'][0]['value']);
  }
}

/**
 * Override or insert variables into the html template.
 */
function datagovau_bootstrap_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Override or insert variables into the page template.
 */
function datagovau_bootstrap_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Make search form available to page.tpl.php
  $search_box = drupal_get_form('search_block_form');
  $variables['search_box'] = drupal_render($search_box);

}

/**
 * Preprocess variables for block.tpl.php
 */
function datagovau_bootstrap_preprocess_block(&$variables) {
  $variables['classes_array'][] = 'clearfix';
}

/**
 * Preprocess Views exposed form
 */
function datagovau_bootstrap_preprocess_views_exposed_form(&$vars, $hook) {

  if (strrpos($vars['form']['#id'], 'views-exposed-form', -strlen($vars['form']['#id'])) !== FALSE) {
    $vars['form']['submit']['#attributes']['class'] = array('btn btn-info');
    $vars['form']['submit']['#value'] = "Filter";
    $vars['form']['reset']['#attributes']['class'] = array('btn btn-info');
    unset($vars['form']['submit']['#printed']);
    unset($vars['form']['reset']['#printed']);
    $vars['button'] = drupal_render($vars['form']['submit']);
    $vars['reset_button'] = drupal_render($vars['form']['reset']);
  }
}

/**
 * Override theme_breadrumb().
 *
 * Print breadcrumbs as a list, with separators.
 */
function datagovau_bootstrap_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $page_type = arg(0);
    if ($page_type == 'node') {
      $node_id = arg(1);
      if (!empty($node_id) && is_numeric($node_id)) {
        $node = node_load(arg(1));
        if ($node->type == "australian_story") {
          $breadcrumb[] = l('About Australia', 'about-australia');
          $breadcrumb[] = l('Australian Stories', 'about-australia/australian-stories');
          $breadcrumb[] = $node->field_title['und'][0]['value'];
        }
        else {
          if ($node->type == "faq") {
            $breadcrumb[] = 'FAQs';
            $breadcrumb[] = $node->field_title['und'][0]['value'];
          }
          else {
            if ($node->type == "service") {
              $breadcrumb[] = 'Service';
              $breadcrumb[] = $node->field_title['und'][0]['value'];
            }
            else {
              if ($node->type == "organisation") {
                $breadcrumb[] = l('About Government', 'about-government');
                $breadcrumb[] = l('Departments and Agencies', 'about-government/departments-and-agencies');
                $breadcrumb[] = l('Government by Portfolio', 'about-government/departments-and-agencies/government-by-portfolio');
                $breadcrumb[] = $node->field_title['und'][0]['value'];
              }
              else {
                if ($node->type == "portfolio") {
                  $breadcrumb[] = l('About Government', 'about-government');
                  $breadcrumb[] = l('Departments and Agencies', 'about-government/departments-and-agencies');
                  $breadcrumb[] = l('Government by Portfolio', 'about-government/departments-and-agencies/government-by-portfolio');
                  $breadcrumb[] = $node->field_title['und'][0]['value'];
                }
                else {
                  if ($node->type == "webform") {
                    $breadcrumb[] = 'Form';
                    $breadcrumb[] = $node->field_title['und'][0]['value'];
                  }
                }
              }
            }
          }
        }
      }
    }
    elseif ($page_type == 'search') {
      $breadcrumb = array('<a href="/">Home</a>', 'Search');
    }
    else {
      $breadcrumb[] = drupal_get_title();
    }

    $breadcrumbs = '<ol class="breadcrumb">';

    $count = count($breadcrumb) - 1;
    foreach ($breadcrumb as $key => $value) {
      $breadcrumbs .= '<li>' . $value . '</li>';
    }
    $breadcrumbs .= '</ol>';

    return $breadcrumbs;
  }
}

/**
 * Search block form alter.
 */
function datagovau_bootstrap_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    // Update form id.
    $form['#id'] = 'siteSearchForm';
    // Update search keys filed attributes.
    $form['search_block_form']['#attributes']['title'] = 'Search';
    $form['search_block_form']['#attributes']['placeholder'] = t('Search blog');
    $form['search_block_form']['#attributes']['autocomplete'] = 'off';
    $form['search_block_form']['#attributes']['class'] = array('form-control');
    // Update submit button style.
    $form['actions']['submit']['#value'] = decode_entities('&#xe012;');
  }
  if ($form_id == 'search_form') {
    $form['#id'] = 'siteSearchPageForm';
    // Update search keys filed attributes.
    $form['search_form']['#attributes']['title'] = 'Search';
    $form['search_form']['#attributes']['placeholder'] = t('Search blog');
    $form['search_form']['#attributes']['autocomplete'] = 'off';
    $form['basic']['keys']["#attributes"]['class'] = array('form-control');
    //$form['basic']['keys']["#title"] = '';
    // Update submit button style.
    $form['basic']['submit']['#value'] = decode_entities('&#xe012;');
  }
  if ($form_id == 'comment_node_blog_article_form') {
    $form['author']['name']['#title'] = 'Name';
    $form['author']['mail']['#type'] = 'hidden';
    $form['author']['homepage']['#type'] = 'hidden';
    $form['actions']['submit']['#value'] = 'Post comment';
  }

}

// Inserts metatags into the current node, using the metadata from $node_with_metadata.
function _insert_metatags_in_head($node_with_metadata, $schema_array) {
  $multi_value_key = array(
    'DCTERMS.audience',
    'DCTERMS.contributor',
    'DCTERMS.subject',
    'DCTERMS.references'
  );
  // Get metatags defined by the metatag module.
  // Note: this is the same across nodes and views, node:content_page is always used.
  $metatags = metatag_config_load_with_defaults('node:content_page');

  foreach ($metatags as $key => $value) {
    $token_value = token_replace($value['value'], array('node' => $node_with_metadata));
    if (!empty($token_value) && $token_value != $value['value']) {
      if (preg_match('/href="([^"]*)"/i', $token_value, $regs)) {
        $token_value = $regs[1];
      }
      if (in_array($key, $multi_value_key)) {
        $token_values = explode(',', $token_value);
        $count = 0;
        foreach ($token_values as $token_value) {
          $element = array(
            '#tag' => 'meta',
            '#attributes' => array(
              'name' => $key,
              'content' => trim($token_value),
            ),
          );
          if (array_key_exists($key, $schema_array)) {
            $element['#attributes']['schema'] = $schema_array[$key];
          }

          drupal_add_html_head($element, $key . $count);
          $count++;
        }
      }
      else {
        $element = array(
          '#tag' => 'meta',
          '#attributes' => array(
            'name' => $key,
            'content' => $token_value,
          ),
        );
        if (array_key_exists($key, $schema_array)) {
          $element['#attributes']['schema'] = $schema_array[$key];
        }
        drupal_add_html_head($element, $key);
        //Add in web resources link canonical thing here
        if ($key == 'DCTERMS.identifier') {
          $element = array(
            '#tag' => 'link',
            '#attributes' => array(
              'rel' => 'canonical',
              'content' => $token_value,
            ),
          );
          drupal_add_html_head($element, 'canonical');
        }
      }
    }
  }
}

// FacetAPI Bonus hooks to alter the display of facet links
function datagovau_bootstrap_facet_items_alter(&$build, &$settings) {
  if ($settings->facet == "sm_field_portfolio") {
    foreach ($build as $key => $item) {
      if (isset($build[$key]['#indexed_value']) && !empty($build[$key]['#indexed_value'])) {
        $faceted_node = explode(':', $build[$key]['#indexed_value']);
        if (count($faceted_node) == 2) {
          if (($faceted_node[0] == 'node') && is_numeric($faceted_node[1])) {
            $facet_nid = $faceted_node[1];
            $node_menu_item = menu_get_item('node/' . $facet_nid);
            $node_menu_item = $node_menu_item['page_arguments'][0];
            if (isset($node_menu_item) && !empty($node_menu_item)) {
              $build[$key]["#markup"] = $node_menu_item->field_title[und][0]['value'];
            }
          }
        }
      }
    }
  }
  if ($settings->facet == "sm_field_creator") {
    foreach ($build as $key => $item) {
      if (isset($build[$key]['#indexed_value']) && !empty($build[$key]['#indexed_value'])) {
        $faceted_node = explode(':', $build[$key]['#indexed_value']);
        if (count($faceted_node) == 2) {
          if (($faceted_node[0] == 'node') && is_numeric($faceted_node[1])) {
            $facet_nid = $faceted_node[1];
            $node_menu_item = menu_get_item('node/' . $facet_nid);
            $node_menu_item = $node_menu_item['page_arguments'][0];
            if (isset($node_menu_item) && !empty($node_menu_item) && ($facet_nid != 1)) {
              $build[$key]["#markup"] = $node_menu_item->field_title[und][0]['value'];
            }
            if ($facet_nid == 1) {
              unset($build[$key]);
            }
          }
        }
      }
    }
  }
}

function datagovau_bootstrap_js_alter(&$javascript) {
  $node_admin_paths = array(
    'node/*/edit',
    'node/add',
    'node/add/*',
  );
  $replace_jquery = TRUE;
  if (path_is_admin(current_path())) {
    $replace_jquery = FALSE;
  }
  else {
    foreach ($node_admin_paths as $node_admin_path) {
      if (drupal_match_path(current_path(), $node_admin_path)) {
        $replace_jquery = FALSE;
      }
    }
  }
  // Swap out jQuery to use an updated version of the library.
  if ($replace_jquery) {
    $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'datagovau_bootstrap') . '/js/jquery.min.js';
  }
}

function datagovau_bootstrap_html_tag($vars) {
  if ($vars['element']['#tag'] == 'script') {
    unset($vars['element']['#value_prefix']);
    unset($vars['element']['#value_suffix']);
  }
  return theme_html_tag($vars);
}
