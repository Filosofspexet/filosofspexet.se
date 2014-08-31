<?php

class Asset {

  private static $css_files  = array();
  private static $js_files   = array();

  public static function css($file)  {}
  public static function js($file)   {}
  
  public static function getHeaderHtml() {
    $result = '';
    foreach(self::$css_files as $css_file) {
      $result .= sprintf('<link rel="stylesheet" type="text/css" href="%s">',"\n", $css_file);
    } 
    foreach(self::$js_files as $js_file) {
      $result .= sprintf('<script type="text/javascript" src="%s">',"\n", $js_file);
    }
    return $result;
  }

}