<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php $this->render('menu.php', $menu); ?>
<?php endif; ?>
<?php echo $this->render('flash.status.php'); ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12 page-main">
      <?php if(!$user) : ?>
        <?php echo $this->render('login.form.php'); ?>
        <?php echo $this->render('login.social.php'); ?>
      <?php else: ?>
        <?php echo sprintf(__('Du är inloggad som %s'), $user->username); ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>