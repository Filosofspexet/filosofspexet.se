<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<?php if(true || sizeof($slider_images)) : ?>
  <?php echo $this->render('images.slider.php'); ?>
<?php endif; ?>
<?php echo $this->render('flash.status.php'); ?>
<div class="container" id="main">
  <div class="row">  
    <div class="col-md-9">   
      <div class="row">
        <div class="col-md-12 page-main">
          <h1>
          <?php echo $page->title; ?>
          </h1>
          <div class="lead">
            <?php echo $page->leadtext; ?>
          </div>
          <div class="body-text">
            <?php echo $page->bodytext; ?>
            <div class="fb-like" data-href="<?php echo Uri::create(); ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
          </div>
        </div>
      </div>    
      <div class="row">
        <div class="col-md-6 col-sm-6 page-news">
          <?php echo $this->render('news.widget.php'); ?>
        </div>
        <div class="col-md-6 col-sm-6 page-calendar">
          <?php echo $this->render('calendar.widget.php'); ?>
        </div>
      </div>
    </div>
    <div class="col-md-3 page-right">
      <?php foreach($widgets as $widget => $data) : ?>
        <div class="widget <?php echo $widget; ?>">
          <?php echo $this->render(sprintf('%s.widget.php', $widget), $data); ?>
        </div>
      <?php endforeach; ?> 
    </div>
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>