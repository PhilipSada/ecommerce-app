<?php $__env->startSection('title', 'Manage Inventory'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
 
 <div class='products'>
    
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Order History</h2>
        
    </div>
    <div class='text-border'></div>
    
    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            <?php if(count($orders)): ?>

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User_Id</th>
                                <th>Product_Id</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Order_No</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                
                                <td><?php echo e($order['id']); ?></td>
                                <td><?php echo e($order['user_id']); ?></td> 
                                <td><?php echo e($order['product_id']); ?></td> 
                                <td><?php echo e($order['unit_price']); ?></td>
                                <td><?php echo e($order['quantity']); ?></td>
                                <td><?php echo e($order['total']); ?></td>
                                <td><?php echo e($order['order_no']); ?></td>
                                <td><?php echo e($order['status']); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            <?php else: ?>
             <h3>You do not have any more orders</h3>
            <?php endif; ?>
        </div>
    </div>
 </div>
 <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/products/orders.blade.php ENDPATH**/ ?>