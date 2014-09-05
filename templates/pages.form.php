 <div class="row">
   <div class="col-md-6">
     <label for="slug">Slug</label>
     <input type="text" id="slug" name="slug" value="<?php echo isset($page->slug) ? $page->slug : ''; ?>" />
   </div>
   <div class="col-md-6">
     <label for="title">Titel</label>
     <input type="text" id="title" name="title" value="<?php echo isset($page->title) ? $page->title : ''; ?>" />
   </div>
 </div>
  <div class="row">
   <div class="col-md-6">
     <label for="template">Mall</label>
     <select id="template" name="template">
       <?php foreach(getTemplates() as $template): ?>
         <?php $selected = (isset($page->template) && $page->template == basename($template) || !isset($page->template) && basename($template) == 'pages.view.php'); ?>
         <option value="<?php echo basename($template); ?>"<?php echo $selected ? ' selected="selected"' : ''; ?>><?php echo basename($template); ?></option>
       <?php endforeach; ?>
     </select>
   </div>
   <div class="col-md-6">
     <label for="priority">XML-sitemap-prioritet</label>
     <input type="text" id="priority" name="priority" value="<?php echo isset($page->priority) ? $page->priority : ''; ?>" />
   </div>
 </div>
 <div class="row">
   <div class="col-md-12">
      <label for="leadtext">Ingress</label>
      <textarea id="leadtext" name="leadtext"><?php echo isset($page->leadtext) ? $page->leadtext : ''; ?></textarea>
   </div>
 </div>
 <div class="row">
   <div class="col-md-12">
     <label for="bodytext">Brödtext</label>
     <textarea id="bodytext" name="bodytext"><?php echo isset($page->bodytext) ? $page->bodytext : ''; ?></textarea>
   </div>
 </div>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">