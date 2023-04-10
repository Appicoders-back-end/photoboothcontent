@extends('layouts.app-auth')

@section('content')
    {{--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="hero-section">
        <div class="container">
            <div class="row hero-content signup-hero">
                <div class="col-lg-12">
                    <div class="signup-form">
                        <a href="index.php"><img src="{{asset('frontend/')}}/assets/img/logo.png"
                                                 class="d-block mx-auto mb-3" alt=""></a>
                        <h2>Sign in Now</h2>
                        <form method="POST" action="{{ route('login') }}" class="mt-4">
                            @csrf
                            <input type="email" name="email" class="form-control rounded-0 my-3" placeholder="Email"
                                   value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                            <input type="password" name="password" class="form-control rounded-0 my-3"
                                   placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <a href="#" class="d-block text-danger mb-3">Forgot password?</a>
                            <button type="submit" class="btn btn-main w-100">
                                {{ __('Sign In') }}
                            </button>
                        </form>
                        <a href="{{route('register')}}" class="text-dark d-block mt-3 text-center text-decoration-none">Don't
                            have an account? <span class="text-decoration-underline">Sign up.</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
