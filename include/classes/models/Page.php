<?php

use Cocur\Slugify\Slugify;

class Page extends RedBean_SimpleModel {

  public function open() {}
  
  public function dispense() {}
  
  public function update() {
  
    // Slugify
    $slugify = new Slugify();
    if(!$this->bean->slug) {
      $this->bean->slug = $this->bean->title;
    }
    $this->bean->slug = $slugify->slugify($this->bean->slug);
    
    // Sanitize TinyMCE
    $this->bean->leadtext = Htmlawed::filter($this->bean->leadtext);  
    $this->bean->bodytext = Htmlawed::filter($this->bean->bodytext);  
    
    // Sanitize template
    if(!$this->bean->template) {
      $this->bean->template = 'pages.view.php';
    }
    
    $this->bean->template = basename($this->bean->template);
    if(!file_exists(TEMPLATES_DIR . '/' . $this->bean->template)) {
      throw new Exception(__('Mallen finns inte. Kunde inte sparas.'));
    }
    
  }
  
  public function after_update() {}
  
  public function delete() {}
  
  public function after_delete() {}
  
}