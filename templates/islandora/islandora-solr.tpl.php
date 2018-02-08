<?php
/**
 * @file
 * Islandora solr search primary results template file.
 *
 * Variables available:
 * - $results: Primary profile results array
 *
 * @see template_preprocess_islandora_solr()
 */

?>
<!-- dummy result -->
  <div class="search-results islandora islandora-solr-search-results">
      <!-- Search result -->
      <div class="search-result__wrapper islandora-solr-search-result clear-block">
        <div class="search-result islandora-solr-search-result-inner">
          <!-- Thumbnail -->
          <dl class="search-result__thumbnail solr-thumb">
            <dt>
<img src="https://via.placeholder.com/150X250" alt="">
            </dt>
            <dd></dd>
          </dl>
          <!-- Metadata -->
          <dl class="search-result__metadata solr-fields islandora-inline-metadata">
              <dt class="solr-label search-result__metadata__label ">
Title
              </dt>
              <dd class="solr-value search-result__metadata__value ">
Necronomicon
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Author
              </dt>
              <dd class="solr-value search-result__metadata__value ">
Robert Drew
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Place
              </dt>
              <dd class="solr-value search-result__metadata__value ">
Charlottetown
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Organization
              </dt>
              <dd class="solr-value search-result__metadata__value ">
UPEI
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Date
              </dt>
              <dd class="solr-value search-result__metadata__value ">
1900
              </dd>
          </dl>
        </div>
      </div>
  </div>
  <div class="search-results islandora islandora-solr-search-results">
      <!-- Search result -->
      <div class="search-result__wrapper islandora-solr-search-result clear-block">
        <div class="search-result islandora-solr-search-result-inner">
          <!-- Thumbnail -->
          <dl class="search-result__thumbnail solr-thumb">
            <dt>
<img src="https://via.placeholder.com/150X250" alt="">
            </dt>
            <dd></dd>
          </dl>
          <!-- Metadata -->
          <dl class="search-result__metadata solr-fields islandora-inline-metadata">
              <dt class="solr-label search-result__metadata__label ">
Title
              </dt>
              <dd class="solr-value search-result__metadata__value ">
Necronomicon
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Author
              </dt>
              <dd class="solr-value search-result__metadata__value ">
Robert Drew
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Place
              </dt>
              <dd class="solr-value search-result__metadata__value ">
Charlottetown
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Organization
              </dt>
              <dd class="solr-value search-result__metadata__value ">
UPEI
              </dd>
              <dt class="solr-label search-result__metadata__label ">
Date
              </dt>
              <dd class="solr-value search-result__metadata__value ">
1900
              </dd>
          </dl>
        </div>
      </div>
  </div>

<!-- /dummy result -->

<?php if (empty($results)): ?>
  <p class="no-results"><?php print t('Sorry, but your search returned no results.'); ?></p>
<?php else: ?>
  <div class="search-results islandora islandora-solr-search-results">
    <?php $row_result = 0; ?>
    <?php foreach($results as $key => $result): ?>
      <!-- Search result -->
      <div class="search-result__wrapper islandora-solr-search-result clear-block <?php print $row_result % 2 == 0 ? 'odd' : 'even'; ?>">
        <div class="search-result islandora-solr-search-result-inner">
          <!-- Thumbnail -->
          <dl class="search-result_thumbnail solr-thumb">
            <dt>
              <?php print $result['thumbnail']; ?>
            </dt>
            <dd></dd>
          </dl>
          <!-- Metadata -->
          <dl class="search-result__metadata solr-fields islandora-inline-metadata">
            <?php foreach($result['solr_doc'] as $key => $value): ?>
              <dt class="solr-label search-result__metadata__label <?php print $value['class']; ?>">
                <?php print $value['label']; ?>
              </dt>
              <dd class="solr-value search-result__metadata__value <?php print $value['class']; ?>">
                <?php print $value['value']; ?>
              </dd>
            <?php endforeach; ?>
          </dl>
        </div>
      </div>
    <?php $row_result++; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
