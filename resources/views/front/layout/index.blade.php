<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Normalize -->
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/normalize.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/all.min.css" />
    <!-- Main Faile Css  -->
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/style.css" />
    @livewireStyles
</head>
<body>
@yield('content')
@livewireScripts
<script src="{{cuteAsset('/assets')}}/js/all.min.js"></script>
<script src="{{cuteAsset('/assets')}}/js/orders.js"></script>
<script src="{{cuteAsset('/assets')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>

