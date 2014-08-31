<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.social.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php $this->render('menu.horizontal.php', $menu); ?>
<?php endif; ?>
<?php if(sizeof($slider_images)) : ?>
  <?php $this->render('images.slider.php', $slider_images); ?>
<?php endif; ?>
Actual page content here
<?php echo $this->render('footer.social.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>