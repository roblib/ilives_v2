<?php
/**
 * @file
 * Islandora_solr_metadata display template.
 *
 * Variables available:
 * - $solr_fields: Array of results returned from Solr for the current object
 *   based upon defined display configuration(s). The array structure is:
 *   - display_label: The defined display label corresponding to the Solr field
 *     as defined in the configuration in translatable string form.
 *   - value: An array containing all the result(s) found for the specific field
 *     in Solr for the current object when queried against Solr.
 * - $found: Boolean indicating if a Solr doc was found for the current object.
 * - $not_found_message: A string to print if there was no document found in
 *   Solr.
 *
 * @see template_preprocess_islandora_solr_metadata_display()
 * @see template_process_islandora_solr_metadata_display()
 */
?>
<?php if ($found):
  if (!(empty($solr_fields) && variable_get('islandora_solr_metadata_omit_empty_values', FALSE))):?>
<table <?php $print ? print('class="collection-object__metadata islandora islandora-metadata"') : print('class="collection-object__metadata islandora islandora-metadata "');?>>
  <thead>
    <tr>
      <th colspan="2"><h2>Object Metadata</h2></th>
    </tr>
  </thead>
  <!--<div class="fieldset-wrapper">-->
  <!--<dl xmlns:dcterms="http://purl.org/dc/terms/" class="islandora-inline-metadata islandora-metadata-fields">-->
    <tbody>
      <?php $row_field = 0; ?>
      <?php foreach($solr_fields as $value): ?>
      <tr>
        <td class="collection-object__metadata__label <?php print $row_field == 0 ? ' first' : ''; ?>">
        <?php print $value['display_label']; ?>
  <span class="colon">:</span>
        </td>
        <td class="collection-object__metadata__value <?php print $row_field == 0 ? ' first' : ''; ?>">
        <?php print check_markup(implode($variables['separator'], $value['value']), 'islandora_solr_metadata_filtered_html'); ?>
        </td>
      </tr>
      <?php $row_field++; ?>
      <?php endforeach; ?>
    </tbody>
  <!--</dl>-->
  <!--</div>-->
</table>
<?php endif; ?>
<?php else: ?>
<table <?php $print ? print('class="collection-object__metadata islandora islandora-metadata"') : print('class="collection-object__metadata islandora islandora-metadata "');?>>
    <?php //XXX: Hack in markup for message. ?>
    <div class="messages--warning messages warning">
      <?php print $not_found_message; ?>
    </div>
  </table>
<?php endif; ?>

