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

    <script src='<?php echo URL_ROOT."/assets/js/bootstrap.min.js"?>' > </script>
    <script src="<?php echo URL_ROOT."/assets/js/jquery.js"?>" ></script>
    <script src="<?php echo URL_ROOT."/assets/js/tether.js"?>" ></script>
</body>
</html>