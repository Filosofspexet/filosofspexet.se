<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12 page-main">
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default</a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
    
      <h1><?php echo __('Interna sidor'); ?></h1>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a viverra neque, eu aliquam diam. Vestibulum ut lectus semper, commodo nulla non, suscipit enim. Quisque vel elit malesuada, congue ligula id, imperdiet nisl. Nam aliquam a dolor eget blandit. Aenean laoreet mattis nunc. Aliquam feugiat ornare mollis. Vestibulum vel dictum nunc. Aliquam pharetra dolor in ligula hendrerit, sed lacinia lacus sagittis. Maecenas tincidunt pellentesque ex vitae pharetra. Mauris dolor felis, sodales eget massa vel, condimentum tincidunt justo. Curabitur cursus augue nunc, in dignissim sapien dictum non. Maecenas eget lorem laoreet, efficitur massa in, dignissim metus. Nulla facilisi. Duis accumsan non nibh eget egestas. 
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>