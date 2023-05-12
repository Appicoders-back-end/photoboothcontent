<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Photo Booth Content') }}</title>
    <link rel="icon" href="{{asset('frontend')}}/assets/img/favicon.png">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
    <link href="{{asset('frontend')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS -->
    <style>
        .modal-bg {
            background: rgb(252, 144, 172);
            background: -moz-linear-gradient(180deg, rgba(252, 144, 172, 1) 0%, rgba(101, 131, 254, 1) 100%);
            background: -webkit-linear-gradient(180deg, rgba(252, 144, 172, 1) 0%, rgba(101, 131, 254, 1) 100%);
            background: linear-gradient(180deg, rgba(252, 144, 172, 1) 0%, rgba(101, 131, 254, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FC90AC", endColorstr="#6583FE", GradientType=1);
        }
    </style>
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
                <div class="alert alert-danger d-none" id="couponFailedMessage">
                </div>

                <div class="alert alert-success d-none" id="couponSuccessMessage">
                </div>

                <input type="hidden" id="content_id" value="">
                <input id="coupon_code" type="text" class="form-control" placeholder="Coupon code" minlength="6"
                       maxlength="6" required>
            </div>
            <div class="modal-footer">
                <button id="downloadContentBtn" type="button" class="btn btn-main">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- Signup Modal -->
{{--<div class="modal fade" id="signup" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="signup-form w-75" style="width: auto;">
                                <a href="index.php"><img src="{{asset('frontend')}}/assets/img/logo.png"
                                                         class="d-block mx-auto mb-3" alt=""></a>
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
</div> --}}

<!-- Signup Modal -->
@guest
    <div class="modal fade" id="bootsrapSignupModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-1">
                        <div class="row">
                            <div
                                class="col-lg-4 py-0 modal-bg text-center d-flex justify-content-center align-items-center">
                                <div>
                                    <a href="#"><img src="{{asset('frontend')}}/assets/img/logo.png"
                                                     class="d-block mx-auto mb-3" alt=""></a>
                                    <h4 class="my-3 text-white fs-5 w-75 mx-auto">Let's make more money</h4>
                                    <!-- <h3 class="fs-3 fw-bold text-white">Register now</h3> -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="signup-form" style="width: auto;">
                                    <h4 class=" success_message text text-success"></h4>
                                    <h2>Register Now</h2>
                                    <form action="#" id="modalRegisterForm" class="mt-4" method="POST">
                                        @csrf
                                        <input type="text" class="form-control rounded-0 my-3" id="first_name"
                                               name="first_name" placeholder="first name">
                                        <span class="first_name text text-danger"></span>
                                        <input type="text" class="form-control rounded-0 my-3" id="last_name"
                                               name="last_name" placeholder="last name">
                                        <span class="last_name text text-danger"></span>
                                        <input type="email" class="form-control rounded-0 my-3" id="email" name="email"
                                               placeholder="email">
                                        <span class="email text text-danger"></span>
                                        <input type="text" class="form-control rounded-0 my-3" id="contact_number"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                               name="contact_number" placeholder="contact number" minlength="10"
                                               maxlength="10">
                                        <span class="contact_number text text-danger"></span>

                                        <input type="password" class="form-control rounded-0 my-3" id="password"
                                               name="password" placeholder="Password">
                                        <span class="password text text-danger"></span>
                                        <input type="password" id="password_confirmation"
                                               class="form-control rounded-0 my-3" name="password_confirmation"
                                               placeholder="Confirm Password">

                                        <button class="btn btn-main w-100" type="submit" id="modalRegisterFormSubmit">
                                            Sign up
                                        </button>
                                    </form>
                                    <a href="{{ route('login') }}"
                                       class="text-dark d-block mt-3 text-center text-decoration-none">Already have an
                                        account? <span class="text-decoration-underline">Sign in.</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest


<script src="{{asset('frontend')}}/assets/js/jquery-3.6.4.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/app.js"></script>
<script>
    $(document).ready(function () {

        setTimeout(function () {
            $('#bootsrapSignupModal').modal('show');
        }, 3000);
    });

    $('#couponModal').on('show.bs.modal', function (e) {
        var contentId = $(e.relatedTarget).data('content-id');
        $(e.currentTarget).find('input[id="content_id"]').val(contentId);
    });

    $('#couponModal').on('hidden.bs.modal', function (e) {
        $('#couponFailedMessage').addClass('d-none').text('');
        $('#couponSuccessMessage').addClass('d-none').text('');
        $('#coupon_code').val('');
    });

    $('#downloadContentBtn').on('click', function () {
        var url = "{{ url('api/download-content') }}";
        var code = $('#coupon_code').val();
        var content_id = $('#content_id').val();
        let user_id = "{{ auth()->user() ? auth()->user()->id : null }}";
        $.post(url, {code: code, content_id: content_id, user_id : user_id}, function (e) {
            console.log(e)
            if (e.success) {
                $('#couponFailedMessage').addClass('d-none');
                $('#couponSuccessMessage').removeClass('d-none').text(e.message);

                setTimeout(function () {
                    $("#couponModal").modal('hide')
                }, 5000);
            } else {
                $('#couponSuccessMessage').addClass('d-none');
                $('#couponFailedMessage').removeClass('d-none').text(e.message);
            }
        });
    });

    //open welcome modal
    $("#modalRegisterForm").on("submit", function (e) {
        // alert('work')
        e.preventDefault();
        var login = "{{ route('login') }}";
        var first_name = $("#first_name").val()
        var last_name = $("#last_name").val()
        var email = $("#email").val()
        var contact_number = $("#contact_number").val()
        var password = $("#password").val()
        var password_confirmation = $("#password_confirmation").val()

        $.ajax({
            type: 'POST',
            url: "{{ route('ajax-register') }}",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                contact_number: contact_number,
                password: password,
                password_confirmation: password_confirmation
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {

                if (res.status) {
                    $(".signup-form .success_message").text(res.message)
                    setTimeout(function () {
                        window.location.href = login;
                    }, 2000);
                }
                if (res.first_name) {
                    $("form .first_name").text(res.first_name)
                } else if (res.first_name === undefined) {
                    $("form .first_name").text('')
                }

                if (res.last_name) {
                    $("form .last_name").text(res.last_name)
                } else if (res.last_name === undefined) {
                    $("form .last_name").text('')
                }

                if (res.email) {
                    $("form .email").text(res.email)
                } else if (res.email === undefined) {
                    $("form .email").text('')
                }

                if (res.contact_number) {
                    $("form .contact_number").text(res.contact_number)
                } else if (res.contact_number === undefined) {
                    $("form .contact_number").text('')
                }

                if (res.password) {
                    $("form .password").text(res.password)
                } else if (res.password === undefined) {
                    $("form .password").text('')
                }

            },
        });
    });
</script>
@yield('script')
</body>
</html>

