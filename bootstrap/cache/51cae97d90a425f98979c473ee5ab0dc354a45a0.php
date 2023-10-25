<?php $__env->startSection('title','creat category'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-photo-create">
   
    <div class="container" style=" height: 768px; padding-top:40px;">
        <div class="row">
            <div class="admin-list col-md-4">
                <div class="my-5">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="admin/category/create">Category</a></li>
                        <li class="list-group-item"><a href="admin/category/create">Category</a></li>
                        <li class="list-group-item"><a href="admin/category/create">Category</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="list-group my-5">
                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="/admin/category/all"><?php echo e($cat["name"]); ?></a>
                            <span>
                                <i class="bg-danger">edit</i>
                                <a href="<?php echo URL_ROOT."admin/category/".$cat["id"]."/delete"?>"><i class="bg-danger">delete</i></a>
                            </span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php echo $pages; ?>

                </div>
            </div>

            <div class="col-md-4">
                <h1 class="texr-primary text-center" style=" color:#abe8f3;">Create Category</h1>
                <?php if(\App\Classes\Session::has("error")): ?>
                    <?php echo e(\App\Classes\Session::flash("error")); ?>

                <?php endif; ?>
                <div class="my-5">
                    <div>
                        <?php echo $__env->make("layout.report_message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php if(\App\Classes\Session::has("del_success")): ?>
                            <?php echo e(\App\Classes\Session::flash("del_success")); ?>

                        <?php endif; ?>

                        <?php if(\App\Classes\Session::has("del_fail")): ?>
                            <?php echo e(\App\Classes\Session::flash("del_fail")); ?>

                        <?php endif; ?>
                        <form action="<?php echo URL_ROOT."admin/category/create"?>" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="name" class="form-label" style=" color:#abe8f3;">Name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                            <div class="row justify-content-end my-2">
                                <button type='submit' class="btn btn-primary btn-sm">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
        

    
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>