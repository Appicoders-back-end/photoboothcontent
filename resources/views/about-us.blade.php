@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>{{ ($content) ? $content->heading ? $content->heading : '' : '' }}</h3>
                    <h2>{{ ($content) ? $content->sub_heading ? $content->sub_heading : '' : '' }}</h2>
                    <p>{!! ($content) ? $content->description ? $content->description : '' : '' !!}</p>
                    @if($content)
                        @if($content->about_button_text)
                            <a class="btn btn-main"
                               href="{{route('memberships')}}">{{ ($content->about_button_text) ? $content->about_button_text : 'Become a member'}}
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
            @if($content)
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            @if(isset($content->aboutServImg))
                                <div class="col-lg-6">
                                    <img src="{{ url('/') . '/' . $content->aboutServImg }}" alt="service"
                                         class="img-fluid">
                                </div>
                            @endif
                            @if($content->service_heading)
                                <div class="col-lg-6">
                                    <h2 class="fs-1">{{ $content->service_heading }}</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($content->service_description)
                        <div class="col-lg-6">
                            <p>{!! $content->service_description !!}</p>
                        </div>
                    @endif
                </div>
            @endif

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
@endsection
