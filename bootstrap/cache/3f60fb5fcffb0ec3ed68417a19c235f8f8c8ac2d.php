<?php $__env->startSection('title', 'E-commerce'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="english bold">Product Detail</h1>
    <div class="container-fluid bg-light" >
        <div class="d-flex justify-content-around">
            <div class="col-md-5">
                <img src="<?php echo e($product->image); ?>" alt="food" class="img-fluid">
            </div>
            <div class="col-md-6 scrollable-col">
                <h3 class="mt-3 english bold"><?php echo e($product->name); ?></h3>
                <p><?php echo e($product->description); ?></p>
                <button class="btn btn-secondary">$ <?php echo e($product->price); ?></button>
                <button class="btn ">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>