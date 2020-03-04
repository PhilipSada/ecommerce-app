<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
 
  <div class='add-product'>
      
      <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Edit <?php echo e($product->name); ?></h2>
        
      </div>
       <div class='text-border'></div>
       
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
        <form method="POST" action="/admin/product/edit" enctype="multipart/form-data">
            <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="medium-6 cell">
                    
                  <label>Product Name:
                    <input type='text'  name="name"
                    value="<?php echo e($product->name); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Price:
                    <input type='text' name ='price'
                    value = "<?php echo e($product->price); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Brand:
                    <input type='text' name ='brand'
                    value = "<?php echo e($product->brand); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Gender:
                    <input type='text' name ='gender'
                    value = "<?php echo e($product->gender); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Featured (0 = No or 1= Yes):
                    <input type='text' name ='featured'
                    value = "<?php echo e($product->featured); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Category:
                    <select name="category" id="product-category">
                        
                        <option value="<?php echo e($product->category->id); ?> ">
                            <?php echo e($product->category->name); ?>

                        </option>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </label>
                </div>

                <div class="medium-6 cell">
                  <label>Product Subcategory:
                    <select name="subcategory" id="product-subcategory">
                      
                      <option value="<?php echo e($product->subCategory->id); ?> ">
                          <?php echo e($product->subCategory->name); ?>

                      </option>
                  </select>
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Quantity:
                    <select name="quantity">
                        
                        <option value="<?php echo e($product->quantity); ?> ">
                            <?php echo e($product->quantity); ?>

                        </option>
                        <?php for($i=1; $i<=50; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                  </label>
                </div>

                <div class="medium-6 cell">
                  <br/>
                 <div class='input-group'>
                   <span class='input-group-label'>Product Image:</span>
                   <input type='file' name='productImage' class='input-group-field'>
                 </div>
                </div>
                <div class="small-12 cell">
                 
                   <label>Description:
                   <textarea name='description' placeholder='Description'><?php echo e($product->description); ?></textarea>
                  </label>
                  <input type='hidden' name='token' value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                  <input type='hidden' name='product_id' value="<?php echo e($product->id); ?>">
                  
                  <input class='button warning float-right' type='submit' value='Update Product'>
                 
                </div>
              </div>
            </div>
        </form>
       
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>