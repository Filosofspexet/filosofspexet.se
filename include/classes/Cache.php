<?php

class Cache {

  public static function get($name, Callable $otherwise, $ttl=1800) {
    $filename = TMP_DIR . '/' . $name;
    if(!file_exists($filename) || ((time() - filemtime($filename)) > $ttl)) {
      try {
        $result = $otherwise();
      } catch(Exception $ex) {
        $result = null;
      }
      file_put_contents($filename, serialize($result));
      return $result;
    } else {
      return unserialize(file_get_contents($filename));
    }
  }
  
}