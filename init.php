<?php

define('ROOT_DIR', 	  dirname(__FILE__));
define('VENDOR_DIR',  ROOT_DIR    . '/vendor');
define('INCLUDE_DIR', ROOT_DIR    . '/include');
define('CLASSES_DIR', INCLUDE_DIR . '/classes');

ini_set('magic_quotes_gpc', null);

// Autoloader from composer
require_once VENDOR_DIR. '/autoload.php';

// Custom autoloader
spl_autoload_register(function($class_name){
  $filename = CLASSES_DIR . '/' . $class_name . '.php';
  if(file_exists($filename)) {
    require_once($filename);
  }
});

require_once ROOT_DIR. '/config.php';

session_cache_limiter(false);
session_start();

R::setup(Config::get('dbconnection'), Config::get('dbuser'), Config::get('dbpassword'));
R::freeze(Config::get('dbfreeze'));
R::debug(Config::get('dbdebug'));

