<?php if(Config::get('facebook.app.id') && Config::get('facebook.app.secret')) : ?>
  <div id="facebook-login">
    <fb:login-button></fb:login-button>
  </div>
<?php endif; ?>