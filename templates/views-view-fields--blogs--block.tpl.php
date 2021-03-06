<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($fields as $id => $field): ?>

  <?php
  if (($id == 'view_node') && !empty($field->content)) {
    $node_link = new SimpleXMLElement($field->content);
    $href = $node_link->a[0]['href'];
  }
  ?>

<?php endforeach;
if (isset($href) && !empty($href)) :
  ?>

  <article class="col-sm-6 col-md-4">
    <a href="<?php print $href; ?>" class="thumbnail">
      <div class="caption">
        <?php foreach ($fields as $id => $field): ?>
          <?php if ($id != 'view_node'): ?>
            <?php if (!empty($field->separator)): ?>
              <?php print $field->separator; ?>
            <?php endif; ?>

            <?php if ($id == 'field_title'): ?><div class="feature-tile-text-group"><?php endif; ?>
            <?php print $field->wrapper_prefix; ?>
            <?php print $field->label_html; ?>
            <?php print $field->content; ?>
            <?php print $field->wrapper_suffix; ?>
            <?php if ($id == 'field_content_extra'): ?></div><?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </a>
  </article>

<?php endif; ?>