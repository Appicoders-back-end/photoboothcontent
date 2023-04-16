@extends('layouts.app')
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
                                            <div class="content-category-card video">
                                                <img src="{{$content->getThumbnailImage()}}" alt="{{$content->name}}"
                                                     class="content-card-img">
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
