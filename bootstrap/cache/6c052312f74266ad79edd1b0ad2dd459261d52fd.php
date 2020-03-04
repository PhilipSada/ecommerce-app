<?php $__env->startSection('title','Searchpage'); ?>
<?php $__env->startSection('data-page-id','search'); ?>

<?php $__env->startSection('content'); ?>

<div>
  
    
    <section id="search">

        
      
     
     <div class="similar-products" >
      <?php if(isset($products)): ?>
        <p style="text-transform:none !important">Results based on your search ("<?php echo e($_GET['search']); ?>")</p>
        
        <div class="similarGrid">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="similarContainer">
                    <div class='similar-image-container'>
                        <a href="/product/<?php echo e($product->id); ?>">
                        <img src="/<?php echo e($product->image_path); ?>" alt="" class="similarImg"> 
                        </a>
                    </div>
                    <div class="similarText">
                        <h3> <?php echo e($product->name); ?></h3>
                        <h3>$<?php echo e($product->price); ?></h3>
                        
                    </div>
                </div> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       <?php else: ?>
            <p style="text-transform:none !important">No product based on your search ("<?php echo e($_GET['search']); ?>") was found</p>
            <div><h2>Products you may like</h2></div>
            <div class="similarGrid">
                  <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="similarContainer">
                        <div class='similar-image-container'>
                            <a href="/product/<?php echo e($allProduct->id); ?>">
                            <img src="/<?php echo e($allProduct->image_path); ?>" alt="" class="similarImg"> 
                            </a>
                        </div>
                        <div class="similarText">
                            <h3> <?php echo e($allProduct->name); ?></h3>
                            <h3>$<?php echo e($allProduct->price); ?></h3>
                            
                        </div>
                    </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
      </div>
     <?php endif; ?>
             
 </section>
   
</div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/search.blade.php ENDPATH**/ ?>