<header class="navigate-main">
    
    <nav class="main-nav">
    <div class= "navigate">
        <div class="menu-toggle">
            <i class="fa fa-bars"></i>
            <i class="fa fa-times"></i>
        </div>
        {{-- <input type="checkbox" id="menu-toggle" class="hidden"> --}}
        
        <div class='menu-group'>
            <ul>
                <li class='men-menu'><a href="/product/men" class='men'>Men</a>
               
                   <ul class="sub-menu-group">
                       <li>
                           <a href="/product/category/13"><img src="/images/airJordan.png"></a>
                           <a href="/product/category/13" class="sub-heading">Shoes</a>
                       </li>

                       <li>
                           <a href="/product/category/9"><img src="/images/tops.png"></a>
                           <a href="/product/category/9" class="sub-heading">Tops & T-shirts</a>
                       </li>
                   
                       <li>
                           <a href="/product/category/5"><img src="/images/hoodies.png"></a>
                           <a href="/product/category/5" class="sub-heading">Hoodies</a>
                       </li>
                   
                       <li>
                           <a href="/product/category/1"><img src="/images/bags.png"></a>
                           <a href="/product/category/1" class="sub-heading">Bags</a>
                       </li>
                   </ul>
               
                </li>
                <li class='women-menu'><a href="/product/women" class='women'>Women</a>
                    <ul>
                        <li>
                            <a href="/product/category/14"><img src="/images/womenshoe.png"></a>
                            <a href="/product/category/14" class="sub-heading">Shoes</a>
                        </li>
 
                        <li>
                            <a href="/product/category/10"><img src="/images/womentop.png"></a>
                            <a href="/product/category/10" class="sub-heading">Tops & T-shirts</a>
                        </li>
                    
                        <li>
                            <a href="/product/category/6"><img src="/images/womenhoodie.png"></a>
                            <a href="/product/category/6" class="sub-heading">Hoodies</a>
                        </li>
                    
                        <li>
                            <a href="/product/category/2"><img src="/images/womenbag.png"></a>
                            <a href="/product/category/2" class="sub-heading">Bags</a>
                        </li>
                    </ul>
                </li>
            </ul>     
        </div>
        <div class='logo'><a href="/">Pheelfresh</a></div>

        <div class='menu-right-link'>
          <ul class='button-icon'>
              <form action="/search-result" method="GET" class="search-form">
                <li><input type="search" value="{{\App\Classes\Request::old('get', 'search')}}" name="search" placeholder="Search" class='search-edit'></li> 
                <li><button class="search-button"><i class="fa fa-search"></i></button><li> 
              </form>
          </ul>
          <button ><i class="fa fa-search main-search-fa" style="display:none"></i></button> 
          <ul>
            <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>
            
          </ul>
          <div> 
               <div class="menu-user"><i class="fa fa-user main-user-fa"></i></div>
                <div class="menu-user-options">  
                    @if(isAuthenticated())    
                    <h3 class='user-menu-option text-center'>Hello {{user()->username}}</h3>
                    <div class='user-menu-option text-center'><a href="/logout" class="login-option">Log Out</a></div>

                    @else
                    <h3 class='user-menu-option text-center'>Create your account or login if you have already created an account</h3>
                    <div class="account-option">
                        <div class='user-menu-option text-center'><a href="/register" class="register-option">Create an Account</a></div>
                        <div class='user-menu-option text-center'><a href="/login" class="login-option">Log In</a></div>  
                    </div>
                    @endif
                </div>
          </div>   
        </div>
    </div>   
    </nav>
    <div class="nav-info">
        <p>Free shipping on orders over $35</p>
        <p>Next day delivery for orders before 8pm </p>
        <p>60% discount for new customers </p>
    </div>
    <div class="mobile-menu-header">
    <div class='mobile-menu'>
        <div class='search-mobile'>
            <form action="/search-result" method="GET" class="search-form-mobile">
              <input type="search" value="{{\App\Classes\Request::old('get', 'search')}}" name="search" placeholder="Search" class='search-edit-mobile'> 
              <button class="search-button-mobile"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="main-men text-center"><a href="/product/men">Men</a></div>
        <div class="main-women text-center"><a href="/product/women">Women</a></div>
         
        <div class="menu-user-options-mobile">  
            @if(isAuthenticated())    
            <div class='user-menu-mobile text-center' class="login-option"><a href="/logout">Log Out</a></div>

            @else
            <div class='user-menu-mobile text-center'><a href="/login" class="mobile-login-option">My Account</a></div>  
           
            @endif
        </div>
    </div> 
    </div>  
</header>
