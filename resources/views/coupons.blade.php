@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>Coupons</h3>
                    <h2>Do you have a marketing team in your boothbusiness?</h2>
                    <p>Content is king and you need it to attract and engage customers.This isn't rocket science, show
                        people having a good time using a photo booth and it makesother people want to book a photo
                        booth.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend')}}/assets/img/coupon-section-image.png" alt="Video frame" class="img-fluid">
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
