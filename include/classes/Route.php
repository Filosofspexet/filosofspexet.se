<?php

class Route {

  private static $routes = array();
  
  public static function set($slug, $classname) {
    self::$routes[$slug] = $classname;
  }
  
  public static function setAll(array $routes) {
    foreach($routes as $slug => $classname) {
      self::set($slug, $classname);
    }
  }
  
  public static function get($slug) {
    return isset(self::$routes[$slug]) ? self::$routes[$slug] : null;
  }

}