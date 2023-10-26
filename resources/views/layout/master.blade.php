<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="<?php echo URL_ROOT.'/assets/images/icon.jpg';?> ">
    <link rel="stylesheet" href="<?php echo URL_ROOT.'/assets/css/bootstap.min.css';?> ">
    <link rel="stylesheet" href="<?php echo URL_ROOT.'/assets/css/custom.css';?> ">
</head>
<body>

@include('layout.nav')
@yield('content')

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>