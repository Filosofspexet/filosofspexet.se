<?php

class PagesController extends Controller {

  protected function setupRoutes() {
  
    // View start page
    $this->s->get('/', function() {
      $this->addStandardAssets();
      $page = R::findOne('page', 'slug = ?', array('start'));
      if($page == null) {
        throw new Exception(__('Startsidan kunde inte hittas.'));
      } else {
        $this->slider_images = $page->ownSliderimageList;
        $this->render('start.view.php', $page->export());
      }
	  });
	  
	  // View other page
	  $this->s->get('/:slug', function($slug) {
      $this->addStandardAssets();
      $page = R::findOne('page', 'slug = ?', array($slug));
      if($page == null) {
        $this->throw404();
      } else {
        if(sizeof($page->sharedActionList) > 0) {
          $action_names = array();
          foreach($page->sharedActionList as $required_action) {
            $action_names[] = $required_action->name;
          }
          $this->requireAllActions($action_names);
        }
        $this->slider_images = $page->ownSliderimageList;
        $template = $page->template ? basename($page->template) : 'pages.view.php';
        $this->render(basename($template), $page->export());
      }
	  });  

    $this->s->group('/pages', function() {
		  
      $this->addAdminAssets();      
            
      $this->s->get('/create', function() {
        $this->requireAction('pages.create', '/', __('Du har inte rätt att skapa sidor.'));
        $this->render('pages.create.php');
      });
      
      $this->s->post('/create', function() {
        $this->requireAction('pages.create', '/', __('Du har inte rätt att skapa sidor.'));
        $page = R::dispense('page');
        $page->import($_POST);
        R::store($page);
        $this->s->flash(__('Sidan har skapats.'));		
        $this->render('pages.edit.php', $page->export());
      });
        
      $this->s->get('/edit/:id', function($id) {
        $this->requireAction('pages.edit', '/', __('Du har inte rätt att editera sidor.'));
        $this->render('pages.edit.php', $page->export());
      });
      
      $this->s->post('/edit/:id', function($id) {
        $this->requireAction('pages.edit', '/', __('Du har inte rätt att editera sidor.'));
        $page = R::dispense('page');
        $page->import($_POST);
        R::store($page);
        $this->s->flash(__('Sidan har sparats.'));		
        $this->render('pages.edit.php', $page->export());
      });
      
      $this->s->get('/delete/:id', function($id) {
        $this->requireAction('pages.delete', '/', __('Du har inte rätt att ta bort sidor.'));
        $page = R::load('page', $id);
        if($page == null) {
          $this->s->flash(__('Sidan du försöker ta bort finns inte.'));		  
        } else {
          $this->s->flash(__('Sidan har tagits bort.'));		
        }
        if($this->user != null) {
          $this->s->redirect(Uri::create('/pages'));
        } else {
          $this->s->redirect(Uri::create('/'));
        }     
      });
	   
    });
    
	
  }

  
}