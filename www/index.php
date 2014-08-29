<?php
require_once '../init.php';

use Doctrine\Common\Inflector\Inflector;

$path_info = ltrim($_SERVER['PATH_INFO'], '/');
$path_parts = explode('/', $path_info);
$controller = $path_parts[0];
$controller_classname = Inflector::classify($controller) . 'Controller';

if(!class_exists($controller_classname)) {
 throw new Exception(sprintf('Can\'t find class \'%s\'', $controller_classname));
}

$controller_classname::getInstance()->run();
