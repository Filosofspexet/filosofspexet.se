<?php

class NewsController extends Controller {

  protected function setupRoutes() {
  
    $this->s->group('/nyheter', function() {
      
      $this->addAdminAssets();
    
      $this->s->get('/', function() {    
            
        $this->render('news.php');
      });
       
    });
	     
	}
    
	
}
