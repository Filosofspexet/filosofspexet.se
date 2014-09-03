<header class="navbar navbar-inverse bs-docs-nav menu" role="banner">
  <div class="container">
  <div class="col-md-12">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="./" class="navbar-brand">Filosofspexet</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Aktuellt <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo Uri::create('/nyheter'); ?>">Nyheter</a></li> 
          <li><a href="<?php echo Uri::create('/events'); ?>">Händelser</a></li> 
          <li><a href="<?php echo Uri::create('/spex'); ?>">Årets spex</a></li> 
        </ul>
      </li>           
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Om Filosofspexet <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo Uri::create('/verksamhet'); ?>">Verksamhet</a></li> 
          <li><a href="<?php echo Uri::create('/historia'); ?>">Historia</a></li> 
        </ul>
      </li>    
      
      <li><a href="<?php echo Uri::create('/tidigare-spex'); ?>">Tidigare spex</a></li> 
      <li><a href="<?php echo Uri::create('/engagera-dig'); ?>">Engagera dig</a></li>      
      <li><a href="<?php echo Uri::create('/kontakt'); ?>">Kontakt</a></li>   
      <li><a href="<?php echo Uri::create('/bilder'); ?>">Bilder</a></li>  
      <li><a href="<?php echo Uri::create('/musik'); ?>">Musik</a></li>  
      <li><a href="<?php echo Uri::create('/gyckel'); ?>">Gückel</a></li>        
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo Uri::create('/internt'); ?>">Internt</a></li>
    </ul>
    </nav>
  </div>
  </div>
</header>