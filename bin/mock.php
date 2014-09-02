<?php

require_once(dirname(dirname(__FILE__)).'/init.php');

$faker = Faker\Factory::create();

R::nuke();

// Pages -------------------

// Create start page
$page = R::dispense('page');
$page->slug = 'start';
$page->title = 'Filosofspexet';
$page->leadtext = 'Varm välkommen till Filosofiska Lätta Knästående SpexarGardet (i kortform Filosofspexet)!';
$page->bodytext = '<b>Vilka är vi då?</b> Jo, vi är Göta studentkårs spex.
<b>Men vad är ett spex?</b> Jo en spexförening blandar teater, dans, sång, komik, musik, fester och kalabalik!Vi sätter årligen upp en stor spexproduktion samt en höstrevy. Mellan föreställningarna ägnar vi oss åt stämsång, teaterövningar, kakätning, kramar och annat minst lika spexikalt.';
R::store($page);

// Create 404 page
$page = R::dispense('page');
$page->slug = '404';
R::store($page);

// Create login page
$page = R::dispense('page');
$page->slug = 'login';
R::store($page);

// Actions -------------------
$names = array(
  'pages.create',
  'pages.edit',
  'pages.delete'
);
$action_ids = array();
foreach($names as $name) {
  $action = R::dispense('action');
  $action->name = $name;
  $action_ids[] = R::store($action);
}

// Users -------------------
$user = R::dispense('user');
$dynamic_salt = generatePassword(40);
$user->username = 'test';
$user->hash = doHash(sprintf('%s%s%s', Config::get('static.salt'), 'test', $dynamic_salt));
$user->sharedActionList = R::loadAll('action', $action_ids);
R::store($user);

