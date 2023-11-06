<?php $__env->startSection('title','Admin Pannel'); ?>

<?php $__env->startSection('content'); ?>

<div class="product-ad-create">
    <div class="container">
        <div class="row offset-md-0.5">
            <?php if(\App\Classes\Session::has("error")): ?>
                <?php echo e(\App\Classes\Session::flash("error")); ?>

            <?php endif; ?>
            <div class="col-md-5">
                <?php echo $__env->make("layout.report_message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form class="p-5" action="<?php echo URL_ROOT.'admin/product/'.$product->id.'/edit'?>" method="post" enctype="multipart/form-data">

                    <h3 class="text-white">Edit Product Detail</h3>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Name" class="form-label text-white">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo e($product->name); ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="Price" class="form-label text-white">Price</label>
                            <input type="number" step="any" id="Price" name="price" class="form-control" value="<?php echo e($product->price); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cat_id" class="text-white">Category</label>
                            <select class="form-select" id="cat_id" name="cat_id">
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>" <?php echo $cat->id == $product->cat_id ? 'selected' : '' ;?> ><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="sub_cat_id" class="text-white">Sub Category</label>
                            <select class="form-select" id="sub_cat_id" name="sub_cat_id">
                                <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sub_cat->id); ?>" <?php echo $sub_cat->id == $product->sub_cat_id ? 'selected' : '' ;?> ><?php echo e($sub_cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">

                    <div class="mb-3">
                        <input class="form-control" type="file" id="file" name="file">
                    </div>

                    <input type="hidden" name="old_image" value="<?php echo e($product->image); ?>">

                    <div class="form-floating mb-3">
                        <label for="floatingTextarea2"  class="text-white">Description</label>
                        <textarea class="form-control" placeholder="Drop Description" id="floatingTextarea2" name="description" style="height: 100px"> <?php echo e($product->description); ?></textarea>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Update">
                </form>
            </div>

            <div class="col-md-7">   
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>