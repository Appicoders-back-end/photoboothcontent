<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <img src="{{asset('frontend')}}/assets/img/logo.png" alt="Photobooth content">
                <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem illum repellat ut harum vel rem blanditiis quam nisi nobis recusandae.</p>
            </div>
            <div class="col-lg-3">
                <h5 class="mb-3 fw-bold">Useful links</h5>
                <a class="my-2 d-block" href="{{url('/')}}">Home</a>
                <a class="my-2 d-block" href="{{route('about-us')}}">About us</a>
                <a class="my-2 d-block" href="{{route('content-store')}}">Content Store</a>
                <a class="my-2 d-block" href="{{route('coupons')}}">Coupons</a>
                <a class="my-2 d-block" href="{{ route('memberships') }}">Membership</a>
{{--                <a class="my-2 d-block" href="shop.php">Shop</a>--}}
            </div>
            <div class="col-lg-4">
                <h5 class="mb-3 fw-bold">Contact information</h5>
                <p class="mb-2"><b>Contact:</b> +1 234 56789</p>
                <p class="mb-2"><b>Email:</b> info@photoboothcontent.com</p>
                <p class="mb-2"><b>Address:</b> XYZ, ABC street Washington, USA</p>
            </div>
            <div class="col-12 mt-3 fw-bold border-top pt-3 border-dark">
                <p class="text-center">All rights reserved {{date('Y')}}</p>
            </div>
        </div>
    </div>
</footer>
