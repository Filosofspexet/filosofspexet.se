<?php

class UsersController extends Controller {

  

  protected function setupRoutes() {
  
    $this->s->group('/users', function() {
    
      $this->addStandardAssets();
    
      // View login page
      $this->s->get('/login', function() {
      $this->css_classes[] = 'login';
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
        $this->css_classes[] = 'login';
        if(!$this->user) {
          if(isset($_POST['username'],$_POST['password'])) {   
            if(isset($_GET['redirectUrl'])) {
              $this->s->redirect($_GET['redirectUrl']);
            }
          }
        } else {
          $this->flash(__('Du måste logga ut först'));
        }
      });
      
    });
	     
	}
    
	
}
