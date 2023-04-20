@extends('layouts.app')
@section('content')
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
                                       name="first_name" value="{{ old('first_name', $user->first_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control"
                                       placeholder="Last Name"
                                       name="last_name" value="{{ old('last_name', $user->last_name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="contact_no" class="form-label">Contact Number</label>
                                <input id="contact_no" type="text" class="form-control" placeholder="Phone Number"
                                       name="contact_no" value="{{ old('contact_no', $user->contact_no) }}" minlength="10" maxlength="10">
                            </div>
                            <button type="submit" class="btn btn-main" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
