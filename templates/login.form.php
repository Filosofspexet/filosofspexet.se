<fieldset>
  <legend><?php echo __('Login'); ?></legend>
  <form action="<?php echo Uri::create('/users/login/form', compact('redirectUrl')); ?>" method="post" class="login">
    <label for="username">
      <?php echo __('Användarnamn'); ?>
    </label>
    <input type="text" name="username" id="username" />
    <label for="password">
      <?php echo __('Lösenord'); ?>
    </label>
    <input type="password" name="password" id="password" />
    <input type="submit" value="<?php echo __('Logga in'); ?>" />
  </form>
</fieldset>