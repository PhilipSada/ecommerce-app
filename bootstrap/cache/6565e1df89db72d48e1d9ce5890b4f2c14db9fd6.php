<?php $__env->startSection('body'); ?>



 <?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class='site_wrapper'>
    <?php echo $__env->yieldContent('content'); ?>

    <div class="notify text-center"></div>
    
</div>
<?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/layout/app.blade.php ENDPATH**/ ?>