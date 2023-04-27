@extends('layouts.app')
@section('content')
    <div class="hero-section">
    <img src="assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
    <div class="container">
        <div class="row hero-content signup-hero">
            <div class="col-lg-12">
                <div class="signup-form">
                    <a href="index.php"><img src="assets/img/logo.png" class="d-block mx-auto mb-3" alt=""></a>
                    <h2>Checkout</h2>
                    <form action="" class="mt-4">
                        <input required type="text" class="form-control rounded-0 my-3" placeholder="Name">
                        <input required type="email" class="form-control rounded-0 my-3" placeholder="Email">
                        <input required type="text" class="form-control rounded-0 my-3" placeholder="Phone Number">
                        <input required type="text" class="form-control rounded-0 my-3" placeholder="Address">
                        <textarea class="form-control rounded-0 my-3" rows="3" placeholder="Any instructions related to delivery?"></textarea>
                        <a href="thankyou.php" class="btn btn-main w-100" type="submit">Checkout now</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
</div>
@endsection
