<header>
    <div class="nav-info">
        <p>Free shipping on orders over $35</p>
        <p>Next day delivery for orders before 8pm </p>
        <p>5% discount for new customer </p>
    </div>
    <nav class="nav-second">
  
        <label for="menu-toggle">
            <i class="fa fa-bars"></i>
            <i class="fa fa-times"></i>
        </label>
        <input type="checkbox" id="menu-toggle">
        
        <div class='menu-second-group'>
            <ul>
                <li class='men-menu-second'><a href="#" class='men-second'>Men</a>
                   <ul>
                       <li><a href="" class="sub-heading">Shoes</a></li>
                       <li><a href="" class="sub-heading">Clothing</a></li>
                       <li><a href="" class="sub-heading">Men Accessories</a></li>
                   </ul>
                </li>
                <li class='women-menu-second'><a href="#" class='women-second'>Women</a>
                    <ul>
                        <li><a href="" class="sub-heading">Shoes</a></li>
                        <li><a href="" class="sub-heading">Clothing</a></li>
                        <li><a href="" class="sub-heading">Accessories</a></li>
                    </ul>
                </li>
            </ul>     
        </div>
        <div class='logo'><a href="/">Pheelfresh</a></div>

        <div class='menu-right-second-link'>
          <ul class='button-icon'>
              <form action="/search-result" method="GET" class="search-form" style="display:none">
                <li><input type="search" value="<?php echo e(\App\Classes\Request::old('get', 'search')); ?>" name="search" placeholder="Search" class='search-edit'></li> 
                <li><button class="search-button"><i class="fa fa-search"></i></button><li> 
              </form>
          </ul>
          <button ><i class="fa fa-search" style="color:white"></i></button> 
          <ul>
            <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>
            
          </ul>
          <ul class="menu-user-second"> 
              <li><a href=""><i class="fa fa-user"></i></a>
                    <ul>  
                        <?php if(isAuthenticated()): ?>    
                        <li class='user-second-menu-option'><?php echo e(user()->username); ?></li>
                        <li class='user-second-menu-option'><a href="/logout">Log Out</a></li>

                        <?php else: ?>
                        <li class='user-second-menu-option'><a href="/login">Log In</a></li>
                        <li class='user-second-menu-option'><a href="/register">Register</a></li>
                        <?php endif; ?>
                    </ul>
              </li>
          </ul>   
        </div>
      
    </nav>
    
    
</header><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/includes/nav-second.blade.php ENDPATH**/ ?>