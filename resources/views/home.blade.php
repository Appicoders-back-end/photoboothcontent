@extends('layouts.app')
@section('style')
    <style>
        .modal-bg{
            background: rgb(252,144,172);
            background: -moz-linear-gradient(180deg, rgba(252,144,172,1) 0%, rgba(101,131,254,1) 100%);
            background: -webkit-linear-gradient(180deg, rgba(252,144,172,1) 0%, rgba(101,131,254,1) 100%);
            background: linear-gradient(180deg, rgba(252,144,172,1) 0%, rgba(101,131,254,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FC90AC",endColorstr="#6583FE",GradientType=1);
        }
        .error {
            color: #ff0000;
            font-weight: normal;
        }
        .form-validate input{
            margin-top: 10px;
        }
        button{
            display: block;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    @if(isset($content->header_section_heading))
                        <h2>{{$content->header_section_heading}}</h2>
                    @endif
                    @if(isset($content->header_section_description))
                        <p>{!! $content->header_section_description !!}</p>
                    @endif
                    <a class="btn btn-main"
                       href="{{route('memberships')}}"> {{isset($content->header_section_button_text) ? $content->header_section_button_text : 'Become a member'}}
                        <span><img
                                src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    @if(isset($content->headerSectionImg))
                        <img src="{{ url('/') . '/' . $content->headerSectionImg }}" alt="Photo farme"
                             class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
    @if($promoCodes->count() > 0)
        <div class="promo-section">
            <div class="container">
                <div class="swiper bannerswiper">
                    <div class="swiper-wrapper">
                        @foreach($promoCodes as $promoCode)
                            <div class="swiper-slide">
                                <img src="{{$promoCode->getImage()}}"
                                     alt="Promo banner" class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @if(isset($content->about_section_heading))
                        <h3>{{$content->about_section_heading}}</h3>
                    @endif
                    @if(isset($content->about_section_sub_heading))
                        <h2>{{$content->about_section_sub_heading}}</h2>
                    @endif
                    <p> {!! ($content) ? $content->about_section_description : '' !!}</p>
                    <a class="btn btn-main"
                       href="{{route('about-us')}}">{{isset($content->about_section_button_text) ? $content->about_section_button_text : "Read More"}}
                        <span><img
                                src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    @if(isset($content->aboutSectionImg))
                        <img src="{{ url('/') . '/' . $content->aboutSectionImg }}" alt="Video frame"
                             class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="container">
            <h3>{{ ($content) ? $content->content_store_section_heading : '' }}</h3>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{$loop->index == 0 ? 'active' : null}}" id="{{$category->name}}-tab"
                                data-bs-toggle="tab" data-bs-target="#{{$category->name}}-tab-pane"
                                type="button" role="tab" aria-controls="{{$category->name}}-tab-pane"
                                aria-selected="true">{{$category->name}}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($categories as $category)
                    <div class="tab-pane fade show {{$loop->index == 0 ? 'show active' : null}}"
                         id="{{$category->name}}-tab-pane" role="tabpanel" aria-labelledby="{{$category->name}}-tab"
                         tabindex="0">
                        @if($category->contents->count() > 0)
                            <div class="row content-category-row">
                                <div class="swiper mySwiper-content">
                                    <div class="swiper-wrapper">
                                        @foreach($category->contents->toQuery()->orderByDesc('id')->limit(3)->get() as $categoryContent)
                                            <div class="swiper-slide">
                                                <div class="content-category-card video"
                                                     @if($categoryContent->type == 'video') id="video_content"
                                                     data-download="{{ $categoryContent->isAlreadyDownloaded() }}"
                                                     data-id="{{ $categoryContent->watermark_attachment != null ? $categoryContent->getWatermarkAttachment() : $categoryContent->getImage() }}" data-bs-toggle="modal"
                                                     data-bs-target="#contentVideoModal" style="cursor: pointer" @endif>
                                                    @if($categoryContent->type == 'video')
                                                        <img src="{{$categoryContent->getThumbnailImage()}}"
                                                             alt="{{$categoryContent->name}}"
                                                             class="content-card-img">
                                                    @else
                                                        <img src="{{$categoryContent->getThumbnailImage()}}"
                                                             alt="{{$categoryContent->name}}"
                                                             class="content-card-img">
                                                    @endif
                                                    <div class="category-content-container">
                                                        <h4>{{$categoryContent->name}}</h4>
                                                        <p>{{ \Illuminate\Support\Str::limit($categoryContent->description, 60) }}</p>
                                                        {{--                                                    <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"--}}
                                                        {{--                                                       class="btn btn-main bg-white text-dark">{{__('Download Now')}}</a>--}}
                                                        <a data-bs-toggle="modal" data-bs-target="#couponModal"
                                                           data-content-id="{{$categoryContent->id}}" href="#"
                                                           class="btn btn-main bg-white text-dark">{{__('Download Now')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination content-slider-pagination"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="coupons-section">
        <div class="container">
            <h3>{{ $content->coupons_section_heading ?? null}}</h3>
            <div class="row coupons-row">
                @foreach($coupons as $coupon)
                    @include('partials.coupon', $coupon)
                @endforeach
            </div>
        </div>
    </div>
    <div class="services-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            @if(isset($content->servicesSectionImg))
                                <img src="{{ url('/') . '/' . $content->servicesSectionImg }}" alt="service"
                                     class="img-fluid">
                            @endif
                        </div>
                        <div class="col-lg-6">
                            @if(isset($content->services_section_heading))
                                <h2 class="fs-1">{{$content->services_section_heading}}</h2>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(isset($content->services_section_description))
                        <p>{!! $content->services_section_description !!}</p>
                    @endif
                </div>
            </div>
            <div class="row service-row">
                <div class="col-lg-4">
                    <div class="service-card training">
                        @if(isset($content->bulletOneImg))
                            <img src="{{ url('/') . '/' . $content->bulletOneImg }}" alt="service" class="img-fluid">
                        @endif
                        @if(isset($content->bullet_one_section_heading))
                            <h4>{{$content->bullet_one_section_heading}}</h4>
                        @endif
                        @if(isset($content->bullet_one_description))
                            <p>{!! $content->bullet_one_description !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card content">
                        @if(isset($content->bulletTwoImg))
                            <img src="{{ url('/') . '/' . $content->bulletTwoImg }}" alt="service" class="img-fluid">
                        @endif
                        @if(isset($content->bullet_two_section_heading))
                            <h4>{{$content->bullet_two_section_heading}}</h4>
                        @endif
                        @if(isset($content->bullet_two_description))
                            <p>{!! $content->bullet_two_description !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card invesment">
                        @if(isset($content->bulletThreeImg))
                            <img src="{{ url('/') . '/' . $content->bulletThreeImg }}" alt="service" class="img-fluid">
                        @endif
                        @if(isset($content->bullet_three_section_heading))
                            <h4>{{$content->bullet_three_section_heading}}</h4>
                        @endif
                        @if(isset($content->bullet_three_description))
                            <p>{!! $content->bullet_three_description !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contentVideoModal" class="modal fade" data-bs-backdrop="false" tabindex="-1"
         aria-labelledby="contentVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #00A8B3;color: #fff;">
                    <h5 class="modal-title">Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="font-size: 12px;"></button>
                </div>
                <div class="modal-body">
                    <div id="contentVideo" class=" embed-responsive embed-responsive-16by9">
                        <video id="video-10" controls style="width: 100%;">
                            <source src=""/>
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-1">
                        <div class="row">
                            <div class="col-lg-4 py-0 modal-bg text-center d-flex justify-content-center align-items-center">
                                <div>
                                    <a href="#"><img src="{{asset('frontend')}}/assets/img/logo.png" class="d-block mx-auto mb-3" alt=""></a>
                                    <h4 class="my-3 text-white fs-5 w-75 mx-auto">Let's make more money</h4>
                                    <!-- <h3 class="fs-3 fw-bold text-white">Register now</h3> -->
                                </div>
                            </div>
                            <div class="col-lg-8">

                                <div class="signup-form" style="width: auto;">

                                    <h4 class=" success_message text text-success"></h4>
                                    <h2>Register Now</h2>
                                    <form action="#" id="register" name="register" class="mt-4" method="POST">
                                        @csrf
                                        <input type="text" class="form-control rounded-0 my-3" id="first_name" name="first_name" placeholder="first name">
                                        <span class="first_name text text-danger"></span>
                                        <input type="text" class="form-control rounded-0 my-3" id="last_name" name="last_name" placeholder="last name">
                                        <span class="last_name text text-danger"></span>
                                        <input type="email" class="form-control rounded-0 my-3" id="email" name="email" placeholder="email">
                                        <span class="email text text-danger"></span>
                                        <input type="text" class="form-control rounded-0 my-3" id="contact_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="contact_number" placeholder="contact number"  minlength="10" maxlength="10">
                                        <span class="contact_number text text-danger"></span>

                                        <input type="password" class="form-control rounded-0 my-3" id="password" name="password" placeholder="Password">
                                        <span class="password text text-danger"></span>
                                        <input type="password" class="form-control rounded-0 my-3" name="password_confirmation"
                                               placeholder="Confirm Password">

                                        <button class="btn btn-main w-100" type="submit">Sign up</button>
                                    </form>
                                    <a href="{{ route('login') }}" class="text-dark d-block mt-3 text-center text-decoration-none">Already have an account? <span class="text-decoration-underline">Sign in.</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {

            setTimeout(function() {
                $('#signup').modal('show');
            }, 100);

           /* $("#register").validate({
                rules: {
                    first_name: "required",
                    last_name: "required",
                    email: "required",
                    contact_number: "required",
                    password: "required",
                },

            });*/

            $(document).on("click", '#video_content', function () {
                const videoSource = $(this).data('id');
                const isAlreadyDownloaded = $(this).data('download');
                if (isAlreadyDownloaded) {
                    // controlsList="nodownload"
                    $("#video-10").removeAttr("controlsList");
                } else {
                    $('#video-10').attr('controlsList', 'nodownload');
                }
                $('video source').attr('src', videoSource)
                $('video')[0].load()
            });

            $(document).on("click", ".btn-close", function () {
                $('video')[0].pause();
            });
        });

        $(document).ready(function(){
            /*$(function() {
                // Setup form validation on the #register-form element
                $("form[name='register']").validate({   //#register-form is form id
                    // Specify the validation rules
                    rules: {
                        first_name: "required", //firstname is corresponding input name
                        last_name: "required", //firstname is corresponding input name
                        password: {
                            required: true,
                        },
                        password_confirm : {
                            required: true,
                            equalTo : "#password"
                        },
                        //passowrd:  is corresponding input name
                        email: {               //email is corresponding input name
                            required: true,
                            email: true
                        },
                        contact_number:{
                            required: true,
                            minLength:10,
                            maxlength:10
                        }
                    },
                    // Specify the validation error messages
                    messages: {
                        first_name: "Enter First Name",
                        last_name: "Enter Last Name",
                        password: "Enter Passowrd",
                        email: "Enter Valid Email ID",
                        contact_number:"Enter contact number"
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });*/
        })

        $("#register").on("submit",function (e) {
            // alert('work')
            e.preventDefault();
            var login = "{{ route('login') }}";
            var first_name = $("#first_name").val()
            var last_name = $("#last_name").val()
            var email = $("#email").val()
            var contact_number = $("#contact_number").val()
            var password = $("#password").val()

            $.ajax({
                type:'POST',
                url:"{{ route('ajax-register') }}",
                data:{first_name:first_name,last_name:last_name,email:email,contact_number:contact_number,password:password},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){



                    if(res.status){
                        $(".signup-form .success_message").text(res.message)
                        setTimeout(function() {
                            window.location.href = login;
                        }, 2000);
                    }
                    if(res.first_name){
                        $("form .first_name").text(res.first_name)
                    }else if(res.first_name === undefined){
                        $("form .first_name").text('')
                    }

                    if(res.last_name){
                        $("form .last_name").text(res.last_name)
                    }else if(res.last_name === undefined){
                        $("form .last_name").text('')
                    }

                    if(res.email){
                        $("form .email").text(res.email)
                    }else if(res.email === undefined){
                        $("form .email").text('')
                    }

                    if(res.contact_number){
                        $("form .contact_number").text(res.contact_number)
                    }else if(res.contact_number === undefined){
                        $("form .contact_number").text('')
                    }

                    if(res.password){
                        $("form .password").text(res.password)
                    }else if(res.password === undefined){
                        $("form .password").text('')
                    }

                },
            });
        });
    </script>
@endsection
