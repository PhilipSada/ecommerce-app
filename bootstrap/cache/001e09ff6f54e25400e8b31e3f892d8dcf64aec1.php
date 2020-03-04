<?php $__env->startSection('title', 'Create Product'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
 
  <div class='add-product'>
      
      <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Add Inventory Item</h2>
        
      </div>
       <div class='text-border'></div>
       
      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
        <form method="POST" action="/admin/product/create" enctype="multipart/form-data">
            <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="medium-6 cell">
                    
                  <label>Product Name:
                    <input type='text' class='input-group-field' placeholder="Product name" name="name"
                    value="<?php echo e(\App\Classes\Request::old('post','name')); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Price:
                    <input type='text' class='input-group-field' placeholder="Product Price" name ='price'
                    value = "<?php echo e(\App\Classes\Request::old('post','price')); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Brand:
                    <input type='text' class='input-group-field' placeholder="Product Brand" name ='brand'
                    value = "<?php echo e(\App\Classes\Request::old('post','brand')); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Gender:
                    <input type='text' class='input-group-field' placeholder="Gender" name ='gender'
                    value = "<?php echo e(\App\Classes\Request::old('post','gender')); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Featured (0 = No or 1= Yes):
                    <input type='text' class='input-group-field' placeholder="Featured" name ='featured'
                    value = "<?php echo e(\App\Classes\Request::old('post','featured')); ?>">
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Category:
                    <select name="category" id="product-category">
                        
                        <option value="<?php echo e(\App\Classes\Request::old('post','name') ? : ''); ?> ">
                            <?php echo e(\App\Classes\Request::old('post','name') ? : 'Select Category'); ?>

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
                      
                      <option value="<?php echo e(\App\Classes\Request::old('post','name') ? : ''); ?> ">
                          <?php echo e(\App\Classes\Request::old('post','subcategory') ? : 'Select Subcategory'); ?>

                      </option>
                  </select>
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Quantity:
                    <select name="quantity">
                        
                        <option value="<?php echo e(\App\Classes\Request::old('post','name') ? : ''); ?> ">
                            <?php echo e(\App\Classes\Request::old('post','quantity') ? : 'Select Product Quantity'); ?>

                        </option>
                        <?php for($i=1; $i<=50; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Size:
                    <select name="size">
                        
                        <option value="<?php echo e(\App\Classes\Request::old('post','name') ? : ''); ?> ">
                            <?php echo e(\App\Classes\Request::old('post','size') ? : 'Select Product Size'); ?>

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
                   <textarea name='description' placeholder='Description'><?php echo e(\App\Classes\Request::old('post','description')); ?></textarea>
                  </label>
                  <input type='hidden' name='token' value="<?php echo e(\App\classes\CSRFToken::_token()); ?>">
                  <button class='button alert' type='reset'>Reset</button>
                  <input class='button success float-right' type='submit' value='Save Product'>
                 
                </div>
              </div>
            </div>
        </form>
  </div>
  <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/products/create.blade.php ENDPATH**/ ?>