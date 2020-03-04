<?php $__env->startSection('title', 'Product Categories'); ?>

<?php $__env->startSection('data-page-id', 'adminCategories'); ?>

<?php $__env->startSection('content'); ?>
 
 <div class='category'>
    
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Product Categories</h2>
        
    </div>
    <div class='text-border'></div>
    
    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class = 'grid-x'>
        <div class='cell small-12 medium-6'>
            <form method='POST'>
                <div class="grid-container">
                <div class="grid-x">
                    <div class="medium-12 cell">
                        <div class= 'input-group'>
                            <input type='text' class='input-group-field' placeholder="Search by name">
                            <div class='input-group-button'>
                                <input type='submit' class='button' value='search'>
                            </div>
                    </div>
                    </div>  
                </div>
                </div>
            </form>
        </div>
        <div class='cell small-12 medium-6'>
            <form action='/admin/product/categories' method='POST'>
                <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <div class= 'input-group'>
                            <input type='text' class='input-group-field' placeholder="Category name" name='name'>
                            <input type='hidden' name='token' value = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>">
                            <div class='input-group-button'>
                                <input type='submit' class='button' value='Create'>
                            </div>
                    </div>
                    </div>  
                </div>
                </div>
            </form>
        </div>
    </div>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            <?php if(count($categories)): ?>

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date created</th>
                                <th width='70'>Action</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                
                                <td><?php echo e($category['name']); ?></td>
                                <td><?php echo e($category['slug']); ?></td>
                                <td><?php echo e($category['added']); ?></td> 
                                <td width='70' class='text-right'>

                                    <span data-tooltip tabindex="2" title="Add Subcategory" class="left">
                                        <a data-open="add-subcategory-<?php echo e($category['id']); ?>"><i class='fa fa-plus'></i></a>
                                    </span>
                                    <span data-tooltip tabindex="2" title="Edit Category" class="left">
                                        <a data-open="item-<?php echo e($category['id']); ?>"><i class='fa fa-edit'></i></a>
                                    </span>
                                    
                                    <span style="display:inline-block" data-tooltip tabindex="2" title="Delete Category" class="left">
                                        <form method="POST" action="/admin/product/categories/<?php echo e($category['id']); ?>/delete" class="delete-item">
                                            <input type='hidden' name='token' value = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>">
                                            <button type="submit"><i class='fa fa-times delete'></i></button>
                                        </form>
                                    </span>
                                    
                                    
                                    <div class="reveal" id= "item-<?php echo e($category['id']); ?>" data-reveal data-close-on-click="false" 
                                    data-close-on-esc="false">
                                        <div class='notification callout primary'></div>
                                        <h2>Edit Category</h2>
                                        <form>
                                            <div class="grid-container">
                                            <div class="grid-x grid-padding-x">
                                                <div class="medium-12 cell">
                                                    <div class= 'input-group'>
                                                    <input type='text' id="item-name-<?php echo e($category['id']); ?>"  value="<?php echo e($category['name']); ?>">
                                                        <div>
                                                            <input type='submit' class='button update-category' id= "<?php echo e($category['id']); ?>"
                                                             data-token = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>" value='update'>
                                                        </div>
                                                   </div>
                                                </div>  
                                            </div>
                                            </div>
                                        </form>
                                        <a href='/admin/product/categories' class="close-button" aria-label="Close modal" type="button">
                                          <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    
                                    <div class="reveal" id= "add-subcategory-<?php echo e($category['id']); ?>" data-reveal data-close-on-click="false" 
                                    data-close-on-esc="false">
                                        <div class='notification callout primary'></div>
                                        <h2>Add Subcategory</h2>
                                        <form>
                                            <div class="grid-container">
                                            <div class="grid-x grid-padding-x">
                                                <div class="medium-12 cell">
                                                    <div class= 'input-group'>
                                                    <input type='text' id="subcategory-name-<?php echo e($category['id']); ?>">
                                                    
                                                        <div>
                                                            <input type='submit' class='button add-subcategory' id= "<?php echo e($category['id']); ?>"
                                                            name='token' data-token = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>" value='Create'>
                                                        </div>
                                                   </div>
                                                </div>  
                                            </div>
                                            </div>
                                        </form>
                                        <a href='/admin/product/categories' class="close-button" aria-label="Close modal" type="button">
                                          <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            <?php else: ?>
             <h3>You have not created any category</h3>
            <?php endif; ?>
        </div>
    </div>
 </div>
 <div class='subcategory'>
    
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Subcategories</h2>
        <div class='text-border'></div>
    </div>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            
            <?php if(count($subcategories)): ?>
                <table class='hover unstriped' data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Date created</th>
                            <th width='50'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e($subcategory['name']); ?></td>
                                <td><?php echo e($subcategory['slug']); ?></td>
                                <td><?php echo e($subcategory['added']); ?></td> 
                                <td width='50' class='text-right'>
                                    <span data-tooltip tabindex="2" title="Edit Subcategory" class="left">
                                        <a data-open="item-subcategory-<?php echo e($subcategory['id']); ?>"><i class='fa fa-edit'></i></a>
                                    </span>
                                    
                                    <span style="display:inline-block" data-tooltip tabindex="2" title="Delete Subcategory" class="left">
                                        <form method="POST" action="/admin/product/subcategory/<?php echo e($subcategory['id']); ?>/delete" class="delete-item">
                                            <input type='hidden' name='token' value = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>">
                                            <button type="submit"><i class='fa fa-times delete'></i></button>
                                        </form>
                                    </span>

                                    
                                    <div class="reveal" id= "item-subcategory-<?php echo e($subcategory['id']); ?>" data-reveal data-close-on-click="false" 
                                        data-close-on-esc="false">
                                        <div class='notification callout primary'></div>
                                        <h2>Edit Subcategory</h2>
                                        <form>
                                            <div class="grid-container">
                                                <div class="grid-x grid-padding-x ">
                                                    <div class="medium-12 cell">
                                                        <div class= 'input-group'>
                                                        <input type='text' id="item-subcategory-name-<?php echo e($subcategory['id']); ?>" value="<?php echo e($subcategory['name']); ?>">
                                                       </div>
                                                    </div>
                                                   <div class='medium-12 cell'> 
                                                      <h5>Change Category </h5>
                                                      <div class='input group'>
                                                      
                                                      <select id="item-category-<?php echo e($subcategory['category_id']); ?>">
                                                            <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                              <?php if($category->id == $subcategory['category_id']): ?>
                                                               <option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                               
                                                              <?php endif; ?>
                                                              <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </select>
                                                
                                                    </div>
                                                  </div>
                                                  <div class='medium-12 cell'>
                                                    <div class='input group'>
                                                        <div>
                                                            <input type='submit' class='button update-subcategory' id= "<?php echo e($subcategory['id']); ?>"
                                                            data-category-id="<?php echo e($subcategory['category_id']); ?>" data-token = "<?php echo e(\App\Classes\CSRFTOKEN::_token()); ?>" value='Update'>
                                                        </div>
                                                    </div>
                                                   </div>
                                                </div>  
                                            </div>
                                            
                                          </form>
                                        
                                           <a href='/admin/product/categories' class="close-button" aria-label="Close modal" type="button">
                                          <span aria-hidden="true">&times;</span>
                                           </a>
                                    </div>
                    
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <p><?php echo $subcategories_links; ?></p>
            <?php else: ?>
             <h3>You have not created any subcategory</h3>
            <?php endif; ?>
        </div>
    </div>
 </div>
<?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/products/categories.blade.php ENDPATH**/ ?>