<?php
/**
* @file
* This is the template file for the object page for large image
*
* Available variables:
* - $islandora_object: The Islandora object rendered in this template file
* - $islandora_dublin_core: The DC datastream object
* - $dc_array: The DC datastream object values as a sanitized array. This
* includes label, value and class name.
* - $islandora_object_label: The sanitized object label.
*
* @see template_preprocess_islandora_dublin_core_display()
* @see theme_islandora_dublin_core_display()
*/
?>
<table <?php $print ? print('class="collection-object__metadata islandora islandora-metadata"') : print('class="collection-object__metadata islandora islandora-metadata "');?>>
  <thead>
    <tr>
      <th colspan="2"><h2>Object Metadata</h2></th>
    </tr>
  </thead>
  <tbody>
      <?php $row_field = 0; ?>
      <?php foreach($dc_array as $key => $value): ?>
        <tr>
          <td class="collection-object__metadata__label" property="<?php print $value['dcterms']; ?>" content="<?php print filter_xss(htmlspecialchars($value['value'], ENT_QUOTES, 'UTF-8')); ?>" class="<?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print filter_xss($value['label']); ?>
  <span class="colon">:</span>
          </td>
          <td class="collection-object__metadata__value <?php print $value['class']; ?><?php print $row_field == 0 ? ' first' : ''; ?>">
            <?php print filter_xss($value['value']); ?>
          </td>
        </tr>
        <?php $row_field++; ?>
      <?php endforeach; ?>
  </tbody>
</table></td>
</tbody></th>
</tr>
</thead>
</table>
