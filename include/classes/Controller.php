<?php

use Slim\Slim;

abstract class Controller extends Singleton {

  protected $s;
  protected $user;
  protected $seo;
  protected $css_classes;
  protected $menu;
  protected $slider_images;
  
  protected final function throw404() {
    $page = R::findOne('page', 'slug = ?', array('404'));
    if($page == null) {
      throw new Exception(__('Sidan kunde inte hittas.'));
    }
    $this->render('pages.view.php', $page->export());
  }
  
  protected final function render($template, array $data = array(), $status = null) {
  
    $standard = array(
      'user'          => $this->user,
      'seo'           => $this->seo,
      'css_classes'   => $this->css_classes,
      'menu'          => $this->menu,
      'slider_images' => $this->slider_images
    );
    
    
    if($status != null) {
      $this->s->render($template, array_merge($standard, $data), $status);
    } else {
      $this->s->render($template, array_merge($standard, $data));
    }
    
  }

  protected function __construct() {
      
    $this->s = new Slim();
    $this->user = null;
    $this->css_classes = array(
      strtolower(substr(get_class($this), 0, -strlen('Controller')))
    );
    $this->menu = array();
    $this->slider_images = array();
    
    // Might be replaced by real class sometime.
    $this->seo = (object)array(
      'title'       =>  __('Filosofspexet'),
      'keywords'    =>  array(),
      'description' =>  __('Beskrivning av filosofspexet'),
      'favicon'     =>  'favicon.ico'
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
      $redirect = $redirect_override ? $redirect_override : $_SERVER['PATH_INFO'];
      $flash = $flash_override ? $flash_override : __('Du måste logga in för att se innehållet.');
      $this->s->flash('error', $flash);
      $this->s->redirect(Uri::create('/users/login', array('redirectUrl' => urlencode($redirect))));
    }
  }
  
  protected final function requireAction($action, $redirect, $flash) {
    $this->requireLogin();
    if(!$this->user->hasAction($action)) {
      $this->s->flash('error', $flash);
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
    $this->s->flash('error', $flash);
    $this->s->redirect($redirect);
  }
  
  abstract protected function setupRoutes();
  
  public final function run() {
    $this->setupRoutes();	
	  $this->s->run();
  }
  
  protected final function addStandardAssets() {
    Asset::css('libs/normalize-css/normalize.css');
    Asset::css('libs/bootstrap/css/bootstrap.min.css');
    Asset::css('libs/bootstrap/css/bootstrap-theme.min.css');
    Asset::scss('style.scss');
    Asset::js('libs/jquery/jquery.min.js');
    Asset::js('libs/bootstrap/js/bootstrap.min.js');
    Asset::js('libs/jquery-slider/js/jssor.slider.mini.js');
    Asset::js('libs/tinymce/js/tinymce/tinymce.min.js');
    Asset::js('js/Filosofspexet.js');
    Asset::js('js/script.js');
  }
  
  protected final function addAdminAssets() {}
  
}