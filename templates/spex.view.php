<?php echo $this->render('header.html.standard.php'); ?>
<?php echo $this->render('header.php'); ?>
<?php if(sizeof($menu)) : ?>
  <?php echo $this->render('menu.php'); ?>
<?php endif; ?>
<?php if(sizeof($breadcrumbs) > 0) : ?>
  <?php echo $this->render('breadcrumbs.php'); ?>
<?php endif; ?>
<?php echo $this->render('flash.status.php'); ?>
<div class="container" id="main">
  <div class="row">  
    <div class="col-md-9">   
      <div class="row">
        <div class="col-md-12 page-main">
          <h1>
          <?php echo $spex->title; ?>
          </h1>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 spex-content-container">         
              <div class="alternative-title">
                Eller: <?php echo $spex->alttitle; ?>
              </div>
              <div class="theme">
                <?php echo $spex->theme; ?>
              </div>
              <div class="teaser">   
                <?php echo $spex->teaser; ?>          
              </div>
              <div class="events">
                <span class="dates-title">
                  <?php echo __('Föreställningar ges som följer:'); ?>
                </span>
                <ul>
                  <li>a</li>
                  <li>b</li>
                  <li>c</li>
                  <li>d</li>
                  <li>e</li>
                  <li>f</li>
                </ul>
              </div>                   
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6 spex-image-container">
              <img class="spex-image" src="<?php echo Uri::createFile('/img/spex/' . $spex->image); ?>" alt="Affisch för <?php echo $spex->title; ?>">
              <?php if($spex->posterauthor) : ?>
                <div class="poster-text"">
                  Affisch av <?php echo $spex->posterauthor; ?>
                </div>
              <?php endif; ?>
            </div>            
          </div>
          <div class="row spex-alternative-image-container">
            <div class="col-md-12">
              <img class="spex-image" src="<?php echo Uri::createFile('/img/spex/' . $spex->image); ?>" alt="Affisch för <?php echo $spex->title; ?>">
              <?php if($spex->posterauthor) : ?>
                <div class="poster-text"">
                  Affisch av <?php echo $spex->posterauthor; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="fb-like" data-href="<?php echo Uri::create(); ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
            </div>
          </div>          
        </div>         
      </div>     
      <div class="row spex-actions">
        <div class="col-md-4 col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fa fa-info"></i>
              Information
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item">Produktionsår: <strong><?php echo $spex->year; ?></strong></li>
                <li class="list-group-item">Biljettpris: <strong><?php echo $spex->ticketprice; ?></strong>kr</li>
                <?php if($spex->discountprice): ?>
                  <li class="list-group-item">Biljettpris för medlemmar av en studentkår (oavsett kår): <strong><?php echo $spex->discountprice; ?></strong>kr</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fa fa-car"></i>
              Vägbeskrivning
            </div>
            <div class="panel-body">
              Föreställningslokal: <b>Lingsalen, Studenternas Hus</b><br /> 
              Adress: Götabergsgatan 17
              Karta
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fa fa-book"></i>
              Boka biljett
            </div>
            <div class="panel-body">
              Bokningen är stängd
            </div>
          </div>
        </div>
      </div>      
    </div>
    <div class="col-md-3 page-right">
      <?php foreach($widgets as $widget => $data) : ?>
        <div class="widget <?php echo $widget; ?>">
          <?php echo $this->render(sprintf('%s.widget.php', $widget), $data); ?>
        </div>
      <?php endforeach; ?>   
    </div>
  </div>
</div>
<?php echo $this->render('footer.php'); ?>
<?php echo $this->render('footer.html.standard.php'); ?>