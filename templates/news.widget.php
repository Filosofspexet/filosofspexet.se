<div class="panel panel-primary">
  <div class="panel-heading">
    <i class="fa fa-newspaper-o"></i>
    Nyheter
  </div>          
  <ul class="list-group">
    <?php foreach($news as $news_item): ?>
      <li class="list-group-item">
        <div class="date">
          <?php echo date(Config::get('date.format'), $news_item->created); ?>
        </div>
        <div class="headline">
          <a href="<?php echo Uri::create(sprintf('/nyheter/%s', $news_item->slug)); ?>">
            <?php echo $news_item->headline; ?>
          </a>
        </div>
        <div class="body">
          <?php echo ellipsis($news_item->bodytext); ?>
          <?php printf('<a class="read-more" href="%s">%s</a>', Uri::create(sprintf('/nyheter/%s', $news_item->slug)), __('Läs mer')); ?>          
        </div>
      </li>
    <?php endforeach; ?>
  </ul>             
</div>