<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<?php if(true || sizeof($slider_images)) : ?>
  <?php echo $this->render('images.slider.php'); ?>
<?php endif; ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-9 page-main">
      <h1>Startsida</h1>
      <div class="lead">
        Sed eleifend, est quis tempus euismod, velit felis efficitur sapien, et tempor libero mi ac massa. Aliquam maximus eleifend lectus. Donec quis placerat arcu. Aenean interdum cursus ornare. Nam pharetra in nulla sit amet fermentum. Nunc consequat, eros eget sollicitudin feugiat, sem nisl sagittis felis, id iaculis ante leo quis libero. Sed semper, elit sed hendrerit suscipit, nibh lacus mattis enim, et aliquet ex erat eget orci. Aliquam pellentesque magna lacus, et posuere metus feugiat ut. Donec dui orci, facilisis a augue quis, vehicula fermentum eros.
      </div>
      <div class="body-text">
        <p>
          Integer molestie risus sapien, in hendrerit metus gravida eget. Donec blandit velit nec vehicula vehicula. Donec aliquam nisl nec dolor euismod semper. Ut fermentum sit amet leo eu efficitur. Nulla porta tincidunt nibh, bibendum porttitor sem aliquam id. Nullam ut erat non sem maximus vulputate. Maecenas vel interdum metus. Etiam vestibulum nulla non leo vehicula laoreet. Sed lacus justo, fringilla non iaculis nec, pellentesque non diam. Suspendisse eleifend aliquam massa, sed pharetra ante vestibulum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
        </p>
        <p>
          Sed tempus tellus eget tincidunt mattis. Cras quis auctor ex. Nulla ac lacus non leo commodo semper. Nullam nibh leo, sodales sit amet ligula ac, luctus scelerisque dolor. Maecenas urna ipsum, consectetur in augue a, ultricies luctus leo. Praesent convallis lectus pretium velit convallis ullamcorper. Mauris finibus nunc ante, a ullamcorper ex pellentesque et. Cras pretium volutpat congue. Integer rutrum mattis enim, vitae pharetra felis pulvinar lacinia.
        </p>
        <p>
          Aliquam tincidunt mi vitae sem varius, non rhoncus quam venenatis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec et orci tincidunt ligula hendrerit facilisis. Mauris facilisis mauris a est consectetur, quis pellentesque dolor scelerisque. Nam diam lorem, scelerisque vel aliquet et, mattis sed massa. Nulla et commodo ipsum. Donec rhoncus eleifend enim, ut elementum quam hendrerit in. Phasellus et eleifend ante, sed suscipit risus.
        </p> 
     </div>
    </div>
    <div class="col-md-3 page-right">
      <?php foreach($widgets as $widget) : ?>
        <div class="widget <?php echo $widget->name; ?>">
          <?php echo $this->render(sprintf('%s.widget.php', $widget->name), $widget->data); ?>
        </div>
      <?php endforeach; ?>   
      <?php #echo $this->render('google.calendar.widget.php'); ?>
      <?php #echo $this->render('facebook.widget.php'); ?>
      <?php #echo $this->render('instagram.widget.php'); ?>
    </div>
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>