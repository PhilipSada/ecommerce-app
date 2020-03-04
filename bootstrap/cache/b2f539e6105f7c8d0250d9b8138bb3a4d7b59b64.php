<?php $__env->startSection('title', 'Manage Inventory'); ?>

<?php $__env->startSection('data-page-id', 'adminProduct'); ?>

<?php $__env->startSection('content'); ?>
 
 <div class='products'>
    
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Payment History</h2>
        
    </div>
    <div class='text-border'></div>
    
    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            <?php if(count($payments)): ?>

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User_Id</th>
                                <th>Order_no</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                
                                <td><?php echo e($payment['id']); ?></td>
                                <td><?php echo e($payment['user_id']); ?></td> 
                                <td><?php echo e($payment['order_no']); ?></td> 
                                <td><?php echo e($payment['amount']); ?></td>
                                <td><?php echo e($payment['status']); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            <?php else: ?>
             <h3>You do not have any more payments</h3>
            <?php endif; ?>
        </div>
    </div>
 </div>
 <?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/products/payments.blade.php ENDPATH**/ ?>