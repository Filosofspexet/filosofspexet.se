<?php

class Session {

  public static function get($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
  }
  
  public static function set($key, $value) {
    $_SESSION[$key] = $value;
  }
  
  public static function _isset($key) {
    return isset($_SESSION[$key]);
  }
  
  public static function _unset($key) {
    unset($_SESSION[$key]);
  }
  
}