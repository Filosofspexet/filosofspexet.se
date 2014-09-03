<div class="social">
  <?php if(Config::get('facebook.app.id') && Config::get('facebook.app.secret')) : ?>
    <a class="btn btn-block btn-social btn-facebook">
    <i class="fa fa-facebook"></i> <?php echo __('Logga in med Facebook'); ?>
    </a>
  <?php endif; ?>
  <a class="btn btn-block btn-social btn-google-plus">
    <i class="fa fa-google-plus"></i> <?php echo __('Logga in med Google'); ?>
  </a>
  <a class="btn btn-block btn-social btn-instagram">
    <i class="fa fa-instagram"></i> <?php echo __('Logga in med Instagram'); ?>
  </a>
</div>