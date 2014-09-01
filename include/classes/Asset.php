<?php

class Asset {

  private static $css_files  = array();
  private static $js_files   = array();

  public static function css($file)  {
    if(file_exists(PUBLIC_DIR . '/' . $file)) {
      self::$css_files[] = $file;
    } else {
      throw new Exception(sprintf('File %s doesn\'t exist.', $file));
    }
  }
  
  public static function scss($file)  {
    if($file != basename($file)) {
      throw new Exception('Scss files must be placed directly under the /scss folder.');
    }
    if(file_exists(PUBLIC_DIR . '/scss/' . $file)) {
      self::$css_files[] = 'style.php/' . $file;
    } else {
      throw new Exception(sprintf('File %s doesn\'t exist.', $file));
    }
  }
  
  public static function js($file)   {
    if(file_exists(PUBLIC_DIR . '/' . $file)) {
      self::$js_files[] = $file;
    } else {
      throw new Exception(sprintf('File %s doesn\'t exist.', $file));
    }
  }
  
  public static function getHeaderHtml() {
    $result = '';
    foreach(self::$css_files as $css_file) {
      $result .= sprintf('<link rel="stylesheet" type="text/css" href="%s" />'."\n", $css_file);
    } 
    foreach(self::$js_files as $js_file) {
      $result .= sprintf('<script type="text/javascript" src="%s"></script>'."\n", $js_file);
    }
    return $result;
  }

}