 <div class="row">
   <div class="col-md-6">
     <label for="slug">Slug</label>
     <input type="text" id="slug" name="slug" value="<?php echo isset($news->slug) ? $news->slug : ''; ?>" />
   </div>
   <div class="col-md-6">
     <label for="title">Rubrik</label>
     <input type="text" id="headline" name="headline" value="<?php echo isset($news->headline) ? $news->headline : ''; ?>" />
   </div>
 </div>
 <div class="row">
   <div class="col-md-12">
      <label for="bodytext">Brödtext</label>
      <textarea id="bodytext" name="bodytext"><?php echo isset($news->bodytext) ? $news->bodytext : ''; ?></textarea>
   </div>
 </div>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">