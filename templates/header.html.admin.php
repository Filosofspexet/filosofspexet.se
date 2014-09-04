<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $seo->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="<?php echo $seo->favicon; ?>"/>
    <link rel="bookmark" href="<?php echo $seo->favicon; ?>"/>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->  
    <?php echo Asset::getHeaderHtml(); ?>
    <script type="text/javascript">
      (function(){
        Filosofspexet.Config.setAll(<?php 
          echo json_encode(array(        
            'db.debug' 			  => Config::get('db.debug'),
            'db.freeze' 		  => Config::get('db.freeze'),
            'slim.debug'		  => Config::get('slim.debug'),	
            'base.url'        => Config::get('base.url'),
            'index.file'      => Config::get('index.file'),
            'facebook.app.id' => Config::get('facebook.app.id'),
          ));
        ?>);
      })();
    </script>
  </head>
  <body class="<?php echo implode(' ', $css_classes); ?>">