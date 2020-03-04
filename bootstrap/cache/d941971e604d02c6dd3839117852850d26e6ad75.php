<?php $__env->startSection('title','shoes'); ?>
<?php $__env->startSection('data-page-id','product'); ?>

<?php $__env->startSection('content'); ?>

<div class="product" id="moreProducts" data-token="<?php echo e($token); ?>" data-id="<?php echo e($moreProduct->sub_category_id); ?>">
     <nav aria-label="You are here:" role="navigation">
        <ul class="breadcrumbs">
          <li><a href="/" style="color:black">Home</a></li>
          <li style="color:black"><?php echo e($moreProduct->subcategory->name); ?></li>
        </ul>
     </nav>
      <div class="similar-products" >
                <h2><?php echo e($moreProduct->subcategory->name); ?></h2>
            <div class="option-group">
                <div class="select">
                    <select id="brand-select">
                    <option value="default">Select a brand</option>
                    <option value="all">All Brands</option>
                    <option value="nike">Nike</option>
                    <option value="jordan">Jordan</option>
                    </select>
                </div>
                <div class="select">
                    <select id="filter-select">
                    <option value="noSelect">No Price Range Selected</option>
                    <option value="lowHigh">Price:low to high</option>
                    <option value="highLow">Price: high to low</option>
                    <option value="clearFilter">Clear filter</option>
                    </select>
                </div>
                
            </div>
            <div class="no-products" style="display:none"></div>
            
            <div v-bind:class="{similarGrid:similarGrid}">
                
                <div v-cloak v-for="similar in allMen">
                    
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
            <div v-bind:class="{similarGrid:similarGrid}">
                
                <div v-cloak v-for="similar in allWomen">
                    
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

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/more-products.blade.php ENDPATH**/ ?>