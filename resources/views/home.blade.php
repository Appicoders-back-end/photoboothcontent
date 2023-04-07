@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h2>Want to make more money from your booth business?</h2>
                    <p>This really shouldn’t be that difficult, knowledge is power; content is king and support is
                        everything. We know what it takes to make your photo booth business a success.</p>
                    <a class="btn btn-main" href="membership.php">Become a member <span><img
                                src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend')}}/assets/img/hero-section-main-image.png" alt="Photo farme"
                         class="img-fluid">
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
    <div class="promo-section">
        <div class="container">
            <div class="swiper bannerswiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('frontend')}}{{asset('frontend')}}/assets/img/promo-banner-one.png"
                             alt="Promo banner" class="img-fluid">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('frontend')}}/assets/img/promo-banner-one.png" alt="Promo banner"
                             class="img-fluid">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('frontend')}}/assets/img/promo-banner-one.png" alt="Promo banner"
                             class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>About Us</h3>
                    <h2>Do you have a marketing team in your boothbusiness?</h2>
                    <p>Content is king and you need it to attract and engage customers.This isn't rocket science, show
                        people having a good time using a photo booth and it makesother people want to book a photo
                        booth.</p>
                    <a class="btn btn-main" href="about.php">View More <span><img
                                src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend')}}/assets/img/about-section-image.png" alt="Video frame"
                         class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="container">
            <h3>Content Store</h3>
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
            <h3>Coupons</h3>
            <div class="row coupons-row">
                <div class="col-lg-4 col-md-6 coupon-card">
                    <img src="{{asset('frontend')}}/assets/img/coupons-bg.png" class="img-fluid coupon-bg" alt="coupon">
                    <div class="coupon-content">
                        <div class="coupon-header d-flex justify-content-between align-items-center">
                            <div><img src="{{asset('frontend')}}/assets/img/coin.png" alt="coin"></div>
                            <h4>25% OFF</h4>
                        </div>
                        <div class="coupon-body">
                            <h5>Get Coupon in</h5>
                            <h2>$50</h2>
                            <li>4 Videos</li>
                            <li>8 Photos</li>
                            <li>2 Documents</li>
                        </div>
                        <div class="coupon-footer">
                            <a href="#" class="btn">Buy Coupon <span><img
                                        src="{{asset('frontend')}}/assets/img/ArrowRight.png" alt=""></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 coupon-card">
                    <img src="{{asset('frontend')}}/assets/img/coupons-bg.png" class="img-fluid coupon-bg" alt="coupon">
                    <div class="coupon-content">
                        <div class="coupon-header d-flex justify-content-between align-items-center">
                            <div><img src="{{asset('frontend')}}/assets/img/coin.png" alt="coin"></div>
                            <h4>25% OFF</h4>
                        </div>
                        <div class="coupon-body">
                            <h5>Get Coupon in</h5>
                            <h2>$50</h2>
                            <li>4 Videos</li>
                            <li>8 Photos</li>
                            <li>2 Documents</li>
                        </div>
                        <div class="coupon-footer">
                            <a href="#" class="btn">Buy Coupon <span><img
                                        src="{{asset('frontend')}}/assets/img/ArrowRight.png" alt=""></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 coupon-card">
                    <img src="{{asset('frontend')}}/assets/img/coupons-bg.png" class="img-fluid coupon-bg" alt="coupon">
                    <div class="coupon-content">
                        <div class="coupon-header d-flex justify-content-between align-items-center">
                            <div><img src="{{asset('frontend')}}/assets/img/coin.png" alt="coin"></div>
                            <h4>25% OFF</h4>
                        </div>
                        <div class="coupon-body">
                            <h5>Get Coupon in</h5>
                            <h2>$50</h2>
                            <li>4 Videos</li>
                            <li>8 Photos</li>
                            <li>2 Documents</li>
                        </div>
                        <div class="coupon-footer">
                            <a href="#" class="btn">Buy Coupon <span><img
                                        src="{{asset('frontend')}}/assets/img/ArrowRight.png" alt=""></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        odio.
                        Suspendisse tempor sollicitudin dui sed lacinia.`
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
