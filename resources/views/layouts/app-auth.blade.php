<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('frontend')}}/assets/img/favicon.png">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
    @yield('style')
</head>
<body>
@yield('content')
<script src="{{asset('frontend')}}/assets/js/jquery-3.6.4.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/swiper-bundle.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/app.js"></script>
@yield('script')
</body>
</html>

