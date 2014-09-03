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
              $user = R::findOne('user', sprintf('username = ? AND hash = MD5(CONCAT(?, salt))'), array(
              $_POST['username'],
              Config::get('static.salt').$_POST['password']
            ));
            if($user != null) {         
              Session::set('user_id', $user->id);
              $this->s->flash('success', __('Du är nu inloggad.'));
            } else {
              $this->s->flash('danger', __('Felaktigt användarnamn eller lösenord.'));
              Session::_unset('user_id');
            }        
          }
        } else {
          $this->s->flash('warning', __('Du måste logga ut först'));
        }
        if(isset($_GET['redirectUrl'])) {
          $this->s->redirect($_GET['redirectUrl']);
        } else {
          $this->s->redirect(Uri::create('/'));
        }
      });
      
    });
	     
	}
    
	
}
