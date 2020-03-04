(function(){

  'use strict';

  PHEELFRESH.admin.delete = function(){
      //'.this is to ensure we target a class 'delete-item' in a table that has data-form="deleteForm"
      $('table[data-form = "deleteForm"]').on('click', '.delete-item', function(e){

        e.preventDefault();
        
        var form = $(this);

        $('#confirm').foundation('open').on('click', '#delete-btn', function(){
            //this is to submit the form
            form.submit();
        })

    });
  }
 
})();