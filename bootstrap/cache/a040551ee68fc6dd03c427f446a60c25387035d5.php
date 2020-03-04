<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('data-page-id', 'adminDashboard'); ?>

<?php $__env->startSection('content'); ?>
 
 <div class='dashboard'>
    
    <div class='grid-x' data-equalizer data-equalizer-on="medium">
        
     <div class="cell small-12 medium-3 summary" data-equalizer-watch>
        <div class="card">
            <div class="card-section">
                <div class="grid-x">
                    <div class="cell small-3">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="cell small-9">
                        <p>Total Orders</p>
                        <h4><?php echo e($orders); ?></h4>
                    </div>
                </div>
            </div>
            <div class="card-divider">
                <div class="grid-x">
                    <div class="cell">
                        <a href="/admin/users/orders">Order Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
     <div class="cell small-12 medium-3 summary" data-equalizer-watch>
        <div class="card">
            <div class="card-section">
                <div class="grid-x">
                    <div class="cell small-3">
                        <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
                    </div>
                    <div class="cell small-9">
                        <p>stock</p>
                        <h4><?php echo e($products); ?></h4>
                    </div>
                </div>
            </div>
            <div class="card-divider">
                <div class="grid-x">
                    <div class="cell">
                        <a href="/admin/products">View Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
     <div class="cell small-12 medium-3 summary" data-equalizer-watch>
        <div class="card">
            <div class="card-section">
                <div class="grid-x">
                    <div class="cell small-3">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <div class="cell small-9">
                        <p>Revenue</p>
                        <h4>$<?php echo e(number_format($payments),2); ?></h4>
                    </div>
                </div>
            </div>
            <div class="card-divider">
                <div class="grid-x">
                    <div class="cell">
                        <a href="/admin/users/payments">Payment Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
     <div class="cell small-12 medium-3 summary" data-equalizer-watch>
        <div class="card">
            <div class="card-section">
                <div class="grid-x">
                    <div class="cell small-3">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="cell small-9">
                        <p>Signup</p>
                        <h4><?php echo e($users); ?></h4>
                    </div>
                </div>
            </div>
            <div class="card-divider">
                <div class="grid-x">
                    <div class="cell">
                        <a href="">Registered Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    </div>
    <div class='grid-x graph'>
        <div class="cell small-12 medium-6 monthly-sales">
            <div class="card">
                <div class="card-section">
                    <h4>Monthly Orders</h4>
                    <canvas id="orders"></canvas>
                </div>
            </div>

        </div>
        <div class="cell small-12 medium-6 monthly-revenue">
            <div class="card">
                <div class="card-section">
                    <h4>Monthly Revenue</h4>
                    <canvas id="revenue"></canvas>
                </div>
            </div>

        </div>

    </div>
 </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>