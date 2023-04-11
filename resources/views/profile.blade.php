@extends('layouts.app')
@section('content')
    {{--<div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <hr>
                        <p class="card-text"><strong>Name:</strong> John Doe</p>
                        <p class="card-text"><strong>Email:</strong> johndoe@gmail.com</p>
                        <p class="card-text"><strong>Phone:</strong> +1 (123) 456-7890</p>
                        <p class="card-text"><strong>Address:</strong> 123 Main St, Anytown, USA</p>
                        <p class="card-text"><strong>Membership:</strong> Premium</p>
                        <p class="card-text"><strong>Membership Due:</strong> 10/4/2023</p>
                        <a href="#" class="btn btn-main">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="hero-section">
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">

            <div class="row hero-content signup-hero">

                <div class="col-lg-12">
                    <div class="signup-form">
                        <a href="index.php"><img src="{{asset('frontend')}}/assets/img/logo.png" class="d-block mx-auto mb-3" alt=""></a>
                        <h2>Update Profile </h2>
                        @include('layouts.messages')
                        <form action="{{ route('update-profile') }}" method="POST" class="mt-4">
                            @csrf

                            <input type="text" class="form-control rounded-0 my-3" placeholder="First Name" name="first_name" value="{{ $user->first_name??'' }}">
                            <input type="text" class="form-control rounded-0 my-3" placeholder="Last Name" name="last_name" value="{{ $user->last_name??'' }}">
                            <input type="email" class="form-control rounded-0 my-3" placeholder="Email" name="email" value="{{ $user->email??'' }}" disabled>
                            <input type="number" class="form-control rounded-0 my-3" placeholder="Phone Number" name="contact_no" value="{{ $user->contact_no??'' }}">
                            <input type="password" class="form-control rounded-0 my-3" name="password" placeholder="Password">
                            <input type="password" class="form-control rounded-0 my-3" name="confirm_password"
                                   placeholder="Confirm Password">
                            <button type="submit" class="btn btn-main w-100" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
@endsection
