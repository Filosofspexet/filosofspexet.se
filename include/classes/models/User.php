<?php

class User extends RedBean_SimpleModel {

  public function open() {}
  
  public function dispense() {}
  
  public function update() {}
  
  public function after_update() {}
  
  public function delete() {}
  
  public function after_delete() {}
      
  public function getActions() {
    $roles = $this->bean->sharedRoleList;
    $all_actions = array();
    foreach($roles as $role) {
      $actions = $role->sharedActionList;
      foreach($actions as $action) {
        $all_actions[] = $action->name;
      }
    }
    return array_unique($all_actions);
  }
      
  // TODO: Optimize!
  public function hasAction($name) {
    return in_array($name, $this->getActions());
  }
  
}