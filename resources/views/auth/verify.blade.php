@extends('layouts.app-auth')

@section('content')

<div class="hero-section">
    <div class="container">
        <div class="row hero-content signup-hero">
            <div class="col-lg-12">
                <div class="signup-form">
                    <a href="index.php"><img src="{{asset('frontend/')}}/assets/img/logo.png"
                                             class="d-block mx-auto mb-3" alt=""></a>
                    <h2>{{ __('Verify Your Email Address') }}</h2>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    @include('layouts.messages')
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
