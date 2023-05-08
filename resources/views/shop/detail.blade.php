@extends('layouts.app')
<style>
    .related .highlights {
        display: none;
    }
</style>
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend/assets/img/hero-section-circle-pink.png')}}" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content product-page-hero">
                @include('layouts.messages')
                <div class="col-lg-6">
                    <div class="swiper productswiper">
                        <div class="swiper-wrapper">
                            @if($product->images)
                                @foreach($product->getImages() as $key => $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image }}" alt="Image-{{ ++$key }}" class="img-fluid">
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>{{ $product->title }}</h2>
                    <h2>${{ number_format($product->price,2) }}</h2>
                    <p>{!! $product->description !!}</p>
                    <a class="btn btn-main" href="{{ route('shop.add.to.cart',$product->id) }}">Add to cart <span><img src="{{asset('frontend/assets/img/arrow-black.png')}}" alt="arrow"></span></a>
                </div>
            </div>
            @if(count($related_products) > 0)
                <h4 class="fw-bold mt-5">Related Products</h4>
                <div class="row">
                    @foreach($related_products as $key => $related_product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card related">
                                <img src="{{ $related_product->getImages()[0] }}" alt="" class="product-img">
                                <h4 class="product-name">{{ $related_product->title }}</h4>
                                <p class="product-price">${{ $related_product->price }}</p>
                                <p class="product-desc">{!! $related_product->description !!}</p>
                                <a href="{{ route('shop.product.detail',$related_product->id) }}" class="btn btn-main">See Details
                                    <span><img src="{{asset('frontend/assets/img/arrow-black.png')}}" alt=""></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
            </div>
            @endif
        </div>
        <img src="{{asset('frontend/assets/img/hero-section-circle-blue.png')}}" alt="Blue circle" class="blue-circle">
    </div>
@endsection
@section('script')
    <script>
        const productDescriptions = document.querySelectorAll(".related .details-description");
        productDescriptions.forEach((productDesc) => {
            const text = productDesc.textContent;
            if (text.length > 50) {
                productDesc.textContent = text.slice(0, 50) + "...";
            }
        });

        const productNames = document.querySelectorAll(".related .product-name");
        productNames.forEach((productName) => {
            const text = productName.textContent;
            if (text.length > 25) {
                productName.textContent = text.slice(0, 25) + "...";
            }
        });
    </script>
@endsection
