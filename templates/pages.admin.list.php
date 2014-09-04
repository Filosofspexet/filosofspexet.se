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
      <a class="btn btn-primary" href="<?php echo Uri::create('sidor/skapa'); ?>">
        <i class="fa fa-plus"></i>
        <?php echo __('Ny sida'); ?>
      </a>
      <h1><?php echo __('Sidor'); ?></h1>
      <?php echo paginator('/sidor/admin?page=%d', $current_page, $num_pages); ?>  
      <table class="table table-striped">
        <thead>
          <?php echo tableHeader('/sidor/admin', array(
            'id'        => __('Id'),
            'title'     => __('Titel'),
            'slug'      => __('Slug'),
            'template'  => __('Mall'),
            'priority'  => __('Prioritet'),
            'user_id'   => __('Användare'),
            'created'   => __('Skapad'),
            'changed'   => __('Ändrad'),
          )); ?>
          <th><?php echo __('Åtgärder')?></th>
          <!--
          <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Titel'); ?></th>          
            <th><?php echo __('Slug'); ?></th>                                
            <th><?php echo __('Mall'); ?></th>
            <th><?php echo __('Prioritet'); ?></th>
            <th><?php echo __('Användare'); ?></th>
            <th><?php echo __('Skapad'); ?></th>
            <th><?php echo __('Ändrad'); ?></th> 
            
          </tr>
          -->
        </thead>
        <tbody>
        <?php foreach($items as $page) : ?>
          <tr>
            <td><?php echo $page->id; ?></td>
            <td>
              <a href="<?php echo Uri::create(sprintf('/%s', $page->slug)); ?>">
                <?php echo $page->title; ?>
              </a>
            </td>           
            <td><?php echo $page->slug; ?></td>                           
            <td><?php echo $page->template; ?></td>
            <td><?php echo $page->priority; ?></td>
            <td>
              <?php echo $page->user['username']; ?>
            </td>
            <td><?php echo date(Config::get('date.format'), $page->created); ?></td>
            <td><?php echo date(Config::get('date.format'), $page->changed); ?></td>  
            <td>
              <a href="<?php echo Uri::create(sprintf('/sidor/andra/%d',  $page->id)); ?>" class="btn btn-primary">
                <i class="fa fa-edit"></i>
                Ändra
              </a>
              <a href="<?php echo Uri::create(sprintf('/sidor/tabort/%d', $page->id)); ?>" class="btn btn-danger delete">
                <i class="fa fa-remove"></i>
                Ta bort
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <?php echo paginator('/sidor/?page=%d', $current_page, $num_pages); ?>      
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>