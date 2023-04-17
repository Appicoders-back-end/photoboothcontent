@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <p>{{$content->header_section_description}}</p>
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
                    <p> {{ ($content) ? $content->about_section_description : '' }} </p>
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
                                        @foreach($category->contents as $content)
                                            <div class="swiper-slide">
                                            <div class="content-category-card video" @if($content->type == 'video') id="video_content" data-id="{{ $content->getImage() }}" data-toggle="modal" data-target="#myModal" style="cursor: pointer" @endif>
                                                {{--<img src="{{$content->getThumbnailImage()}}" alt="{{$content->name}}"
                                                     class="content-card-img">--}}
                                                @if($content->type == 'video')
                                                    <img src="{{$content->getThumbnailImage()}}" alt="{{$content->name}}"
                                                         class="content-card-img">
                                                @else
                                                    <img src="{{$content->getThumbnailImage()}}" alt="{{$content->name}}"
                                                         class="content-card-img">
                                                @endif
                                                <div class="category-content-container">
                                                    <h4>{{$content->name}}</h4>
                                                    <p>{{ \Illuminate\Support\Str::limit($content->description, 60) }}</p>
{{--                                                    <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"--}}
{{--                                                       class="btn btn-main bg-white text-dark">{{__('Download Now')}}</a>--}}
                                                    <a data-bs-toggle="modal" data-bs-target="#couponModal" data-content-id="{{$content->id}}" href="#"
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
            <h3>{{ ($content) ? $content->coupons_section_heading : '' }}</h3>
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
                        <p>{{$content->services_section_description}}</p>
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
                            <h4 class="fs-1">{{$content->bullet_one_section_heading}}</h4>
                        @endif
                        @if(isset($content->bullet_one_description))
                            <p>{{$content->bullet_one_description}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card content">
                        @if(isset($content->bulletTwoImg))
                            <img src="{{ url('/') . '/' . $content->bulletTwoImg }}" alt="service" class="img-fluid">
                        @endif
                        @if(isset($content->bullet_two_section_heading))
                            <h4 class="fs-1">{{$content->bullet_two_section_heading}}</h4>
                        @endif
                        @if(isset($content->bullet_two_description))
                            <p>{{$content->bullet_two_description}}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card invesment">
                        @if(isset($content->bulletThreeImg))
                            <img src="{{ url('/') . '/' . $content->bulletThreeImg }}" alt="service" class="img-fluid">
                        @endif
                        @if(isset($content->bullet_three_section_heading))
                            <h4 class="fs-1">{{$content->bullet_three_section_heading}}</h4>
                        @endif
                        @if(isset($content->bullet_three_description))
                            <p>{{$content->bullet_three_description}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Video</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="contentVideo" class=" embed-responsive embed-responsive-16by9">
                        <video id="video-10" controls>
                            <source src="" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(document).on("click",'#video_content',function () {
                const videoSource = $(this).data('id');
                $('video source').attr('src', videoSource)
                $('video')[0].load()
            });
        })

    </script>
    {{--    here--}}
@endsection
