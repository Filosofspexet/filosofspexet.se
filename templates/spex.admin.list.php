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
      <a class="btn btn-primary" href="<?php echo Uri::create('spex/skapa'); ?>">
        <i class="fa fa-plus"></i>
        <?php echo __('Nytt spex'); ?>
      </a>
      <h1><?php echo __('Spex'); ?></h1>
      <?php echo paginator('/spex/admin?page=%d', $current_page, $num_pages); ?>  
      <table class="table table-striped">
        <thead>
          <?php echo tableHeader('/sidor/', array(
            'id'            => __('Id'),
            'title'         => __('Titel'),
            'slug'          => __('Slug'),
            'visible'       => __('Synlig'),
            'ticketprice'   => __('Biljettpris'),
            'user_id'       => __('Användare'),
            'created'       => __('Skapad'),
            'changed'       => __('Ändrad'),
          )); ?>
          <th><?php echo __('Åtgärder')?></th>
        </thead>
        <tbody>
        <?php foreach($items as $spex) : ?>
          <tr>
            <td><?php echo $spex->id; ?></td>
            <td>
              <a href="<?php echo Uri::create(sprintf('/spex/%s', $spex->slug)); ?>">
                <?php echo $spex->title; ?>
              </a>
            </td>           
            <td><?php echo $spex->slug; ?></td>                           
            <td><?php echo $spex->visible ? ('<span class="yes">' . __('Ja') . '</span>') : ('<span class="no">' . __('Nej') . '</span>'); ?></td>
            <td><?php echo $spex->ticketprice; ?></td>
            <td>
              <?php echo $spex->user['username']; ?>
            </td>
            <td><?php echo date(Config::get('date.format'), $spex->created); ?></td>
            <td><?php echo date(Config::get('date.format'), $spex->changed); ?></td>  
            <td>
              <a href="<?php echo Uri::create(sprintf('/spex/andra/%d',  $spex->id)); ?>" class="btn btn-primary">
                <i class="fa fa-edit"></i>
                Ändra
              </a>
              <a href="<?php echo Uri::create(sprintf('/spex/tabort/%d', $spex->id)); ?>" class="btn btn-danger delete">
                <i class="fa fa-remove"></i>
                Ta bort
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <?php echo paginator('/sidor/?spex=%d', $current_page, $num_pages); ?>      
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>