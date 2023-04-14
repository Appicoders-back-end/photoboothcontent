@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h3>{{ ($content) ? $content->sub_heading ? $content->sub_heading : '' : ''}}</h3>
                    <h2>{{ ($content) ? $content->heading ? $content->heading : '' : ''}}</h2>
                    <p>{{ ($content) ? $content->description ? $content->description : '' : ''}}</p>
                    @if($content)
                        @if($content->membership_button_text)
                            <a class="btn btn-main"
                               href="{{route('memberships')}}">{{ ($content->membership_button_text) ? $content->membership_button_text : 'Become a member'}}
                                <span>
                                    <img src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow">
                                </span>
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-lg-6">
                    @if(isset($content->membershipImg))
                        <img src="{{ url('/') . '/' . $content->membershipImg }}" alt="Video frame" class="img-fluid">
                    @endif
                </div>
            </div>

            <div class="membership-card-row row">
                @forelse($subscriptions as $subscription)
                    <div class="col-lg-4 col-md-6">
                        <div class="membership-card {{ ($subscription->interval_time == 'month')?'basic':'premium' }}">
                            <h2>{{ $subscription->name??'' }}</h2>
                            <h4>Per {{ ucwords($subscription->interval_time)??"" }}</h4>
                            <p class="membership-price">${{ $subscription->price??'' }}</p>
                            <p>{!! $subscription->description??'' !!}</p>
                            <div class="mb-2">
                                <li>{{ $subscription->coupon->number_of_video??'' }} Vidoes</li>
                                <li>{{ $subscription->coupon->number_of_images??'' }} Images</li>
                                <li>{{ $subscription->coupon->number_of_documents??'' }} Document</li>
                            </div>
                            <button href="{{ route('membershipCheckout', ['subscription' => $subscription->id]) }}" @if($subscription->isSubcribed($subscription->id)) disabled="" @endif class="btn btn-main">Buy Membership <span><img
                                        src="{{asset('frontend')}}/assets/img/arrow-black.png" alt=""></span></button>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
@endsection
