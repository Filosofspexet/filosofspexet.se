<?php

class NewsController extends Controller {

  protected function setupRoutes() {
  
    $this->s->group('/nyheter', function() {
      
      $this->addAdminAssets();
    
      $this->s->get('/', function() {             
        $this->render('news.php');
      });
      
      $this->s->get('/admin', function() {
        $this->requireAction('news.list', '/', __('Du har inte rätt att lista nyheter.'));
        $this->setAdmin(true);     
        $pagination = $this->paginate('news', array('id','headline','slug','user_id','created','changed'), 10);      
        $this->render('news.admin.list.php', $pagination);
      });
         
      $this->s->get('/skapa', function() {
        $this->requireAction('news.create', '/', __('Du har inte rätt att skapa nyheter.'));
        $this->setAdmin(true);
        $this->render('news.create.php');
      });

      $this->s->post('/skapa', function() {
        $this->requireAction('news.create', '/', __('Du har inte rätt att skapa nyheter.'));
        $this->setAdmin(true);
        $news = R::dispense('news');
        $news->import($_POST);
        $news->user = $this->user;   
        try {
          R::store($news);
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/nyheter/'));
        }
        $this->s->flash('success', __('Nyheten har skapats.'));
        $this->render('news.edit.php', compact('news'));
      });

      $this->s->get('/andra/:id', function($id) {
        $this->requireAction('news.edit', '/', __('Du har inte rätt att editera nyheter.'));
        $this->setAdmin(true);
        $news = R::load('news', $id);  
        if(!$news || !$news->id) {
          $this->s->flash('danger', __('Nyheten du försöker ändra finns inte'));
          $this->s->redirect(Uri::create('/nyheter/'));
          die();
        }
        $this->render('news.edit.php', compact('news'));
      });

      $this->s->post('/andra/:id', function($id) {
        $this->requireAction('news.edit', '/', __('Du har inte rätt att editera nyheter.'));
        $this->setAdmin(true);
        $news = R::dispense('news');
        $news->id = $id;
        $news->import($_POST);  
        $news->user = $this->user;        
        try {
          R::store($news);
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/nyheter/'));
        }
        $this->s->flash('success', __('Nyheten har sparats.'));
        $this->render('news.edit.php', compact('news'));
      });

      $this->s->get('/tabort/:id', function($id) {
        $this->requireAction('news.delete', '/', __('Du har inte rätt att ta bort nyheter.'));
        $this->setAdmin(true);
        $news = R::load('news', $id);
        if(!$news->id) {
          $this->s->flash('danger', __('Nyheten du försöker ta bort finns inte.'));
        } else {
          R::trash($news);
          $this->s->flash('success', __('Nyheten har tagits bort.'));
        }
        if($this->user != null) {
          $this->s->redirect(Uri::create('/nyheter/admin'));
        } else {
          $this->s->redirect(Uri::create('/'));
        }
      });
        
      $this->s->get('/:slug', function($slug) {
        $news = R::findOne('news', 'slug = ?', array($slug));
        if(!$news || !$news->id) {
          $this->throw404();
        }
        $this->css_classes[] = $slug;
        $this->breadcrumbs = array (
          'Hem'             => Uri::create('/'),
          'Nyheter'         => Uri::create('/nyheter/'),
          $news->headline   => null
        );        
        $this->seo->title = sprintf('%s - Filosofspexet', $news->headline);
        $this->render('news.view.php', compact('news'));
      });
       
    });
	     
	}
    
	
}
