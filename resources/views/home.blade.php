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
                       href="membership.php"> {{isset($content->header_section_button_text) ? $content->header_section_button_text : 'Become a member'}}
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
                       href="about.php">{{isset($content->about_section_button_text) ? $content->about_section_button_text : "Read More"}}
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
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Videos
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Photos
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                            type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Documents
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                     tabindex="0">
                    <div class="row content-category-row">
                        <div class="swiper mySwiper-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination content-slider-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                     tabindex="0">
                    <div class="row content-category-row">
                        <div class="swiper mySwiper">
                            <div class="swiper mySwiper-content">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="content-category-card video">
                                            <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                                 class="content-card-img">
                                            <div class="category-content-container">
                                                <h4>Content item</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                    dolores.</p>
                                                <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                                   class="btn btn-main bg-white text-dark">Download now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="content-category-card video">
                                            <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                                 class="content-card-img">
                                            <div class="category-content-container">
                                                <h4>Content item</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                    dolores.</p>
                                                <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                                   class="btn btn-main bg-white text-dark">Download now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="content-category-card video">
                                            <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                                 class="content-card-img">
                                            <div class="category-content-container">
                                                <h4>Content item</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                    dolores.</p>
                                                <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                                   class="btn btn-main bg-white text-dark">Download now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="content-category-card video">
                                            <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                                 class="content-card-img">
                                            <div class="category-content-container">
                                                <h4>Content item</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                    dolores.</p>
                                                <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                                   class="btn btn-main bg-white text-dark">Download now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="content-category-card video">
                                            <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                                 class="content-card-img">
                                            <div class="category-content-container">
                                                <h4>Content item</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                    dolores.</p>
                                                <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                                   class="btn btn-main bg-white text-dark">Download now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination content-slider-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                     tabindex="0">
                    <div class="row content-category-row">
                        <div class="swiper mySwiper-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content-category-card video">
                                        <img src="{{asset('frontend')}}/assets/img/category-photo-bg.png" alt=""
                                             class="content-card-img">
                                        <div class="category-content-container">
                                            <h4>Content item</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam,
                                                dolores.</p>
                                            <a data-bs-toggle="modal" data-bs-target="#couponModal" href="#"
                                               class="btn btn-main bg-white text-dark">Download now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination content-slider-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="coupons-section">
        <div class="container">
            <h3>{{ ($content) ? $content->coupons_section_heading : '' }}</h3>
            <div class="row coupons-row">
                @foreach($coupons as $coupon)
                    <div class="col-lg-4 col-md-6 coupon-card">
                        <img src="{{asset('frontend')}}/assets/img/coupons-bg.png" class="img-fluid coupon-bg" alt="coupon">
                        <div class="coupon-content">
                            <div class="coupon-header d-flex justify-content-between align-items-center">
                                <div><img src="{{asset('frontend')}}/assets/img/coin.png" alt="coin"></div>
                            </div>
                            <div class="coupon-body">
                                <h5>Get Coupon in</h5>
                                <h2>${{$coupon->price}}</h2>
                                <li>{{$coupon->number_of_video}} Videos</li>
                                <li>{{$coupon->number_of_images}} Photos</li>
                                <li>{{$coupon->number_of_documents}} Documents</li>
                            </div>
                            <div class="coupon-footer">
                                <a class="btn" data-bs-toggle="modal" data-bs-target="#signup">Buy Coupon <span><img
                                            src="{{asset('frontend')}}/assets/img/ArrowRight.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
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
                                <img src="{{ url('/') . '/' . $content->servicesSectionImg }}" alt="service" class="img-fluid">
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
