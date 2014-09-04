<div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php if(in_array('pages.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/sidor/admin'); ?>"><?php echo __('Sidor'); ?></a></li>
              <?php endif; ?>
              <?php if(in_array('spex.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/spex/admin'); ?>"><?php echo __('Spex'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('users.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/anvandare/admin'); ?>"><?php echo __('Användare'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('memberships.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/medlemskap/admin'); ?>"><?php echo __('Medlemskap'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('roles.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/roller/admin'); ?>"><?php echo __('Roller'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('events.list', $actions)) :?>         
                <li><a href="<?php echo Uri::create('/event/admin/'); ?>"><?php echo __('Event'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('news.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/nyheter/admin'); ?>"><?php echo __('Nyheter'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('actions.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/atgarder/admin'); ?>"><?php echo __('Åtgärder'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('tickets.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/biljetter/admin'); ?>"><?php echo __('Biljetter'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('contacts.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/kontakter/admin'); ?>"><?php echo __('Kontakter'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('images.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/biljetter/admin'); ?>"><?php echo __('Bilder'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('music.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/musik/admin/'); ?>"><?php echo __('Musik'); ?></a></li>
              <?php endif; ?>        
              <?php if(in_array('gyckel.list', $actions)) :?>
                <li><a href="<?php echo Uri::create('/gyckel/admin/'); ?>"><?php echo __('Gyckel'); ?></a></li>
              <?php endif; ?>                
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>