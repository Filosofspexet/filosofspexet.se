<?php

use Cocur\Slugify\Slugify;

class News extends RedBean_SimpleModel {

  public function open() {}
  
  public function dispense() {}
  
  public function update() {
  
    // Slugify
    $slugify = new Slugify();
    if(!$this->bean->slug) {
      $this->bean->slug = $this->bean->headline;
    }
    $this->bean->slug = $slugify->slugify($this->bean->slug);
    
  }
  
  public function after_update() {}
  
  public function delete() {}
  
  public function after_delete() {}
  
}