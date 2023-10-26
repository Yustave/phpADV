<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo URL_ROOT.'/assets/images/icon.jpg';?> ">
    <link rel="stylesheet" href="<?php echo URL_ROOT.'/assets/css/bootstap.min.css';?> ">
    <link rel="stylesheet" href="<?php echo URL_ROOT.'/assets/css/custom.css';?> ">
</head>
<body>

<?php echo $__env->make('layout.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>