 <label for="slug">Slug</label>
 <input type="text" id="slug" name="slug" value="<?php echo isset($page->slug) ? $page->slug : ''; ?>" />
 <label for="title">Titel</label>
 <input type="text" id="title" name="title" value="<?php echo isset($page->title) ? $page->title : ''; ?>" />
 <label for="template">Mall</label>
 <select id="template" name="template">
   <?php foreach(getTemplates() as $template): ?>
     <?php $selected = (isset($page->template) && $page->template == basename($template) || !isset($page->template) && basename($template) == 'pages.view.php'); ?>
     <option value="<?php echo basename($template); ?>"<?php echo $selected ? ' selected="selected"' : ''; ?>><?php echo basename($template); ?></option>
   <?php endforeach; ?>
 </select>
 <label for="priority">XML-sitemap-prioritet</label>
 <input type="text" id="priority" name="priority" value="<?php echo isset($page->priority) ? $page->priority : ''; ?>" />
  <label for="leadtext">Ingress</label>
 <textarea id="leadtext" name="leadtext"><?php echo isset($page->leadtext) ? $page->leadtext : ''; ?></textarea>
 <label for="bodytext">Brödtext</label>
 <textarea id="bodytext" name="bodytext"><?php echo isset($page->bodytext) ? $page->bodytext : ''; ?></textarea>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">