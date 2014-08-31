<?php echo $this->render('header.html.admin.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php $this->render('menu.horizontal.php', $menu); ?>
<?php endif; ?>
<h1>
  <?php echo __('Skapa sida')?>
</h1>
<?php echo $this->render('pages.form.php'); ?>
<?php echo $this->render('footer.html.admin.php'); ?>