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
                        <h5 class="card-title">Change Password</h5>
                        <hr>
                        @include('layouts.messages')
                        <form action="{{ route('updatePassword') }}" method="POST" class="mt-4">
                            @csrf

                            <div class="mb-3">
                                <label for="password" class="form-label">Old Password</label>
                                <input id="password" type="password" class="form-control" name="old_password"
                                       placeholder="Old Password" value="{{ old('old_password') }}">
                            </div>


                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="New Password" value="{{ old('password') }}">
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password"
                                       placeholder="Confirm Password" value="{{ old('confirm_password') }}">
                            </div>

                            <button type="submit" class="btn btn-main" type="submit">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
