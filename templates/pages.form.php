 <label for="slug">Slug</label>
 <input type="text" id="slug" name="slug" value="<?php echo isset($slug) ? $slug : ''; ?>" />
 <label for="title">Titel</label>
 <input type="text" id="title" name="title" value="<?php echo isset($title) ? $title : ''; ?>" />
 <label for="template">Mall</label>
 <input type="text" id="template" name="template" value="<?php echo isset($template) ? $template : ''; ?>" />
 <label for="priority">XML-sitemap-prioritet</label>
 <input type="text" id="priority" name="priority" value="<?php echo isset($priority) ? $priority : ''; ?>" />
  <label for="leadtext">Ingress</label>
 <textarea id="leadtext" name="leadtext"><?php echo isset($leadtext) ? $leadtext : ''; ?></textarea>
 <label for="bodytext">Brödtext</label>
 <textarea id="bodytext" name="bodytext"><?php echo isset($bodytext) ? $bodytext : ''; ?></textarea>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">