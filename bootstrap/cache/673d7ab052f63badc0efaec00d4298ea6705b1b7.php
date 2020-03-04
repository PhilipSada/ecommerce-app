<?php $__env->startSection('title','Homepage'); ?>
<?php $__env->startSection('data-page-id','home'); ?>

<?php $__env->startSection('content'); ?>

<div class="home">
  
    <section class='hero-container'>
        <div class="hero-slider-info">
            <div><img class='slider-image' src="/images/frontcover17.png" alt="Pheelfresh store"></div>
            
        </div>
        
    </section>
   
    <section id="root">
      
      
      <div class="featured-products" data-token="<?php echo e($token); ?>">
          <h2>Featured Products</h2>
          
          <div v-bind:class="{featured:featuredGrid}">
            <div v-cloak v-for="feature in featured">
                <div v-bind:class="{productContainer:productContainer}">
                  <div class='product-image-container'>
                    <a :href="'/product/' + feature.id">
                      <img :src="'/'+ feature.image_path" alt="" v-bind:class="{productImg:productImg}"> 
                  </a>
                  </div>
                  <div class='product-grid-a'>
                    <h3> {{ stringLimit(feature.name, 18) }}</h3>
                    <h3>	${{feature.price}}</h3>
                    
                  </div>
                </div>
            </div> 
          </div> 
         <div class="product-picks">
            <h2>Product Picks</h2>
            
            <div v-bind:class="{featured:featuredGrid}">
              <div v-cloak v-for="product in products">
                <div v-bind:class="{productContainer:productContainer}">
                  <div class='product-image-container'>
                    <a :href="'/product/' + product.id">
                      <img :src="'/'+ product.image_path" alt="" v-bind:class="{productImg:productImg}"> 
                  </a>
                  </div>
                  <div v-bind:class="{productText:productText}">
                    <h3> {{ stringLimit(product.name, 18) }}</h3>
                    <h3>${{product.price}}</h3>
                    
                  </div>
                </div> 
              </div> 
          </div> 
        </div>

        <div class="text-center" style="margin-top:4rem;">
          <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top:60%; bottom:20%; color:black;"></i>
        </div>
   </div>
    </section>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/home.blade.php ENDPATH**/ ?>