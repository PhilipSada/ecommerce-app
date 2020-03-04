(function(){

    'use strict';

    PHEELFRESH.global.search = function(){

      $('.search-form').submit(function(){
        
        if($.trim($('.search-edit').val())===""){
            return false;
        }
      });

      $('.search-form-mobile').submit(function(){
        
        if($.trim($('.search-edit-mobile').val())===""){
            return false;
        }
      });
    }
})();