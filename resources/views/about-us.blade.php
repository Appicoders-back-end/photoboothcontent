@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>About Us</h3>
                    <h2>Do you have a marketing team in your boothbusiness?</h2>
                    <p>Content is king and you need it to attract and engage customers.This isn't rocket science, show
                        people having a good time using a photo booth and it makesother people want to book a photo
                        booth.</p>
                    <a class="btn btn-main" href="membership.php">Become a member <span><img
                                src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend')}}/assets/img/about-section-image.png" alt="Video frame" class="img-fluid">
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
    <div class="services-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="{{asset('frontend')}}/assets/img/service-img.png" alt="service" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <h2 class="fs-1">Let’s make mo’ money!</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>
                        Donec dictum tristique porta. Etiam convallis lorem lobortis nulla molestie, nec tincidunt ex
                        ullamcorper. Quisque ultrices lobortis elit sed euismod. Duis in ultrices dolor, ac rhoncus
                        odio. Suspendisse tempor sollicitudin dui sed lacinia.`
                    </p>
                </div>
            </div>
            <div class="row service-row">
                <div class="col-lg-4">
                    <div class="service-card training">
                        <img src="{{asset('frontend')}}/assets/img/Free-training.png" alt="training" class="img-fluid">
                        <h4>Free Training</h4>
                        <p>Etiam sed vulputate nisl, eu elementum arcu. Vivamus dignissim tortor in tellus dictum
                            pellentesque. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card content">
                        <img src="{{asset('frontend')}}/assets/img/Provide.png" alt="training" class="img-fluid">
                        <h4>Content Provider</h4>
                        <p>Etiam sed vulputate nisl, eu elementum arcu. Vivamus dignissim tortor in tellus dictum
                            pellentesque. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card invesment">
                        <img src="{{asset('frontend')}}/assets/img/Invesment.png" alt="training" class="img-fluid">
                        <h4>Invesment</h4>
                        <p>Etiam sed vulputate nisl, eu elementum arcu. Vivamus dignissim tortor in tellus dictum
                            pellentesque. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
