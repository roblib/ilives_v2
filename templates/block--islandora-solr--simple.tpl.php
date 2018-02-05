<?php
 //kpr($variables);
// kpr($variables['template_files']);
//  http://api.drupal.org/api/drupal/modules--block--block.tpl.php/7
$searchOptions = module_invoke('menu', 'block_view', 'menu-search-options');
?>


<button class="navbar--search__dropdown-trigger button" type="button" data-toggle="navbar--search"><i class="fas fa-search"></i></button>
<div class="navbar--search__dropdown-pane dropdown-pane" id="navbar--search" data-dropdown data-auto-focus="true">
  <?php print $content ?>
<?php print render($searchOptions['content']); ?>
</div>

