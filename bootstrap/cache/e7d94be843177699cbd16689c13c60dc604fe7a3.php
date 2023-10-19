<?php $__env->startSection('title','Admin Pannel'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-photo-admin">
        <?php echo $__env->make('layout.admin_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>