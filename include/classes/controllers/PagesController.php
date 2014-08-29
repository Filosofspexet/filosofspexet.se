<?php

class PagesController extends Controller {

  protected function setup($s) {
    
	$s->get('/pages/:id', function($id) {
	  echo $id;
	});
	
  }
  
}