<?php $__env->startSection('title'); ?><?php echo e($product->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('data-page-id','product'); ?>

<?php $__env->startSection('content'); ?>

<div class="product">
  
    <div class="product-group" id="product" data-token="<?php echo e($token); ?>" data-id="<?php echo e($product->id); ?>">
        <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li><a href="/" style="color:black">Home</a></li>
              <li><a :href="'/product/category/' + subCategory.id" style="color:black">{{subCategory.name}}</a></li>
              <li style="color:black">{{product.name}}</li>
            </ul>
        </nav>
        <div class="product-grid">
          <div class='product-container'>
              <div class="product-image-container">
              <a href=""><img :src="'/'+ product.image_path" alt="" class="product-image"> </a>
              </div>
              
          </div>
          <div class='product-container'>
              
              <div class='product-grid-a'>
                <h2>{{product.name}}</h2>
                <p>{{product.description}}</p>
                <h2>${{product.price}}</h2>
              </div>
              <button v-if="product.quantity > 0" @click.prevent = "addItemToCart(product.id)">Add to cart</button>
              <button v-else>Out of stock</button>
          </div>
      </div>
      <div class="similar-products" >
                <h2>Similar Products</h2>
            <div v-bind:class="{similarGrid:similarGrid}">
                <div v-for="similar in similarProducts">
                    <div v-bind:class="{similarContainer:similarContainer}">
                        <div class='similar-image-container'>
                            <a :href="'/product/' + similar.id">
                            <img :src="'/'+ similar.image_path" alt="" v-bind:class="{similarImg:similarImg}"> 
                            </a>
                        </div>
                        <div v-bind:class="{similarText:similarText}">
                            <h3> {{ stringLimit(similar.name, 15) }}</h3>
                            <h3>${{similar.price}}</h3>
                            <button v-if="similar.quantity > 0" @click.prevent = "addItemToCart(similar.id)" v-bind:class="{addToCart:addToCart}"></button>
                            <button v-else v-bind:class="{addToCart:addToCart}">Out of stock</button>
                        </div>
                    </div> 
                </div> 
            </div> 
      </div>
      <div class="text-center" style="margin-top:4rem;">
        <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top:60%; bottom:20%; color:black;"></i>
      </div>    
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/product.blade.php ENDPATH**/ ?>