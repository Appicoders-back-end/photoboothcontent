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
@include('layouts.header')
@yield('content')
@include('layouts.footer')
<!-- Modal -->
<div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="couponModalLabel">Enter coupon code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" placeholder="Coupon code">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-main">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signup" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="signup-form w-75" style="width: auto;">
                                <a href="index.php"><img src="assets/img/logo.png" class="d-block mx-auto mb-3" alt=""></a>
                                <h2>Sign in Now</h2>
                                <form action="" class="mt-4">
                                    <input type="email" class="form-control rounded-0 my-3" placeholder="Email">
                                    <input type="password" class="form-control rounded-0 my-3" placeholder="Password">
                                    <a href="#" class="d-block text-danger mb-3">Forgot password?</a>
                                    <a href="dashboard.php" class="btn btn-main w-100" type="submit">Sign in</a>
                                </form>
                                <a href="signup.php" class="text-dark d-block mt-3 text-center text-decoration-none">Don't
                                    have an account? <span class="text-decoration-underline">Sign up.</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('frontend')}}/assets/js/jquery-3.6.4.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/swiper-bundle.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/app.js"></script>
@yield('script')
</body>
</html>

