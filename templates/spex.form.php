 <div class="row">
   <div class="col-md-6">
     <label for="slug">Slug</label>
     <input type="text" id="slug" name="slug" value="<?php echo isset($spex->slug) ? $spex->slug : ''; ?>" />
   </div>
   <div class="col-md-6">
     <label for="title">Titel</label>
     <input type="text" id="title" name="title" value="<?php echo isset($spex->title) ? $spex->title : ''; ?>" />
   </div>
 </div>
  <div class="row">
   <div class="col-md-6">
      <label for="title">Alternativ titel</label>
      <input type="text" id="alttitle" name="alttitle" value="<?php echo isset($spex->alttitle) ? $spex->alttitle : ''; ?>" />
   </div>
   <div class="col-md-6">
      <label for="title">Tema</label>
      <input type="text" id="theme" name="theme" value="<?php echo isset($spex->theme) ? $spex->theme : ''; ?>" />
   </div>
 </div>
 <div class="row">
   <div class="col-md-6">
      <label for="title">Biljettpris</label>
      <input type="text" id="ticketprice" name="ticketprice" value="<?php echo isset($spex->ticketprice) ? $spex->ticketprice : ''; ?>" />
   </div>
   <div class="col-md-6">
      <label for="title">Biljettpris för kårmedlemmar</label>
      <input type="text" id="discountprice" name="discountprice" value="<?php echo isset($spex->discountprice) ? $spex->discountprice : ''; ?>" />
   </div>
 </div>
  <div class="row">
   <div class="col-md-6">
     <div class="row">
       <div class="col-md-12">
         <label for="title">Vem som ritat affischen</label>
         <input type="text" id="posterauthor" name="posterauthor" value="<?php echo isset($spex->posterauthor) ? $spex->posterauthor : ''; ?>" />  
       </div>
     </div>
     <div class="row">
       <div class="col-md-12">
        <label for="title">Synligt</label>
        <input type="checkbox" id="visible" name="visible"<?php echo isset($spex->visible) && $spex->visible ? 'checked="checked"' : ''; ?> />
       </div>
     </div>   
     <div class="row">
       <div class="col-md-12">
        <label for="title">Bokning öppen</label>
        <input type="checkbox" id="reservationopen" name="reservationopen"<?php echo isset($spex->reservationopen) && $spex->reservationopen ? 'checked="checked"' : ''; ?> />
       </div>
     </div>        
   </div>
   <div class="col-md-6">
      <label for="image">Affisch</label>
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
          <?php if(isset($spex->image)) : ?>
            <img src="<?php echo Uri::createFile('/img/spex/' . $spex->image); ?>" />
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
 <div class="row">
    <div class="col-md-12">
      <label for="teaser">Teaser</label>
      <textarea id="teaser" name="teaser"><?php echo isset($spex->teaser) ? $spex->teaser : ''; ?></textarea>
   </div> 
 </div>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">