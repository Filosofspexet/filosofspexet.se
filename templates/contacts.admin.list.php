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
      <a class="btn btn-primary" href="<?php echo Uri::create('kontakter/skapa'); ?>">
        <i class="fa fa-plus"></i>
        <?php echo __('Ny kontakt'); ?>
      </a>
      <h1><?php echo __('Kontakter'); ?></h1>
      <?php echo paginator('/kontakter/admin?page=%d', $current_page, $num_pages); ?>  
      <table class="table table-striped">
        <thead>
          <?php echo tableHeader('/kontakter/', array(
            'id'            => __('Id'),         
            'name'          => __('Namn'),    
            'slug'          => __('Slug'),      
            'title'         => __('Titel'),
            'created'       => __('Skapad'),
            'changed'       => __('Ändrad'),
          )); ?>
          <th><?php echo __('Åtgärder')?></th>
        </thead>
        <tbody>
        <?php foreach($items as $contact) : ?>
          <tr>
            <td><?php echo $contact->id; ?></td>
            <td>
              <a href="<?php echo Uri::create(sprintf('/kontakter/%s', $contact->slug)); ?>">
                <?php echo $contact->name; ?>
              </a>
            </td>           
            <td><?php echo $contact->slug; ?></td>                           
            <td><?php echo $contact->title; ?></td>
            <td><?php echo date(Config::get('date.format'), $contact->created); ?></td>
            <td><?php echo date(Config::get('date.format'), $contact->changed); ?></td>  
            <td>
              <a href="<?php echo Uri::create(sprintf('/kontakter/andra/%d',  $contact->id)); ?>" class="btn btn-primary">
                <i class="fa fa-edit"></i>
                Ändra
              </a>
              <a href="<?php echo Uri::create(sprintf('/kontakter/tabort/%d', $contact->id)); ?>" class="btn btn-danger delete">
                <i class="fa fa-remove"></i>
                Ta bort
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <?php echo paginator('/sidor/?contact=%d', $current_page, $num_pages); ?>      
    </div>  
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>