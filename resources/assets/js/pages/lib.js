import Axios from "axios";

(function(){

    'use strict';

    PHEELFRESH.module = {

        truncateString: function limit(string, value){
            if(string.length > value){
                return string.substring(0, value) + '...';
            }else{
                return string;
            }
        },
        addItemsToCart: function cart(id, callback){

            var token = $('.featured-products').data('token');

            if(token==null || !token){
                var token = $('#product').data('token');
            }

            var postData = $.param({product_id:id, token:token });

            axios.post('/cart', postData).then(function(response){
                
                callback(response.data.success);

            });
            return id;
        }
    }


})();