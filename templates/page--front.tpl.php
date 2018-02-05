<?php
//kpr(get_defined_vars());
//kpr($theme_hook_suggestions);
//template naming
//page--[CONTENT TYPE].tpl.php
//

if(drupal_is_front_page()) {unset($page['content']['system_main']['default_message']);}
$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
?>
<?php if( theme_get_setting('mothership_poorthemers_helper') ){ ?>
<!-- page.tpl.php-->
<?php } ?>

<?php print $mothership_poorthemers_helper; ?>
<!--header-->
<header role="banner" class="navbar--wrapper">
  <div class="navbar">
    <div class="navbar__left">
      <ul class="menu navbar--branding">
        <li class="navbar--branding__logo">
          <figure>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
              <img src="/<?php print $theme_path; ?>/dist/images/UPEI_Logo_white.svg" alt="<?php print t('Home'); ?>" />
            </a>
          </figure>
        </li>
        <li class="navbar--branding__title">
          <h1><?php print $site_name; ?></h1>
        </li>
      </ul>
    </div>
    <div class="navbar__right header-region">
      <?php print render($page['header']); ?>
    </div>
  </div>
</header>
<!--/header-->


<div class="page">
  <div role="main" id="main-content">

    <?php print render($page['content_pre']); ?>

    <?php print render($page['content']); ?>

    <?php print render($page['content_post']); ?>

  </div><!-- /main-->

</div><!-- /page-->

<footer role="contentinfo">
<div class="container">

  <div class="footer-left footer-branding">
      <figure class="footer-logo">
    <a href="upei.ca">
        <img src="<?php print $theme_path; ?>/dist/images/UPEI_Logo_white.svg" alt=""></a>


      </figure>

<div class="footer-blurb">

      IslandLives is part of the <a href="islandarchives.ca">IslandArchives Collection</a>
</div>
  </div>
  <div class="footer-right footer-region">
    <?php print render($page['footer']); ?>
  </div>
</div>
</footer>
