@extends('layouts.app')
@section('content')
    <main id="cart" class="mx-auto" style="max-width:960px; margin-top: 100px; padding: 100px 0;">
        <h2>Buy Membership</h2>

        <div class="container-fluid">
            <div class="row align-items-start">
                @include('layouts.messages')
                <div class="col-12 col-sm-8 items">
                    <div class="cartItem row align-items-start">
                        <div class="col-5 mb-2">
                            <h6 class="">{{$subscription->name}}</h6>
                            <p class="pl-1 mb-0">{{ $subscription->coupon->number_of_video??'' }} Videos</p>
                            <p class="pl-1 mb-0">{{ $subscription->coupon->number_of_images??'' }} Images</p>
                            <p>{{ $subscription->coupon->number_of_documents??'' }} Document</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 p-3 proceed form">
                    <div class="row mb-3">
                        <div class="col-12">
                            <select name="payment_method" id="payment-method-drp" class="form-select mb-3"
                                    aria-label=".form-select-lg example" form="checkout-form">
                                <option value="" selected>Select payment method</option>
                                @foreach($payment_methods as $payment_method)
                                    <option value="{{$payment_method->id}}">{{$payment_method->card_holder_name}}
                                        - {{$payment_method->card_end_number}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-sm-8 p-0">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="subtotal">${{$subscription->price}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-0 mb-2">
                        <div class="col-sm-8 p-0 d-inline">
                            <h5>Total</h5>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="total">${{$subscription->price}}</p>
                        </div>
                    </div>
                    <a class="btn btn-main w-100"
                       onclick="event.preventDefault(); document.getElementById('checkout-form').submit();"><span>Checkout</span></a>

                    <form id="checkout-form" action="{{ route('buyMembership') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
