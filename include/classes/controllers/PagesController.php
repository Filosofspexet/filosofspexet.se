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
        $this->css_classes[] = 'start';
        $this->slider_images = $page->ownSliderimageList;
        $this->seo->canonical_url = Uri::create('/');
        $news = R::findAll('news', '1=1 ORDER BY created DESC LIMIT 5');
        $this->render('start.view.php', array_merge(array('news' => $news), compact('page')));
      }
	  });

	  // View other page
	  $this->s->get('/:slug', function($slug) {
      if($slug == 'start') {
        $this->s->redirect(Uri::create('/'));
      }
      $this->addStandardAssets();
      $page = R::findOne('page', 'slug = ?', array($slug));
      if(!$page || !$page->id) {
        $this->throw404();
      } else {
        $this->css_classes[] = $slug;
        if(sizeof($page->sharedActionList) > 0) {
          $action_names = array();
          foreach($page->sharedActionList as $required_action) {
            $action_names[] = $required_action->name;
          }
          $this->requireAllActions($action_names, Uri::create('/'), __('Du har inte behörighet att se sidan.'));
        }
        $this->seo->title = sprintf('%s - Filosofspexet', $page->title);
        $this->slider_images = $page->ownSliderimageList;
        $template = $page->template ? basename($page->template) : 'pages.view.php';
        $this->breadcrumbs = array (
          'Hem' => Uri::create('/'),
          $page->title   => null
        );
        $this->render(basename($template), compact('page'));
      }
	  });

    $this->s->group('/sidor', function() {

      $this->s->get('/admin', function() {
        $this->requireAction('pages.list', '/', __('Du har inte rätt att lista sidor.'));
        $this->setAdmin(true);     
        $pagination = $this->paginate('page', array('id','title','slug','template','priority','user_id','created','changed'), 10);      
        $this->render('pages.admin.list.php', $pagination);
      });

      $this->s->get('/skapa', function() {
        $this->requireAction('pages.create', '/', __('Du har inte rätt att skapa sidor.'));
        $this->setAdmin(true);
        $this->render('pages.create.php');
      });

      $this->s->post('/skapa', function() {
        $this->requireAction('pages.create', '/', __('Du har inte rätt att skapa sidor.'));
        $this->setAdmin(true);
        $page = R::dispense('page');
        $page->import($_POST);
        $page->user = $this->user;   
        try {
          R::store($page);
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/sidor/'));
        }
        $this->s->flash('success', __('Sidan har skapats.'));
        $this->render('pages.edit.php', compact('page'));
      });

      $this->s->get('/andra/:id', function($id) {
        $this->requireAction('pages.edit', '/', __('Du har inte rätt att editera sidor.'));
        $this->setAdmin(true);
        $page = R::load('page', $id);
        if(!$page->id) {
          $this->s->flash('danger', __('Sidan du försöker ändra finns inte!'));
          $this->s->redirect(Uri::create('/sidor/'));
        }
        $this->render('pages.edit.php', compact('page'));
      });

      $this->s->post('/andra/:id', function($id) {
        $this->requireAction('pages.edit', '/', __('Du har inte rätt att editera sidor.'));
        $this->setAdmin(true);
        $page = R::dispense('page');
        $page->id = $id;
        $page->import($_POST);  
        $page->user = $this->user;        
        try {
          R::store($page);
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/sidor/'));
        }
        $this->s->flash('success', __('Sidan har sparats.'));
        $this->render('pages.edit.php', compact('page'));
      });

      $this->s->get('/tabort/:id', function($id) {
        $this->requireAction('pages.delete', '/', __('Du har inte rätt att ta bort sidor.'));
        $this->setAdmin(true);
        $page = R::load('page', $id);
        if(!$page->id) {
          $this->s->flash('danger', __('Sidan du försöker ta bort finns inte.'));
        } else {
          R::trash($page);
          $this->s->flash('success', __('Sidan har tagits bort.'));
        }
        if($this->user != null) {
          $this->s->redirect(Uri::create('/sidor/admin'));
        } else {
          $this->s->redirect(Uri::create('/'));
        }
      });

    });


  }


}