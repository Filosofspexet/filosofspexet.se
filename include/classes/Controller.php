<?php

use Slim\Slim;

abstract class Controller extends Singleton {

  protected $s;
  
  protected final function throw404() {
    $this->s->render('page.php', array(
      'header' 		=> '404 - Sidan kunde ej hittas',
	  'lead_text' 	=> '',
	  'text' 		=> ''
    ), 404);
  }

  protected final function __construct() {
    $this->s = new Slim();
	$this->s->config(array(
      'debug' 			=> Config::get('slim.debug'),
      'templates.path' 	=> Config::get('slim.templates.path')
    ));
	$this->s->notFound(function() {
      $this->throw404();
    });
  }
  
  abstract protected function setup();
  
  public final function run() {
    $this->setup();	
	$this->s->run();
  }
  
}