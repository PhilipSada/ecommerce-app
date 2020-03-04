window .$=  window.JQuery = require('jquery');

window.axios = require('axios');

window.Vue= require('vue');




require('foundation-sites/dist/js/foundation');
require('foundation-sites/dist/js/plugins/foundation.core');
require('foundation-sites/dist/js/plugins/foundation.reveal');
require('foundation-sites/dist/js/plugins/foundation.util.keyboard');
require('foundation-sites/dist/js/plugins/foundation.util.touch');
require('foundation-sites/dist/js/plugins/foundation.util.triggers');
require('foundation-sites/dist/js/plugins/foundation.util.mediaQuery');
require('foundation-sites/dist/js/plugins/foundation.util.motion');
require('foundation-sites/dist/js/plugins/foundation.tooltip');
require('foundation-sites/dist/js/plugins/foundation.util.box');
require('foundation-sites/dist/js/plugins/foundation.util.triggers');





(function(){
    //to activate the plugins for the edit category modal
    $(document).foundation();

    $(document).ready(function (){

        PHEELFRESH.global.helper();
        PHEELFRESH.global.search();
      

        //switch pages (if the id corresponds to a specific case then a function or nothing is run)
        //data('page-id') can be found at the top in each blade.php file
        switch ($('body').data('page-id')){
           
            case 'home':
            PHEELFRESH.homeslider.initCarousel();
            PHEELFRESH.homeslider.homePageProducts();
           
                break;
            case 'cart':
              
                PHEELFRESH.product.cart();
               
                
                break;
            case 'search':
                // PHEELFRESH.homeslider.search();
               
                break;
            case 'product':
                PHEELFRESH.product.details();
                PHEELFRESH.product.more();
                
                break;
            case 'adminCategories':
                PHEELFRESH.admin.update();
                PHEELFRESH.admin.delete();
                PHEELFRESH.admin.create();
               
                break;
            case 'adminProduct':
                PHEELFRESH.admin.changeEvent();
                PHEELFRESH.admin.delete();
              
                break;
            case 'adminDashboard':
                PHEELFRESH.admin.dashboard();
               
                break;
            default:
                //do nothing
        }
    })

})();







//other dependencies
require('slick-carousel/slick/slick.min');
require('chart.js/dist/Chart.bundle');

//custom js files
require('../../assets/js/pheelfresh');
require('../../assets/js/admin/create');
require('../../assets/js/admin/dashboard');
require('../../assets/js/admin/delete');

require('../../assets/js/admin/events');
require('../../assets/js/admin/update');
require('../../assets/js/pages/cart');
require('../../assets/js/pages/home_products');
// require('../../assets/js/pages/nav');
require('../../assets/js/pages/search');

require('../../assets/js/pages/lib');
require('../../assets/js/pages/moreProduct');
require('../../assets/js/pages/product_details');
require('../../assets/js/pages/slider');
// require('../../assets/js/init');
require('../../assets/js/helper');