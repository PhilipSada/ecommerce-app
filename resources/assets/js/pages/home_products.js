import Axios from "axios";

(function(){

    'use strict';

    PHEELFRESH.homeslider.homePageProducts = function(){

        var app = new Vue({

            el:'#root',
            data: {
                featured:[],
                products:[],
                count:0,
                loading:false,
                featuredGrid:true,
                productImg:true,
                addCart:true,
                productContainer:true,
                productText:true
               
            },
            methods:{
                getFeaturedProducts: function(){
                    // this.loading = true;
                    //axios.all is used when we want to process more than one request at the same time
                    axios.all([
                        axios.get('/product-picks'), axios.get('/featured')
                        
                    ]).then(axios.spread(function(productsResponse, featuredResponse){
                        app.featured= featuredResponse.data.featured;
                        app.products= productsResponse.data.products;
                        app.count= productsResponse.data.count;
                        // app.loading = false;
                        
                    }));

                    // axios.get('/product-picks').then(function(response){
                    //     featured was the name given in the json_encode in index controller
                    //   the featured data axios get is sent back to the featured:[] for display
                    //     app.featured= response.data.featured;
                    //     app.loading = false;
                        
                    // });

                },
                loadMoreProducts: function(){
                    var token = $('.featured-products').data('token');
                    this.loading = true;
                    //to post the mentioned params to the php script
                    var data = $.param({next:2, token:token, count:app.count});
                    axios.post('/load-more', data).then(function(response){
                        //this would basically overide the previous product picks
                        app.products = response.data.products;
                        app.count = response.data.count;
                        app.loading = false;
                    });
                },
                stringLimit: function(string, value){
                    return PHEELFRESH.module.truncateString(string, value);
                },
                addItemToCart: function(id){
                   PHEELFRESH.module.addItemsToCart(id, function(message){
                    $('.notify').css('display', 'block').delay(4000).slideUp(300).html(message);
                   });
                   //need to add another function that would make the cart number display in the nav 
                }
            },
            created: function(){
                this.getFeaturedProducts();
                
    
            },
            //the mounted function is used when vuejs page has already been loaded/displayed
            mounted: function(){
                //to load more products when the user reaches near the bottom of the page
                $(window).scroll(function(){
                    if($(window).scrollTop() + $(window).height() > $(document).height() - 100){
                        app.loadMoreProducts();
                    }
                })

            }
        });
    }


})();