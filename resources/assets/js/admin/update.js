(function(){
    'use strict';

    PHEELFRESH.admin.update = function(){

        //update category

        $('.update-category').on('click', function(e){

            var token = $(this).data('token');
            var id = $(this).attr('id');
            var name = $("#item-name-"+ id).val();

            

            $.ajax({
                type: 'POST',
                url:'/admin/product/categories/'+ id +'/edit',
                data: {
                    'token':token,
                    'name':name
                },
                success:function(data){
                    var response = JSON.parse(data);
                    $('.notification').css('display', 'block').delay(4000).slideUp(300).html(response.success); //success is gotten from productcategorycontroller.php file in the edit function where there is an echo json encode
                },
                error: function(request, error){
                    var errors = JSON.parse(request.responseText);
                    var ul = document.createElement('ul');

                    $.each(errors, function(key, value){

                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });

                    $('.notification').css('display', 'block').removeClass('primary').addClass('alert').delay(6000).slideUp(300).html(ul);
                }
            });

            e.preventDefault();

        });

        //subcategory created 

        $('.update-subcategory').on('click', function(e){

            var token = $(this).data('token');
            var id = $(this).attr('id');
            var category_id = $(this).data('category-id');
            var name = $("#item-subcategory-name-"+ id).val();
            var selected_category_id = $('#item-category-'+ category_id +' option:selected').val();

            // if the user actually changes the default selected category_id then we use the changed selected category_id
            if(category_id !== selected_category_id){
                category_id = selected_category_id;
            }
            
            $.ajax({
                type: 'POST',
                url:'/admin/product/subcategory/'+ id +'/edit',
                data: {
                    'token':token,
                    'name':name,
                    'category_id':category_id
                },
                success:function(data){
                    var response = JSON.parse(data);
                    
                    $('.notification').css('display', 'block').delay(4000).slideUp(300).html(response.success); 
                },
                error: function(request, error){
                    var errors = JSON.parse(request.responseText);
                    var ul = document.createElement('ul');

                    $.each(errors, function(key, value){

                        var li = document.createElement('li');
                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });

                    $('.notification').css('display', 'block').removeClass('primary').addClass('alert').delay(6000).slideUp(300).html(ul);
                }
            });

            e.preventDefault();

        });
        
    };

})();