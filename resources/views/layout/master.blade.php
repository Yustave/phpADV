<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT.'/assets/css/bootstap.min.css'?>">
    <link rel="stylesheet" href="<?php echo URL_ROOT.'/assets/css/custom.css'?>">
</head>
<body>

@include('layout.nav')
@yield('content')

    <script src='<?php echo URL_ROOT."/assets/js/bootstrap.min.js"?>' > </script>
    <script src="<?php echo URL_ROOT."/assets/js/jquery.js"?>" ></script>
    <script src="<?php echo URL_ROOT."/assets/js/tether.js"?>" ></script>
</body>
</html>