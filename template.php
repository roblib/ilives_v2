<?php
/*
  Preprocess
 */

function ilives_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
//kpr($breadcrumb);

    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<ul class="breadcrumbs"><li class="breadcrumb">' . implode('</li><li class="breadcrumb">', $breadcrumb) . '</ul>';
    //$output .= '<div class="breadcrumb">' . $breadcrumb . '</div>';
    return $output;
  }
}


//kill of the <ul class="menu" around the menues
//we already have the menu-block-wrapper that adds a <nav tag
function ilives_menu_tree($variables) {
  return '<ul class="menu">' . $variables['tree'] . '</ul>';
}


//######################
// Manipulation of menus
//######################

/* main ul */
function ilives_menu_tree__menu_search_options($variables) {
  return '<ul class="menu menu--search-options">' . $variables['tree'] . '</ul>';
}




/*
function NEWTHEME_preprocess_html(&$vars) {
  //  kpr($vars['content']);
}
 */
/*
function NEWTHEME_preprocess_page(&$vars,$hook) {
  //typekit
  //drupal_add_js('http://use.typekit.com/XXX.js', 'external');
  //drupal_add_js('try{Typekit.load();}catch(e){}', array('type' => 'inline'));

  //webfont
  //drupal_add_css('http://cloud.webtype.com/css/CXXXX.css','external');

  //googlefont
  //  drupal_add_css('http://fonts.googleapis.com/css?family=Bree+Serif','external');

}
 */
/*
function NEWTHEME_preprocess_region(&$vars,$hook) {
  //  kpr($vars['content']);
}
 */
/*
function NEWTHEME_preprocess_block(&$vars, $hook) {
  //  kpr($vars['content']);

  //lets look for unique block in a region $region-$blockcreator-$delta
   $block =
   $vars['elements']['#block']->region .'-'.
   $vars['elements']['#block']->module .'-'.
   $vars['elements']['#block']->delta;

  // print $block .' ';
   switch ($block) {
     case 'header-menu_block-2':
       $vars['classes_array'][] = '';
       break;
     case 'sidebar-system-navigation':
       $vars['classes_array'][] = '';
       break;
    default:

    break;

   }


  switch ($vars['elements']['#block']->region) {
    case 'header':
      $vars['classes_array'][] = '';
      break;
    case 'sidebar':
      $vars['classes_array'][] = '';
      $vars['classes_array'][] = '';
      break;
    default:

      break;
  }

}
 */
/*
function NEWTHEME_preprocess_node(&$vars,$hook) {
  //  kpr($vars['content']);

  // add a nodeblock
  // in .info define a region : regions[block_in_a_node] = block_in_a_node
  // in node.tpl  <?php if($noderegion){ ?> <?php print render($noderegion); ?><?php } ?>
  //$vars['block_in_a_node'] = block_get_blocks_by_region('block_in_a_node');
}
 */
/*
function NEWTHEME_preprocess_comment(&$vars,$hook) {
  //  kpr($vars['content']);
}
 */
/*
function NEWTHEME_preprocess_field(&$vars,$hook) {
  //  kpr($vars['content']);
  //add class to a specific field
  switch ($vars['element']['#field_name']) {
    case 'field_ROCK':
      $vars['classes_array'][] = 'classname1';
    case 'field_ROLL':
      $vars['classes_array'][] = 'classname1';
      $vars['classes_array'][] = 'classname2';
      $vars['classes_array'][] = 'classname1';
    case 'field_FOO':
      $vars['classes_array'][] = 'classname1';
    case 'field_BAR':
      $vars['classes_array'][] = 'classname1';
    default:
      break;
  }

}
 */
/*
function NEWTHEME_preprocess_maintenance_page(){
  //  kpr($vars['content']);
}
 */


function ilives_form_alter(&$form, &$form_state, $form_id) {
  //dsm($form);

  //form id
  $simple_search_form_id = 'islandora_solr_simple_search_form';
  $advanced_search_form_id = 'islandora_solr_advanced_search_form';
  //
  if ($form_id == $advanced_search_form_id) {

    // Vars
    $form_class = 'block--lp-search__form';
    $input_field_class = 'block--lp-search__input';
    $input_field_placeholder_text = 'Search IslandLives...';
    $submit_button_class = 'block--lp-search__button';
    $submit_button_text = 'search';
$form['terms']['field']['#title'] = 'Field';
    //button text
  }
  if ($form_id == $simple_search_form_id) {

    // Vars
    $form_class = 'block--lp-search__form';
    $input_field_class = 'block--lp-search__input';
    $input_field_placeholder_text = 'Search IslandLives...';
    $submit_button_class = 'block--lp-search__button';
    $submit_button_text = 'search';

    //button text
    $form['simple']['submit']['#value'] = decode_entities('&#xf002;');
    //button class
    $form['simple']['submit']['#attributes']['class'][] = $submit_button_class;
    // input field class
    $form['simple']['islandora_simple_search_query']['#attributes']['class'][] = $input_field_class;
    // input placeholder
    $form['simple']['islandora_simple_search_query']['#attributes']['placeholder'][] = $input_field_placeholder_text;
    // form class
    $form['#attributes']['class'] = $form_class;
  }
}

