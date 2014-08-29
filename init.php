<?php

define('ROOT', dirname(__FILE__));

ini_set('magic_quotes_gpc', null);

require_once ROOT. '/src/autoload.php';

require_once ROOT. '/config.php';

if(is_callable($currentConfig['dbinit'])) {
  call_user_func($currentConfig['dbinit']);
} else {
  throw new Exception('No DB Init callback was configured.');
};
