<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>



  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php print '/' . path_to_theme(); ?>favicons/favicon-144.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php print '/' . path_to_theme(); ?>favicons/favicon-152.png"/>
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print '/' . path_to_theme(); ?>favicons/favicon-144.png"/>
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php print '/' . path_to_theme(); ?>favicons/favicon-120.png"/>
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print '/' . path_to_theme(); ?>favicons/favicon-114.png"/>
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print '/' . path_to_theme(); ?>favicons/favicon-72.png"/>
  <link rel="apple-touch-icon-precomposed" href="<?php print '/' . path_to_theme(); ?>favicons/favicon-57.png"/>


  <meta name="theme-color" content="#ffffff">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="mobile-web-app-capable" content="yes">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,300,700' rel='stylesheet' type='text/css'>

  <meta property="og:title" content="<?php print $head_title; ?>" />

  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
  <script src="<?php print '/' .  path_to_theme(); ?>/javascripts/vendor/html5shiv.min.js"></script>
  <![endif]-->
  <?php if (theme_get_setting('responsive_respond', 'datagovau_bootstrap')): ?>
    <script src="<?php print '/' .  path_to_theme(); ?>/javascripts/vendor/rem.min.js"></script>
    <script src="<?php print '/' .  path_to_theme(); ?>/javascripts/vendor/modernizr-n-respond.min.js"></script>
  <?php endif; ?>

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<div id="skip-link">
  <a href="#main" tabindex="1" class="screen-reader-text"><?php print t('Skip to main content'); ?></a>
</div>
<!-- JS compatibility message -->
<noscript>&lt;a id="msgNojs" href="http://enable-javascript.com/" target="_blank"&gt;This site requires JavaScript. Click here for instructions on enabling it in your browser&lt;/a&gt;</noscript>
<!-- IE compatibility message -->
<!--[if lte IE 8]>
<div id="msg-legacy-browser" class="alert alert-warning" role="alert">
  Parts of this site may not work properly because you are using an outdated browser.
</div>
<![endif]-->

<div id="main-body">
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <div id="is_tablet"></div>
  <div id="is_mobile"></div>
</div>
</body>
</html>
