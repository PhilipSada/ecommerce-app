<?php $__env->startSection('title', 'Manage Inventory'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
 
 <div class='products'>
    
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Manage Inventory Items</h2>
        
    </div>
    <div class='text-border'></div>
    
    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class = 'grid-x'>
        <div class='cell small-11' >
          <a href="/admin/product/create" class='button float-right'>
            <i class="fa fa-plus"></i>Add new product
          </a>
        </div>
      
    </div>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            <?php if(count($products)): ?>

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Brand</th>
                                <th>Size</th>
                                <th>Gender</th>
                                <th>Date created</th>
                                <th width='70'>Action</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                
                                <td><img src="/<?php echo e($product['image_path']); ?>" alt="<?php echo e($product['name']); ?>" height="40" width="40"></td>
                                <td><?php echo e($product['name']); ?></td>
                                <td><?php echo e($product['price']); ?></td> 
                                <td><?php echo e($product['quantity']); ?></td> 
                                <td><?php echo e($product['category_name']); ?></td>
                                <td><?php echo e($product['sub_category_name']); ?></td>
                                <td><?php echo e($product['brand']); ?></td>
                                <td><?php echo e($product['size']); ?></td>
                                <td><?php echo e($product['gender']); ?></td>
                                <td><?php echo e($product['added']); ?></td> 
                                <td width='70' class='text-right'>

                                    <span data-tooltip tabindex="2" title="Edit product" class="left">
                                        <a href="/admin/product/<?php echo e($product['id']); ?>/edit"><i class='fa fa-edit'></i></a>
                                    </span>
                                    <span style="display:inline-block" data-tooltip tabindex="2" title="Delete Product" class="left">
                                        <form method="POST" action="/admin/product/<?php echo e($product['id']); ?>/delete" class="delete-item">
                                            <input type='hidden' name='token' value = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>">
                                            <button type="submit"><i class='fa fa-times delete'></i></button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            <?php else: ?>
             <h3>You do not have any product</h3>
            <?php endif; ?>
        </div>
    </div>
 </div>
 <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/products/inventory.blade.php ENDPATH**/ ?>