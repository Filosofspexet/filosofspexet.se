<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<?php if(sizeof($slider_images)) : ?>
  <?php echo $this->render('images.slider.php'); ?>
<?php endif; ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12 page-main">
      <h1><?php echo $title; ?></h1>
      <div class="lead">
         <?php echo $leadtext; ?>
      </div>
      <div class="body-text">
        <?php echo $bodytext; ?>
      </div>
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>