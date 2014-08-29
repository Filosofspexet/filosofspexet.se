<?php

use Slim\Slim;

abstract class Controller extends Singleton {

  abstract protected function setup($s);
  
  public final function run() {
    $slim = new Slim();
    $this->setup($slim);	
	$slim->run();
  }
  
}