<header id="top">
  <div class="container">
    <div class="row">
      <div class="col-md-5 logos">
        <a href="/">
          <div class="coa-stacked">
            <div class="coa-coa">
              <span class="crest"></span>
            </div>
            <!--[if lte IE 7]>
            <style>.coa-titles { display: block; }</style>
            <![endif]-->
            <div class="coa-titles-stacked">
              <div class="coa-titles">
                <span class="coa-line-one coa-lines-1">Australian Government</span>
              </div>
            </div>
          </div>
          <img src="<?php print '/' . path_to_theme(); ?>/img/data.svg" class="logo" alt="blog.data.gov.au" height="75">
        </a>
      </div>
      <div class="col-md-7">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/">Blog</a></li>
          <li><a href="http://data.gov.au/">back to data.gov.au</a></li>
          <li>
            <div class="form-group">
              <div class="sr-only">Search blog</div>
              <?php print $search_box; ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>


<main>
  <!-- #page -->
  <div id="page" class="clearfix">
    <!-- <div class="decoration"></div> -->

    <!-- #main-content -->
    <div id="main-content">
      <div class="container content">
        <section class="col-md-8 col-md-offset-2" id="top">
        <div id="page-404">
          <h1 class="text-center">404 <span>Page not found</span></h1>
          <h2>Get back on track:</h2>
          <ul>
            <li>The address may have changed since you last accessed the page. We recommend you go back to our <a href="/">homepage</a> or try searching our website to find what you're looking for.</li>
            <li>If you typed the address, make sure the spelling is correct.</li>
            <li>You can also go to the <a href="/site-map">site map</a> for an overview of our website.</li>
            <li>If you received this error after clicking on a link from within our website, or if the problem persists, please report the error via our <a href="/contact-us">contact us</a> form.</li>
          </ul>
          <p>&nbsp;</p>
        </div>
        </section>
      </div>
    </div>
    <!-- <div class="decoration"></div> -->
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
