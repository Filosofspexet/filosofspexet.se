<?php

class UsersController extends Controller {

  

  protected function setupRoutes() {
  
    $this->s->group('/users', function() {
    
      // View login page
      $this->s->get('/login', function() {
        $page = R::findOne('page', 'slug = ?', array('login'));  
        if($page == null) {
          throw new Exception(__('Loginsidan kunde inte hittas.'));
        }  
        $data = array(
          'redirectUrl' => isset($_GET['redirectUrl']) ? $_GET['redirectUrl'] : '/'
        );
        array_merge($data, $page->export());
        $this->render('login.php', $data);
      });
      
      // Login via form
      $this->s->post('/login/form', function() {
      });
      
    });
	     
	}
    
	
}
