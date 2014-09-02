<?php

class Cache {

  public static function get($name, Callable $otherwise, $ttl=300) {
    $filename = TMP_DIR . '/' . $name;
    if(true ||!file_exists($filename) || ((time() - filemtime($filename)) > $ttl)) {
      $result = $otherwise();
      file_put_contents($filename, serialize($result));
      return $result;
    } else {
      return unserialize(file_get_contents($filename));
    }
  }
  
}