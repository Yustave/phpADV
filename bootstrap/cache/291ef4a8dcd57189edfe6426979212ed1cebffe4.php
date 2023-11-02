<?php $__env->startSection('title','Admin Pannel'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <a href="<?php echo URL_ROOT.'admin/product/create'?>">CREATE POST</a>
</div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>