<?php

class LoginController extends Controller {

  

  protected function setupRoutes() {
  
    // View login page
    $this->s->get('/login', function() {
      $page = R::findOne('page', '`key` = ?', array('login'));
      if($page == null) {
        throw new Exception(__('Loginsidan kunde inte hittas.'));
      }
      $this->s->render('login.php', $page->export());
	  });
	     
	});
    
	
  }

  
}