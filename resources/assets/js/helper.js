(function(){

    PHEELFRESH.global.helper= function(){

        $('.fa-user').on('click',function(){
            $('.menu-user-options').toggleClass('active');

        });
        $('.men-menu').on('mouseenter',function(){
            $('.menu-user-options').removeClass('active');
        });
        $('.women-menu').on('mouseenter',function(){
            $('.menu-user-options').removeClass('active');
        });
        $('.nav-info').on('mouseenter',function(){
            $('.menu-user-options').removeClass('active');
        });
        $('.menu-user-options').on('mouseleave', function(){
            $('.menu-user-options').removeClass('active');
        });
      
        $('.navigate').on('mouseleave',function(){
            $('.menu-user-options').removeClass('active');
        });
        // $('.mobile-menu-header').on('mouseleave',function(){
        //     $('.mobile-menu-header').css('display','none');
        //     $('.fa-bars').css('display','block');
        //     $('.fa-times').css('display','none'); 
        // });
        $('.hero').on('mouseenter',function(){
            $('.mobile-menu-header').css('display','none');
            $('.fa-bars').css('display','block');
            $('.fa-times').css('display','none'); 
        });
        // $('.fa-bars').on('mouseleave',function(){
        //     $('.mobile-menu-header').css('display','none');
        //     $('.fa-bars').css('display','block');
        //     $('.fa-times').css('display','none'); 
        // });

         
        $('.fa-bars').on('click',function(){
            $('.mobile-menu-header').css('display','block');
            $('.fa-bars').css('display','none');
            $('.fa-times').css('display','block');    
            // $('.navigate').css('background-color','white');    
        });
        $('.fa-times').on('click',function(){
            $('.mobile-menu-header').css('display','none');
            $('.fa-bars').css('display','block');
            $('.fa-times').css('display','none');    
             
        });

         
        
    }

 

   
   
})();