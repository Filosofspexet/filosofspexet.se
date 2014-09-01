var Filosofspexet = {

  // Mimic Config.php
  Config: (function(){
    var data = {};
    return {  
      set: function(name, value) {
        data[name] = value;
      },   
      setAll: function(new_data) {
        for(property in new_data) {
          data[property] = new_data[property];
        }
      }, 
      get: function(name) {
        return data[name];
      }
    };
  })(),
  
  Request: (function(){
    var data = {};
    return {  
      set: function(name, value) {
        data[name] = value;
      },   
      setAll: function(new_data) {
        for(property in new_data) {
          data[property] = new_data[property];
        }
      }, 
      get: function(name) {
        return data[name];
      }
    };
  })(),
  
  // Mimic Uri.php
  Uri: (function(){
    return {
      create: function(uri, get_variables) {
        var url = Filosofspexet.Config.get('base.url');
        if (Filosofspexet.Config.get('index.file')) {
          url += Filosofspexet.Config.get('index.file')+'/';
        }
        if(!uri) {
          url = Filosofspexet.Request.get('path.info');
        } else {
          if(uri.charAt(0) == '/') {
            url = uri.substring(1);
          } else {
            url = uri;
          }
        }
        if (get_variables.length > 0) {
          var separator = url.indexOf('?') === -1 ? '?' : '&';
          for(key in get_variables) {
            url += separator + key + '=' + get_variables[key];
            separator = '&';
          }
        }
        return $url;
      }
    };
  })()
  
};