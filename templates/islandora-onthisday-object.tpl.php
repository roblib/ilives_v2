<?php

/**
 * @file
 * Islandora-onthisday-object.tpl.php.
 *
 * Used only in the block, not the gallery.
 */
?>
<div class="card-divider">
  <h2 class="title">Featured Image</h2>
</div>
  <a class="lp-feature-block__image__link" href="<?php print filter_xss($islandora_object['title_link']); ?>"><img class="lp-feature-block__image" src="<?php print $islandora_object['thumb_link']; ?>" /></a>
  <div class="card-section lp-feature-block__caption"><a href="<?php print filter_xss($islandora_object['title_link']); ?>"><?php print $islandora_object['label']; ?></a>
  <?php if (strlen($islandora_object['year'])): ?>
    (<?php print $islandora_object['year']; ?>)
  <?php endif; ?>
  </div>
