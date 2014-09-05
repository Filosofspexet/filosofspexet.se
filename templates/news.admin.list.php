<?php echo $this->render('header.html.admin.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<?php echo $this->render('flash.status.php'); ?>
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12 page-main">
      <?php echo $this->render('admin.menu.php'); ?> 
      <a class="btn btn-primary" href="<?php echo Uri::create('nyheter/skapa'); ?>">
        <i class="fa fa-plus"></i>
        <?php echo __('Ny nyhet'); ?>
      </a>
      <h1><?php echo __('Nyheter'); ?></h1>
      <?php echo paginator('/nyheter/admin?page=%d', $current_page, $num_pages); ?>  
      <table class="table table-striped">
        <thead>
          <?php echo tableHeader('/nyheter/admin', array(
            'id'            => __('Id'),
            'headline'      => __('Rubrik'),
            'user_id'       => __('Användare'),
            'created'       => __('Skapad'),
            'changed'       => __('Ändrad')
          )); ?>
          <th><?php echo __('Åtgärder')?></th>
        </thead>
        <tbody>
        <?php foreach($items as $news) : ?>
          <tr>
            <td><?php echo $news->id; ?></td>
            <td>
              <a href="<?php echo Uri::create(sprintf('/nyheter/%s', $news->slug)); ?>">
                <?php echo $news->headline; ?>
              </a>
            </td>                                  
            <td><?php echo $news->user['username']; ?></td>
            <td><?php echo date(Config::get('date.format'), $news->created); ?></td>
            <td><?php echo date(Config::get('date.format'), $news->changed); ?></td>  
            <td>
              <a href="<?php echo Uri::create(sprintf('/nyheter/andra/%d',  $news->id)); ?>" class="btn btn-primary">
                <i class="fa fa-edit"></i>
                Ändra
              </a>
              <a href="<?php echo Uri::create(sprintf('/nyheter/tabort/%d', $news->id)); ?>" class="btn btn-danger delete">
                <i class="fa fa-remove"></i>
                Ta bort
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <?php echo paginator('/nyheter/?page=%d', $current_page, $num_pages); ?>      
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>