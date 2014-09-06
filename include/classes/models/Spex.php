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
    
    if(!isset($this->bean->id) || !$this->bean->id) {
      $this->bean->created = time();
    }
    
    $this->bean->changed = time();
    
    // Sanitize TinyMCE
    $this->bean->teaser = Htmlawed::filter($this->bean->teaser);  
     
  }
  
  public function after_update() {}
  
  public function delete() {}
  
  public function after_delete() {}
  
}