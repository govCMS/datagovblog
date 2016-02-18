<?php include 'includes/header.tpl.php'; ?>

<main>
  <!-- #page -->
  <div id="page" class="clearfix">
    <!-- #main-content -->
    <div id="main-content">

      <div class="container">
        <div class="col-md-8 col-md-offset-2">
          <h1>Search blog</h1>
          <!-- #messages-console -->
          <?php if ($messages): ?>
            <div id="messages-console" class="clearfix">
              <div class="row">
                <div class="col-md-12">
                  <?php print $messages; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <!-- EOF: #messages-console -->
          <?php if ($breadcrumb && theme_get_setting('breadcrumb_display')): ?>
            <!-- #breadcrumb -->
            <div id="breadcrumb" class="clearfix">
              <!-- #breadcrumb-inside -->
              <div id="breadcrumb-inside" class="clearfix">
                <?php print $breadcrumb; ?>
              </div>
              <!-- EOF: #breadcrumb-inside -->
            </div>
            <!-- EOF: #breadcrumb -->
          <?php endif; ?>

          <!-- #tabs -->
          <?php if ($tabs): ?>
            <div class="tabs">
              <?php print render($tabs); ?>
            </div>
          <?php endif; ?>
          <!-- EOF: #tabs -->

          <!-- #action links -->
          <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
          <?php endif; ?>
          <!-- EOF: #action links -->
          <?php print render($page['content']); ?>
        </div>
      </div>


    </div>
    <!-- EOF:#main-content -->

  </div>
  <!-- EOF:#page -->
</main>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <ul class="small-links">
          <li>
            <a href="https://data.gov.au/about">About data.gov.au</a>
          </li>
        </ul>
      </div>
      <div class="col-md-4 text-center">
        <ul class="list-inline social">
          <li>
            <a href="https://twitter.com/datagovau"><i class="icon-twitter"></i><span class="sr-only">Twitter</span></a>
          </li>
          <li>
            <a href="/feed"><i class="icon-rss-square"></i><span class="sr-only">RSS</span></a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <a href="https://govcms.gov.au/" class="powered pull-right text-center">
          <span>Powered by</span>
          <img alt="govcms" src="<?php print '/' . path_to_theme(); ?>/img/govcms.svg" width="45" height="45">
        </a>
      </div>
    </div>
  </div>
</footer>
<!-- EOF:#footer -->
