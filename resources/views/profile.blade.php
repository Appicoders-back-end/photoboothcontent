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
    <div class="container dashboard-container">
        <div class="row mt-5">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profile</h5>
                        <hr>
                        @include('layouts.messages')
                        <form action="{{ route('update-profile') }}" method="POST" class="mt-4">
                            @csrf

                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" placeholder="First Name"
                                       name="first_name" value="{{ $user->first_name??'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control"
                                       placeholder="Last Name"
                                       name="last_name" value="{{ $user->last_name??'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="contact_no" class="form-label">Contact Number</label>
                                <input id="contact_no" type="number" class="form-control" placeholder="Phone Number"
                                       name="contact_no" value="{{ $user->contact_no??'' }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password"
                                       placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-main" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
