<div class="container breadcrumb-container">
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <?php $first = true; ?>
        <?php $num_elements = sizeof($breadcrumbs); ?>
        <?php $i = 0; ?>
        <?php foreach($breadcrumbs as $label => $url) : ?>
          <?php $i++; ?>
            <li<?php echo $i == $num_elements ? ' class="active"' : ''; ?>>
              <?php if($url) : ?>
                 <a href="<?php echo $url; ?>">
                   <?php echo $label; ?>
                 </a>
              <?php else: ?>
                 <?php echo $label; ?>
              <?php endif; ?>
              <?php $first = false;?>
           </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
</div>