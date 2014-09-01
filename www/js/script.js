// TODO: Use requireJS to make this file so small as possible.

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
  
  /**/
  $().ready(function(){
    if(Filosofspexet.Config.get('facebook.app.id') && $('#fb-root').length > 0) {
      facebookInit();
    }
  });
  
})(jQuery, Filosofspexet);