@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>{{ ($content) ? $content->sub_heading : 'About Us'}}</h3>
                    <h2>{{ ($content) ? $content->heading : ''}}</h2>
                    <p>{{ ($content) ? $content->description : ''}}</p>
                    @if($content)
                        @if($content->about_button_text)
                            <a class="btn btn-main" href="membership.php">{{ ($content->about_button_text) ? $content->about_button_text : 'Become a member'}}
                                <span>
                                    <img src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow">
                                </span>
                            </a>
                        @endif
                    @endif                                
                </div>
                <div class="col-lg-6">
                    @if(isset($content->aboutImg))
                    <img src="{{ url('/') . '/' . $content->aboutImg }}" alt="Video frame" class="img-fluid">
                    @endif
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
