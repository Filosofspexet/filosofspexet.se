<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="utf-8">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="sv">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	  <meta name="keywords" content="<?php echo implode(', ', $seo->keywords); ?>">
	  <meta name="description" content="<?php echo $seo->description; ?>"> 
    <?php if($seo->noindex) : ?>
      <meta name="robots" content="noindex">
    <?php endif; ?>
    <title><?php echo $seo->title; ?></title>
    <?php if($seo->canonical_url) : ?>
      <link rel="canonical" href="<?php echo $seo->canonical_url; ?>" />
    <?php endif; ?>
    <link rel="shortcut icon" href="<?php echo $seo->favicon; ?>"/>
    <link rel="bookmark" href="<?php echo $seo->favicon; ?>"/>
    <meta property="fb:page_id" content="<?php echo Config::get('facebook.page.id'); ?>" />
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->  
    <?php echo Asset::getHeaderHtml(); ?>   
    <?php if(Config::get('use.google.analytics')) : ?>
      <?php echo $this->render('google.analytics.php'); ?>
    <?php endif; ?>
  </head>
  <body class="<?php echo implode(' ', $css_classes); ?>">