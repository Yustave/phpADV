<?php $__env->startSection('title','KDA_E-commerce'); ?>


<?php $__env->startSection('content'); ?>
<div class="bg-photo-home">
    <h1 class="text-center text-white pt-5">K D A</h1>
    <p class="text-white tect-center container">
        If you decide to go with the separate scripts solution, 
        Popper must come first (if you’re using tooltips or popovers),
        and then our JavaScript plugins.Curious which components explicitly
        require our JavaScript and Popper? Click the show components link below.
        If you’re at all unsure about the general page structure, keep reading for 
        an example page template.
    </p>
    <!-- post show start -->
        <div class ="container offset-md-1 row justify-content-between">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card col-md-5 my-5" style="width: 18rem;">
                    <img src="<?php echo e($product->image); ?>" class="card-img-top pt-3" alt="">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>

                        <?php $shortDescription = substr($product->description, 0, 40);?>

                        <p class="card-text pt-3">Price <?php echo e($shortDescription); ?>....</p>

                        <span class="d-flex justify-content-between">
                            <p class="card-text">Price $<?php echo e($product->price); ?></p>

                            <p>
                                <a href="<?php echo URL_ROOT."admin/product/".$product->id."/detail"; ?>"class="text-decoration-none text-danger" >
                                   detail
                                </a>
                                <a href="<?php echo URL_ROOT. "admin/product/".$product->id."/delete"; ?>" class="text-decoration-none text-danger">
                                   Add To Cart
                                </a>
                            </p>
                            
                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo $products_pages; ?>

    <!-- post show end -->
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>