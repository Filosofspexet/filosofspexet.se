<?php

class Uri {

	public static function create($uri = null, $get_variables = array(), $index_file = true) {
		$url = Config::get('base.url');
		if ($index_file && Config::get('index.file')) {
			$url .= Config::get('index.file').'/';
		}
		$url = $url.ltrim(is_null($uri) ? $_SERVER['PATH_INFO'] : $uri, '/');
		if (!empty($get_variables)) {
			$char = strpos($url, '?') === false ? '?' : '&';
			foreach ($get_variables as $key => $val) {
				$url .= $char.$key.'='.$val;
				$char = '&';
			}
		}
		return $url;
	}
  
  public static function createFile($uri) {
    return self::create($uri, array(), false);
  }
  
}

	
