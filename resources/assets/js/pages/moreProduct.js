(function(){

    'use strict';

    PHEELFRESH.product.more = function(){

        var app = new Vue({

            el: '#moreProducts',
            data: {
                allMen:[],
                allWomen:[],
                nikeWomen:[],
                nikeMen:[],
                // jordanMen:[],
                // jordanWomen:[],
                nikeMenCount:0,
                nikeWomenCount:0,
                jordanMenCount:0,
                jordanWomenCount:0,
                moreProductId:$('#moreProducts').data('id'),
                loading:false,
                similarGrid:true,
                similarImg:true,
                addToCart:true,
                similarContainer:true,
                similarText:true
               
            },
            methods:{
                getMoreProductDetails: function(){
                    this.loading = true;

                   
                axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                    app.allMen = response.data.allMen;
                    app.allWomen = response.data.allWomen;
                    // app.nikeMen = response.data.nikeMen;
                    // app.jordanMenShoes = response.data.jordanMenShoes;
                    // app.nikeWomenShoes = response.data.nikeWomenShoes;
                    app.loading = false;
                });
                        
                },
                jordanBrand: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.jordanMen;
                        app.jordanMenCount = response.data.jordanMenCount;
                        app.jordanWomenCount = response.data.jordanWomenCount;
                        app.allWomen = response.data.jordanWomen;
                        app.loading = false;
                    });
                },
                nikeBrand: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.nikeMen;
                        app.nikeMenCount = response.data.nikeMenCount;
                        app.nikeWomenCount = response.data.nikeWomenCount;
                        app.allWomen = response.data.nikeWomen;
                        app.loading = false;
                    });
                },
                sortingAsc: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.ascAllMen;
                        app.allWomen = response.data.ascAllWomen;
                        app.loading = false;
                    });
                },
                sortingJordanAsc: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.ascJordanMen;
                        app.allWomen = response.data.ascJordanWomen;
                        app.loading = false;
                    });
                },
                sortingNikeAsc: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.ascNikeMen;
                        app.allWomen = response.data.ascNikeWomen;
                        app.loading = false;
                    });
                },
                sortingDsc: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.dscAllMen;
                        app.allWomen = response.data.dscAllWomen;
                        app.loading = false;
                    });
                },
                sortingJordanDsc: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.dscJordanMen;
                        app.allWomen = response.data.dscJordanWomen;
                        app.loading = false;
                    });
                },
                sortingNikeDsc: function(){

                    axios.get('/product/category/more/' + this.moreProductId).then(function(response){
                         
                        app.allMen = response.data.dscNikeMen;
                        app.allWomen = response.data.dscNikeWomen;
                        app.loading = false;
                    });
                },
                noMenBrand: function(){

                    if(this.jordanMenCount == 0 || this.nikeMenCount == 0){
                        $('.no-products').css({'display': 'block', 'color': 'black'}).html('<h2> No products based on your filter were found </h2>');
                    }else{
                        $('.no-products').css('display', 'none');
                    }

                   
                }
               
            },
            created: function(){
                this.getMoreProductDetails();
            },
            mounted: function(){
               
                $('#brand-select').on('change', function(){
                    var selectedBrand = $(this).children("option:selected").val();
                    if(selectedBrand == 'jordan'){
                       app.jordanBrand(); 
                       $("#filter-select option[value='noSelect']").prop('selected', 'selected');

                       $('#filter-select').on('change', function(){
                        var selectedFilter = $('#filter-select').children("option:selected").val();
                        if(selectedFilter=='lowHigh'){
                            app.sortingJordanAsc();
                        }
                        else if(selectedFilter == 'highLow'){
                            app.sortingJordanDsc();
                        }
                       });  
                    }
                    else if(selectedBrand == 'all'){
                        // $('.no-products').css('display', 'none');
                        app.getMoreProductDetails();
                        $("#filter-select option[value='noSelect']").prop('selected', 'selected');
                        $('#filter-select').on('change', function(){
                            var selectedFilter = $('#filter-select').children("option:selected").val();
                            if(selectedFilter=='lowHigh'){
                                app.sortingAsc();
                            }
                            else if(selectedFilter == 'highLow'){
                                app.sortingDsc();
                            }
                        });  

                    }
                    else if(selectedBrand == 'nike'){
                        // $('.no-products').css('display', 'none');
                        app.nikeBrand();
                        $("#filter-select option[value='noSelect']").prop('selected', 'selected');
                        $('#filter-select').on('change', function(){
                            var selectedFilter = $('#filter-select').children("option:selected").val();
                            if(selectedFilter=='lowHigh'){
                                app.sortingNikeAsc();
                            }
                            else if(selectedFilter == 'highLow'){
                                app.sortingNikeDsc();
                            }
                        });  
                    }
                    
                });
                $('#filter-select').on('change', function(){
                    var selectedFilter = $('#filter-select').children("option:selected").val();
                    var selectedBrand = $('#brand-select').children("option:selected").val();
                    if(selectedFilter=='lowHigh' && selectedBrand == 'all'){
                        app.sortingAsc();
                    }
                    else if(selectedFilter == 'highLow' && selectedBrand == 'all'){
                        app.sortingDsc();
                    }
                    else if(selectedFilter=='lowHigh' && selectedBrand == 'default'){
                        app.sortingAsc();
                    }
                    else if(selectedFilter == 'highLow' && selectedBrand == 'default'){
                        app.sortingDsc();
                    }
                    else if(selectedFilter == 'clearFilter'){
                       app.getMoreProductDetails();
                       $("#brand-select option[value='default']").prop('selected', 'selected');
                       $("#filter-select option[value='noSelect']").prop('selected', 'selected');
                    }
                   });
                 
               
            }

        });
    }
})();