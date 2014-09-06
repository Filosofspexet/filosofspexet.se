<?php

use Cocur\Slugify\Slugify;

class Contact extends RedBean_SimpleModel {

  public function open() {}
  
  public function dispense() {}
  
  public function update() {
  
    if(!isset($this->bean->id) || !$this->bean->id) {
      $this->bean->created = time();
    }
    
    $this->bean->changed = time();
    
    // Sanitize TinyMCE
    $this->bean->description = Htmlawed::filter($this->bean->description);  
     
  }
  
  public function after_update() {}
  
  public function delete() {}
  
  public function after_delete() {}
  
}