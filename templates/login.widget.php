<div class="panel panel-primary">
  <div class="panel-heading">
    <i class="fa fa-arrow-right"></i>
    Inloggning
  </div>
  <div class="panel-body">
    <?php if(!$user) : ?>
      <?php echo $this->render('login.widget.form.php'); ?>
      <?php echo $this->render('login.widget.social.php'); ?>
    <?php else: ?>
      <div class="row">
        <div class="col-md-2">
          <img src="<?php printf('http://www.gravatar.com/avatar/%s?s=40', md5($user->email)); ?>" />
        </div>
        <div class="col-md-10">
          <?php echo sprintf(__('Du är inloggad som %s'), $user->username); ?>
        </div>
      </div>  
      <div class="row">
        <div class="col-md-10 col-md-offset-2 logout">
          <a class="btn btn-default" href="<?php echo Uri::create('/users/logout'); ?>"><?php echo __('Logga ut'); ?></a>
        </div>
      </div>       
    <?php endif; ?>
  </div>
</div>