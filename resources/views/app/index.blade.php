<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/droid-arabic-kufi" type="text/css"/>
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/style.css" />
    <link rel="stylesheet" href="{{cuteAsset('/assets')}}/css/layout.css" />
    <link rel="stylesheet" href="{{cuteAsset('/contract')}}/css/normalize.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{cuteAsset('/contract')}}/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{cuteAsset('/contract')}}/css/all.min.css" />
    <!-- Main Faile Css  -->
    <link rel="stylesheet" href="{{cuteAsset('/contract')}}/css/style.css" />

    <title>موثوق</title>
    
</head>

<body style="background-color:#fff !important;">
    <div id="app">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            <app></app>
        </div>
    </div>
    <script>
        const APP_URL = '{{env('APP_URL')}}';
        const APP_PREFIX = '{{env('APP_PREFIX')}}';
        const base_url = '{{asset('/')}}';
        const cloud_url = '{{it()->url('/')}}';
        window.lang_loc = '{{app()->getLocale()}}';
        window.trans = <?php
                        // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
                        $lang_files = File::files(resource_path() . '/lang/' . app()->getLocale());
                        $trans = [];
                        foreach ($lang_files as $f) {
                            $filename = pathinfo($f)['filename'];
                            $trans[$filename] = trans($filename);
                        }
                        echo json_encode($trans);
                        ?>;

        function _t(key) {
            return window.trans;
        }
    </script>
    <script src="{{ cuteAsset('/js/app.js') }}"></script>
    <script src="{{cuteAsset('/')}}assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{cuteAsset('/')}}assets/js/popper.min.js"></script>
    <script src="{{cuteAsset('/')}}assets/js/bootstrap.min.js"></script>
    <script src="{{cuteAsset('/')}}assets/js/owl.carousel.min.js"></script>
    <script src="{{cuteAsset('/')}}assets/js/main.js"></script>
    <script src="{{cuteAsset('/contract')}}/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="{{cuteAsset('/contract')}}/js/all.min.js"></script>
    <!-- Main Faile -->
    <script src="{{cuteAsset('/contract')}}/js/main.js"></script>
</body>

</html>