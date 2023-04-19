@extends('layouts.app')
@section('content')
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <div class="col-lg-12 d-flex flex-column align-items-center text-center">
                    <h2>Your account has been verified successfully</h2>
                    <div class="d-flex w-50 justify-content-around">
                        <a class="btn btn-main" href="{{url('/')}}">Back to home <span><img
                                    src="{{asset('frontend')}}/assets/img/arrow-black.png" alt="arrow"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
@endsection
