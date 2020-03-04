<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pheelfresh - <?php echo $__env->yieldContent('title'); ?></title>

    <link rel='stylesheet' href='/css/all.css'>
    <script src="https://kit.fontawesome.com/e9233f01a1.js" crossorigin="anonymous"></script>
    
   
</head>
<body data-page-id = <?php echo $__env->yieldContent('data-page-id'); ?>> <!--this is done to be able to run javascript on each page/where you want it -->
   <div>
    
    <?php echo $__env->yieldContent('body'); ?>
   
  </div>
    
   
   
   <script src='/js/all.js'></script> 
   <?php echo $__env->yieldContent('stripe-checkout'); ?> 
   
</body>
</html><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/layout/base.blade.php ENDPATH**/ ?>