<?php

class AdminController extends Controller {

  protected function setupRoutes() {
  
    $this->s->group('/internt', function() {
      
      $this->addAdminAssets();
    
      $this->s->get('/', function() {    
        
        $this->requireLogin();
        $this->css_classes[] = 'admin';
        $actions = $this->user->getActions();
        $this->render('admin.php', compact('actions'));
      });
       
    });
	     
	}
    
	
}
