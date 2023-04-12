@extends('layouts.app-auth')

@section('content')
    <div class="hero-section">
        <div class="container">
            <div class="row hero-content signup-hero">
                <div class="col-lg-12">
                    <div class="signup-form">
                        <a href="index.php"><img src="{{asset('frontend/')}}/assets/img/logo.png"
                                                 class="d-block mx-auto mb-3" alt=""></a>
                        <h2>Forgot Password</h2>
                        @if (Session::has('message'))
                          <div class="alert alert-success" role="alert">
                              {{ Session::get('message') }}
                          </div>
                        @endif
                        @include('layouts.messages')
                        <form method="POST" action="{{ route('forget.password.post') }}" class="mt-4">
                            @csrf
                            <input type="email" name="email" class="form-control rounded-0 my-3" placeholder="Email"
                                   value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                            <button type="submit" class="btn btn-main w-100">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
