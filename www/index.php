<?php
require_once '../init.php';

use Doctrine\Common\Inflector\Inflector;

$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
$path_info_trimmed = ltrim($path_info, '/');
$path_parts = explode('/', $path_info_trimmed);
$controller = $path_parts[0];

$controller_classname = Inflector::classify($controller) . 'Controller';

if(!$controller || !class_exists($controller_classname)) {
  $controller_classname = 'PagesController';
}

$controller_classname::getInstance()->run();
