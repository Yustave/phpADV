<?php $__env->startSection('title','Admin Pannel'); ?>

<?php $__env->startSection('content'); ?>
<div class="product-ad-home">
    <?php echo $__env->make('layout.admin_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="admin-list col-md-7">
                    <!-- Category List Start -->
                        <div>
                            <ul class="list-group my-5">
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <a href="/admin/category/all"><?php echo e($cat->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php echo $pages; ?>

                        </div>
                    <!-- Category List End -->

                    <!-- SubCategory List Start -->
                        <div>
                            <ul class="list-group mt-5">
                                <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <a href="<?php echo URL_ROOT . 'admin/category/all'; ?>" style="text-decoration: none;color:aqua;"><?php echo e($category->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                                <?php echo $sub_pages; ?>

                        </div>
                    <!-- SubCategory List End -->
                </div>
            </div>

            <div class="col-md-7">
                <!-- post show start -->
                    <div class ="d-flex justify-content-between">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card col-md-5 my-5" style="width: 18rem;">
                                <img src="<?php echo e($product->image); ?>" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                    <p class="card-text"><?php echo e($product->description); ?></p>
                                    <span class="float-end">
                                        <a href="<?php echo URL_ROOT."admin/product/".$product->id."/edit"; ?>"; >
                                            <i class="fa fa-trash text-warning">edit</i>
                                        </a>
                                        <a href="#"; >
                                            <i class="fa fa-trash text-danger">delete</i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php echo $products_pages; ?>

                <!-- post show end -->
            </div>
        </div>
    </div>
    <a href="<?php echo URL_ROOT."admin/product/create"?>"> CREATE </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>