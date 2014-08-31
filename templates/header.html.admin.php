<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $seo->title; ?></title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	  <meta name="keywords" content="<?php echo implode(', ', $seo->keywords); ?>">
	  <meta name="description" content="<?php echo $seo->description; ?>">
    <link rel="shortcut icon" href="<?php echo $seo->favicon; ?>"/>
    <link rel="bookmark" href="<?php echo $seo->favicon; ?>"/>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <?php echo Asset::getHeaderHtml(); ?>
  </head>
  <body class="<?php echo implode(' ', $css_classes); ?>">