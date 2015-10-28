<?php
/**
 * @file
 * Returns the HTML for comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728216
 */
?>
<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>


  <h3 class="author">
    <?php print $author; ?>
    <small><?php print date('j F Y', $comment->created); ?></small>
  </h3>
  <?php if ($status == 'comment-unpublished'): ?>
    <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
  <?php endif; ?>


  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['links']);
    print render($content);
  ?>

  <?php //print render($content['links']) ?>
</article>
<hr class="small">