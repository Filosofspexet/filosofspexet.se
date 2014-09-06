<?php

class ContactsController extends Controller {

  protected function setupRoutes() {
    $this->s->group('/kontakter', function() {

      $this->s->get('/', function() {
        // TODO: kontaktsida
        $this->throw404();
      });
      
      $this->s->get('/admin', function() {
        $this->requireAction('contacts.list', '/', __('Du har inte rätt att lista kontakter.'));
        $this->setAdmin(true);     
        $pagination = $this->paginate('contact', array('id','name','title','created','changed'), 10);      
        $this->render('contacts.admin.list.php', $pagination);
      });
      
      $this->s->get('/skapa', function() {
        $this->requireAction('contacts.create', '/', __('Du har inte rätt att skapa kontakter.'));
        $this->setAdmin(true);
        $this->render('contacts.create.php');
      });

      $this->s->post('/skapa', function() {
        $this->requireAction('contacts.create', '/', __('Du har inte rätt att skapa kontakter.'));
        $this->setAdmin(true);
        $contact = R::dispense('contact');
        $contact->import($_POST);
        $contact->user = $this->user;   
        $new_image = $this->handleUpload('image', IMAGES_DIR . '/contacts');   
        if($new_image) {
          $contact->image  = $new_image;   
        }
        try {
          R::store($contact);
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/kontakter/admin'));
        }
        $this->s->flash('success', __('Kontakten har skapats.'));
        $this->render('contacts.edit.php', compact('contact'));
      });

      $this->s->get('/andra/:id', function($id) {
        $this->requireAction('contacts.edit', '/', __('Du har inte rätt att editera kontakter.'));
        $this->setAdmin(true);
        $contact = R::load('contact', $id);
        if(!$contact->id) {
          $this->s->flash('danger', __('Kontakten du försöker ändra finns inte!'));
          $this->s->redirect(Uri::create('/kontakter/admin'));
        }
        $this->render('contacts.edit.php', compact('contact'));
      });

      $this->s->post('/andra/:id', function($id) {
        $this->requireAction('contacts.edit', '/', __('Du har inte rätt att editera kontakter.'));
        $this->setAdmin(true);
        $contact = R::load('contact', $id);
        if(!$contact->id) {
          $this->s->flash('danger', __('Kontakten du försöker ändra finns inte!'));
          $this->s->redirect(Uri::create('/kontakter/admin'));
        }      
        $image_before = $contact->image;        
        $contact->import($_POST);
        // If updating without uploading  
        if(!$contact->image) {
          $contact->image = $image_before;
        } else {
          $new_image = $this->handleUpload('image', IMAGES_DIR . '/contacts');   
          if($new_image) {
            $contact->image  = $new_image;   
            $old_image_full = sprintf('%s/contacts/%s', IMAGES_DIR, $image_before);
            if(file_exists($old_image_full)) {
              @unlink($old_image_full);
            }
          }
        }            
        $contact->visible          = isset($_POST['visible']);
        $contact->reservationopen  = isset($_POST['reservationopen']);
        $contact->user             = $this->user;          
        try {
          $id = R::store($contact);
          $this->s->flash('success', __('Kontakten har sparats.'));
          $this->s->redirect(Uri::create(sprintf('/kontakter/andra/%d', $id)));
        } catch(Exception $ex) {
          $this->s->flash('danger', __($ex->getMessage()));
          $this->s->redirect(Uri::create('/kontakter/admin'));
        }       
      });

      $this->s->get('/tabort/:id', function($id) {
        $this->requireAction('contacts.delete', '/', __('Du har inte rätt att ta bort kontakter.'));
        $this->setAdmin(true);
        $contact = R::load('contact', $id);
        if(!$contact->id) {
          $this->s->flash('danger', __('Kontakten du försöker ta bort finns inte.'));
        } else {
          R::trash($contact);
          $this->s->flash('success', __('Kontakten har tagits bort.'));
        }
        if($this->user != null) {
          $this->s->redirect(Uri::create('/kontakter/admin'));
        } else {
          $this->s->redirect(Uri::create('/'));
        }
      });
    
      $this->s->get('/:slug', function($slug) {
        $this->addStandardAssets();
        $contact = R::findOne('contact', 'slug = ? AND visible = ?', array($slug, true));
        if($contact == null || !$contact->id) {
          $this->throw404();
        }
        $this->seo->title = sprintf('%s - %s - Filosofspexet', $contact->title, $contact->theme);
        $this->css_classes[] = $slug;
        $this->breadcrumbs = array (
          'Hem' => Uri::create('/'),
          'Kontakter'  => Uri::create('/kontakter/'),
          $contact->name   => null
        );
        $this->render('contacts.view.php', compact('contact'));
      });
  
    });


  }


}