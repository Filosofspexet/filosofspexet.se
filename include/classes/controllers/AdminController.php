<?php

class AdminController extends Controller {

  protected function setupRoutes() {
  
    $this->s->group('/internt', function() {
      
      $this->addAdminAssets();
    
      $this->s->get('/', function() {    
             
        $this->requireLogin();
        $this->render('admin.php');
      });
       
    });
	     
	}
    
	
}
