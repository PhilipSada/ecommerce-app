<?php $__env->startSection('title','shoes'); ?>
<?php $__env->startSection('data-page-id','product'); ?>

<?php $__env->startSection('content'); ?>

<div class="product" id="shoes" data-token="<?php echo e($token); ?>" data-id="<?php echo e($shoeProduct->sub_category_id); ?>">
  
      <div class="similar-products" >
                <h2><?php echo e($shoeProduct->subcategory->name); ?></h2>
            <div v-bind:class="{similarGrid:similarGrid}">
                <div v-for="similar in allMenShoes">
                    <div v-bind:class="{similarContainer:similarContainer}">
                        <div class='similar-image-container'>
                            <a :href="'/product/' + similar.id">
                            <img :src="'/'+ similar.image_path" alt="" v-bind:class="{similarImg:similarImg}"> 
                            </a>
                        </div>
                        <div v-bind:class="{similarText:similarText}">
                            <h3> {{similar.name}}</h3>
                            <h3>${{similar.price}}</h3>
                            
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/shoes.blade.php ENDPATH**/ ?>