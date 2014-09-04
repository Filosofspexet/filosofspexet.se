 <label for="slug">Slug</label>
 <input type="text" id="slug" name="slug" value="<?php echo isset($spex->slug) ? $spex->slug : ''; ?>" />
 <label for="title">Titel</label>
 <input type="text" id="title" name="title" value="<?php echo isset($spex->title) ? $spex->title : ''; ?>" />
 <label for="title">Alternativ titel</label>
 <input type="text" id="alttitle" name="alttitle" value="<?php echo isset($spex->alttitle) ? $spex->alttitle : ''; ?>" />
 <label for="title">Tema</label>
 <input type="text" id="theme" name="theme" value="<?php echo isset($spex->theme) ? $spex->theme : ''; ?>" />
 <label for="title">Biljettpris</label>
 <input type="text" id="ticketprice" name="ticketprice" value="<?php echo isset($spex->ticketprice) ? $spex->ticketprice : ''; ?>" />
 <label for="title">Synligt</label>
 <input type="checkbox" id="visible" name="visible"<?php echo isset($spex->visible) && $spex->visible ? 'checked="checked"' : ''; ?> />
 <label for="teaser">Teaser</label>
 <textarea id="teaser" name="teaser"><?php echo isset($spex->teaser) ? $spex->teaser : ''; ?></textarea>
 <input class="btn btn-primary" type="submit" value="<?php echo __('Spara'); ?>">
 <input class="btn btn-default" type="reset" value="<?php echo __('Rensa'); ?>">