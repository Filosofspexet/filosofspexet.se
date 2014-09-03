<div class="panel panel-primary">
  <div class="panel-heading">Inloggning</div>
  <div class="panel-body">
    <?php if(!$user) : ?>
      <?php echo $this->render('login.widget.form.php'); ?>
      <?php echo $this->render('login.widgetsocial.php'); ?>
    <?php else: ?>
      <?php echo sprintf(__('Du är inloggad som %s'), $user->username); ?>
    <?php endif; ?>
  </div>
</div>