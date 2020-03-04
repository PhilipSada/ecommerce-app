<?php $__env->startSection('title','Order Confirmation'); ?>
<?php $__env->startSection('data-page-id','confirmation'); ?>

<?php $__env->startSection('content'); ?>

<div class="confirmation">
  
   
    <section class="text-center">

        <h4 style="margin-top:3rem;">Thank you, we have received your payment and an order confirmation has been sent to your email</h4>

        <h4 style="margin-top:3rem"> Still want to shop?</h4>
        <a href="/" style="color:black" >Continue Shopping</a>
        <div class="order" style="display:none"></div>
  
    </section>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/confirmation.blade.php ENDPATH**/ ?>