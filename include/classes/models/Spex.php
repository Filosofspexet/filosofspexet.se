<?php

use Cocur\Slugify\Slugify;

class Spex extends RedBean_SimpleModel {

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
    $this->bean->teaser = Htmlawed::filter($this->bean->teaser);  
     
  }
  
  public function after_update() {}
  
  public function delete() {}
  
  public function after_delete() {}
  
}