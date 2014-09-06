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
      <a class="btn btn-primary" href="<?php echo Uri::create('/kontakter/admin'); ?>">
        <i class="fa fa-list-alt"></i>
        <?php echo __('Lista alla kontakter'); ?>
      </a>
      <a class="btn btn-primary" href="<?php echo Uri::create(sprintf('/kontakter/%s', $contact->slug)); ?>" target="_blank">
        <i class="fa fa-external-link"></i>
        <?php echo __('Visa kontakt'); ?>
      </a>
      <a class="btn btn-primary" href="<?php echo Uri::create('/kontakter/skapa'); ?>">
        <i class="fa fa-plus"></i>
        <?php echo __('Ny kontakt'); ?>
      </a>
      <h1><?php echo __('Ändra kontakt'); ?></h1>
      <form method="post" enctype="multipart/form-data" action="<?php echo Uri::create(sprintf('/kontakter/andra/%d', $contact->id)); ?>">
        <?php echo $this->render('contacts.form.php'); ?>
      </form>
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>