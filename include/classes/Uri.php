<?php

class Uri {

	public static function create($uri = null, $get_variables = array()) {
		$url = Config::get('base.url');
		if (Config::get('index.file')) {
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
  
}

	
