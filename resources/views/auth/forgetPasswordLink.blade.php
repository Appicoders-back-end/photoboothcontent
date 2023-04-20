@extends('layouts.app-auth')

@section('content')
    <div class="hero-section">
        <div class="container">
            <div class="row hero-content signup-hero">
                <div class="col-lg-12">
                    <div class="signup-form">
                        <a href="index.php"><img src="{{asset('frontend/')}}/assets/img/logo.png"
                                                 class="d-block mx-auto mb-3" alt=""></a>
                        <h2>Reset Password</h2>
                        @include('layouts.messages')
                        <form method="POST" action="{{ route('reset.password.post') }}" class="mt-4">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            {{--<input type="email" name="email" class="form-control rounded-0 my-3" placeholder="Email"
                                   value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror --}}
                            <input type="password" name="password" class="form-control rounded-0 my-3"
                                   placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input type="password" name="password_confirmation" class="form-control rounded-0 my-3"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <button type="submit" class="btn btn-main w-100">
                                {{ __('Reset Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
