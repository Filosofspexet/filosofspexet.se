 <div class="row">
   <div class="col-md-4">
     <label for="name">Namn</label>
     <input type="text" id="name" name="name" value="<?php echo isset($contact->name) ? $contact->name : ''; ?>" />
   </div>
   <div class="col-md-4">
     <label for="title">Titel</label>
     <input type="text" id="title" name="title" value="<?php echo isset($contact->title) ? $contact->title : ''; ?>" />
   </div>
   <div class="col-md-4">
     <label for="slug">Slug</label>
     <input type="text" id="slug" name="slug" value="<?php echo isset($contact->slug) ? $contact->slug : ''; ?>" />
   </div>  
 </div>
 <div class="row">
  <div class="col-md-8">
    <label for="teaser">Beskrivning</label>
    <textarea id="description" name="description"><?php echo isset($contact->description) ? $contact->description : ''; ?></textarea>
  </div> 
  <div class="col-md-4">
    <label for="image">Bild</label>
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
          <?php if(isset($spex->image)) : ?>
            <img src="<?php echo Uri::createFile('/img/contacts/' . $spex->image); ?>" />
          <?php endif; ?>
        </div>
        <div>
          <span class="btn btn-default btn-file">
            <span class="fileinput-new">
              <?php echo __('Välj bild')?>
            </span>
            <span class="fileinput-exists">
              <?php echo __('Ändra'); ?>
            </span>
            <input type="file" name="image" id="image"></span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Ta bort</a>
        </div>
      </div>
  </div>
 </div>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">