@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>{{ ($content) ? $content->sub_heading : 'Coupons'}}</h3>
                    <h2>{{ ($content) ? $content->heading : ''}}</h2>
                    <p>{{ ($content) ? $content->description : ''}}</p>
                    @if($content)
                        @if($content->coupon_button_text)
                            <a class="btn btn-main" href="membership.php">{{ ($content->coupon_button_text) ? $content->coupon_button_text : 'Become a member'}}
                                <span>
                                    <img src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow">
                                </span>
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-6">
                    @if(isset($content->couponImg))
                        <img src="{{ url('/') . '/' . $content->couponImg }}" alt="Video frame" class="img-fluid">
                    @endif
                </div>
                <div class="row coupons-row">
                    @if($coupons->count() > 0)
                        @foreach($coupons as $coupon)
                            @include('partials.coupon', $coupon)
                        @endforeach
                    @endif
                </div>
                {{--<div class="my-5 d-flex justify-content-center">
                    <a href="#" class="btn btn-main">Load More</a>
                </div> --}}
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
@endsection
