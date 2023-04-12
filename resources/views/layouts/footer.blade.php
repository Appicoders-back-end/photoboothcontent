<footer>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-3">
                <img src="{{asset('frontend')}}/assets/img/logo.png" alt="Photobooth content" class="img-fluid">
            </div>
            <div class="col-lg-6 d-flex justify-content-between">
                <a href="{{url('/')}}">Home</a>
                <a href="{{route('about-us')}}">About us</a>
                <a href="{{route('content-store')}}">Content Store</a>
                <a href="{{ route('membership') }}">Membership</a>
                <a href="{{route('coupons')}}">Coupons</a>
{{--                <a href="{{ route('shop.home') }}">Shop</a>--}}
            </div>
        </div>
    </div>
</footer>
