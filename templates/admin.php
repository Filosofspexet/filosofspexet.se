<?php echo $this->render('header.html.admin.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12 page-main">
      <?php echo $this->render('admin.menu.php'); ?> 
      <h1><?php echo __('Interna sidor'); ?></h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a viverra neque, eu aliquam diam. Vestibulum ut lectus semper, commodo nulla non, suscipit enim. Quisque vel elit malesuada, congue ligula id, imperdiet nisl. Nam aliquam a dolor eget blandit. Aenean laoreet mattis nunc. Aliquam feugiat ornare mollis. Vestibulum vel dictum nunc. Aliquam pharetra dolor in ligula hendrerit, sed lacinia lacus sagittis. Maecenas tincidunt pellentesque ex vitae pharetra. Mauris dolor felis, sodales eget massa vel, condimentum tincidunt justo. Curabitur cursus augue nunc, in dignissim sapien dictum non. Maecenas eget lorem laoreet, efficitur massa in, dignissim metus. Nulla facilisi. Duis accumsan non nibh eget egestas. 
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>