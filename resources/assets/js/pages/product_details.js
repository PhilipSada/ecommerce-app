import Axios from "axios";

(function(){

    'use strict';

    PHEELFRESH.product.details = function(){

        var app = new Vue({

            el: '#product',
            data: {
                product:[],
                category:[],
                subCategory:[],
                similarProducts:[],
                productId:$('#product').data('id'),
                loading:false,
                similarGrid:true,
                similarImg:true,
                addToCart:true,
                similarContainer:true,
                similarText:true
            },
            methods:{
                getProductDetails: function(){
                    this.loading = true;

                   
                axios.get('/product-details/' + this.productId).then(function(response){
                         
                    app.product = response.data.product;
                    app.category = response.data.category;
                    app.subCategory = response.data.subcategory;
                    app.similarProducts = response.data.similarProduct;
                    app.loading = false;
                });
                    
                    
                },
                stringLimit: function(string, value){
                    return PHEELFRESH.module.truncateString(string, value);
                },
                addItemToCart: function(id){
                    PHEELFRESH.module.addItemsToCart(id, function(message){
                        $('.notify').css('display', 'block').delay(14000).slideUp(300).html(message);
                    });
                }
            },
            created: function(){
                this.getProductDetails();
            }
        });
    }
})();