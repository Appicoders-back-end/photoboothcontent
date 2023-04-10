@extends('layouts.app-auth')

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                    <a href="index.php"><img src="{{asset('frontend/')}}/assets/img/logo.png" class="d-block mx-auto mb-3" alt=""></a>
                    <h2>Sign up Now</h2>
                    <form action="" class="mt-4">
                        <input type="text" class="form-control rounded-0 my-3" placeholder="Name">
                        <input type="email" class="form-control rounded-0 my-3" placeholder="Email">
                        <input type="text" class="form-control rounded-0 my-3" placeholder="Phone Number">
                        <input type="text" class="form-control rounded-0 my-3" placeholder="Company Name">
                        <input type="password" class="form-control rounded-0 my-3" placeholder="Password">
                        <input type="password" class="form-control rounded-0 my-3"
                               placeholder="Confirm Password">

                        <a href="signin.php" class="btn btn-main w-100" type="submit">Sign up</a>
                    </form>
                    <a href="{{route('login')}}" class="text-dark d-block mt-3 text-center text-decoration-none">Already have an account? <span class="text-decoration-underline">Sign in.</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
