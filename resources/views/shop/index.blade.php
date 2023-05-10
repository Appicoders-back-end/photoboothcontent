@extends('layouts.app')
@section('style')
    <style>
        .highlights {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend/assets/img/hero-section-circle-pink.png')}}" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h2>{{ ($content) ? $content->heading ? $content->heading : '' : ''}}</h2>
                    <p>{!! ($content) ? $content->description ? $content->description : '' : '' !!}</p>
                    @if(isset($content->hero_button_text))
                        <a class="btn btn-main"
                           href="{{route('memberships')}}">{{ ($content->hero_button_text) ? $content->hero_button_text : 'Become a member'}}
                            <span><img src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span>
                        </a>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if(isset($content->shopImg))
                        <img src="{{ url('/') . '/' . $content->shopImg }}" alt="Photo frame"
                         class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
        <img src="{{asset('frontend/assets/img/hero-section-circle-blue.png')}}" alt="Blue circle" class="blue-circle">
    </div>
    <div class="container">
        <div class="product-row row">
            @forelse($products as $key => $product)
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <img src="{{ $product->getImages()[0] }}" alt="" class="product-img">
                        <h4 class="product-name">{{ $product->title }}</h4>
                        <p class="product-price">${{ number_format($product->price,2) }}</p>
{{--                        <p class="product-desc">{!! $product->description !!}</p>--}}
                        <a href="{{ route('shop.product.detail',$product->id) }}" class="btn btn-main">See Details
                            <span><img src="{{asset('frontend/assets/img/arrow-black.png')}}"
                                       alt=""></span></a>
                    </div>
                </div>
            @empty
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        No product found
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
@section('script')
    <script>
        const productDescriptions = document.querySelectorAll(".details-description");
        productDescriptions.forEach((productDesc) => {
            const text = productDesc.textContent;
            if (text.length > 50) {
                productDesc.textContent = text.slice(0, 50) + "...";
            }
        });

        const productNames = document.querySelectorAll(".product-name");
        productNames.forEach((productName) => {
            const text = productName.textContent;
            if (text.length > 25) {
                productName.textContent = text.slice(0, 25) + "...";
            }
        });
    </script>
@endsection
