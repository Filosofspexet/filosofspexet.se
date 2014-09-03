<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<div class="container" id="main">
  <div class="row">  
    <div class="col-md-9">   
      <div class="row">
        <div class="col-md-12 page-main">
          <h1>
          <?php echo $title; ?>
          </h1>
          <div class="lead">
            <?php echo $leadtext; ?>
          </div>
          <div class="body-text">
            <?php echo $bodytext; ?>
            <div class="fb-like" data-href="<?php echo Uri::create(); ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
          </div>
        </div>
      </div>        
    </div>
    <div class="col-md-3 page-right">
      <?php foreach($widgets as $widget) : ?>
        <div class="widget <?php echo $widget->name; ?>">
          <?php echo $this->render(sprintf('%s.widget.php', $widget->name), $widget->data); ?>
        </div>
      <?php endforeach; ?>   
      <?php #echo $this->render('google.calendar.widget.php'); ?>
      <?php #echo $this->render('facebook.widget.php'); ?>
      <?php #echo $this->render('instagram.widget.php'); ?>
    </div>
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>