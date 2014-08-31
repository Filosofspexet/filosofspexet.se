<?php

use Slim\Slim;

abstract class Controller extends Singleton {

  protected $s;
  protected $user;
  protected $seo;
  protected $css_classes;
  protected $menu;
  
  protected final function throw404() {
    $page = R::findOne('page', '`key` = ?', array('404'));
    if($page == null) {
      throw new Exception(__('Sidan kunde inte hittas.'));
    }
    $this->s->render('pages.view.php', $page->export());
  }
  
  protected final function render($template, array $data = array(), $status = null) {
  
    $standard = array(
      'user'        => $this->user,
      'seo'         => $this->seo,
      'css_classes' => $this->css_classes,
      'menu'        => $this->menu
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
  
  protected final function requireAction($action, $redirect, $flash) {
    if($this->user == null || !$this->user->hasAction($action)) {
      $this->s->flash('error', $flash);
      $this->s->redirect($redirect);
    }
  }
  
  protected final function requireAllActions(array $actions, $redirect, $flash) {
    foreach($actions as $action) {
      $this->requireAction($action, $redirect, $flash);
    }
  }
  
  protected final function requireAtLeastOneAction(array $actions, $redirect, $flash) {
    foreach($actions as $action) {
      if($this->user != null && $this->user->hasAction($action)) {
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
    Asset::css('libs/bootflat/bootflat/css/bootflat.min.css');
    Asset::js('libs/jquery/jquery.min.js');
    Asset::js('libs/jquery-slider/js/jssor.slider.mini.js');
    Asset::js('libs/tinymce/js/tinymce.min.js');
  }
  
  protected final function addAdminAssets() {}
  
}