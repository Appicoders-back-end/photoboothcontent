@extends('layouts.app')
@section('style')
    <style>
        .form-control{
            color: #000;
            border: 3px solid #000;
            box-shadow: 8px 5px 0px #000;
        }
    </style>
@endsection
@section('content')
    <div class="hero-section">
        <img src="{{ asset('frontend') }}/assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
        <div class="container">
            <div class="row hero-content">
                <form action="{{ route('contact.store') }}" method="POST" class="w-75 d-block mx-auto">
                    @csrf
                    @include('layouts.messages')
                    <h3 class="fw-bold">Contact Form</h3>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" min="10" value="{{ old('phone') }}" placeholder="Enter phone number">
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control" name="message" cols="30" rows="10">{{ old('message') }}</textarea>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <button type="submit" class="btn btn-main">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <img src="{{ asset('frontend') }}/assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
    </div>
@endsection
