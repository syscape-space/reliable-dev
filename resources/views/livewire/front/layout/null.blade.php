<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/normalize.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/all.min.css" />
    <!-- Main Faile Css  -->
    <link rel="stylesheet" href="{{asset('tem_assets')}}/css/paying.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
    />
    @livewireStyles
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/all.min.js"></script>
    <script src="{{asset('tem_assets')}}/js/paying.js"></script>
    <script src="{{asset('tem_assets')}}/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>