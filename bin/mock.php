<?php

require_once(dirname(dirname(__FILE__)).'/init.php');

$faker = Faker\Factory::create();

R::nuke();

// Create start page
$page = R::dispense('page');
$page->slug = 'start';
R::store($page);

// Create 404 page
$page = R::dispense('page');
$page->slug = '404';
R::store($page);

// Create login page
$page = R::dispense('page');
$page->slug = 'login';
R::store($page);

