<?php

class PagesController extends Controller {

  

  protected function setup() {

    $this->s->get('/pages/view/:slug', function($slug) {
      $this->viewPage($slug);
	});  
  
	$this->s->get('/pages/:slug', function($slug) {
      $this->viewPage($slug);
	});
	
  }
  
  private function viewPage($slug) {
    $id = intval($slug);
	$page = R::load('page', $id);
	if($page == null) {
	  $this->throw404();
	} else {
	  $this->s->render('page.php', array(
		'header' 		=> $page->header,
		'lead_text' 	=> $page->lead_text,
		'text' 			=> $page->text
	  ));
	}
  }
  
}