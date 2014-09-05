<?php

class SpexController extends Controller {

  protected function setupRoutes() {
  
    $this->s->group('/spex', function() {

      $this->s->get('/', function() {
        // TODO: Visa gamla spex.
        $this->throw404();
      });
      
      $this->s->get('/admin', function() {
        $this->requireAction('spex.list', '/', __('Du har inte rätt att lista spex.'));
        $this->setAdmin(true);     
        $pagination = $this->paginate('spex', array('id','title','slug','theme','ticketprice','user_id','created','changed'), 10);      
        $this->render('spex.admin.list.php', $pagination);
      });
      
      $this->s->get('/skapa', function() {
        $this->requireAction('spex.create', '/', __('Du har inte rätt att skapa spex.'));
        $this->setAdmin(true);
        $this->render('spex.create.php');
      });

      $this->s->post('/skapa', function() {
        $this->requireAction('spex.create', '/', __('Du har inte rätt att skapa spex.'));
        $this->setAdmin(true);
        $spex = R::dispense('spex');
        $spex->import($_POST);
        $spex->user = $this->user;   
        try {
          R::store($spex);
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/spex/'));
        }
        $this->s->flash('success', __('Spexet har skapats.'));
        $this->render('spex.edit.php', compact('spex'));
      });

      $this->s->get('/andra/:id', function($id) {
        $this->requireAction('spex.edit', '/', __('Du har inte rätt att editera spex.'));
        $this->setAdmin(true);
        $spex = R::load('spex', $id);
        if(!$spex->id) {
          $this->s->flash('danger', __('Spexet du försöker ändra finns inte!'));
          $this->s->redirect(Uri::create('/spex/'));
        }
        $this->render('spex.edit.php', compact('spex'));
      });

      $this->s->post('/andra/:id', function($id) {
        $this->requireAction('spex.edit', '/', __('Du har inte rätt att editera spex.'));
        $this->setAdmin(true);
        $spex = R::dispense('spex');
        $spex->id = $id;
        
        // If updating without uploading
        if(isset($_POST['image']) && $_POST['image'] == '') {
          unset($_POST['image']);
        }
        
        $spex->import($_POST);
        $spex->user = $this->user;        
        try {
          R::store($spex);
          $this->s->flash('success', __('Spexet har sparats.'));
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/spex/'));
        }       
        $this->render('spex.edit.php', compact('spex'));
      });

      $this->s->get('/tabort/:id', function($id) {
        $this->requireAction('spex.delete', '/', __('Du har inte rätt att ta bort spex.'));
        $this->setAdmin(true);
        $spex = R::load('spex', $id);
        if(!$spex->id) {
          $this->s->flash('danger', __('Spexet du försöker ta bort finns inte.'));
        } else {
          R::trash($spex);
          $this->s->flash('success', __('Spexet har tagits bort.'));
        }
        if($this->user != null) {
          $this->s->redirect(Uri::create('/spex/admin'));
        } else {
          $this->s->redirect(Uri::create('/'));
        }
      });
    
      $this->s->get('/:slug', function($slug) {
        $this->addStandardAssets();
        $spex = R::findOne('spex', 'slug = ?', array($slug));
        if(!$spex->id) {
          $this->throw404();
        }
        $this->seo->title = sprintf('%s - %s - Filosofspexet', $spex->title, $spex->theme);
        $this->css_classes[] = $slug;
        $this->breadcrumbs = array (
          'Hem' => Uri::create('/'),
          'Spex'  => Uri::create('/spex/'),
          $spex->title   => null
        );
        $this->render('spex.view.php', compact('spex'));
      });
  
    });


  }


}