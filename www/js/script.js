// TODO: Use requireJS?

(function($){

  var getParam = function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    var results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

  var facebookInit = function() {
    window.fbAsyncInit = function() {
      FB.init({
        appId:  Filosofspexet.Config.get('facebook.app.id'),
        cookie: true,
        xfbml:  true,
        oauth:  true
      });
      FB.Event.subscribe('auth.login', function(response) {
        var redirectUrl = getParam('redirectUrl');
        if(redirectUrl) {
          window.location.href = Filosofspexet.uri.create(redirectUrl);
        } else {
          window.location.href = Filosofspexet.uri.create('/');
        }  
      });
      FB.Event.subscribe('auth.logout', function(response) {
        window.location.reload();
      });
    };
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  };
  
  var openExternalLinksInNewWindows = function(){
    $('a').each(function() {
     var a = new RegExp('/' + window.location.host + '/');
     if(!a.test(this.href)) {
         $(this).click(function(event) {
             event.preventDefault();
             event.stopPropagation();
             window.open(this.href, '_blank');
         });
     }
    });
  };
  
  var createJQuerySlider = function() {
    $('.main-slider').bxSlider({
      mode: 'fade',
      captions: true
    });
  };
  
  var addActiveClassesToLinks = function() {
    $('.nav a').each(function(){
      var $this = $(this);
      if($this.attr('href') == location.pathname){
        $this.parent().addClass('active');
      }
    })
  }
 
  /**/
  $().ready(function(){
    if(Filosofspexet.Config.get('facebook.app.id') && $('#fb-root').length > 0) {
      facebookInit();
    }
    openExternalLinksInNewWindows();
    if($('.main-slider').length > 0) {
      createJQuerySlider();
    }
    if ($("[rel=tooltip]").length) {
     $("[rel=tooltip]").tooltip();
    }
    addActiveClassesToLinks();
  });
  
})(jQuery, Filosofspexet);