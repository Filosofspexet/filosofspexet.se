    <div id="fb-root"></div>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <?php echo Asset::getFooterHtml(); ?>   
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
  </body>
</html>