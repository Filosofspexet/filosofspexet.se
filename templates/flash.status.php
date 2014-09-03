<?php $statuses = array('success', 'info', 'warning', 'danger'); ?>
<?php if(isset($flash['success']) || isset($flash['info'])|| isset($flash['warning']) || isset($flash['danger'])) : ?>
  <div class="container flash">
    <div class="row">  
      <div class="col-md-12">  
        <?php foreach($statuses as $status) :?>
          <?php if(isset($flash[$status])): ?>
            <div class="alert alert-<?php echo $status?>" role="alert">
              <?php echo $flash[$status]; ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>       
      </div>
    </div>      
  </div>
<?php endif; ?>