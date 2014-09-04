<?php

use Slim\Slim;

abstract class Controller extends Singleton {

  protected $s;
  protected $user;
  protected $seo;
  protected $css_classes;
  protected $menu;
  protected $slider_images;
  protected $widgets;
  protected $actions;
  
  protected final function throw404() {
    $this->slider_images  = array();
    $this->seo->noindex   = true;
    $this->css_classes[]  = '404';
    $page = R::findOne('page', 'slug = ?', array('404'));
    if($page == null) {
      throw new Exception(__('Sidan kunde inte hittas.'));
    }
    $this->addStandardAssets();
    $this->render('404.php', $page->export());
  }
  
  protected final function render($template, array $data = array(), $status = null) {
  
    $standard = array(
      'user'          => $this->user,
      'seo'           => $this->seo,
      'css_classes'   => $this->css_classes,
      'menu'          => $this->menu,
      'slider_images' => $this->slider_images,
      'widgets'       => $this->widgets,
      'actions'       => $this->actions
    );
    
    if($status != null) {
      $this->s->render($template, array_merge($standard, $data), $status);
    } else {
      $this->s->render($template, array_merge($standard, $data));
    }
    
  }
  
  protected function paginate($type, $sortable_columns, $items_per_page) {
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $orderby = isset($_GET['orderby']) && in_array($_GET['orderby'], $sortable_columns) ? $_GET['orderby'] : 'id';
    $sortdir = isset($_GET['sortdir']) && in_array($_GET['sortdir'], array('asc','desc')) ? $_GET['sortdir'] : 'ASC';
    $items = R::findAll($type, sprintf('1=1 ORDER BY `%s` %s LIMIT %d, %d', escape($orderby), $sortdir, ($current_page-1) * $items_per_page, $items_per_page));
    $num_pages = ceil(R::count('page') / $items_per_page) ;
    return compact('items', 'current_page', 'num_pages', 'sortby', 'sortdir');
  }
  
  private function getFacebookFeeds() {
    $cached = Cache::get('facebook_posts_on_frontpage', function() {
      $facebook = new Facebook(array(
        'appId'  => Config::get('facebook.app.id'),
        'secret' => Config::get('facebook.app.secret'),
        'fileUpload' => false
      ));
      $feeds = $facebook->api('filosofspexet/posts?fields=story,message,picture,link,icon&limit=5&locale=sv_SE');
      return $feeds['data'];
    });
    if($cached) {
      return $cached;
    } else {
      return array();
    }
  }
  
  protected function __construct() {
      
    $this->s = new Slim();
    $this->user = null;
    
    $this->css_classes = array(
      strtolower(substr(get_class($this), 0, -strlen('Controller')))
    );
    
    // Will eventually contain the actual menu-data
    $this->menu           = array('temp');
    
    // Will eventually contain the actual slider_image data
    $this->slider_images  = array('temp');
       
    $this->widgets        = array(
      'facebook-page' => array(
        'feeds' => $this->getFacebookFeeds()
      ),
      'login' => array()
    );   

    if(Session::get('user_id')) {
      $this->user = R::load('user', Session::get('user_id'));
      moveKeyFirstInArray('login', $this->widgets);
      $this->css_classes[] = 'logged-in';
      $this->actions = $this->user->getActions();
    } else {
      $this->css_classes[] = 'not-logged-in';
    }
    
    // Might be replaced by real class sometime.
    $this->seo = (object)array(
      'title'         =>  __('Filosofspexet'),
      'keywords'      =>  array(),
      'description'   =>  __('Beskrivning av filosofspexet'),
      'favicon'       =>  'favicon.ico',
      'canonical_url' => null,
      'noindex'       => false
    );
    
    $this->s->config(array(
      'debug' 			    => Config::get('slim.debug'),
      'templates.path' 	=> Config::get('slim.templates.path')
    ));
    
    $this->s->notFound(function() {
      $this->throw404();
    });
	
  }
  
  protected final function requireLogin($flash_override = null, $redirect_override = null) {
    if($this->user == null) {
      $redirect = $redirect_override ? $redirect_override : Uri::create($_SERVER['PATH_INFO']);
      $flash = $flash_override ? $flash_override : __('Du måste logga in för att se innehållet.');
      $this->s->flash('danger', $flash);
      $this->s->redirect(Uri::create('/users/login', array('redirectUrl' => urlencode($redirect))));
    }
  }
  
  protected final function requireAction($action, $redirect, $flash) {
    $this->requireLogin();
    if(!$this->user->hasAction($action)) {
      $this->s->flash('danger', $flash);
      $this->s->redirect($redirect);
    }
  }
  
  protected final function requireAllActions(array $actions, $redirect, $flash) {
    $this->requireLogin();
    foreach($actions as $action) {
      $this->requireAction($action, $redirect, $flash);
    }
  }
  
  protected final function requireAtLeastOneAction(array $actions, $redirect, $flash) {
    $this->requireLogin();
    foreach($actions as $action) {
      if($this->user->hasAction($action)) {
        return;		  
      }
	  }
    $this->s->flash('danger', $flash);
    $this->s->redirect($redirect);
  }
  
  abstract protected function setupRoutes();
  
  public final function run() {
    $this->setupRoutes();	
	  $this->s->run();
  }
  
  public final function setAdmin($status) {
    if($status) {
      if(!in_array('admin', $this->css_classes)) {
        $this->css_classes[] = 'admin';
      }
      $this->addAdminAssets();
    } else {
      $this->css_classes = array_diff($this->css_classes, array('admin'));
      $this->addStandardAssets();
    }
    
  }
  
  protected final function addStandardAssets() {
    Asset::clear();
    Asset::css('libs/normalize-css/normalize.css');
    Asset::css('libs/bootstrap/css/bootstrap.min.css');
    Asset::css('libs/bootstrap/css/bootstrap-theme.min.css');
    Asset::css('libs/font-awesome/css/font-awesome.min.css');
    Asset::css('libs/bootstrap-social/bootstrap-social.css');
    Asset::css('libs/bxslider-4/jquery.bxslider.css');
    Asset::scss('style.scss');
    Asset::js('libs/jquery/jquery.min.js');
    Asset::js('libs/bootstrap/js/bootstrap.min.js');
    Asset::js('libs/bxslider-4/jquery.bxslider.min.js');
    Asset::js('libs/tinymce/js/tinymce/tinymce.min.js');
    Asset::js('js/Filosofspexet.js');
    Asset::js('js/script.js');
  }
  
  protected final function addAdminAssets() {
    Asset::clear();
    Asset::css('libs/normalize-css/normalize.css');
    Asset::css('libs/bootstrap/css/bootstrap.min.css');
    Asset::css('libs/bootstrap/css/bootstrap-theme.min.css');
    Asset::css('libs/font-awesome/css/font-awesome.min.css');
    Asset::css('libs/bootstrap-social/bootstrap-social.css');
    Asset::css('libs/bxslider-4/jquery.bxslider.css');
    Asset::scss('style.scss');
    Asset::js('libs/jquery/jquery.min.js');
    Asset::js('libs/bootstrap/js/bootstrap.min.js');
    Asset::js('libs/bxslider-4/jquery.bxslider.min.js');
    Asset::js('libs/tinymce/js/tinymce/tinymce.min.js');
    Asset::js('js/Filosofspexet.js');
    Asset::js('js/script.js');
  }
  
}