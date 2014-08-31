<?php

define('ROOT_DIR', 	    dirname(__FILE__));
define('VENDOR_DIR',    ROOT_DIR    . '/vendor');
define('INCLUDE_DIR',   ROOT_DIR    . '/include');
define('CLASSES_DIR',   INCLUDE_DIR . '/classes');
define('TEMPLATES_DIR', ROOT_DIR    . '/templates');
define('PUBLIC_DIR', 	  ROOT_DIR    . '/www');
define('COMPILED_DIR', 	PUBLIC_DIR  . '/compiled');
define('REDBEAN_MODEL_PREFIX', '');

ini_set('magic_quotes_gpc', null);

require_once(INCLUDE_DIR . '/functions.php');

// Autoloader from composer
require_once VENDOR_DIR. '/autoload.php';

// Custom autoloader
spl_autoload_register(function($class_name) {
  foreach(array('.', 'controllers', 'models') as $sub_directory) {
	$filename = sprintf('%s/%s/%s.php', CLASSES_DIR, $sub_directory, $class_name);
    if(file_exists($filename)) {
      require_once($filename);
    }
  }
});

require_once ROOT_DIR. '/config.php';

session_cache_limiter(false);
session_start();

R::setup(Config::get('db.connection'), Config::get('db.user'), Config::get('db.password'));
R::freeze(Config::get('db.freeze'));
R::debug(Config::get('db.debug'));

