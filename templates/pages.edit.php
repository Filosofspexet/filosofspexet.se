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
      <a class="btn btn-primary" href="<?php echo Uri::create('/sidor/admin'); ?>">
        <i class="fa fa-list-alt"></i>
        <?php echo __('Lista alla sidor'); ?>
      </a>
      <a class="btn btn-primary" href="<?php echo Uri::create(sprintf('/%s', $page->slug)); ?>">
        <i class="fa fa-external-link"></i>
        <?php echo __('Visa sida'); ?>
      </a>
      <h1><?php echo __('Ändra sida'); ?></h1>
      <form method="post" action="<?php echo Uri::create(sprintf('/sidor/andra/%d', $page->id)); ?>">
        <?php echo $this->render('pages.form.php'); ?>
      </form>
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>