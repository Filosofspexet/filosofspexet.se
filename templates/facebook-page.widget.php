<div class="panel panel-primary">
  <div class="panel-heading">  
    <a class="btn btn-social-icon btn-xs btn-facebook" href="https://www.facebook.com/filosofspexet">
      <i class="fa fa-facebook"></i>
    </a>
    På Facebook
  </div>
     <ul class="list-group">
      <?php foreach($feeds as $feed): ?>
        <li class="list-group-item post">
          <div class="icon">
            <?php if(isset($feed['icon'])) : ?>
              <img src="<?php echo $feed['icon']; ?>" />
            <?php endif; ?>
          </div>
          <div class="date">
            <?php echo date('Y-m-d H:i:s', strtotime($feed['created_time'])); ?>
          </div>
          <div class="message">
            <?php if(isset($feed['story'])): ?>
              <?php echo $feed['story']; ?>
            <?php endif; ?>     
            <?php if(isset($feed['message'])): ?>
              <?php echo ellipsis($feed['message']); ?>      
            <?php endif; ?>
            <?php printf('<a class="read-more" href="%s">%s</a>', $feed['link'], __('Läs mer')); ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
</div>