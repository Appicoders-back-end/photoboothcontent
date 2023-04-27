@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend/assets/img/hero-section-circle-pink.png')}}" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-6">
                    <h2>Shop</h2>
                    <p>This really shouldn’t be that difficult, knowledge is power; content is king and support is
                        everything. We know what it takes to make your photo booth business a success.</p>
                    <a class="btn btn-main" href="membership.php">Become a member <span><img
                                src="{{asset('frontend/assets/img/arrow-black.png')}}" alt="arrow"></span></a>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('frontend/assets/img/about-section-image.png')}}" alt="Photo farme" class="img-fluid">
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
                    <img src="{{ url('storage/'.$product->images[0]->image) }}" alt="" class="product-img">
                    <h4 class="product-name">{{ $product->title }}</h4>
                    <p class="product-price">${{ number_format($product->price,2) }}</p>
                    <p class="product-desc">{!! $product->description !!}</p>
                    <a href="{{ route('shop.product.detail',$product->id) }}" class="btn btn-main">See Details <span><img src="{{asset('frontend/assets/img/arrow-black.png')}}"
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
