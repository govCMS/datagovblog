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
