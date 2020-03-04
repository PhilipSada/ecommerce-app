(function(){

    'use strict';

    PHEELFRESH.product.cart = function(){

        var Stripe = StripeCheckout.configure({
            key: $('#properties').data('stripe-key'),
            locale:"auto",
            //to handle the token been returned to us by stripe
            token: function(token){

                var data = $.param({stripeToken: token.id, stripeEmail: token.email});
                axios.post('/cart/payment', data).then(function(response){
                    window.location.href = '/cart/payment-confirmation';
                    $('.order').css('display', 'block').html(response.data.success);
                    // app.displayItems();
                }).catch(function(error){
                    console.log(error);
                });

            }

        });

        var app = new Vue({

            el: '#shopping_cart',
            data:{

                items:[],
                cartTotal:0,
                amountInCents:0,
                loading:false,
                fail:false,
                authenticated:false,
                message:''
            },
            methods:{
                displayItems: function(){
                    // this.loading = true;
                  
                   
                    axios.get('/cart/items').then(function(response){

                        if(response.data.fail){
                            app.fail = true;
                            app.message = response.data.fail;
                            app.loading = false;
                        }else{
    
                            app.items = response.data.items;
                            app.cartTotal = response.data.cartTotal;
                            app.loading = false;
                            app.authenticated = response.data.authenticated;
                            app.amountInCents = response.data.amountInCents;
                            }

                    }); 
                },
                updateQuantity: function(product_id, operator){
                    // n:b product_id here is the $request->product_id stated in the cart.php
                    var postData = $.param({product_id:product_id, operator:operator});
                    axios.post('/cart/update-qty', postData).then(function(response){
                        app.displayItems();

                    });
                },
                removeItem: function(index){
                    var postData = $.param({item_index:index});
                    axios.post('/cart/remove-item', postData).then(function(response){
                        $('.notify').css('display', 'block').delay(4000).slideUp(300).html(response.data.success);
                        app.displayItems();
                    });
                },
                checkout: function(){
                   Stripe.open({
                        name: "PHEELFRESH",
                        description:"Shopping Cart Items",
                        email: $('#properties').data('customer-email'),
                        amount:app.amountInCents,
                        zipCode:true
                   });
                }
            },
            created: function(){
                this.displayItems();
            }
        });
    }
})();