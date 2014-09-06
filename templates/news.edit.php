<?php echo $this->render('header.html.admin.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<?php echo $this->render('flash.status.php'); ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12 page-main">
      <?php echo $this->render('admin.menu.php'); ?> 
      <a class="btn btn-primary" href="<?php echo Uri::create('/nyheter/admin'); ?>">
        <i class="fa fa-list-alt"></i>
        <?php echo __('Lista alla nyheter'); ?>
      </a>
      <a class="btn btn-primary" href="<?php echo Uri::create(sprintf('/nyheter/%s', $news->slug)); ?>">
        <i class="fa fa-external-link"></i>
        <?php echo __('Visa nyhet'); ?>
      </a>
      <h1><?php echo __('Ändra nyhet'); ?></h1>
      <form method="post" enctype="multipart/form-data" action="<?php echo Uri::create(sprintf('/nyheter/andra/%d', $news->id)); ?>">
        <?php echo $this->render('news.form.php'); ?>
      </form>
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>