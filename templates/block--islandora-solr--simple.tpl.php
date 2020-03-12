<?php
 //kpr($variables);
// kpr($variables['template_files']);
//  http://api.drupal.org/api/drupal/modules--block--block.tpl.php/7
$searchOptions = module_invoke('menu', 'block_view', 'menu-search-options');
?>


<button class="navbar--search__dropdown-trigger button" type="button" data-toggle="navbar--search"><i class="fas fa-search"></i></button>
<div class="navbar--search__dropdown-pane dropdown-pane" id="navbar--search" data-dropdown data-auto-focus="true">
  <?php //print $content ?>
<?php //print render($searchOptions['content']); ?>
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
 <form class="block--lp-search__form" action="/" method="post" id="islandora-solr-simple-search-form" accept-charset="UTF-8" _lpchecked="1">
      <div class="container-inline form-wrapper" id="edit-simple">
         <div>
            <label class="element-invisible" for="edit-islandora-simple-search-query">Search Term</label>
            <input class="block--lp-search__input" placeholder="Search IslandLives..." type="text" id="edit-islandora-simple-search-query" name="islandora_simple_search_query" value="" size="30" maxlength="128">
         </div>
      </div>
      <input type="hidden" name="form_build_id" value="form-bMT4IezuTfYVwWTK2PxegzL_qnXyN4hdENaY774XWoo">
      <input type="hidden" name="form_token" value="UZxyQSAuS-ALo4QHT1Bz3lSp15yAhb7R19d096zyywM">
      <input type="hidden" name="form_id" value="islandora_solr_simple_search_form">
   <ul class="menu menu--search-options">
      <li class="first"><a href="/advanced-search">Advanced Search</a></li>
      <li class="last">
         <input class="block--lp-search__button" type="submit" id="edit-submit" name="op" value="Search">
</li>
   </ul>
   </form>
<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
</div>

