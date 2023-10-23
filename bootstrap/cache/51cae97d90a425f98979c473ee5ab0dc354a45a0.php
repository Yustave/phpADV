<?php $__env->startSection('title','creat category'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-photo-create">
    <div class="container" style="padding-top:40px;">
        <h1 class="texr-primary text-center" style=" color:#abe8f3;">Create Category</h1>
        <?php if(\App\Classes\Session::has("error")): ?>
            <?php echo e(\App\Classes\Session::flash("error")); ?>

        <?php endif; ?>
        <div class="col-md-8 offset-md-2 my-5">
            <form action="<?php echo URL_ROOT."admin/category/create"?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="name" class="form-label" style=" color:#abe8f3;">Name</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                
                <div>
                    <label for="file" class="form-label">File</label>
                    <input type="file" id="file" class="form-control" name="file">
                </div>

                <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">

                <div class="row justify-content-end my-2">
                    <button type='submit' class="btn btn-primary btn-sm">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>