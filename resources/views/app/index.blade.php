<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{asset('/')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}/css/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}/css/owl.carousel.min.css"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/style.css"/>
    <title>title</title>
</head>

<body>
<div id="app">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
        <app></app>
    </div>
</div>
<script>
    const base_url = '{{url('/')}}';
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('/')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/')}}/js/popper.min.js"></script>
<script src="{{asset('/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}/js/main.js"></script>
</body>
</html>
