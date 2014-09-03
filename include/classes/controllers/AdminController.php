<?php

class AdminController extends Controller {

  protected function setupRoutes() {
  
    if(!$this->user) {
      $this->s->flash('danger', __('Du måste logga in för att kunna se sidan.'));
      $this->s->redirect('/');
    }
  
    $this->s->group('/internt', function() {
    
      $this->addAdminAssets();
    
      $this->s->get('/', function() {      
        $this->render('admin.php');
      });
       
    });
	     
	}
    
	
}
