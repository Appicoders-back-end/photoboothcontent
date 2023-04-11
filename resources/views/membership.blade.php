@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>Membership</h3>
                    <h2>Benefits of Photobooth Content Membership</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis a asperiores ea eligendi ex possimus vitae nobis quae ratione! Animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. In, maiores?</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend')}}/assets/img/membership-section-image.png" alt="Video frame" class="img-fluid">
                </div>
            </div>

            <div class="membership-card-row row">
                @forelse($subscriptions as $subscription)
                    <div class="col-lg-4 col-md-6">

                        <div class="membership-card {{ ($subscription->interval_time == 'month')?'basic':'premium' }}" >
                            <h2>{{ $subscription->name??'' }}</h2>
                            <h4>Per {{ ucwords($subscription->interval_time)??"" }}</h4>
                            <p class="membership-price">${{ $subscription->price??'' }}</p>
                            <p>{!! $subscription->description??'' !!}</p>
                            <div class="mb-2">
                                <li>{{ $subscription->coupon->number_of_video??'' }} Vidoes</li>
                                <li>{{ $subscription->coupon->number_of_images??'' }} Images</li>
                                <li>{{ $subscription->coupon->number_of_documents??'' }} Document</li>
                            </div>
                            <a href="{{ route('login') }}" class="btn btn-main">Become a member <span><img src="{{asset('frontend')}}/assets/img/arrow-black.png" alt=""></span></a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
@endsection
