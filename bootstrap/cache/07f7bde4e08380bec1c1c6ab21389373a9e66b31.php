<?php $__env->startSection('title', 'Log into Your Account'); ?> 
<?php $__env->startSection('data-page-id','auth'); ?>

<?php $__env->startSection('content'); ?>


  
<div class="auth" id="auth">
      
    <section class="login_form">
        <div class="grid-x align-center" style='margin:0 0.9rem'>
            <div class="cell small-12 medium-7">
                <h2 class="text-center">Login</h2>
                <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form action="/login" method="POST">
                    
                    <input type="email" name="email" placeholder="Your Email Address" value="<?php echo e(\App\Classes\Request::old('post', 'email')); ?>">
                    <input type="password" name="password" placeholder="Your Password">
                    
                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                    <button class="button float-right" style=" background-color:rgba(0, 0, 0, 0.89);">Login</button>
                </form>
                <p>Not registered? <a href="/register" style="color:rgba(0, 0, 0, 0.89); border-bottom:1px solid rgba(0, 0, 0, 0.89);">Register here</a></p>
            </div>
        </div>

    </section>
   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/login.blade.php ENDPATH**/ ?>