@extends('layouts.app')
@section('content')
    <div class="hero-section">
    <img src="assets/img/hero-section-circle-pink.png" alt="Pink circle" class="pink-circle">
    <div class="container">
        <div class="row hero-content signup-hero">
            <div class="col-lg-12">
                <div class="signup-form">
                    <a href="index.php"><img src="assets/img/logo.png" class="d-block mx-auto mb-3" alt=""></a>
                    @include('layouts.messages')
                    <h2>Checkout</h2>
                    <form action="{{ route('shop.checkout.process') }}" class="mt-4" method="POST">
                        @csrf
{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-12">--}}

                            <select name="payment_method" class="form-select" id="">
                                <option value="" disabled>Select payment method</option>
                                @forelse($payment_methods as $payment_method)
                                    <option value="{{$payment_method->id}}">{{$payment_method->card_holder_name}}
                                        - {{$payment_method->card_end_number}}</option>
                                @empty
                                @endforelse
                            </select>
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <input required type="text" class="form-control rounded-0 my-3" name="name" value="{{ auth()->user()->name??'' }}" placeholder="Name">--}}
{{--                        <input required type="email" class="form-control rounded-0 my-3" name="email" value="{{ auth()->user()->email??'' }}" placeholder="Email">--}}
                        <input required type="text" class="form-control rounded-0 my-3" name="phone_number" value="{{ old('phone_number') }}"  placeholder="Phone Number">
                        <input required type="text" class="form-control rounded-0 my-3" name="address" placeholder="Address" value="{{ old('address') }}">
                        <textarea class="form-control rounded-0 my-3" rows="3" name="other_instruction" placeholder="Any instructions related to delivery?">{{ old('other_instruction') }}</textarea>
                        <button type="submit" class="btn btn-main w-100" type="submit">Checkout now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-section-circle-blue.png" alt="Blue circle" class="blue-circle">
</div>
@endsection
